<?php
include 'conexion.php';

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$contrasena = $_POST['contraseña'];
$confirmar = $_POST['confirmar_password'];
$rol = 'cliente';

// Validar campos vacíos
if (empty($nombre) || empty($usuario) || empty($correo) || empty($contrasena) || empty($confirmar) || empty($rol)) {
    echo "Todos los campos son obligatorios.";
    exit;
}

// Validar que las contraseñas coincidan
if ($contrasena !== $confirmar) {
    echo "Las contraseñas no coinciden.";
    exit;
}

// Hashear la contraseña
$hashed = password_hash($contrasena, PASSWORD_DEFAULT);

// Validar si el correo ya existe
$sql = "SELECT * FROM registro WHERE correo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "El correo ya está registrado.";
    exit;
}

// Insertar el nuevo usuario
$sql = "INSERT INTO registro (nombre, usuario, correo, contraseña, rol) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nombre, $usuario, $correo, $hashed, $rol);

if ($stmt->execute()) {
    echo "Registro exitoso. Redirigiendo...";
    header("Refresh: 2; Loogin.php");
} else {
    echo "Error al registrar: " . $stmt->error;
}

$conn->close();
?>