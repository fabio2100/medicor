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
  <title>Resultados de la búsqueda</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <?php
    $valor = $_GET['valor'];
    $sql = "SELECT * FROM cirugias WHERE fecha LIKE '%$valor%' OR
      hora LIKE '%$valor%' OR
      lugar LIKE '%$valor%' OR
      remito LIKE '%$valor%' OR
      paciente LIKE '%$valor%' OR
      principal LIKE '%$valor%' OR
      tecnico LIKE '%$valor%' OR
      servicios LIKE '%$valor%' OR
      descartables LIKE '%$valor%' OR
      factura LIKE '%$valor%' OR
      observaciones LIKE '%$valor%'";
      echo "<div>
      <a href='inicio.php' class='btn btn-secondary'>Volver</a>
      </div>";
      require('funciones.php');
      muestraRegistrosEncontrados($sql);
      mostrarCirugias($sql);
   
  ?>
</body>
</html>