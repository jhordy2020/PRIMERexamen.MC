<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloVentas.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: '.get_urlBase('index.php'));
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idVenta = intval($_GET['id']); // Obtener el ID de la venta
    $modeloVentas = new modeloVentas();

    try {
        $modeloVentas->eliminarVentaPorId($idVenta); // Llama al modelo para eliminar la venta
        header('Location: ' . get_urlBase('controllers/controladorVerVentas.php?mensaje=' . urlencode("Venta eliminada con éxito.")));
        exit;
    } catch (PDOException $e) {
        header('Location: ' . get_urlBase('controllers/controladorVerVentas.php?mensaje=' . urlencode("Error al eliminar la venta: " . $e->getMessage())));
        exit;
    }
} else {
    header('Location: ' . get_urlBase('controllers/controladorVerVentas.php?mensaje=' . urlencode("No se especificó una venta válida para eliminar.")));
    exit;
}
?>