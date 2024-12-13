<?php
function mostrarVentas($ventas)
{
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de Ventas</title>
        <link rel="stylesheet" href="<?php echo get_urlBase('css/estiloverdatos.css') ?>">
    </head>

    <body>
        <h2>Lista de Ventas</h2>
        <br>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>descripcion</th>
                    <th>Total</th>
                    <th>Fecha</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($ventas as $venta) {
                ?>
                    <tr>
                        <td><?php echo $venta['id'] ?></td>
                        <td><?php echo $venta['producto'] ?></td>
                        <td><?php echo $venta['cantidad'] ?></td>
                        <td><?php echo $venta['descripcion'] ?></td>
                        <td><?php echo $venta['total'] ?></td>
                        <td><?php echo $venta['fecha'] ?></td>
                        <td>
                            <a href="<?php echo get_urlBase('controllers/controladorEliminarVentaPorId.php?id=' . $venta['id']); ?>" 
                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta venta?');">
                                Eliminar
                            </a>
                        </td>
                        
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </body>

    </html>
<?php
}
?>