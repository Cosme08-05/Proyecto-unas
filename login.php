<?php
session_start();
include 'conexion.php';

$correo = $_POST['correo'];
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    die("Correo electrónico no válido.");
}
$contraseña = $_POST['password']; 

$sql = "SELECT * FROM registro WHERE correo = '$correo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    if (password_verify($contraseña, $usuario['contraseña'])) {
        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];
        if ($usuario['rol'] === 'admin') {
            header("Location: inicio.php"); 
        } else {
            header("Location: inicio.php");
        }
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Correo no registrado.";
}
$conn->close();
?>