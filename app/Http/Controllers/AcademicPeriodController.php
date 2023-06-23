<?php

namespace App\Http\Controllers;

use App\Models\AcademicPeriod;
use App\Models\YearSchool;
use Illuminate\Http\Request;

class AcademicPeriodController extends Controller
{
    public function index(){
        $academic_periods = AcademicPeriod::all() ;
        return view('school_years.academic_period.index',compact('academic_periods'));
    }

    public function create(){
        $year_schools = YearSchool::all();
        return view('school_years.academic_period.create',compact('year_schools'));
    }

    public function store(Request $request){
        $academic_period =  new AcademicPeriod();

        $academic_period->name = $request->name;
        $academic_period->init = $request->init;
        $academic_period->end = $request->end;

        $academic_period->save();

        foreach ($request->year_id as $year_school) {
            if(!empty($year_school)){
               $academic_period->year_schools()->attach($year_school);
            }
        }

        return redirect()->route('academic_period.index');

    }
}
