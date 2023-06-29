<?php

namespace App\Http\Controllers;

use App\Models\AcademicPeriod;
use App\Models\LapsoSchool;
use App\Models\Section;
use App\Models\YearSchool;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(){
        $year_schools = YearSchool::with('sections')->get();
        return view('sections.index',compact('year_schools'));
    }

    public function create(){
        $academic_period = AcademicPeriod::all()->last();
        $year_schools = YearSchool::with('subjects')->get();
        return view('sections.create',compact('year_schools','academic_period'));
    }

    public function store(Request $request){
        $section = Section::create([
            'letter' => $request->letter,
            'academic_period_id' => $request->academic_period_id,
            'year_school_id' => $request->year_school_id,
            'subject_id' => $request->subject_id,
        ]);

        return redirect()->route('sections.create');

    }

    public function asigneSection(){
        $year_schools = YearSchool::with('sections')->get();
        return view('sections.asigneSection', compact('year_schools'));
    }

    public function asigneSectionToStudents($id){
        $section = Section::find($id);
        $lapsos = LapsoSchool::all();
        return view('sections.asigneSectionToStudents', compact('section','lapsos'));
    }

    public function asignadeSection(Request $request){

        $student_records = $request->student_record_id;
        $section = Section::find($request->section_id);

        if (!empty($student_records)) {
            foreach ($student_records as $key => $student_record) {
                $section->student_records()->attach($student_record);
            }
        }
        return redirect()->route('sections.asigneSection');
    }
}
