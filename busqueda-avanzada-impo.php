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
$impolnk = "style='color: #004EFE;'";
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
			
			<?php if($var=="ok"){ ?>
			<div class="row">
				<div  class="col-lg-2"></div>
			<div class="col-lg-8">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Mensaje </strong> &nbsp; El registro se elimino correctamente.
  <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>-->
</div>
				</div>
				<div  class="col-lg-2"></div>
			</div>
			<?php } ?>
        </header>
        <!-- End .header -->
		
		<div class="container mb-2">
			<form id="myForm">
							<div class="row">
								<div class="col-lg-12">
								<h4><b>Busqueda Avanzada</b></h4>
								</div>
								<div class="col-lg-3">
									<input type="hidden" id="buscasqlp" name="buscasqlp" value="partida">
									<input type="hidden" id="codusu" name="codusu" value="<?=$_SESSION['codusuario'];?>" >
									<input type="text" class="form-control" placeholder="Producto" name="nameprodu" id="nameprodu">
								</div>
								
							<div class="col-lg-3">
							<select class="form-control-lg" style="width: 280px;" id='qp' name="qp" lang="es">
        <option value=''>- Buscar Partida -</option>
     </select>
									
                                </div>
								
							<div class="col-lg-3">
							<select  class="form-control-lg" style="width: 280px;" id='q2' name="q2" lang="es">
        <option value=''>- Buscar Empresa -</option>
     </select>
								</div>
								
								<div class="col-lg-3">
								<select class="form-control-lg" style="width: 280px;" id='cate2' name="cate2" lang="es">
        <option value=''>- Buscar Mercado -</option>
    </select>
								</div>
								<!--
								<div class="col-lg-3"><br>
								<select class="form-control-lg" id="cate5" name="cate5" style="width: 280px;" >
								<option value="">Buscar Sector </option>
                                        </select>
								</div>
								
								<div class="col-lg-3"><br>
								<select class="form-control-lg"  id="cate4" name="cate4" style="width: 280px;" >
									<option value="">Buscar Departamento</option>
                                        </select> 
								</div>
								
								<div class="col-lg-3"><br>
								<select class="form-control-lg" id="provi" name="provi" style="width: 280px;">
									<option value=""> Seleccionar Provincia </option>
									</select>
								</div>
								
								<div class="col-lg-3"><br>
								<select class="form-control-lg" id="distri" name="distri" style="width: 280px;">
									<option value=""> Seleccionar Distrito </option>
									</select>
								</div>
								-->
								<div class="col-lg-3"><br>
								<select class="form-control-lg" id="year4" name="year4" style="width: 280px;">
                                            <option value="2024">2024</option>
									        <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
											<option value="2018">2018</option>
											<option value="2017">2017</option>
											<option value="2016">2016</option>
											<option value="2015">2015</option>
											<option value="2014">2014</option>
											<option value="2013">2013</option>
											<option value="2012">2012</option>
                                        </select>
								</div>
								
								<div class="col-lg-3"><br>
								<select class="form-control-lg" id="mes" name="mes" style="width: 280px;">
                                            <option value="">Seleccione Mes</option>
									        <option value="01">Enero</option>
                                            <option value="02">Febrero</option>
                                            <option value="03">Marzo</option>
                                            <option value="04">Abril</option>
                                            <option value="05">Mayo</option>
											<option value="06">Junio</option>
											<option value="07">Julio</option>
											<option value="08">Agosto</option>
											<option value="09">Septiembre</option>
											<option value="10">Octubre</option>
											<option value="11">Noviembre</option>
											<option value="12">Diciembre</option>
                                        </select>
								</div>
								
								<div class="col-lg-3"><br>
								<select class="form-control-lg" id="age" name="age" style="width: 280px;">
									<option value=""> Buscar Agente </option>
									</select>
								</div>
								
								<div class="col-lg-3"><br>
								<select class="form-control-lg" id="adua" name="adua" style="width: 280px;">
									<option value=""> Buscar Aduana </option>
									</select>
								</div>
								
								<div class="col-lg-3"><br>
									<input type="text" class="form-control" placeholder="DUA/DAM" name="dua" id="dua">
								</div>
								
								<div class="col-lg-3"><br>
									<input type="text" class="form-control" placeholder="Descripcion Comercial 1" name="comer1" id="comer1">
								</div>
								
								<div class="col-lg-2"><br>
								<select class="form-control-lg" id="condi" name="condi">
									<option value=""> Seleccionar </option>
									<option value="o"> O </option>
									<option value="y"> Y </option>
									</select>
								</div>
								
								<div class="col-lg-3"><br>
									<input type="text" class="form-control" placeholder="Descripcion Comercial 2" name="comer2" id="comer2">
								</div>
								
								<div class="col-lg-12"><br>
								<?php if (isset($_SESSION['login_usuario'])){ ?>
									<center>
										<button class="btn btn-dark" type="button" id="buscap" name="buscap">Buscar</button>
										<button class="btn btn-info" type="button" id="clean" name="clean" onclick="myFunction()" >Limpiar</button>
									</center>
									<?php }else{ ?>
								<center>
									<a href="login" class="btn btn-dark">Buscar</a>
									<button class="btn btn-info" type="button" id="clean" name="clean" onclick="myFunction()" >Limpiar</button>
									</center>
									<?php } ?>
								</div>
                        </div>
			</form>
                    </div>

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

	<!--<script type="text/javascript">
	$(document).ready(function(){
		
		

		$("#cate4").change(function(){
			$.get("get_cities.php","cate4="+$("#cate4").val(), function(data){
				$("#provi").html(data);
				console.log(data);
			});
		});
		
		$("#provi").change(function(){
			$.get("get_states.php","provi="+$("#provi").val(), function(data){
				$("#distri").html(data);
				console.log(data);
			});
		});
		
	});
</script>-->
	
	<script>
	$(document).ready(function(){
  $('#buscador').keyup(function(){
     var nombres = $('.nombres');
     var buscando = $(this).val();
     var item='';
     for( var i = 0; i < nombres.length; i++ ){
         item = $(nombres[i]).html().toLowerCase();
          for(var x = 0; x < item.length; x++ ){
              if( buscando.length == 0 || item.indexOf( buscando ) > -1 ){
                  $(nombres[i]).parents('.item').show(); 
              }else{
                   $(nombres[i]).parents('.item').hide();
              }
          }
     }
  });
});
	</script>
	
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
$(document).ready(function(){

   $("#q2").select2({
      ajax: {
        url: "extraer-empresa-expor.php",
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
		
/* $(document).ready(function(){

   $("#cate5").select2({
      ajax: {
        url: "extraer-sectores.php",
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
}); */
		
/* $(document).ready(function(){
   $("#cate4").select2({
      ajax: {
        url: "extraer-departamentos.php",
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
}); */
		
$(document).ready(function(){
   $("#age").select2({
      ajax: {
        url: "extraer-agentes.php",
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
		
$(document).ready(function(){
   $("#adua").select2({
      ajax: {
        url: "extraer-aduana.php",
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
$(document).ready(function(){

   $("#cate2").select2({
      ajax: {
        url: "extraer-mercado.php",
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
			
			//TAB PRODUCTOS
		$('#buscap').on('click', function (T){
			
			
			
			
			$("#outer_div").empty ();//limpiamos div
			//oculta
		divb = document.getElementById('muestra');
        divb.style.display = 'none';
			
		//var anios = 30;
		//alert("hola "+anios+" f");
      $(document).ready(function(){
        load(1);
      });
			
			});
			
			}); 
		
      function load(page){
		  
		  codeusu = document.getElementById("codusu").value;
		  nomprodu = document.getElementById("nameprodu").value;
		  numpartida = document.getElementById("qp").value;
		  empresa = document.getElementById("q2").value;
		  mercado = document.getElementById("cate2").value;
		  /*sector = document.getElementById("cate5").value;
		  depart = document.getElementById("cate4").value;
		  codprovi = document.getElementById("provi").value;
		  coddist = document.getElementById("distri").value;*/
		  codanio = document.getElementById("year4").value;
		  codmes = document.getElementById("mes").value;
		  codagen = document.getElementById("age").value;
		  codaduna = document.getElementById("adua").value;
		  numdua = document.getElementById("dua").value;
		  nomcome1 = document.getElementById("comer1").value;
		  condi = document.getElementById("condi").value;
		  nomcome2 = document.getElementById("comer2").value;
		  
		  
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
		url : 'busquedainicial-avanzado-impo.php?data1='+codeusu+'&data2='+nomprodu+'&data3='+numpartida+'&data4='+empresa+'&data5='+mercado+'&data10='+codanio+'&data11='+codmes+'&data12='+codagen+'&data13='+codaduna+'&data14='+numdua+'&data15='+nomcome1+'&data16='+condi+'&data17='+nomcome2,
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
		
		/*function load2(page){
		  product = document.getElementById("cate2").value;
		  proyear = document.getElementById("year2").value;
		  ptipo1 = document.getElementById("buscasql2").value;
		  
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
		  url : 'busquedainicial-merca.php?data='+product+'&year='+proyear+'&ptipo1='+ptipo1,
          data : parametros,
          beforeSend:function(objeto){
            $("#loader").fadeIn();
          },
          success:function(data){
            $("#loader").fadeOut();
            $("#outer_div").html(data).fadeIn();
          }
        });
      } */
		
		/*function load3(page){
		  product = document.getElementById("q2").value;
		  proyear = document.getElementById("year3").value;
		  
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
		  url : 'busquedainicial-empresas.php?data='+product+'&year='+proyear,
          data : parametros,
          beforeSend:function(objeto){
            $("#loader").fadeIn();
          },
          success:function(data){
            $("#loader").fadeOut();
            $("#outer_div").html(data).fadeIn();
          }
        });
      }*/
		
		/*function load4(page){
		  product = document.getElementById("cate4").value;
		  proyear = document.getElementById("year4").value;
		  
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
		  url : 'busquedainicial-region.php?data='+product+'&year='+proyear,
          data : parametros,
          beforeSend:function(objeto){
            $("#loader").fadeIn();
          },
          success:function(data){
            $("#loader").fadeOut();
            $("#outer_div").html(data).fadeIn();
          }
        });
      }*/
		
		/*function load5(page){
		  product = document.getElementById("cate5").value;
		  proyear = document.getElementById("year5").value;
		  
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
		  url : 'busquedainicial-sector.php?data='+product+'&year='+proyear,
          data : parametros,
          beforeSend:function(objeto){
            $("#loader").fadeIn();
          },
          success:function(data){
            $("#loader").fadeOut();
            $("#outer_div").html(data).fadeIn();
          }
        });
      }*/
		
		/*function load6(page){
			$("#outer_div").empty ();//limpiamos div
		  product = document.getElementById("qp").value;
		  proyear = document.getElementById("yearp").value;
		  
        var parametros = {"action" : "ajax", "page" : page};
        $("#loader").fadeIn();
        $.ajax({
		  url : 'busquedainicial-partida.php?data='+product+'&year='+proyear,
          data : parametros,
          beforeSend:function(objeto){
            $("#loader").fadeIn();
          },
          success:function(data){
            $("#loader").fadeOut();
            $("#outer_div").html(data).fadeIn();
          }
        });
      }*/
		
    </script>
	
	<script>
function myFunction() {
    document.getElementById("myForm").reset();
	$("#qp").empty().append('<option selected > - Buscar Partida - </option>');
	$("#q2").empty().append('<option selected > - Buscar Empresa - </option>');
	$("#cate2").empty().append('<option selected > - Buscar Mercado - </option>');
	var select = document.getElementById(mes);
    while (select.length > 0) {
        select.remove(1);
    }
	
	$("#age").empty().append('<option selected > Buscar Agente </option>');
	$("#adua").empty().append('<option selected > Buscar Aduana </option>');
	var select2 = document.getElementById(condi);
    while (select2.length > 0) {
        select2.remove(1);
    }
	
}
</script>
	
</body>
</html>