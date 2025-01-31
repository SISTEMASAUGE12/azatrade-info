<?php
include("conex/inibd.php");

$name1 = $_GET['dat1'];
$name2 = $_GET['dat2'];

if($name1!=""){ 
	
	$sqlinsert = "DELETE FROM partidas_masiva WHERE iduser='$name1' and partida='$name2' ";
	$stmt = $conexpg->prepare($sqlinsert);
    $stmt->execute();
	
	//echo "OK";
	$ale = "ok";
	
}else{
	//echo "ERROR";
	$ale = "er";
}

$conexpg = null;//cierra conexion
echo"<script>location.href='descargar_cant_partidas.php?var=$ale'</script>";
?>