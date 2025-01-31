<?php
$link
=mysql_connect("localhost", "augeperu_trade", "OYON5pPh1G-5");
mysql_select_db("augeperu_produccion",$link) OR DIE ("Error: No es posible establecer la conexión");
mysql_query ("SET augeperu_produccion 'utf8'"); 
?>