<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'].'/models/modeloUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/views/vistaEliminarUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: '.get_urlBase('index.php'));
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = $_POST["datusuario"];

    $mensaje='';
    if($tmpdatusuario){
        $modeloUsuario = new modeloUsuario();
        try{
            $modeloUsuario->eliminarUsuarioPorNombre($tmpdatusuario);
            $mensaje="Usuario Eliminado con Exito...";
        }catch(PDOException $e){
            $message = "<p class='message error'>Hubo un error: " . $e->getMessage() . "</p>";
        }
    }
    mostrarFormularioEliminar($mensaje);
}else{
    mostrarFormularioEliminar();

}

?>