<?php

// database/factories/SkinFactory.php

namespace Database\Factories;

use App\Models\Skin;
use App\Models\Personaje;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkinFactory extends Factory
{
    protected $model = Skin::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'tipo' => $this->faker->randomElement(['Común', 'Épica', 'Legendaria']),
            'precio' => $this->faker->randomNumber(2),
            'personaje_id' => Personaje::factory(),
        ];
    }
}
