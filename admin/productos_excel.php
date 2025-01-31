<?php
header("Pragma: public");  
header("Expires: 0");  
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
header("Content-Type: application/force-download");  
header("Content-Type: application/octet-stream");  
header("Content-Type: application/download");  
header("Content-Disposition: attachment;filename=Lista_Productos.xls ");  
header("Content-Transfer-Encoding: binary ");

include("incBD/inibd.php");
set_time_limit(750);

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>

<body>
      
      <?php
	
$sqlt="SELECT
p.idcod,
p.partida_nandi,
p.prod_especifico,
p.prod_generico,
p.presentacion,
p.partida_desc,
p.tipo_sec,
p.sector,
p.subsector,
p.detalle_sector,
p.imgfoto,
descri_corto,
vfobusdserdol1,
vfobusdserdol2,
vfobusdserdol3,
vpesnet1,
vpesnet2,
vpesnet3,
precio1,
precio2,
precio3,
mostrar,
origen_expor,
origen_impor,
impo_vfobusdserdol1,
impo_vfobusdserdol2,
impo_vfobusdserdol3,
impo_vpesnet1,
impo_vpesnet2,
impo_vpesnet3,
impo_precio1,
impo_precio2,
impo_precio3,
cuode,
clasificacion4
FROM
productos as p
WHERE p.estado='A'  
ORDER BY
p.idcod DESC";
$resultado1=$conexpg->query($sqlt); 
	  ?>
<table cellspacing="0" cellpadding="0" width="100%" style="font-size:12px;">
<tr>
<td colspan="12" align="center"><b><font size="+2"><b>Reporte Lista de Productos</b><br> </b></font></b></td>
</tr>
                        <tr>
<th><b> Partida </b></th>
<th><b>Producto Especifico</b></th>
<th><b>Presentacion</b></th>
<th><b>Partida Descripcion</b></th>
<th><b>Descripcion Corto</b></th>
<th><b>Tipo Sector</b></th>
<th><b>Sector</b></th>
<th><b>SubSector</b></th>
<th><b>Export VFOBSERDOL 2021</b></th>
<th><b>Export VFOBSERDOL 2022</b></th>
<th><b>Export VFOBSERDOL 2023</b></th>
<th><b>Export Peso Neto 2021</b></th>
<th><b>Export Peso Neto 2022</b></th>
<th><b>Export Peso Neto 2023</b></th>
<th><b>Export Precio 2021</b></th>
<th><b>Export Precio 2022</b></th>
<th><b>Export Precio 2023</b></th>
<th><b>Import VFOBSERDOL 2021</b></th>
<th><b>Import VFOBSERDOL 2022</b></th>
<th><b>Import VFOBSERDOL 2023</b></th>
<th><b>Import Peso Neto 2021</b></th>
<th><b>Import Peso Neto 2022</b></th>
<th><b>Import Peso Neto 2023</b></th>
<th><b>Import Precio 2021</b></th>
<th><b>Import Precio 2022</b></th>
<th><b>Import Precio 2023</b></th>
<th><b>Origen Export</b></th>
<th><b>Origen Import</b></th>
<th><b>Web</b></th>
<!--<th><b>CUODE</b></th>
<th><b>USO</b></th> -->
                          </tr>
 <?php
  if($resultado1->num_rows>0){ 
  while($fila1=$resultado1->fetch_array()){
	  $codi= $fila1['idcod'];
		  $datonomp1= $fila1['partida_nandi'];
		  $datonomp2= $fila1['prod_especifico'];
		  $datonomp3= $fila1['prod_generico'];
		  $datonomp4= $fila1['presentacion'];
		  $datonomp5= $fila1['partida_desc'];
		  $datonomp6= $fila1['tipo_sec'];
		  $datonomp7= $fila1['sector'];
		  $datonomp8= $fila1['subsector'];
		  $datonomp9= $fila1['detalle_sector'];
		  $datonomp10= $fila1['imgfoto'];
				  
				  $datonomp10x= $fila1['descri_corto'];
				  $datonomp11= $fila1['vfobusdserdol1'];
				  $datonomp12= $fila1['vfobusdserdol2'];
				  $datonomp13= $fila1['vfobusdserdol3'];
				  $datonomp14= $fila1['vpesnet1'];
				  $datonomp15= $fila1['vpesnet2'];
				  $datonomp16= $fila1['vpesnet3'];
				  $datonomp17= $fila1['precio1'];
				  $datonomp18= $fila1['precio2'];
				  $datonomp19= $fila1['precio3'];
				  $datonomp20= $fila1['mostrar'];
				  
				  $datonomp21= $fila1['origen_expor'];
				  $datonomp22= $fila1['origen_impor'];
				  $datonomp23= $fila1['impo_vfobusdserdol1'];
				  $datonomp24= $fila1['impo_vfobusdserdol2'];
				  $datonomp25= $fila1['impo_vfobusdserdol3'];
				  $datonomp26= $fila1['impo_vpesnet1'];
				  $datonomp27= $fila1['impo_vpesnet2'];
				  $datonomp28= $fila1['impo_vpesnet3'];
				  $datonomp29= $fila1['impo_precio1'];
				  $datonomp30= $fila1['impo_precio2'];
				  $datonomp31= $fila1['impo_precio3'];
				  $datonomp32= $fila1['cuode'];
				  $datonomp33= $fila1['clasificacion4'];
	
		  
				  if($datonomp10!=""){
			$fotoimg = "<img class='img-responsive' src='imgproductos/$datonomp10' width='60px'> ";
				}else{
					  $fotoimg = "";
				  }
	  
  echo"<tr>";
echo "<td>$datonomp1</td>";
echo "<td>$datonomp2</td>";
echo "<td>$datonomp4</td>";
echo "<td>$datonomp5</td>";
echo "<td>$datonomp10x</td>";
echo "<td>$datonomp6</td>";
echo "<td>$datonomp7</td>";
echo "<td>$datonomp8</td>";
				  echo "<td> $datonomp11 </td>";
				  echo "<td> $datonomp12 </td>";
				  echo "<td> $datonomp13 </td>";
				  echo "<td> $datonomp14 </td>";
				  echo "<td> $datonomp15 </td>";
				  echo "<td> $datonomp16 </td>";
				  echo "<td> $datonomp17 </td>";
				  echo "<td> $datonomp18 </td>";
				  echo "<td> $datonomp19 </td>";
				  echo "<td> $datonomp20 </td>";
				  echo "<td> $datonomp23 </td>";
				  echo "<td> $datonomp24 </td>";
				  echo "<td> $datonomp25 </td>";
				  echo "<td> $datonomp26 </td>";
				  echo "<td> $datonomp27 </td>";
				  echo "<td> $datonomp28 </td>";
				  echo "<td> $datonomp29 </td>";
				  echo "<td> $datonomp30 </td>";
				  echo "<td> $datonomp31 </td>";
				  echo "<td> $datonomp21 </td>";
				  echo "<td> $datonomp22 </td>";
				  /*echo "<td> $datonomp32 </td>";
				  echo "<td> $datonomp33 </td>";*/

		echo"</tr>";  
  }
  }else{
	  echo "<h3>No Hay Informaci&oacute;n en la Busqueda</h3>";
	  }
 ?>
</table>

</body>
</html>