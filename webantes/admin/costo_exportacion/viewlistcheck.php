<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";

$codigox = $_GET["tif"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Exportacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript">
function imprSelec(muestra)
{
	var ficha=document.getElementById(muestra);
	var ventimp=window.open(' ','popimpr');
	 ventimp.document.write('<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />');
	ventimp.document.write(ficha.innerHTML);ventimp.document.close();
	ventimp.print();
	ventimp.close();}
</script>

</head>

<body>
<br /><br /><br />
<div id="muestra"> 
<table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td bgcolor="#E9E9E9" colspan="5" align="center"><h5><b>LISTA DE CHEQUEO PARA LA MATRIZ DE COSTOS DE D.F.I.</b></h5> </td>
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
$sqllista="SELECT
cos_expo_detalista.id_lis,
cos_expo_listachekeo.orden,
cos_expo_detalista.cod_lis,
cos_expo_listachekeo.descripcion,
cos_expo_detalista.id_prod,
DATE_FORMAT(cos_expo_detalista.fecha, '%d/%m/%Y') as fecha,
cos_expo_detalista.observa,
cos_expo_detalista.des_puntaje,
cos_expo_detalista.valor_puntaje,
cos_expo_listachekeo.grupo,
cos_expo_listachekeo.id_lista
FROM
cos_expo_detalista
RIGHT OUTER JOIN cos_expo_listachekeo ON cos_expo_detalista.cod_lis = cos_expo_listachekeo.id_lista
WHERE
cos_expo_detalista.id_prod = '$codigox'
ORDER BY
cos_expo_listachekeo.id_lista ASC";
 $rsnl = mysql_query($sqllista);
if (mysql_num_rows($rsnl) > 0){
	while($rown = mysql_fetch_array($rsnl)){
		$cuenta = $cuenta + 1;
		$orden = $rown["orden"];
		$descri = $rown["descripcion"];
		$fecha = $rown["fecha"];
		$obser = $rown["observa"];
		$despun = $rown["des_puntaje"];
		$valpun = $rown["valor_puntaje"];
		
		if($cuenta=='2'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>01.- INFORMACION SOBRE EL EMBARQUE</b></td>";
			echo "</tr>";
		}
		if($cuenta=='5'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>02.- EMPAQUE</b></td>";
			echo "</tr>";
		}
		if($cuenta=='12'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>03.- EMBALAJE</b></td>";
			echo "</tr>";
		}
		if($cuenta=='16'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>04.- DOCUMENTACION</b></td>";
			echo "</tr>";
		}
		if($cuenta=='36'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>05.- UNITARIZACION</b></td>";
			echo "</tr>";
		}
		if($cuenta=='43'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>06.- MANIPULACION DE LA CARGA EN EL LOCAL DEL EXPORTADOR</b></td>";
			echo "</tr>";
		}
		if($cuenta=='45'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>07.- TRANSPORTE INTERNO</b></td>";
			echo "</tr>";
		}
		if($cuenta=='55'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>08.- SEGURO INTERNO</b></td>";
			echo "</tr>";
		}
		if($cuenta=='61'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>09.- ALMACENAMIENTO</b></td>";
			echo "</tr>";
		}
		if($cuenta=='63'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>10.- MANIPULACION EN EL LUGAR DE EMBARQUE</b></td>";
			echo "</tr>";
		}
		if($cuenta=='68'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>11.- ADUANEROS</b></td>";
			echo "</tr>";
		}
		if($cuenta=='71'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>12.- BANCARIOS</b></td>";
			echo "</tr>";
		}
		if($cuenta=='79'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>13.- AGENTES</b></td>";
			echo "</tr>";
		}
		if($cuenta=='85'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>14.- TRANSPORTE INTERNACIONAL</b></td>";
			echo "</tr>";
		}
		if($cuenta=='98'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>15.- SEGURO INTERNACIONAL</b></td>";
			echo "</tr>";
		}
		if($cuenta=='101'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>16.- ADMINISTRATIVOS</b></td>";
			echo "</tr>";
		}
		if($cuenta=='104'){
			echo "<tr>";
			echo "<td bgcolor='#DDDDDD' colspan='5'><b>17.- CAPITAL DE INVENTARIO</b></td>";
			echo "</tr>";
		}
		
		echo "<tr>";
		echo "<td width='5%'>$orden</td>";
		echo "<td width='45%'>$descri</td>";
		echo "<td width='8%'>$fecha</td>";
		echo "<td>$obser</td>";
		echo "<td width='10%'>$despun</td>";
		echo "</tr>";
		
	}
}
?>
  </table>
  
  <?php
  /* cuenta cuantos si hay*/
  $sqlsi="SELECT ced.id_prod, ced.des_puntaje, Count(ced.des_puntaje) AS tot FROM cos_expo_detalista AS ced WHERE ced.id_prod = '$codigox' AND ced.des_puntaje = 'SI' GROUP BY ced.id_prod, ced.des_puntaje";
   $rsnsi = mysql_query($sqlsi);
if (mysql_num_rows($rsnsi) > 0){
	while($rowsi = mysql_fetch_array($rsnsi)){
		$si = $rowsi["tot"];
	}
}else{
	$si = "0";
}

/* cuenta cuantos no hay*/
  $sqlno="SELECT ced.id_prod, ced.des_puntaje, Count(ced.des_puntaje) AS tot FROM cos_expo_detalista AS ced WHERE ced.id_prod = '$codigox' AND ced.des_puntaje = 'NO' GROUP BY ced.id_prod, ced.des_puntaje";
   $rsnno = mysql_query($sqlno);
if (mysql_num_rows($rsnno) > 0){
	while($rowno = mysql_fetch_array($rsnno)){
		$no = $rowno["tot"];
	}
}else{
	$no = "0";
}

/* cuenta cuantos no requeridos hay*/
  $sqlnore="SELECT ced.id_prod, ced.des_puntaje, Count(ced.des_puntaje) AS tot FROM cos_expo_detalista AS ced WHERE ced.id_prod = '$codigox' AND ced.des_puntaje = 'NO REQUERIDO' GROUP BY ced.id_prod, ced.des_puntaje";
   $rsnnore = mysql_query($sqlnore);
if (mysql_num_rows($rsnnore) > 0){
	while($rownore = mysql_fetch_array($rsnnore)){
		$nore = $rownore["tot"];
	}
}else{
	$nore = "0";
}


$si_resul = ($si /($si +$no)) * 100;

/* intval extrae solo numeros enteros*/
$condi = intval($si_resul);
if($condi>='100'){
	$mensa="CALIFICADO PARA EXPORTAR";
	$class="btn btn-success";
}else if($condi>='76' and $condi<='99'){
	$mensa="DESCALIFICADO BAJO";
	$class="btn btn-info";
}else if($condi>='51' and $condi<='75'){
	$mensa="DESCALIFICADO MEDIO";
	$class="btn btn-warning";
}else if($condi>='0' and $condi<='50'){
	$mensa="DESCALIFICADO ALTO";
	$class="btn btn-danger";
}
  ?>
  
    
    
  <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
  <td align="center"><b>Usted Tiene: <?PHP echo"$si"; ?> Si Seleccionados (<?php echo "".number_format("$si_resul %",2,".",",").""; ?>%) |  <?PHP echo"$no"; ?> No  |  <?PHP echo"$nore"; ?> No Requeridos en Total.</b></td>
  </tr>
  <tr>
  <td align="center"><input class="<?php echo"$class"; ?> form-control " type="button" value="<?php echo"$mensa";?>"  /></td>
  </tr>
  </table>
  </div>
<input class="btn btn-success" name="guardar" type="button" value=" Imprimir Lista" onclick="javascript:imprSelec('muestra')"  />
  
</body>
</html>
<?php
include("pie.php");
?>