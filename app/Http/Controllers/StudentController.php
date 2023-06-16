<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class StudentController extends Controller
{
    public function index(){
        $students = Student::orderBy('inscription_number','asc')->get();
        return view('students.index',compact('students'));
    }

    public function create(){
        return view('students.create');
    }

    public function store(Request $request){

        $student = Student::create([
            'names'                 =>  $request->names,
            'lastnames'             =>  $request->lastnames,
            'type_student'          =>  $request->type_student,
            'inscription_number'    =>  $request->inscription_number,
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
            'repeat_with'           =>  $request->repeat_with,
            'pending_matter'        =>  $request->pending_matter,
            'school_background'     =>  $request->school_background,
            'state_actual'          =>  $request->state_actual,
            'municipality_actual'   =>  $request->municipality_actual,
            'parish_actual'         =>  $request->parish_actual,
            'sector'                =>  $request->sector,
            'reference_point'       =>  $request->reference_point,
            'pattern_names'         =>  $request->pattern_names,
            'pattern_lastnames'     =>  $request->pattern_lastnames,
            'pattern_identification'=>  $request->pattern_identification,
            'pattern_state_of_birth'=>  $request->pattern_state_of_birth,
            'pattern_birthdate'     =>  $request->pattern_birthdate,
            'pattern_place_of_birth'=>  $request->pattern_place_of_birth,
            'pattern_gender'        =>  $request->pattern_gender,
            'pattern_civil_status'  =>  $request->pattern_civil_status,
            'pattern_affinity'      =>  $request->pattern_affinity,
            'pattern_profession'    =>  $request->pattern_profession,
            'pattern_phone'         =>  $request->pattern_phone,
            'student_live_with'     =>  $request->student_live_with,
            'inscription_date'      =>  $request->inscription_date,
            'registration_made_by'  =>  $request->registration_made_by,
            'observation'           =>  $request->observation,
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
            'type_student'          =>  $request->type_student,
            'inscription_number'    =>  $request->inscription_number,
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
            'repeat_with'           =>  $request->repeat_with,
            'pending_matter'        =>  $request->pending_matter,
            'school_background'     =>  $request->school_background,
            'state_actual'          =>  $request->state_actual,
            'municipality_actual'   =>  $request->municipality_actual,
            'parish_actual'         =>  $request->parish_actual,
            'sector'                =>  $request->sector,
            'reference_point'       =>  $request->reference_point,
            'pattern_names'         =>  $request->pattern_names,
            'pattern_lastnames'     =>  $request->pattern_lastnames,
            'pattern_identification'=>  $request->pattern_identification,
            'pattern_state_of_birth'=>  $request->pattern_state_of_birth,
            'pattern_birthdate'     =>  $request->pattern_birthdate,
            'pattern_place_of_birth'=>  $request->pattern_place_of_birth,
            'pattern_gender'        =>  $request->pattern_gender,
            'pattern_civil_status'  =>  $request->pattern_civil_status,
            'pattern_affinity'      =>  $request->pattern_affinity,
            'pattern_profession'    =>  $request->pattern_profession,
            'pattern_phone'         =>  $request->pattern_phone,
            'student_live_with'     =>  $request->student_live_with,
            'inscription_date'      =>  $request->inscription_date,
            'registration_made_by'  =>  $request->registration_made_by,
            'observation'           =>  $request->observation,
        ]);

        return redirect()->route('students.index',compact('student'));

    }

    public function destroy($id){

        $student = Student::find($id);
        $student->delete();

        return back();
    }

    public function proof_of_study($id){
        $student = Student::find($id);
        $date = Carbon::createFromDate($student->birthdate)->age;
        $pdf = PDF::loadView('students.proof_of_study', compact('student','date'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream();
    }

    public function proof_of_registration($id){
        $student = Student::find($id);
        $pdf = PDF::loadView('students.proof_of_registration', compact('student'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream();
    }

}
