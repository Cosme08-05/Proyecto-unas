<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="estiloUñas.css">
</head>
<body>
    <header>
        <h1>Adris Nails</h1>
        <p>Realza tu belleza con diseños únicos</p>
    </header>
    
    <nav>
        <ul class="menu">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="#">Redes Sociales</a></li>
        </ul>
    </nav>

    <div class="login-container">
        <h2>Registro</h2>
        <form action="registrarse.php" method="POST">
            <input type="text" name="nombre" placeholder="Nombre completo" required>
            <input type="text" name="usuario" placeholder="Nombre de usuario" required>
            <input type="email" name="correo" placeholder="Correo electrónico" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <input type="password" name="confirmar_password" placeholder="Confirmar contraseña" required>


            <button type="submit">Registrarse</button>
        </form>

        
        <div class="login-links">
            <a href="Loogin.php">¿Ya tienes cuenta? Iniciar Sesión</a>
        </div>
    </div>
</body>
</html>