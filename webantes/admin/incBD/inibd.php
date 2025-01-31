<?php
$hostloca="localhost";
$usuarioloca="augeperu_trade";
$passwordloca="OYON5pPh1G-5";
$dbloca="augeperu_azatrade";
$conexpg = new mysqli($hostloca,$usuarioloca,$passwordloca,$dbloca);
$conexpg->query("SET NAMES 'utf8'");
if($conexpg === false) { 
 echo 'Ha habido un error <br>'.mysqli_connect_error(); 
}
?>