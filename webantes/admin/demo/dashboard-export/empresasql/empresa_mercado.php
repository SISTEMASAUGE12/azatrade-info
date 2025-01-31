<?php
//primero consultamos la suma total general de cada ano
  if($nombres2=="vfobserdol" or $nombres2=="vpesnet" or $nombres2=="vpesbru" or $nombres2=="qunifis" or $nombres2=="qunicom"){
	  $sqlyear="SELECT
Sum(CASE ".$filtrofecha." WHEN '2012' THEN ".$nombres2." ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN ".$nombres2." ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN ".$nombres2." ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN ".$nombres2." ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN ".$nombres2." ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN ".$nombres2." ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN ".$nombres2." ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN ".$nombres2." ELSE 0 END) AS a2019,
Sum(CASE ".$filtrofecha." WHEN '2020' THEN ".$nombres2." ELSE 0 END) AS a2020,
Sum(CASE ".$filtrofecha." WHEN '2021' THEN ".$nombres2." ELSE 0 END) AS a2021,
Sum(CASE ".$filtrofecha." WHEN '2022' THEN ".$nombres2." ELSE 0 END) AS a2022 
FROM exportacion  LEFT JOIN paises ON exportacion.cpaides = paises.idpaises
WHERE exportacion.ndoc = '".$paiscode."' $querytu AND ".$wherefecha." ";
  }
  if($nombres2=="diferen"){
	  $sqlyear="SELECT
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS a2019,
Sum(CASE ".$filtrofecha." WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS a2020,
Sum(CASE ".$filtrofecha." WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS a2021,
Sum(CASE ".$filtrofecha." WHEN '2022' THEN exportacion.vfobserdol ELSE 0 END) / SUM(CASE ".$filtrofecha." WHEN '2022' THEN exportacion.vpesnet ELSE 0 END) AS a2022 
FROM exportacion  LEFT JOIN paises ON exportacion.cpaides = paises.idpaises
WHERE exportacion.ndoc = '".$paiscode."' $querytu AND ".$wherefecha." ";
  }
  
  if($nombres2=="total"){
	  $sqlyear="SELECT
Sum(CASE ".$filtrofecha." WHEN '2012' THEN 1 ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN 1 ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN 1 ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN 1 ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN 1 ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN 1 ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN 1 ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN 1 ELSE 0 END) AS a2019,
Sum(CASE ".$filtrofecha." WHEN '2020' THEN 1 ELSE 0 END) AS a2020,
Sum(CASE ".$filtrofecha." WHEN '2021' THEN 1 ELSE 0 END) AS a2021,
Sum(CASE ".$filtrofecha." WHEN '2022' THEN 1 ELSE 0 END) AS a2022
FROM exportacion  LEFT JOIN paises ON exportacion.cpaides = paises.idpaises
WHERE exportacion.ndoc = '".$paiscode."' $querytu AND ".$wherefecha." ";
  }
  
  if($nombres2=="part_nandi" or $nombres2=="ndcl" or $nombres2=="dnombre" or $nombres2=="cpaides" or $nombres2=="cpuedes" or  $nombres2=="cadu" or $nombres2=="cage" or $nombres2=="cviatra"){
	 $sqlyear="SELECT
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2012' THEN exportacion.".$nombres2." ELSE NULL END) AS a2012,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2013' THEN exportacion.".$nombres2." ELSE NULL END) AS a2013,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2014' THEN exportacion.".$nombres2." ELSE NULL END) AS a2014,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2015' THEN exportacion.".$nombres2." ELSE NULL END) AS a2015,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2016' THEN exportacion.".$nombres2." ELSE NULL END) AS a2016,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2017' THEN exportacion.".$nombres2." ELSE NULL END) AS a2017,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2018' THEN exportacion.".$nombres2." ELSE NULL END) AS a2018,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2019' THEN exportacion.".$nombres2." ELSE NULL END) AS a2019,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2020' THEN exportacion.".$nombres2." ELSE NULL END) AS a2020,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2021' THEN exportacion.".$nombres2." ELSE NULL END) AS a2021,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2022' THEN exportacion.".$nombres2." ELSE NULL END) AS a2022
FROM exportacion  LEFT JOIN paises ON exportacion.cpaides = paises.idpaises
WHERE exportacion.ndoc = '".$paiscode."' $querytu AND ".$wherefecha." ";
  }
  if($nombres2=="provi" or $nombres2=="distri" or $nombres2=="depa"){
	  if($nombres2=="depa"){
		  $varia='substring(exportacion.ubigeo,1,2)';
	  }else if($nombres2=="provi"){
		  $varia='substring(exportacion.ubigeo,3,2)';
	  }else{
		  $varia='substring(exportacion.ubigeo,5,2)';
	  }
	  $sqlyear="SELECT
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2012' THEN ".$varia." ELSE NULL END) AS a2012,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2013' THEN ".$varia." ELSE NULL END) AS a2013,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2014' THEN ".$varia." ELSE NULL END) AS a2014,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2015' THEN ".$varia." ELSE NULL END) AS a2015,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2016' THEN ".$varia." ELSE NULL END) AS a2016,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2017' THEN ".$varia." ELSE NULL END) AS a2017,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2018' THEN ".$varia." ELSE NULL END) AS a2018,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2019' THEN ".$varia." ELSE NULL END) AS a2019,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2020' THEN ".$varia." ELSE NULL END) AS a2020,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2021' THEN ".$varia." ELSE NULL END) AS a2021,
COUNT(DISTINCT CASE ".$filtrofecha." WHEN '2022' THEN ".$varia." ELSE NULL END) AS a2022
FROM exportacion  LEFT JOIN paises ON exportacion.cpaides = paises.idpaises
WHERE exportacion.ndoc = '".$paiscode."' $querytu AND ".$wherefecha." ";
	  
  }
	
$result_year = $conexpg -> prepare($sqlyear); 
$result_year -> execute(); 
$reps = $result_year -> fetchAll(PDO::FETCH_OBJ); 
if($result_year -> rowCount() > 0)   { 
foreach($reps as $fila_year) {
		   $difere= $fila_year -> dife;   
		   $cuenta_x = $fila_year -> cuenta;
		   $depart_x = $fila_year -> depart;
		   
		   if($difere=="diferencia"){
		   $sumatotal2012_x= $fila_year -> a2012;
		   if($sumatotal2012_x=='0'){
		   $sumatotal2012_a="0.00";
		   $sumatotal2012 = $sumatotal2012_a + $sumatotal2012;
		   }else{
			   $sum_totalfob1 = $fila_year -> a2012x;
			   $sum_totalnet1 = $fila_year -> a2012;
		   $sumatotal2012_a= $sum_totalfob1 / $sum_totalnet1;
		   $sumatotal2012= $sumatotal2012_a + $sumatotal2012;
		   }
		   
		   $sumatotal2013_x= $fila_year -> a2013;
		   if($sumatotal2013_x=='0'){
			    $sumatotal2013_a="0.00";
				$sumatotal2013 = $sumatotal2013_a + $sumatotal2013;
		   }else{
			   $sum_totalfob2 = $fila_year -> a2013x;
			   $sum_totalnet2 = $fila_year -> a2013;
		   $sumatotal2013_a= $sum_totalfob2 / $sum_totalnet2;
		   $sumatotal2013= $sumatotal2013_a + $sumatotal2013;
		   }
		   
		   $sumatotal2014_x= $fila_year -> a2014;
		   if($sumatotal2014_x=='0'){
			  $sumatotal2014_a="0.00";
			  $sumatotal2014 = $sumatotal2014_a + $sumatotal2014;
		   }else{
			   $sum_totalfob3 = $fila_year -> a2014x;
			   $sum_totalnet3 = $fila_year -> a2014;
		   $sumatotal2014_a= $sum_totalfob3 / $sum_totalnet3;
		   $sumatotal2014= $sumatotal2014_a + $sumatotal2014;
		   }
		   
		   $sumatotal2015_x= $fila_year -> a2015;
		   if($sumatotal2015_x=='0'){
			   $sumatotal2015_a="0.00";
			   $sumatotal2015 = $sumatotal2015_a + $sumatotal2015;
		   }else{
			   $sum_totalfob4 = $fila_year -> a2015x;
			   $sum_totalnet4 = $fila_year -> a2015;
		   $sumatotal2015_a= $sum_totalfob4 / $sum_totalnet4;
		   $sumatotal2015= $sumatotal2015_a + $sumatotal2015;
		   }
		   
		   $sumatotal2016_x= $fila_year -> a2016;
		   if($sumatotal2016_x=='0'){
			   $sumatotal2016_a="0.00";
			   $sumatotal2016 = $sumatotal2016_a + $sumatotal2016;
		   }else{
			   $sum_totalfob5 = $fila_year -> a2016x;
			   $sum_totalnet5 = $fila_year -> a2016;
		   $sumatotal2016_a= $sum_totalfob5 / $sum_totalnet5;
		   $sumatotal2016= $sumatotal2016_a + $sumatotal2016;
		   }
		   
		   $sumatotal2017_x= $fila_year -> a2017;
		   if($sumatotal2017_x=='0'){
			   $sumatotal2017_a="0.00";
			   $sumatotal2017 = $sumatotal2017_a + $sumatotal2017;
		   }else{
			   $sum_totalfob6 = $fila_year -> a2017x;
			   $sum_totalnet6 = $fila_year -> a2017;
		   $sumatotal2017_a= $sum_totalfob6 / $sum_totalnet6;
		   $sumatotal2017= $sumatotal2017_a + $sumatotal2017;
		   }
			   
			   $sumatotal2018_x= $fila_year -> a2018;
		   if($sumatotal2018_x=='0'){
			   $sumatotal2018_a="0.00";
			   $sumatotal2018 = $sumatotal2018_a + $sumatotal2018;
		   }else{
			   $sum_totalfob7 = $fila_year -> a2018x;
			   $sum_totalnet7 = $fila_year -> a2018;
		   $sumatotal2018_a= $sum_totalfob7 / $sum_totalnet7;
		   $sumatotal2018= $sumatotal2018_a + $sumatotal2018;
		   }
			   
			   $sumatotal2019_x= $fila_year -> a2019;
		   if($sumatotal2019_x=='0'){
			   $sumatotal2019_a="0.00";
			   $sumatotal2019 = $sumatotal2019_a + $sumatotal2019;
		   }else{
			   $sum_totalfob8 = $fila_year -> a2019x;
			   $sum_totalnet8 = $fila_year -> a2019;
		   $sumatotal2019_a= $sum_totalfob8 / $sum_totalnet8;
		   $sumatotal2019= $sumatotal2019_a + $sumatotal2019;
		   }
			   
			   $sumatotal2020_x= $fila_year -> a2020;
		   if($sumatotal2020_x=='0'){
			   $sumatotal2020_a="0.00";
			   $sumatotal2020 = $sumatotal2020_a + $sumatotal2020;
		   }else{
			   $sum_totalfob9 = $fila_year -> a2020x;
			   $sum_totalnet9 = $fila_year -> a2020;
		   $sumatotal2020_a= $sum_totalfob9 / $sum_totalnet9;
		   $sumatotal2020= $sumatotal2020_a + $sumatotal2020;
		   }
			   
			   $sumatotal2021_x= $fila_year -> a2021;
		   if($sumatotal2021_x=='0'){
			   $sumatotal2021_a="0.00";
			   $sumatotal2021 = $sumatotal2021_a + $sumatotal2021;
		   }else{
			   $sum_totalfob10 = $fila_year -> a2021x;
			   $sum_totalnet10 = $fila_year -> a2021;
		   $sumatotal2021_a= $sum_totalfob10 / $sum_totalnet10;
		   $sumatotal2021= $sumatotal2021_a + $sumatotal2021;
		   }
			   
			   $sumatotal2022_x= $fila_year -> a2022;
		   if($sumatotal2022_x=='0'){
			   $sumatotal2022_a="0.00";
			   $sumatotal2022 = $sumatotal2022_a + $sumatotal2022;
		   }else{
			   $sum_totalfob11 = $fila_year -> a2022x;
			   $sum_totalnet11 = $fila_year -> a2022;
		   $sumatotal2022_a= $sum_totalfob11 / $sum_totalnet11;
		   $sumatotal2022= $sumatotal2022_a + $sumatotal2022;
		   }
		   
		}else if($cuenta_x=='cuenta'){
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
			   $sumatotal2018= $sumc6 + $sumatotal2018;
			   $sumatotal2019= $sumc7 + $sumatotal2019;
			   $sumatotal2020= $sumc7 + $sumatotal2020;
			   $sumatotal2021= $sumc7 + $sumatotal2021;
			   $sumatotal2022= $sumc7 + $sumatotal2022;
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
		   if($sumatotal2020=='0' or $sumatotal2020==""){
			   $varitota="0.00";
		   }else{
		   $varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
		   }
		   $parti='100 %';
		   }
	  }else{
		  $sumatotal2012="0.00";
		  $sumatotal2013="0.00";
		  $sumatotal2014="0.00";
		  $sumatotal2015="0.00";
		  $sumatotal2016="0.00";
		  $sumatotal2017="0.00";
		  $sumatotal2018="0.00";
		  $sumatotal2019="0.00";
	$sumatotal2020="0.00";
	$sumatotal2021="0.00";
	$sumatotal2022="0.00";
		  $varitota="0.00";
		  $parti="0.00";
	  }
  
  //visualizamos datos en el reporte
  if($nombres2=="vfobserdol" or $nombres2=="vpesnet" or $nombres2=="vpesbru" or $nombres2=="qunifis" or $nombres2=="qunicom"){
   $query_resultado = "SELECT
exportacion.cpaides,
paises.espanol,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN ".$nombres2." ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN ".$nombres2." ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN ".$nombres2." ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN ".$nombres2." ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN ".$nombres2." ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN ".$nombres2." ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN ".$nombres2." ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN ".$nombres2." ELSE 0 END) AS a2019,
Sum(CASE ".$filtrofecha." WHEN '2020' THEN ".$nombres2." ELSE 0 END) AS a2020,
Sum(CASE ".$filtrofecha." WHEN '2021' THEN ".$nombres2." ELSE 0 END) AS a2021,
Sum(CASE ".$filtrofecha." WHEN '2022' THEN ".$nombres2." ELSE 0 END) AS a2022 
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises
WHERE exportacion.ndoc = '".$paiscode."' $querytu AND ".$wherefecha."
GROUP BY exportacion.cpaides,paises.espanol ORDER BY paises.espanol ASC";
  }else if ($nombres2=="diferen"){
	  $query_resultado = "SELECT
exportacion.cpaides,
paises.espanol,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS x2012,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS xx2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS x2013,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS xx2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS x2014,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS xx2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS x2015,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS xx2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS x2016,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS xx2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS x2017,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS xx2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS x2018,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS xx2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS x2019,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS xx2019,
Sum(CASE ".$filtrofecha." WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) AS x2020,
Sum(CASE ".$filtrofecha." WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS xx2020,
Sum(CASE ".$filtrofecha." WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) AS x2021,
Sum(CASE ".$filtrofecha." WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS xx2021,
Sum(CASE ".$filtrofecha." WHEN '2022' THEN exportacion.vfobserdol ELSE 0 END) AS x2022,
Sum(CASE ".$filtrofecha." WHEN '2022' THEN exportacion.vpesnet ELSE 0 END) AS xx2022 
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises
WHERE exportacion.ndoc = '".$paiscode."' $querytu AND ".$wherefecha."
GROUP BY exportacion.cpaides,paises.espanol ORDER BY paises.espanol ASC";
  }else if($nombres2=="total"){
	  $query_resultado = "SELECT
exportacion.cpaides,
paises.espanol,
Sum(CASE ".$filtrofecha." WHEN '2012' THEN 1 ELSE 0 END) AS a2012,
Sum(CASE ".$filtrofecha." WHEN '2013' THEN 1 ELSE 0 END) AS a2013,
Sum(CASE ".$filtrofecha." WHEN '2014' THEN 1 ELSE 0 END) AS a2014,
Sum(CASE ".$filtrofecha." WHEN '2015' THEN 1 ELSE 0 END) AS a2015,
Sum(CASE ".$filtrofecha." WHEN '2016' THEN 1 ELSE 0 END) AS a2016,
Sum(CASE ".$filtrofecha." WHEN '2017' THEN 1 ELSE 0 END) AS a2017,
Sum(CASE ".$filtrofecha." WHEN '2018' THEN 1 ELSE 0 END) AS a2018,
Sum(CASE ".$filtrofecha." WHEN '2019' THEN 1 ELSE 0 END) AS a2019,
Sum(CASE ".$filtrofecha." WHEN '2020' THEN 1 ELSE 0 END) AS a2020,
Sum(CASE ".$filtrofecha." WHEN '2021' THEN 1 ELSE 0 END) AS a2021,
Sum(CASE ".$filtrofecha." WHEN '2022' THEN 1 ELSE 0 END) AS a2022
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises
WHERE exportacion.ndoc = '".$paiscode."' $querytu AND ".$wherefecha."
GROUP BY exportacion.cpaides,paises.espanol ORDER BY paises.espanol ASC";
  } else if($nombres2=="part_nandi" or $nombres2=="ndcl" or $nombres2=="dnombre" or $nombres2=="cpaides" or $nombres2=="cpuedes" or  $nombres2=="cadu" or $nombres2=="cage" or $nombres2=="cviatra"){
	  $query_resultado = "SELECT
exportacion.cpaides,
paises.espanol,
COUNT(distinct CASE ".$filtrofecha." WHEN '2012' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2012,
COUNT(distinct CASE ".$filtrofecha." WHEN '2013' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2013,
COUNT(distinct CASE ".$filtrofecha." WHEN '2014' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2014,
COUNT(distinct CASE ".$filtrofecha." WHEN '2015' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2015,
COUNT(distinct CASE ".$filtrofecha." WHEN '2016' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2016,
COUNT(distinct CASE ".$filtrofecha." WHEN '2017' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2017,
COUNT(distinct CASE ".$filtrofecha." WHEN '2018' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2018,
COUNT(distinct CASE ".$filtrofecha." WHEN '2019' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2019,
COUNT(distinct CASE ".$filtrofecha." WHEN '2020' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2020,
COUNT(distinct CASE ".$filtrofecha." WHEN '2021' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2021,
COUNT(distinct CASE ".$filtrofecha." WHEN '2022' THEN  exportacion.".$nombres2." ELSE NULL END) AS a2022
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises
WHERE exportacion.ndoc = '".$paiscode."' $querytu AND ".$wherefecha."
GROUP BY exportacion.cpaides,paises.espanol ORDER BY paises.espanol ASC";
  }else{
	  if($nombres2=="depa"){
		  $variaA='substring(exportacion.ubigeo,1,2)';
	  }else if($nombres2=="provi"){
		  $variaA='substring(exportacion.ubigeo,3,2)';
	  }else{
		  $variaA='substring(exportacion.ubigeo,5,2)';
	  }
	  $query_resultado = "SELECT
exportacion.cpaides,
paises.espanol,
COUNT(distinct CASE ".$filtrofecha." WHEN '2012' THEN  ".$variaA." ELSE NULL END) AS a2012,
COUNT(distinct CASE ".$filtrofecha." WHEN '2013' THEN  ".$variaA." ELSE NULL END) AS a2013,
COUNT(distinct CASE ".$filtrofecha." WHEN '2014' THEN  ".$variaA." ELSE NULL END) AS a2014,
COUNT(distinct CASE ".$filtrofecha." WHEN '2015' THEN  ".$variaA." ELSE NULL END) AS a2015,
COUNT(distinct CASE ".$filtrofecha." WHEN '2016' THEN  ".$variaA." ELSE NULL END) AS a2016,
COUNT(distinct CASE ".$filtrofecha." WHEN '2017' THEN  ".$variaA." ELSE NULL END) AS a2017,
COUNT(distinct CASE ".$filtrofecha." WHEN '2018' THEN  ".$variaA." ELSE NULL END) AS a2018,
COUNT(distinct CASE ".$filtrofecha." WHEN '2019' THEN  ".$variaA." ELSE NULL END) AS a2019,
COUNT(distinct CASE ".$filtrofecha." WHEN '2020' THEN  ".$variaA." ELSE NULL END) AS a2020,
COUNT(distinct CASE ".$filtrofecha." WHEN '2021' THEN  ".$variaA." ELSE NULL END) AS a2021,
COUNT(distinct CASE ".$filtrofecha." WHEN '2022' THEN  ".$variaA." ELSE NULL END) AS a2022
FROM exportacion LEFT JOIN paises ON exportacion.cpaides = paises.idpaises
WHERE exportacion.ndoc = '".$paiscode."' $querytu AND ".$wherefecha."
GROUP BY exportacion.cpaides,paises.espanol ORDER BY paises.espanol ASC";
  }

?>
				  <div class="col-lg-12 col-12">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Reporte Empresa Evoluci&oacute;n Anual de Exportaciones</h4>
						</div>
							<div class="box-body">
								<div class="form-group">
								  <label class="form-label"><b>Empresa:</b> <?=$paisname;?> <b>│ Ruc:</b> <?=$paiscode;?> <b>│ Departamento:</b> <?=$namedepa1;?> <b>│ Indicador #1:</b> <?=$combo;?> <b>- Variable #2:</b> <?=$combo2;?> <b>│</b> Fecha Numeraci&oacute;n <b>│ Periodo:</b> 2012 - 2022 </label>
								</div>

<div class="box-body">
<div class="table-responsive">
					  <!--<table id="example" class="table table-hover display nowrap margin-top-10 w-p100">-->
					  <table id="example" class="table table-hover display margin-top-10 w-p100">
						<thead>
							<tr>
						      <th>#</th>
							  <th>Mercados</th>
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
							  <!--<th>Par.%21</th>-->
							</tr>
						</thead>
						<tbody>
<?php		
$resultado_rpt = $conexpg -> prepare($query_resultado); 
$resultado_rpt -> execute(); 
$tnps = $resultado_rpt -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_rpt -> rowCount() > 0)   { 
foreach($tnps as $fila_rpt) {
           $codigotemp= $codigotemp + 1;
		   $codigopais= $fila_rpt -> cpaides;
		   $nombredesc= $fila_rpt -> espanol;
		   if($nombredesc==""){
			   $nombredesc="---";
		   }else{
			   $nombredesc= $fila_rpt -> espanol;
		   }
		   
		   if($nombres2=="diferen"){
			   $dife1A = $fila_rpt -> x2012;
			   $dife1B = $fila_rpt -> xx2012;
			   $dife2A = $fila_rpt -> x2013;
			   $dife2B = $fila_rpt -> xx2013;
			   $dife3A = $fila_rpt -> x2014;
			   $dife3B = $fila_rpt -> xx2014;
			   $dife4A = $fila_rpt -> x2015;
			   $dife4B = $fila_rpt -> xx2015;
			   $dife5A = $fila_rpt -> x2016;
			   $dife5B = $fila_rpt -> xx2016;
			   $dife6A = $fila_rpt -> x2017;
			   $dife6B = $fila_rpt -> xx2017;
			   $dife7A = $fila_rpt -> x2018;
			   $dife7B = $fila_rpt -> xx2018;
			   $dife8A = $fila_rpt -> x2019;
			   $dife8B = $fila_rpt -> xx2019;
			   $dife9A = $fila_rpt -> x2020;
			   $dife9B = $fila_rpt -> xx2020;
			   $dife10A = $fila_rpt -> x2021;
			   $dife10B = $fila_rpt -> xx2021;
			   $dife11A = $fila_rpt -> x2022;
			   $dife11B = $fila_rpt -> xx2022;
			   
			   if($dife1B=='0'){
				   $year3= "0.00";
			   }else{ 
			   $year3= number_format($dife1A / $dife1B,2); 
			   }
			   if($dife2B=='0'){
				   $year4= "0.00";
			   }else{ $year4= number_format($dife2A / $dife2B,2); }
			   
			   if($dife3B=='0'){
				   $year5= "0.00";
			   }else{ $year5= number_format($dife3A / $dife3B,2); }
			   
			   if($dife4B=='0'){
				   $year6= "0.00";
			   }else{ $year6= number_format($dife4A / $dife4B,2); }
			   
			   if($dife5B=='0'){
				   $year7= "0.00";  
			   }else{ $year7= number_format($dife5A / $dife5B,2); }
			   
			   if($dife6B=='0'){
				   $year8= "0.00";  
			   }else{ $year8= number_format($dife6A / $dife6B,2); }
			   if($dife7B=='0'){
				   $year9= "0.00";  
			   }else{ $year9= number_format($dife7A / $dife7B,2); }
			   
			   if($dife8B=='0'){
				   $year10= "0.00";  
			   }else{ $year10= number_format($dife8A / $dife8B,2); }
			   
			   if($dife9B=='0'){
				   $year11= "0.00";  
			   }else{ $year11= number_format($dife9A / $dife9B,2); }
			   
			   if($dife10B=='0'){
				   $year12= "0.00";  
			   }else{ $year12 = number_format($dife10A / $dife10B,2); }
			   
			   if($dife11B=='0'){
				   $year13= "0.00";  
			   }else{ $year13 = number_format($dife11A / $dife11B,2); }
			   
		   }else{
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
		   }
		  
		  if($year11=='0'){
		  $var11 ='0.00';
		  }else{
		  $var11 = number_format((($year12 / $year11) - 1) * 100,2);
		  }
			   
	if($sumatotal2021=="0" or $sumatotal2021==""){
		$var33 = "0.00";
	}else{
			   $var33= number_format(($year12 / $sumatotal2021)*100,2);
		}

		  echo "<tr>";
echo "<td>$codigotemp</td>";
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
//echo "<td>$var33%</td>";
 echo "</tr>";
		  
		  }
	echo "<tr>";
		   echo "<th align='center'></th>";
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
			  echo "<th><b>$varitota %</b></th>";
			  //echo "<th><b>$parti</b></th>";
		  echo "</tr>";
}
?>
						</tbody>				  
						<tfoot>
							<tr>
							  <th>#</th>
							  <th>Mercados</th>
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
							  <!--<th>Par.%21</th>-->
							</tr>
						</tfoot>
					</table>
					</div>
</div>              


							</div> 
					  </div>			
				</div> 
				
<script src="../assets/vendor_components/datatable/datatables.min.js"></script>
<!--<script src="js/pages/data-table.js"></script>-->

<script>
	$(document).ready(function () {
  $('#example').DataTable({
	  "order": [[ 0, "asc" ]],// columna a ordenar
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