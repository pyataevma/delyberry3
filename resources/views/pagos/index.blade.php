<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Delyberry</title>
</head>
<body>
    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
        <nav class="-mx-3 flex flex-1 justify-end">
            <ul>
                @auth
                    <li><a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Dashboard
                    </a></li>
                @else
                    <li><a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Log in
                    </a>
                    </li>
                    @if (Route::has('register'))
                        <li><a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Register
                        </a></li>
                    @endif
                @endauth
                <li><a href="/">Home</a></li>                
            </ul>    
        </nav>
    </header>

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
    <form action="{{ route('pagos.create') }}" method="GET" style="display: inline;">
        @csrf
        <button type="submit">Agregar nuevo pago</button>
    </form>
</body>
</html>
