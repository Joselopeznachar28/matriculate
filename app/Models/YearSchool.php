<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearSchool extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
    ];

    public function subjects(){
        return  $this->belongsToMany(Subject::class, 'subject_years','subject_id','year_id');
    }

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function academic_periods(){
        return $this->belongsToMany(AcademicPeriod::class, 'period_years','academic_period_id','year_id');
    }
}
