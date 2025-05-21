<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes de Citas - Adris Nails</title>
    <link rel="stylesheet" href="estiloUñas.css">
</head>
<body>
    <header>
        <h1>Adris Nails - Reportes</h1>
        <p>Genera reportes de las citas</p>
    </header>

    <nav>
        <ul class="menu">
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <section class="reporte-container">
        <h2>Generar Reporte</h2>
        <form method="POST" action="GeneracionDeReportes.php">
            <label for="fecha-inicio">Fecha de inicio:</label>
            <input type="date" id="fecha-inicio" name="fecha-inicio" required>

            <label for="fecha-fin">Fecha de fin:</label>
            <input type="date" id="fecha-fin" name="fecha-fin" required>

            <label for="tipo-reporte">Tipo de Reporte:</label>
            <select id="tipo-reporte" name="tipo-reporte" required>
                <option value="todas">Todas las citas</option>
                <option value="confirmadas">Citas confirmadas</option>
                <option value="pendientes">Citas pendientes</option>
                <option value="canceladas">Citas canceladas</option>
            </select>

            <button type="submit">Generar Reporte</button>
        </form>
    </section>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'conexion.php';

    $fecha_inicio = $_POST['fecha-inicio'];
    $fecha_fin = $_POST['fecha-fin'];
    $tipo_reporte = $_POST['tipo-reporte'];

    $where = "WHERE fecha_cita BETWEEN '$fecha_inicio' AND '$fecha_fin'";
    if ($tipo_reporte == 'confirmadas') {
        $where .= " AND estado = 'Confirmado'";
    } elseif ($tipo_reporte == 'pendientes') {
        $where .= " AND estado = 'Pendiente'";
    } elseif ($tipo_reporte == 'canceladas') {
        $where .= " AND estado = 'Cancelado'";
    }

    $sql = "SELECT c.*, r.nombre FROM cita c 
            JOIN registro r ON c.id_usuario = r.id_usuario
            $where
            ORDER BY fecha_cita, hora_cita";

    $result = $conn->query($sql);

    echo "<section class='descargar-container'>";
    echo "<h2>Resultados del Reporte</h2>";
    echo "<table class='tabla-citas'>";
    echo "<tr><th>Cliente</th><th>Fecha</th><th>Hora</th><th>Servicio</th><th>Estado</th><th>Comentario</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nombre']}</td>
                <td>{$row['fecha_cita']}</td>
                <td>{$row['hora_cita']}</td>
                <td>{$row['servicio']}</td>
                <td>{$row['estado']}</td>
                <td>{$row['comentario_cliente']}</td>
              </tr>";
    }
    echo "</table>";
    echo "</section>";
    $conn->close();
}
?>

</body>
</html>