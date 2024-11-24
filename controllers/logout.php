<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/etc/config.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/models/conect/conexion.php'; 

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

header('Location:'.get_UrlBase('index.php'));

?>

</body>

</body>
</html>