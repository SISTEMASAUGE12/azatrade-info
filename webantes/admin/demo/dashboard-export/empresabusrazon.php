<?php
$dato1 = trim($_POST["btnbusrazon"]);
include("../conector/config.php");
set_time_limit(900);
?>
<div class="box-body">
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
								  <div class="col-md-5">
									<div class="form-group">
									  <label class="form-label">Seleccione Razon Social <small class="text-danger"><b>(*)</b></small> </label>
									  <select name="razonsoci" id="razonsoci" class="form-control select2" style="width: 100%;">
						  <option value="">Seleccionar</option>
						  <?php
		$sqlclie = "SELECT exportacion.ndoc, exportacion.dnombre FROM exportacion WHERE exportacion.dnombre <> '' GROUP BY exportacion.dnombre, exportacion.ndoc ORDER BY exportacion.dnombre ASC";
		$rwtw = $conexpg -> prepare($sqlclie); 
$rwtw -> execute(); 
$uufros = $rwtw -> fetchAll(PDO::FETCH_OBJ); 
if($rwtw -> rowCount() > 0)   { 
foreach($uufros as $fuec) {
	$datcli1 = $fuec -> ndoc;
	$datcli2 = $fuec -> dnombre;
	echo "<option value='$datcli1'>$datcli2</option>";
}
}
										  ?>
						</select>
									</div>
								  </div>
								  <div class="col-md-2">
									<div class="form-group">
									  <!--<label class="form-label">Seleccioonar Año</label>--><br>
									  <button type="button" id="buscarazon" name="buscarazon" class="btn btn-primary">
								  <i class="ti-search"></i> Consultar</button>
									</div>
								  </div>
								  <div class="col-md-1">
									<div class="form-group">
									  <br>
									  <button type="button" id="" name="" class="btn btn-danger">
								  <i data-feather="briefcase"></i> Resumen</button>
									</div>
								  </div>
								</div>
</div>

<?php
$conexpg = null;//cierra conexion

?>				

	<script src="js/script/empresa.js"></script>
	<script src="../assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
	<script src="../assets/vendor_components/select2/dist/js/select2.full.js"></script>
	<script src="js/pages/advanced-form-element.js"></script>			
					


					
					

