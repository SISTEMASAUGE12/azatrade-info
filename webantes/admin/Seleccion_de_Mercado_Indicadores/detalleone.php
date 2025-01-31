<?
include ("conection/config.php");
$saa=$_GET["codx"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Azatrade - Mercado Internacional e Indicadores</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


<?
$sqltem="SELECT
ind.id,
ind.cod_indicador,
ind.idtema,
ind.nom_indicador,
ind.fuente_nota,
ind.fuente_org,
t.tema
FROM
merca_indicadores AS ind
INNER JOIN merca_tema AS t ON ind.idtema = t.id
WHERE
ind.id = '$saa'";
$rstem= mysql_query($sqltem);
if (mysql_num_rows($rstem) > 0){
	echo "<table border='0' class='table'>";
	echo "<tr>";
echo "<td colspan='3' align='center' bgcolor='#D8D8D8'>
<b>Detalle</b>
</td>";
echo "</tr>";
echo "<tr>";
echo "<td align='center'><b>Indicador</b></td>";
echo "<td align='center'><b>descripcion</b></td>";
echo "<td align='center'><b>Fuente</b></td>";
echo "</tr>";
	while($rowt = mysql_fetch_array($rstem)){
		//$cod=$rowt["id"];
		
		echo"<tr>";
		echo"<td align='justify'><em>".$rowt["nom_indicador"]."</em></td>";
		echo"<td align='justify'><em>".$rowt["fuente_nota"]."</em></td>";
		echo"<td align='justify'><em>".$rowt["fuente_org"]."</em></td>";
		echo"</tr>";
		
		}
		echo"<tr>";
		echo"<td colspan='3' align='center'><input class='btn btn-primary' name='resetea' onclick='javascript:history.back()' type='button' value='Volver a Listar' /></td>";
		echo "</tr>";
		echo"</table>";
		}
?>


</body>
</html>