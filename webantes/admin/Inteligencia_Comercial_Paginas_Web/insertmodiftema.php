<?
include ("conection/config.php");

$idte=$_POST["idt"];


if ($idte!=''){
	$rsh=("update pag_tema set tema='".$_POST["nomtema"]."' where id='$idte'");
   mysql_query($rsh,$link); 
header("Location: vistatema.php");
   mysql_close($link);
	
	}else{

$Sql="insert into pag_tema (
  tema
)  values ('".$_POST["nomtema"]."')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   header("Location: vistatema.php");
   mysql_close($link);
   
   }
   
?>