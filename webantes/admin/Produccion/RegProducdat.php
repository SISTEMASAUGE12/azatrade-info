<?
include ("conection/config.php");
include ("menu.php");

$aa = date("Y");

function generasector()
{
	//include 'conexion.php';
	//conectar();
	$consulta=mysql_query("SELECT id, sector FROM sector where eliminado='0'");
	//desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='sector' id='sector' onChange='cargaContenido(this.id)'>";
	echo "<option value=''>Elige</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Produccion</title>
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
function valida(regproducc) {
    if (regproducc.sector.value.length < 1){
	
		alert("Seleccione Sector");
		return false;
	}
	
	if (regproducc.depa.value.length < 1){
	
		alert("Seleccione Departamento");
		return false;
	}
	
	if (regproducc.produ.value.length < 1){
	
		alert("Selecione Producto");
		return false;
	}
	
	if (regproducc.unidad.value.length < 1){
	
		alert("Seleccion Unidad de Medida");
		return false;
	}
	
	if (regproducc.varia.value.length < 1){
	
		alert("Selecione Variable");
		return false;
	}
	
	if (regproducc.periodo.value.length < 1){
	
		alert("Ingrese Año");
		return false;
	}
	
	if (regproducc.mes2.value.length < 1){
	
		alert("Seleccione Periodo");
		return false;
	}
	
	if (regproducc.mes.value.length < 1){
	
		alert("Seleccione Mes");
		return false;
	}
	if (regproducc.monto.value.length < 1){
	
		alert("Ingrese Cantidad/Monto");
		return false;
	}
	return true;
}
</script>

<!--<script type="text/javascript" src="js/select_dependientes.js"></script> -->

</head>

<body>

<p>
<br>
<center>
<form name="regproducc" method="post" action="insertdat.php" onSubmit="return valida(this);">
<table border="1" bordercolor="#00CCFF" style='background-color:#CEECF5;
   color:#039;
   width: 300px;
   padding: 10px;
   border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>
   <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td bgcolor="#279CC9" colspan="2" align="center"><b><font color="#FFFFFF">Registrar Datos</font></b></td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Sector:</td>
    <td>
   <?
echo "<select name='sector'>"; 
if ($sector!=''){
					$sqls="SELECT id,sector FROM sector where eliminado='0' and id='".$sector."'";
}else{
	echo"<option value=''></option>";
	$sqls="SELECT id,sector FROM sector where eliminado='0'";
}
					
					$resultado=mysql_query($sqls); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[0]'>$fila[1]"; 
					}
					echo "</select>";
					
					?>
                    
                    <?php //generasector(); ?>
                    
                  
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Departamento:</td>
    <td>
	<?
echo "<select name='depa'>"; 
if ($depart!=''){
					$sqld="SELECT id,departamento FROM departamento where eliminado='0' and id='".$depart."'";
}else{
	echo"<option value=''></option>";
	$sqld="SELECT id,departamento FROM departamento where eliminado='0'";
}
					
					$resultadod=mysql_query($sqld); 
					while ($filad=mysql_fetch_row($resultadod))
					{ 
						echo "<option value='$filad[0]'>$filad[1]"; 
					}
					echo "</select>";
					?>
                    
           
                    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Producto:</td>
    <td>
    <?
echo "<select name='produ'>"; 
if ($product!=''){
					$sqlp="SELECT id,producto FROM producto where eliminado='0' and id='".$product."'";
}else{
	echo"<option value=''></option>";
	$sqlp="SELECT id,producto FROM producto where eliminado='0'";
}
					
					$resultadop=mysql_query($sqlp); 
					while ($filap=mysql_fetch_row($resultadop))
					{ 
						echo "<option value='$filap[0]'>$filap[1]"; 
					}
					echo "</select>";
					?>
                    
                   <!--<select disabled="disabled" name="produ" id="produ">
						<option value="">Selecciona opci&oacute;n...</option>
					</select> -->
                    
                   <div> <?php echo $error1 ?></div>
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>U. Medida:</td>
    <td>
    <?
echo "<select name='unidad'>"; 
if ($unid!=''){
					$sqlm="SELECT id,medida FROM medida where eliminado='0' and id='".$unid."'";
}else{
	echo"<option value=''></option>";
	$sqlm="SELECT id,medida FROM medida where eliminado='0'";
}
					
					$resultadom=mysql_query($sqlm); 
					while ($filam=mysql_fetch_row($resultadom))
					{ 
						echo "<option value='$filam[0]'>$filam[1]"; 
					}
					echo "</select>";
					?>
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Variable:</td>
    <td> 
	<?
echo "<select name='varia'>"; 
if ($variable!=''){
					$sqlv="SELECT id,variable FROM variable where eliminado='0' and id='".$variable."'";
}else{
	echo"<option value=''></option>";
	$sqlv="SELECT id,variable FROM variable where eliminado='0'";
}
					
					$resultadov=mysql_query($sqlv); 
					while ($filav=mysql_fetch_row($resultadov))
					{ 
						echo "<option value='$filav[0]'>$filav[1]"; 
					}
					echo "</select>";
					?>
                    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Año:</td>
    <td>
    <input name="periodo" type="text" size="5"  onkeypress="return soloNumeros(this, event)"/>
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Periodo:</td>
    <td>
    <select name="mes2">
  <option value=""></option>
<!--  <option value="Anual">Anual</option>
  <option value="Trimestral">Trimestral</option> -->
  <option value="Mensual">Mensual</option>
</select>
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Mes:</td>
    <td>
    <select name="mes">
   <option value=""></option>
  <option value="Enero">Enero</option>
  <option value="Febrero">Febrero</option>
  <option value="Marzo">Marzo</option>
  <option value="Abril">Abril</option>
  <option value="Mayo">Mayo</option>
  <option value="Junio">Junio</option>
  <option value="Julio">Julio</option>
  <option value="Agosto">Agosto</option>
  <option value="Septiembre">Septiembre</option>
  <option value="Octubre">Octubre</option>
  <option value="Noviembre">Noviembre</option>
  <option value="Diciembre">Diciembre</option>
</select>
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Cantidad/Monto(S/./U$$.):</td>
    <td><input name="monto" type="text" size="15"  onkeypress="return soloNumeros2(this, event)"/></td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)' align="center">
    <td colspan="2"><input name="boton" type="submit" class='boton' value="Guardar" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="resetea" onclick="javascript:history.back()" type="button" value="Cancelar" /></td>
  </tr>
</table>
</form>

</center>
</body>
</html>