<?php
$hostloca="localhost";
$usuarioloca="augeperu_trade";
$passwordloca="Sofia@@peru$2024";
$dbloca="augeperu_azatrade";
$linkaz = new mysqli($hostloca,$usuarioloca,$passwordloca,$dbloca);

if($linkaz === false) { 
 echo 'Ha habido un error <br>'.mysqli_connect_error(); 
}
?>