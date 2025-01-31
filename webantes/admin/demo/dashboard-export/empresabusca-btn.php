<?php
$dato1 = trim($_POST["depavalue"]);
$dato2 = trim($_POST["razonsoci"]);
$dato3 = trim($_POST["busruc"]);

if($dato3!=""){
$dato2 = trim($_POST["busruc"]);	
}

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

$sqlconsu = "SELECT exportacion.ndoc, exportacion.dnombre FROM exportacion WHERE exportacion.ndoc = '$dato2' GROUP BY exportacion.ndoc, exportacion.dnombre limit 1 ";	
$rs_me = $conexpg -> prepare($sqlconsu); 
$rs_me -> execute(); 
$paps = $rs_me -> fetchAll(PDO::FETCH_OBJ); 
if($rs_me -> rowCount() > 0)   { 
foreach($paps as $filapais) {
			  $codruc = $filapais -> ndoc;
	          $nom_empre = $filapais -> dnombre; 
		  }
	  }

$conexpg = null;//cierra conexion

?>

<!--<div class="box-body">
<div class="row">-->
			<div class="col-lg-12 col-12"></div>
			<div class="col-lg-1 col-12"></div>
				<div class="col-lg-12 col-12">
					  <div class="box">
					  <?php if($codruc!=""){ ?>
						<div class="box-header with-border">
						  <h4 class="box-title"><b>RUC :</b> <?=$codruc;?> | <b>Empresa:</b> <?=$nom_empre;?> | <b>Departamento:</b> <?=$nomde;?>  </h4>
						</div>
							<div class="box-body">
								<!--<hr class="my-15">-->
								</div>
								<div class="box-body">
								<h3 align="center">¿ De esta Empresa que más deseas conocer ?</h3>
					<input type='hidden' name='namempA' id="namempA" value='<?=$nom_empre;?>' >
					<input type='hidden' name='codempA' id="codempA" value='<?=$codruc;?>' >
					<input type='hidden' name='codubi' id="codubi" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepa' id="namedepa" value='<?=$nomde;?>'>
			<button type="button" name="btncnltaA" id="btncnltaA" class="waves-effect waves-light btn btn-warning mb-5 active">INDICADORES ANUALES</button>

			<button type="button" class="waves-effect waves-light btn btn-danger mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm">INDICADORES MENSUALES</button>
			
			<button type="button" class="waves-effect waves-light btn btn-success mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplesta-modal-sm">ESTACIONALIDAD</button>
			
			<button type="button" class="waves-effect waves-light btn btn-info mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplparti-modal-sm">PARTIDAS EXPORTADAS</button>
			
			<button type="button" class="waves-effect waves-light btn btn-warning mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplepueing-modal-sm">PUERTOS DE INGRESO</button>

			<!--<button type="button" class="waves-effect waves-light btn btn-danger mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplemp-modal-sm">EMPRESAS EXPORTADORAS</button>-->
			
			<button type="button" class="waves-effect waves-light btn btn-danger mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplpais-modal-sm">MERCADOS DE DESTINO</button>
			
			<button type="button" class="waves-effect waves-light btn btn-success mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-exampldepa-modal-sm">DEPARTAMENTOS</button>

			<button type="button" class="waves-effect waves-light btn btn-info mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplageadu-modal-sm">AGENTE DE ADUANAS</button>

			<button type="button" class="waves-effect waves-light btn btn-warning mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-exampladua-modal-sm">ADUANAS</button>

							<?php  }else{ ?>
							<div class="alert alert-danger"> Los filtros consultados no tiene datos a mostrar. </div>   
							<?php } ?>
								</div>
								</div>
			<div class="col-lg-1 col-12"></div>
					
					</div>
					
					<!--</div>
</div>-->
					
                    	
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
					<input type='hidden' name='namempA1' id="namempA1" value='<?=$nom_empre;?>' >
					<input type='hidden' name='codempA1' id="codempA1" value='<?=$codruc;?>' >
					<input type='hidden' name='codubi1' id="codubi1" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepa1' id="namedepa1" value='<?=$nomde;?>'>
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
					<input type='hidden' name='namempA2' id="namempA2" value='<?=$nom_empre;?>' >
					<input type='hidden' name='codempA2' id="codempA2" value='<?=$codruc;?>' >
					<input type='hidden' name='codubi2' id="codubi2" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepa2' id="namedepa2" value='<?=$nomde;?>'>
										<b>Selecciona Indicador</b><br>
										<select name='unavariaestaci' id="unavariaestaci" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>                               
                <option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                <option value='cpaides'>Cantidad de Mercados</option>
                                </select><br>
								<center><button type='button' name="btncnslesta" id="btncnslesta" class='btn btn-primary'>Consultar</button></center>
										</form>
										
				</div>
			</div>
		</div>
	</div>
	
	<!-- mercados -->
	<div class="modal fade bs-examplparti-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Partidas Exportadas</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form method='post'>
					<input type='hidden' name='namempA3' id="namempA3" value='<?=$nom_empre;?>' >
					<input type='hidden' name='codempA3' id="codempA3" value='<?=$codruc;?>' >
					<input type='hidden' name='codubi3' id="codubi3" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepa3' id="namedepa3" value='<?=$nomde;?>'>
					<input type='hidden' name='dosvaria' id="dosvaria" value='partidaexpo'>
										<b>Selecciona Indicador</b><br>
										<select name='unavaria' id="unavaria" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
				<option value='cpaides'>Cantidad de Mercados</option>
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
					<input type='hidden' name='namempA6' id="namempA6" value='<?=$nom_empre;?>' >
					<input type='hidden' name='codempA6' id="codempA6" value='<?=$codruc;?>' >
					<input type='hidden' name='codubi6' id="codubi6" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepa6' id="namedepa6" value='<?=$nomde;?>'>
					<input type='hidden' name='dosvaria6' id="dosvaria6" value='ubigeo'>
										<b>Selecciona Indicador</b><br>
										<select name='unavaria6' id="unavaria6" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>                               
                <option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                                </select><br>
								<center><button type='button' name="btncnsldepa" id="btncnsldepa" class='btn btn-primary'>Consultar</button></center>
										</form>
										
				</div>
			</div>
		</div>
	</div>
	
	<!-- empresa -->
	<!--<div class="modal fade bs-examplemp-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Empresas Exportadoras</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form method='post'>
					<input type='hidden' name='namesectAF' id="namesectAF" value='<?=$nomsec;?>' >
					<input type='hidden' name='namesectNAMEF' id="namesectNAMEF" value='<?=$nomsecname;?>'>
				    <input type='hidden' name='codubiF' id="codubiF" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepaF' id="namedepaF" value='<?=$nomde;?>'>
					<input type='hidden' name='dosvariaF' id="dosvariaF" value='empresaexpo'>
										<b>Selecciona Indicador</b><br>
										<select name='unavariaF' id="unavariaF" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>                               
                <option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                                </select><br>
								<center><button type='button' name="btncnslemp" id="btncnslemp" class='btn btn-primary'>Consultar</button></center>
										</form>
										
				</div>
			</div>
		</div>
	</div>-->
	
	<!-- pais -->
	<div class="modal fade bs-examplpais-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Mercados de Destino</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form method='post'>
					<input type='hidden' name='namempA5' id="namempA5" value='<?=$nom_empre;?>' >
					<input type='hidden' name='codempA5' id="codempA5" value='<?=$codruc;?>' >
					<input type='hidden' name='codubi5' id="codubi5" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepa5' id="namedepa5" value='<?=$nomde;?>'>
					<input type='hidden' name='dosvaria5' id="dosvaria5" value='pais'>
										<b>Selecciona Indicador</b><br>
										<select name='unavaria5' id="unavaria5" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>                               
                <option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                                </select><br>
								<center><button type='button' name="btncnslpais" id="btncnslpais" class='btn btn-primary'>Consultar</button></center>
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
					<input type='hidden' name='namempA7' id="namempA7" value='<?=$nom_empre;?>' >
					<input type='hidden' name='codempA7' id="codempA7" value='<?=$codruc;?>' >
					<input type='hidden' name='codubi7' id="codubi7" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepa7' id="namedepa7" value='<?=$nomde;?>'>
					<input type='hidden' name='dosvaria7' id="dosvaria7" value='agente'>
										<b>Selecciona Indicador</b><br>
										<select name='unavaria7' id="unavaria7" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
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
					<input type='hidden' name='namempA8' id="namempA8" value='<?=$nom_empre;?>' >
					<input type='hidden' name='codempA8' id="codempA8" value='<?=$codruc;?>' >
					<input type='hidden' name='codubi8' id="codubi8" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepa8' id="namedepa8" value='<?=$nomde;?>'>
					<input type='hidden' name='dosvaria8' id="dosvaria8" value='aduanas'>
										<b>Selecciona Indicador</b><br>
										<select name='unavaria8' id="unavaria8" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>
                <option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                <option value='cage'>Cantidad de Agentes</option>
                                </select><br>
								<center><button type='button' name="btncnsladua" id="btncnsladua" class='btn btn-primary'>Consultar</button></center>
										</form>
										
				</div>
			</div>
		</div>
	</div>
	
	<!-- evaluacion de mercados -->
	<div class="modal fade bs-examplepueing-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Puertos de Ingreso</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form method='post'>
					<input type='hidden' name='namempA4' id="namempA4" value='<?=$nom_empre;?>' >
					<input type='hidden' name='codempA4' id="codempA4" value='<?=$codruc;?>' >
					<input type='hidden' name='codubi4' id="codubi4" value='<?=$dato1;?>'>
				    <input type='hidden' name='namedepa4' id="namedepa4" value='<?=$nomde;?>'>
					<input type='hidden' name='dosvaria4' id="dosvaria4" value='puerto'>
										<b>Selecciona Indicador</b><br>
										<select name='unavariaevamer' id="unavariaevamer" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>                               
                <option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                                </select><br>
								<center><button type='button' name="btncnslevamer" id="btncnslevamer" class='btn btn-primary'>Consultar</button></center>
										</form>
										
				</div>
			</div>
		</div>
	</div>
	
	<script src="js/script/empresa.js"></script>				
					


					
					

