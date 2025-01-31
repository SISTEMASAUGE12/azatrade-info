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
$idcodu = $_SESSION['login_usuario'];
if($idcodu!=""){
	//si encuentra registro inserta o registra insidencia de busqueda
	/*$sqlinsert="INSERT INTO busquedas(fechareg, horareg, pagek, origen, seccion, palabra, codeuser)values(now(), now(), 'www.azatrade.info/arancel', 'Arancel', 'Partida', 'Partida', '$idcodu' )";
	$stmt = $conexpg->prepare($sqlinsert);
    $stmt->execute();*/
}

$variaa = $_GET["dat"];
//$variaa = "0208900010";

//consltamos
$cxreg = "SELECT a.partida, a.descrip, a.adval, a.igv, a.seguro, a.cuode, a.ciiu, a.finicio, a.ffin FROM arancel_part_nandina AS a WHERE a.partida = '$variaa'";
$rfxt = $conexpg -> prepare($cxreg); 
$rfxt -> execute(); 
$gts = $rfxt -> fetchAll(PDO::FETCH_OBJ); 
if($rfxt -> rowCount() > 0) { 
foreach($gts as $fhht) {
	
	$colu1 = $fhht -> partida;
	$colu2 = $fhht -> descrip;
	$colu3 = $fhht -> adval;
	$colu4 = $fhht -> igv;
	$colu5 = $fhht -> seguro;
	$colu6 = $fhht -> cuode;
	$colu7 = $fhht -> ciiu;
	$colu8 = $fhht -> finicio;
	$colu9 = $fhht -> ffin;
	
}
}

//consultamos
$crreg = "SELECT p.partida_nandi, p.prod_especifico, p.prod_generico, p.presentacion, p.partida_desc, p.tipo_sec, p.sector, p.subsector, p.detalle_sector, p.imgfoto, p.estado, p.descri_corto, p.vfobusdserdol2, p.vfobusdserdol1, p.vfobusdserdol3, p.vpesnet1, p.vpesnet2, p.vpesnet3, p.precio1, p.precio2, p.precio3, p.mostrar, p.origen_expor, p.origen_impor, p.impo_vfobusdserdol1, p.impo_vfobusdserdol2, p.impo_vfobusdserdol3, p.impo_vpesnet1, p.impo_vpesnet2, p.impo_vpesnet3, p.impo_precio1, p.impo_precio2, p.impo_precio3, p.cuode, p.clasificacion4, p.mostrar2 
FROM productos AS p 
WHERE p.partida_nandi = '$colu1'";
$rfrt = $conexpg -> prepare($crreg); 
$rfrt -> execute(); 
$grs = $rfrt -> fetchAll(PDO::FETCH_OBJ); 
if($rfrt -> rowCount() > 0) { 
foreach($grs as $frrt) {
	
	$colud1 = $frrt -> tipo_sec;
	$colud2 = $frrt -> sector;
	$colud3 = $frrt -> subsector;
	$colud4 = $frrt -> prod_especifico;
	$colud5 = $frrt -> prod_generico;
	$colud6 = $frrt -> imgfoto;
}
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Azatrade Arancel</title>

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
    <link rel="stylesheet" href="assets/css/demo1.min.css?ter=13c3">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
	
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
	
	<!-- select2 css -->
	<!--<link href="assets/select2v410/css/select2.min.css?yu=4ii7" rel="stylesheet" type="text/css">-->
	<!--<link href="assets/select2v410/css/select2.css?yu=4gf57" rel="stylesheet" type="text/css">-->
	
	
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
            <div class="container mb-2">
				
                <div class="row">
					
					
                    <div class="col-lg-12">

						<!-- fin busqueda -->
						
						<div id="muestra"> <br><br>
                  

                        <h2 class="section-title ls-n-10 m-b-4 appear-animate" data-animation-name="fadeInUpShorter">
                            Arancel Partida: <?=$variaa;?> </h2>
							
							<?php if($colu1!=""){ ?>
							<div class="row">
							<div class="col-lg-2" style="padding: 10px;">
								<p><b>Partida:</b></p>
								<blockquote><?=$colu1;?></blockquote>
							</div>
							<div class="col-lg-4" style="padding: 10px;">
								<p><b>Descripci&oacute;n:</b></p>
								<blockquote><?=$colu2;?></blockquote>
							</div>
							<div class="col-lg-2" style="padding: 10px;">
								<p><b>Tipo Sector:</b></p>
								<blockquote><?=$colud1;?></blockquote>
							</div>
							<div class="col-lg-2" style="padding: 10px;">
								<p><b>Sector:</b></p>
								<blockquote><?=$colud2;?></blockquote>
							</div>
							<div class="col-lg-2" style="padding: 10px;">
								<p><b>Subsector:</b></p>
								<blockquote><?=$colud3;?></blockquote>
							</div>
								<div class="col-lg-4" style="padding: 10px;">
								<p><b>Producto:</b></p>
								<blockquote><?=$colud4.' '.$colud5;?></blockquote>
							</div>
								<div class="col-lg-2" style="padding: 10px;">
								<p><b>Advaloren:</b></p>
								<blockquote><?=$colu3;?></blockquote>
							</div>
								<div class="col-lg-2" style="padding: 10px;">
								<p><b>IGV:</b></p>
								<blockquote><?=$colu4;?></blockquote>
							</div>
								
								<?php 
								if($colud6!=""){ 
									?>
								<div class="col-lg-12" style="padding: 10px;">
									<hr>
								<center><img src="admin/imgproductos/<?=$colud6;?>" width="250px"></center>
							</div>
								<?php
								}
								?>
								</div>
							
							<?php }else{ ?>
							<div class="col-lg-12" style="padding: 10px;">
									<hr class="mt-1 mb-3 pb-2">
								<div class="col-md-12 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200">
                                    <div class="feature-box  feature-box-simple text-center">
                                        <div class="feature-box-content p-0">
                                            <h3 class="mb-0 pb-1">No se encotraron datos</h3>
                                            <h5 class="mb-1 pb-1">Partida: <?=$variaa;?> </h5>
                                            <p>vuelva a consultar.</p>
                                        </div>
                                    </div>
                                </div>
							</div>
							} ?>
							<?php } ?>
                        <!-- <hr class="mt-1 mb-3 pb-2">

                        <div class="feature-boxes-container">
                            <div class="row">
                                <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="200">
                                    <div class="feature-box  feature-box-simple text-center">
                                        <i class="icon-earphones-alt"></i>
                                        <div class="feature-box-content p-0">
                                            <h3 class="mb-0 pb-1">ATENCIÓN AL CLIENTE</h3>
                                            <h5 class="mb-1 pb-1">¿Necesita ayuda?</h5>
                                            <p>Un asesor en ventas te ayudara a resolver todas tus preguntas, consultas o dudas.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="400">
                                    <div class="feature-box feature-box-simple text-center">
                                        <i class="icon-credit-card"></i>
                                        <div class="feature-box-content p-0">
                                            <h3 class="mb-0 pb-1">PAGO SEGURO</h3>
                                            <h5 class="mb-1 pb-1">Seguro y Rápido</h5>
                                            <p>Contamos con diferentes medios de pagos seguros.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="600">
                                    <div class="feature-box feature-box-simple text-center">
                                        <i class="sicon-bar-chart"></i>

                                        <div class="feature-box-content p-0">
                                            <h3 class="mb-0 pb-1">Reportes</h3>
                                            <h5 class="mb-1 pb-1">100% Online</h5>

                                            <p>Realiza sus reportes segun como se mueve en el mercado mundial.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
							</div>
                    </div>
                    <!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>
                    <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
					
               
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
	<script src="assets/js/plugins/jquery-numerator.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
	<script src="assets/js/nouislider.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js?pit=789"></script>
	
	<!--<script src="assets/select2v410/js/select2.min.js"></script>
	<script src="assets/select2v410/js/i18n/es.js"></script>-->
	
	
</body>
</html>