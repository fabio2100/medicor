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
  <title>Búsqueda avanzada</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <?php
  $lugar = $_GET['lugar'];
  $medico = $_GET['principal'];
  $paciente = $_GET['paciente'];
  $tecnico = $_GET['tecnico'];
  $servicios = $_GET['servicios'];
  $observaciones = $_GET['observaciones'];
  $descartables = $_GET['descartables'];
  $remito = $_GET['remito'];
  $factura = $_GET['factura'];
  $nro = $_GET['nro'];

    $sql = "SELECT * FROM cirugias WHERE 1 AND lugar LIKE '%$lugar%'
     AND principal LIKE '%$medico%'
     AND paciente LIKE '%$paciente%'
     AND tecnico LIKE '%$tecnico%'
     AND servicios LIKE '%$servicios%'
     AND observaciones LIKE '%$observaciones%'
     AND descartables LIKE '%$descartables%'
     AND remito LIKE '%$remito%'
     AND factura LIKE '%$factura%'
     AND nro LIKE '%$nro%'";


    if(isset($_GET['actFecha'])){
      $fechaInicio = $_GET['fechaInicio'];
      $fechaFin = $_GET['fechaFin'];
      $sql = $sql . "AND fecha BETWEEN '$fechaInicio' AND '$fechaFin' ";
    }

    if (isset($_GET['actHora'])){
      $hora = $_GET['hora'];
      $sql = $sql . "AND hora = '$hora' ";
    }



    if (isset($_GET['actProtocolo'])){
      if (isset($_GET['protocolo'])){
        $protocolo = 1;
      }else{
        $protocolo = 0;
      }
      $sql = $sql . "AND protocolo = '$protocolo' ";
    }

    if (isset($_GET['actCertificadoDeImplante'])){
      if (isset($_GET['certificadoDeImplante'])){
        $certificadoDeImplante = 1;
      }else{
        $certificadoDeImplante = 0;
      }
      $sql = $sql . "AND certificadoDeImplante = '$certificadoDeImplante' ";
    }
    if (isset($_GET['actEstado'])){
      if (isset($_GET['realizada'])){
        $estado = 1;
      }else{
        $estado = 0;
      }
      $sql = $sql . "AND estado = '$estado' ";
    }
    if (isset($_GET['actFacturada'])){
      if (isset($_GET['facturada'])){
        $facturada = 1;
      }else{
        $facturada = 0;
      }
      $sql = $sql . "AND facturada = '$facturada' ";
    }
    if (isset($_GET['actCobrada'])){
      if (isset($_GET['cobrada'])){
        $cobrada = 1;
      }else{
        $cobrada = 0;
      }
      $sql = $sql . "AND cobrada = '$cobrada' ";
    }
    if(isset($_GET['actSuspendida'])){
      if(isset($_GET['suspendida'])){
        $suspendida = 1;
      }else{
        $suspendida = 0;
      }
      $sql = $sql . "AND suspendida = '$suspendida'";
    }

    $sql = $sql . " ORDER BY fecha DESC";

    echo "<div>
      <a href='inicio.php' class='btn btn-secondary'>Volver</a>
      </div>";
    require('funciones.php');
    muestraRegistrosEncontrados($sql);
    mostrarCirugias($sql);

  ?>
</body>
</html>