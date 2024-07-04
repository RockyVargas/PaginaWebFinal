<!DOCTYPE html>
<html>
<head>
    <title>Página de Pago</title>
    <link rel="stylesheet" href="../StilosCSS/styleTarjeta.css">
</head>
<body>
    <h1>Proceso de Pago</h1>
    <div class="card">
        <form method="post" action="confirmacion.php">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
            <br>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" placeholder="Dirección" required>
            <br>
            <label for="tarjeta">Número de Tarjeta:</label>
            <input type="text" id="tarjeta" name="tarjeta" placeholder="Número de Tarjeta" required>
            <br>
            <button type="submit">Pagar</button>
        </form>
    </div>
</body>
</html>