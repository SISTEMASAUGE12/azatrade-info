<?php 
include ("conection/config.php");
include ("menu.php");
$row = 1; 
$fp = fopen ("PRODUCCIONXXDD.csv","r"); 
while ($data = fgetcsv ($fp, 120, ";")) 
{ 
$num = count ($data); 
print " <br>"; 
$row++; 
//echo "$row- ".$data[0].$data[1].$data[2].$data[3].$data[4].$data[5].$data[6].$data[7].$data[8].$data[9].$data[10].$data[11].$data[12].$data[13].$data[14].$data[15].$data[16].$data[17].$data[18].$data[19]; 
echo $data[0].$data[1].$data[2].$data[3].$data[4].$data[5].$data[6].$data[7].$data[8].$data[9].$data[10].$data[11].$data[12].$data[13].$data[14].$data[15].$data[16].$data[17].$data[18].$data[19]; 
$insertar="INSERT INTO produccion (id,idsector,iddepartamento,idproducto,idvariable,idmedida,año,periodo,enero,febero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre,rr) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]','$data[14]','$data[15]','$data[16]','$data[17]','$data[18]','$data[19]')"; 
mysql_query($insertar); 
} 
fclose ($fp); 
?>