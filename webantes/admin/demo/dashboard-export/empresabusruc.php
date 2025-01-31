<?php
$dato1 = trim($_POST["btnbusruc"]);
include("../conector/config.php");
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
								  <div class="col-md-3">
									<div class="form-group">
									  <label class="form-label">Ingrese Numero de RUC <small class="text-danger"><b>(*)</b></small> </label>
									  <input type="number" name="busruc" id="busruc" class="form-control" placeholder="###########">
									</div>
								  </div>
								  <div class="col-md-2">
									<div class="form-group">
									  <!--<label class="form-label">Seleccioonar Año</label>--><br>
									  <button type="button" id="buscaruc" name="buscaruc" class="btn btn-primary">
								  <i class="ti-search"></i> Consultar</button>
									</div>
								  </div>
								  <div class="col-md-2">
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
					


					
					

