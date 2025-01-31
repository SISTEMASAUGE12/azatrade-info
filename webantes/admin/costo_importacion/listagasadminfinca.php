<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";

$codigox = $_GET["id"];
$deudafinan = $_GET["dfin"];
	
$sqlp="SELECT SUM(cos_otrodatos.fob + cos_otrodatos.flete) as CFR FROM cos_otrodatos WHERE cos_otrodatos.id_prod = '$codigox'";
$rsnp = mysql_query($sqlp);
if (mysql_num_rows($rsnp) > 0){
	while($rowp = mysql_fetch_array($rsnp)){
		 $tcfr = $rowp["CFR"];
	}
}else{
	$tcfr = "0";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<style>
#contenedor2 { 
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
	
	if (lista.gasadmini.value.length < 1){
		alert("Ingrese Gasto Administrativos");
		return false;
	}
	if (lista.emicre.value.length < 1){
		alert("Ingrese Gasto Emision Carta Credito");
		return false;
	}
	if (lista.comisi.value.length < 1){
		alert("Ingrese Gasto Comision");
		return false;
	}
	if (lista.letra.value.length < 1){
		alert("Ingrese Cantidad de Letras");
		return false;
	}
	if (lista.tasam.value.length < 1){
		alert("Ingrese Tasa Mensual");
		return false;
	}
	if (lista.margenimpo.value.length < 1){
		alert("Ingrese Margen Utilidad Importador");
		return false;
	}
	if (lista.margenmino.value.length < 1){
		alert("Ingrese Margen Utilidad Minorista");
		return false;
	}
	
	letrasx = document.lista.letra.value;
	if(letrasx > 10){
		alert("Cantidad de Letras Excedidas !! \n Letras Maximas a Progratiar 10 Letras");
		return false;
	}
	/*alert("Cantidad de Letras Excedidas !! \n "+ letrasx +"");*/
	
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

	admin = document.lista.gasadmini.value;
	credi = document.lista.emicre.value;
	comi = document.lista.comisi.value;
	cfr = document.lista.tcfr.value;
	le = document.lista.letra.value;
	deu = document.lista.sumdeuda1.value;

	r1 = document.lista.tcomisi.value = ((comi * +1) / 100) * (cfr * +1);
	r2 = document.lista.letram.value = (deu * +1) / (le * +1);
	r2 = document.lista.tota.value = (admin * +1) + (credi * +1) + (r1 * +1);
	
	
	} 
function NoSumar(){  
      clearInterval(interval);  
}  
</SCRIPT>

</head>

<body>

<br /><br />
<input class="form-control btn-primary" type="button" value="C&aacute;lculo de Costo de Importaci&oacute;n. Paso : 10 de 12" />
 <form name="lista" method="post" onSubmit="return valida(this);" action="updategastoadmin.php" > 


  <input class="form-control" name="idprod" type="hidden" value="<?php echo "$codigox"; ?>" />
  <input class="form-control" name="tcfr" type="hidden" value="<?php echo "$tcfr"; ?>" />
  <input class="form-control" name="sumdeuda1" type="hidden" value="<?php echo "$deudafinan"; ?>" />

 
  
 <table id="contenedor2" border="0" class="table-hover table-bordered" style='font-size:80%' align="center"> 
  <tr>
   <td align="center" colspan="3"><h5><b>GASTOS ADMINISTRATIVOS Y FINANCIEROS</b></h5> </td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>Concepto</b></h5></td>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>Datos</b></h5></td>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>Importe</b></h5></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center"><b>GASTOS ADMINISTRATIVOS:</b></td>
  <td></td>
  <td align="center">
  
  <input class="form-control" name="gasadmini" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2"/></td>
  </tr>
 <tr>
  <td bgcolor="#E9E9E9" align="center"><b>EMISION CARTA DE CREDITO:</b></td>
  <td></td>
  <td align="center">
  <input class="form-control" name="emicre" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2"/></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center"><b>COMISIONES: </b></td>
  <td align="center">
  <input class="form-control" name="comisi" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2"/></td>
  <td align="center"><B>CFR:</B> &nbsp;&nbsp;&nbsp;
  <input class="btn alert-info" name="tcomisi" type="text" placeholder='0.00' readonly="readonly" size="2"/></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center"><b>DEUDA A FINANCIAR:</b></td>
  <td align="center"><input class="form-control" name="deudafina" type="text" value="<?php echo number_format("$deudafinan",3,".",","); ?>" readonly="readonly" size="2"/></td>
  <td align="center"></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center"><b>LETRAS: </b></td>
  <td align="center">
  <input class="form-control" name="letra" type="text" onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2"/></td>
  <td align="center"></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center"><b>LETRAS MONTO: </b></td>
  <td align="center">
  <input class="btn alert-info" name="letram" type="text"  placeholder='0.00' readonly="readonly" size="2"/></td>
  <td align="center"></td>
  </tr>
   <tr>
  <td bgcolor="#E9E9E9" align="center"><b>TASA MENSUAL: </b></td>
  <td align="center">
  <input class="form-control" name="tasam" type="text"  onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
  <td align="center"></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center"><b>TOTAL: </b></td>
  <td bgcolor="#E9E9E9" align="center"></td>
  <td bgcolor="#E9E9E9" align="center">
  <input class="btn alert-info" name="tota" type="text"  placeholder='0.00' readonly="readonly" size="2" /></td>
  </tr>
  </table>
  <br />
   <table id="contenedor2" border="0" class="table-hover table-bordered" style='font-size:80%' align="center"> 
  <tr>
  <td bgcolor="#E9E9E9" align="center"><b>MARGEN UTILIDAD IMPORTADOR: </b></td>
  <td align="center">
  <input class="form-control" name="margenimpo" type="text"  onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
  <td align="center"></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center"><b>MARGEN UTILIDAD MINORISTA: </b></td>
  <td align="center">
  <input class="form-control" name="margenmino" type="text"  onFocus='Sumar();' onBlur='NoSumar();'  placeholder='0.00' onkeypress='return NumCheck(event, this)' size="2" /></td>
  <td align="center"></td>
  </tr>
  </table>
  <br />
  
  <center>
    <input class="btn btn-primary" type="button" value="Modificar Gasto Importacion" name="Modificar" onclick="history.back()" />
    <input class="btn btn-success" name="guardar" type="submit" value=" Validar / Ingresar Letras Financieros"  />
  </center>
</form>
</body>
</html>
<?php
include("pie.php");
?>