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
            'name' => '1ero',
        ]);

        YearSchool::create([
            'name' => '2do',
        ]);

        YearSchool::create([
            'name' => '3ro',
        ]);

        YearSchool::create([
            'name' => '4to',
        ]);

        YearSchool::create([
            'name' => '5to',
        ]);
    }
}
