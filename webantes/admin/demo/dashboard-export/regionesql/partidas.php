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
$namedato = $_POST["namedatoD"];
$codeid = $_POST["codedatoD"];
$nombres2 = $_POST["unavaria"];
$nombres3 = $_POST["dosvaria"];
}else if($nombrepue=="puerto"){ //puerto
$namedato = trim($_POST["namedatoE"]);
$codeid = trim($_POST["codedatoE"]);
$nombres2 = trim($_POST["unavariaevamer"]);
$nombres3 = trim($_POST["dosvariaE"]);
 }else if($nombrempr=="empresaexpo"){ //empresa
$namedato = trim($_POST["namedatoF"]);
$codeid = trim($_POST["codedatoF"]);
$nombres2 = trim($_POST["unavariaF"]);
$nombres3 = trim($_POST["dosvariaF"]);
 }else if($nombredepa=="pais"){ //Pais
$namedato = trim($_POST["namedatoG"]);
$codeid = trim($_POST["codedatoG"]);
$nombres2 = trim($_POST["unavariaG"]);
$nombres3 = trim($_POST["dosvariaG"]);
 }else if($nombreage=="agente"){ // agente
$namedato = trim($_POST["namedatoH"]);
$codeid = trim($_POST["codedatoH"]);
$nombres2 = trim($_POST["unavariaH"]);
$nombres3 = trim($_POST["dosvariaH"]);
 }else if($nombreaduana=="aduanas"){ // aduanas
$namedato = trim($_POST["namedatoI"]);
$codeid = trim($_POST["codedatoI"]);
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
 }else if($nombres3=="pais"){
	  $combo2 = "Mercados de Destinos";
 }else if($nombres3=="agente"){
	  $combo2 = "Agente de Aduanas";
 }else if($nombres3=="aduanas"){
	  $combo2 = "Aduanas";
 }

$filtrofecha='extract(year from exportacion.fnum)';
$wherefecha ="extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2022'";

if($nombres3=="partidaexpo"){//consulta como variable partidas exportadas
include("region_partidaexpor.php");
}else if($nombres3=="puerto"){//consulta como variable puertos de ingreso
include("region_puerto.php");
}else if($nombres3=="empresaexpo"){//consulta como variable empresas exportadoras
include("region_empresa.php");
}else if($nombres3=="pais"){//consulta como variable pais
include("region_mercado.php");
}else if($nombres3=="agente"){
include("region_agente.php");
}else if($nombres3=="aduanas"){
include("region_aduana.php");
  }
?>

<?php $conexpg = null;//cierra conexion  ?>


