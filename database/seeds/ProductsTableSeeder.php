<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i<50; $i++){
            DB::table('products')->insert([
                'name' => $faker->sentence(2, true),
                'description' => $faker->sentences(3, true),
                'price' => $faker->numberBetween(100, 2000),
                'quantity' => $faker->numberBetween(0, 20),
                'image_path' => "products/6P8FRFl239pyl4KUBX5Z1gJ2bMOnIPANeXUcWiqD.png"
            ]);
        }
    }
}
