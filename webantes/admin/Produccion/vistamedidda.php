<?
include ("conection/config.php");
include ("menu.php");

$sqlm="SELECT id,medida,eliminado from medida where eliminado='0' order by medida ";
$rsnm = mysql_query($sqlm);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Produccion</title>

<style>
table {
  font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size:12px;
  
  /*font-family: 'Open Sans', sans-serif;*/
}
</style>

<script language="JavaScript">
<!-- Hide JavaScript from Java-cambia de color las filas de la tabla
function NavRollOver(oTd){if(!oTd.contains(event.fromElement)){oTd.bgColor="33CCFF";}}
function NavRollOut(oTd){if(!oTd.contains(event.toElement)){oTd.bgColor="#CCFFFF";}}
//-->
</script>
</head>

<body>
<p>
<br>
<?
if (mysql_num_rows($rsnm) > 0){
	
	echo "<center>";
echo "<table border = '1' bordercolor='#00CCFF' style='background-color:#CCFFFF;
   color:#039;
   width: 300px;
   padding: 10px;
   border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC; class='table''>";
echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
echo "<td colspan='2'><center><a href='adduni.php'><img src='img/nuevo.png' width='80' height='35' title='Nuevo Registro'></a></center></td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='4' bgcolor=#33CCFF><b><center>Lista de Unidad Medidas</center></b></td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor=#33CCFF><b><center>Items</center></b></td>";
echo "<td bgcolor=#33CCFF><b><center>Und. Medida</center></b></td>";
echo "<td bgcolor=#33CCFF><b><center>Editar</center></b></td>";
echo "<td bgcolor=#33CCFF><b><center>Eliminar</center></b></td>";
echo "</tr>";
	
	while($rowm = mysql_fetch_array($rsnm)){
$cod = $rowm["id"];
//$codf = $rowpg["numero_recibo"];

$items=$items+1;

echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
echo "<td> <center>".$items."</center></td> ";
echo "<td> <center>".$rowm["medida"]."</center></td> ";
echo "<td><center><a href=\"imprimefac.php?codigo=$cod\" onClick=\"popup('imprimefac.php?codigo=$cod'); return false;\"><img src='img/editar.png' width='13' height='12' title='Editar Registro'></a></center></td>";
echo "<td><center><a href=\"anulaprog.php?codigo=$cod\" onClick=\"popup('anulaprog.php?codigo=$cod'); return false;\"><img src='img/delete.png' width='13' height='12' title='Eliminar Registro'></a></center></td>";
//</tr>";
echo "</tr> ";
}
}else 
{
	echo "No hay Registro";
}
//mysql_close($conn);

mysql_close($link);
?>
</body>
</html>