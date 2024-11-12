<?php
  session_start();

  if (isset( $_SESSION["txtusername"])){
    header('Location: http://127.0.0.1/sistema/dashboard.php');
  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilodashboard.css">
</head>
<body>
    
    <div class="menu">
        <h3>Este es el menu</h3>
        <ul>
          <l1><a href="?opcion=inicio">inicio</a></l1><br>
          <l1><a href="?opcion=ver "> ver </a></l1><br>
          <l1><a href="?opcion=ingresar">ingresar</a></l1><br>
          <l1><a href="?opcion=modificar">modificar</a></l1><br>
          <l1><a href="?opcion=eliminar">eliminar  </a></l1><br>
          <l1><a href="http://127.0.0.1/sistema/">salir</a></l1>

        </ul>
    </div>
   
    <div class ="contenido">
       <?php
        if(isset($_GET["opcion"])){
          $opcion = $_GET["opcion"];

          echo $opcion;
        }
       ?>

    </div>


    
</body>
</html>