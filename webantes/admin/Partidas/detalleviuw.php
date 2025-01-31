<?php
include ("conection/config.php");
$cod= $_GET["cod"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Gestion de Partidas</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
$sqlvista="SELECT
part_lista_arancel.codigo,
SUBSTRING(part_lista_arancel.codigo,1,4) AS codigos,
part_lista_arancel.descripcion
FROM
part_lista_arancel
WHERE
SUBSTRING(part_lista_arancel.codigo,1,4) = '$cod'";
$rsnv = mysql_query($sqlvista) or die(mysql_error());
if (mysql_num_rows($rsnv) > 0){
	echo "<table class=table table-responsive'>
<tr>
<td bgcolor='#DDDDDD'><b>Codigo</b></td>
<td bgcolor='#DDDDDD'><b>Descripcion</b></td>
</tr>";
	while($rowv= mysql_fetch_array($rsnv)){
		$codi = $rowv["codigo"];
		$descri = $rowv["descripcion"];
		echo "<tr>";
		echo "<td>$codi</td>";
		echo "<td>$descri</td>";
		echo "</tr>";
		}
}
echo"</table>";
?>

<!-- <table class="table table-responsive">
<tr>
<td>Codigo</td>
<td>Descripcion</td>
</tr>


</table> -->


</body>
</html>