<?php
// app/Models/Personaje.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'vida', 'danio', 'hipercarga'];

    public function skins()
    {
        return $this->hasMany(Skin::class);
    }
}
