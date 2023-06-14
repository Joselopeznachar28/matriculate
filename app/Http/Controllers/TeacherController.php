<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::orderBy('id','desc')->get();
        return view('teachers.index',compact('teachers'));
    }

    public function create(){
        $subjects = Subject::all();
        return view('teachers.create',compact('subjects'));
    }

    public function store(Request $request){
        // dd($request->all());
        $teacher = Teacher::create([
            'name' => $request->name,
        ]);

        foreach ($request->subject_id as  $subject) {
            if(!empty($subject)){
               $subject_id = $teacher->subjects()->attach($subject);
            }
        }
        
        return redirect()->route('teachers.index');
    }

    public function destroy($id){
        $teacher = Teacher::find($id);
        $teacher->delete();

        return back();
        
    }
}
