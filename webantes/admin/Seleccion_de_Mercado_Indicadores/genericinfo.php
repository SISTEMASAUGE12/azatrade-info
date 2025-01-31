<?
include ("conection/config.php");
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include("menuB.php");
echo"</header>";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 
<title>Azatrade - Mercado Internacional e Indicadores</title>

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
	
	if (regprod.indx.value.length < 1){
	
		alert("Seleccione Indicador");
		return false;
	}
	if (regprod.pai.value.length < 1){
	
		alert("Selecione Pais !");
		return false;
	}
    if (regprod.yea.value.length < 1){
	
		alert("Seleccione A?o");
		return false;
	}
	return true;
}
</script>



<script type="text/javascript"> 
function copiaindi(){ 
document.getElementById('indx').value = document.getElementById('indd').value; 
} 
</script> 

<script type="text/javascript"> 
function copia(){ 
document.getElementById('pai').value = document.getElementById('pa').value; 

} 
</script> 

<script type="text/javascript"> 
function copiayear(){ 
document.getElementById('yea').value = document.getElementById('year').value; 
} 
</script> 
 
</head>

<body>
<section  id = "main-content" >
<br><br>
<p>
</p>
<form name="regprod"  method="post" action="insertdatainfo.php"  onsubmit="return valida(this);" />
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
<td colspan="2" bgcolor="#279CC9" align="center">
<b><font color="#FFFFFF">Seleccione Datos</font></b>
</td>
</tr>




<!--<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Tema:
</td>
<td>
<div>  -->
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
		
		}*/
		
?>
<!--<input type="hidden" name="tee" id="tee" /> 
</div>
</td>
</tr> -->
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Indicador:
</td>
<td>
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
		
		//echo"<option value='$idindi'>$tem2</option>";
		echo"<option value='$codindi'>$tem2</option>";
		
		
		}
		
		echo"</select>";
		
		}
		
?>
<input type="hidden" name="indx" id="indx" />
<em>Solo Debe Seleccionar 10 Indicadores Maximo</em>
</div>

</td>
</tr>

<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Pais:
</td>
<td>
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
<em>Solo Debe Seleccionar 10 Paises Maximo</em>
</div>
<!--</div></div></div> -->

</td>
</tr>

<tr>
<td>
A&ntilde;o
</td>
<td>
<div>
<select name='year[]' id='year' data-placeholder='Seleccione A&ntilde;o(s)...' class='chosen-select' multiple style='width:550px;' tabindex='4' onchange='copiayear();'>
<option value=""></option>
<option value="2014">2014</option>
<option value="2013">2013</option>
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
</select>
<input type="hidden" name="yea" id="yea" />
<em>Solo Debe Seleccionar 10 A&ntilde;os Maximo</em>
</div>
<!-- <input type="checkbox" name="year" value="2014" />2014
<input type="checkbox" name="year" value="2013" />2013
<input type="checkbox" name="year" value="2012" />2012
<input type="checkbox" name="year" value="2011" />2011
<input type="checkbox" name="year" value="2010" />2010
<input type="checkbox" name="year" value="2009" />2009
<input type="checkbox" name="year" value="2008" />2008
<input type="checkbox" name="year" value="2007" />2007
<input type="checkbox" name="year" value="2006" />2006
<input type="checkbox" name="year" value="2005" />2005 <br>
<input type="checkbox" name="year" value="2004" />2004
<input type="checkbox" name="year" value="2003" />2003
<input type="checkbox" name="year" value="2002" />2002
<input type="checkbox" name="year" value="2001" />2001
<input type="checkbox" name="year" value="2000" />2000
<input type="checkbox" name="year" value="1999" />1999
<input type="checkbox" name="year" value="1998" />1998
<input type="checkbox" name="year" value="1997" />1997
<input type="checkbox" name="year" value="1996" />1996
<input type="checkbox" name="year" value="1995" />1995 <br>
<input type="checkbox" name="year" value="1994" />1994
<input type="checkbox" name="year" value="1993" />1993
<input type="checkbox" name="year" value="1992" />1992
<input type="checkbox" name="year" value="1991" />1991
<input type="checkbox" name="year" value="1990" />1990
<input type="checkbox" name="year" value="1989" />1989
<input type="checkbox" name="year" value="1988" />1988
<input type="checkbox" name="year" value="1987" />1987
<input type="checkbox" name="year" value="1986" />1986
<input type="checkbox" name="year" value="1985" />1985 <br>
<input type="checkbox" name="year" value="1984" />1984
<input type="checkbox" name="year" value="1983" />1983
<input type="checkbox" name="year" value="1982" />1982
<input type="checkbox" name="year" value="1981" />1981
<input type="checkbox" name="year" value="1980" />1980
<input type="checkbox" name="year" value="1979" />1979
<input type="checkbox" name="year" value="1978" />1978
<input type="checkbox" name="year" value="1977" />1977
<input type="checkbox" name="year" value="1976" />1976
<input type="checkbox" name="year" value="1975" />1975 <br>
<input type="checkbox" name="year" value="1974" />1974 
<input type="checkbox" name="year" value="1973" />1973 
<input type="checkbox" name="year" value="1972" />1972 
<input type="checkbox" name="year" value="1971" />1971 
<input type="checkbox" name="year" value="1970" />1970 
<input type="checkbox" name="year" value="1969" />1969 
<input type="checkbox" name="year" value="1968" />1968 
<input type="checkbox" name="year" value="1967" />1967 
<input type="checkbox" name="year" value="1966" />1966 
<input type="checkbox" name="year" value="1965" />1965 <br>
<input type="checkbox" name="year" value="1964" />1964
<input type="checkbox" name="year" value="1963" />1963
<input type="checkbox" name="year" value="1962" />1962
<input type="checkbox" name="year" value="1961" />1961
<input type="checkbox" name="year" value="1960" />1960 -->
</td>
</tr>

<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td colspan="2" align="center">
<br>
<input class="btn" name="boton" type="submit" value="Generar Informe"  />
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