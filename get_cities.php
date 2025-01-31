<?php
include("conex/inibd.php");

$sqllist = "SELECT idprovincia, nombre FROM provincia WHERE iddepartamento = $_GET[cate4] ORDER BY nombre ASC ";
$gllit = $conexpg -> prepare($sqllist); 
$gllit -> execute(); 
$glds = $gllit -> fetchAll(PDO::FETCH_OBJ); 
if($gllit -> rowCount() > 0) {
	print "<option value=''>Seleccionar Provincia </option>";
foreach($glds as $shht) {
	$filaff1 = $shht -> idprovincia;
	$filaff2 = $shht -> nombre;
	print "<option value='$filaff1'> $filaff2 </option>";
}
}else{
	print "<option value=''>-- NO HAY DATOS --</option>";
}

?>