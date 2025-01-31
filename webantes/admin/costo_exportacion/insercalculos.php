<?php
include ("conection/config.php");

$codigo = $_POST["idprod"];

$mar1 = $_POST["maritimo1"];
$aer1 = $_POST["aereo1"];
$ter1 = $_POST["terrestre1"];

$mar2 = $_POST["maritimo2"];
$aer2 = $_POST["aereo2"];
$ter2 = $_POST["terrestre2"];

$mar3 = $_POST["maritimo3"];
$aer3 = $_POST["aereo3"];
$ter3 = $_POST["terrestre3"];

$mar4 = $_POST["maritimo4"];
$aer4 = $_POST["aereo4"];
$ter4 = $_POST["terrestre4"];

$mar5 = $_POST["maritimo5"];
$aer5 = $_POST["aereo5"];
$ter5 = $_POST["terrestre5"];

$mar6 = $_POST["maritimo6"];
$aer6 = $_POST["aereo6"];
$ter6 = $_POST["terrestre6"];

$mar7 = $_POST["maritimo7"];
$aer7 = $_POST["aereo7"];
$ter7 = $_POST["terrestre7"];

$mar8 = $_POST["maritimo8"];
$aer8 = $_POST["aereo8"];
$ter8 = $_POST["terrestre8"];

$mar9 = $_POST["maritimo9"];
$aer9 = $_POST["aereo9"];
$ter9 = $_POST["terrestre9"];

$costodire_mar1 = $_POST["maritimo_costodire_pe"];
$costodire_aer1 = $_POST["aereo_costodire_pe"];
$costodire_ter1 = $_POST["terrestre_costodire_pe"];

$mar10 = $_POST["maritimo10"];
$aer10 = $_POST["aereo10"];
$ter10 = $_POST["terrestre10"];

$mar11 = $_POST["maritimo11"];
$aer11 = $_POST["aereo11"];
$ter11 = $_POST["terrestre11"];

$costoindi_mar1 = $_POST["maritimo_costoindi_pe"];
$costoindi_aer1 = $_POST["aereo_costoindi_pe"];
$costoindi_ter1 = $_POST["terrestre_costoindi_pe"];

/*eliminamos registro existente*/
$rsd=("delete from cos_expo_paisexpo where cod_prod='$codigo'");
   mysql_query($rsd,$link); 

/*inserta registro en tabla pais exportador*/
$Sqlinsert1="insert into cos_expo_paisexpo (cod_prod, man_lo_exp_mar, man_lo_exp_aer, man_lo_exp_ter, docu_mar, docu_aer, docu_ter, transp_mar, transp_aer, transp_ter, alm_int_mar, alm_int_aer, alm_int_ter, man_preem_mar ,man_preem_aer, man_preem_ter, man_emb_mar, man_emb_aer, man_emb_ter, seguro_mar, seguro_aer, seguro_ter, banco_mar, banco_aer, banco_ter, agente_mar, agente_aer, agente_ter, costo_direc_mar, costo_direc_aer, costo_direc_ter, adminis_mar, adminis_aer, adminis_ter, capi_inv_mar,capi_inv_aer, capi_inv_ter, costo_indir_mar, costo_indir_aer, costo_indir_ter)  values ('$codigo', '$mar1', '$aer1', '$ter1', '$mar2', '$aer2', '$ter2', '$mar3', '$aer3', '$ter3', '$mar4', '$aer4', '$ter3', '$mar5', '$aer5', '$ter5', '$mar6', '$aer6', '$ter6', '$mar7', '$aer7', '$ter7', '$mar8', '$aer8', '$ter8', '$mar9', '$aer9', '$ter9', '$costodire_mar1', '$costodire_aer1', '$costodire_ter1', '$mar10', '$aer10', '$ter10', '$mar11', '$aer11', '$ter11', '$costoindi_mar1', '$costoindi_aer1', '$costoindi_ter1' )";
   mysql_query($Sqlinsert1,$link) or die (mysql_error());


$mar12 = $_POST["maritimo12"];
$aer12 = $_POST["aereo12"];
$ter12 = $_POST["terrestre12"];

$mar13 = $_POST["maritimo13"];
$aer13 = $_POST["aereo13"];
$ter13 = $_POST["terrestre13"];

$mar14 = $_POST["maritimo14"];
$aer14 = $_POST["aereo14"];
$ter14 = $_POST["terrestre14"];

$costodire_mar2 = $_POST["maritimo_costodire_ti"];
$costodire_aer2 = $_POST["aereo_costodire_ti"];
$costodire_ter2 = $_POST["terrestre_costodire_ti"];

$mar15 = $_POST["maritimo15"];
$aer15 = $_POST["aereo15"];
$ter15 = $_POST["terrestre15"];

$costoindi_mar2 = $_POST["maritimo_costoindi_ti"];
$costoindi_aer2 = $_POST["aereo_costoindi_ti"];
$costoindi_ter2 = $_POST["terrestre_costoindi_ti"];

/*eliminamos registro existente*/
$rs2=("delete from cos_expo_transinter where cod_prod='$codigo'");
   mysql_query($rs2,$link); 

/*inserta registro en tabla transito internacional*/
$Sqlinsert2="insert into cos_expo_transinter (cod_prod, transinter_mar, transinter_aer, transinter_ter, seguinter_mar, seguinter_aer, seguinter_ter, mani_desem_mar, mani_desem_aer, mani_desem_ter, costodire_mar, costodire_aer, costodire_ter, capi_inve_mar, capi_inve_aer, capi_inve_ter, costoindi_mar, costoindi_aer, costoindi_ter)  values ('$codigo', '$mar12', '$aer12', '$ter12', '$mar13', '$aer13', '$ter13', '$mar14', '$aer14', '$ter14', '$costodire_mar2', '$costodire_aer2', '$costodire_ter2', '$mar15', '$aer15', '$ter15', '$costoindi_mar2', '$costoindi_aer2', '$costoindi_ter2' )";
   mysql_query($Sqlinsert2,$link) or die (mysql_error());
   
$mar16 = $_POST["maritimo16"];
$aer16 = $_POST["aereo16"];
$ter16 = $_POST["terrestre16"];

$mar17 = $_POST["maritimo17"];
$aer17 = $_POST["aereo17"];
$ter17 = $_POST["terrestre17"];

$mar18 = $_POST["maritimo18"];
$aer18 = $_POST["aereo18"];
$ter18 = $_POST["terrestre18"];

$mar19 = $_POST["maritimo19"];
$aer19 = $_POST["aereo19"];
$ter19 = $_POST["terrestre19"];

$mar20 = $_POST["maritimo20"];
$aer20 = $_POST["aereo20"];
$ter20 = $_POST["terrestre20"];

$mar21 = $_POST["maritimo21"];
$aer21 = $_POST["aereo21"];
$ter21 = $_POST["terrestre21"];

$mar22 = $_POST["maritimo22"];
$aer22 = $_POST["aereo22"];
$ter22 = $_POST["terrestre22"];

$costodire_mar3 = $_POST["maritimo_costodire_pi"];
$costodire_aer3 = $_POST["aereo_costodire_pi"];
$costodire_ter3 = $_POST["terrestre_costodire_pi"];

$mar23 = $_POST["maritimo23"];
$aer23 = $_POST["aereo23"];
$ter23 = $_POST["terrestre23"];

$costoindi_mar3 = $_POST["maritimo_costoindi_pi"];
$costoindi_aer3 = $_POST["aereo_costoindi_pi"];
$costoindi_ter3 = $_POST["terrestre_costoindi_pi"];

/*eliminamos registro existente*/
$rs3=("delete from cos_expo_paisimpo where cod_prod='$codigo'");
   mysql_query($rs3,$link); 

/*inserta registro en tabla pais importador*/
$Sqlinsert3="insert into cos_expo_paisimpo (cod_prod, transconv_mar, transconv_aer, transconv_ter, alma_mar, alma_aer, alma_ter, segu_mar, segu_aer, segu_ter, docume_mar, docume_aer, docume_ter, aduan_mar, aduan_aer, aduan_ter, agen_mar, agen_aer, agen_ter, banca_mar, banca_aer, banca_ter, costodire_mar, costodire_aer, costodire_ter, capi_inve_mar, capi_inve_aer, capi_inve_ter, costoindi_mar, costoindi_aer, costoindi_ter)  values ('$codigo', '$mar16', '$aer16', '$ter16', '$mar17', '$aer17', '$ter17', '$mar18', '$aer18', '$ter18',  '$mar19', '$aer19', '$ter19', '$mar20', '$aer20', '$ter20', '$mar21', '$aer21', '$ter21',  '$mar22', '$aer22', '$ter22','$costodire_mar3', '$costodire_aer3', '$costodire_ter3', '$mar23', '$aer23', '$ter23', '$costoindi_mar3', '$costoindi_aer3', '$costoindi_ter3' )";
   mysql_query($Sqlinsert3,$link) or die (mysql_error());
   
  
$mar24 = $_POST["maritimo24"];
$aer24 = $_POST["aereo24"];
$ter24 = $_POST["terrestre24"];

$mar25 = $_POST["maritimo25"];
$aer25 = $_POST["aereo25"];
$ter25 = $_POST["terrestre25"];

$mar26 = $_POST["maritimo26"];
$aer26 = $_POST["aereo26"];
$ter26 = $_POST["terrestre26"];

$mar27 = $_POST["maritimo27"];
$aer27 = $_POST["aereo27"];
$ter27 = $_POST["terrestre27"];

$mar28 = $_POST["maritimo28"];
$aer28 = $_POST["aereo28"];
$ter28 = $_POST["terrestre28"];

$mar29 = $_POST["maritimo29"];
$aer29 = $_POST["aereo29"];
$ter29 = $_POST["terrestre29"];

$mar30 = $_POST["maritimo30"];
$aer30 = $_POST["aereo30"];
$ter30 = $_POST["terrestre30"];

$mar31 = $_POST["maritimo31"];
$aer31 = $_POST["aereo31"];
$ter31 = $_POST["terrestre31"];

$mar32 = $_POST["maritimo32"];
$aer32 = $_POST["aereo32"];
$ter32 = $_POST["terrestre32"];

$mar33 = $_POST["maritimo33"];
$aer33 = $_POST["aereo33"];
$ter33 = $_POST["terrestre33"];

$mar34 = $_POST["maritimo34"];
$aer34 = $_POST["aereo34"];
$ter34 = $_POST["terrestre34"];

$mar35 = $_POST["maritimo35"];
$aer35 = $_POST["aereo35"];
$ter35 = $_POST["terrestre35"];

$mar36 = $_POST["maritimo36"];
$aer36 = $_POST["aereo36"];
$ter36 = $_POST["terrestre36"];

/*eliminamos registro existente*/
$rs3=("delete from cos_expo_costotota where cod_prod='$codigo'");
   mysql_query($rs3,$link); 
   
/*inserta registro en tabla costo total*/
$Sqlinsert4="insert into cos_expo_costotota (cod_prod, valor_exw_mar, valor_exw_aer, valor_exw_ter, valor_fac_mar, valor_fac_aer, valor_fac_ter, valor_dap1_mar, valor_dap1_aer, valor_dap1_ter, valor_fas_mar, valor_fas_aer, valor_fas_ter, valor_fob_mar, valor_fob_aer, valor_fob_ter, valor_cfr_mar, valor_cfr_aer, valor_cfr_ter, valor_cpt_mar, valor_cpt_aer, valor_cpt_ter, valor_cif_mar, valor_cif_aer, valor_cif_ter, valor_cip_mar, valor_cip_aer, valor_cip_ter, valor_dap2_mar, valor_dap2_aer, valor_dap2_ter, valor_dat_mar, valor_dat_aer, valor_dat_ter, valor_dap3_mar, valor_dap3_aer, valor_dap3_ter, valor_ddp_mar, valor_ddp_aer, valor_ddp_ter)  values ('$codigo', '$mar24', '$aer24', '$ter24', '$mar25', '$aer25', '$ter25', '$mar26', '$aer26', '$ter26',  '$mar27', '$aer27', '$ter27', '$mar28', '$aer28', '$ter28', '$mar29', '$aer29', '$ter29',  '$mar30', '$aer30', '$ter30', '$mar31', '$aer31', '$ter31', '$mar32', '$aer32', '$ter32', '$mar33', '$aer33', '$ter33', '$mar34', '$aer34', '$ter34', '$mar35', '$aer35', '$ter35', '$mar36', '$aer36', '$ter36' )";
   mysql_query($Sqlinsert4,$link) or die (mysql_error());
   
/* costo total */

$item1 = $_POST["ite1"];
$item2 = $_POST["ite2"];
$item3 = $_POST["ite3"];
$item4 = $_POST["ite4"];
$item5 = $_POST["ite5"];

if($item1 == '1'){
$codeta1 = $_POST["deta1"];
$costodist_mar1 = $_POST["dist_mar1"];
$costodist_aer1 = $_POST["dist_aer1"];
$costodist_ter1 = $_POST["dist_terre1"];

	$sqlupdate1=("update cos_expo_prod_detalle set distri_costo_mar='$costodist_mar1', distri_costo_aer='$costodist_aer1', distri_costo_ter='$costodist_ter1' where id_detalle='$codeta1' and id_prod='$codigo'");
   mysql_query($sqlupdate1,$link)or die (mysql_error()); 
}

if($item2 == '2'){
$codeta2 = $_POST["deta2"];
$costodist_mar2 = $_POST["dist_mar2"];
$costodist_aer2 = $_POST["dist_aer2"];
$costodist_ter2 = $_POST["dist_terre2"];

	$sqlupdate2=("update cos_expo_prod_detalle set distri_costo_mar='$costodist_mar2', distri_costo_aer='$costodist_aer2', distri_costo_ter='$costodist_ter2' where id_detalle='$codeta2' and id_prod='$codigo'");
   mysql_query($sqlupdate2,$link)or die (mysql_error()); 
}

if($item3 == '3'){
$codeta3 = $_POST["deta3"];
$costodist_mar3 = $_POST["dist_mar3"];
$costodist_aer3 = $_POST["dist_aer3"];
$costodist_ter3 = $_POST["dist_terre3"];

	$sqlupdate3=("update cos_expo_prod_detalle set distri_costo_mar='$costodist_mar3', distri_costo_aer='$costodist_aer3', distri_costo_ter='$costodist_ter3' where id_detalle='$codeta3' and id_prod='$codigo'");
   mysql_query($sqlupdate3,$link)or die (mysql_error()); 
}

if($item4 == '4'){
$codeta4 = $_POST["deta4"];
$costodist_mar4 = $_POST["dist_mar4"];
$costodist_aer4 = $_POST["dist_aer4"];
$costodist_ter4 = $_POST["dist_terre4"];

	$sqlupdate4=("update cos_expo_prod_detalle set distri_costo_mar='$costodist_mar4', distri_costo_aer='$costodist_aer4', distri_costo_ter='$costodist_ter4' where id_detalle='$codeta4' and id_prod='$codigo'");
   mysql_query($sqlupdate4,$link)or die (mysql_error()); 
}

if($item5 == '5'){
$codeta5 = $_POST["deta5"];
$costodist_mar5 = $_POST["dist_mar5"];
$costodist_aer5 = $_POST["dist_aer5"];
$costodist_ter5 = $_POST["dist_terre5"];

	$sqlupdate5=("update cos_expo_prod_detalle set distri_costo_mar='$costodist_mar5', distri_costo_aer='$costodist_aer5', distri_costo_ter='$costodist_ter5' where id_detalle='$codeta5' and id_prod='$codigo'");
   mysql_query($sqlupdate5,$link)or die (mysql_error()); 
}


header("Location: rptexpofinal.php?expo=$codigo");

?>