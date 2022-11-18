<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategoryLevel;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert level respect cat_id and showing this data as a tree
        DB::table('category_levels')->insert(
            array(
                [ 'level' => '1','category_id'=>Category::all()->random()->id],
                [ 'level' => '2','category_id'=>Category::all()->random()->id],
                [ 'level' => '3','category_id'=>Category::all()->random()->id],
                [ 'level' => '4','category_id'=>Category::all()->random()->id],
                [ 'level' => '5','category_id'=>Category::all()->random()->id],
                [ 'level' => '6','category_id'=>Category::all()->random()->id],
                [ 'level' => '7','category_id'=>Category::all()->random()->id],
                [ 'level' => '8','category_id'=>Category::all()->random()->id]
            )
        );
      
    }
}
