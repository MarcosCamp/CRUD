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
            'nombre' =>$this->faker->randomElement([
                "Shelly", "Colt", "Dynamike", "Bo", "El Primo", "Bull", "Nita", "Jessie", "Piper", "Pam",
                "Tara", "Darryl", "Genio", "Carl", "Mr. P", "Jacky", "Sprout", "Gale", "Rosa", "Bibi",
                "Tick", "8-Bit", "Sandy", "Emz", "Bea", "Max", "Penny", "Frank", "Leon", "Spike", "Cuervo",
                "Kit", "Cordelius", "Draco", "Edgar", "Oleada", "Fang", "Buzz", "Squeak", "Griff", "Lola",
                "Meg", "Ash", "Ruffs", "Grom", "Stu", "Belle", "Brock", "Barley", "Nani", "Surge", "Colette",
                "Amber", "Lou", "Byron"
            ]),

        'vida' => $this->faker->numberBetween(2000, 5000),
            'danio' => $this->faker->numberBetween(100, 1000),
            'hipercarga' => $this->faker->randomElement(['si', 'no']),
        ];
    }
}
