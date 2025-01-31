<?php
include("../../conector/config.php");
set_time_limit(950);

date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");

$nombres3 = trim($_POST["dosvaria"]);
$nombrepue = trim($_POST["dosvaria4"]);
$nombrempr = trim($_POST["dosvaria5"]);
$nombredepa = trim($_POST["dosvaria6"]);
$nombreage = trim($_POST["dosvaria7"]);
$nombreaduana = trim($_POST["dosvaria8"]);

if($nombres3=="partidaexpo"){ // partidas
$paisname = $_POST["namempA3"];
$paiscode = $_POST["codempA3"];	
$ubicod1 = $_POST["codubi3"];
$namedepa1 = $_POST["namedepa3"];
$nombres2 = $_POST["unavaria"];
$nombres3 = $_POST["dosvaria"];
}else if($nombrepue=="puerto"){ //puerto
$paisname = $_POST["namempA4"];
$paiscode = $_POST["codempA4"];	
$ubicod1 = $_POST["codubi4"];
$namedepa1 = $_POST["namedepa4"];
$nombres2 = $_POST["unavariaevamer"];
$nombres3 = $_POST["dosvaria4"];
}else if($nombrempr=="pais"){ //mercado
$paisname = $_POST["namempA5"];
$paiscode = $_POST["codempA5"];	
$ubicod1 = $_POST["codubi5"];
$namedepa1 = $_POST["namedepa5"];
$nombres2 = $_POST["unavaria5"];
$nombres3 = $_POST["dosvaria5"];
 }else if($nombredepa=="ubigeo"){ //departamento
$paisname = $_POST["namempA6"];
$paiscode = $_POST["codempA6"];	
$ubicod1 = $_POST["codubi6"];
$namedepa1 = $_POST["namedepa6"];
$nombres2 = $_POST["unavaria6"];
$nombres3 = $_POST["dosvaria6"];
 }else if($nombreage=="agente"){ // agente
$paisname = $_POST["namempA7"];
$paiscode = $_POST["codempA7"];	
$ubicod1 = $_POST["codubi7"];
$namedepa1 = $_POST["namedepa7"];
$nombres2 = $_POST["unavaria7"];
$nombres3 = $_POST["dosvaria7"];
 }else if($nombreaduana=="aduanas"){ // aduanas
$paisname = $_POST["namempA8"];
$paiscode = $_POST["codempA8"];	
$ubicod1 = $_POST["codubi8"];
$namedepa1 = $_POST["namedepa8"];
$nombres2 = $_POST["unavaria8"];
$nombres3 = $_POST["dosvaria8"];
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
	  $combo2 = "Mercados Destinos";
 }

if($ubicod1==""){
	$flatcod = "";
	$querytu = "";
}else{
	$flatcod = $ubicod1;
	$querytu = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}

$ranfecha = "AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2022'";
$filtrofecha='extract(year from exportacion.fnum)';
$wherefecha ="extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2022'";

if($nombres3=="partidaexpo"){//consulta como variable partidas exportadas
include("empresa_partidaexpor.php");
}else if($nombres3=="puerto"){//consulta como variable puertos de ingreso
include("empresa_puerto.php");
}else if($nombres3=="pais"){//consulta como variable mercados
include("empresa_mercado.php");
}else if($nombres3=="ubigeo"){//consulta como variable depa
include("empresa_depa.php");
}else if($nombres3=="agente"){
include("empresa_agente.php");
}else if($nombres3=="aduanas"){
 include("empresa_aduana.php");
  }
?>

<?php $conexpg = null;//cierra conexion  ?>


