<?php
$hostloca="localhost";
$usuarioloca="azatrade2025_enero";
$passwordloca="Azatrade@@2025_enero";
$dbloca="azatrade2025_enero";
$linkaz = new mysqli($hostloca,$usuarioloca,$passwordloca,$dbloca);

if($linkaz === false) { 
 echo 'Ha habido un error <br>'.mysqli_connect_error(); 
}
?>