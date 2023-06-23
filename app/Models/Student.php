<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
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
        'school_background',
        'state',
        'state_actual',
        'municipality_actual',
        'parish_actual',
        'sector',
        'municipality',
        'reference_point',
        'student_live_with',
    ];

    public function student_records(){
        return $this->hasMany(StudentRecord::class);
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }
}
