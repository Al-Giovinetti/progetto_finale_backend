<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;


    public function musicians()
    {
        return $this->belongsToMany(Musician::class)->withPivot('data_inizio', 'data_fine');
    }
}
