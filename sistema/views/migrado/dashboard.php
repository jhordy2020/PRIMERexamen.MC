<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/models/connect/conexion.php';
 
session_start();

if (!isset($_SESSION["txtusername"])){
    header('Location: '.get_urlBase('index.php'));
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/estilodashboard.css') ?>">
    <style>
        /* Estilo para el mensaje de carga */
        #loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.5em;
            z-index: 1000;
        }

        /* Ocultar el contenido del dashboard mientras se muestra el mensaje de carga */
        .dashboard-content {
            display: none;
        }
    </style>
</head>
<body>
    <!-- Mensaje de carga -->
    <div id="loading">Iniciando sesión...</div>

    <!-- Contenido del dashboard -->
    <div class="dashboard-content">
        <div class="menu">
            <h3>Menu</h3>
            <ul>
                <li> <a href="?opcion=inicio"> Inicio </a> </li>
                <li> <a href="?opcion=Ver"> Ver </a> </li>
                <li> <a href="?opcion=Ingresar"> Ingresar </a> </li>
                <li> <a href="?opcion=Modificar"> Modificar </a> </li>
                <li> <a href="?opcion=Eliminar"> Eliminar </a> </li>
                <li> <a href="<?php echo get_Controllers('logout.php')?>"> Salir del Sistema </a> </li>
            </ul>
        </div>

        <div class="contenido">
            <?php
            if (isset($_GET["opcion"])) {
                $opcion = $_GET["opcion"];
                echo $opcion;
            }
            ?>
        </div>
    </div>

    <!-- JavaScript para manejar el mensaje de carga -->
    <script>
        window.addEventListener('load', function() {
            // Ocultar el mensaje de carga y mostrar el contenido del dashboard después de 2 segundos
            setTimeout(function() {
                document.getElementById('loading').style.display = 'none';
                document.querySelector('.dashboard-content').style.display = 'block';
            }, 2000); // Cambia el tiempo si quieres que sea más rápido o más lento
        });
    </script>
</body>
</html>