<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearSchool extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function subjects(){
        return  $this->hasMany(Subject::class);
    }

    public function student_records(){
        return $this->hasMany(StudentRecord::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }

    public function academic_periods(){
        return $this->belongsToMany(AcademicPeriod::class, 'period_years','academic_period_id','year_id');
    }
}
