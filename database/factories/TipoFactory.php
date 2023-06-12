<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TipoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word(20),
            'slug' => $this->faker->unique()->word(20),
        ];
    }
}
