<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	//print "<script>window.location='login/';</script>";
}
}
include("conex/inibd.php");
$code1 = $_GET["dat"];
$code2 = $_GET["year"];
$aniogen = date("Y");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Azatrade</title>

    <meta name="keywords" content="azatrade, exportacion, importacion, arancel, aduana, dua, comercial, inteligencia comercial" />
    <meta name="" content="Azatrade - Sistema de Inteligencia Comercial">
    <meta name="author" content="AZATRADE">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">


    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800', 'Playfair+Display:900', 'Shadows+Into+Light:400']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/demo1.min.css?ter=133">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
	
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css"> -->
	<link rel="stylesheet" href="assets/css/buttons.dataTables.min.css">
	
	
</head>

<body>
    <div class="page-wrapper">
         <!-- <div class="top-notice text-white bg-dark">
            <div class="container text-center">
                <h5 class="d-inline-block mb-0">Get Up to <b>40% OFF</b> New-Season Styles</h5>
                <a href="demo1-shop.html" class="category">MEN</a>
                <a href="demo1-shop.html" class="category">WOMEN</a>
                <small>* Limited time only.</small>
                <button title="Close (Esc)" type="button" class="mfp-close">×</button>
            </div>
        </div> -->

        <header class="header home">
<?php include("menu-superior.php"); ?>
<?php include("menu-flotante.php"); ?>
        </header>
        <!-- End .header -->

        <main class="main home">
			<!-- <p><center><a href="#"><b>CONSULTA AVANZADA</b> <i class="icon-search-3"></i> </a></center></p> -->
            <div class="container mb-2">
                 <div class="info-boxes-container row row-joined mb-2 font2">
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-shipping"></i>

                        <div class="info-box-content">
                            <h4>Reporte Mensual de Indicadores</h4>
                            <p class="text-body">Azatrade - Consulta en Linea</p>
                        </div>
                    </div>
                    <div class="info-box info-box-icon-left col-lg-4">
                        <i class="icon-money"></i>

                        <div class="info-box-content">
                            <h4>Partida #: <?=$code1;?> │ Año: <?=$code2;?> </h4>
                            <p class="text-body">Departamento: Todos │ Fecha Numeración │ Valor FOB USD │ Mensual</p>
                        </div>
                    </div>
                    <div class="info-box info-box-icon-left col-lg-4">
                        <!-- <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>SOPORTE ONLINE 24/7</h4>
                            <p class="text-body">Escribenos con nuestro soporte en linea por <a href="" target="_blank">WhastApp clic AQUÍ</a></p>
                        </div> -->
                    </div> 
                </div> 
			</div>
		</main>
				
		<main class="main banners-page">
                <div class="row">
					
					
                    <div class="col-lg-12" style="padding: 28px;">
						<!-- busqueda -->
						<div class="table-responsive">
						<table id='datatablese' class='table table-striped table-no-bordered table-hover compact' cellspacing='0' width='100%' style='width:100%'>
							<thead>
								<tr>
                              <th>#</th>
							  <th>Mes</th>
                              <th>Valor FOB USD</th>
							  <th>Variaci&oacute;n % FOB USD</th>
                              <th>Peso Neto (Kg)</th>
                              <th>Precio FOB USD x KG</th>
                              <th>Cantidad de Registros</th>
							  <th>Cantidad de Empresas</th>
							  <th>Cantidad de Mercados</th>
							  <th>Cantidad de Departamentos</th>
							  <th>Cantidad de Aduanas</th>
									
                          </tr>
                      </thead>
							<tfoot>
                          <tr>
                              <th>#</th>
							  <th>Mes</th>
                              <th>Valor FOB USD</th>
							  <th>Variaci&oacute;n % FOB USD</th>
                              <th>Peso Neto (Kg)</th>
                              <th>Precio FOB USD x KG</th>
                              <th>Cantidad de Registros</th>
							  <th>Cantidad de Empresas</th>
							  <th>Cantidad de Mercados</th>
							  <th>Cantidad de Departamentos</th>
							  <th>Cantidad de Aduanas</th>
                          </tr>
                      </tfoot>
							<tbody>
						<?php
						$sqtrp="SELECT  
CAST(e.mesfn as DECIMAL(9,0)) mes,
sum(e.VFOBSERDOL) as vfobserdol, 
sum(e.VPESNET) as vpesnet,
(e.VFOBSERDOL/e.VPESNET) as precio,
COUNT(e.PART_NANDI) as cantreg,
Count(DISTINCT e.NDOC) as cant_emp,
Count(DISTINCT e.CPAIDES) as cant_mer,
COUNT(DISTINCT e.UBIGEO) as cant_dist,
Count(DISTINCT e.CADU) as cant_adua
FROM GranResumenExport_PowerBI as e WHERE aniofn = '$code2' AND e.PART_NANDI='$code1' GROUP BY mes ORDER BY mes";
						$partslqt = $conexpg -> prepare($sqtrp); 
$partslqt -> execute(); 
$ggts = $partslqt -> fetchAll(PDO::FETCH_OBJ); 
if($partslqt -> rowCount() > 0) { 
foreach($ggts as $dsx) {
	$cuen = $cuen + 1;
	$listval1 = $dsx -> mes;
	$listval2 = $dsx -> vfobserdol;
	$listval3 = $dsx -> vpesnet;
	$listval4 = $dsx -> precio;
	$listval5 = $dsx -> cantreg;
	$listval6 = $dsx -> cant_emp;
	$listval7 = $dsx -> cant_mer;
	$listval8 = $dsx -> cant_dist;
	$listval9 = $dsx -> cant_adua;
	
	if($listval1=="1"){
		$mesnom = "Enero";
		$anio12 = $listval2;
		$valvaria = "0";
	}
	
	if($listval1=="2"){
		$mesnom = "Febrero";
		$anio13 = $listval2;
		$valvaria = (($listval2-$anio12)/$anio12)*100;
	}/*else{
		$valvaria = "0";
	}*/
	
	if($listval1=="3"){
		$mesnom = "Marzo";
		$anio14 = $listval2;
		$valvaria = (($listval2-$anio13)/$anio13)*100;
	}/*else{
		$valvaria = "0";
	}*/
	
	if($listval1=="4"){
		$mesnom = "Abril";
		$anio15 = $listval2;
		$valvaria = (($listval2-$anio14)/$anio14)*100;
	}/*else{
		$valvaria = "0";
	}*/
	
	if($listval1=="5"){
		$mesnom = "Mayo";
		$anio16 = $listval2;
		$valvaria = (($listval2-$anio15)/$anio15)*100;
	}/*else{
		$valvaria = "0";
	}*/
	
	if($listval1=="6"){
		$mesnom = "Junio";
		$anio17 = $listval2;
		$valvaria = (($listval2-$anio16)/$anio16)*100;
	}/*else{
		$valvaria = "0";
	}*/
	
	if($listval1=="7"){
		$mesnom = "Julio";
		$anio18 = $listval2;
		$valvaria = (($listval2-$anio17)/$anio17)*100;
	}/*else{
		$valvaria = "0";
	}*/
	
	if($listval1=="8"){
		$mesnom = "Agosto";
		$anio19 = $listval2;
		$valvaria = (($listval2-$anio18)/$anio18)*100;
	}/*else{
		$valvaria = "0";
	}*/
	
	if($listval1=="9"){
		$mesnom = "Septiembre";
		$anio20 = $listval2;
		$valvaria = (($listval2-$anio19)/$anio19)*100;
	}/*else{
		$valvaria = "0";
	}*/
	
	if($listval1=="10"){
		$mesnom = "Octubre";
		$anio21 = $listval2;
		$valvaria = (($listval2-$anio20)/$anio20)*100;
	}/*else{
		$valvaria = "0";
	}*/
	
	if($listval1=="11"){
		$mesnom = "Noviembre";
		$anio22 = $listval2;
		$valvaria = (($listval2-$anio21)/$anio21)*100;
	}/*else{
		$valvaria = "0";
	}*/
	
	if($listval1=="12"){
		$mesnom = "Diciembre";
		$anio23 = $listval2;
		$valvaria = (($listval2-$anio22)/$anio22)*100;
	}/*else{
		$valvaria = "0";
	}*/
	
	$totq1 = $totq1 + $listval2;
	$totq2 = $totq2 + $valvaria;
	$totq3 = $totq3 + $listval3;
	$totq4 = $totq4 + $listval4;
	$totq5 = $totq5 + $listval5;
	$totq6 = $totq6 + $listval6;
	$totq7 = $totq7 + $listval7;
	$totq8 = $totq8 + $listval8;
	$totq9 = $totq9 + $listval9;
	
	echo "<tr>";
	echo "<td>$cuen</td>";
	echo "<td>$mesnom</td>";
	echo "<td>".number_format($listval2,2)."</td>";
	echo "<td>".number_format($valvaria,2)."</td>";
	echo "<td>".number_format($listval3,2)."</td>";
	echo "<td>".number_format($listval4,2)."</td>";
	echo "<td>".number_format($listval5,0)."</td>";
	echo "<td>$listval6</td>";
	echo "<td>$listval7</td>";
	echo "<td>$listval8</td>";
	echo "<td>$listval9</td>";
	echo "</tr>";
}
	echo "<tr>";
	echo "<td> </td>";
	//echo "<td> </td>";
	echo "<td> <b>TOTALES</b> </td>";
	echo "<td>".number_format($totq1,2)."</td>";
	echo "<td>".number_format($totq2,2)."</td>";
	echo "<td>".number_format($totq3,2)."</td>";
	echo "<td>".number_format($totq4,0)."</td>";
	echo "<td>".number_format($totq5,0)."</td>";
	echo "<td>".number_format($totq6,0)."</td>";
	echo "<td>".number_format($totq7,0)."</td>";
	echo "<td>".number_format($totq8,0)."</td>";
	echo "<td>".number_format($totq9,0)."</td>";
	echo "</tr>";
}else{
	
}
						?>
								</tbody>
						</table> 
							</div>
						<br><br><br>
						<!-- fin busqueda -->
                    </div>
                    <!-- End .col-lg-9 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container -->
        </main>
        <!-- End .main -->

        <?php include("footer.php"); ?>
    </div>
    <!-- End .page-wrapper -->

<?php include("menu-movil.php"); ?>
<?php include("menu-pie.php"); ?>
	
    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>
	
	<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
	
	<script type="text/javascript" src="assets/js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="assets/js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="assets/js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="assets/js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="assets/js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="assets/js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="assets/js/jsexport/buttons.print.min.js"></script>
	
	<script>
		/*$(document).ready(function () {
    $('#datatablese').DataTable();
}); */
		
	$(document).ready(function() {
    $('#datatablese').DataTable({
		"order": [[ 0, "asc" ]],
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "pagingType": "full_numbers",
        "lengthMenu": [
            [20, 25, 50, -1],
            [20, 25, 50, "Todos"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Buscar resultados",
        }

    });
    var table = $('#datatablese').DataTable();

    $('.card .material-datatablese label').addClass('form-group');
}); 
	</script>
</body>
</html>