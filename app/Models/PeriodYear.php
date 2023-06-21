<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'academic_period_id',
        'year_id',
    ];
}
