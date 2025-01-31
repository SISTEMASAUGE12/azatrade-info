<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";

$codigox = $_GET["prod"];
$letra = $_GET["letra"];
$tasamen = $_GET["tmensu"];
$letramonto = $_GET["montlet"];

$interes1 = ($letramonto * $tasamen) / 100;
//$interes1 = number_format(($letramonto * $tasamen) / 100,3,".",",");
$igv1 = ($interes1 * 18) / 100;
//$igv1 = number_format(($interes1 * 18) / 100,3,".",",");
$totalsuma1 = ($letramonto + $interes1) + $igv1;



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script language="javascript" type="text/javascript">
function valida(lista) {
	
	if (lista.k1.value.length < 1){
		alert("Ingrese Valor letra #1");
		return false;
	}
	if (lista.k2.value.length < 1){
		alert("Ingrese Valor letra #2");
		return false;
	}
	if (lista.k3.value.length < 1){
		alert("Ingrese Valor letra #3");
		return false;
	}
	if (lista.k4.value.length < 1){
		alert("Ingrese Valor letra #4");
		return false;
	}
	if (lista.k5.value.length < 1){
		alert("Ingrese Valor letra #5");
		return false;
	}
	if (lista.k6.value.length < 1){
		alert("Ingrese Valor letra #6");
		return false;
	}
	if (lista.k7.value.length < 1){
		alert("Ingrese Valor letra #7");
		return false;
	}
	if (lista.k8.value.length < 1){
		alert("Ingrese Valor letra #8");
		return false;
	}
	if (lista.k9.value.length < 1){
		alert("Ingrese Valor letra #9");
		return false;
	}
	if (lista.k10.value.length < 1){
		alert("Ingrese Valor letra #10");
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
/*segunda fila*/
	tasa1 = document.lista.tasame1.value;
	k2 = document.lista.k2.value;
	k1 = document.lista.k1.value;
	monto2 = document.lista.letramonto2.value;

	tasa1a = document.lista.tasame2.value = ((tasa1 * +1) * (k2 * +1)) / k1;
	interes1a = document.lista.inte2.value = ((monto2 * +1) * (tasa1a * +1)) / 100;
	igv1a = document.lista.igv2.value = ((interes1a * +1) * 18) / 100;
	interesigv1a = document.lista.igvinteres2.value = ((monto2 * +1) + (interes1a * +1)) + igv1a;
	
	/*tercera fila*/
	tasa2 = document.lista.tasame2.value;
	k3 = document.lista.k3.value;
	k2 = document.lista.k2.value;
	monto3 = document.lista.letramonto3.value;
	tasa3a = document.lista.tasame3.value = ((tasa2 * +1) * (k3 * +1)) / k2;
	interes3a = document.lista.inte3.value = ((monto3 * +1) * (tasa3a * +1)) / 100;
	igv3a = document.lista.igv3.value = ((interes3a * +1) * 18) / 100;
	interesigv3a = document.lista.igvinteres3.value = ((monto3 * +1) + (interes3a * +1)) + igv3a;
	
	/*cuarta fila*/
	tasa3 = document.lista.tasame3.value;
	k4 = document.lista.k4.value;
	k3 = document.lista.k3.value;
	monto4 = document.lista.letramonto4.value;
	tasa4a = document.lista.tasame4.value = ((tasa3 * +1) * (k4 * +1)) / k3;
	interes4a = document.lista.inte4.value = ((monto4 * +1) * (tasa4a * +1)) / 100;
	igv4a = document.lista.igv4.value = ((interes4a * +1) * 18) / 100;
	interesigv4a = document.lista.igvinteres4.value = ((monto4 * +1) + (interes4a * +1)) + igv4a;
	
	/*quinta fila*/
	tasa4 = document.lista.tasame4.value;
	k5 = document.lista.k5.value;
	k4 = document.lista.k4.value;
	monto5 = document.lista.letramonto5.value;
	tasa5a = document.lista.tasame5.value = ((tasa4 * +1) * (k5 * +1)) / k4;
	interes5a = document.lista.inte5.value = ((monto5 * +1) * (tasa5a * +1)) / 100;
	igv5a = document.lista.igv5.value = ((interes5a * +1) * 18) / 100;
	interesigv5a = document.lista.igvinteres5.value = ((monto5 * +1) + (interes5a * +1)) + igv5a;
	
	/*sexta fila*/
	tasa5 = document.lista.tasame5.value;
	k6 = document.lista.k6.value;
	k5 = document.lista.k5.value;
	monto6 = document.lista.letramonto6.value;
	tasa6a = document.lista.tasame6.value = ((tasa5 * +1) * (k6 * +1)) / k5;
	interes6a = document.lista.inte6.value = ((monto6 * +1) * (tasa6a * +1)) / 100;
	igv6a = document.lista.igv6.value = ((interes6a * +1) * 18) / 100;
	interesigv6a = document.lista.igvinteres6.value = ((monto6 * +1) + (interes6a * +1)) + igv6a;
	
	/*septima fila*/
	tasa6 = document.lista.tasame6.value;
	k7 = document.lista.k7.value;
	k6 = document.lista.k6.value;
	monto7 = document.lista.letramonto7.value;
	tasa7a = document.lista.tasame7.value = ((tasa6 * +1) * (k7 * +1)) / k6;
	interes7a = document.lista.inte7.value = ((monto7 * +1) * (tasa7a * +1)) / 100;
	igv7a = document.lista.igv7.value = ((interes7a * +1) * 18) / 100;
	interesigv7a = document.lista.igvinteres7.value = ((monto7 * +1) + (interes7a * +1)) + igv7a;
	
	/*octava fila*/
	tasa7 = document.lista.tasame7.value;
	k8 = document.lista.k8.value;
	k7 = document.lista.k7.value;
	monto8 = document.lista.letramonto8.value;
	tasa8a = document.lista.tasame8.value = ((tasa7 * +1) * (k8 * +1)) / k7;
	interes8a = document.lista.inte8.value = ((monto8 * +1) * (tasa8a * +1)) / 100;
	igv8a = document.lista.igv8.value = ((interes8a * +1) * 18) / 100;
	interesigv8a = document.lista.igvinteres8.value = ((monto8 * +1) + (interes8a * +1)) + igv8a;
	
	/*novena fila*/
	tasa8 = document.lista.tasame8.value;
	k9 = document.lista.k9.value;
	k8 = document.lista.k8.value;
	monto9 = document.lista.letramonto9.value;
	tasa9a = document.lista.tasame9.value = ((tasa8 * +1) * (k9 * +1)) / k8;
	interes9a = document.lista.inte9.value = ((monto9 * +1) * (tasa9a * +1)) / 100;
	igv9a = document.lista.igv9.value = ((interes9a * +1) * 18) / 100;
	interesigv9a = document.lista.igvinteres9.value = ((monto9 * +1) + (interes9a * +1)) + igv9a;
	
	/*decima fila*/
	tasa9 = document.lista.tasame9.value;
	k10 = document.lista.k10.value;
	k9 = document.lista.k9.value;
	monto10 = document.lista.letramonto10.value;
	tasa10a = document.lista.tasame10.value = ((tasa8 * +1) * (k10 * +1)) / k9;
	interes10a = document.lista.inte10.value = ((monto10 * +1) * (tasa10a * +1)) / 100;
	igv10a = document.lista.igv10.value = ((interes10a * +1) * 18) / 100;
	interesigv10a = document.lista.igvinteres10.value = ((monto10 * +1) + (interes10a * +1)) + igv10a;
	
	} 
function NoSumar(){  
      clearInterval(interval);  
}  
</SCRIPT>

</head>

<body>

<br /><br />
<input class="form-control btn-primary" type="button" value="C&aacute;lculo de Costo de Importaci&oacute;n. Paso : 11 de 12" />
<form name="lista" method="post" onSubmit="return valida(this);" action="insertaletras.php" > 



  <input class="form-control" name="idprod" type="hidden" value="<?php echo "$codigox"; ?>" />
  
 <table border="0" class="table table-hover" style='font-size:80%' align="center"> 
  <tr>
   <td align="center" colspan="7"><h5><b>LETRAS (GASTOS ADMINISTRATIVOS Y FINANCIEROS)</b></h5> </td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>Letras</b></h5></td>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>Letra Valor</b></h5></td>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>Venc. D&iacute;as</b></h5></td>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>Tasa</b></h5></td>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>Interes</b></h5></td>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>IGV</b></h5></td>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>K + INT. + IGV</b></h5></td>
  </tr>
  <?php
  $fila1="1";
  if($fila1 <= $letra){
  ?>
  <tr>
  <td align="center"><b>N|° 1</b></td>
  <td align="center">
  <input class="btn alert-info" name="items1" type="hidden" value="<?php echo"$fila1"; ?>" readonly="readonly" />
  <input class="btn alert-info" name="letramonto1" type="text" value="<?php echo"$letramonto"; ?>" readonly="readonly" size="5"/></td>
   <td> <input class="form-control" name="k1" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="5"/></td>
  <td><input class="btn alert-info" name="tasame1" type="text" value="<?php echo"$tasamen"; ?>" readonly="readonly" size="5"/></td>
   <td><input class="btn alert-info" name="inte1" type="text" value="<?php echo"$interes1"; ?>" readonly="readonly" size="5"/></td>
    <td><input class="btn alert-info" name="igv1" type="text" value="<?php echo"$igv1"; ?>" readonly="readonly" size="5"/></td>
     <td><input class="btn alert-info" name="igvinteres1" type="text" value="<?php echo"$totalsuma1"; ?>" readonly="readonly" size="5"/></td>
  </tr>
  <?php
  }
  $fila2="2";
  if($fila2 <= $letra){
  ?>
   <tr>
  <td align="center"><b>N|° 2</b></td>
  <td align="center">
  <input class="btn alert-info" name="items2" type="hidden" value="<?php echo"$fila2"; ?>" readonly="readonly" size="5"/>
  <input class="btn alert-info" name="letramonto2" type="text" value="<?php echo"$letramonto"; ?>" readonly="readonly" size="5"/></td>
   <td> <input class="form-control" name="k2" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="5"/></td>
  <td><input class="btn alert-info" name="tasame2" type="text" placeholder='0.00'  readonly="readonly" size="5"/></td>
   <td><input class="btn alert-info" name="inte2" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
    <td><input class="btn alert-info" name="igv2" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
     <td><input class="btn alert-info" name="igvinteres2" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
  </tr>
  <?php
  }
   $fila3="3";
  if($fila3 <= $letra){
  ?>
  <tr>
  <td align="center"><b>N|° 3</b></td>
  <td align="center">
  <input class="btn alert-info" name="items3" type="hidden" value="<?php echo"$fila3"; ?>" readonly="readonly" size="5"/>
  <input class="btn alert-info" name="letramonto3" type="text" value="<?php echo"$letramonto"; ?>" readonly="readonly" size="5"/></td>
   <td> <input class="form-control" name="k3" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="5"/></td>
  <td><input class="btn alert-info" name="tasame3" type="text" placeholder='0.00'  readonly="readonly" size="5"/></td>
   <td><input class="btn alert-info" name="inte3" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
    <td><input class="btn alert-info" name="igv3" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
     <td><input class="btn alert-info" name="igvinteres3" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
  </tr>
  <?php
  }
   $fila4="4";
  if($fila4 <= $letra){
  ?>
   <tr>
  <td align="center"><b>N|° 4</b></td>
  <td align="center">
  <input class="btn alert-info" name="items4" type="hidden" value="<?php echo"$fila4"; ?>" readonly="readonly" size="5"/>
  <input class="btn alert-info" name="letramonto4" type="text" value="<?php echo"$letramonto"; ?>" readonly="readonly" size="5"/></td>
   <td> <input class="form-control" name="k4" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="5"/></td>
  <td><input class="btn alert-info" name="tasame4" type="text" placeholder='0.00'  readonly="readonly" size="5"/></td>
   <td><input class="btn alert-info" name="inte4" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
    <td><input class="btn alert-info" name="igv4" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
     <td><input class="btn alert-info" name="igvinteres4" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
  </tr>
  <?php
  }
   $fila5="5";
  if($fila5 <= $letra){
  ?>
  <tr>
  <td align="center"><b>N|° 5</b></td>
  <td align="center">
  <input class="btn alert-info" name="items5" type="hidden" value="<?php echo"$fila5"; ?>" readonly="readonly" size="5"/>
  <input class="btn alert-info" name="letramonto5" type="text" value="<?php echo"$letramonto"; ?>" readonly="readonly" size="5"/></td>
   <td> <input class="form-control" name="k5" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="5"/></td>
  <td><input class="btn alert-info" name="tasame5" type="text" placeholder='0.00'  readonly="readonly" size="5"/></td>
   <td><input class="btn alert-info" name="inte5" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
    <td><input class="btn alert-info" name="igv5" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
     <td><input class="btn alert-info" name="igvinteres5" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
  </tr>
  <?php
  }
   $fila6="6";
  if($fila6 <= $letra){
  ?>
  <tr>
  <td align="center"><b>N|° 6</b></td>
  <td align="center">
  <input class="btn alert-info" name="items6" type="hidden" value="<?php echo"$fila6"; ?>" readonly="readonly" size="5"/>
  <input class="btn alert-info" name="letramonto6" type="text" value="<?php echo"$letramonto"; ?>" readonly="readonly" size="5"/></td>
   <td> <input class="form-control" name="k6" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="5"/></td>
  <td><input class="btn alert-info" name="tasame6" type="text" placeholder='0.00'  readonly="readonly" size="5"/></td>
   <td><input class="btn alert-info" name="inte6" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
    <td><input class="btn alert-info" name="igv6" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
     <td><input class="btn alert-info" name="igvinteres6" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
  </tr>
  <?php
  }
   $fila7="7";
  if($fila7 <= $letra){
  ?>
  <tr>
  <td align="center"><b>N|° 7</b></td>
  <td align="center">
  <input class="btn alert-info" name="items7" type="hidden" value="<?php echo"$fila7"; ?>" readonly="readonly" size="5"/>
  <input class="btn alert-info" name="letramonto7" type="text" value="<?php echo"$letramonto"; ?>" readonly="readonly" size="2"/></td>
   <td> <input class="form-control" name="k7" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="5"/></td>
  <td><input class="btn alert-info" name="tasame7" type="text" placeholder='0.00'  readonly="readonly" size="5"/></td>
   <td><input class="btn alert-info" name="inte7" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
    <td><input class="btn alert-info" name="igv7" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
     <td><input class="btn alert-info" name="igvinteres7" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
  </tr>
  <?php
  }
   $fila8="8";
  if($fila8 <= $letra){
  ?>
  <tr>
  <td align="center"><b>N|° 8</b></td>
  <td align="center">
  <input class="btn alert-info" name="items8" type="hidden" value="<?php echo"$fila8"; ?>" readonly="readonly" size="5"/>
  <input class="btn alert-info" name="letramonto8" type="text" value="<?php echo"$letramonto"; ?>" readonly="readonly" size="2"/></td>
   <td> <input class="form-control" name="k8" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="5"/></td>
  <td><input class="btn alert-info" name="tasame8" type="text" placeholder='0.00'  readonly="readonly" size="5"/></td>
   <td><input class="btn alert-info" name="inte8" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
    <td><input class="btn alert-info" name="igv8" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
     <td><input class="btn alert-info" name="igvinteres8" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
  </tr>
  <?php
  }
   $fila9="9";
  if($fila9<= $letra){
  ?>
  <tr>
  <td align="center"><b>N|° 9</b></td>
  <td align="center">
  <input class="btn alert-info" name="items9" type="hidden" value="<?php echo"$fila9"; ?>" readonly="readonly" size="5"/>
  <input class="btn alert-info" name="letramonto9" type="text" value="<?php echo"$letramonto"; ?>" readonly="readonly" size="5"/></td>
   <td> <input class="form-control" name="k9" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="5"/></td>
  <td><input class="btn alert-info" name="tasame9" type="text" placeholder='0.00'  readonly="readonly" size="5"/></td>
   <td><input class="btn alert-info" name="inte9" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
    <td><input class="btn alert-info" name="igv9" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
     <td><input class="btn alert-info" name="igvinteres9" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
  </tr>
  <?php
  }
   $fila10="10";
  if($fila10<= $letra){
  ?>
  <tr>
  <td align="center"><b>N|° 10</b></td>
  <td align="center">
  <input class="btn alert-info" name="items10" type="hidden" value="<?php echo"$fila10"; ?>" readonly="readonly" size="5"/>
  <input class="btn alert-info" name="letramonto10" type="text" value="<?php echo"$letramonto"; ?>" readonly="readonly" size="5"/></td>
   <td> <input class="form-control" name="k10" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="5"/></td>
  <td><input class="btn alert-info" name="tasame10" type="text" placeholder='0.00'  readonly="readonly" size="5"/></td>
   <td><input class="btn alert-info" name="inte10" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
    <td><input class="btn alert-info" name="igv10" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
     <td><input class="btn alert-info" name="igvinteres10" type="text" placeholder='0.00' readonly="readonly" size="5"/></td>
  </tr>
  <?php
  }
  ?>
  </table>
  <br />
  
  <center>
    <input class="btn btn-primary" type="button" value="Modificar Gastos Financieros" name="Modificar" onclick="history.back()" />
    <input class="btn btn-success" name="guardar" type="submit" value=" Procesar / Registrar Letras Fraccionadas"  />
  </center>
</form>
</body>
</html>
<?php
include("pie.php");
?>