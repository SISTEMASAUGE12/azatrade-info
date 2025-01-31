<?
include ("conection/config.php");

$wa=$_GET['cod'];
//echo "$wa xx<br>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Azatrade - Mercado Internacional e Indicadores</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
<Script type = "text/javascript" src = "ajax2.js"> </script> 
</head>

<body>
<br>
<Center> 
Busqueda:  <input type = "text" id = "bus" name = "bus" placeholder = "Ingrese Datos" onkeyup = "loadXMLDoc ()" required />  

<Div id ="myDiv"> </div> 
<br>

<?
$sqltem="SELECT
merca_tema.id as idt,
merca_tema.tema,
merca_indicadores.nom_indicador,
merca_indicadores.id as idi
FROM
merca_tema
INNER JOIN merca_indicadores ON merca_tema.id = merca_indicadores.idtema
WHERE
merca_tema.id = ".$_GET["cod"]." order by merca_indicadores.nom_indicador asc";
$rstem= mysql_query($sqltem);
if (mysql_num_rows($rstem) > 0){
	
	$sqlt="SELECT
merca_tema.id,
merca_tema.tema,
merca_tema.descripcion
FROM
merca_tema
WHERE
merca_tema.id = '$wa'";
	$rsntt = mysql_query($sqlt);
if (mysql_num_rows($rsntt) > 0){
	while($rowtt = mysql_fetch_array($rsntt)){
		$ttemanom=$rowtt["tema"];
		}
		}
	
	echo "<table border='0' class='table'>";
	echo "<tr>";
echo "<td colspan='2' align='center' bgcolor='#D8D8D8'>
<b>Tema: $ttemanom</b>
</td>";
echo "</tr>";
echo "<tr>";
//echo "<td align='center'><b>Tema</b></td>";
echo "<td align='center'><b>Nombre Indicador</b></td>";
echo "</tr>";
	while($rowt = mysql_fetch_array($rstem)){
		$codx=$rowt["idi"];
		$nomindxx = $rowt["nom_indicador"];
		$nomtex = $rowt["tema"];
		$comple = $nomindxx.' | '.$nomtex;
		
		echo"<tr>";
		//echo"<td><em>".$rowt["tema"]."</em></td>";
		echo"<td><a href='detalleone.php?codx=$codx'>".$rowt["nom_indicador"]."</a></td>";
		//echo"<td><a href='detalleone.php?codx=$codx'>$comple</a></td>";
		echo"</tr>";
		
		}
		echo"</table>";
		}
?>
</body>
</html>