<?
/*$enlace = $_POST['enlace']; 
header ("Content-Disposition: attachment; filename=$enlace "); 
header ("Content-Type: application/force-download"); 
header ("Content-Length: ".filesize($enlace)); 
readfile($enlace); */
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Info Paginas</title>
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
$codd =$_GET['cod'];
//echo "$codd";
//echo "ss";

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
INNER JOIN pag_entregable AS pen ON pag.cod_entre = pen.id
INNER JOIN pag_institucion AS pins ON pag.cod_inst = pins.id
WHERE
pag.id='".$codd."'";

$rsnpg = mysql_query($sqlpg);
if (mysql_num_rows($rsnpg) > 0){
	
	
echo "<center>";
echo"<h4><b><u><p style='font-family:Times New Roman, Times, serif'>Detalle de Pagina </p></u></b></h4>";
//echo"<h5><b>Producto $produc Con su Unidad de medida  $medx  del Periodo $perix</b></h5>";
//echo "<br>";
/*echo "<table border = '0' bordercolor='#00CCFF' style='background-color:#FAFAFA;
   color:#039;
   width: 400px;
   font-size:12px;
   padding: 10px;
   border:0px solid #B2B2B2;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>"; */
   
  echo "<table class='table table-striped table-hover' align='left'style='font-size:70%'>";
   
   //echo "<table border = '0' style='font-family:Times New Roman, Times, serif;font-size:15px; height: 50px'>"; 
   
   //echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
echo "<tr>";
//echo "<td bgcolor='#279CC9' colspan='19'><b><font color='#FFFFFF'>Filtros: $secto / $depax / $produc / $tiempox / $perix</font></b></td>";
//echo "</tr>";
//echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
//echo "<tr>";
//echo "<td bgcolor='#279CC9'><b><center>Items</center></b></td>";

//echo "<td colspan='2' bgcolor='#EBEBEB'><b><center>INFORMACION AL DETALLE</center></b></td>";
/*echo "<td bgcolor='#EBEBEB'><b><center>Pais</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Mercado</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Sector</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Tema</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Tipo Institución</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Idioma</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Tipo dato</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Alcance</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Tipo Acceso</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Institución</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Nombre Pagina</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Producto</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Ver Detalle</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Editar</center></b></td>";
echo "<td bgcolor='#EBEBEB'><b><center>Eliminar</center></b></td>";*/

echo "</tr>";

while($rowpg = mysql_fetch_array($rsnpg)){
/*$cod = $rowpg["id_prog"];
$codf = $rowpg["numero_recibo"];*/

$cod = $rowpg["id"];

$monto=$rowpg["costo"];

$items=$items+1;
/*$enex=$enex+$rowpg["enero"];
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

$tto = $tenex + $tfebx + $tmarx + $tabrx + $tmayx + $tjunx + $tjulx + $tagox + $tsepx + $toctx + $tnovx + $tdicx;*/

//echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
echo "<tr>";
//echo "<td><center>".$items."</center></td> ";

echo "<td bgcolor='#EBEBEB' width='200'><b>País:</b></td> ";
echo "<td>".$rowpg["pais"]."</td> ";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Mercado:</b></td> ";
echo "<td>".$rowpg["mpais"]."</td> ";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Sector:</b></td> ";
echo "<td> ".$rowpg["sector"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Tema:</b></td> ";
echo "<td>".$rowpg["tema"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Tipo Institución:</b></td> ";
echo "<td>".$rowpg["institucion"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Idioma:</b></td> ";
echo "<td>".$rowpg["idioma"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Tipo Dato:</b></td> ";
echo "<td>".$rowpg["tipo_dato"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Alcance:</b></td> ";
echo "<td>".$rowpg["alcance"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Tipo Acceso:</b></td> ";
echo "<td>".$rowpg["tipo_acceso"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Nombre Institución:</b></td> ";
echo "<td>".$rowpg["nom_inst"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Nombre Página:</b></td> ";
echo "<td>".$rowpg["nom_pag"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Dirección de Página:</b></td> ";
echo "<td><a href='http://".$rowpg["dire_pag"]."' target='_blank'> ".$rowpg["dire_pag"]." </a></td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Variable de Análisis:</b></td> ";
echo "<td>".$rowpg["variable"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Ultima Actualización:</b></td> ";
echo "<td>".$rowpg["fecha_actu"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Producto:</b></td> ";
echo "<td>".$rowpg["producto"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Costo (S/.):</b></td> ";
echo "<td>".$rowpg["costo"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Descripción de La Página:</b></td> ";
echo "<td align='justify'>".$rowpg["descri_pag"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Entregable :</b></td> ";
echo "<td>".$rowpg["entregable"]."</td>";
echo "</tr>";
/*if ($monto>0){*/
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Descarga:</b></td> ";
echo "<td> <a href = '../Inteligencia_Comercial_Paginas_Web/data_archivos/".$rowpg["carga_ar"]."' target='_blank'>    ".$rowpg["carga_ar"]."    </a></td>";
/*}else{
	echo "<tr>";
echo "<td bgcolor='#EBEBEB'><b>Descarga:</b></td> ";
echo "<td> ".$rowpg["carga_ar"]."</td>";
	}*/
/*echo "<td>
<form enctype='multipart/form-data' name='img' method='post'>
<input name='enlace' type='text' size='25' value='".$rowpg["carga_ar"]."' />
<input name='boton' type='submit' class='boton' value='Descargar' />
</form>
</td>";*/
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#EBEBEB' width='200'><b>Resumen Entregable:</b></td> ";
echo "<td align='justify'>".$rowpg["descri_entre"]."</td>";

//echo "<td><center> <a href='detallpage.php?cod=$cod' target='_blank'><img src='img/consult.png' width='20' height='18' title='Ver Dettale'></a> </center></td>";
//echo "<td><center> <a href=addpais.php?cod=$cod><img src='img/editar.png' width='20' height='18' title='Editar Registro'></a></center></td>";
//echo "<td><center><a href='#'><img src='img/editar.png' width='20' height='18' title='Editar Registro'></a>";
//echo "<td><center><a href='#'><img src='img/delete.png' width='20' height='18' title='Eliminar Registro'></a></center></td>";

echo "</tr> ";

//echo"<p>".$_pagi_navegacion."</p>";
}
/*echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> ";
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
	echo "</tr> ";*/
	echo "</table> ";

}else {
echo " <br><center><b>No hay Registro Segun Filtros<b></center>";
}

/*}else if
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
			include ("consuldataA2.php");*/
			
			/*}else{
		
	echo " <br><center><b>No hay Registro Segun Filtro Seleccionado<b></center>";
}*/

	

?>