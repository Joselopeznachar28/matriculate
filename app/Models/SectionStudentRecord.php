<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionStudentRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'lapso_id', //relation
        'section_id',
        'student_record_id',
    ];

    public function lapso(){
        return $this->belongsTo(LapsoSchool::class);
    }

}
