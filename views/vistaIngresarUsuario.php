<?php
 function mostrarFormularioIngreso($mensaje){
    if (empty ($mensaje)){
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Enlazamos el archivo CSS (reemplaza la ruta según tu estructura de directorios) -->
    <link rel="stylesheet" href="<?php echo get_UrlBase('css/estilodashboard.css') ?>">
</head>
<form action="/controllers/controladorIngresarUsuarios.php" method="POST">
  <label for="datusuario">Usuario </label>
  <input type="text" name="datusuario" id="datusuario" autocomplete="off">
  <br>
  <label for="datpassword">Password</label>
  <input type="password" name="datpassword" id="datpassword" autocomplete="off">
  <br>
  <label for="datperfil"> Perfil </label>
  <input type="text" name="datperfil" id="datperfil" autocomplete="off">
  <br>
  <button type="submit">Registrar Usuario</button>
</form>

<?php
    }else {
        echo $mensaje;
    }
 }
?>