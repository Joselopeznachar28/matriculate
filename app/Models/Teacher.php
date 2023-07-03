<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'code',
        'identification',
        'email',
    ];

    public function subjects(){
        return  $this->belongsToMany(Subject::class,'subject_teachers','teacher_id','subject_id');
    }

    public function sections(){
        return  $this->belongsToMany(Section::class,'section_teachers','teacher_id','section_id');
    }

    public function user(){
        return  $this->belongsToMany(User::class,'teacher_users','user_id','teacher_id');
    }

}
