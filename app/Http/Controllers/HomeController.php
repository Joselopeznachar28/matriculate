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
use Illuminate\Http\Request;
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
        $array = [];
        $teachers = Teacher::all();
        $users = User::all();
        $year_schools = YearSchool::with('student_records')->get();

        $student_records = StudentRecord::all();

        $lapso_active = LapsoSchool::where('active',1)->get();
        foreach ($year_schools as $year_school) {
            $subjects = Subject::where('year_school_id', '=', $year_school->id)->get();
        
            foreach ($year_school->student_records as $student_record) {
                foreach ($subjects as $subject) {

                    $notes = Note::where('student_record_id', $student_record->id)->where('subject_id',$subject->id)->where('lapso_id',$lapso_active[0]->id)->get();
                    
                    foreach ($notes as $key => $note) {
                        $object = [
                            'estudiante' => $student_record->id,
                            'materia' => $subject->id,
                            'nota' => $note->note,
                        ];
                        array_push($array, $object);
                    }
                }
            }
        }

        // dd($array);
        
        return view('dashboard',compact('teachers','users','year_schools','lapso_active','array'));
    }
}
