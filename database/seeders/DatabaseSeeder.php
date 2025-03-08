<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        \App\Models\Personaje::factory(10)->create()->each(function ($personaje) {
            // Crear entre 1 y 3 skins por cada personaje
            \App\Models\Skin::factory(rand(1, 3))->create([
                'personaje_id' => $personaje->id, ]);
        });
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
