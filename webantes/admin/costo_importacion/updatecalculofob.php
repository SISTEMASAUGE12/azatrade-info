<?php
include ("conection/config.php");

$codiprod = $_POST["idprod"];
$codiotro = $_POST["idotros"];
$codiwork = $_POST["work"];
$tipo = $_POST["tipom"]; // tipo de seguro

if ($codiwork!=''){
$Admin = $_POST["admini"];
$Capi = $_POST["capital"];
$Mane = $_POST["manexpor"];
$Docu = $_POST["documen"];
$Trans = $_POST["transpo"];
$Almai = $_POST["almaceninter"];
$Manip = $_POST["manipreemba"];
$Manie = $_POST["maniemba"];
$seg = $_POST["segu"];
$ban = $_POST["banca"];
$age = $_POST["agen"];
}else{
$Admin = "0";
$Capi = "0";
$Mane = "0";
$Docu = "0";
$Trans = "0";
$Almai = "0";
$Manip = "0";
$Manie = "0";
$seg = "0";
$ban = "0";
$age = "0";
}
$fob = $_POST["fob"];
$fletex = $_POST["flete"];
$paise = $_POST["costopaiexpo"]; 
$costodirecto = $_POST["costodire"]; 

if($tipo=='De Tabla'){
$stabla = $_POST["segtabla"];
$prima = "0";
$dedu = "0";
$dere = "0";
$asegu = "";
}else{
$stabla = "0";
$prima = $_POST["primaneta"];
$dedu = $_POST["deduci"];
$dere = $_POST["derecho"];
$asegu = $_POST["aseguradora"];
}

$rsh=("update cos_otrodatos set pais_expo='$paise', costo_directo='$costodirecto', mani_expor='$Mane', documen='$Docu', transpo='$Trans', almac_inter='$Almai', mani_preemb='$Manip', mani_emb='$Manie', seguro='$seg', bancario='$ban', agente='$age', adminis='$Admin', capital_inven='$Capi', fob='$fob', flete='$fletex', tipo_seguro='$tipo', prima_neta='$prima', deducible='$dedu', derecho_emision='$dere', empresa_aseguradora='$asegu', seguro_tabla='$stabla' where id_dato='$codiotro' and id_prod='$codiprod'");
   mysql_query($rsh,$link)or die (mysql_error()); 
	
	
 header("Location: listaderechoarancel.php?cfr=$codiprod&tif=$codiotro");
?>