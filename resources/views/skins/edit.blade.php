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
<x-nav />
    <h1>{{__('messages.editarskin')}}</h1>

    <form action="{{ route('skins.update', $skin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">{{__('messages.nombreskin')}}</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $skin->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="tipo">{{__('messages.tiposkin')}}</label>
            <select name="tipo" id="tipo" class="form-control" required>
                <option value="Común" {{ $skin->tipo == 'Común' ? 'selected' : '' }}>{{__('messages.comun')}}</option>
                <option value="Épica" {{ $skin->tipo == 'Épica' ? 'selected' : '' }}>{{__('messages.epica')}}</option>
                <option value="Legendaria" {{ $skin->tipo == 'Legendaria' ? 'selected' : '' }}>{{__('messages.legendaria')}}</option>
            </select>
        </div>

        <div class="form-group">
            <label for="precio">{{__('messages.precio')}}</label>
            <input type="number" name="precio" id="precio" class="form-control" value="{{ old('precio', $skin->precio) }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="personaje_id">{{__('messages.personaje')}}</label>
            <select name="personaje_id" id="personaje_id" class="form-control" required>
                @foreach ($personajes as $personaje)
                    <option value="{{ $personaje->id }}" {{ $skin->personaje_id == $personaje->id ? 'selected' : '' }}>
                        {{ $personaje->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" onclick="return confirm({{__('messages.mensajeconfirmacion')}}) class="btn btn-success mt-3">{{__('messages.actualizarskin')}}</button>
    </form>
<x-footer />
