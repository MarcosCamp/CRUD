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
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
@endif
    <div class="container">
        <h1>{{__('messages.crearPersonaje')}}</h1>
        <form action="{{ route('personajes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">{{__('messages.nombre')}}</label>
                <input type="text" class="form-control" id="nombre" name="nombre" >
            </div>
            <div class="mb-3">
                <label for="vida" class="form-label">{{__('messages.vida')}}</label>
                <input type="number" class="form-control" id="vida" name="vida" >
            </div>
            <div class="mb-3">
                <label for="danio" class="form-label">{{__('messages.danio')}}</label>
                <input type="number" class="form-control" id="danio" name="danio" >
            </div>
            <div class="mb-3">
                <label for="hipercarga" class="form-label">{{__('messages.hipercarga')}}</label>
                <select class="form-control" id="hipercarga" name="hipercarga" >
                    <option value="si">{{__('messages.si')}}</option>
                    <option value="no">{{__('messages.no')}}</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">{{__('messages.guardar')}}</button>
        </form>
    </div>
<x-footer />
