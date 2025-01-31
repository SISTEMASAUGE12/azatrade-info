<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<br>
<?php 

include ("conection/config.php");

$q=$_POST[q];  

//conatmos cantidad de indicadores seleccionados
$sqlcant="SELECT
merca_indicadores.nom_indicador
FROM
merca_temp_indi2
INNER JOIN merca_indicadores ON merca_temp_indi2.id_indi = merca_indicadores.cod_indicador
WHERE
merca_temp_indi2.codigo LIKE '%".$q."%'
GROUP BY
merca_indicadores.nom_indicador
ORDER BY
merca_indicadores.nom_indicador ASC";
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
merca_indicadores.nom_indicador,
merca_temp_info.id_inf
FROM
merca_temp_info
INNER JOIN merca_temp_indi2 ON merca_temp_info.id_inf = merca_temp_indi2.codigo
LEFT OUTER JOIN merca_indicadores ON merca_temp_indi2.id_indi = merca_indicadores.cod_indicador
WHERE
merca_temp_info.id_inf LIKE '%".$q."%'
GROUP BY
merca_indicadores.nom_indicador
ORDER BY
merca_temp_info.id_inf,
trim(merca_indicadores.nom_indicador) ASC"; 
$res=mysql_query($sql,$link); 

if(mysql_num_rows($res)==0){ 

echo '<br><b>Incidencias no existe !!</b>'; 

}else{ 

//echo '<b>Sugerencias:</b><br />'; 
echo "<table border='0' class='table'>";
echo "<tr>";
echo "<td colspan='3' align='center' bgcolor='#D8D8D8'><b>
Resultado de Busqueda</b>
</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#F1F1F1'><b>Codigo</b></td>";
echo "<td bgcolor='#F1F1F1'><b>Nombre Indicador</b></td>";
echo "</tr>";
while($fila=mysql_fetch_array($res)){ 
$codx = $fila['id_inf'];
$items = $items + 1;
$nomte = $nomte.' | '. $fila['nom_indicador'];

if($items==$cantidad){
echo "</tr>";
echo "<td>$codx</td>"; 
echo "<td><a href='infoview.php?data=$codx'>$nomte</a></td>"; 
echo "</tr>";
} 

} 
echo "</table>";
} 




?> 
</body>