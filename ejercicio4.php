<?php
$a = $_GET['numa'];
$b = $_GET['numb'];

if (isset($_GET['operacion'])){
  $operaciones = $_GET['operacion'];
  echo "Ingresaa al if";
}

if (isset($operaciones)) {

    foreach($operaciones as $operacion){
        echo $operacion;
    }
};
//Ejercicio
echo "Los números introducidos son: $a y $b <br/>";
?>