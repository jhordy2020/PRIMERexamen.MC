<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaActualizarUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_urlBase('index.php'));
    exit;
}

$modeloUsuario = new modeloUsuario(); 
$mensaje = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if (isset($_POST['custId'])) {
        $tsmpcustID = intval($_POST["custId"]); 
        $tmpdatusuario = $_POST["datusuario"];
        $tmpdatpassword = $_POST["datpassword"];
        $tmpdatperfil = $_POST["datperfil"];
        try {
            $modeloUsuario->actualizarUsuario($tsmpcustID, $tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
            $mensaje = "Actualización realizada con éxito.";
        } catch (PDOException $e) {
            $mensaje = "Error al actualizar el usuario: " . $e->getMessage();
        }
        mostrarFormularioBusqueda($mensaje);
    } else {
        $tmpdatusuario = $_POST["datusuario"];
        try {
            $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);
            if ($usuario) {
                mostrarFormularioEdicion($usuario[0]); 
            } else {
                $mensaje = "Usuario no encontrado.";
                mostrarFormularioBusqueda($mensaje);
            }
        } catch (PDOException $e) {
            $mensaje = "Error al buscar el usuario: " . $e->getMessage();
            mostrarFormularioBusqueda($mensaje);
        }
    }
} else {
    mostrarFormularioBusqueda();
}
?>
