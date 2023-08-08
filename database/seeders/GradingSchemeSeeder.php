<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradingSchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $schemes = [
            "Letter Grade: Fail - Outstanding",
            "Letter Grade: F to AA / A+",
            "Letter Grade Scale: F - O",
            "Letter Grade Division/Class",
            "Higher Education Grade Point 10 Scale",
            "Higher Education Percentage Scale 0-100",
            "Higher Education (Degree) Division Scale",
            "Hingher Education (Bachelor and Above) Percentage Scale 0-100",
            "Hingher Education (Bachelor and Above) Grade Point 10 Scale"
        ];

        foreach($schemes as $scheme){

            DB::table('grading_schemes')->insert([
                'scheme' => $scheme,
            ]);
        }

    }
}      