<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";

$codigox = $_GET["dif"];
$cifxx = $_GET["cif"];
$demision = $_GET["emisi"];


$sqlotro="SELECT
SUM(cos_prod_detalle.aranc_impo) as aranceimpo,
SUM(cos_prod_detalle.derecho_esp_importe) as derechoespeciimpo,
SUM(cos_prod_detalle.sobretasa_importe) as sobretasaimpo,
SUM(cos_prod_detalle.rebaja_aranc_importe) as rebajaaranceimpo,
SUM(cos_prod_detalle.isc_importe) as iscimpo,
SUM(cos_prod_detalle.antid_importe) as antiimpo,
SUM(cos_prod_detalle.igv_ipm_importe) as igvimpo
FROM
cos_prod_detalle
WHERE
cos_prod_detalle.id_prod = '$codigox'";
$rso = mysql_query($sqlotro);
if (mysql_num_rows($rso) > 0){
	while($rowo = mysql_fetch_array($rso)){
		$araimporte = $rowo["aranceimpo"];
	   $dereespeimpo = $rowo["derechoespeciimpo"];
	   $sobretasaimpo = $rowo["sobretasaimpo"];
	   $rebajaaranceimpo = $rowo["rebajaaranceimpo"];
	   $iscimpo = $rowo["iscimpo"];
	    $igvipm = $rowo["igvimpo"];
		$antiimpo = $rowo["antiimpo"];
	}
	}
	
$sqlp="SELECT cos_producto.tipo_cambio, cos_producto.valor_uit, cos_producto.tasa_desp,  cos_producto.recargo_num FROM cos_producto WHERE cos_producto.id_prod = '$codigox'";
$rsnp = mysql_query($sqlp);
if (mysql_num_rows($rsnp) > 0){
	while($rowp = mysql_fetch_array($rsnp)){
		 $tc = $rowp["tipo_cambio"];
		 $uit = $rowp["valor_uit"];
		 $td = $rowp["tasa_desp"];
		 $rremu = $rowp["recargo_num"];
		 $tasadesp = (($td * $uit) / $tc) / 100;
	}
}

$deuda_adu = $araimporte + $dereespeimpo + $sobretasaimpo + $rebajaaranceimpo + $iscimpo + $igvipm + $antiimpo +  $rremu + $tasadesp;
$deuda_adu22 = $araimporte + $dereespeimpo + $sobretasaimpo + $rebajaaranceimpo + $iscimpo + $igvipm + $antiimpo +  $rremu + $tasadesp;

$deuda_adu2 = $araimporte + $dereespeimpo + $sobretasaimpo + $rebajaaranceimpo + $iscimpo + $igvipm + $antiimpo +  $rremu + $tasadesp ;

$perce = (($cifxx + $deuda_adu2) * $rremu) / 100;
$perce22 = (($cifxx + $deuda_adu2) * $rremu) / 100;

$totaldere = $araimporte + $dereespeimpo + $sobretasaimpo + $rebajaaranceimpo + $iscimpo + $antiimpo + $tasadesp + $rremu;

$deudapercep = $deuda_adu22 + $perce22;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">


<style>
#contenedor { 
border-radius:3px; 
-moz-border-radius:3px; /* Firefox */ 
-webkit-border-radius:3px; /* Safari y Chrome */ 
/* Otros estilos */ 
border:1px solid #333;
/*background:#eee;*/
background:#DDD;
width:100%;
padding:5px;
}
</style>


<script language="javascript" type="text/javascript">
function valida(lista) {
	
	if (lista.handh.value.length < 1){
		alert("Ingrese Gasto HANDHLING");
		return false;
	}
	if (lista.tracc.value.length < 1){
		alert("Ingrese Gasto TRACCION");
		return false;
	}
	if (lista.movicarga.value.length < 1){
		alert("Ingrese Gasto MOVILIZACION DE CARGA");
		return false;
	}
	if (lista.desca.value.length < 1){
		alert("Ingrese Gasto DESCARGA");
		return false;
	}
	if (lista.precin.value.length < 1){
		alert("Ingrese Gasto PRECINTO");
		return false;
	}
	if (lista.alma.value.length < 1){
		alert("Ingrese Gasto ALMACENAJE");
		return false;
	}
	if (lista.serviadmi.value.length < 1){
		alert("Ingrese Gasto SERVICIO ADMINISTRATIVO");
		return false;
	}
	if (lista.servclie.value.length < 1){
		alert("Ingrese Gasto SERVICIO AL CLIENTE");
		return false;
	}
	if (lista.condu.value.length < 1){
		alert("Ingrese Gasto CONDUCCION");
		return false;
	}
	if (lista.otrogas.value.length < 1){
		alert("Ingrese Gasto OTROS GASTOS");
		return false;
	}
	if (lista.cargador.value.length < 1){
		alert("Ingrese Gasto CARGADORES");
		return false;
	}
	if (lista.gasopera.value.length < 1){
		alert("Ingrese Gasto OPERATIVOS");
		return false;
	}
	if (lista.porcecif.value.length < 1){
		alert("Ingrese Gasto COMISION DE AGENTE %CIF");
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

	aa = document.lista.dereimi.value;
	bb = document.lista.handh.value;
	cc = document.lista.tracc.value;
	dd = document.lista.movicarga.value;
	ee = document.lista.desca.value;
	ff = document.lista.precin.value;
	gg = document.lista.alma.value;
	hh = document.lista.serviadmi.value;
	ii = document.lista.servclie.value;
	jj = document.lista.condu.value;
	kk = document.lista.otrogas.value;
	ll = document.lista.cargador.value;
	mm = document.lista.gasopera.value;
	nn = document.lista.porcecif.value;
	ciff = document.lista.cifx3.value;

	r1 = document.lista.comicif.value = ((nn * +1) / 100) * (ciff * +1);
	
	r2 = document.lista.total.value = (bb * +1) + (cc * +1) + (dd * +1) + (ee * +1) + (ff * +1) + (gg * +1) + (hh * +1) + (ii * +1) + (jj * +1) + (kk * +1) + (ll * +1) + (mm * +1) + (r1 * +1);
	
	r3 =  document.lista.igvafe.value = ((r2 * +1) * 18) / 100;
	
	r4 =  document.lista.totagasimpo.value = (aa * +1) + (r2 * +1);
	
	
	per = document.lista.sumdeuda1.value;
	deudapercep = document.lista.sumdeuda2.value = (per * +1) + (r2 * +1) + (r3 * +1);
	
	} 
function NoSumar(){  
      clearInterval(interval);  
}  
</SCRIPT>

</head>

<body>

<br /><br />
<input class="form-control btn-primary" type="button" value="C&aacute;lculo de Costo de Importaci&oacute;n. Paso : 9 de 12" />
 <form name="lista" method="post" onSubmit="return valida(this);" action="updategastoimpo.php" > 

  <input class="form-control" name="idprod" type="hidden" value="<?php echo "$codigox"; ?>" />
  <input class="form-control" name="sumdeuda1" type="hidden" value="<?php echo "$deudapercep"; ?>" />
  <input class="form-control" name="sumdeuda2" type="hidden" />

 
  
 <table id="contenedor" class="table-hover table-bordered" style='font-size:80%'> 
  <tr>
   <td align="center" colspan="3"><h5><b>Calculo de Derecho Impuesto</b></h5> </td>
   <td align="center" colspan="3"><h5><b>Gastos de Importacion</b></h5> </td>
  </tr>
  <tr>
  <td bgcolor="#D5D5D5" align="center"><b>Derecho Impuesto</b></td>
  <td bgcolor="#D5D5D5" align="center"><b>Sunat</b></td>
  <td bgcolor="#D5D5D5" align="center"><b>Destino</b></td>
  <td bgcolor="#D5D5D5" align="center"><b>Concepto</b></td>
  <td bgcolor="#D5D5D5" align="center"><b>Datos</b></td>
  <td bgcolor="#D5D5D5" align="center"><b>Importe</b></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9"><b>AD/VALOREM:</b></td>
  <td align="center" bgcolor="#E9E9E9">
  <input class="btn alert-info" name="cifx3" type="hidden" value="<?php echo "$cifxx"; ?>" readonly="readonly" size="5" />
  <input class="btn alert-info" name="fobx" type="text" value="<?php echo "$araimporte"; ?>" readonly="readonly" size="5" /></td>
  <td bgcolor="#E9E9E9" align="center">GASTO DE IMPORTACION</td>
   <td align="center"><b>DERECHO DE EMISION:</b></td>
    <td></td>
    <td align="center"><input class="btn alert-info" name="dereimi" type="text" value="<?php echo "$demision"; ?>" readonly="readonly" size="5" /></td>
  </tr>
 <tr>
  <td bgcolor="#E9E9E9"><b>DERECHO ESPECIFICO:</b></td>
  <td bgcolor="#E9E9E9" align="center"><input class="btn alert-info" name="fobx" type="text" value="<?php echo "$dereespeimpo"; ?>" readonly="readonly" size="5" /></td>
  <td bgcolor="#E9E9E9" align="center">GASTO DE IMPORTACION</td>
  <td colspan="3" bgcolor="#E9E9E9" align="center"><b>GASTOS AFECTOS</b></td>
  </tr>
   <tr>
  <td bgcolor="#E9E9E9"><b>SOBRETASA ADICIONAL:</b></td>
  <td bgcolor="#E9E9E9" align="center"><input class="btn alert-info" name="fobx" type="text" value="<?php echo "$sobretasaimpo"; ?>" readonly="readonly" size="5" /></td>
  <td bgcolor="#E9E9E9" align="center">GASTO DE IMPORTACION</td>
  <td align="center"><b>HANDHLING:</b></td>
    <td></td>
    <td align="center"><input class="form-control" name="handh" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9"><b>REBAJA ARANCELARIA:</b></td>
  <td bgcolor="#E9E9E9" align="center"><input class="btn alert-info" name="fobx" type="text" value="<?php echo "$rebajaaranceimpo"; ?>" readonly="readonly" size="5" /></td>
  <td bgcolor="#E9E9E9" align="center">GASTO DE IMPORTACION</td>
  <td align="center"><b>TRACCION:</b></td>
    <td></td>
    <td align="center"><input class="form-control" name="tracc" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9"><b>IMP.SELEC.CONSUMO : </b></td>
  <td bgcolor="#E9E9E9" align="center"><input class="btn alert-info" name="fobx" type="text" value="<?php echo "$iscimpo"; ?>" readonly="readonly" size="5" /></td>
  <td bgcolor="#E9E9E9" align="center">GASTO DE IMPORTACION</td>
  <td align="center"><b>MOVILIZACION DE CARGA:</b></td>
    <td></td>
    <td align="center"><input class="form-control" name="movicarga" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9"><b>IGV+IPM :  </b></td>
  <td bgcolor="#E9E9E9" align="center"><input class="btn alert-info" name="fobx" type="text" value="<?php echo "$igvipm"; ?>" readonly="readonly" size="5" /></td>
  <td bgcolor="#E9E9E9" align="center">CREDITO FISCAL</td>
  <td align="center"><b>DESCARGA:</b></td>
    <td></td>
    <td align="center"><input class="form-control" name="desca" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9"><b>DERECHO ANTIDUMPING :  </b></td>
  <td bgcolor="#E9E9E9" align="center"><input class="btn alert-info" name="fobx" type="text" value="<?php echo "$antiimpo"; ?>" readonly="readonly" size="5" /></td>
  <td bgcolor="#E9E9E9" align="center">GASTO DE IMPORTACION</td>
  <td align="center"><b>PRECINTO:</b></td>
    <td></td>
    <td align="center"><input class="form-control" name="precin" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9"><b>TASA DE DESPACHO :  </b></td>
  <td bgcolor="#E9E9E9" align="center"><input class="btn alert-info" name="fobx" type="text" value="<?php echo "$tasadesp"; ?>" readonly="readonly" size="5" /></td>
  <td bgcolor="#E9E9E9" align="center">GASTO DE IMPORTACION</td>
  <td align="center"><b>ALMACENAJE:</b></td>
    <td></td>
    <td align="center"><input class="form-control" name="alma" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9"><b>RECARGO NUMERACION  :  </b></td>
  <td bgcolor="#E9E9E9" align="center"><input class="btn alert-info" name="fobx" type="text" value="<?php echo "$rremu"; ?>" readonly="readonly" size="5" /></td>
  <td bgcolor="#E9E9E9" align="center">GASTO DE IMPORTACION</td>
  <td align="center"><b>SERVICIOS ADMINISTRATIVOS:</b></td>
    <td></td>
    <td align="center"><input class="form-control" name="serviadmi" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9"><b>DEUDA ADUANERA  :  </b></td>
  <td bgcolor="#E9E9E9" align="center"><input class="btn alert-info" name="deudaadu" type="text" value="<?php echo "$deuda_adu"; ?>" readonly="readonly" size="5" /></td>
  <td bgcolor="#E9E9E9" align="center"></td>
  <td align="center"><b>SERVICIO AL CLIENTE:</b></td>
    <td></td>
    <td align="center"><input class="form-control" name="servclie" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9"><b>PERCEPCION :  </b></td>
  <td bgcolor="#E9E9E9" align="center"><input class="btn alert-info" name="peerce" type="text" value="<?php echo "$perce"; ?>" readonly="readonly" size="5" /></td>
  <td bgcolor="#E9E9E9" align="center">GASTO DE IMPORTACION</td>
  <td align="center"><b>CONDUCCION:</b></td>
    <td></td>
    <td align="center"><input class="form-control" name="condu" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9"><b>TOTAL DERECHOS :  </b></td>
  <td bgcolor="#E9E9E9" align="center"><input class="btn alert-info" name="fobx" type="text" value="<?php echo "$totaldere"; ?>" readonly="readonly" size="5" /></td>
  <td bgcolor="#E9E9E9" align="center"></td>
  <td align="center"><b>OTROS GASTOS:</b></td>
    <td></td>
    <td align="center"><input class="form-control" name="otrogas" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
  </tr>
  <tr>
  <td colspan="3" rowspan="6"></td>
  <td align="center"><b>CARGADORES:</b></td>
    <td></td>
    <td align="center"><input class="form-control" name="cargador" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
  </tr>
  <tr>
  <!--<td colspan="3"></td> -->
  <td align="center"><b>GASTOS OPERATIVOS:</b></td>
    <td></td>
    <td align="center"><input class="form-control" name="gasopera" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
  </tr>
  <tr>
  <!--<td colspan="3"></td> -->
  <td align="center"><b>COMISION DE AGENTE %CIF:</b></td>
    <td><input class="form-control" name="porcecif" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
    <td align="center"><input class="form-control" name="comicif" type="text" readonly="readonly" size="2" /></td>
  </tr>
  <tr>
 <!-- <td colspan="3"></td> -->
  <td align="center"><b>TOTAL:</b></td>
    <td></td>
    <td align="center"><input class="form-control" name="total" type="text" readonly="readonly" size="2" /></td>
  </tr>
  <tr>
<!--  <td colspan="3"></td> -->
  <td align="center"><b>IGV AFECTOS:</b></td>
    <td></td>
    <td align="center"><input class="form-control" name="igvafe" type="text" readonly="readonly" size="2" /></td>
  </tr>
  <tr>
  <!--<td colspan="3"></td> -->
  <td align="center"><b>TOTAL GASTOS IMPORTACION:</b></td>
    <td></td>
    <td align="center"><input class="form-control" name="totagasimpo" type="text" readonly="readonly" size="2" /></td>
  </tr>
  </table>
  <br />
  
  <center>
  <input class="btn btn-primary" type="button" value="Modificar Derecho Arancel" name="Modificar" onclick="history.back()" />
  <input class="btn btn-success" name="guardar" type="submit" value=" Validar / Ingresar Gastos de Importacion"  />
  </center>
</form>
</body>
</html>
<?php
include("pie.php");
?>