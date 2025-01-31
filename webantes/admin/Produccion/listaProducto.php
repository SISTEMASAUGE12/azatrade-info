<?php
//$mysqli= new mysqli("localhost","root","jopedis","produccion");
include ("conection/ini.php");

if($mysqli ->connect_errno)
{
	echo "Fallo al conectar".$mysqli->connect_errno;

}
else
{

	$mysqli->set_charset("utf8");

	$jsondata = array();
	$jsondataList = array();

	if($_GET['param1']=="cuantos")
	{

		$myquery = "SELECT COUNT(*) total FROM producto";

		$resultado = $mysqli->query($myquery);

		$fila = $resultado ->fetch_assoc();

		$jsondata['total'] = $fila['total'];
	}
	elseif($_GET["param1"]=="dame")
	{
		$myquery = "SELECT
producto.id,
sector.sector,
producto.producto,
producto.eliminado
FROM
producto
INNER JOIN sector ON producto.idsector = sector.id
WHERE
producto.eliminado = '0'
ORDER BY
sector.sector ,
producto.producto ASC LIMIT ".$mysqli->real_escape_string($_GET['limit'])." OFFSET ".$mysqli->real_escape_string($_GET["offset"]);

		$resultado = $mysqli->query($myquery);
		while($fila = $resultado ->fetch_assoc())
		{
			$idp = $fila["id"];
			$jsondataperson = array();
			$jsondataperson["id"] = $fila["id"];
			$jsondataperson["sector"] = $fila["sector"];
			$jsondataperson["producto"] = $fila["producto"];
			$jsondataperson["editar"] = "<a href='addproduc.php?idp=$idp'><img src='img/editar.png' width='20' height='18' title='Editar Registro'></a>";
			$jsondataperson["eliminar"] = "<a href='deleteproduct.php?idp=$idp'><img src='img/delete.png' width='20' height='18' title='Eliminar Registro'></a>";

			$jsondataList[]=$jsondataperson;

		}

		$jsondata["lista"] = array_values($jsondataList);
	}

header("Content-type:application/json; charset = utf-8");
echo json_encode($jsondata);
exit();
}

?>