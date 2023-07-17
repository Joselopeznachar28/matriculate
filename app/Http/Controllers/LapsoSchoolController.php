<?php

namespace App\Http\Controllers;

use App\Http\Requests\LapsosSchoolRequest;
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

    public function store(LapsosSchoolRequest $request){
        
        $lapso_school = LapsoSchool::create([
            'academic_period_id' => $request->academic_period_id,
            'number' => $request->number,
            'init' => $request->init,
            'end' => $request->end,
        ]);

        notify()->success('El lapso ' . "'$lapso_school->number'"  .' se ha creado con exito', 'Creado');
        return redirect()->route('lapso_schools.index');

    }
    public function changeStatus(Request $request){
        $lapso = LapsoSchool::find($request->lapso_id);
        $lapso->upload_note = $request->upload_note;
        $lapso->save();
        notify()->success('Ahora esta disponible la opcion para subir notas en el lapso ' . $lapso->number);
        return response()->json(['Aprobado' => 'Puede subir notas!']);
    }
}
