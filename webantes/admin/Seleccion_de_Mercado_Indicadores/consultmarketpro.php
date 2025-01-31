<?
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menuA.php");
echo"</header>";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 
<title>Azatrade - Mercado Internacional e Indicadores</title>
<link rel="stylesheet" href="css/stylex.css" />
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
 

<!--<link rel="stylesheet" href="docsupport/style.css">  -->
  <link rel="stylesheet" href="docsupport/prism.css">
 <link rel="stylesheet" href="docsupport/chosen.css">
  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
  </style>

<script language="JavaScript">
<!-- Hide JavaScript from Java-cambia de color las filas de la tabla
function NavRollOver(oTd){if(!oTd.contains(event.fromElement)){oTd.bgColor="66CCFF";}}
function NavRollOut(oTd){if(!oTd.contains(event.toElement)){oTd.bgColor="#CEECF5";}}
//-->
</script>


<SCRIPT LANGUAGE="JavaScript">
 <!--  limita los caracteres en un textarea
 function textCounter(field, countfield, maxlimit) {
 if (field.value.length > maxlimit)
 field.value = field.value.substring(0, maxlimit);
 else 
 countfield.value = maxlimit - field.value.length;
 }
 // -->
 </script>
 
 <script language="javascript" type="text/javascript">
function valida(regprod) {
	if (regprod.pai.value.length < 1){
	
		alert("Selecione Pais !");
		return false;
	}
	/*if (regprod.tee.value.length < 1){
		alert("Selecione Tema !");
		return false;
	} */
	if (regprod.indx.value.length < 1){
	
		alert("Seleccione Indicador");
		return false;
	}
    if (regprod.nomprod.value.length < 1){
	
		alert("Ingrese Nombre del Producto");
		return false;
	}
	/*if (regprod.Desprod.value.length < 1){
	
		alert("Ingrese Descripcion del Producto");
		return false;
	}*/
	/*if (regprod.presprod.value.length < 1){
	
		alert("Ingrese Presentacion del Producto");
		return false;
	}*/
	/*if (regprod.nomtec.value.length < 1){
	
		alert("Ingrese Nombre Cientifico o Tecnico del Producto");
		return false;
	}*/
	/*if (regprod.unidad.value.length < 1){
	
		alert("Ingrese Unidad Comercial del Producto");
		return false;
	}*/
	if (regprod.sector.value.length < 1){
	
		alert("Seleccione Sector del Producto");
		return false;
	}
	return true;
}
</script>

<script type="text/javascript"> 
function copia(){ 
document.getElementById('pai').value = document.getElementById('pa').value; 

} 
</script> 

<!--<script type="text/javascript"> 
function copiatema(){ 
document.getElementById('tee').value = document.getElementById('teem').value; 
} 
</script> --> 

<script type="text/javascript"> 
function copiaindi(){ 
document.getElementById('indx').value = document.getElementById('indd').value; 
} 
</script> 


<script languaje="javascript">
 var num_opciones = 1;
 var numcheckbox = 0;
 function habilitaDeshabilita(esto)

 {
     if (esto.checked){
                 if (numcheckbox >= num_opciones) {
                         esto.checked = false;
                         alert ("Solo Puede Seleccionar 10 Paises");
                 } else {
                         numcheckbox++;
                 }
         } else {
                 numcheckbox--;
         }
 }
 </script>
 
</head>

<body>
<section  id = "main-content" > 
<br>
<br>
<p>
</p>
<form name="regprod"  method="post" action="insertdataindi.php"  onsubmit="return valida(this);" />
<!--<form name="regprod"  method="post" action='' /> -->
<table align="center" border="1" bordercolor="#00CCFF" style='background-color:#CEECF5;
font-size:12px;
   color:#039;
   width: 450px;
   padding: 10px;
   border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>
   <!--<tr>
   <td colspan="2">
   <input type="button" class="btn btn-primary" value="&nbsp;&nbsp;&nbsp; Paso 1 de 2&nbsp;&nbsp;&nbsp;"/>
   </td>
   </tr> -->
<tr>
<td bgcolor="#279CC9" align="center">
<!--<b><font color="#FFFFFF"><a href="reg_indicatorNew.php" class="navbar-link"> Registrar Nuevo Indicador</a></font></b> -->
<a href="reg_indicatorNew.php" class="navbar-link">
<input type="button" class="btn btn-success" value="Registrar Nuevo Indicador"/>
</a>
</td>
<td bgcolor="#279CC9" align="center">
<b><font color="#FFFFFF">Ingresar Datos</font></b>
</td>
</tr>




<!--<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Tema:
</td>
<td>
<div> -->
<?
/*$sqlt="SELECT
id,
tema,
descripcion
FROM
merca_tema order by tema";



$rsnt = mysql_query($sqlt);
if (mysql_num_rows($rsnt) > 0){
	
	 echo "<select name='tem[]' id='teem' data-placeholder='Seleccione Tema(s)...' class='chosen-select' multiple style='width:550px;' tabindex='4' onchange='copiatema();'>";
	while($rowt = mysql_fetch_array($rsnt)){
		
		$idte = $rowt["id"];
		$temm = $rowt["tema"];
		
		//echo "<input type='checkbox' name='casilla[]' value='$idpa' onchange='habilitaDeshabilita(this)' /> $pais";
		echo"<option value='$idte'>$temm</option>";
		
		
		}
		
		echo"</select>";
		
		}
		*/
?>
<!--<input type="hidden" name="tee" id="tee" /> 
</div>



</td>
</tr>-->



<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Nombre Producto:
</td>
<td>
<input name="nomprod" id="nomprod" type="text" size="35" value="" placeholder = "Nombre del Producto"  />
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Descripci&oacute;n del Producto:
</td>
<td>
<!-- <input name="Desprod" type="text" size="35" value=""  /> -->
 <textarea name="Desprod" rows="3" cols="55" onKeyDown="textCounter(this.form.desentre,this.form.remLen,500);"  onKeyUp="textCounter(this.form.desentre,this.form.remLen,500);"></textarea>
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Presentaci&oacute;n del Producto:
</td>
<td>
<input name="presprod" type="text" size="35" value=""   />
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Nombre Com&uacute;n del Producto:
</td>
<td>
<input name="nomcomu" type="text" size="35" value=""  />
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Nombre Cientifico o Tecnico:
</td>
<td>
<input name="nomtec" type="text" size="35" value=""  />
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Sub-Partida(s) Arancelaria(s):
</td>
<td>
<input name="aran" type="text" size="35" value=""  />
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Descripci&oacute;n Arancelario:
</td>
<td>
<!-- <input name="desaran" type="text" size="35" value=""  /> -->
 <textarea name="desaran" rows="3" cols="55" onKeyDown="textCounter(this.form.desentre,this.form.remLen,500);"  onKeyUp="textCounter(this.form.desentre,this.form.remLen,500);"></textarea>
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Unidad Comercial:
</td>
<td>
<input name="unidad" type="text" size="35" value=""  />
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Sector:
</td>
<td>
<select name= "sector" id= "sector" > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM sector where eliminado='0' ORDER BY sector ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($secA ==$registrotipocoche [ 'sector' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'sector' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'sector' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
</td>
</tr>

<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Pais:
</td>
<td>
 <!--<div id="container">
      <div id="content">
      <div class="side-by-side clearfix"> -->
<div>
<?
$sqlp="SELECT
merca_pais.id,
merca_pais.cod_pais,
merca_pais.pais,
merca_pais.region,
merca_pais.income_group
FROM
merca_pais order by pais";



$rsnp = mysql_query($sqlp);
if (mysql_num_rows($rsnp) > 0){
	
	 echo "<select name='pa[]' id='pa' data-placeholder='Seleccione Pais(es)...' class='chosen-select' multiple style='width:550px;' tabindex='4' onchange='copia();'>";
	while($rowp = mysql_fetch_array($rsnp)){
		
		$idpa = $rowp["cod_pais"];
		$pais = $rowp["pais"];
		
		//echo "<input type='checkbox' name='casilla[]' value='$idpa' onchange='habilitaDeshabilita(this)' /> $pais";
		echo"<option value='$idpa'>$pais</option>";
		
		
		}
		
		echo"</select>";
		
		}
		
?>
<input type="hidden" name="pai" id="pai" />
<em><font color="#FF0000">Solo Debe Seleccionar 5 Paises Maximo</font></em>
</div>
<!--</div></div></div> -->

</td>
</tr>

<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Indicador:
</td>
<td>
 <!--<div id="container">
      <div id="content">
      <div class="side-by-side clearfix"> -->
<div>
<?
$sqli="SELECT
merca_indicadores.cod_indicador,
merca_indicadores.nom_indicador,
merca_tema.tema,
CONCAT(merca_indicadores.nom_indicador,' | ',merca_tema.tema) as indtema,
merca_indicadores.id
FROM
merca_indicadores
INNER JOIN merca_tema ON merca_indicadores.idtema = merca_tema.id
order by nom_indicador";



$rsni = mysql_query($sqli);
if (mysql_num_rows($rsni) > 0){
	
	 echo "<select name='indica[]' id='indd' data-placeholder='Seleccione Indicador(es)...' class='chosen-select' multiple style='width:550px;' tabindex='4' onchange='copiaindi();'>";
	while($rowi = mysql_fetch_array($rsni)){
		
		$idindi = $rowi["id"];
		$codindi = $rowi["cod_indicador"];
		$indicador = $rowi["nom_indicador"];
		$tem2 = $rowi["indtema"];
		//$nomcomp = $indicador .' / '.$tem2;
		
		//echo "<input type='checkbox' name='casilla[]' value='$idpa' onchange='habilitaDeshabilita(this)' /> $pais";
		echo"<option value='$idindi'>$tem2</option>";
		
		
		}
		
		echo"</select>";
		
		}
		
?>
<input type="hidden" name="indx" id="indx" />
<em><font color="#FF0000">Solo Debe Seleccionar 10 Indicadores Maximo</font></em>
</div>
<!--</div></div></div> -->

</td>
</tr>

<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td colspan="2" align="center">
<br>
<input class="btn" name="boton" type="submit" value="1# Paso / Registrar - Procesar Informe"  />
<br>
<!-- <img src="img/siguie.jpg" title="Siguiente Paso" /> -->
</td>
</tr>

</table>





 <script src="js/jquery.min2.js" type="text/javascript"></script>
  
  <script src="js/chosen.jquery.js" type="text/javascript"></script>
  <script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>


  
</form>
</section>

</body>
</html>

<?
include("pie.php");
?>