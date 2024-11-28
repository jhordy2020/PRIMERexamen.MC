<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaIngresarUsuario.php';

if (isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

$mensaje = "";
$recargar = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = trim($_POST["datusuario"]);
    $tmpdatpassword = trim($_POST["datpassword"]);
    $tmpdatperfil = trim($_POST["datperfil"]);

    // Validación del campo "Perfil"
    if (!preg_match("/^[a-zA-Z\s]+$/", $tmpdatperfil)) {
        $mensaje = "Perfil no válido <br>";
    } else {
        $modeloUsuario = new modeloUsuario();
        try {
            $modeloUsuario->insertarUsuario($tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
            $mensaje = "Usuario registrado con éxito <br>";
            $recargar = true; // Indica que se recargue el formulario
        } catch (PDOException $e) {
            $mensaje = "Hubo un error: " . $e->getMessage() . "<br>";
        }
    }
}

mostrarFormularioIngreso($mensaje);

if ($recargar) {
    echo '<script>setTimeout(function() {window.location.href = window.location.href; }, 2000);</script>';
}
