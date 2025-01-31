<?
include ("conection/config.php");
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menuA.php");
echo"</header>";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> -->
<title>Azatrade - Mercado Internacional e Indicadores</title>

<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script language="JavaScript" src="js/jquery-1.9.0.min.js"></script>

<style type="text/css">

 #tabla { border : solid 0px #333 ; width : 300px ; }
 #tabla tbody tr { background : #CEECF5 ; }
 .fila-base { display : none ; } /* fila base oculta */
 .eliminar { cursor : pointer ; color : #000 ; }
 input [ type = "text" ] { width : 80px ; } /* ancho a los elementos input="text" */

 </style>

<script type = "text/javascript" >
 $(function(){
	 // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
	 $ ("#agregar").on ('click',function(){
		 $("#tabla tbody tr:eq(0)").clone().removeClass('fila-base').appendTo ("#tabla tbody");
	 }) ;

	 // Evento que selecciona la fila y la elimina
	 $(document).on("click",".eliminar",function(){
		 var parent=$(this).parents().get(0);
		 $(parent).remove();
	 });
 });
 </script>

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
<section  id = "main-content" >
<br>
<br>
<p>
</p>
<form name="regindca"  method="post" action="insertnewindicate.php" onsubmit="return valida(this);" /> 
<!--<form name="regindca"  method="post" action="#" onsubmit="return valida(this);" /> -->


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
<b>Registro de Indicador Nuevo</b>
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td bgcolor="#CEECF5">
Codigo Indicador:
</td>
<td bgcolor="#CEECF5">
<?
//generamos codigo aletorio
$numeros = "10";
 $limi = 0;
 $letras = "0123456789ABCDEFJHIJKLMNOPQRSTUVWXYZabcdefjhijklmnopqrstuvwxyz";
 $clave = "";
 while ($limi <= $numeros)
 {
 $clave .= substr($letras,rand(0,63),1);
 $limi++;
 }
?>
<input name="codind" id="codind" type="text" size="15" value="<? echo $clave; ?>" readonly="readonly" />
</td>
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
<!--<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Seleccione Pais:
</td>
<td>
<select name= "pais" id= "pais" > 
  <option value= "" selected></option>  -->
  <?php 
  /*$tablatipocoche = mysql_query ( "SELECT * FROM merca_pais ORDER BY pais ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($secA ==$registrotipocoche [ 'pais' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'pais' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'pais' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ;*/ 
  ?> 
 <!-- </select>
</td>
</tr> -->
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td bgcolor="#CEECF5">
Nombre Indicador:
</td>
<td bgcolor="#CEECF5">
<input name="nomind" type="text" size="35" value=""   />
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td bgcolor="#CEECF5">
Fuente Nota:
</td>
<td bgcolor="#CEECF5">
<textarea name="fuenten" rows="3" cols="55" onKeyDown="textCounter(this.form.fuenten,this.form.remLen,3000);"  onKeyUp="textCounter(this.form.fuenten,this.form.remLen,3000);"></textarea>
</td>
</tr>
<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td bgcolor="#CEECF5">
Fuente Organizacional:
</td>
<td bgcolor="#CEECF5">
<textarea name="fuenteo" rows="3" cols="55" onKeyDown="textCounter(this.form.fuenteo,this.form.remLen,2000);"  onKeyUp="textCounter(this.form.fuenteo,this.form.remLen,2000);"></textarea>
</td>
</tr>
<!--<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
A&ntilde;o:
</td>
<td>
<input name="a" id="a" type="text" size="10" value="" placeholder = "0000" />
</td>
</tr> -->
<!--<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td>
Valor:
</td>
<td> -->
<!-- <input name="desaran" type="text" size="35" value=""  /> -->
 <!--<input name="valor" type="text" size="10" value=""  placeholder = "0.00"/>
</td>
</tr> -->
<!--<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
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
</tr> -->
<!--<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
<td colspan="2" align="center">
<br>
<input class="btn" name="boton" type="submit" value="Registrar Indicador"  />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn" name="resetea" onclick="javascript:history.back()" type="button" value="Regresar Atras" />
<br>-->
<!-- <img src="img/siguie.jpg" title="Siguiente Paso" /> -->
<!--</td>
</tr> -->
</table>

<br>
<!--  tabla agrega fila -->
<table align="center" id="tabla" style='background-color:#CEECF5;
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
	 <!-- Cabecera de la tabla -->
	 <thead>
		 <tr>
			 <th bgcolor="#279CC9" align="center"> Pais </th>
			 <th bgcolor="#279CC9" align="center"> A&ntilde;o </th>
			 <th bgcolor="#279CC9" align="center"> Valor </th>
			 <th bgcolor="#279CC9" align="center">&nbsp;  </th>
		 </tr>
	 </thead>

	 <!-- Cuerpo de la tabla con los campos -->
	 <tbody>

		 <!-- fila base para clonar y agregar al final -->
		 <!--<tr class="fila-base">
			 <td>
             <select name="pais[]" id="pais"> 
  <option value= "" selected></option>   -->
  <?php 
  /*$tablatipocoche = mysql_query ( "SELECT * FROM merca_pais ORDER BY pais ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($secA ==$registrotipocoche [ 'pais' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;" .$registrotipocoche [ 'pais' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'pais' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; */
  ?> 
<!--</select>
             </td >
			 <td>
             <select name="a[]" id="a">
                     <option value="" >  </option>
					 <option value="2010" > 2010 </option>
					 <option value="2011" > 2011 </option>
					 <option value="2012" > 2012 </option>
                     <option value="2013" > 2013 </option>
                     <option value="2014" > 2014 </option>
				 </select >
                 
             </td >
			 <td>
				 <input type="text" name="val[]" />
			 </td >
			 <td class="eliminar"> Eliminar </td>
		 </tr>  -->
		 <!-- fin de c�digo: fila base -->

		 <!-- Fila de ejemplo -->
		 <tr>
			 <td>
             <select name= "Pais[]" id= "pais" > 
  <option value= "" selected></option>  
  <?php 
 $tablatipocoche = mysql_query ( "SELECT * FROM merca_pais ORDER BY pais ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($secA ==$registrotipocoche [ 'pais' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'cod_pais' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'pais' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'cod_pais' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'pais' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
 </select>
       </td>
			 <td> <select name="year[]" id="a">
					 <option value="" >  </option>
                     <option value="2010" > 2010 </option>
					 <option value="2011" > 2011 </option>
					 <option value="2012" > 2012 </option>
                     <option value="2013" > 2013 </option>
                     <option value="2014" > 2014 </option>
				 </select ></td>
			 <td>
				 <input type="text" name="Valor[]" value="" />
          
			 </td >
			 <td class = "eliminar"> Eliminar </td >
		 </tr >
		 <!-- fin de c�digo: fila de ejemplo -->
	 </tbody >
     
 </table >
 <table border="0" align="center">
 <tr>
         <td><input class="btn btn-success" type="button" id="agregar" value="Agregar fila" /> </td>
         </tr>
         <tr>
<td align="center">
<br>
<input class="btn btn-primary" name="boton" type="submit" value="Registrar Indicador"  />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-primary" name="resetea" onclick="javascript:history.back()" type="button" value="Regresar Atras" />
<br>
</td>
</tr> 
 </table>
 
</form>
</section>
</body>
</html>

<?
include("pie.php");
?>