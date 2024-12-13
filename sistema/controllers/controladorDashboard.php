<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';

if (!isset($_SESSION['txtusername'])) {
    header('Location: ' . get_views('vistaLogin.php'));
    exit();
}

$opcion = $_GET['opcion'] ?? 'Inicio';
$contenido = '';
switch ($opcion) {
    case 'Inicio':
        $contenido = "<h1>Bienvenido al Sistema</h1>";
        break;
    case 'Ver':
        $contenido = "<iframe src='" . get_controllers('controladorUsuario.php') . "'></iframe>";
        break;
    case 'Ingresar':
        $contenido = "<iframe src='" . get_controllers('controladorIngresarUsuario.php') . "'></iframe>";
        break;
    case 'Modificar':
        $contenido = "<iframe src='" . get_controllers('controladorActualizarUsuario.php') . "'></iframe>";
        break;
    case 'Eliminar':
        $contenido = "<iframe src='" . get_controllers('controladorEliminarUsuario.php') . "'></iframe>";
        break;

    // Casos para ventas
    case 'IngresarVentas':
        $contenido = "<iframe src='" . get_controllers('controladorIngresarVenta.php') . "'></iframe>";
        break;
    case 'VerVentas':
        $contenido = "<iframe src='" . get_controllers('controladorVerVentas.php') . "'></iframe>";
        break;
    case 'ModificarVentas':
        $contenido = "<iframe src='" . get_controllers('controladorModificarVenta.php') . "'></iframe>";
        break;
    case 'EliminarVentas':
        $contenido = "<iframe src='" . get_controllers('controladorEliminarVenta.php') . "'></iframe>";
        break;

    default:
        $contenido = "<h1>Opción no válida</h1>";
        break;
}

// Incluir la vista del dashboard
include get_views_disk('vistaDashboard.php');
?>