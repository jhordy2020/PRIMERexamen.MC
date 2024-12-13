<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/views/vistaIngresarUsuario.php';
if (!isset($_SESSION["txtusername"])) {
    header('Location: '.get_urlBase('index.php'));
    exit;
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["datusuario"], $_POST["datpassword"], $_POST["datperfil"])) {
        $mensaje = "Por favor, completa todos los campos obligatorios.";
        mostrarFormularioIngreso($mensaje);
        exit;
    }

    $tmpdatusuario = trim($_POST["datusuario"]);
    $tmpdatpassword = trim($_POST["datpassword"]);
    $tmpdatperfil = trim($_POST["datperfil"]);

    $modeloUsuario = new modeloUsuario();

    try {
        $modeloUsuario->insertarUsuario($tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
        header('Location: '.get_urlBase('controllers/controladorUsuario.php'));
        exit;
    } catch (PDOException $e) {
        $mensaje = "Hubo un error al registrar el usuario: <br>".$e->getMessage();
    }
}
mostrarFormularioIngreso($mensaje);
?>
