<?
include ("conection/config.php");
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include("menuB.php");
echo"</header>";

$datax=$_GET["data"];
//echo "xx <br>";
//echo "$datax";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<title>Azatrade - Mercado Internacional e Indicadores</title>

<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script language="javascript" type="text/javascript">
function valida(idpais) {
	if (idpais.pai.value.length < 1){
		alert("Selecione Pais !");
		return false;
	}
	return true;
}
</script>

<script language='JavaScript'>
/*ventana emergente*/
var newwindow;
function popup(url)
{ newwindow=window.open(url,'name','width=950,height =450,left=200,top=90,scrollbars=NO,menubar=NO,titlebar= NO,status=NO,toolbar=NO');
if (window.focus) {newwindow.focus()}
}
</script>

</head>

<body>

<br><br>
<center> <em><h3> Resumen de Analisis de Indicadores</h3></em></center>

<?
// seleccionamos Indicadores Seleccionados
$sqlindi="SELECT
merca_temp_info.id_inf,
merca_temp_indi2.id_indi,
merca_indicadores.cod_indicador,
merca_indicadores.nom_indicador
FROM
merca_temp_info
INNER JOIN merca_temp_indi2 ON merca_temp_info.id_inf = merca_temp_indi2.codigo
INNER JOIN merca_indicadores ON merca_temp_indi2.id_indi = merca_indicadores.cod_indicador
WHERE
merca_temp_info.id_inf = '$datax'
GROUP BY
merca_temp_info.id_inf,
merca_temp_indi2.id_indi,
merca_indicadores.cod_indicador,
merca_indicadores.nom_indicador
ORDER BY
merca_indicadores.nom_indicador ASC ";
$rsindi = mysql_query($sqlindi);
if (mysql_num_rows($rsindi) > 0){
	echo"<table class='table table-hover'>";
	
	echo"<tr>";
    echo"<td colspan='2' align='right' bgcolor='#DFDFDF'>";
	echo"<b><h3><em>Codigo Generado: #00$datax</em></h3></b>";
	echo"</td>";
	echo"</tr>";
	
	echo"<tr>";
    echo"<td colspan='2' align='center' bgcolor='#DFDFDF'>";
	echo"<b>Indicadores Seleccionados</b>";
	echo"</td>";
	echo"</tr>";
	
	echo"<tr>";
	echo"<td><b>#</b></td>";
	echo"<td><b>Nombre Indicadores</b></td>";
	echo"</tr>";
	 
	while($rowi = mysql_fetch_array($rsindi)){
		$items=$items+1;
		$codindica=$rowi["cod_indicador"];
		$nomi=$rowi["nom_indicador"];
		echo "<tr>";
		echo"<td>$items</td>";
		echo"<td> <a href=\"detalleinfoA.php?cod=$datax&data=$codindica\" onClick=\"popup('detalleinfoA.php?cod=$datax&data=$codindica'); return false;\"> $nomi </a></td>";
		echo "</tr>";
		}
		echo "</table>";
		}
?>

<br>

<?
// seleccionamos Paises Seleccionados
$sqlp="SELECT
merca_temp_info.id_inf,
merca_temp_pais2.cod_pai,
merca_pais.cod_pais,
merca_pais.pais
FROM
merca_temp_info
INNER JOIN merca_temp_pais2 ON merca_temp_info.id_inf = merca_temp_pais2.codigo
INNER JOIN merca_pais ON merca_temp_pais2.cod_pai = merca_pais.cod_pais
WHERE
merca_temp_info.id_inf = '$datax'
GROUP BY
merca_temp_info.id_inf,
merca_temp_pais2.cod_pai,
merca_pais.cod_pais,
merca_pais.pais
ORDER BY
merca_pais.pais ASC ";
$rsp = mysql_query($sqlp);
if (mysql_num_rows($rsp) > 0){
	echo"<table class='table table-hover'>";
	echo"<tr>";
    echo"<td colspan='2' align='center' bgcolor='#DFDFDF'>";
	echo"<b>Pais(es) Seleccionados</b>";
	echo"</td>";
	echo"</tr>";
	
	echo"<tr>";
	echo"<td><b>#</b></td>";
	echo"<td><b>Pais</b></td>";
	echo"</tr>";
	while($rowp = mysql_fetch_array($rsp)){
		$itemsx=$itemsx+1;
		$cpais=$rowp["cod_pais"];
		$nomp=$rowp["pais"];
		echo "<tr>";
		echo"<td>$itemsx</td>";
		echo"<td><a href=\"detalleinfo.php?cod=$datax&data=$cpais\" onClick=\"popup('detalleinfo.php?cod=$datax&data=$cpais'); return false;\"> $nomp </a></td>";
		echo "</tr>";
		}
		echo "</table>";
		}
?>

<!--<br>-->
<?
// seleccionamos años Seleccionados
/*$sqlyear="SELECT
merca_temp_info.id_inf,
merca_temp_periodo.periodo
FROM
merca_temp_info
INNER JOIN merca_temp_periodo ON merca_temp_info.id_inf = merca_temp_periodo.codigo
WHERE
merca_temp_info.id_inf = '$datax'
ORDER BY
merca_temp_periodo.periodo ASC";
$rsy = mysql_query($sqlyear);
if (mysql_num_rows($rsy) > 0){
	echo"<table class='table table-hover'>";
	echo"<tr>";
    echo"<td colspan='2' align='center' bgcolor='#DFDFDF'>";
	echo"<b>A&ntilde;os Seleccionados</b>";
	echo"</td>";
	echo"</tr>";
	
	echo"<tr>";
	echo"<td><b>#</b></td>";
	echo"<td><b>A&ntilde;o(s)</b></td>";
	echo"</tr>";
	while($rowy = mysql_fetch_array($rsy)){
		$itemsy=$itemsy+1;
		$year=$rowy["periodo"];
		echo "<tr>";
		echo"<td>$itemsy</td>";
		echo"<td>$year</td>";
		echo "</tr>";
		}
		echo "</table>";
		}*/
?>


</body>
</html>
<?
include("pie.php");
?>