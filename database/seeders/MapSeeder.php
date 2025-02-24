<?php

namespace Database\Seeders;

use App\Models\Coord;
use App\Models\Map;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Map::factory()->count(100)->create()->each(function ($map) {
            if (rand(0, 1) > 0.5) {
                $coord = Coord::factory()->create();
                $map->coord_id = $coord->id;
                $map->save();
            }
            return $map;
        });
    }
}
