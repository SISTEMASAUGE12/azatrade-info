<?
include ("conection/config.php");

$idpa=$_POST["idp"];


if ($idpa!=''){
	$rsh=("update merca_pais set pais='".$_POST["nompais"]."' where id='$idpa'");
   mysql_query($rsh,$link); 
header("Location: vistapais.php");
   mysql_close($link);
	
	}else{

$Sql="insert into merca_pais (
  pais
)  values ('".$_POST["nompais"]."')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   header("Location: vistapais.php");
   mysql_close($link);
   
   }
   
?>