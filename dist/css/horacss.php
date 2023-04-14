<?php

date_default_timezone_set('America/Argentina/Buenos_Aires');
$hora = date('H');

if($hora >= 06 && $hora <= 18){
    $horacss = 'href="dist/css/claro.css"';
} else {
    $horacss = 'href="dist/css/dark.css"';
}

?>