<?php
require('conexion.php');
$RegistrosAMostrar=10;

//estos valores los recibo por GET
if(isset($_GET['pag'])){
	$RegistrosAEmpezar=($_GET['pag']-1)*$RegistrosAMostrar;
	$PagAct=$_GET['pag'];
//caso contrario los iniciamos
}else{
	$RegistrosAEmpezar=0;
	$PagAct=1;
	
}
$Resultado=mysql_query("SELECT rp.varia_filtro, rp.codigo as ndoc, rp.descripcion, rp.anio1 AS a2012, rp.anio2 AS a2013, rp.anio3 AS a2014, rp.anio4 AS a2015, rp.anio5 AS a2016, rp.anio6 AS a2017, rp.anio7 AS a2018, rp.anio8 AS a2019, rp.variauno, rp.variados FROM resumen_empresas AS rp WHERE rp.varia_filtro = 'vfobserdol' AND rp.codigo <> 'Total' LIMIT $RegistrosAEmpezar, $RegistrosAMostrar",$con);
echo "<table border='1px'>";
while($MostrarFila=mysql_fetch_array($Resultado)){
    $pon = $pon + 1;
	echo "<tr>";
	echo "<td> $pon ".$MostrarFila['ndoc']."</td>";
	echo "<td>".$MostrarFila['descripcion']."</td>";
	echo "<td>".$MostrarFila['a2012']."</td>";
	echo "</tr>";
}
echo "</table>";
//******--------determinar las p�ginas---------******//
$NroRegistros=mysql_num_rows(mysql_query("SELECT rp.varia_filtro, rp.codigo as ndoc, rp.descripcion, rp.anio1 AS a2012, rp.anio2 AS a2013, rp.anio3 AS a2014, rp.anio4 AS a2015, rp.anio5 AS a2016, rp.anio6 AS a2017, rp.anio7 AS a2018, rp.anio8 AS a2019, rp.variauno, rp.variados FROM resumen_empresas AS rp WHERE rp.varia_filtro = 'vfobserdol' AND rp.codigo <> 'Total'",$con));

$PagAnt=$PagAct-1;
$PagSig=$PagAct+1;
$PagUlt=$NroRegistros/$RegistrosAMostrar;

//verificamos residuo para ver si llevar� decimales
$Res=$NroRegistros%$RegistrosAMostrar;
// si hay residuo usamos funcion floor para que me
// devuelva la parte entera, SIN REDONDEAR, y le sumamos
// una unidad para obtener la ultima pagina
if($Res>0) $PagUlt=floor($PagUlt)+1;

//desplazamiento
echo "<a onclick=\"Pagina('1')\">Primero</a> ";
if($PagAct>1) echo "<a onclick=\"Pagina('$PagAnt')\">Anterior</a> ";
echo "<strong>Pagina ".$PagAct."/".$PagUlt."</strong>";
if($PagAct<$PagUlt)  echo " <a onclick=\"Pagina('$PagSig')\">Siguiente</a> ";
echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo</a>";
?>
