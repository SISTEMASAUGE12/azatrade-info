<?php
include ("conection/config.php");

$codi = $_POST["idprodu"];

$itemuni1 = $_POST["ite1"];
$itemuni2 = $_POST["ite2"];
$itemuni3 = $_POST["ite3"];
$itemuni4 = $_POST["ite4"];
$itemuni5 = $_POST["ite5"];

$tasad = $_POST["tasadespa"];
$recargar = $_POST["rremu"];
$perce = $_POST["perce"];
$cif = $_POST["cifx"];
$Dere_emision = $_POST["fobx3"];



// actualizamos datos del producto
$rshx=("update cos_producto set tasa_desp='$tasad', recargo_num='$recargar', percepcion='$perce' where id_prod='$codi'");
   mysql_query($rshx,$link)or die (mysql_error()); 

// actualizamos registro
if($itemuni1=='1'){
$id_det1 = $_POST["iddetalle1"];
$adval1 = $_POST["advalore1"];
$arancelimpo1 = $_POST["calaraimpo1"];
$dere_esp_tn1 = $_POST["despecifico1"];
$dere_esp_impo1 = $_POST["despecificoimpo1"];
$sobre1 = $_POST["sobretasa1"];
$sobreimpo1 = $_POST["sobretasaimpo1"];
$rebaarance1 = $_POST["rebajaarance1"];
$rebaimpo1 = $_POST["rebajaimpo1"];
$idato1 = $_POST["isdato1"];
$iimpo1 = $_POST["iscimpo1"];
$adato1 = $_POST["antidato1"];
$aimpo1 = $_POST["antimpo1"];
$igv1 = $_POST["igvipm1"];
$igvimpo1 = $_POST["igvipmimpo1"];

$Sqlv="update cos_prod_detalle set advalore='$adval1', aranc_impo='$arancelimpo1', derecho_esp_tn='$dere_esp_tn1', derecho_esp_importe='$dere_esp_impo1', porcen_sobretasa='$sobre1', sobretasa_importe='$sobreimpo1', porcen_rebaja_aranc='$rebaarance1', rebaja_aranc_importe='$rebaimpo1', isc_dato='$idato1', isc_importe='$iimpo1', antid_dato='$adato1', antid_importe='$aimpo1', igv_ipm='$igv1', igv_ipm_importe='$igvimpo1' where id_prod='$codi' and id_detalle='$id_det1' ";
   mysql_query($Sqlv,$link) or die (mysql_error());
}

if($itemuni2=='2'){
$id_det2 = $_POST["iddetalle2"];
$adval2 = $_POST["advalore2"];
$arancelimpo2 = $_POST["calaraimpo2"];
$dere_esp_tn2 = $_POST["despecifico2"];
$dere_esp_impo2 = $_POST["despecificoimpo2"];
$sobre2 = $_POST["sobretasa2"];
$sobreimpo2 = $_POST["sobretasaimpo2"];
$rebaarance2 = $_POST["rebajaarance2"];
$rebaimpo2 = $_POST["rebajaimpo2"];
$idato2 = $_POST["isdato2"];
$iimpo2 = $_POST["iscimpo2"];
$adato2 = $_POST["antidato2"];
$aimpo2 = $_POST["antimpo2"];
$igv2 = $_POST["igvipm2"];
$igvimpo2 = $_POST["igvipmimpo2"];

$Sqlv2="update cos_prod_detalle set advalore='$adval2', aranc_impo='$arancelimpo2', derecho_esp_tn='$dere_esp_tn2', derecho_esp_importe='$dere_esp_impo2', porcen_sobretasa='$sobre2', sobretasa_importe='$sobreimpo2', porcen_rebaja_aranc='$rebaarance2', rebaja_aranc_importe='$rebaimpo2', isc_dato='$idato2', isc_importe='$iimpo2', antid_dato='$adato2', antid_importe='$aimpo2', igv_ipm='$igv2', igv_ipm_importe='$igvimpo2' where id_prod='$codi' and id_detalle='$id_det2' ";
   mysql_query($Sqlv2,$link) or die (mysql_error());
}

if($itemuni3=='3'){
$id_det3 = $_POST["iddetalle3"];
$adval3 = $_POST["advalore3"];
$arancelimpo3 = $_POST["calaraimpo3"];
$dere_esp_tn3 = $_POST["despecifico3"];
$dere_esp_impo3 = $_POST["despecificoimpo3"];
$sobre3 = $_POST["sobretasa3"];
$sobreimpo3 = $_POST["sobretasaimpo3"];
$rebaarance3 = $_POST["rebajaarance3"];
$rebaimpo3 = $_POST["rebajaimpo3"];
$idato3 = $_POST["isdato3"];
$iimpo3 = $_POST["iscimpo3"];
$adato3 = $_POST["antidato3"];
$aimpo3 = $_POST["antimpo3"];
$igv3 = $_POST["igvipm3"];
$igvimpo3 = $_POST["igvipmimpo3"];

$Sqlv3="update cos_prod_detalle set advalore='$adval3', aranc_impo='$arancelimpo3', derecho_esp_tn='$dere_esp_tn3', derecho_esp_importe='$dere_esp_impo3', porcen_sobretasa='$sobre3', sobretasa_importe='$sobreimpo3', porcen_rebaja_aranc='$rebaarance3', rebaja_aranc_importe='$rebaimpo3', isc_dato='$idato3', isc_importe='$iimpo3', antid_dato='$adato3', antid_importe='$aimpo3', igv_ipm='$igv3', igv_ipm_importe='$igvimpo3' where id_prod='$codi' and id_detalle='$id_det3' ";
   mysql_query($Sqlv3,$link) or die (mysql_error());
}

if($itemuni4=='4'){
$id_det4 = $_POST["iddetalle4"];
$adval4 = $_POST["advalore4"];
$arancelimpo4 = $_POST["calaraimpo4"];
$dere_esp_tn4 = $_POST["despecifico4"];
$dere_esp_impo4 = $_POST["despecificoimpo4"];
$sobre4 = $_POST["sobretasa4"];
$sobreimpo4 = $_POST["sobretasaimpo4"];
$rebaarance4 = $_POST["rebajaarance4"];
$rebaimpo4 = $_POST["rebajaimpo4"];
$idato4 = $_POST["isdato4"];
$iimpo4= $_POST["iscimpo4"];
$adato4 = $_POST["antidato4"];
$aimpo4 = $_POST["antimpo4"];
$igv4 = $_POST["igvipm4"];
$igvimpo4 = $_POST["igvipmimpo4"];

$Sqlv4="update cos_prod_detalle set advalore='$adval4', aranc_impo='$arancelimpo4', derecho_esp_tn='$dere_esp_tn4', derecho_esp_importe='$dere_esp_impo4', porcen_sobretasa='$sobre4', sobretasa_importe='$sobreimpo4', porcen_rebaja_aranc='$rebaarance4', rebaja_aranc_importe='$rebaimpo4', isc_dato='$idato4', isc_importe='$iimpo4', antid_dato='$adato4', antid_importe='$aimpo4', igv_ipm='$igv4', igv_ipm_importe='$igvimpo4' where id_prod='$codi' and id_detalle='$id_det4' ";
   mysql_query($Sqlv4,$link) or die (mysql_error());
}

if($itemuni5=='5'){
$id_det5 = $_POST["iddetalle5"];
$adval5 = $_POST["advalore5"];
$arancelimpo5 = $_POST["calaraimpo5"];
$dere_esp_tn5 = $_POST["despecifico5"];
$dere_esp_impo5 = $_POST["despecificoimpo5"];
$sobre5 = $_POST["sobretasa5"];
$sobreimpo5 = $_POST["sobretasaimpo5"];
$rebaarance5 = $_POST["rebajaarance5"];
$rebaimpo5 = $_POST["rebajaimpo4"];
$idato5 = $_POST["isdato5"];
$iimpo5= $_POST["iscimpo5"];
$adato5 = $_POST["antidato5"];
$aimpo5 = $_POST["antimpo5"];
$igv5 = $_POST["igvipm5"];
$igvimpo5 = $_POST["igvipmimpo5"];

$Sqlv5="update cos_prod_detalle set advalore='$adval5', aranc_impo='$arancelimpo5', derecho_esp_tn='$dere_esp_tn5', derecho_esp_importe='$dere_esp_impo5', porcen_sobretasa='$sobre5', sobretasa_importe='$sobreimpo5', porcen_rebaja_aranc='$rebaarance5', rebaja_aranc_importe='$rebaimpo5', isc_dato='$idato5', isc_importe='$iimpo5', antid_dato='$adato5', antid_importe='$aimpo5', igv_ipm='$igv5', igv_ipm_importe='$igvimpo5' where id_prod='$codi' and id_detalle='$id_det5' ";
   mysql_query($Sqlv5,$link) or die (mysql_error());
}


header("Location: caldereimpuesto.php?dif=$codi&cif=$cif&emisi=$Dere_emision");

?>