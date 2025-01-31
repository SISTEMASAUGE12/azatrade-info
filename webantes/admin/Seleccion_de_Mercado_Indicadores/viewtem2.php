<?

include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menuB.php");
echo"</header>";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Mercado Internacional e Indicadores</title>
<!--<link rel="stylesheet" href="css/stylex.css" /> -->
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script language='JavaScript'>
/*ventana emergente*/
var newwindow;
function popup(url)
{ newwindow=window.open(url,'name','width=750,height =450,left=200,top=90,scrollbars=NO,menubar=NO,titlebar= NO,status=NO,toolbar=NO');
if (window.focus) {newwindow.focus()}
}
</script>

</head>

<body>

<br><br>
<?
$sqltem="SELECT
merca_tema.id,
merca_tema.tema,
merca_tema.descripcion
FROM
merca_tema
ORDER BY
merca_tema.tema ASC";
$rstem= mysql_query($sqltem);
if (mysql_num_rows($rstem) > 0){
	echo "<table border='0' class='table'>";
	echo "<tr>";
echo "<td colspan='3' align='center' bgcolor='#D8D8D8'>
<b>Lista de Temas</b>
</td>";
echo "</tr>";
echo "<tr>";
echo "<td align='center'><b>Codigo</b></td>";
echo "<td align='center'><b>Tema</b></td>";
echo "<td align='center'><b>Descripcion</b></td>";
echo "</tr>";
	while($rowt = mysql_fetch_array($rstem)){
		$cod=$rowt["id"];
		
		echo"<tr>";
		echo"<td><em>".$rowt["id"]."</em></td>";
		
		echo"<td><a href='detalleindicate.php?cod=$cod' title='Ver detalle de Indicadores' onClick=\"popup('detalleindicate.php?cod=$cod'); return false;\"><em>".$rowt["tema"]."</a></em></td>";
		
		//echo"<td><a href='detalleindicate.php?cod=$cod' title='Ver detalle de Indicadores' onClick=\"popup('detalleindicate.php?cod=$cod'); return false;\"><em>".$rowt["tema"]."</a></em></td>";
		
		echo"<td><em>".$rowt["descripcion"]."</em></td>";
		echo"</tr>";
		
		}
		echo"</table>";
		}
		//pie de pagina
		include("pie.php");
?>

</body>
</html>