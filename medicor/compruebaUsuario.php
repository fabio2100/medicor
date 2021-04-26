<?php
  session_start();
  $user = htmlentities($_POST['usuario']);
  $contra = htmlentities($_POST['contra']);
  $cont = 0;

  $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
  require('conexionacirugias.php');
  $resultado = $conn -> prepare($sql);
  $resultado -> execute(array(":usuario"=>$user));
  while ($registro = $resultado -> fetch(PDO::FETCH_ASSOC)){
    if (password_verify($contra,$registro['password'])){
      $cont++;
    }
  }

  if ($cont > 0){
    $_SESSION['usuario']=$_POST['usuario'];
    setcookie('usuario',$_POST['usuario'],time()+60*4);
    $resultado -> closeCursor();
    $conn = null;
    echo "<meta http-equiv='refresh' content ='0;url=inicio.php'>";
  }else{
    $resultado -> closeCursor();
    $conn = null;
    ?>
    <script type='text/javascript'>
      alert("Usuario o contraseña incorrectos");
      window.location.replace("index.php");
    </script>
    <?php
    //echo "<meta http-equiv='refresh' content ='0;url=index.html'>";
  }
?>