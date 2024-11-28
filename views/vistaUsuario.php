<?php
function mostrarUsuarios($usuarios)
{
    
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
    <h2> LISTA DE USUARIOS DEL SISTEMA </h2>
    <br>
    <table border="1">
        <tr>
            <th>id</th>
            <th>username</th>
            <th>password</th>
            <th>perfil</th>
            <th>eliminar</th>
            <th>editar</th>
        </tr>
        <?php
        foreach ($usuarios as $usuario) {
        ?>
            <tr>
                <td> <?php echo $usuario['id'] ?> </td>
                <td> <?php echo $usuario['username'] ?> </td>
                <td> <?php echo $usuario['password'] ?> </td>
                <td> <?php echo $usuario['perfil'] ?> </td>
                <td> <a href="#">eliminar</a> </td>
                <td> <a href="#">editar</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
}
?>