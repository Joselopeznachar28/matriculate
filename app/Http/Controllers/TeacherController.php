<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\LapsoSchool;
use App\Models\Note;
use App\Models\Section;
use App\Models\StudentRecord;
use App\Models\Subject;
use App\Models\SubjectTeacher;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\YearSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');

        $teachers = Teacher::when($search, function ($query, $search) {
            $query->orWhere('name', 'LIKE', '%'.$search.'%')
            ->orWhere('lastname', 'LIKE', '%'.$search.'%')
            ->orWhere('identification', 'LIKE', '%'.$search.'%')
            ->orWhere('email', 'LIKE', '%'.$search.'%')
            ->orWhere('code', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id','desc')
        ->simplePaginate(5);

        return view('teachers.index',compact('teachers','search'));
    }

    public function create(){
        $subjects = Subject::all();
        return view('teachers.create',compact('subjects'));
    }

    public function store(TeacherRequest $request){
        // dd($request->all());
        $teacher = Teacher::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'identification' => $request->identification,
            'code'=> Str::random(5),
            'email' => $request->email,
        ]);

        notify()->success('Ha sido cread@ el/la Profesor/a ' . "'$teacher->name $teacher->lastname'", 'Guardad@');
        return redirect()->route('teachers.create');
    }

    public function edit($id){
        $teacher = Teacher::find($id);
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id){
        $teacher = Teacher::findOrFail($id)->update([
            'name'=>$request->input('name'),
            'lastname'=>$request->input('lastname'),
            'identification'=>$request->input('identification'),
            'email'=>$request->input('email'),
        ]);
        notify()->success('Ha sido actualizad@ el/la Profesor/a ' . "'$teacher->name $teacher->lastname'", 'Actualizad@');
        return redirect()->route('teachers.index');
    }

    public function destroy($id){

        $teacher = Teacher::find($id);
        $user = User::where('email',$teacher->email)->get();
        $u = User::find($user[0]->id);
        $u->delete();
        $teacher->delete();
        notify()->success('Ha sido eliminad@ el/la Profesor/a ' . "'$teacher->name $teacher->lastname'", 'Eliminad@');
        return redirect()->route('teachers.index');
    }

    public function asigneSubjectToTeacherView(){
        $sections = Section::with('year_school')->get();
        return view('teachers.asigneSubjectToTeacherView',compact('sections'));
    }
    
    public function subjectYear($id){
        $teachers = Teacher::all();
        $section = Section::find($id)->load('year_school.subjects');
        return view('teachers.subjectYear',compact('teachers','section','id'));
    }

    public function asigneSubjectToTeacher(Request $request,$id){

        $section = Section::find($id);
        $section_id = $section->id;

        $subjects = $request->subject_id;
        $teachers = $request->teacher_id;

        foreach ($teachers as $key => $teacher) {
        
            $subjectTeacher = new SubjectTeacher();

            $subjectTeacher->teacher_id = $teacher;
            $subjectTeacher->subject_id = $subjects[$key];
            $subjectTeacher->section_id = $section_id;
            $subjectTeacher->save();
        }
        notify()->success('Las Materias fueron asignadas correctamente!', 'Exitoso');
        return redirect()->route('teachers.asigneSubjectToTeacherView');
    }

    public function generateUserTeacher($id){

        $teacher = Teacher::find($id);

        $user = User::create([
            'name' => $teacher->name . ' ' . $teacher->lastname,
            'email' => $teacher->email,
            'password' => Hash::make($teacher->code . $teacher->identification),
        ]);

        $user->teacher()->attach($teacher->id);

        notify()->success('Ha sido generado el usuario' . "'$user->name'", 'Generado');
        return redirect()->route('teachers.index');
    }

    public function academic_charge(){

        $user_active_id = Auth::user()->id;
        $user = User::find($user_active_id);

        $array = [];

        foreach ($user->teacher as $t) {
            foreach ($t->subjects as $subject) {
                $section_name = Section::find($subject->pivot->section_id);
                $object = [
                    'subject' => $subject,
                    'year_school'    => $subject->year_school,
                    'section' => $section_name,
                ];
                array_push( $array, $object );
            }
        }

        return view('teachers.academic_charge',compact('user','array'));

    }

    public function notes_charge($year_school_id, $subject_id, $section_id){

        //comparacion entre fechas para saber cual es el lapso que esta activo.
        $now = new Carbon;
        $activeLapso = $now->toDateString();
        $lapsos = LapsoSchool::where('init', '<=', $activeLapso)->where('end', '>=', $activeLapso)->get();
        foreach ($lapsos as $key => $lapso) {
            $lapso_id = $lapso->id;
        }

        //actualizando el status del lapso que esta activo
        $activarLapso = LapsoSchool::findOrFail($lapso_id)->update([
            'active' => 1,
        ]);

        $lapso = LapsoSchool::find($lapso_id);

        $year_school = YearSchool::find($year_school_id);
        $subject = Subject::find($subject_id);
        $section = Section::find($section_id);
        $record_students = StudentRecord::where('year_school_id', '=', $year_school_id)->where('section_id', '=', $section_id)->get();
        return view('teachers.notes_charge',compact('year_school','subject','section','record_students','lapso'));
    }

    public function notes_charge_store(Request $request){
        $students = $request->student_record_id;
        $notes = $request->note;

        foreach ($students as $key => $student_record_id) {

            $note = new Note();

            $note->note = $notes[$key];
            $note->year_school_id = $request->year_school_id;
            $note->subject_id = $request->subject_id;
            $note->section_id = $request->section_id;
            $note->lapso_id = $request->lapso_id;
            $note->student_record_id = $student_record_id;

            $note->save();
        }
        notify()->success('Las notas han sido cargada exitosamente!', 'Exitoso');
       return redirect()->route('academic_charge.index'); 
    }

}
