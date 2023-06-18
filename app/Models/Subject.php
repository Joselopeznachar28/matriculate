<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function teachers(){
        return  $this->belongsToMany(Teacher::class, 'subject_teachers','teacher_id','subject_id');
    }

    public function years(){
        return  $this->belongsToMany(YearSchool::class, 'subject_years','subject_id','year_id');
    }

    public function sections(){
        return  $this->belongsToMany(Section::class,'section_subjects','section_id','subject_id');
    }

}
