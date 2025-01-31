<?php
include("../../conector/config.php");
set_time_limit(950);

date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");

$partida1 = trim($_POST["partidamerca"]);
$ubicod1 = trim($_POST["codubimerca"]);
$dato3 = trim($_POST["namedepamerca"]);
$filtro = trim($_POST["unavaria"]);

if($filtro=="vfobserdol"){
					$nomfiltro ="Valor FOB USD";
				}else if($filtro=="vpesnet"){
					$nomfiltro ="Peso Neto (Kg)";
				}else{
					$nomfiltro ="Precio FOB USD x KG";
				}

if($ubicod1==""){
	$flatcod = "";
	$query1var = "";
}else{
	$flatcod = $ubicod1;
	$query1var = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}

$ranfecha = "AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2022'";

if($filtro=="vfobserdol"){
$query1 = "SELECT exportacion.cpaides, paises.espanol,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END ) as a2012,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END ) as a2013,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END ) as a2014,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END ) as a2015,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END ) as a2016,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END ) as a2017,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END ) as a2018,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END ) as a2019,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END ) as a2020,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END ) as a2021,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2022' THEN exportacion.vfobserdol ELSE 0 END ) as a2022
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $query1var $ranfecha GROUP BY exportacion.cpaides,paises.espanol ORDER BY a2022 DESC";
}
if($filtro=="vpesnet"){
	$query1 = "SELECT exportacion.cpaides, paises.espanol,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END ) as a2012,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END ) as a2013,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END ) as a2014,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END ) as a2015,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END ) as a2016,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END ) as a2017,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END ) as a2018,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END ) as a2019,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END ) as a2020,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END ) as a2021,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2022' THEN exportacion.vpesnet ELSE 0 END ) as a2022
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $query1var $ranfecha GROUP BY exportacion.cpaides,paises.espanol ORDER BY a2022 DESC";
}
if($filtro=="diferen"){
	$query1 = " SELECT exportacion.cpaides, paises.espanol,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END ) as a2012,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END ) as a2013,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END ) as a2014,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END ) as a2015,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END ) as a2016,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END ) as a2017,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END ) as a2018,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END ) as a2019,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END ) as a2020,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END ) as a2021,
sum(CASE extract(YEAR from exportacion.fnum) WHEN '2022' THEN exportacion.vfobserdol ELSE 0 END ) / sum(CASE extract(YEAR from exportacion.fnum) WHEN '2022' THEN exportacion.vpesnet ELSE 0 END ) as a2022
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $query1var $ranfecha GROUP BY exportacion.cpaides,paises.espanol ORDER BY a2022 DESC";
}
				
				/*$resultado1=$conexpg->query($query1); 
if($resultado1->num_rows>0){ 
while($fila1=$resultado1->fetch_array()){
		  $val1= $fila1['fano'];
		  $val2= $fila1['cpaides'];
		  $val3= $fila1['resultado'];
		 
		 
		  if($val1=='2012'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2012='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		  if($val1=='2013'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2013='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		  if($val1=='2014'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2014='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		  if($val1=='2015'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2015='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		  if($val1=='2016'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2016='".$val3."' WHERE codigo='$val2' "; 
$rs = $conexpg->query($insert1);
		 }
		 if($val1=='2017'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2017='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
	     if($val1=='2018'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2018='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
			  if($val1=='2019'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2019='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
	if($val1=='2020'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2020='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
	if($val1=='2021'){
  $insert1 = "UPDATE ".$mon_tmp." SET a2021='".$val3."' WHERE codigo='$val2' "; 
 $rs = $conexpg->query($insert1);
		 }
		 
		 
		  }
	if($filtro=="diferen"){//precio suma totales por año
	$preciosqlxx = "SELECT exportacion.fano, sum(exportacion.vfobserdol)/sum(exportacion.vpesnet) AS resultado  FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises  WHERE exportacion.part_nandi = ".$partida1." $query1var AND  extract(year from exportacion.fnum) >= '2012' AND  extract(year from exportacion.fnum) <= '2021'  GROUP BY exportacion.fano  ORDER BY exportacion.fano ASC";
	$rsqlprexx=$conexpg->query($preciosqlxx); 
if($rsqlprexx->num_rows>0){ 
while($rwpreci=$rsqlprexx->fetch_array()){
          $pret1= $rwpreci['fano'];
		  $pret2= $rwpreci['resultado'];
	if($pret1=='2012'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2012='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2013'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2013='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2014'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2014='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2015'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2015='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2016'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2016='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2017'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2017='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2018'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2018='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2019'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2019='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2020'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2020='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }
	if($pret1=='2021'){
  $instotpre = "UPDATE ".$mon_tmp." SET a2021='".$pret2."' WHERE codigo='dife' "; 
 $tprs = $conexpg->query($instotpre);
		 }

}
}else{ }
}
	
	  }else{
		  
		   echo"<center><h4><font color='#EC0D36'>No hay Resultados<br>El Numero de Partida $nombres o seleccion $combo Incorrectos</font></h4></center>";
			 		  
	 $delete1 = mysqli_query($conexpg, "DROP TABLE ".$mon_tmp.";");
  if (!$delete1) {
    echo "Query: Un error ha ocurido al Eliminar la Tabla Temporal";
  }else{
	  
  }
  
}*/

/*
	  if($filtro=="diferen"){//precio suma totales por año
		$capta ="WHERE codigo='dife' ";
	}else{ $capta ="";}
*/
	  /* $sqlyear="SELECT
Sum(".$mon_tmp.".a2012) AS a2012,
Sum(".$mon_tmp.".a2013) AS a2013,
Sum(".$mon_tmp.".a2014) AS a2014,
Sum(".$mon_tmp.".a2015) AS a2015,
Sum(".$mon_tmp.".a2016) AS a2016,
Sum(".$mon_tmp.".a2017) AS a2017,
Sum(".$mon_tmp.".a2018) AS a2018,
Sum(".$mon_tmp.".a2019) AS a2019,
Sum(".$mon_tmp.".a2020) AS a2020,
Sum(".$mon_tmp.".a2020) AS a2021
FROM ".$mon_tmp." $capta ";*/
	
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
			   
		   if($sumatotal2020=='0.00'){
			   $varitota='0';
		   }else{
		   $varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
			   }
		   $parti='100 %';
	
		   if($sumatotal2020=='0' or $sumatotal2020==""){
			  $tota6 ="0"; 
		   }else{
		   $tota6 =number_format((( $sumatotal2021 / $sumatotal2020) - 1) * 100,2);
			   }
	
		   $xx=$sumatotal2012 + $sumatotal2013 + $sumatotal2014 + $sumatotal2015 + $sumatotal2016 + $sumatotal2017 + $sumatotal2018 + $sumatotal2019 + $sumatotal2020 + $sumatotal2021;
		  //$tota7 = number_format($xx / 9,2);
	if($sumatotal2021=="0" or $sumatotal2021==""){
		$tota7 = "0";
	}else{
	      $tota7 = number_format($xx / $sumatotal2021,2);
	}
	
		  $tota8 = "100.00";
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
						  <h4 class="box-title">Reporte Anual de Mercado de Destino para las Exportaciones</h4>
						</div>
							<div class="box-body">
								<div class="form-group">
								  <label class="form-label">Partida #: <?=$partida1;?> │ Departamento: <?=$dato3;?> │ Fecha Numeración │ <?=$nomfiltro;?> │ Periodo 2012 - 2022 </label>
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
$yyts = $resultado_rpt -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_rpt -> rowCount() > 0)   { 
foreach($yyts as $fila_rpt) {
	      $cuen = $cuen + 1;
		  $nombredesc= $fila_rpt -> espanol;
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
		  
		  
		  if($year3=='0' or $year3==''){
			  $ca3 ='0';
		  }else{
		  $ca3 = (($year4 / $year3) - 1) * 100;
		  }
		  if($year4=='0' or $year4==''){
			  $ca4 ='0';
		  }else{
		  $ca4 = (($year5 / $year4) - 1) * 100;
		  }
		  if($year5=='0' or $year5==''){
			  $ca5 ='0';
		  }else{
		  $ca5 = (($year6 / $year5) - 1) * 100;
		  }
		  if($year6=='0' or $year6==''){
			  $ca6 ='0';
		  }else{
		  $ca6 = (($year7 / $year6) - 1) * 100;
		  }
		  if($year7=='0' or $year7==''){
			  $ca7 ='0';
		  }else{
		  $ca7 = (($year8 / $year7) - 1) * 100;
		  }
		  if($year8=='0' or $year8==''){
			  $ca8 ='0';
		  }else{
		  $ca8 = (($year9 / $year8) - 1) * 100;
		  }
			  if($year9=='0' or $year9==''){
			  $ca9 ='0';
		  }else{
		  $ca9 = (($year10 / $year9) - 1) * 100;
		  }
				  if($year10=='0' or $year10==''){
			  $ca10 ='0';
		  }else{
		  $ca10 = (($year11 / $year10) - 1) * 100;
		  }
				  if($year11=='0' or $year11==''){
			  $ca11 ='0';
		  }else{
		  $ca11 = (($year12 / $year11) - 1) * 100;
		  }
	
	if($year12=='0' or $year12==''){
			  $ca12 ='0';
		  }else{
		  $ca12 = (($year13 / $year12) - 1) * 100;
		  }
	
		  $catot = $ca3 + $ca4 + $ca5 + $ca6 + $ca7 + $ca8 + $ca9 + $ca10 + $ca11 + $ca12;
				  if($catot!="0" and $ca11!="0"){
		  $var22 = number_format($catot / CURL_HTTP_VERSION_1_0,2);
		  //$var22 = number_format($catot / $ca10,2);
					  }else{
					 $var22 = "0.00"; 
				  }
		  if($year12=="0" or $year12==""){
			  $var33= "0";
		  }else{
		  $var33= number_format(($year12 / $sumatotal2021)*100,2);
		  }
		  
		  echo "<tr>";
echo"<td>$cuen</td>";
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
echo "<td>$var33%</td>";
 echo "</tr>";
	}
	 echo "<tr>";
		  echo "<th></th>";
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
			 echo "<th><b>$tota8</b></th>";
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

