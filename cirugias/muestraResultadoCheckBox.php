<?php
	
	if(isset($_GET['enviar'])){
		$aspirador = $_GET['aspirador'];

		if ($aspirador) {
			echo "Aspirador seleccionado";
		}else{
			echo "Aspirador NO seleccionado";
		}
	}else{
		echo "No llegan datos";
	}


?>