<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";

$codigox = $_GET["fob"];
$idotros = $_GET["dato"];
$exwork = $_GET["work"];
//$exwork = "xx";

$sqlprod="SELECT
cos_prod_detalle.id_prod,
sum(cos_prod_detalle.total_factura) as totalimporte
FROM
cos_prod_detalle
WHERE
cos_prod_detalle.id_prod = '$codigox'
GROUP BY
cos_prod_detalle.id_prod";
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
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script language="javascript" type="text/javascript">
function valida(lista) {
	
work = document.lista.work.value;
if(work!=''){ /*si es diferente a vacio valida datos*/
    if (lista.admini.value.length < 1){
		alert("Ingrese Costo Administrativo");
		return false;
	}
	 if (lista.admini.value.length < 1){
		alert("Ingrese Calculo Administrativo");
		return false;
	}
	 if (lista.capital.value.length < 1){
		alert("Ingrese Costo Capital - Inventario");
		return false;
	}
	if (lista.manexpor.value.length < 1){
		alert("Ingrese Costo Manipuleo Local Exportador");
		return false;
	}
	if (lista.documen.value.length < 1){
		alert("Ingrese Costo Manipuleo Local Exportador");
		return false;
	}
	if (lista.transpo.value.length < 1){
		alert("Ingrese Costo Transporte");
		return false;
	}
	if (lista.almaceninter.value.length < 1){
		alert("Ingrese Costo Almacenamiento Intermedio");
		return false;
	}
	if (lista.manipreemba.value.length < 1){
		alert("Ingrese Costo Manipuleo Preembarque");
		return false;
	}
	if (lista.maniemba.value.length < 1){
		alert("Ingrese Costo Embarque");
		return false;
	}
	if (lista.segu.value.length < 1){
		alert("Ingrese Costo Seguro");
		return false;
	}
	if (lista.banca.value.length < 1){
		alert("Ingrese Costo Bancario");
		return false;
	}
    if (lista.agen.value.length < 1){
		alert("Ingrese Costo Agentes");
		return false;
	}
}

if (lista.flete.value.length < 1){
		alert("Ingrese Monto Flete");
		return false;
	}
	if(document.lista.check.checked==false && document.lista.check2.checked==false){
		alert("Seleccione una de las Opciones \n De Tabla o  Empresa de Seguros");
		return false;
	}
	
	if(document.lista.check.checked==true && document.lista.check2.checked==true){
		alert("Debe Seleccionar una Sola Opcion \n De Tabla o  Empresa de Seguros");
		return false;
	}
	
	if (document.lista.check.checked==true){
		document.lista.tipom.value="De Tabla"
	}
	if (document.lista.check2.checked==true){
		document.lista.tipom.value="Empresa de Seguros"
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

	cadmin = document.lista.admini.value;
	ccapital = document.lista.capital.value;
	ci = document.lista.costoindire .value = (cadmin * +1) + (ccapital * +1);
    
	c1 = document.lista.manexpor.value;
	c2 = document.lista.documen.value;
	c3 = document.lista.transpo.value;
	c4 = document.lista.almaceninter.value;
	c5 = document.lista.manipreemba.value;
	c6 = document.lista.maniemba.value;
	c7 = document.lista.segu.value;
	c8 = document.lista.banca.value;
	c9 = document.lista.agen.value;
	
	cd = document.lista.costodire.value = (c1 * +1) + (c2 * +1) + (c3 * +1) + (c4 * +1) + (c5 * +1)+ (c6 * +1) + (c7 * +1) + (c8 * +1) + (c9 * +1);
	
	pe = document.lista.costopaiexpo.value = (ci * +1) + (cd * +1);
	
	/*calculo de pais exportador mas importe total de la factura es igual al FOB*/
	fobsql = document.lista.fobsql.value;
	document.lista.fob.value = (fobsql * +1) + (pe * +1);
	
	/*fobsql*/
	
	ct = document.lista.costototal.value = (pe * +1);
	 
	 impte = document.lista.importe.value;
	 document.lista.fob.value = (impte * +1) + (pe * +1);
	 
	 /* -------------- */
	cif_importe =  document.lista.cifimpo.value = (impte * +1) + (pe * +1);
	 
	 fle = document.lista.flete.value
	 flete_2 = document.lista.flete2.value = fle;
	 document.lista.cfr2.value = (cif_importe * +1) + (flete_2 * +1);
	 
	 prine = document.lista.primaneta.value
	 prine_2 = document.lista.seguroprine.value = prine;
	 
	  deduci_1 = document.lista.deduci.value
	  deduce_2 = document.lista.deduce.value = deduci_1;
	 
	 
	
	} 
function NoSumar(){  
      clearInterval(interval);  
}  
</SCRIPT>

<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
			document.lista.tipom.value="De Tabla"
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script type="text/javascript">
    function showContent2() {
        element = document.getElementById("content2");
        check2 = document.getElementById("check2");
        if (check2.checked) {
            element.style.display='block';
			document.lista.tipom.value="Empresa de Seguros"
        }
        else {
            element.style.display='none';
        }
    }
</script>

</head>

<body>

<br /><br />
<input class="form-control btn-primary" type="button" value="C&aacute;lculo de Costo de Importaci&oacute;n. Paso : 7 de 12" />
<form name="lista" method="post" onSubmit="return valida(this);" action="updatecalculofob.php" >  


 <input class="form-control" name="work" type="hidden" value="<?php echo "$exwork"; ?>" />
  <input class="form-control" name="idprod" type="hidden" value="<?php echo "$codigox"; ?>" />
   <input class="form-control" name="idotros" type="hidden" value="<?php echo "$idotros"; ?>" />
 <input class="form-control" name="importe" type="hidden" value="<?php echo "$importe"; ?>" />
 

 <table class="table table-hover" style='font-size:80%'> 
   <td colspan="6" align="center"><h4><b>Calcular Valor FOB</b></h4> </td>
  </tr>
  <?php 
  if($exwork!=''){
  ?>
  
  <tr>
 <td bgcolor="#D5D5D5" colspan="6" align="center"><h4><b>Costo Total Carga - Pa&iacute;s Exportador (Origen)</b></h4> </td>
 <tr>
  <tr>
 <td bgcolor="#D5D5D5" colspan="6" align="center"><h5><b>Costo Directo</b></h5> </td>
 <tr>
 <td bgcolor="#E9E9E9" align="center">Manipuleo Local Exportador:</td>
 <td><input class="form-control" name="manexpor" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
  <td bgcolor="#E9E9E9" align="center">Documentacion:</td>
  <td><input class="form-control" name="documen" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
  <td bgcolor="#E9E9E9" align="center">Transporte (Punto Embarque):</td>
  <td><input class="form-control" name="transpo" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center">Almacenamiento Intermedio:</td>
  <td><input class="form-control" name="almaceninter" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
  <td bgcolor="#E9E9E9" align="center">Manipuleo Preembarque:</td>
  <td><input class="form-control" name="manipreemba" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
  <td bgcolor="#E9E9E9" align="center">Manipuleo Embarque:</td> 
  <td><input class="form-control" name="maniemba" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center">Seguro:</td>
  <td><input class="form-control" name="segu" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
  <td bgcolor="#E9E9E9" align="center">Bancario:</td>
  <td><input class="form-control" name="banca" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
  <td bgcolor="#E9E9E9" align="center">Agentes:</td> 
  <td><input class="form-control" name="agen" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center" colspan="2">Costos Directos:</td>
  <td colspan="3"><input class="form-control" name="costodire" type="text" placeholder="0.00" readonly="readonly" /></td>
 <!--  <td bgcolor="#E9E9E9" align="center">Pais Exportador:</td> 
  <td> -->
  <input class="form-control" name="costopaiexpo" type="hidden" placeholder="0.00" readonly="readonly" />
  <!-- </td> -->
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center" colspan="2">Total Costo:</td> 
  <td colspan="3"><input class="form-control" name="costototal" type="text" placeholder="0.00" readonly="readonly" /></td>
  </tr>
  
  <tr>
  <td bgcolor="#D5D5D5" align="center" colspan="6"><h5><b>Costos Indirectos</b></h5></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center">Administrativos</td>
  <td>
  <input class="form-control" name="admini" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
  <td bgcolor="#E9E9E9" align="center">Capital Inventario</td>
  <td><input class="form-control" name="capital" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
  <td bgcolor="#E9E9E9" align="center">Costos Indirectos</td>
  <td><input class="form-control" name="costoindire" type="text" placeholder="0.00" readonly="readonly" /></td>
  </tr>
 
   <?php
  }
  ?>
  <tr>
  <td bgcolor="#E9E9E9" colspan="3" align="right"><b>FOB:</b></td>
  <td bgcolor="#E9E9E9" colspan="3">
  <input class="form-control" name="fobsql" type="hidden" placeholder="0.00" value="<?php echo "$importe"; ?>" readonly="readonly" />
 <!--  <input class="form-control" name="fob" type="text" placeholder="0.00" value="<?php //echo "$importe"; ?>" readonly="readonly" /> -->
  <input class="form-control" name="fob" type="text" placeholder="0.00" readonly="readonly" />
  </td>
  </tr>
 </table>
 
 
 
  
  <table class="table table-hover" style='font-size:80%'> 
  <tr>
   <td align="center" colspan="2"><h4><b>Flete y Seguro Internacional</b></h4> </td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center">Flete:</td> 
  <td><input class="form-control" name="flete" type="text" onFocus="Sumar();" onBlur="NoSumar();" placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
  </tr>
  </table>

 <input  type="checkbox" name="check" id="check" value="De Tabla" onchange="javascript:showContent()" /> De Tabla: 
  <input  type="checkbox" name="check2" id="check2" value="Empresa de Seguros" onchange="javascript:showContent2()" /> Empresa de Seguros:
  
   <input class="form-control" name="tipom" type="hidden" />
  
 <div id="content" style="display: none;">
  <label>Seguro de Tabla <b>%</b>:</label>
 <input class="form-control" name="segtabla" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" value="0.555" />
 </div>
  <div id="content2" style="display: none;">
  <label>Prima Neta <b>%</b>:</label>
 <input class="form-control" name="primaneta" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" value="0.555" /><br>
 <label>Deducible <b>%</b>:</label>
 <input class="form-control" name="deduci" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" value="20.000" />
 <label>Derecho de Emision <b>%</b>:</label>
 <input class="form-control" name="derecho" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" value="3.000" />
 <label>Empresa Aseguradora <b>%</b>:</label>
 <input class="form-control" name="aseguradora" type="text" />
 </div>
  <br />
  
  <!-- <table class="table table-hover" style='font-size:80%'> 
  <tr>
   <td align="center" colspan="3"><h4><b>Calculo del CIF</b></h4> </td>
   <td align="center" colspan="4"><h4><b>Desembolso a la Empresa de Seguros</b></h4> </td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center">Concepto</td>
  <td bgcolor="#E9E9E9" align="center">Dato</td>
  <td bgcolor="#E9E9E9" align="center">Importe</td>
  <td bgcolor="#E9E9E9" align="center">Concepto</td>
  <td bgcolor="#E9E9E9" align="center">Dato</td>
  <td bgcolor="#E9E9E9" align="center">Importe</td>
  <td bgcolor="#E9E9E9" align="center">Destino</td>
  </tr>
  <tr>
  <td>FOB:</td>
  <td></td>
  <td align="center"><input class="btn btn-danger" name="cifimpo" type="text" placeholder="0.00" readonly="readonly" /></td>
  </tr>
  <tr>
  <td>FLETE:</td>
  <td></td>
  <td align="center"><input class="btn btn-danger" name="flete2" type="text" placeholder="0.00" readonly="readonly" /></td>
  </tr>
  <tr>
  <td>CFR:</td>
  <td></td>
  <td align="center"><input class="btn btn-danger" name="cfr2" type="text" placeholder="0.00" readonly="readonly" /></td>
  </tr>
  <tr>
  <td>SEGURO PRIMA NETA:</td>
  <td align="center"> <input class="btn btn-danger" name="seguroprine" type="text" placeholder="0.00" readonly="readonly" /></td>
  <td align="center"><input class="btn btn-danger" name="impoprine" type="text" placeholder="0.00" readonly="readonly" /></td>
  </tr>
  <tr>
  <td>DEDUCIBLE:</td>
  <td></td>
  <td align="center"><input class="btn btn-danger" name="deduce" type="text" placeholder="0.00" readonly="readonly" /></td>
  </tr>
  </table> -->
  
  
  <center>
  <input class="btn btn-success" name="guardar" type="submit" value=" Validar / Ingresar valor FOB"  />
  </center>
</form>
</body>
</html>
<?php
include("pie.php");
?>