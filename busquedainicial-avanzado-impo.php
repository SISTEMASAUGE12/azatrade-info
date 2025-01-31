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
	 
date_default_timezone_set("America/Lima");
setlocale(LC_ALL, 'es_ES');
$date_now = date('Y-m-d');
$date_past = strtotime('-90 day', strtotime($date_now));
$date_past = date('Y-m-d', $date_past);
	  
	  $dato = $_REQUEST['data1']; //codusuario
	  $dato2 = trim($_REQUEST['data2']);//nombre producto
	  $dato3 = trim($_REQUEST['data3']);//numero partida
	  $dato4 = trim($_REQUEST['data4']);//empresa
	  $dato5 = trim($_REQUEST['data5']);//mercado
	  /*$dato6 = trim($_REQUEST['data6']);//sector
	  $dato7 = trim($_REQUEST['data7']);//departamento
	  $dato8 = trim($_REQUEST['data8']);//provincia
	  $dato9 = trim($_REQUEST['data9']);//distrito*/
	  $dato10 = trim($_REQUEST['data10']);//año
	  $dato11 = trim($_REQUEST['data11']);//mes
	  $dato12 = trim($_REQUEST['data12']);//agente
	  $dato13 = trim($_REQUEST['data13']);//aduana
	  $dato14 = trim($_REQUEST['data14']);//numero dua
	  $dato15 = trim($_REQUEST['data15']);//nombre comercial 1
	  $dato16 = trim($_REQUEST['data16']);//condicion
	  $dato17 = trim($_REQUEST['data17']);//nombre comercial 2
	  
	  if($dato2!=""){
	  $qk1 = " AND s.partida_desc LIKE '%$dato2%' ";
		 $titvar1  = " | Producto: $dato2 ";
	  }else{
	  $qk1 = "";
		  $titvar1  = "";
	  }
	  if($dato3!=""){
	  $qk2 = " AND e.part_nandi = '$dato3' ";
		  $titvar2  = " | Partida: $dato3 ";
	  }else{
	  $qk2 = "";
		  $titvar2  = "";
	  }
	  if($dato4!=""){
	  $qk3 = " AND e.libr_tribu ='$dato4' ";
		  $titvar3  = " | Empresa: $dato4 ";
	  }else{
	  $qk3 = "";
		  $titvar3  = "";
	  }
	  if($dato5!=""){
	  $qk4 = " AND e.pais_orige ='$dato5' ";
		  $titvar4  = " | Cod. Pais: $dato5 ";
	  }else{
	  $qk4 = "";
		  $titvar4  = "";
	  }
	  
	  /*if($dato6!=""){
	  $qk5 = " AND CONCAT(s.tipo_sec,s.sector) ='$dato6' ";
		  $titvar5  = " | Sector : $dato6 ";
	  }else{
	  $qk5 = "";
		  $titvar5  = "";
	  }
	  if($dato7!="" and $dato8=="" and $dato9==""){
	  $qk6 = " AND substr(e.UBIGEO,1,2) = '$dato7' ";
		  $titvar6  = " | Cod Region : $dato7 ";
	  }else{
	  $qk6 = "";
		  $titvar6  = "";
	  }
	  if($dato7!="" and $dato8!="" and $dato9==""){
	  $qk7 = " AND substr(e.UBIGEO,1,4) = '$dato8' ";
		  $titvar7  = " | Cod Region : $dato7 | Cod Provincia : $dato8 ";
	  }else{
	  $qk7 = "";
		  $titvar7  = "";
	  }
	  if($dato7!="" and $dato8!="" and $dato9!=""){
	  $qk8 = " AND e.UBIGEO = '$dato9' ";
		  $titvar8  = " | Cod Region : $dato7 | Cod Provincia : $dato8 | Cod Distrito : $dato9 ";
	  }else{
	  $qk8 = "";
		  $titvar8  = "";
	  }*/
	  
	  if($dato11!=""){
	  $qk9 = " AND MONTH(e.fech_ingsi) = '$dato11' ";
		  $titvar9  = " | Mes : $dato11 ";
	  }else{
	  $qk9 = "";
		  $titvar9  = "";
	  }
	  if($dato12!=""){
	  $qk10 = " AND e.codi_agent = '$dato12' ";
		  $titvar10  = " | Cod Agente : $dato12 ";
	  }else{
	  $qk10 = "";
		  $titvar10  = "";
	  }
	  if($dato13!=""){
	  $qk11 = " AND e.codi_aduan = '$dato13' ";
		  $titvar11  = " | Cod Aduana : $dato13 ";
	  }else{
	  $qk11 = "";
		  $titvar11  = "";
	  }
	  if($dato14!=""){
	  $qk12 = " AND e.nume_corre='$dato14' ";
		  $titvar12  = " | Cod DUI : $dato14 ";
	  }else{
	  $qk12 = "";
		  $titvar12  = "";
	  }
	  if($dato15!="" and $dato17=="" and $dato16==""){ //si solo hay en la primera caja de texto
	  $qk13 = " AND MATCH (e.desc_comer,e.desc_fopre,e.desc_matco,e.desc_otros,e.desc_usoap) AGAINST ('$dato15' IN
BOOLEAN MODE) ";
		  $titvar13  = " | Palabra Comercial : $dato15 ";
	  }else{
	  $qk13 = ""; 
		  $titvar13  = "";
	  }
	  if($dato15=="" and $dato17!="" and $dato16==""){ //si solo hay en la segunda caja de texto
	  $qk13 = " AND MATCH (e.desc_comer,e.desc_fopre,e.desc_matco,e.desc_otros,e.desc_usoap) AGAINST ('$dato17' IN
BOOLEAN MODE) ";
		  $titvar13  = " | Palabra Comercial : $dato17 ";
	  }else{
	  $qk13 = ""; 
		  $titvar13  = "";
	  }
	  
	  if($dato15!="" and $dato17!="" and $dato16=="o"){ //contiene una u otra palabra
	  $qk14 = " AND MATCH (e.desc_comer,e.desc_fopre,e.desc_matco,e.desc_otros,e.desc_usoap) AGAINST ('$dato15 $dato17' IN
BOOLEAN MODE) ";
		  $titvar14  = " | Palabra Comercial : $dato15 - $dato17 ";
	  }else{
	  $qk14 = "";
		  $titvar14  = "";
	  }
	  
	  if($dato15!="" and $dato17!="" and $dato16=="o"){ //contiene ambas palabra
	  $qk14 = " AND CONCAT(e.desc_comer,e.desc_fopre,e.desc_matco,e.desc_otros,e.desc_usoap) LIKE '%$dato15%$dato17%' ";
		  $titvar14  = " | Palabra Comercial : $dato15 - $dato17 ";
	  }else{
	  $qk14 = "";
		  $titvar14  = "";
	  }
	  
	  //echo "<p> Cod usuario:$dato producto:$dato2 partida:$dato3 empresa:$dato4 mercado:$dato5 sector:$dato6 departamento:$dato7 provincia:$dato8 distrito:$dato9 año:$dato10 mes:$dato11 agente:$dato12 aduana:$dato13 dua:$dato14 comercial 1:$dato15 condi:$dato16 comercial 2:$dato17 </p>";
	  
	  $dqlft = "SELECT
YEAR(e.fech_ingsi) AS anio,
e.part_nandi,
e.libr_tribu,
e.pais_orige,
e.codi_aduan,
e.codi_agent,
e.nume_corre,
MONTH(e.fech_ingsi) AS mes,
s.partida_desc as produc,
s.tipo_sec,
s.sector,
SUM(e.fob_dolpol) as vfobx1,
SUM(e.peso_neto) as pnetox1,
SUM(e.fob_dolpol) as vfob,
SUM(e.peso_neto) as pneto,
SUM(e.unid_fiqty) as QUNIFIS,
e.tunicom,
SUM(e.peso_neto) as VPESNET,
e.part_nandi as partioriginal,
e.part_nandi as parti_arancel,
(case e.peso_neto when 0 then 0 else (e.fob_dolpol/e.peso_neto) end) as precioporkl,
CONCAT(e.desc_comer,' ',e.desc_fopre,' ',e.desc_matco,' ',e.desc_otros,' ',e.desc_usoap) as descri
FROM
importacion as e 
LEFT JOIN productos AS s ON e.part_nandi = s.partida_nandi
WHERE
YEAR(e.fech_ingsi) ='$dato10' 
$qk1
$qk2
$qk3
$qk4
$qk5
$qk6 
$qk7
$qk8
$qk9
$qk10
$qk11
$qk12
$qk13
$qk14 
GROUP BY
anio,e.part_nandi 
ORDER BY vfobx1 DESC";
	  
$rdrpt = $conexpg -> prepare($dqlft); 
$rdrpt -> execute(); 
$tpts = $rdrpt -> fetchAll(PDO::FETCH_OBJ); 
	  ?>

<div class="row pb-4">
	
<?php
if($rdrpt -> rowCount() > 0) { 
	
	//si encuentra registro inserta o registra insidencia de busqueda
	$sqlinsert="INSERT INTO busquedas(fechareg, horareg, pagek, origen, seccion, palabra, codeuser)values(now(), now(), 'www.azatrade.info/busqueda-avanzada-impo', 'Importacion', 'Busqueda Avanzada', '$titvar1 $titvar2 $titvar3 $titvar4 $titvar5 $titvar6 $titvar7 $titvar8 $titvar9 $titvar10 $titvar11 $titvar12 $titvar13 $titvar14', '$dato' )";
	$stmt = $conexpg->prepare($sqlinsert);
    $stmt->execute();
	
	?>
	<nav class="toolbox sticky-header_xx" data-sticky-options="{'mobile': true}">
							<!-- <div class="alert alert-warning alert-dismissible">
							<span><strong>Info</strong> consulta los ultimos 3 meses de data.</span>
						</div> <hr> -->
                            <!-- <div class="toolbox-left">
								<p><b>Agrupado por:</b> <a href="#">Registro</a> &nbsp;&nbsp; <a href="#">Partida</a> &nbsp;&nbsp; <a href="#">Mercado</a> &nbsp;&nbsp; <a href="#">Empresa</a> &nbsp;&nbsp; <a href="#">Departamento</a> &nbsp;&nbsp; <a href="#">Aduanas</a> &nbsp;&nbsp; <a href="#">Agente de Aduanas</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="descarga_excel?dat=<?=$dato;?>&var=<?=$dato2;?>"><i class="fas fa-file-excel"></i> Exportar</a> </p><br>
								
                            </div> -->
							<div>
								<!-- <p>&nbsp;&nbsp;&nbsp;<b>Registros: <?=$numrows;?></b> </p> -->
								<h4 align="center">Reporte de b&uacute;squeda Avanzada - Filtros: Año: <?=$dato10;?> <?=$titvar1;?> <?=$titvar2;?>  <?=$titvar3;?> <?=$titvar4;?> <?=$titvar5;?> <?=$titvar6;?> <?=$titvar7;?> <?=$titvar8;?> <?=$titvar9;?> <?=$titvar10;?><?=$titvar11;?> <?=$titvar12;?> <?=$titvar13;?> <?=$titvar14;?> </h4>
							</div>
                        </nav>

	<div class="table-responsive_xx">
<table class="table table-hover_xx" id="">
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
	$tbb1 = $frvpt -> dcom;
	$tbb2 = $frvpt -> part_nandi;
	$tbb3 = $frvpt -> puerto;
	$tbb4 = $frvpt -> viatransporte;
	$tbb5 = $frvpt -> paisdestino;
	$tbb6 = $frvpt -> vfobx1;
	$tbb7 = $frvpt -> QUNIFIS;
	$tbb8 = $frvpt -> TUNIFIS;
	$tbb9 = $frvpt -> precioporkl;
	$tbb10 = $frvpt -> NDOC;
	$tbb11 = $frvpt -> DNOMBRE;
		$tbb12 = $frvpt -> VPESNET;
		
		$descri_partida = $frvpt -> produc;
		
		/*$pardes = "SELECT prod_especifico, partida_desc FROM productos WHERE partida_nandi='$tbb2' ";
		$querypx = $conexpg -> prepare($pardes); 
$querypx -> execute(); 
$ptpts = $querypx -> fetchAll(PDO::FETCH_OBJ);
		if($querypx -> rowCount() > 0) { 
			foreach($ptpts as $pfrvpt) {
				$descri_partida = $pfrvpt -> prod_especifico.' - '.$pfrvpt -> partida_desc;
				}
}else{
			$descri_partida = "---";
		} */
		
		
?>
	<tr>
		<td><?=$tbb2;?></td>
		<!--<td><?//=$dato;?></td>-->
		<td><?=$descri_partida;?></td>
		<td><?=number_format($tbb6,2);?></td>
		<td><?=number_format($tbb12,0);?></td>
		<td><?=number_format($tbb9,2);?></td>
		<td> <a href="ver-resumen-detalle-uso-general?year=<?=$dato10;?>&pk=<?=$tbb2;?>" target="_blank" class="btn btn-primary btn-sm"> Ver Detalle </a> </td>
		<!--<td>
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
									<p><a href="" target="_blank"> <button class="btn btn-outline-primary btn-rounded btn-md">Ver Reporte</button></a></p>
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
					</div>
				</section>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>
		</td> -->
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
	
															   