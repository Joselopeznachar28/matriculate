<?php

namespace App\Http\Controllers;

use App\Models\AcademicPeriod;
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

        return redirect()->route('sections.index');

    }

    public function asigneSection(){
        $year_schools = YearSchool::with('sections')->get();
        return view('sections.asigneSection', compact('year_schools'));
    }

    public function asigneSectionToStudents($id){
        $section = Section::find($id);
        return view('sections.asigneSectionToStudents', compact('section'));
    }

    public function asignadeSection(Request $request){
        dd($request->all());
    }
}
