<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coord extends Model
{
    /** @use HasFactory<\Database\Factories\CoordFactory> */
    use HasFactory;
    public $altitude_value = null;

    protected $fillable = [
        'latitude',
        'longitude',
        'altitude_value',
    ];

    public function map()
    {
        return $this->hasOne(Map::class);
    }
}
