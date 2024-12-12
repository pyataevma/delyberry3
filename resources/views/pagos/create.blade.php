<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delyberry</title>
</head>
<body> 
    <h1>Agregar pago nuevo</h1>

    <form  action="{{ route('pagos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="metodo">Metodo de pago</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>

        <label for="monto">Monto:</label>
        <input type="number" id="monto" name="monto" required>
        <br>

        <label for="estado">Estado:</label>
        <textarea id="estado" name="estado"></textarea>
        <br>

       <button type="submit">Agregar Pago</button>
        <a href="{{ route('pagos.index') }}">Cancel</a>
    </form>
</body>
</html>
