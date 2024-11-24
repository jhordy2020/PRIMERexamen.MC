<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/views/vistaIngresarUsuario.php';

if (isset($_SESSION["txtusername"])) {
  header('Location: ' . get_urlBase('index.php'));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = $_POST["datusuario"];
    $tmpdatpassword = $_POST["datpassword"];
    $tmpdatperfil = $_POST["datperfil"];
  
    $modeloUsuario = new modeloUsuario();
  
    try {
      $modeloUsuario ->insertarUsuario($tmpdatusuario,$tmpdatpassword,$tmpdatperfil);
      
      echo "usuario registrado con exito <br>";
    } catch (PDOException $e) {
      $mensaje = "hubo un error ..<br>".$e->getMessage();
    }
    exit(); //corta la ejecucion
  }
  mostrarFormularioIngreso($mensaje);