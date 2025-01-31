<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Exportacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="css/tcal.css" />
	<script type="text/javascript" src="js/tcal.js"></script> 
    <!-- fin link calendar resources -->

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


<script language="javascript" type="text/javascript">
function valida(producto) {
   var validacion = 0; 

for(i=0; i<producto.elements.length; i++){ 
if (producto.elements[i].value.length == 0){ 
alert("Debe ingresar datos en el campo " + producto.elements[i].name); 
producto.elements[i].focus(); 
validacion++; 
//break; 
return false;
} 
} 

/*for(i=0; i<producto.elements.length; i++){ 
if (producto.elements[i].value.length == 0){ 
alert("Debe ingresar datos en el campo " + producto.elements[i].name); 
producto.elements[i].focus(); 
validacion++; 
//break; 
return false;
} 
} */

/*if(validacion==0){ 
alert("Se ha completado el ingreso de datos satisfactoriamente, se procederá a enviarlos para su procesamiento"); 
producto.submit(); 
} */

//} 

	//return true;
}
</script>




<script type="text/javascript">
function ShowSelected_4()
{
/* Para obtener el valor */
var cod = document.getElementById("miCombo4").value;
//alert(cod);
if(cod =='SI'){
	document.producto.x4.value = '1'
}else if(cod=='NO'){
	document.producto.x4.value = '0'
}else{
	document.producto.x4.value = '2'
}
}
</script>

</head>

<body>
<br /><bR /><br />
<form name="producto" method="post" onSubmit="return valida(this);" action="insertliscke.php" > 
 <!-- <form name="producto" method="post" onSubmit="return valida(this);" action="#" > -->

<!-- 
<input class="form-control btn-primary" type="button" value="C&aacute;lculo de Costo de Exportaci&oacute;n. Paso : 1 de 12" />
<table class="table table-hover" style='font-size:80%'>
<tr>
<td colspan="2" align="center"><font size="+1"><b> Detalle del Producto</b></font></td>
</tr>
<tr>
<td><input class="form-control" placeholder="Ingrese Nombre del Proveedor" name="provee" type="text" /></td>
<td><input class="form-control" placeholder="Ingrese Nombre de la Persona Contacto" name="conta" type="text" /></td>
</tr>
</tr>
<tr>
<td><input class="form-control" placeholder="Ingrese Correo / Pagina Web" name="correo" type="text" /></td>
<td>


<?php
  /*echo "<select name='pais' class='form-control'>"; 
	echo"<option value=''>Seleccione Puerto / Pais</option>";
	$ssql="SELECT
puerto.puerto
FROM
puerto
WHERE
puerto.puerto <> ''
GROUP BY
puerto.puerto
ORDER BY
puerto.puerto ASC";
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[0]'>$fila[0]"; 
					}
					echo "</select>";*/
  ?>

</td>
</tr>
<tr>
<td><select class="form-control" name="moneda">
<option value=""> Seleccione Moneda </option>
<option value="Soles">Soles</option>
<option value="Dolares">Dolares</option>
</select>
</td>
<td><input class="form-control" placeholder="Ingrese Tipo de Cambio" name="tcambio" type="text" onkeypress="return NumCheck(event, this)"/></td>
</tr>
</table> -->

<!-- LISTA DE CHEQUEO PARA LA MATRIZ DE COSTOS DE D.F.I.  -->

<table class="table table-hover" style='font-size:80%'>
<tr>
<td bgcolor="#EAEAEA" align="center" colspan="5"><b><h4>LISTA DE CHEQUEO PARA LA MATRIZ DE COSTOS DE D.F.I. </h4></b></td>
</tr>
<tr>
<td bgcolor="#EAEAEA" colspan="5">Esta herramienta de seguimiento le permitir&aacute; identificar las diferentes actividades involucradas en el desarrollo del los diferentes pasos que requiere el proceso exportador . Aqu&iacute; encontrar&aacute; los par&aacute;metros básicos para la verificaci&oacute;n y control cronolog&iacute;co de los diferentes pasos ,y tomar a tiempo las previsiones necesarias para que la operaci&oacute;n sea exitosa.</td>
</tr>
<tr>
<td bgcolor="#EAEAEA" align="center"><b>Orden</b></td>
<td bgcolor="#EAEAEA" align="center"><b>Descripcion</b></td>
<td bgcolor="#EAEAEA" align="center"><b>Fecha</b></td>
<td bgcolor="#EAEAEA" align="center"><b>Observaciones</b></td>
<td bgcolor="#EAEAEA" align="center"><b>Puntaje</b></td>
</tr>
<?php
$sqllista="SELECT cel.id_lista, cel.orden, cel.descripcion, cel.grupo FROM cos_expo_listachekeo AS cel ORDER BY cel.id_lista ASC ";
$rsnl = mysql_query($sqllista);
if (mysql_num_rows($rsnl) > 0){
	while($rowl = mysql_fetch_array($rsnl)){
		$idlista = $rowl["id_lista"];
		$ordlista = $rowl["orden"];
		$deslista = $rowl["descripcion"];
		
		
		
		echo "<tr>";
		if($ordlista=='01' or $ordlista=='02' or $ordlista=='03' or $ordlista=='04' or $ordlista=='05' or $ordlista=='06' or $ordlista=='07' or $ordlista=='08' or $ordlista=='09' or $ordlista=='10' or $ordlista=='11' or $ordlista=='12' or $ordlista=='13' or $ordlista=='14' or $ordlista=='15' or $ordlista=='16' or $ordlista=='17'){
			echo "<td bgcolor='#EAEAEA'>$ordlista</td>";
			echo "<td colspan=4' bgcolor='#EAEAEA'><b>$deslista</b></td>";
		}else{
		//echo "<td>$idlista</td>";
		//if($idlista=='1'){
		echo "<td>$ordlista <input type='hidden' name='idlis_[]' class='form-control' value='$idlista' /></td>";
		echo "<td>$deslista</td>";
		echo "<td><input type='text' name='fecha[]' class='tcal form-control' value='0000-00-00' /></td>";
		echo "<td><input type='text' name='comen[]' class='form-control' value=' ' /></td>";
		echo "<td><select name='pun[]' class='form-control'>
<option value=''>Seleccione</option>
<option value='SI'>Si</option>
<option value='NO'>No</option>
<option value='NO REQUERIDO'>No Requerido</option>
</select></td>";
		//}
		
		}
		
		echo "</tr>";
	}
}
?>

</table>

<!-- FIN LISTA DE CHEQUEO PARA LA MATRIZ DE COSTOS DE D.F.I.  -->

<table class="table table-hover" style='font-size:80%'>
<tr>
<td colspan="13" align="center"><input class="btn btn-success" name="guardar" type="submit" value=" Validar / Visualizar Datos"  /></td>
</tr>
</table>
</form>
</body>
</html>
<?php
include("pie.php");
?>