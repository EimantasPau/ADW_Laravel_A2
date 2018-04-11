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

        for($i = 0; $i<1425; $i++){
            DB::table('products')->insert([
                'name' => $faker->sentence(2, true),
                'description' => $faker->sentences(3, true),
                'price' => $faker->randomFloat(2, $min = 100, $max = 3000),
                'quantity' => $faker->numberBetween(0, 20),
                'category_id' => $faker->numberBetween(2,4),
                'image_path' => "products/6P8FRFl239pyl4KUBX5Z1gJ2bMOnIPANeXUcWiqD.png",
                'created_at' => $faker->dateTimeBetween('-1 month', 'now')
            ]);
        }
    }
}
