<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'year_school_id',
    ];

    public function year_school(){
        return  $this->belongsTo(YearSchool::class);
    }

    public function teachers(){
        return  $this->belongsToMany(Teacher::class, 'subject_teachers','teacher_id','subject_id');
    }
    
    public function sections(){
        return  $this->hasMany(Section::class);
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }

}
