<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\coord>
 */
class CoordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'altitude' => $this->faker->numberBetween(0, 100),
        ];
    }
}
