<?php
session_start();
if (!isset($_SESSION['usuario'])) {
?>
  <script type="text/javascript">
    window.location.replace("index.html");
  </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <p class="h2">Ingrese Usuario</p>
  <form action="compruebaUsuario.php" class="form-group" method="POST">
    <label>Usuario: <input type="text" name="usuario" id=""></label>
    <label for="">Contraseña: <input type="password" name="contra" id=""></label>
  <div>
    <input type="submit" class="btn btn-primary" value="Acceder">
  </div>
  </form>
</body>
</html>