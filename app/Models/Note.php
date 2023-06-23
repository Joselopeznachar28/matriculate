<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'note',
        'type_note',
        'student_id',
        'subject_id',
        'lapso_id',
        'section_id',
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function subject(){
        return $this->belongsTo(Student::class);
    }
    public function lapso_school(){
        return $this->belongsTo(Student::class);
    }
    public function section(){
        return $this->belongsTo(Student::class);
    }
}
