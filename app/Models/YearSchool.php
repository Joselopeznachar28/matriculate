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
}
