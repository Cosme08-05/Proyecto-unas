<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.html");
    exit;
}

$sql = "SELECT c.*, r.nombre FROM cita c JOIN registro r ON c.id_usuario = r.id_usuario ORDER BY fecha_cita, hora_cita";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Citas</title>
    <link rel="stylesheet" href="estiloUñas.css">
</head>
<body>
    <header>
        <h1>Adris Nails - Administrar Citas</h1>
    </header>

    <nav>
        <ul class="menu">
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <section>
        <h2>Listado de Citas</h2>
        <table class="tabla-citas">
            <tr>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Servicio</th>
                <th>Estado</th>
                <th>Comentario</th>
                <th>Acciones</th>
            </tr>
            <?php while ($fila = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= $fila['nombre'] ?></td>
                    <td><?= $fila['fecha_cita'] ?></td>
                    <td><?= $fila['hora_cita'] ?></td>
                    <td><?= $fila['servicio'] ?></td>
                    <td class="estado-<?= strtolower($fila['estado']) ?>"><?= $fila['estado'] ?></td>
                    <td><?= $fila['comentario_cliente'] ?></td>
                    <td>
                        <form action="cambiar_estado.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id_cita" value="<?= $fila['id_cita'] ?>">
                            <select name="nuevo_estado">
                                <option value="Confirmado">Confirmar</option>
                                <option value="Cancelado">Cancelar</option>
                                <option value="Pendiente">Pendiente</option>
                            </select>
                            <button type="submit">Actualizar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </section>
</body>
</html>