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

		$myquery = "SELECT COUNT(*) total FROM departamento";

		$resultado = $mysqli->query($myquery);

		$fila = $resultado ->fetch_assoc();

		$jsondata['total'] = $fila['total'];
	}
	elseif($_GET["param1"]=="dame")
	{
		$myquery = "SELECT
departamento.id,
departamento.coddep,
departamento.departamento,
departamento.provincia,
departamento.distrito,
departamento.eliminado
FROM
departamento
WHERE
departamento.eliminado = '0'
ORDER BY
departamento.departamento,
departamento.provincia,
departamento.distrito ASC LIMIT ".$mysqli->real_escape_string($_GET['limit'])." OFFSET ".$mysqli->real_escape_string($_GET["offset"]);

		$resultado = $mysqli->query($myquery);
		while($fila = $resultado ->fetch_assoc())
		{
			$cod = $fila["id"];
			$jsondataperson = array();
			$jsondataperson["coddep"] = $fila["coddep"];
			$jsondataperson["departamento"] = $fila["departamento"];
			$jsondataperson["provincia"] = $fila["provincia"];
			$jsondataperson["distrito"] = $fila["distrito"];
			$jsondataperson["editar"] = "<a href='addepart.php?cod=$cod'><img src='img/editar.png' width='20' height='18' title='Editar Registro'></a>";
			$jsondataperson["eliminar"] = "<a href='deletedepar.php?cod=$cod'><img src='img/delete.png' width='20' height='18' title='Eliminar Registro'></a>";
			
			
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