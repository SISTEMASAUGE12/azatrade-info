<?
include ("conection/config.php");

$sqlpg="SELECT
r.ids,
r.sector,
r.idd,
r.coddep,
r.departamento,
r.idp,
r.producto,
r.idv,
r.variable,
r.idm,
r.medida,
r.mes2,
Sum(r.A2010) AS A2010,
Sum(r.A2011) AS A2011,
Sum(r.A2012) AS A2012,
Sum(r.A2013) AS A2013,
Sum(r.A2014) AS A2014,
Sum(r.A2015) AS A2015,
Sum(r.A2016) AS A2016,
r.periodo
FROM
resumenanual AS r
WHERE
r.ids LIKE '".$sectx."%' AND
CONCAT(r.departamento,r.producto,r.medida) LIKE '".$depax."%".$prodx."%".$medx."' AND
r.periodo LIKE '%".$perix."%'
GROUP BY
r.ids,
r.sector,
r.idd,
r.coddep,
r.departamento,
r.idp,
r.producto,
r.idv,
r.variable,
r.idm,
r.medida,
r.mes2,
r.periodo
order by r.departamento asc";
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
	$pp="$sectx";
	
echo "<center>";
echo"<h4><b><u>Reporte Anual Sector $pp </u></b></h4>";
echo"<h5>Producto <b>$prodx</b> Con su Unidad de medida  <b>$medx</b>  del Periodo <b>$perix</b></h5>";
echo "<br>";
echo "<table border = '0' bordercolor='#00CCFF' style='background-color:#FAFAFA;
   color:#039;
   width: 300px;
   padding: 10px;
   border:0px solid #B2B2B2;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>";
   
echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
echo "<td bgcolor='#EBEBEB'><b><center>Departamento</center></b></td>";
if ($perix=="2010"){
echo "<td bgcolor='#EBEBEB'><b><center>2010</center></b></td>";
}else if ($perix=="2011"){
echo "<td bgcolor='#EBEBEB'><b><center>2011</center></b></td>";
}else if ($perix=="2012"){
echo "<td bgcolor='#EBEBEB'><b><center>2012</center></b></td>";
}else if ($perix=="2013"){
echo "<td bgcolor='#EBEBEB'><b><center>2013</center></b></td>";
}else if ($perix=="2014"){
echo "<td bgcolor='#EBEBEB'><b><center>2014</center></b></td>";
}else if ($perix=="2015"){
echo "<td bgcolor='#EBEBEB'><b><center>2015</center></b></td>";
//echo "<td bgcolor='#A8DCF4'><b><center>Total</center></b></td>";
}
echo "</tr>";

while($rowpg = mysql_fetch_array($rsnpg)){
/*$cod = $rowpg["id_prog"];
$codf = $rowpg["numero_recibo"];*/

$items=$items+1;
//$sem1=$sem1+$rowpg["PriSemestre"];
$depar=$rowpg["departamento"];
$a2010=$rowpg["A2010"];
$a2011=$rowpg["A2011"];
$a2012=$rowpg["A2012"];
$a2013=$rowpg["A2013"];
$a2014=$rowpg["A2014"];
$a2015=$rowpg["A2015"];
$a2016=$rowpg["A2016"];
$totalA=$a2010 + $a2011 + $a2012 + $a2013+ $a2014 + $a2015 + $a2016;

$ta2010=$ta2010+$rowpg["A2010"];
$ta2011=$ta2011+$rowpg["A2011"];
$ta2012=$ta2012+$rowpg["A2012"];
$ta2013=$ta2013+$rowpg["A2013"];
$ta2014=$ta2014+$rowpg["A2014"];
$ta2015=$ta2015+$rowpg["A2015"];
$ta2016=$ta2016+$rowpg["A2016"];
$tataAA=$ta2010 + $ta2010 + $ta2011 + $ta2012 + $ta2013 + $ta2014 + $ta2015 + $ta2016;

//echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
//echo "<td><center>".$items."</center></td> ";
echo "<td><center>".$rowpg["departamento"]."</center></td> ";
if ($perix=="2010"){
echo "<td><center>".$rowpg["A2010"]."</center></td> ";
}else if ($perix=="2011"){
echo "<td><center>".$rowpg["A2011"]."</center></td> ";
}else if ($perix=="2012"){
echo "<td><center>".$rowpg["A2012"]."</center></td> ";
}else if ($perix=="2013"){
echo "<td><center>".$rowpg["A2013"]."</center></td> ";
}else if ($perix=="2014"){
echo "<td><center>".$rowpg["A2014"]."</center></td> ";
}else if ($perix=="2015"){
echo "<td><center> ".$rowpg["A2015"]."</center></td>";
//echo "<td><center> ".$totalA."</center></td>";
}
echo "</tr> ";

//echo"<p>".$_pagi_navegacion."</p>";
}
echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> ";
	echo "<td><center><b>Total</b></center></td> ";
	if ($perix=="2010"){
	echo "<td><center><b>$ta2010</b></center></td> ";
	}else if ($perix=="2011"){
	echo "<td><center><b>$ta2011</b></center></td> ";
	}else if ($perix=="2012"){
	echo "<td><center><b>$ta2012</b></center></td> ";
	}else if ($perix=="2013"){
	echo "<td><center><b>$ta2013</b></center></td> ";
	}else if ($perix=="2014"){
	echo "<td><center><b>$ta2014</b></center></td> ";
	}else if ($perix=="2015"){
	echo "<td><center><b>$ta2015</b></center></td> ";
	//echo "<td><center><b>$tataAA</b></center></td> ";
	}
	echo "</tr> ";
	echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> ";
	echo "<td><a href='exportaanualA.php?sectx=$sectx&depax=$depax&prodx=$prodx&medx=$medx&perix=$perix'>Exportar a: <img src='img/EXCEL.png' width='30' height='30' title='Excel'></a></td> ";
	echo "</tr> ";
	
	if ($depax=='Lima' or $depax==''){
	echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> ";
	echo "<td colspan='5'><center><b>* Lima Incluye Lima Metropoitana</b></center></td> ";
	echo "</tr> ";
	}
	if ($prodx=='Frijol seco' or $prodx==''){
	echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> ";
	echo "<td colspan='8'><center><b>* Incluye Frijol Bayo, Caballero, Canario, Cocacho, Panamito, Lar&aacute;n.</b></center></td> ";
	echo "</tr> ";
	}
	if ($prodx=='Cacao' or $prodx==''){
	echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> ";
	echo "<td colspan='8'><center><b>* Datos de Enero a Agosto del 2014 y 2015.</b></center></td> ";
	echo "</tr> ";
	}
	if ($prodx=='Arveja gr. Verde' or $prodx=='Haba gr. Verde' or $prodx=='Limón' or $prodx=='Maíz choclo' or $prodx=='Mandarina' or $prodx=='Manzana' or $prodx=='Naranja' or $prodx=='Palta' or $prodx=='Papaya'  or $prodx=='Piña' or $prodx==''){
	echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> ";
	echo "<td colspan='8'><center><b>* Datos de Enero a Agosto del 2014 y 2015.</b></center></td> ";
	echo "</tr> ";
	}
	if ($perix=='2015' or $perix==''){
	echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> ";
	echo "<td colspan='5'><center><b>* Datos Actualizado hasta Agosto 2015.</b></center></td> ";
	echo "</tr> ";
	}
	
	echo "</table> ";
}else {
echo " <br><center><b>No hay Registro Segun Filtrosx<b></center>";
}

?>