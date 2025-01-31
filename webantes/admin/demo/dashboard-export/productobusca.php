<?php
include("../conector/config.php");
set_time_limit(450);

$dato1 = trim($_POST["depavalue"]);
$dato2 = trim($_POST["selecyear"]);
$dato3 = trim($_POST["dato"]);

if($dato1==""){
	$busdepa = "Todos";
}else{
	
	$sqlist="SELECT iddepartamento, nombre FROM departamento WHERE iddepartamento='$dato1' ";
$resultadov = $conexpg -> prepare($sqlist); 
$resultadov -> execute(); 
$djfros = $resultadov -> fetchAll(PDO::FETCH_OBJ); 
if($resultadov -> rowCount() > 0)   { 
foreach($djfros as $filavc) {
	$nivt1 = $filavc -> iddepartamento;
	$nivt2 = ucwords(strtolower($filavc -> nombre));
	$busdepa = $nivt2;
}
}else{
	$busdepa = "No hay datos";
}
	
}

if($dato2=="" or $dato3==""){
	echo "<div class='box-body pad res-tb-block'>
		  <div class='alert alert-danger'><i class='ti-announcement' style='font-size:26px;'></i> &nbsp;&nbsp;&nbsp; Uno o más campos requeridos estan vacios, verifique por favor. </div>              
		  </div>";
}else{
?>

<div class="box">
				<div class="box-header with-border">
			  <hr>
				  <h3 class="box-title">Filtros de Busqueda:</h3>
				  <h6 class="box-subtitle"><b> &#124; Departamento: <?=$busdepa;?> &#124; Año: <?=$dato2;?> &#124; Producto: <?=ucwords(strtolower($dato3));?> &#124; </b> </h6>
				</div>
				<!-- /.box-header -->
<div class="box-body">
<div class="table-responsive">
					  <!--<table id="example" class="table table-hover display nowrap margin-top-10 w-p100">-->
					  <table id="example" class="table table-hover display margin-top-10 w-p100">
						<thead>
							<tr>
								<th>Partida</th>
								<th>Descripción</th>
								<th>Valor Fob</th>
								<th>Peso Neto(Kg)</th>
								<th>Precio Fob</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
						<?php
	 if($dato1==""){
	  $sqlparti="SELECT
YEAR(e.fnum) AS anio,
e.part_nandi,
SUM(e.vfobserdol) as vfobx1,
SUM(e.vpesnet) as pnetox1,
SUM(e.vfobserdol) as vfob,
SUM(e.vpesnet) as pneto,
e.part_nandi as partioriginal,
e.part_nandi as parti_arancel,
substr(e.UBIGEO,1,2) AS ubigeo
FROM exportacion e
WHERE YEAR(e.fnum) ='$dato2' AND 
CONCAT(e.dcom,' ',e.dmer2,' ',e.dmer3,' ',e.dmer4,' ',e.DMER5) like '%$dato3%'
GROUP BY anio,e.part_nandi";
	 }else{
		 $sqlparti="SELECT
YEAR(e.fnum) AS anio,
e.part_nandi,
SUM(e.vfobserdol) as vfobx1,
SUM(e.vpesnet) as pnetox1,
SUM(e.vfobserdol) as vfob,
SUM(e.vpesnet) as pneto,
e.part_nandi as partioriginal,
e.part_nandi as parti_arancel,
substr(e.UBIGEO,1,2) AS ubigeo
FROM exportacion e
WHERE YEAR(e.fnum) ='$dato2' AND 
CONCAT(e.dcom,' ',e.dmer2,' ',e.dmer3,' ',e.dmer4,' ',e.DMER5) like '%$dato3%' AND
substr(e.UBIGEO,1,2) LIKE '%$dato1'
GROUP BY anio,e.part_nandi";
	 }
$repav = $conexpg -> prepare($sqlparti); 
$repav -> execute(); 
$dpos = $repav -> fetchAll(PDO::FETCH_OBJ); 
if($repav -> rowCount() > 0)   { 
foreach($dpos as $fila_parti) {
	$itte = $itte + 1;
		   $originalpartida= $fila_parti -> partioriginal;
		   $partida= $fila_parti -> parti_arancel;
		   $total_vfobxx= number_format($fila_parti -> vfobx1,2);
		   $total_pesoxx= number_format($fila_parti -> pnetox1,2);
			  
		   $totalx_vfob= $fila_parti -> vfob;
		   $totalx_peso= $fila_parti -> pneto;
			  if($total_peso == "0"){
				  $preciovfob="0.00";
				  }else{
				  $preciovfob= number_format($totalx_vfob/$totalx_peso,2);
			  }
		   $year = $fila_parti -> anio;
		   $codpartida = $fila_parti -> part_nandi;
	
	//consultanos descripcion de la partida en la tabla arancel
	//$pardes = "SELECT descripcion FROM arancel WHERE idarancel='$codpartida' ";
	$pardes = "SELECT descrip FROM arancel_part_nandina WHERE partida='$codpartida' ";
$rpav = $conexpg -> prepare($pardes); 
$rpav -> execute(); 
$djps = $rpav -> fetchAll(PDO::FETCH_OBJ); 
if($rpav -> rowCount() > 0)   { 
foreach($djps as $filapx) {
	$descri_partida = $filapx -> descrip;
}
}else{
	$descri_partida = "---";
}
	
	  ?>
							<tr>
								<td><?=$partida;?></td>
								<td width="80px"><?=$descri_partida;?></td>
								<td><?=$total_vfobxx;?></td>
								<td><?=$total_pesoxx;?></td>
								<td><?=$preciovfob;?></td>
								<td>
									<div class="dropdown">
									<button class="btn btn-rounded btn-outline btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown">Acci&oacute;n</button>
									<div class="dropdown-menu" style="background-color:#949494;">
									  <a class="dropdown-item" href="#"><i class="ti-search"></i> Ver Detalle</a>
									  <a class="dropdown-item" href="#"><i class="ti-search"></i> Ver Arancel</a>
									  <div class="dropdown-divider"></div>
									  <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modal-right<?=$itte;?>"><i class="ti-lock"></i> Más Opciones</a>
									</div>
								  </div>
								</td>
							</tr>
						
						<!-- Modal -->
  <div class="modal modal-right fade" id="modal-right<?=$itte;?>" tabindex="-1">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title">¿ Que deseas conocer más de este producto: <b><?=$descri_partida;?></b> ?</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
			<p>Partida: <b><?=$codpartida;?></b></p>
			<p><button type="button" class="waves-effect waves-light btn btn-warning mb-5 active">INDICADORES ANUALES</button>
			<button type="button" class="waves-effect waves-light btn btn-warning mb-5 active">INDICADORES MENSUALES</button>
			<button type="button" class="waves-effect waves-light btn btn-danger mb-5 active">ESTACIONALIDAD</button>
			<button type="button" class="waves-effect waves-light btn btn-success mb-5 active">MERCADOS</button>
			<button type="button" class="waves-effect waves-light btn btn-info mb-5 active">DEPARTAMENTOS</button>
			<button type="button" class="waves-effect waves-light btn btn-warning mb-5 active">EMPRESAS</button>
			<button type="button" class="waves-effect waves-light btn btn-danger mb-5 active">AGENTE DE ADUANAS</button>
			<button type="button" class="waves-effect waves-light btn btn-success mb-5 active">ADUANAS</button>
			<button type="button" class="waves-effect waves-light btn btn-info mb-5 active">PUERTOS DE INGRESO</button>
			<button type="button" class="waves-effect waves-light btn btn-primary mb-5 active">EVALIACI&Oacute;N DE MERCADOS</button></p>
		  </div>
		  <div class="modal-footer modal-footer-uniform">
			<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
		  </div>
		</div>
	  </div>
	</div>
  <!-- /.modal -->
							<?php
}
}else{
	?>
	<tr>
		<td colspan="6" align="center"><b>No Hay Datos</b></td>
	</tr>				
<?php
}
	?>
						</tbody>				  
						<tfoot>
							<tr>
								<th>Partida</th>
								<th>Descripción</th>
								<th>Valor Fob</th>
								<th>Peso Neto(Kg)</th>
								<th>Precio Fob</th>
								<th>Acciones</th>
							</tr>
						</tfoot>
					</table>
					</div>
</div>              
</div>

<?php
}
?>

<?php $conexpg = null;//cierra conexion  ?>

<script src="../assets/vendor_components/datatable/datatables.min.js"></script>
<!--<script src="js/pages/data-table.js"></script>-->

<script>
	$(document).ready(function () {
  $('#example').DataTable({
	  "order": [[ 0, "asc" ]],// columna 1
	  dom: 'Bfrtip',
		buttons: [
			'csv', 'excel'
		],
	  language: {
        "decimal":        "",
    "emptyTable":     "No hay datos",
    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
    "infoFiltered":   "(Filtro de _MAX_ total registros)",
    "infoPostFix":    "",
    "thousands":      ",",
    "lengthMenu":     "Mostrar _MENU_ registros",
    "loadingRecords": "Cargando...",
    "processing":     "Procesando...",
    "search":         "Buscar:",
    "zeroRecords":    "No se encontraron coincidencias",
    "paginate": {
        "first":      "Primero",
        "last":       "Ultimo",
        "next":       "Próximo",
        "previous":   "Anterior"
    },
    "aria": {
        "sortAscending":  ": Activar orden de columna ascendente",
        "sortDescending": ": Activar orden de columna desendente"
    }
      }
	  
  });
  $('.dataTables_length').addClass('bs-select');
});
	</script>

