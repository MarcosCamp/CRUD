<?php
// database/factories/PersonajeFactory.php

namespace Database\Factories;

use App\Models\Personaje;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonajeFactory extends Factory
{
    protected $model = Personaje::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'vida' => $this->faker->numberBetween(2000, 5000),
            'danio' => $this->faker->numberBetween(100, 1000),
            'hipercarga' => $this->faker->randomElement(['si', 'no']),
        ];
    }
}
