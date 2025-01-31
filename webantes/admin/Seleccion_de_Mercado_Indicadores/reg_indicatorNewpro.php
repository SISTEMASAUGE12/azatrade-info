<?
include ("conection/config.php");
include ("menuA.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Azatrade - Mercado Internacional e Indicadores</title>

<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

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
function valida(regindca) {
    if (regindca.codind.value.length < 1){
	
		alert("Ingrese Codigo del Indicador");
		return false;
	}
	if (regindca.tema.value.length < 1){
	
		alert("Seleccione Tema");
		return false;
	}
	if (regindca.pais.value.length < 1){
	
		alert("Seleccione Pais");
		return false;
	}
	if (regindca.nomind.value.length < 1){
	
		alert("Ingrese Nombre del Indicador");
		return false;
	}
	if (regindca.fuenten.value.length < 1){
	
		alert("Ingrese Fuente Nota");
		return false;
	}
	if (regindca.fuenteo.value.length < 1){
	
		alert("Ingrese Fuente Organizacional");
		return false;
	}
	
	if (regindca.a.value.length < 1){
	
		alert("Ingrese Año");
		return false;
	}else{
		
		 var fecha = new Date();
         var ano = fecha.getFullYear();
             //alert('El año actual es: '+ano);
		
		if (document.regindca.a.value < ano){
			alert("Año Ingresado Esta Devaluado; Ingrese Año Actual");
		return false;
			}else{
				if (document.regindca.a.value > ano){
			alert("Año Ingresado Esta Adelantado; Ingrese Año Actual");
		return false;
			}
		}
		}
		
	if (regindca.valor.value.length < 1){
	
		alert("Ingrese Valor");
		return false;
	}
	if (regindca.valorp.value.length < 1){
	
		alert("Seleccione Valor Mayor Puntaje");
		return false;
	}
	return true;
}
</script>
 
</head>

<body>
<br />
<p>
</p>
<form name="regindca"  method="post" action="insertnewindicatepro.php" onsubmit="return valida(this);" />
<table align="center" border="1" bordercolor="#00CCFF" style='background-color:#CEECF5;
font-size:12px;
   color:#039;
   width: 550px;
   padding: 10px;
   border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>
<tr>
<td bgcolor="#279CC9" colspan="2" align="center">
<b>Registro de Indicador del Producto</b>
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Codigo Indicador:
</td>
<td>
<input name="codind" id="codind" type="text" size="15" value="" placeholder = "Codigo"  />
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Seleccione Tema:
</td>
<td>
<select name= "tema" id= "tema" > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM merca_tema ORDER BY tema ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($secA ==$registrotipocoche [ 'tema' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'tema' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'tema' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select>
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Seleccione Pais:
</td>
<td>
<select name= "pais" id= "pais" > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM merca_pais ORDER BY pais ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($secA ==$registrotipocoche [ 'pais' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'pais' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'pais' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select>
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Nombre Indicador:
</td>
<td>
<input name="nomind" type="text" size="35" value=""   />
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Fuente Nota:
</td>
<td>
<textarea name="fuenten" rows="3" cols="55" onKeyDown="textCounter(this.form.fuenten,this.form.remLen,3);"  onKeyUp="textCounter(this.form.fuenten,this.form.remLen,3);"></textarea>
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Fuente Organizacional:
</td>
<td>
<textarea name="fuenteo" rows="3" cols="55" onKeyDown="textCounter(this.form.fuenteo,this.form.remLen,2000);"  onKeyUp="textCounter(this.form.fuenteo,this.form.remLen,2000);"></textarea>
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
A&ntilde;o:
</td>
<td>
<input name="a" type="text" size="10" value=""  placeholder = "0000"/>
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Valor:
</td>
<td>
<!-- <input name="desaran" type="text" size="35" value=""  /> -->
 <input name="valor" type="text" size="10" value=""  placeholder = "0.00"/>
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Valor Mayor Puntaje:
</td>
<td>
<select name="valorp">
<option value="">..:: Elije ::..</option>
<option value="si">Si</option>
<option value="no">No</option>
</select>
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td colspan="2" align="center">
<br>
<input class="btn" name="boton" type="submit" value="Registrar Indicador"  />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn" name="resetea" onclick="javascript:history.back()" type="button" value="Regresar Atras" />
<br>
<!-- <img src="img/siguie.jpg" title="Siguiente Paso" /> -->
</td>
</tr>
</table>
</form>
</body>
</html>