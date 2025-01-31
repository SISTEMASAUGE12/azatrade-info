<?
include ("conection/config.php");
include ("menuA.php");

$sqlvista=mysql_query("SELECT
d.a2010,
d.a2011,
d.a2012,
d.a2013,
d.a2014,
d.a2015,
d.a2016,
p.pais,
d.cod_indicador,
d.cod_pais,
d.id AS iddata,
i.nom_indicador,
i.fuente_nota,
i.fuente_org,
i.id AS idindi,
merca_tema.tema,
merca_tema.id AS idtem
FROM
merca_datamercado AS d
INNER JOIN merca_pais AS p ON d.cod_pais = p.cod_pais
INNER JOIN merca_indicadores AS i ON d.cod_indicador = i.cod_indicador
INNER JOIN merca_tema ON i.idtema = merca_tema.id
WHERE
i.cod_indicador = '$pubs'");
			if(mysql_num_rows($sqlvista)>0){
				while($mostrarme = mysql_fetch_array($sqlvista)){
					$codindica=$mostrarme["cod_indicador"];
					$nomindica=$mostrarme["nom_indicador"];
					$fnota=$mostrarme["fuente_nota"];
					$forg=$mostrarme["fuente_org"];
					$secA=$mostrarme["tema"];
					//$a1=$mostrarme["a2010"];
					//$a2=$mostrarme["a2011"];
					//$a3=$mostrarme["a2012"];
					//$a4=$mostrarme["a2013"];
					//$a5=$mostrarme["a2014"];
					}
					}

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
	/*if (regindca.pais.value.length < 1){
	
		alert("Seleccione Pais");
		return false;
	}*/
	if (regindca.nomind.value.length < 1){
	
		alert("Ingrese Nombre del Indicador");
		return false;
	}
	/*if (regindca.fuenten.value.length < 1){
	
		alert("Ingrese Fuente Nota");
		return false;
	}*/
	/*if (regindca.fuenteo.value.length < 1){
	
		alert("Ingrese Fuente Organizacional");
		return false;
	}*/
	
	/*if (regindca.a.value.length < 1){
	
		alert("Ingrese A?o");
		return false;
		}else{
			
			 var fecha = new Date();
             var ano = fecha.getFullYear();
             //alert('El a?o actual es: '+ano);
			
		if (document.regindca.a.value < 2010){
			alert("A?o Ingresado Esta Devaluado; Ingrese A?o Actual");
		return false;
			}else{
				if (document.regindca.a.value > 2016){
			alert("A?o Ingresado Esta Adelantado; Ingrese A?o Actual");
		return false;
			}
		}
	}*/
	
	/*if (regindca.valor.value.length < 1){
	
		alert("Ingrese Valor");
		return false;
	}*/
	/*if (regindca.valorp.value.length < 1){
	
		alert("Seleccione Valor Mayor Puntaje");
		return false;
	}*/
	
	var validacion = 0; 

for(i=1; i<regindca.elements.length; i++){ 
if (regindca.elements[i].value.length == 0){ 
alert("Debe Ingresar Datos en el Campo " + regindca.elements[i].name); 
regindca.elements[i].focus(); 
validacion++; 
return false;
} 
} 
	
	return true;
}
</script>
 
</head>

<body>
<br />
<p>
</p>
<form name="regindca"  method="post" action="updatenewindicate.php" onsubmit="return valida(this);" /> 



<table align="center" border="0" style='background-color:#CEECF5;
font-size:12px;
   color:#039;
   width: 550px;
   padding: 10px;
   border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;'>
<tr>
<td bgcolor="#279CC9" colspan="2" align="center">
<b>Modificar Indicador Nuevo</b>
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td bgcolor="#CEECF5">
Codigo Indicador:
</td>
<td bgcolor="#CEECF5">
<input type="text" name="codind" size="15" value="<? echo $codindica; ?>" disabled="disabled" />
<input type="hidden" name="codindx" size="15" value="<? echo $codindica; ?>" />
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Seleccione Tema:
</td>
<td> 
<select name="tema" id="tema" > 
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
<td bgcolor="#CEECF5">
Nombre Indicador:
</td>
<td bgcolor="#CEECF5">
<input name="nomind" type="text" size="35" value="<? echo $nomindica; ?>"   />
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td bgcolor="#CEECF5">
Fuente Nota:
</td>
<td bgcolor="#CEECF5">
<textarea name="fuenten" rows="3" cols="55" onKeyDown="textCounter(this.form.fuenten,this.form.remLen,3000);"  onKeyUp="textCounter(this.form.fuenten,this.form.remLen,3000);"><? echo $fnota; ?></textarea>
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td bgcolor="#CEECF5">
Fuente Organizacional:
</td>
<td bgcolor="#CEECF5">
<textarea name="fuenteo" rows="3" cols="55" onKeyDown="textCounter(this.form.fuenteo,this.form.remLen,2000);"  onKeyUp="textCounter(this.form.fuenteo,this.form.remLen,2000);"><? echo $forg; ?></textarea>
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<?
$sqlpa="SELECT
d.a2010,
d.a2011,
d.a2012,
d.a2013,
d.a2014,
d.a2015,
d.a2016,
p.pais,
d.cod_indicador,
d.cod_pais,
d.id AS iddata
FROM
merca_datamercado AS d
INNER JOIN merca_pais AS p ON d.cod_pais = p.cod_pais
WHERE
d.cod_indicador = '$codindica' ";
$rspai = mysql_query($sqlpa);
if (mysql_num_rows($rspai) > 0){
	//echo "<tr>";
	echo"<table align='center' style='background-color:#CEECF5;
font-size:12px;
   color:#039;
   width: 550px;
   padding: 10px;
   border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' >";
	echo "<tr>";
	echo "<td>Pais</td>";
	echo "<td>A&ntilde;o</td>";
	echo "<td>Valor</td>";
	echo "</tr>";
	while($rowpa = mysql_fetch_array($rspai)){
        $iddata=$rowpa["iddata"];
		$ppaa=$rowpa["pais"];
		$a1=$rowpa["a2010"];
		$a2=$rowpa["a2011"];
		$a3=$rowpa["a2012"];
		$a4=$rowpa["a2013"];
		$a5=$rowpa["a2014"];
		
		echo "<tr>";
		echo "<td><select name= 'Pais[]' id= 'pais' > 
  <option value= '' selected></option>  ";
		$tablatipocoche = mysql_query ( "SELECT * FROM merca_pais ORDER BY pais ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($ppaa ==$registrotipocoche [ 'pais' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'cod_pais' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'pais' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'cod_pais' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'pais' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
		echo"</select>
		<input type='hidden' name='iddata[]' value='$iddata'>
		</td>";
		
		if($a1!='0.000'){
		echo "<td>";
		echo"<input type='text' name='year[]' value='2010' readonly='readonly'>";
		echo"</td>";
		echo "<td><input type='text' name='valor[]' value='$a1'></td>";
		}
		
		if($a2!='0.000'){
		echo "<td>";
		echo"<input type='text' name='year[]' value='2011' readonly='readonly'>";
		echo"</td>";
		echo "<td><input type='text' name='valor[]' value='$a2'></td>";
		} 
	
		
		if($a3!='0.000'){
		echo "<td>";
		echo"<input type='text' name='year[]' value='2012' readonly='readonly'>";
		echo"</td>";
		echo "<td><input type='text' name='valor[]' value='$a3'></td>";
		} 
		
		if($a4!='0.000'){
		echo "<td>";
		echo"<input type='text' name='year[]' value='2013' readonly='readonly'>";
		echo"</td>";
		echo "<td><input type='text' name='valor[]' value='$a4'></td>";
		} 
		
		if($a5!='0.000'){
		echo "<td>";
		echo"<input type='text' name='year[]' value='2014' readonly='readonly' >";
		echo"</td>";
		echo "<td><input type='text' name='valor[]' value='$a5'></td>";
		} 
		
		
		echo "</tr>";
	
		//echo "<table>";
		}
		//echo "</tr>";
		echo "</table>";
		//echo "</table>";
		}
?>
</tr>
</table>

 <table border="0" align="center">
 <tr>
      <!--   <td><input class="btn btn-success" type="button" id="agregar" value="Agregar fila" /> </td> -->
         </tr>
         <tr>
<td align="center">
<br>
<input class="btn btn-primary" name="boton" type="submit" value="Modificar Indicador"  />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-primary" name="resetea" onclick="javascript:history.back()" type="button" value="Regresar Atras" />
<br>
</td>
</tr> 
 </table>
 
</form>

</body>
</html>