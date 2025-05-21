<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'cliente') {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agendar Citas</title>
    <link rel="stylesheet" href="estiloUñas.css">
</head>
<body>
    <header>
        <h1>Adris Nails - Agendar Cita</h1>
        <p>Elige tu día y hora para consentirte</p>
    </header>

    <nav>
        <ul class="menu">
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <section class="formulario-cita">
        <h2>Formulario de Cita</h2>
        <form action="agendar_cita.php" method="POST">
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" required>

            <label for="hora">Hora:</label>
            <input type="time" name="hora" required>

            <label for="servicio">Servicio:</label>
            <select name="servicio" required>
                <option value="">Seleccione un servicio</option>
                <option value="Aplicación de uñas">Aplicación de uñas</option>
                <option value="Retoque">Retoque</option>
                <option value="Diseño especial">Diseño especial</option>
            </select>

            <label for="comentario">Comentario:</label>
            <input type="text" name="comentario" placeholder="Comentario (opcional)">

            <button type="submit">Agendar</button>
        </form>

       
    </section>
</body>
</html>