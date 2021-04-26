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
  <title>Nueva cirugía</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
</head>
<body class="body-agregar">
  <div><a class="btn btn-secondary" href="inicio.php">Volver</a></div>
  <p class="h1">Agregar nueva cirugía</p>
  <form action="agregarCirugia2.php" method="get">
    <div class="form-group">
      <label>Fecha: <input type="date" name="fecha"></label>
      <label>Hora: <input type="time" name="hora"></label>
			<label>Lugar: <input type="text" name="lugar"></label>
		</div>
		<div class="form-group">
			<label>Médico: <input type="text" name="principal"></label>
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
      <label>Protocolo<input type="checkbox" name="protocolo"></label>
      <label>Certificado de implante<input type="checkbox" name="certificadoDeImplante"></label>
    </div>
    <br>
    <div class="form-group">
      <p class="h4">Estado de la cirugía</p>
      <label>Cirugía realizada: <input type="checkbox" name="realizada"></label>
      <label>Cirugía facturada: <input type="checkbox" name="facturada"></label>
      <label>Cirugía cobrada: <input type="checkbox" name="cobrada"></label>
    </div>
    <div class="form-group">
      <label>Tipo y nro de factura: <input type="text" name="nro"></label>
    </div>
		<input type="submit" class="btn btn-primary" name="enviando" value="Agregar cirugía">
  </form>
</body>
</html>