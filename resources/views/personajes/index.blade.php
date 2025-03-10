
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

    table {
        width: 100%;
        margin: 20px 0;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 20px;
        text-align: left;
        font-size: 18px; /* Tamaño de texto más grande */
        font-weight: 600; /* Texto más gordo */
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #d2691e; /* Títulos en color marrón anaranjado */
        color: white;
        font-size: 22px; /* Títulos más grandes */
    }

    tr:nth-child(even) {
        background-color: #fafad2; /* Fondo crema claro para filas pares */
    }

    tr:nth-child(odd) {
        background-color: #fafad2; /* Fondo más oscuro para filas impares */
    }

    tr:hover {
        background-color: #e0d9b5; /* Fondo ligeramente más oscuro para hover */
    }

    .btn {
        display: inline-block;
        padding: 12px 24px;
        margin: 10px;
        border-radius: 8px;
        text-decoration: none;
        color: white;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 18px; /* Botones con texto más grande */
    }

    a{
        background-color: #ffa500; /* Botón de editar en naranja */
        transform:scale(1.10);

    }

    a:hover {
        background-color: #e67e22; /* Naranja más oscuro en hover */
        transform:scale(1.10);

    }

    .btn-danger {
        background-color: #5c4033; /* Botón de eliminar en marrón oscuro */
    }

    .btn-danger:hover {
        background-color: #4b2e24; /* Marrón más oscuro en hover */
    }

    .inline {
        display: inline;
    }

</style>
<x-nav />
    <h1>{{__('messages.personajesysusskins')}}</h1>

    <a href="{{ route('personajes.create') }}" class="btn btn-primary">{{__('messages.crearpersonaje')}}</a>
<a href="{{ route('skins.create') }}" class="btn btn-warning">{{__('messages.crearskin')}}</a> <!-- Botón para Crear Skin -->
    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table mt-4">
        <thead>
        <tr>
            <th>{{__('messages.nombre')}}</th>
            <th>{{__('messages.vida')}}</th>
            <th>{{__('messages.danio')}}</th>
            <th>{{__('messages.hipercarga')}}</th>
            <th>{{__('messages.skins')}}</th>
            <th>{{__('messages.acciones')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($personajes as $personaje)
            <tr>
                <td>{{ $personaje->nombre }}</td>
                <td>{{ $personaje->vida }}</td>
                <td>{{ $personaje->danio }}</td>
                <td>{{ $personaje->hipercarga }}</td>

                <!-- Aquí mostramos las skins asociadas -->
                <td>
                    @if($personaje->skins->isEmpty())
                        <p>{{__('messages.noskins')}}</p>
                    @else
                        <ul>
                            @foreach ($personaje->skins as $skin)
                                <li>
                                    <strong>{{__('messages.nombre')}}:</strong> {{ $skin->nombre }} <br>
                                    <strong>{{__('messages.tipo')}}:</strong> {{ $skin->tipo }} <br>
                                    <strong>{{__('messages.precio')}}:</strong> ${{ number_format($skin->precio, 2) }} <br>

                                    <!-- Botón de editar -->
                                    <a href="{{ route('skins.edit', $skin->id) }}" class="btn btn-warning btn-sm">{{__('messages.editarskin')}}</a>

                                    <!-- Formulario para eliminar la skin -->
                                    <form action="{{ route('skins.destroy', $skin->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm({{__('messages.mensajeconfirmacioneliminar')}})">{{__('messages.eliminar')}}</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>

                <!-- Acciones para editar y eliminar -->
                <td>
                    <a href="{{ route('personajes.edit', $personaje->id) }}" class="btn btn-warning">{{__('messages.editar')}}</a>
                    <form action="{{ route('personajes.destroy', $personaje->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm({{__('messages.mensajeconfirmacioneliminar')}})">{{__('messages.eliminar')}}</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
<x-footer />
