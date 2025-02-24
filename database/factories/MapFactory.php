<?php

namespace Database\Factories;

use App\Models\Coord;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\map>
 */
class MapFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(),
            'url' => $this->faker->url,
            'note' => '',
            'comment' => '',
            'coord_id' => null,
        ];
    }
}
