<?php

namespace App\Http\Controllers;

use App\Models\Skin;
use App\Models\Personaje;
use Illuminate\Http\Request;

class SkinController extends Controller
{
    public function create()
    {
        $personajes = Personaje::all();
        return view('skins.create', compact('personajes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'precio' => 'required|numeric',
            'personaje_id' => 'required|exists:personajes,id',
        ]);

        Skin::create($request->all());
        return redirect()->route('personajes.index');
    }

    public function edit(Skin $skin)
    {
        // Pasamos la skin y los personajes disponibles a la vista
        $personajes = Personaje::all();
        return view('skins.edit', compact('skin', 'personajes'));
    }

    // Actualizar una skin en la base de datos
    public function update(Request $request, Skin $skin)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'required|in:Común,Épica,Legendaria',
            'precio' => 'required|numeric|min:0',
            'personaje_id' => 'required|exists:personajes,id',
        ]);

        // Actualizar la skin
        $skin->update([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
            'precio' => $request->precio,
            'personaje_id' => $request->personaje_id,
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('personajes.index')->with('success', 'Skin actualizada correctamente');
    }



    public function destroy(Skin $skin)
    {
        // Eliminar la skin
        $skin->delete();

        // Redirigir a la vista principal con un mensaje de éxito
        return redirect()->route('personajes.index')->with('success', 'Skin eliminada correctamente');
    }
}
