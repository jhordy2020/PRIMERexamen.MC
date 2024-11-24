<?php

define('URL_BASE', "http://sistema.test/");
define('DB_HOST', 'localhost');
define('DB_NAME', 'dbsistema');
define('DB_USER', 'root');
define('DB_PASS', '');

//funcion generica para obtener paths
function get_path($type,$arg1){
  $basePaths = [ 'base' => URL_BASE,
  'views' =>URL_BASE.'views/',
  'models' =>URL_BASE.'models/',
  'controllers' =>URL_BASE.'controllers/'];
  return $basePaths[$type].$arg1;
}


function get_UrlBase($arg1)
{
  return get_path('base',$arg1);
}
function get_views($arg1)
{
  return get_path('views',$arg1);
}
function get_models($arg1)
{
  return get_path('models',$arg1);
}
function get_controllers($arg1)
{
  return get_path('controllers',$arg1);
}

//echo 'algo';
//echo get_UrlBase('');
//echo get_models('modeloUsuario.php');
?>