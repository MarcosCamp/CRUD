
    <h1>Editar Personaje: {{ $personaje->nombre }}</h1>

    <form action="{{ route('personajes.update', $personaje->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre del Personaje</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $personaje->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="vida">Vida</label>
            <input type="number" name="vida" id="vida" class="form-control" value="{{ old('vida', $personaje->vida) }}" required>
        </div>

        <div class="form-group">
            <label for="danio">Daño</label>
            <input type="number" name="danio" id="danio" class="form-control" value="{{ old('danio', $personaje->danio) }}" required>
        </div>

        <div class="form-group">
            <label for="hipercarga">¿Hipercarga?</label>
            <select name="hipercarga" id="hipercarga" class="form-control" required>
                <option value="Sí" {{ $personaje->hipercarga == 'Sí' ? 'selected' : '' }}>Sí</option>
                <option value="No" {{ $personaje->hipercarga == 'No' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Actualizar Personaje</button>
    </form>
