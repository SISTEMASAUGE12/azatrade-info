<?
include ("conection/config.php");

$ididi=$_POST["ididiom"];


if ($ididi!=''){
	$rsh=("update pag_idioma set idioma='".$_POST["nomidio"]."' where id='$ididi'");
   mysql_query($rsh,$link); 
header("Location: vistaidioma.php");
   mysql_close($link);
	
	}else{

$Sql="insert into pag_idioma (
  idioma
)  values ('".$_POST["nomidio"]."')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   header("Location: vistaidioma.php");
   mysql_close($link);
   
   }
   
?>