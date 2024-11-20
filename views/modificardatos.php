<?php
session_start();

if (isset($_SESSION["txtusername"])) {
    header('Location: ' . get_urlBase('index.php'));
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/etc/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conect/conexion.php';

$conexion = new conexion($host, $namedb, $userdb, $paswordb);
$pdo = $conexion->obtenerConexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = $_POST["datusuario"];

    $conexion = new conexion($host, $namedb, $userdb, $paswordb);
    $pdo = $conexion->obtenerConexion();

    if (isset($_POST["custId"])) {
        
        try {
            $sentencia = $pdo->prepare("UPDATE usuarios SET username=?, password=?, perfil=? WHERE id=?;");
            $sentencia->execute([$_POST["datusuario"], $_POST["datpassword"], $_POST["datperfil"], $_POST["custId"]]);
        
            echo $tmpdatusuario . "- Modificación con éxito <br>";
            header("Refresh: 2; URL=" . $_SERVER['PHP_SELF']); 
            exit(); 
        } catch (PDOException $e) {
            echo "Hubo un error, no se pudo modificar...<br>";
            echo $e->getMessage();
        }
    } else {
        $query = $pdo->query("select id, username, password, perfil from usuarios WHERE username='" . $tmpdatusuario . "'");
        $fila  = $query->fetch(PDO::FETCH_ASSOC);

        ?>
        <form action="" method="POST">
            <input type="hidden" id="custId" name="custId" value="<?php echo $fila['id'] ?>">
            <label for="datusuario">Usuario </label>
            <input type="text" name="datusuario" id="datusuario" value="<?php echo $fila['username'] ?>">
            <br>
            <label for="datpassword">Password</label>
            <input type="password" name="datpassword" id="datpassword" value="<?php echo $fila['password'] ?>">
            <br>
            <label for="datperfil"> Perfil </label>
            <input type="text" name="datperfil" id="datperfil" value="<?php echo $fila['perfil'] ?>">
            <br>
            <button type="submit">Modificar Usuario</button>
        </form>
        <?php

        exit();
    }
}

?>

<form action="" method="POST">
    <label for="">Que usuario deseas modificar</label>
    <input type="text" name="datusuario" id="datusuario">
    <br>
    <button type="submit">Buscar Usuario</button>
</form>