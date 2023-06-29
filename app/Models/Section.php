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
        'subject_id',
    ];

    public function subject(){
        return  $this->belongsTo(Subject::class);
    }

    public function teachers(){
        return  $this->belongsToMany(Teacher::class,'section_teachers','teacher_id','section_id');
    }

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
        return  $this->belongsToMany(StudentRecord::class,'section_student_records','section_id','student_record_id');
    }

}
