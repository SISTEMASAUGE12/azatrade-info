<?
include ("conection/config.php");
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menuA.php");
echo"</header>";


$idreg=$_GET["prim"];


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Mercado Internacional e Indicadores</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script language="javascript" type="text/javascript">
function valida(vistaresul) {
    if (vistaresul.sector.value.length < 1){
	
		alert("Seleccione Pais de Mayor Puntaje");
		return false;
	}
	return true;
}
</script>
 
  
</head>

<body>
<br>
<div class="container">
<!--<input class="btn btn-success" type="button" value="Codigo Generado: &nbsp;&nbsp;&nbsp; 000<? //echo "$idreg";?>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;Codigo Para Futuras Consultas" /> -->

<center>
<form name="vistaresul"  method="post" action="expordataindicador.php" onsubmit="return valida(this);" >
<!-- lista datos del producto con su datos -->
<?
$sqlprod="SELECT
prod.id_prod,
prod.nom_p,
prod.des_p,
prod.pre_p,
prod.nomc_p,
prod.nomt_p,
prod.partida_p,
prod.des_ara_p,
prod.uni_p,
prod.id_sector,
se.sector
FROM
merca_temp_prod AS prod
INNER JOIN sector AS se ON prod.id_sector = se.id
WHERE
prod.id_prod = '$idreg'";
$rsprod = mysql_query($sqlprod);
if (mysql_num_rows($rsprod) > 0){
	echo "<table border='0' class='table'>";
	echo "<tr>";
echo "<td colspan='2' align='right' bgcolor='#D8D8D8'>
<h3>Codigo Generado: #$idreg </h3><br> <em><font color='#FF6600'> Guarde Su Codigo para Futuras Consultas</font></em>
</td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='2' align='center' bgcolor='#D8D8D8'>
<b>Informacion Basica del producto</b>
</td>";
echo "</tr>";
	while($rowprod = mysql_fetch_array($rsprod)){
		$idprodu = $rowprod["id_prod"];
		echo "<tr>";
		echo "<td align='right' bgcolor='#F1F1F1'>Nombre Del Producto:
		<input type='hidden' name='trimx' value='$idprodu' >		</td>";
		echo "<td>". $rowprod["nom_p"]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align='right' bgcolor='#F1F1F1'>Descripcion Del Producto:</td>";
		echo "<td>". $rowprod["des_p"]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align='right' bgcolor='#F1F1F1'>Presentacion:</td>";
		echo "<td>". $rowprod["pre_p"]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align='right' bgcolor='#F1F1F1'>Nombre Comun:</td>";
		echo "<td>". $rowprod["nomc_p"]."</td>";
		echo "</tr>";
		echo "<tr>";
	echo "<td align='right' bgcolor='#F1F1F1'>Nombre Cientifico / Tecnico:</td>";
		echo "<td>". $rowprod["nomt_p"]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align='right' bgcolor='#F1F1F1'>Sub-Partida(s):</td>";
		echo "<td>". $rowprod["partida_p"]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align='right' bgcolor='#F1F1F1'>Descripcion Arancelaria(s):</td>";
		echo "<td>". $rowprod["des_ara_p"]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align='right' bgcolor='#F1F1F1'>Unidad Comercial:</td>";
		echo "<td>". $rowprod["uni_p"]."</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td align='right' bgcolor='#F1F1F1'>Sector:</td>";
		echo "<td>". $rowprod["sector"]."</td>";
		echo "</tr>";
		}
		echo "</table>";
		}
?>

<!-- Lista de Paises Generados -->
<?
$sql_pai="SELECT
tp2.id_prod,
tp2.nom_p,
tp3.cod_pais,
tp4.pais,
CONCAT(tp4.region,' - ',tp4.income_group) AS des_pai
FROM
merca_temp_prod AS tp2
INNER JOIN merca_temp_pais AS tp3 ON tp2.id_prod = tp3.cod_prod
INNER JOIN merca_pais AS tp4 ON tp3.cod_pais = tp4.cod_pais
WHERE
tp2.id_prod = '$idreg'
ORDER BY
tp4.pais ASC";
$rspai = mysql_query($sql_pai);
if (mysql_num_rows($rspai) > 0){
	echo "<table border='0' class='table'>";
echo "<tr>";
echo "<td colspan='2' align='center' bgcolor='#D8D8D8'>
<b>Seleccion de Pais</b>
</td>";
echo "</tr>";
echo "<tr>";
echo "<td align='center' bgcolor='#F1F1F1'>Pais</td>";
echo "<td align='center' bgcolor='#F1F1F1'>Descripcion</td>";
echo "</tr>";
	while($row_pai = mysql_fetch_array($rspai)){
		echo "<tr>";
		echo "<td>". $row_pai["pais"]."</td>";
		echo "<td>". $row_pai["des_pai"]."</td>";
		echo "</tr>";
		}
		echo "</table>";
		}
?>



<br>
<!-- lista indicadores con su datos por año -->
<?
$sqldata="SELECT
tpro.id_prod,
tpro.nom_p,
ti.cod_indicadores,
ti.porcentaje,
ti.valor,
ti2.nom_indicador,
tp.cod_pais,
p.pais,
ti2.cod_indicador,
d.a2010,
d.a2011,
d.a2012,
d.a2013,
d.a2014,
ti2.origen,
tpro.des_p,
tpro.pre_p,
tpro.nomc_p,
tpro.nomt_p,
tpro.partida_p,
tpro.des_ara_p,
tpro.uni_p,
sector.sector,
tpro.id_sector
FROM
merca_temp_prod AS tpro
INNER JOIN merca_temp_indi AS ti ON tpro.id_prod = ti.cod_prod
INNER JOIN merca_indicadores AS ti2 ON ti.cod_indicadores = ti2.id
INNER JOIN merca_temp_pais AS tp ON tpro.id_prod = tp.cod_prod
INNER JOIN merca_pais AS p ON tp.cod_pais = p.cod_pais
LEFT JOIN merca_datamercado AS d ON ti2.cod_indicador = d.cod_indicador AND p.cod_pais = d.cod_pais
INNER JOIN sector ON tpro.id_sector = sector.id
WHERE
tpro.id_prod = '$idreg'
GROUP BY
tpro.id_prod,
tpro.nom_p,
ti.cod_indicadores,
ti.porcentaje,
ti.valor,
ti2.nom_indicador,
tp.cod_pais,
p.pais,
ti2.cod_indicador,
d.a2010,
d.a2011,
d.a2012,
d.a2013,
d.a2014,
ti2.origen,
tpro.des_p,
tpro.pre_p,
tpro.nomc_p,
tpro.nomt_p,
tpro.partida_p,
tpro.des_ara_p,
tpro.uni_p,
sector.sector,
tpro.id_sector
ORDER BY
p.pais,
ti2.nom_indicador ASC";
$rsnq = mysql_query($sqldata);
if (mysql_num_rows($rsnq) > 0){

echo "<table border='0' class='table table-hover'>";
echo "<tr>";
echo "<td colspan='7' align='center' bgcolor='#D8D8D8'>
<b>Valores de Los Indicadores</b>
</td>";
echo "</tr>";
echo "<tr>";
echo "<td align='center' bgcolor='#F1F1F1'>Indicador</td>";
echo "<td align='center' bgcolor='#F1F1F1'>Pais</td>";
echo "<td align='center' bgcolor='#F1F1F1'>2010</td>";
echo "<td align='center' bgcolor='#F1F1F1'>2011</td>";
echo "<td align='center' bgcolor='#F1F1F1'>2012</td>";
echo "<td align='center' bgcolor='#F1F1F1'>2013</td>";
echo "<td align='center' bgcolor='#F1F1F1'>2014</td>";
echo "</tr>";
	while($rowq = mysql_fetch_array($rsnq)){
		$id = $rowq["id_prod"];
		$nomprod = $rowq["nom_p"];
		$nomind = $rowq["nom_indicador"];
		$nompa = $rowq["pais"];
		$a2010 = $rowq["a2010"];
		$a2011 = $rowq["a2011"];
		$a2012 = $rowq["a2012"];
		$a2013 = $rowq["a2013"];
		$a2014 = $rowq["a2014"];
		
		$ori = $rowq["origen"];
		
		echo "<tr>";
	
			echo "<td>$nomind</td>";
		
		echo "<td>$nompa</td>";
//primera columna del año
if($a2010==''){
	/*if($ori==''){
echo "<td><input type='text' name'a10' value='0.000' size='7' readonly='readonly'></td>";*/
echo "<td align='center' >0.000</td>";
}else{
/*echo "<td><font color='#00CCFF'><input type='text' name'a10' value='0.000' size='7' ></font></td>";
}
}else{*/
echo "<td align='center' >$a2010</td>";
}

			
			
			//segunda columna del año
		if($a2011==''){
			/*if($ori==''){
echo "<td><input type='text' name'a11' value='0.000' size='7' readonly='readonly'></td>";
				}else{*/
		echo "<td align='center' >0.000</font></td>";
		//}
		}else{
		echo "<td align='center' >$a2011</td>";
		}
		
		//tercera columna del año
		if($a2012==''){
			/*if($ori==''){
	echo "<td><input type='text' name'a12' value='0.000' size='7' readonly='readonly'></td>";
		}else{*/
			echo "<td align='center' >0.000</font></td>";
			//}
		}else{
		echo "<td align='center' >$a2012</td>";
		}
		
		//cuarta columna del año
		if($a2013==''){
			/*if($ori==''){
	echo "<td><input type='text' name'a13' value='0.000' size='7' readonly='readonly' ></td>";
		}else{*/
	echo "<td align='center' >0.000</font></td>";
			//}
		}else{
		echo "<td align='center' >$a2013</td>";
		}
		
		//quinta columna del año
		if($a2014==''){
			/*if($ori==''){
				echo "<td><input type='text' name'a14' value='0.000' size='7' readonly='readonly'></td>";
		}else{*/
		echo "<td align='center' >0.000</font></td>";
		//}
		}else{
		echo "<td align='center' >$a2014</td>";
		}
		echo "</tr>";
		}
		echo "</table>";
		}

?>

<br><p></p>
<!-- construimos tabla de asignacion de puntaje  -->
<?
$sqlpai="SELECT
ttpro.id_prod,
ttpro.nom_p,
ttind.cod_prod,
mindi.nom_indicador,
ttind.porcentaje,
ttind.valor1,
ttind.valor2,
ttind.valor3,
ttind.valor4,
ttind.valor5,
ttind.id_indi
FROM
merca_temp_prod AS ttpro
INNER JOIN merca_temp_indi AS ttind ON ttpro.id_prod = ttind.cod_prod
INNER JOIN merca_indicadores AS mindi ON ttind.cod_indicadores = mindi.id
WHERE
ttpro.id_prod = '$idreg'";
$rsnxq = mysql_query($sqlpai);
if (mysql_num_rows($rsnxq) > 0){
	//select para mostrar los paises en fila
	
	$sqlpf="SELECT
ttp.id_prod,
ttp.nom_p,
tfil.pais1,
tfil.pais2,
tfil.pais3,
tfil.pais4,
tfil.pais5
FROM
merca_temp_prod AS ttp
INNER JOIN merca_temp_paisfila AS tfil ON ttp.id_prod = tfil.id_prod
WHERE
ttp.id_prod = '$idreg'";
	$rsnxf = mysql_query($sqlpf);
if (mysql_num_rows($rsnxf) > 0){
	while($rowqf = mysql_fetch_array($rsnxf)){
		$pa1=$rowqf["pais1"];
		$pa2=$rowqf["pais2"];
		$pa3=$rowqf["pais3"];
		$pa4=$rowqf["pais4"];
		$pa5=$rowqf["pais5"];
		}
		}
	
	echo "<table border='0' class='table table-hover'>";
	echo "<tr>";
	echo "<td colspan='7' align='center' bgcolor='#D8D8D8'><b>Asignacion de Puntaje</b></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td align='center' bgcolor='#F1F1F1'>Indicador</td>";
	echo "<td align='center' bgcolor='#F1F1F1'>Porcentaje</td>";
	echo "<td align='center' bgcolor='#F1F1F1'>$pa1</td>";
	if($pa2!=''){
	echo "<td align='center' bgcolor='#F1F1F1'>$pa2</td>";
		}
		if($pa3!=''){
	echo "<td align='center' bgcolor='#F1F1F1'>$pa3</td>";
	}
		if($pa4!=''){
	echo "<td align='center' bgcolor='#F1F1F1'>$pa4</td>";
	}
		if($pa5!=''){
	echo "<td align='center' bgcolor='#F1F1F1'>$pa5</td>";
	}
		echo "</tr>";
		$linea = 1;
	while($rowqx = mysql_fetch_array($rsnxq)){
		$ind_id2 =$rowqx["id_prod"];
		$ind_id =$rowqx["id_indi"];
		$indx =$rowqx["nom_indicador"];
		$xpor =$rowqx["porcentaje"];
		$v1 =$rowqx["valor1"];
		$v2 =$rowqx["valor2"];
		$v3=$rowqx["valor3"];
		$v4=$rowqx["valor4"];
		$v5=$rowqx["valor5"];
		echo "<tr>";
		echo "<td>$indx
		<input type='checkbox' name='id_idi[]' value='$ind_id' checked='checked' style='display:none'>
		<input type='hidden' name='codiprod[]' value='$ind_id2'>
		</td>";
		echo "<td align='center'>$xpor </td>";
		echo "<td align='center'>$v1</td>";
		if($pa2!=''){
		echo "<td align='center'>$v2</td>";
		}
		if($pa3!=''){
		echo "<td align='center'>$v3</td>";
		}
		if($pa4!=''){
		echo "<td align='center'>$v4</td>";
		}
		if($pa5!=''){
		echo "<td align='center'>$v5</td>";
		
		       
		}
		echo "<input type='hidden' name='linea' value='".$linea."'>"; 
		 $linea++; 
		echo "</tr>";
		}
		echo "</table>";
		}


?>


<br><p></p>
<!-- construimos tabla de resultado final  -->

<?
$sqlresul="SELECT
ttpro.id_prod,
ttpro.nom_p,
ttind.cod_prod,
mindi.nom_indicador,
ttind.resul1,
ttind.resul2,
ttind.resul3,
ttind.resul4,
ttind.resul5,
ttind.id_indi
FROM
merca_temp_prod AS ttpro
INNER JOIN merca_temp_indi AS ttind ON ttpro.id_prod = ttind.cod_prod
INNER JOIN merca_indicadores AS mindi ON ttind.cod_indicadores = mindi.id
WHERE
ttpro.id_prod = '$idreg'";
$rsnr = mysql_query($sqlresul);
if (mysql_num_rows($rsnr) > 0){
	//select para mostrar los paises en fila
	
	$sqlpfr="SELECT
ttp.id_prod,
ttp.nom_p,
tfil.pais1,
tfil.pais2,
tfil.pais3,
tfil.pais4,
tfil.pais5
FROM
merca_temp_prod AS ttp
INNER JOIN merca_temp_paisfila AS tfil ON ttp.id_prod = tfil.id_prod
WHERE
ttp.id_prod = '$idreg'";
	$rsnxfr = mysql_query($sqlpfr);
if (mysql_num_rows($rsnxfr) > 0){
	while($rowqfr = mysql_fetch_array($rsnxfr)){
		$pa1x=$rowqfr["pais1"];
		$pa2x=$rowqfr["pais2"];
		$pa3x=$rowqfr["pais3"];
		$pa4x=$rowqfr["pais4"];
		$pa5x=$rowqfr["pais5"];
		}
		}
	
	echo "<table border='0' class='table table-hover'>";
	echo "<tr>";
	echo "<td colspan='7' align='center' bgcolor='#D8D8D8'><b>Resultado Final</b></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td align='center' bgcolor='#F1F1F1'>Indicador</td>";
	//echo "<td>Porcentaje</td>";
	echo "<td align='center' bgcolor='#F1F1F1'>$pa1x</td>";
	if($pa2x!=''){
	echo "<td align='center' bgcolor='#F1F1F1'>$pa2x</td>";
	}
	if($pa3x!=''){
	echo "<td align='center' bgcolor='#F1F1F1'>$pa3x</td>";
	}
	if($pa4x!=''){
	echo "<td align='center' bgcolor='#F1F1F1'>$pa4x</td>";
	}
	if($pa5x!=''){
	echo "<td align='center' bgcolor='#F1F1F1'>$pa5x</td>";
	}
		echo "</tr>";
	while($rowr = mysql_fetch_array($rsnr)){
		$id_x2 =$rowr["id_indi"];
		$indxr =$rowr["nom_indicador"];
		//$xpor =$rowr["porcentaje"];
		$r1 =$rowr["resul1"];
		$r2 =$rowr["resul2"];
		$r3 =$rowr["resul3"];
		$r4 =$rowr["resul4"];
		$r5 =$rowr["resul5"];
		
		$rr1=$rr1+$r1;
		$rr2=$rr2+$r2;
		$rr3=$rr3+$r3;
		$rr4=$rr4+$r4;
		$rr5=$rr5+$r5;
		
		echo "<tr>";
		echo "<td>$indxr
		<input type='hidden' name='idresufin' value='$id_x2' size='2'>
		</td>";
		echo "<td align='center'>$r1</td>";
		if($pa2x!=''){
		echo "<td align='center'>$r2</td>";
		}
		if($pa3x!=''){
		echo "<td align='center'>$r3</td>";
		}
		if($pa4x!=''){
		echo "<td align='center'>$r4</td>";
		}
		if($pa5x!=''){
		echo "<td align='center'>$r5</td>";
		}
		
		echo "</tr>";
		}
		echo "<tr>";
		echo "<td></td>";
		echo "<td align='center'><b>$rr1</b></td>";
		if($pa2x!=''){
			echo "<td align='center'><b>$rr2</b></td>";
			}
		if($pa3x!=''){
			echo "<td align='center'><b>$rr3</b></td>";
			}
		if($pa4x!=''){
			echo "<td align='center'><b>$rr4</b></td>";
			}
		if($pa5x!=''){
			echo "<td align='center'><b>$rr5</b></td>";
			}
		echo "</tr>";
		echo "</table>";
		}


?>
<br>
<p>
Seleccione Pais de Mayor Puntaje
<select name= "sector" id= "sector" > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT
merca_temp_pais.cod_pais,
merca_pais.pais,
merca_temp_prod.id_prod
FROM
merca_temp_prod
INNER JOIN merca_temp_pais ON merca_temp_prod.id_prod = merca_temp_pais.cod_prod
INNER JOIN merca_pais ON merca_temp_pais.cod_pais = merca_pais.cod_pais
WHERE
merca_temp_prod.id_prod = '$idreg'
ORDER BY
merca_pais.pais ASC" ) ; 
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
  <br>
<p>

<?
//echo "<a href='expordataindicador.php?idreg=$idreg&pai=$pai'>Exportar</a>";
?>

<!--<a href="expordataindicador.php?idreg=<? //echo $idreg ?>&pai=<? //echo $_post["sector"]  ?>"><input class="btn btn-primary" name="botonx" value="Exportar Informe"  /></a> -->

<input class="btn btn-primary" name="botonx" type="submit" value="3# Paso / Exportar Informe"  />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="consultmarketpro.php">
<input class="btn btn-success" type="button" value="Generar Nuevo informe"  />
</a>
</p>

</form>
</center>
</div>


</body>
</html>
<?
include("pie.php");
?>