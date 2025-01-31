<?php
$dato1 = trim($_POST["depavalue"]);

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
	          $nomdepa = $filadf -> nombre;
		  }
	  }
	
	}

$conexpg = null;//cierra conexion

?>

<div class="row">
			<div class="col-lg-12 col-12"></div>
			<div class="col-lg-1 col-12"></div>
				<div class="col-lg-10 col-12">
					  <div class="box">
					  <?php if($nomdecodi!=""){ ?>
						<div class="box-header with-border">
						  <h4 class="box-title"><b>| Departamento:</b> <?=$nomde;?> <b>| </b> </h4>
						</div>
							<div class="box-body">
								<!--<hr class="my-15">-->
								</div>
								<div>
								<h3 align="center">¿ De este Departamento que más deseas conocer ?</h3>
								
					<input type='hidden' name='namedatoA' id="namedatoA" value='<?=$nomde;?>' >
					<input type='hidden' name='codedatoA' id="codedatoA" value='<?=$nomdecodi;?>'>
			<button type="button" name="btncnltaA" id="btncnltaA" class="waves-effect waves-light btn btn-warning mb-5 active">INDICADORES ANUALES</button>

			<button type="button" class="waves-effect waves-light btn btn-danger mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm">INDICADORES MENSUALES</button>
			
			<button type="button" class="waves-effect waves-light btn btn-success mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplesta-modal-sm">ESTACIONALIDAD</button>
			
			<button type="button" class="waves-effect waves-light btn btn-info mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplparti-modal-sm">PARTIDAS EXPORTADAS</button>
			
			<button type="button" class="waves-effect waves-light btn btn-warning mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplepueing-modal-sm">PUERTOS DE INGRESO</button>

			<button type="button" class="waves-effect waves-light btn btn-danger mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplemp-modal-sm">EMPRESAS EXPORTADORAS</button>
			
			<button type="button" class="waves-effect waves-light btn btn-success mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-exampldepa-modal-sm">MERCADOS DE DESTINO</button>

			<button type="button" class="waves-effect waves-light btn btn-info mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-examplageadu-modal-sm">AGENTE DE ADUANAS</button>

			<button type="button" class="waves-effect waves-light btn btn-warning mb-5 active" data-bs-toggle="modal" data-bs-target=".bs-exampladua-modal-sm">ADUANAS</button>

							<?php  }else{ ?>
							<div class="alert alert-danger"> Los filtros consultados no tiene datos a mostrar. </div>   
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
					<input type='hidden' name='namedatoB' id="namedatoB" value='<?=$nomde;?>' >
					<input type='hidden' name='namedatoB' id="codedatB" value='<?=$nomdecodi;?>'>
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
					<input type='hidden' name='namedatoC' id="namedatoC" value='<?=$nomde;?>' >
					<input type='hidden' name='codedatoC' id="codedatoC" value='<?=$nomdecodi;?>'>
										<b>Selecciona Indicador</b><br>
										<select name='unavariaestaci' id="unavariaestaci" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>                               
                <option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
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
					<input type='hidden' name='namedatoD' id="namedatoD" value='<?=$nomde;?>' >
					<input type='hidden' name='codedatoD' id="codedatoD" value='<?=$nomdecodi;?>'>
				    <input type='hidden' name='dosvaria' id="dosvaria" value='partidaexpo'>
										<b>Selecciona Indicador</b><br>
										<select name='unavaria' id="unavaria" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>
                <option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <option value='dnombre'>Cantidad de Empresas</option>
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
					<h4 class="modal-title">Mercados de Destino</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form method='post'>
					<input type='hidden' name='namedatoG' id="namedatoG" value='<?=$nomde;?>' >
					<input type='hidden' name='codedatoG' id="codedatoG" value='<?=$nomdecodi;?>'>
					<input type='hidden' name='dosvariaG' id="dosvariaG" value='pais'>
										<b>Selecciona Indicador</b><br>
										<select name='unavariaG' id="unavariaG" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>                               
                <option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
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
					<h4 class="modal-title">Empresas Exportadoras</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form method='post'>
					<input type='hidden' name='namedatoF' id="namedatoF" value='<?=$nomde;?>' >
					<input type='hidden' name='codedatoF' id="codedatoF" value='<?=$nomdecodi;?>'>
					<input type='hidden' name='dosvariaF' id="dosvariaF" value='empresaexpo'>
										<b>Selecciona Indicador</b><br>
										<select name='unavariaF' id="unavariaF" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>                               
                <option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
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
					<input type='hidden' name='namedatoH' id="namedatoH" value='<?=$nomde;?>' >
					<input type='hidden' name='codedatoH' id="codedatoH" value='<?=$nomdecodi;?>'>
					<input type='hidden' name='dosvariaH' id="dosvariaH" value='agente'>
										<b>Selecciona Indicador</b><br>
										<select name='unavariaH' id="unavariaH" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>
				<option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
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
					<input type='hidden' name='namedatoI' id="namedatoI" value='<?=$nomde;?>' >
					<input type='hidden' name='codedatoI' id="codedatoI" value='<?=$nomdecodi;?>'>
					<input type='hidden' name='dosvariaI' id="dosvariaI" value='aduanas'>
										<b>Selecciona Indicador</b><br>
										<select name='unavariaI' id="unavariaI" class='form-select'>
                                    <option value=''>Selecciona Indicador</option>
                <option value='vfobserdol'>Valor FOB USD</option>
				<option value='vpesnet'>Peso Neto (Kg)</option>
                <option value='diferen'>Precio FOB USD x KG</option>
                <option value='part_nandi'>Cantidad de Partidas</option>
                <option value='dnombre'>Cantidad de Empresas</option>
				<option value='cpaides'>Cantidad de Mercados</option>
                <option value='cage'>Cantidad de Agentes</option>
                                </select><br>
								<center><button type='button' name="btncnsladua" id="btncnsladua" class='btn btn-primary'>Consultar</button></center>
										</form>
										
				</div>
			</div>
		</div>
	</div>
	
	<!-- evaluacion de puertos -->
	<div class="modal fade bs-examplepueing-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Puertos de Ingreso</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
				<form method='post'>
					<input type='hidden' name='namedatoE' id="namedatoE" value='<?=$nomde;?>' >
					<input type='hidden' name='codedatoE' id="codedatoE" value='<?=$nomdecodi;?>'>
					<input type='hidden' name='dosvariaE' id="dosvariaE" value='puerto'>
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
	
	<script src="js/script/regiones.js"></script>				
					


					
					

