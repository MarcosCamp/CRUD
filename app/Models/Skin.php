<?php
// app/Models/Skin.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skin extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'tipo', 'precio', 'personaje_id'];

    public function personaje()
    {
        return $this->belongsTo(Personaje::class);
    }
}
