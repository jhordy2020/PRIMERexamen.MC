<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Incluir archivos necesarios
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloVentas.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/views/vistaVentas.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION["txtusername"])) {
    header('Location: '.get_urlBase('index.php'));
    exit(); // Asegúrate de detener el script si el usuario no está autenticado
}

// Instanciar el modelo de ventas
$modeloVentas = new modeloVentas();

// Obtener las ventas desde el modelo
$ventas = $modeloVentas->obtenerVentas();

// Mostrar las ventas utilizando la vista
mostrarVentas($ventas);
?>