<?php

session_start();

if (isset($_SESSION["txtusername"])) {
  header('Location: ' . get_urlBase('index.php'));
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conect/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validar y asignar datos del formulario
  $tmpdatusuario = $_POST["datusuario"] ?? null;
  $tmpdatpassword = $_POST["datpassword"] ?? null;
  $tmpdatperfil = $_POST["datperfil"] ?? null;

  if ($tmpdatusuario && $tmpdatpassword && $tmpdatperfil) {
    // Crear conexión con la base de datos
    $conexion = new conexion(DB_HOST, DB_NAME, DB_USER, DB_PASS);
    $pdo = $conexion->obtenerConexion();

    try {
      // Insertar datos en la tabla "usuarios"
      $sentencia = $pdo->prepare("INSERT INTO usuarios (username, password, perfil) VALUES (?, ?, ?)");
      $sentencia->execute([$tmpdatusuario, $tmpdatpassword, $tmpdatperfil]);
      echo "Usuario registrado con éxito<br>";
    } catch (PDOException $e) {
      echo "Hubo un error al registrar el usuario:<br>";
      echo $e->getMessage();
    }
  } else {
    echo "Por favor, completa todos los campos.<br>";
  }
  exit();
}

//$query = $pdo->query("select id,username,password,perfil from usuarios");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EXAMEN MC</title>
  <link rel="stylesheet" href="<?php echo get_UrlBase('css/estiloingresar.css') ?>">
</head>

<form action="" method="POST">
  <label for="datusuario">Usuario </label>
  <input type="text" name="datusuario" id="datusuario">
  <br>
  <label for="datpassword">Password</label>
  <input type="password" name="datpassword" id="datpassword">
  <br>
  <label for="datperfil"> Perfil </label>
  <input type="text" name="datperfil" id="datperfil">
  <br>
  <button type="submit">Registrar Usuario</button>
</form>