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
<?php
  $fecha = $_GET['fecha'];
  if($fecha == ''){
    $fecha = NULL;
  }
  $hora = $_GET['hora'];
  if ($hora ==''){
    $hora = NULL;
  }
  $lugar = $_GET['lugar'];
  $principal = $_GET['principal'];  
  $tecnico = $_GET['tecnico'];
  $paciente = $_GET['paciente'];
  //$servicios = $_GET['servicios'];
  $descartables = $_GET['descartables'];
  $remito = $_GET['remito'];
  if ($remito == ''){
    $remito = 0;
  }

  $observaciones = $_GET['observaciones'];
  $factura = $_GET['factura'];
  if (isset($_GET['protocolo'])){
    $protocolo = 1;
  }else{
    $protocolo = 0;
  }
  if (isset($_GET['certificadoDeImplante'])){
    $certificadoDeImplante = 1;
  }else{
    $certificadoDeImplante = 0;
  }
  if (isset($_GET['realizada'])){
    $realizada = 1;
  }else{
    $realizada = 0;
  }
  if (isset($_GET['facturada'])){
    $facturada = 1;
  }else{
    $facturada = 0;
  }
  if (isset($_GET['cobrada'])){
    $cobrada = 1;
  }else{
    $cobrada = 0;
  }
  $nro = $_GET['nro'];
  //echo $servicios;
  //servicios y descartables, procesamiento de los checkboxs 
  $servicios = $_GET['servicios'];
  echo $servicios;
  foreach($servicios as $servicio){
    echo $servicio;
  }
  try {
    require('conexionacirugias.php');
    require('funciones.php');
    $lugar=asignaValorACampo($lugar);
    $principal=asignaValorACampo($principal);
    $tecnico=asignaValorACampo($tecnico);
    $factura=asignaValorACampo($factura);
    $servicios=asignaValorACampo($servicios);
    $descartables=asignaValorACampo($descartables);

    //Codigo para procesar los checkboxs de ss y ds
    

    $sql = "INSERT INTO cirugias (fecha,hora,lugar,remito,paciente,principal,tecnico,servicios,descartables,factura,observaciones,protocolo,certificadodeimplante,estado,facturada,cobrada,nro,ultimaModificacion)
    values (:fecha,:hora,:lugar,$remito,:paciente,:principal,:tecnico,:servicios,:descartables,:factura,:observaciones,$protocolo,$certificadoDeImplante,$realizada,$facturada,$cobrada,:nro,NOW()-INTERVAL 3 HOUR)";
    
    //$resultado = $conn -> prepare($sql);
    //$resultado -> execute(array(":fecha"=>$fecha,":hora"=>$hora,":lugar"=>$lugar,":paciente"=>$paciente,":principal"=>$principal,":tecnico"=>$tecnico,":servicios"=>$servicios,":descartables"=>$descartables,":factura"=>$factura,":observaciones"=>$observaciones,":nro"=>$nro));
    //$resultado -> closeCursor();
    //$conn = null;
    //echo "Cargada correctamente";
    //echo "<meta http-equiv='refresh' content ='0;url=inicio.php'>";

    echo "Servicios. " . $servicios;
    //echo "lugar: " .$lugar."  principla: " .$principal."  tecnico: " .$tecnico."  factura " .$factura;
  } catch (Exception $e) {
    echo $e -> getLine() . $e -> getMessage();
  }
?>