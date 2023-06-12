<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Category;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContratoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'objeto' => $this->faker->name(),
            'fechainicio' => $this->faker->date(),
            'fechafinalizacion' => $this->faker->date(),
            'observacion' => $this->faker->sentence(),
            'renovacionautomatica' => $this->faker->numberBetween(0, 1),
            'numeroresolucion' => $this->faker->randomNumber(5, true),
            'anioresolucion' => 2023,
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'areageneradora_id' => Area::all()->random()->id,
            'arearesponsable_id' => Area::all()->random()->id,
            'parte_id' => Persona::find(1)->id,
        ];
    }
}
