<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\MusicianSponsor;


class MusicianSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $sponsors = Sponsor::all();
        foreach($sponsors as $sponsor){
            $newSponsored = new MusicianSponsor;
            $newSponsored->sponsor_start=$faker->time();
            $newSponsored->sponsor_start=$faker->dateTimeBetween('');
        }
    }
}
