<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<br>
<?php 

include ("conection/config.php");

$q=$_POST[q];  

//conatmos cantidad de partidas seleccionados
/*$sqlcant="SELECT
nan.partida,
nan.descrip,
nan.adval,
nan.igv,
nan.isc,
nan.seguro,
nan.cuode,
nan.ciiu,
nan.finicio,
nan.ffin,
CONCAT(nan.partida,' ',nan.descrip) as vars
FROM
part_nandina AS nan
WHERE
CONCAT(nan.partida,' ',nan.descrip) LIKE '%".$q."%' ";
$resc=mysql_query($sqlcant,$link); 
if (mysql_num_rows($resc) > 0){
//if(mysql_num_rows($resc)==0){ 
while($filac=mysql_fetch_array($resc)){
	$itemscant = $itemscant + 1;
	$cantidad = $itemscant;
	//echo"$cantidad";
} 
} */



$sql="SELECT
CONCAT('Codigo: ',cos_producto.id_prod,', ',cos_producto.nom_prov,', ',cos_producto.nom_cont,', ',cos_producto.correo_web,', ',cos_producto.pais) AS produ,
cos_producto.id_prod
FROM
cos_producto
where CONCAT(cos_producto.id_prod,', ',cos_producto.nom_prov,', ',cos_producto.nom_cont,', ',cos_producto.correo_web,', ',cos_producto.pais) like '%".$q."%'
ORDER BY
cos_producto.id_prod DESC
LIMIT 100"; 
/*
$sql="SELECT
CONCAT(cos_producto.nom_prov,', ',cos_producto.nom_cont,', ',cos_producto.correo_web,', ',cos_producto.pais) AS produ,
cos_producto.id_prod
FROM
cos_producto
where CONCAT(cos_producto.nom_prov,', ',cos_producto.nom_cont,', ',cos_producto.correo_web,', ',cos_producto.pais) like '%".$q."%'
ORDER BY
cos_producto.id_prod DESC 
LIMIT 100"; */
$res=mysql_query($sql,$link); 

if(mysql_num_rows($res)==0){ 

echo '<br><b>Busqueda Relacionada No Existe !!</b>'; 

}else{ 
echo "<table border='0' class='table table-striped table-hover table-responsive' align='left'style='font-size:100%'>";
echo "<tr>";
echo "<td bgcolor='#F1F1F1' align='center'><b>Codigo</b></td>";
echo "<td bgcolor='#F1F1F1' align='center'><b>Descripci&oacute;n de la Busqueda</b></td>";
echo "</tr>";
while($fila=mysql_fetch_array($res)){ 
$items = $items + 1;
$descri = htmlentities(utf8_decode($fila['produ']));
$idproduc = $fila['id_prod'];

/*Revisamos si genero todos los precesos*/
$sqlrevisa="SELECT cos_letras.id_prod FROM cos_letras WHERE cos_letras.id_prod = '$idproduc' GROUP BY cos_letras.id_prod";
 $rsnrev = mysql_query($sqlrevisa);
if (mysql_num_rows($rsnrev) > 0){
	while($rowrev = mysql_fetch_array($rsnrev)){
		$finproceso = $rowrev['id_prod'];
	}
}else{/*si no termino todo los procesos muestra cero*/
	$finproceso = "0";
}
/*Fin de revision de todos los precesos*/

echo "<tr>";
if($finproceso !='0'){
echo "<td width='70' align='center'><a href='rptcostofinal.php?id=$idproduc&paso=no&volv=no' target='_blank'>$idproduc</a></td>";
echo "<td><a href='rptcostofinal.php?id=$idproduc&paso=no&volv=no' target='_blank'>$descri</a></td>";
}else{
	echo "<td width='70' align='center'><a href='#' onmouseDown='alert('Registro Incompleto Crear Nuevo Analisis de Costo de Importacion')'>$idproduc</a></td>";
echo "<td><a href='javascript: void(0)'
 onclick='alert('TEXTOVENTANA');'>$descri</a> <label class='label-danger'>Incompleto</label></td>";
}
echo "</tr>";
} 
echo "</table>";
} 




?> 
</body>
