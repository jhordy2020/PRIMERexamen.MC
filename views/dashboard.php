<?php

session_start();

if (isset($_SESSION["txtusername"])) {
  header('Location: ' . get_urlBase('index.php'));
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conect/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="<?php echo get_UrlBase('css/estilodashboard.css') ?>">
</head>

<body>
  <div class="menu">
    <h3>Este es el menú</h3>
    <ul>
      <l1><a href="?opcion=inicio">Inicio</a></l1><br>
      <l1><a href="?opcion=ver">Ver</a></l1><br>
      <l1><a href="?opcion=ingresar">Ingresar</a></l1><br>
      <l1><a href="?opcion=modificar">Modificar</a></l1><br>
      <l1><a href="?opcion=eliminar">Eliminar</a></l1><br>
      <!-- Enlace "Salir" -->
      <li><a href="<?php echo get_controllers('logout.php') ?>">salir</a></li>
    </ul>
  </div>

  <div class="contenido">
    <?php
    if (isset($_GET["opcion"])) {
      $opcion = $_GET["opcion"];

      switch ($opcion) {
        case 'inicio':
          echo "<h1>BIENVENIDOS AL SISTEMA</h1>";
          break;
        case 'ver':
          echo "<iframe src='" . get_views("verdatos.php") . "'></iframe>";
          break;
        case 'ingresar':
          echo "<iframe src='" . get_views("ingresardatos.php") . "'></iframe>";
          break;
        case 'modificar':
          echo "<iframe src='" . get_views("modificardatos.php") . "'></iframe>";
          break;
        case 'eliminar':
          echo "<iframe src='" . get_views("eliminardatos.php") . "'></iframe>";
          break;
      }
      echo $opcion;
    }
    ?>
  </div>
</body>

</html>