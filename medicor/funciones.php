
<?php

function actualizarCirugia($id,$fecha,$hora,$lugar,$remito,$paciente,$principal,$tecnico,$servicios,$descartables,$observaciones,$factura,$protocolo,$certificadoDeImplante,$estado,$facturada,$cobrada,$nro,$suspendida){
  try {
    require('conexionacirugias.php');
    $sql = "UPDATE cirugias SET fecha = :fecha, hora = :hora, lugar = :lugar, remito = :remito, paciente = :paciente, principal=:principal,tecnico = :tecnico,servicios=:servicios,descartables=:descartables,observaciones = :observaciones,factura = :factura,protocolo = $protocolo,certificadodeimplante=$certificadoDeImplante, estado = $estado,facturada = $facturada,cobrada = $cobrada,nro = :nro,suspendida = $suspendida,ultimaModificacion = NOW() - INTERVAL 3 HOUR WHERE id = $id";
    $resultado = $conn -> prepare($sql);
    $resultado -> execute(array(":fecha"=>$fecha,":hora"=>$hora,":lugar"=>$lugar,":remito"=>$remito,":paciente"=>$paciente,":principal"=>$principal,":tecnico"=>$tecnico,":servicios"=>$servicios,":descartables"=>$descartables,":factura"=>$factura,":observaciones"=>$observaciones,":nro"=>$nro));
    $resultado -> closeCursor();
    $conn = null;
    echo "Modificada correctamente";
  } catch (Exception $e) {
    echo $e -> getLine() . $e -> getMessage();
  }
}

function eliminarCirugia($id){
  try {
    require('conexionacirugias.php');
    $sql = "DELETE FROM cirugias WHERE id = ?";
    $resultado = $conn -> prepare($sql);
    $resultado -> execute([$id]);
    $resultado -> closeCursor();
    $conn = null;
    echo "eliminada correctamente";
  } catch (Exception $e) {
    echo $e -> getLine() . $e -> getMessage();
  }
}

//Function muestra cirugias-> cada registro en una fila (agregado sortable cuidado con eso)
/*function mostrarCirugias($sql){
  try {
    require('conexionacirugias.php');
    $resultado = $conn->query($sql);
    echo "<table class='table table-striped table-dark table-responsive sortable' border='1'><tr class='encabezado'><th>";
    echo "</th><th>";
    echo "</th><th>";
    echo "Fecha</th><th>";
    echo "Hora</th><th>";
    echo "Lugar</th><th>";
    echo "Remito</th><th>";
    echo "Paciente</th><th>";
    echo "Principal</th><th>";
    echo "Técnico</th><th>";
    echo "Servicios</th><th>";
    echo "Descartables</th><th>";
    echo "A quién se factura?</th><th>";
    echo "Observaciones</th><th>";
    echo "Protocolo</th><th>";
    echo "Certificado de implante</th><th>";
    echo "Realizada?</th><th>";
    echo "Facturada?</th><th>";
    echo "Nro de factura</th><th>";
    echo  "Cobrada?</th><th>";
    echo "SUSPENDIDA</th></th>";

    foreach ($resultado as $fila) {
      echo "<tr><td>";
      echo "<a href='modificaCirugia.php?id=" . $fila['id'] .   "'>" . "<img class='img-responsive' src='img/editar.png'>" . "</a></td><td>";
      echo "<a href='eliminarCirugia.php?id=" . $fila['id'] .   "'>" . "<img class='img-responsive' src='img/eliminar.png'>" . "</a></td><td>";
      if (is_null($fila['fecha'])){
        echo $fila["fecha"] . "</td><td>";
      }else{
        echo date('d-m',strtotime($fila['fecha'])) . "</td><td>";
      }

      if (is_null($fila['hora'])){
        echo $fila["hora"] . "</td><td>";
      }else{
        echo date('H:i',strtotime($fila['hora'])) . "</td><td>";
      }
      echo $fila["lugar"] . "</td><td>";
      echo $fila["remito"] . "</td><td>";
      echo $fila["paciente"] . "</td><td>";
      echo $fila["principal"] . "</td><td>";
      echo $fila["tecnico"] . "</td><td>";
      echo $fila["servicios"] . "</td><td>";
      echo $fila["descartables"] . "</td><td>";
      echo $fila["factura"] . "</td><td>";
      echo $fila["observaciones"] . "</td><td>";
      if ($fila['protocolo']==1 ){
        echo "<input type='checkbox' checked onclick='return false;'>". "</td><td>";
      }else{
        echo "<input type='checkbox' onclick='return false;'>". "</td><td>";
      }
      if ($fila['certificadodeimplante']==1 ){
        echo "<input type='checkbox' checked onclick='return false;'>". "</td><td>";
      }else{
        echo "<input type='checkbox' onclick='return false;'>". "</td><td>";
      }
      if ($fila['estado']==1 ){
        echo "<input type='checkbox' checked onclick='return false;'>". "</td><td>";
      }else{
        echo "<input type='checkbox' onclick='return false;'>". "</td><td>";
      }
      if ($fila['facturada']==1){
        echo "<input type='checkbox' checked onclick='return false;'>". "</td><td>";
      }else{
        echo "<input type='checkbox' onclick='return false;'>". "</td><td>";
      }
      echo $fila['nro'] . "</td><td>";
      if ($fila['cobrada']){
        echo "<input type='checkbox' checked onclick='return false;'>" . "</td><td>";
      }else{
        echo "<input type='checkbox' onclick='return false;'>" . "</td><td>";
      }

      if($fila['suspendida']==1){
        echo "<input type='checkbox' checked onclick='return false;'>";
      }else{
        echo "<input type='checkbox' onclick='return false;'>";
      }
      
      echo "</td></tr>";
    }
    echo "</table>";
    $resultado -> closeCursor();
    $conn = null;
  } catch (Exception $e) {
    echo $e->getLine() . $e -> getMessage();
  }

}*/


//function muestraCirugias -> muestra cirugias en dos filas 

function mostrarCirugias($sql){
  try {
    require('conexionacirugias.php');
    $resultado = $conn->query($sql);
    echo "<table class='table table-striped table-dark table-responsive' border='1'><tr class='encabezado'><th>";
    echo "</th><th>";
    echo "</th><th>";
    echo "Fecha</th><th>";
    echo "Hora</th><th>";
    echo "Lugar</th><th>";
    echo "Remito</th><th>";
    echo "Paciente</th><th>";
    echo "Médico</th><th>";
    echo "Técnico</th><th>";
    echo "Servicios</th><th>";
    echo "Descartables</th><th>";
    echo "A quién se factura?</th><th>";
    echo "Nro y tipo de factura</th><th>";
    echo "Observaciones</th></th>";
    

    foreach ($resultado as $fila) {
      echo "<tr class='tabla-borde-sup'><td>";
      echo "<a href='modificaCirugia.php?id=" . $fila['id'] .   "'>" . "<img class='img-responsive' src='img/editar.png'>" . "</a></td><td>";
      echo "<a href='eliminarCirugia.php?id=" . $fila['id'] .   "'>" . "<img class='img-responsive' src='img/eliminar.png'>" . "</a></td><td>";
      if (is_null($fila['fecha'])){
        echo $fila["fecha"] . "</td><td>";
      }else{
        echo date('d-m',strtotime($fila['fecha'])) . "</td><td>";
      }

      if (is_null($fila['hora'])){
        echo $fila["hora"] . "</td><td>";
      }else{
        echo date('H:i',strtotime($fila['hora'])) . "</td><td>";
      }
      echo $fila["lugar"] . "</td><td>";
      echo $fila["remito"] . "</td><td>";
      echo $fila["paciente"] . "</td><td>";
      echo $fila["principal"] . "</td><td>";
      echo $fila["tecnico"] . "</td><td>";
      echo $fila["servicios"] . "</td><td>";
      echo $fila["descartables"] . "</td><td>";
      echo $fila["factura"] . "</td><td>";
      echo $fila["nro"] . "</td><td>";
      echo $fila["observaciones"] . "</td></tr><tr class='tabla-borde-inf'>";
      echo "<td colspan='2' class='ultimaModificacion'>Última Modificación: ";
      //echo $fila['ultimaModificacion'];
      echo date('d/m/y H:i',strtotime($fila['ultimaModificacion']));
      echo "</td>";
      echo "<td colspan='12'>";
      if ($fila['protocolo']==1 ){
        echo "<label class='tabla-elemento-check'>Protocolo<input type='checkbox' checked onclick='return false;'></label>";
      }else{
        echo "<label class='tabla-elemento-check'>Protocolo<input type='checkbox' onclick='return false;'></label>";
      }
      if ($fila['certificadodeimplante']==1 ){
        echo "<label class='tabla-elemento-check'>Remito/Certificado de implante<input type='checkbox' checked onclick='return false;'></label>";
      }else{
        echo "<label class='tabla-elemento-check'>Remito/Certificado de implante<input type='checkbox' onclick='return false;'></label>";
      }
      if ($fila['estado']==1 ){
        echo "<label class='tabla-elemento-check'>Realizada<input type='checkbox' checked onclick='return false;'></label>";
      }else{
        echo "<label class='tabla-elemento-check'>Realizada<input type='checkbox' onclick='return false;'></label>";
      }
      if ($fila['facturada']==1){
        echo "<label class='tabla-elemento-check'>Facturada<input type='checkbox' checked onclick='return false;'></label>";
      }else{
        echo "<label class='tabla-elemento-check'>Facturada<input type='checkbox' onclick='return false;'></label>";
      }
      
      if ($fila['cobrada']){
        echo "<label class='tabla-elemento-check'>Cobrada<input type='checkbox' checked onclick='return false;'></label>" ;
      }else{
        echo "<label class='tabla-elemento-check'>Cobrada<input type='checkbox' onclick='return false;'></label>" ;
      }

      if($fila['suspendida']==1){
        echo "<label class='tabla-elemento-check'>Suspendida<input type='checkbox' checked onclick='return false;'></label>";
      }else{
        echo "<label class='tabla-elemento-check'>Suspendida<input type='checkbox' onclick='return false;'></label>";
      }
      
      echo "</td></tr>";
    }
    echo "</table>";
    $resultado -> closeCursor();
    $conn = null;
  } catch (Exception $e) {
    echo $e->getLine() . $e -> getMessage();
  }

}

//Muestra cirugias usando details
/*
function mostrarCirugias($sql){
  try {
    require('conexionacirugias.php');
    $resultado = $conn->query($sql);
    echo "<table class='table table-striped table-dark table-responsive' border='1'><tr class='encabezado'><th>";
    echo "</th><th>";
    echo "</th><th>";
    echo "Fecha</th><th>";
    echo "Hora</th><th>";
    echo "Lugar</th><th>";
    echo "Remito</th><th>";
    echo "Paciente</th><th>";
    echo "Principal</th><th>";
    echo "Técnico</th><th>";
    echo "Servicios</th><th>";
    echo "Descartables</th><th>";
    echo "A quién se factura?</th><th>";
    //echo "Observaciones</th><th>";
    echo "Nro y tipo de factura</th></th>";
    

    foreach ($resultado as $fila) {
      echo "<tr class='tabla-borde-sup'><td>";
      echo "<a href='modificaCirugia.php?id=" . $fila['id'] .   "'>" . "<img class='img-responsive' src='img/editar.png'>" . "</a></td><td>";
      echo "<a href='eliminarCirugia.php?id=" . $fila['id'] .   "'>" . "<img class='img-responsive' src='img/eliminar.png'>" . "</a></td><td>";
      if (is_null($fila['fecha'])){
        echo $fila["fecha"] . "</td><td>";
      }else{
        echo date('d-m',strtotime($fila['fecha'])) . "</td><td>";
      }

      if (is_null($fila['hora'])){
        echo $fila["hora"] . "</td><td>";
      }else{
        echo date('H:i',strtotime($fila['hora'])) . "</td><td>";
      }
      echo $fila["lugar"] . "</td><td>";
      echo $fila["remito"] . "</td><td>";
      echo $fila["paciente"] . "</td><td>";
      echo $fila["principal"] . "</td><td>";
      echo $fila["tecnico"] . "</td><td>";
      echo $fila["servicios"] . "</td><td>";
      echo $fila["descartables"] . "</td><td>";
      echo $fila["factura"] . "</td><td>";
      //echo $fila["observaciones"] . "</td><td>";
      echo $fila['nro'] . "</td><tr class='tabla-borde-inf'>";
      echo "<td colspan='2' class='ultimaModificacion'>Última Modificación: ";
      //echo $fila['ultimaModificacion'];
      echo date('d/m/y H:i',strtotime($fila['ultimaModificacion']));
      echo "</td>";
      echo "<td colspan='13'>";
      if ($fila['protocolo']==1 ){
        echo "<label class='tabla-elemento-check'>Protocolo<input type='checkbox' checked onclick='return false;'></label>";
      }else{
        echo "<label class='tabla-elemento-check'>Protocolo<input type='checkbox' onclick='return false;'></label>";
      }
      if ($fila['certificadodeimplante']==1 ){
        echo "<label class='tabla-elemento-check'>Remito/Certificado de implante<input type='checkbox' checked onclick='return false;'></label>";
      }else{
        echo "<label class='tabla-elemento-check'>Remito/Certificado de implante<input type='checkbox' onclick='return false;'></label>";
      }
      if ($fila['estado']==1 ){
        echo "<label class='tabla-elemento-check'>Realizada<input type='checkbox' checked onclick='return false;'></label>";
      }else{
        echo "<label class='tabla-elemento-check'>Realizada<input type='checkbox' onclick='return false;'></label>";
      }
      if ($fila['facturada']==1){
        echo "<label class='tabla-elemento-check'>Facturada<input type='checkbox' checked onclick='return false;'></label>";
      }else{
        echo "<label class='tabla-elemento-check'>Facturada<input type='checkbox' onclick='return false;'></label>";
      }
      
      if ($fila['cobrada']){
        echo "<label class='tabla-elemento-check'>Cobrada<input type='checkbox' checked onclick='return false;'></label>" ;
      }else{
        echo "<label class='tabla-elemento-check'>Cobrada<input type='checkbox' onclick='return false;'></label>" ;
      }

      if($fila['suspendida']==1){
        echo "<label class='tabla-elemento-check'>Suspendida<input type='checkbox' checked onclick='return false;'></label>";
      }else{
        echo "<label class='tabla-elemento-check'>Suspendida<input type='checkbox' onclick='return false;'></label>";
      }
      
      echo "</td></tr></tr>";
    }
    echo "</table>";
    $resultado -> closeCursor();
    $conn = null;
  } catch (Exception $e) {
    echo $e->getLine() . $e -> getMessage();
  }

}
*/

//devuelve cantidad de registros encontrados 
function registrosEncontrados($sql){
  try {
    require('conexionacirugias.php');
    $resultado = $conn -> query($sql);
    $nro = $resultado -> rowCount();
    $resultado -> closeCursor();
    $conn = null;
    return $nro;
  } catch (Exception $e) {
    $e -> getLine() . $e -> getMessage();
    return 0;
  }
}

//Devuelve la cantidad de registros encontrados para una sentencia sql e imprime en pantalla
function muestraRegistrosEncontrados($sql){
  $resultadoRegistros = registrosEncontrados($sql);
  if($resultadoRegistros != 0){
    echo "<p class='h5 valoresEncontrados'> Registros encontrados: " . $resultadoRegistros . "</p>";

  }
}

//Devuelve details para expandir la tabla si hay más de una cirugía
function muestraCirugiasDetails($sql,$textoSummary){
  $nro = registrosEncontrados($sql);
  if ($nro > 0){
    echo "<details>";
    echo "<summary class='h3'>".$textoSummary;
    echo "  (".$nro.")";
    echo"</summary>";
    mostrarCirugias($sql);
    echo "</details>";
  }
}

//fn muestraSummaryYRadioButton
//Esta función crea y muestra un summary con los correspondientes radio buttons para las opciones
function muestraOpciones($campo,$tipo=null){
  try {
    $sql = "SELECT DISTINCT( ".$campo.") FROM cirugias ORDER BY " . $campo;
    require('conexionacirugias.php');
    echo "<details>";
    echo "<summary class='h5'>".ucfirst($campo)."</summary>";
    $resultado = $conn -> query($sql);
      foreach($resultado as $fila){
        if($tipo==null){
          if ($fila[$campo]==''){
            echo '<input type="text" name="' . $campo . '" value="Otro:"><br>';
          }else{
          echo '<input type="radio" name="' . $campo . '" value="' . $fila[$campo] .'">';
          echo "<label>".$fila[$campo]."</label><br>";
        }
      }else{
        if ($fila[$campo]==''){
          echo '<input type="text" name="' . $campo . '" value="Otro:"><br>';
        }else{
        echo '<input type="checkbox" name="' . $campo .'"[] value="' . $fila[$campo] .'">';
        echo "<label>".$fila[$campo]."</label><br>";
      }
      }
      }
      echo"</details>";
    $resultado -> closeCursor();
    $conn = null;
  } catch (Exception $e) {
    $e -> getLine() . $e -> getMessage();
    return 0;
  }
 
}

function asignaValorACampo($campo){
  if($campo == 'Otro:'){
    echo 'Ingresa al fi';
    $campo='';
  }
  return $campo;
}

?>