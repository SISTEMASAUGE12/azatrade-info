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
	  $dato2 = $_REQUEST['year'];
	  $dato3 = $_REQUEST['cate'];
	  $dato4 = $_REQUEST['use'];

/*
$cxreg = "SELECT COUNT(*) as total FROM (SELECT e.part_nandi FROM exportacion e WHERE YEAR(e.fnum) ='$dato2' AND  CONCAT(e.dcom,' ',e.dmer2,' ',e.dmer3,' ',e.dmer4,' ',e.DMER5) like '%$dato%'  GROUP BY e.part_nandi) AS Total";
$rfxt = $conexpg -> prepare($cxreg); 
$rfxt -> execute(); 
$gts = $rfxt -> fetchAll(PDO::FETCH_OBJ); 
if($rfxt -> rowCount() > 0) { 
foreach($gts as $fhht) {
	$numrows = $fhht -> total;
	}
}else{
	$numrows = "0";
} */

    //$total_pages = ceil($numrows/$per_page);
    //consulta principal para recuperar los datos
    //$query = mysqli_query($con,"SELECT * FROM countries order by countryName LIMIT $offset,$per_page");
	  
	$dqlft = "SELECT
	t.anio, 
	t.partida as part_nandi, 
	t.descri, 
	sum(t.fob) as vfobx1, 
	sum(t.flete) as flete, 
	sum(t.seguro) as seguro, 
	sum(t.cif) as cif, 
	sum(t.pesoneto) as VPESNET,
	(case t.pesoneto when 0 then 0 else (sum(t.fob)/sum(t.pesoneto)) end) as precioporkl
FROM
	tXConsulta_desc AS t
WHERE
	t.anio = '$dato2' AND
	t.descri LIKE '%$dato%'
GROUP BY
	t.anio, 
	t.partida
	ORDER BY vfobx1 DESC";
	  
	  /*$dqlft = "SELECT
YEAR(e.fnum) AS anio,
e.part_nandi,
SUM(e.vfobserdol) as vfobx1,
SUM(e.vpesnet) as pnetox1,
SUM(e.vfobserdol) as vfob,
SUM(e.vpesnet) as pneto,
SUM(e.QUNIFIS) as QUNIFIS,
e.TUNIFIS,
SUM(e.VPESNET) as VPESNET,
e.part_nandi as partioriginal,
e.part_nandi as parti_arancel,
substr(e.UBIGEO,1,2) AS ubigeo,*/
/*CONCAT(e.dcom,' ',e.dmer2,' ',e.dmer3,' ',e.dmer4,' ',e.DMER5) as dcom,
e.DNOMBRE,
e.NDOC,*/
/*(case e.VPESNET when 0 then 0 else (sum(e.vfobserdol)/sum(e.VPESNET)) end) as precioporkl
FROM
exportacion e
WHERE
YEAR(e.fnum) ='$dato2' AND 
CONCAT(e.dcom,' ',e.dmer2,' ',e.dmer3,' ',e.dmer4,' ',e.DMER5) like '%$dato%' 
GROUP BY
anio,e.part_nandi 
ORDER BY vfobx1 DESC";*/
	  
$rdrpt = $conexpg -> prepare($dqlft); 
$rdrpt -> execute(); 
$tpts = $rdrpt -> fetchAll(PDO::FETCH_OBJ); 
	  ?>

<div class="row pb-4">
	
<?php
if($rdrpt -> rowCount() > 0) { 
	
	//si encuentra registro inserta o registra insidencia de busqueda
	$sqlinsert="INSERT INTO busquedas(fechareg, horareg, pagek, origen, seccion, palabra, codeuser)values(now(), now(), 'www.azatrade.info', 'Exportacion', 'Productos', '$dato2 - $dato', '$dato4' )";
	$stmt = $conexpg->prepare($sqlinsert);
    $stmt->execute();
	
	?>
	<nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
							<!-- <div class="alert alert-warning alert-dismissible">
							<span><strong>Info</strong> consulta los ultimos 3 meses de data.</span>
						</div> <hr> -->
                            <!-- <div class="toolbox-left">
								<p><b>Agrupado por:</b> <a href="#">Registro</a> &nbsp;&nbsp; <a href="#">Partida</a> &nbsp;&nbsp; <a href="#">Mercado</a> &nbsp;&nbsp; <a href="#">Empresa</a> &nbsp;&nbsp; <a href="#">Departamento</a> &nbsp;&nbsp; <a href="#">Aduanas</a> &nbsp;&nbsp; <a href="#">Agente de Aduanas</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="descarga_excel?dat=<?=$dato;?>&var=<?=$dato2;?>"><i class="fas fa-file-excel"></i> Exportar</a> </p><br>
								
                            </div> -->
							<div>
								<!-- <p>&nbsp;&nbsp;&nbsp;<b>Registros: <?=$numrows;?></b> </p> -->
								<h4 align="center">Reporte de Partidas encontradas para la b&uacute;squeda <?=$dato;?> - <?=$dato2;?> </h4>
							</div>
                        </nav>

	<div class="table-responsive">
<table class="table table-hover" id="">
	<thead>
	<tr>
		<th>Partida</th>
		<th>Descripci&oacute;n</th>
		<th>Valor FOB USD</th>
		<th>Peso Neto(Kg)</th>
		<th>Precio FOB</th>
		<th>Acciones</th>
	</tr>
		</thead>
	 <tbody>
	<?php
	foreach($tpts as $frvpt) {
		$itemc = $itemc + 1;
	//$tbb1 = $frvpt -> dcom;
	$tbb2 = $frvpt -> part_nandi;
	//$tbb3 = $frvpt -> puerto;
	//$tbb4 = $frvpt -> viatransporte;
	//$tbb5 = $frvpt -> paisdestino;
	$tbb6 = $frvpt -> vfobx1;
	//$tbb7 = $frvpt -> QUNIFIS;
	//$tbb8 = $frvpt -> TUNIFIS;
	$tbb9 = $frvpt -> precioporkl;
	//$tbb10 = $frvpt -> NDOC;
	//$tbb11 = $frvpt -> DNOMBRE;
		$tbb12 = $frvpt -> VPESNET;
		
		//$pardes = "SELECT descripcion FROM arancel WHERE idarancel='$tbb2' ";
		$pardes = "SELECT prod_especifico, partida_desc FROM productos WHERE partida_nandi='$tbb2' ";
		$querypx = $conexpg -> prepare($pardes); 
$querypx -> execute(); 
$ptpts = $querypx -> fetchAll(PDO::FETCH_OBJ);
		if($querypx -> rowCount() > 0) { 
			foreach($ptpts as $pfrvpt) {
				$descri_partida = $pfrvpt -> prod_especifico.' - '.$pfrvpt -> partida_desc;
				}
}else{
			$descri_partida = "---";
		}
		
		
?>
	<tr>
		<td><?=$tbb2;?></td>
		<td><?=$descri_partida;?></td>
		<td><?=number_format($tbb6,2);?></td>
		<td><?=number_format($tbb12,0);?></td>
		<td><?=number_format($tbb9,2);?></td>
		<td>
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal<?=$itemc;?>"> Acciones </button>
			<div class="modal" id="myModal<?=$itemc;?>">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"> <b>Partida:</b> <?=$tbb2;?> | <b>Periodo : <?=$dato2;?> </b> </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
		  
		  <section class="left-section mt-5">
					<h3 class="mb-4	" align="center">¿ De esta partida que más deseas conocer ?</h3>
					<div class="row">
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon--search-2"></i>
								<div class="info-box-content">
									<h4>Ver Detalle</h4>
									<p><a href="ver-resumen-detalle-partida?dat=<?=$dato;?>&year=<?=$dato2;?>&pk=<?=$tbb2;?>" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon--search-2"></i>
								<div class="info-box-content">
									<h4>Ver Arancel</h4>
									<p><a href="arancel?tit=<?=$descri_partida;?>&dat=<?=$tbb2;?>" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-compare"></i>
								<div class="info-box-content">
									<h4>Indicadores Anuales</h4>
									<p><a href="partida-indicador-anual?dat=<?=$tbb2;?>" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-chart"></i>
								<div class="info-box-content">
									<h4>Indicadores Mensuales</h4>
									<p><a href="partida-indicador-mensual?dat=<?=$tbb2;?>&year=<?=$dato2;?>" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-direction"></i>
								<div class="info-box-content">
									<h4>Estacionalidad</h4>
									<p><a href="partida-estacionalidad?dat=<?=$tbb2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-country"></i>
								<div class="info-box-content">
									<h4>Mercados de Destino</h4>
									<p><a href="partida-mercados?dat=<?=$tbb2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-pin"></i>
								<div class="info-box-content">
									<h4>Departamentos</h4>
									<p><a href="partida-region?dat=<?=$tbb2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-company"></i>
								<div class="info-box-content">
									<h4>Empresas Exportadoras</h4>
									<p><a href="partida-empresas?dat=<?=$tbb2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-truck"></i>
								<div class="info-box-content">
									<h4>Agentes Aduanas</h4>
									<p><a href="partida-agente-aduanas?dat=<?=$tbb2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="info-box info-box-icon-left">
								<i class="icon-shipped"></i>
								<div class="info-box-content">
									<h4>Aduanas</h4>
									<p><a href="partida-aduanas?dat=<?=$tbb2;?>&year=<?=$dato2;?>&var=FOBUSD" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
						<div class="col-lg-6">
							<center><a href="descarga_partidamasiva.php?dat1=<?=$tbb2;?>&dat2=<?=$dato2;?>" target="_blank" class="btn btn-primary">Descarga un año</a></center>
							</div>
							<div class="col-lg-6">
								<center><a href="descarga_partidamasiva.php?dat1=<?=$tbb2;?>" target="_blank" class="btn btn-primary">Descarga todo los años</a></center>
							</div>
						</div>
						
					</div>
				</section>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>
		</td>
	</tr>
<?php } ?>
     <!-- <div class="table-pagination pull-right">
      <?//=paginate($page, $total_pages, $adjacents);?>
    </div> -->
	<!--</div> -->
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
	
															   