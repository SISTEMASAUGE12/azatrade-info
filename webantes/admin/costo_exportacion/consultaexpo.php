<?php


include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Exportacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script language="javascript" type="text/javascript">
function valida(lista) {
    if (lista.buscar.value.length < 1){
		alert("Ingrese Datos a Consultar");
		return false;
	}
	
	return true;
}
</script>
</head>

<body>
<br /><br /><br>

<form name="lista" method="get" onSubmit="return valida(this);" action="<?php echo $_SERVER['PHP_SELF']?>" >
<table class="table table-hover" style='font-size:80%'>
<tr>
<td align="right">
<b><h4>Consultar Datos</h4></b>
</td>
<td>
<input class="form-control" type="text" name="buscar" placeholder="Ingrese: Nombre Proveedor / Contacto / Pais / Correo-Web"  />
</td>
<td>
<input class="btn btn-primary" type="submit" name="consultar" value="Consultar" />
</td>
</tr>

</table>
</form>
</body>
</html>
<?php
if (isset($_GET['consultar'])){
	
$sqlx="SELECT CONCAT(cos_expo_producto.nom_prov,' | ',cos_expo_producto.nom_cont,' | ',cos_expo_producto.pais,' | ',cos_expo_producto.correo_web) as dato, cos_expo_producto.id_prod FROM cos_expo_producto WHERE CONCAT(cos_expo_producto.nom_prov,' | ',cos_expo_producto.nom_cont,' | ',cos_expo_producto.pais,' | ',cos_expo_producto.correo_web) LIKE '%".$_GET["buscar"]."%' ORDER BY cos_expo_producto.id_prod ASC";
 $rsnv = mysql_query($sqlx);
if (mysql_num_rows($rsnv) > 0){
	echo "<table class='table table-hover' style='font-size:80%'";
	echo "<tr>";
	echo "<td><b>#</b></td>";
	echo "<td><b>Resultados</b></td>";
	echo "</tr>";
	while($rowv = mysql_fetch_array($rsnv)){
		$items = $items + 1 ;
		$datos = $rowv["dato"];
		$codigo = $rowv["id_prod"];
		
		echo "<tr>";
		echo "<td>$items</td>";
		echo "<td><a href='rptexpofinal.php?expo=$codigo&consu=no'>$datos</a></td>";
		echo "</tr>";
		
	}
	
	echo "</table>";
}else{
	echo "<center><b>No hay Resultados !! </b></center>";
}
	
}
	?>
<?php
include("pie.php");
?>