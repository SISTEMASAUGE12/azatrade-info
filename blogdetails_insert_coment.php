<?php
include("conex/inibd.php");

$name1 = $_POST['codeblog'];
$name2 = $_POST['codidusu'];
$name3 = trim($_POST['comenta']);

if($name3!=""){ 
$sqlinsert="INSERT INTO blog_comentarios(idblog, iduser, comentario, fechareg, horareg, aprobado, estado)values('$name1', '$name2', '$name3', now(), now(), 'NO', 'A' )";
	$stmt = $conexpg->prepare($sqlinsert);
    $stmt->execute();
	
	//echo "OK";
	echo $sqlinsert?'ok':'err';
	
}else{
	//echo "ERROR";
	echo $sqlinsert?'ok':'err';
}

$conexpg = null;//cierra conexion
?>