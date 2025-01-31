<?php
session_start();
if (isset($_SESSION['login_usuario'])){
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>window.location='ingresar';</script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Azatrade - Panel </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="dashboard-export/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="dashboard-export/css/style.css">
	<link rel="stylesheet" href="dashboard-export/css/skin_color.css">	

</head>
<!--<body class="hold-transition bg-img text-center theme-primary" style="background-image: url(images/fondo1.jpg); background-repeat: repeat-y;" data-overlay="5">-->
<body class="hold-transition bg-img text-center theme-primary" style="background-image: url(images/fondo1.jpg); background-repeat: repeat-y;">
	
	<div class="container h-p100">
		<div class="row justify-content-md-center align-items-center h-p100">
			<div class="col-12">
				<div class="box bg-transparent no-border no-shadow">	
					<div class="box-body text-center">
						    <center><a href="./"><img class="img-hov-fadein" src="images/logo_aza.png" width="460px"></a><br><br></center>
						<div class="row justify-content-md-center align-items-center h-p100">
							
							<div class="col-md-12 col-12">
								<div class="text-start">
									<h1 class="fs-50 text-white" align="center">Que deseas Consultar</h1>	

					  				<p class="mb-20 text-white fs-18" align="center">Seleccione una opcion para ingresar</p>
									
									<div class="row">
			  <div class="col-xl-4 col-12 h-p100">
				<div class="box card-inverse bg-img text-center py-80" style="background-image: url(images/exportacion.jpg)" data-overlay="3">
				  <div class="card-body">
					<!--<span class="bb-1 opacity-80 pb-2">22 October, 2019</span>-->
					<i class="ti-home" style="font-size: 32px;"></i>
					<br><br>
					<h3>EXPORTACIONES</h3>
					<br><br>
					<a class="btn btn-primary-light" href="dashboard-export/">Ingresar</a>
				  </div>
				</div>
			  </div>
								
								<div class="col-xl-4 col-12 h-p100">
				<div class="box card-inverse bg-img text-center py-80" style="background-image: url(images/importacion.jpg)" data-overlay="3">
				  <div class="card-body">
					<i class="ti-home" style="font-size: 32px;"></i>
					<br><br>
					<h3>IMPORTACIONES</h3>
					<br><br>
					<a class="btn btn-primary-light" href="#">Ingresar</a>
				  </div>
				</div>
			  </div>
							
							<div class="col-xl-4 col-12 h-p100">
				<div class="box card-inverse bg-img text-center py-80" style="background-image: url(images/arancel.jpg)" data-overlay="3">
				  <div class="card-body">
					<i class="ti-home" style="font-size: 32px;"></i>
					<br><br>
					<h3>Arancel</h3>
					<br><br>
					<a class="btn btn-primary-light" href="#">Ingresar</a>
				  </div>
				</div>
			  </div>
							
							<div class="col-xl-4 col-12 h-p100">
				<div class="box card-inverse bg-img text-center py-80" style="background-image: url(images/buscaexpor.jpg)" data-overlay="3">
				  <div class="card-body">
					<i class="ti-home" style="font-size: 32px;"></i>
					<br><br>
					<h3>BUSCAR EXPORTADORES</h3>
					<br><br>
					<a class="btn btn-primary-light" href="#">Ingresar</a>
				  </div>
				</div>
			  </div>
							
							<div class="col-xl-4 col-12 h-p100">
				<div class="box card-inverse bg-img text-center py-80" style="background-image: url(images/buscaimpor.jpg)" data-overlay="3">
				  <div class="card-body">
					<i class="ti-home" style="font-size: 32px;"></i>
					<br><br>
					<h3>BUSCAR IMPORTACIONES</h3>
					<br><br>
					<a class="btn btn-primary-light" href="#">Ingresar</a>
				  </div>
				</div>
			  </div>
							
							<div class="col-xl-4 col-12 h-p100">
				<div class="box card-inverse bg-img text-center py-80" style="background-image: url(images/buscaprodu.jpg)" data-overlay="3">
				  <div class="card-body">
					<i class="ti-home" style="font-size: 32px;"></i>
					<br><br>
					<h3>BUSCAR POR PRODUCTO</h3>
					<br><br>
					<a class="btn btn-primary-light" href="#">Ingresar</a>
				  </div>
				</div>
			  </div>
								
									</div>
								
									<!--<div class="mx-auto mt-40">
										<h3 class="text-uppercase text-white">NOTIFY ME WHEN IT'S READY</h3>
										<div class="input-group">
											<input type="text" class="form-control p-10" placeholder="Your Email Address......">
											<button type="button" class="btn btn-success">Notify Me</button>
										</div>
									</div>-->
									
									<!--<p class="gap-items-2 mt-40">
									  <a class="btn btn-social-icon btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
									  <a class="btn btn-social-icon btn-google" href="#"><i class="fa fa-twitter"></i></a>
									  <a class="btn btn-social-icon btn-instagram" href="#"><i class="fa fa-linkedin"></i></a>
									  <a class="btn btn-social-icon btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
									</p>-->
									
								</div>
							</div>
							<!--<div class="col-md-5 col-12">								
								<div class="box box-body my-50 bg-transparent no-shadow b-0">
									<div id="countdown" class="row justify-content-md-center text-white"></div>
								</div>
							</div>-->
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	

	<!-- Modal -->
	  <!--<div class="modal center-modal fade" id="modal-center" tabindex="-1">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-body text-center">
				<h2>Subscribe Us</h2>
				 <p>Be the first to know when our site is ready</p>
				<form class="mx-auto flexbox w-p75 mb-30" method="post" action="">
					<input type="text" class="form-control rounded" name="EMAIL" placeholder="Enter email address">
					<button class="btn btn-danger" type="submit">Subscribe Us</button>
				</form>
			  </div>
			</div>
		  </div>
		</div>-->
	  <!-- /.modal -->

	<!-- Vendor JS -->
	<script src="dashboard-export/js/vendors.min.js"></script>
	<script src="dashboard-export/js/pages/chat-popup.js"></script>
    <script src="assets/icons/feather-icons/feather.min.js"></script>	
	
	<!-- Deposito Admin App -->
	<script src="dashboard-export/js/pages/coundown-timer.js"></script>


</body>
</html>