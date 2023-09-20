<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Message;
use App\Models\Musician;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $musicians= Musician::all();
        foreach($musicians as $musician){
            for($i = 0; $i < 10; $i++){
            $newMessage = new Message();
            $newMessage->musician_id = $musician->user_id;
            $newMessage->name=$faker->name();
            $newMessage->mail=$faker->email();
            $newMessage->message= $faker->text();
            $newMessage->save();
            }
        }



    }
}
