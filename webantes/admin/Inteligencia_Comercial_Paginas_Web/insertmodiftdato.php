<?
include ("conection/config.php");

$idtd=$_POST["idd"];


if ($idtd!=''){
	$rsh=("update pag_tipo_dato set tipo_dato='".$_POST["nomdato"]."' where id='$idtd'");
   mysql_query($rsh,$link); 
header("Location: vistatdato.php");
   mysql_close($link);
	
	}else{

$Sql="insert into pag_tipo_dato (
  tipo_dato
)  values ('".$_POST["nomdato"]."')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   header("Location: vistatdato.php");
   mysql_close($link);
   
   }
   
?>