
    <div class="container">
        <h1>Personajes</h1>
        <a href="{{ route('personajes.create') }}" class="btn btn-primary mb-3">Crear Personaje</a>
        <table class="table">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Vida</th>
                <th>Daño</th>
                <th>Hipercarga</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($personajes as $personaje)
                <tr>
                    <td>{{ $personaje->nombre }}</td>
                    <td>{{ $personaje->vida }}</td>
                    <td>{{ $personaje->danio }}</td>
                    <td>{{ $personaje->hipercarga }}</td>
                    <td>
                        <a href="{{ route('personajes.edit', $personaje) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('personajes.destroy', $personaje) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @foreach($personaje->skins as $skin)
                    <tr>
                        <td>{{ $skin->nombre }}</td>
                        <td>{{ $skin->tipo }}</td>
                        <td>{{ $skin->precio }}</td>
                        <td>{{ $personaje->nombre }}</td>
                        <td>
                            <a href="{{ route('skins.edit', $skin) }}" class="btn btn-warning btn-sm">Editar Skin</a>
                            <form action="{{ route('skins.destroy', $skin) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar Skin</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>

