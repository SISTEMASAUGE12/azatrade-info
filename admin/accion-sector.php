<?php
include("incBD/inibd.php");
set_time_limit(150);

$cod = $_GET["log"];
$condi = $_GET["action"];

$coxdi = $_POST["codegd"];

$caxi = $_POST["axio"];
$esco = trim($_POST["codegr"]);

$dato1 = trim($_POST["tiposec"]);
$dato2 = trim($_POST["namesector"]);
$dato3 = trim($_POST["namesub"]);
$dato4 = trim($_POST["descrip"]);

//insertamos nuevo registro{
if($coxdi=="nuevo"){
if($dato1!="" and $dato2!="" and $dato3!="" and $dato4!="" and $esco=="" ){
	
	$Sql_inser="insert into sectores (tipo, sector, subsector, descri, estado)  values (
'$dato1',
'$dato2',
'$dato3',
'$dato4',   
'A')";
	$rscrea2 = $conexpg->query($Sql_inser);
	
	$ale="ok";
   echo"<script>location.href='form-sector-grupo.php?vista=table&by=$ale'</script>";
}else{// si esta vacio uno envia mensaje
	$ale="vac";
   echo"<script>location.href='form-sector-grupo.php?vista=table&by=$ale'</script>";
}
}

//update registro
if($caxi=="editar"){
if($esco!="" ){
	
$datot1 = trim($_POST["tipotsec"]);
$datot2 = trim($_POST["nametsector"]);
$datot3 = trim($_POST["nametsub"]);
$datot4 = trim($_POST["descript"]);
	
	//echo "$datot1 - $datot2 - $datot3 - $datot4 - $esco - $caxi ";
	
	$Sql="update sectores Set tipo='$datot1', sector='$datot2', subsector='$datot3', descri='$datot4' where idsec ='$esco' ";
	$rs = $conexpg->query($Sql);
	   $ale="up";
   echo"<script>location.href='form-sector-grupo.php?vista=table&by=$ale'</script>";
}else{
	$ale="vacd";
   echo"<script>location.href='form-sector-grupo.php?vista=table&by=$ale'</script>";
}
}
  
   if($condi=="E"){//Elimina Registro
 $Sql="update sectores Set estado='E' where idsec ='$cod' ";
	  $rs = $conexpg->query($Sql);
	   $ale="del";
   echo"<script>location.href='form-sector-grupo.php?vista=table&by=$ale'</script>";
  }

//registra sector tabla maestra
if($coxdi=="regsect"){
	$datoa = $_POST["tipoa"];//tipo
	$datob = $_POST["tipob"];//sector
	$datoc = $_POST["tipoc"];//subsector
	$datod = $_POST["tipod"];//descripcion
	$datoe = trim($_POST["numpartida"]);//partida
	
	//consultamos si existe la partida registrada
	$sqlgral="SELECT s.partida FROM sector AS s WHERE s.partida = '$datoe' ";
$res_gral=$conexpg->query($sqlgral); 
if($res_gral->num_rows>0){
while($fila_uu=$res_gral->fetch_array()){
		   $parti1= $fila_uu['partida'];
}
}else{
	$parti1 = "";
}
	
if($parti1==""){
	$Sql_inser="insert into sector (partida, tipo, sector, subproducto, descripcion)  values (
'$datoe',
'$datoa',
'$datob',
'$datoc',   
'$datod')";
	$rscrea2 = $conexpg->query($Sql_inser);
	
	$ale="yes";
}else{
   $ale="parti";
}
	echo"<script>location.href='form-sector-grupo.php?vista=table&by=$ale'</script>";
}

if($condi=="p"){//Elimina Registro tabla maestra sector
 $Sql="DELETE FROM sector where partida ='$cod' ";
	  $rs = $conexpg->query($Sql);
	   $ale="del";
   echo"<script>location.href='rpt-sector.php?by=$ale'</script>";
  }

mysqli_close($conexpg);
  ?>
