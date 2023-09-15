<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Sponsor;
use App\Models\Musician;
use App\Models\MusicianSponsor;



class MusicianSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $sponsors = Sponsor::all();
        $musicians = Musician::all()->pluck('user_id');

        foreach ($sponsors as $sponsor) {
            $sponsor->musicians()->sync([$faker->randomElement($musicians)]);

        }



    }
}
