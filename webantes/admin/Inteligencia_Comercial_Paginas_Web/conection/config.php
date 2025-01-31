<?

$link
=mysql_connect("localhost", "azabusin_produ", "H6MCRokqNaA&");
mysql_query ("SET NAMES 'utf8'"); 
mysql_select_db("azabusin_produccion",$link) OR DIE ("Error: No es posible establecer la conexi��n");
//mysql_query("SET NAMES 'utf8'");
?>