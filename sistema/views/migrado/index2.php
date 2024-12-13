<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/models/connect/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
    <link rel="stylesheet" href="<?php echo get_urlBase('css/estilosindex.css') ?>">
</head>

<body>

<?php
        session_start();

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $v_username = "";
            $v_password = "";

            if (isset($_POST["txtusername"])){
                $v_username = $_POST["txtusername"];
            }

            if (isset ($_POST["txtpassword"])){
                $v_password = $_POST["txtpassword"];   
            }

            if ($v_username == "admin" && $v_password == "1234")  {
                $_SESSION["txtusername"] = $v_username;
                $_SESSION["txtpassword"] = $v_password;
                header('Location:'.get_views('dashboard.php'));
                //echo"dashboard";
            } else{
               header('Location:'.get_views('claveequivocada.php'));
               //echo "Error en clave";
            }
            
        }
        // Si el usuario accede a la URL inicial y está logeado, mostrar en pantalla
        if(isset($_SESSION["txtusername"])){
            header('Location: '.get_views('dashboard.php'));
        }


    ?>

    <div class="login-container">
        <h2 class="login-header">LOGIN</h2>
        <form class="login-form" action="" method="POST" autocomplete="off">
            <div class="form-group">
                <label for="txtusername">Username</label>
                <input type="text" id="txtusername" name="txtusername" required autocomplete= "off">
            </div>
            <div class="form-group">
                <label for="txtpassword">Password</label>
                <input type="password" id="txtpassword" name="txtpassword" required autocomplete= "off">
            </div>
            <div class="button-container">
                <button type="button" class="remember-button">Remember</button>
                <button type="submit" class="login-button">Login</button>
            </div>
        </form>
    </div>
</body>
</html>