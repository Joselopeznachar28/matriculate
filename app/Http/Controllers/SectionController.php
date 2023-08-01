<?php

namespace App\Http\Controllers;

use App\Models\AcademicPeriod;
use App\Models\Section;
use App\Models\YearSchool;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');

        $sections = Section::when($search, function ($query, $search) {
            $query->orWhere('letter', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id','desc')
        ->simplePaginate(20);

        return view('sections.index',compact('sections','search'));
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
        ]);

        notify()->success('Ha sido creada la seccion ' . "'$section->letter'", 'Creada');
        return redirect()->route('sections.create');

    }
}
