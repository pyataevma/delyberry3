<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Delyberry</title>
</head>
<body>
    @auth
        <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
            <nav class="-mx-3 flex flex-1 justify-end">
                <ul>
                    <li><a href="/">Volver al inicio</a></li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Salir de la cuenta
                        </a>
                    </li>
                </ul>    
            </nav>
        </header>
        <form action="{{ route('productos.create') }}" method="GET" class="button-new">
            @csrf
            <button type="submit">Agregar nuevo producto</button>
        </form>
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        <div>
        <h1>Lista de productos</h1>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>
                                @if ($producto->imagen)
                                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="table-image">
                                @else
                                    No imagen
                                @endif
                            </td>
                            <td><a href="{{ route('productos.show', $producto->id) }}">{{ $producto->nombre }}</a></td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>
                                <form action="{{ route('productos.edit', $producto->id) }}" method="GET" style="display: inline;">
                                    @csrf
                                    <button type="submit">Modificar</button>
                                </form>
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <h1>¡Acceso negado!</h1>
    @endauth
</body>
</html>
