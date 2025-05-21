<?php
session_start();
if ($_SESSION['rol'] !== 'admin') {
    die("Acceso denegado.");
}

include 'conexion.php';
$id = $_GET['id'];
$producto = $conn->query("SELECT * FROM inventario WHERE id_producto = $id")->fetch_assoc();
?>

<form action="actualizar_producto.php" method="POST">
    <input type="hidden" name="id" value="<?= $producto['id_producto'] ?>">
    <input type="text" name="nombre" value="<?= $producto['nombre_producto'] ?>" required>
    <input type="number" name="cantidad" value="<?= $producto['cantidad'] ?>" required>
    <input type="number" step="0.01" name="precio" value="<?= $producto['precio'] ?>" required>
    <button type="submit">Actualizar</button>
</form>