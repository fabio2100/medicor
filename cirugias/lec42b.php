<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>Resultado de añadir nuevo registro</title>
</head>
<body>
<?php
require("conexionacirugias.php");

$fecha = $_GET["fecha"];
$lugar = $_GET["lugar"];
$principal = $_GET["principal"];
$ayudante = $_GET["ayudante"];
$paciente = $_GET["paciente"];
$servicios = $_GET["servicios"];
$tipo = $_GET["tipo"];
$numeromes = $_GET["nro"];

$conn = mysqli_connect($db_host,$db_user,$db_password);

	if (mysqli_connect_errno()){
		echo "Fallo al conectar con la base de datos";
		exit();
		//Para imposibilidad de conectarse a BBDD
	}

	mysqli_select_db($conn,$db_nombrebbdd) or die ("No se encuentra la BBDD"); 			//Selección de bbdd, más fácil así parece 


	mysqli_set_charset($conn,"utf8");				//Para decodificación de caracteres latinos(?)

	$carga = "INSERT INTO cirugias(Dia,Lugar,Cirugia,Principal,Ayudante,NumeroMensual,Paciente,Servicios) VALUES 
	('$fecha','$lugar','$tipo','$principal','$ayudante',$numeromes,'$paciente','$servicios')";

	if (mysqli_query($conn, $carga)) {
      echo "Nuevo registro añadido exitosamente <br>";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


	mysqli_close($conn);


    header("location:busca.php?abuscar=&enviando=Enviar");


?>
</body>
</html>
