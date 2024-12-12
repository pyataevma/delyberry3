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
                    <li>
                        <a href="{{ route('productos.index') }}">Administrar productos</a>
                    </li>
                    <li>
                        <a href="{{ route('pagos.index') }}">Administrar pagos</a>
                    </li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>

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
                @auth
                    @if (Auth::user()->role === 'admin')
                        <li><a href="/admin">Admin Panel</a></li>
                    @endif
                @endauth
                
            </ul>    
        </nav>
    </header>

    <main>
    <div class="panel-body">
    <div>
        @auth
            <h1>¡Bienvenido, {{ Auth::user()->name }}! </h1>
        @else
            <h1>¡Bienvenido a nuestro sitio web, estimado visitante!</h1>
        @endauth
    </div>
        @foreach ($productos as $producto)
            <section class='product-card'>
                @if ($producto->imagen)
                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class='product-image'>
                @else
                    <div class='product-image'>No imagen<\div>
                @endif
                <div class='product-info'>
                <h3 class='product-name'>{{ $producto->nombre }}</h3>
                <p class='product-price'>${{ $producto->precio }}</p>
                <p class='product-description'>{{ $producto->descripcion }}</p>
                </div>
            </section>
        @endforeach
    </div>
</main>
</body>
</html>
