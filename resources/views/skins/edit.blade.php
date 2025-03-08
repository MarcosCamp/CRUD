
    <h1>Editar Skin</h1>

    <form action="{{ route('skins.update', $skin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre de la Skin</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $skin->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo de Skin</label>
            <select name="tipo" id="tipo" class="form-control" required>
                <option value="Común" {{ $skin->tipo == 'Común' ? 'selected' : '' }}>Común</option>
                <option value="Épica" {{ $skin->tipo == 'Épica' ? 'selected' : '' }}>Épica</option>
                <option value="Legendaria" {{ $skin->tipo == 'Legendaria' ? 'selected' : '' }}>Legendaria</option>
            </select>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" value="{{ old('precio', $skin->precio) }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="personaje_id">Personaje</label>
            <select name="personaje_id" id="personaje_id" class="form-control" required>
                @foreach ($personajes as $personaje)
                    <option value="{{ $personaje->id }}" {{ $skin->personaje_id == $personaje->id ? 'selected' : '' }}>
                        {{ $personaje->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Actualizar Skin</button>
    </form>

