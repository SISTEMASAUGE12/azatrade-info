<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";

$codi = $_GET["info"];

$sum="SELECT
sum(cos_expo_prod_detalle.cantidad) as cantidades,
sum(cos_expo_prod_detalle.peso_total_kg) as pesototal
FROM
cos_expo_prod_detalle
WHERE
cos_expo_prod_detalle.id_prod = '$codi'";
 $rs = mysql_query($sum);
if (mysql_num_rows($rs) > 0){
	while($rows = mysql_fetch_array($rs)){
		$cant = $rows["cantidades"];
		$peso = $rows["pesototal"];
	}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script language="javascript" type="text/javascript">
function valida(lista) {
    if (lista.direfabri.value.length < 1){
		alert("Ingrese Direccion de Fabrica");
		return false;
	}
	if (lista.direalmapre.value.length < 1){
		alert("Ingrese Direccion Almacen Preembarque");
		return false;
	}
	if (lista.puertoo.value.length < 1){
		alert("Seleccione Puerto Origen");
		return false;
	}
	if (lista.origenca.value.length < 1){
		alert("Seleccione Origen / Pais \n Punto de Cargue");
		return false;
	}
	if (lista.destinodes.value.length < 1){
		alert("Seleccione Destino / Pais \n Punto de Desembarque / Entrega");
		return false;
	}
	if (lista.direalmaent.value.length < 1){
		alert("Direccion Almacen Entrega");
		return false;
	}
	if (lista.pdestino.value.length < 1){
		alert("Seleccione Puerto Destino");
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
<input class="form-control btn-primary" type="button" value="C&aacute;lculo de Costo de Importaci&oacute;n. Paso : 6 de 8" />

<table class="table table-hover" style='font-size:80%'>
  <tr>
   <td colspan="15" align="center"><h4><b>Empaque y Embalaje (Dimensiones en m.)</b></h4> </td>
  </tr>
 <tr>
  <td bgcolor="#E9E9E9" align="center">#</td>
  <td bgcolor="#E9E9E9" align="center">Descripcion del Producto</td>
  <td bgcolor="#E9E9E9" align="center">Empaque</td>
  <td bgcolor="#E9E9E9" align="center">Cantidad</td>
  <td bgcolor="#E9E9E9" align="center">Dimension en Ancho</td>
  <td bgcolor="#E9E9E9" align="center">Dimension en Largo</td>
  <td bgcolor="#E9E9E9" align="center">Dimension en Alto</td>
  <td bgcolor="#E9E9E9" align="center">Volumen por Unidad</td>
  <td bgcolor="#E9E9E9" align="center">Total Volumen Unidad</td>
  <td bgcolor="#E9E9E9" align="center">Costo Empaque</td>
  <td bgcolor="#E9E9E9" align="center">Total Costo Empaque</td>
  <td bgcolor="#E9E9E9" align="center">Costo Embalaje</td>
  <td bgcolor="#E9E9E9" align="center">Total Costo Embalaje</td>
  <td bgcolor="#E9E9E9" align="center">Peso Embalaje (Kg.)</td>
  <td bgcolor="#E9E9E9" align="center">Total Peso Embalaje (Kg.)</td>
  </tr>
  
  <?php
  $sqlvc="SELECT
cos_expo_empaque.id_em,
cos_expo_empaque.id_prod_em,
cos_expo_empaque.producto_em,
cos_expo_empaque.unid_em,
cos_expo_empaque.cantidad_em,
cos_expo_empaque.dim_ancho_em,
cos_expo_empaque.dim_largo_em,
cos_expo_empaque.dim_alto_em,
cos_expo_empaque.unid_volum_em,
cos_expo_empaque.vol_unid_em,
cos_expo_empaque.precio_empaque,
cos_expo_empaque.costo_empaque,
cos_expo_empaque.precio_embalaje,
cos_expo_empaque.costo_embalaje,
cos_expo_empaque.kilo_embalaje,
cos_expo_empaque.peso_embalaje
FROM
cos_expo_empaque
WHERE
cos_expo_empaque.id_prod_em = '$codi'
ORDER BY
cos_expo_empaque.id_em ASC ";
   $rsnvc = mysql_query($sqlvc);
if (mysql_num_rows($rsnvc) > 0){
	
	while($rowvc = mysql_fetch_array($rsnvc)){
		$items = $items + 1;
		$codiprod = $rowvc["id_prod_em"];
		$descri = $rowvc["producto_em"];
		$uni = $rowvc["unid_em"];
		$cantiempa = $rowvc["cantidad_em"];
		$ancho = $rowvc["dim_ancho_em"];
		$largo = $rowvc["dim_largo_em"];
		$alto = $rowvc["dim_alto_em"];
		$voluni = $rowvc["unid_volum_em"];
		$tota_voluni = $rowvc["vol_unid_em"];
		$costoemp = $rowvc["precio_empaque"];
		$tota_costoemp = $rowvc["costo_empaque"];
		$costoemb = $rowvc["precio_embalaje"];
		$tota_costoemb = $rowvc["costo_embalaje"];
		$pesoemb = $rowvc["kilo_embalaje"];
		$tota_pesoemb = $rowvc["peso_embalaje"];
		
		$sumacanti = $sumacanti + $rowvc["cantidad_em"];
		$totavolemp = $totavolemp + $rowvc["vol_unid_em"];
		$totalcostoemp = $totalcostoemp + $rowvc["costo_empaque"];
		$totalcostoemba = $totalcostoemba + $rowvc["costo_embalaje"];
		$totalpesoemb = $totalpesoemb + $rowvc["peso_embalaje"];
		
		echo "<tr>";
		echo "<td><b>$items</b></td>";
		echo "<td>$descri</td>";
		echo "<td>$uni</td>";
		echo "<td align='center'>$cantiempa</td>";
		echo "<td align='center'>$ancho</td>";
		echo "<td align='center'>$largo</td>";
		echo "<td align='center'>$alto</td>";
		echo "<td align='center'>$voluni</td>";
		echo "<td align='center'>$tota_voluni</td>";
		echo "<td align='center'>$costoemp</td>";
		echo "<td align='center'>$tota_costoemp</td>";
		echo "<td align='center'>$costoemb</td>";
		echo "<td align='center'>$tota_costoemb</td>";
		echo "<td align='center'>$pesoemb</td>";
		echo "<td align='center'>$tota_pesoemb</td>";
		
		echo "</tr>";
		}
		echo "<tr>";
		echo "<td colspan='3' align='right'> <b>Total</b> &nbsp; &nbsp; &nbsp;</td>";
		//echo "<td align='center'><input class='btn-info' type='button' value='".number_format($sumacanti,3,".",",")."' /></td>";
		echo "<td align='center'></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td align='center'><input class='btn-info' type='button' value='".number_format($totavolemp,3,".",",")."' /></td>";
		echo "<td></td>";
		echo "<td align='center'><input class='btn-info' type='button' value='".number_format($totalcostoemp,3,".",",")."' /></td>";
		echo "<td></td>";
		echo "<td align='center'><input class='btn-info' type='button' value='".number_format($totalcostoemba,3,".",",")."' /></td>";
		echo "<td></td>";
		echo "<td align='center'><input class='btn-info' type='button' value='".number_format($totalpesoemb,3,".",",")."' /></td>";
		echo "</tr>";
		}
  ?>
  </table>
  
  
  <table class="table table-hover" style='font-size:80%'>
  <tr>
  <td colspan="14" align="center"><h4><b>Unitarizacion - Paletizacion (Dimensiones en m.)</b></h4> </td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center">#</td>
  <td bgcolor="#E9E9E9" align="center">Descripcion del Producto</td>
  <td bgcolor="#E9E9E9" align="center">Unidad Carga</td>
  <td bgcolor="#E9E9E9" align="center">Cantidad</td>
  <td bgcolor="#E9E9E9" align="center">Dimension en Ancho</td>
  <td bgcolor="#E9E9E9" align="center">Dimension en Largo</td>
  <td bgcolor="#E9E9E9" align="center">Dimension en Alto</td>
  <td bgcolor="#E9E9E9" align="center">Volumen por Unidad</td>
  <td bgcolor="#E9E9E9" align="center">Total Volumen Unidad</td>
  <td bgcolor="#E9E9E9" align="center">Costo Unitarizacion</td>
  <td bgcolor="#E9E9E9" align="center">Total Costo Unitarizacion</td>
  <td bgcolor="#E9E9E9" align="center">Peso Paletizacion (Kg.)</td>
  <td bgcolor="#E9E9E9" align="center">Total Peso Paletizacion (Kg.)</td>
  </tr>
  <?php
  $sqlpaleti="SELECT
cos_expo_paletizacion.id_pale,
cos_expo_paletizacion.id_prod_pale,
cos_expo_paletizacion.producto_pale,
cos_expo_paletizacion.unid_carga_pale,
cos_expo_paletizacion.cantidad_pale,
cos_expo_paletizacion.dim_ancho_pale,
cos_expo_paletizacion.dim_largo_pale,
cos_expo_paletizacion.dim_alto_pale,
cos_expo_paletizacion.vol_unid_pale,
cos_expo_paletizacion.tota_volum_pale,
cos_expo_paletizacion.costo_unita_pale,
cos_expo_paletizacion.tota_unita_pale,
cos_expo_paletizacion.peso_pale,
cos_expo_paletizacion.tota_peso_pale
FROM
cos_expo_paletizacion
WHERE
cos_expo_paletizacion.id_prod_pale = '$codi'
ORDER BY
cos_expo_paletizacion.id_pale ASC ";
  $rsnpal = mysql_query($sqlpaleti);
if (mysql_num_rows($rsnpal) > 0){
	while($rowpal = mysql_fetch_array($rsnpal)){
		$itemsa = $itemsa + 1;
		$codiprodu = $rowpal["id_prod"];
		$descrip = $rowpal["producto_pale"];
		$unicar = $rowpal["unid_carga_pale"];
		$cantipale = $rowpal["cantidad_pale"];
		$anchop = $rowpal["dim_ancho_pale"];
		$largop = $rowpal["dim_largo_pale"];
		$altop = $rowpal["dim_alto_pale"];
		$volunip = $rowpal["vol_unid_pale"];
		$tota_volunip = $rowpal["tota_volum_pale"];
		$costop = $rowpal["costo_unita_pale"];
		$tota_costop = $rowpal["tota_unita_pale"];
		$pesop = $rowpal["peso_pale"];
		$tota_pesop = $rowpal["tota_peso_pale"];
		
		$totvolp = $totvolp + $rowpal["tota_volum_pale"];
		$totcostop = $totcostop + $rowpal["tota_unita_pale"];
		$totpesop = $totpesop + $rowpal["tota_peso_pale"];
		
		echo"<tr>";
		echo "<td><b>$itemsa</b></td>";
		echo "<td>$descrip</td>";
		echo "<td>$unicar</td>";
		echo "<td align='center'>$cantipale</td>";
		echo "<td align='center'>$anchop</td>";
		echo "<td align='center'>$largop</td>";
		echo "<td align='center'>$altop</td>";
		echo "<td align='center'>$volunip</td>";
		echo "<td align='center'>$tota_volunip</td>";
		echo "<td align='center'>$costop</td>";
		echo "<td align='center'>$tota_costop</td>";
		echo "<td align='center'>$pesop</td>";
		echo "<td align='center'>$tota_pesop</td>";
		echo "</tr>";
	}
	echo "<tr>";
	echo "<td colspan='6' align='right'><b>Total: </b>&nbsp; &nbsp; &nbsp;</td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td><input class='btn-info' type='button' value='".number_format($totvolp,3,".",",")."' /></td>";
	echo "<td></td>";
	echo "<td><input class='btn-info' type='button' value='".number_format($totcostop,3,".",",")."' /></td>";
	echo "<td></td>";
	echo "<td><input class='btn-info' type='button' value='".number_format($totpesop,3,".",",")."' /></td>";
	echo "</tr>";
	}
  ?>
  </table>
  
  <table class="table table-hover" style='font-size:80%'>
  <tr>
 <td colspan="15" align="center"><h4><b>Unitarizacion - Contenedorizacion (Dimensiones en m.)</b></h4> </td>
  </tr>
  <tr>
 <td bgcolor="#E9E9E9" align="center">#</td>
  <td bgcolor="#E9E9E9" align="center">Descripcion del Producto</td>
  <td bgcolor="#E9E9E9" align="center">Tipo Contenedor</td>
  <td bgcolor="#E9E9E9" align="center">Condicion</td>
  <td bgcolor="#E9E9E9" align="center">Cantidad</td>
  <td bgcolor="#E9E9E9" align="center">Dimension en Ancho</td>
  <td bgcolor="#E9E9E9" align="center">Dimension en Largo</td>
  <td bgcolor="#E9E9E9" align="center">Dimension en Alto</td>
  <td bgcolor="#E9E9E9" align="center">Pulgadas</td>
  <td bgcolor="#E9E9E9" align="center">Carga Permisible (Kg.)</td>
  <td bgcolor="#E9E9E9" align="center">Total Cargar Permisible (Kg.)</td>
  <td bgcolor="#E9E9E9" align="center">Volumen Permisible</td>
  <td bgcolor="#E9E9E9" align="center">Total Volumen Permisible</td>
  <td bgcolor="#E9E9E9" align="center">Costo Unitarizacion</td>
  <td bgcolor="#E9E9E9" align="center">Total Costo Unitarizacion</td>
  </tr>
  <?php
 /* $sqlconte="SELECT
uni.id_prod_unita,
GROUP_CONCAT(uni.producto_unita) AS descriprod,
uni.contenedor_unita,
uni.condicion_unita,
uni.pulgada,
uni.costo_unita_unita,
cont.contenedor,
cont.carga_pesokg,
cont.carga_volumen,
cont.med_int_largom,
cont.med_int_pies1,
cont.med_int_anchom,
cont.med_int_pies2,
cont.med_int_alturam,
cont.med_int_pies3,
cont.descripcion,
uni.canti_unita
FROM
cos_union_contenedor AS uni
INNER JOIN cos_contenedor AS cont ON uni.contenedor_unita = cont.codigo
WHERE
uni.id_prod_unita = '$codi'
GROUP BY
uni.id_prod_unita,
uni.contenedor_unita
ORDER BY
uni.id_unita ASC ";*/

 $sqlconte="SELECT
uni.id_prod_unita,
uni.producto_unita AS descriprod,
uni.contenedor_unita,
uni.condicion_unita,
uni.pulgada,
uni.costo_unita_unita,
cont.contenedor,
cont.carga_pesokg,
cont.carga_volumen,
cont.med_int_largom,
cont.med_int_pies1,
cont.med_int_anchom,
cont.med_int_pies2,
cont.med_int_alturam,
cont.med_int_pies3,
cont.descripcion,
uni.canti_unita
FROM
cos_expo_union_conte AS uni
INNER JOIN cos_contenedor AS cont ON uni.contenedor_unita = cont.codigo
WHERE
uni.id_prod_unita = '$codi'
ORDER BY
uni.id_unita ASC ";
   $rsnunico = mysql_query($sqlconte);
if (mysql_num_rows($rsnunico) > 0){
	while($rowu = mysql_fetch_array($rsnunico)){
		$itemsu = $itemsu + 1;
		$cprodu = $rowu["id_prod_unita"];
		$codiconte = $rowu["contenedor_unita"];
		
		$nomproduc = $rowu["descriprod"];
		$contenedor = $rowu["contenedor"];
		$condicion = $rowu["condicion_unita"];
		$cantidadconte = $rowu["canti_unita"];
		$ancho_conte = $rowu["med_int_anchom"];
		$largo_conte = $rowu["med_int_largom"];
		$alto_conte = $rowu["med_int_alturam"];
		$pulga = $rowu["pulgada"];
		$cargapeso_conte = $rowu["carga_pesokg"];
		$cargavolu_conte = $rowu["carga_volumen"];
		$costo_conte = $rowu["costo_unita_unita"];
		
		$tota_carga_permi = $cantidadconte * $cargapeso_conte;
		$tota_cargavolu_conte = $cantidadconte * $cargavolu_conte;
		$tota_costo_conte = $cantidadconte * $costo_conte;
		
		$totalesgeneralA = $totalesgeneralA + $tota_carga_permi;
		$totalesgeneralB = $totalesgeneralB + $tota_cargavolu_conte;
		$totalesgeneralC = $totalesgeneralC + $tota_costo_conte;
		
		echo"<tr>";
		
		echo "<td><b>$itemsu</b></td>";
		echo "<td>$nomproduc</td>";
		echo "<td>$contenedor</td>";
		echo "<td>$condicion</td>";
		echo "<td>$cantidadconte</td>";
		echo "<td>$ancho_conte</td>";
		echo "<td>$largo_conte</td>";
		echo "<td>$alto_conte</td>";
		echo "<td>$pulga</td>";
		echo "<td>$cargapeso_conte</td>";
		echo "<td>$tota_carga_permi</td>";
		echo "<td>$cargavolu_conte</td>";
		echo "<td>$tota_cargavolu_conte</td>";
		echo "<td>$costo_conte</td>";
		echo "<td>$tota_costo_conte</td>";
		
		echo"</tr>";
	}
echo "<tr>";
	echo "<td colspan='9' align='right'><b>Total: </b>&nbsp; &nbsp; &nbsp;</td>";
	echo "<td></td>";
	echo "<td><input class='btn-info' type='button' value='".number_format($totalesgeneralA,3,".",",")."' /></td>";
	echo "<td></td>";
	echo "<td><input class='btn-info' type='button' value='".number_format($totalesgeneralB,3,".",",")."' /></td>";
	echo "<td></td>";
	echo "<td><input class='btn-info' type='button' value='".number_format($totalesgeneralC,3,".",",")."' /></td>";
	echo "</tr>";
	}
  ?>
  
  </table>
  
  <?php
  //$r1 = number_format($peso + $totavolemp + $totpesop,3,".",",");
  // $r1 = $peso + $totalpesoemb + $totpesop ;
   $r1 = $peso;
  $r2 = $cant;
  $r3 = $totavolemp;
  ?>
  
<form name="lista" method="post" onSubmit="return valida(this);" action="inserinfoadici.php" > 

  <table class="table table-hover" style='font-size:80%'>
  <tr>
 <td colspan="4" align="center"><h4><b>Informacion Adicional</b></h4> </td>
  </tr>
  <tr>
  <td>Direccion Fabrica:</td><td><input class="form-control" name="direfabri" type="text" />
  <input class="form-control" name="codip" type="hidden" value="<?php echo "$cprodu"; ?>" />
  </td>
  <td>Direccion Almacen Preembarque:</td><td><input class="form-control" name="direalmapre" type="text" /></td>
  </tr>
  <tr>
  <td>Origen / Pais - Punto de Cargue:</td>
  <td>
  <?php
  echo "<select name='origenca' class='form-control'>"; 
	echo"<option value=''>Todo</option>";
	$ssql="SELECT puerto.idpais, puerto.descripcion FROM puerto WHERE puerto.descripcion <> '---' and  puerto.descripcion <> '' GROUP BY puerto.idpais, puerto.descripcion ORDER BY puerto.descripcion ASC";
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[1]'>$fila[1]"; 
					}
					echo "</select>";
  ?>
  
  
  </td>
  <td>Puerto Origen:</td> 
  <td>
  <?php
  echo "<select name='puertoo' class='form-control'>"; 
	echo"<option value=''>Todo</option>";
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
  <td>Puerto Destino: </td>
  <td>
   <?php
  echo "<select name='pdestino' class='form-control'>"; 
	echo"<option value=''>Todo</option>";
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
  <td>Destino / Pais - Punto de desembarque / Entrega: </td><td>
  <?php
  echo "<select name='destinodes' class='form-control'>"; 
	echo"<option value=''>Todo</option>";
	$ssql="SELECT puerto.idpais, puerto.descripcion FROM puerto WHERE puerto.descripcion <> '---' and  puerto.descripcion <> '' GROUP BY puerto.idpais, puerto.descripcion ORDER BY puerto.descripcion ASC";
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[1]'>$fila[1]"; 
					}
					echo "</select>";
  ?>
  </td>
  </tr>
  <tr>
  <td>Direccion Almacen Entrega:</td><td><input class="form-control" name="direalmaent" type="text" /></td>
  </tr>
  </table>
  
  
  <table class="table table-hover" style='font-size:80%'>
  <tr> 
   <td>Unidades Comerciales:</td>
   <td>
   <input class="btn btn-info" name="unidcomer" type="text" value="<?php echo number_format("$r2",3,".",","); ?>" readonly="readonly" />
   </td>
   
   <td>Peso Total (Kg. Ton.)</td><td><input class="btn btn-info" name="pesoto" type="text" value="<?php echo number_format("$r1",3,".",","); ?>" readonly="readonly" /></td>
   
    <td>Volumen Total Embarque CM3-M3</td><td><input class="btn btn-info" name="voltoemba" type="text" value="<?php echo number_format("$r3",3,".",","); ?>" readonly="readonly" /></td>
</tr>
<tr>
  <td colspan="6" align="center">
  <input class="btn btn-primary" type="button" value="Modificar Unitarizacion - Contenedorizacion" name="Modificar Lista Contenedor" onclick="history.back()" />
  <input class="btn btn-success" name="guardar" type="submit" value=" Validar / Ingresar Informacion Adicional"  /></td>
  </tr>
 </table>
</form>


</body>
</html>
<?php
include("pie.php");
?>