<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EXAMEN MC</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>

  <?php

    session_start();
    
    if ( $_SERVER["REQUEST_METHOD"] == "POST" ){

      $v_username = "";
      $v_password = "";

      if (isset( $_POST["txtusername"])) {
        $v_username = $_POST["txtusername"];
        
      }
      if (isset( $_POST["txtpassword"])){
        $v_password = $_POST["txtpassword"];
        
      }
      if (( $v_username == "admin") && ( $v_password == "1234")){
        $V_SESSION["txtusername"]=$v_username;
        $V_SESSION["txtpassword"]=$v_password;  
        header('Location: http://127.0.0.1/sistema/dashboard.php');
        //echo "dashboard";
      }else {
        header('Location: http://127.0.0.1/sistema/claveequivocada.php/');
        //echo "Error clave";
      }
      
    }

    //en caso de que el usuario presione directamente sobre la URL inicial
    //ya hay un usuario logueado, asi que lo pongo en pantalla
    if (isset( $_SESSION["txtusername"])){
        header('Location: http://127.0.0.1/sistema/dashboard.php');
    }

  ?>

    <div class="login-container">
      <form action="" method="POST">
          <h1>LISNAME</h1>
          <label for="txtusername">Usuario</label>
          <input type="text" name="txtusername" id="txtusername">    
          <label for="txtpassword">Password</label>
          <input type="password" name="txtpassword" id="txtpassword">
          <label for="remenber">REMENBER ME</label>
       
          <div class="buttons">
            <button type="submit" class="login-btn">INGRESAR</button>
          </div>


          <img src="img/herra.png" alt="Imagen ampliada" class="imagen-grande1">
          <img src="img/herrape.png" alt="Imagen ampliada" class="imagen-grande2">
          <img src="img/herrape.png" alt="Imagen ampliada" class="imagen-grande3">
          <img src="img/herrape.png" alt="Imagen ampliada" class="imagen-grande4">
          <img src="img/engranaje.png" alt="Imagen ampliada" class="imagen-grande5">
          <img src="img/engranaje.png" alt="Imagen ampliada" class="imagen-grande6">
          <img src="img/engranaje.png" alt="Imagen ampliada" class="imagen-grande7">
          <img src="img/engranaje3.png" alt="Imagen ampliada" class="imagen-grande8">
          <img src="img/gps.gif" alt="Imagen ampliada" class="imagen-grande9">
          <img src="img/llanta.png" alt="Imagen ampliada" class="imagen-grande10">
          <img src="img/llanta.png" alt="Imagen ampliada" class="imagen-grande11">
          <img src="img/circulo.png" alt="Imagen ampliada" class="imagen-grande12">
          <img src="img/circulo.png" alt="Imagen ampliada" class="imagen-grande13">
          <img src="img/engra2.png" alt="Imagen ampliada" class="imagen-grande14">
          <img src="img/fondobolita.jpg" alt="Imagen adicional" class="imagen-adicional">


      
      </form>
  </div>
</body>
</html>
