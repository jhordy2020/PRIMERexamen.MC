<?php
function mostrarFormularioEliminar($mensaje = '')
{
    if (!empty($mensaje)) {
        echo $mensaje;
    } else {

?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Eliminar Usuario</title>
            <link rel="stylesheet" href="<?php echo get_UrlBase('css/estilodashboard.css') ?>">
        </head>

        <body>

            <form action="/controllers/controladorEliminarUsuario.php" method="POST">
                <label for="">A quien debo eliminar</label>
                <input type="text" name="datusuario" id="datusuario">
                <br>
                <button type="submit">Eliminar Usuario</button>
            </form>

    <?php
    }
}
    ?>