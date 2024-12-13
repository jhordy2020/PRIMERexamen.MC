<?php
function mostrarUsuarios($usuarios)
{

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Usuarios</title>
        <link rel="stylesheet" href="<?php echo get_urlBase('css/estiloverdatos.css') ?>">
    </head>

    <h2>Lista de usurios del sistema v2</h2>
    <br>
    <table border="1 ">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Perfil</th>
            <th>Eliminar</th>
            <th>Editar</th>
        </tr>
        <?php
        foreach ($usuarios as $usuario) {
        ?>
            <tr>
                <td><?php echo $usuario['id'] ?></td>
                <td><?php echo $usuario['username'] ?></td>
                <td><?php echo $usuario['password'] ?></td>
                <td><?php echo $usuario['perfil'] ?></td>
                <td><a href="<?php echo get_urlBase('controllers/controladorEliminarUsuarioPorId.php?id=' . $usuario['id']); ?>"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                        Eliminar</a></td>
                <td><a href="<?php echo get_urlBase('controllers/controladorActualizarUsuarioDeVista.php?id=' . $usuario['id']); ?>">
                        Editar</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
}
//mostrarUsuarios(null);
?>