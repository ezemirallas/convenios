<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ResponsableFactory extends Factory
{
    public function definition(): array
    {
        return [
            'apellido' => $this->faker->firstName(),
            'nombre' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
