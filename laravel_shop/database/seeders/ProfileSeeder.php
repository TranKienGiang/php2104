<?php

namespace Database\Seeders;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
                'user_id' => $user->id,
                'phone' => 123,
                'address' => $faker->address,
                'age' => rand(18, 25),
                'sex' => rand(0, 1),
            ];
        }

        Profile::insert($data);
    }
}
