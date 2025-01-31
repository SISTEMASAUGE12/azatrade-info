<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<?php 

include ("conection/config.php");

/*function conexion(){ 

$con = mysql_connect("localhost","root","jopedis"); 

if (!$con){ 

die('Could not connect: ' . mysql_error()); 
} 

mysql_select_db("produccion", $con); 

return($con); 

} */



$q=$_POST[q]; 
//$con=conexion(); 

$sql="SELECT
merca_tema.id as idt,
merca_tema.tema,
merca_indicadores.nom_indicador,
merca_indicadores.id as idi
FROM
merca_tema
INNER JOIN merca_indicadores ON merca_tema.id = merca_indicadores.idtema
WHERE
merca_indicadores.nom_indicador LIKE '%".$q."%' order by merca_indicadores.nom_indicador asc"; 
$res=mysql_query($sql,$link); 

if(mysql_num_rows($res)==0){ 

echo '<br><b>Incidencias no existe !!</b>'; 

}else{ 

//echo '<b>Sugerencias:</b><br />'; 
echo "<table border='0' class='table'>";
echo "<tr>";
echo "<td colspan='7' align='center' bgcolor='#D8D8D8'><b>
Resultado de Busqueda</b>
</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#F1F1F1'><b>Nombre Indicador</b></td>";
//echo "<td bgcolor='#F1F1F1'><b>Descripcion</b></td>";
//echo "<td bgcolor='#F1F1F1'><b>Nombre Comun</b></td>";
//echo "<td bgcolor='#F1F1F1'><b>Numero Partida</b></td>";
//echo "<td bgcolor='#F1F1F1'><b>Unidad</b></td>";
//echo "<td bgcolor='#F1F1F1'><b>Nombre Tecnico</b></td>";
//echo "<td bgcolor='#F1F1F1'><b>Detalle</b></td>";
echo "</tr>";
while($fila=mysql_fetch_array($res)){ 
$codx = $fila['idi'];
$nomtex = $fila['nom_indicador'];
$nomtemx = $fila['tema'];
$nomte = $nomtex.' | '.$nomtemx;
//$nomdes = $fila['des_p'];
//$nomcom = $fila['nomc_p'];
//$nompa = $fila['partida_p'];
//$nomun = $fila['uni_p'];
//$nomte = $fila['nomt_p'];
echo "</tr>";
//echo "<td>$nompr</td>"; 
//echo "<td>$nomdes</td>"; 
//echo "<td>$nomcom</td>"; 
//echo "<td>$nompa</td>"; 
//echo "<td>$nomun</td>";
echo "<td><a href='detalleone.php?codx=$codx'>$nomte</a></td>"; 
//echo "<td><a href='viewreslt3.php?idreg=$idreg'><img src='images/consult.png'></a></td>";
echo "</tr>";
} 
echo "</table>";
} 

?> 