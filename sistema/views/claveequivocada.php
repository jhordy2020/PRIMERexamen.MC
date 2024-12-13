<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clave Equivocada</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/estiloclave.css'); ?>">
</head>
<body>
    <div class="container">
        <h1>CLAVE EQUIVOCADA</h1>
        <p>La contraseña que ingresaste es incorrecta.</p>
        <a href="<?php echo get_urlBase('views/vistaLogin.php'); ?>" class="back-link">Volver al Login</a>
    </div>
</body>
</html>
