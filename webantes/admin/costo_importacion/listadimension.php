<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";

$codi = $_GET["dim"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script language="javascript" type="text/javascript">
function valida(lista) {
	/*Primera Fila*/
    if (lista.t_empaque1.value.length < 1){
		alert("Ingrese Tipo de Empaque \n Fila #1");
		return false;
	}
	if (lista.cantiempa1.value.length < 1){
		alert("Ingrese Cantidad \n Fila #1");
		return false;
	}
	if (lista.dimancho1.value.length < 1){
		alert("Ingrese Diametro en Ancho \n Fila #1");
		return false;
	}
	if (lista.dimlargo1.value.length < 1){
		alert("Ingrese Diametro en Largo \n Fila #1");
		return false;
	}
	if (lista.dimalto1.value.length < 1){
		alert("Ingrese Diametro en Alto \n Fila #1");
		return false;
	}
	if (lista.cempaque1.value.length < 1){
		alert("Ingrese Costo Empaque \n Fila #1");
		return false;
	}
	if (lista.cembalaje1.value.length < 1){
		alert("Ingrese Costo Embalaje \n Fila #1");
		return false;
	}
	if (lista.pemabalaje1.value.length < 1){
		alert("Ingrese Peso Embalaje \n Fila #1");
		return false;
	}
	
	/*Segunda Fila*/
    if (lista.t_empaque2.value.length < 1){
		alert("Ingrese Tipo de Empaque \n Fila #2");
		return false;
	}
	if (lista.cantiempa2.value.length < 1){
		alert("Ingrese Cantidad \n Fila #2");
		return false;
	}
	if (lista.dimancho2.value.length < 1){
		alert("Ingrese Diametro en Ancho \n Fila #2");
		return false;
	}
	if (lista.dimlargo2.value.length < 1){
		alert("Ingrese Diametro en Largo \n Fila #2");
		return false;
	}
	if (lista.dimalto2.value.length < 1){
		alert("Ingrese Diametro en Alto \n Fila #2");
		return false;
	}
	if (lista.cempaque2.value.length < 1){
		alert("Ingrese Costo Empaque \n Fila #2");
		return false;
	}
	if (lista.cembalaje2.value.length < 1){
		alert("Ingrese Costo Embalaje \n Fila #2");
		return false;
	}
	if (lista.pemabalaje2.value.length < 1){
		alert("Ingrese Peso Embalaje \n Fila #2");
		return false;
	}
	
	/*tercera Fila*/
    if (lista.t_empaque3.value.length < 1){
		alert("Ingrese Tipo de Empaque \n Fila #3");
		return false;
	}
	if (lista.cantiempa3.value.length < 1){
		alert("Ingrese Cantidad \n Fila #3");
		return false;
	}
	if (lista.dimancho3.value.length < 1){
		alert("Ingrese Diametro en Ancho \n Fila #3");
		return false;
	}
	if (lista.dimlargo3.value.length < 1){
		alert("Ingrese Diametro en Largo \n Fila #3");
		return false;
	}
	if (lista.dimalto3.value.length < 1){
		alert("Ingrese Diametro en Alto \n Fila #3");
		return false;
	}
	if (lista.cempaque3.value.length < 1){
		alert("Ingrese Costo Empaque \n Fila #3");
		return false;
	}
	if (lista.cembalaje3.value.length < 1){
		alert("Ingrese Costo Embalaje \n Fila #3");
		return false;
	}
	if (lista.pemabalaje3.value.length < 1){
		alert("Ingrese Peso Embalaje \n Fila #3");
		return false;
	}
	
	/*cuarta Fila*/
    if (lista.t_empaque4.value.length < 1){
		alert("Ingrese Tipo de Empaque \n Fila #4");
		return false;
	}
	if (lista.cantiempa4.value.length < 1){
		alert("Ingrese Cantidad \n Fila #4");
		return false;
	}
	if (lista.dimancho4.value.length < 1){
		alert("Ingrese Diametro en Ancho \n Fila #4");
		return false;
	}
	if (lista.dimlargo4.value.length < 1){
		alert("Ingrese Diametro en Largo \n Fila #4");
		return false;
	}
	if (lista.dimalto4.value.length < 1){
		alert("Ingrese Diametro en Alto \n Fila #4");
		return false;
	}
	if (lista.cempaque4.value.length < 1){
		alert("Ingrese Costo Empaque \n Fila #4");
		return false;
	}
	if (lista.cembalaje4.value.length < 1){
		alert("Ingrese Costo Embalaje \n Fila #4");
		return false;
	}
	if (lista.pemabalaje4.value.length < 1){
		alert("Ingrese Peso Embalaje \n Fila #4");
		return false;
	}
	
	/*quinta Fila*/
    if (lista.t_empaque5.value.length < 1){
		alert("Ingrese Tipo de Empaque \n Fila #5");
		return false;
	}
	if (lista.cantiempa5.value.length < 1){
		alert("Ingrese Cantidad \n Fila #5");
		return false;
	}
	if (lista.dimancho5.value.length < 1){
		alert("Ingrese Diametro en Ancho \n Fila #5");
		return false;
	}
	if (lista.dimlargo5.value.length < 1){
		alert("Ingrese Diametro en Largo \n Fila #5");
		return false;
	}
	if (lista.dimalto5.value.length < 1){
		alert("Ingrese Diametro en Alto \n Fila #5");
		return false;
	}
	if (lista.cempaque5.value.length < 1){
		alert("Ingrese Costo Empaque \n Fila #5");
		return false;
	}
	if (lista.cembalaje5.value.length < 1){
		alert("Ingrese Costo Embalaje \n Fila #5");
		return false;
	}
	if (lista.pemabalaje5.value.length < 1){
		alert("Ingrese Peso Embalaje \n Fila #5");
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
	
	/*primera fila*/
	CAn1 = document.lista.cantiempa1.value;
	Cos_empaque1 = document.lista.cempaque1.value;
	Cos_embala1 = document.lista.cembalaje1.value;
	Peso_embala1 = document.lista.pemabalaje1.value;
	
	dimAn1 = document.lista.dimancho1.value;
	dimLa1 = document.lista.dimlargo1.value;
	dimAl1 = document.lista.dimalto1.value;
	//r1 = document.lista.voluni1.value = (dimAn1 * dimLa1 ) * dimAl1;
	r1 = document.lista.totavoluni1.value = (dimAn1 * dimLa1 ) * dimAl1;
	document.lista.voluni1.value = CAn1 * r1;
	
	document.lista.totcempaque1.value = CAn1 * Cos_empaque1;
	document.lista.totcembalaje1.value = CAn1 * Cos_embala1;
	document.lista.totpesoemabalaje1.value = CAn1 * Peso_embala1;
	 
	 /*segunda fila*/
	 CAn2 = document.lista.cantiempa2.value;
	Cos_empaque2 = document.lista.cempaque2.value;
	Cos_embala2 = document.lista.cembalaje2.value;
	Peso_embala2 = document.lista.pemabalaje2.value;
	
	dimAn2 = document.lista.dimancho2.value;
	dimLa2 = document.lista.dimlargo2.value;
	dimAl2 = document.lista.dimalto2.value;
	 //document.lista.voluni2.value = (dimAn2 * dimLa2 ) * dimAl2;
	 r2 = document.lista.totavoluni2.value = (dimAn2 * dimLa2 ) * dimAl2;
	document.lista.voluni2.value = CAn2 * r2;
	
	document.lista.totcempaque2.value = CAn2 * Cos_empaque2;
	document.lista.totcembalaje2.value = CAn2 * Cos_embala2;
	document.lista.totpesoemabalaje2.value = CAn2 * Peso_embala2;
	 
	 /*tercera fila*/
	 CAn3 = document.lista.cantiempa3.value;
	Cos_empaque3 = document.lista.cempaque3.value;
	Cos_embala3 = document.lista.cembalaje3.value;
	Peso_embala3 = document.lista.pemabalaje3.value;
	 
	dimAn3 = document.lista.dimancho3.value;
	dimLa3 = document.lista.dimlargo3.value;
	dimAl3 = document.lista.dimalto3.value;
	 //document.lista.voluni3.value = (dimAn3 * dimLa3 ) * dimAl3;
	  r3 = document.lista.totavoluni3.value = (dimAn3 * dimLa3 ) * dimAl3;
	document.lista.voluni3.value = CAn3 * r3;
	
	document.lista.totcempaque3.value = CAn3 * Cos_empaque3;
	document.lista.totcembalaje3.value = CAn3 * Cos_embala3;
	document.lista.totpesoemabalaje3.value = CAn3 * Peso_embala3;
	
	/*cuarta fila*/
	 CAn4 = document.lista.cantiempa4.value;
	Cos_empaque4 = document.lista.cempaque4.value;
	Cos_embala4 = document.lista.cembalaje4.value;
	Peso_embala4 = document.lista.pemabalaje4.value;
	
	dimAn4 = document.lista.dimancho4.value;
	dimLa4 = document.lista.dimlargo4.value;
	dimAl4 = document.lista.dimalto4.value;
	// document.lista.voluni4.value = (dimAn4 * dimLa4 ) * dimAl4;
	  r4 = document.lista.totavoluni4.value = (dimAn4 * dimLa4 ) * dimAl4;
	document.lista.voluni4.value = CAn4 * r4;
	
	document.lista.totcempaque4.value = CAn4 * Cos_empaque4;
	document.lista.totcembalaje4.value = CAn4 * Cos_embala4;
	document.lista.totpesoemabalaje3.value = CAn4 * Peso_embala4;
	 
	 /*quinta fila*/
	  CAn5 = document.lista.cantiempa5.value;
	Cos_empaque5 = document.lista.cempaque5.value;
	Cos_embala5 = document.lista.cembalaje5.value;
	Peso_embala5 = document.lista.pemabalaje5.value;
	
	dimAn5 = document.lista.dimancho5.value;
	dimLa5 = document.lista.dimlargo5.value;
	dimAl5 = document.lista.dimalto5.value;
	 //document.lista.voluni5.value = (dimAn5 * dimLa5 ) * dimAl5;
	 r5 = document.lista.totavoluni5.value = (dimAn5 * dimLa5 ) * dimAl5;
	document.lista.voluni5.value = CAn5 * r5;
	
	document.lista.totcempaque5.value = CAn5 * Cos_empaque5;
	document.lista.totcembalaje5.value = CAn5 * Cos_embala5;
	document.lista.totpesoemabalaje5.value = CAn5 * Peso_embala5;
	
	} 
function NoSumar(){  
      clearInterval(interval);  
}  
</SCRIPT>

</head>

<body>

<br /><br />
<input class="form-control btn-primary" type="button" value="C&aacute;lculo de Costo de Importaci&oacute;n. Paso : 3 de 12" />
 <form name="lista" method="post" onSubmit="return valida(this);" action="inserdimesion.php" > 
<table class="table table-hover" style='font-size:80%'>
  <tr>
   <td colspan="15" align="center"><h4><b>Empaque y Embalaje (Dimensiones en m.)</b></h4> </td>
  </tr>
 <tr>
  <td bgcolor="#E9E9E9" align="center">#</td>
  <td bgcolor="#E9E9E9" align="center">Descripcion del Producto</td>
  <td bgcolor="#E9E9E9" align="center">Empaque</td>
  <td bgcolor="#E9E9E9" align="center">Cantidad</td>
  <td bgcolor="#E9E9E9" align="center">Dimension en Ancho</td>
  <td bgcolor="#E9E9E9" align="center">Dimension en Largo</td>
  <td bgcolor="#E9E9E9" align="center">Dimension en Alto</td>
  <td bgcolor="#E9E9E9" align="center">Volumen por Unidad</td>
  <td bgcolor="#E9E9E9" align="center">Total Volumen por Unidad</td>
  <td bgcolor="#E9E9E9" align="center">Total Costo Empaque</td>
   <td bgcolor="#E9E9E9" align="center">Total Empaque</td>
  <td bgcolor="#E9E9E9" align="center">Total Costo Embalaje</td>
   <td bgcolor="#E9E9E9" align="center">Total Embalaje</td>
  <td bgcolor="#E9E9E9" align="center">Peso Embalaje (Kg.)</td>
   <td bgcolor="#E9E9E9" align="center">Total Peso Embalaje (Kg.)</td>
  </tr>
  
  <?php
  $sqlvc="SELECT
cos_prod_detalle.id_prod,
GROUP_CONCAT(cos_prod_detalle.nomproducto) AS descripcion,
cos_prod_detalle.agrupa_empaque
FROM
cos_prod_detalle
WHERE
cos_prod_detalle.id_prod = '$codi'
GROUP BY
cos_prod_detalle.id_prod,
cos_prod_detalle.agrupa_empaque";
   $rsnvc = mysql_query($sqlvc);
if (mysql_num_rows($rsnvc) > 0){
	
	while($rowvc = mysql_fetch_array($rsnvc)){
		$items = $items + 1;
		$codiprod = $rowvc["id_prod"];
		$descri = $rowvc["descripcion"];
		echo "<tr>";
		echo "<td>$items</td>";
		echo "<td>$descri</td>";
		if ($items=='1'){
		echo "<td>
		<input class='form-control' name='item1' type='hidden' value='$items' />
		<input class='form-control' name='idprodu' type='hidden' value='$codiprod' />
		<input class='form-control' name='nompro1' type='hidden' value='$descri' />
		
		<input class='form-control' name='t_empaque1' type='text' /></td>";
		
		echo "<td><input class='form-control' name='cantiempa1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimancho1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimlargo1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimalto1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='totavoluni1' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		echo "<td><input class='form-control' name='voluni1' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='cempaque1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totcempaque1' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='cembalaje1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totcembalaje1' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='pemabalaje1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totpesoemabalaje1' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		}
		if ($items=='2'){
		echo "<td>
		<input class='form-control' name='item2' type='hidden' value='$items' />
		<input class='form-control' name='nompro2' type='hidden' value='$descri' />
		
		<input class='form-control' name='t_empaque2' type='text' /></td>";
		
		echo "<td><input class='form-control' name='cantiempa2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='dimancho2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimlargo2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimalto2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='totavoluni2' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		echo "<td><input class='form-control' name='voluni2' type='text' placeholder='0.00' readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='cempaque2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totcempaque2' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='cembalaje2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totcembalaje2' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='pemabalaje2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totpesoemabalaje2' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		}
		if ($items=='3'){
		echo "<td>
		<input class='form-control' name='item3' type='hidden' value='$items' />
		<input class='form-control' name='nompro3' type='hidden' value='$descri' />
		
		<input class='form-control' name='t_empaque3' type='text' /></td>";
		
		echo "<td><input class='form-control' name='cantiempa3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='dimancho3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimlargo3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimalto3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='totavoluni3' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		echo "<td><input class='form-control' name='voluni3' type='text' placeholder='0.00' readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='cempaque3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totcempaque3' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='cembalaje3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totcembalaje3' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='pemabalaje3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totpesoemabalaje3' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		}
		if ($items=='4'){
		echo "<td>
		<input class='form-control' name='item4' type='hidden' value='$items' />
		<input class='form-control' name='nompro4' type='hidden' value='$descri' />
		
		<input class='form-control' name='t_empaque4' type='text' /></td>";
		
		echo "<td><input class='form-control' name='cantiempa4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='dimancho4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimlargo4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimalto4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='totavoluni4' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		echo "<td><input class='form-control' name='voluni4' type='text' placeholder='0.00' readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='cempaque4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totcempaque4' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='cembalaje4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totcembalaje4' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='pemabalaje4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totpesoemabalaje4' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		}
		if ($items=='5'){
		echo "<td>
		<input class='form-control' name='item5' type='hidden' value='$items' />
		<input class='form-control' name='nompro5' type='hidden' value='$descri' />
		
		<input class='form-control' name='t_empaque5' type='text' /></td>";
		
		echo "<td><input class='form-control' name='cantiempa5' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='dimancho5' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimlargo5' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimalto5' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='totavoluni5' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		echo "<td><input class='form-control' name='voluni5' type='text' placeholder='0.00' readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='cempaque5' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totcempaque5' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='cembalaje5' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totcembalaje5' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='pemabalaje5' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totpesoemabalaje5' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		}
		echo "</tr>";
		}
		}
  ?>
  <tr>
  <td colspan="15" align="center">
  <input class="btn btn-success" name="guardar" type="submit" value=" Validar / Ingresar Paletizacion"  /></td>
  </tr>
 </table>

</form>
</body>
</html>
<?php
include("pie.php");
?>