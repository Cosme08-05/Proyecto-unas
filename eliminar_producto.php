<?php
session_start();
if ($_SESSION['rol'] !== 'admin') {
    die("Acceso denegado.");
}

include 'conexion.php';
$id = $_GET['id'];

$conn->query("DELETE FROM inventario WHERE id_producto = $id");
header("Location: GestiónDeInventario.php");
?>