<?
include ("conection/config.php");

$identre=$_POST["ident"];


if ($identre!=''){
	$rsh=("update pag_entregable set entregable='".$_POST["nomentre"]."' where id='$identre'");
   mysql_query($rsh,$link); 
header("Location: vistaentreg.php");
   mysql_close($link);
	
	}else{

$Sql="insert into pag_entregable (
  entregable
)  values ('".$_POST["nomentre"]."')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   header("Location: vistaentreg.php");
   mysql_close($link);
   
   }
   
?>