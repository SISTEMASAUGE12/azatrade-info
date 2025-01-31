<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";

$codigox = $_GET["pal"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script language="javascript" type="text/javascript">
function valida(lista) {

	/*primera Fila paletizacion*/
    if (lista.uni_carga1.value.length < 1){
		alert("Ingrese Unidad de Carga \n Paletizacion Fila #1");
		return false;
	}
	if (lista.cantipal1.value.length < 1){
		alert("Ingrese Cantidad \n Paletizacion Fila #1");
		return false;
	}
	if (lista.dimanchopal1.value.length < 1){
		alert("Ingrese Diametro en Ancho \n Paletizacion Fila #1");
		return false;
	}
	if (lista.dimlargopal1.value.length < 1){
		alert("Ingrese Diametro en Largo \n Paletizacion Fila #1");
		return false;
	}
	if (lista.dimaltopal1.value.length < 1){
		alert("Ingrese Diametro en Alto \n Paletizacion Fila #1");
		return false;
	}
	if (lista.costounipal1.value.length < 1){
		alert("Ingrese Costo Unitarizacion \n Paletizacion Fila #1");
		return false;
	}
	if (lista.pesopal1.value.length < 1){
		alert("Ingrese Peso Paletizacion \n Paletizacion Fila #1");
		return false;
	}
	/*segunda Fila paletizacion*/
    if (lista.uni_carga2.value.length < 1){
		alert("Ingrese Unidad de Carga \n Paletizacion Fila #2");
		return false;
	}
	if (lista.cantipal2.value.length < 1){
		alert("Ingrese Cantidad \n Paletizacion Fila #2");
		return false;
	}
	if (lista.dimanchopal2.value.length < 1){
		alert("Ingrese Diametro en Ancho \n Paletizacion Fila #2");
		return false;
	}
	if (lista.dimlargopal2.value.length < 1){
		alert("Ingrese Diametro en Largo \n Paletizacion Fila #2");
		return false;
	}
	if (lista.dimaltopal2.value.length < 1){
		alert("Ingrese Diametro en Alto \n Paletizacion Fila #2");
		return false;
	}
	if (lista.costounipal2.value.length < 1){
		alert("Ingrese Costo Unitarizacion \n Paletizacion Fila #2");
		return false;
	}
	if (lista.pesopal2.value.length < 1){
		alert("Ingrese Peso Paletizacion \n Paletizacion Fila #2");
		return false;
	}
	/*tercera Fila paletizacion*/
    if (lista.uni_carga3.value.length < 1){
		alert("Ingrese Unidad de Carga \n Paletizacion Fila #3");
		return false;
	}
	if (lista.cantipal3.value.length < 1){
		alert("Ingrese Cantidad \n Paletizacion Fila #3");
		return false;
	}
	if (lista.dimanchopal3.value.length < 1){
		alert("Ingrese Diametro en Ancho \n Paletizacion Fila #3");
		return false;
	}
	if (lista.dimlargopal3.value.length < 1){
		alert("Ingrese Diametro en Largo \n Paletizacion Fila #3");
		return false;
	}
	if (lista.dimaltopal3.value.length < 1){
		alert("Ingrese Diametro en Alto \n Paletizacion Fila #3");
		return false;
	}
	if (lista.costounipal3.value.length < 1){
		alert("Ingrese Costo Unitarizacion \n Paletizacion Fila #3");
		return false;
	}
	if (lista.pesopal3.value.length < 1){
		alert("Ingrese Peso Paletizacion \n Paletizacion Fila #3");
		return false;
	}
	/*cuarta Fila paletizacion*/
    if (lista.uni_carga4.value.length < 1){
		alert("Ingrese Unidad de Carga \n Paletizacion Fila #4");
		return false;
	}
	if (lista.cantipal4.value.length < 1){
		alert("Ingrese Cantidad \n Paletizacion Fila #4");
		return false;
	}
	if (lista.dimanchopal4.value.length < 1){
		alert("Ingrese Diametro en Ancho \n Paletizacion Fila #4");
		return false;
	}
	if (lista.dimlargopal4.value.length < 1){
		alert("Ingrese Diametro en Largo \n Paletizacion Fila #4");
		return false;
	}
	if (lista.dimaltopal4.value.length < 1){
		alert("Ingrese Diametro en Alto \n Paletizacion Fila #4");
		return false;
	}
	if (lista.costounipal4.value.length < 1){
		alert("Ingrese Costo Unitarizacion \n Paletizacion Fila #4");
		return false;
	}
	if (lista.pesopal4.value.length < 1){
		alert("Ingrese Peso Paletizacion \n Paletizacion Fila #4");
		return false;
	}
	/*quinta Fila paletizacion*/
    if (lista.uni_carga5.value.length < 1){
		alert("Ingrese Unidad de Carga \n Paletizacion Fila #5");
		return false;
	}
	if (lista.cantipal5.value.length < 1){
		alert("Ingrese Cantidad \n Paletizacion Fila #5");
		return false;
	}
	if (lista.dimanchopal5.value.length < 1){
		alert("Ingrese Diametro en Ancho \n Paletizacion Fila #5");
		return false;
	}
	if (lista.dimlargopal5.value.length < 1){
		alert("Ingrese Diametro en Largo \n Paletizacion Fila #5");
		return false;
	}
	if (lista.dimaltopal5.value.length < 1){
		alert("Ingrese Diametro en Alto \n Paletizacion Fila #5");
		return false;
	}
	if (lista.costounipal5.value.length < 1){
		alert("Ingrese Costo Unitarizacion \n Paletizacion Fila #5");
		return false;
	}
	if (lista.pesopal5.value.length < 1){
		alert("Ingrese Peso Paletizacion \n Paletizacion Fila #5");
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
	cantAn1 = document.lista.cantipal1.value;
	cospale1 = document.lista.costounipal1.value;
	pesopale1 = document.lista.pesopal1.value;
	
	dimAn1 = document.lista.dimanchopal1.value;
	dimLa1 = document.lista.dimlargopal1.value;
	dimAl1 = document.lista.dimaltopal1.value;
	 r1 = document.lista.volunipal1.value = (dimAn1 * dimLa1 ) * dimAl1;
	 document.lista.totavolunipal1.value = cantAn1 * r1;
	 document.lista.totacostounipal1.value = cantAn1 * cospale1;
	  document.lista.totapesopal1.value = cantAn1 * pesopale1;
	 
	/*segunda fila*/
	cantAn2 = document.lista.cantipal2.value;
	cospale2 = document.lista.costounipal2.value;
	pesopale2 = document.lista.pesopal2.value;
	
	dimAn2 = document.lista.dimanchopal2.value;
	dimLa2 = document.lista.dimlargopal2.value;
	dimAl2 = document.lista.dimaltopal2.value;
	 r2 = document.lista.volunipal2.value = (dimAn2 * dimLa2 ) * dimAl2;
	 document.lista.totavolunipal2.value = cantAn2 * r2;
	 document.lista.totacostounipal2.value = cantAn2 * cospale2;
	  document.lista.totapesopal2.value = cantAn2 * pesopale2;
	 
	/*tercera fila*/
	cantAn3 = document.lista.cantipal3.value;
	cospale3 = document.lista.costounipal3.value;
	pesopale3 = document.lista.pesopal3.value;
	
	dimAn3 = document.lista.dimanchopal3.value;
	dimLa3 = document.lista.dimlargopal3.value;
	dimAl3 = document.lista.dimaltopal3.value;
	 r3 = document.lista.volunipal3.value = (dimAn3 * dimLa3 ) * dimAl3;
	 document.lista.totavolunipal3.value = cantAn3 * r3;
	 document.lista.totacostounipal3.value = cantAn3 * cospale3;
	  document.lista.totapesopal3.value = cantAn3 * pesopale3;
	 
	/*cuarta fila*/
	cantAn4 = document.lista.cantipal4.value;
	cospale4 = document.lista.costounipal4.value;
	pesopale4 = document.lista.pesopal4.value;
	
	dimAn4 = document.lista.dimanchopal4.value;
	dimLa4 = document.lista.dimlargopal4.value;
	dimAl4 = document.lista.dimaltopal4.value;
	 r4 = document.lista.volunipal4.value = (dimAn4 * dimLa4 ) * dimAl4;
	 document.lista.totavolunipal4.value = cantAn4 * r4;
	 document.lista.totacostounipal4.value = cantAn4 * cospale4;
	  document.lista.totapesopal4.value = cantAn4 * pesopale4;
	 
	/*quinta fila*/
	cantAn5 = document.lista.cantipal5.value;
	cospale5 = document.lista.costounipal5.value;
	pesopale5 = document.lista.pesopal5.value;
	
	dimAn5 = document.lista.dimanchopal5.value;
	dimLa5 = document.lista.dimlargopal5.value;
	dimAl5 = document.lista.dimaltopal5.value;
	 r5 = document.lista.volunipal5.value = (dimAn5 * dimLa5 ) * dimAl5;
	 document.lista.totavolunipal5.value = cantAn5 * r5;
	 document.lista.totacostounipal5.value = cantAn5 * cospale5;
	  document.lista.totapesopal5.value = cantAn5 * pesopale5;
	 
	
	} 
function NoSumar(){  
      clearInterval(interval);  
}  
</SCRIPT>

</head>

<body>

<br /><br />
<input class="form-control btn-primary" type="button" value="C&aacute;lculo de Costo de Exportaci&oacute;n. Paso : 4 de 8" />
<form name="lista" method="post" onSubmit="return valida(this);" action="inserpaletiza.php" > 

  <!-- tabla de paletizacion -->
 <table class="table table-hover" style='font-size:80%'> 
  <tr>
   <td colspan="13" align="center"><h4><b>Unitarizacion - Paletizacion (Dimensiones en m.)</b></h4> </td>
  </tr>
 <tr>
  <td bgcolor="#E9E9E9" align="center">#</td>
  <td bgcolor="#E9E9E9" align="center">Descripcion del Producto</td>
  <td bgcolor="#E9E9E9" align="center">Unidad Carga</td>
  <td bgcolor="#E9E9E9" align="center">Cantidad</td>
  <td bgcolor="#E9E9E9" align="center">Dimension en Ancho</td>
  <td bgcolor="#E9E9E9" align="center">Dimension en Largo</td>
  <td bgcolor="#E9E9E9" align="center">Dimension en Alto</td>
  <td bgcolor="#E9E9E9" align="center">Volumen por Unidad</td>
  <td bgcolor="#E9E9E9" align="center">Total Volumen Unidad</td>
  <td bgcolor="#E9E9E9" align="center">Costo Unitarizacion</td>
  <td bgcolor="#E9E9E9" align="center">Total Costo Unitarizacion</td>
  <td bgcolor="#E9E9E9" align="center">Peso Paletizacion (Kg.)</td>
  <td bgcolor="#E9E9E9" align="center">Total Peso Paletizacion (Kg.)</td>
  </tr>
  <?php
  $sqlpaleti="SELECT
cos_expo_prod_detalle.id_prod,
GROUP_CONCAT(cos_expo_prod_detalle.nomproducto) AS descripcion,
cos_expo_prod_detalle.agrupa_paletiza
FROM
cos_expo_prod_detalle
WHERE
cos_expo_prod_detalle.id_prod = '$codigox'
GROUP BY
cos_expo_prod_detalle.id_prod,
cos_expo_prod_detalle.agrupa_paletiza";
  $rsnpal = mysql_query($sqlpaleti);
if (mysql_num_rows($rsnpal) > 0){
	while($rowpal = mysql_fetch_array($rsnpal)){
		$itemsa = $itemsa + 1;
		$codiprodu = $rowpal["id_prod"];
		$descrip = $rowpal["descripcion"];
		echo"<tr>";
		echo "<td>$itemsa</td>";
		echo "<td>$descrip</td>";
		
		if ($itemsa=='1'){
		echo "<td>
		<input class='form-control' name='item1s' type='hidden' value='$itemsa' />
		<input class='form-control' name='idproduc' type='hidden' value='$codiprodu' />
		<input class='form-control' name='nomprod1' type='hidden' value='$descrip' />
		
		<input class='form-control' name='uni_carga1' type='text' /></td>";
		
		echo "<td><input class='form-control' name='cantipal1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='dimanchopal1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimlargopal1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimaltopal1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='volunipal1' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		echo "<td><input class='form-control' name='totavolunipal1' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='costounipal1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totacostounipal1' type='text' placeholder='0.00' readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='pesopal1' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totapesopal1' type='text' placeholder='0.00' readonly='readonly' /></td>";
		}
		
		if ($itemsa=='2'){
		echo "<td>
		<input class='form-control' name='item2s' type='hidden' value='$itemsa' />
		<input class='form-control' name='nomprod2' type='hidden' value='$descrip' />
		
		<input class='form-control' name='uni_carga2' type='text' /></td>";
		
		echo "<td><input class='form-control' name='cantipal2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='dimanchopal2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimlargopal2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimaltopal2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='volunipal2' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		echo "<td><input class='form-control' name='totavolunipal2' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='costounipal2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totacostounipal2' type='text' placeholder='0.00' readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='pesopal2' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totapesopal2' type='text' placeholder='0.00' readonly='readonly' /></td>";
		}
		
		if ($itemsa=='3'){
		echo "<td>
		<input class='form-control' name='item3s' type='hidden' value='$itemsa' />
		<input class='form-control' name='nomprod3' type='hidden' value='$descrip' />
		
		<input class='form-control' name='uni_carga3' type='text' /></td>";
		
		echo "<td><input class='form-control' name='cantipal3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='dimanchopal3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimlargopal3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimaltopal3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='volunipal3' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		echo "<td><input class='form-control' name='totavolunipal3' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='costounipal3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totacostounipal3' type='text' placeholder='0.00' readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='pesopal3' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totapesopal3' type='text' placeholder='0.00' readonly='readonly' /></td>";
		}
		
		if ($itemsa=='4'){
		echo "<td>
		<input class='form-control' name='item4s' type='hidden' value='$itemsa' />
		<input class='form-control' name='nomprod4' type='hidden' value='$descrip' />
		
		<input class='form-control' name='uni_carga4' type='text' /></td>";
		
		echo "<td><input class='form-control' name='cantipal4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='dimanchopal4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimlargopal4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimaltopal4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='volunipal4' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		echo "<td><input class='form-control' name='totavolunipal4' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='costounipal4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totacostounipal4' type='text' placeholder='0.00' readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='pesopal4' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totapesopal4' type='text' placeholder='0.00' readonly='readonly' /></td>";
		}
		
		if ($itemsa=='5'){
		echo "<td>
		<input class='form-control' name='item5s' type='hidden' value='$itemsa' />
		<input class='form-control' name='nomprod5' type='hidden' value='$descrip' />
		
		<input class='form-control' name='uni_carga5' type='text' /></td>";
		
		echo "<td><input class='form-control' name='cantipal5' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='dimanchopal5' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimlargopal5' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='dimaltopal5' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		
		echo "<td><input class='form-control' name='volunipal5' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		echo "<td><input class='form-control' name='totavolunipal5' type='text' placeholder='0.00'  readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='costounipal5' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totacostounipal5' type='text' placeholder='0.00' readonly='readonly' /></td>";
		
		echo "<td><input class='form-control' name='pesopal5' type='text' onFocus='Sumar();' onBlur='NoSumar();' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='totapesopal5' type='text' placeholder='0.00' readonly='readonly' /></td>";
		}
		
		echo"</tr>";
		
	}
}
  ?>

<tr>
  <td colspan="13" align="center">
 <input class="btn btn-success" name="guardar" type="submit" value=" Validar / Ingresar Unitarización"  />
 </td>
  </tr> 
 </table>
</form>
</body>
</html>
<?php
include("pie.php");
?>