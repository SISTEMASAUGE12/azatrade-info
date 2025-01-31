<?php
include("../../conector/config.php");
set_time_limit(950);

date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");

$nombres3 = trim($_POST["dosvaria"]);
$nombrepue = trim($_POST["dosvariaE"]);
$nombrempr = trim($_POST["dosvariaF"]);
$nombredepa = trim($_POST["dosvariaG"]);
$nombreage = trim($_POST["dosvariaH"]);
$nombreaduana = trim($_POST["dosvariaI"]);

if($nombres3=="partidaexpo"){ // partidas
$paisname = trim($_POST["namepaisD"]);
$paiscode = trim($_POST["codepaisD"]);
$ubicod1 = trim($_POST["codubiD"]);
$namedepa1 = trim($_POST["namedepaD"]);
$nombres2 = trim($_POST["unavaria"]);
$nombres3 = trim($_POST["dosvaria"]);
}else if($nombrepue=="puerto"){ //puerto
$paisname = trim($_POST["namepaisE"]);
$paiscode = trim($_POST["codepaisE"]);
$ubicod1 = trim($_POST["codubiE"]);
$namedepa1 = trim($_POST["namedepaE"]);
$nombres2 = trim($_POST["unavariaevamer"]);
$nombres3 = trim($_POST["dosvariaE"]);
 }else if($nombrempr=="empresaexpo"){ //empresa
$paisname = trim($_POST["namepaisF"]);
$paiscode = trim($_POST["codepaisF"]);
$ubicod1 = trim($_POST["codubiF"]);
$namedepa1 = trim($_POST["namedepaF"]);
$nombres2 = trim($_POST["unavariaF"]);
$nombres3 = trim($_POST["dosvariaF"]);
 }else if($nombredepa=="ubigeo"){ //departamento
$paisname = trim($_POST["namepaisG"]);
$paiscode = trim($_POST["codepaisG"]);
$ubicod1 = trim($_POST["codubiG"]);
$namedepa1 = trim($_POST["namedepaG"]);
$nombres2 = trim($_POST["unavariaG"]);
$nombres3 = trim($_POST["dosvariaG"]);
 }else if($nombreage=="agente"){ // agente
$paisname = trim($_POST["namepaisH"]);
$paiscode = trim($_POST["codepaisH"]);
$ubicod1 = trim($_POST["codubiH"]);
$namedepa1 = trim($_POST["namedepaH"]);
$nombres2 = trim($_POST["unavariaH"]);
$nombres3 = trim($_POST["dosvariaH"]);
 }else if($nombreaduana=="aduanas"){ // aduanas
$paisname = trim($_POST["namepaisI"]);
$paiscode = trim($_POST["codepaisI"]);
$ubicod1 = trim($_POST["codubiI"]);
$namedepa1 = trim($_POST["namedepaI"]);
$nombres2 = trim($_POST["unavariaI"]);
$nombres3 = trim($_POST["dosvariaI"]);
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
 }

if($ubicod1==""){
	$flatcod = "";
	$queryu = "";
}else{
	$flatcod = $ubicod1;
	$queryu = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}

$ranfecha = "AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2022'";
$wherefecha ="extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2022'";
$filtrofecha = 'extract(year from exportacion.fnum)';

if($nombres3=="partidaexpo"){//consulta como variable partidas exportadas
include("mercado_partidaexpor.php");
}else if($nombres3=="puerto"){//consulta como variable puertos de ingreso
include("mercado_puerto.php");
}else if($nombres3=="empresaexpo"){//consulta como variable empresas exportadoras
include("mercado_empresa.php");
}else if($nombres3=="ubigeo"){//consulta como variable pais
include("mercado_depa.php");
}else if($nombres3=="agente"){
include("mercado_agente.php");
}else if($nombres3=="aduanas"){
 include("mercado_aduana.php");
  }
?>

<?php $conexpg = null;//cierra conexion  ?>


