<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $gino = new User();
        $gino->name = 'gino';
        $gino->email = 'g@gmail.com';
        $gino->password = Hash::make('12345');
        $gino->save();


        for($i = 0; $i < 10; $i++){
            $newUser = new User();
            $newUser->name = $faker->firstName();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make($faker->password());
            $newUser->save();
        }
    }
}
