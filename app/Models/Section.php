<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter',
        'academic_period_id',
        'year_school_id',
    ];

    // public function teachers(){
    //     return  $this->belongsToMany(Teacher::class,'section_teachers','teacher_id','section_id');
    // }

    // public function subjects(){
    //     return  $this->belongsToMany(Subject::class,'subject_teachers','teacher_id','subject_id','section_id');
    // }

    public function notes(){
        return $this->hasMany(Note::class);
    }

    public function academic_periods(){
        return $this->belongsTo(AcademicPeriod::class);
    }

    public function year_school(){
        return $this->belongsTo(YearSchool::class);
    }
    public function student_records(){
        return  $this->hasMany(StudentRecord::class);
    }

}
