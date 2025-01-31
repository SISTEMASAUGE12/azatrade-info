<?
include ("conection/config.php");

$idalca=$_POST["idal"];


if ($idalca!=''){
	$rsh=("update pag_alcance set alcance='".$_POST["nomalcan"]."' where id='$idalca'");
   mysql_query($rsh,$link); 
header("Location: vistaalcan.php");
   mysql_close($link);
	
	}else{

$Sql="insert into pag_alcance (
  alcance
)  values ('".$_POST["nomalcan"]."')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   header("Location: vistaalcan.php");
   mysql_close($link);
   
   }
   
?>