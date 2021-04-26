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
  <title>Buscador</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div>
    <a href="inicio.php" class="btn btn-secondary">Volver</a>
  </div>
  <div>
  <p class="h3">Búsqueda simple</p>
  <form class="form-group" action="busquedaSimple.php" method="get">
    <label><input type="text" name="valor"></label>
    <input type="submit" value="Buscar">
  </form>
  </div>
  <p class="h3">Búsqueda avanzada</p>
  <form action="busquedaAvanzada.php" method="get">
    <div class="form-group">
      <label><input type="checkbox" name="actFecha" id="">Fecha Inicial: <input type="date" name="fechaInicio"></label>
      <label>Fecha final: <input type="date" name="fechaFin" id=""></label>
      <label><input type="checkbox" name="actHora" id="">Hora: <input type="time" name="hora"></label>
			<label>Lugar: <input type="text" name="lugar"></label>
		</div>
		<div class="form-group">
      <label>Médico: <input type="text" name="principal"></label>
		</div>
		<div class='form-group'>
      <label>Paciente: <input type="text" name="paciente"></label>
      <label>Técnico: <input type="text" name="tecnico"></label>
    </div>
    <div class="form-group">
      <label>Servicios: <input type="textarea" name="servicios"></label>
      <label>Descartables: <input type="textarea" name="descartables"></label>
    </div>
    <div class="form-group">
      <label>Remito:<input type="number" name="remito"></label>
      <label>A quién se factura: <input type="text" name="factura"></label>
    </div>
		<div class="form-group">
			<label>Observaciones: <input type="textarea" name="observaciones"></label>
    </div>
    <div class="form-group">
      <label><input type="checkbox" name="actProtocolo" id="">Protocolo<input type="checkbox" name="protocolo"></label>
    </div>
    <div>
      <label><input type="checkbox" name="actCertificadoDeImplante" id="">Certificado de implante<input type="checkbox" name="certificadoDeImplante"></label>
    </div>
    
    <p class="h4">Estado de la cirugía</p>
    <div class="form-group">
      <label><input type="checkbox" name="actEstado" id="">Cirugía realizada: <input type="checkbox" name="realizada"></label>
    </div>
    <div>
      <label><input type="checkbox" name="actFacturada" id="">Cirugía facturada: <input type="checkbox" name="facturada"></label>
    </div>
    <div>
      <label><input type="checkbox" name="actCobrada" id="">Cirugía cobrada: <input type="checkbox" name="cobrada"></label>
    </div>  
    <div>
      <label for="Suspendida"><input type="checkbox" name="actSuspendida">Suspendida <input type="checkbox" name="suspendida" id=""></label></div>
    <div class="form-group">
      <label for="">Tipo y nro de factura:<input type="text" name="nro" id="nro"></label>
    </div>
		<input type="submit" name="enviando" value="Buscar">
  </form>
</body>
</html>