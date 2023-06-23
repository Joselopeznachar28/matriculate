<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LapsoSchool extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'init',
        'end',
        'academic_period_id',
        'upload_note',
    ];

    public function academic_periods(){
        return $this->belongsTo(AcademicPeriod::class);
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }

}
