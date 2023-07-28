<?php

namespace App\Http\Controllers;

use App\Models\LapsoSchool;
use App\Models\Note;
use App\Models\Section;
use App\Models\StudentRecord;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use App\Models\YearSchool;
use PDF;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $user = User::find(Auth::user()->id);
        return view('home',compact('user'));
    }

    public function dashboard(){
        
        $teachers = Teacher::all();
        $users = User::all();
        $year_schools = YearSchool::with('student_records')->get();

        $lapso_active = LapsoSchool::where('active',1)->get();
        
        //Inicio para obtener los datos 
        $student_records = StudentRecord::all();
        $array = [];
        $aproved = 0;
        $reproved = 0;

        //obtengo un estudiante
        foreach ($student_records as  $student_record) 
        {
            //obtengo el año de ese estudiante
            $year_school = YearSchool::find($student_record->year_school_id);

            //obtengo todas las materias de ese año
            $subjects = Subject::where('year_school_id',$year_school->id)->get();
            $section = Section::find($student_record->section_id);
            $array[$student_record->id] = [
                'student_names' => $student_record->names,
                'student_lastnames' => $student_record->lastnames,
                'year_school' => $year_school->name,
                'section' => $section->letter,
                'student_identification' => $student_record->identification,
                'subject' => [],
                'note' => [],
                'noteFinal' => []
            ];

            //recorro materia por materia
            foreach ($subjects as $subject) {

                //obtengo las notas por alumno y materia
                $notes = Note::where('student_record_id', $student_record->id)->where('subject_id',$subject->id)->get();
                foreach ($notes as $key => $note) {
                    $noteSubject = ($notes->sum('note')/3);
                }

                //subir al arreglo informacion
                array_push($array[$student_record->id]['subject'], $subject->name);
                array_push($array[$student_record->id]['note'], round($noteSubject));
                $noteFinal = array_sum($array[$student_record->id]['note'])/$subjects->count();
                
            }

            array_push($array[$student_record->id]['noteFinal'], round($noteFinal));

        }

        foreach ($array as $key => $a) {
            $a['noteFinal'][0] > 10 ? $aproved += count($a['noteFinal']) : $reproved += count($a['noteFinal']);
        }
        
        //Fin
    
        return view('dashboard',compact('teachers','users','year_schools','lapso_active','aproved','reproved','array'));
    }

    public function report(){

        $array = [];
        $aproved = 0;
        $reproved = 0;

        $student_records = StudentRecord::all();

        //obtengo un estudiante
        foreach ($student_records as  $student_record) 
        {
            //obtengo el año de ese estudiante
            $year_school = YearSchool::find($student_record->year_school_id);

            //obtengo todas las materias de ese año
            $subjects = Subject::where('year_school_id',$year_school->id)->get();
            $section = Section::find($student_record->section_id);
            $array[$student_record->id] = [
                'student_names' => $student_record->names,
                'student_lastnames' => $student_record->lastnames,
                'year_school' => $year_school->name,
                'section' => $section->letter,
                'student_identification' => $student_record->identification,
                'subject' => [],
                'note' => [],
                'noteFinal' => []
            ];

            //recorro materia por materia
            foreach ($subjects as $subject) {

                //obtengo las notas por alumno y materia
                $notes = Note::where('student_record_id', $student_record->id)->where('subject_id',$subject->id)->get();
                foreach ($notes as $key => $note) {
                    $noteSubject = ($notes->sum('note')/3);
                }

                //subir al arreglo informacion
                array_push($array[$student_record->id]['subject'], $subject->name);
                array_push($array[$student_record->id]['note'], round($noteSubject));
                $noteFinal = array_sum($array[$student_record->id]['note'])/$subjects->count();
                
            }

            array_push($array[$student_record->id]['noteFinal'], round($noteFinal));

        }

        foreach ($array as $key => $a) {
            $a['noteFinal'][0] > 10 ? $aproved += count($a['noteFinal']) : $reproved += count($a['noteFinal']);
        }
        
        // dd($reproved);
        $pdf = PDF::loadView('pdf.report', compact('array','aproved','reproved'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream();

    }
}
