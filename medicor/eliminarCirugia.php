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
$id = $_GET['id'];
require('funciones.php');
eliminarCirugia($id);
echo "<meta http-equiv='refresh' content ='0;url=inicio.php'>";
?>