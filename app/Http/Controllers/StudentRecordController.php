<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRecordsRequest;
use App\Models\AcademicPeriod;
use App\Models\Note;
use App\Models\Section;
use App\Models\Student;
use App\Models\StudentRecord;
use App\Models\YearSchool;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class StudentRecordController extends Controller
{

    public function index(){
        $student_records = StudentRecord::orderBy('inscription_number','asc')->get();
        return view('students.records.index',compact('student_records'));
    }

    public function create($id){
        $student = Student::find($id);
        $year_schools = YearSchool::with('sections')->get();
        return view('students.records.create',compact('year_schools','student'));
    }

    public function store(StudentRecordsRequest $request){
        $student_record = StudentRecord::create([
            'year_school_id'        =>  $request->year_school_id,
            'student_id'            =>  $request->student_id,
            'section_id'            =>  $request->section_id,
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
        notify()->success('Ha sido guardada la ficha del estudiante ' . "'$student_record->names $student_record->lastnames'", 'Guardada');
        return redirect()->route('student_records.index');

    }

    public function edit($id){
        $student_record = StudentRecord::find($id);
        $year_schools = YearSchool::with('sections')->get();
        return view('students.records.edit',compact('student_record','year_schools'));
    }

    public function update(Request $request, $id){

        $student_record = StudentRecord::find($id);

        $student_record = StudentRecord::where('id', '=', $id)->update([
            'year_school_id'        =>  $request->year_school_id,
            'section_id'            =>  $request->section_id,
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

        notify()->success('Ha sido actualizada la ficha del estudiante ' . "'$student_record->names $student_record->lastnames'", 'Actualizada');
        return redirect()->route('student_records.index');

    }

    public function show($id){
        $student_record = StudentRecord::find($id);
        $section = Section::find($student_record->section_id);
        return view('students.records.show',compact('student_record','section'));
    }
    
    public function destroy($id){

        $student_record = StudentRecord::find($id);
        $student_record->delete();

        return back();
    }

    public function proof_of_study($id){
        
        $academic_period = AcademicPeriod::all()->last();
        $student = Student::find($id);
        $date = Carbon::createFromDate($student->birthdate)->age;

        $pdf = PDF::loadView('students.records.proof_of_study', compact('student','date','academic_period'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->stream();
        
    }

    public function proof_of_registration($id){

        $student_record = StudentRecord::find($id);
        $pdf = PDF::loadView('students.records.proof_of_registration', compact('student_record'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->stream();

    }

    public function bulletin($id){
        $student_record = StudentRecord::find($id)->with('year_school.subjects.notes')->get();
        // dd($student_record);
        $pdf = PDF::loadView('students.records.bulletin', compact('student_record'))->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->stream();
    }
}
