<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloVentas.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/views/vistaIngresarVenta.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: '.get_urlBase('index.php'));
    exit;
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si todos los campos obligatorios están presentes
    if (!isset($_POST["datproducto"], $_POST["datcantidad"], $_POST["datdescripcion"], $_POST["datfecha"])) {
        $mensaje = "Por favor, completa todos los campos obligatorios.";
        mostrarFormularioIngresoVenta($mensaje);
        exit;
    }

    // Asignar los valores con verificación de existencia
    $tmpProducto = isset($_POST["datproducto"]) ? trim($_POST["datproducto"]) : '';
    $tmpCantidad = isset($_POST["datcantidad"]) ? trim($_POST["datcantidad"]) : '';
    $tmpDescripcion = isset($_POST["datdescripcion"]) ? trim($_POST["datdescripcion"]) : '';
    $tmpFecha = isset($_POST["datfecha"]) ? trim($_POST["datfecha"]) : '';
    $tmpTotal = isset($_POST["dattotal"]) ? trim($_POST["dattotal"]) : 0;

    // Validar que los campos no estén vacíos después de la asignación
    if (empty($tmpProducto) || empty($tmpCantidad) || empty($tmpDescripcion) || empty($tmpFecha)) {
        $mensaje = "Por favor, completa todos los campos obligatorios.";
        mostrarFormularioIngresoVenta($mensaje);
        exit;
    }

    $modeloVentas = new modeloVentas();

    try {
        $modeloVentas->insertarVenta($tmpProducto, $tmpCantidad, $tmpDescripcion, $tmpTotal, $tmpFecha);
        header('Location: '.get_urlBase('controllers/controladorVerVentas.php'));
        exit;
    } catch (PDOException $e) {
        $mensaje = "Hubo un error al registrar la venta: <br>".$e->getMessage();
    }
}

// Mostrar el formulario para ingresar una venta
mostrarFormularioIngresoVenta($mensaje);
?>