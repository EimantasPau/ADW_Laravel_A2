<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();


        for($i = 0; $i<250; $i++){
            $order = Order::create([
                'user_id' => $faker->numberBetween(1, 100),
                'total_price' => $faker->randomFloat(2, 300, 7000),
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'name' => $faker->name(),
                'street' => $faker->streetName(),
                'city' => $faker->city(),
                'postcode' => $faker->postcode(),
                'country' => $faker->country()
            ]);
            $product = \App\Product::findOrFail($faker->numberBetween(1, 700));
            $order->products()->attach($product, ['line_quantity' => 1]);

        }
    }
}
