<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'cliente') {
    header("Location: login.html");
    exit;
}
include 'conexion.php';

$id_usuario = $_SESSION['id_usuario'];
$sql = "SELECT * FROM cita WHERE id_usuario = $id_usuario ORDER BY fecha_cita DESC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Citas</title>
    <link rel="stylesheet" href="estiloUñas.css">
</head>
<body>
    <header>
        <h1>Mis Citas - Adris Nails</h1>
    </header>
    <nav>
        <ul class="menu">
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <table class="tabla-citas">
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Servicio</th>
            <th>Estado</th>
            <th>Comentario</th>
        </tr>
        <?php while ($row = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $row['fecha_cita'] ?></td>
            <td><?= $row['hora_cita'] ?></td>
            <td><?= $row['servicio'] ?></td>
            <td class="estado-<?= strtolower($row['estado']) ?>"><?= $row['estado'] ?></td>
            <td><?= $row['comentario_cliente'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>