<?php 

$str = '/recipes/5-spice-pork-buns-with-red-cabbage-carrot-thai-basil-salad';

$str = preg_replace( "/^.{9}/", "", $str );
    
echo $str;

?>