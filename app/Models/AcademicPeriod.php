<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicPeriod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'init',
        'end',
    ];

    public function year_schools(){
        return $this->belongsToMany(YearSchool::class, 'period_years','academic_period_id', 'year_id');
    }

    public function lapsos(){
        return $this->hasMany(LapsoSchool::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }
}
