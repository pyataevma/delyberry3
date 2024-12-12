<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delyberry</title>
</head>
<body> 
    <h1>Edit Producto</h1>
    <form  action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" value="{{ $producto->nombre }}"  name="nombre" required>
        <br>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" value="{{ $producto->precio }}" name="precio" required>
        <br>

        <label for="descripcion">Descripcion:</label>
        <textarea id="descripcion" value="{{ $producto->descripcion }}" name="descripcion"></textarea>
        <br>

        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="imagenes/*">
        <br>

        <button type="submit">Guardar</button>
        <a href="{{ route('productos.index') }}">Cancel</a>
    </form>

</body>
</html>
