
    <h1>Personajes y sus Skins</h1>

    <a href="{{ route('personajes.create') }}" class="btn btn-primary">Crear Personaje</a>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table mt-4">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Vida</th>
            <th>Daño</th>
            <th>Hipercarga</th>
            <th>Skins</th>
            <th>Acciones</th>
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
                        <p>No tiene skins</p>
                    @else
                        <ul>
                            @foreach ($personaje->skins as $skin)
                                <li>
                                    <strong>Nombre:</strong> {{ $skin->nombre }} <br>
                                    <strong>Tipo:</strong> {{ $skin->tipo }} <br>
                                    <strong>Precio:</strong> ${{ number_format($skin->precio, 2) }} <br>

                                    <!-- Botón de editar -->
                                    <a href="{{ route('skins.edit', $skin->id) }}" class="btn btn-warning btn-sm">Editar Skin</a>

                                    <!-- Formulario para eliminar la skin -->
                                    <form action="{{ route('skins.destroy', $skin->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta skin?')">Eliminar Skin</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </td>

                <!-- Acciones para editar y eliminar -->
                <td>
                    <a href="{{ route('personajes.edit', $personaje->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('personajes.destroy', $personaje->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este personaje?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

