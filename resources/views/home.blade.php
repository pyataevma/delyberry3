<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <li><a href="/productos">Productos</a></li>
                <li><a href="/contact">Contact</a></li>
                @auth
                    @if (Auth::user()->role === 'admin')
                        <li><a href="/admin">Admin Panel</a></li>
                    @endif
                @endauth
                
            </ul>    
        </nav>
    </header>

    <h1>Producto List</h1>
    <div class="panel-body">
	    <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>
                            @if ($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" style="width: 100px; height: auto;">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>
                            <button onclick="showModifyForm({{ $producto->id }}, '{{ $producto->nombre }}', {{ $producto->precio }}, '{{ $producto->descripcion }}')">Modificar</button>
                        </td>
                        <td>
                            <form action="{{route('productos.destroy', $producto->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this producto?')">Eliminar</button>
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

    <button id="toggleFormButton">Add Producto</button>
    <!-- Add Producto Form -->
    <div id="addProductoForm" style="display: none; margin-top: 20px;">
        <h2>Add a New Producto</h2>
        <form  action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" required step="100">
            <br>

            <label for="descripcion">Descripcion:</label>
            <textarea id="descripcion" name="descripcion"></textarea>
            <br>
            
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="imagenes/*">
            <br>

            <button type="submit">Agregar Productoo</button>
            <button type="button" onclick="hideModifyForm()">Cancelar</button>
        </form>
    </div>
    <div id="modifyProductoForm" style="display: none; margin-top: 20px;">
        <h2>Modify Producto</h2>
        <form id="modifyForm" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="modifyNombre">Nombre:</label>
            <input type="text" id="modifyNombre" name="nombre" required>
            <br>

            <label for="modifyPrice">Precio:</label>
            <input type="number" id="modifyPrice" name="precio" required step="0.01">
            <br>

            <label for="modifyDescription">Descripcion:</label>
            <textarea id="modifyDescription" name="descripcion"></textarea>
            <br>
            
            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" name="imagen" accept="imagenes/*">
            <br>

            <button type="submit">Guardar</button>
            <button type="button" onclick="hideModifyForm()">Cancelar</button>
        </form>
    </div>
    <script src="{{ asset('js/toggleForm.js') }}"></script>
</body>
</html>
