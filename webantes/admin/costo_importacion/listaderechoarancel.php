<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";

$codigox = $_GET["cfr"];
$idotros = $_GET["tif"];
//$exwork = $_GET["work"];
//$exwork = "";

// sumatoria general del detalle de producto 
$sqlotrox="SELECT
SUM(cos_prod_detalle.cantidad) as cant,
SUM(cos_prod_detalle.peso_unidad_kg) as pesouni,
SUM(cos_prod_detalle.peso_total_kg) as pesotot,
SUM(cos_prod_detalle.valor_factura) as valfact,
SUM(cos_prod_detalle.total_factura) as totofact
FROM
cos_prod_detalle
WHERE
cos_prod_detalle.id_prod = '$codigox' ";
$rsox = mysql_query($sqlotrox);
if (mysql_num_rows($rsox) > 0){
	while($rowox = mysql_fetch_array($rsox)){
		$totalfactura = $rowox["totofact"];
		
	}
}else{
	$totalfactura = "0";
}


$sqlotro="SELECT
otro.pais_expo,
otro.costo_directo,
otro.mani_expor,
otro.documen,
otro.transpo,
otro.almac_inter,
otro.mani_preemb,
otro.mani_emb,
otro.seguro,
otro.bancario,
otro.agente,
otro.adminis,
otro.capital_inven,
otro.fob,
otro.flete,
otro.tipo_seguro,
otro.prima_neta,
otro.deducible,
otro.derecho_emision,
otro.empresa_aseguradora,
otro.seguro_tabla,
otro.id_dato,
otro.id_prod
FROM
cos_otrodatos AS otro
WHERE
otro.id_dato = '$idotros' AND
otro.id_prod = '$codigox'";
$rso = mysql_query($sqlotro);
if (mysql_num_rows($rso) > 0){
	while($rowo = mysql_fetch_array($rso)){
		$fobx = $rowo["fob"];
		$fletex = $rowo["flete"];
		$cfr = $fobx + $fletex;
		$tsegurox = $rowo["tipo_seguro"];
		$pneta = $rowo["prima_neta"];
		$deduce = $rowo["deducible"];
		$porcdeduce = 100 - $deduce;
		$totaldeduce = ($cfr / $porcdeduce) * 100;
		if($tsegurox=='Empresa de Seguros'){
		$totaldeduce2 = ($pneta * $totaldeduce) / 100;
		}else{
		$totaldeduce2 = ($pneta * $cfr) / 100;
		}
		
		$cifxx = $cfr + $totaldeduce2;
		
		$dereemi = $rowo["derecho_emision"];
		$impo2 = ($totaldeduce2 * $dereemi)/100;
		$impo3 = $totaldeduce2 + $impo2;
		$igv = "18.000";
		$impo4 = ($igv * $impo3)/100;
		$empasegu = $rowo["empresa_aseguradora"];
		$segurot = $rowo["seguro_tabla"];
		
		$precioventa = $impo3 + $impo4;
		$factor_av = $cifxx / $totalfactura;
		
	
	}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<style>
#contenedorr3 { 
border-radius:3px; 
-moz-border-radius:3px; /* Firefox */ 
-webkit-border-radius:3px; /* Safari y Chrome */ 
/* Otros estilos */ 
border:1px solid #333;
background:#eee;
width:100%;
padding:5px;
}
</style>

<script language="javascript" type="text/javascript">
function valida(lista) {
	
	if (lista.tasadespa.value.length < 1){
		alert("Ingrese Tasa de Despacho");
		return false;
	}
	if (lista.rremu.value.length < 1){
		alert("Ingrese Recargo de Remuneracion");
		return false;
	}
	if (lista.perce.value.length < 1){
		alert("Ingrese Percepcion");
		return false;
	}
	
	
	/*fila #1*/
	if (lista.sobretasa1.value.length < 1){
		alert("Ingrese Porcentaje(%) Sobretasa Fila #1");
		return false;
	}
	if (lista.rebajaarance1.value.length < 1){
		alert("Ingrese Porcentaje(%) Rebaja Arancelaria Fila #1");
		return false;
	}
	if (lista.isdato1.value.length < 1){
		alert("Ingrese ISC Dato Fila #1");
		return false;
	}
	if (lista.antidato1.value.length < 1){
		alert("Ingrese Antid. Dato Fila #1");
		return false;
	}
	/*fila #2*/
	if (lista.sobretasa2.value.length < 1){
		alert("Ingrese Porcentaje(%) Sobretasa Fila #2");
		return false;
	}
	if (lista.rebajaarance2.value.length < 1){
		alert("Ingrese Porcentaje(%) Rebaja Arancelaria Fila #2");
		return false;
	}
	if (lista.isdato2.value.length < 1){
		alert("Ingrese ISC Dato Fila #2");
		return false;
	}
	if (lista.antidato2.value.length < 1){
		alert("Ingrese Antid. Dato Fila #2");
		return false;
	}
	/*fila #3*/
	if (lista.sobretasa3.value.length < 1){
		alert("Ingrese Porcentaje(%) Sobretasa Fila #3");
		return false;
	}
	if (lista.rebajaarance3.value.length < 1){
		alert("Ingrese Porcentaje(%) Rebaja Arancelaria Fila #3");
		return false;
	}
	if (lista.isdato3.value.length < 1){
		alert("Ingrese ISC Dato Fila #3");
		return false;
	}
	if (lista.antidato3.value.length < 1){
		alert("Ingrese Antid. Dato Fila #3");
		return false;
	}
	/*fila #4*/
	if (lista.sobretasa4.value.length < 1){
		alert("Ingrese Porcentaje(%) Sobretasa Fila #4");
		return false;
	}
	if (lista.rebajaarance4.value.length < 1){
		alert("Ingrese Porcentaje(%) Rebaja Arancelaria Fila #4");
		return false;
	}
	if (lista.isdato4.value.length < 1){
		alert("Ingrese ISC Dato Fila #4");
		return false;
	}
	if (lista.antidato4.value.length < 1){
		alert("Ingrese Antid. Dato Fila #4");
		return false;
	}
	/*fila #5*/
	if (lista.sobretasa5.value.length < 1){
		alert("Ingrese Porcentaje(%) Sobretasa Fila #5");
		return false;
	}
	if (lista.rebajaarance5.value.length < 1){
		alert("Ingrese Porcentaje(%) Rebaja Arancelaria Fila #5");
		return false;
	}
	if (lista.isdato5.value.length < 1){
		alert("Ingrese ISC Dato Fila #5");
		return false;
	}
	if (lista.antidato5.value.length < 1){
		alert("Ingrese Antid. Dato Fila #5");
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

/*fila1*/
	stasa1 = document.lista.sobretasa1.value;
	advalore1 = document.lista.calaraimpo1.value;
	d_especifico1 = document.lista.despecificoimpo1.value;
	timpo1 = document.lista.totalimpo1.value;
	sobretimpo1 = document.lista.sobretasaimpo1.value = ((stasa1 * +1) / 100) * (((advalore1 * +1) + (d_especifico1 * +1)) + (timpo1 * +1));

	
	rebaja1 = document.lista.rebajaarance1.value;
	totrebaja1 = document.lista.rebajaimpo1.value = ((rebaja1 * +1) / 100) * (((advalore1 * +1) + (d_especifico1 * +1)) + (timpo1 * +1));
	
	idato1 = document.lista.isdato1.value;
	totiscimpo1 = document.lista.iscimpo1.value = ((idato1 * +1) / 100) * (((timpo1 * +1) + (advalore1 * +1)) + ((sobretimpo1 * +1) + (totrebaja1 * +1)));
	
	intidato1 = document.lista.antidato1.value;
	totantimpo1 = document.lista.antimpo1.value = (intidato1 * +1) / 100 * (timpo1 * +1);
	 
	 igvimp1 = document.lista.igvipm1.value;
	 factorav1 = document.lista.factor_av1.value;
	/*totaligvipmimpo1 = document.lista.igvipmimpo1.value = ((igvimp1 * +1) / 100) * ((timpo1 * +1) * ((factorav1 * +1) + (advalore1 * +1) + (d_especifico1 * +1) + (sobretimpo1 * +1) + (totrebaja1 * +1) + (totiscimpo1 * +1)));*/
	/*totaligvipmimpo1 = document.lista.igvipmimpo1.value = ((((igvimp1 * +1) / 100) * (timpo1 * +1)) * (factorav1 * +1)) + ((advalore1 * +1) + (d_especifico1 * +1) + (sobretimpo1 * +1) + (totrebaja1 * +1) + (totiscimpo1 * +1))*/
	totaligvipmimpo1 = document.lista.igvipmimpo1.value = ((igvimp1 * +1) / 100) * ((timpo1 * +1) * (factorav1 * +1) + (advalore1 * +1) + (d_especifico1 * +1) + (sobretimpo1 * +1) + (totrebaja1 * +1) + (totiscimpo1 * +1));
	
	/*fila2*/
	stasa2 = document.lista.sobretasa2.value;
	advalore2 = document.lista.calaraimpo2.value;
	d_especifico2 = document.lista.despecificoimpo2.value;
	timpo2 = document.lista.totalimpo2.value;
	sobretimpo2 = document.lista.sobretasaimpo2.value = ((stasa2 * +1) / 100) * (((advalore2 * +1)  + (d_especifico2 * +1)) + (timpo2 * +1));
	
	rebaja2 = document.lista.rebajaarance2.value;
	totrebaja2 = document.lista.rebajaimpo2.value = ((rebaja2 * +1) / 100) * (((advalore2 * +1) + (d_especifico2 * +1)) + (timpo2 * +1));
	
	idato2 = document.lista.isdato2.value;
	totiscimpo2 = document.lista.iscimpo2.value = ((idato2 * +1) / 100) * (((timpo2 * +1) + (advalore2 * +1)) + ((sobretimpo2 * +1) + (totrebaja2 * +1)));
	
	intidato2 = document.lista.antidato2.value;
	totantimpo2 = document.lista.antimpo2.value = (intidato2 * +1) / 100 * (timpo2 * +1);
	 
	 igvimp2 = document.lista.igvipm2.value;
	 factorav2 = document.lista.factor_av2.value;
	/*totaligvipmimpo2 = document.lista.igvipmimpo2.value = (igvimp2 * +1) / 100 * (timpo2 * +1) * (factorav2 * +1) + (advalore2 * +1) + (d_especifico2 * +1) + (sobretimpo2 * +1) + (totrebaja2 * +1) + (totiscimpo2 * +1);*/
	totaligvipmimpo2 = document.lista.igvipmimpo2.value = ((igvimp2 * +1) / 100) * ((timpo2 * +1) * (factorav2 * +1) + (advalore2 * +1) + (d_especifico2 * +1) + (sobretimpo2 * +1) + (totrebaja2 * +1) + (totiscimpo2 * +1));
	
	/*fila3*/
	stasa3 = document.lista.sobretasa3.value;
	advalore3 = document.lista.calaraimpo3.value;
	d_especifico3 = document.lista.despecificoimpo3.value;
	timpo3 = document.lista.totalimpo3.value;
	sobretimpo3 = document.lista.sobretasaimpo3.value = ((stasa3 * +1) /100) * (((advalore3 * +1) + (d_especifico3 * +1)) + (timpo3 * +1));
	
	rebaja3 = document.lista.rebajaarance3.value;
	totrebaja3 = document.lista.rebajaimpo3.value = ((rebaja3 * +1) /100 ) * (((advalore3 * +1) + (d_especifico3 * +1)) + (timpo3 * +1));
	
	idato3 = document.lista.isdato3.value;
	totiscimpo3 = document.lista.iscimpo3.value = ((idato3 * +1) / 100) * (((timpo3 * +1) + (advalore3 * +1)) + ((sobretimpo3 * +1) + (totrebaja3 * +1)));
	
	intidato3 = document.lista.antidato3.value;
	totantimpo3 = document.lista.antimpo3.value = (intidato3 * +1) / 100 * (timpo3 * +1);
	 
	 igvimp3 = document.lista.igvipm3.value;
	 factorav3 = document.lista.factor_av3.value;
	/*totaligvipmimpo3 = document.lista.igvipmimpo3.value = (igvimp3 * +1) / 100 * (timpo3 * +1) * (factorav3 * +1) + (advalore3 * +1) + (d_especifico3 * +1) + (sobretimpo3 * +1) + (totrebaja3 * +1) + (totiscimpo3 * +1);*/
	totaligvipmimpo3 = document.lista.igvipmimpo3.value = ((igvimp3 * +1) / 100) * ((timpo3 * +1) * (factorav3 * +1) + (advalore3 * +1) + (d_especifico3 * +1) + (sobretimpo3 * +1) + (totrebaja3 * +1) + (totiscimpo3 * +1));
	
	/*fila4*/
	stasa4 = document.lista.sobretasa4.value;
	advalore4 = document.lista.calaraimpo4.value;
	d_especifico4 = document.lista.despecificoimpo4.value;
	timpo4 = document.lista.totalimpo4.value;
	sobretimpo4 = document.lista.sobretasaimpo4.value = ((stasa4 * +1) / 100) * (((advalore4 * +1) + (d_especifico4 * +1)) + (timpo4 * +1));
	
	rebaja4 = document.lista.rebajaarance4.value;
	totrebaja4 = document.lista.rebajaimpo4.value = ((rebaja4 * +1) /100 ) * (((advalore4 * +1) + (d_especifico4 * +1)) + (timpo4 * +1));
	
	idato4 = document.lista.isdato4.value;
	totiscimpo4 = document.lista.iscimpo4.value = ((idato4 * +1) / 100) * (((timpo4 * +1) + (advalore4 * +1)) + ((sobretimpo4 * +1) + (totrebaja4 * +1)));
	
	intidato4 = document.lista.antidato4.value;
	totantimpo4 = document.lista.antimpo4.value = (intidato4 * +1) / 100 * (timpo4 * +1);
	 
	 igvimp4 = document.lista.igvipm4.value;
	 factorav4 = document.lista.factor_av4.value;
	/*totaligvipmimpo4 = document.lista.igvipmimpo4.value = (igvimp4 * +1) / 100 * (timpo4 * +1) * (factorav4 * +1) + (advalore4 * +1) + (d_especifico4 * +1) + (sobretimpo4 * +1) + (totrebaja4 * +1) + (totiscimpo4 * +1);*/
	totaligvipmimpo4 = document.lista.igvipmimpo4.value = ((igvimp4 * +1) / 100) * ((timpo4 * +1) * (factorav4 * +1) + (advalore4 * +1) + (d_especifico4 * +1) + (sobretimpo4 * +1) + (totrebaja4 * +1) + (totiscimpo4 * +1));
	
	/*fila5*/
	stasa5 = document.lista.sobretasa5.value;
	advalore5 = document.lista.calaraimpo5.value;
	d_especifico5 = document.lista.despecificoimpo5.value;
	timpo5 = document.lista.totalimpo5.value;
	sobretimpo5 = document.lista.sobretasaimpo5.value = ((stasa5 * +1) /100) * (((advalore5 * +1) + (d_especifico5 * +1)) + (timpo5 * +1));
	
	rebaja5 = document.lista.rebajaarance5.value;
	totrebaja5 = document.lista.rebajaimpo5.value = ((rebaja5 * +1) / 100) * (((advalore5 * +1) + (d_especifico5 * +1)) + (timpo5 * +1));
	
	idato5 = document.lista.isdato5.value;
	totiscimpo5 = document.lista.iscimpo5.value = ((idato5 * +1) / 100) * ((timpo5 * +1) + ((advalore5 * +1)) + ((sobretimpo5 * +1) + (totrebaja5 * +1)));
	
	intidato5 = document.lista.antidato5.value;
	totantimpo5 = document.lista.antimpo5.value = (intidato5 * +1) / 100 * (timpo5 * +1);
	 
	 igvimp5 = document.lista.igvipm5.value;
	 factorav5 = document.lista.factor_av5.value;
	/*totaligvipmimpo5 = document.lista.igvipmimpo5.value = (igvimp5 * +1) / 100 * (timpo5 * +1) * (factorav5 * +1) + (advalore5 * +1) + (d_especifico5 * +1) + (sobretimpo5 * +1) + (totrebaja5 * +1) + (totiscimpo5 * +1);*/
	totaligvipmimpo5 = document.lista.igvipmimpo5.value = ((igvimp5 * +1) / 100) * ((timpo5 * +1) * (factorav5 * +1) + (advalore5 * +1) + (d_especifico5 * +1) + (sobretimpo5 * +1) + (totrebaja5 * +1) + (totiscimpo5 * +1));
	
	} 
function NoSumar(){  
      clearInterval(interval);  
}  
</SCRIPT>

</head>

<body>

<br /><br />
<input class="form-control btn-primary" type="button" value="C&aacute;lculo de Costo de Importaci&oacute;n. Paso : 8 de 12" />
 <form name="lista" method="post" onSubmit="return valida(this);" action="updatederechoarancel.php" > 


  <input class="form-control" name="idprod" type="hidden" value="<?php echo "$codigox"; ?>" />
   <input class="form-control" name="idotros" type="hidden" value="<?php echo "$idotros"; ?>" />
 
  <br />
  <center>
 <table id="contenedorr3" border="0" class="table-hover table-bordered" style='font-size:80%;'> 
 <tr>
 <td colspan="7" align="center"><h5><b>C&aacute;lculo de CIF y Derecho de Importaci&oacute;n (Peru)</b></h5></td>
 </tr>
  <tr>
   <td align="center" colspan="3"><h5><b>C&aacute;lculo del CIF</b></h5> </td>
   <td align="center" colspan="4"><h5><b>Desembolso a la Empresa de Seguros</b></h5> </td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center" height="30"><b>CONCEPTO</b></td>
  <td bgcolor="#E9E9E9" align="center" width="80"><b>DATO</b></td>
  <td bgcolor="#E9E9E9" align="center" width="80"><b>IMPORTE</b></td>
  <td bgcolor="#E9E9E9" align="center"><b>CONCEPTO</b></td>
  <td bgcolor="#E9E9E9" align="center" width="80"><b>DATO</b></td>
  <td bgcolor="#E9E9E9" align="center" width="80"><b>IMPORTE</b></td>
  <td bgcolor="#E9E9E9" align="center"><b>DESTINO</b></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" height="30"><center><b>FOB:</b></center></td>
  <td></td>
  <td align="center"><?php echo number_format("$fobx",3,".",","); ?><input class="btn alert-info" name="fobx" type="hidden" value="<?php echo "$fobx"; ?>" readonly="readonly" size="7" /></td>
  <td bgcolor="#E9E9E9" align="center"><b>DERECHO DE EMISION (% Prima Neta):</b></td>
  
  <td align="center"><?php echo number_format("$dereemi",3,".",","); echo "  %"; ?>  <input class="btn alert-info" name="fobx2" type="hidden" value="<?php echo "$dereemi"; ?>" readonly="readonly" size="7" /></td>
   <td align="center"><?php echo number_format("$impo2",3,".",","); ?><input class="btn alert-info" name="fobx3" type="hidden" value="<?php echo "$impo2"; ?>" readonly="readonly" size="7" /></td>
  <td align="center">Gasto de Importacion</td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" height="30"><center><b>FLETE:</b></center></td>
  <td></td>
  <td align="center"> <?php echo number_format("$fletex",3,".",","); ?><input class="btn alert-info" name="flete2" type="hidden" value="<?php echo "$fletex"; ?>" readonly="readonly" size="7" /></td>
  <td bgcolor="#E9E9E9" align="center"><b>VALOR VENTA:</b></td>
  <td align="center"></td>
  <td align="center"><?php echo number_format("$impo3",3,".",","); ?> <input class="btn alert-info" name="flete3" type="hidden" value="<?php echo "$impo3"; ?>" readonly="readonly" size="7" /></td>
  <td align="center"></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" height="30"><center><b>CFR:</b></center></td>
  <td></td>
  <td align="center"><?php echo number_format("$cfr",3,".",","); ?><input class="btn alert-info" name="cfr2" type="hidden" value="<?php echo "$cfr"; ?>" readonly="readonly" size="7" /></td>
  <td bgcolor="#E9E9E9" align="center"><b>IGV:</b></td>
  
   <td align="center"><?php echo number_format("$igv",3,".",","); echo "  %"; ?> <input class="btn alert-info" name="igv" type="hidden" value="<?php echo "$igv"; ?>" readonly="readonly" size="7" /></td>
   <td align="center"><?php echo number_format("$impo4",3,".",","); ?>  <input class="btn alert-info" name="imp4" type="hidden" value="<?php echo "$impo4"; ?>" readonly="readonly" size="7" /></td>
   <td align="center">Credito Fiscal</td>
  </tr>
  <tr>
  <?PHP
  if($tsegurox=='Empresa de Seguros'){
	  ?>
  <td bgcolor="#E9E9E9" align="center" height="30"><b>SEGURO PRIMA NETA:</b></td>
  <?php
  }else{
	  ?>
  <td bgcolor="#E9E9E9" height="30"><b>SEGURO DE TABLA:</b></td>
  <?php
  }
  ?>
  <td align="center"> <?php echo number_format("$pneta",3,".",","); echo "  %"; ?> <input class="btn alert-info" name="seguroprine" type="hidden" value="<?php echo "$pneta"; ?>" readonly="readonly" size="7" /></td>
  <td align="center"><?php echo "$totaldeduce2"; ?>  <input class="btn alert-info" name="impoprine" type="hidden" value="<?php echo number_format("$totaldeduce2",3,".",","); ?>" readonly="readonly" size="7" /></td>
  <td bgcolor="#E9E9E9" align="center"><b>PRECIO DE VENTA:</b></td>
  <td align="center"><input class="btn alert-info" name="preciovent" type="hidden" value="<?php echo "$precioventa"; ?>" readonly="readonly" size="7" /></td>
  <td align="center"><?php echo number_format("$precioventa",3,".",","); ?></td>
  <td align="center"></td>
  </tr>
  <?PHP
  if($tsegurox=='Empresa de Seguros'){
	  ?>
  <tr>
  <td bgcolor="#E9E9E9" align="center" height="30"><b>SUMA ASEGURADA:</b></td>
  <td align="center"><?php echo number_format("$totaldeduce",3,".",","); ?><input class="btn alert-info" name="asegura" type="hidden" value="<?php echo "$totaldeduce"; ?>" readonly="readonly" size="7" /></td>
  <td align="center"></td>
  <td bgcolor="#E9E9E9" align="center"><b>FACTOR A/V:</b></td>
  <td align="center"><?php echo number_format("$factor_av",3,".",","); ?><input class="btn alert-info" name="facav" type="hidden" value="<?php echo "$factor_av"; ?>" readonly="readonly" size="7" /></td>
  <td align="center"></td>
  <td align="center"></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center" height="30"><b>DEDUCIBLE:</b></td>
  <td align="center"><?php echo number_format("$deduce",3,".",","); ?><input class="btn alert-info" name="deduce" type="hidden" value="<?php echo "$deduce"; ?>" readonly="readonly" size="7" /></td>
  <td align="center"></td>
  </tr>
  <?php
  }
  ?>
  <tr>
  <td bgcolor="#E9E9E9" height="30"><center><b>CIF:</b></center></td>
  <td align="center"></td>
  <td align="center"><?php echo number_format("$cifxx",3,".",","); ?><input class="btn alert-info" name="cifx" type="hidden" value="<?php echo "$cifxx"; ?>" readonly="readonly" size="7" /></td>
  </tr>
  </table>
  </center>
  
  <table class="form-control table-hover" style='font-size:80%'> 
  <tr>
   <td align="center" colspan="16"><h4><b>Otros - Derechos Arancelarios</b></h4> </td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center"><b>Tasa de Despacho %</b></td>
  <td bgcolor="#E9E9E9" align="center"><b>Recargo de Remuneracion</b></td>
  <td bgcolor="#E9E9E9" align="center"><b>Percepcion %</b></td>
  </tr>
  <tr>
  <td><input class="form-control" name="idprodu" type="hidden" value="<?php echo "$codigox"; ?>" />
  <input class="form-control" name="tasadespa" type="text" placeholder="0.00" onkeypress="return NumCheck(event, this)" value="2.350" /></td>
  <td><input class="form-control" name="rremu" type="text" placeholder="0.00" onkeypress="return NumCheck(event, this)" value="10.000" /></td>
  <td><input class="form-control" name="perce" type="text" placeholder="0.00" onkeypress="return NumCheck(event, this)" value="10.000" /></td>
  </tr>
  </table>
  
  <table class="table table-hover" style='font-size:80%'> 
  <tr>
   <td align="center" colspan="16"><h4><b>Derechos Arancelarios</b></h4> </td>
  </tr>
  <tr>
 <td bgcolor="#E9E9E9" align="center"><b>#</b></td>
 <td bgcolor="#E9E9E9" align="center"><b>Producto</b></td>
 <td bgcolor="#E9E9E9" align="center" title="Ad/Valore"><b>% A/V</b></td>
 <td bgcolor="#E9E9E9" align="center" title="Arancel Importe"><b>Aranc. Imp.</b></td>
 <td bgcolor="#E9E9E9" align="center" title="Derecho Especifico por Tonelada"><b>D. Esp. por TN </b></td>
 <td bgcolor="#E9E9E9" align="center" title="Derecho Especifico por Importe"><b>D. Esp. por Imp.</b></td>
 <td bgcolor="#E9E9E9" align="center"><b>% Sobretasa</b></td>
 <td bgcolor="#E9E9E9" align="center" title="Sobretasa Importe"><b>Sob. Importe</b></td>
 <td bgcolor="#E9E9E9" align="center" title="Rebaja Arancelaria"><b>% R. Aranc.</b></td>
 <td bgcolor="#E9E9E9" align="center" title="Rebaja Arancel Importe"><b>% Reb. A. Importe</b></td>
 <td bgcolor="#E9E9E9" align="center"><b>Isc Dato</b></td>
 <td bgcolor="#E9E9E9" align="center"><b>Isc Importe</b></td>
 <td bgcolor="#E9E9E9" align="center"><b>Antid. Dato</b></td>
 <td bgcolor="#E9E9E9" align="center"><b>Antid. Importe</b></td>
 <td bgcolor="#E9E9E9" align="center"><b>IGV + IPM</b></td>
 <td bgcolor="#E9E9E9" align="center"><b>IGV + IPM Importe</b></td>
  </tr>
  <?php
  $sqllista="SELECT
cos_prod_detalle.id_detalle,
cos_prod_detalle.id_prod,
cos_prod_detalle.partidaA,
cos_prod_detalle.nomproducto,
cos_prod_detalle.cantidad,
cos_prod_detalle.unidad_comerc,
cos_prod_detalle.peso_unidad_kg,
cos_prod_detalle.peso_total_kg,
cos_prod_detalle.valor_factura,
cos_prod_detalle.total_factura,
cos_prod_detalle.porcent_costo
FROM
cos_prod_detalle
WHERE
cos_prod_detalle.id_prod = '$codigox'";
  $rsnl = mysql_query($sqllista);
if (mysql_num_rows($rsnl) > 0){
	while($rownl = mysql_fetch_array($rsnl)){
		$items = $items + 1;
		$iddeta = $rownl["id_detalle"];
		$partida = $rownl["partidaA"];
		$nomprod = $rownl["nomproducto"];
		$pesototal = $rownl["peso_total_kg"];
		$totalfact = $rownl["total_factura"];
		
		/*consultamos natasapartida*/
		$sqlvista="SELECT tasa.cnan, tasa.vadv, tasa.vigv, tasa.visc, tasa.tderesp, tasa.tdl25784, tasa.trs015cfds, tasa.tseguros, tasa.finitas, tasa.ffintas, tasa.fmod, tasa.cdigmod, tasa.dbaselegal, tasa.vcomm, tasa.tnan, tasa.vsob, tasa.dobs, tasa.fingreso, tasa.vbas_max FROM part_nandtasa AS tasa WHERE tasa.cnan = '$partida' ORDER BY tasa.ffintas ASC LIMIT 1";
		$rsnv = mysql_query($sqlvista);
if (mysql_num_rows($rsnv) > 0){
	while($rowv = mysql_fetch_array($rsnv)){
		$adva = $rowv["vadv"];
		//$aranigv = $rowv["vigv"];
		$aranigv = "18";
		$dereespecia = $rowv["tderesp"];
	}
}
/*fin consultamos natasapartida*/
/*consulto derecho especifico*/
$sqldere="SELECT cos_dere_esp.id_lista, cos_dere_esp.partida, cos_dere_esp.derecho_esp, cos_dere_esp.fecha_ini, cos_dere_esp.fecha_fin, cos_dere_esp.valor_refer_tn, cos_dere_esp.tasa_tn FROM cos_dere_esp WHERE cos_dere_esp.derecho_esp = '$dereespecia' ORDER BY cos_dere_esp.fecha_fin ASC LIMIT 1 ";
$rsnd = mysql_query($sqldere);
if (mysql_num_rows($rsnd) > 0){
	while($rowd = mysql_fetch_array($rsnd)){
		$dereesp = $rowd["valor_refer_tn"];
	}
}else{
	$dereesp = "0.00";
}
/*fin consulto derecho especifico*/

/*calculamos arancel importe*/
$cal_av = (($adva / 100) * $totalfact) * $factor_av;
/*calculamos derecho especifico importe*/
//$dere_esp_impo = number_format(($dereesp * $pesototal) / 1000,3,".",",");

$dere_esp_impo = ($dereesp * $pesototal) / 1000;
		
		echo "<tr>";
		if($items=='1'){
		echo "<td align='center'> $items </td>";
		echo "<td> $nomprod 
		<input class='btn alert-info' name='totalimpo1' type='hidden' value='$totalfact' readonly='readonly' size='2' />
		<input class='btn alert-info' name='factor_av1' type='hidden' value='$factor_av' readonly='readonly' size='2' />
		<input class='btn alert-info' name='iddetalle1' type='hidden' value='$iddeta' readonly='readonly' size='2' />
		<input class='btn alert-info' name='ite1' type='hidden' value='$items' readonly='readonly' size='2' />
		</td>";
		echo "<td><input class='btn alert-info' name='advalore1' type='text' value='$adva' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='calaraimpo1' type='text' value='$cal_av' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='despecifico1' type='text' value='$dereesp' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='despecificoimpo1' type='text' value='$dere_esp_impo' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='sobretasa1' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='sobretasaimpo1' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='rebajaarance1' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='rebajaimpo1' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='isdato1' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='iscimpo1' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='antidato1' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='antimpo1' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='igvipm1' type='text' value='$aranigv' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='igvipmimpo1' type='text' readonly='readonly' size='3' /> </td>";
		}
		
		if($items=='2'){
		echo "<td align='center'> $items </td>";
		echo "<td> $nomprod 
		<input class='btn alert-info' name='totalimpo2' type='hidden' value='$totalfact' readonly='readonly' size='2' />
		<input class='btn alert-info' name='factor_av2' type='hidden' value='$factor_av' readonly='readonly' size='2' />
		<input class='btn alert-info' name='iddetalle2' type='hidden' value='$iddeta' readonly='readonly' size='2' />
		<input class='btn alert-info' name='ite2' type='hidden' value='$items' readonly='readonly' size='2' />
		</td>";
		echo "<td><input class='btn alert-info' name='advalore2' type='text' value='$adva' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='calaraimpo2' type='text' value='$cal_av' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='despecifico2' type='text' value='$dereesp' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='despecificoimpo2' type='text' value='$dere_esp_impo' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='sobretasa2' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='sobretasaimpo2' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='rebajaarance2' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='rebajaimpo2' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='isdato2' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='iscimpo2' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='antidato2' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='antimpo2' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='igvipm2' type='text' value='$aranigv' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='igvipmimpo2' type='text' readonly='readonly' size='3' /> </td>";
		}
		
		if($items=='3'){
		echo "<td align='center'> $items </td>";
		echo "<td> $nomprod 
		<input class='btn alert-info' name='totalimpo3' type='hidden' value='$totalfact' readonly='readonly' size='2' />
		<input class='btn alert-info' name='factor_av3' type='hidden' value='$factor_av' readonly='readonly' size='2' />
		<input class='btn alert-info' name='iddetalle3' type='hidden' value='$iddeta' readonly='readonly' size='2' />
		<input class='btn alert-info' name='ite3' type='hidden' value='$items' readonly='readonly' size='2' />
		</td>";
		echo "<td><input class='btn alert-info' name='advalore3' type='text' value='$adva' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='calaraimpo3' type='text' value='$cal_av' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='despecifico3' type='text' value='$dereesp' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='despecificoimpo3' type='text' value='$dere_esp_impo' readonly='readonly' size='2' /> </td>";
		echo "<td><input class='form-control' name='sobretasa3' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='sobretasaimpo3' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='rebajaarance3' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='rebajaimpo3' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='isdato3' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='iscimpo3' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='antidato3' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='antimpo3' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='igvipm3' type='text' value='$aranigv' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='igvipmimpo3' type='text' readonly='readonly' size='3' /> </td>";
		}
		
		if($items=='4'){
		echo "<td align='center'> $items </td>";
		echo "<td> $nomprod 
		<input class='btn alert-info' name='totalimpo4' type='hidden' value='$totalfact' readonly='readonly' size='2' />
		<input class='btn alert-info' name='factor_av4' type='hidden' value='$factor_av' readonly='readonly' size='2' />
		<input class='btn alert-info' name='iddetalle4' type='hidden' value='$iddeta' readonly='readonly' size='2' />
		<input class='btn alert-info' name='ite4' type='hidden' value='$items' readonly='readonly' size='2' />
		</td>";
		echo "<td><input class='btn alert-info' name='advalore4' type='text' value='$adva' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='calaraimpo4' type='text' value='$cal_av' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='despecifico4' type='text' value='$dereesp' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='despecificoimpo4' type='text' value='$dere_esp_impo' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='sobretasa4' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='sobretasaimpo4' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='rebajaarance4' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='rebajaimpo4' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='isdato4' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='2' /> </td>";
		echo "<td><input class='btn alert-info' name='iscimpo4' type='text' readonly='readonly' size='2' /> </td>";
		echo "<td><input class='form-control' name='antidato4' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='antimpo4' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='igvipm4' type='text' value='$aranigv' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='igvipmimpo4' type='text' readonly='readonly' size='3' /> </td>";
		}
		
		if($items=='5'){
		echo "<td align='center'> $items </td>";
		echo "<td> $nomprod 
		<input class='btn alert-info' name='totalimpo5' type='hidden' value='$totalfact' readonly='readonly' size='2' />
		<input class='btn alert-info' name='factor_av5' type='hidden' value='$factor_av' readonly='readonly' size='2' />
		<input class='btn alert-info' name='iddetalle5' type='hidden' value='$iddeta' readonly='readonly' size='2' />
		<input class='btn alert-info' name='ite5' type='hidden' value='$items' readonly='readonly' size='2' />
		</td>";
		echo "<td><input class='btn alert-info' name='advalore5' type='text' value='$adva' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='calaraimpo5' type='text' value='$cal_av' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='despecifico5' type='text' value='$dereesp' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='despecificoimpo5' type='text' value='$dere_esp_impo' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='sobretasa5' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='sobretasaimpo5' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='rebajaarance5' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='rebajaimpo5' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='isdato5' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='iscimpo5' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='form-control' name='antidato5' type='text' onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='antimpo5' type='text' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='igvipm5' type='text' value='$aranigv' readonly='readonly' size='3' /> </td>";
		echo "<td><input class='btn alert-info' name='igvipmimpo5' type='text' readonly='readonly' size='3' /> </td>";
		}
		echo "</tr>";
		
	}
}
  ?>
  </table>
  
  
  <center>
  <input class="btn btn-primary" type="button" value="Modificar Valor FOB" name="Modificar" onclick="history.back()" />
  <input class="btn btn-success" name="guardar" type="submit" value=" Validar / Ingresar Derechos Arancelarios"  />
  </center>
</form>
</body>
</html>
<?php
include("pie.php");
?>