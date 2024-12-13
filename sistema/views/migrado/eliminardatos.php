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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = $_POST["datusuario"];

    try {
        // Primero verificamos si el usuario existe
        $verificar = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE username = ?;");
        $verificar->execute([$tmpdatusuario]);
        $existe = $verificar->fetchColumn();

        if ($existe > 0) {
            $sentencia = $pdo->prepare("DELETE FROM usuarios WHERE username = ?;");
            $sentencia->execute([$tmpdatusuario]);
            $message = "<p class='message success'>$tmpdatusuario ha sido eliminado con éxito</p>";
        } else {
            $message = "<p class='message error'>El usuario '$tmpdatusuario' no se encuentra o ya fue eliminado del sistema</p>";
        }
    } catch (PDOException $e) {
        $message = "<p class='message error'>Hubo un error: " . $e->getMessage() . "</p>";
    }
}
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
        <?php echo $message; ?>
        <form action="" method="POST">
            <label for="datusuario">¿A quién deseas eliminar?</label>
            <input type="text" name="datusuario" id="datusuario" placeholder="Nombre del usuario" required>
            <button type="submit">Eliminar Usuario</button>
        </form>
    </div>
</body>
</html>

