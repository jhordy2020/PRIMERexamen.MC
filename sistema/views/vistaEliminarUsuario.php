<?php
function mostrarFormularioEliminar($mensaje = '')
{
    if (!empty($mensaje)) {
        echo $mensaje;
    } else {

?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Eliminar Usuario</title>
            <link rel="stylesheet" href="<?php echo get_urlBase('css/estiloeliminardatos.css') ?>">
        </head>

        <body>
            <div class="form-container">
                <h2>Eliminar Usuario</h2>
                <?php echo $mensaje; ?>
                <form action="/controllers/controladorEliminarUsuario.php" method="POST">
                    <label for="datusuario">¿A quién deseas eliminar?</label>
                    <input type="text" name="datusuario" id="datusuario" placeholder="Nombre del usuario" required>
                    <button type="submit">Eliminar Usuario</button>
                </form>
            </div>
        </body>

        </html>



<?php
    }
}
?>