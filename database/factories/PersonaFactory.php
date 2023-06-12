<?php

namespace Database\Factories;

use App\Models\Tipo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'cuit' => '20'.$this->faker->numerify('########').$this->faker->regexify('[0-9]{1}'),
            'domicilio' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            'tipo_id' => Tipo::all()->random()->id
        ];
    }
}
