<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delyberry</title>
</head>
<body>
    <h1>{{ $pago->metodo_pago }}</h1>
    <p><strong>Monto:</strong> ${{ $pago->monto }}</p>
    <p><strong>Estado:</strong> {{ $pago->estado }}</p>

    <a href="{{ route('pagos.index') }}">Back to Pagos</a>
    <a href="{{ route('pagos.edit', $pago->id) }}" class="btn btn-primary">Edit</a>
</body>
</html>
