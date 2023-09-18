<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicianSponsor extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_inizio',
        'data_fine',
    ];
}
