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
        $personajes = Personaje::all();
        return view('skins.edit', compact('skin', 'personajes'));
    }

    public function update(Request $request, Skin $skin)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo' => 'required',
            'precio' => 'required|numeric',
            'personaje_id' => 'required|exists:personajes,id',
        ]);

        $skin->update($request->all());
        return redirect()->route('personajes.index');
    }

    public function destroy(Skin $skin)
    {
        $skin->delete();
        return redirect()->route('personajes.index');
    }
}
