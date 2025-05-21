<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    echo "Acceso denegado.";
    exit;
}

include 'conexion.php';
$resultado = $conn->query("SELECT * FROM inventario");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Inventario</title>
    <link rel="stylesheet" href="estiloUñas.css">
</head>
<body>
    <header>
        <h1>Adris Nails - Gestión de Inventario</h1>
    </header>

    <nav>
        <ul class="menu">
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <section class="inventario-container">
        <h2>Inventario de Productos</h2>

        <form action="agregar_producto.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre del producto" required>
            <input type="number" name="cantidad" placeholder="Cantidad" required>
            <input type="number" step="0.01" name="precio" placeholder="Precio" required>
            <button type="submit">Agregar</button>
        </form>

        <table class="inventario-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()) { ?>
                <tr>
                    <td><?= $fila['nombre_producto'] ?></td>
                    <td><?= $fila['cantidad'] ?></td>
                    <td>$<?= $fila['precio'] ?> MXN</td>
                    <td>
                        <a href="editar_producto.php?id=<?= $fila['id_producto'] ?>">Editar</a> |
                        <a href="eliminar_producto.php?id=<?= $fila['id_producto'] ?>" onclick="return confirm('¿Eliminar producto?')">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</body>
</html>