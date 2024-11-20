<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Las ya han sido alamacenadas ... ";
?>

<br>

<a href="http://127.0.0.1/sistema/vervariables.php">ir a ver las variables</a>

</body>
</html>