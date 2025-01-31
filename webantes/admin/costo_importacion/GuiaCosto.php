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
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

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
    if (producto.provee.value.length < 1){
		alert("Ingrese Nombre del Proveedor");
		return false;
	}
	 if (producto.conta.value.length < 1){
		alert("Ingrese Nombre de la Persona Contacto");
		return false;
	}
	if (producto.correo.value.length < 1){
		alert("Ingrese Correo / Pagina Web");
		return false;
	}
	if (producto.pais.value.length < 1){
		alert("Ingrese Puerto / Pais");
		return false;
	}
	if (producto.moneda.value.length < 1){
		alert("Ingrese Tipo Moneda");
		return false;
	}
	if (producto.tcambio.value.length < 1){
		alert("Ingrese Tipo Cambio");
		return false;
	}
	if (producto.uit.value.length < 1){
		alert("Ingrese Valor UIT");
		return false;
	}
	if (producto.tercompra.value.length < 1){
		alert("Seleccione Termino Compra");
		return false;
	}
	if (producto.ttransporte.value.length < 1){
		alert("Ingrese Tipo Transporte");
		return false;
	}
	
	part1 = document.producto.partida_1.value;
	part2 = document.producto.partida_2.value;
	part3 = document.producto.partida_3.value;
	part4 = document.producto.partida_4.value;
	part5 = document.producto.partida_5.value;
	
	if (part1 < 1 && part2 < 1 && part3 < 1 && part4 < 1 && part5 < 1 ){
		alert("Ingrese Numero de Partida \n Minimo un Numero de Partida");
		return false;
		}
		
	//primera fila se valida
	if (producto.partida_1.value.length > 1){
		
		if (producto.descri_1.value.length < 1){
		alert("Ingrese Descripcion del Producto \n Fila #1");
		return false;
	    }
		  if (producto.uni_1.value.length < 1){
	        alert("Seleccione Unidad de Medida \n Fila #1");
		    return false;
	        }
			if (producto.precioventalocal1.value.length < 1){
		     alert("Ingrese Precio Venta Local \n Fila #1");
		     return false;
	         }
	         if (producto.canti_1.value.length < 1){
		     alert("Ingrese Cantidad \n Fila #1");
		     return false;
	         }
			   if (producto.peso_uni_1.value.length < 1){
		        alert("Ingrese Peso por Unidad (Kg) #1");
		        return false;
	            }
	              if (producto.valorfact_1.value.length < 1){
		          alert("Ingrese Valor Factura \n Fila #1");
		          return false;
	              }  
		
	}
	
	// segunda fila se valida
	if (producto.partida_2.value.length > 1){
		
		if (producto.descri_2.value.length < 1){
		alert("Ingrese Descripcion del Producto \n Fila 2");
		return false;
	    }
		  if (producto.uni_2.value.length < 1){
	        alert("Seleccione Unidad de Medida \n Fila #2");
		    return false;
	        }
			if (producto.precioventalocal2.value.length < 1){
		     alert("Ingrese Precio Venta Local \n Fila #2");
		     return false;
	         }
	         if (producto.canti_2.value.length < 1){
		     alert("Ingrese Cantidad \n Fila #2");
		     return false;
	         }
			   if (producto.peso_uni_2.value.length < 1){
		        alert("Ingrese Peso por Unidad (Kg) #2");
		        return false;
	            }
	              if (producto.valorfact_2.value.length < 1){
		          alert("Ingrese Valor Factura \n Fila #2");
		          return false;
	              }  
		
	}
	
	// tercera fila se valida
	if (producto.partida_3.value.length > 1){
		
		if (producto.descri_3.value.length < 1){
		alert("Ingrese Descripcion del Producto \n Fila #3");
		return false;
	    }
		  if (producto.uni_3.value.length < 1){
	        alert("Seleccione Unidad de Medida \n Fila #3");
		    return false;
	        }
			if (producto.precioventalocal3.value.length < 1){
		     alert("Ingrese Precio Venta Local \n Fila #3");
		     return false;
	         }
	         if (producto.canti_3.value.length < 1){
		     alert("Ingrese Cantidad \n Fila #3");
		     return false;
	         }
			   if (producto.peso_uni_3.value.length < 1){
		        alert("Ingrese Peso por Unidad (Kg) #3");
		        return false;
	            }
	              if (producto.valorfact_3.value.length < 1){
		          alert("Ingrese Valor Factura \n Fila #3");
		          return false;
	              }  
		
	}
	
	//cuarta fila se valida
	if (producto.partida_4.value.length > 1){
		
		if (producto.descri_4.value.length < 1){
		alert("Ingrese Descripcion del Producto \n Fila #4");
		return false;
	    }
		  if (producto.uni_4.value.length < 1){
	        alert("Seleccione Unidad de Medida \n Fila #4");
		    return false;
	        }
			if (producto.precioventalocal4.value.length < 1){
		     alert("Ingrese Precio Venta Local \n Fila #1");
		     return false;
	         }
	         if (producto.canti_4.value.length < 1){
		     alert("Ingrese Cantidad \n Fila #4");
		     return false;
	         }
			   if (producto.peso_uni_4.value.length < 1){
		        alert("Ingrese Peso por Unidad (Kg) #4");
		        return false;
	            }
	              if (producto.valorfact_4.value.length < 1){
		          alert("Ingrese Valor Factura \n Fila #4");
		          return false;
	              }  
	}
	
	//quinta fila se valida
	if (producto.partida_5.value.length > 1){
		
		if (producto.descri_5.value.length < 1){
		alert("Ingrese Descripcion del Producto \n Fila #5");
		return false;
	    }
		  if (producto.uni_5.value.length < 1){
	        alert("Seleccione Unidad de Medida \n Fila #5");
		    return false;
	        }
			if (producto.precioventalocal5.value.length < 1){
		     alert("Ingrese Precio Venta Local \n Fila #1");
		     return false;
	         }
	         if (producto.canti_5.value.length < 1){
		     alert("Ingrese Cantidad \n Fila #5");
		     return false;
	         }
			   if (producto.peso_uni_5.value.length < 1){
		        alert("Ingrese Peso por Unidad (Kg) #5");
		        return false;
	            }
	              if (producto.valorfact_5.value.length < 1){
		          alert("Ingrese Valor Factura \n Fila #5");
		          return false;
	              }  
		
	}
	
	return true;
}
</script>

<script type="text/javascript">  
// calcula campos
function Sumar(){  
      interval = setInterval("calcular()",1);  
}  
function calcular(){
	c1 = document.producto.canti_1.value;
	p1 = document.producto.peso_uni_1.value;
	v1 = document.producto.valorfact_1.value;
	
	 document.producto.peso_tota_kg_1 .value = (c1 * -1) * (p1 * -1);
	 tota1 = document.producto.total_impo_1 .value = (c1 * -1) * (v1 * -1);
	
	c2 = document.producto.canti_2.value;
	p2 = document.producto.peso_uni_2.value;
	v2 = document.producto.valorfact_2.value;
	
	 document.producto.peso_tota_kg_2.value = (c2 * -1) * (p2 * -1);
	 tota2 = document.producto.total_impo_2.value = (c2 * -1) * (v2 * -1);
	
	c3 = document.producto.canti_3.value;
	p3 = document.producto.peso_uni_3.value;
	v3 = document.producto.valorfact_3.value;
	
	 document.producto.peso_tota_kg_3.value = (c3 * -1) * (p3 * -1);
	 tota3 = document.producto.total_impo_3.value = (c3 * -1) * (v3 * -1);
	
	c4 = document.producto.canti_4.value;
	p4 = document.producto.peso_uni_4.value;
	v4 = document.producto.valorfact_4.value;
	
	 document.producto.peso_tota_kg_4.value = (c4 * -1) * (p4 * -1);
	 tota4 = document.producto.total_impo_4.value = (c4 * -1) * (v4 * -1);
	
	c5 = document.producto.canti_5.value;
	p5 = document.producto.peso_uni_5.value;
	v5 = document.producto.valorfact_5.value;
	
	 document.producto.peso_tota_kg_5.value = (c5 * -1) * (p5 * -1);
	 tota5 = document.producto.total_impo_5.value = (c5 * -1) * (v5 * -1);
	 
	 total_t = document.producto.total_todo.value = (tota1 * 1) + (tota2 * 1) + (tota3 * 1) + (tota4 * 1) + (tota5 * 1);
	 
	 document.producto.porc_costo_1.value = (tota1 * -1) / ( total_t * -1);
	 document.producto.porc_costo_2.value = (tota2 * -1) / ( total_t * -1);
	 document.producto.porc_costo_3.value = (tota3 * -1) / ( total_t * -1);
	 document.producto.porc_costo_4.value = (tota4 * -1) / ( total_t * -1);
	 document.producto.porc_costo_5.value = (tota5 * -1) / ( total_t * -1);
	
	} 
function NoSumar(){  
      clearInterval(interval);  
}  
</SCRIPT>

</head>

<body>
<br /><bR /><br />
 <form name="producto" method="post" onSubmit="return valida(this);" action="validapartida.php" > 

<input class="form-control btn-primary" type="button" value="C&aacute;lculo de Costo de Importaci&oacute;n. Paso : 1 de 12" />
<table class="table table-hover" style='font-size:80%'>
<tr>
<td colspan="2" align="center"><font size="+1"><b> Detalle del Producto</b></font></td>
</tr>
<tr>
<td><input class="form-control" placeholder="Ingrese Nombre del Proveedor" name="provee" type="text" /></td>
<!-- </tr>
<tr> -->
<td><input class="form-control" placeholder="Ingrese Nombre de la Persona Contacto" name="conta" type="text" /></td>
</tr>
</tr>
<tr>
<td><input class="form-control" placeholder="Ingrese Correo / Pagina Web" name="correo" type="text" /></td>
<!-- </tr>
<tr> -->
<td>

<!-- <input class="form-control" placeholder="Ingrese Puerto / Pais" name="pais" type="text" /> -->

<?php
  echo "<select name='pais' class='form-control'>"; 
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
					echo "</select>";
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
<!-- </tr>
<tr> -->
<td><input class="form-control" placeholder="Ingrese Tipo de Cambio" name="tcambio" type="text" onkeypress="return NumCheck(event, this)"/></td>
</tr>
<tr>
<td><input class="form-control" placeholder="Ingrese Valor UIT" name="uit" type="text" onkeypress="return NumCheck(event, this)"/></td>
<!-- </tr>
<tr> --> 
<td><select class="form-control" name="tercompra">
<option value=""> Seleccione Termino de Compra </option>
<option value="Exwork">Exwork</option>
<option value="Fob">Fob</option>
<option value="Otros">Otros</option>
</select></td>
</tr>
<tr>
<td colspan="2"><input class="form-control" placeholder="Ingrese Tipo de Transporte" name="ttransporte" type="text" /></td>
</tr>
</table>

<table class="table table-hover" style='font-size:80%'>
<tr>
<td bgcolor="#E9E9E9" align="center">#</td>
<td bgcolor="#E9E9E9" align="center"># Partida (Pa&iacute;s Destino Peru)</td>
<td bgcolor="#E9E9E9" align="center"># Partida (Pa&iacute;s Origen)</td>
<td bgcolor="#E9E9E9" align="center"> Descripci&oacute;n del Producto</td>
<td bgcolor="#E9E9E9" align="center">Unid. Comercial</td>
<td bgcolor="#E9E9E9" align="center">Precio Venta Local </td>
<td bgcolor="#E9E9E9" align="center">Cantidad</td>
<td bgcolor="#E9E9E9" align="center">Peso Por Unid.(Kg)</td>
<td bgcolor="#E9E9E9" align="center">Peso Total (Kg.)</td>
<td bgcolor="#E9E9E9" align="center">Valor Factura</td>
<td bgcolor="#E9E9E9" align="center">Total Factura</td>
<td bgcolor="#E9E9E9" align="center">% Costo</td>
</tr>
<tr>
<td>1.</td>
<td><input class="form-control" name="partida_1" type="text" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="partida_1A" type="text" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="descri_1" type="text" /></td>
<td><!-- <input class="form-control" name="uni_1" type="text" /> -->
 <?
echo "<select name='uni_1' class='form-control'>"; 
if ($busx2!=''){
	echo"<option value=''></option>";
	$querypro = "SELECT id_uni, decripcion FROM cos_unidad order by descripcion";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["descripcion"].'"';
if($_POST["busq"]==$filapro["descripcion"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["descripcion"].'</option>';   
}
					
}else{
	echo"<option value=''>Todo</option>";
	$ssql="SELECT id_uni, descripcion FROM cos_unidad order by descripcion";
}
					
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[1]'>$fila[1]"; 
					}
					echo "</select>";
					?>
</td>
<td><input class="form-control" name="precioventalocal1" type="text" placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="canti_1" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="peso_uni_1" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="peso_tota_kg_1" type="text" placeholder="0.00" readonly="readonly" /></td>
<td><input class="form-control" name="valorfact_1" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" type="text" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="total_impo_1" type="text" placeholder="0.00" readonly="readonly" /></td>
<td><input class="form-control" name="porc_costo_1" type="text" placeholder="0.00" readonly="readonly" /></td>
</tr>
 
<tr>
<td>2.</td>
<td><input class="form-control" name="partida_2" type="text" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="partida_2A" type="text" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="descri_2" type="text" /></td>
<td><!-- <input class="form-control" name="uni_1" type="text" /> -->
 <?
echo "<select name='uni_2' class='form-control'>"; 
if ($busx2!=''){
	echo"<option value=''></option>";
	$querypro = "SELECT id_uni, decripcion FROM cos_unidad order by descripcion";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["descripcion"].'"';
if($_POST["busq"]==$filapro["descripcion"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["descripcion"].'</option>';   
}
					
}else{
	echo"<option value=''>Todo</option>";
	$ssql="SELECT id_uni, descripcion FROM cos_unidad order by descripcion";
}
					
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[1]'>$fila[1]"; 
					}
					echo "</select>";
					?>
</td>
<td><input class="form-control" name="precioventalocal2" type="text" placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="canti_2" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="peso_uni_2" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="peso_tota_kg_2" type="text" placeholder="0.00" readonly="readonly" /></td>
<td><input class="form-control" name="valorfact_2" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" type="text" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="total_impo_2" type="text" placeholder="0.00" readonly="readonly" /></td>
<td><input class="form-control" name="porc_costo_2" type="text" placeholder="0.00" readonly="readonly" /></td>
</tr>
<tr>
<td>3.</td>
<td><input class="form-control" name="partida_3" type="text" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="partida_3A" type="text" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="descri_3" type="text" /></td>
<td><!-- <input class="form-control" name="uni_1" type="text" /> -->
 <?
echo "<select name='uni_3' class='form-control'>"; 
if ($busx2!=''){
	echo"<option value=''></option>";
	$querypro = "SELECT id_uni, decripcion FROM cos_unidad order by descripcion";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["descripcion"].'"';
if($_POST["busq"]==$filapro["descripcion"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["descripcion"].'</option>';   
}
					
}else{
	echo"<option value=''>Todo</option>";
	$ssql="SELECT id_uni, descripcion FROM cos_unidad order by descripcion";
}
					
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[1]'>$fila[1]"; 
					}
					echo "</select>";
					?>
</td>
<td><input class="form-control" name="precioventalocal3" type="text" placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="canti_3" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="peso_uni_3" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="peso_tota_kg_3" type="text" placeholder="0.00" readonly="readonly" /></td>
<td><input class="form-control" name="valorfact_3" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" type="text" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="total_impo_3" type="text" placeholder="0.00" readonly="readonly" /></td>
<td><input class="form-control" name="porc_costo_3" type="text" placeholder="0.00" readonly="readonly" /></td>
</tr>
<tr>
<td>4.</td>
<td><input class="form-control" name="partida_4" type="text" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="partida_4A" type="text" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="descri_4" type="text" /></td>
<td><!-- <input class="form-control" name="uni_1" type="text" /> -->
 <?
echo "<select name='uni_4' class='form-control'>"; 
if ($busx2!=''){
	echo"<option value=''></option>";
	$querypro = "SELECT id_uni, decripcion FROM cos_unidad order by descripcion";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["descripcion"].'"';
if($_POST["busq"]==$filapro["descripcion"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["descripcion"].'</option>';   
}
					
}else{
	echo"<option value=''>Todo</option>";
	$ssql="SELECT id_uni, descripcion FROM cos_unidad order by descripcion";
}
					
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[1]'>$fila[1]"; 
					}
					echo "</select>";
					?>
</td>
<td><input class="form-control" name="precioventalocal4" type="text" placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="canti_4" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="peso_uni_4" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="peso_tota_kg_4" type="text" placeholder="0.00" readonly="readonly" /></td>
<td><input class="form-control" name="valorfact_4" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" type="text" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="total_impo_4" type="text" placeholder="0.00" readonly="readonly" /></td>
<td><input class="form-control" name="porc_costo_4" type="text" placeholder="0.00" readonly="readonly" /></td>
</tr>
 
<tr>
<td>5.</td>
<td><input class="form-control" name="partida_5" type="text" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="partida_5A" type="text" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="descri_5" type="text" /></td>
<td><!-- <input class="form-control" name="uni_1" type="text" /> -->
 <?
echo "<select name='uni_5' class='form-control'>"; 
if ($busx2!=''){
	echo"<option value=''></option>";
	$querypro = "SELECT id_uni, decripcion FROM cos_unidad order by descripcion";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["descripcion"].'"';
if($_POST["busq"]==$filapro["descripcion"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["descripcion"].'</option>';   
}
					
}else{
	echo"<option value=''>Todo</option>";
	$ssql="SELECT id_uni, descripcion FROM cos_unidad order by descripcion";
}
					
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[1]'>$fila[1]"; 
					}
					echo "</select>";
					?>
</td>
<td><input class="form-control" name="precioventalocal5" type="text" placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="canti_5" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="peso_uni_5" type="text" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="peso_tota_kg_5" type="text" placeholder="0.00" readonly="readonly" /></td>
<td><input class="form-control" name="valorfact_5" onFocus="Sumar();" onBlur="NoSumar();"  placeholder="0.00" type="text" onkeypress="return NumCheck(event, this)" /></td>
<td><input class="form-control" name="total_impo_5" type="text" placeholder="0.00" readonly="readonly" /></td>
<td><input class="form-control" name="porc_costo_5" type="text" placeholder="0.00" readonly="readonly" />
<input class="form-control" name="total_todo" type="hidden"  readonly="readonly" />
</td>
</tr>
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