<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('tr_TR');
        for ($i = 0; $i <= 199; $i++) {
            User::query()->create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($faker->password)
            ]);
        }
    }
}
