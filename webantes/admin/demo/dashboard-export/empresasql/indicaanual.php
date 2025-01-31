<?php
include("../../conector/config.php");
set_time_limit(900);

date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");

$paisname = trim($_POST["namempA"]);
$paiscode = trim($_POST["codempA"]);
$namedepa1 = trim($_POST["namedepa"]);
$ubicod1 = trim($_POST["codubi"]);

if($ubicod1==""){
	$flatcod = "";
	$querye = "";
}else{
	$flatcod = $ubicod1;
	$querye = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}

$ranfecha = "extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2022'";

//sumamos valorfob
		   $query_vfob = "SELECT 'vfobserdol' as VALOR, 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2012.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2013.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2014.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2015.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2016.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2017.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2018.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2019.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2020.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2021.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2022' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2022."
		   FROM exportacion WHERE $ranfecha $querye AND exportacion.ndoc ='".$paiscode."'";
$resultado_vfob = $conexpg -> prepare($query_vfob); 
$resultado_vfob -> execute(); 
$trepos = $resultado_vfob -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_vfob -> rowCount() > 0)   { 
foreach($trepos as $fila_vfob) {
		  $vfob_2012= $fila_vfob -> vfob2012;
		   $vfob_2013=  $fila_vfob -> vfob2013;
		    $vfob_2014=  $fila_vfob -> vfob2014;
			 $vfob_2015=  $fila_vfob -> vfob2015;
			  $vfob_2016=  $fila_vfob -> vfob2016;
			   $vfob_2017=  $fila_vfob -> vfob2017;
			    $vfob_2018=  $fila_vfob -> vfob2018;
			  $vfob_2019=  $fila_vfob -> vfob2019;
	$vfob_2020=  $fila_vfob -> vfob2020;
	$vfob_2021=  $fila_vfob -> vfob2021;
	$vfob_2022=  $fila_vfob -> vfob2022;
			  
			   if($vfob_2020=='0'  or $vfob_2020 == null){
				    $var1='0.00';
			   }else{
			   $var1= number_format((($vfob_2021/$vfob_2020) - 1) * 100,2);
			   }
			   
			  if($vfob_2012=='0' or $vfob_2012 == null){
			  $ca1 ='0';
		      }else{
		      $ca1 = (($vfob_2013 / $vfob_2012) - 1) * 100;
		      }
			   if($vfob_2013=='0' or $vfob_2013 == null){
			  $ca2 ='0';
		      }else{
		      $ca2 = (($vfob_2014 / $vfob_2013) - 1) * 100;
		      }
			   if($vfob_2014=='0' or $vfob_2014 == null){
			  $ca3 ='0';
		      }else{
		      $ca3 = (($vfob_2015 / $vfob_2014) - 1) * 100;
		      }
			   if($vfob_2015=='0' or $vfob_2015 == null){
			  $ca4 ='0';
		      }else{
		      $ca4 = (($vfob_2016 / $vfob_2015) - 1) * 100;
		      }
			  if($vfob_2016=='0' or $vfob_2016 == null){
			  $ca5 ='0';
		      }else{
		      $ca5 = (($vfob_2017 / $vfob_2016) - 1) * 100;
		      }
			  if($vfob_2017=='0' or $vfob_2017 == null){
			  $ca6 ='0';
		      }else{
		      $ca6 = (($vfob_2018 / $vfob_2017) - 1) * 100;
		      }
			  if($vfob_2018=='0' or $vfob_2018 == null){
			  $ca7 ='0';
		      }else{
		      $ca7 = (($vfob_2019 / $vfob_2018) - 1) * 100;
		      }
	if($vfob_2019=='0' or $vfob_2019 == null){
			  $ca8 ='0';
		      }else{
		      $ca8 = (($vfob_2020 / $vfob_2019) - 1) * 100;
		      }
	if($vfob_2020=='0' or $vfob_2020 == null){
			  $ca9 ='0';
		      }else{
		      $ca9 = (($vfob_2021 / $vfob_2020) - 1) * 100;
		      }
	if($vfob_2022=='0' or $vfob_2022 == null){
			  $ca10 ='0';
		      }else{
		      $ca10 = (($vfob_2022 / $vfob_2021) - 1) * 100;
		      }
			 
			  
			  $var2= number_format(($ca1 + $ca2 + $ca3 + $ca4 + $ca5 + $ca6 + $ca7 + $ca8 + $ca9)/9,2) ;

		  
		  }
	  }else{
		  $vfob_2012= "0.00";
		   $vfob_2013= "0.00";
		    $vfob_2014= "0.00";
			 $vfob_2015= "0.00";
			  $vfob_2016= "0.00";
			  $vfob_2017= "0.00";
		       $vfob_2018= "0.00";
		  $vfob_2019= "0.00";
	$vfob_2020= "0.00";
	$vfob_2021= "0.00";
	$vfob_2022= "0.00";
	  }

//sumamos vpesnet
	   $query_vpes = "SELECT 'vpesnet' as VALOR,
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2012.", 
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2013.", 
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2014.", 
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2015.", 
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2016.",
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2017.",
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2018.",
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2019.",
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2020.",
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2021.",
	   SUM(CASE extract(year from exportacion.fnum) WHEN '2022' THEN exportacion.vpesnet ELSE 0 END) AS ".vpes2022."
FROM exportacion WHERE $ranfecha $querye AND exportacion.ndoc ='".$paiscode."'";
$resultado_vpes = $conexpg -> prepare($query_vpes); 
$resultado_vpes -> execute(); 
$vpespos = $resultado_vpes -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_vpes -> rowCount() > 0)   { 
foreach($vpespos as $fila_vpes) {
		  $vpes_2012=  $fila_vpes -> vpes2012;
		   $vpes_2013=  $fila_vpes -> vpes2013;
		    $vpes_2014=  $fila_vpes -> vpes2014;
			 $vpes_2015=  $fila_vpes -> vpes2015;
			  $vpes_2016= $fila_vpes -> vpes2016;
			  $vpes_2017= $fila_vpes -> vpes2017;
			  $vpes_2018= $fila_vpes -> vpes2018;
			  $vpes_2019= $fila_vpes -> vpes2019;
	$vpes_2020= $fila_vpes -> vpes2020;
	$vpes_2021= $fila_vpes -> vpes2021;
	$vpes_2022= $fila_vpes -> vpes2022;

			  if($vpes_2020=='0' or $vpes_2020== null){
				 $var3="0"; 
			  }else{
$var3= number_format((($vpes_2021/$vpes_2020) - 1) * 100,2);
				  }
			   
			  if($vpes_2012=='0' or $vpes_2012== null){
			  $ca1x ='0';
		      }else{
		      $ca1x = (($vpes_2013 / $vpes_2012) - 1) * 100;
		      }
			   if($vpes_2013=='0' or $vpes_2013==null){
			  $ca2x ='0';
		      }else{
		      $ca2x = (($vpes_2014 / $vpes_2013) - 1) * 100;
		      }
			   if($vpes_2014=='0' or $vpes_2014==null){
			  $ca3x ='0';
		      }else{
		      $ca3x = (($vpes_2015 / $vpes_2014) - 1) * 100;
		      }
			   if($vpes_2015=='0' or $vpes_2015==null){
			  $ca4x ='0';
		      }else{
		      $ca4x = (($vpes_2016 / $vpes_2015) - 1) * 100;
		      }
			  if($vpes_2016=='0' or $vpes_2016==null){
			  $ca5x ='0';
		      }else{
		      $ca5x = (($vpes_2017 / $vpes_2016) - 1) * 100;
		      }
			  if($vpes_2017=='0' or $vpes_2017==null){
			  $ca6x ='0';
		      }else{
		      $ca6x = (($vpes_2018 / $vpes_2017) - 1) * 100;
		      }
			  if($vpes_2018=='0' or $vpes_2018==null){
			  $ca7x ='0';
		      }else{
		      $ca7x = (($vpes_2019 / $vpes_2018) - 1) * 100;
		      }
	if($vpes_2019=='0' or $vpes_2019==null){
			  $ca8x ='0';
		      }else{
		      $ca8x = (($vpes_2020 / $vpes_2019) - 1) * 100;
		      }
	if($vpes_2020=='0' or $vpes_2020==null){
			  $ca9x ='0';
		      }else{
		      $ca9x = (($vpes_2021 / $vpes_2020) - 1) * 100;
		      }
	if($vpes_2021=='0' or $vpes_2021==null){
			  $ca10x ='0';
		      }else{
		      $ca10x = (($vpes_2022 / $vpes_2021) - 1) * 100;
		      }
			  
			  $var4= number_format(($ca1x + $ca2x + $ca3x + $ca4x + $ca5x + $ca6x + $ca7x + $ca8x + $ca9x)/9,2) ;
		  
		  }
	  }else{
		  $vpes_2012= "0.00";
		   $vpes_2013= "0.00";
		    $vpes_2014= "0.00";
			 $vpes_2015= "0.00";
			  $vpes_2016= "0.00";
			  $vpes_2017= "0.00";
		       $vpes_2018= "0.00";
		  $vpes_2019= "0.00";
	$vpes_2020= "0.00";
	$vpes_2021= "0.00";
	$vpes_2022= "0.00";
	  }
				
//diferencia Precio FOB USD x KG
				if($vpes_2012=="0" or $vpes_2012==null or $vpes_2012==""){
					$preciofob2012 = "0";
					}else{
		$preciofob2012 = $vfob_2012 / $vpes_2012;
					}
		if($vpes_2013=='0' or $vpes_2013==null or $vpes_2013=="")	{
			$preciofob2013 = "0";
		}else{
		$preciofob2013 = $vfob_2013 / $vpes_2013;
			}
		
		if($vpes_2014=='0' or $vpes_2014==null or $vpes_2014==''){
			$preciofob2014 = "0";
		}else{
		$preciofob2014 = $vfob_2014 / $vpes_2014;
			}
		
		if($vpes_2015=='0' or $vpes_2015==null or $vpes_2015==''){
			$preciofob2015 ="0";
		}else{
		$preciofob2015 = $vfob_2015 / $vpes_2015;
			}
		
		if($vpes_2016=='0' or $vpes_2016==null or $vpes_2016==''){
			$preciofob2016 = "0";
		}else{
		$preciofob2016 = $vfob_2016 / $vpes_2016;
			}
			
		if($vpes_2017=='0' or $vpes_2017==null or $vpes_2017==''){
			$preciofob2017 = "0";
		}else{
		$preciofob2017 = $vfob_2017 / $vpes_2017;
			}
		
		if($vpes_2018=='0' or $vpes_2018==null or $vpes_2018==''){
			$preciofob2018 = "0";
		}else{
		$preciofob2018 = $vfob_2018 / $vpes_2018;
			}
		
		if($vpes_2019=='0' or $vpes_2019==null or $vpes_2019==''){
			$preciofob2019 = "0";
		}else{
		$preciofob2019 = $vfob_2019 / $vpes_2019;
			}
					
					if($vpes_2020=='0' or $vpes_2020==null or $vpes_2020==''){
			$preciofob2020 = "0";
		}else{
		$preciofob2020 = $vfob_2020 / $vpes_2020;
			}
					
					if($vpes_2021=='0' or $vpes_2021==null or $vpes_2021==''){
			$preciofob2021 = "0";
		}else{
		$preciofob2021 = $vfob_2021 / $vpes_2021;
			}

if($vpes_2022=='0' or $vpes_2022==null or $vpes_2022==''){
			$preciofob2022 = "0";
		}else{
		$preciofob2022 = $vfob_2022 / $vpes_2022;
			}
		
				// lista
		if($preciofob2020=='0' or $preciofob2020==""){
			$var5='0';
		}else{
		$var5= number_format((($preciofob2021/$preciofob2020) - 1) * 100,2);
			}
		if($preciofob2012=='0' or $preciofob2012==""){
			  $ca1_1 ='0';
		      }else{
		      $ca1_1 = (($preciofob2013 / $preciofob2012) - 1) * 100;
		      }
			   if($preciofob2013=='0' or $preciofob2013==""){
			  $ca2_1 ='0';
		      }else{
		      $ca2_1 = (($preciofob2014 / $preciofob2013) - 1) * 100;
		      }
			   if($preciofob2014=='0' or $preciofob2014==""){
			  $ca3_1 ='0';
		      }else{
		      $ca3_1 = (($preciofob2015 / $preciofob2014) - 1) * 100;
		      }
			   if($preciofob2015=='0' or $preciofob2015==""){
			  $ca4_1 ='0';
		      }else{
		      $ca4_1 = (($preciofob2016 / $preciofob2015) - 1) * 100;
		      }
			  if($preciofob2016=='0' or $preciofob2016==""){
			  $ca5_1 ='0';
		      }else{
		      $ca5_1 = (($preciofob2017 / $preciofob2016) - 1) * 100;
		      }
			  if($preciofob2017=='0'or $preciofob2017==""){
			  $ca6_1 ='0';
		      }else{
		      $ca6_1 = (($preciofob2018 / $preciofob2017) - 1) * 100;
		      }
		if($preciofob2018=='0' or $preciofob2018==""){
			  $ca7_1 ='0';
		      }else{
		      $ca7_1 = (($preciofob2019 / $preciofob2018) - 1) * 100;
		      }
					
			 if($preciofob2019=='0' or $preciofob2019==""){
			  $ca8_1 ='0';
		      }else{
		      $ca8_1 = (($preciofob2020 / $preciofob2019) - 1) * 100;
		      }
			if($preciofob2020=='0' or $preciofob2020==""){
			  $ca9_1 ='0';
		      }else{
		      $ca9_1 = (($preciofob2021 / $preciofob2020) - 1) * 100;
		      }
if($preciofob2021=='0' or $preciofob2021==""){
			  $ca10_1 ='0';
		      }else{
		      $ca10_1 = (($preciofob2022 / $preciofob2021) - 1) * 100;
		      }
			  
			   $var6= number_format(($ca1_1 + $ca2_1 + $ca3_1 + $ca4_1 + $ca5_1 + $ca6_1 + $ca7_1 + $ca8_1 + $ca9_1)/9,2) ;
				
//suma precio bruto
		  $query_vbru = "SELECT 'preciobruto' as VALOR, 
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2012.", 
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2013.", 
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2014.", 
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2015.", 
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2016.",
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2017.",
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2018.",
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2019.",
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2020.",
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2021.",
		  SUM(CASE extract(year from exportacion.fnum) WHEN '2022' THEN exportacion.vpesbru ELSE 0 END) AS ".vpb2022."
          FROM exportacion WHERE $ranfecha $querye AND exportacion.ndoc ='".$paiscode."'";
$resultado_vbru = $conexpg -> prepare($query_vbru); 
$resultado_vbru -> execute(); 
$bruspos = $resultado_vbru -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_vbru -> rowCount() > 0)   { 
foreach($bruspos as $fila_vbru) {
		  $vbru_2012= $fila_vbru -> vpb2012;
		   $vbru_2013= $fila_vbru -> vpb2013;
		    $vbru_2014= $fila_vbru -> vpb2014;
			 $vbru_2015= $fila_vbru -> vpb2015;
			  $vbru_2016= $fila_vbru -> vpb2016;
			  $vbru_2017= $fila_vbru -> vpb2017;
			  $vbru_2018= $fila_vbru -> vpb2018;
			  $vbru_2019= $fila_vbru -> vpb2019;
	$vbru_2020= $fila_vbru -> vpb2020;
	$vbru_2021= $fila_vbru -> vpb2021;
	$vbru_2022= $fila_vbru -> vpb2022;

			  if($vbru_2020=='0' or $vbru_2020==null or $vbru_2020==''){
				$var7="0";  
			  }else{
                $var7= number_format((($vbru_2021/$vbru_2020) - 1) * 100,2);
				  }
			   
			  if($vbru_2012=='0' or $vbru_2012==null or $vbru_2012==''){
			  $ca1_x ='0';
		      }else{
		      $ca1_x = (($vbru_2013 / $vbru_2012) - 1) * 100;
		      }
			  
			   if($vbru_2013=='0' or $vbru_2013==null or $vbru_2013==''){
			  $ca2_x ='0';
		      }else{
		      $ca2_x = (($vbru_2014 / $vbru_2013) - 1) * 100;
		      }
			  
			   if($vbru_2014=='0' or $vbru_2014==null or $vbru_2014==''){
			  $ca3_x ='0';
		      }else{
		      $ca3_x = (($vbru_2015 / $vbru_2014) - 1) * 100;
		      }
			  
			   if($vbru_2015=='0' or $vbru_2015==null or $vbru_2015==''){
			  $ca4_x ='0';
		      }else{
		      $ca4_x = (($vbru_2016 / $vbru_2015) - 1) * 100;
		      }
			  
			  if($vbru_2016=='0' or $vbru_2016==null or $vbru_2016==''){
			  $ca5_x ='0';
		      }else{
		      $ca5_x = (($vbru_2017 / $vbru_2016) - 1) * 100;
		      }
			  
			  if($vbru_2017=='0' or $vbru_2017==null or $vbru_2017==''){
			  $ca6_x ='0';
		      }else{
		      $ca6_x = (($vbru_2018 / $vbru_2017) - 1) * 100;
		      }
			  
			  if($vbru_2018=='0' or $vbru_2018==null or $vbru_2018==''){
			  $ca7_x ='0';
		      }else{
		      $ca7_x = (($vbru_2019 / $vbru_2018) - 1) * 100;
		      }
	
	if($vbru_2019=='0' or $vbru_2019==null or $vbru_2019==''){
			  $ca8_x ='0';
		      }else{
		      $ca8_x = (($vbru_2020 / $vbru_2019) - 1) * 100;
		      }
	
	if($vbru_2020=='0' or $vbru_2020==null or $vbru_2020==''){
			  $ca9_x ='0';
		      }else{
		      $ca9_x = (($vbru_2021 / $vbru_2020) - 1) * 100;
		      }
	if($vbru_2021=='0' or $vbru_2021==null or $vbru_2021==''){
			  $ca10_x ='0';
		      }else{
		      $ca10_x = (($vbru_2021 / $vbru_2020) - 1) * 100;
		      }
			 
			  
			  $var8= number_format(($ca1_x + $ca2_x + $ca3_x + $ca4_x + $ca5_x + $ca6_x + $ca7_x + $ca8_x + $ca9_x)/9,2) ;
		  
		  }
	  }else{
		  $vbru_2012= "0.00";
		   $vbru_2013= "0.00";
		    $vbru_2014= "0.00";
			 $vbru_2015= "0.00";
			  $vbru_2016= "0.00";
			  $vbru_2017= "0.00";
		       $vbru_2018= "0.00";
		  $vbru_2019= "0.00";
	$vbru_2020= "0.00";
	$vbru_2021= "0.00";
	$vbru_2022= "0.00";
	  }
				
//sumamos cantidad exportada 
	  $query_qunifis = "SELECT 'preciobruto' as VALOR, 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.qunifis ELSE 0 END) AS ".quni2012.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.qunifis ELSE 0 END) AS ".quni2013.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.qunifis ELSE 0 END) AS ".quni2014.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.qunifis ELSE 0 END) AS ".quni2015.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.qunifis ELSE 0 END) AS ".quni2016.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.qunifis ELSE 0 END) AS ".quni2017.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.qunifis ELSE 0 END) AS ".quni2018.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.qunifis ELSE 0 END) AS ".quni2019.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.qunifis ELSE 0 END) AS ".quni2020.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.qunifis ELSE 0 END) AS ".quni2021.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2022' THEN exportacion.qunifis ELSE 0 END) AS ".quni2022."
	  FROM exportacion WHERE $ranfecha $querye AND exportacion.ndoc ='".$paiscode."'";
$resultado_qunifis = $conexpg -> prepare($query_qunifis); 
$resultado_qunifis -> execute(); 
$qunipos = $resultado_qunifis -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_qunifis -> rowCount() > 0)   { 
foreach($qunipos as $fila_qunifis) {
		  $qunifis_2012= $fila_qunifis -> quni2012;
		   $qunifis_2013= $fila_qunifis -> quni2013;
		    $qunifis_2014= $fila_qunifis -> quni2014;
			 $qunifis_2015= $fila_qunifis -> quni2015;
			  $qunifis_2016= $fila_qunifis -> quni2016;
			  $qunifis_2017= $fila_qunifis -> quni2017;
			  $qunifis_2018= $fila_qunifis -> quni2018;
			  $qunifis_2019= $fila_qunifis -> quni2019;
	$qunifis_2020= $fila_qunifis -> quni2020;
	$qunifis_2021= $fila_qunifis -> quni2021;
	$qunifis_2022= $fila_qunifis -> quni2022;

if($qunifis_2020=='0' or $qunifis_2020==null or $qunifis_2020==''){
	$var9='0';
}else{
$var9= number_format((($qunifis_2021/$qunifis_2020) - 1) * 100,2);
	}

              if($qunifis_2012=='0' or $qunifis_2012==null or $qunifis_2012==''){
			  $ca1_2 ='0';
		      }else{
		      $ca1_2 = (($qunifis_2013 / $qunifis_2012) - 1) * 100;
		      }
			   if($qunifis_2013=='0' or $qunifis_2013==null or $qunifis_2013==''){
			  $ca2_2 ='0';
		      }else{
		      $ca2_2 = (($qunifis_2014 / $qunifis_2013) - 1) * 100;
		      }
			   if($qunifis_2014=='0' or $qunifis_2014==null or $qunifis_2014==''){
			  $ca3_2 ='0';
		      }else{
		      $ca3_2 = (($qunifis_2015 / $qunifis_2014) - 1) * 100;
		      }
			   if($qunifis_2015=='0' or $qunifis_2015==null or $qunifis_2015==''){
			  $ca4_2 ='0';
		      }else{
		      $ca4_2 = (($qunifis_2016 / $qunifis_2015) - 1) * 100;
		      }
			  if($qunifis_2016=='0' or $qunifis_2016==null or $qunifis_2016==''){
			  $ca5_2 ='0';
		      }else{
		      $ca5_2 = (($qunifis_2017 / $qunifis_2016) - 1) * 100;
		      }
			  if($qunifis_2017=='0' or $qunifis_2017==null or $qunifis_2017==''){
			  $ca6_2 ='0';
		      }else{
		      $ca6_2 = (($qunifis_2018 / $qunifis_2017) - 1) * 100;
		      }
			 if($qunifis_2018=='0' or $qunifis_2018==null or $qunifis_2018==''){
			  $ca7_2 ='0';
		      }else{
		      $ca7_2 = (($qunifis_2019 / $qunifis_2018) - 1) * 100;
		      }
	if($qunifis_2019=='0' or $qunifis_2019==null or $qunifis_2019==''){
			  $ca8_2 ='0';
		      }else{
		      $ca8_2 = (($qunifis_2020 / $qunifis_2019) - 1) * 100;
		      }
	if($qunifis_2020=='0' or $qunifis_2020==null or $qunifis_2020==''){
			  $ca9_2 ='0';
		      }else{
		      $ca9_2 = (($qunifis_2021 / $qunifis_2020) - 1) * 100;
		      }
	if($qunifis_2021=='0' or $qunifis_2021==null or $qunifis_2021==''){
			  $ca10_2 ='0';
		      }else{
		      $ca10_2 = (($qunifis_2021 / $qunifis_2020) - 1) * 100;
		      }
			  
			  $var10= number_format(($ca1_2 + $ca2_2 + $ca3_2 + $ca4_2 + $ca5_2 + $ca6_2 + $ca7_2 + $ca8_2 + $ca9_2)/9,2) ;
		  
		  }
	  }else{
		  $qunifis_2012= "0.00";
		   $qunifis_2013= "0.00";
		    $qunifis_2014= "0.00";
			 $qunifis_2015= "0.00";
			  $qunifis_2016= "0.00";
			  $qunifis_2017= "0.00";
		       $qunifis_2018= "0.00";
		  $qunifis_2019= "0.00";
	$qunifis_2020= "0.00";
	$qunifis_2021= "0.00";
	$qunifis_2022= "0.00";
	  }
				
//sumamos unidades comerciales
	  $query_qunicom = "SELECT 'preciobruto' as VALOR, 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.qunicom ELSE 0 END) AS ".quni2012.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.qunicom ELSE 0 END) AS ".quni2013.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.qunicom ELSE 0 END) AS ".quni2014.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.qunicom ELSE 0 END) AS ".quni2015.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.qunicom ELSE 0 END) AS ".quni2016.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.qunicom ELSE 0 END) AS ".quni2017.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.qunicom ELSE 0 END) AS ".quni2018.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.qunicom ELSE 0 END) AS ".quni2019.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.qunicom ELSE 0 END) AS ".quni2020.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.qunicom ELSE 0 END) AS ".quni2021.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2022' THEN exportacion.qunicom ELSE 0 END) AS ".quni2022."
	  FROM exportacion WHERE $ranfecha $querye AND exportacion.ndoc ='".$paiscode."'";
$resultado_qunicom = $conexpg -> prepare($query_qunicom); 
$resultado_qunicom -> execute(); 
$qucnpos = $resultado_qunicom -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_qunicom -> rowCount() > 0)   { 
foreach($qucnpos as $fila_qunicom) {
		  $qunicom_2012= $fila_qunicom -> quni2012;
		   $qunicom_2013= $fila_qunicom -> quni2013;
		    $qunicom_2014= $fila_qunicom -> quni2014;
			 $qunicom_2015= $fila_qunicom -> quni2015;
			  $qunicom_2016= $fila_qunicom -> quni2016;
			  $qunicom_2017= $fila_qunicom -> quni2017;
			  $qunicom_2018= $fila_qunicom -> quni2018;
			  $qunicom_2019= $fila_qunicom -> quni2019;
	$qunicom_2020= $fila_qunicom -> quni2020;
	$qunicom_2021= $fila_qunicom -> quni2021;
	$qunicom_2022= $fila_qunicom -> quni2022;
			  
			  if($qunicom_2020=='0' or $qunicom_2020==null or $qunicom_2020==''){
				  $var11='0';
			  }else{
			      $var11= number_format((($qunicom_2021/$qunicom_2020) - 1) * 100,2);
				  }

              if($qunicom_2012=='0' or $qunicom_2012==null or $qunicom_2012==''){
			  $ca1_3 ='0';
		      }else{
		      $ca1_3 = (($qunicom_2013 / $qunicom_2012) - 1) * 100;
		      }
			   if($qunicom_2013=='0' or $qunicom_2013==null or $qunicom_2013==''){
			  $ca2_3 ='0';
		      }else{
		      $ca2_3 = (($qunicom_2014 / $qunicom_2013) - 1) * 100;
		      }
			   if($qunicom_2014=='0' or $qunicom_2014==null or $qunicom_2014==''){
			  $ca3_3 ='0';
		      }else{
		      $ca3_3 = (($qunicom_2015 / $qunicom_2014) - 1) * 100;
		      }
			   if($qunicom_2015=='0' or $qunicom_2015==null or $qunicom_2015==''){
			  $ca4_3 ='0';
		      }else{
		      $ca4_3 = (($qunicom_2016 / $qunicom_2015) - 1) * 100;
		      }
			  if($qunicom_2016=='0' or $qunicom_2016==null or $qunicom_2016==''){
			  $ca5_3 ='0';
		      }else{
		      $ca5_3 = (($qunicom_2017 / $qunicom_2016) - 1) * 100;
		      }
			  if($qunicom_2017=='0' or $qunicom_2017==null or $qunicom_2017==''){
			  $ca6_3 ='0';
		      }else{
		      $ca6_3 = (($qunicom_2018 / $qunicom_2017) - 1) * 100;
		      }
			  if($qunicom_2018=='0' or $qunicom_2018==null or $qunicom_2018==''){
			  $ca7_3 ='0';
		      }else{
		      $ca7_3 = (($qunicom_2019 / $qunicom_2018) - 1) * 100;
		      }
	if($qunicom_2019=='0' or $qunicom_2019==null or $qunicom_2019==''){
			  $ca8_3 ='0';
		      }else{
		      $ca8_3 = (($qunicom_2020 / $qunicom_2019) - 1) * 100;
		      }
	if($qunicom_2020=='0' or $qunicom_2020==null or $qunicom_2020==''){
			  $ca9_3 ='0';
		      }else{
		      $ca9_3 = (($qunicom_2021 / $qunicom_2020) - 1) * 100;
		      }
	if($qunicom_2021=='0' or $qunicom_2021==null or $qunicom_2021==''){
			  $ca10_3 ='0';
		      }else{
		      $ca10_3 = (($qunicom_2021 / $qunicom_2020) - 1) * 100;
		      }
			 
			  
			  $var12= number_format(($ca1_3 + $ca2_3 + $ca3_3 + $ca4_3 + $ca5_3 + $ca6_3 + $ca7_3 + $ca8_3 + $ca9_3)/9,2) ;

		  
		  }
	  }else{
		  $qunicom_2012= "0.00";
		   $qunicom_2013= "0.00";
		    $qunicom_2014= "0.00";
			 $qunicom_2015= "0.00";
			  $qunicom_2016= "0.00";
			  $qunicom_2017= "0.00";
		       $qunicom_2018= "0.00";
		  $qunicom_2019= "0.00";
	$qunicom_2020= "0.00";
	$qunicom_2021= "0.00";
	$qunicom_2022= "0.00";
	  }

//cuenta cantidad de registros
	  $query_creg = "SELECT 'cantidadreg' as VALOR, 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN 1 ELSE 0 END) AS ".cr2012.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN 1 ELSE 0 END) AS ".cr2013.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN 1 ELSE 0 END) AS ".cr2014.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN 1 ELSE 0 END) AS ".cr2015.", 
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN 1 ELSE 0 END) AS ".cr2016.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN 1 ELSE 0 END) AS ".cr2017.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN 1 ELSE 0 END) AS ".cr2018.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN 1 ELSE 0 END) AS ".cr2019.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN 1 ELSE 0 END) AS ".cr2020.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN 1 ELSE 0 END) AS ".cr2021.",
	  SUM(CASE extract(year from exportacion.fnum) WHEN '2022' THEN 1 ELSE 0 END) AS ".cr2022."
	  FROM exportacion WHERE $ranfecha $querye AND exportacion.ndoc ='".$paiscode."'";
$resultado_creg = $conexpg -> prepare($query_creg); 
$resultado_creg -> execute(); 
$crenpos = $resultado_creg -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_creg -> rowCount() > 0)   { 
foreach($crenpos as $fila_creg) {
		  $creg_2012= $fila_creg -> cr2012;
		   $creg_2013= $fila_creg -> cr2013;
		    $creg_2014= $fila_creg -> cr2014;
			 $creg_2015= $fila_creg -> cr2015;
			  $creg_2016= $fila_creg -> cr2016;
			  $creg_2017= $fila_creg -> cr2017;
			  $creg_2018= $fila_creg -> cr2018;
			  $creg_2019= $fila_creg -> cr2019;
	$creg_2020= $fila_creg -> cr2020;
	$creg_2021= $fila_creg -> cr2021;
	$creg_2022= $fila_creg -> cr2022;
			  
			  if($creg_2020=='0' or $creg_2020==null or $creg_2020==''){
				  $var13= "0";
			  }else{
			  $var13= number_format((($creg_2021/$creg_2020) - 1) * 100,2);
				  }

              if($creg_2012=='0' or $creg_2012==null or $creg_2012==''){
			  $ca1_4 ='0';
		      }else{
		      $ca1_4 = (($creg_2013 / $creg_2012) - 1) * 100;
		      }
			   if($creg_2013=='0' or $creg_2013==null or $creg_2013==''){
			  $ca2_4 ='0';
		      }else{
		      $ca2_4 = (($creg_2014 / $creg_2013) - 1) * 100;
		      }
			   if($creg_2014=='0' or $creg_2014==null or $creg_2014==''){
			  $ca3_4 ='0';
		      }else{
		      $ca3_4 = (($creg_2015 / $creg_2014) - 1) * 100;
		      }
			   if($creg_2015=='0' or $creg_2015==null or $creg_2015==''){
			  $ca4_4 ='0';
		      }else{
		      $ca4_4 = (($creg_2016 / $creg_2015) - 1) * 100;
		      }
			  if($creg_2016=='0' or $creg_2016==null or $creg_2016==''){
			  $ca5_4 ='0';
		      }else{
		      $ca5_4 = (($creg_2017 / $creg_2016) - 1) * 100;
		      }
			  if($creg_2017=='0' or $creg_2017==null or $creg_2017==''){
			  $ca6_4 ='0';
		      }else{
		      $ca6_4 = (($creg_2018 / $creg_2017) - 1) * 100;
		      }
			  if($creg_2018=='0' or $creg_2018==null or $creg_2018==''){
			  $ca7_4 ='0';
		      }else{
		      $ca7_4 = (($creg_2019 / $creg_2018) - 1) * 100;
		      }
			 if($creg_2019=='0' or $creg_2019==null or $creg_2019==''){
			  $ca8_4 ='0';
		      }else{
		      $ca8_4 = (($creg_2020 / $creg_2019) - 1) * 100;
		      }
	if($creg_2020=='0' or $creg_2020==null or $creg_2020==''){
			  $ca9_4 ='0';
		      }else{
		      $ca9_4 = (($creg_2021 / $creg_2020) - 1) * 100;
		      }
	if($creg_2021=='0' or $creg_2021==null or $creg_2021==''){
			  $ca10_4 ='0';
		      }else{
		      $ca10_4 = (($creg_2022 / $creg_2021) - 1) * 100;
		      }
			  
			  $var14= number_format(($ca1_4 + $ca2_4 + $ca3_4 + $ca4_4 + $ca5_4 + $ca6_4 + $ca7_4 + $ca8_4 + $ca9_4)/9,2) ;

		  
		  }
	  }else{
		  $creg_2012= "0.00";
		   $creg_2013= "0.00";
		    $creg_2014= "0.00";
			 $creg_2015= "0.00";
			  $creg_2016= "0.00";
			  $creg_2017= "0.00";
		       $creg_2018= "0.00";
		  $creg_2019= "0.00";
	$creg_2020= "0.00";
	$creg_2021= "0.00";
	$creg_2022= "0.00";
	  }
	
//cuenta cantidad de partidas
	  $query_parti = "SELECT Count(DISTINCT exportacion.part_nandi) as cant_parti, extract(year from exportacion.fnum) as anio FROM exportacion WHERE $ranfecha $querye AND exportacion.ndoc ='".$paiscode."' GROUP BY anio order BY anio ASC";
$resultado_parti = $conexpg -> prepare($query_parti); 
$resultado_parti -> execute(); 
$cpapos = $resultado_parti -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_parti -> rowCount() > 0)   { 
foreach($cpapos as $fila_parti) {
	
		  $anioparti= $fila_parti -> anio;
		  
		  if($anioparti=='2012'){
			  $rparti2012=$fila_parti -> cant_parti;
		  }
		  if($anioparti=='2013'){
			  $rparti2013=$fila_parti -> cant_parti;
		  }
		  if($anioparti=='2014'){
			  $rparti2014=$fila_parti -> cant_parti;
		  }
		  if($anioparti=='2015'){
			  $rparti2015=$fila_parti -> cant_parti;
		  }
		  if($anioparti=='2016'){
			  $rparti2016=$fila_parti -> cant_parti;
		  }
		  if($anioparti=='2017'){
			  $rparti2017=$fila_parti -> cant_parti;
		  }
			  if($anioparti=='2018'){
			  $rparti2018=$fila_parti -> cant_parti;
		  }
			  if($anioparti=='2019'){
			  $rparti2019=$fila_parti -> cant_parti;
		  }
	if($anioparti=='2020'){
			  $rparti2020=$fila_parti -> cant_parti;
		  }
	if($anioparti=='2021'){
			  $rparti2021=$fila_parti -> cant_parti;
		  }
	if($anioparti=='2022'){
			  $rparti2022=$fila_parti -> cant_parti;
		  }
		  
		  if($rparti2020=='0'  or $rparti2020 == null){
			   $varparti1='0.00';
		   }else{
		   $varparti1= number_format((($rparti2021/$rparti2020) - 1) * 100,2);
		   }
		   
		    if($rparti2012=='0' or $rparti2012=="" or  $rparti2012==null){
			  $parti_1 ='0';
		      }else{
		      $parti_1 = (($rparti2013 / $rparti2012) - 1) * 100;
		      }
			   if($rparti2013=='0' or $rparti2013 == null){
			  $parti_2 ='0';
		      }else{
		      $parti_2 = (($rparti2014 / $rparti2013) - 1) * 100;
		      }
			   if($rparti2014=='0' or $rparti2014 == null){
			  $parti_3 ='0';
		      }else{
		      $parti_3 = (($rparti2015 / $rparti2014) - 1) * 100;
		      }
			   if($rparti2015=='0' or $rparti2015 == null){
			  $parti_4 ='0';
		      }else{
		      $parti_4 = (($rparti2016 / $rparti2015) - 1) * 100;
		      }
			  if($rparti2016=='0' or $rparti2016 == null){
			  $parti_5 ='0';
		      }else{
		      $parti_5 = (($rparti2017 / $rparti2016) - 1) * 100;
		      }
			  if($rparti2017=='0' or $rparti2017 == null){
			  $parti_6 ='0';
		      }else{
		      $parti_6 = (($rparti2018 / $rparti2017) - 1) * 100;
		      }
			  if($rparti2018=='0' or $rparti2018 == null){
			  $parti_7 ='0';
		      }else{
		      $parti_7 = (($rparti2019 / $rparti2018) - 1) * 100;
		      }
	if($rparti2019=='0' or $rparti2019 == null){
			  $parti_8 ='0';
		      }else{
		      $parti_8 = (($rparti2020 / $rparti2019) - 1) * 100;
		      }
	if($rparti2020=='0' or $rparti2020 == null){
			  $parti_9 ='0';
		      }else{
		      $parti_9 = (($rparti2021 / $rparti2020) - 1) * 100;
		      }
	if($rparti2021=='0' or $rparti2021 == null){
			  $parti_10 ='0';
		      }else{
		      $parti_10 = (($rparti2022 / $rparti2021) - 1) * 100;
		      }
			  
		  $varparti2= number_format(($parti_1 + $parti_2 + $parti_3 + $parti_4 + $parti_5 + $parti_6 + $parti_7 + $parti_8 + $parti_9)/9,2) ;
		  
		  }
	  }else{
		  $rparti2012= "0.00";
		  $rparti2013= "0.00";
		  $rparti2014= "0.00";
		  $rparti2015= "0.00";
		  $rparti2016= "0.00";
		  $rparti2017= "0.00";
		  $rparti2018= "0.00";
		  $rparti2019= "0.00";
	$rparti2020= "0.00";
	$rparti2021= "0.00";
	$rparti2022= "0.00";
	  }

//cuenta cantidad de duas
	   $query_dua = "SELECT Count(DISTINCT exportacion.ndcl) as cant_dua, extract(year from exportacion.fnum) as anio FROM exportacion WHERE $ranfecha $querye AND exportacion.ndoc ='".$paiscode."' GROUP BY anio order BY anio ASC";	
$resultado_dua = $conexpg -> prepare($query_dua); 
$resultado_dua -> execute(); 
$duapos = $resultado_dua -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_dua -> rowCount() > 0)   { 
foreach($duapos as $fila_dua) {
		  $aniodua= $fila_dua -> anio ;
		  
		  if($aniodua=='2012'){
			  $rdua2012=$fila_dua -> cant_dua;
		  }else{
			  $rdua2012="0";
		  }
		  if($aniodua=='2013'){
			  $rdua2013=$fila_dua -> cant_dua;
		  }else{
			  $rdua2013="0";
		  }
		  if($aniodua=='2014'){
			  $rdua2014=$fila_dua -> cant_dua;
		  }else{
			  $rdua2014="0";
		  }
		  if($aniodua=='2015'){
			  $rdua2015=$fila_dua -> cant_dua;
		  }else{
			  $rdua2015="0";
		  }
		  if($aniodua=='2016'){
			  $rdua2016=$fila_dua -> cant_dua;
		  }else{
			  $rdua2016="0";
		  }
		  if($aniodua=='2017'){
			  $rdua2017=$fila_dua -> cant_dua;
		  }else{
			  $rdua2017="0";
		  }
		  if($aniodua=='2018'){
			  $rdua2018=$fila_dua -> cant_dua;
		  }else{
			  $rdua2018="0";
		  }
			  if($aniodua=='2019'){
			  $rdua2019=$fila_dua -> cant_dua;
		  }else{
				  $rdua2019="0";
			  }
	if($aniodua=='2020'){
			  $rdua2020=$fila_dua -> cant_dua;
		  }else{
		$rdua2020="0";
	}
	if($aniodua=='2021'){
			  $rdua2021=$fila_dua -> cant_dua;
		  }else{
		$rdua2021="0";
	}
	if($aniodua=='2022'){
			  $rdua2022=$fila_dua -> cant_dua;
		  }else{
		$rdua2022="0";
	}
	
		   if($rdua2020=='0'  or $rdua2020 == null){
			   $var15='0.00';
		   }else{
		   $var15= number_format((($rdua2021/$rdua2020) - 1) * 100,2);
		   }

              if($rdua2012=='0' or $rdua2012 == null){
			  $ca1_5 ='0';
		      }else{
		      $ca1_5 = (($rdua2013 / $rdua2012) - 1) * 100;
		      }
			   if($rdua2013=='0' or $rdua2013 == null){
			  $ca2_5 ='0';
		      }else{
		      $ca2_5 = (($rdua2014 / $rdua2013) - 1) * 100;
		      }
			   if($rdua2014=='0' or $rdua2014 == null){
			  $ca3_5 ='0';
		      }else{
		      $ca3_5 = (($rdua2015 / $rdua2014) - 1) * 100;
		      }
			   if($rdua2015=='0' or $rdua2015 == null){
			  $ca4_5 ='0';
		      }else{
		      $ca4_5 = (($rdua2016 / $rdua2015) - 1) * 100;
		      }
			  if($rdua2016=='0' or $rdua2016 == null){
			  $ca5_5 ='0';
		      }else{
		      $ca5_5 = (($rdua2017 / $rdua2016) - 1) * 100;
		      }
			  if($rdua2017=='0' or $rdua2017 == null){
			  $ca6_5 ='0';
		      }else{
		      $ca6_5 = (($rdua2018 / $rdua2017) - 1) * 100;
		      }
			  if($rdua2018=='0' or $rdua2018 == null){
			  $ca7_5 ='0';
		      }else{
		      $ca7_5 = (($rdua2019 / $rdua2018) - 1) * 100;
		      }
			 if($rdua2019=='0' or $rdua2019 == null){
			  $ca8_5 ='0';
		      }else{
		      $ca8_5 = (($rdua2020 / $rdua2019) - 1) * 100;
		      }
	if($rdua2020=='0' or $rdua2020 == null){
			  $ca9_5 ='0';
		      }else{
		      $ca9_5 = (($rdua2021 / $rdua2020) - 1) * 100;
		      }
	if($rdua2021=='0' or $rdua2021 == null){
			  $ca10_5 ='0';
		      }else{
		      $ca10_5 = (($rdua2022 / $rdua2021) - 1) * 100;
		      }
			  
			  $var16= number_format(($ca1_5 + $ca2_5 + $ca3_5 + $ca4_5 + $ca5_5 + $ca6_5 + $ca7_5 + $ca8_5 + $ca9_5)/9,2) ;
		   
		  }
	  }else{
		  $rdua2012= "0.00";
		   $rdua2013= "0.00";
		    $rdua2014= "0.00";
			 $rdua2015= "0.00";
			  $rdua2016= "0.00";
			  $rdua2017= "0.00";
		       $rdua2018= "0.00";
		  $rdua2019= "0.00";
	$rdua2020= "0.00";
	$rdua2021= "0.00";
	$rdua2022= "0.00";
	  }
				
//cuenta cantidad de empresas
	  /* $query_emp = "SELECT Count(DISTINCT exportacion.dnombre) as cant_nom, extract(year from exportacion.fnum) as anio FROM exportacion WHERE $ranfecha $queryx AND exportacion.cpaides ='".$paiscode."' GROUP BY anio order BY anio ASC";
$resultado_emp = $conexpg -> prepare($query_emp); 
$resultado_emp -> execute(); 
$emppos = $resultado_emp -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_emp -> rowCount() > 0)   { 
foreach($emppos as $fila_emp) {
		  $anioemp= $fila_emp -> anio;
		  
		  if($anioemp=='2012'){
			  $remp2012=$fila_emp -> cant_nom;
		  }else{
			  $remp2012="0";
		  }
		  if($anioemp=='2013'){
			  $remp2013=$fila_emp -> cant_nom;
		  }else{
			  $remp2013="0";
		  }
		  if($anioemp=='2014'){
			  $remp2014=$fila_emp -> cant_nom;
		  }else{
			  $remp2014="0";
		  }
		  if($anioemp=='2015'){
			  $remp2015=$fila_emp -> cant_nom;
		  }else{
			  $remp2015="0";
		  }
		  if($anioemp=='2016'){
			  $remp2016=$fila_emp -> cant_nom;
		  }else{
			  $remp2016="0";
		  }
		  if($anioemp=='2017'){
			  $remp2017=$fila_emp -> cant_nom;
		  }else{
			  $remp2017="0";
		  }
		  if($anioemp=='2018'){
			  $remp2018=$fila_emp -> cant_nom;
		  }else{
			  $remp2018="0";
		  }
			  if($anioemp=='2019'){
			  $remp2019=$fila_emp -> cant_nom;
		  }else{
				  $remp2019="0";
			  }
	if($anioemp=='2020'){
			  $remp2020=$fila_emp -> cant_nom;
		  }else{
		$remp2020="0";
	}
	if($anioemp=='2021'){
			  $remp2021=$fila_emp -> cant_nom;
		  }else{
		$remp2021="0";
	}
	if($anioemp=='2022'){
			  $remp2022=$fila_emp -> cant_nom;
		  }else{
		$remp2022="0";
	}
		  
		  if($remp2020=='0'  or $remp2020 == null){
			   $var17='0.00';
		   }else{
		   $var17= number_format((($remp2021/$remp2020) - 1) * 100,2);
		   }

              if($remp2012=='0' or $remp2012 == null){
			  $ca1_6 ='0';
		      }else{
		      $ca1_6 = (($remp2013 / $remp2012) - 1) * 100;
		      }
			   if($remp2013=='0' or $remp2013 == null){
			  $ca2_6 ='0';
		      }else{
		      $ca2_6 = (($remp2014 / $remp2013) - 1) * 100;
		      }
			   if($remp2014=='0' or $remp2014 == null){
			  $ca3_6 ='0';
		      }else{
		      $ca3_6 = (($remp2015 / $remp2014) - 1) * 100;
		      }
			   if($remp2015=='0' or $remp2015 == null){
			  $ca4_6 ='0';
		      }else{
		      $ca4_6 = (($remp2016 / $remp2015) - 1) * 100;
		      }
			  if($remp2016=='0' or $remp2016 == null){
			  $ca5_6 ='0';
		      }else{
		      $ca5_6 = (($remp2017 / $remp2016) - 1) * 100;
		      }
			  if($remp2017=='0' or $remp2017 == null){
			  $ca6_6 ='0';
		      }else{
		      $ca6_6 = (($remp2018 / $remp2017) - 1) * 100;
		      }
			  if($remp2018=='0' or $remp2018 == null){
			  $ca7_6 ='0';
		      }else{
		      $ca7_6 = (($remp2019 / $remp2018) - 1) * 100;
		      }
	if($remp2019=='0' or $remp2019 == null){
			  $ca8_6 ='0';
		      }else{
		      $ca8_6 = (($remp2020 / $remp2019) - 1) * 100;
		      }
	if($remp2020=='0' or $remp2020 == null){
			  $ca9_6 ='0';
		      }else{
		      $ca9_6 = (($remp2020 / $remp2019) - 1) * 100;
		      }
	if($remp2021=='0' or $remp2021 == null){
			  $ca10_6 ='0';
		      }else{
		      $ca10_6 = (($remp2021 / $remp2020) - 1) * 100;
		      }
			  
			  $var18= number_format(($ca1_6 + $ca2_6 + $ca3_6 + $ca4_6 + $ca5_6 + $ca6_6 + $ca7_6 + $ca8_6 + $ca9_6)/9,2) ;
		   
		  }
	  }else{
		  $remp2012= "0.00";
		   $remp2013= "0.00";
		    $remp2014= "0.00";
			 $remp2015= "0.00";
			  $remp2016= "0.00";
			  $remp2017= "0.00";
		       $remp2018= "0.00";
		  $remp2019= "0.00";
	$remp2020= "0.00";
	$remp2021= "0.00";
	$remp2022= "0.00";
	  } */
				
//cantidad de mercados
	  $query_merca = "SELECT Count(DISTINCT exportacion.cpaides) as cant_mer, extract(year from exportacion.fnum) as anio FROM exportacion WHERE $ranfecha $querye AND exportacion.ndoc ='".$paiscode."' GROUP BY anio order BY anio ASC";
$resultado_merca = $conexpg -> prepare($query_merca); 
$resultado_merca -> execute(); 
$mercapos = $resultado_merca -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_merca -> rowCount() > 0)   { 
foreach($mercapos as $fila_merca) {
		  $aniomerca= $fila_merca -> anio;
		  
		  if($aniomerca=='2012'){
			  $rmer2012=$fila_merca -> cant_mer;
		  }else{
			  $rmer2012="0";
		  }
		  if($aniomerca=='2013'){
			  $rmer2013=$fila_merca -> cant_mer;
		  }else{
			  $rmer2013="0";
		  }
		  if($aniomerca=='2014'){
			  $rmer2014=$fila_merca -> cant_mer;
		  }else{
			  $rmer2014="0";
		  }
		  if($aniomerca=='2015'){
			  $rmer2015=$fila_merca -> cant_mer;
		  }else{
			  $rmer2015="0";
		  }
		  if($aniomerca=='2016'){
			  $rmer2016=$fila_merca -> cant_mer;
		  }else{
			  $rmer2016="0";
		  }
		  if($aniomerca=='2017'){
			  $rmer2017=$fila_merca -> cant_mer;
		  }else{
			  $rmer2017="0";
		  }
		  if($aniomerca=='2018'){
			  $rmer2018=$fila_merca -> cant_mer;
		  }else{
			  $rmer2018="0";
		  }
			  if($aniomerca=='2019'){
			  $rmer2019=$fila_merca -> cant_mer;
		  }else{
				  $rmer2019="0";
			  }
	if($aniomerca=='2020'){
			  $rmer2020=$fila_merca -> cant_mer;
		  }else{
		$rmer2020="0";
	}
	if($aniomerca=='2021'){
			  $rmer2021=$fila_merca -> cant_mer;
		  }else{
		$rmer2021="0";
	}
	if($aniomerca=='2022'){
			  $rmer2022=$fila_merca -> cant_mer;
		  }else{
		$rmer2022="0";
	}
		  
		  
		  if($rmer2020=='0'  or $rmer2020 == null){
			   $var19='0.00';
		   }else{
		   $var19= number_format((($rmer2021/$rmer2020) - 1) * 100,2);
		   }

              if($rmer2012=='0' or $rmer2012 == null){
			  $ca1_7 ='0';
		      }else{
		      $ca1_7 = (($rmer2013 / $rmer2012) - 1) * 100;
		      }
			   if($rmer2013=='0' or $rmer2013 == null){
			  $ca2_7 ='0';
		      }else{
		      $ca2_7 = (($rmer2014 / $rmer2013) - 1) * 100;
		      }
			   if($rmer2014=='0' or $rmer2014 == null){
			  $ca3_7 ='0';
		      }else{
		      $ca3_7 = (($rmer2015 / $rmer2014) - 1) * 100;
		      }
			   if($rmer2015=='0' or $rmer2015 == null){
			  $ca4_7 ='0';
		      }else{
		      $ca4_7 = (($rmer2016 / $rmer2015) - 1) * 100;
		      }
			  if($rmer2016=='0' or $rmer2016 == null){
			  $ca5_7 ='0';
		      }else{
		      $ca5_7 = (($rmer2017 / $rmer2016) - 1) * 100;
		      }
			  if($rmer2017=='0' or $rmer2017 == null){
			  $ca6_7 ='0';
		      }else{
		      $ca6_7 = (($rmer2018 / $rmer2017) - 1) * 100;
		      }
			  if($rmer2018=='0' or $rmer2018 == null){
			  $ca7_7 ='0';
		      }else{
		      $ca7_7 = (($rmer2019 / $rmer2018) - 1) * 100;
		      }
	if($rmer2019=='0' or $rmer2019 == null){
			  $ca8_7 ='0';
		      }else{
		      $ca8_7 = (($rmer2020 / $rmer2019) - 1) * 100;
		      }
	if($rmer2020=='0' or $rmer2020 == null){
			  $ca9_7 ='0';
		      }else{
		      $ca9_7 = (($rmer2021 / $rmer2020) - 1) * 100;
		      }
	if($rmer2021=='0' or $rmer2021 == null){
			  $ca10_7 ='0';
		      }else{
		      $ca10_7 = (($rmer2022 / $rmer2021) - 1) * 100;
		      }
			  
			  $var20= number_format(($ca1_7 + $ca2_7 + $ca3_7 + $ca4_7 + $ca5_7 + $ca6_7 + $ca7_7 + $ca8_7 + $ca9_7)/9,2) ;
		   
		  }
	  }else{
		  $rmer2012= "0.00";
		   $rmer2013= "0.00";
		    $rmer2014= "0.00";
			 $rmer2015= "0.00";
			  $rmer2016= "0.00";
			  $rmer2017= "0.00";
		       $rmer2018= "0.00";
		  $rmer2019= "0.00";
	$rmer2020= "0.00";
	$rmer2021= "0.00";
	$rmer2022= "0.00";
	  }
				
//contamos cantidad de puertos
	   $query_pue = "SELECT Count(DISTINCT exportacion.cpuedes) as cant_pue, extract(year from exportacion.fnum) as anio FROM exportacion WHERE $ranfecha $querye AND exportacion.ndoc ='".$paiscode."' GROUP BY anio order BY anio ASC";
$resultado_pue = $conexpg -> prepare($query_pue); 
$resultado_pue -> execute(); 
$puepos = $resultado_pue -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_pue -> rowCount() > 0)   { 
foreach($puepos as $fila_pue) {
		  $aniopue= $fila_pue -> anio;
		  
		  if($aniopue=='2012'){
			  $rpue2012=$fila_pue -> cant_pue;
		  }else{
			  $rpue2012="0";
		  }
		  if($aniopue=='2013'){
			  $rpue2013=$fila_pue -> cant_pue;
		  }else{
			  $rpue2013="0";
		  }
		  if($aniopue=='2014'){
			  $rpue2014=$fila_pue -> cant_pue;
		  }else{
			  $rpue2014="0";
		  }
		  if($aniopue=='2015'){
			  $rpue2015=$fila_pue -> cant_pue;
		  }else{
			  $rpue2015="0";
		  }
		  if($aniopue=='2016'){
			  $rpue2016=$fila_pue -> cant_pue;
		  }else{
			  $rpue2016="0";
		  }
		  if($aniopue=='2017'){
			  $rpue2017=$fila_pue -> cant_pue;
		  }else{
			  $rpue2017="0";
		  }
		  if($aniopue=='2018'){
			  $rpue2018=$fila_pue -> cant_pue;
		  }else{
			  $rpue2018="0";
		  }
			  if($aniopue=='2019'){
			  $rpue2019=$fila_pue -> cant_pue;
		  }else{
				  $rpue2019="0";
			  }
	if($aniopue=='2020'){
			  $rpue2020=$fila_pue -> cant_pue;
		  }else{
		$rpue2020="0";
	}
	if($aniopue=='2021'){
			  $rpue2021=$fila_pue -> cant_pue;
		  }else{
		$rpue2021="0";
	}
	if($aniopue=='2022'){
			  $rpue2022=$fila_pue -> cant_pue;
		  }else{
		$rpue2022="0";
	}
		  
		  if($rpue2020=='0'  or $rpue2020 == null){
			   $var21='0.00';
		   }else{
		  $var21= number_format((($rpue2021/$rpue2020) - 1) * 100,2);
		   }

              if($rpue2012=='0' or $rpue2012 == null){
			  $ca1_8 ='0';
		      }else{
		      $ca1_8 = (($rpue2013 / $rpue2012) - 1) * 100;
		      }
			  
			   if($rpue2013=='0' or $rpue2013 == null){
			  $ca2_8 ='0';
		      }else{
		      $ca2_8 = (($rpue2014 / $rpue2013) - 1) * 100;
		      }
			  
			   if($rpue2014=='0' or $rpue2014 == null){
			  $ca3_8 ='0';
		      }else{
		      $ca3_8 = (($rpue2015 / $rpue2014) - 1) * 100;
		      }
			  
			   if($rpue2015=='0' or $rpue2015 == null){
			  $ca4_8 ='0';
		      }else{
		      $ca4_8 = (($rpue2016 / $rpue2015) - 1) * 100;
		      }
			  
			  if($rpue2016=='0' or $rpue2016 == null){
			  $ca5_8 ='0';
		      }else{
		      $ca5_8 = (($rpue2017 / $rpue2016) - 1) * 100;
		      }
			  
			  if($rpue2017=='0' or $rpue2017 == null){
			  $ca6_8 ='0';
		      }else{
		      $ca6_8 = (($rpue2018 / $rpue2017) - 1) * 100;
		      }
			  
			  if($rpue2018=='0' or $rpue2018 == null){
			  $ca7_8 ='0';
		      }else{
		      $ca7_8 = (($rpue2019 / $rpue2018) - 1) * 100;
		      }
	if($rpue2019=='0' or $rpue2019 == null){
			  $ca8_8 ='0';
		      }else{
		      $ca8_8 = (($rpue2020 / $rpue2019) - 1) * 100;
		      }
	if($rpue2020=='0' or $rpue2020 == null){
			  $ca9_8 ='0';
		      }else{
		      $ca9_8 = (($rpue2021 / $rpue2020) - 1) * 100;
		      }
	if($rpue2021=='0' or $rpue2021 == null){
			  $ca10_8 ='0';
		      }else{
		      $ca10_8 = (($rpue2022 / $rpue2021) - 1) * 100;
		      }
			  
			  $var22= number_format(($ca1_8 + $ca2_8 + $ca3_8 + $ca4_8 + $ca5_8 + $ca6_8 + $ca7_8 + $ca8_8 + $ca9_8)/9,2) ;
		  
		   
		  }
	  }else{
		  $rpue2012= "0.00";
		   $rpue2013= "0.00";
		    $rpue2014= "0.00";
			 $rpue2015= "0.00";
			  $rpue2016= "0.00";
			  $rpue2017= "0.00";
		       $rpue2018= "0.00";
		  $rpue2019= "0.00";
	$rpue2020= "0.00";
	$rpue2021= "0.00";
	$rpue2022= "0.00";
	  }
				
//contamos cantidad de aduanas
	   $query_adua = "SELECT Count(DISTINCT exportacion.cadu) as cant_adua, extract(year from exportacion.fnum) as anio FROM exportacion WHERE $ranfecha $querye AND exportacion.ndoc ='".$paiscode."' GROUP BY anio order BY anio ASC";
$resultado_adua = $conexpg -> prepare($query_adua); 
$resultado_adua -> execute(); 
$aduapos = $resultado_adua -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_adua -> rowCount() > 0)   { 
foreach($aduapos as $fila_adua) {
		  $anioadua= $fila_adua -> anio;
		  
		  if($anioadua=='2012'){
			  $radua2012=$fila_adua -> cant_adua;
		  }else{
			  $radua2012="0";
		  }
		  if($anioadua=='2013'){
			  $radua2013=$fila_adua -> cant_adua;
		  }else{
			  $radua2013="0";
		  }
		  if($anioadua=='2014'){
			  $radua2014=$fila_adua -> cant_adua;
		  }else{
			  $radua2014="0";
		  }
		  if($anioadua=='2015'){
			  $radua2015=$fila_adua -> cant_adua;
		  }else{
			  $radua2015="0";
		  }
		  if($anioadua=='2016'){
			  $radua2016=$fila_adua -> cant_adua;
		  }else{
			  $radua2016="0";
		  }
		  if($anioadua=='2017'){
			  $radua2017=$fila_adua -> cant_adua;
		  }else{
			  $radua2017="0";
		  }
		  if($anioadua=='2018'){
			  $radua2018=$fila_adua -> cant_adua;
		  }else{
			  $radua2018="0";
		  }
			  if($anioadua=='2019'){
			  $radua2019=$fila_adua -> cant_adua;
		  }else{
				  $radua2019="0";
			  }
	if($anioadua=='2020'){
			  $radua2020=$fila_adua -> cant_adua;
		  }else{
		$radua2020="0";
	}
	if($anioadua=='2021'){
			  $radua2021=$fila_adua -> cant_adua;
		  }else{
		$radua2021="0";
	}
	if($anioadua=='2022'){
			  $radua2022=$fila_adua -> cant_adua;
		  }else{
		$radua2022="0";
	}
		  
		  if($radua2020=='0'  or $radua2020 == null){
			   $var23='0.00';
		   }else{
		   $var23= number_format((($radua2021/$radua2020) - 1) * 100,2);
		   }

              if($radua2012=='0' or $radua2012 == null){
			  $ca1_8 ='0';
		      }else{
		      $ca1_8 = (($radua2013 / $radua2012) - 1) * 100;
		      }
			   if($radua2013=='0' or $radua2013 == null){
			  $ca2_8 ='0';
		      }else{
		      $ca2_8 = (($radua2014 / $radua2013) - 1) * 100;
		      }
			   if($radua2014=='0' or $radua2014 == null){
			  $ca3_8 ='0';
		      }else{
		      $ca3_8 = (($radua2015 / $radua2014) - 1) * 100;
		      }
			   if($radua2015=='0' or $radua2015 == null){
			  $ca4_8 ='0';
		      }else{
		      $ca4_8 = (($radua2016 / $radua2015) - 1) * 100;
		      }
			  if($radua2016=='0' or $radua2016 == null){
			  $ca5_8 ='0';
		      }else{
		      $ca5_8 = (($radua2017 / $radua2016) - 1) * 100;
		      }
			  if($radua2017=='0' or $radua2017 == null){
			  $ca6_8 ='0';
		      }else{
		      $ca6_8 = (($radua2018 / $radua2017) - 1) * 100;
		      }
			  if($radua2018=='0' or $radua2018 == null){
			  $ca7_8 ='0';
		      }else{
		      $ca7_8 = (($radua2019 / $radua2018) - 1) * 100;
		      }
	if($radua2019=='0' or $radua2019 == null){
			  $ca8_8 ='0';
		      }else{
		      $ca8_8 = (($radua2020 / $radua2019) - 1) * 100;
		      }
	if($radua2020=='0' or $radua2020 == null){
			  $ca9_8 ='0';
		      }else{
		      $ca9_8 = (($radua2020 / $radua2019) - 1) * 100;
		      }
	if($radua2021=='0' or $radua2021 == null){
			  $ca10_8 ='0';
		      }else{
		      $ca10_8 = (($radua2021 / $radua2020) - 1) * 100;
		      }
			  
			  $var24= number_format(($ca1_8 + $ca2_8 + $ca3_8 + $ca4_8 + $ca5_8 + $ca6_8 + $ca7_8 + $ca8_8 + $ca9_8)/9,2) ;
		   
		  }
	  }else{
		  $radua2012= "0.00";
		   $radua2013= "0.00";
		    $radua2014= "0.00";
			 $radua2015= "0.00";
			  $radua2016= "0.00";
			  $radua2017= "0.00";
		       $radua2018= "0.00";
		  $radua2019= "0.00";
	$radua2020= "0.00";
	$radua2021= "0.00";
	$radua2022= "0.00";
	  }
				
//contamnos cantidad de departamento
	   $query_depa = "SELECT COUNT(DISTINCT departamento.nombre) as departamento, extract(year from exportacion.fnum) as anio FROM exportacion LEFT JOIN departamento ON  ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE $ranfecha $querye AND exportacion.ndoc='".$paiscode."' GROUP BY anio ORDER BY anio ASC";	
$resultado_depa = $conexpg -> prepare($query_depa); 
$resultado_depa -> execute(); 
$depapos = $resultado_depa -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_depa -> rowCount() > 0)   { 
foreach($depapos as $fila_depa) {
		  $aniodepa= $fila_depa -> anio;
		  
		  if($aniodepa=='2012'){
			  $rdepa2012=$fila_depa -> departamento;
		  }else{
			  $rdepa2012="0";
		  }
		  if($aniodepa=='2013'){
			  $rdepa2013=$fila_depa -> departamento;
		  }else{
			  $rdepa2013="0";
		  }
		  if($aniodepa=='2014'){
			  $rdepa2014=$fila_depa -> departamento;
		  }else{
			  $rdepa2014="0";
		  }
		  if($aniodepa=='2015'){
			  $rdepa2015=$fila_depa -> departamento;
		  }else{
			  $rdepa2015="0";
		  }
		  if($aniodepa=='2016'){
			  $rdepa2016=$fila_depa -> departamento;
		  }else{
			  $rdepa2016="0";
		  }
		  if($aniodepa=='2017'){
			  $rdepa2017=$fila_depa -> departamento;
		  }else{
			  $rdepa2017="0";
		  }
		  if($aniodepa=='2018'){
			  $rdepa2018=$fila_depa -> departamento;
		  }else{
			  $rdepa2018="0";
		  }
			  if($aniodepa=='2019'){
			  $rdepa2019=$fila_depa -> departamento;
		  }else{
			  $rdepa2019="0";
		  }
	if($aniodepa=='2020'){
			  $rdepa2020=$fila_depa -> departamento;
		  }else{
			  $rdepa2020="0";
		  }
	if($aniodepa=='2021'){
			  $rdepa2021=$fila_depa -> departamento;
		  }else{
			  $rdepa2021="0";
		  }
	if($aniodepa=='2022'){
			  $rdepa2022=$fila_depa -> departamento;
		  }else{
			  $rdepa2022="0";
		  }
		  
		  if($rdepa2020=='0'  or $rdepa2020 == null){
			   $var25='0.00';
		   }else{
		  $var25= number_format((($rdepa2021/$rdepa2020) - 1) * 100,2);
		   }

              if($rdepa2012=='0' or $rdepa2012 == null){
			  $ca1_9 ='0';
		      }else{
		      $ca1_9 = (($rdepa2013 / $rdepa2012) - 1) * 100;
		      }
			   if($rdepa2013=='0' or $rdepa2013 == null){
			  $ca2_9 ='0';
		      }else{
		      $ca2_9 = (($rdepa2014 / $rdepa2013) - 1) * 100;
		      }
			   if($rdepa2014=='0' or $rdepa2014 == null){
			  $ca3_9 ='0';
		      }else{
		      $ca3_9 = (($rdepa2015 / $rdepa2014) - 1) * 100;
		      }
			   if($rdepa2015=='0' or $rdepa2015 == null){
			  $ca4_9 ='0';
		      }else{
		      $ca4_9 = (($rdepa2016 / $rdepa2015) - 1) * 100;
		      }
			  if($rdepa2016=='0' or $rdepa2016 == null){
			  $ca5_9 ='0';
		      }else{
		      $ca5_9 = (($rdepa2017 / $rdepa2016) - 1) * 100;
		      }
			  if($rdepa2017=='0' or $rdepa2017 == null){
			  $ca6_9 ='0';
		      }else{
		      $ca6_9 = (($rdepa2018 / $rdepa2017) - 1) * 100;
		      }
			  if($rdepa2018=='0' or $rdepa2018 == null){
			  $ca7_9 ='0';
		      }else{
		      $ca7_9 = (($rdepa2019 / $rdepa2018) - 1) * 100;
		      }
	if($rdepa2019=='0' or $rdepa2019 == null){
			  $ca8_9 ='0';
		      }else{
		      $ca8_9 = (($rdepa2020 / $rdepa2019) - 1) * 100;
		      }
	if($rdepa2020=='0' or $rdepa2020 == null){
			  $ca9_9 ='0';
		      }else{
		      $ca9_9 = (($rdepa2021 / $rdepa2020) - 1) * 100;
		      }
	if($rdepa2021=='0' or $rdepa2021 == null){
			  $ca10_9 ='0';
		      }else{
		      $ca10_9 = (($rdepa2021 / $rdepa2020) - 1) * 100;
		      }
			  
			  $var26= number_format(($ca1_9 + $ca2_9 + $ca3_9 + $ca4_9 + $ca5_9 + $ca6_9 + $ca7_9 + $ca8_9 + $ca9_9)/9,2) ;
		   
		  }
	  }else{
		  $rdepa2012= "0.00";
		   $rdepa2013= "0.00";
		    $rdepa2014= "0.00";
			 $rdepa2015= "0.00";
			  $rdepa2016= "0.00";
			  $rdepa2017= "0.00";
		       $rdepa2018= "0.00";
		  $rdepa2019= "0.00";
	$rdepa2020= "0.00";
	$rdepa2021= "0.00";
	$rdepa2022= "0.00";
	  }

//contamnos cantidad de provincia
	   $query_prov = "SELECT count(DISTINCT provincia.nombre) as provincia, extract(year from exportacion.fnum) as anio FROM exportacion LEFT JOIN departamento ON  (((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))  INNER JOIN provincia ON provincia.iddepartamento = departamento.iddepartamento WHERE $ranfecha $querye AND exportacion.ndoc='".$paiscode."' GROUP BY anio ORDER BY anio ASC";
$resultado_prov = $conexpg -> prepare($query_prov); 
$resultado_prov -> execute(); 
$dpropos = $resultado_prov -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_prov -> rowCount() > 0)   { 
foreach($dpropos as $fila_prov) {
		  $anioprov= $fila_prov -> anio;
		  
		  if($anioprov=='2012'){
			  $rprov2012=$fila_prov -> provincia;
		  }
		  if($anioprov=='2013'){
			  $rprov2013=$fila_prov -> provincia;
		  }
		  if($anioprov=='2014'){
			  $rprov2014=$fila_prov -> provincia;
		  }
		  if($anioprov=='2015'){
			  $rprov2015=$fila_prov -> provincia;
		  }
		  if($anioprov=='2016'){
			  $rprov2016=$fila_prov -> provincia;
		  }
		  if($anioprov=='2017'){
			  $rprov2017=$fila_prov -> provincia;
		  }
		  if($anioprov=='2018'){
			  $rprov2018=$fila_prov -> provincia;
		  }
			  if($anioprov=='2019'){
			  $rprov2019=$fila_prov -> provincia;
		  }
		  if($anioprov=='2020'){
			  $rprov2020=$fila_prov -> provincia;
		  }
	if($anioprov=='2021'){
			  $rprov2021=$fila_prov -> provincia;
		  }
	if($anioprov=='2022'){
			  $rprov2022=$fila_prov -> provincia;
		  }
	
		   if($rprov2020=='0'  or $rprov2020 == null){
			   $var25x='0.00';
		   }else{
		  $var25x= number_format((($rprov2021/$rprov2020) - 1) * 100,2);
		   }

              if($rprov2012=='0' or $rprov2012 == null){
			  $ca1_9x ='0';
		      }else{
		      $ca1_9x = (($rprov2013 / $rprov2012) - 1) * 100;
		      }
			   if($rprov2013=='0' or $rprov2013 == null){
			  $ca2_9x ='0';
		      }else{
		      $ca2_9x = (($rprov2014 / $rprov2013) - 1) * 100;
		      }
			   if($rprov2014=='0' or $rprov2014 == null){
			  $ca3_9x ='0';
		      }else{
		      $ca3_9x = (($rprov2015 / $rprov2014) - 1) * 100;
		      }
			   if($rprov2015=='0' or $rprov2015 == null){
			  $ca4_9x ='0';
		      }else{
		      $ca4_9x = (($rprov2016 / $rprov2015) - 1) * 100;
		      }
			 if($rprov2016=='0' or $rprov2016 == null){
			  $ca5_9x ='0';
		      }else{
		      $ca5_9x = (($rprov2017 / $rprov2016) - 1) * 100;
		      }
			  if($rprov2017=='0' or $rprov2017 == null){
			  $ca6_9x ='0';
		      }else{
		      $ca6_9x = (($rprov2018 / $rprov2017) - 1) * 100;
		      }
			  if($rprov2018=='0' or $rprov2018 == null){
			  $ca7_9x ='0';
		      }else{
		      $ca7_9x = (($rprov2019 / $rprov2018) - 1) * 100;
		      }
	if($rprov2019=='0' or $rprov2019 == null){
			  $ca8_9x ='0';
		      }else{
		      $ca8_9x = (($rprov2020 / $rprov2019) - 1) * 100;
		      }
	if($rprov2020=='0' or $rprov2020 == null){
			  $ca9_9x ='0';
		      }else{
		      $ca9_9x = (($rprov2021 / $rprov2020) - 1) * 100;
		      }
	if($rprov2021=='0' or $rprov2021 == null){
			  $ca10_9x ='0';
		      }else{
		      $ca10_9x = (($rprov2022 / $rprov2021) - 1) * 100;
		      }
			  
			  $var26x= number_format(($ca1_9x + $ca2_9x + $ca3_9x + $ca4_9x + $ca5_9x + $ca6_9x + $ca7_9x + $ca8_9x + $ca9_9x)/9,2) ;
		  
		   
		  }
	  }else{
		  $rprov2012= "0.00";
		   $rprov2013= "0.00";
		    $rprov2014= "0.00";
			 $rprov2015= "0.00";
			  $rprov2016= "0.00";
			  $rprov2017= "0.00";
		       $rprov2018= "0.00";
		  $rprov2019= "0.00";
	$rprov2020= "0.00";
	$rprov2021= "0.00";
	$rprov2022= "0.00";
	  }
	  
	  //contamnos cantidad de distrito
	   $query_dist = "SELECT count(DISTINCT distrito.nombre) AS distrito, extract(year from exportacion.fnum) AS anio FROM exportacion LEFT JOIN distrito ON exportacion.ubigeo= distrito.iddistrito WHERE $ranfecha $querye AND exportacion.ndoc = '".$paiscode."' GROUP BY anio ORDER BY anio ASC";
$resultado_dist = $conexpg -> prepare($query_dist); 
$resultado_dist -> execute(); 
$distpos = $resultado_dist -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_dist -> rowCount() > 0)   { 
foreach($distpos as $fila_dist) {
			  $aniodist= $fila_dist -> anio;
			  
			  if($aniodist=='2012'){
			  $distri2012=$fila_dist -> distrito;
		       }
			   if($aniodist=='2013'){
			  $distri2013=$fila_dist -> distrito;
		       }
			   if($aniodist=='2014'){
			  $distri2014=$fila_dist -> distrito;
		       }
			   if($aniodist=='2015'){
			  $distri2015=$fila_dist -> distrito;
		       }
			   if($aniodist=='2016'){
			  $distri2016=$fila_dist -> distrito;
		       }
			   if($aniodist=='2017'){
			  $distri2017=$fila_dist -> distrito;
		       }
			  if($aniodist=='2018'){
			  $distri2018=$fila_dist -> distrito;
		       }
			  if($aniodist=='2019'){
			  $distri2019=$fila_dist -> distrito;
		       }
	if($aniodist=='2020'){
			  $distri2020=$fila_dist -> distrito;
		       }
	if($aniodist=='2021'){
			  $distri2021=$fila_dist -> distrito;
		       }
	if($aniodist=='2022'){
			  $distri2022=$fila_dist -> distrito;
		       }
			   
			    if($distri2020=='0'  or $distri2020 == null){
			   $vardist1='0.00';
		        }else{
		         $vardist1= number_format((($distri2021/$distri2020) - 1) * 100,2);
		         }
		
		if($distri2012=='0' or $distri2012 == null){
		$ca1_dis ='0';
		  }else{
		  $ca1_dis = (($distri2013 / $distri2012) - 1) * 100;
		  }
	     if($distri2013=='0' or $distri2013 == null){
		$ca2_dis ='0';
		}else{
		$ca2_dis = (($distri2014 / $distri2013) - 1) * 100;
		}
		 if($distri2014=='0' or $distri2014 == null){
		$ca3_dis ='0';
		 }else{
		$ca3_dis = (($distri2015 / $distri2014) - 1) * 100;
		}
		if($distri2015=='0' or $distri2015 == null){
		$ca4_dis ='0';
		}else{
		$ca4_dis = (($distri2016 / $distri2015) - 1) * 100;
		}
		if($distri2016=='0' or $distri2016 == null){
		$ca5_dis ='0';
		}else{
		$ca5_dis = (($distri2017 / $distri2016) - 1) * 100;
		}
	    if($distri2017=='0' or $distri2017 == null){
		$ca6_dis ='0';
		}else{
		$ca6_dis = (($distri2018 / $distri2017) - 1) * 100;
		}
			  if($distri2018=='0' or $distri2018 == null){
		$ca7_dis ='0';
		}else{
		$ca7_dis = (($distri2019 / $distri2018) - 1) * 100;
		}
	if($distri2019=='0' or $distri2019 == null){
		$ca8_dis ='0';
		}else{
		$ca8_dis = (($distri2020 / $distri2019) - 1) * 100;
		}
	if($distri2020=='0' or $distri2020 == null){
		$ca9_dis ='0';
		}else{
		$ca9_dis = (($distri2021 / $distri2020) - 1) * 100;
		}
	if($distri2021=='0' or $distri2021 == null){
		$ca10_dis ='0';
		}else{
		$ca10_dis = (($distri2022 / $distri2021) - 1) * 100;
		}
			  
	$vardist2= number_format(($ca1_dis + $ca2_dis + $ca3_dis + $ca4_dis + $ca5_dis + $ca6_dis + $ca7_dis + $ca8_dis + $ca9_dis)/9,2) ;
			  
		  }
	  }else{
		  $distri2012= "0.00";
		  $distri2013= "0.00";
		  $distri2014= "0.00";
		  $distri2015= "0.00";
		  $distri2016= "0.00";
		  $distri2017= "0.00";
		  $distri2018= "0.00";
		  $distri2019= "0.00";
	$distri2020= "0.00";
	$distri2021= "0.00";
	$distri2022= "0.00";
	  }
				
//contamnos cantidad de agente
	   $query_agen = "SELECT Count(DISTINCT exportacion.cage) as cant_agen, extract(year from exportacion.fnum) as anio FROM exportacion WHERE $ranfecha $querye AND exportacion.ndoc ='".$paiscode."' GROUP BY anio order BY anio ASC";	
$resultado_agen = $conexpg -> prepare($query_agen); 
$resultado_agen -> execute(); 
$agenapos = $resultado_agen -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_agen -> rowCount() > 0)   { 
foreach($agenapos as $fila_agen) {
		  $anioagen= $fila_agen -> anio;
		  
		  if($anioagen=='2012'){
			  $ragen2012=$fila_agen -> cant_agen;
		  }else{
			  $ragen2012="0";
		  }
		  if($anioagen=='2013'){
			  $ragen2013=$fila_agen -> cant_agen;
		  }else{
			  $ragen2013="0";
		  }
		  if($anioagen=='2014'){
			  $ragen2014=$fila_agen -> cant_agen;
		  }else{
			  $ragen2014="0";
		  }
		  if($anioagen=='2015'){
			  $ragen2015=$fila_agen -> cant_agen;
		  }else{
			  $ragen2015="0";
		  }
		  if($anioagen=='2016'){
			  $ragen2016=$fila_agen -> cant_agen;
		  }else{
			  $ragen2016="0";
		  }
		  if($anioagen=='2017'){
			  $ragen2017=$fila_agen -> cant_agen;
		  }else{
			  $ragen2017="0";
		  }
		  if($anioagen=='2018'){
			  $ragen2018=$fila_agen -> cant_agen;
		  }else{
			  $ragen2018="0";
		  }
			  if($anioagen=='2019'){
			  $ragen2019=$fila_agen -> cant_agen;
		  }else{
			  $ragen2019="0";
		  }
	if($anioagen=='2020'){
			  $ragen2020=$fila_agen -> cant_agen;
		  }else{
			  $ragen2020="0";
		  }
	if($anioagen=='2021'){
			  $ragen2021=$fila_agen -> cant_agen;
		  }else{
			  $ragen2021="0";
		  }
	if($anioagen=='2022'){
			  $ragen2022=$fila_agen -> cant_agen;
		  }else{
			  $ragen2022="0";
		  }
		  
		  if($ragen2020=='0'  or $ragen2020 == null){
			   $var27='0.00';
		   }else{
		  $var27= number_format((($ragen2021/$ragen2020) - 1) * 100,2);
		   }

              if($ragen2012=='0' or $ragen2012 == null){
			  $ca1_10 ='0';
		      }else{
		      $ca1_10 = (($ragen2013 / $ragen2012) - 1) * 100;
		      }
			   if($ragen2013=='0' or $ragen2013 == null){
			  $ca2_10 ='0';
		      }else{
		      $ca2_10 = (($ragen2014 / $ragen2013) - 1) * 100;
		      }
			   if($ragen2014=='0' or $ragen2014 == null){
			  $ca3_10='0';
		      }else{
		      $ca3_10 = (($ragen2015 / $ragen2014) - 1) * 100;
		      }
			   if($ragen2015=='0' or $ragen2015 == null){
			  $ca4_10 ='0';
		      }else{
		      $ca4_10 = (($ragen2016 / $ragen2015) - 1) * 100;
		      }
			  if($ragen2016=='0' or $ragen2016 == null){
			  $ca5_10 ='0';
		      }else{
		      $ca5_10 = (($ragen2017 / $ragen2016) - 1) * 100;
		      }
			  if($ragen2017=='0' or $ragen2017 == null){
			  $ca6_10 ='0';
		      }else{
		      $ca6_10 = (($ragen2018 / $ragen2017) - 1) * 100;
		      }
			  if($ragen2018=='0' or $ragen2018 == null){
			  $ca7_10 ='0';
		      }else{
		      $ca7_10 = (($ragen2019 / $ragen2018) - 1) * 100;
		      }
	if($ragen2019=='0' or $ragen2019 == null){
			  $ca8_10 ='0';
		      }else{
		      $ca8_10 = (($ragen2020 / $ragen2019) - 1) * 100;
		      }
	if($ragen2020=='0' or $ragen2020 == null){
			  $ca9_10 ='0';
		      }else{
		      $ca9_10 = (($ragen2021 / $ragen2020) - 1) * 100;
		      }
	if($ragen2021=='0' or $ragen2021 == null){
			  $ca10_10 ='0';
		      }else{
		      $ca10_10 = (($ragen2022 / $ragen2021) - 1) * 100;
		      }
			  
			  $var28= number_format(($ca1_10 + $ca2_10 + $ca3_10 + $ca4_10 + $ca5_10 + $ca6_10 + $ca7_10 + $ca8_10 + $ca9_10)/9,2) ;
		  
		   
		  }
	  }else{
		  $ragen2012= "0.00";
		   $ragen2013= "0.00";
		    $ragen2014= "0.00";
			 $ragen2015= "0.00";
			  $ragen2016= "0.00";
			  $ragen2017= "0.00";
		       $ragen2018= "0.00";
		  $ragen2019= "0.00";
	$ragen2020= "0.00";
	$ragen2021= "0.00";
	$ragen2022= "0.00";
	  }
				
//contamos cantidad via de transporte
	   $query_via = "SELECT Count(DISTINCT exportacion.cviatra) as cant_via, extract(year from exportacion.fnum) as anio FROM exportacion WHERE $ranfecha $querye AND exportacion.ndoc ='".$paiscode."' GROUP BY anio order BY anio ASC";	
$resultado_via = $conexpg -> prepare($query_via); 
$resultado_via -> execute(); 
$viapos = $resultado_via -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_via -> rowCount() > 0)   { 
foreach($viapos as $fila_via) {
		  $aniovia= $fila_via -> anio;
		  
		  if($aniovia=='2012'){
			  $rvia2012=$fila_via -> cant_via;
		  }else{
			  $rvia2012="0";
		  }
		  if($aniovia=='2013'){
			  $rvia2013=$fila_via -> cant_via;
		  }else{
			  $rvia2013="0";
		  }
		  if($aniovia=='2014'){
			  $rvia2014=$fila_via -> cant_via;
		  }else{
			  $rvia2014="0";
		  }
		  if($aniovia=='2015'){
			  $rvia2015=$fila_via -> cant_via;
		  }else{
			  $rvia2015="0";
		  }
		  if($aniovia=='2016'){
			  $rvia2016=$fila_via -> cant_via;
		  }else{
			  $rvia2016="0";
		  }
		  if($aniovia=='2017'){
			  $rvia2017=$fila_via -> cant_via;
		  }else{
			  $rvia2017="0";
		  }
		  if($aniovia=='2018'){
			  $rvia2018=$fila_via -> cant_via;
		  }else{
			  $rvia2018="0";
		  }
			  if($aniovia=='2019'){
			  $rvia2019=$fila_via -> cant_via;
		  }else{
			  $rvia2019="0";
		  }
	if($aniovia=='2020'){
			  $rvia2020=$fila_via -> cant_via;
		  }else{
			  $rvia2020="0";
		  }
	if($aniovia=='2021'){
			  $rvia2021=$fila_via -> cant_via;
		  }else{
			  $rvia2021="0";
		  }
	if($aniovia=='2022'){
			  $rvia2022=$fila_via -> cant_via;
		  }else{
			  $rvia2022="0";
		  }
		  
		  if($rvia2020=='0'  or $rvia2020 == null){
			   $var29='0.00';
		   }else{
		  $var29= number_format((($rvia2021/$rvia2020) - 1) * 100,2);
		   }

              if($rvia2012=='0' or $rvia2012 == null){
			  $ca1_11 ='0';
		      }else{
		      $ca1_11 = (($rvia2013 / $rvia2012) - 1) * 100;
		      }
			   if($rvia2013=='0' or $rvia2013 == null){
			  $ca2_11 ='0';
		      }else{
		      $ca2_11 = (($rvia2014 / $rvia2013) - 1) * 100;
		      }
			   if($rvia2014=='0' or $rvia2014 == null){
			  $ca3_11='0';
		      }else{
		      $ca3_11 = (($rvia2015 / $rvia2014) - 1) * 100;
		      }
			   if($rvia2015=='0' or $rvia2015 == null){
			  $ca4_11 ='0';
		      }else{
		      $ca4_11 = (($rvia2016 / $rvia2015) - 1) * 100;
		      }
			  if($rvia2016=='0' or $rvia2016 == null){
			  $ca5_11 ='0';
		      }else{
		      $ca5_11 = (($rvia2017 / $rvia2016) - 1) * 100;
		      }
			  if($rvia2017=='0' or $rvia2017 == null){
			  $ca6_11 ='0';
		      }else{
		      $ca6_11 = (($rvia2018 / $rvia2017) - 1) * 100;
		      }
			  if($rvia2018=='0' or $rvia2018 == null){
			  $ca7_11 ='0';
		      }else{
		      $ca7_11 = (($rvia2019 / $rvia2018) - 1) * 100;
		      }
	if($rvia2019=='0' or $rvia2019 == null){
			  $ca8_11 ='0';
		      }else{
		      $ca8_11 = (($rvia2020 / $rvia2019) - 1) * 100;
		      }
	if($rvia2020=='0' or $rvia2020 == null){
			  $ca9_11 ='0';
		      }else{
		      $ca9_11 = (($rvia2021 / $rvia2020) - 1) * 100;
		      }
	if($rvia2021=='0' or $rvia2021 == null){
			  $ca10_11 ='0';
		      }else{
		      $ca10_11 = (($rvia2022 / $rvia2021) - 1) * 100;
		      }
			  
			  $var30= number_format(($ca1_11 + $ca2_11 + $ca3_11 + $ca4_11 + $ca5_11 + $ca6_11 + $ca7_11 + $ca8_11 + $ca9_11)/9,2) ;
		  
		   
		  }
	  }else{
		  $rvia2012= "0.00";
		   $rvia2013= "0.00";
		    $rvia2014= "0.00";
			 $rvia2015= "0.00";
			  $rvia2016= "0.00";
			  $rvia2017= "0.00";
		       $rvia2018= "0.00";
		  $rvia2019= "0.00";
	$rvia2020= "0.00";
	$rvia2021= "0.00";
	$rvia2022= "0.00";
}
		
		//$bus2
//descripcion de partida
/*$nompartides="SELECT descripcion FROM arancel WHERE idarancel='$bus2'";
		$rsdesara=$conexpg->query($nompartides); 
if($rsdesara->num_rows>0){ 
while($flara=$rsdesara->fetch_array()){
			 $desnomara = $flara['descripcion'];
		  }
	  }else{
		 $desnomara ="---"; 
	  }*/
?>

<div class="col-lg-12 col-12">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Reporte An&aacute;lisis de Empresa - Indicador Anual - Exportaciones</h4>
						</div>
							<div class="box-body">
								<div class="form-group">
								  <label class="form-label"><b>Empresa:</b> <?=ucwords(strtolower($paisname));?> <b>│ Ruc:</b> <?=$paiscode;?> <b>│ Departamento:</b> <?=$namedepa1;?> <b>│</b> Fecha Numeraci&oacute;n <b>│ Periodo:</b> 2012 - 2022 </label>
								  <!--<input type="text" class="form-control" placeholder="Company Name">-->
								</div>

<div class="box-body">
<div class="table-responsive">
					  <!--<table id="example" class="table table-hover display nowrap margin-top-10 w-p100">-->
					  <table id="example" class="table table-hover display margin-top-10 w-p100">
						<thead>
							<tr>
							  <th>#</th>
							  <th>Indicadores</th>
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
							  <th>Var.%Total</th>
							</tr>
						</thead>
						<tbody>
<?php
echo "<tr>";
echo "<td>1</td>";
echo "<td>Valor FOB USD</td>";
echo "<td>".number_format($vfob_2012,2)."</td>";
echo "<td>".number_format($vfob_2013,2)."</td>";
echo "<td>".number_format($vfob_2014,2)."</td>";
echo "<td>".number_format($vfob_2015,2)."</td>";
echo "<td>".number_format($vfob_2016,2)."</td>";
echo "<td>".number_format($vfob_2017,2)."</td>";
echo "<td>".number_format($vfob_2018,2)."</td>";
				echo "<td>".number_format($vfob_2019,2)."</td>";
				echo "<td>".number_format($vfob_2020,2)."</td>";
				echo "<td>".number_format($vfob_2021,2)."</td>";
							echo "<td>".number_format($vfob_2022,2)."</td>";
echo "<td>$var1 %</td>";
echo "<td>$var2 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>2</td>";
echo "<td>Peso Neto (Kg)</td>";
echo "<td>".number_format($vpes_2012,2)."</td>";
echo "<td>".number_format($vpes_2013,2)."</td>";
echo "<td>".number_format($vpes_2014,2)."</td>";
echo "<td>".number_format($vpes_2015,2)."</td>";
echo "<td>".number_format($vpes_2016,2)."</td>";
echo "<td>".number_format($vpes_2017,2)."</td>";
echo "<td>".number_format($vpes_2018,2)."</td>";
				echo "<td>".number_format($vpes_2019,2)."</td>";
				echo "<td>".number_format($vpes_2020,2)."</td>";
				echo "<td>".number_format($vpes_2021,2)."</td>";
							echo "<td>".number_format($vpes_2022,2)."</td>";
echo "<td>$var3 %</td>";
echo "<td>$var4 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>3</td>";
echo "<td>Precio FOB USD x KG</td>";
echo "<td>".number_format($preciofob2012,2)."</td>";
echo "<td>".number_format($preciofob2013,2)."</td>";
echo "<td>".number_format($preciofob2014,2)."</td>";
echo "<td>".number_format($preciofob2015,2)."</td>";
echo "<td>".number_format($preciofob2016,2)."</td>";
echo "<td>".number_format($preciofob2017,2)."</td>";
echo "<td>".number_format($preciofob2018,2)."</td>";
				echo "<td>".number_format($preciofob2019,2)."</td>";
				echo "<td>".number_format($preciofob2020,2)."</td>";
				echo "<td>".number_format($preciofob2021,2)."</td>";
							echo "<td>".number_format($preciofob2022,2)."</td>";
echo "<td>$var5 %</td>";
echo "<td>$var6 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>4</td>";
echo "<td>Peso Bruto (Kg)</td>";
echo "<td>".number_format($vbru_2012,2)."</td>";
echo "<td>".number_format($vbru_2013,2)."</td>";
echo "<td>".number_format($vbru_2014,2)."</td>";
echo "<td>".number_format($vbru_2015,2)."</td>";
echo "<td>".number_format($vbru_2016,2)."</td>";
echo "<td>".number_format($vbru_2017,2)."</td>";
echo "<td>".number_format($vbru_2018,2)."</td>";
				echo "<td>".number_format($vbru_2019,2)."</td>";
				echo "<td>".number_format($vbru_2020,2)."</td>";
				echo "<td>".number_format($vbru_2021,2)."</td>";
							echo "<td>".number_format($vbru_2022,2)."</td>";
echo "<td>$var7 %</td>";
echo "<td>$var8 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>5</td>";
echo "<td>Cantidad Exportada</td>";
echo "<td>".number_format($qunifis_2012,2)."</td>";
echo "<td>".number_format($qunifis_2013,2)."</td>";
echo "<td>".number_format($qunifis_2014,2)."</td>";
echo "<td>".number_format($qunifis_2015,2)."</td>";
echo "<td>".number_format($qunifis_2016,2)."</td>";
echo "<td>".number_format($qunifis_2017,2)."</td>";
echo "<td>".number_format($qunifis_2018,2)."</td>";
				echo "<td>".number_format($qunifis_2019,2)."</td>";
				echo "<td>".number_format($qunifis_2020,2)."</td>";
				echo "<td>".number_format($qunifis_2021,2)."</td>";
							echo "<td>".number_format($qunifis_2022,2)."</td>";
echo "<td>$var9 %</td>";
echo "<td>$var10 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>6</td>";
echo "<td>Unidades Comerciales</td>";
echo "<td>".number_format($qunicom_2012,2)."</td>";
echo "<td>".number_format($qunicom_2013,2)."</td>";
echo "<td>".number_format($qunicom_2014,2)."</td>";
echo "<td>".number_format($qunicom_2015,2)."</td>";
echo "<td>".number_format($qunicom_2016,2)."</td>";
echo "<td>".number_format($qunicom_2017,2)."</td>";
echo "<td>".number_format($qunicom_2018,2)."</td>";
	echo "<td>".number_format($qunicom_2019,2)."</td>";
	echo "<td>".number_format($qunicom_2020,2)."</td>";
	echo "<td>".number_format($qunicom_2021,2)."</td>";
	echo "<td>".number_format($qunicom_2022,2)."</td>";
echo "<td>$var11 %</td>";
echo "<td>$var12 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>7</td>";
echo "<td>Cantidad de Partidas</td>";
echo "<td>".number_format($rparti2012,0)."</td>";
echo "<td>".number_format($rparti2013,0)."</td>";
echo "<td>".number_format($rparti2014,0)."</td>";
echo "<td>".number_format($rparti2015,0)."</td>";
echo "<td>".number_format($rparti2016,0)."</td>";
echo "<td>".number_format($rparti2017,0)."</td>";
echo "<td>".number_format($rparti2018,0)."</td>";
	echo "<td>".number_format($rparti2019,0)."</td>";
	echo "<td>".number_format($rparti2020,0)."</td>";
	echo "<td>".number_format($rparti2021,0)."</td>";
	echo "<td>".number_format($rparti2022,0)."</td>";
echo "<td>$varparti1 %</td>";
echo "<td>$varparti2 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>8</td>";
echo "<td>Cantidad de Registros</td>";
echo "<td>".number_format($creg_2012,0)."</td>";
echo "<td>".number_format($creg_2013,0)."</td>";
echo "<td>".number_format($creg_2014,0)."</td>";
echo "<td>".number_format($creg_2015,0)."</td>";
echo "<td>".number_format($creg_2016,0)."</td>";
echo "<td>".number_format($creg_2017,0)."</td>";
echo "<td>".number_format($creg_2018,0)."</td>";
	echo "<td>".number_format($creg_2019,0)."</td>";
	echo "<td>".number_format($creg_2020,0)."</td>";
	echo "<td>".number_format($rparti2021,0)."</td>";
	echo "<td>".number_format($rparti2022,0)."</td>";
	echo "<td>$var13 %</td>";
echo "<td>$var14 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>9</td>";
echo "<td>Cantidad de Duas</td>";
echo "<td>".number_format($rdua2012,0)."</td>";
echo "<td>".number_format($rdua2013,0)."</td>";
echo "<td>".number_format($rdua2014,0)."</td>";
echo "<td>".number_format($rdua2015,0)."</td>";
echo "<td>".number_format($rdua2016,0)."</td>";
echo "<td>".number_format($rdua2017,0)."</td>";
echo "<td>".number_format($rdua2018,0)."</td>";
	echo "<td>".number_format($rdua2019,0)."</td>";
	echo "<td>".number_format($rdua2020,0)."</td>";
	echo "<td>".number_format($rdua2021,0)."</td>";
	echo "<td>".number_format($rdua2022,0)."</td>";
echo "<td>$var15 %</td>";
echo "<td>$var16 %</td>";
echo "</tr>";
/*echo "<tr>";
echo "<td>10</td>";
echo "<td>Cantidad de Empresas</td>";
echo "<td>$remp2012</td>";
echo "<td>$remp2013</td>";
echo "<td>$remp2014</td>";
echo "<td>$remp2015</td>";
echo "<td>$remp2016</td>";
echo "<td>$remp2017</td>";
echo "<td>$remp2018</td>";
echo "<td>$var17 %</td>";
echo "<td>$var18 %</td>";
echo "</tr>";*/
echo "<tr>";
echo "<td>10</td>";
echo "<td>Cantidad de Mercados</td>";
echo "<td>$rmer2012</td>";
echo "<td>$rmer2013</td>";
echo "<td>$rmer2014</td>";
echo "<td>$rmer2015</td>";
echo "<td>$rmer2016</td>";
echo "<td>$rmer2017</td>";
echo "<td>$rmer2018</td>";
	echo "<td>$rmer2019</td>";
	echo "<td>$rmer2020</td>";
	echo "<td>$rmer2021</td>";
	echo "<td>$rmer2022</td>";
echo "<td>$var19 %</td>";
echo "<td>$var20 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>11</td>";
echo "<td>Cantidad de Puertos</td>";
echo "<td>$rpue2012</td>";
echo "<td>$rpue2013</td>";
echo "<td>$rpue2014</td>";
echo "<td>$rpue2015</td>";
echo "<td>$rpue2016</td>";
echo "<td>$rpue2017</td>";
echo "<td>$rpue2018</td>";
	echo "<td>$rpue2019</td>";
	echo "<td>$rpue2020</td>";
	echo "<td>$rpue2021</td>";
	echo "<td>$rpue2022</td>";
echo "<td>$var21 %</td>";
echo "<td>$var22 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>12</td>";
echo "<td>Cantidad de Aduanas</td>";
echo "<td>$radua2012</td>";
echo "<td>$radua2013</td>";
echo "<td>$radua2014</td>";
echo "<td>$radua2015</td>";
echo "<td>$radua2016</td>";
echo "<td>$radua2017</td>";
echo "<td>$radua2018</td>";
	echo "<td>$radua2019</td>";
	echo "<td>$radua2020</td>";
	echo "<td>$radua2021</td>";
	echo "<td>$radua2022</td>";
echo "<td>$var23 %</td>";
echo "<td>$var24 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>13</td>";
echo "<td>Cantidad de departamento</td>";
echo "<td>$rempresa2012</td>";
echo "<td>$rempresa2013</td>";
echo "<td>$rempresa2014</td>";
echo "<td>$rempresa2015</td>";
echo "<td>$rempresa2016</td>";
echo "<td>$rempresa2017</td>";
echo "<td>$rempresa2018</td>";
	echo "<td>$rempresa2019</td>";
	echo "<td>$rempresa2020</td>";
	echo "<td>$rempresa2021</td>";
	echo "<td>$rempresa2022</td>";
echo "<td>$var25 %</td>";
echo "<td>$var26 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>14</td>";
echo "<td>Cantidad de provincias</td>";
echo "<td>$rprov2012</td>";
echo "<td>$rprov2013</td>";
echo "<td>$rprov2014</td>";
echo "<td>$rprov2015</td>";
echo "<td>$rprov2016</td>";
echo "<td>$rprov2017</td>";
echo "<td>$rprov2018</td>";
	echo "<td>$rprov2019</td>";
	echo "<td>$rprov2020</td>";
	echo "<td>$rprov2021</td>";
	echo "<td>$rprov2022</td>";
echo "<td>$var25x %</td>";
echo "<td>$var26x %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>15</td>";
echo "<td>Cantidad de distritos</td>";
echo "<td>$distri2012</td>";
echo "<td>$distri2013</td>";
echo "<td>$distri2014</td>";
echo "<td>$distri2015</td>";
echo "<td>$distri2016</td>";
echo "<td>$distri2017</td>";
echo "<td>$distri2018</td>";
	echo "<td>$distri2019</td>";
	echo "<td>$distri2020</td>";
	echo "<td>$distri2021</td>";
	echo "<td>$distri2022</td>";
echo "<td>$vardist1 %</td>";
echo "<td>$vardist2 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>16</td>";
echo "<td>Cantidad de Agentes</td>";
echo "<td>$ragen2012</td>";
echo "<td>$ragen2013</td>";
echo "<td>$ragen2014</td>";
echo "<td>$ragen2015</td>";
echo "<td>$ragen2016</td>";
echo "<td>$ragen2017</td>";
echo "<td>$ragen2018</td>";
	echo "<td>$ragen2019</td>";
	echo "<td>$ragen2020</td>";
	echo "<td>$ragen2021</td>";
	echo "<td>$ragen2022</td>";
echo "<td>$var27 %</td>";
echo "<td>$var28 %</td>";
echo "</tr>";
echo "<tr>";
echo "<td>17</td>";
echo "<td>Cantidad de Vías de Transporte</td>";
echo "<td>$rvia2012</td>";
echo "<td>$rvia2013</td>";
echo "<td>$rvia2014</td>";
echo "<td>$rvia2015</td>";
echo "<td>$rvia2016</td>";
echo "<td>$rvia2017</td>";
echo "<td>$rvia2018</td>";
	echo "<td>$rvia2019</td>";
	echo "<td>$rvia2020</td>";
	echo "<td>$rvia2021</td>";
	echo "<td>$rvia2022</td>";
echo "<td>$var29 %</td>";
echo "<td>$var30 %</td>";
echo "</tr>";
?>
						</tbody>				  
						<tfoot>
							<tr>
							  <th>#</th>
							  <th>Indicadores</th>
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
							  <th>Var.%Total</th>
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

