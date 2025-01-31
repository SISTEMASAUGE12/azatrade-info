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

		$myquery = "SELECT COUNT(*) total FROM variable";

		$resultado = $mysqli->query($myquery);

		$fila = $resultado ->fetch_assoc();

		$jsondata['total'] = $fila['total'];
	}
	elseif($_GET["param1"]=="dame")
	{
		$myquery = "SELECT
variable.id,
variable.variable,
variable.eliminado
FROM
variable
WHERE
variable.eliminado = '0'
ORDER BY
variable.variable ASC LIMIT ".$mysqli->real_escape_string($_GET['limit'])." OFFSET ".$mysqli->real_escape_string($_GET["offset"]);

		$resultado = $mysqli->query($myquery);
		while($fila = $resultado ->fetch_assoc())
		{
			$cod = $fila["id"];
			$jsondataperson = array();
			$jsondataperson["id"] = $fila["id"];
			$jsondataperson["variable"] = $fila["variable"];
			$jsondataperson["editar"] = "<a href='addVari.php?cod=$cod'><button class='btn btn-primary'><i class='fa fa-pencil'></i> Editar</button></a>";
			$jsondataperson["eliminar"] = "<a href='deletevar.php?cod=$cod'><button class='btn btn-danger'><i class='fa fa-close'></i> Eliminar</button></a>";
			
			
			//$jsondataperson["producto"] = $fila["producto"];
			//$jsondataperson["eliminado"] = $fila["eliminado"];

			$jsondataList[]=$jsondataperson;

		}

		$jsondata["lista"] = array_values($jsondataList);
	}

header("Content-type:application/json; charset = utf-8");
echo json_encode($jsondata);
exit();
}

?>