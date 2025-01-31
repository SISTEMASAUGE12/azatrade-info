<?
//include ("conection/config.php");
$sqlpg="SELECT
pag.id,
pag.cod_tipo_bus,
tb.busqueda,
pag.cod_pais,
pa.pais,
pag.cod_pais_merca,
mp.pais AS mpais,
pag.cod_sector,
se.sector,
pag.cod_producto,
/*prod.producto,*/
pag.cod_tema,
te.tema,
pag.cod_idioma,
pi.idioma,
pag.cod_tipo_dato,
td.tipo_dato,
pag.cod_alcance,
palc.alcance,
pag.cod_tipo_acceso,
pta.tipo_acceso,
pag.cod_variable,
v.variable,
pag.cod_entre,
pen.entregable,
pag.cod_inst,
pins.institucion,
pag.nom_inst,
pag.nom_pag,
pag.descri_pag,
pag.dire_pag,
pag.fecha_actu,
pag.carga_ar,
pag.tipo_ar,
pag.descri_entre,
ROUND(pag.costo,2) AS costo,
/*CONCAT(tb.busqueda,pa.pais,pa.pais,se.sector,prod.producto,te.tema,pi.idioma,td.tipo_dato,palc.alcance,pta.tipo_acceso,v.variable,pen.entregable,pins.institucion) AS leyenda,*/
CONCAT(tb.busqueda,pa.pais,pa.pais,se.sector,te.tema,pi.idioma,td.tipo_dato,palc.alcance,pta.tipo_acceso,v.variable,pen.entregable,pins.institucion) AS leyenda,
pag.buscar
FROM
pag_datapagina AS pag
INNER JOIN pag_tipo_bus AS tb ON pag.cod_tipo_bus = tb.id
INNER JOIN merca_pais AS pa ON pag.cod_pais = pa.id
INNER JOIN merca_pais AS mp ON pag.cod_pais_merca = mp.id
INNER JOIN sector AS se ON pag.cod_sector = se.id
/*INNER JOIN producto AS prod ON pag.cod_producto = prod.id*/
INNER JOIN pag_tema AS te ON pag.cod_tema = te.id
INNER JOIN pag_idioma AS pi ON pag.cod_idioma = pi.id
INNER JOIN pag_tipo_dato AS td ON pag.cod_tipo_dato = td.id
INNER JOIN pag_alcance AS palc ON pag.cod_alcance = palc.id
INNER JOIN pag_tipo_acceso AS pta ON pag.cod_tipo_acceso = pta.id
INNER JOIN variable AS v ON pag.cod_variable = v.id
INNER JOIN pag_entregable AS pen ON pag.cod_entre = pen.id
INNER JOIN pag_institucion AS pins ON pag.cod_inst = pins.id
WHERE
pag.buscar = '' ";

$rsnpg = mysql_query($sqlpg);

if (mysql_num_rows($rsnpg) > 0){
	while($rowpg = mysql_fetch_array($rsnpg)){
		
		$cod=$rowpg["id"];
		$busA=$rowpg["busqueda"];
		$paisA=$rowpg["pais"];
		$mercA=$rowpg["mpais"];
		$secA=$rowpg["sector"];
		$prodA=$rowpg["producto"];
		$temA=$rowpg["tema"];
		$instA=$rowpg["institucion"];
		$nominsA=$rowpg["nom_inst"];
		$nompagA=$rowpg["nom_pag"];
		$descriA=$rowpg["descri_pag"];
		$direA=$rowpg["dire_pag"];
		$idioA=$rowpg["idioma"];
		$tdaA=$rowpg["tipo_dato"];
		$alcA=$rowpg["alcance"];
		$tacceA=$rowpg["tipo_acceso"];
		$variA=$rowpg["variable"];
		//$fultA=$rowpg["fecha_actu"];
		//$cargA=$rowpg["carga_ar"];
		//$tarA=$rowpg["tipo_ar"];
		$entA=$rowpg["entregable"];
		$descrientA=$rowpg["descri_entre"];
		//$costA=$rowpg["costo"];
		$cadenatexto = $busA.''.$paisA.''.$mercA.''.$secA.''.$prodA.''.$temA.''.$instA.''.$nominsA.''.$nompagA.''.$descriA.''.$direA.''.$idioA.''.$tdaA.''.$alcA.''.$tacceA.''.$variA;
//echo "$cadenatexto";
$Sql="update pag_datapagina set buscar='".$cadenatexto."' where id='".$cod."'";
  
    mysql_query($Sql,$link); 
  }
  } 
  
   mysql_close($link);
   
   
?>