<?php
$dato1 = trim($_POST["depavalue"]);
$dato2 = trim($_POST["datopartida"]);

include("../conector/config.php");

if($dato1==""){
	$fibus = "";
	$nomde = "Todos";
}else{
$sqldepardf = "SELECT iddepartamento, departamento.nombre FROM departamento where iddepartamento='".$dato1."' ";	
$rs_depdf = $conexpg -> prepare($sqldepardf); 
$rs_depdf -> execute(); 
$tjps = $rs_depdf -> fetchAll(PDO::FETCH_OBJ); 
if($rs_depdf -> rowCount() > 0)   { 
foreach($tjps as $filadf) {
			  $nomdecodi = $filadf -> iddepartamento;
			  $nomde = ucwords(strtolower($filadf -> nombre));
		  }
	  }
	
	}

if($nomdecodi==""){//si el departamento es todos
//consulta pardita
$sqlvpar = "SELECT e.PART_NANDI FROM exportacion AS e WHERE e.PART_NANDI = '$dato2' GROUP BY e.PART_NANDI";	
$rspar = $conexpg -> prepare($sqlvpar); 
$rspar -> execute(); 
$prts = $rspar -> fetchAll(PDO::FETCH_OBJ); 
if($rspar -> rowCount() > 0)   { 
foreach($prts as $fprt) {
			  $codpartida = $fprt -> PART_NANDI;
	          $numpart = "si";
		  }
	  }else{
	$numpart = "no";
}
	}else{ //si es filtrado por departamento
	//consulta pardita
$sqlvpar = "SELECT e.PART_NANDI FROM exportacion AS e WHERE e.PART_NANDI = '$dato2 ' AND SUBSTRING(e.UBIGEO,1,2)='$dato1' GROUP BY e.PART_NANDI";	
$rspar = $conexpg -> prepare($sqlvpar); 
$rspar -> execute(); 
$prts = $rspar -> fetchAll(PDO::FETCH_OBJ); 
if($rspar -> rowCount() > 0)   { 
foreach($prts as $fprt) {
			  $codpartida = $fprt -> PART_NANDI;
	          $numpart = "si";
		  }
	  }else{
	$numpart = "no";
}
}

$conexpg = null;//cierra conexion

?>

<div class="row">
			<div class="col-lg-12 col-12"></div>
			<div class="col-lg-1 col-12"></div>
				<div class="col-lg-10 col-12">
					  <div class="box">
					  <?php if($numpart=="si"){ ?>
						<div class="box-header with-border">
						  <h4 class="box-title">Datos de la Partida:<?=$dato2;?> | Departamento : <?=$nomde;?> | Partida : <?=$codpartida;?> | Clasificar : <a href="https://www.azatrade.info/arancel/viewpartida.php?data=<?=$codpartida;?>&t=<?=$codpartida;?>&d1=" target="_blank">Ver</a></h4>
						</div>
							<div class="box-body">
								<!--<hr class="my-15">-->
								</div>
								<div>
								
			<!--<div class="row">
			<div class="col-lg-4">
			 <form method='post'>-->
			 
					<input type='hidden' name='partidaevoanua' id="partidaevoanua" value='<?=$dato2;?>' >
					<input type='hidden' name='codubi' id="codubi" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepa' id="namedepa" value='<?=$nomde;?>'>
			<button type="button" name="btncnltaA" id="btncnltaA" class="waves-effect waves-light btn btn-warning mb-5 active">INDICADORES ANUALES</button>
					  
						  <!--</form>
						 </div> 
				<div class="col-lg-4">
				<form>	- 
				<div> -->
			<button type="button" class="waves-effect waves-light btn btn-warning mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm">INDICADORES MENSUALES</button>
			
			<button type="button" class="waves-effect waves-light btn btn-danger mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplesta-modal-sm">ESTACIONALIDAD</button>
			
			<button type="button" class="waves-effect waves-light btn btn-success mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplmerca-modal-sm">MERCADOS</button>
			
			<button type="button" class="waves-effect waves-light btn btn-info mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-exampldepa-modal-sm">DEPARTAMENTOS</button>

			<button type="button" class="waves-effect waves-light btn btn-warning mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplemp-modal-sm">EMPRESAS</button>

			<button type="button" class="waves-effect waves-light btn btn-danger mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplageadu-modal-sm">AGENTE DE ADUANAS</button>

			<button type="button" class="waves-effect waves-light btn btn-success mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-exampladua-modal-sm">ADUANAS</button>

			<button type="button" class="waves-effect waves-light btn btn-primary mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplevamer-modal-sm">EVALIACI&Oacute;N DE MERCADOS</button>

							<?php  }else{ ?>
							<div class="alert alert-danger"> N&uacute;mero de Partida: <?=$dato2;?> consultado no tiene datos a mostrar. </div>   
							<?php } ?>
								</div>
								</div>
			<div class="col-lg-1 col-12"></div>
					
					</div>
					
                    	
     <!-- modal indicador mensual -->               	
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="mySmallModalLabel">Indicadores Mensuales</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form method='post'>
										<input type='hidden' name='partidaindimen' id="partidaindimen" value='<?=$dato2;?>' >
										<input type='hidden' name='codubimen' id="codubimen" value='<?=$dato1;?>'>
				                        <input type='hidden' name='namedepamen' id="namedepamen" value='<?=$nomde;?>'>
										<b>Selecciona Año</b><br>
										<select name='year' id="year" class='form-select'>
                                    <option value='2022'>2022</option>
                                    <option value='2021'>2021</option>
									<option value='2020'>2020</option>
									<option value='2019'>2019</option>
									<option value='2018'>2018</option>
                                    <option value='2017'>2017</option>
									<option value='2016'>2016</option>
									<option value='2015'>2015</option>
									<option value='2014'>2014</option>
									<option value='2013'>2013</option>
									<option value='2012'>2012</option>
                                </select><br>
								<center><button type='button' name="btncnslmen" id="btncnslmen" class='btn btn-primary'>Consultar</button></center>
										</form>
										
				</div>
			</div>
		</div>
	</div>
	
	<!-- modal estacionalidad -->
	<div class="modal fade bs-examplesta-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Estacionalidad</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form method='post'>
					<input type='hidden' name='partidaesta' id="partidaesta" value='<?=$dato2;?>' >
					<input type='hidden' name='codubiesta' id="codubiesta" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepaesta' id="namedepaesta" value='<?=$nomde;?>'>
										<b>Selecciona Indicador</b><br>
										<select name='unavariaestaci' id="unavariaestaci" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <option value='cantemp'>Cantidad Empresas</option>
                <option value='cantmerca'>Cantidad Mercados</option>
                                </select><br>
								<center><button type='button' name="btncnslesta" id="btncnslesta" class='btn btn-primary'>Consultar</button></center>
										</form>
										
				</div>
			</div>
		</div>
	</div>
	
	<!-- mercados -->
	<div class="modal fade bs-examplmerca-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Mercados</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form method='post'>
					<input type='hidden' name='partidamerca' id="partidamerca" value='<?=$dato2;?>' >
					<input type='hidden' name='codubimerca' id="codubimerca" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepamerca' id="namedepamerca" value='<?=$nomde;?>'>
										<b>Selecciona Indicador</b><br>
										<select name='unavaria' id="unavaria" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                                </select><br>
								<center><button type='button' name="btncnslmerca" id="btncnslmerca" class='btn btn-primary'>Consultar</button></center>
										</form>
										
				</div>
			</div>
		</div>
	</div>
	
	<!-- departamento -->
	<div class="modal fade bs-exampldepa-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Departamentos</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form method='post'>
					<input type='hidden' name='partidadepa' id="partidadepa" value='<?=$dato2;?>' >
					<input type='hidden' name='codubidepa' id="codubidepa" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepadepa' id="namedepadepa" value='<?=$nomde;?>'>
										<b>Selecciona Indicador</b><br>
										<select name='unavariadepa' id="unavariadepa" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                                </select><br>
								<center><button type='button' name="btncnsldepa" id="btncnsldepa" class='btn btn-primary'>Consultar</button></center>
										</form>
										
				</div>
			</div>
		</div>
	</div>
	
	<!-- empresa -->
	<div class="modal fade bs-examplemp-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Empresas</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form method='post'>
					<input type='hidden' name='partidaemp' id="partidaemp" value='<?=$dato2;?>' >
					<input type='hidden' name='codubiemp' id="codubiemp" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepaemp' id="namedepaemp" value='<?=$nomde;?>'>
										<b>Selecciona Indicador</b><br>
										<select name='unavariaemp' id="unavariaemp" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                                </select><br>
								<center><button type='button' name="btncnslemp" id="btncnslemp" class='btn btn-primary'>Consultar</button></center>
										</form>
										
				</div>
			</div>
		</div>
	</div>
	
	<!-- agente aduanas -->
	<div class="modal fade bs-examplageadu-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Agente de Aduanas</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form method='post'>
					<input type='hidden' name='partidaage' id="partidaage" value='<?=$dato2;?>' >
					<input type='hidden' name='codubiage' id="codubiage" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepage' id="namedepage" value='<?=$nomde;?>'>
										<b>Selecciona Indicador</b><br>
										<select name='unavariaage' id="unavariaage" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                                </select><br>
								<center><button type='button' name="btncnslageadu" id="btncnslageadu" class='btn btn-primary'>Consultar</button></center>
										</form>
										
				</div>
			</div>
		</div>
	</div>
	
	<!-- aduanas -->
	<div class="modal fade bs-exampladua-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Aduanas</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form method='post'>
					<input type='hidden' name='partidaadua' id="partidaadua" value='<?=$dato2;?>' >
					<input type='hidden' name='codubiadua' id="codubiadua" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepadua' id="namedepadua" value='<?=$nomde;?>'>
										<b>Selecciona Indicador</b><br>
										<select name='unavariaadua' id="unavariaadua" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                                </select><br>
								<center><button type='button' name="btncnsladua" id="btncnsladua" class='btn btn-primary'>Consultar</button></center>
										</form>
										
				</div>
			</div>
		</div>
	</div>
	
	<!-- evaluacion de mercados -->
	<div class="modal fade bs-examplevamer-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Aduanas</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form method='post'>
					<input type='hidden' name='partidaevmer' id="partidaevmer" value='<?=$dato2;?>' >
					<input type='hidden' name='codubievmer' id="codubievmer" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepaevmer' id="namedepaevmer" value='<?=$nomde;?>'>
										<b>Selecciona Indicador</b><br>
										<select name='unavariaevamer' id="unavariaevamer" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                                </select><br>
								<center><button type='button' name="btncnslevamer" id="btncnslevamer" class='btn btn-primary'>Consultar</button></center>
										</form>
										
				</div>
			</div>
		</div>
	</div>
	
	<script src="js/script/partida.js"></script>				
					


					
					

