<head>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">	
		
		<script language="JavaScript">
<!-- Hide JavaScript from Java-cambia de color las filas de la tabla
function NavRollOver(oTd){if(!oTd.contains(event.fromElement)){oTd.bgColor="#FAFAFA";}}
function NavRollOut(oTd){if(!oTd.contains(event.toElement)){oTd.bgColor="#CEECF5";}}
//-->
</script>
</head>
<?

include ("conection/config.php");
//include ("menu.php");
include ("consuldata.php");
//include ("consuldata.php?depas=$depa");
$sectx = $_POST["sector"];
$depax = $_POST["depa"];
$prodx = $_POST["prod"];
$medx = $_POST["med"];
$tiempox = $_POST["tiempo"];
$perix = $_POST["peri"];


//include ("consuldata.php");

//if ($sectx!="" and $tiempox=="Mensual"){
if ($tiempox=="Mensual"){

/*$sqlpg="SELECT
sect.id AS ids,
sect.sector,
depa.id AS idd,
depa.coddep,
depa.departamento,
prod.id AS idp,
prod.producto,
var.id AS idv,
var.variable,
med.id AS idm,
med.medida,
d.periodo,
d.mes2,
SUM(d.enero) as enero,
SUM(d.febrero) as febrero,
SUM(d.marzo) as marzo,
SUM(d.abril) as abril,
SUM(d.mayo) as mayo,
SUM(d.junio) as junio,
SUM(d.julio) as julio,
SUM(d.agosto) as agosto,
SUM(d.septiembre) as septiembre,
SUM(d.octubre) as octubre,
SUM(d.noviembre) as noviembre,
SUM(d.diciembre) as diciembre,
sum(d.enero + d.febrero + d.marzo + d.abril + d.marzo + d.junio + d.julio + d.agosto + d.septiembre + d.octubre + d.noviembre + d.diciembre) AS total,
CONCAT(depa.departamento,prod.producto,d.mes2,d.periodo) AS todo,
d.eliminado
FROM
dataproduccion AS d
INNER JOIN departamento AS depa ON d.iddepartamento = depa.id
INNER JOIN medida AS med ON d.idmedida = med.id
INNER JOIN producto AS prod ON d.idproducto = prod.id
INNER JOIN sector AS sect ON d.idsector = sect.id
INNER JOIN variable AS var ON d.idvariable = var.id
WHERE
d.eliminado = '0' AND
d.idsector LIKE '%".$sectx."%' AND
CONCAT(depa.departamento,prod.producto,d.mes2,med.medida,d.periodo) LIKE '".$depax."%".$prodx."%".$tiempox."%".$medx."%".$perix."'
GROUP BY
ids,
sect.sector,
idd,
depa.coddep,
depa.departamento,
idp,
prod.producto,
idv,
var.variable,
idm,
med.medida,
d.periodo,
d.mes2
";*/
//}

$sqlpg="SELECT
sect.id AS ids,
sect.sector,
depa.id AS idd,
depa.coddep,
depa.departamento,
prod.id AS idp,
prod.producto,
var.id AS idv,
var.variable,
med.id AS idm,
med.medida,
d.periodo,
d.mes2,
SUM(d.enero) as enero,
SUM(d.febrero) as febrero,
SUM(d.marzo) as marzo,
SUM(d.abril) as abril,
SUM(d.mayo) as mayo,
SUM(d.junio) as junio,
SUM(d.julio) as julio,
SUM(d.agosto) as agosto,
SUM(d.septiembre) as septiembre,
SUM(d.octubre) as octubre,
SUM(d.noviembre) as noviembre,
SUM(d.diciembre) as diciembre,
sum(d.enero + d.febrero + d.marzo + d.abril + d.mayo + d.junio + d.julio + d.agosto + d.septiembre + d.octubre + d.noviembre + d.diciembre) AS total,
CONCAT(depa.departamento,prod.producto,d.mes2,d.periodo) AS todo,
d.eliminado
FROM
dataproduccion AS d
INNER JOIN departamento AS depa ON d.iddepartamento = depa.id
INNER JOIN medida AS med ON d.idmedida = med.id
INNER JOIN producto AS prod ON d.idproducto = prod.id
INNER JOIN sector AS sect ON d.idsector = sect.id
INNER JOIN variable AS var ON d.idvariable = var.id
WHERE
d.eliminado = '0' AND
d.idsector LIKE '%".$sectx."%' AND
CONCAT(depa.departamento,prod.producto,d.mes2,med.medida,d.periodo) LIKE '%".$depax."%".$prodx."%".$tiempox."%".$medx."%".$perix."%'
GROUP BY
ids,
sect.sector,
idd,
depa.coddep,
depa.departamento,
idp,
prod.producto,
idv,
var.variable,
idm,
med.medida,
d.periodo,
d.mes2";

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
echo"<h4><b><u>Reporte Mensual Sector $secto </u></b></h4>";
echo"<h5>Producto <b>$produc</b> Con su Unidad de medida  <b>$medx</b>  del Periodo <b>$perix</b></h5>";
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

//echo "<td bgcolor='#279CC9' colspan='19'><b><font color='#FFFFFF'>Filtros: $secto / $depax / $produc / $tiempox / $perix</font></b></td>";
//echo "</tr>";
//echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
//echo "<tr>";
//echo "<td bgcolor='#279CC9'><b><center>Items</center></b></td>";

echo "<td bgcolor='#EBEBEB'><b><center>Departamento</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Periodo</center></b></td>";
//echo "<td bgcolor='#279CC9'><b><center>Producto</center></b></td>";
//echo "<td bgcolor='#279CC9'><b><center>Unidad</center></b></td>";
//echo "<td bgcolor='#279CC9'><b><center>Tiempo</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Enero</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Febrero</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Marzo</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Abril</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Mayo</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Junio</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Julio</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Agosto</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Septiembre</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Octubre</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Noviembre</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Diciembre</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Total</center></b></td>";
echo "</tr>";

while($rowpg = mysql_fetch_array($rsnpg)){
/*$cod = $rowpg["id_prog"];
$codf = $rowpg["numero_recibo"];*/

//$items=$items+1;
$enex=$enex+$rowpg["enero"];
$febx=$febx+$rowpg["febrero"];
$marx=$marx+$rowpg["marzo"];
$abrix=$abrix+$rowpg["abril"];
$mayx=$mayx+$rowpg["mayo"];
$junx=$junx+$rowpg["junio"];
$julx=$julx+$rowpg["julio"];
$agox=$agox+$rowpg["agosto"];
$sepx=$sepx+$rowpg["septiembre"];
$octx=$octx+$rowpg["octubre"];
$novx=$novx+$rowpg["noviembre"];
$dicx=$dicx+$rowpg["diciembre"];
//$totx=$totx+$rowpg["total"];
$totx=$enex + $febx + $marx + $abrix + $mayx + $junx + $julx + $agox + $sepx + $octx + $novx + $dicx;

$tenex=$tenex+$rowpg["enero"];
$tfebx=$tfebx+$rowpg["febrero"];
$tmarx=$tmarx+$rowpg["marzo"];
$tabrx=$tabrx+$rowpg["abril"];
$tmayx=$tmayx+$rowpg["mayo"];
$tjunx=$tjunx+$rowpg["junio"];
$tjulx=$tjulx+$rowpg["julio"];
$tagox=$tagox+$rowpg["agosto"];
$tsepx=$tsepx+$rowpg["septiembre"];
$toctx=$toctx+$rowpg["octubre"];
$tnovx=$tnovx+$rowpg["noviembre"];
$tdicx=$tdicx+$rowpg["diciembre"];

$tto = $tenex + $tfebx + $tmarx + $tabrx + $tmayx + $tjunx + $tjulx + $tagox + $tsepx + $toctx + $tnovx + $tdicx;

echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
//echo "<tr>";
//echo "<td><center>".$items."</center></td> ";

echo "<td><center>".$rowpg["departamento"]."</center></td> ";
echo "<td><center>".$rowpg["periodo"]."</center></td> ";
//echo "<td><center> ".$rowpg["producto"]."</center></td>";
//echo "<td><center> ".$rowpg["medida"]."</center></td>";
//echo "<td><center> ".$rowpg["mes2"]."</center></td>";
echo "<td><center> ".$rowpg["enero"]."</center></td>";
echo "<td><center> ".$rowpg["febrero"]."</center></td>";
echo "<td><center> ".$rowpg["marzo"]."</center></td>";
echo "<td><center> ".$rowpg["abril"]."</center></td>";
echo "<td><center> ".$rowpg["mayo"]."</center></td>";
echo "<td><center> ".$rowpg["junio"]."</center></td>";
echo "<td><center> ".$rowpg["julio"]."</center></td>";
echo "<td><center> ".$rowpg["agosto"]."</center></td>";
echo "<td><center> ".$rowpg["septiembre"]."</center></td>";
echo "<td><center> ".$rowpg["octubre"]."</center></td>";
echo "<td><center> ".$rowpg["noviembre"]."</center></td>";
echo "<td><center> ".$rowpg["diciembre"]."</center></td>";
echo "<td><center><b> ".$rowpg["total"]."</b></center></td>";

echo "</tr> ";

//echo"<p>".$_pagi_navegacion."</p>";
}
echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> ";
	echo "<td colspan='2'><center><b>Total</b></center></td> ";
	echo "<td><center><b>$tenex</b></center></td> ";
	echo "<td><center><b>$tfebx</b></center></td> ";
	echo "<td><center><b>$tmarx</b></center></td> ";
	echo "<td><center><b>$tabrx</b></center></td> ";
	echo "<td><center><b>$tmayx</b></center></td> ";
	echo "<td><center><b>$tjunx</b></center></td> ";
	echo "<td><center><b>$tjulx</b></center></td> ";
	echo "<td><center><b>$tagox</b></center></td> ";
	echo "<td><center><b>$tsepx</b></center></td> ";
	echo "<td><center><b>$toctx</b></center></td> ";
	echo "<td><center><b>$tnovx</b></center></td> ";
	echo "<td><center><b>$tdicx</b></center></td> ";
	echo "<td><center><b>$tto</b></center></td> ";
	echo "</tr> ";
	echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> ";
	echo "<td colspan='15'><a href='exportamensual.php?sectx=$sectx&depax=$depax&prodx=$prodx&tiempox=$tiempox&medx=$medx&perix=$perix'>Exportar a: <img src='img/EXCEL.png' width='30' height='30' title='Excel'></a></td> ";
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
echo " <br><center><b>No hay Registro Segun Filtros<b></center>";
}

}else if
//echo " <br><center><b>No hay Registro Segun Filtros Seleccionados Mensual<b></center>";
//}else 
 ($tiempox=="Trimestral"){
	//if ($tiempox=="Trimestral"){
	
	include ("consuldatat.php");
	

}else if ($tiempox=="Semestral"){
	include ("consuldataS.php");
	
	}else if
		($tiempox=="Anual" && $perix==""){
	include ("consuldataA.php");
	
	}else if
		($tiempox=="Anual" && $perix!=""){
			include ("consuldataA2.php");
			
			}else{
		
	echo " <br><center><b>No hay Registro Segun Filtro Seleccionado<b></center>";
}

	

?>