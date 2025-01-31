<?php
include("sesion.php");
set_time_limit(750);
$activeresu = "active";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <?php include("title.php"); ?>
	<?php include("css.php"); ?>
     
  </head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<?php include("preloader.php");?>
    <?php include("menusuperior.php"); ?>
    <?php include("menulateral.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
	  
	  <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Resumenes</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page"><a href="./">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Resumenes</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>	
		<!-- Main content -->
		<section class="content">
		<div class="row">
			<div class="col-lg-12 col-12">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Consultar Resumenes</h4>
						</div>
						<!-- /.box-header -->
							<div class="box-body">
								<h4 class="box-title text-info mb-0"><i class="ti-search me-15"></i> Resumen de exportaciones peruanas</h4>								
							</div>
							<div id="alert"></div>
					  </div>		
				</div> 
				 
		</div>
		
		<div class="row">
			<div class="col-md-2 col-6">
				<div class="box box-solid bg-primary">
				  <div class="box-header">
					<h4 class="box-title"><strong>Partidas</strong></h4>
				  </div>

				  <div class="box-body">
					<h1 align="center">345</h1>
					<center><button type="button" class="waves-effect waves-light btn btn-outline btn-rounded btn-primary mb-5">Ver Reporte</button></center>
				  </div>
				</div>
			  </div>

			  <!--<div class="col-md-6 col-12">
				<div class="box box-solid bg-secondary">
				  <div class="box-header">
					<h4 class="box-title"><strong>Secondary</strong></h4>
				  </div>

				  <div class="box-body">
					Which is the same as saying through shrinking from toil and pain.
				  </div>
				</div>
			  </div>-->

			  <div class="col-md-2 col-6">
				<div class="box box-solid bg-success">
				  <div class="box-header">
					<h4 class="box-title"><strong>Mercados</strong></h4>
				  </div>

				  <div class="box-body">
					<h1 align="center">567</h1>
					<p align="center"><button type="button" class="waves-effect waves-light btn btn-outline btn-rounded btn-primary mb-5">Ver Reporte</button></p>
				  </div>
				</div>
			  </div>

			  <div class="col-md-2 col-6">
				<div class="box box-solid bg-info">
				  <div class="box-header">
					<h4 class="box-title"><strong>Empresas</strong></h4>
				  </div>

				  <div class="box-body">
					<h1>27,534</h1>
					<p align="center"><button type="button" class="waves-effect waves-light btn btn-outline btn-rounded btn-primary mb-5">Ver Reporte</button></p>
				  </div>
				</div>
			  </div>

			  <div class="col-md-3 col-6">
				<div class="box box-solid bg-warning">
				  <div class="box-header">
					<h4 class="box-title"><strong>Departamentos</strong></h4>
				  </div>

				  <div class="box-body">
					<h1 align="center">27</h1>
					<p align="center"><button type="button" class="waves-effect waves-light btn btn-outline btn-rounded btn-primary mb-5">Ver Reporte</button></p>
				  </div>
				</div>
			  </div>

			  <div class="col-md-2 col-6">
				<div class="box box-solid bg-danger">
				  <div class="box-header">
					<h4 class="box-title"><strong>Sectores</strong></h4>
				  </div>


				  <div class="box-body">
					<h1 align="center">16</h1>
					<p align="center"><button type="button" class="waves-effect waves-light btn btn-outline btn-rounded btn-primary mb-5">Ver Reporte</button></p>
				  </div>
				</div>
			  </div>
		</div>
		
		</section>
		<!-- /.content -->
	  </div>
  </div>
  
  <?php include("footer.php"); ?>
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
	
	
	<!-- Vendor JS -->
	<script src="js/vendors.min.js"></script>
	<!--<script src="js/pages/chat-popup.js"></script>-->
    <script src="../assets/icons/feather-icons/feather.min.js"></script>
    <script src="../assets/vendor_components/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js"></script>	
	<!-- Deposito Admin App -->
	<script src="js/template.js"></script>
	<script src="js/script/producto.js"></script>
</body>
</html>