<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delyberry</title>
</head>
<body>
    <h1>{{ $producto->nombre }}</h1>
    <p><strong>Price:</strong> ${{ $producto->precio }}</p>
    <p><strong>Description:</strong> {{ $producto->descripcion }}</p>

    <a href="{{ route('productos.index') }}">Back to Productos</a>
    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary">Edit</a>
</body>
</html>
