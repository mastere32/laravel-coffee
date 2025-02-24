<?php

namespace Database\Seeders;

use App\Models\Coord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coord::factory()->count(1)->create();
    }
}
