<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>Carga de nueva cirugía</title>
</head>
<body>
	<form action="lec42b.php" method="get">
		<div>
			<label>Fecha: <input type="date" name="fecha"></label>
			<label>Lugar: <input type="text" name="lugar"></label>
		</div>
		<div>
			<label>Principal: <input type="text" name="principal"></label>
			<label>Ayudante: <input type="text" name="ayudante"></label>
		</div>
		<div>
			<label>Paciente: <input type="text" name="paciente"></label>
			<br>
			<label>Servicios: <input type="textarea" name="servicios"></label>
		</div>
		<div>
			<label>Número mensual de cirugía: <input type="number" name="nro"></label>
			<label>Tipo de cirugía: <input type="text" name="tipo"></label>
		</div>
		<input type="submit" name="enviando" value="Cargar en base de datos">

	</form>
<?php
	



?>
</body>
</html>
