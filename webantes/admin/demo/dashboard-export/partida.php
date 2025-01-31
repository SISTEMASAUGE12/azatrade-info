<?php
include("sesion.php");
set_time_limit(500);
$activeparti = "active";
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
					<h4 class="page-title">Partidas</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page"><a href="./">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Partidas</li>
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
						  <h4 class="box-title">Consultar</h4>
						</div>
						<!-- /.box-header -->
						<form class="form" method="post">
							<div class="box-body">
								<h4 class="box-title text-info mb-0"><i class="ti-search me-15"></i> Consulte por Número de Partida</h4>
								<hr class="my-15">
								<div class="row">
								  <div class="col-md-3">
									<div class="form-group">
									  <label class="form-label">Selecionar Departamento</label>
									  <select id="depavalue" name="depavalue" class="form-select">
									  <option value="">Todos</option>
									  <?php
$sqlist="SELECT iddepartamento, nombre FROM departamento ORDER BY nombre ASC";
$resultadov = $conexpg -> prepare($sqlist); 
$resultadov -> execute(); 
$djfros = $resultadov -> fetchAll(PDO::FETCH_OBJ); 
if($resultadov -> rowCount() > 0)   { 
foreach($djfros as $filavc) {
	$nivt1 = $filavc -> iddepartamento;
	$nivt2 = ucwords(strtolower($filavc -> nombre));
			echo "<option value='$nivt1'>$nivt2</option>";
}
}else{
	echo "<option value=''>Sin Datos</option>";
}
											
										?>
									  </select>
									</div>
								  </div>
								  <div class="col-md-3">
									<div class="form-group">
									  <label class="form-label">N&uacute;mero de Partida <small class="text-danger"><b>(*)</b></small> </label>
									  <input type="number" name="datopartida" id="datopartida" class="form-control" placeholder="##########">
									</div>
								  </div>
								  <div class="col-md-2">
									<div class="form-group">
									  <!--<label class="form-label">Seleccioonar Año</label>--><br>
									  <button type="button" id="busca" name="busca" class="btn btn-primary">
								  <i class="ti-search"></i> Consultar</button>
									</div>
								  </div>
								  <div class="col-md-2">
									<div class="form-group">
									  <!--<label class="form-label">Seleccioonar Año</label>--><br>
									  <button type="button" id="" name="" class="btn btn-danger">
								  <i data-feather="at-sign"></i> Resumen</button>
									</div>
								  </div>
								</div>
							</div>
							<div id="alert"></div>
						</form>
						<div class="box-footer">
								<!--<button type="submit" class="btn btn-primary">
								  <i class="ti-search"></i> Consultar
								</button>-->
							</div>
					  </div>		
				</div> 
				 
		</div>
		
		
		<div class="row" id="gria" style="display: none;">
			<div id="alertmuestra"></div>			  
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
	<script src="js/script/partida.js"></script>
</body>
</html>