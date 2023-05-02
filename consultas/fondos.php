<?php

$path = '../consultas/docs/img/logwall/';

$imagen[0]="191344.jpg";
$imagen[1]="191345.jpg";
$imagen[2]="191362.jpg";
$imagen[3]="191367.jpg";
$imagen[4]="191379.jpg";
$imagen[5]="191387.jpg";
$imagen[6]="191395.jpg";
$imagen[7]="191419.jpg";
$imagen[8]="191425.jpg";
$imagen[9]="191440.jpg";
$imagen[10]="191441.jpg";
$imagen[11]="191442.jpg";

 
$i=rand(0,11);
 
$fondoLog = $path.$imagen[$i];

echo '<img class="imgfondo" src="'.$fondoLog.'">';
?>