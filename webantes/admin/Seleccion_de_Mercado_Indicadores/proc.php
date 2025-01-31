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
ttp.id_prod,
ttp.nom_p,
ttp.des_p,
ttp.pre_p,
ttp.nomc_p,
ttp.nomt_p,
ttp.partida_p,
ttp.des_ara_p,
ttp.uni_p,
ttp.id_sector
FROM
merca_temp_prod AS ttp
WHERE
ttp.id_prod LIKE '".$q."%' ORDER BY
ttp.id_prod DESC"; 
$res=mysql_query($sql,$link); 

if(mysql_num_rows($res)==0){ 

echo '<br><b>No Existe Codigo !!</b>'; 

}else{ 

//echo '<b>Sugerencias:</b><br />'; 
echo "<table border='0' class='table'>";
echo "<tr>";
echo "<td colspan='7' align='center' bgcolor='#D8D8D8'><b>
Resultado de Busqueda</b>
</td>";
echo "</tr>";
echo "<tr>";
echo "<td bgcolor='#F1F1F1'><b>Producto</b></td>";
echo "<td bgcolor='#F1F1F1'><b>Descripcion</b></td>";
echo "<td bgcolor='#F1F1F1'><b>Nombre Comun</b></td>";
echo "<td bgcolor='#F1F1F1'><b>Numero Partida</b></td>";
echo "<td bgcolor='#F1F1F1'><b>Unidad</b></td>";
echo "<td bgcolor='#F1F1F1'><b>Nombre Tecnico</b></td>";
echo "<td bgcolor='#F1F1F1'><b>Detalle</b></td>";
echo "</tr>";
while($fila=mysql_fetch_array($res)){ 
$idreg = $fila['id_prod'];
$nompr = $fila['nom_p'];
$nomdes = $fila['des_p'];
$nomcom = $fila['nomc_p'];
$nompa = $fila['partida_p'];
$nomun = $fila['uni_p'];
$nomte = $fila['nomt_p'];
echo "</tr>";
echo "<td>$nompr</td>"; 
echo "<td>$nomdes</td>"; 
echo "<td>$nomcom</td>"; 
echo "<td>$nompa</td>"; 
echo "<td>$nomun</td>";
echo "<td>$nomte</td>"; 
echo "<td><a href='viewreslt3.php?idreg=$idreg'><img src='images/consult.png'></a></td>";
echo "</tr>";
} 
echo "</table>";
} 

?> 