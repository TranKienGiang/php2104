<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderProduct::truncate();
        $orders = Order::all();

        $data = [];

        $faker = \Faker\Factory::create();

        $products = Product::all();

        foreach ($orders as $order) {
            $data[] = [
                'order_id' => $order->id,
                'product_id' => $products->random()->id,
                'quantity' => rand(1, 7),
            ];

            $data[] = [
                'order_id' => $order->id,
                'product_id' => $products->random()->id,
                'quantity' => rand(1, 7),
            ];
        }

        OrderProduct::insert($data);
    }
}