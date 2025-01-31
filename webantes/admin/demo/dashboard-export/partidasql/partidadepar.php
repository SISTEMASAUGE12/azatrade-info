<?php
include("../../conector/config.php");
set_time_limit(950);

date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");

$partida1 = trim($_POST["partidadepa"]);
$ubicod1 = trim($_POST["codubidepa"]);
$dato3 = trim($_POST["namedepadepa"]);
$filtro = trim($_POST["unavariadepa"]);

if($filtro=="vfobserdol"){
					$nomfiltro ="Valor FOB USD";
				}else if($filtro=="vpesnet"){
					$nomfiltro ="Peso Neto (Kg)";
				}else{
					$nomfiltro ="Precio FOB USD x KG";
				}

if($ubicod1==""){
	$flatcod = "";
	$varquery1 = "";
}else{
	$flatcod = $ubicod1;
	$varquery1 = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}

$ranfecha = "AND extract(YEAR from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2022'";

if($filtro=="vfobserdol"){
$query1 = "SELECT substring(exportacion.ubigeo,1,2) as ubi1, departamento.nombre, 
SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS a2012,
SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS a2013,
SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS a2014,
SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS a2015,
SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS a2016,
SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS a2017,
SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS a2018,
SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS a2019,
SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) AS a2020,
SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) AS a2021,
SUM(CASE extract(year from exportacion.fnum) WHEN '2022' THEN exportacion.vfobserdol ELSE 0 END) AS a2022
FROM exportacion LEFT JOIN departamento ON   ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE exportacion.part_nandi = ".$partida1." $varquery1 $ranfecha GROUP BY departamento.nombre ORDER BY nombre ASC";
}
if($filtro=="vpesnet"){
$query1 = "SELECT substring(exportacion.ubigeo,1,2) as ubi1, departamento.nombre, 
SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS a2012,
SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS a2013,
SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS a2014,
SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS a2015,
SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS a2016,
SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS a2017,
SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS a2018,
SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019,
SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS a2020,
SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS a2021,
SUM(CASE extract(year from exportacion.fnum) WHEN '2022' THEN exportacion.vpesnet ELSE 0 END) AS a2022
FROM exportacion LEFT JOIN departamento ON   ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE exportacion.part_nandi = ".$partida1." $varquery1 $ranfecha GROUP BY departamento.nombre ORDER BY nombre ASC";
}
if($filtro=="diferen"){
	$query1 = "SELECT substring(exportacion.ubigeo,1,2) as ubi1, departamento.nombre,
	SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS a2012,
SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS a2013,
SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS a2014,
SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS a2015,
SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS a2016,
SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS a2017,
SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS a2018,
SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019,
SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS a2020,
SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS a2021,
SUM(CASE extract(year from exportacion.fnum) WHEN '2022' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE extract(year from exportacion.fnum) WHEN '2022' THEN exportacion.vpesnet ELSE 0 END) AS a2022
	FROM exportacion LEFT JOIN departamento ON   ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE exportacion.part_nandi = ".$partida1." $varquery1 $ranfecha GROUP BY departamento.nombre ORDER BY nombre ASC";
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
	$sumatotal2022 = $sumatotal2022 + $fila_year -> a2022;
			   
		   
		   }
	if($sumatotal2021=='0.00' or $sumatotal2021=="0" or $sumatotal2021==""){
			   $varitota='0';
		   }else{
		   $varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
			   }
		   $parti='100 %';
		   if($sumatotal2020 =='0' or $sumatotal2020 ==""){
			  $tota6 ="0"; 
		   }else{
		   $tota6 =number_format((( $sumatotal2021 / $sumatotal2020) - 1) * 100,2);
			   }
		   $xx= $sumatotal2012 + $sumatotal2013 + $sumatotal2014 + $sumatotal2015 + $sumatotal2016 + $sumatotal2017 + $sumatotal2018 + $sumatotal2019 + $sumatotal2020 + $sumatotal2021;
	
		  $tota7 = $xx/10;
	      //$tota7 = number_format($xx / $sumatotal2020,2);
	
		  $tota8 = "100";
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
						  <h4 class="box-title">Reporte de Ubigeo Anual de Exportaciones</h4>
						</div>
							<div class="box-body">
								<div class="form-group">
								  <label class="form-label">Partida #: <?=$partida1;?> │ Departamento: <?=$dato3;?> │ Fecha Numeracion │ <?=$filtro;?> │ Periodo 2012 - 2022 </label>
								</div>

<div class="box-body">
<div class="table-responsive">
					  <!--<table id="example" class="table table-hover display nowrap margin-top-10 w-p100">-->
					  <table id="example" class="table table-hover display margin-top-10 w-p100">
						<thead>
							<tr>
							  <th>#</th>
							  <th>Países</th>
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
							  <th>Var.% Total</th>
							  <th>Par.%21</th>
							</tr>
						</thead>
						<tbody>
<?php		
$resultado_rpt = $conexpg -> prepare($query1); 
$resultado_rpt -> execute(); 
$pmns = $resultado_rpt -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_rpt -> rowCount() > 0)   { 
foreach($pmns as $fila_rpt) {
				  $cuen = $cuen +1;
		   $nombredesc= $fila_rpt -> nombre;
		  $mes1= $fila_rpt -> a2012;
		  $mes2= $fila_rpt -> a2013;
		  $mes3= $fila_rpt -> a2014;
		  $mes4= $fila_rpt -> a2015;
		  $mes5= $fila_rpt -> a2016;
		  $mes6= $fila_rpt -> a2017;
		  $mes7= $fila_rpt -> a2018;
		  $mes8= $fila_rpt -> a2019;
				  $mes9= $fila_rpt -> a2020;
				  $mes10= $fila_rpt -> a2021;
	$mes11= $fila_rpt -> a2022;
		  
		  if($mes9=='0' or $mes9 == isnull or $mes9 ==''){
		  $var11 ='0';
		  }else{
		  $var11 = number_format((($mes10 / $mes9) - 1) * 100,2);
		  }
		  if($mes1=='0' or $mes1 == isnull or $mes1 ==''){
			  $ca1 ='0';
		  }else{
		  $ca1 = (($mes2 / $mes1) - 1) * 100;
		  }
		  if($mes2=='0' or $mes2 == isnull or $mes2 ==''){
			  $ca2 ='0';
		  }else{
		  $ca2 = (($mes3 / $mes2) - 1) * 100;
		  }
		  if($mes3=='0' or $mes3 == isnull or $mes3 ==''){
			  $ca3 ='0';
		  }else{
		  $ca3 = (($mes4 / $mes3) - 1) * 100;
		  }
		  if($mes4=='0' or $mes4 == isnull or $mes4 ==''){
			  $ca4 ='0';
		  }else{
		  $ca4 = (($mes5 / $mes4) - 1) * 100;
		  }
		  if($mes5=='0' or $mes5 == isnull or $mes5 ==''){
			  $ca5 ='0';
		  }else{
		  $ca5 = (($mes6 / $mes5) - 1) * 100;
		  }
		  if($mes6=='0' or $mes6 == isnull or $mes6 ==''){
			  $ca6 ='0';
		  }else{
		  $ca6 = (($mes7 / $mes6) - 1) * 100;
		  }
		  if($mes7=='0' or $mes7 == isnull or $mes7 ==''){
			  $ca7 ='0';
		  }else{
		  $ca7 = (($mes8 / $mes7) - 1) * 100;
		  }
				  if($mes8=='0' or $mes8 == isnull or $mes8 ==''){
			  $ca8 ='0';
		  }else{
		  $ca8 = (($mes9 / $mes8) - 1) * 100;
		  }
				  
				  if($mes9=='0' or $mes9 == isnull or $mes9 ==''){
			  $ca9 ='0';
		  }else{
		  $ca9 = (($mes10 / $mes9) - 1) * 100;
		  }
	
	if($mes10=='0' or $mes10 == isnull or $mes10 ==''){
			  $ca10 ='0';
		  }else{
		  $ca10 = (($mes11 / $mes10) - 1) * 100;
		  }
		  
		  $ca12 = $ca1 + $ca2 + $ca3 + $ca4 + $ca5 + $ca6 + $ca7 + $ca8 + $ca9 + $ca10 ;
		  //$var22 = number_format($ca12 / $ca8,2);
		  $var22 = number_format($ca12 / 10,2);
				  
				  
		  if($mes10=='0' or $mes10==''){
		  $parti15="0";
		  }else{
		  $parti15=number_format(($mes10 / $sumatotal2021) * 100,2);
			  }
		  
		  echo "<tr>";
echo"<td>$cuen</td>";
echo "<td>$nombredesc</td>";
echo "<td>".number_format($mes1,2)."</td>";
echo "<td>".number_format($mes2,2)."</td>";
echo "<td>".number_format($mes3,2)."</td>";
echo "<td>".number_format($mes4,2)."</td>";
echo "<td>".number_format($mes5,2)."</td>";
echo "<td>".number_format($mes6,2)."</td>";
echo "<td>".number_format($mes7,2)."</td>";
echo "<td>".number_format($mes8,2)."</td>";
echo "<td>".number_format($mes9,2)."</td>";
echo "<td>".number_format($mes10,2)."</td>";
echo "<td>".number_format($mes11,2)."</td>";
echo "<td>$var11%</td>";
echo "<td>$var22%</td>";
echo "<td>$parti15%</td>";
echo "</tr>";
	}
echo "<tr>";
         echo"<td></td>";
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
			 echo "<th><b>$tota6%</b></th>";
			 echo "<th><b>$tota7%</b></th>";
			 echo "<th><b>".number_format($tota8,2)."%</b></th>";
		  echo "</tr>";
}
?>
						</tbody>				  
						<tfoot>
							<tr>
								<th>#</th>
							   <th>Países</th>
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
							  <th>Var.% Total</th>
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

