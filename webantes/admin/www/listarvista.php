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

		$myquery = "SELECT COUNT(*) total
FROM pag_datapagina AS pag
INNER JOIN pag_tipo_bus AS tb ON pag.cod_tipo_bus = tb.id
INNER JOIN merca_pais AS pa ON pag.cod_pais = pa.id
INNER JOIN merca_pais AS mp ON pag.cod_pais_merca = mp.id
INNER JOIN sector AS se ON pag.cod_sector = se.id
INNER JOIN pag_tema AS te ON pag.cod_tema = te.id
INNER JOIN pag_idioma AS pi ON pag.cod_idioma = pi.id
INNER JOIN pag_tipo_dato AS td ON pag.cod_tipo_dato = td.id
INNER JOIN pag_alcance AS palc ON pag.cod_alcance = palc.id
INNER JOIN pag_tipo_acceso AS pta ON pag.cod_tipo_acceso = pta.id
INNER JOIN variable AS v ON pag.cod_variable = v.id
LEFT JOIN pag_entregable AS pen ON pag.cod_entre = pen.id
INNER JOIN pag_institucion AS pins ON pag.cod_inst = pins.id
WHERE pag.estado = '1' order by pag.id DESC";

		$resultado = $mysqli->query($myquery);

		$fila = $resultado ->fetch_assoc();

		$jsondata['total'] = $fila['total'];
	}
	elseif($_GET["param1"]=="dame")
	{
		$myquery = "SELECT
pag.id, pag.cod_tipo_bus, tb.busqueda, pag.cod_pais, pa.pais, pag.cod_pais_merca, mp.pais AS mpais, pag.cod_sector, se.sector, pag.cod_producto, /*prod.producto,*/ pag.cod_tema, te.tema, pag.cod_idioma, pi.idioma, pag.cod_tipo_dato, td.tipo_dato, pag.cod_alcance, palc.alcance, pag.cod_tipo_acceso, pta.tipo_acceso, pag.cod_variable, v.variable, pag.cod_entre, pen.entregable, pag.cod_inst, pins.institucion, pag.nom_inst, pag.nom_pag, pag.descri_pag, pag.dire_pag, pag.fecha_actu, pag.carga_ar, pag.tipo_ar, pag.descri_entre, ROUND(pag.costo,2) as costo, 
CONCAT(tb.busqueda,pa.pais,pa.pais,se.sector,te.tema,pi.idioma,td.tipo_dato,palc.alcance,pta.tipo_acceso,v.variable,pen.entregable,pins.institucion) as leyenda
FROM pag_datapagina AS pag
INNER JOIN pag_tipo_bus AS tb ON pag.cod_tipo_bus = tb.id
INNER JOIN merca_pais AS pa ON pag.cod_pais = pa.id
INNER JOIN merca_pais AS mp ON pag.cod_pais_merca = mp.id
INNER JOIN sector AS se ON pag.cod_sector = se.id
INNER JOIN pag_tema AS te ON pag.cod_tema = te.id
INNER JOIN pag_idioma AS pi ON pag.cod_idioma = pi.id
INNER JOIN pag_tipo_dato AS td ON pag.cod_tipo_dato = td.id
INNER JOIN pag_alcance AS palc ON pag.cod_alcance = palc.id
INNER JOIN pag_tipo_acceso AS pta ON pag.cod_tipo_acceso = pta.id
INNER JOIN variable AS v ON pag.cod_variable = v.id
LEFT JOIN pag_entregable AS pen ON pag.cod_entre = pen.id
INNER JOIN pag_institucion AS pins ON pag.cod_inst = pins.id
WHERE
pag.estado = '1'
order by pag.id DESC LIMIT ".$mysqli->real_escape_string($_GET['limit'])." OFFSET ".$mysqli->real_escape_string($_GET["offset"]);

		$resultado = $mysqli->query($myquery);
		while($fila = $resultado ->fetch_assoc())
		{
			$cod= $fila["id"];
			$jsondataperson = array();
			$jsondataperson["nompag"] = $fila["nom_pag"];
			/*$jsondataperson["pais"] = $fila["mpais"];*/
			$jsondataperson["idioma"] = $fila["idioma"];
			/*$jsondataperson["acceso"] = $fila["tipo_acceso"];*/
			$jsondataperson["alcance"] = $fila["alcance"];
			$jsondataperson["tdato"] = $fila["tipo_dato"];
			$jsondataperson["sector"] = $fila["sector"];
			$jsondataperson["tema"] = $fila["tema"];
			$jsondataperson["ver"] = "<a href=detail.php?true=$cod><button class='btn btn-primary'><i class='fa fa-pencil'></i></button</a>";
	
			
			
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