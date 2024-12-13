<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/modeloUsuario.php';

// Redirige al dashboard si ya hay sesión iniciada.
if (isset($_SESSION["txtusername"])) {
    header('Location: ' . get_controllers('controladorDashboard.php'));
    exit();
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $v_username = $_POST["txtusername"] ?? '';
    $v_password = $_POST["txtpassword"] ?? '';


    $modeloUsuario = new modeloUsuario();
    $credenciales = $modeloUsuario->ValidarUsuario($v_username, $v_password);
    if ($credenciales) {
        $_SESSION["txtusername"] = $v_username;
        $_SESSION["txtpassword"] = $v_password;

        header('Location: ' . get_controllers('controladorDashboard.php'));
        exit();
    } else {
        // Redirección a clave equivocada
        header('Location: ' . get_views('claveequivocada.php'));
        exit();
    }
}

//include get_views_disk('index.php');