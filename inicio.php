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
    <title>Inicio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <div class="row">
      <a href="agregarCirugia.php" class="p-4 btn btn-primary col-xs-12 col-sm-12 col-md-4 col-lg-4">Agregar cirugía</a>
      <a href="mostrarCirugias.php" class="p-4 btn btn-danger col-xs-12 col-sm-12 col-md-4 col-lg-4">Ver, editar o eliminar cirugías</a>
      <a href="buscador.php" class="p-4 btn btn-dark col-xs-12 col-sm-12 col-md-4 col-lg-4">Buscador</a>
    </div>
    
    
    <?php
  //TODO : capturar eventos de checkbox,tabla ss y ds, modificar los acts cirugias y buscadores con los details, views mejorarlos
  require('funciones.php');
  $sql1 = "SELECT * FROM cirugias WHERE fecha = CURDATE() AND suspendida = 0 ORDER BY fecha";
  $nro = registrosEncontrados($sql1);
  if ($nro > 0){
    echo "<p class='h3'>Cirugías HOY";
    echo "  (".$nro.")";
    echo"</p>";
    mostrarCirugias($sql1);
  }
  
  
  $sql = "SELECT * FROM cirugias WHERE fecha > NOW() AND suspendida = 0 ORDER BY fecha";
  muestraCirugiasDetails($sql,"Próximas cirugías");
  $sql4 = "SELECT * FROM cirugias WHERE fecha > (NOW()-INTERVAL 1 WEEK) AND fecha <= (SUBDATE(CURDATE(),1)) AND suspendida = 0 ORDER BY fecha DESC";
  muestraCirugiasDetails($sql4,"Cirugías última semana");
  $sql3 = "SELECT * FROM cirugias WHERE suspendida = 1 ORDER BY fecha";
  muestraCirugiasDetails($sql3,"Cirugías suspendidas");
  ?>
  
</body>
</html>