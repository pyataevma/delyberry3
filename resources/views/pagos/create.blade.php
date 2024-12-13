<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Delyberry</title>
</head>
<body> 
    <h1>Agregar pago nuevo</h1>
    @if ($errors->any())
        <div style="color: red; border: 1px solid red; padding: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="form-container">
        <form  action="{{ route('pagos.store') }}" method="POST">
            @csrf
            <label for="metodo">Metodo de pago</label>
            <input type="text" id="metodo" name="metodo_pago" required>
            <br>

            <label for="monto">Monto:</label>
            <input type="number" id="monto" name="monto" required>
            <br>

            <label for="estado">Estado</label>
            <input type="text" id="estado" name="estado" required>
            <br>

        <button type="submit">Agregar pago</button>
            <a href="{{ route('pagos.index') }}" class="cancel">Volver</a>
        </form>
        </div>
</body>
</html>
