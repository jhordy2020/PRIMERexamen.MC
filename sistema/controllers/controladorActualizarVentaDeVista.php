<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloVentas.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaActualizarVenta.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: /index.php');
    exit;
}

$modeloVentas = new modeloVentas();
$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idVenta = intval($_GET['id']); 

    try {
        $venta = $modeloVentas->obtenerVentaPorId($idVenta);
        if ($venta) {
            mostrarFormularioEdicion($venta); // Mostrar formulario de edición con los datos de la venta
        } else {
            $mensaje = "Venta no encontrada.";
            mostrarMensajeError($mensaje);
        }
    } catch (PDOException $e) {
        $mensaje = "Error al buscar la venta: " . $e->getMessage();
        mostrarMensajeError($mensaje);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idVenta = intval($_POST['idVenta']);
    $producto = $_POST['datproducto'];
    $cantidad = intval($_POST['datcantidad']);
    $descripcion = $_POST['datdescripcion'];
    $fecha = $_POST['datfecha'];
    $total = $_POST['dattotal'];

    try {
        $modeloVentas->actualizarVenta($idVenta, $producto, $cantidad, $descripcion, $total, $fecha);
        $mensaje = "Venta actualizada con éxito.";
    } catch (PDOException $e) {
        $mensaje = "Error al actualizar la venta: " . $e->getMessage();
    }
    header('Location: /controllers/controladorVerVentas.php?mensaje=' . urlencode($mensaje));
    exit;
} else {
    header('Location: /controllers/controladorVerVentas.php');
    exit;
}

function mostrarMensajeError($mensaje) {
    echo "<div style='color: red; font-weight: bold;'>$mensaje</div>";
}
?>