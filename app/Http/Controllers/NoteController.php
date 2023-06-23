<?php

namespace App\Http\Controllers;

use App\Models\AcademicPeriod;
use App\Models\LapsoSchool;
use App\Models\Student;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){
        $academic_period = AcademicPeriod::all()->last();
        $lapso = LapsoSchool::all()->last();
        $students = Student::all();
        return view('notes.index',compact('students','academic_period','lapso'));
    }

    public function store(Request $request){
        //
    }
}
