<?php
include("../../conector/config.php");
ini_set("memory_limit", "150M");
set_time_limit(750);

date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");

$partida1 = trim($_POST["partidaevmer"]);
$ubicod1 = trim($_POST["codubievmer"]);
$dato3 = trim($_POST["namedepaevmer"]);
$filtro = trim($_POST["unavariaevamer"]);
$describus = trim($_POST["describus"]);

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

if($describus==""){
	$palabrabus = "";
}else{
	$palabrabus = "AND CONCAT(exportacion.dcom,exportacion.dmer2,exportacion.dmer3,exportacion.dmer4,exportacion.DMER5) LIKE '%$describus%'";
}

$ranfecha = "AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2022'";
	
$query1 = "SELECT exportacion.cpaides, paises.espanol, 
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
SUM(CASE extract(year from exportacion.fnum) WHEN '2022' THEN exportacion.vfobserdol ELSE 0 END) AS a2022,
SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS p2012,
SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS p2013,
SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS p2014,
SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS p2015,
SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS p2016,
SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS p2017,
SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS p2018,
SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS p2019,
SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS p2020,
SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS p2021,
SUM(CASE extract(year from exportacion.fnum) WHEN '2022' THEN exportacion.vpesnet ELSE 0 END) AS p2022,
sum(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS c2012,
sum(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS c2013,
sum(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS c2014,
sum(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS c2015,
sum(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS c2016,
sum(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS c2017,
sum(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS c2018,
sum(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS c2019,
sum(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS c2020,
sum(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS c2021,
sum(CASE extract(year from exportacion.fnum) WHEN '2022' THEN exportacion.vfobserdol ELSE 0 END)  / sum(CASE extract(year from exportacion.fnum) WHEN '2022' THEN exportacion.vpesnet ELSE 0 END) AS c2022,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.dnombre ELSE 0 END)) AS e2012,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.dnombre ELSE 0 END)) AS e2013,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.dnombre ELSE 0 END)) AS e2014,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.dnombre ELSE 0 END)) AS e2015,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.dnombre ELSE 0 END)) AS e2016,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.dnombre ELSE 0 END)) AS e2017,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.dnombre ELSE 0 END)) AS e2018,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.dnombre ELSE 0 END)) AS e2019,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.dnombre ELSE 0 END)) AS e2020,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.dnombre ELSE 0 END)) AS e2021,
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2022' THEN exportacion.dnombre ELSE 0 END)) AS e2022
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $sqlconsu $ranfecha $palabrabus GROUP BY exportacion.cpaides,paises.espanol ORDER BY a2021 DESC";

$queemp = "SELECT 
count(DISTINCT(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.dnombre ELSE 0 END)) AS e2021
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises WHERE exportacion.part_nandi = ".$partida1." $sqlconsu AND extract(year from exportacion.fnum) = '2021' $palabrabus ";		
$resultempt = $conexpg -> prepare($queemp); 
$resultempt -> execute(); 
$eeps = $resultempt -> fetchAll(PDO::FETCH_OBJ); 
if($resultempt -> rowCount() > 0)   { 
foreach($eeps as $filaempt) {
		   $sumtoe2020 = $filaempt -> e2021;
		
	}
}else{
	$sumtoe2020 = "0";
}
	
$result_year = $conexpg -> prepare($query1); 
$result_year -> execute(); 
$ramps = $result_year -> fetchAll(PDO::FETCH_OBJ); 
if($result_year -> rowCount() > 0)   { 
foreach($ramps as $fila_year) {
		   $sumtot2012= $fila_year -> a2012;
		   $sumtot2013= $fila_year -> a2013;
		   $sumtot2014= $fila_year -> a2014;
		   $sumtot2015= $fila_year -> a2015;
		   $sumtot2016= $fila_year -> a2016;
		   $sumtot2017= $fila_year -> a2017;
		   $sumtot2018= $fila_year -> a2018;
		   $sumtot2019= $fila_year -> a2019;
		   $sumtotp2019= $fila_year -> p2019;
		   $sumtot2020= $fila_year -> a2020;
		   $sumtotp2020= $fila_year -> p2020;
		   $sumtot2021= $fila_year -> a2021;
	$sumtotp2021= $fila_year -> p2021;
	$sumtot2022= $fila_year -> a2022;
	$sumtotp2022= $fila_year -> pa2022;
		
		$sumusdtot1= $fila_year -> c2019;
		$sumusdtot2= $fila_year -> c2020;
		$sumusdtot3= $fila_year -> c2012;
		$sumusdtot4= $fila_year -> c2013;
		$sumusdtot5= $fila_year -> c2014;
		$sumusdtot6= $fila_year -> c2015;
		$sumusdtot7= $fila_year -> c2016;
		$sumusdtot8= $fila_year -> c2017;
		$sumusdtot9= $fila_year -> c2018;
		$sumusdtot10= $fila_year -> c2021;
	$sumusdtot11= $fila_year -> c2022;
		
		$sumempto = $fila_year -> e2012;
		
		
		   $sumatotal2012 = $sumatotal2012 + $sumtot2012;
		   $sumatotal2013 = $sumatotal2013 + $sumtot2013;
		   $sumatotal2014 = $sumatotal2014 + $sumtot2014;
		   $sumatotal2015 = $sumatotal2015 + $sumtot2015;
		   $sumatotal2016 = $sumatotal2016 + $sumtot2016;
		   $sumatotal2017 = $sumatotal2017 + $sumtot2017;
		   $sumatotal2018 = $sumatotal2018 + $sumtot2018;
		   $sumatotal2019 = $sumatotal2019 + $sumtot2019;
		   $sumatotalp2019 = $sumatotalp2019 + $sumtotp2019;
		   $sumatotal2020 = $sumatotal2020 + $sumtot2020;
		   $sumatotalp2020 = $sumatotalp2020 + $sumtotp2020;
		   $sumatotal2021 = $sumatotal2021 + $sumtot2021;
	$sumatotalp2021 = $sumatotalp2021 + $sumtotp2021;
	$sumatotal2022 = $sumatotal2022 + $sumtot2022;
	$sumatotalp2022 = $sumatotalp2022 + $sumtotp2022;
		
		$sutousd1 = $sutousd1 + $sumusdtot1;
		$sutousd2 = $sutousd2 + $sumusdtot10;
		$sutousd3 = $sutousd3 + $sumusdtot3;
		
		$sumempreg = $sumempreg + $sumempto;

		   }
	
	if($sumatotal2020=="0" or $sumatotal2020==""){
		$varitota = "0.00";
	}else{
	$varitota = number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
	}
		   $parti='100 %';
	
	if($sumatotal2020=="0" or $sumatotal2020==""){
		$tota6 = "0.00";
	}else{
		   $tota6 =number_format((( $sumatotal2021 / $sumatotal2020) - 1) * 100,2);
	}
	
	if($sumatotal2020=="0" or $sumatotal2020==""){
		$tota2012 = "0,00";
	}else{
	$tota2012 = number_format((( $sumatotalp2021 / $sumatotalp2020) - 1) * 100,2);
	}
	
	if($sutousd3=="0" or $sutousd3==""){
		$totapreciousd12 = "0.00";
	}else{
	$totapreciousd12 = number_format((( $sutousd2 / $sutousd3) - 1) * 100,2);
	}
	
	//precio fob usd x kg 2020
	if($sumatotalp2021=="0" or $sumatotalp2021==""){
		$touskg = "0.00";
	}else{
	$touskg = $sumatotal2021 / $sumatotalp2021;
	}
	
	if($sumatotalp2020=="0" or $sumatotalp2020==""){
		$tous2019kg == "";
	}else{
	$tous2019kg = $sumatotal2020 / $sumatotalp2020;
	}
	
	if($tous2019kg=="0" or $tous2019kg==""){
		$totapreciousd = "0.00";
	}else{
	$totapreciousd = number_format((( $touskg / $tous2019kg) - 1) * 100,2);
	}
			   
			   if($sumatotal2012=='0' or $sumatotal2012==""){
			  $tca3 ='0';
		  }else{
		  $tca3 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		  }
			   if($sumatotal2013=='0' or $sumatotal2013==""){
			  $tca4 ='0';
		  }else{
		  $tca4 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		  }
			   if($sumatotal2014=='0' or $sumatotal2014==""){
			  $tca5 ='0';
		  }else{
		  $tca5 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		  }
			   if($sumatotal2015=='0' or $sumatotal2015==""){
			  $tca6 ='0';
		  }else{
		  $tca6 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		  }
			   if($sumatotal2016=='0' or $sumatotal2016==""){
			  $tca7 ='0';
		  }else{
		  $tca7 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		  }
			   if($sumatotal2017=='0' or $sumatotal2017==""){
			  $tca8 ='0';
		  }else{
		  $tca8 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		  }
		if($sumatotal2018=='0' or $sumatotal2018==""){
			  $tca9 ='0';
		  }else{
		  $tca9 = (($sumatotal2019 / $sumatotal2018) - 1) * 100;
		  }
		if($sumatotal2019=='0' or $sumatotal2019==""){
			  $tca10 ='0';
		  }else{
		  $tca10 = (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		  }
	if($sumatotal2020=='0' or $sumatotal2020==""){
			  $tca11 ='0';
		  }else{
		  $tca11 = (($sumatotal2021 / $sumatotal2020) - 1) * 100;
		  }
			   
			   $xx= $tca3 + $tca4 + $tca5 + $tca6 + $tca7 + $tca8 + $tca9 + $tca10 + $tca11;
		  $tota7 = number_format($xx / $tca9,2);
		  $tota8 = "100.00";
	
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
	$sumatotalp2020 = "0";
	$sumatotal2021="0";
	$sumatotal2022="0";
		  $varitota="0.00";
		  $parti="0.00";
	$touskg = "0.00";
	  }


if($describus==""){
$qua1 = "SELECT idarancel, descripcion FROM arancel WHERE idarancel='$partida1'";		
$rsua = $conexpg -> prepare($qua1); 
$rsua -> execute(); 
$ruups = $rsua -> fetchAll(PDO::FETCH_OBJ); 
if($rsua -> rowCount() > 0)   { 
foreach($ruups as $filau) {
		   $describus = $filau -> descripcion;
	}
}
}
?>

<div class="col-lg-12 col-12">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Reporte Evalucación Mercado de Destino para las Exportaciones</h4>
						</div>
							<div class="box-body">
								<div class="form-group">
								  <label class="form-label">Producto: <?=$describus;?> │ Partida #: <?=$partida1;?> │ Departamento: <?=$dato3;?> │ Fecha Numeraci&oacute;n │ Periodo 2021 </label>
								</div>

<div class="box-body">
<div class="table-responsive">
					  <!--<table id="example" class="table table-hover display nowrap margin-top-10 w-p100">-->
					  <table id="example" class="table table-hover display margin-top-10 w-p100">
						<thead>
							<tr>
							  <th>#</th>
                              <th>Paises</th>
                              <!--<th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>-->
							  <th>Valor exportado FOB USD 2020</th>
							  <th>Valor exportado FOB USD 2021</th>
							  <th>Peso Neto exportado KG 2021</th>
							  <th>Participación % FOB USD 2021</th>
							  <th>Variación % FOB USD 2021/2020</th>
							  <th>Variación % FOB USD 2021/2012</th>
							  <th>Variación % Peso Neto KG  2021/2020</th>
							  <th>Precio FOB USD x Kg 2020</th>
							  <th>Precio FOB USD x Kg 2021</th>
							  <th>Var. Precio FOB USD 2021/2020</th>
							  <!--<th>Var. Precio FOB USD 2020/2012</th>-->
							  <th>Cantidad de empresas 2021</th>
							</tr>
						</thead>
						<tbody>
<?php		
$resultado_rpt = $conexpg -> prepare($query1); 
$resultado_rpt -> execute(); 
$tyups = $resultado_rpt -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_rpt -> rowCount() > 0)   { 
foreach($tyups as $fila_rpt) {
		$cutoy = $cutoy + 1;
		   $nombredesc= $fila_rpt -> espanol;
		  $year3= $fila_rpt -> a2012;
		  $year4= $fila_rpt -> a2013;
		  $year5= $fila_rpt -> a2014;
		  $year6= $fila_rpt -> a2015;
		  $year7= $fila_rpt -> a2016;
		  $year8= $fila_rpt -> a2017;
		  $year9= $fila_rpt -> a2018;
		$year10 = $fila_rpt -> a2019;
		$year11 = $fila_rpt -> a2020;
		$year12= $fila_rpt -> a2021;
	    $year13= $fila_rpt -> a2022;
	
	    $yearp12= $fila_rpt -> p2021;
		$yearp11= $fila_rpt -> p2020;
		$yearp10= $fila_rpt -> p2019;
	
	$yearp13= $fila_rpt -> a2022;
	$yearp13= $fila_rpt -> p2022;
		
		$yearp1910= number_format($fila_rpt -> p2020,2);
		
		$yearusd1= $fila_rpt -> c2012;
		$yearusd2= $fila_rpt -> c2020;
		$yearusd3= $fila_rpt -> c2021;
		$yearempreg = $fila_rpt -> e2021;
		
		if($yearp11=='0' or $yearp11=='' ){// 2021/2020
		  $varp11 ='0';
		  }else{
		  $varp11 = number_format((($yearp12 / $yearp11) - 1) * 100,2);
		  }
		
		if($year11=='0' or $year11==""){
		  $var11 ='0';
		  }else{
			$var11 =number_format((( $year12 / $year11) - 1) * 100,2);
		  //$var11 = number_format((($year11 / $year10) - 1) * 100,2);
			//$vara11 = ($year11 / $year10) - 1 ;
			//$var11 = ($vara11 * 100) ;
			//$var11 = ((($year11 / $year10) - 1) * 100);
		  }
		
		if($yearusd2=='0' or $yearusd2==''){
		  $varc11 ='0';
		  }else{
		  $varc11 = number_format((($yearusd3 / $yearusd2) - 1) * 100,2);
		  }
		
		if($yearusd1=='0' or $yearusd1==''){
		  $varc12 ='0';
		  }else{
		  $varc12 = number_format((($yearusd3 / $yearusd1) - 1) * 100,2);
		  }
		  
		  
		  if($year3=='0' or $year3==""){
			  $ca3 ='0';
		  }else{
		  $ca3 = (($year4 / $year3) - 1) * 100;
		  }
		  if($year4=='0' or $year4==""){
			  $ca4 ='0';
		  }else{
		  $ca4 = (($year5 / $year4) - 1) * 100;
		  }
		  if($year5=='0' or $year5==""){
			  $ca5 ='0';
		  }else{
		  $ca5 = (($year6 / $year5) - 1) * 100;
		  }
		  if($year6=='0' or $year6==""){
			  $ca6 ='0';
		  }else{
		  $ca6 = (($year7 / $year6) - 1) * 100;
		  }
		  if($year7=='0' or $year7==""){
			  $ca7 ='0';
		  }else{
		  $ca7 = (($year8 / $year7) - 1) * 100;
		  }
		  if($year8=='0' or $year8==""){
			  $ca8 ='0';
		  }else{
		  $ca8 = (($year9 / $year8) - 1) * 100;
		  }
			  if($year9=='0' or $year9==""){
			  $ca9 ='0';
		  }else{
		  $ca9 = (($year10 / $year9) - 1) * 100;
		  }
		if($year10=='0' or $year10==""){
			  $ca10 ='0';
		  }else{
		  $ca10 = (($year11 / $year10) - 1) * 100;
		  }
		if($year11=='0' or $year11==""){
			  $ca11 ='0';
		  }else{
		  $ca11 = (($year12 / $year11) - 1) * 100;
		  }
	
	if($year12=='0' or $year12==""){
			  $ca12 ='0';
		  }else{
		  $ca12 = (($year13 / $year12) - 1) * 100;
		  }

		  $cax7 = $ca3 + $ca4 + $ca5 + $ca6 + $ca7 + $ca8 + $ca9 + $ca10 + $ca11;
		  $var22 = number_format($cax7 / $ca9,2);
		  
		if($sumatotal2021=='0' or $sumatotal2021=="" or $year11=='0' or $year11==""){
			$var33= "0.00";
		}else{
		  $var33= number_format(($year11 / $sumatotal2021)*100,2);
			}
		  
		  echo "<tr>";
		echo"<td>$cutoy</td>";
echo "<td>$nombredesc</td>";
/*echo "<td>".number_format($year3,2)."</td>";
echo "<td>".number_format($year4,2)."</td>";
echo "<td>".number_format($year5,2)."</td>";
echo "<td>".number_format($year6,2)."</td>";
echo "<td>".number_format($year7,2)."</td>";
echo "<td>".number_format($year8,2)."</td>";
echo "<td>".number_format($year9,2)."</td>";
echo "<td>".number_format($year10,2)."</td>";*/
echo "<td> ".number_format($year10,2)."</td>";
echo "<td> ".number_format($year11,2)."</td>";
echo "<td>".number_format($yearp11,2)."</td>";
/*echo "<td>".number_format($year12,2)."</td>";*/
echo "<td>$var33 %</td>";
echo "<td>$var11 %</td>";
echo "<td>$var22 %</td>";
echo "<td>$varp11 %</td>";
echo "<td>".number_format($yearusd2,2)."</td>";
echo "<td>".number_format($yearusd3,2)."</td>";
echo "<td>$varc11 % </td>";
//echo "<td>$varc12 %</td>";
echo "<td>$yearempreg</td>";
 echo "</tr>";
	}
	echo "<tr>";
	echo "<th></th>";
		  echo "<th><b>Total</b></th>";
		   /*echo "<th><b>".number_format($sumatotal2012,2)."</b></th>";
		    echo "<th><b>".number_format($sumatotal2013,2)."</b></th>";
			echo "<th><b>".number_format($sumatotal2014,2)."</b></th>";
			echo "<th><b>".number_format($sumatotal2015,2)."</b></th>";
			echo "<th><b>".number_format($sumatotal2016,2)."</b></th>";
			echo "<th><b>".number_format($sumatotal2017,2)."</b></th>";
		    echo "<th><b>".number_format($sumatotal2018,2)."</b></th>";
		    echo "<th><b>".number_format($sumatotal2019,2)."</b></th>";*/
	        echo "<th><b>".number_format($sumatotal2020,2)."</b></th>";
	        echo "<th><b>".number_format($sumatotal2021,2)."</b></th>";
	        echo "<th><b>".number_format($sumatotalp2021,2)."</b></th>";
	        /*echo "<th><b>".number_format($sumatotal2021,2)."</b></th>";*/
	         echo "<th><b>$tota8 %</b></th>";
			 echo "<th><b>$tota6 %</b></th>";		 
	echo "<th><b>$tota7 %</b></th>";
	echo "<th><b>$tota2012 %</b></th>";
	echo "<th><b>".number_format($tous2019kg,2)."</b></th>";
	echo "<th><b>".number_format($touskg,2)."</b></th>";
	echo "<th><b>$totapreciousd %</b></th>";
	//echo "<th><b>$totapreciousd12 %</b></th>";
	echo "<th><b>$sumtoe2020</b></th>";
		  echo "</tr>";
}
?>
						</tbody>				  
						<tfoot>
							<tr>
								<th>#</th>
                              <th>Paises</th>
                              <!--<th>2012</th>
                              <th>2013</th>
                              <th>2014</th>
                              <th>2015</th>
							  <th>2016</th>
							  <th>2017</th>
							  <th>2018</th>
							  <th>2019</th>-->
							  <th>Valor exportado FOB USD 2020</th>
							  <th>Valor exportado FOB USD 2021</th>
							  <th>Peso Neto exportado KG 2021</th>
							  <th>Participación % FOB USD 2021</th>
							  <th>Variación % FOB USD 2021/2020</th>
							  <th>Variación % FOB USD 2021/2012</th>
							  <th>Variación % Peso Neto KG  2021/2020</th>
							  <th>Precio FOB USD x Kg 2020</th>
							  <th>Precio FOB USD x Kg 2021</th>
							  <th>Var. Precio FOB USD 2021/2020</th>
							  <!--<th>Var. Precio FOB USD 2020/2012</th>-->
							  <th>Cantidad de empresas 2021</th>
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

