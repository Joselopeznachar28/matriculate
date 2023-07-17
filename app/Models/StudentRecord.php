<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'year_school_id',
        'student_id',
        'section_id',
        'inscription_number',
        'type_student',
        'names',
        'lastnames',
        'identification',
        'gender',
        'birthdate',
        'place_of_birth',
        'footwear',
        'pants',
        'shirt',
        'brachial_measure',
        'birth_order',
        'laterality',
        'weight',
        'height',
        'disease',
        'email',
        'repeat_with',
        'pending_matter',
        'school_background',
        'state',
        'state_actual',
        'municipality_actual',
        'parish_actual',
        'sector',
        'municipality',
        'reference_point',
        'pattern_names',
        'pattern_lastnames',
        'pattern_birthdate',
        'pattern_place_of_birth',
        'pattern_state_of_birth',
        'pattern_gender',
        'pattern_civil_status',
        'pattern_affinity',
        'pattern_identification',
        'pattern_profession',
        'pattern_phone',
        'student_live_with',
        'inscription_date',
        'registration_made_by',
        'observation',
    ];

    public function year_school(){
        return $this->belongsTo(YearSchool::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }
    
    public function sections(){
        return  $this->belongsTo(Section::class);
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }
}
