<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\YearSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::orderBy('id','desc')->get();
        return view('teachers.index',compact('teachers'));
    }

    public function create(){
        $subjects = Subject::with('sections')->get();
        return view('teachers.create',compact('subjects'));
    }

    public function store(Request $request){
        // dd($request->all());
        $teacher = Teacher::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'identification' => $request->identification,
            'code'=> Str::random(5),
            'email' => $request->email,
        ]);

        notify()->success('Los datos se han guardado exitosamente');
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
        notify()->success('Los datos se han editado exitosamente');
        return redirect()->route('teachers.index');
    }

    public function destroy($id){

        $teacher = Teacher::find($id);
        $teacher->delete();
        notify()->success('Los datos han sido eliminado exitosamente');
        return back();
    }

    public function asigneSubjectToTeacherView(){
        $sections = Section::with('year_school')->get();
        return view('teachers.asigneSubjectToTeacherView',compact('sections'));
    }
    
    public function subjectYear($id){
        $teachers = Teacher::all();
        $section = Section::find($id)->load('year_school.subjects');
        return view('teachers.subjectYear',compact('teachers','section'));
    }

    public function asigneSubjectToTeacher(Request $request){

        $subjects = $request->subject_id;
        $teachers = $request->teacher_id;

        foreach ($teachers as $key => $teacher) {
                $t = Teacher::find($teacher);
                $t->subjects()->attach($subjects[$key]);
        }

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

        notify()->success('El usuario ha sido generado exitosamente');
        return redirect()->route('teachers.index');
    }

}
