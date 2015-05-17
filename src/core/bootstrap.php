<?php
require ('../Slim/Slim.php');
$slim = \Slim\Slim::registerAutoloader();


function autoload($class) {
    include 'class/' . $class . '.php';
}

spl_autoload_register('autoload');
?>