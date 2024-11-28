<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaActualizarUsuario.php';

if (isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit(); // Asegúrate de salir después de redirigir
}

$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $modeloUsuario = new modeloUsuario();

    if (isset($_POST['custId'])) {
        $tmpcustID = $_POST["custId"];
        $tmpdatusuario = $_POST["datusuario"];
        $tmpdatpassword = $_POST["datpassword"];
        $tmpdatperfil = $_POST["datperfil"];
        $modeloUsuario->actualizarUsuario($tmpcustID,$tmpdatusuario,$tmpdatpassword,$tmpdatperfil);
        echo "Actualizacion con exito....";
    } else {
        $tmpdatusuario = $_POST["datusuario"];
        $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);
        if ($usuario){

            mostrarFormularioEdicion($usuario);
        }else {
            mostrarFormularioBusqueda("usuario no encontrado...");
        }
    }
} else {
    mostrarFormularioBusqueda();
}
?>
