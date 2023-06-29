<?php

namespace App\Http\Controllers;

use App\Models\AcademicPeriod;
use App\Models\LapsoSchool;
use Illuminate\Http\Request;

class LapsoSchoolController extends Controller
{
    public function index(){
        $academic_periods = AcademicPeriod::with('lapsos')->get();
        return view('school_years.school_lapsos.index',compact('academic_periods'));
    }

    public function create($id){
        $academic_period = AcademicPeriod::find($id);
        return view('school_years.school_lapsos.create',compact('academic_period'));
    }

    public function store(Request $request){
        
        $lapso_schools = LapsoSchool::create([
            'academic_period_id' => $request->academic_period_id,
            'number' => $request->number,
            'init' => $request->init,
            'end' => $request->end,
        ]);

        return redirect()->route('lapso_schools.index');

    }
    public function changeStatus(Request $request){
        $lapso = LapsoSchool::find($request->lapso_id);
        $lapso->upload_note = $request->upload_note;
        $lapso->save();
        return response()->json(['Aprobado' => 'Puede subir notas!']);
    }

    public function uploadNotes($id){
        $lapso = LapsoSchool::find($id);
        // dd($lapso);
        $period_academic = AcademicPeriod::find($lapso->academic_period_id)->load('year_schools.subjects.sections','year_schools.student_records');
        dd($period_academic);
        dd($lapso);
    }
}
