<?php
  session_start();
  if(!isset($_SESSION['usuario'])){
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
  <title>Modificar o eliminar cirugía</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
  <script src="js/sorttable.js"></script>
</head>

<body>
  <div>
    <a  class="button btn-secondary p-4" href="inicio.php">Volver</a>
  </div>
  <br>

  <?php

  $sql = "SELECT * FROM cirugias ORDER BY fecha DESC,hora DESC";

  require('funciones.php');
  mostrarCirugias($sql);
  ?>
</body>

</html>