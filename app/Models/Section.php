<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter',
    ];

    public function subjects(){
        return  $this->belongsToMany(Subject::class,'section_subjects','section_id','subject_id');
    }

}
