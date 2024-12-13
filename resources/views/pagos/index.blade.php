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
        <form action="{{ route('pagos.create') }}" method="GET" class="button-new">
            @csrf
            <button type="submit">Agregar nuevo pago</button>
        </form>
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        <div>
        <h1>Lista de pagos</h1>
        <div class="panel-body">
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>Metodo de pago</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pagos as $pago)
                        <tr>
                            <td>{{ $pago->metodo_pago }}</a></td>
                            <td>{{ $pago->monto }}</td>
                            <td>{{ $pago->estado }}</td>
                            <td>
                                <form action="{{ route('pagos.edit', $pago->id) }}" method="GET" style="display: inline;">
                                    @csrf
                                    <button type="submit">Modificar</button>
                                </form>
                                <form action="{{ route('pagos.destroy', $pago->id) }}" method="POST" style="display: inline;">
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
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
    @else
        <h1>¡Acceso negado!</h1>
    @endauth
</body>
</html>
