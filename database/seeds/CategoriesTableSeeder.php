<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['name'=>'Hardware']);
        DB::table('categories')->insert(['name'=>'Software']);
        DB::table('categories')->insert(['name'=>'Accessories']);
    }
}
