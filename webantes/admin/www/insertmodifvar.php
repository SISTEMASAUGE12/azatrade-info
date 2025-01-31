<?
include ("conection/config.php");

/*$link=mysql_connect("localhost", "root", "jopedis");
mysql_select_db("produccion",$link) OR DIE ("Error: No es posible establecer la conexión");*/

$idva=$_POST["idv"];


if ($idva!=''){
	$rsh=("update variable set variable='".$_POST["vari"]."' where id='$idva'");
   mysql_query($rsh,$link); 
header("Location: vistavariable.php");
   mysql_close($link);
	
	}else{

$Sql="insert into variable (
  variable,
  eliminado
)  values ('".$_POST["vari"]."',
'0')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   header("Location: vistavariable.php");
   mysql_close($link);
   
   }
   
?>