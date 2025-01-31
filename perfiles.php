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
	$sqlinsert="INSERT INTO busquedas(fechareg, horareg, pagek, origen, seccion, palabra, codeuser)values(now(), now(), 'www.azatrade.info/perfiles', 'Exportacion', 'Perfiles', 'Perfiles', '$idcodu' )";
	$stmt = $conexpg->prepare($sqlinsert);
    $stmt->execute();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Azatrade Perfiles</title>

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
	<link href="assets/select2v410/css/select2.css?yu=4gf57" rel="stylesheet" type="text/css">
	
	
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
					<div class="col-lg-1">
	<div class="header-dropdown ml-3 pl-1">
                            <a href="#">Indicadores</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="javascript:void(0);" id="boton1"> Panorama mundial del producto </a></li>
                                    <li><a href="javascript:void(0);" id="boton2"> Exportaciones peruanas </a></li>
									<li><a href="javascript:void(0);" id="boton3"> Análisis de precios </a></li>
									<li><a href="javascript:void(0);" id="boton4"> Estacionalidades </a></li>
									<li><a href="javascript:void(0);" id="boton5"> Análisis de supervivencia de empresas</a></li>
									<li><a href="javascript:void(0);" id="boton6"> Entrada y salida de empresas </a></li>
									<li><a href="javascript:void(0);" id="boton7"> Concentración de empresas </a></li>
									<li><a href="javascript:void(0);" id="boton8"> Concentración de mercados </a></li>
									<li><a href="javascript:void(0);" id="boton9"> Exportaciones reales vs nominales </a></li>
                                </ul>
                            </div>
                        </div>
						</div>
					<div class="col-lg-1">
	<div class="header-dropdown ml-3 pl-1">
                            <a href="#">&nbsp;&nbsp;&nbsp;Empresas</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="javascript:void(0);" id="boton10"> Evaluación FOB USD de empresas </a></li>
                                    <li><a href="javascript:void(0);" id="boton11"> Reporte comparativo de empresas </a></li>
                                </ul>
                            </div>
                        </div>
						</div>
					<div class="col-lg-1">
	<div class="header-dropdown ml-3 pl-1">
                            <a href="#">&nbsp;&nbsp;&nbsp;Sectores</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="javascript:void(0);" id="boton16"> Evaluación FOB USD de sectores </a></li>
                                    <li><a href="javascript:void(0);" id="boton17"> Reporte comparativo de sectores </a></li>
                                </ul>
                            </div>
                        </div>
						</div>
					<div class="col-lg-1">
	<div class="header-dropdown ml-3 pl-1">
                            <a href="#">Mercados</a>
                            <div class="header-menu">
                                <ul>
                                    <li><ahref="javascript:void(0);"  id="boton12"> Evaluación FOB USD de mercados </a></li>
                                    <li><a href="javascript:void(0);" id="boton13"> Reporte comparativo de mercados </a></li>
                                </ul>
                            </div>
                        </div>
						</div>
					<div class="col-lg-1">
	<div class="header-dropdown ml-3 pl-1">
                            <a href="#">Aduanas</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="javascript:void(0);" id="boton18"> Aduanas </a></li></li>
                                </ul>
                            </div>
                        </div>
						</div>
					<div class="col-lg-1">
	<div class="header-dropdown ml-3 pl-1">
                            <a href="#">Subpartidas</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="javascript:void(0);" id="boton19"> Evaluación FOB USD de subpartidas </a></li>
                                    <li><a href="javascript:void(0);" id="boton20"> Evaluación Peso Neto Kg de subpartidas </a></li>
									<li><a href="javascript:void(0);" id="boton21"> Reporte comparativo de subpartidas </a></li>
                                </ul>
                            </div>
                        </div>
						</div>
					<div class="col-lg-1">
	<div class="header-dropdown ml-3 pl-1">
                            <a href="#">&nbsp;&nbsp;&nbsp;Departamentos</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="javascript:void(0);" id="boton14"> Evaluación FOB USD de departamentos </a></li>
                                    <li><a href="javascript:void(0);" id="boton15"> Reporte comparativo de departamentos </a></li>
                                </ul>
                            </div>
                        </div>
						</div>
					</div>
			<hr>
			<div id="a-content"></div>
				
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
	
	<script src="assets/select2v410/js/select2.min.js"></script>
	<script src="assets/select2v410/js/i18n/es.js"></script>
	
	<script>
$('#boton1').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_indica1.php');
  /*$('#boton').hide();*/
})
		
		$('#boton2').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_indica2.php');
})
		
		$('#boton3').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_indica3.php');
})
		
		$('#boton4').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_indica4.php');
})
		
		$('#boton5').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_indica5.php');
})
		
		$('#boton6').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_indica6.php');
})
		
		$('#boton7').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_indica7.php');
})
		
		$('#boton8').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_indica8.php');
})
		
		$('#boton9').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_indica9.php');
})
		
		$('#boton10').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_emp1.php');
})
		
		$('#boton11').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_emp2.php');
})
		
		$('#boton12').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_merca1.php');
})
		
		$('#boton13').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_merca2.php');
})
		
		$('#boton14').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_depa1.php');
})
		
		$('#boton15').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_depa2.php');
})
		
		$('#boton16').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_sec1.php');
})
		
		$('#boton17').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_sec2.php');
})
		
		$('#boton18').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_adu1.php');
})
		
		$('#boton19').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_subpar1.php');
})
		
		$('#boton20').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_subpar2.php');
})
		
		$('#boton21').on('click', function() {
	$('#a-content').html("");
  $('#a-content').load('perfil_subpar3.php');
})
		
		
		
</script>
	
</body>
</html>