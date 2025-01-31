<?php

include("conex/inibd.php");

$sqllist = "SELECT iddistrito, nombre FROM distrito WHERE idprovincia = $_GET[provi] ORDER BY nombre ASC ";
$gllit = $conexpg -> prepare($sqllist); 
$gllit -> execute(); 
$glds = $gllit -> fetchAll(PDO::FETCH_OBJ); 
if($gllit -> rowCount() > 0) {
	print "<option value=''>Seleccionar Distrito </option>";
foreach($glds as $shht) {
	$filaff1 = $shht -> iddistrito;
	$filaff2 = $shht -> nombre;
	print "<option value='$filaff1'> $filaff2 </option>";
}
}else{
	print "<option value=''> -- NO HAY DATOS -- </option>";
}

?>