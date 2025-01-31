<?php
include("../../conector/config.php");
set_time_limit(950);

date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");

$partida1 = trim($_POST["partidaadua"]);
$ubicod1 = trim($_POST["codubiadua"]);
$dato3 = trim($_POST["namedepadua"]);
$filtro = trim($_POST["unavariaadua"]);

if($filtro=="vfobserdol"){
					$nomfiltro ="Valor FOB USD";
				}else if($filtro=="vpesnet"){
					$nomfiltro ="Peso Neto (Kg)";
				}else{
					$nomfiltro ="Precio FOB USD x KG";
				}

if($ubicod1==""){
	$flatcod = "";
	$codi1 = "";
}else{
	$flatcod = $ubicod1;
	$codi1 = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}

$filtrofecha ="extract(year from exportacion.fnum)";
$ranfecha = "extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2022'";

if($filtro=="vfobserdol"){		
$sqlyear="SELECT 'vfobserdol' as VALOR,
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
FROM exportacion LEFT JOIN aduana ON exportacion.CADU = aduana.codadu where $ranfecha AND exportacion.part_nandi=".$partida1." $codi1 ";
	}
	if($filtro=="vpesnet"){
		$sqlyear="SELECT 'vfobserdol' as VALOR, 
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
FROM exportacion LEFT JOIN aduana ON exportacion.CADU = aduana.codadu where $ranfecha AND exportacion.part_nandi=".$partida1." $codi1 ";
				}
	if($filtro=="diferen"){
		$sqlyear="SELECT
'diferen' as diferen,
SUM(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS a2012,
SUM(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS a2012x,
SUM(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS a2013,
SUM(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS a2013x,
SUM(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS a2014,
SUM(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS a2014x,
SUM(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS a2015,
SUM(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS a2015x,
SUM(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS a2016,
SUM(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS a2016x,
SUM(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS a2017,
SUM(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS a2017x,
SUM(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS a2018,
SUM(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS a2018x,
SUM(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS a2019,
SUM(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019x,
SUM(CASE ".$filtrofecha." WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) AS a2020,
SUM(CASE ".$filtrofecha." WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS a2020x,
SUM(CASE ".$filtrofecha." WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) AS a2021,
SUM(CASE ".$filtrofecha." WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS a2021x,
SUM(CASE ".$filtrofecha." WHEN '2022' THEN exportacion.vfobserdol ELSE 0 END) AS a2022,
SUM(CASE ".$filtrofecha." WHEN '2022' THEN exportacion.vpesnet ELSE 0 END) AS a2022x
FROM exportacion LEFT JOIN aduana ON exportacion.CADU = aduana.codadu where $ranfecha AND exportacion.part_nandi=".$partida1." $codi1 ";
				}	
$result_year = $conexpg -> prepare($sqlyear); 
$result_year -> execute(); 
$ramps = $result_year -> fetchAll(PDO::FETCH_OBJ); 
if($result_year -> rowCount() > 0)   { 
foreach($ramps as $fila_year) {
			    $dife_precio= $fila_year -> diferen;
				$cuenta_unicos= $fila_year -> cuenta;
				$depart_x= $fila_year -> depart;
				
			if( $dife_precio=="diferen"){
				
				$dife_2012= $fila_year -> a2012;
		        $dife_2012x= $fila_year -> a2012x;
				if($dife_2012x=="0" or  $dife_2012x=="0.00"){
					$sumatotal2012= "0.00";
				}else{
					$sumatotal2012= $dife_2012 / $dife_2012x;
				}
				
				$dife_2013= $fila_year -> a2013;
		        $dife_2013x= $fila_year -> a2013x;
				if($dife_2013x=="0" or  $dife_2013x=="0.00"){
					$sumatotal2013= "0.00";
				}else{
					$sumatotal2013=  $dife_2013 / $dife_2013x;
				}
				
				$dife_2014= $fila_year -> a2014;
		        $dife_2014x= $fila_year -> a2014x;
				if($dife_2014x=="0" or  $dife_2014x=="0.00"){
					$sumatotal2014= "0.00";
				}else{
					$sumatotal2014= $dife_2014 / $dife_2014x;
				}
				
				$dife_2015= $fila_year -> a2015;
		        $dife_2015x= $fila_year -> a2015x;
				if($dife_2015x=="0" or  $dife_2015x=="0.00"){
					$sumatotal2015= "0.00";
				}else{
					$sumatotal2015= $dife_2015 / $dife_2015x;
				}
				
				$dife_2016= $fila_year -> a2016;
		        $dife_2016x= $fila_year -> a2016x;
				if($dife_2016x=="0" or  $dife_2016x=="0.00"){
					$sumatotal2016= "0.00";
				}else{
					$sumatotal2016= $dife_2016 / $dife_2016x;
				}
				
				$dife_2017= $fila_year -> a2017;
		        $dife_2017x= $fila_year -> a2017x;
				if($dife_2017x=="0" or  $dife_2017x=="0.00"){
					$sumatotal2017= "0.00";
				}else{
					$sumatotal2017= $dife_2017 / $dife_2017x;
				}
				
				$dife_2018= $fila_year -> a2018;
		        $dife_2018x= $fila_year -> a2018x;
				if($dife_2018x=="0" or  $dife_2018x=="0.00"){
					$sumatotal2018= "0.00";
				}else{
					$sumatotal2018= $dife_2018 / $dife_2018x;
				}
				
				$dife_2019= $fila_year -> a2019;
		        $dife_2019x= $fila_year -> a2019x;
				if($dife_2019x=="0" or  $dife_2019x=="0.00"){
					$sumatotal2019= "0.00";
				}else{
					$sumatotal2019= $dife_2019 / $dife_2019x;
				}
				
				$dife_2020= $fila_year -> a2020;
		        $dife_2020x= $fila_year -> a2020x;
				if($dife_2020x=="0" or  $dife_2020x=="0.00"){
					$sumatotal2020= "0.00";
				}else{
					$sumatotal2020= $dife_2020 / $dife_2020x;
				}
				
				$dife_2021= $fila_year -> a2021;
		        $dife_2021x= $fila_year -> a2021x;
				if($dife_2021x=="0" or  $dife_2021x=="0.00"){
					$sumatotal2021= "0.00";
				}else{
					$sumatotal2021= $dife_2021 / $dife_2021x;
				}
				
				$dife_2022= $fila_year -> a2022;
		        $dife_2022x= $fila_year -> a2022x;
				if($dife_2022x=="0" or  $dife_2022x=="0.00"){
					$sumatotal2022= "0.00";
				}else{
					$sumatotal2022= $dife_2022 / $dife_2022x;
				}
				
			}else if($cuenta_unicos=="cuenta"){
				   $sumc1 =  $fila_year -> a2012;
				   $sumc2 =  $fila_year -> a2013;
				   $sumc3 =  $fila_year -> a2014;
				   $sumc4 =  $fila_year -> a2015;
				   $sumc5 =  $fila_year -> a2016;
				   $sumc6 =  $fila_year -> a2017;
				   $sumc7 =  $fila_year -> a2018;
				   $sumc8 =  $fila_year -> a2019;
				$sumc9 =  $fila_year -> a2020;
				$sumc10 =  $fila_year -> a2021;
				$sumc11 =  $fila_year -> a2022;
				   $sumatotal2012= $sumc1 + $sumatotal2012;
				   $sumatotal2013= $sumc2 + $sumatotal2013;
				   $sumatotal2014= $sumc3 + $sumatotal2014;
				   $sumatotal2015= $sumc4 + $sumatotal2015;
				   $sumatotal2016= $sumc5 + $sumatotal2016;
				$sumatotal2017= $sumc6 + $sumatotal2017;
				$sumatotal2018= $sumc7 + $sumatotal2018;
				$sumatotal2019= $sumc8 + $sumatotal2019;
				$sumatotal2020= $sumc9 + $sumatotal2020;
				$sumatotal2021= $sumc10 + $sumatotal2021;
				$sumatotal2022= $sumc11 + $sumatotal2022;
			}else if($depart_x=='depart'){
				   $sumc1x =  $fila_year -> a2012;
				   $sumc2x =  $fila_year -> a2013;
				   $sumc3x =  $fila_year -> a2014;
				   $sumc4x =  $fila_year -> a2015;
				   $sumc5x =  $fila_year -> a2016;
				   $sumc6x =  $fila_year -> a2017;
				   $sumc7x =  $fila_year -> a2018;
				   $sumc8x =  $fila_year -> a2019;
				   $sumc9x =  $fila_year -> a2020;
				   $sumc10x =  $fila_year -> a2021;
				   $sumc11x =  $fila_year -> a2022;
				   $sumatotal2012= $sumc1x + $sumatotal2012;
				   $sumatotal2013= $sumc2x + $sumatotal2013;
				   $sumatotal2014= $sumc3x + $sumatotal2014;
				   $sumatotal2015= $sumc4x + $sumatotal2015;
				   $sumatotal2016= $sumc5x + $sumatotal2016;
				   $sumatotal2017= $sumc6x + $sumatotal2017;
				   $sumatotal2018= $sumc7x + $sumatotal2018;
				   $sumatotal2019= $sumc8x + $sumatotal2019;
				$sumatotal2020= $sumc9x + $sumatotal2020;
				$sumatotal2021= $sumc10x + $sumatotal2021;
				$sumatotal2022= $sumc11x + $sumatotal2022;
			}else{
		   $sumatotal2012= $fila_year -> a2012;
		   $sumatotal2013= $fila_year -> a2013;
		   $sumatotal2014= $fila_year -> a2014;
		   $sumatotal2015= $fila_year -> a2015;
		   $sumatotal2016= $fila_year -> a2016;
		   $sumatotal2017= $fila_year -> a2017;
		   $sumatotal2018= $fila_year -> a2018;
		   $sumatotal2019= $fila_year -> a2019;
				$sumatotal2020= $fila_year -> a2020;
				$sumatotal2021= $fila_year -> a2021;
				$sumatotal2022= $fila_year -> a2022;
			}
		   
		   if($sumatotal2020=='0' or $sumatotal2020=='' or $sumatotal2020==null){
			   $varitota='0.00';
		   }else{
		   $varitota= (($sumatotal2021 / $sumatotal2020) - 1) * 100;
		   }
		   
		   if($sumatotal2021=='0' and $sumatotal2021){
			   $parti='0.00 %';
		   }else{
		   $parti='100 %';
		   }
		   
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
				 /*generamos codigo aletorio*/				
	if($filtro=="vfobserdol"){			
   $query1 = "SELECT aduana.descripcion,
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
   FROM exportacion LEFT JOIN aduana ON exportacion.CADU = aduana.codadu where $ranfecha AND exportacion.part_nandi=".$partida1." $codi1 GROUP BY aduana.descripcion";
	}
				if($filtro=="vpesnet"){
					$query1 = "SELECT aduana.descripcion,
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
   FROM exportacion LEFT JOIN aduana ON exportacion.CADU = aduana.codadu where $ranfecha AND exportacion.part_nandi=".$partida1." $codi1 GROUP BY aduana.descripcion";
				}
				if($filtro=="diferen"){
					$query1 = "SELECT aduana.descripcion,
   SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN (exportacion.vfobserdol/exportacion.vpesnet) ELSE 0 END) AS a2012, 
   SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN (exportacion.vfobserdol/exportacion.vpesnet) ELSE 0 END) AS a2013, 
   SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN (exportacion.vfobserdol/exportacion.vpesnet) ELSE 0 END) AS a2014, 
   SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN (exportacion.vfobserdol/exportacion.vpesnet) ELSE 0 END) AS a2015, 
   SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN (exportacion.vfobserdol/exportacion.vpesnet) ELSE 0 END) AS a2016,
   SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN (exportacion.vfobserdol/exportacion.vpesnet) ELSE 0 END) AS a2017,
   SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN (exportacion.vfobserdol/exportacion.vpesnet) ELSE 0 END) AS a2018,
   SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN (exportacion.vfobserdol/exportacion.vpesnet) ELSE 0 END) AS a2019,
   SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN (exportacion.vfobserdol/exportacion.vpesnet) ELSE 0 END) AS a2020,
   SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN (exportacion.vfobserdol/exportacion.vpesnet) ELSE 0 END) AS a2021,
   SUM(CASE extract(year from exportacion.fnum) WHEN '2022' THEN (exportacion.vfobserdol/exportacion.vpesnet) ELSE 0 END) AS a2022
   FROM exportacion LEFT JOIN aduana ON exportacion.CADU = aduana.codadu where $ranfecha AND exportacion.part_nandi=".$partida1." $codi1 GROUP BY aduana.descripcion";
				}
?>

<div class="col-lg-12 col-12">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Reporte de Aduanas Exportadoras de Exportaciones</h4>
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
							  <th>Aduanas</th>
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
$resultado1 = $conexpg -> prepare($query1); 
$resultado1 -> execute(); 
$tops = $resultado1 -> fetchAll(PDO::FETCH_OBJ); 
if($resultado1 -> rowCount() > 0)   { 
foreach($tops as $fila1) {
		  $cuen = $cuen + 1;
		  $dife_deta= $fila1 -> diferen;  
		  $codi= $codi + 1;
		  $val1= $fila1 -> descripcion;
		  if($dife_deta=="diferen"){
			  
			    $dife2012= $fila1 -> a2012;
		        $dife2012x= $fila1 -> a2012x;
				if($dife2012x=="0" or  $dife2012x=="0.00"){
					$year3= "0.00";
				}else{
					$year3= $dife2012 / $dife2012x;
				}
				
				$dife2013= $fila1 -> a2013;
		        $dife2013x= $fila1 -> a2013x;
				if($dife2013x=="0" or  $dife2013x=="0.00"){
					$year4= "0.00";
				}else{
					$year4=$dife2013 / $dife2013x;
				}
				
				$dife2014= $fila1 -> a2014;
		        $dife2014x= $fila1 -> a2014x;
				if($dife2014x=="0" or  $dife2014x=="0.00"){
					$year5= "0.00";
				}else{
					$year5= $dife2014 / $dife2014x;
				}
				
				$dife2015= $fila1 -> a2015;
		        $dife2015x= $fila1 -> a2015x;
				if($dife2015x=="0" or  $dife2015x=="0.00"){
					$year6= "0.00";
				}else{
					$year6= $dife2015 / $dife2015x;
				}
				
				$dife2016= $fila1 -> a2016;
		        $dife2016x= $fila1 -> a2016x;
				if($dife2016x=="0" or  $dife2016x=="0.00"){
					$year7= "0.00";
				}else{
					$year7= $dife2016 / $dife2016x;
				}
			  
			  $dife2017= $fila1 -> a2017;
		      $dife2017x= $fila1 -> a2017x;
			  if($dife2017x=="0" or  $dife2017x=="0.00"){
					$year8= "0.00";
				}else{
					$year8= $dife2017 / $dife2017x;
				}
			  
			  $dife2018 = $fila1 -> a2018;
		      $dife2018x = $fila1 -> a2018x;
			  if($dife2018x == "0" or $dife2018x == "0.00"){
					$year9 = "0.00";
				}else{
					$year9 = $dife2018 / $dife2018x;
				}
			  
			  $dife2019 = $fila1 --> a2019;
		      $dife2019x = $fila1 -> a2019x;
			  if($dife2019x == "0" or $dife2019x == "0.00"){
					$year9 = "0.00";
				}else{
					$year9 = $dife2019 / $dife2019x;
				}
			  
			  $dife2020 = $fila1 -> a2020;
		      $dife2020x = $fila1 -> a2020x;
			  if($dife2020x == "0" or $dife2020x == "0.00"){
					$year10 = "0.00";
				}else{
					$year10 = $dife2020 / $dife2020x;
				}
			  
			  $dife2021 = $fila1 -> a2021;
		      $dife2021x = $fila1 -> a2021x;
			  if($dife2021x == "0" or $dife2021x == "0.00"){
					$year11 = "0.00";
				}else{
					$year11 = $dife2021 / $dife2021x;
				}
			  
			  $dife2022 = $fila1 -> a2022;
		      $dife2022x = $fila1 -> a2022x;
			  if($dife2022x == "0" or $dife2022x == "0.00"){
					$year12 = "0.00";
				}else{
					$year12 = $dife2022 / $dife2022x;
				}
				
		  }else{
		  $year3= $fila1 -> a2012;
		  $year4= $fila1 -> a2013;
		  $year5= $fila1 -> a2014;
		  $year6= $fila1 -> a2015;
		  $year7= $fila1 -> a2016;
		  $year8= $fila1 -> a2017;
		  $year9= $fila1 -> a2018;
		  $year10= $fila1 -> a2019;
			  $year11= $fila1 -> a2020;
			  $year12= $fila1 -> a2021;
			  $year13= $fila1 -> a2022;
		  }
		 
		 if($year11=='0'){
		  $var11 ='0';
		  }else{
		  $var11 = (($year12 / $year11) - 1) * 100;
		  }
		 
		 if($sumatotal2021=='0' or $sumatotal2021==""){
			  $var22="0.00";
		  }else{
		  //$var22 = number_format(($year11 / $sumatotal2020) * 100,2);
		  $var22 = ($year12 / $sumatotal2021) * 100;
		  }
		  
		  echo "<tr>";
echo "<td>*</td>";
echo "<td>$val1</td>";
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
echo "<td>".number_format($var11,2)."%</td>";
echo "<td>".number_format($var22,2)."%</td>";
 echo "</tr>";
	}
echo "<tr>";
		 echo "<th align='center'><b>#</b></th>";
	 echo "<th align='center'><b>Total:</b></th>";
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
			     echo "<th><b>$varitota%</b></th>";
			      echo "<th><b>$parti</b></th>";
		  echo "</tr>";
}
?>
						</tbody>				  
						<tfoot>
							<tr>
								<th>#</th>
							  <th>Aduanas</th>
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

