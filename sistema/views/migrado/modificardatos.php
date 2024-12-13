<?php

session_start();

if (!isset($_SESSION["txtusername"])) {
    header('Location: '.get_urlBase('index.php'));
    exit;
}

require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/models/connect/conexion.php';

$conexion = new conexion($host, $namedb, $userdb, $paswordb);
$pdo = $conexion->obtenerConexion();
$message = "";
$formulario = ""; // Contenedor para el formulario dinámico

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = $_POST["datusuario"];

    if (isset($_POST["custId"])) {
        // Actualizar los datos del usuario
        try {
            $sentencia = $pdo->prepare("UPDATE usuarios SET username=?, password=?, perfil=? WHERE id=?;");
            $sentencia->execute([$_POST["datusuario"], $_POST["datpassword"], $_POST["datperfil"], $_POST["custId"]]);
            $message = "$tmpdatusuario se ha modificado con éxito.";
        } catch (PDOException $e) {
            $message = "Hubo un error, no se pudo modificar: " . $e->getMessage();
        }
    } else {
        // Verificar si el usuario existe
        $query = $pdo->prepare("SELECT id, username, password, perfil FROM usuarios WHERE username = ?");
        $query->execute([$tmpdatusuario]);
        $fila = $query->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            // Generar el formulario dinámico
            $formulario = "
                <form action='' method='POST'>
                    <input type='hidden' name='custId' value='{$fila['id']}'>
                    <label>Usuario</label>
                    <input type='text' name='datusuario' value='{$fila['username']}' required>
                    <label>Password</label>
                    <input type='password' name='datpassword' value='{$fila['password']}' required>
                    <label>Perfil</label>
                    <input type='text' name='datperfil' value='{$fila['perfil']}' required>
                    <button type='submit'>Modificar Usuario</button>
                </form>
            ";
        } else {
            // Usuario no encontrado
            $message = "El usuario '$tmpdatusuario' no se encuentra o ya fue eliminado del sistema.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/estilomodificardatos.css') ?>">
</head>
<body>
    <h2>Modificar Usuario</h2>
    <?php 
    // Mostrar mensajes y formularios dinámicamente
    if ($message) {
        echo "<p>$message</p>";
    }
    echo $formulario ?: '
        <form action="" method="POST">
            <label>¿Qué usuario deseas modificar?</label>
            <input type="text" name="datusuario" placeholder="Nombre del usuario" required>
            <button type="submit">Buscar Usuario</button>
        </form>
    '; 
    ?>
</body>
</html>

