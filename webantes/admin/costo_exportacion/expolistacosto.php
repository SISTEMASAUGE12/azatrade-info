<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";

$codigox = $_GET["fob"];
//$idotros = $_GET["dato"];
$exwork = $_GET["work"];
//$exwork = "xx";

$sqlprod="SELECT
cos_expo_prod_detalle.id_prod,
sum(cos_expo_prod_detalle.total_factura) as totalimporte
FROM
cos_expo_prod_detalle
WHERE
cos_expo_prod_detalle.id_prod = '$codigox'
GROUP BY
cos_expo_prod_detalle.id_prod";
$rsp = mysql_query($sqlprod);
if (mysql_num_rows($rsp) > 0){
	while($rowp = mysql_fetch_array($rsp)){
		$importe = $rowp["totalimporte"];
	}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Exportacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">


<script language="javascript" type="text/javascript">
function valida(lista) {

    if (lista.maritimo1.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo1.focus()
		return false;
	}
	if (lista.aereo1.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo1.focus()
		return false;
	}
	if (lista.terrestre1.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre1.focus()
		return false;
	}
	if (lista.maritimo2.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo2.focus()
		return false;
	}
	if (lista.aereo2.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo2.focus()
		return false;
	}
	if (lista.terrestre2.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre2.focus()
		return false;
	}
	if (lista.maritimo3.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo3.focus()
		return false;
	}
	if (lista.aereo3.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo3.focus()
		return false;
	}
	if (lista.terrestre3.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre3.focus()
		return false;
	}
	if (lista.maritimo4.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo4.focus()
		return false;
	}
	if (lista.aereo4.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo4.focus()
		return false;
	}
	if (lista.terrestre4.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre4.focus()
		return false;
	}
	if (lista.maritimo5.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo5.focus()
		return false;
	}
	if (lista.aereo5.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo5.focus()
		return false;
	}
	if (lista.terrestre5.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre5.focus()
		return false;
	}
	if (lista.maritimo6.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo6.focus()
		return false;
	}
	if (lista.aereo6.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo6.focus()
		return false;
	}
	if (lista.terrestre6.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre6.focus()
		return false;
	}
	if (lista.maritimo7.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo7.focus()
		return false;
	}
	if (lista.aereo7.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo7.focus()
		return false;
	}
	if (lista.terrestre7.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre7.focus()
		return false;
	}
	if (lista.maritimo8.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo8.focus()
		return false;
	}
	if (lista.aereo8.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo8.focus()
		return false;
	}
	if (lista.terrestre8.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre8.focus()
		return false;
	}
	if (lista.maritimo9.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo9.focus()
		return false;
	}
	if (lista.aereo9.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo9.focus()
		return false;
	}
	if (lista.terrestre9.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre9.focus()
		return false;
	}
	if (lista.maritimo10.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo10.focus()
		return false;
	}
	if (lista.aereo10.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo10.focus()
		return false;
	}
	if (lista.terrestre10.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre10.focus()
		return false;
	}
	if (lista.maritimo11.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo11.focus()
		return false;
	}
	if (lista.aereo11.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo11.focus()
		return false;
	}
	if (lista.terrestre11.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre11.focus()
		return false;
	}
	if (lista.maritimo12.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo12.focus()
		return false;
	}
	if (lista.aereo12.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo12.focus()
		return false;
	}
	if (lista.terrestre12.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre12.focus()
		return false;
	}
	if (lista.maritimo13.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo13.focus()
		return false;
	}
	if (lista.aereo13.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo13.focus()
		return false;
	}
	if (lista.terrestre13.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre13.focus()
		return false;
	}
	if (lista.maritimo14.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo14.focus()
		return false;
	}
	if (lista.aereo14.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo14.focus()
		return false;
	}
	if (lista.terrestre14.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre14.focus()
		return false;
	}
	if (lista.maritimo15.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo15.focus()
		return false;
	}
	if (lista.aereo15.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo15.focus()
		return false;
	}
	if (lista.terrestre15.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre15.focus()
		return false;
	}
	if (lista.maritimo16.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo16.focus()
		return false;
	}
	if (lista.aereo16.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo16.focus()
		return false;
	}
	if (lista.terrestre16.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre16.focus()
		return false;
	}
	if (lista.maritimo17.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo17.focus()
		return false;
	}
	if (lista.aereo17.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo17.focus()
		return false;
	}
	if (lista.terrestre17.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre1.focus()
		return false;
	}
	if (lista.maritimo18.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo18.focus()
		return false;
	}
	if (lista.aereo18.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo18.focus()
		return false;
	}
	if (lista.terrestre18.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre18.focus()
		return false;
	}
	if (lista.maritimo19.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo19.focus()
		return false;
	}
	if (lista.aereo19.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo19.focus()
		return false;
	}
	if (lista.terrestre19.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre19.focus()
		return false;
	}
	if (lista.maritimo20.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo20.focus()
		return false;
	}
	if (lista.aereo20.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo20.focus()
		return false;
	}
	if (lista.terrestre20.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre20.focus()
		return false;
	}
	if (lista.maritimo21.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo21.focus()
		return false;
	}
	if (lista.aereo21.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo21.focus()
		return false;
	}
	if (lista.terrestre21.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre21.focus()
		return false;
	}
	if (lista.maritimo22.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo22.focus()
		return false;
	}
	if (lista.aereo22.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo22.focus()
		return false;
	}
	if (lista.terrestre22.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre22.focus()
		return false;
	}
	if (lista.maritimo23.value.length < 1){
		alert("Ingrese Costo Maritimo");
		document.lista.maritimo23.focus()
		return false;
	}
	if (lista.aereo23.value.length < 1){
		alert("Ingrese Costo Aereo");
		document.lista.aereo23.focus()
		return false;
	}
	if (lista.terrestre23.value.length < 1){
		alert("Ingrese Costo Terrestre");
		document.lista.terrestre23.focus()
		return false;
	}
	if (lista.dist_mar1.value.length < 1){
		alert("Ingrese Distribucion Costo Maritimo");
		document.lista.dist_mar1.focus()
		return false;
	}
	if (lista.dist_aer1.value.length < 1){
		alert("Ingrese Distribucion Costo Aereo");
		document.lista.dist_aer1.focus()
		return false;
	}
	if (lista.dist_terre1.value.length < 1){
		alert("Ingrese Distribucion Costo Terrestre");
		document.lista.dist_terre1.focus()
		return false;
	}
	if (lista.dist_mar2.value.length < 1){
		alert("Ingrese Distribucion Costo Maritimo");
		document.lista.dist_mar2.focus()
		return false;
	}
	if (lista.dist_aer2.value.length < 1){
		alert("Ingrese Distribucion Costo Aereo");
		document.lista.dist_aer2.focus()
		return false;
	}
	if (lista.dist_terre2.value.length < 1){
		alert("Ingrese Distribucion Costo Terrestre");
		document.lista.dist_terre2.focus()
		return false;
	}
	if (lista.dist_mar3.value.length < 1){
		alert("Ingrese Distribucion Costo Maritimo");
		document.lista.dist_mar3.focus()
		return false;
	}
	if (lista.dist_aer3.value.length < 1){
		alert("Ingrese Distribucion Costo Aereo");
		document.lista.dist_aer3.focus()
		return false;
	}
	if (lista.dist_terre3.value.length < 1){
		alert("Ingrese Distribucion Costo Terrestre");
		document.lista.dist_terre3.focus()
		return false;
	}
	if (lista.dist_mar4.value.length < 1){
		alert("Ingrese Distribucion Costo Maritimo");
		document.lista.dist_mar4.focus()
		return false;
	}
	if (lista.dist_aer4.value.length < 1){
		alert("Ingrese Distribucion Costo Aereo");
		document.lista.dist_aer4.focus()
		return false;
	}
	if (lista.dist_terre4.value.length < 1){
		alert("Ingrese Distribucion Costo Terrestre");
		document.lista.dist_terre4.focus()
		return false;
	}
	if (lista.dist_mar5.value.length < 1){
		alert("Ingrese Distribucion Costo Maritimo");
		document.lista.dist_mar5.focus()
		return false;
	}
	if (lista.dist_aer5.value.length < 1){
		alert("Ingrese Distribucion Costo Aereo");
		document.lista.dist_aer5.focus()
		return false;
	}
	if (lista.dist_terre5.value.length < 1){
		alert("Ingrese Distribucion Costo Terrestre");
		document.lista.dist_terre5.focus()
		return false;
	}


	return true;

}
</script>

<SCRIPT LANGUAGE="JavaScript">
function NumCheck(e, field)
{
key = e.keyCode ? e.keyCode : e.which
// backspace 
if (key == 8) return true
// 0-9 
if (key > 47 && key < 58) {
	if (field.value == "") return true
	regexp = /.[0-9]{10}$/
	return !(regexp.test(field.value))
} // . 
if (key == 46) {
	if (field.value == "") return false
	regexp = /^[0-9]+$/
	return regexp.test(field.value)
} // other key 
return false
}
</script>




<script type="text/javascript">  
// calcula campos
function Sumar(){  
      interval = setInterval("calcular()",1);  
}  
function calcular(){

/*pais exportador*/
	mar1 = document.lista.maritimo1.value;
	mar2 = document.lista.maritimo2.value;
	mar3 = document.lista.maritimo3.value;
	mar4 = document.lista.maritimo4.value;
	mar5 = document.lista.maritimo5.value;
	mar6 = document.lista.maritimo6.value;
	mar7 = document.lista.maritimo7.value;
	mar8 = document.lista.maritimo8.value;
	mar9 = document.lista.maritimo9.value;
	aer1 = document.lista.aereo1.value;
	aer2 = document.lista.aereo2.value;
	aer3 = document.lista.aereo3.value;
	aer4 = document.lista.aereo4.value;
	aer5 = document.lista.aereo5.value;
	aer6 = document.lista.aereo6.value;
	aer7 = document.lista.aereo7.value;
	aer8 = document.lista.aereo8.value;
	aer9 = document.lista.aereo9.value;
	ter1 = document.lista.terrestre1.value;
	ter2 = document.lista.terrestre2.value;
	ter3 = document.lista.terrestre3.value;
	ter4 = document.lista.terrestre4.value;
	ter5 = document.lista.terrestre5.value;
	ter6 = document.lista.terrestre6.value;
	ter7 = document.lista.terrestre7.value;
	ter8 = document.lista.terrestre8.value;
	ter9 = document.lista.terrestre9.value;
	/*totales costo directos*/
	costodire_pai_expo1 = document.lista.maritimo_costodire_pe.value = (mar1 * +1) + (mar2 * +1) + (mar3 * +1) + (mar4 * +1) + (mar5 * +1) + (mar6 * +1) + (mar7 * +1) + (mar8 * +1) + (mar9 * +1);
	costodire_pai_expo2 = document.lista.aereo_costodire_pe.value = (aer1 * +1) + (aer2 * +1) + (aer3 * +1) + (aer4 * +1) + (aer5 * +1) + (aer6 * +1) + (aer7 * +1) + (aer8 * +1) + (aer9 * +1);
	costodire_pai_expo3 = document.lista.terrestre_costodire_pe.value = (ter1 * +1) + (ter2 * +1) + (ter3 * +1) + (ter4 * +1) + (ter5 * +1) + (ter6 * +1) + (ter7 * +1) + (ter8 * +1) + (ter9 * +1);
	
	mar10 = document.lista.maritimo10.value;
	mar11 = document.lista.maritimo11.value;
	aer10 = document.lista.aereo10.value;
	aer11 = document.lista.aereo11.value;
	ter10 = document.lista.terrestre10.value;
	ter11 = document.lista.terrestre11.value;
	/*totales costos indirectos*/
	costoindi_pai_expo1 = document.lista.maritimo_costoindi_pe.value = (mar10 * +1) + (mar11 * +1);
	costoindi_pai_expo2 = document.lista.aereo_costoindi_pe.value = (aer10 * +1) + (aer11 * +1);
	costoindi_pai_expo3 = document.lista.terrestre_costoindi_pe.value = (ter10 * +1) + (ter11 * +1);
	/*suma costo total directos e indirectos*/
	totalmar_pai_expo1 = document.lista.tmaritimo_costodire_pe.value = (costodire_pai_expo1 * +1) + (costoindi_pai_expo1 * +1);
	totalaer_pai_expo2 = document.lista.taereo_costodire_pe.value = (costodire_pai_expo2 * +1) + (costoindi_pai_expo2 * +1);
	totalter_pai_expo3 = document.lista.tterrestre_costodire_pe.value = (costodire_pai_expo3 * +1) + (costoindi_pai_expo3 * +1);
	/*fin pais exportador*/
	
	/*transito internacional*/
	mar12 = document.lista.maritimo12.value;
	mar13 = document.lista.maritimo13.value;
	mar14 = document.lista.maritimo14.value;
	
	aer12 = document.lista.aereo12.value;
	aer13 = document.lista.aereo13.value;
	aer14 = document.lista.aereo14.value;
	
	ter12 = document.lista.terrestre12.value;
	ter13 = document.lista.terrestre13.value;
	ter14 = document.lista.terrestre14.value;
	
	/*totales costo directos*/
	costodire_transinter1 = document.lista.maritimo_costodire_ti.value = (mar12 * +1) + (mar13 * +1) + (mar14 * +1);
	costodire_transinter2 = document.lista.aereo_costodire_ti.value = (aer12 * +1) + (aer13 * +1) + (aer14 * +1);
	costodire_transinter3 = document.lista.terrestre_costodire_ti.value = (ter12 * +1) + (ter13 * +1) + (ter14 * +1);
	
	mar15 = document.lista.maritimo15.value;
	aer15 = document.lista.aereo15.value;
	ter15 = document.lista.terrestre15.value;
	
	/*totales costos indirectos*/
	costoindi_transinter1 = document.lista.maritimo_costoindi_ti.value = (mar15 * +1);
	costoindi_transinter2 = document.lista.aereo_costoindi_ti.value = (aer15 * +1);
	costoindi_transinter3 = document.lista.terrestre_costoindi_ti.value = (ter15 * +1);
	
	/*suma costo total directos e indirectos*/
	totalmar_transinter1 = document.lista.tmaritimo_costodire_ti.value = (costodire_transinter1 * +1) + (costoindi_transinter1 * +1);
	totalmar_transinter2 = document.lista.taereo_costodire_ti.value = (costodire_transinter2 * +1) + (costoindi_transinter2 * +1);
	totalmar_transinter3 = document.lista.tterrestre_costodire_ti.value = (costodire_transinter3 * +1) + (costoindi_transinter3 * +1);
    
	/*fin transito internacional*/
	
	/* pais importador*/
	mar16 = document.lista.maritimo16.value;
	mar17 = document.lista.maritimo17.value;
	mar18 = document.lista.maritimo18.value;
	mar19 = document.lista.maritimo19.value;
	mar20 = document.lista.maritimo20.value;
	mar21 = document.lista.maritimo21.value;
	mar22 = document.lista.maritimo22.value;
	
	aer16 = document.lista.aereo16.value;
	aer17 = document.lista.aereo17.value;
	aer18 = document.lista.aereo18.value;
	aer19 = document.lista.aereo19.value;
	aer20 = document.lista.aereo20.value;
	aer21 = document.lista.aereo21.value;
	aer22 = document.lista.aereo22.value;
	
	ter16 = document.lista.terrestre16.value;
	ter17 = document.lista.terrestre17.value;
	ter18 = document.lista.terrestre18.value;
	ter19 = document.lista.terrestre19.value;
	ter20 = document.lista.terrestre20.value;
	ter21 = document.lista.terrestre21.value;
	ter22 = document.lista.terrestre22.value;
	
	
	/*totales costo directos*/
	costodire_paisimpo1 = document.lista.maritimo_costodire_pi.value = (mar16 * +1) + (mar17 * +1) + (mar18 * +1) + (mar19 * +1) + (mar20 * +1) + (mar21 * +1) + (mar22 * +1);
	costodire_paisimpo2 = document.lista.aereo_costodire_pi.value = (aer16 * +1) + (aer17 * +1) + (aer18 * +1) + (aer19 * +1) + (aer20 * +1) + (aer21 * +1) + (aer22 * +1);
	costodire_paisimpo3 = document.lista.terrestre_costodire_pi.value = (ter16 * +1) + (ter17 * +1) + (ter18 * +1) + (ter19 * +1) + (ter20 * +1) + (ter21 * +1) + (ter22 * +1);
	
	ter23 = document.lista.terrestre23.value;
	aer23 = document.lista.aereo23.value;
	mar23 = document.lista.maritimo23.value;
	
	/*totales costos indirectos*/
	costoindi_paisimpo1 = document.lista.maritimo_costoindi_pi.value = (mar23 * +1);
	costoindi_paisimpo2 = document.lista.aereo_costoindi_pi.value = (aer23 * +1);
	costoindi_paisimpo3 = document.lista.terrestre_costoindi_pi.value = (ter23 * +1);
	
	/*suma costo total directos e indirectos*/
	totalmar_pai_impo1 = document.lista.tmaritimo_costodire_pi.value = (costodire_paisimpo1 * +1) + (costoindi_paisimpo1 * +1);
	totalmar_pai_impo2 = document.lista.taereo_costodire_pi.value = (costodire_paisimpo2 * +1) + (costoindi_paisimpo2 * +1);
	totalmar_pai_impo3 = document.lista.tterrestre_costodire_pi.value = (costodire_paisimpo3 * +1) + (costoindi_paisimpo3 * +1);
	
	
	/* fin pais importador */
	
	/*calculo totales*/
	/*VALOR : FCA.No Incluye Embarque */
	valexw_mar  = document.lista.maritimo24.value;
	valexw_aer  = document.lista.aereo24.value;
	valexw_ter  = document.lista.terrestre24.value;
	
	mari1 = document.lista.maritimo25.value = ((valexw_mar * +1) + (totalmar_pai_expo1 * +1))  - (mar5 * +1) - (mar6 * +1);
	
	aereo1 = document.lista.aereo25.value = ((valexw_aer * +1) + (totalaer_pai_expo2 * +1)) - (aer6 * +1);
	
	terrestre1 = document.lista.terrestre25.value = ((valexw_ter * +1) + (totalter_pai_expo3 * +1)) - (ter5 * +1);
	
	/* VALOR : DAP* */
	terrestre2 = document.lista.terrestre26.value = (terrestre1 * +1) + (ter15 * +1);
	
	/* VALOR : FAS  No Incluye Embarque */
	maritimo2 = document.lista.maritimo27.value = ((valexw_mar * +1) + (totalmar_pai_expo1 * +1))  - (mar5 * +1);
	
	/* VALOR : FOB  */
	maritimo3 = document.lista.maritimo28.value = (valexw_mar * +1) + (totalmar_pai_expo1 * +1);
	/* VALOR CFR */
	maritimo4 = document.lista.maritimo29.value = ((maritimo3 * +1) + (mar12 * +1)) + (mar15 * +1);
	
	/* VALOR CPT */
	maritimo5 = document.lista.maritimo30.value = (maritimo4 * +1);
	aereo2 = document.lista.aereo30.value = ((aereo1 * +1) + (aer12 * +1)) + (aer15 * +1);
	terrestre3 = document.lista.terrestre30.value = ((terrestre2 * +1) + (ter12 * +1)) + (ter15 * +1);
	
	/*VALOR CIF*/
	maritimo6 = document.lista.maritimo31.value = (maritimo5 * +1) + (mar13 * +1);
	
	/* VALOR CIP */
	maritimo7 = document.lista.maritimo32.value = (maritimo6 * +1);
	aereo3 = document.lista.aereo32.value = (aereo2 * +1) + (aer13 * +1);
	terrestre4 = document.lista.terrestre32.value = (terrestre3 * +1) + (ter13 * +1) ;
	
	/* VALOR  DAP** No Incluye Desembarque */
	maritimo8 = document.lista.maritimo33.value = (maritimo7 * +1) + (mar15 * +1);
	
	/* VALOR DAT */
	maritimo9 = document.lista.maritimo34.value = ((maritimo6 * +1) + (mar14 * +1)) + (mar15 * +1);
	aereo4 = document.lista.aereo34.value = (aereo3 * +1) + (aer14 * +1);
	terrestre5 = document.lista.terrestre34.value = (terrestre4 * +1) + (ter14 * +1) ;
	
	/* VALOR  DAP*** */
	maritimo10 = document.lista.maritimo35.value = (((maritimo9 * +1) + (mar16 * +1)) + (mar17 * +1)) + (mar18 * +1);
	aereo5 = document.lista.aereo35.value = (((aereo4 * +1) + (aer16 * +1)) + (aer17 * +1)) + (aer18 * +1);
	terrestre6 = document.lista.terrestre35.value = (((terrestre5 * +1) + (ter16 * +1)) + (ter17 * +1)) + (ter18 * +1) ;
	
	/* VALOR DDP TOTAL */
	maritimo11 = document.lista.maritimo36.value = (maritimo10 * +1) + (mar19 * +1) + (mar20 * +1) + (mar21 * +1) + (mar22 * +1) + (mar23 * +1);
	
	aereo6 = document.lista.aereo36.value = (aereo5 * +1) + (aer19 * +1) + (aer20 * +1) + (aer21 * +1) + (aer22 * +1) + (aer23 * +1);
	
	terrestre7 = document.lista.terrestre36.value = (terrestre6 * +1) + (ter19 * +1) + (ter20 * +1) + (ter21 * +1) + (ter22 * +1) + (ter23 * +1);
	
	/* distribucion de costos*/
	items1_mar  = document.lista.ite1.value;
	if(items1_mar == '1'){
	distri1_mar  = document.lista.dist_mar1.value;
	distri1_aer  = document.lista.dist_aer1.value;
	distri1_ter  = document.lista.dist_terre1.value;
	
	 document.lista.tdiscos_mar.value = distri1_mar;
	 document.lista.tdiscos_aer.value = distri1_aer;
	 document.lista.tdiscos_ter.value = distri1_ter;
	}

    items2_mar  = document.lista.ite2.value;
	if(items2_mar == '2'){
	distri2_mar  = document.lista.dist_mar2.value;
	distri2_aer  = document.lista.dist_aer2.value;
	distri2_ter  = document.lista.dist_terre2.value;
	
	document.lista.tdiscos_mar.value = (distri1_mar * +1) + (distri2_mar * +1);
	 document.lista.tdiscos_aer.value = (distri1_aer * +1) + (distri2_aer * +1);
	 document.lista.tdiscos_ter.value = (distri1_ter * +1) + (distri2_ter * +1);
	}
	
	items3_mar  = document.lista.ite3.value;
	if(items3_mar == '3'){
	distri3_mar  = document.lista.dist_mar3.value;
	distri3_aer  = document.lista.dist_aer3.value;
	distri3_ter  = document.lista.dist_terre3.value;
	
	document.lista.tdiscos_mar.value = (distri1_mar * +1) + (distri2_mar * +1) + (distri3_mar * +1);
	 document.lista.tdiscos_aer.value = (distri1_aer * +1) + (distri2_aer * +1) + (distri3_aer * +1);
	 document.lista.tdiscos_ter.value = (distri1_ter * +1) + (distri2_ter * +1) + (distri3_ter * +1);
	
	}
	
	items4_mar  = document.lista.ite4.value;
	if(items4_mar == '4'){
	distri4_mar  = document.lista.dist_mar4.value;
	distri4_aer  = document.lista.dist_aer4.value;
	distri4_ter  = document.lista.dist_terre4.value;
	
	document.lista.tdiscos_mar.value = (distri1_mar * +1) + (distri2_mar * +1) + (distri3_mar * +1) + (distri4_mar * +1);
	 document.lista.tdiscos_aer.value = (distri1_aer * +1) + (distri2_aer * +1) + (distri3_aer * +1) + (distri4_aer * +1);
	 document.lista.tdiscos_ter.value = (distri1_ter * +1) + (distri2_ter * +1) + (distri3_ter * +1) + (distri4_ter * +1);
	}
	
	items5_mar  = document.lista.ite5.value;
	if(items5_mar == '5'){
	distri5_mar  = document.lista.dist_mar5.value;
	distri5_aer  = document.lista.dist_aer5.value;
	distri5_ter  = document.lista.dist_terre5.value;
	
	document.lista.tdiscos_mar.value = (distri1_mar * +1) + (distri2_mar * +1) + (distri3_mar * +1) + (distri4_mar * +1) + (distri5_mar * +1);
	 document.lista.tdiscos_aer.value = (distri1_aer * +1) + (distri2_aer * +1) + (distri3_aer * +1) + (distri4_aer * +1) + (distri5_aer * +1);
	 document.lista.tdiscos_ter.value = (distri1_ter * +1) + (distri2_ter * +1) + (distri3_ter * +1) + (distri4_ter * +1) + (distri5_ter * +1);
	}

	
	/* document.lista.tdiscos_mar.value = (distri1_mar * +1) + (distri2_mar * +1) + (distri3_mar * +1) + (distri4_mar * +1) + (distri5_mar * +1);*/
	
    /* document.lista.tdiscos_aer.value = (distri1_aer * +1) + (distri2_aer * +1) + (distri3_aer * +1) + (distri4_aer * +1) + (distri5_aer * +1);*/
	
	/*document.lista.tdiscos_ter.value = (distri1_ter * +1) + (distri2_ter * +1) + (distri3_ter * +1) + (distri4_ter * +1) + (distri5_ter * +1);*/
	
	
	} 
function NoSumar(){  
      clearInterval(interval);  
}  
</SCRIPT>

</head>

<body>

<br /><br />
<input class="form-control btn-primary" type="button" value="C&aacute;lculo de Costo de Exportaci&oacute;n. Paso : 7 de 8" />
<form name="lista" method="post" onSubmit="return valida(this);" action="insercalculos.php" >
<!-- <form name="lista" method="post" onSubmit="return valida(this);" >  -->

  <input class="form-control" name="idprod" type="hidden" value="<?php echo "$codigox"; ?>" />
 

 <table class="table table-hover" style='font-size:80%'> 
 <tr>
   <td colspan="6" align="center"><h5><b>Analisis de Costos</b></h5> </td>
  </tr>
  
  <tr>
 <td bgcolor="#D5D5D5" colspan="4" align="center"><h5><b>Costo Total Carga - Pa&iacute;s Exportador (Origen)</b></h5> </td>
 </tr>
 <tr>
 <td align="center" bgcolor="#C8C8C8"><h5><b>Rubro</b></h5></td>
 <td align="center" bgcolor="#C8C8C8"><h5><b>Maritimo</b></h5></td>
 <td align="center" bgcolor="#C8C8C8"><h5><b>Aereo</b></h5></td>
 <td align="center" bgcolor="#C8C8C8"><h5><b>Terrestre</b></h5></td>
 </tr>
 <tr>
 <td>Manipuleo Local Exportador :</td>
 <td><input class="form-control" name="maritimo1" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo1" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre1" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>
 <tr>
 <td>Documentacion :</td>
 <td><input class="form-control" name="maritimo2" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo2" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre2" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>
  <tr>
 <td>Transporte (Hasta Punto de Embarque) :</td>
 <td><input class="form-control" name="maritimo3" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo3" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre3" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>
  <tr>
 <td>Almacenamiento Interno :</td>
 <td><input class="form-control" name="maritimo4" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo4" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre4" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>
 <tr>
 <td>Manipuleo Preembarque : </td>
 <td><input class="form-control" name="maritimo5" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo5" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre5" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>
 <tr>
 <td>Manipuleo Embarque :</td>
 <td><input class="form-control" name="maritimo6" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo6" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre6" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>
  <tr>
 <td>Seguro :</td>
 <td><input class="form-control" name="maritimo7" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo7" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre7" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>
 <tr>
 <td>Bancario :</td>
 <td><input class="form-control" name="maritimo8" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo8" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre8" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>
  <tr>
 <td>Agentes :</td>
 <td><input class="form-control" name="maritimo9" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo9" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre9" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>
  <tr>
 <td bgcolor="#F2F2F2"><b>Costos Directos :</b></td>
 <td bgcolor="#F2F2F2"><input class="form-control" name="maritimo_costodire_pe" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly" /></td>
  <td bgcolor="#F2F2F2"><input class="form-control" name="aereo_costodire_pe" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/></td>
   <td bgcolor="#F2F2F2"><input class="form-control" name="terrestre_costodire_pe" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/></td>
 </tr>
 <tr>
 <td>Administrativos :</td>
 <td><input class="form-control" name="maritimo10" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo10" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre10" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>
 <tr>
 <td>Capital - Inventario : </td>
 <td><input class="form-control" name="maritimo11" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo11" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre11" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>	
 <tr>
 <td bgcolor="#F2F2F2"><b>Costos Indirectos :</b></td>
 <td bgcolor="#F2F2F2"><input class="form-control" name="maritimo_costoindi_pe" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly" /></td>
  <td bgcolor="#F2F2F2"><input class="form-control" name="aereo_costoindi_pe" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/></td>
   <td bgcolor="#F2F2F2"><input class="form-control" name="terrestre_costoindi_pe" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/></td>
 </tr>
 <tr>
 <td bgcolor="#DDDDDD"><b>Total Pais Exportador :</b></td>
 <td bgcolor="#DDDDDD"><input class="form-control" name="tmaritimo_costodire_pe" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly" /> </td>
  <td bgcolor="#DDDDDD"><input class="form-control" name="taereo_costodire_pe" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/> </td>
   <td bgcolor="#DDDDDD"><input class="form-control" name="tterrestre_costodire_pe" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/> </td>
 </tr>
 <tr>
 <td bgcolor="#D5D5D5" colspan="4" align="center"><h5><b>Transito Internacional</b></h5> </td>
 </tr>
 <tr>
 <td>Transporte Internacional :</td>
 <td><input class="form-control" name="maritimo12" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo12" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre12" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>	
 <tr>
 <td>Seguro Internacional :</td>
 <td><input class="form-control" name="maritimo13" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo13" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre13" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>	
 <tr>
 <td>Manipuleo de Desembarque :</td>
 <td><input class="form-control" name="maritimo14" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo14" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre14" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>	
 <tr>
 <td bgcolor="#F2F2F2"><b>Costos Directos : </b></td>
 <td bgcolor="#F2F2F2"><input class="form-control" name="maritimo_costodire_ti" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly" /></td>
  <td bgcolor="#F2F2F2"><input class="form-control" name="aereo_costodire_ti" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/></td>
   <td bgcolor="#F2F2F2"><input class="form-control" name="terrestre_costodire_ti" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/></td>
 </tr>
 <tr>
 <td>Capital - Inventario : </td>
 <td><input class="form-control" name="maritimo15" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo15" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre15" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>	
 <tr>
 <td bgcolor="#F2F2F2"><b>Costos Indirectos :</b></td>
 <td bgcolor="#F2F2F2"><input class="form-control" name="maritimo_costoindi_ti" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly" /></td>
  <td bgcolor="#F2F2F2"><input class="form-control" name="aereo_costoindi_ti" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/></td>
   <td bgcolor="#F2F2F2"><input class="form-control" name="terrestre_costoindi_ti" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/></td>
 </tr>
  <tr>
 <td bgcolor="#DDDDDD"><b>Total Transito Internacional :</b></td>
 <td bgcolor="#DDDDDD"><input class="form-control" name="tmaritimo_costodire_ti" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly" /> </td>
  <td bgcolor="#DDDDDD"><input class="form-control" name="taereo_costodire_ti" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/> </td>
   <td bgcolor="#DDDDDD"><input class="form-control" name="tterrestre_costodire_ti" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/> </td>
 </tr>
  <tr>
 <td bgcolor="#D5D5D5" colspan="4" align="center"><h5><b>Pais Importador</b></h5> </td>
 </tr>
 <tr>
 <td>Transporte Lugar Convenido Comprador : </td>
 <td><input class="form-control" name="maritimo16" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo16" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre16" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>	
 <tr>
 <td>Almacenamiento : </td>
 <td><input class="form-control" name="maritimo17" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo17" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre17" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>	
 <tr>
 <td>Seguro : </td>
 <td><input class="form-control" name="maritimo18" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo18" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre18" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>
 <tr>
 <td>Documentacion : </td>
 <td><input class="form-control" name="maritimo19" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo19" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre19" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>
 <tr>
 <td>Aduaneros (Impuestos) : </td>
 <td><input class="form-control" name="maritimo20" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo20" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre20" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>
 <tr>
 <td>Agentes : </td>
 <td><input class="form-control" name="maritimo21" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo21" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre21" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>
 <tr>
 <td>Bancario : </td>
 <td><input class="form-control" name="maritimo22" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo22" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre22" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>
 <tr>
 <td bgcolor="#F2F2F2"><b>Costos Directos : </b></td>
 <td bgcolor="#F2F2F2"><input class="form-control" name="maritimo_costodire_pi" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly" /></td>
  <td bgcolor="#F2F2F2"><input class="form-control" name="aereo_costodire_pi" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/></td>
   <td bgcolor="#F2F2F2"><input class="form-control" name="terrestre_costodire_pi" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/></td>
 </tr>
  <tr>
 <td>Capital - Inventario : </td>
 <td><input class="form-control" name="maritimo23" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
  <td><input class="form-control" name="aereo23" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
   <td><input class="form-control" name="terrestre23" type="text" onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>
 </tr>	
 <tr>
 <td bgcolor="#F2F2F2"><b>Costos Indirectos :</b></td>
 <td bgcolor="#F2F2F2"><input class="form-control" name="maritimo_costoindi_pi" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly" /></td>
  <td bgcolor="#F2F2F2"><input class="form-control" name="aereo_costoindi_pi" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/></td>
   <td bgcolor="#F2F2F2"><input class="form-control" name="terrestre_costoindi_pi" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/></td>
 </tr>
  <tr>
 <td bgcolor="#DDDDDD"><b>Total Pais Importador :</b></td>
 <td bgcolor="#DDDDDD"><input class="form-control" name="tmaritimo_costodire_pi" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly" /> </td>
  <td bgcolor="#DDDDDD"><input class="form-control" name="taereo_costodire_pi" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/> </td>
   <td bgcolor="#DDDDDD"><input class="form-control" name="tterrestre_costodire_pi" type="text" placeholder='0.00' onkeypress='return NumCheck(event, this)' readonly="readonly"/> </td>
 </tr>
 <tr>
 <td bgcolor="#D5D5D5" align="center"><h5><b>Costo Totales</b></h5> </td>
 <td bgcolor="#D5D5D5" align="center"><h5><b>Maritimo</b></h5> </td>
 <td bgcolor="#D5D5D5" align="center"><h5><b>Aereo</b></h5> </td>
 <td bgcolor="#D5D5D5" align="center"><h5><b>Terrestre</b></h5> </td>
 </tr>
  <tr>
 <td>VALOR EXW : </td>
 <td><input class="form-control" name="maritimo24" type="text" placeholder='0.00' value="<?php echo "$importe"; ?>" readonly="readonly" /></td>
  <td><input class="form-control" name="aereo24" type="text" placeholder='0.00' value="<?php echo "$importe"; ?>" readonly="readonly" /></td>
   <td><input class="form-control" name="terrestre24" type="text" placeholder='0.00' value="<?php echo "$importe"; ?>" readonly="readonly" /></td>
 </tr>	
 <tr>
 <td>VALOR FCA. No Incluye Embarque  : </td>
 <td><input class="form-control" name="maritimo25" type="text" placeholder='0.00' readonly="readonly" /></td>
  <td><input class="form-control" name="aereo25" type="text" placeholder='0.00' readonly="readonly" /></td>
   <td><input class="form-control" name="terrestre25" type="text" placeholder='0.00' readonly="readonly" /></td>
 </tr>	
 <tr>
 <td>VALOR DAP* : </td>
 <td><input class="form-control" name="maritimo26" type="text" placeholder='0.00' value="0.000" readonly="readonly" /></td>
  <td><input class="form-control" name="aereo26" type="text" placeholder='0.00' value="0.000" readonly="readonly" /></td>
   <td><input class="form-control" name="terrestre26" type="text" placeholder='0.00' readonly="readonly" /></td>
 </tr>	
 <tr>
 <td>VALOR FAS. No Incluye Embarque : </td>
 <td><input class="form-control" name="maritimo27" type="text" placeholder='0.00' readonly="readonly" /></td>
  <td><input class="form-control" name="aereo27" type="text" placeholder='0.00' value="0.000" readonly="readonly" /></td>
   <td><input class="form-control" name="terrestre27" type="text" placeholder='0.00' value="0.000" readonly="readonly" /></td>
 </tr>	
 <tr>
 <td>VALOR FOB  : </td>
 <td><input class="form-control" name="maritimo28" type="text" placeholder='0.00' readonly="readonly" /></td>
  <td><input class="form-control" name="aereo28" type="text" placeholder='0.00' value="0.000" readonly="readonly" /></td>
   <td><input class="form-control" name="terrestre28" type="text" placeholder='0.00' value="0.000" readonly="readonly" /></td>
 </tr>	
 <tr>
 <td>VALOR CFR : </td>
 <td><input class="form-control" name="maritimo29" type="text" placeholder='0.00' readonly="readonly" /></td>
  <td><input class="form-control" name="aereo29" type="text" placeholder='0.00' value="0.000" readonly="readonly" /></td>
   <td><input class="form-control" name="terrestre29" type="text" placeholder='0.00' value="0.000" readonly="readonly" /></td>
 </tr>
 <tr>	
 <td>VALOR CPT : </td>
 <td><input class="form-control" name="maritimo30" type="text" placeholder='0.00' readonly="readonly" /></td>
  <td><input class="form-control" name="aereo30" type="text" placeholder='0.00' readonly="readonly" /></td>
   <td><input class="form-control" name="terrestre30" type="text" placeholder='0.00' readonly="readonly" /></td>
 </tr>	
 <tr>	
 <td>VALOR CIF : </td>
 <td><input class="form-control" name="maritimo31" type="text" placeholder='0.00' readonly="readonly" /></td>
  <td><input class="form-control" name="aereo31" type="text" placeholder='0.00' value="0.000" readonly="readonly" /></td>
   <td><input class="form-control" name="terrestre31" type="text" placeholder='0.00' value="0.000" readonly="readonly" /></td>
 </tr>	
 <tr>	
 <td>VALOR CIP : </td>
 <td><input class="form-control" name="maritimo32" type="text" placeholder='0.00' readonly="readonly" /></td>
  <td><input class="form-control" name="aereo32" type="text" placeholder='0.00' readonly="readonly" /></td>
   <td><input class="form-control" name="terrestre32" type="text" placeholder='0.00' readonly="readonly" /></td>
 </tr>	
 <tr>	
 <td>VALOR  DAP** No Incluye Desembarque : </td>
 <td><input class="form-control" name="maritimo33" type="text" placeholder='0.00' readonly="readonly" /></td>
  <td><input class="form-control" name="aereo33" type="text" placeholder='0.00' value="0.000" readonly="readonly" /></td>
   <td><input class="form-control" name="terrestre33" type="text" placeholder='0.00' value="0.000" readonly="readonly" /></td>
 </tr>	
  <tr>	
 <td>VALOR DAT : </td>
 <td><input class="form-control" name="maritimo34" type="text" placeholder='0.00' readonly="readonly" /></td>
  <td><input class="form-control" name="aereo34" type="text" placeholder='0.00' readonly="readonly" /></td>
   <td><input class="form-control" name="terrestre34" type="text" placeholder='0.00' readonly="readonly" /></td>
 </tr>	
 <tr>	
 <td>VALOR  DAP***  : </td>
 <td><input class="form-control" name="maritimo35" type="text" placeholder='0.00' readonly="readonly" /></td>
  <td><input class="form-control" name="aereo35" type="text" placeholder='0.00' readonly="readonly" /></td>
   <td><input class="form-control" name="terrestre35" type="text" placeholder='0.00' readonly="readonly" /></td>
 </tr>	
 <tr>	
 <td>VALOR DDP TOTAL  : </td>
 <td><input class="form-control" name="maritimo36" type="text" placeholder='0.00' readonly="readonly" /></td>
  <td><input class="form-control" name="aereo36" type="text" placeholder='0.00' readonly="readonly" /></td>
   <td><input class="form-control" name="terrestre36" type="text" placeholder='0.00' readonly="readonly" /></td>
 </tr>	
 </table>
 
 <!--  distribucion de costos -->
 <table class="table table-hover" style='font-size:80%'> 
 <tr>
   <td bgcolor="#D5D5D5" colspan="9" align="center"><h5><b>Distribucion de Costos</b></h5> </td>
  </tr>
  <?php
  $sqldeta="SELECT
cepd.id_detalle,
cepd.id_prod,
cepd.partidaA,
cepd.partidaB,
cepd.nomproducto,
cepd.cantidad,
cepd.unidad_comerc,
cepd.peso_unidad_kg,
cepd.peso_total_kg,
cepd.valor_factura,
cepd.total_factura
FROM
cos_expo_prod_detalle AS cepd
WHERE
cepd.id_prod = '$codigox'
ORDER BY
cepd.id_detalle ASC";
  $rsde = mysql_query($sqldeta);
if (mysql_num_rows($rsde) > 0){
	echo "<tr>";
	echo "<td bgcolor='#F2F2F2' align='center'><b>#</b></td>";
	echo "<td bgcolor='#F2F2F2' align='center'><b>Productos</b></td>";
	echo "<td bgcolor='#F2F2F2' align='center'><b>Unid. Comercial</b></td>";
	echo "<td bgcolor='#F2F2F2' align='center'><b>Cantidad</b></td>";
	echo "<td bgcolor='#F2F2F2' align='center'><b>Valor Works</b></td>";
	echo "<td bgcolor='#F2F2F2' align='center'><b>Total Works</b></td>";
	echo "<td bgcolor='#F2F2F2' align='center'><b>Distribucion de Costo Maritimo (%)</b></td>";
	echo "<td bgcolor='#F2F2F2' align='center'><b>Distribucion de Costo Aereo (%)</b></td>";
	echo "<td bgcolor='#F2F2F2' align='center'><b>Distribucion de Costo Terrestre (%)</b></td>";
	echo "</tr>";
	while($rowde = mysql_fetch_array($rsde)){
		$items = $items + 1 ;
		$codideta = $rowde["id_detalle"];
		$nomprod = $rowde["nomproducto"];
		$unidcome = $rowde["unidad_comerc"];
		$canti = $rowde["cantidad"];
		$vworks = $rowde["valor_factura"];
		$tworks = $rowde["total_factura"];
		
		if ($items== '1'){
		echo "<tr>";
		echo "<td>$items
		<input name='ite1' type='hidden' value='$items'>
		<input name='deta1' type='hidden' value='$codideta'>
		</td>";
		echo "<td>$nomprod</td>";
		echo "<td align='center'>$unidcome</td>";
		echo "<td align='center'>$canti</td>";
		echo "<td align='center'>$vworks</td>";
		echo "<td align='center'>$tworks</td>";
		echo "<td align='center'><input class='form-control' name='dist_mar1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' maxlength='5'></td>";
		echo "<td align='center'><input class='form-control' name='dist_aer1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' maxlength='5'></td>";
		echo "<td align='center'><input class='form-control' name='dist_terre1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' maxlength='5'></td>";
		echo "</tr>";
		}
		if ($items== '2'){
		echo "<tr>";
		echo "<td>$items
		<input name='ite2' type='hidden' value='$items'>
		<input name='deta2' type='hidden' value='$codideta'>
		</td>";
		echo "<td>$nomprod</td>";
		echo "<td align='center'>$unidcome</td>";
		echo "<td align='center'>$canti</td>";
		echo "<td align='center'>$vworks</td>";
		echo "<td align='center'>$tworks</td>";
		echo "<td align='center'><input class='form-control' name='dist_mar2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' maxlength='5'></td>";
		echo "<td align='center'><input class='form-control' name='dist_aer2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' maxlength='5'></td>";
		echo "<td align='center'><input class='form-control' name='dist_terre2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' maxlength='5'></td>";
		echo "</tr>";
		}
		if ($items== '3'){
		echo "<tr>";
		echo "<td>$items
		<input name='ite3' type='hidden' value='$items'>
		<input name='deta3' type='hidden' value='$codideta'>
		</td>";
		echo "<td>$nomprod</td>";
		echo "<td align='center'>$unidcome</td>";
		echo "<td align='center'>$canti</td>";
		echo "<td align='center'>$vworks</td>";
		echo "<td align='center'>$tworks</td>";
		echo "<td align='center'><input class='form-control' name='dist_mar3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' maxlength='5'></td>";
		echo "<td align='center'><input class='form-control' name='dist_aer3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' maxlength='5'></td>";
		echo "<td align='center'><input class='form-control' name='dist_terre3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' maxlength='5'></td>";
		echo "</tr>";
		}
		if ($items== '4'){
		echo "<tr>";
		echo "<td>$items
		<input name='ite4' type='hidden' value='$items'>
		<input name='deta4' type='hidden' value='$codideta'>
		</td>";
		echo "<td>$nomprod</td>";
		echo "<td align='center'>$unidcome</td>";
		echo "<td align='center'>$canti</td>";
		echo "<td align='center'>$vworks</td>";
		echo "<td align='center'>$tworks</td>";
		echo "<td align='center'><input class='form-control' name='dist_mar4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' maxlength='5'></td>";
		echo "<td align='center'><input class='form-control' name='dist_aer4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' maxlength='5'></td>";
		echo "<td align='center'><input class='form-control' name='dist_terre4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' maxlength='5'></td>";
		echo "</tr>";
		}
		if ($items== '5'){
		echo "<tr>";
		echo "<td>$items
		<input name='ite5' type='hidden' value='$items'>
		<input name='deta5' type='hidden' value='$codideta'>
		</td>";
		echo "<td>$nomprod</td>";
		echo "<td align='center'>$unidcome</td>";
		echo "<td align='center'>$canti</td>";
		echo "<td align='center'>$vworks</td>";
		echo "<td align='center'>$tworks</td>";
		echo "<td align='center'><input class='form-control' name='dist_mar5' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' maxlength='5'></td>";
		echo "<td align='center'><input class='form-control' name='dist_aer5' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' maxlength='5'></td>";
		echo "<td align='center'><input class='form-control' name='dist_terre5' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' maxlength='5'></td>";
		echo "</tr>";
		}
		
	}
	
	echo "<tr>";
		echo "<td colspan='6' align='right'><b> Total % </b></td>";
		echo "<td><input class='form-control' name='tdiscos_mar' type='text' placeholder='0.000' readonly='readonly'></td>";
		echo "<td><input class='form-control' name='tdiscos_aer' type='text' placeholder='0.000' readonly='readonly'></td>";
		echo "<td><input class='form-control' name='tdiscos_ter' type='text' placeholder='0.000' readonly='readonly'></td>";
		echo "</tr>";
}
  ?>
  </table>

  <br />
  
  
  <center>
  <input class="btn btn-success" name="guardar" type="submit" value=" Registrar / Reportar Informe"  />
  </center>
</form>
</body>
</html>
<?php
include("pie.php");
?>