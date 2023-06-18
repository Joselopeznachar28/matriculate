<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(){
        $sections = Section::all();
        return view('sections.index',compact('sections'));
    }

    public function create(){
        $subjects = Subject::all();
        return view('sections.create',compact('subjects'));
    }

    public function store(Request $request){

        $section = Section::create([
            'letter' => $request->letter,
        ]);

        foreach ($request->subject_id as $subject) {
            if(!empty($subject)){
               $section->subjects()->attach($subject);
            }
        }

        return redirect()->route('sections.index');
    }
}
