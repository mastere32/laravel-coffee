<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coord extends Model
{
    /** @use HasFactory<\Database\Factories\CoordFactory> */
    use HasFactory;

    protected $fillable = [
        'latitude',
        'longitude',
        'altitude',
    ];
}
