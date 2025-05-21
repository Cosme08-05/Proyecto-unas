<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InicioDeSe</title>
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
        </ul>
    </nav>

    <div class="login-container">
        <h2>Inicio de Sesión</h2>
        <form id="loginForm" action="login.php" method="POST">
            <input type="email" name="correo" id="correo" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
        <div class="login-links">
            <a href="#">¿Olvidaste tu contraseña?</a>
            <a href="Registro.php">Registrarse</a>
        </div>
    </div>

<script>
document.getElementById("loginForm").addEventListener("submit", function(e) {
  var email = document.getElementById("correo").value;
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (!emailRegex.test(email)) {
    alert("Por favor, ingresa un correo electrónico válido.");
    e.preventDefault();
  }
});
</script>
</body>

</html>