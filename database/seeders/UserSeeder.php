<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        for ($i = 0; $i < 99; $i++){
            User::query()->create([
                'name' => $faker->city,
                'email' => $faker->email,
                'password' => Hash::make('123456'),
            ]);
        }
    }
}
