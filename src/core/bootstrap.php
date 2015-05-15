<?php
function autoload($class) {
    include 'class/' . $class . '.php';
}

spl_autoload_register('autoload');
?>