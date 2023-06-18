<?php

namespace Database\Seeders;

use App\Models\YearSchool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        YearSchool::create([
            'year' => '1ero',
        ]);

        YearSchool::create([
            'year' => '2do',
        ]);

        YearSchool::create([
            'year' => '3ro',
        ]);

        YearSchool::create([
            'year' => '4to',
        ]);

        YearSchool::create([
            'year' => '5to',
        ]);
    }
}
