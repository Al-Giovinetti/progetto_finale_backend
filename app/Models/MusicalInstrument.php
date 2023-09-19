<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicalInstrument extends Model
{
    use HasFactory;

    public function musicians()
    {
        return $this->belongsToMany(Musician::class, 'musical_instrument_musician' , 'musical_instrument_id', 'musician_id');
    }
}
