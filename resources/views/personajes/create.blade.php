@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Personaje</h1>
        <form action="{{ route('personajes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="vida" class="form-label">Vida</label>
                <input type="number" class="form-control" id="vida" name="vida" required>
            </div>
            <div class="mb-3">
                <label for="danio" class="form-label">Daño</label>
                <input type="number" class="form-control" id="danio" name="danio" required>
            </div>
            <div class="mb-3">
                <label for="hipercarga" class="form-label">Hipercarga</label>
                <select class="form-control" id="hipercarga" name="hipercarga" required>
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
