<?
include ("conection/config.php");

/*$link=mysql_connect("localhost", "root", "jopedis");
mysql_select_db("produccion",$link) OR DIE ("Error: No es posible establecer la conexión");*/

$idmed=$_POST["idm"];


if ($idmed!=''){
	$rsh=("update medida set medida='".$_POST["m"]."' where id='$idmed'");
   mysql_query($rsh,$link); 
header("Location: vistamedida.php");
   mysql_close($link);
	
	}else{

$Sql="insert into medida (
  medida,
  eliminado
)  values ('".$_POST["m"]."',
'0')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   header("Location: vistamedida.php");
   mysql_close($link);
   
   }
   
?>