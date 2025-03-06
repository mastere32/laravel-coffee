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

        $csvFile = file_get_contents(public_path('data/specialty_coffee.csv'));
        $csvArr = str_getcsv($csvFile, "\n", ",", "\n");
        array_shift($csvArr);

        foreach ($csvArr as $line) {
            $exploded = explode(",", $line);
            $map = Map::factory()->create([
                'title' => $exploded[0],
                'url' => $exploded[1],
                'comment' => isset($exploded[5]) ? $exploded[5] : "",
                'note' => isset($exploded[6]) ? $exploded[6] : "",
            ]);
            if (count($exploded) > 3) {
                $coord = Coord::factory()->create([
                    'latitude' => $exploded[2],
                    'longitude' => $exploded[3],
                    'altitude' => $exploded[4],
                ]);
                $coord->save();
                $map->coord_id = $coord->id;
            }
            $map->save();
        }
        if (rand(0, 1) > 0.5) {
            $coord = Coord::factory()->create();
            $map->coord_id = $coord->id;
            $map->save();
        }
        // Map::factory()->count(100)->create()->each(function ($map) {
        //     //count lines from specialty_coffee_csv and generate maps from that, add coordinates when present

        //     if (rand(0, 1) > 0.5) {
        //         $coord = Coord::factory()->create();
        //         $map->coord_id = $coord->id;
        //         $map->save();
        //     }
        //     return $map;
        // });

    }
}
