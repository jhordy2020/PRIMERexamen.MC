<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>

Se borraron todas las variables
<br>

<a href="http://127.0.0.1/sistema/vervariables.php"> ver variables</a>
<a href="http://127.0.0.1/sistema/test.php"> volver a grabar las variables</a>
</body>

</body>
</html>