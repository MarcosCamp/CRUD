<?php

namespace App\Http\Controllers;

use App\Models\Personaje;
use App\Models\Skin;
use Illuminate\Http\Request;

class PersonajeController extends Controller
{
    public function index()
    {
        $personajes = Personaje::with('skins')->get();
        return view('personajes.index', compact('personajes'));
    }

    public function create()
    {
        return view('personajes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'vida' => 'required|integer',
            'danio' => 'required|integer',
            'hipercarga' => 'required|in:si,no',
        ]);

        Personaje::create($request->all());
        return redirect()->route('personajes.index');
    }

    public function edit(Personaje $personaje)
    {
        return view('personajes.edit', compact('personaje'));
    }

    // Actualizar los datos del personaje
    public function update(Request $request, Personaje $personaje)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'vida' => 'required|numeric|min:0',
            'danio' => 'required|numeric|min:0',
            'hipercarga' => 'required|in:Sí,No',
        ]);

        // Actualizar los datos del personaje
        $personaje->update([
            'nombre' => $request->nombre,
            'vida' => $request->vida,
            'danio' => $request->danio,
            'hipercarga' => $request->hipercarga,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('personajes.index')->with('success', 'Personaje actualizado correctamente');
    }

    public function destroy(Personaje $personaje)
    {
        $personaje->delete();
        return redirect()->route('personajes.index');
    }
}
