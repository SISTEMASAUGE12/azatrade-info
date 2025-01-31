<?php
define('DB_HOST','localhost');
define('DB_USER','azatrade2025_enero');
define('DB_PASS','Azatrade@@2025_enero');
define('DB_NAME','azatrade2025_enero');
define('NUM_ITEMS_BY_PAGE',10);

date_default_timezone_set("America/Lima");
//setlocale(LC_TIME, 'es_PE.UTF-8');
setlocale(LC_ALL, 'es_ES');

// Ahora, establecemos la conexión.
try{
// Ejecutamos las variables y aplicamos UTF8
$conexpg = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{ exit("Error: " . $e->getMessage()); }
?>