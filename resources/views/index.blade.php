@auth
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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
            background-color: #f5deb3; /* Fondo más oscuro para filas impares */
        }

        tr:hover {
            background-color: #e0d9b5; /* Fondo ligeramente más oscuro para hover */
        }

        .btn {
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

        .btn-success {
            background-color: #ffa500; /* Botón de editar en naranja */
        }

        .btn-success:hover {
            background-color: #e67e22; /* Naranja más oscuro en hover */
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
</head>
<body>
<h1>{{__('messages.welcome')}}</h1>

<!-- Enlace a la imagen SVG -->
<div style="text-align: center;">
    <a href="image.svg" target="_blank">
        <img src="https://cdn.custom-cursor.com/collections/139/cover-collection-brawl-stars.png" alt="Imagen" width="900px"> <!-- Cambia el nombre y tamaño de la imagen si es necesario -->
    </a>
</div>

<!-- Botón que redirige a /personajes -->
<div style="text-align: center; margin-top: 30px;">
    <a href="/personajes" class="btn btn-success">{{__('messages.verpersonajes')}}</a>
</div>
</body>
</html>
@endauth
@guest
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{__('messages.inicio')}}</title>
        <style>
            /* Estilos generales */
            body {
                background-color: #f5f5dc; /* Fondo crema */
                font-family: 'Arial', sans-serif;
                color: #6f4f28; /* Texto marrón */
                text-align: center; /* Centramos el contenido */
            }

            h1 {
                font-size: 36px;
                font-weight: bold;
                margin-bottom: 30px;
                color: #6f4f28; /* Título en marrón */
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

            .btn-orange {
                background-color: #ffa500; /* Botón naranja */
            }

            .btn-orange:hover {
                background-color: #e67e22; /* Naranja más oscuro en hover */
            }
        </style>
    </head>
    <body>
    <h1>{{__('messages.inicio')}}</h1>

    @if (Route::has('login'))
        <div>
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-orange">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-orange">{{__('messages.iniciarsesion')}}</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-orange">{{__('messages.registrarse')}}</a>
                @endif
            @endauth
        </div>
    @endif

    <!-- Imagen centrada -->
    <div style="margin-top: 50px;">
        <a href="image.svg" target="_blank">
            <img src="https://cdn.custom-cursor.com/collections/139/cover-collection-brawl-stars.png" alt="Imagen" width="900px">
        </a>
    </div>
    </body>
    </html>
@endguest
