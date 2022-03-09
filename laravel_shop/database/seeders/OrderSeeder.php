<?php

namespace Database\Seeders;
use App\Models\Profile;
use App\Models\User;
use App\Models\Order;

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::truncate();
        $users = User::all();

        $data = [];

        $faker = \Faker\Factory::create();

        foreach ($users as $user) {
            $data[] = [
                'name' => $faker->name,
                'user_id' => $user->id,
                'phone' => $faker->regexify('09[0-9]{9}'),
                'total_price' => rand(18, 25),
                'address' => $faker->city,
                'code' => $faker->text(10),
                'status_order' => $faker->text(20),
            ];
        }

        Order::insert($data);
    }
}
