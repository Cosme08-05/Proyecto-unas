<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Citas - Admin</title>
    <link rel="stylesheet" href="estiloUñas.css">

</head>
<body>
    <header>
        <h1>Adris Nails - Panel de Citas</h1>
        <p>Visualiza y administra las citas agendadas</p>
    </header>

    <nav>
        <ul class="menu">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Citas</a></li>
            <li><a href="#">Clientes</a></li>
            <li><a href="#">Cerrar Sesión</a></li>
        </ul>
    </nav>

    <section>
        <h2>Listado de Citas</h2>
        <table class="tabla-citas">
            <thead>
                <tr>
                    <th>Nombre del Cliente</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Servicio</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>María López</td>
                    <td>02/05/2025</td>
                    <td>10:00 AM</td>
                    <td>Aplicación de Uñas</td>
                    <td class="estado-pendiente">Pendiente</td>
                </tr>
                <tr>
                    <td>Ana Torres</td>
                    <td>02/05/2025</td>
                    <td>12:00 PM</td>
                    <td>Diseño Especial</td>
                    <td class="estado-confirmado">Confirmado</td>
                </tr>
                <tr>
                    <td>Carmen Salinas</td>
                    <td>03/05/2025</td>
                    <td>03:00 PM</td>
                    <td>Retoque</td>
                    <td class="estado-cancelado">Cancelado</td>
                </tr>
            </tbody>
        </table>
    </section>
</body>
</html>