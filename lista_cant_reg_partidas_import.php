<?php
# conectare la base de datos
 include("conex/inibd.php");
?>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet"> -->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->

<?php
  $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL) ? $_REQUEST['action'] : '';

  if($action == 'ajax'){
    //include 'pagination.php'; // Incluir el archivo de paginación

    // Las variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $per_page = 10; // La cantidad de registros que desea mostrar
    $adjacents = 4; // Brecha entre páginas después de varios adyacentes
    $offset = ($page - 1) * $per_page;
    // Cuenta el número total de filas de la tabla*/
    /*$count_query = mysqli_query($con,"SELECT count(*) AS numrows FROM countries");
    if ($row= mysqli_fetch_array($count_query)){
      $numrows = $row['numrows'];
    } */
	 
date_default_timezone_set("America/Lima");
setlocale(LC_ALL, 'es_ES');
$date_now = date('Y-m-d');
$date_past = strtotime('-90 day', strtotime($date_now));
$date_past = date('Y-m-d', $date_past);
	  
	  $dato = $_REQUEST['data'];
	  $dato2 = $_REQUEST['year']; // variable codigo id del usuario
	  
$cxreg = "SELECT COUNT(iduser) as total FROM partidas_masiva_import WHERE iduser='$dato2' ";
$rfxt = $conexpg -> prepare($cxreg); 
$rfxt -> execute(); 
$gts = $rfxt -> fetchAll(PDO::FETCH_OBJ); 
if($rfxt -> rowCount() > 0) { 
foreach($gts as $fhht) {
	$numrows = $fhht -> total;
	}
}else{
	$numrows = "0";
} 
	  
	  if($numrows < "10"){
		  //consultanos cantidades
		  $grupi = "SELECT
e.part_nandi,
p.partida_desc,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2012' THEN 1 ELSE 0 END) AS x2012,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2013' THEN 1 ELSE 0 END) AS x2013,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2014' THEN 1 ELSE 0 END) AS x2014,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2015' THEN 1 ELSE 0 END) AS x2015,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2016' THEN 1 ELSE 0 END) AS x2016,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2017' THEN 1 ELSE 0 END) AS x2017,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2018' THEN 1 ELSE 0 END) AS x2018,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2019' THEN 1 ELSE 0 END) AS x2019,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2020' THEN 1 ELSE 0 END) AS x2020,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2021' THEN 1 ELSE 0 END) AS x2021,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2022' THEN 1 ELSE 0 END) AS x2022,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2023' THEN 1 ELSE 0 END) AS x2023,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2024' THEN 1 ELSE 0 END) AS x2024
FROM importacion AS e LEFT JOIN productos AS p ON e.part_nandi = p.partida_nandi 
WHERE e.part_nandi = '$dato' GROUP BY e.part_nandi";
$grut = $conexpg -> prepare($grupi); 
$grut -> execute(); 
$ggjs = $grut -> fetchAll(PDO::FETCH_OBJ); 
if($grut -> rowCount() > 0) { 
foreach($ggjs as $fvvt) {
	$nurqs1 = $fvvt -> part_nandi;
	$nurqs2 = $fvvt -> partida_desc;
	$nurqs3 = $fvvt -> x2012;
	$nurqs4 = $fvvt -> x2013;
	$nurqs5 = $fvvt -> x2014;
	$nurqs6 = $fvvt -> x2015;
	$nurqs7 = $fvvt -> x2016;
	$nurqs8 = $fvvt -> x2017;
	$nurqs9 = $fvvt -> x2018;
	$nurqs10 = $fvvt -> x2019;
	$nurqs11 = $fvvt -> x2020;
	$nurqs12 = $fvvt -> x2021;
	$nurqs13 = $fvvt -> x2022;
	$nurqs14 = $fvvt -> x2023;
	$nurqs15 = $fvvt -> x2024;
}
}else{
	$nurqs2 = "";
}

if($nurqs2!=""){//si tiene datos
try {
  //insertamos registro de la partida seleccionada
$sqlinsert="INSERT INTO `partidas_masiva_import` (`iduser`, `partida`, `detalle`, `anio12`, `anio13`, `anio14`, `anio15`, `anio16`, `anio17`, `anio18`, `anio19`, `anio20`, `anio21`, `anio22`, `anio23`, `anio24`) VALUES ('".$dato2."','".$nurqs1."', '".$nurqs2."', '".$nurqs3."', '".$nurqs4."', '".$nurqs5."', '".$nurqs6."', '".$nurqs7."', '".$nurqs8."', '".$nurqs9."', '".$nurqs10."', '".$nurqs11."', '".$nurqs12."', '".$nurqs13."', '".$nurqs14."', '".$nurqs15."')";
	$stmt = $conexpg->prepare($sqlinsert);
    $stmt->execute();
	//echo "New record created successfully - ";
	}
catch(PDOException $e){
    echo $sqlinsert . "<br>" . $e->getMessage();
    }
	
}
		  
		  //echo "$dato - $dato2 - $nurqs1 - $nurqs2 - $nurqs3 - $nurqs4 - $nurqs5 - $nurqs6 - $nurqs7 - $nurqs8 - $nurqs9 - $nurqs10 - $nurqs11 - $nurqs12 - $nurqs13 - $nurqs14";
		  
	  }else{
		  echo "<div class='alert alert-warning alert-dismissible'>
							<span><strong>Mensaje: </strong> Ya llegaste al limite permitidos de 10 partidas consultadas.</span>
						</div>";
		  //echo "<h3> Ya llegaste al limite permitidos de 10 partidas consultadas</h3>";
	  }
	  
	  $dqlft = "SELECT
e.iduser,
e.partida,
e.detalle,
anio12,
anio13,
anio14,
anio15,
anio16,
anio17,
anio18,
anio19,
anio20,
anio21,
anio22,
anio23,
anio24
FROM
partidas_masiva_import as e
WHERE
iduser ='$dato2' ";
	  
$rdrpt = $conexpg -> prepare($dqlft); 
$rdrpt -> execute(); 
$tpts = $rdrpt -> fetchAll(PDO::FETCH_OBJ); 
	  ?>

<div class="row pb-4">
	
<?php
if($rdrpt -> rowCount() > 0) { 
	
	if($dato!=""){
	//si encuentra registro inserta o registra insidencia de busqueda
	$sqlinsert="INSERT INTO busquedas(fechareg, horareg, pagek, origen, seccion, palabra, codeuser)values(now(), now(), 'www.azatrade.info/descarga_cant_partida_import', 'Importacion', 'Descarga Masiva', 'Partida: $dato', '$dato2' )";
	$stmt = $conexpg->prepare($sqlinsert);
    $stmt->execute();
	}
		
	
	?>
	<!--<h4 align="center">Descargar la cantidad de partidas por año </h4>-->
	<!-- <div class="table-pagination pull-right">
      <?//=paginate($page, $total_pages, $adjacents);?>
    </div> -->
	<div class="table-responsive">
<table class="table table-hover" id="">
	<thead>
		<tr><th colspan="17"><h3><b>Cantidad de registros de partidas por año</b></h3></th></tr>
	<tr>
		<th>#</th>
		<th>Partida</th>
		<th>Descripci&oacute;n</th>
		<th>2012</th>
		<th>2013</th>
		<th>2014</th>
		<th>2015</th>
		<th>2016</th>
		<th>2017</th>
		<th>2018</th>
		<th>2019</th>
		<th>2020</th>
		<th>2021</th>
		<th>2022</th>
		<th>2023</th>
		<th>2024</th>
		<th>Total</th>
		<th>Acci&oacute;n</th>
	</tr>
		</thead>
	 <tbody>
	<?php
	foreach($tpts as $frvpt) {
		$itemc = $itemc + 1;
	$tbb1 = $frvpt -> iduser;
	$tbb2 = $frvpt -> partida;
	$tbb3 = $frvpt -> detalle;
	$tbb4 = $frvpt -> anio12;
	$tbb5 = $frvpt -> anio13;
	$tbb6 = $frvpt -> anio14;
	$tbb7 = $frvpt -> anio15;
	$tbb8 = $frvpt -> anio16;
	$tbb9 = $frvpt -> anio17;
	$tbb10 = $frvpt -> anio18;
	$tbb11 = $frvpt -> anio19;
	$tbb12 = $frvpt -> anio20;
	$tbb13 = $frvpt -> anio21;
	$tbb14 = $frvpt -> anio22;
	$tbb15 = $frvpt -> anio23;
		$tbb16 = $frvpt -> anio24;
		
		$ttot = ($tbb4 + $tbb5) + ($tbb6 + $tbb7) + ($tbb8 + $tbb9) + ($tbb10 + $tbb11) + ($tbb12 + $tbb13) + ($tbb14 + $tbb15) + $tbb16;
		
		$tota2 = $tota2 + $ttot;
?>
	<tr>
		<td><?=$itemc;?></td>
		<td><?=$tbb2;?></td>
		<td><?=$tbb3;?></td>
		<td><a href="descarga_partidamasiva_import.php?dat1=<?=$tbb2;?>&dat2=2012" target="_blank"><?=$tbb4;?></a></td>
		<td><a href="descarga_partidamasiva_import.php?dat1=<?=$tbb2;?>&dat2=2013" target="_blank"><?=$tbb5;?></a></td>
		<td><a href="descarga_partidamasiva_import.php?dat1=<?=$tbb2;?>&dat2=2014" target="_blank"><?=$tbb6;?></a></td>
		<td><a href="descarga_partidamasiva_import.php?dat1=<?=$tbb2;?>&dat2=2015" target="_blank"><?=$tbb7;?></a></td>
		<td><a href="descarga_partidamasiva_import.php?dat1=<?=$tbb2;?>&dat2=2016" target="_blank"><?=$tbb8;?></a></td>
		<td><a href="descarga_partidamasiva_import.php?dat1=<?=$tbb2;?>&dat2=2017" target="_blank"><?=$tbb9;?></a></td>
		<td><a href="descarga_partidamasiva_import.php?dat1=<?=$tbb2;?>&dat2=2018" target="_blank"><?=$tbb10;?></a></td>
		<td><a href="descarga_partidamasiva_import.php?dat1=<?=$tbb2;?>&dat2=2019" target="_blank"><?=$tbb11;?></a></td>
		<td><a href="descarga_partidamasiva_import.php?dat1=<?=$tbb2;?>&dat2=2020" target="_blank"><?=$tbb12;?></a></td>
		<td><a href="descarga_partidamasiva_import.php?dat1=<?=$tbb2;?>&dat2=2021" target="_blank"><?=$tbb13;?></a></td>
		<td><a href="descarga_partidamasiva_import.php?dat1=<?=$tbb2;?>&dat2=2022" target="_blank"><?=$tbb14;?></a></td>
		<td><a href="descarga_partidamasiva_import.php?dat1=<?=$tbb2;?>&dat2=2023" target="_blank"><?=$tbb15;?></a></td>
		<td><a href="descarga_partidamasiva_import.php?dat1=<?=$tbb2;?>&dat2=2024" target="_blank"><?=$tbb16;?></a></td>
		<td><a href="descarga_partidamasiva_import.php?dat1=<?=$tbb2;?>" target="_blank"><?=$ttot;?></a></td>
		
		<!--<td><?=number_format($tbb6,2);?></td>
		<td><?=number_format($tbb12,0);?></td>
		<td><?=number_format($tbb9,2);?></td>-->
		<td>
			<a href="deleteparti_masiva_import.php?dat1=<?=$tbb1;?>&dat2=<?=$tbb2;?>" class="btn btn-danger btn-sm" > Quitar </a>
	<a href="updateparti_masiva_import.php?dat1=<?=$tbb2;?>&dat2=<?=$dato2;?>" class="btn btn-info btn-sm">Actualizar</a>
		</td>
	</tr>
<?php } ?>
     <!-- <div class="table-pagination pull-right">
      <?//=paginate($page, $total_pages, $adjacents);?>
    </div> -->
	<!--</div> -->
		 <tr>
			 <td colspan="13" align="right"><b>Total</b></td>
			 <td colspan="3" align="right"><b> <?=number_format($tota2,0);?> </b></td>
		 </tr>
	 </tbody>
	</table>
	</div>
<?php }else{ ?>
      <div class="col-sm-12 col-6 product-default left-details product-list mb-2">
                                <div class="product-details">
                                    <h3 class="product-title"> No se encontraron datos </h3>
                                </div>
                            </div>
      <?php
	}
}
?>
	
															   