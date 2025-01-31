<?
include ("conection/config.php");

$idbu=$_POST["idb"];


if ($idbu!=''){
	$rsh=("update pag_tipo_bus set busqueda='".$_POST["nombus"]."' where id='$idbu'");
   mysql_query($rsh,$link); 
header("Location: vistatbusqueda.php");
   mysql_close($link);
	
	}else{

$Sql="insert into pag_tipo_bus (
  busqueda
)  values ('".$_POST["nombus"]."')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   header("Location: vistatbusqueda.php");
   mysql_close($link);
   
   }
   
?>