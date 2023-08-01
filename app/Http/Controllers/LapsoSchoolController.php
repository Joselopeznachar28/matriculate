<?php

namespace App\Http\Controllers;

use App\Http\Requests\LapsosSchoolRequest;
use App\Models\AcademicPeriod;
use App\Models\LapsoSchool;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LapsoSchoolController extends Controller
{
    public function index(Request $request){

        $search = $request->input('search');

        $academic_periods = AcademicPeriod::with('lapsos')->when($search, function ($query, $search) {
            $query->orWhere('init', 'LIKE', '%'.$search.'%')
            ->orWhere('end', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id','desc')
        ->simplePaginate(5);

        return view('school_years.school_lapsos.index',compact('academic_periods','search'));
    }

    public function create($id){
        $academic_period = AcademicPeriod::find($id);
        return view('school_years.school_lapsos.create',compact('academic_period'));
    }

    public function store(LapsosSchoolRequest $request){
        
        $lapso_school = LapsoSchool::create([
            'academic_period_id' => $request->academic_period_id,
            'name' => $request->name,
            'init' => $request->init,
            'end'  => $request->end,
        ]);

        $now = new Carbon();
        $activeLapso = $now->toDateString();
        $lapsos = LapsoSchool::where('init', '<=', $activeLapso)->where('end', '>=', $activeLapso)->get();

        foreach ($lapsos as $lapso) {
            $lapso_id = $lapso->id;
            //actualizando el status del lapso que esta activo
            $activarLapso = LapsoSchool::findOrFail($lapso_id)->update([
                'active' => 1,
            ]);
        }

        notify()->success('El lapso se ha creado con exito', 'Creado');
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
