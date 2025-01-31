<?
include ("conection/config.php");

$idda=$_POST["ida"];


if ($idda!=''){
	$rsh=("update pag_tipo_acceso set tipo_acceso='".$_POST["nomta"]."' where id='$idda'");
   mysql_query($rsh,$link); 
header("Location: vistatacceso.php");
   mysql_close($link);
	
	}else{

$Sql="insert into pag_tipo_acceso (
  tipo_acceso
)  values ('".$_POST["nomta"]."')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   header("Location: vistatacceso.php");
   mysql_close($link);
   
   }
   
?>