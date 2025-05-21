<?php
$servername = "localhost:3305";
$username = "root";
$password = ""; // SIN contraseña
$database = "adris_nails";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>