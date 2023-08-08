<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesEducationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = ["Primary","Secondary","Undergraduate","Postgraduate"];
        
        foreach($categories as $category){

            DB::table('categories_of_educations')->insert([
                'name' => $category,
            ]);
        }
        
    }
}
