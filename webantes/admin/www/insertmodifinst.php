<?
include ("conection/config.php");

$idin=$_POST["idi"];


if ($idin!=''){
	$rsh=("update pag_institucion set institucion='".$_POST["nominst"]."' where id='$idin'");
   mysql_query($rsh,$link); 
header("Location: vistainst.php");
   mysql_close($link);
	
	}else{

$Sql="insert into pag_institucion (
  institucion
)  values ('".$_POST["nominst"]."')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   header("Location: vistainst.php");
   mysql_close($link);
   
   }
   
?>