<?
include ("conection/config.php");

/*$link=mysql_connect("localhost", "root", "jopedis");
mysql_select_db("produccion",$link) OR DIE ("Error: No es posible establecer la conexión");*/

$ipda=$_POST["ax"];

if ($ipda!=''){
	$rsh=("update producto set producto='".$_POST["a"]."' where id='$ipda'");
   mysql_query($rsh,$link); 
header("Location: vistaproducto.php");
   mysql_close($link);
	
	}else{

$Sql="insert into producto (
  idsector,
  producto,
  eliminado
)  values ('".$_POST["sector"]."',
'".$_POST["a"]."',
'0')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   header("Location: vistaproducto.php");
   mysql_close($link);
   
   }
   
?>