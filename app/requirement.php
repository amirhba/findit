<?php 
//set display errors for publishing version to 0 and developing version to 1
ini_set('display_errors',1);
//require all helpers and config file
require_once '../app/config/config.php';
require_once '../app/helpers/validation.php';
require_once '../app/helpers/url.php';
require_once '../app/helpers/usefull_functions.php';
require_once '../app/helpers/csrf.php';
//auto load libs 
spl_autoload_register(function($className){
	require_once '../app/libs/' . $className . '.php';
})

?>