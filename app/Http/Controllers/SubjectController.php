<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\YearSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    public function index(Request $request) {

        $search = $request->input('search');

        $subjects = Subject::when($search, function ($query, $search) {
            $query->orWhere('name', 'LIKE', '%'.$search.'%')
            ->orWhere('code', 'LIKE', '%'.$search.'%');
        })
        ->orderBy('id','desc')
        ->simplePaginate(5);

        return view('subjects.index',compact('subjects','search'));
    }

    public function create(){
        $year_schools = YearSchool::all();
        return view('subjects.create', compact('year_schools'));
    }

    public function store(Request $request){
        $subject = Subject::create([
            'name' => $request->name,
            'code' => strtoupper( Str::random(5)),
            'year_school_id' => $request->year_school_id,
        ]);
        notify()->success('La materia ' . $subject->name . ' se ha creado con exito','Creado');
        return redirect()->route('subjets.create');
    }

    public function edit($id){
        $subject = Subject::find($id);
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id){

        $subject = Subject::find($id);

        $subject = Subject::where('id','=',$id)->update([
            "name" => $request->name,
        ]);
        notify()->success('La materia ' . $subject->name . ' se ha editado con exito','Actualizado');
        return redirect()->route('subjets.index');
    }

    public function destroy($id){
        $subject = Subject::find($id);
        $subject->delete();
        notify()->success('La materia ' . $subject->name . ' se ha eliminado con exito','Eliminado');
        return back();
    }
}
