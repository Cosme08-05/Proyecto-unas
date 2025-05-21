<?php
session_start();
if ($_SESSION['rol'] !== 'admin') {
    die("Acceso denegado.");
}

include 'conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

$sql = "UPDATE inventario SET nombre_producto=?, cantidad=?, precio=? WHERE id_producto=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sidi", $nombre, $cantidad, $precio, $id);

if ($stmt->execute()) {
    header("Location: GestiónDeInventario.php");
} else {
    echo "Error al actualizar: " . $stmt->error;
}
?>