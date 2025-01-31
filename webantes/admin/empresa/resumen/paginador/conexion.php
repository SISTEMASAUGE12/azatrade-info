<?php
//Configuracion de la conexion a base de datos
$bd_host = "localhost"; 
$bd_usuario = "azabusin_trade"; 
$bd_password = "&SJqA5UErXKM"; 
$bd_base = "azabusin_azatrade"; 
$con = mysql_connect($bd_host, $bd_usuario, $bd_password); 
mysql_select_db($bd_base, $con); 
?>