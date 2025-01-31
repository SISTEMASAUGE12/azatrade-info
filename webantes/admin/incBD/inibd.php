<?php
$hostloca="localhost";
$usuarioloca="azatrade2025_enero";
$passwordloca="Azatrade@@2025_enero";
$dbloca="azatrade2025_enero";
$conexpg = new mysqli($hostloca,$usuarioloca,$passwordloca,$dbloca);
$conexpg->query("SET NAMES 'utf8'");
if($conexpg === false) { 
 echo 'Ha habido un error <br>'.mysqli_connect_error(); 
}
?>