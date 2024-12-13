<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: '.get_urlBase('index.php'));
    exit;
}
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idUsuario = intval($_GET['id']); 
    $modeloUsuario = new modeloUsuario();

    try {
        $modeloUsuario->eliminarUsuarioPorId($idUsuario);
        header('Location: ' . get_urlBase('controllers/controladorUsuario.php?mensaje=' . urlencode("Usuario eliminado con éxito.")));
        exit;
    } catch (PDOException $e) {
        header('Location: ' . get_urlBase('controllers/controladorUsuario.php?mensaje=' . urlencode("Error al eliminar usuario: " . $e->getMessage())));
        exit;
    }
} else {
    header('Location: ' . get_urlBase('controllers/controladorUsuario.php?mensaje=' . urlencode("No se especificó un usuario válido para eliminar.")));
    exit;
}
?>
