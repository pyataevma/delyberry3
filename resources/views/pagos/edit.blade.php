<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delyberry</title>
</head>
<body> 
    <h1>Modificar Pago</h1>
    @if ($errors->any())
        <div style="color: red; border: 1px solid red; padding: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form  action="{{ route('pagos.update', $pago->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="metodo">Metodo_pago:</label>
        <input type="text" id="metodo" name="metodo_pago" required>
        <br>

        <label for="monto">Monto:</label>
        <input type="number" id="monto" name="monto" required>
        <br>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" required>
        <br>

        <button type="submit">Guardar</button>
        <a href="{{ route('pagos.index') }}">Cancel</a>
    </form>

</body>
</html>
