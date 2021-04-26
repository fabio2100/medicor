<?php
  $usuario = $_POST['usuario'];
  $password = $_POST['contra'];

  $passCifrado = password_hash($password,PASSWORD_DEFAULT);

  try {
    $sql = "INSERT INTO usuarios (usuario,password) VALUES (:usuario,:password)";
    require('conexionacirugias.php');
    $resultado = $conn -> prepare($sql);
    $resultado -> execute(array(":usuario"=>$usuario,":password"=>$passCifrado));
    echo "Bien hecho";
    $resultado -> closeCursor();
    $conn = null;
  } catch (Exception $e) {
    echo "Linea: " . $e -> getLine() . " Mensaje: " . $e->getMessage();
  }
?>