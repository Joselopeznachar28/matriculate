<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index() {
        $subjects = Subject::orderBy('id','desc')->get();
        return view('subjects.index',compact('subjects'));
    }

    public function create(){
        return view('subjects.create');
    }

    public function store(Request $request){
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->save();
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
