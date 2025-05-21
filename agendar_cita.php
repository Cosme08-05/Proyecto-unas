<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$servicio = $_POST['servicio'];
$comentario = $_POST['comentario'] ?? '';

$sql = "INSERT INTO cita (id_usuario, fecha_cita, hora_cita, estado, servicio, comentario_cliente)
        VALUES ('$id_usuario', '$fecha', '$hora', 'Pendiente', '$servicio', '$comentario')";

if ($conn->query($sql) === TRUE) {
    header("Location: inicio.php?mensaje=Cita agendada correctamente");
} else {
    echo "Error al agendar la cita: " . $conn->error;
}
$conn->close();
?>