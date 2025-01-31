<?php
include("sesion.php");
set_time_limit(450);
$activebusdeta = "active";
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
					<h4 class="page-title">Busqueda</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="./"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page"><a href="./">Dashboard</a></li>
								<li class="breadcrumb-item active" aria-current="page">Busqueda</li>
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
						  <h4 class="box-title">Busqueda Avanzada</h4>
						</div>
						<!-- /.box-header -->
						<form class="form" method="post">
							<div class="box-body">
								<h4 class="box-title text-info mb-0"><i class="ti-search me-15"></i> Seleccione uno o mas campos requeridos para una busqueda avanzada.</h4>
								<hr class="my-15">
								<div class="row">
							  <div class="col-md-2">
									<div class="form-group">
									  <label class="form-label">Selec. Año <small class="text-danger"><b>(*)</b></small></label>
									  <select name="selecanios" id="selecanios" class="form-select">
										<option value="">Seleccionar</option>
				<option value="2022" <?php if($_POST['selecyear']=="2022"){echo "selected";}?>>2022</option>
                <option value="2021" <?php if($_POST['selecyear']=="2021"){echo "selected";}?>>2021</option>
                <option value="2020" <?php if($_POST['selecyear']=="2020"){echo "selected";}?>>2020</option>
                <option value="2019" <?php if($_POST['selecyear']=="2019"){echo "selected";}?>>2019</option>
                <option value="2018" <?php if($_POST['selecyear']=="2018"){echo "selected";}?>>2018</option>
                <option value="2017" <?php if($_POST['selecyear']=="2017"){echo "selected";}?>>2017</option>
                <option value="2016" <?php if($_POST['selecyear']=="2016"){echo "selected";}?>>2016</option>
                <option value="2015" <?php if($_POST['selecyear']=="2015"){echo "selected";}?>>2015</option>
                <option value="2014" <?php if($_POST['selecyear']=="2014"){echo "selected";}?>>2014</option>
                <option value="2013" <?php if($_POST['selecyear']=="2013"){echo "selected";}?>>2013</option>
                <option value="2012" <?php if($_POST['selecyear']=="2012"){echo "selected";}?>>2012</option>
									  </select>
									</div>
								  </div>
								 <div class="col-md-2">
									<div class="form-group">
									  <label class="form-label">Selec. Mes <small class="text-danger"><b>(*)</b></small></label>
									  <select name="selecmes" id="selecmes" class="form-select">
										<option value="">Seleccionar</option>
				<option value="01" <?php if($_POST['selecmes']=="01"){echo "selected";}?>>Enero</option>
                <option value="02" <?php if($_POST['selecmes']=="02"){echo "selected";}?>>Febrero</option>
                <option value="03" <?php if($_POST['selecmes']=="03"){echo "selected";}?>>Marzo</option>
                <option value="04" <?php if($_POST['selecmes']=="04"){echo "selected";}?>>Abril</option>
                <option value="05" <?php if($_POST['selecmes']=="05"){echo "selected";}?>>Mayo</option>
                <option value="06" <?php if($_POST['selecmes']=="06"){echo "selected";}?>>Junio</option>
                <option value="07" <?php if($_POST['selecmes']=="07"){echo "selected";}?>>Julio</option>
                <option value="08" <?php if($_POST['selecmes']=="08"){echo "selected";}?>>Agosto</option>
                <option value="09" <?php if($_POST['selecmes']=="09"){echo "selected";}?>>Septiembre</option>
                <option value="10" <?php if($_POST['selecmes']=="10"){echo "selected";}?>>Octubre</option>
                <option value="11" <?php if($_POST['selecmes']=="11"){echo "selected";}?>>Noviembre</option>
                <option value="12" <?php if($_POST['selecmes']=="12"){echo "selected";}?>>Diciembre</option>
									  </select>
									</div>
								  </div>
								  <div class="col-md-3">
									<div class="form-group">
									  <label class="form-label">Selecionar Departamento </label>
									  <select id="depa" name="depa" class="form-select">
									  <option value="">Seleccionar</option>
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
								  <div class="col-md-2">
									<div class="form-group">
									  <label class="form-label">Selecc. Pa&iacute;s </label>
									  <select id="pais" name="pais" class="form-select">
									  <option value="">Seleccionar</option>
									  <?php
$sqplist="SELECT paises.idpaises, paises.espanol FROM paises ORDER BY paises.espanol ASC";
$resupov = $conexpg -> prepare($sqplist); 
$resupov -> execute(); 
$dpros = $resupov -> fetchAll(PDO::FETCH_OBJ); 
if($resupov -> rowCount() > 0)   { 
foreach($dpros as $fipvc) {
	$nip1 = $fipvc -> idpaises;
	$nip2 = ucwords(strtolower($fipvc -> espanol));
			echo "<option value='$nip1'>$nip2</option>";
}
}else{
	echo "<option value=''>Sin Datos</option>";
}
											
										?>
									  </select>
									</div>
								  </div>
								  <div class="col-md-2">
									<div class="form-group">
									  <label class="form-label">Selecc. Aduanas </label>
									  <select id="aduana" name="aduana" class="form-select">
									  <option value="">Seleccionar</option>
									  <?php
$sqalist="SELECT aduana.codadu, aduana.descripcion FROM aduana ORDER BY aduana.descripcion ASC";
$resaov = $conexpg -> prepare($sqalist); 
$resaov -> execute(); 
$daros = $resaov -> fetchAll(PDO::FETCH_OBJ); 
if($resaov -> rowCount() > 0)   { 
foreach($daros as $favc) {
	$nad1 = $favc -> codadu;
	$nad2 = ucwords(strtolower($favc -> descripcion));
			echo "<option value='$nad1'>$nad2</option>";
}
}else{
	echo "<option value=''>Sin Datos</option>";
}
											
										?>
									  </select>
									</div>
								  </div>
								  
								  <div class="col-md-2">
									<div class="form-group">
									  <label class="form-label">Ruc de Empresa </label>
									  <input type="text" name="ruce" id="ruce" class="form-control" placeholder="###########" onKeyPress="return justNumbers(event);">
									</div>
								  </div>
								  
								  <div class="col-md-4">
									<div class="form-group">
									  <label class="form-label">Descripci&oacute;n del Producto </label>
									  <input type="text" name="descri1" id="descri1" class="form-control" placeholder="Ejm: uva">
									</div>
								  </div>
								  <div class="col-md-3">
									<div class="form-group">
								  <label class="form-label">&nbsp;&nbsp;&nbsp; </label>
									  <div class="demo-checkbox">
						<input type="checkbox" id="md_checkbox_1" name="marcacheck" class="chk-col-primary" onclick="return mostrarOcultar('ocultable')" value="1">
						<label for="md_checkbox_1">Buscar por Num. Partida</label>
										</div>
									</div>
								  </div>
								  <div class="col-md-2" id="ocultable" style='display:none;'>
									<div class="form-group">
									  <label class="form-label">Numero de Partida <small class="text-danger"><b>(*)</b></small> </label>
									  <input type="text" name="numpar" id="numpar" class="form-control" placeholder="Ingrese N#. Partida" onKeyPress="return justNumbers(event);">
									</div>
								  </div>
								  <div class="col-md-12">
									<!--<div class="form-group">
									  <br>-->
									  <center><button type="button" id="busca" name="busca" class="btn btn-primary"><i class="ti-search"></i> Consultar</button></center>
									<!--</div>-->
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
	<script src="js/script/busquedaavanzado.js"></script>
</body>
</html>