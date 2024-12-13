<<<<<<< HEAD
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page

if (isset ($_SESSION["favcolor"])){
    echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
    echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
}else{
    echo "No existe variables";
    echo "<br>";
}

    ?>


<br>
PAGINA DE VARIABLES
<br>

<a href="http://127.0.0.1/sistema/vervariables.php">refresh pag</a>
<a href="http://127.0.0.1/sistema/borrarvariables.php">clean las varibles</a>

</body>
=======
<<<<<<< HEAD
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page

if (isset ($_SESSION["favcolor"])){
    echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
    echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
}else{
    echo "No existe variables";
    echo "<br>";
}

    ?>


<br>
PAGINA DE VARIABLES
<br>

<a href="http://127.0.0.1/sistema/vervariables.php">refresh pag</a>
<a href="http://127.0.0.1/sistema/borrarvariables.php">clean las varibles</a>

</body>
=======
<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page

if (isset ($_SESSION["favcolor"])){
    echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
    echo "Favorite animal is " . $_SESSION["favanimal"] . ".";
}else{
    echo "No existe variables";
    echo "<br>";
}

    ?>


<br>
PAGINA DE VARIABLES
<br>

<a href="http://127.0.0.1/sistema/vervariables.php">refresh pag</a>
<a href="http://127.0.0.1/sistema/borrarvariables.php">clean las varibles</a>

</body>
>>>>>>> 7be4842 (Tercer hito del proyecto)
>>>>>>> 0a0cb5f (Hito 3 de proyecto)
</html>