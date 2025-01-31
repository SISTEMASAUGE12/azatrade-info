<?php
/*$linkconec=mysql_connect("localhost", "root", "jopedis1");
mysql_select_db("hotelazasof2022",$linkconec) OR DIE ("Error: No es posible establecer la conexión");
mysql_query ("SET NAMES 'utf8'");*/

define('DB_HOST','localhost');
define('DB_USER','augeperu_trade');
define('DB_PASS','OYON5pPh1G-5');
define('DB_NAME','augeperu_azatrade');
 
// Ahora, establecemos la conexión.
try
{
// Ejecutamos las variables y aplicamos UTF8
$conexpg = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>