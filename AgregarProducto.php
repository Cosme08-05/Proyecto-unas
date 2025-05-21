<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="estiloUñas.css">
</head>
<body>
    <header>
        <h1>Adris Nails - Agregar Producto</h1>
    </header>

    <section class="formulario-container">
        <h2>Nuevo Producto</h2>

        <form >
            <input type="text" placeholder="Nombre del Producto" required>
            <input type="number" placeholder="Cantidad" required>
            <input type="number" step="0.01" placeholder="Precio (MXN)" required>

            <button type="submit">Guardar Producto</button>
        </form>

        <a href="GestiónDeInventario.html">← Volver al Inventario</a>
    </section>
</body>
</html>