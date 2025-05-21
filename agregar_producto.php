<?php
session_start();
if ($_SESSION['rol'] !== 'admin') {
    die("Acceso denegado.");
}

include 'conexion.php';

$nombre = $_POST['nombre'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

$sql = "INSERT INTO inventario (nombre_producto, cantidad, precio) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sid", $nombre, $cantidad, $precio);

if ($stmt->execute()) {
    header("Location: GestiónDeInventario.php");
} else {
    echo "Error al agregar: " . $stmt->error;
}
?>