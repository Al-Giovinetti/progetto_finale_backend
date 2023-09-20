<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Musician;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $musicians = Musician::all();
        foreach($musicians as $musician){
            for($i = 0; $i < 10; $i++){
            $newReview = new Review();
            $newReview -> musician_id = $musician->user_id;
            $newReview -> content = $faker->text();
            $newReview -> vote = $faker->numberBetween(0, 5);
            $newReview -> save();
            }
        }
    }
}
