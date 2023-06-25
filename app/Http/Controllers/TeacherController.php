<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\YearSchool;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::orderBy('id','desc')->get();
        return view('teachers.index',compact('teachers'));
    }

    public function create(){
        $subjects = Subject::with('sections')->get();
        return view('teachers.create',compact('subjects'));
    }

    public function store(Request $request){
        // dd($request->all());
        $teacher = Teacher::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'identification' => $request->identification,
            'email' => $request->email,
        ]);

        // foreach ($request->subject_id as $subject) {
        //     if(!empty($subject)){
        //        $teacher->subjects()->attach($subject);
        //     }
        // }
        // foreach ($request->section_id as $section) {
        //     if(!empty($section)){
        //        $teacher->sections()->attach($section);
        //     }
        // }
        
        return redirect()->route('teachers.index');
    }

    public function edit($id){
        $teacher = Teacher::find($id);
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id){
        $teacher = Teacher::findOrFail($id)->update([
            'name'=>$request->input('name'),
            'lastname'=>$request->input('lastname'),
            'identification'=>$request->input('identification'),
            'email'=>$request->input('email'),
        ]);

        return redirect()->route('teachers.index');
    }

    public function destroy($id){

        $teacher = Teacher::find($id);
        $teacher->delete();

        return back();
    }

    public function asigneSubjectToTeacherView(){
        $sections = Section::with('year_school')->get();
        return view('teachers.asigneSubjectToTeacherView',compact('sections'));
    }
    
    public function subjectYear($id){
        $teachers = Teacher::all();
        $section = Section::find($id)->load('year_school.subjects');
        return view('teachers.subjectYear',compact('teachers','section'));
    }

    public function asigneSubjectToTeacher(Request $request){
        dd($request->all());
        $teacher = Teacher::find($request->teacher_id);
        foreach ($request->subject_id as $subject) {
            if(!empty($subject)){
               $teacher->subjects()->attach($subject);
            }
        }
        foreach ($request->section_id as $section) {
            if(!empty($section)){
               $teacher->sections()->attach($section);
            }
        }
        return redirect()->route('teachers.asigneSubjectToTeacherView');
    }

}
