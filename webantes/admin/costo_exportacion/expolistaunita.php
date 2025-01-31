<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";

$codigo = $_GET["conte"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script language="javascript" type="text/javascript">
function valida(unita) {

	/*primera Fila */
    if (unita.contene1.value.length < 1){
		alert("Seleccione Tipo Contenedor \n Unitarizacion Fila #1");
		return false;
	}
	if (unita.condi1.value.length < 1){
		alert("Ingrese Tipo Condicion \n Unitarizacion Fila #1");
		return false;
	}
	if (unita.canti1.value.length < 1){
		alert("Ingrese Cantidad \n Unitarizacion Fila #1");
		return false;
	}
	if (unita.pulgada1.value.length < 1){
		alert("Ingrese las Pulgadas \n Unitarizacion Fila #1");
		return false;
	}
	if (unita.costo1.value.length < 1){
		alert("Ingrese Costo \n Unitarizacion Fila #1");
		return false;
	}
	
	/*segunda Fila */
    if (unita.contene2.value.length < 1){
		alert("Seleccione Tipo Contenedor \n Unitarizacion Fila #2");
		return false;
	}
	if (unita.condi2.value.length < 1){
		alert("Ingrese Tipo Condicion \n Unitarizacion Fila #2");
		return false;
	}
	if (unita.canti2.value.length < 1){
		alert("Ingrese Cantidad \n Unitarizacion Fila #2");
		return false;
	}
	if (unita.pulgada2.value.length < 1){
		alert("Ingrese las Pulgadas \n Unitarizacion Fila #2");
		return false;
	}
	if (unita.costo2.value.length < 1){
		alert("Ingrese Costo \n Unitarizacion Fila #2");
		return false;
	}
	
	/*tercera Fila */
    if (unita.contene3.value.length < 1){
		alert("Seleccione Tipo Contenedor \n Unitarizacion Fila #3");
		return false;
	}
	if (unita.condi3.value.length < 1){
		alert("Ingrese Tipo Condicion \n Unitarizacion Fila #3");
		return false;
	}
	if (unita.canti3.value.length < 1){
		alert("Ingrese Cantidad \n Unitarizacion Fila #3");
		return false;
	}
	if (unita.pulgada3.value.length < 1){
		alert("Ingrese las Pulgadas \n Unitarizacion Fila #3");
		return false;
	}
	if (unita.costo3.value.length < 1){
		alert("Ingrese Costo \n Unitarizacion Fila #3");
		return false;
	}
	
	/*cuarta Fila */
    if (unita.contene4.value.length < 1){
		alert("Seleccione Tipo Contenedor \n Unitarizacion Fila #4");
		return false;
	}
	if (unita.condi4.value.length < 1){
		alert("Ingrese Tipo Condicion \n Unitarizacion Fila #4");
		return false;
	}
	if (unita.canti4.value.length < 1){
		alert("Ingrese Cantidad \n Unitarizacion Fila #4");
		return false;
	}
	if (unita.pulgada4.value.length < 1){
		alert("Ingrese las Pulgadas \n Unitarizacion Fila #4");
		return false;
	}
	if (unita.costo4.value.length < 1){
		alert("Ingrese Costo \n Unitarizacion Fila #4");
		return false;
	}
	
	/*quinta Fila */
    if (unita.contene5.value.length < 1){
		alert("Seleccione Tipo Contenedor \n Unitarizacion Fila #5");
		return false;
	}
	if (unita.condi5.value.length < 1){
		alert("Ingrese Tipo Condicion \n Unitarizacion Fila #5");
		return false;
	}
	if (unita.canti5.value.length < 1){
		alert("Ingrese Cantidad \n Unitarizacion Fila #5");
		return false;
	}
	if (unita.pulgada5.value.length < 1){
		alert("Ingrese las Pulgadas \n Unitarizacion Fila #5");
		return false;
	}
	if (unita.costo5.value.length < 1){
		alert("Ingrese Costo \n Unitarizacion Fila #5");
		return false;
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

</head>

<body>

<br /><br />
<input class="form-control btn-primary" type="button" value="C&aacute;lculo de Costo de Exportaci&oacute;n. Paso : 5 de 8" />
 <form name="unita" method="post" onSubmit="return valida(this);" action="inserunita.php" > 

  <!-- tabla de paletizacion -->
 <table class="table table-hover" style='font-size:80%'> 
  <tr>
   <td colspan="7" align="center"><h4><b>Unitarizacion - Contenedorizacion (Dimensiones en m.)</b></h4> </td>
  </tr>
 <tr>
  <td bgcolor="#E9E9E9" align="center">#</td>
  <td bgcolor="#E9E9E9" align="center">Descripcion del Producto</td>
  <td bgcolor="#E9E9E9" align="center">Tipo Contenedor</td>
  <td bgcolor="#E9E9E9" align="center">Condicion</td>
  <td bgcolor="#E9E9E9" align="center">Cantidad</td>
  <td bgcolor="#E9E9E9" align="center">Pulgadas</td>
  <td bgcolor="#E9E9E9" align="center">Costo Unitarizacion</td>
  </tr>
  <?php
  $sqluni="SELECT
cos_expo_prod_detalle.id_prod,
GROUP_CONCAT(cos_expo_prod_detalle.nomproducto) AS descripcion,
cos_expo_prod_detalle.agrupa_contenedor
FROM
cos_expo_prod_detalle
WHERE
cos_expo_prod_detalle.id_prod = '$codigo'
GROUP BY
cos_expo_prod_detalle.id_prod,
cos_expo_prod_detalle.agrupa_contenedor";
  $rsnu = mysql_query($sqluni);
if (mysql_num_rows($rsnu) > 0){
	while($rowu = mysql_fetch_array($rsnu)){
		$itemsu = $itemsu + 1;
		$cprodu = $rowu["id_prod"];
		$descrip = $rowu["descripcion"];
		echo"<tr>";
		echo "<td>$itemsu</td>";
		echo "<td>$descrip</td>";
		
		if ($itemsu=='1'){
			
		echo "<td>";
		echo "<select name='contene1' class='form-control'>"; 
	echo"<option value=''>Todo</option>";
	$ssql="SELECT codigo, contenedor FROM cos_contenedor order by contenedor";
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[0]'>$fila[1]"; 
					}
					echo "</select>";
		echo "</td>";
		echo "<td><input class='form-control' name='condi1' type='text' /></td>";
		echo "<td><input class='form-control' name='canti1' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='pulgada1' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='costo1' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' />
		
		<input name='item1s' type='hidden' value='$itemsu' />
		<input name='cproduc' type='hidden' value='$cprodu' />
		<input name='nombrep1' type='hidden' value='$descrip' />
		</td>";
		}
	
	if ($itemsu=='2'){
		
		echo "<td>";
		echo "<select name='contene2' class='form-control'>"; 
	echo"<option value=''>Todo</option>";
	$ssql="SELECT codigo, contenedor FROM cos_contenedor order by contenedor";
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[0]'>$fila[1]"; 
					}
					echo "</select>";
		echo "</td>";
		echo "<td><input class='form-control' name='condi2' type='text' /></td>";
		echo "<td><input class='form-control' name='canti2' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='pulgada2' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='costo2' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' />
		
		<input class='form-control' name='item2s' type='hidden' value='$itemsu' />
		<input class='form-control' name='nombrep2' type='hidden' value='$descrip' />
		</td>";
		}
		
	if ($itemsu=='3'){
		
		echo "<td>";
		echo "<select name='contene3' class='form-control'>"; 
	echo"<option value=''>Todo</option>";
	$ssql="SELECT codigo, contenedor FROM cos_contenedor order by contenedor";
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[0]'>$fila[1]"; 
					}
					echo "</select>";
		echo "</td>";
		echo "<td><input class='form-control' name='condi3' type='text' /></td>";
		echo "<td><input class='form-control' name='canti3' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='pulgada3' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='costo3' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' />
		
		<input class='form-control' name='item3s' type='hidden' value='$itemsu' />
		<input class='form-control' name='nombrep3' type='hidden' value='$descrip' />
		</td>";
		}
		
	if ($itemsu=='4'){
		
		echo "<td>";
		echo "<select name='contene4' class='form-control'>"; 
	echo"<option value=''>Todo</option>";
	$ssql="SELECT codigo, contenedor FROM cos_contenedor order by contenedor";
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[0]'>$fila[1]"; 
					}
					echo "</select>";
		echo "</td>";
		echo "<td><input class='form-control' name='condi4' type='text' /></td>";
		echo "<td><input class='form-control' name='canti4' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='pulgada4' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='costo4' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' />
		
		<input class='form-control' name='item4s' type='hidden' value='$itemsu' />
		<input class='form-control' name='nombrep4' type='hidden' value='$descrip' />
		</td>";
		}
		
	if ($itemsu=='5'){
		
		echo "<td>";
		echo "<select name='contene5' class='form-control'>"; 
	echo"<option value=''>Todo</option>";
	$ssql="SELECT codigo, contenedor FROM cos_contenedor order by contenedor";
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[0]'>$fila[1]"; 
					}
					echo "</select>";
		echo "</td>";
		echo "<td><input class='form-control' name='condi5' type='text' /></td>";
		echo "<td><input class='form-control' name='canti5' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='pulgada5' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' /></td>";
		echo "<td><input class='form-control' name='costo5' type='text' placeholder='0.00' onkeypress='return NumCheck(event, this)' />
		
		<input class='form-control' name='item5s' type='hidden' value='$itemsu' />
		<input class='form-control' name='nombrep5' type='hidden' value='$descrip' />
		</td>";
		}


		
		echo"</tr>";
		
	}
}
  ?>

<tr>
  <td colspan="7" align="center">
 <input class="btn btn-success" name="guardar" type="submit" value=" Validar / Ingresar Informacion Adicional"  />
 </td>
  </tr> 
 </table>
</form>

</body>
</html>
<?php
include("pie.php");
?>