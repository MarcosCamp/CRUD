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

    public function update(Request $request, Personaje $personaje)
    {
        $request->validate([
            'nombre' => 'required',
            'vida' => 'required|integer',
            'danio' => 'required|integer',
            'hipercarga' => 'required|in:si,no',
        ]);

        $personaje->update($request->all());
        return redirect()->route('personajes.index');
    }

    public function destroy(Personaje $personaje)
    {
        $personaje->delete();
        return redirect()->route('personajes.index');
    }
}
