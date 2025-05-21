<?php
session_start();
include 'conexion.php';

if ($_SESSION['rol'] !== 'admin') {
    header("Location: login.html");
    exit;
}

$id_cita = $_POST['id_cita'];
$estado = $_POST['estado'];

$sql = "UPDATE cita SET estado = ? WHERE id_cita = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $estado, $id_cita);
$stmt->execute();

header("Location: ver_citas.php");
exit;