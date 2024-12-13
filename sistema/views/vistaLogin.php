<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/estiloindex.css'); ?>">
</head>
<body>
    <div class="login-container">
        <h2 class="login-header">LOGIN</h2>
        <form class="login-form" action="<?php echo get_urlBase('controllers/controladorValidarSesion.php'); ?>" method="POST" autocomplete="off">
            <div class="form-group">
                <label for="txtusername">Username</label>
                <input type="text" id="txtusername" name="txtusername" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="txtpassword">Password</label>
                <input type="password" id="txtpassword" name="txtpassword" required autocomplete="off">
            </div>
            <div class="button-container">
                <button type="button" class="remember-button">Remember</button>
                <button type="submit" class="login-button">Login</button>
            </div>
            <!-- Espacio para mensajes de feedback -->
            <div id="message-container" style="margin-top: 10px; color: red;"></div>
        </form>
    </div>
    <!-- Agregar script del controlador JS -->
    <script src="<?php echo get_urlBase('js/login.js'); ?>"></script>
</body>
</html>
|