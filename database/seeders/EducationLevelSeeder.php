<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $primary = [];

        for ($i = 1; $i <= 8; $i++) {
            $primary[] = 'Grade ' . $i;
        }

        $secondary = [];

        for ($i = 9; $i <= 11; $i++) {
            $secondary[] = 'Grade ' . $i;
        }
        $secondary[] = 'Grade 12 / High School';

        $undergraduate = [
            "1-Year Post-Secondary Certificate",
            "2-Year Undergraduate Diploma",
            "3-Year Undergraduate Advanced Diploma",
            "3-Year Bachelors Degree",
            "4-Year Bachelors Degree"
        ];

        $postgraduate = [
            "1-Year Postgraduate Certificate / Diploma",
            "Master Degree",
            "Doctoral Degree(Phd, M.D"
        ];

        $categories = [
            "1" => $primary,
            "2" => $secondary,
            "3" => $undergraduate,
            "4" => $postgraduate
        ];

        foreach ($categories as $category_id => $category) {

            foreach ($category as $value) {

                DB::table('level_of_educations')->insert([
                    "level_name" => $value,
                    "category_id" => $category_id
                ]);
            }
        }
    }
}
