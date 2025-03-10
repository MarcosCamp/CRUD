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

    <h1>{{__('messages.editarpersonaje')}}: {{ $personaje->nombre }}</h1>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('personajes.update', $personaje->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">{{__('messages.nombrepersonaje')}}</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $personaje->nombre) }}" >
        </div>

        <div class="form-group">
            <label for="vida">Vida</label>
            <input type="number" name="vida" id="vida" class="form-control" value="{{ old('vida', $personaje->vida) }}" >
        </div>

        <div class="form-group">
            <label for="danio">Daño</label>
            <input type="number" name="danio" id="danio" class="form-control" value="{{ old('danio', $personaje->danio) }}" >
        </div>

        <div class="form-group">
            <label for="hipercarga">¿{{__('messages.hipercarga')}}?</label>
            <select name="hipercarga" id="hipercarga" class="form-control" >
                <option value="Sí" {{ $personaje->hipercarga == 'Sí' ? 'selected' : '' }}>{{__('messages.si')}}</option>
                <option value="No" {{ $personaje->hipercarga == 'No' ? 'selected' : '' }}>{{__('messages.no')}}</option>
            </select>
        </div>

        <button type="submit" onclick="return confirm('{{__('messages.mensajeconfirmacion')}}') "class="btn btn-success mt-3">{{__('messages.actualizarpersonaje')}}</button>
    </form>
<x-footer />

