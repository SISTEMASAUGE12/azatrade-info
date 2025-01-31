<?php
$link=mysql_connect("localhost", "augeperu_trade", "OYON5pPh1G-5");
mysql_select_db("augeperu_produccion",$link) OR DIE ("Error: No es posible establecer la conexión");
mysql_query ("SET NAMES 'utf8'"); 

/* CONEXION PARA LAS CONSULTA DE TABLAS
Database connection start */
$servername = "localhost";
$username = "augeperu_trade";
$password = "OYON5pPh1G-5";
$dbname = "augeperu_produccion";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
?>