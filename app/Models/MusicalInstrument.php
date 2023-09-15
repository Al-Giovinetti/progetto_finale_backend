<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicalInstrument extends Model
{
    use HasFactory;

    public function musicians()
    {
        return $this->belongsToMany(Musician::class);
    }
}
