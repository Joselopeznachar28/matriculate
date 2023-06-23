<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\YearSchool;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    public function index() {
        $subjects = Subject::orderBy('id','desc')->get();
        return view('subjects.index',compact('subjects'));
    }

    public function create(){
        $year_schools = YearSchool::all();
        return view('subjects.create', compact('year_schools'));
    }

    public function store(Request $request){
        // dd($request->all());
        $subject = Subject::create([
            'name' => $request->name,
            'code' => strtoupper( Str::random(5)),
            'year_school_id' => $request->year_school_id,
        ]);

        return redirect()->route('subjets.index');
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

        return redirect()->route('subjets.index');
    }

    public function destroy($id){
        $subject = Subject::find($id);
        $subject->delete();
        return back();
    }
}
