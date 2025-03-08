<style>
    /* Estilos generales */
    body {
        background-color: #f5f5dc; /* Fondo crema */
        font-family: 'Arial', sans-serif;
        color: #6f4f28; /* Texto marrón */
    }

    h1 {
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
        color: #6f4f28; /* Título en marrón */
    }

    .container {
        margin-top: 50px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        background-color: #fff;
        color: #6f4f28;
    }

    button {
        display: inline-block;
        padding: 12px 24px;
        margin: 5px;
        border-radius: 8px;
        text-decoration: none;
        color: white;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 18px; /* Botones con texto más grande */
    }
    button {
        background-color: #ffa500; /* Naranja */
    }

    button:hover {
        background-color: #e67e22; /* Naranja más oscuro */
    }
</style>
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
