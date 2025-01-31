<?
include ("conection/config.php");
include ("menu.php");

$aa = date("Y");

$codd= $_GET["cod"];

/*consulta */
$sqlpg="SELECT
pag.id,
pag.cod_tipo_bus,
tb.busqueda,
pag.cod_pais,
pa.pais,
pag.cod_pais_merca,
mp.pais AS mpais,
pag.cod_sector,
se.sector,
pag.cod_producto,
prod.producto,
pag.cod_tema,
te.tema,
pag.cod_idioma,
pi.idioma,
pag.cod_tipo_dato,
td.tipo_dato,
pag.cod_alcance,
palc.alcance,
pag.cod_tipo_acceso,
pta.tipo_acceso,
pag.cod_variable,
v.variable,
pag.cod_entre,
pen.entregable,
pag.cod_inst,
pins.institucion,
pag.nom_inst,
pag.nom_pag,
pag.descri_pag,
pag.dire_pag,
pag.fecha_actu,
pag.carga_ar,
pag.tipo_ar,
pag.descri_entre,
ROUND(pag.costo,2) as costo,
CONCAT(tb.busqueda,pa.pais,pa.pais,se.sector,prod.producto,te.tema,pi.idioma,td.tipo_dato,palc.alcance,pta.tipo_acceso,v.variable,pen.entregable,pins.institucion) as leyenda
FROM
pag_datapagina AS pag
INNER JOIN pag_tipo_bus AS tb ON pag.cod_tipo_bus = tb.id
INNER JOIN merca_pais AS pa ON pag.cod_pais = pa.id
INNER JOIN merca_pais AS mp ON pag.cod_pais_merca = mp.id
INNER JOIN sector AS se ON pag.cod_sector = se.id
INNER JOIN producto AS prod ON pag.cod_producto = prod.id
INNER JOIN pag_tema AS te ON pag.cod_tema = te.id
INNER JOIN pag_idioma AS pi ON pag.cod_idioma = pi.id
INNER JOIN pag_tipo_dato AS td ON pag.cod_tipo_dato = td.id
INNER JOIN pag_alcance AS palc ON pag.cod_alcance = palc.id
INNER JOIN pag_tipo_acceso AS pta ON pag.cod_tipo_acceso = pta.id
INNER JOIN variable AS v ON pag.cod_variable = v.id
INNER JOIN pag_entregable AS pen ON pag.cod_entre = pen.id
INNER JOIN pag_institucion AS pins ON pag.cod_inst = pins.id
WHERE
pag.id='$codd'";

$rsnpg = mysql_query($sqlpg);

if (mysql_num_rows($rsnpg) > 0){
	while($rowpg = mysql_fetch_array($rsnpg)){
		
		$codx=$rowpg["id"];
		$busA=$rowpg["busqueda"];
		$paisA=$rowpg["pais"];
		$mercA=$rowpg["mpais"];
		$secA=$rowpg["sector"];
		$prodA=$rowpg["producto"];
		$temA=$rowpg["tema"];
		$instA=$rowpg["institucion"];
		$nominsA=$rowpg["nom_inst"];
		$nompagA=$rowpg["nom_pag"];
		$descriA=$rowpg["descri_pag"];
		$direA=$rowpg["dire_pag"];
		$idioA=$rowpg["idioma"];
		$tdaA=$rowpg["tipo_dato"];
		$alcA=$rowpg["alcance"];
		$tacceA=$rowpg["tipo_acceso"];
		$variA=$rowpg["variable"];
		$fultA=$rowpg["fecha_actu"];
		$cargA=$rowpg["carga_ar"];
		$tarA=$rowpg["tipo_ar"];
		$entA=$rowpg["entregable"];
		$descrientA=$rowpg["descri_entre"];
		$costA=$rowpg["costo"];
		
		//echo "$busA";
		}
		
		}
		/*fin consulta*/



function generasector()
{
	if ($secA!=""){
	echo "<select name= 'sector' id= 'sector' > ";
  echo "<option value= '' selected></option>"; 

  $tablatipocoche = mysql_query ( "SELECT * FROM sector ORDER BY sector ASC" ) ; 
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

 echo " </select>";
   
	} else {
	$consulta=mysql_query("SELECT id, sector FROM sector where eliminado='0'");

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='sector' id='sector' onChange='cargaContenido(this.id)'>";
	echo "<option value=''>Elige</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
	}
}

//resta un dia a la fecha actual
//$dia = time()-(1*24*60*60);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Info Paginas</title>



<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet"> 
<style>
table {
  font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size:12px;
}
</style>

<script language="JavaScript">
<!-- Hide JavaScript from Java-cambia de color las filas de la tabla
function NavRollOver(oTd){if(!oTd.contains(event.fromElement)){oTd.bgColor="66CCFF";}}
function NavRollOut(oTd){if(!oTd.contains(event.toElement)){oTd.bgColor="#CEECF5";}}
//-->
</script>

<script language="javascript" type="text/javascript">
//numros enteros
function soloNumeros(field, event){
var key, keychar;
if(window.event) 
key = window.event.keyCode;
else if(event) 
key = event.which;
else
return true;
keychar = String.fromCharCode(key);
if((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key ==27))
return true;
else if((("0123456789").indexOf(keychar) > -1)){
window.status = "";
return true;
}
else{
alert("CAMPO SOLO PERMITE NUMEROS!");
return false;
}
}
</script>

<script language="javascript" type="text/javascript">
//numeros enteros con decimales
function soloNumeros2(field, event){
var key, keychar;
if(window.event) 
key = window.event.keyCode;
else if(event) 
key = event.which;
else
return true;
keychar = String.fromCharCode(key);
if((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key ==27))
return true;
else if((("0123456789.").indexOf(keychar) > -1)){
window.status = "";
return true;
}
else{
alert("CAMPO SOLO PERMITE NUMEROS!");
return false;
}
}
</script>

<script language="javascript" type="text/javascript">
function valida(regdatapag) {
    if (regdatapag.buqueda.value.length < 1){
	
		alert("Seleccione Tipo Busqueda");
		return false;
	}
	
	if (regdatapag.pais.value.length < 1){
	
		alert("Seleccione Pais");
		return false;
	}
	
	if (regdatapag.mercado.value.length < 1){
	
		alert("Selecione Mercado");
		return false;
	}
	
	if (regdatapag.sector.value.length < 1){
	
		alert("Seleccion Sector");
		return false;
	}
	
	if (regdatapag.tema.value.length < 1){
	
		alert("Selecione Tema");
		return false;
	}
	
	if (regdatapag.inst.value.length < 1){
	
		alert("Seleccione Institucion");
		return false;
	}
	
	if (regdatapag.nominst.value.length < 1){
	
		alert("Ingrese Nombre de la Institucion");
		return false;
	}
	
	if (regdatapag.nompag.value.length < 1){
	
		alert("Ingrese Nombre de la Pagina");
		return false;
	}
	/*if (regdatapag.despag.value.length < 1){
	
		alert("Ingrese Descripcion de la Pagina");
		return false;
	}*/
	if (regdatapag.direpag.value.length < 1){
	
		alert("Ingrese Direccion de la Pagina");
		return false;
	}
	if (regdatapag.idioma.value.length < 1){
	
		alert("Seleccione Idioma");
		return false;
	}
	if (regdatapag.tdato.value.length < 1){
	
		alert("Seleccione Tipo Dato");
		return false;
	}
	if (regdatapag.alcance.value.length < 1){
	
		alert("Seleccione Alcance");
		return false;
	}
	if (regdatapag.tacceso.value.length < 1){
	
		alert("Seleccione Tipo Acceso");
		return false;
	}
	if (regdatapag.varia.value.length < 1){
	
		alert("Seleccione Variable");
		return false;
	}
	if (regdatapag.fecha_act.value.length < 1){
	
		alert("Seleccione Fecha");
		return false;
	}
	/*if (regdatapag.carga_ar.value.length < 1){
	
		alert("Seleccione Archivo a Cargar");
		return false;
	}*/
	if (regdatapag.tipo_ar.value.length < 1){
	
		alert("Ingrese Tipo de Archivo");
		return false;
	}
	if (regdatapag.code.value.length < 1){
	
		alert("Seleccione Entregable");
		return false;
	}
	if (regdatapag.desentre.value.length < 1){
	
		alert("Ingrese Descripcion Entregable");
		return false;
	}
	if (regdatapag.costo.value.length < 1){
	
		alert("Ingrese Costo");
		return false;
	}
	return true;
}
</script>

<script type="text/javascript" src="js/select_dependientes.js"></script>




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

</head>

<body>

<p>
<br>
<center>
<form enctype="multipart/form-data" name="regdatapag" method="post" action="" onSubmit="return valida(this);"> 
<!--<form name="regdatapag" method="post" action="" enctype="multipart/form-data" >  -->

<table border="1" bordercolor="#00CCFF" style='background-color:#CEECF5;
   color:#039;
   width: 550px;
   padding: 10px;
   border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>
   <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td bgcolor="#279CC9" colspan="2" align="center"><b><font color="#FFFFFF">Actualización de Registro</font></b></td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Tipo Busqueda:</td>
    <td>
   <select name= "busquedax" id= "busquedax"> 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM pag_tipo_bus ORDER BY busqueda ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($busA ==$registrotipocoche [ 'busqueda' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'busqueda' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'busqueda' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
                    
                   
                    
                  
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Pais:</td>
    <td>
   <select name= "pais" id= "pais" > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM merca_pais ORDER BY pais ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($paisA ==$registrotipocoche [ 'pais' ] ) 
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
    <td>Mercado:</td>
    <td>
  <select name= "mercado" id= "mercado" > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM merca_pais ORDER BY pais ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($mercA ==$registrotipocoche [ 'pais' ] ) 
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
    <td>Sector:</td>
    <td>
                    <?php //generasector(); ?>
                    
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
    <td>Producto:</td>
    <td>
   <select name= "produ" id= "produ" > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM producto where eliminado='0' ORDER BY producto ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($prodA ==$registrotipocoche [ 'producto' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'producto' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'producto' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Tema:</td>
    <td>
	 <select name= "tema" id= "tema" > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM pag_tema ORDER BY tema ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($temA ==$registrotipocoche [ 'tema' ] ) 
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
    <td>Institución:</td>
    <td>
    <select name= "inst" id= "inst" > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM pag_institucion ORDER BY institucion ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($instA ==$registrotipocoche [ 'institucion' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'institucion' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'institucion' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Nombre Institución:</td>
    <td><input name="nominst" type="text" value="<? echo $nominsA; ?>" size="55" maxlength="300" /></td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Nombre Pagina:</td>
    <td><input name="nompag" type="text" value="<? echo $nompagA; ?>" size="55" maxlength="300" /></td>
  </tr>
  <tr onmouseover="NavRollOver(this)" onmouseout="NavRollOut(this)">
    <td>Descripción de la pagina:</td>
    <td>
    <textarea name="despag" rows="3" cols="50" onKeyDown="textCounter(this.form.despag,this.form.remLen,500);"  onKeyUp="textCounter(this.form.despag,this.form.remLen,500);"> <? echo $descriA; ?> </textarea>
    <!--<input name="despag" type="" size="55" />  -->
   
    
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Dirección de Pagina:</td>
    <td>http://<input name="direpag" type="text" value="<? echo $direA; ?>" size="50" maxlength="200" /></td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Idioma:</td>
    <td> 
	<select name= "idioma" id= "idioma" > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM pag_idioma ORDER BY idioma ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($idioA ==$registrotipocoche [ 'idioma' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'idioma' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'idioma' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
                    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Tipo Dato:</td>
    <td>
    <select name= "tdato" id= "tdato" > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM pag_tipo_dato ORDER BY tipo_dato ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($tdaA ==$registrotipocoche [ 'tipo_dato' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'tipo_dato' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'tipo_dato' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Alcance:</td>
    <td>
     <select name= "alcance" id= "alcance" > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM pag_alcance ORDER BY alcance ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($alcA ==$registrotipocoche [ 'alcance' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'alcance' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'alcance' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Tipo de Acceso:</td>
    <td>
     <select name= "tacceso" id= "tacceso" > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM pag_tipo_acceso ORDER BY tipo_acceso ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($tacceA ==$registrotipocoche [ 'tipo_acceso' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'tipo_acceso' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'tipo_acceso' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
    </td>
  </tr>
  
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Variables:</td>
    <td>
    <select name= "varia" id= "varia" > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM variable ORDER BY variable ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($variA ==$registrotipocoche [ 'variable' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'variable' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'variable' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Fecha Actualización:</td>
    <td>
    <!--<input name="fecha_act" type="text" size="20" /> -->
    <input type=text name="fecha_act" value="<?php echo $fultA; ?>"  size=12 >

    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Carga de Archivo:</td>
    <td><input name="carga_ar" id="carga_ar" value="" type="file" size="35" />
    <input name="carga_arx" id="carga_arx" value="<?php echo $cargA; ?>" type="hidden" size="35" />
    </td>
  </tr>
  
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Tipo Archivo (xls,pdf):</td>
    <td><input name="tipo_ar" id="tipo_ar"  type="text" size="10" value="<?php echo $tarA; ?>" maxlength="10" /></td>
  </tr>
  
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Entregable:</td>
    <td>
    <select name= "code" id= "code" > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM pag_entregable ORDER BY entregable ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($entA ==$registrotipocoche [ 'entregable' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'entregable' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'entregable' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
    </td>
  </tr>
  
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Descripción Entregable:</td>
    <td>
    <textarea name="desentre" rows="3" cols="55" onKeyDown="textCounter(this.form.desentre,this.form.remLen,500);"  onKeyUp="textCounter(this.form.desentre,this.form.remLen,500);"><? echo $descrientA; ?></textarea>
    
   <!-- <input name="desentre" type="text"size="55" /> -->
    
    </td>
  </tr>
  
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Costo S/.:</td>
    <td><input name="costo" type="text" value="<?php echo $costA; ?>" size="55" /></td>
  </tr>
  
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)' align="center">
    <td colspan="2"><input name="boton" type="submit" class='boton' value="Guardar" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="resetea" onclick="javascript:history.back()" type="button" value="Cancelar" /></td>
  </tr>
</table>
</form>
</center>


<?

if(isset($_POST['boton'])){ 
	
	
	
	/*if($_POST["carga_ar"]=""){
				$cargadato = $_POST["carga_arx"];
			} else {
				$cargadato = $_POST["carga_ar"];
				}*/
				
				
			//if($_POST["carga_ar"]!=""){
				if ($_FILES["carga_ar"]["name"]!=""){
	$directorio = 'data_archivos/';
	
	if (file_exists("data_archivos/" . $_FILES["carga_ar"]["name"])) { 
            //echo $_FILES["carga_ar"]["name"] . " ya existe. "; 
			echo "<script type='text/javascript'> alert('El Archivo de Carga Ya Existe !!'); </script> ";
			//volvemos a cargar la pagina
			echo"<script>location.href='consuldata.php'</script>";
          } else {
			

if (move_uploaded_file($_FILES['carga_ar']['tmp_name'], $directorio . $_FILES['carga_ar']['name']))
{
	} else{
    //print "Error al intentar subir el archivo.";
	echo "<script type='text/javascript'> alert('Error al Modificar el Registro'); </script> ";
	 echo"<script>location.href='consuldata.php'</script>";
}
} 
}





	///subimos datos a la base

			include ("conection/config.php");
			//if ($_POST["carga_ar"]!=""){
				if ($_FILES["carga_ar"]["name"]!=""){
			$documen= $_FILES["carga_ar"]["name"];
			} else{
				$documen= $_POST["carga_arx"];
			}
			$descripag=$_POST["despag"];
			$descrientre=$_POST["desentre"];
			

			
			$Sql="update pag_datapagina 
			Set cod_tipo_bus='".$_POST["busquedax"]."', 
			cod_pais='".$_POST["pais"]."',
			cod_pais_merca='".$_POST["mercado"]."',
			cod_sector='".$_POST["sector"]."',
			cod_producto='".$_POST["produ"]."',
			cod_tema='".$_POST["tema"]."',
			cod_idioma='".$_POST["idioma"]."',
			cod_tipo_dato='".$_POST["tdato"]."',
			cod_alcance='".$_POST["alcance"]."',
			cod_tipo_acceso='".$_POST["tacceso"]."',
			cod_variable='".$_POST["varia"]."',
			cod_entre='".$_POST["code"]."',
			cod_inst='".$_POST["inst"]."',
			nom_inst='".$_POST["nominst"]."',
			nom_pag='".$_POST["nompag"]."',
			descri_pag='".$_POST["despag"]."',
			dire_pag='".$_POST["direpag"]."',
			fecha_actu='".$_POST["fecha_act"]."',
			carga_ar='$documen',
			tipo_ar='".$_POST["tipo_ar"]."',
			descri_entre='".$_POST["desentre"]."',
			costo='".$_POST["costo"]."'
where id ='$codx' ";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   echo "<script type='text/javascript'> alert('Informacion Modificado'); </script> ";
   echo"<script>location.href='consuldata.php'</script>";
   mysql_close($link);
   
    //print "El archivo fue subido con éxito.";

//}

} 


?>
</body>
</html>