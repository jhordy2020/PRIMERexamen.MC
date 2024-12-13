<?php 
function mostrarFormularioIngreso($mensaje = '')
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrar Usuario</title>
        <link rel="stylesheet" href="<?php echo get_urlBase('/css/estiloIngresarDatos.css'); ?>">
    </head>
    <body>
        <div class="form-container">
            <h2>Registrar Usuario</h2>
            <?php if (!empty($mensaje)): ?>
                <div class="message">
                    <?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo get_urlBase('/controllers/controladorIngresarUsuario.php'); ?>" method="POST">
                <label for="datusuario">Usuario</label>
                <input type="text" name="datusuario" id="datusername" required autocomplete="off">

                <label for="datpassword">Password</label>
                <input type="password" name="datpassword" id="datpassword" required autocomplete="off">

                <label for="datperfil">Perfil</label>
                <input type="text" name="datperfil" id="datperfil" required autocomplete="off">

                <button type="submit">Registrar Usuario</button>
            </form>
        </div>
    </body>
    </html>
    <?php
}
?>
