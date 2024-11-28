<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modelousuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaEliminarUsuario.php';

if (isset($_SESSION["txtusername"])) {
    header('Location: ' . get_urlBase('index.php'));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = $_POST["datusuario"];

    $mensaje='';
    if($tmpdatusuario){
       $modeloUsuario = new modeloUsuario(); 
       try {
        $modeloUsuario ->eliminarUsuarioPorNombre($tmpdatusuario);
        
        $mensaje="usuario Eliminado con exito <br>";
      } catch (PDOException $e) {
        $mensaje = "hubo un error ..<br>".$e->getMessage();
      }
      
    }
    mostrarFormularioEliminar($mensaje);
    
} else {
    mostrarFormularioEliminar();
}
