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
$expolnk = "style='color: #004EFE;'";
$var = $_GET['var'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Azatrade </title>

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
	<link href="assets/select2v410/css/select2.css?yu=4gf575" rel="stylesheet" type="text/css">
	
	<style>
	.header-search-wrappep{position:absolute;margin-top:10px;}
.header-search-wrappep{position:absolute;right:-2.3rem;z-index:999;margin-top:10px;color:#8d8d8d;height:40px;}
.header-search-wrappep select:focus{outline:none}
.header-search-wrappep .btn{position:relative;padding:0 0 3px 0;border:0;border-left:1px solid #e7e7e7;min-width:48px;color:#606669;font-size:16px;background:#f7f7f7}
.header-search-wrappep{display:flex;display:-ms-flex;position:static;margin:0;border-width:0}
.header-search-wrappep{left:15px;right:15px}
		
		/* **************************** estilo nuevo ************************* */
.header-search-inlinep.header-searchp{margin-right:62.3rem}
.header-search-inlinep.header-searchp{margin-right:62.3rem}
.header-bottom.fixed .header-search-inlinep.header-searchp i{font-size:2.3rem}
.header-bottom.fixed .header-search-inlinep.header-searchp .header-search-wrappep{position:absolute;margin-top:20px;}
.header-searchp{position:relative}
.header-searchp form{margin:0}
.header-searchp .form-control,.header-searchp select{margin:0;border:0;color:inherit;font-size:1.3rem;height:100%;box-shadow:none}
.header-searchp .form-control,.header-searchp .select-customp{background:#f7f7f7}
@media (-ms-high-contrast:active),(-ms-high-contrast:none){
	.header-searchp .form-control{flex:1}}
		.header-searchp .form-control::placeholder{color:#a8a8a8}
		.header-searchp:not(.header-search-categoryp) 
		.form-control{border-radius:5rem}
		.header-searchp:not(.header-search-categoryp) 
		.btn{position:absolute;top:0;right:0;bottom:0;background:transparent;border:0;padding:0 0.8em;color:#333}
		.search-togglep:after{position:absolute;right:calc(50% - 10px);bottom:-10px;border:0px solid transparent;border-bottom-color:#08c}
		.header-search-categoryp .form-control{border-radius:5rem 0 0 5rem}
		.header-search-categoryp .btn{border-radius:0 5rem 5rem 0}
		.header-search-wrappep{position:absolute;z-index:999;margin-top:10px;color:#8d8d8d;height:40px;border-radius:5rem;border:0px solid #08c}
		.header-search-wrappep:after{clear:both;content:""}
		.header-search-wrapper .btn{position:relative;padding:0 0 3px 0;border:0;border-left:1px solid #e7e7e7;min-width:48px;color:#606669;font-size:16px;background:#f7f7f7}
		.header-search-wrappep .btn:before{margin-top:5px;font-weight:800}
		.header-search-popup .form-control{min-width:266px;padding:4px 22px;font-size:1.4rem;line-height:20px}
		.header-search-popupp .form-control:focus{border:#e7e7e7}
		.header-search-inlinep .form-control{min-width:21rem;padding:1rem 2rem}@media (min-width:992px){.header-search-inlinep .btn:after,.header-search-inlinep .search-togglep{display:none}.header-search-inlinep.header-searchp .header-search-wrappep{display:flex;display:-ms-flex;position:static;margin:0;border-width:0}}@media (max-width:767px){.header-searchp .form-control{min-width:17rem}}@media (max-width:575px){.header-search-wrappep{left:15px;right:15px}}
		/* fin estilo nuevo */

		.header-rightp{padding-right:22.6rem}
	</style>
	
</head>

<body>
    <div class="page-wrapper">
        <header class="header home">
            <?php include("menu-superior.php"); ?>

            <?php include("menu-flotante.php"); ?>
			
			<h4 align="center" class="d-none d-xl-none d-block d-sm-none d-sm-block d-md-none" > 
								<a href="./" <?=$expolnk;?> > Exportadores </a> &nbsp;&nbsp;&nbsp; 
								<a href="importacion" <?=$impolnk;?> > Importadores </a>
							</h4>
			
			<?php if($var=="up"){ ?>
			<div class="row">
				<div  class="col-lg-2"></div>
			<div class="col-lg-8">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Mensaje </strong> &nbsp; Se actualizaron los datos correctamente.
</div>
				</div>
				<div  class="col-lg-2"></div>
			</div>
			<?php } ?>
			
			<?php if($var=="ok"){ ?>
			<div class="row">
				<div  class="col-lg-2"></div>
			<div class="col-lg-8">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Mensaje </strong> &nbsp; El registro se elimino correctamente.
</div>
				</div>
				<div  class="col-lg-2"></div>
			</div>
			<?php } ?>
			
			<!-- tab -->
			<div class="tabs tabs-simple">
						 <ul class="nav nav-tabs justify-content-center" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="parti-tab" data-toggle="tab" href="#parti-content" role="tab"
									aria-controls="parti-content" aria-selected="true">Partida</a>
							</li>
						</ul>
						<div class="tab-content">
					<div class="tab-pane fade show active text-center" id="parti-content" role="tabpanel"
								aria-labelledby="parti-tab">
								<!--<div class="container">-->			
                    <!--<div class="header-right w-lg-max pl-2">
                        <div class="header-searchp header-iconp header-search-inlinep header-search-categoryp w-lg-max" style="display: flex; justify-content: center;">
                                <div class="header-search-wrappep">-->
						<div>
							<div>
							<div>
									<input type="hidden" id="buscasqlp" name="buscasqlp" value="partida">
										<!--<select class="form-select" aria-label="Default select example" id='qp' name="qp" lang="es" style="border-radius: 80px 20px 5px 90px; background-color:#F4F4F4; height: 40px; width: 320px">-->
											<select class="form-control-lg" style="width: 320px;" id='qp' name="qp" lang="es">
        <option value=''>- Buscar Partida -</option>
     </select>
									<input type="hidden" id="yearp" name="yearp" value="<?=$_SESSION['codusuario'];?>" >
									<?php if (isset($_SESSION['login_usuario'])){ ?>
                                    <!--<button class="btn icon-magnifier" type="button" id="buscap" name="buscap"></button>-->
									<button class="btn btn-dark" type="button" id="buscap" name="buscap">Buscar</button>
									<?php }else{ ?>
									<!--<a href="login" class="btn icon-magnifier"></a>-->
								<a href="login" class="btn btn-dark">Buscar</a>
									<?php } ?>
                                </div>
                        </div>
                    </div>
                <!--</div>-->
								
							</div>
							
						</div>
					</div>
			<!-- fin tab -->
			
        </header>
        <!-- End .header -->

        <main class="main">
            <div class="container mb-2">
				
                <div class="row">
					
					
                    <div class="col-lg-12">
						<!-- busqueda -->
						<div id="loader" class="text-center"><center><img src="assets/images/loading-carga.gif" width="180px">Procesando Datos, espere un momento por favor...</center></div>

          <!-- AJAX -->
          <div id="outer_div"></div>
          <!-- END AJAX -->
						<!-- fin busqueda -->
						
						<div id="muestra"> <br><br>
                        

                        

                        <hr class="mt-1 mb-3 pb-2">

                        <!-- <div class="feature-boxes-container">
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
                    <!-- End .col-lg-12 -->

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
	
	<script src="assets/select2v410/js/select2.min.js"></script>
	<script src="assets/select2v410/js/i18n/es.js"></script>

	
	<script type="text/javascript">
  function onKeyUp(event) {
    var keycode = event.keyCode;
    if(keycode == '13'){	
		
		$("#outer_div").empty ();//limpiamos div
			//oculta
		divb = document.getElementById('muestra');
        divb.style.display = 'none';
      $(document).ready(function(){
        load(1);
      });
		
    }
  }
</script>
	
	
	<script>
$(document).ready(function(){

   $("#qp").select2({
      ajax: {
        url: "extraer-partida.php",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
           return {
              searchTerm: params.term // search term
           };
        },
        processResults: function (response) {
           return {
              results: response
           };
        },
        cache: true
      }
   });
});
</script>
	
	<script>
		
		$(function(){			
		$("#loader").fadeOut(); //ocultamos div	
			
			//carga pagina sola
			$(document).ready(function(){
        load6(1);
      });
			// fin carga pagina sola
			
			//TAB PARTIDA
		$('#buscap').on('click', function (T){ 
			$("#outer_div").empty ();//limpiamos div
			//oculta
		divb = document.getElementById('muestra');
        divb.style.display = 'none';
			
		//var anios = 30;
		//alert("hola "+anios+" f");
      $(document).ready(function(){
        load6(1);
      });
			
			});
			
			}); 
		
		function load6(page){
			$("#outer_div").empty ();//limpiamos div
		  product = document.getElementById("qp").value;
		  proyear = document.getElementById("yearp").value;
		  
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
		  url : 'lista_cant_reg_partidas.php?data='+product+'&year='+proyear,
          data : parametros,
          beforeSend:function(objeto){
            $("#loader").fadeIn();
          },
          success:function(data){
            $("#loader").fadeOut();
            $("#outer_div").html(data).fadeIn();
          }
        });
      }
		
    </script>
</body>
</html>