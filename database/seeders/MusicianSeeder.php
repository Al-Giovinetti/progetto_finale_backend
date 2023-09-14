<?php

namespace Database\Seeders;
use App\Models\Musician;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class MusicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        
        $users = User::all();
        foreach($users as $user){
            $newMusician = new Musician();
            $newMusician->user_id = $user->id;
            $newMusician->birth_date = $faker->date();
            $newMusician->address = $faker->city();
            $newMusician->num_phone = $faker->phoneNumber();
            $newMusician->image = $faker->image();
            $newMusician->bio = $faker->text();
            $newMusician->surname = $faker->lastName();
            $newMusician->cv = $faker->image();
            $newMusician->price = $faker->randomFloat(2, 30, 100);
            $newMusician->musical_genre = $faker->text();
            $newMusician->save();

        }


    }
}
