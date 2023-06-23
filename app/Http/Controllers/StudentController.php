<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\YearSchool;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class StudentController extends Controller
{
    public function index(){
        $students = Student::orderBy('id','asc')->get();
        return view('students.index',compact('students'));
    }

    public function create(){
        return view('students.create');
    }

    public function store(Request $request){

        $student = Student::create([
            'names'                 =>  $request->names,
            'lastnames'             =>  $request->lastnames,
            'identification'        =>  $request->identification,
            'gender'                =>  $request->gender,
            'birthdate'             =>  $request->birthdate,
            'place_of_birth'        =>  $request->place_of_birth,
            'municipality'          =>  $request->municipality,
            'state'                 =>  $request->state,
            'laterality'            =>  $request->laterality,
            'weight'                =>  $request->weight,
            'height'                =>  $request->height,
            'footwear'              =>  $request->footwear,
            'pants'                 =>  $request->pants,
            'shirt'                 =>  $request->shirt,
            'brachial_measure'      =>  $request->brachial_measure,
            'birth_order'           =>  $request->birth_order,
            'disease'               =>  $request->disease,
            'email'                 =>  $request->email,
            'school_background'     =>  $request->school_background,
            'state_actual'          =>  $request->state_actual,
            'municipality_actual'   =>  $request->municipality_actual,
            'parish_actual'         =>  $request->parish_actual,
            'sector'                =>  $request->sector,
            'reference_point'       =>  $request->reference_point,
            'student_live_with'     =>  $request->student_live_with,
        ]);

        return redirect()->route('students.index');

    }

    public function edit($id){
        $student = Student::find($id);
        return view('students.edit',compact('student'));
    }

    public function update(Request $request, $id){

        $student = Student::where('id', '=', $id)->update([
            'names'                 =>  $request->names,
            'lastnames'             =>  $request->lastnames,
            'identification'        =>  $request->identification,
            'gender'                =>  $request->gender,
            'birthdate'             =>  $request->birthdate,
            'place_of_birth'        =>  $request->place_of_birth,
            'municipality'          =>  $request->municipality,
            'state'                 =>  $request->state,
            'laterality'            =>  $request->laterality,
            'weight'                =>  $request->weight,
            'height'                =>  $request->height,
            'footwear'              =>  $request->footwear,
            'pants'                 =>  $request->pants,
            'shirt'                 =>  $request->shirt,
            'brachial_measure'      =>  $request->brachial_measure,
            'birth_order'           =>  $request->birth_order,
            'disease'               =>  $request->disease,
            'email'                 =>  $request->email,
            'school_background'     =>  $request->school_background,
            'state_actual'          =>  $request->state_actual,
            'municipality_actual'   =>  $request->municipality_actual,
            'parish_actual'         =>  $request->parish_actual,
            'sector'                =>  $request->sector,
            'reference_point'       =>  $request->reference_point,
            'student_live_with'     =>  $request->student_live_with,
        ]);

        return redirect()->route('students.index',compact('student'));

    }

    public function destroy($id){

        $student = Student::find($id);
        $student->delete();

        return back();
    }

}
