<?
include ("conection/config.php");

/*$link=mysql_connect("localhost", "root", "jopedis");
mysql_select_db("produccion",$link) OR DIE ("Error: No es posible establecer la conexión");*/

$idse=$_POST["ase"];


if ($idse!=''){
	$rsh=("update sector set sector='".$_POST["nomsect"]."' where id='$idse'");
   mysql_query($rsh,$link); 
header("Location: vistasector.php");
   mysql_close($link);
	
	}else{

$Sql="insert into sector (
  sector,
  eliminado
)  values ('".$_POST["nomsect"]."',
'0')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   header("Location: vistasector.php");
   mysql_close($link);
   
   }
   
?>