<?php

namespace Database\Seeders;

use App\Models\MusicalInstrument;
use App\Models\Musician;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MusicalInstrumentMusicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $musiciansIds = Musician::all()->pluck('user_id');
        $instruments = MusicalInstrument::all();

        foreach ($instruments as $instrument) {
            $instrument->musicians()->sync([$faker->randomElement($musiciansIds), $faker->randomElement($musiciansIds)]);
        }
    }
}
