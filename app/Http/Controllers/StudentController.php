<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentsRequest;
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

    public function store(StudentsRequest $request){

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
        notify()->success('Ha sido añadido el/la estudiante ' . "'$student->names $student->lastnames'", 'Cread@');
        return redirect()->route('students.create');

    }

    public function edit($id){
        $student = Student::find($id);
        return view('students.edit',compact('student'));
    }

    public function update(Request $request, $id){
        $student = Student::find($id);
        Student::where('id', '=', $id)->update([
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
        
       foreach ($student->student_records as $student_record) {
        $student_record->update([
            'names'                 =>  $student->names,
            'lastnames'             =>  $student->lastnames,
            'identification'        =>  $student->identification,
            'gender'                =>  $student->gender,
            'birthdate'             =>  $student->birthdate,
            'place_of_birth'        =>  $student->place_of_birth,
            'municipality'          =>  $student->municipality,
            'state'                 =>  $student->state,
            'laterality'            =>  $student->laterality,
            'weight'                =>  $student->weight,
            'height'                =>  $student->height,
            'footwear'              =>  $student->footwear,
            'pants'                 =>  $student->pants,
            'shirt'                 =>  $student->shirt,
            'brachial_measure'      =>  $student->brachial_measure,
            'birth_order'           =>  $student->birth_order,
            'disease'               =>  $student->disease,
            'email'                 =>  $student->email,
            'school_background'     =>  $student->school_background,
            'state_actual'          =>  $student->state_actual,
            'municipality_actual'   =>  $student->municipality_actual,
            'parish_actual'         =>  $student->parish_actual,
            'sector'                =>  $student->sector,
            'reference_point'       =>  $student->reference_point,
            'student_live_with'     =>  $student->student_live_with,
        ]);
       }
       notify()->success('Ha sido actualizad@ el/la estudiante ' . "'$student->names $student->lastnames'", 'Actualizad@');
        return redirect()->route('students.index',compact('student'));

    }

    public function show($id){
        $student = Student::find($id);
        return view('students.show',compact('student'));
    }
    public function destroy($id){

        $student = Student::find($id);
        $student->delete();
        notify()->success('Ha sido eliminad@ el/la estudiante ' . "'$student->names $student->lastnames'", 'Eliminad@');
        return back();
    }

}
