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
$sqlcant="SELECT
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
} 

$sql="SELECT
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
CONCAT(nan.partida,' ',nan.descrip) LIKE '%".$q."%'"; 
$res=mysql_query($sql,$link); 

if(mysql_num_rows($res)==0){ 

echo '<br><b>Incidencias no existe !!</b>'; 

}else{ 

//echo '<b>Sugerencias:</b><br />'; 
echo "<table border='0' class='table table-striped table-hover table-responsive' align='left'style='font-size:80%'>";
echo "<tr>";
echo "<td colspan='4' align='center' bgcolor='#D8D8D8'><b>
Resultado de Busqueda</b>
</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#F1F1F1' width='10'><b>Cod. Partida</b></td>";
echo "<td bgcolor='#F1F1F1' align='center'><b>Descripci&oacute;n de la Partida</b></td>";
echo "<td bgcolor='#F1F1F1' width='80'><b>Fecha Inicio</b></td>";
echo "<td bgcolor='#F1F1F1' width='80'><b>Fecha Final</b></td>";
echo "</tr>";
while($fila=mysql_fetch_array($res)){ 
$items = $items + 1;
$codp = $fila['partida'];
//$nomte = $nomte.' | '. $fila['descrip'];
$descri = htmlentities(utf8_decode($fila['descrip']));
$fini = $fila['finicio'];
$ffin = $fila['ffin'];

echo "<tr>";
echo "<td width='100'><a href='consultarpartida.php?data=$codp' target='_blank'>$codp</a></td>";
echo "<td><a href='consultarpartida.php?data=$codp' target='_blank'>$descri</a></td>";
echo "<td width='80'><a href='consultarpartida.php?data=$codp' target='_blank'>$fini</a></td>";
echo "<td width='80'><a href='consultarpartida.php?data=$codp' target='_blank'>$ffin</a></td>";

/*if($items==$cantidad){
echo "</tr>";
echo "<td>$codx</td>"; 
echo "<td><a href='infoview.php?data=$codx'>$nomte</a></td>"; 
echo "</tr>";
} */
echo "</tr>";
} 
echo "</table>";
} 




?> 
</body>
