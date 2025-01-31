<?php
include("../../conector/config.php");
set_time_limit(950);

date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");

$partida1 = trim($_POST["partidaesta"]);
$ubicod1 = trim($_POST["codubiesta"]);
$dato3 = trim($_POST["namedepaesta"]);
$indica = trim($_POST["unavariaestaci"]);

if($indica=="vfobserdol"){
	 $combo = "Valor FOB USD";
 }else if($indica=="vpesnet"){
	  $combo = "Peso Neto (Kg)";
 }else if($indica=="diferen"){
	  $combo = "Precio FOB USD x KG";
 }else if($indica=="vpesbru"){
	  $combo = "Peso Bruto (Kg)";
 }else if($indica=="qunifis"){
	  $combo = "Cantidad Exportada";
 }else if($indica=="qunicom"){
	  $combo = "Unidades Comerciales";
 }else if($indica=="part_nandi"){
	  $combo = "Cantidad de Partidas";
}else if($indica=="total"){
	  $combo = "Cantidad de Registros";
 }else if($indica=="ndcl"){
	  $combo = "Cantidad de Duas";
 }else if($indica=="cantemp"){
	  $combo = "Cantidad de Empresas";
 }else if($indica=="cantmerca"){
	  $combo = "Cantidad de Mercados";
 }else if($indica=="cpuedes"){
	  $combo = "Cantidad de Puertos";
 }else if($indica=="cadu"){
	  $combo = "Cantidad de Aduanas";
 }else if($indica=="depa"){
	  $combo = "Cantidad de Departamentos";
 }else if($indica=="provi"){
	  $combo = "Cantidad de Provincias";
 }else if($indica=="distri"){
	  $combo = "Cantidad de Distritos";
 }else if($indica=="cage"){
	  $combo = "Cantidad de Agentes";
 }else if($indica=="cviatra"){
	  $combo = "Cantidad de vias de Transporte";
 }

if($ubicod1==""){
	$flatcod = "";
	$query1var = "";
}else{
	$flatcod = $ubicod1;
	$query1var = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}

$ranfecha = "AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2022'";

if($indica=="vfobserdol"){
  $query1 = "SELECT extract(MONTH from exportacion.fnum) as mes,
(case extract(MONTH from exportacion.fnum)
		when '1' then 'Enero' 
		when '2' then 'Febrero' 
		when '3' then 'Marzo' 
		when '4' then 'Abril' 
		when '5' then 'Mayo'
		when '6' then 'Junio'
		when '7' then 'Julio'
		when '8' then 'Agosto'
		when '9' then 'Septiembre'
		when '10' then 'Octubre'
		when '11' then 'Noviembre'
		when '12' then 'Diciembre' 
	else '-' end) as txtmes,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END ) AS a2012,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END ) AS a2013,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END ) AS a2014,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END ) AS a2015,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END ) AS a2016,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END ) AS a2017,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END ) AS a2018,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END ) AS a2019,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END ) AS a2020,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END ) AS a2021,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2022' THEN exportacion.vfobserdol ELSE 0 END ) AS a2022
FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $query1var $ranfecha GROUP BY mes ORDER BY mes";
					}
				if($indica=="vpesnet"){
  $query1 = "SELECT extract(MONTH from exportacion.fnum) as mes,
(case extract(MONTH from exportacion.fnum)
		when '1' then 'Enero' 
		when '2' then 'Febrero' 
		when '3' then 'Marzo' 
		when '4' then 'Abril' 
		when '5' then 'Mayo'
		when '6' then 'Junio'
		when '7' then 'Julio'
		when '8' then 'Agosto'
		when '9' then 'Septiembre'
		when '10' then 'Octubre'
		when '11' then 'Noviembre'
		when '12' then 'Diciembre' 
	else '-' end) as txtmes,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END ) AS a2012,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END ) AS a2013,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END ) AS a2014,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END ) AS a2015,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END ) AS a2016,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END ) AS a2017,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END ) AS a2018,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END ) AS a2019,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END ) AS a2020,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END ) AS a2021,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2022' THEN exportacion.vpesnet ELSE 0 END ) AS a2022
FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $query1var $ranfecha GROUP BY mes ORDER BY mes";
					}
				if($indica=="diferen"){
  $query1 = "SELECT extract(MONTH from exportacion.fnum) as mes,
(case extract(MONTH from exportacion.fnum)
		when '1' then 'Enero' 
		when '2' then 'Febrero' 
		when '3' then 'Marzo' 
		when '4' then 'Abril' 
		when '5' then 'Mayo'
		when '6' then 'Junio'
		when '7' then 'Julio'
		when '8' then 'Agosto'
		when '9' then 'Septiembre'
		when '10' then 'Octubre'
		when '11' then 'Noviembre'
		when '12' then 'Diciembre' 
	else '-' end) as txtmes,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END ) AS a2012,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END ) AS a2013,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END ) AS a2014,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END ) AS a2015,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END ) AS a2016,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END ) AS a2017,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END ) AS a2018,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END ) AS a2019,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END ) AS a2020,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END ) AS a2021,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2022' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2022' THEN exportacion.vpesnet ELSE 0 END ) AS a2022
FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $query1var $ranfecha GROUP BY mes ORDER BY mes";
					}
				if($indica=="cantemp"){
  $query1 = "SELECT extract(MONTH from exportacion.fnum) as mes,
(case extract(MONTH from exportacion.fnum)
		when '1' then 'Enero' 
		when '2' then 'Febrero' 
		when '3' then 'Marzo' 
		when '4' then 'Abril' 
		when '5' then 'Mayo'
		when '6' then 'Junio'
		when '7' then 'Julio'
		when '8' then 'Agosto'
		when '9' then 'Septiembre'
		when '10' then 'Octubre'
		when '11' then 'Noviembre'
		when '12' then 'Diciembre' 
	else '-' end) as txtmes,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.ndoc ELSE 0 END )) AS a2012,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.ndoc ELSE 0 END )) AS a2013,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.ndoc ELSE 0 END )) AS a2014,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.ndoc ELSE 0 END )) AS a2015,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.ndoc ELSE 0 END )) AS a2016,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.ndoc ELSE 0 END )) AS a2017,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.ndoc ELSE 0 END )) AS a2018,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.ndoc ELSE 0 END )) AS a2019,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.ndoc ELSE 0 END )) AS a2020,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.ndoc ELSE 0 END )) AS a2021,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2022' THEN exportacion.ndoc ELSE 0 END )) AS a2022
FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $query1var $ranfecha GROUP BY mes ORDER BY mes";
					}
				if($indica=="cantmerca"){
  $query1 = "SELECT extract(MONTH from exportacion.fnum) as mes,
(case extract(MONTH from exportacion.fnum)
		when '1' then 'Enero' 
		when '2' then 'Febrero' 
		when '3' then 'Marzo' 
		when '4' then 'Abril' 
		when '5' then 'Mayo'
		when '6' then 'Junio'
		when '7' then 'Julio'
		when '8' then 'Agosto'
		when '9' then 'Septiembre'
		when '10' then 'Octubre'
		when '11' then 'Noviembre'
		when '12' then 'Diciembre' 
	else '-' end) as txtmes,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.cpaides ELSE 0 END )) AS a2012,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.cpaides ELSE 0 END )) AS a2013,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.cpaides ELSE 0 END )) AS a2014,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.cpaides ELSE 0 END )) AS a2015,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.cpaides ELSE 0 END )) AS a2016,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.cpaides ELSE 0 END )) AS a2017,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.cpaides ELSE 0 END )) AS a2018,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.cpaides ELSE 0 END )) AS a2019,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.cpaides ELSE 0 END )) AS a2020,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.cpaides ELSE 0 END )) AS a2021,
count(DISTINCT (CASE extract(YEAR from exportacion.fnum) WHEN '2022' THEN exportacion.cpaides ELSE 0 END )) AS a2022
FROM exportacion WHERE exportacion.part_nandi = ".$partida1." $query1var $ranfecha GROUP BY mes ORDER BY mes";
					}	
$result_year = $conexpg -> prepare($query1); 
$result_year -> execute(); 
$prts = $result_year -> fetchAll(PDO::FETCH_OBJ); 
if($result_year -> rowCount() > 0)   { 
foreach($prts as $fila_year) {
		   $sumatotal2012= $sumatotal2012 + $fila_year -> a2012;
		   $sumatotal2013= $sumatotal2013 + $fila_year -> a2013;
		   $sumatotal2014= $sumatotal2014 + $fila_year -> a2014;
		   $sumatotal2015= $sumatotal2015 + $fila_year -> a2015;
		   $sumatotal2016= $sumatotal2016 + $fila_year -> a2016;
		   $sumatotal2017= $sumatotal2017 + $fila_year -> a2017;
		   $sumatotal2018= $sumatotal2018 + $fila_year -> a2018;
		   $sumatotal2019= $sumatotal2019 + $fila_year -> a2019;
	       $sumatotal2020= $sumatotal2020 + $fila_year -> a2020;
	       $sumatotal2021= $sumatotal2021 + $fila_year -> a2021;
	$sumatotal2022= $sumatotal2022 + $fila_year -> a2022;
			   
			   if($sumatotal2020=='0'){
				   $varitota="0";
			   }else{
		   $varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
				   }
		   $parti='100 %';
		   }
	  }else{
		  $sumatotal2012="0";
		  $sumatotal2013="0";
		  $sumatotal2014="0";
		  $sumatotal2015="0";
		  $sumatotal2016="0";
		  $sumatotal2017="0";
		  $sumatotal2018="0";
		  $sumatotal2019="0";
	$sumatotal2020="0";
	$sumatotal2021="0";
	$sumatotal2022="0";
		  $varitota="0.00";
		  $parti="0.00";
	  }
?>

<div class="col-lg-12 col-12">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Reporte Evoluci&oacute;n Mensual de Exportaciones</h4>
						</div>
							<div class="box-body">
								<div class="form-group">
								  <label class="form-label">Partida #: <?=$partida1;?> │ Departamento: <?=$dato3;?> │ Fecha Numeracion │ <?=$combo;?> │ Periodo 2012 - 2022 </label>
								</div>

<div class="box-body">
<div class="table-responsive">
					  <!--<table id="example" class="table table-hover display nowrap margin-top-10 w-p100">-->
					  <table id="example" class="table table-hover display margin-top-10 w-p100">
						<thead>
							<tr>
							  <th>#</th>
							  <th>Mes</th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>2020</th>
							  <th>2021</th>
							  <th>2022</th>
							  <th>Var.%21/20</th>
							  <th>Par.%21</th>
							</tr>
						</thead>
						<tbody>
<?php
$resultado_rpt = $conexpg -> prepare($query1); 
$resultado_rpt -> execute(); 
$wots = $resultado_rpt -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_rpt -> rowCount() > 0)   { 
foreach($wots as $fila_rpt) {
	$itecod = $itecod + 1; 
		  $ft = $fila_rpt -> mes;
		  $nombredesc= $fila_rpt -> txtmes;
		  $year3= $fila_rpt -> a2012;
		  $year4= $fila_rpt -> a2013;
		  $year5= $fila_rpt -> a2014;
		  $year6= $fila_rpt -> a2015;
		  $year7= $fila_rpt -> a2016;
		  $year8= $fila_rpt -> a2017;
		  $year9= $fila_rpt -> a2018;
			  $year10= $fila_rpt -> a2019;
				  $year11= $fila_rpt -> a2020;
				  $year12= $fila_rpt -> a2021;
	$year13= $fila_rpt -> a2022;
		  
		  if($year11=='0' or $year11==''){
		  $var11 ='0';
		  }else{
		  $var11 = number_format((($year12 / $year11) - 1) * 100,2);
		  }
		if($sumatotal2021=='0' or $sumatotal2021 == '0.00' or $sumatotal2021 == ''){
			$var22 = "0.00";
		  }else{
			$var22 = number_format(($year12 / $sumatotal2021) * 100,2);
		}
		  echo "<tr>";
echo "<td>$itecod</td>";
echo "<td>$nombredesc</td>";
echo "<td>".number_format($year3,2)."</td>";
echo "<td>".number_format($year4,2)."</td>";
echo "<td>".number_format($year5,2)."</td>";
echo "<td>".number_format($year6,2)."</td>";
echo "<td>".number_format($year7,2)."</td>";
echo "<td>".number_format($year8,2)."</td>";
echo "<td>".number_format($year9,2)."</td>";
echo "<td>".number_format($year10,2)."</td>";
				  echo "<td>".number_format($year11,2)."</td>";
				  echo "<td>".number_format($year12,2)."</td>";
	echo "<td>".number_format($year13,2)."</td>";
echo "<td>$var11%</td>";
echo "<td>$var22%</td>";
 echo "</tr>";
}
echo "<tr>";
		  echo "<th>&nbsp;</th>";
		  echo "<th><b>Total</b></th>";
		   echo "<th><b>".number_format($sumatotal2012,2)."</b></th>";
		   echo "<th><b>".number_format($sumatotal2013,2)."</b></th>";
		    echo "<th><b>".number_format($sumatotal2014,2)."</b></th>";
			 echo "<th><b>".number_format($sumatotal2015,2)."</b></th>";
			  echo "<th><b>".number_format($sumatotal2016,2)."</b></th>";
			   echo "<th><b>".number_format($sumatotal2017,2)."</b></th>";
		        echo "<th><b>".number_format($sumatotal2018,2)."</b></th>";
		  echo "<th><b>".number_format($sumatotal2019,2)."</b></th>";
	echo "<th><b>".number_format($sumatotal2020,2)."</b></th>";
	echo "<th><b>".number_format($sumatotal2021,2)."</b></th>";
	echo "<th><b>".number_format($sumatotal2022,2)."</b></th>";
			  echo "<th><b>$varitota %</b></th>";
			  echo "<th><b>$parti</b></th>";
		  echo "</tr>";
}
?>
						</tbody>				  
						<tfoot>
							<tr>
								<th>#</th>
							  <th>Mes</th>
                              <th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>
							  <th>2020</th>
							  <th>2021</th>
							  <th>2022</th>
							  <th>Var.%21/20</th>
							  <th>Par.%21</th>
							</tr>
						</tfoot>
					</table>
					</div>
</div>              


							</div> 
					  </div>			
				</div> 

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
	  "pagingType": "full_numbers",
        "lengthMenu": [
            [15, 25, 50, -1],
            [15, 25, 50, "Todos"]
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

