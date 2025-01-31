<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">	
		
		<script language="JavaScript">
<!-- Hide JavaScript from Java-cambia de color las filas de la tabla
function NavRollOver(oTd){if(!oTd.contains(event.fromElement)){oTd.bgColor="#FAFAFA";}}
function NavRollOut(oTd){if(!oTd.contains(event.toElement)){oTd.bgColor="#CEECF5";}}
//-->
</script>

<script language='JavaScript'>
/*ventana emergente*/
var newwindow;
function popup(url)
{ newwindow=window.open(url,'name','width=750,height =550,left=200,top=90,scrollbars=NO,menubar=NO,titlebar= NO,status=NO,toolbar=NO');
if (window.focus) {newwindow.focus()}
}
</script>


<script LANGUAGE="JavaScript">

function confirmSubmit()
{
var agree=confirm("Esta Seguro de Eliminar este Registro?");
if (agree)
  return true ;
else
   return false ;
}

</script>
</head>

<body>
<?

include ("conection/config.php");
//include ("menu.php");
include ("consuldata.php");
$busqx = $_POST["busq"];
$idbus = $_POST["busq"];
$temax = $_POST["tema"];
$produx = $_POST["produ"];
$businsix = $_POST["businsi"];
$paisx = $_POST["pais"];
$mercax = $_POST["merca"];
$sectox = $_POST["secto"];
$instx = $_POST["inst"];
$idiomax = $_POST["idioma"];
$tdatox = $_POST["tdato"];
$alcancex = $_POST["alcance"];
$taccesox = $_POST["tacceso"];
$descrpagx = $_POST["descrpag"];
$variax = $_POST["varia"]; 

/*$busqx = $_GET["busq"];
$temax = $_GET["tema"];
$produx = $_GET["produ"];
$businsix = $_GET["businsi"];
$paisx = $_GET["pais"];
$mercax = $_GET["merca"];
$sectox = $_GET["secto"];
$instx = $_GET["inst"];
$idiomax = $_GET["idioma"];
$tdatox = $_GET["tdato"];
$alcancex = $_GET["alcance"];
$taccesox = $_GET["tacceso"];
$descrpagx = $_GET["descrpag"];
$variax = $_GET["varia"];*/

//echo $busqx;
//echo $mercax;
//echo $businsix;
//echo "xxx";

	//si busqueda de palabra clave esta vacio
if ($businsix!=""){
	$sqlpg="SELECT
pag.id,
pag.cod_tipo_bus,
tb.busqueda,
pag.cod_pais,
pa.pais,
pag.cod_pais_merca,
mp.pais AS mpais,
pag.cod_sector,
se.sector,
pag.cod_producto,
prod.producto,
pag.cod_tema,
te.tema,
pag.cod_idioma,
pi.idioma,
pag.cod_tipo_dato,
td.tipo_dato,
pag.cod_alcance,
palc.alcance,
pag.cod_tipo_acceso,
pta.tipo_acceso,
pag.cod_variable,
v.variable,
pag.cod_entre,
pen.entregable,
pag.cod_inst,
pins.institucion,
pag.nom_inst,
pag.nom_pag,
pag.descri_pag,
pag.dire_pag,
pag.fecha_actu,
pag.carga_ar,
pag.tipo_ar,
pag.descri_entre,
ROUND(pag.costo,2) as costo,
CONCAT(tb.busqueda,pa.pais,pa.pais,se.sector,prod.producto,te.tema,pi.idioma,td.tipo_dato,palc.alcance,pta.tipo_acceso,v.variable,pen.entregable,pins.institucion) as leyenda
FROM
pag_datapagina AS pag
INNER JOIN pag_tipo_bus AS tb ON pag.cod_tipo_bus = tb.id
INNER JOIN merca_pais AS pa ON pag.cod_pais = pa.id
INNER JOIN merca_pais AS mp ON pag.cod_pais_merca = mp.id
INNER JOIN sector AS se ON pag.cod_sector = se.id
INNER JOIN producto AS prod ON pag.cod_producto = prod.id
INNER JOIN pag_tema AS te ON pag.cod_tema = te.id
INNER JOIN pag_idioma AS pi ON pag.cod_idioma = pi.id
INNER JOIN pag_tipo_dato AS td ON pag.cod_tipo_dato = td.id
INNER JOIN pag_alcance AS palc ON pag.cod_alcance = palc.id
INNER JOIN pag_tipo_acceso AS pta ON pag.cod_tipo_acceso = pta.id
INNER JOIN variable AS v ON pag.cod_variable = v.id
LEFT JOIN pag_entregable AS pen ON pag.cod_entre = pen.id
INNER JOIN pag_institucion AS pins ON pag.cod_inst = pins.id
WHERE
pag.buscar like '%".$businsix."%'
order by pag.id DESC";
	
}else{
$sqlpg="SELECT
pag.id,
pag.cod_tipo_bus,
tb.busqueda,
pag.cod_pais,
pa.pais,
pag.cod_pais_merca,
mp.pais AS mpais,
pag.cod_sector,
se.sector,
pag.cod_producto,
prod.producto,
pag.cod_tema,
te.tema,
pag.cod_idioma,
pi.idioma,
pag.cod_tipo_dato,
td.tipo_dato,
pag.cod_alcance,
palc.alcance,
pag.cod_tipo_acceso,
pta.tipo_acceso,
pag.cod_variable,
v.variable,
pag.cod_entre,
pen.entregable,
pag.cod_inst,
pins.institucion,
pag.nom_inst,
pag.nom_pag,
pag.descri_pag,
pag.dire_pag,
pag.fecha_actu,
pag.carga_ar,
pag.tipo_ar,
pag.descri_entre,
ROUND(pag.costo,2) as costo,
CONCAT(tb.busqueda,pa.pais,pa.pais,se.sector,prod.producto,te.tema,pi.idioma,td.tipo_dato,palc.alcance,pta.tipo_acceso,v.variable,pen.entregable,pins.institucion) as leyenda
FROM
pag_datapagina AS pag
INNER JOIN pag_tipo_bus AS tb ON pag.cod_tipo_bus = tb.id
INNER JOIN merca_pais AS pa ON pag.cod_pais = pa.id
INNER JOIN merca_pais AS mp ON pag.cod_pais_merca = mp.id
INNER JOIN sector AS se ON pag.cod_sector = se.id
INNER JOIN producto AS prod ON pag.cod_producto = prod.id
INNER JOIN pag_tema AS te ON pag.cod_tema = te.id
INNER JOIN pag_idioma AS pi ON pag.cod_idioma = pi.id
INNER JOIN pag_tipo_dato AS td ON pag.cod_tipo_dato = td.id
INNER JOIN pag_alcance AS palc ON pag.cod_alcance = palc.id
INNER JOIN pag_tipo_acceso AS pta ON pag.cod_tipo_acceso = pta.id
INNER JOIN variable AS v ON pag.cod_variable = v.id
LEFT JOIN pag_entregable AS pen ON pag.cod_entre = pen.id
INNER JOIN pag_institucion AS pins ON pag.cod_inst = pins.id
WHERE
tb.busqueda = '".$busqx."' AND
CONCAT(pa.pais,se.sector,mp.pais,prod.producto,te.tema,pi.idioma,td.tipo_dato,palc.alcance,pta.tipo_acceso,v.variable,pen.entregable,pins.institucion) LIKE '%".$paisx."%".$sectox."%".$mercax."%".$produx."%".$temax."%".$idiomax."%".$tdatox."%".$alcancex."%".$taccesox."%".$variax."%".$descrpagx."%".$instx."%'
order by pag.id DESC";
}
$rsnpg = mysql_query($sqlpg);
if (mysql_num_rows($rsnpg) > 0){
	
	
echo "<center>";
echo"<h4><b><u>Reporte de Informaci&oacute;n </u></b></h4>";
echo"<h5><b><u>$busqx </u></b></h5>";
//echo"<h5><b>Producto $produc Con su Unidad de medida  $medx  del Periodo $perix</b></h5>";
echo "Selecci&oacute;n de Busqueda: ";
echo "$temax ";
echo "$produx  ";
echo "$instx  ";
//echo $produx;" <br>";
echo "<br>";
echo "<p>";
echo "<p>";
echo "<p>";
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

echo "<td bgcolor='#EBEBEB'><b><center>N#.</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Pais</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Mercado</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Sector</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Tema</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Tipo Instituci&oacute;n</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Idioma</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Tipo dato</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Alcance</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Tipo Acceso</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Instituci&oacute;n</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Nombre Pagina</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Producto</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Ver Detalle</center></b></td>";
if ($_SESSION['rol'] == 'ADMIN') {
echo "<td bgcolor='#EBEBEB'><b><center>Editar</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Eliminar</center></b></td>";
}
echo "</tr>";

while($rowpg = mysql_fetch_array($rsnpg)){
/*$cod = $rowpg["id_prog"];
$codf = $rowpg["numero_recibo"];*/

$cod = $rowpg["id"];

$items=$items+1;

echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
//echo "<tr>";
echo "<td><center>".$items."</center></td> ";

echo "<td><center>".$rowpg["pais"]."</center></td> ";
echo "<td><center>".$rowpg["mpais"]."</center></td> ";
//echo "<td><center> ".$rowpg["producto"]."</center></td>";
//echo "<td><center> ".$rowpg["medida"]."</center></td>";
//echo "<td><center> ".$rowpg["mes2"]."</center></td>";
echo "<td><center> ".$rowpg["sector"]."</center></td>";
echo "<td><center> ".$rowpg["tema"]."</center></td>";
echo "<td><center> ".$rowpg["institucion"]."</center></td>";
echo "<td><center> ".$rowpg["idioma"]."</center></td>";
echo "<td><center> ".$rowpg["tipo_dato"]."</center></td>";
echo "<td><center> ".$rowpg["alcance"]."</center></td>";
echo "<td><center> ".$rowpg["tipo_acceso"]."</center></td>";
echo "<td><center> ".$rowpg["nom_inst"]."</center></td>";
echo "<td><center> ".$rowpg["nom_pag"]."</center></td>";
echo "<td><center> ".$rowpg["producto"]."</center></td>";
//echo "<td><center> <a href='detallpage.php?cod=$cod' target='_blank'><img src='img/detalle.png' width='25' height='23' title='Ver Dettale'></a> </center></td>";
echo "<td><center> <a href=\"detallpage.php?cod=$cod\" onClick=\"popup('detallpage.php?cod=$cod'); return false;\"><img src='img/detalle.png' width='25' height='23' title='Ver Dettale'></a> </center></td>";

if ($_SESSION['rol'] == 'ADMIN') {
echo "<td><a href=RegDataPagAct.php?cod=$cod><img src='img/editar.png' width='20' height='18' title='Editar Registro'></a></td>";
//echo "<td><a href='deletedatapag.php?cod=$cod'><img src='img/delete.png' width='20' height='18' title='Eliminar Registro'></a></td>";
echo "<td><a onclick='return confirmSubmit()' href='deletedatapag.php?cod=$cod'><img src='img/delete.png' width='20' height='18' title='Eliminar Registro'></a></td>";
}
echo "</tr> ";

//echo"<p>".$_pagi_navegacion."</p>";
}

	echo "</table> ";

}else {
echo " <br><center><b>No hay Registro Segun Filtros<b></center>";
}

?>
</body>
</html>