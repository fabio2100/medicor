<?php
  require_once("models/productosModelo.php");

  $producto = new productosModel();

  $matrizProductos = $producto -> getProductos();

  require_once("views/productosView.php");


?>