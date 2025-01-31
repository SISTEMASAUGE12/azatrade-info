<?php 

  
header("Pragma: public");  
header("Expires: 0");  
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
header("Content-Type: application/force-download");  
header("Content-Type: application/octet-stream");  
header("Content-Type: application/download");  
//header("Content-Disposition: attachment;filename=Reporte_Mensual_".$t1."_".$t2.".xls "); 
header("Content-Disposition: attachment;filename=Reporte_Semestral_Azatrade.xls ");  
header("Content-Transfer-Encoding: binary ");  

include ("conection/config.php");

$sqlpg="SELECT
dp.idsector,
sec.sector,
dp.iddepartamento,
depa.departamento,
dp.idproducto,
prod.producto,
dp.idvariable,
vari.variable,
dp.idmedida,
med.medida,
dp.periodo,
Sum(dp.enero + dp.febrero + dp.marzo + dp.abril + dp.mayo + dp.junio) AS PriSemestre,
Sum(dp.julio + dp.agosto + dp.septiembre + dp.octubre + dp.noviembre + dp.diciembre) AS SegSemestre,
Sum(dp.enero + dp.febrero + dp.marzo + dp.abril + dp.mayo + dp.junio + dp.julio + dp.agosto + dp.septiembre + dp.octubre + dp.noviembre + dp.diciembre) AS total
FROM
dataproduccion AS dp
INNER JOIN departamento AS depa ON dp.iddepartamento = depa.id
INNER JOIN producto AS prod ON dp.idproducto = prod.id
INNER JOIN sector AS sec ON dp.idsector = sec.id
INNER JOIN variable AS vari ON dp.idvariable = vari.id
INNER JOIN medida AS med ON dp.idmedida = vari.id
WHERE
dp.eliminado = '0' AND
dp.idsector LIKE '%".$sectx."%' AND
CONCAT(depa.departamento,prod.producto,med.medida,dp.periodo) LIKE '".$depax."%".$prodx."%".$medx."%".$perix."'
GROUP BY
dp.idsector,
dp.iddepartamento,
dp.idproducto,
dp.idvariable,
dp.idmedida,
dp.periodo";
//}

$rsnpg = mysql_query($sqlpg);
if (mysql_num_rows($rsnpg) > 0){
	
	//sql para mostra el sector
	$sqlc="SELECT sector.id, sector.sector, sector.eliminado FROM sector WHERE sector.id = '".$sectx."'";
$rsnc = mysql_query($sqlc);
if (mysql_num_rows($rsnc) > 0){
	while($rowc = mysql_fetch_array($rsnc)){
$secto = $rowc["sector"];
	}
	}
	
	// sql para mostrar producto
	$sqlp="SELECT producto.id, producto.producto FROM producto WHERE producto.producto ='".$prodx."'";
$rsnp = mysql_query($sqlp);
if (mysql_num_rows($rsnp) > 0){
	while($rowp = mysql_fetch_array($rsnp)){
$produc = $rowp["producto"];
	}
	}
	
echo "<center>";
echo"<h4><b><u>Reporte Semestral Sector $secto </u></b></h4>";
echo"<h5><b>Producto $produc Con su Unidad de medida  $medx  del Periodo $perix</b></h5>";
echo "<br>";
echo "<table border = '1' bordercolor='#00CCFF' style='background-color:#CEECF5;
   color:#039;
   width: 300px;
   padding: 10px;
   border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>";
  // echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";

//echo "<td bgcolor='#CCEAF9' colspan='18'><b><font color='#FFFFFF'>Filtros: $secto / $depax  / $produc / $tiempox / $perix</font></b></td>";
//echo "</tr>";
//echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
echo "<tr>";
//echo "<td bgcolor='#279CC9'><b><center>Items</center></b></td>";

echo "<td bgcolor='#A8DCF4'><b><center>Departamento</center></b></td>";
echo "<td bgcolor='#A8DCF4'><b><center>Periodo</center></b></td>";
//echo "<td bgcolor='#279CC9'><b><center>Producto</center></b></td>";
echo "<td bgcolor='#A8DCF4'><b><center>Primer Semestre</center></b></td>";
echo "<td bgcolor='#A8DCF4'><b><center>Segundo Semestre</center></b></td>";
echo "<td bgcolor='#A8DCF4'><b><center>Total</center></b></td>";

echo "</tr>";

while($rowpg = mysql_fetch_array($rsnpg)){
/*$cod = $rowpg["id_prog"];
$codf = $rowpg["numero_recibo"];*/

$items=$items+1;
$sem1=$sem1+$rowpg["PriSemestre"];
$sem2=$sem2+$rowpg["SegSemestre"];
$tox=$tox+$rowpg["total"];

//echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
echo "<tr>";
//echo "<td><center>".$items."</center></td> ";
echo "<td><center>".$rowpg["departamento"]."</center></td> ";
echo "<td><center>".$rowpg["periodo"]."</center></td> ";
//echo "<td><center> ".$rowpg["producto"]."</center></td>";
echo "<td><center> ".$rowpg["PriSemestre"]."</center></td>";
echo "<td><center> ".$rowpg["SegSemestre"]."</center></td>";
echo "<td><center><b> ".$rowpg["total"]."</b></center></td>";

echo "</tr> ";

//echo"<p>".$_pagi_navegacion."</p>";
}
echo "<tr> ";
	echo "<td colspan='2'><center><b>Total</b></center></td> ";
	echo "<td><center><b>$sem1</b></center></td> ";
	echo "<td><center><b>$sem2</b></center></td> ";
	echo "<td><center><b>$tox</b></center></td> ";
	echo "</tr> ";
	echo "<tr> ";
	echo "</table> ";
}

?>