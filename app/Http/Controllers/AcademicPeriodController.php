<?php

namespace App\Http\Controllers;

use App\Http\Requests\AcademicPeriodRequest;
use App\Models\AcademicPeriod;
use App\Models\YearSchool;
use Illuminate\Http\Request;

class AcademicPeriodController extends Controller
{
    public function index(){
        $academic_periods = AcademicPeriod::with('lapsos')->get();
        return view('school_years.academic_period.index',compact('academic_periods'));
    }

    public function create(){
        $year_schools = YearSchool::all();
        return view('school_years.academic_period.create',compact('year_schools'));
    }

    public function store(AcademicPeriodRequest $request){

        $academic_period = AcademicPeriod::create([
            'name' => $request->name,
            'init' => $request->init,
            'end' => $request->end,
        ]);
        
        foreach ($request->year_id as $year_school) {
            if(!empty($year_school)){
                $academic_period->year_schools()->attach($year_school);
            }
        }
        
        notify()->success('El periodo academico ' . "'$academic_period->name'"  .' se ha creado con exito', 'Creado');
        return redirect()->route('academic_period.index');

    }

    public function edit($id){
        $year_schools = YearSchool::all();
        $period = AcademicPeriod::find($id);
        return view('school_years.academic_period.edit',compact('period','year_schools'));
    }

    public function update(Request $request, $id){

        $academic_period = AcademicPeriod::findOrFail($id)->update([
            'name' => $request->name,
            'init' => $request->init,
            'end' => $request->end,
        ]);
        notify()->success('El periodo academico se ha actualizado con exito', 'Actualizado');
        return redirect()->route('academic_period.index');
    }
}
