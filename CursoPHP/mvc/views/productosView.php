<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de productos</title>
  <style>
    td{border: 1px dotted #FF0000;}
  </style>
</head>
<body>

  <tabLe>
    <tr><td>Nombre Artículo</td>

  <?php

    foreach ($matrizProductos as $registro){
      echo "<tr><td>".$registro['NOMBREARTICULO']."</td></tr>";
    }

  ?>
  </table>
</body>
</html>