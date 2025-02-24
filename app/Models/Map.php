<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    /** @use HasFactory<\Database\Factories\MapFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'note',
        'comment',
        'coord_id',
    ];

    public function coord()
    {
        return $this->belongsTo(Coord::class, 'coord_id', 'id');
    }
}
