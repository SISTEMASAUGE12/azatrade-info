<?php
include("../../conector/config.php");
set_time_limit(950);

date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");

$nombres3 = trim($_POST["dosvaria"]);
$nombrepue = trim($_POST["dosvariaE"]);
$nombrempr = trim($_POST["dosvariaF"]);
$nombrepais = trim($_POST["dosvariaG"]);
$nombredepa = trim($_POST["dosvariaH"]);
$nombreage = trim($_POST["dosvariaI"]);
$nombreaduana = trim($_POST["dosvariaJ"]);

if($nombres3=="partidaexpo"){ // partidas
$codeid = trim($_POST["namesectAD"]);
$namesector = trim($_POST["namesectNAMED"]);
$namedepa1 = trim($_POST["namedepaD"]);
$ubicod1 = trim($_POST["codubiD"]);
$nombres2 = trim($_POST["unavaria"]);
$nombres3 = trim($_POST["dosvaria"]);
}else if($nombrepue=="puerto"){ //puerto
$codeid = trim($_POST["namesectAE"]);
$namesector = trim($_POST["namesectNAMEE"]);
$namedepa1 = trim($_POST["namedepaE"]);
$ubicod1 = trim($_POST["codubiE"]);
$nombres2 = trim($_POST["unavariaevamer"]);
$nombres3 = trim($_POST["dosvariaE"]);
 }else if($nombrempr=="empresaexpo"){ //empresa
$codeid = trim($_POST["namesectAF"]);
$namesector = trim($_POST["namesectNAMEF"]);
$namedepa1 = trim($_POST["namedepaF"]);
$ubicod1 = trim($_POST["codubiF"]);
$nombres2 = trim($_POST["unavariaF"]);
$nombres3 = trim($_POST["dosvariaF"]);
}else if($nombrepais=="pais"){ //pais
$codeid = trim($_POST["namesectAG"]);
$namesector = trim($_POST["namesectNAMEG"]);
$namedepa1 = trim($_POST["namedepaG"]);
$ubicod1 = trim($_POST["codubiG"]);
$nombres2 = trim($_POST["unavariaG"]);
$nombres3 = trim($_POST["dosvariaG"]);
 }else if($nombredepa=="ubigeo"){ //departamento
$codeid = trim($_POST["namesectAH"]);
$namesector = trim($_POST["namesectNAMEH"]);
$namedepa1 = trim($_POST["namedepaH"]);
$ubicod1 = trim($_POST["codubiH"]);
$nombres2 = trim($_POST["unavariaH"]);
$nombres3 = trim($_POST["dosvariaH"]);
}else if($nombreage=="agente"){ // agente
$codeid = trim($_POST["namesectAI"]);
$namesector = trim($_POST["namesectNAMEI"]);
$namedepa1 = trim($_POST["namedepaI"]);
$ubicod1 = trim($_POST["codubiI"]);
$nombres2 = trim($_POST["unavariaI"]);
$nombres3 = trim($_POST["dosvariaI"]);
}else if($nombreaduana=="aduanas"){ // aduanas
$codeid = trim($_POST["namesectAJ"]);
$namesector = trim($_POST["namesectNAMEJ"]);
$namedepa1 = trim($_POST["namedepaJ"]);
$ubicod1 = trim($_POST["codubiJ"]);
$nombres2 = trim($_POST["unavariaJ"]);
$nombres3 = trim($_POST["dosvariaJ"]);
 }

if($nombres2=="vfobserdol"){
	 $combo = "Valor FOB USD";
 }else if($nombres2=="vpesnet"){
	  $combo = "Peso Neto (Kg)";
 }else if($nombres2=="diferen"){
	  $combo = "Precio FOB USD x KG";
 }else if($nombres2=="vpesbru"){
	  $combo = "Peso Bruto (Kg)";
 }else if($nombres2=="qunifis"){
	  $combo = "Cantidad Exportada";
 }else if($nombres2=="qunicom"){
	  $combo = "Unidades Comerciales";
 }else if($nombres2=="part_nandi"){
	  $combo = "Cantidad de Partidas";
}else if($nombres2=="total"){
	  $combo = "Cantidad de Registros";
 }else if($nombres2=="ndcl"){
	  $combo = "Cantidad de Duas";
 }else if($nombres2=="dnombre"){
	  $combo = "Cantidad de Empresas";
 }else if($nombres2=="cpaides"){
	  $combo = "Cantidad de Mercados";
 }else if($nombres2=="cpuedes"){
	  $combo = "Cantidad de Puertos";
 }else if($nombres2=="cadu"){
	  $combo = "Cantidad de Aduanas";
 }else if($nombres2=="depa"){
	  $combo = "Cantidad de Departamentos";
 }else if($nombres2=="provi"){
	  $combo = "Cantidad de Provincias";
 }else if($nombres2=="distri"){
	  $combo = "Cantidad de Distritos";
 }else if($nombres2=="cage"){
	  $combo = "Cantidad de Agentes";
 }else if($nombres2=="cviatra"){
	  $combo = "Cantidad de vias de Transporte";
 }

if($nombres3=="partidaexpo"){
	 $combo2 = "Partidas Exportadas";
 }else if($nombres3=="puerto"){
	  $combo2 = "Puertos de Ingreso";
 }else if($nombres3=="empresaexpo"){
	  $combo2 = "Empresas Exportadoras";
 }else if($nombres3=="ubigeo"){
	  $combo2 = "Ubigeo";
 }else if($nombres3=="agente"){
	  $combo2 = "Agente de Aduanas";
 }else if($nombres3=="aduanas"){
	  $combo2 = "Aduanas";
 }else if($nombres3=="pais"){
	  $combo2 = "Mercados de Destino";
 }

if($ubicod1==""){
	$flatcod = "";
	$querybusca = "";
}else{
	$flatcod = $ubicod1;
	$querybusca = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}

$filtrofecha='extract(year from exportacion.fnum)';
$wherefecha ="extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2022'";

if($nombres3=="partidaexpo"){//consulta como variable partidas exportadas
include("sector_partidaexpor.php");
}else if($nombres3=="puerto"){//consulta como variable puertos de ingreso
include("sector_puerto.php");
}else if($nombres3=="empresaexpo"){//consulta como variable empresas exportadoras
include("sector_empresa.php");
}else if($nombres3=="pais"){//consulta como variable pais o mercado
include("sector_mercado.php");
}else if($nombres3=="ubigeo"){//consulta como variable depratamento
include("sector_depa.php");
}else if($nombres3=="agente"){
include("sector_agente.php");
}else if($nombres3=="aduanas"){
include("sector_aduana.php");
  }
?>

<?php $conexpg = null;//cierra conexion  ?>


