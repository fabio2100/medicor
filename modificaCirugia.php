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
  <title>Modificar cirugía</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <div>
    <a href="inicio.php" class="btn btn-secondary">Volver</a>
  </div>
  <?php
  $id = $_GET['id'];
  try {
    require('conexionacirugias.php');
    $sql = "SELECT * FROM cirugias WHERE id = ?";
    $resultado = $conn->prepare($sql);
    $resultado->execute([$id]);
    foreach ($resultado as $fila) {
    }
  } catch (Exception $e) {
    $e->getLine() . $e->getMessage();
  }
  ?>
  <p class="h1">Modificar cirugía</p>
  <form action="modificarCirugia2.php" method="get">
    <div>
      <input type="hidden" name="id" value="<?php echo $id ?>">
      <div class='form-group'>
        <label>Fecha
          <input type="date" id="fecha" name="fecha" value=<?php echo date('Y-m-d', strtotime($fila['fecha'])) ?>>
        </label>
        <label>Hora
          <input type="time" name="hora" value=<?php echo $fila['hora'] ?>>
        </label>
        <label>Lugar
          <input type="text" name="lugar" value="<?php echo $fila['lugar'] ?>">
        </label>
      </div>
      <div class='form-group'>
        <label>Médico
          <input type="text" name="principal" value="<?php echo $fila['principal'] ?>">
        </label>
        <label>Paciente
          <input type="text" name="paciente" value="<?php echo $fila['paciente'] ?>">
        </label>
        <label>Técnico
          <input type="text" name="tecnico" value="<?php echo $fila['tecnico'] ?>">
        </label>
      </div>
      <div class='form-group'>
        <label>Servicios
          <input type="text" name="servicios" value="<?php echo $fila['servicios'] ?>">
        </label>
        <label>Descartables
          <input type="text" name="descartables" value="<?php echo $fila['descartables'] ?>">
        </label>
      </div>
      <div class='form-group'>
        <label>Remito
          <input type="number" name="remito" value="<?php echo $fila['remito'] ?>">
        </label>
        <label>A quién se factura?
          <input type="text" name="factura" value="<?php echo $fila['factura'] ?>">
        </label>
      </div>
      <div>
        <label>Observaciones
          <input type="text" name="observaciones" value="<?php echo $fila['observaciones'] ?>">
        </label>
      </div>
      <div class="form-group">
        <label>Protocolo
          <?php
          if ($fila['protocolo'] == 1) {
            echo "<input type='checkbox' name='protocolo' checked>";
          } else {
            echo "<input type='checkbox' name='protocolo'>";
          }
          ?>
        </label>
        <label>Certificado de implante
          <?php
          if ($fila['certificadodeimplante'] == 1) {
            echo "<input type='checkbox' name='certificadoDeImplante' checked>";
          } else {
            echo "<input type='checkbox' name='certificadoDeImplante'>";
          }
          ?>
        </label>
      </div>
      <div class='form-group'>
        <p class="h4">Estado de la cirugía</p>
        <label>Realizada?
          <?php
          if ($fila['estado'] == 1) {
            echo "<input type='checkbox' name='estado' checked >";
          } else {
            echo "<input type='checkbox' name='estado'>";
          }
          ?>
        </label>
        <label>Facturada?
          <?php
          if ($fila['facturada'] == 1) {
            echo "<input type='checkbox' name='facturada' checked >";
          } else {
            echo "<input type='checkbox' name='facturada'>";
          }
          ?>
        </label>
        <label>Cobrada?
          <?php
          if ($fila['cobrada'] == 1) {
            echo "<input type='checkbox' name='cobrada' checked >";
          } else {
            echo "<input type='checkbox' name='cobrada'>";
          }
          ?>
        </label>
        <label>SUSPENDIDA
          <?php
          if ($fila['suspendida']==1){
            echo "<input type='checkbox' name='suspendida' checked>";
          }else{
            echo "<input type='checkbox' name='suspendida'>";
          }
          ?>
        </label>
      </div>
      <div>
        <label for="">Tipo y nro de factura: <input type="text" name="nro" value=<?php echo $fila['nro'] ?>></label>
      </div>
      <input type="submit" class="btn btn-primary" value="Modificar cirugía">
    </div>
  </form>
</body>

</html>