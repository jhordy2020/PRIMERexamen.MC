<?php
function mostrarFormularioBusqueda($mensaje = '')
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buscar Usuario</title>
        <link rel="stylesheet" href="<?php echo get_urlBase('css/estiloActualizarUsuario.css'); ?>">
    </head>
    <body>
        <div class="form-container">
            <?php if (!empty($mensaje)): ?>
                <p class="message"><?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>
            <h2>Buscar Usuario</h2>
            <form action="/controllers/controladorActualizarUsuario.php" method="POST">
                <label for="datusuario">¿Qué usuario deseas modificar?</label>
                <input type="text" name="datusuario" id="datusuario" required>
                <br>
                <button type="submit">Buscar Usuario</button>
            </form>
        </div>
    </body>
    </html>
    <?php
}

function mostrarFormularioEdicion($usuario, $mensaje = '')
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Usuario</title>
        <link rel="stylesheet" href="<?php echo get_urlBase('css/estiloActualizarUsuario.css'); ?>">
    </head>
    <body>
        <div class="form-container">
            <?php if (!empty($mensaje)): ?>
                <p class="message"><?php echo htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8'); ?></p>
            <?php endif; ?>
            <h2>Editar Usuario</h2>
            <form action="/controllers/controladorActualizarUsuarioDeVista.php" method="POST">
                <input type="hidden" id="custId" name="custId" value="<?php echo $usuario['id']; ?>">

                <label for="datusuario">Usuario</label>
                <input type="text" name="datusuario" id="datusuario" value="<?php echo htmlspecialchars($usuario['username'], ENT_QUOTES, 'UTF-8'); ?>" required>
                <br>

                <label for="datpassword">Password</label>
                <input type="password" name="datpassword" id="datpassword" value="<?php echo htmlspecialchars($usuario['password'], ENT_QUOTES, 'UTF-8'); ?>" required>
                <br>
                
                <label for="datperfil">Perfil</label>
                <input type="text" name="datperfil" id="datperfil" value="<?php echo htmlspecialchars($usuario['perfil'], ENT_QUOTES, 'UTF-8'); ?>" required>
                <br>

                <button type="submit">Actualizar Usuario</button>
            </form>
        </div>
    </body>
    </html>
    <?php
}
?>








