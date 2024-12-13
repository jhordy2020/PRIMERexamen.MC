<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaActualizarUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: /index.php');
    exit;
}

$modeloUsuario = new modeloUsuario();
$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idUsuario = intval($_GET['id']); 

    try {
        $usuario = $modeloUsuario->obtenerUsuarioPorId($idUsuario);
        if ($usuario) {
            mostrarFormularioEdicion($usuario);
        } else {
            $mensaje = "Usuario no encontrado.";
            mostrarMensajeError($mensaje);
        }
    } catch (PDOException $e) {
        $mensaje = "Error al buscar el usuario: " . $e->getMessage();
        mostrarMensajeError($mensaje);
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = intval($_POST['custId']);
    $username = $_POST['datusuario'];
    $password = $_POST['datpassword'];
    $perfil = $_POST['datperfil'];
    try {
        $modeloUsuario->actualizarUsuario($idUsuario, $username, $password, $perfil);
        $mensaje = "Usuario actualizado con éxito.";
    } catch (PDOException $e) {
        $mensaje = "Error al actualizar el usuario: " . $e->getMessage();
    }
    header('Location: /controllers/controladorUsuario.php?mensaje=' . urlencode($mensaje));
    exit;
} else {
    header('Location: /controllers/controladorUsuario.php');
    exit;
}

function mostrarMensajeError($mensaje) {
    echo "<div style='color: red; font-weight: bold;'>$mensaje</div>";
}
?>
