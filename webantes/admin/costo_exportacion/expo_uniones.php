<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";

$codi = $_GET["tif"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script language="javascript" type="text/javascript">
function valida(union) {
	/*fila numero 1*/
    if (union.empaque1.value.length < 1){
		alert("Seleccione Union de Empaque \n Fila #1");
		return false;
	}
	 if (union.paletiza1.value.length < 1){
		alert("Seleccione Union de Paletizacion \n Fila #1");
		return false;
	}
	if (union.contenedor1.value.length < 1){
		alert("Seleccione Union de Contenedores \n Fila #1");
		return false;
	}
	/*fila numero 2*/
    if (union.empaque2.value.length < 1){
		alert("Seleccione Union de Empaque \n Fila #2");
		return false;
	}
	 if (union.paletiza2.value.length < 1){
		alert("Seleccione Union de Paletizacion \n Fila #2");
		return false;
	}
	if (union.contenedor2.value.length < 1){
		alert("Seleccione Union de Contenedores \n Fila #2");
		return false;
	}
	/*fila numero 3*/
    if (union.empaque3.value.length < 1){
		alert("Seleccione Union de Empaque \n Fila #3");
		return false;
	}
	 if (union.paletiza3.value.length < 1){
		alert("Seleccione Union de Paletizacion \n Fila #3");
		return false;
	}
	if (union.contenedor3.value.length < 1){
		alert("Seleccione Union de Contenedores \n Fila #3");
		return false;
	}
	/*fila numero 4*/
    if (union.empaque4.value.length < 1){
		alert("Seleccione Union de Empaque \n Fila #4");
		return false;
	}
	 if (union.paletiza4.value.length < 1){
		alert("Seleccione Union de Paletizacion \n Fila #4");
		return false;
	}
	if (union.contenedor4.value.length < 1){
		alert("Seleccione Union de Contenedores \n Fila #4");
		return false;
	}
	/*fila numero 5*/
    if (union.empaque5.value.length < 1){
		alert("Seleccione Union de Empaque \n Fila #5");
		return false;
	}
	 if (union.paletiza5.value.length < 1){
		alert("Seleccione Union de Paletizacion \n Fila #5");
		return false;
	}
	if (union.contenedor5.value.length < 1){
		alert("Seleccione Union de Contenedores \n Fila #5");
		return false;
	}
	
	
	return true;
}
</script>

</head>

<body>
<br /><br />
<input class="form-control btn-primary" type="button" value="C&aacute;lculo de Costo de Exportaci&oacute;n. Paso : 2 de 8" />
<form name="union" method="post" onSubmit="return valida(this);" action="updateunion.php" > 

<table class="table table-hover" style='font-size:80%'>
  <tr>
   <td colspan="14" align="center">Uniendo Productos (Empaque / Paletizacion / Contenedorizacion)</td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center">#</td>
  <td bgcolor="#E9E9E9" align="center">Partida (Origen)</td>
  <td bgcolor="#E9E9E9" align="center">Partida (Destino)</td>
  <td bgcolor="#E9E9E9" align="center">Descripcion del Producto</td>
  <td bgcolor="#E9E9E9" align="center">Unid. Comercial</td>
  <td bgcolor="#E9E9E9" align="center">Cantidad</td>
  <td bgcolor="#E9E9E9" align="center">Peso Por Unid.(Kg)</td>
  <td bgcolor="#E9E9E9" align="center">Peso Total (Kg.)</td>
  <td bgcolor="#E9E9E9" align="center">Valor Ex-Works</td>
  <td bgcolor="#E9E9E9" align="center">Total Ex-Works</td>
  <td bgcolor="#E9E9E9" align="center">% Costo</td>
  <td bgcolor="#E9E9E9" align="center">Union Empaque</td>
  <td bgcolor="#E9E9E9" align="center">Union Paletizacion</td>
  <td bgcolor="#E9E9E9" align="center">Union Contenedor</td>
  </tr>
  
  <?php
  $sqlv="SELECT
prod.id_prod,
prod.nom_prov,
prod.nom_cont,
prod.correo_web,
prod.pais,
prod.tipo_cambio,
prod.valor_uit,
prod.sobre_tasa_adic,
prod.rebaja_aranc,
prod.tasa_desp,
prod.recargo_num,
prod.percepcion,
prod.moneda,
prod.t_compra,
prod.t_transporte,
prodet.id_detalle,
prodet.id_prod,
prodet.partidaA,
prodet.partidaB,
prodet.nomproducto,
prodet.cantidad,
prodet.unidad_comerc,
prodet.peso_unidad_kg,
prodet.peso_total_kg,
prodet.valor_factura,
prodet.total_factura,
prodet.porcent_costo
FROM
cos_expo_producto AS prod
INNER JOIN cos_expo_prod_detalle AS prodet ON prod.id_prod = prodet.id_prod
WHERE
prod.id_prod = '$codi'
ORDER BY
prodet.id_detalle ASC ";
  $rsnv = mysql_query($sqlv);
if (mysql_num_rows($rsnv) > 0){
	
	while($rowv = mysql_fetch_array($rsnv)){
		
		$items = $items + 1;
		$codideta = $rowv["id_detalle"];
		$idprod = $rowv["id_prod"];
		$partiA = $rowv["partidaA"];
		$partiB = $rowv["partidaB"]; 
		$nomprod = $rowv["nomproducto"]; 
		$unic = $rowv["unidad_comerc"];
		$canti = $rowv["cantidad"];
		$pesouni = $rowv["peso_unidad_kg"];
		$totalpeso = $rowv["peso_total_kg"];
		$valorf = $rowv["valor_factura"];
		$totalf = $rowv["total_factura"];
		$pcosto = $rowv["porcent_costo"];
		
		echo "<tr>";
		echo "<td>$items</td>";
		echo "<td>$partiA</td>";
		echo "<td>$partiB</td>";
		echo "<td>$nomprod</td>";
		echo "<td>$unic</td>";
		echo "<td align='center'>".number_format("$canti",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$pesouni",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalpeso",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valorf",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalf",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$pcosto",2,".",",")."
		<input name='idprod' type='hidden' value='$idprod' />
		</td>";
		if($items == '1'){
		echo "<td>
		<input name='fila1' type='hidden' value='$items' />
		<input name='codi1' type='hidden' value='$codideta' />
		<select class='form-control' name='empaque1'>
                   <option value=''> Seleccione Union </option>
                   <option value='A'>Grupo A</option>
                   <option value='B'>Grupo B</option>
				   <option value='C'>Grupo C</option>
				   <option value='D'>Grupo D</option>
				   <option value='E'>Grupo E</option>
                   </select></td>";
	 
	 	echo "<td><select class='form-control' name='paletiza1'>
                   <option value=''> Seleccione Union </option>
                   <option value='A'>Clase A</option>
                   <option value='B'>Clase B</option>
				   <option value='C'>Clase C</option>
				   <option value='D'>Clase D</option>
				   <option value='E'>Clase E</option>
                   </select></td>";
				   
		 echo "<td><select class='form-control' name='contenedor1'>
                   <option value=''> Seleccione Union </option>
                   <option value='A'>Grupo A</option>
                   <option value='B'>Grupo B</option>
				   <option value='C'>Grupo C</option>
				   <option value='D'>Grupo D</option>
				   <option value='E'>Grupo E</option>
                   </select></td>";
		}
		if($items == '2'){
		echo "<td>
		<input name='fila2' type='hidden' value='$items' />
		<input name='codi2' type='hidden' value='$codideta' />
		<select class='form-control' name='empaque2'>
                   <option value=''> Seleccione Union </option>
                   <option value='A'>Grupo A</option>
                   <option value='B'>Grupo B</option>
				   <option value='C'>Grupo C</option>
				   <option value='D'>Grupo D</option>
				   <option value='E'>Grupo E</option>
                   </select></td>";
	 
	 	echo "<td><select class='form-control' name='paletiza2'>
                   <option value=''> Seleccione Union </option>
                   <option value='A'>Clase A</option>
                   <option value='B'>Clase B</option>
				   <option value='C'>Clase C</option>
				   <option value='D'>Clase D</option>
				   <option value='E'>Clase E</option>
                   </select></td>";
				   
		 echo "<td><select class='form-control' name='contenedor2'>
                   <option value=''> Seleccione Union </option>
                   <option value='A'>Grupo A</option>
                   <option value='B'>Grupo B</option>
				   <option value='C'>Grupo C</option>
				   <option value='D'>Grupo D</option>
				   <option value='E'>Grupo E</option>
                   </select></td>";
		}
		if($items == '3'){
		echo "<td>
		<input name='fila3' type='hidden' value='$items' />
		<input name='codi3' type='hidden' value='$codideta' />
		<select class='form-control' name='empaque3'>
                   <option value=''> Seleccione Union </option>
                   <option value='A'>Grupo A</option>
                   <option value='B'>Grupo B</option>
				   <option value='C'>Grupo C</option>
				   <option value='D'>Grupo D</option>
				   <option value='E'>Grupo E</option>
                   </select></td>";
	 
	 	echo "<td><select class='form-control' name='paletiza3'>
                   <option value=''> Seleccione Union </option>
                   <option value='A'>Clase A</option>
                   <option value='B'>Clase B</option>
				   <option value='C'>Clase C</option>
				   <option value='D'>Clase D</option>
				   <option value='E'>Clase E</option>
                   </select></td>";
				   
		 echo "<td><select class='form-control' name='contenedor3'>
                   <option value=''> Seleccione Union </option>
                   <option value='A'>Grupo A</option>
                   <option value='B'>Grupo B</option>
				   <option value='C'>Grupo C</option>
				   <option value='D'>Grupo D</option>
				   <option value='E'>Grupo E</option>
                   </select></td>";
		}
		if($items == '4'){
		echo "<td>
		<input name='fila4' type='hidden' value='$items' />
		<input name='codi4' type='hidden' value='$codideta' />
		<select class='form-control' name='empaque4'>
                   <option value=''> Seleccione Union </option>
                   <option value='A'>Grupo A</option>
                   <option value='B'>Grupo B</option>
				   <option value='C'>Grupo C</option>
				   <option value='D'>Grupo D</option>
				   <option value='E'>Grupo E</option>
                   </select></td>";
	 
	 	echo "<td><select class='form-control' name='paletiza4'>
                   <option value=''> Seleccione Union </option>
                   <option value='A'>Clase A</option>
                   <option value='B'>Clase B</option>
				   <option value='C'>Clase C</option>
				   <option value='D'>Clase D</option>
				   <option value='E'>Clase E</option>
                   </select></td>";
				   
		 echo "<td><select class='form-control' name='contenedor4'>
                   <option value=''> Seleccione Union </option>
                   <option value='A'>Grupo A</option>
                   <option value='B'>Grupo B</option>
				   <option value='C'>Grupo C</option>
				   <option value='D'>Grupo D</option>
				   <option value='E'>Grupo E</option>
                   </select></td>";
		}
		if($items == '5'){
		echo "<td>
		<input name='fila5' type='hidden' value='$items' />
		<input name='codi5' type='hidden' value='$codideta' />
		<select class='form-control' name='empaque5'>
                   <option value=''> Seleccione Union </option>
                   <option value='A'>Grupo A</option>
                   <option value='B'>Grupo B</option>
				   <option value='C'>Grupo C</option>
				   <option value='D'>Grupo D</option>
				   <option value='E'>Grupo E</option>
                   </select></td>";
	 
	 	echo "<td><select class='form-control' name='paletiza5'>
                   <option value=''> Seleccione Union </option>
                   <option value='A'>Clase A</option>
                   <option value='B'>Clase B</option>
				   <option value='C'>Clase C</option>
				   <option value='D'>Clase D</option>
				   <option value='E'>Clase E</option>
                   </select></td>";
				   
		 echo "<td><select class='form-control' name='contenedor5'>
                   <option value=''> Seleccione Union </option>
                   <option value='A'>Grupo A</option>
                   <option value='B'>Grupo B</option>
				   <option value='C'>Grupo C</option>
				   <option value='D'>Grupo D</option>
				   <option value='E'>Grupo E</option>
                   </select></td>";
		}
echo "</tr>";
	}
	
	}
  ?>
  <tr>
  <td colspan="14" align="center"><input class="btn btn-success" name="guardar" type="submit" value=" Validar / Ingresar Dimensiones"  /></td>
  </tr>
</table>
</form>

</body>
</html>
<?php
include("pie.php");
?>