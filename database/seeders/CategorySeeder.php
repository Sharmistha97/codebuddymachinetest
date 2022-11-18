<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //store cat data
        DB::table('categories')->insert(
            array(
                [ 'name' => 'Category1'],
                [ 'name' => 'Category2'],
                [ 'name' => 'Category3'],
                [ 'name' => 'Category4']
            )
        );
    }
}
