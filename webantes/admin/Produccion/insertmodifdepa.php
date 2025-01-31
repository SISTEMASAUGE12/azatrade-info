<?
include ("conection/config.php");

/*$link=mysql_connect("localhost", "root", "jopedis");
mysql_select_db("produccion",$link) OR DIE ("Error: No es posible establecer la conexión");*/

$idDepar=$_POST["idDep"];


if ($idDepar!=''){
	$rsh=("update departamento set coddep='".$_POST["codigod"]."', 
	departamento='".$_POST["departa"]."',
	provincia='".$_POST["provi"]."',
	distrito='".$_POST["distri"]."'
	 where id='$idDepar'");
   mysql_query($rsh,$link); 
header("Location: vistadepartamento.php");
   mysql_close($link);
	
	}else{

$Sql="insert into departamento (
  coddep,
  departamento,
  provincia,
  distrito,
  eliminado
)  values ('".$_POST["codigod"]."',
'".$_POST["departa"]."',
'".$_POST["provi"]."',
'".$_POST["distri"]."',
'0')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   header("Location: vistadepartamento.php");
   mysql_close($link);
   
   }
   
?>