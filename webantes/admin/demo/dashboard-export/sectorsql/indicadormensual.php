<?php
include("../../conector/config.php");
set_time_limit(950);

date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");

$codeid = trim($_POST["namesectAA"]);
$namesector = trim($_POST["namesectNAMEA"]);
$namedepa1 = trim($_POST["namedepaA"]);
$ubicod1 = trim($_POST["codubiA"]);
$anio = trim($_POST["year"]);


if($ubicod1==""){
	$flatcod = "";
	$query1 = "";
}else{
	$flatcod = $ubicod1;
	$query1 = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}

//sumamos valorfob
		   $query_vfob = "SELECT 'vfobserdol' as VALOR, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '01' THEN exportacion.vfobserdol ELSE 0 END) AS enero, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '02' THEN exportacion.vfobserdol ELSE 0 END) AS febrero, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '03' THEN exportacion.vfobserdol ELSE 0 END) AS marzo, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '04' THEN exportacion.vfobserdol ELSE 0 END) AS abril, 
		   SUM(CASE extract(MONTH from exportacion.fnum) WHEN '05' THEN exportacion.vfobserdol ELSE 0 END) AS mayo,
		    SUM(CASE extract(MONTH from exportacion.fnum) WHEN '06' THEN exportacion.vfobserdol ELSE 0 END) AS junio,
			SUM(CASE extract(MONTH from exportacion.fnum) WHEN '07' THEN exportacion.vfobserdol ELSE 0 END) AS julio,
			SUM(CASE extract(MONTH from exportacion.fnum) WHEN '08' THEN exportacion.vfobserdol ELSE 0 END) AS agosto,
			SUM(CASE extract(MONTH from exportacion.fnum) WHEN '09' THEN exportacion.vfobserdol ELSE 0 END) AS septiembre,
			SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.vfobserdol ELSE 0 END) AS octubre,
			SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.vfobserdol ELSE 0 END) AS noviembre,
			SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.vfobserdol ELSE 0 END) AS diciembre
		   FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector) = '$codeid'";
$resultado_vfob = $conexpg -> prepare($query_vfob); 
$resultado_vfob -> execute(); 
$fgps = $resultado_vfob -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_vfob -> rowCount() > 0)   { 
foreach($fgps as $fila_vfob) {
		  $vfob_01= $fila_vfob -> enero;
		  $vfob_02=  $fila_vfob -> febrero;
		  $vfob_03=  $fila_vfob -> marzo;
		  $vfob_04=  $fila_vfob -> abril;
		  $vfob_05=  $fila_vfob -> mayo;
		  $vfob_06=  $fila_vfob -> junio;
		  $vfob_07=  $fila_vfob -> julio;
		  $vfob_08=  $fila_vfob -> agosto;
		  $vfob_09=  $fila_vfob -> septiembre;
		  $vfob_10=  $fila_vfob -> octubre;
		  $vfob_11=  $fila_vfob -> noviembre;
		  $vfob_12=  $fila_vfob -> diciembre;
			  
			   $totafob = $vfob_01 + $vfob_02 + $vfob_03 + $vfob_04 + $vfob_05 + $vfob_06 + $vfob_07 + $vfob_08 + $vfob_09 + $vfob_10 + $vfob_11 + $vfob_12;
		  }
	  }else{
		  $vfob_01= "0.00";
		  $vfob_02= "0.00";
		  $vfob_03= "0.00";
		  $vfob_04= "0.00";
		  $vfob_05= "0.00";
		  $vfob_06= "0.00";
		  $vfob_07= "0.00";
		  $vfob_08= "0.00";
		  $vfob_09= "0.00";
		  $vfob_10= "0.00";
		  $vfob_11= "0.00";
		  $vfob_12= "0.00";
		  $totafob = "0.00";
	  }
	  
	  /* sumamos vpesnet*/
	   $query_vpes = "SELECT 'vpesnet' as VALOR,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '01' THEN exportacion.vpesnet ELSE 0 END) AS enero,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '02' THEN exportacion.vpesnet ELSE 0 END) AS febrero, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '03' THEN exportacion.vpesnet ELSE 0 END) AS marzo,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '04' THEN exportacion.vpesnet ELSE 0 END) AS abril,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '05' THEN exportacion.vpesnet ELSE 0 END) AS mayo, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '06' THEN exportacion.vpesnet ELSE 0 END) AS junio, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '07' THEN exportacion.vpesnet ELSE 0 END) AS julio, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '08' THEN exportacion.vpesnet ELSE 0 END) AS agosto, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '09' THEN exportacion.vpesnet ELSE 0 END) AS septiembre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.vpesnet ELSE 0 END) AS octubre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.vpesnet ELSE 0 END) AS noviembre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.vpesnet ELSE 0 END) AS diciembre
FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi where extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' ";
	
$resultado_vpes = $conexpg -> prepare($query_vpes); 
$resultado_vpes -> execute(); 
$vpps = $resultado_vpes -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_vpes -> rowCount() > 0)   { 
foreach($vpps as $fila_vpes) {
		  $vpes_01 = $fila_vpes -> enero;
		  $vpes_02 = $fila_vpes -> febrero;
		  $vpes_03 = $fila_vpes -> marzo;
		  $vpes_04 = $fila_vpes -> abril;
		  $vpes_05 = $fila_vpes -> mayo;
		  $vpes_06 = $fila_vpes -> junio;
		  $vpes_07 = $fila_vpes -> julio;
		  $vpes_08 = $fila_vpes -> agosto;
		  $vpes_09 = $fila_vpes -> septiembre;
		  $vpes_10 = $fila_vpes -> octubre;
		  $vpes_11 = $fila_vpes -> noviembre;
		  $vpes_12 = $fila_vpes -> diciembre;
		  $totalvpes = $vpes_01 + $vpes_02 + $vpes_03 + $vpes_04 + $vpes_05 + $vpes_06 + $vpes_07 + $vpes_08 + $vpes_09 + $vpes_10 + $vpes_11 + $vpes_12;
		  
		  }
	  }else{
		  $vpes_01= "0.00";
		  $vpes_02= "0.00";
		  $vpes_03= "0.00";
		  $vpes_04= "0.00";
		  $vpes_05= "0.00";
		  $vpes_06= "0.00";
		  $vpes_07= "0.00";
		  $vpes_08= "0.00";
		  $vpes_09= "0.00";
		  $vpes_10= "0.00";
		  $vpes_11= "0.00";
		  $vpes_12= "0.00";
		  $totalvpes = "0.00";

	  }
		
		/*diferencia Precio FOB USD x KG*/
		if( $vpes_01=='0' or  $vpes_01=='0.00' or $vpes_01 == null){
		$preciofob01 ='0.00';
		}else{
		$preciofob01 = $vfob_01 / $vpes_01;
		}
		
		if( $vpes_02=='0' or  $vpes_02=='0.00' or $vpes_02 == null){
		$preciofob02 ='0.00';
		}else{
		$preciofob02 = $vfob_02 / $vpes_02;
		}
		
		if( $vpes_03=='0' or  $vpes_03=='0.00' or $vpes_03 == null){
		$preciofob03 ='0.00';
		}else{
		$preciofob03 = $vfob_03 / $vpes_03;
		}
		
		if( $vpes_04=='0' or  $vpes_04=='0.00' or $vpes_04 == null){
		$preciofob04 ='0.00';
		}else{
		$preciofob04 = $vfob_04 / $vpes_04;
		}
		
		if( $vpes_05=='0' or  $vpes_05=='0.00' or $vpes_05 == null){
		$preciofob05 ='0.00';
		}else{
		$preciofob05 = $vfob_05 / $vpes_05;
		}
		
		if( $vpes_06=='0' or  $vpes_06=='0.00' or $vpes_06 == null){
		$preciofob06 ='0.00';
		}else{
		$preciofob06 = $vfob_06 / $vpes_06;
		}
		
		if( $vpes_07=='0' or  $vpes_07=='0.00' or $vpes_07 == null){
		$preciofob07 ='0.00';
		}else{
		$preciofob07 = $vfob_07 / $vpes_07;
		}
		
		if( $vpes_08=='0' or  $vpes_08=='0.00' or $vpes_08 == null){
		$preciofob08 ='0.00';
		}else{
		$preciofob08 = $vfob_08 / $vpes_08;
		}
		
		if( $vpes_09=='0' or  $vpes_09=='0.00' or $vpes_09 == null){
		$preciofob09 ='0.00';
		}else{
		$preciofob09 = $vfob_09 / $vpes_09;
		}
		
		if( $vpes_10=='0' or  $vpes_10=='0.00' or $vpes_10 == null){
		$preciofob10 ='0.00';
		}else{
		$preciofob10 = $vfob_10 / $vpes_10;
		}
		
		if( $vpes_11=='0' or  $vpes_11=='0.00' or $vpes_11 == null){
		$preciofob11 ='0.00';
		}else{
		$preciofob11 = $vfob_11 / $vpes_11;
		}
		
		if( $vpes_12=='0' or  $vpes_12=='0.00' or $vpes_12 == null){
		$preciofob12 ='0.00';
		}else{
		$preciofob12 = $vfob_12 / $vpes_12;
		}
		
		$promediotota = $totafob / $totalvpes;
				
		 //suma precio bruto
		  $query_vbru = "SELECT 'preciobruto' as VALOR, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '01' THEN exportacion.vpesbru ELSE 0 END) AS enero,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '02' THEN exportacion.vpesbru ELSE 0 END) AS febrero, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '03' THEN exportacion.vpesbru ELSE 0 END) AS marzo, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '04' THEN exportacion.vpesbru ELSE 0 END) AS abril, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '05' THEN exportacion.vpesbru ELSE 0 END) AS mayo, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '06' THEN exportacion.vpesbru ELSE 0 END) AS junio, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '07' THEN exportacion.vpesbru ELSE 0 END) AS julio, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '08' THEN exportacion.vpesbru ELSE 0 END) AS agosto, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '09' THEN exportacion.vpesbru ELSE 0 END) AS septiembre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.vpesbru ELSE 0 END) AS octubre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.vpesbru ELSE 0 END) AS noviembre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.vpesbru ELSE 0 END) AS diciembre FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi where extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' ";
$resultado_vbru = $conexpg -> prepare($query_vbru); 
$resultado_vbru -> execute(); 
$brps = $resultado_vbru -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_vbru -> rowCount() > 0)   { 
foreach($brps as $fila_vbru) {
		  $vbru_01= $fila_vbru -> enero;
		  $vbru_02= $fila_vbru -> febrero;
		  $vbru_03= $fila_vbru -> marzo;
		  $vbru_04= $fila_vbru -> abril;
		  $vbru_05= $fila_vbru -> mayo;
		  $vbru_06= $fila_vbru -> junio;
		  $vbru_07= $fila_vbru -> julio;
		  $vbru_08= $fila_vbru -> agosto;
		  $vbru_09= $fila_vbru -> septiembre;
		  $vbru_10= $fila_vbru -> octubre;
		  $vbru_11= $fila_vbru -> noviembre;
		  $vbru_12= $fila_vbru -> diciembre;
		  $totapesob = $vbru_01 + $vbru_02 + $vbru_03 + $vbru_04 + $vbru_05 + $vbru_06 + $vbru_07 + $vbru_08 + $vbru_09 + $vbru_10 + $vbru_11 + $vbru_12;
		  
		  }
	  }else{
		  $vbru_01= "0.00";
		  $vbru_02= "0.00";
		  $vbru_03= "0.00";
		  $vbru_04= "0.00";
		  $vbru_05= "0.00";
		  $vbru_06= "0.00";
		  $vbru_07= "0.00";
		  $vbru_08= "0.00";
		  $vbru_09= "0.00";
		  $vbru_10= "0.00";
		  $vbru_11= "0.00";
		  $vbru_12= "0.00";
		  $totapesob = "0.00";
	  }
	  
	  //sumamos cantidad exportada
	  
	  $query_qunifis = "SELECT 'preciobruto' as VALOR, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '01' THEN exportacion.qunifis ELSE 0 END) AS enero, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '02' THEN exportacion.qunifis ELSE 0 END) AS febrero, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '03' THEN exportacion.qunifis ELSE 0 END) AS marzo, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '04' THEN exportacion.qunifis ELSE 0 END) AS abril,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '05' THEN exportacion.qunifis ELSE 0 END) AS mayo,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '06' THEN exportacion.qunifis ELSE 0 END) AS junio,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '07' THEN exportacion.qunifis ELSE 0 END) AS julio,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '08' THEN exportacion.qunifis ELSE 0 END) AS agosto,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '09' THEN exportacion.qunifis ELSE 0 END) AS septiembre,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.qunifis ELSE 0 END) AS octubre,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.qunifis ELSE 0 END) AS noviembre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.qunifis ELSE 0 END) AS diciembre 
FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi where extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' ";
$resultado_qunifis = $conexpg -> prepare($query_qunifis); 
$resultado_qunifis -> execute(); 
$qrps = $resultado_qunifis -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_qunifis -> rowCount() > 0)   { 
foreach($qrps as $fila_qunifis) {
		$qunifis_01= $fila_qunifis -> enero;
		$qunifis_02= $fila_qunifis -> febrero;
		$qunifis_03= $fila_qunifis -> marzo;
		$qunifis_04= $fila_qunifis -> abril;
		$qunifis_05= $fila_qunifis -> mayo;
		$qunifis_06= $fila_qunifis -> junio;
		$qunifis_07= $fila_qunifis -> julio;
		$qunifis_08= $fila_qunifis -> agosto;
		$qunifis_09= $fila_qunifis -> septiembre;
		$qunifis_10= $fila_qunifis -> octubre;
		$qunifis_11= $fila_qunifis -> noviembre;
		$qunifis_12= $fila_qunifis -> diciembre;
		$totaqunifis = $qunifis_01 + $qunifis_02 + $qunifis_03 + $qunifis_04 + $qunifis_05 + $qunifis_06 + $qunifis_07 + $qunifis_08 + $qunifis_09 + $qunifis_10 + $qunifis_11 + $qunifis_12;
		  
		  }
	  }else{
		  $qunifis_01= "0.00";
		  $qunifis_02= "0.00";
		  $qunifis_03= "0.00";
	      $qunifis_04= "0.00";
		  $qunifis_05= "0.00";
		  $qunifis_06= "0.00";
		  $qunifis_07= "0.00";
		  $qunifis_08= "0.00";
		  $qunifis_09= "0.00";
		  $qunifis_10= "0.00";
		  $qunifis_11= "0.00";
		  $qunifis_12= "0.00";
		  $totaqunifis = "0.00";
	  }
	  
	  
	  //sumamos unidades comerciales
	  $query_qunicom = "SELECT 'preciobruto' as VALOR, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '01' THEN exportacion.qunicom ELSE 0 END) AS enero, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '02' THEN exportacion.qunicom ELSE 0 END) AS febrero, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '03' THEN exportacion.qunicom ELSE 0 END) AS marzo,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '04' THEN exportacion.qunicom ELSE 0 END) AS abril,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '05' THEN exportacion.qunicom ELSE 0 END) AS mayo,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '06' THEN exportacion.qunicom ELSE 0 END) AS junio,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '07' THEN exportacion.qunicom ELSE 0 END) AS julio,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '08' THEN exportacion.qunicom ELSE 0 END) AS agosto,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '09' THEN exportacion.qunicom ELSE 0 END) AS septiembre,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN exportacion.qunicom ELSE 0 END) AS octubre,
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN exportacion.qunicom ELSE 0 END) AS noviembre, 
SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN exportacion.qunicom ELSE 0 END) AS diciembre 
FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi where extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' ";	
$resultado_qunicom = $conexpg -> prepare($query_qunicom); 
$resultado_qunicom -> execute(); 
$qnps = $resultado_qunicom -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_qunicom -> rowCount() > 0)   { 
foreach($qnps as $fila_qunicom) {
		  $qunicom_01= $fila_qunicom -> enero;
		  $qunicom_02= $fila_qunicom -> febrero;
		  $qunicom_03= $fila_qunicom -> marzo;
		  $qunicom_04= $fila_qunicom -> abril;
		  $qunicom_05= $fila_qunicom -> mayo;
		  $qunicom_06= $fila_qunicom -> junio;
		  $qunicom_07= $fila_qunicom -> julio;
		  $qunicom_08= $fila_qunicom -> agosto;
		  $qunicom_09= $fila_qunicom -> septiembre;
		  $qunicom_10= $fila_qunicom -> octubre;
		  $qunicom_11= $fila_qunicom -> noviembre;
		  $qunicom_12= $fila_qunicom -> diciembre;
		  $totaqunicom = $qunicom_01 + $qunicom_02 + $qunicom_03 + $qunicom_04 + $qunicom_05 + $qunicom_06 + $qunicom_07 + $qunicom_08 + $qunicom_09 + $qunicom_10 + $qunicom_11 + $qunicom_12;

		  
		  }
	  }else{
		  $qunicom_01= "0.00";
		  $qunicom_02= "0.00";
		  $qunicom_03= "0.00";
		  $qunicom_04= "0.00";
		  $qunicom_05= "0.00";
		  $qunicom_06= "0.00";
		  $qunicom_07= "0.00";
		  $qunicom_08= "0.00";
		  $qunicom_09= "0.00";
		  $qunicom_10= "0.00";
		  $qunicom_11= "0.00";
		  $qunicom_12= "0.00";
		  $totaqunicom = "0.00";
	  }
	  
	  //cuenta cantidad de partidas
	  $query_parti = "SELECT Count(DISTINCT exportacion.part_nandi) as cant_parti, extract(MONTH from exportacion.fnum) as mes FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi  WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' GROUP BY mes order BY mes ASC";	
$resultado_parti = $conexpg -> prepare($query_parti); 
$resultado_parti -> execute(); 
$parps = $resultado_parti -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_parti -> rowCount() > 0)   { 
foreach($parps as $fila_parti) {
		  $anioparti= $fila_parti -> mes;
		  
		  if($anioparti=='01'){
			  $rparti01=$fila_parti -> cant_parti;
		  }/*else{
			  $rparti01='0.00';
		  }*/
		  if($anioparti=='02'){
			  $rparti02=$fila_parti -> cant_parti;
		  }/*else{
			  $rparti02='0.00';
		  }*/
		  if($anioparti=='03'){
			  $rparti03=$fila_parti -> cant_parti;
		  }/*else{
			  $rparti03='0.00';
		  }*/
		  if($anioparti=='04'){
			  $rparti04=$fila_parti -> cant_parti;
		  }/*else{
			  $rparti04='0.00';
		  }*/
		  if($anioparti=='05'){
			  $rparti05=$fila_parti -> cant_parti;
		  }/*else{
			  $rparti05='0.00';
		  }*/
		  if($anioparti=='06'){
			  $rparti06=$fila_parti -> cant_parti;
		  }
		  if($anioparti=='07'){
			  $rparti07=$fila_parti -> cant_parti;
		  }/*else{
			  $rparti07='0.00';
		  }*/
		  if($anioparti=='08'){
			  $rparti08=$fila_parti -> cant_parti;
		  }/*else{
			  $rparti08='0.00';
		  }*/
		  if($anioparti=='09'){
			  $rparti09=$fila_parti -> cant_parti;
		  }/*else{
			  $rparti09='0.00';
		  }*/
		  if($anioparti=='10'){
			  $rparti10=$fila_parti -> cant_parti;
		  }/*else{
			  $rparti10='0.00';
		  }*/
		  if($anioparti=='11'){
			  $rparti11=$fila_parti -> cant_parti;
		  }/*else{
			  $rparti11='0.00';
		  }*/
		  if($anioparti=='12'){
			  $rparti12=$fila_parti -> cant_parti;
		  }/*else{
			  $rparti12='0.00';
		  }*/

		  }
	  }else{
		  $rparti01= "0.00";
		  $rparti02= "0.00";
		  $rparti03= "0.00";
		  $rparti04= "0.00";
		  $rparti05= "0.00";
		  $rparti06= "0.00";
		  $rparti07= "0.00";
		  $rparti08= "0.00";
		  $rparti09= "0.00";
		  $rparti10= "0.00";
		  $rparti11= "0.00";
		  $rparti12= "0.00"; 
	  }
	  
	  //total general de partidas
	  $generalA = "SELECT Count(DISTINCT exportacion.part_nandi) as cant_parti FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' ";	
$res_generaA = $conexpg -> prepare($generalA); 
$res_generaA -> execute(); 
$ptarps = $res_generaA -> fetchAll(PDO::FETCH_OBJ); 
if($res_generaA -> rowCount() > 0)   { 
foreach($ptarps as $fila_generaA) {
			  $totapartida = $fila_generaA -> cant_parti;
		  }
	  }else{
		  $totapartida = "0.00";
	  }
	  
	  //cuenta cantidad de registros
	  $query_creg = "SELECT 'cantidadreg' as VALOR, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '01' THEN 1 ELSE 0 END) AS enero, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '02' THEN 1 ELSE 0 END) AS febrero, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '03' THEN 1 ELSE 0 END) AS marzo, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '04' THEN 1 ELSE 0 END) AS abril,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '05' THEN 1 ELSE 0 END) AS mayo,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '06' THEN 1 ELSE 0 END) AS junio,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '07' THEN 1 ELSE 0 END) AS julio,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '08' THEN 1 ELSE 0 END) AS agosto,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '09' THEN 1 ELSE 0 END) AS septiembre,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '10' THEN 1 ELSE 0 END) AS octubre,
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '11' THEN 1 ELSE 0 END) AS noviembre, 
	  SUM(CASE extract(MONTH from exportacion.fnum) WHEN '12' THEN 1 ELSE 0 END) AS diciembre
	  FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi where extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)= '$codeid' ";	
$resultado_creg = $conexpg -> prepare($query_creg); 
$resultado_creg -> execute(); 
$regps = $resultado_creg -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_creg -> rowCount() > 0)   { 
foreach($regps as $fila_creg) {
		  $creg_01= $fila_creg -> enero;
		  $creg_02= $fila_creg -> febrero;
		  $creg_03= $fila_creg -> marzo;
		  $creg_04= $fila_creg -> abril;
		  $creg_05= $fila_creg -> mayo;
		  $creg_06= $fila_creg -> junio;
		  $creg_07= $fila_creg -> julio;
		  $creg_08= $fila_creg -> agosto;
		  $creg_09= $fila_creg -> septiembre;
		  $creg_10= $fila_creg -> octubre;
		  $creg_11= $fila_creg -> noviembre;
		  $creg_12= $fila_creg -> diciembre;
		  
		  if($creg_03=="0"){
			   $creg_03="0.00";
		  }
		  if($creg_04=="0"){
			   $creg_04="0.00";
		  }
		  if($creg_05=="0"){
			   $creg_05="0.00";
		  }
		  if($creg_06=="0"){
			   $creg_06="0.00";
		  }
		  if($creg_07=="0"){
			   $creg_07="0.00";
		  }
		  if($creg_08=="0"){
			   $creg_08="0.00";
		  }
		  if($creg_09=="0"){
			   $creg_09="0.00";
		  }
		  if($creg_10=="0"){
			   $creg_10="0.00";
		  }
		  if($creg_11=="0"){
			   $creg_11="0.00";
		  }
		  if($creg_12=="0"){
			   $creg_12="0.00";
		  }
		
		$totaregistro = $creg_01 + $creg_02 + $creg_03 + $creg_04 + $creg_05 + $creg_06 + $creg_07 + $creg_08 + $creg_09 + $creg_10 + $creg_11 + $creg_12;
		  }
	  }else{
		  $creg_01= "0.00";
		  $creg_02= "0.00";
		  $creg_03= "0.00";
		  $creg_04= "0.00";
		  $creg_05= "0.00";
		  $creg_06= "0.00";
		  $creg_07= "0.00";
		  $creg_08= "0.00";
		  $creg_09= "0.00";
		  $creg_10= "0.00";
		  $creg_11= "0.00";
		  $creg_12= "0.00";
		  $totaregistro = "0.00";
	  }
	  
	  //cuenta cantidad de duas
	   $query_dua = "SELECT Count(DISTINCT exportacion.ndcl) as cant_dua, extract(MONTH from exportacion.fnum) as mes FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' GROUP BY mes order BY mes ASC";	
$resultado_dua = $conexpg -> prepare($query_dua); 
$resultado_dua -> execute(); 
$duaps = $resultado_dua -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_dua -> rowCount() > 0)   { 
foreach($duaps as $fila_dua) {
		  $aniodua= $fila_dua -> mes;
		  
		  if($aniodua=='01'){
			  $rdua01=$fila_dua -> cant_dua; 
		  }
		  if($aniodua=='02'){
			  $rdua02=$fila_dua -> cant_dua;
		  }
		  if($aniodua=='03'){
			  $rdua03=$fila_dua -> cant_dua;
		  }
		  
		  if($aniodua=='04'){
			 $rdua04=$fila_dua -> cant_dua;
		  }

		  if($aniodua=='05'){
			  $rdua05=$fila_dua -> cant_dua;
		  }
		  
		   if($aniodua=='06'){
			  $rdua06=$fila_dua -> cant_dua;
		  }
		  
		   if($aniodua=='07'){
			  $rdua07=$fila_dua -> cant_dua;
		  }
		  
		   if($aniodua=='08'){
			  $rdua08=$fila_dua -> cant_dua;
		  }
		  
		   if($aniodua=='09'){
			  $rdua09=$fila_dua -> cant_dua;
		  }
		  
		   if($aniodua=='10'){
			  $rdua10=$fila_dua -> cant_dua;
		  }
		  
		   if($aniodua=='11'){
			  $rdua11=$fila_dua -> cant_dua;
		  }
		  
		   if($aniodua=='12'){
			  $rdua12=$fila_dua -> cant_dua;
		  }
		  
		  }
	  }else{
		  $rdua01= "0.00";
		  $rdua02= "0.00";
		  $rdua03= "0.00";
		  $rdua04= "0.00";
		  $rdua05= "0.00";
		  $rdua06= "0.00";
		  $rdua07= "0.00";
		  $rdua08= "0.00";
		  $rdua09= "0.00";
		  $rdua10= "0.00";
		  $rdua11= "0.00";
		  $rdua12= "0.00";
	  }
	  
	  //total general de duas
	  $generalB = "SELECT Count(DISTINCT exportacion.ndcl) as cant_dua FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi  WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' ";	
$res_generaB = $conexpg -> prepare($generalB); 
$res_generaB -> execute(); 
$rduaps = $res_generaB -> fetchAll(PDO::FETCH_OBJ); 
if($res_generaB -> rowCount() > 0)   { 
foreach($rduaps as $fila_generaB) {
			  $totadua = $fila_generaB -> cant_dua;
		  }
	  }else{
		  $totadua = "0.00";
	  }
	  
	  //cuenta cantidad de empresas
	   $query_emp = "SELECT Count(DISTINCT exportacion.dnombre) as cant_nom, extract(MONTH from exportacion.fnum) as mes FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi  WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' GROUP BY mes order BY mes ASC";	
$resultado_emp = $conexpg -> prepare($query_emp); 
$resultado_emp -> execute(); 
$cempps = $resultado_emp -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_emp -> rowCount() > 0)   { 
foreach($cempps as $fila_emp) {
		  $anioemp= $fila_emp -> mes;
		  
		  if($anioemp=='01'){
			  $remp01=$fila_emp -> cant_nom;
		  }
		  if($anioemp=='02'){
			  $remp02=$fila_emp -> cant_nom;
		  }
		  if($anioemp=='03'){
			  $remp03=$fila_emp -> cant_nom;
		  }
		  if($anioemp=='04'){
			  $remp04=$fila_emp -> cant_nom;
		  }
			  
		  if($anioemp=='05'){
			  $remp05=$fila_emp -> cant_nom;
		  }
		  
		  if($anioemp=='06'){
			  $remp06=$fila_emp -> cant_nom;
		  }
		  
		  if($anioemp=='07'){
			  $remp07=$fila_emp -> cant_nom;
		  }
		  
		  if($anioemp=='08'){
			  $remp08=$fila_emp -> cant_nom;
		  }
		  
		  if($anioemp=='09'){
			  $remp09=$fila_emp -> cant_nom;
		  }
		  
		  if($anioemp=='10'){
			  $remp10=$fila_emp -> cant_nom;
		  }
		  
		  if($anioemp=='11'){
			  $remp11=$fila_emp -> cant_nom;
		  }
		  
		  if($anioemp=='12'){
			  $remp12=$fila_emp -> cant_nom;
		  }

		  }
	  }else{
		  $remp01= "0.00";
		  $remp02= "0.00";
		  $remp03= "0.00";
	      $remp04= "0.00";
		  $remp05= "0.00";
		  $remp06= "0.00";
		  $remp07= "0.00";
		  $remp08= "0.00";
		  $remp09= "0.00";
		  $remp10= "0.00";
		  $remp11= "0.00";
		  $remp12= "0.00";
	  }
	  
	  //total general de emepresas
	  $generalC = "SELECT Count(DISTINCT exportacion.dnombre) as cant_nom FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi  WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid'";	
$res_generaC = $conexpg -> prepare($generalC); 
$res_generaC -> execute(); 
$tcempps = $res_generaC -> fetchAll(PDO::FETCH_OBJ); 
if($res_generaC -> rowCount() > 0)   { 
foreach($tcempps as $fila_generaC) {
			  $totaempre = $fila_generaC -> cant_nom;
		  }
	  }else{
		  $totaempre = "0.00";
	  }
	  
	  /*cantidad de mercados*/
	 $query_merca = "SELECT Count(DISTINCT exportacion.cpaides) as cant_mer, extract(MONTH from exportacion.fnum) as mes FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi  WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' GROUP BY mes order BY mes ASC";
	$resultado_merca = $conexpg -> prepare($query_merca); 
$resultado_merca -> execute(); 
$mempps = $resultado_merca -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_merca -> rowCount() > 0)   { 
foreach($mempps as $fila_merca) {
		  $aniomerca= $fila_merca -> mes;
		  
		  if($aniomerca=='01'){
			  $rmer01=$fila_merca -> cant_mer;
		  }
		  if($aniomerca=='02'){
			  $rmer02=$fila_merca -> cant_mer;
		  }
		  if($aniomerca=='03'){
			  $rmer03=$fila_merca -> cant_mer;
		  }
		  if($aniomerca=='04'){
			  $rmer04=$fila_merca -> cant_mer;
		  }
		  
		  if($aniomerca=='05'){
			  $rmer05=$fila_merca -> cant_mer;
		  }
		  
		  if($aniomerca=='06'){
			  $rmer06=$fila_merca -> cant_mer;
		  }
		  
		  if($aniomerca=='07'){
			  $rmer07=$fila_merca -> cant_mer;
		  }
		  
		  if($aniomerca=='08'){
			  $rmer08=$fila_merca -> cant_mer;
		  }
		  
		  if($aniomerca=='09'){
			  $rmer09=$fila_merca -> cant_mer;
		  }
		  
		  if($aniomerca=='10'){
			  $rmer10=$fila_merca -> cant_mer;
		  }
		  
		  if($aniomerca=='11'){
			  $rmer11=$fila_merca -> cant_mer;
		  }
		  
		  if($aniomerca=='12'){
			  $rmer12=$fila_merca -> cant_mer;
		  }
		   
		  }
	  }else{
		  $rmer01= "0.00";
		  $rmer02= "0.00";
		  $rmer03= "0.00";
		  $rmer04= "0.00";
		  $rmer05= "0.00";
		  $rmer06= "0.00";
		  $rmer07= "0.00";
		  $rmer08= "0.00";
		  $rmer09= "0.00";
		  $rmer10= "0.00";
		  $rmer11= "0.00";
		  $rmer12= "0.00";
	  }

/*total general de mercados*/
	  $generalmC = "SELECT Count(DISTINCT exportacion.cpaides) as cant_mer FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE extract(year from exportacion.fnum) = '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' ";	
$resultado_marc = $conexpg -> prepare($generalmC); 
$resultado_marc -> execute(); 
$macpps = $resultado_marc -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_marc -> rowCount() > 0)   { 
foreach($macpps as $fila_getaC) {
			  $totamerca = $fila_getaC -> cant_mer;
		  }
	  }else{
		  $totamerca = "0.00";
	  }
	  
	  /*contamos cantidad de puertos*/
	   $query_pue = "SELECT Count(DISTINCT exportacion.cpuedes) as cant_pue, extract(MONTH from exportacion.fnum) as mes FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi  WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' GROUP BY mes order BY mes ASC";	
$resultado_pue = $conexpg -> prepare($query_pue); 
$resultado_pue -> execute(); 
$cpuepps = $resultado_pue -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_pue -> rowCount() > 0)   { 
foreach($cpuepps as $fila_pue) {
		  $aniopue= $fila_pue -> mes;
		  
		  if($aniopue=='01'){
			  $rpue01=$fila_pue -> cant_pue;
		  }
		  if($aniopue=='02'){
			  $rpue02=$fila_pue -> cant_pue;
		  }
		  if($aniopue=='03'){
			  $rpue03=$fila_pue -> cant_pue;
		  }
		  if($aniopue=='04'){
			  $rpue04=$fila_pue -> cant_pue;
		  }
		  
		  if($aniopue=='05'){
			  $rpue05=$fila_pue -> cant_pue;
		  }
		  
		  if($aniopue=='06'){
			  $rpue06=$fila_pue -> cant_pue;
		  }
		  
		  if($aniopue=='07'){
			  $rpue07=$fila_pue -> cant_pue;
		  }
		  
		  if($aniopue=='08'){
			  $rpue08=$fila_pue -> cant_pue;
		  }
		  
		  if($aniopue=='09'){
			  $rpue09=$fila_pue -> cant_pue;
		  }
		  
		  if($aniopue=='10'){
			  $rpue10=$fila_pue -> cant_pue;
		  }
		  
		  if($aniopue=='11'){
			  $rpue11=$fila_pue -> cant_pue;
		  }
		  
		  if($aniopue=='12'){
			  $rpue12=$fila_pue -> cant_pue;
		  }
		  
		  }
	  }else{
		  $rpue01= "0.00";
		  $rpue02= "0.00";
		  $rpue03= "0.00";
		  $rpue04= "0.00";
		  $rpue05= "0.00";
		  $rpue06= "0.00";
		  $rpue07= "0.00";
		  $rpue08= "0.00";
		  $rpue09= "0.00";
		  $rpue10= "0.00";
		  $rpue11= "0.00";
		  $rpue12= "0.00";
	  }
	  
	   //total general de puertos*/
	  $generalD = "SELECT Count(DISTINCT exportacion.cpuedes) as cant_pue FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid'";	
$res_generaD = $conexpg -> prepare($generalD); 
$res_generaD -> execute(); 
$tpueps = $res_generaD -> fetchAll(PDO::FETCH_OBJ); 
if($res_generaD -> rowCount() > 0)   { 
foreach($tpueps as $fila_generaD) {
			  $totapuerto = $fila_generaD -> cant_pue;
		  }
	  }else{
		  $totapuerto = "0.00";
	  }
	  
	  //contamos cantidad de aduanas
	   $query_adua = "SELECT Count(DISTINCT exportacion.cadu) as cant_adua, extract(MONTH from exportacion.fnum) as mes FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi  WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' GROUP BY mes order BY mes ASC";
$resultado_adua = $conexpg -> prepare($query_adua); 
$resultado_adua -> execute(); 
$aduanps = $resultado_adua -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_adua -> rowCount() > 0)   { 
foreach($aduanps as $fila_adua) {
		  $anioadua= $fila_adua -> mes;
		  
		  if($anioadua=='01'){
			  $radua01=$fila_adua -> cant_adua;
		  }
		  if($anioadua=='02'){
			  $radua02=$fila_adua -> cant_adua;
		  }
		  if($anioadua=='03'){
			  $radua03=$fila_adua -> cant_adua;
		  }
		  if($anioadua=='04'){
			  $radua04=$fila_adua -> cant_adua;
		  }
		  
		  if($anioadua=='05'){
			  $radua05=$fila_adua -> cant_adua;
		  }
		  
		  if($anioadua=='06'){
			  $radua06=$fila_adua -> cant_adua;
		  }
		  
		  if($anioadua=='07'){
			  $radua07=$fila_adua -> cant_adua;
		  }
		  
		  if($anioadua=='08'){
			  $radua08=$fila_adua -> cant_adua;
		  }
		  
		  if($anioadua=='09'){
			  $radua09=$fila_adua -> cant_adua;
		  }
		  
		  if($anioadua=='10'){
			  $radua10=$fila_adua -> cant_adua;
		  }
		  
		  if($anioadua=='11'){
			  $radua11=$fila_adua -> cant_adua;
		  }
		  
		  if($anioadua=='12'){
			  $radua12=$fila_adua -> cant_adua;
		  }

		  }
	  }else{
		  $radua01= "0.00";
		  $radua02= "0.00";
		  $radua03= "0.00";
	      $radua04= "0.00";
		  $radua05= "0.00";
		  $radua06= "0.00";
		  $radua07= "0.00";
		  $radua08= "0.00";
		  $radua09= "0.00";
		  $radua10= "0.00";
		  $radua11= "0.00";
		  $radua12= "0.00";
	  }
	  
	  //total general de aduanas
	  $generalE = "SELECT Count(DISTINCT exportacion.cadu) as cant_adua FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' ";
$res_generaE = $conexpg -> prepare($generalE); 
$res_generaE -> execute(); 
$atduanps = $res_generaE -> fetchAll(PDO::FETCH_OBJ); 
if($res_generaE -> rowCount() > 0)   { 
foreach($atduanps as $fila_generaE) {
			  $totaduana = $fila_generaE -> cant_adua;
		  }
	  }else{
		  $totaduana = "0.00";
	  }
	  
	  //contamnos cantidad de departamento
	  /* $query_merca = "SELECT COUNT(DISTINCT departamento.nombre) as departamento, extract(MONTH from exportacion.fnum) as mes FROM exportacion LEFT JOIN departamento ON  ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE extract(year from exportacion.fnum)= '$anio' $queryes AND exportacion.cpaides='$paiscode' GROUP BY mes ORDER BY mes ASC";
$resultado_merca = $conexpg -> prepare($query_merca); 
$resultado_merca -> execute(); 
$catdepps = $resultado_merca -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_merca -> rowCount() > 0)   { 
foreach($catdepps as $fila_merca) {
		  $aniomerca= $fila_merca -> mes;
		  
		  if($aniomerca=='01'){
			  $rdepa01=$fila_merca -> departamento;
		  }
		  if($aniomerca=='02'){
			  $rdepa02=$fila_merca -> departamento;
		  }
		  if($aniomerca=='03'){
			  $rdepa03=$fila_merca -> departamento;
		  }
		  if($aniomerca=='04'){
			  $rdepa04=$fila_merca -> departamento;
		  }
		  if($aniomerca=='05'){
			  $rdepa05=$fila_merca -> departamento;
		  }
		  if($aniomerca=='06'){
			  $rdepa06=$fila_merca -> departamento;
		  }
		  if($aniomerca=='07'){
			  $rdepa07=$fila_merca -> departamento;
		  }
		  if($aniomerca=='08'){
			  $rdepa08=$fila_merca -> departamento;
		  }
		  if($aniomerca=='09'){
			  $rdepa09=$fila_merca -> departamento;
		  }
		  if($aniomerca=='10'){
			  $rdepa10=$fila_merca -> departamento;
		  }
		  if($aniomerca=='11'){
			  $rdepa11=$fila_merca -> departamento;
		  }
		  if($aniomerca=='12'){
			  $rdepa12=$fila_merca -> departamento;
		  }
		   
		  }
	  }else{
		  $rdepa01= "0.00";
		  $rdepa02= "0.00";
		  $rdepa03= "0.00";
		  $rdepa04= "0.00";
		  $rdepa05= "0.00";
		  $rdepa06= "0.00";
		  $rdepa07= "0.00";
		  $rdepa08= "0.00";
		  $rdepa09= "0.00";
		  $rdepa10= "0.00";
		  $rdepa11= "0.00";
		  $rdepa12= "0.00";
	  }
	  
	  //total general de departamentos
	  $generalF = "SELECT COUNT(DISTINCT departamento.nombre) as departamento FROM exportacion LEFT JOIN departamento ON  ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) WHERE extract(year from exportacion.fnum)= '$anio' $queryes AND exportacion.cpaides='$paiscode' ";
$res_generaF = $conexpg -> prepare($generalF); 
$res_generaF -> execute(); 
$ddepps = $res_generaF -> fetchAll(PDO::FETCH_OBJ); 
if($res_generaF -> rowCount() > 0)   { 
foreach($ddepps as $fila_generaF) {
			  $totaldepa = $fila_generaF -> departamento;
		  }
	  }else{
		  $totaldepa = "0.00";
	  }
	  
	  //contamnos cantidad de provincia
	   $query_prov = "SELECT count(DISTINCT provincia.nombre) as provincia, extract(MONTH from exportacion.fnum) as mes FROM exportacion LEFT JOIN departamento ON  (((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))  INNER JOIN provincia ON provincia.iddepartamento = departamento.iddepartamento WHERE extract(year from exportacion.fnum)= '$anio' $queryes AND exportacion.cpaides='$paiscode' GROUP BY mes ORDER BY mes ASC";
$resultado_prov = $conexpg -> prepare($query_prov); 
$resultado_prov -> execute(); 
$provps = $resultado_prov -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_prov -> rowCount() > 0)   { 
foreach($provps as $fila_prov) {
		  $anioprov= $fila_prov -> mes;
		  
		  if($anioprov=='01'){
			  $rprov01=$fila_prov -> provincia;
		  }
		  if($anioprov=='02'){
			  $rprov02=$fila_prov -> provincia;
		  }
		  if($anioprov=='03'){
			  $rprov03=$fila_prov -> provincia;
		  }
		  if($anioprov=='04'){
			  $rprov04=$fila_prov -> provincia;
		  }
		  if($anioprov=='05'){
			  $rprov05=$fila_prov -> provincia;
		  }
		  if($anioprov=='06'){
			  $rprov06=$fila_prov -> provincia;
		  }
		  if($anioprov=='07'){
			  $rprov07=$fila_prov -> provincia;
		  }
		  if($anioprov=='08'){
			  $rprov08=$fila_prov -> provincia;
		  }
		  if($anioprov=='09'){
			  $rprov09=$fila_prov -> provincia;
		  }
		  if($anioprov=='10'){
			  $rprov10=$fila_prov -> provincia;
		  }
		  if($anioprov=='11'){
			  $rprov11=$fila_prov -> provincia;
		  }
		  if($anioprov=='12'){
			  $rprov12=$fila_prov -> provincia;
		  }
		  
		   
		  }
	  }else{
		  $rprov01= "0.00";
		  $rprov02= "0.00";
		  $rprov03= "0.00";
		  $rprov04= "0.00";
		  $rprov05= "0.00";
		  $rprov06= "0.00";
		  $rprov07= "0.00";
		  $rprov08= "0.00";
		  $rprov09= "0.00";
		  $rprov10= "0.00";
		  $rprov11= "0.00";
		  $rprov12= "0.00";
		  
	 }
	 
	  //total general de provincias
	  $generalG = "SELECT count(DISTINCT provincia.nombre) as provincia FROM exportacion LEFT JOIN departamento ON  (((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))  INNER JOIN provincia ON provincia.iddepartamento = departamento.iddepartamento WHERE extract(year from exportacion.fnum)= '$anio' $queryes AND exportacion.cpaides='$paiscode' ";
$res_generaG = $conexpg -> prepare($generalG); 
$res_generaG -> execute(); 
$tprovps = $res_generaG -> fetchAll(PDO::FETCH_OBJ); 
if($res_generaG -> rowCount() > 0)   { 
foreach($tprovps as $fila_generaG) {
			  $totalprovi = $fila_generaG -> provincia;
		  }
	  }else{
		  $totalprovi = "0.00";
	  }
	  
	  //contamnos cantidad de distrito
	   $query_dist = "SELECT count(DISTINCT distrito.nombre) AS distrito, extract(MONTH from exportacion.fnum) AS mes FROM exportacion LEFT JOIN distrito ON exportacion.ubigeo= distrito.iddistrito WHERE extract(year from exportacion.fnum)= '$anio' $queryes AND exportacion.cpaides='$paiscode' GROUP BY mes ORDER BY mes ASC";
$resultado_dist = $conexpg -> prepare($query_dist); 
$resultado_dist -> execute(); 
$ctndips = $resultado_dist -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_dist -> rowCount() > 0)   { 
foreach($ctndips as $fila_dist) {
			  $aniodist= $fila_dist -> mes;
			  
			  if($aniodist=='01'){
			  $distri01=$fila_dist -> distrito;
		       }
			   if($aniodist=='02'){
			  $distri02=$fila_dist -> distrito;
		       }
			   if($aniodist=='03'){
			  $distri03=$fila_dist -> distrito;
		       }
			   if($aniodist=='04'){
			  $distri04=$fila_dist -> distrito;
		       }
			   if($aniodist=='05'){
			  $distri05=$fila_dist -> distrito;
		       }
			    if($aniodist=='06'){
			  $distri06=$fila_dist -> distrito;
		       }
			    if($aniodist=='07'){
			  $distri07=$fila_dist -> distrito;
		       }
			    if($aniodist=='08'){
			  $distri08=$fila_dist -> distrito;
		       }
			    if($aniodist=='09'){
			  $distri09=$fila_dist -> distrito;
		       }
			    if($aniodist=='10'){
			  $distri10=$fila_dist -> distrito;
		       }
			    if($aniodist=='11'){
			  $distri11=$fila_dist -> distrito;
		       }
			    if($aniodist=='12'){
			  $distri12=$fila_dist -> distrito;
		       }
			   
				 
		  }
	  }else{
		  $distri01="0.00";
		  $distri02="0.00";
		  $distri03="0.00";
		  $distri04="0.00";
		  $distri05="0.00";
		  $distri06="0.00";
		  $distri07="0.00";
		  $distri08="0.00";
		  $distri09="0.00";
		  $distri10="0.00";
		  $distri11="0.00";
		  $distri12="0.00";
	  }
	  
	   //total general de distrito
	  $generalH = "SELECT count(DISTINCT distrito.nombre) AS distrito FROM exportacion LEFT JOIN distrito ON exportacion.ubigeo= distrito.iddistrito WHERE extract(year from exportacion.fnum)= '$anio' $queryes AND exportacion.cpaides='$paiscode' ";	
$res_generaH = $conexpg -> prepare($generalH); 
$res_generaH -> execute(); 
$cttndips = $res_generaH -> fetchAll(PDO::FETCH_OBJ); 
if($res_generaH -> rowCount() > 0)   { 
foreach($cttndips as $fila_generaH) {
			  $totaldist = $fila_generaH -> distrito;
		  }
	  }else{
		  $totaldist = "0.00";
	  }
	  */
	  
	  //contamnos cantidad de agente
	   $query_agen = "SELECT Count(DISTINCT exportacion.cage) as cant_agen, extract(MONTH from exportacion.fnum) as mes FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi   WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' GROUP BY mes order BY mes ASC";
$resultado_agen = $conexpg -> prepare($query_agen); 
$resultado_agen -> execute(); 
$agnnps = $resultado_agen -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_agen -> rowCount() > 0)   { 
foreach($agnnps as $fila_agen) {
		  $anioagen= $fila_agen -> mes;
		  
		  if($anioagen=='01'){
			  $ragen01=$fila_agen -> cant_agen;
		  }
		  if($anioagen=='02'){
			  $ragen02=$fila_agen -> cant_agen;
		  }
		  if($anioagen=='03'){
			  $ragen03=$fila_agen -> cant_agen;
		  }
		  if($anioagen=='04'){
			  $ragen04=$fila_agen -> cant_agen;
		  }
		  
		  if($anioagen=='05'){
			  $ragen05=$fila_agen -> cant_agen;
		  }
		  
		  if($anioagen=='06'){
			  $ragen06=$fila_agen -> cant_agen;
		  }
		  
		  if($anioagen=='07'){
			  $ragen07=$fila_agen -> cant_agen;
		  }
		  
		  if($anioagen=='08'){
			  $ragen08=$fila_agen -> cant_agen;
		  }
		  
		  if($anioagen=='09'){
			  $ragen09=$fila_agen -> cant_agen;
		  }
		  
		  if($anioagen=='10'){
			  $ragen10=$fila_agen -> cant_agen;
		  }
		  
		  if($anioagen=='11'){
			  $ragen11=$fila_agen -> cant_agen;
		  }
		  
		  if($anioagen=='12'){
			  $ragen12=$fila_agen -> cant_agen;
		  }
 
		  }
	  }else{
		  $ragen01= "0.00";
		  $ragen02= "0.00";
		  $ragen03= "0.00";
		  $ragen04= "0.00";
		  $ragen05= "0.00";
		  $ragen06= "0.00";
		  $ragen07= "0.00";
		  $ragen08= "0.00";
		  $ragen09= "0.00";
		  $ragen10= "0.00";
		  $ragen11= "0.00";
		  $ragen12= "0.00";
	  }
	  
	   //total general de agentes
	  $generalI = "SELECT Count(DISTINCT exportacion.cage) as cant_agen FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid'";	
$res_generaI = $conexpg -> prepare($generalI); 
$res_generaI -> execute(); 
$agnnps = $res_generaI -> fetchAll(PDO::FETCH_OBJ); 
if($res_generaI -> rowCount() > 0)   { 
foreach($agnnps as $fila_generaI) {
			  $totagente = $fila_generaI -> cant_agen;
		  }
	  }else{
		  $totagente = "0.00";
	  }
	  
	  //contamos cantidad via de transporte
	   $query_via = "SELECT Count(DISTINCT exportacion.cviatra) as cant_via, extract(MONTH from exportacion.fnum) as mes FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi  WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' GROUP BY mes order BY mes ASC";	
$resultado_via = $conexpg -> prepare($query_via); 
$resultado_via -> execute(); 
$traaps = $resultado_via -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_via -> rowCount() > 0)   { 
foreach($traaps as $fila_via) {
		  $aniovia= $fila_via -> mes;
		  
		  if($aniovia=='01'){
			  $rvia01=$fila_via -> cant_via;
		  }
		  if($aniovia=='02'){
			  $rvia02=$fila_via -> cant_via;
		  }
		  if($aniovia=='03'){
			  $rvia03=$fila_via -> cant_via;
		  }
		  if($aniovia=='04'){
			  $rvia04=$fila_via -> cant_via;
		  }
		  if($aniovia=='05'){
			  $rvia05=$fila_via -> cant_via;
		  }
		  
		  if($aniovia=='06'){
			  $rvia06=$fila_via -> cant_via;
		  }
		  
		  if($aniovia=='07'){
			  $rvia07=$fila_via -> cant_via;
		  }
		  
		  if($aniovia=='08'){
			  $rvia08=$fila_via -> cant_via;
		  }
		  
		  if($aniovia=='09'){
			  $rvia09=$fila_via -> cant_via;
		  }
		  
		  if($aniovia=='10'){
			  $rvia10=$fila_via -> cant_via;
		  }
		  
		  if($aniovia=='11'){
			  $rvia11=$fila_via -> cant_via;
		  }
		  
		  if($aniovia=='12'){
			  $rvia12=$fila_via -> cant_via;
		  }

		  }
	  }else{
		  $rvia01= "0.00";
		  $rvia02= "0.00";
		  $rvia03= "0.00";
		  $rvia04= "0.00";
		  $rvia05= "0.00";
		  $rvia06= "0.00";
		  $rvia07= "0.00";
		  $rvia08= "0.00";
		  $rvia09= "0.00";
		  $rvia10= "0.00";
		  $rvia11= "0.00";
		  $rvia12= "0.00";
	  }
	  
	  //total general de via de transporte
$generalJ = "SELECT Count(DISTINCT exportacion.cviatra) as cant_via FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi  WHERE extract(year from exportacion.fnum)= '$anio' $query1 AND concat(sector.tipo,sector.sector)='$codeid' ";	
$res_generaJ = $conexpg -> prepare($generalJ); 
$res_generaJ -> execute(); 
$ttraaps = $res_generaJ -> fetchAll(PDO::FETCH_OBJ); 
if($res_generaJ -> rowCount() > 0)   { 
foreach($ttraaps as $fila_generaJ) {
			  $totalvia = $fila_generaJ -> cant_via;
		  }
	  }else{
		  $totalvia = "0.00";
	  }

?>

<div class="col-lg-12 col-12">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Reporte Analisis Sectores Indicador Mensual - Exportaciones </h4>
						</div>
							<div class="box-body">
								<div class="form-group">
								  <label class="form-label"><b>Sector:</b> <?=$namesector;?> <b>│ Departamento:</b> <?=$namedepa1;?> <b>│</b> Fecha Numeraci&oacute;n <b>│ Periodo:</b> <?=$anio;?></label>
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
							  <th>Enero</th>
                              <th>Febrero</th>
                              <th>Marzo</th>
                              <th>Abril</th>
                              <th>Mayo</th>
							  <th>Junio</th>
							  <th>Julio</th>
							  <th>Agosto</th>
							  <th>Septiembre</th>
							  <th>Octubre</th>
							  <th>Noviembre</th>
							  <th>Diciembre</th>
							  <th>Total</th>
							</tr>
						</thead>
						<tbody>
<?php
echo "<tr>";
echo "<td>1</td>";
echo "<td>Valor FOB USD </td>";
echo "<td>".number_format($vfob_01,2)."</td>";
echo "<td>".number_format($vfob_02,2)."</td>";
echo "<td>".number_format($vfob_03,2)."</td>";
echo "<td>".number_format($vfob_04,2)."</td>";
echo "<td>".number_format($vfob_05,2)."</td>";
echo "<td>".number_format($vfob_06,2)."</td>";
echo "<td>".number_format($vfob_07,2)."</td>";
echo "<td>".number_format($vfob_08,2)."</td>";
echo "<td>".number_format($vfob_09,2)."</td>";
echo "<td>".number_format($vfob_10,2)."</td>";
echo "<td>".number_format($vfob_11,2)."</td>";
echo "<td>".number_format($vfob_12,2)."</td>";
echo "<td>".number_format($totafob,2)."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>2</td>";
echo "<td>Peso Neto (Kg) </td>";
echo "<td>".number_format($vpes_01,2)."</td>";
echo "<td>".number_format($vpes_02,2)."</td>";
echo "<td>".number_format($vpes_03,2)."</td>";
echo "<td>".number_format($vpes_04,2)."</td>";
echo "<td>".number_format($vpes_05,2)."</td>";
echo "<td>".number_format($vpes_06,2)."</td>";
echo "<td>".number_format($vpes_07,2)."</td>";
echo "<td>".number_format($vpes_08,2)."</td>";
echo "<td>".number_format($vpes_09,2)."</td>";
echo "<td>".number_format($vpes_10,2)."</td>";
echo "<td>".number_format($vpes_11,2)."</td>";
echo "<td>".number_format($vpes_12,2)."</td>";
echo "<td>".number_format($totalvpes,2)."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>3</td>";
echo "<td>Precio FOB USD x KG </td>";
echo "<td>".number_format($preciofob01,2)."</td>";
echo "<td>".number_format($preciofob02,2)."</td>";
echo "<td>".number_format($preciofob03,2)."</td>";
echo "<td>".number_format($preciofob04,2)."</td>";
echo "<td>".number_format($preciofob05,2)."</td>";
echo "<td>".number_format($preciofob06,2)."</td>";
echo "<td>".number_format($preciofob07,2)."</td>";
echo "<td>".number_format($preciofob08,2)."</td>";
echo "<td>".number_format($preciofob09,2)."</td>";
echo "<td>".number_format($preciofob10,2)."</td>";
echo "<td>".number_format($preciofob11,2)."</td>";
echo "<td>".number_format($preciofob12,2)."</td>";
echo "<td>".number_format($promediotota,2)."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>4</td>";
echo "<td>Peso Bruto (Kg) </td>";
echo "<td>".number_format($vbru_01,2)."</td>";
echo "<td>".number_format($vbru_02,2)."</td>";
echo "<td>".number_format($vbru_03,2)."</td>";
echo "<td>".number_format($vbru_04,2)."</td>";
echo "<td>".number_format($vbru_05,2)."</td>";
echo "<td>".number_format($vbru_06,2)."</td>";
echo "<td>".number_format($vbru_07,2)."</td>";
echo "<td>".number_format($vbru_08,2)."</td>";
echo "<td>".number_format($vbru_09,2)."</td>";
echo "<td>".number_format($vbru_10,2)."</td>";
echo "<td>".number_format($vbru_11,2)."</td>";
echo "<td>".number_format($vbru_12,2)."</td>";
echo "<td>".number_format($totapesob,2)."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>5</td>";
echo "<td>Cantidad Exportada </td>";
echo "<td>".number_format($qunifis_01,2)."</td>";
echo "<td>".number_format($qunifis_02,2)."</td>";
echo "<td>".number_format($qunifis_03,2)."</td>";
echo "<td>".number_format($qunifis_04,2)."</td>";
echo "<td>".number_format($qunifis_05,2)."</td>";
echo "<td>".number_format($qunifis_06,2)."</td>";
echo "<td>".number_format($qunifis_07,2)."</td>";
echo "<td>".number_format($qunifis_08,2)."</td>";
echo "<td>".number_format($qunifis_09,2)."</td>";
echo "<td>".number_format($qunifis_10,2)."</td>";
echo "<td>".number_format($qunifis_11,2)."</td>";
echo "<td>".number_format($qunifis_12,2)."</td>";
echo "<td>".number_format($totaqunifis,2)."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>6</td>";
echo "<td>Unidades Comerciales </td>";
echo "<td>".number_format($qunicom_01,2)."</td>";
echo "<td>".number_format($qunicom_02,2)."</td>";
echo "<td>".number_format($qunicom_03,2)."</td>";
echo "<td>".number_format($qunicom_04,2)."</td>";
echo "<td>".number_format($qunicom_05,2)."</td>";
echo "<td>".number_format($qunicom_06,2)."</td>";
echo "<td>".number_format($qunicom_07,2)."</td>";
echo "<td>".number_format($qunicom_08,2)."</td>";
echo "<td>".number_format($qunicom_09,2)."</td>";
echo "<td>".number_format($qunicom_10,2)."</td>";
echo "<td>".number_format($qunicom_11,2)."</td>";
echo "<td>".number_format($qunicom_12,2)."</td>";
echo "<td>".number_format($totaqunicom,2)."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>7</td>";
echo "<td>Cantidad de Partidas</td>";
echo "<td>$rparti01</td>";
echo "<td>$rparti02</td>";
echo "<td>$rparti03</td>";
echo "<td>$rparti04</td>";
echo "<td>$rparti05</td>";
echo "<td>$rparti06</td>";
echo "<td>$rparti07</td>";
echo "<td>$rparti08</td>";
echo "<td>$rparti09</td>";
echo "<td>$rparti10</td>";
echo "<td>$rparti11</td>";
echo "<td>$rparti12</td>";
echo "<td>$totapartida</td>";
echo "</tr>";
echo "<tr>";
echo "<td>8</td>";
echo "<td>Cantidad de Registros</td>";
echo "<td>$creg_01</td>";
echo "<td>$creg_02</td>";
echo "<td>$creg_03</td>";
echo "<td>$creg_04</td>";
echo "<td>$creg_05</td>";
echo "<td>$creg_06</td>";
echo "<td>$creg_07</td>";
echo "<td>$creg_08</td>";
echo "<td>$creg_09</td>";
echo "<td>$creg_10</td>";
echo "<td>$creg_11</td>";
echo "<td>$creg_12</td>";
echo "<td>$totaregistro</td>";
echo "</tr>";
echo "<tr>";
echo "<td>9</td>";
echo "<td>Cantidad de Duas</td>";
echo "<td>$rdua01</td>";
echo "<td>$rdua02</td>";
echo "<td>$rdua03</td>";
echo "<td>$rdua04</td>";
echo "<td>$rdua05</td>";
echo "<td>$rdua06</td>";
echo "<td>$rdua07</td>";
echo "<td>$rdua08</td>";
echo "<td>$rdua09</td>";
echo "<td>$rdua10</td>";
echo "<td>$rdua11</td>";
echo "<td>$rdua12</td>";
echo "<td>$totadua</td>";
echo "</tr>";
echo "<tr>";
echo "<td>10</td>";
echo "<td>Cantidad de Empresas</td>";
echo "<td>$remp01</td>";
echo "<td>$remp02</td>";
echo "<td>$remp03</td>";
echo "<td>$remp04</td>";
echo "<td>$remp05</td>";
echo "<td>$remp06</td>";
echo "<td>$remp07</td>";
echo "<td>$remp08</td>";
echo "<td>$remp09</td>";
echo "<td>$remp10</td>";
echo "<td>$remp11</td>";
echo "<td>$remp12</td>";
echo "<td>$totaempre</td>";
echo "</tr>";
echo "<tr>";
echo "<td>11</td>";
echo "<td>Cantidad de Mercados</td>";
echo "<td>$rmer01</td>";
echo "<td>$rmer02</td>";
echo "<td>$rmer03</td>";
echo "<td>$rmer04</td>";
echo "<td>$rmer05</td>";
echo "<td>$rmer06</td>";
echo "<td>$rmer07</td>";
echo "<td>$rmer08</td>";
echo "<td>$rmer09</td>";
echo "<td>$rmer10</td>";
echo "<td>$rmer11</td>";
echo "<td>$rmer12</td>";
echo "<td>$totamerca</td>";
echo "</tr>";
echo "<tr>";
echo "<td>12</td>";
echo "<td>Cantidad de Puertos</td>";
echo "<td>$rpue01</td>";
echo "<td>$rpue02</td>";
echo "<td>$rpue03</td>";
echo "<td>$rpue04</td>";
echo "<td>$rpue05</td>";
echo "<td>$rpue06</td>";
echo "<td>$rpue07</td>";
echo "<td>$rpue08</td>";
echo "<td>$rpue09</td>";
echo "<td>$rpue10</td>";
echo "<td>$rpue11</td>";
echo "<td>$rpue12</td>";
echo "<td>$totapuerto</td>";
echo "</tr>";
echo "<tr>";
echo "<td>13</td>";
echo "<td>Cantidad de Aduanas</td>";
echo "<td>$radua01</td>";
echo "<td>$radua02</td>";
echo "<td>$radua03</td>";
echo "<td>$radua04</td>";
echo "<td>$radua05</td>";
echo "<td>$radua06</td>";
echo "<td>$radua07</td>";
echo "<td>$radua08</td>";
echo "<td>$radua09</td>";
echo "<td>$radua10</td>";
echo "<td>$radua11</td>";
echo "<td>$radua12</td>";
echo "<td>$totaduana</td>";
echo "</tr>";
/*echo "<tr>";
echo "<td>13</td>";
echo "<td>Cantidad de departamentos</td>";
echo "<td>$rdepa01</td>";
echo "<td>$rdepa02</td>";
echo "<td>$rdepa03</td>";
echo "<td>$rdepa04</td>";
echo "<td>$rdepa05</td>";
echo "<td>$rdepa06</td>";
echo "<td>$rdepa07</td>";
echo "<td>$rdepa08</td>";
echo "<td>$rdepa09</td>";
echo "<td>$rdepa10</td>";
echo "<td>$rdepa11</td>";
echo "<td>$rdepa12</td>";
echo "<td>$totaldepa</td>";
echo "</tr>";
echo "<tr>";
echo "<td>14</td>";
echo "<td>Cantidad de provincias</td>";
echo "<td>$rprov01</td>";
echo "<td>$rprov02</td>";
echo "<td>$rprov03</td>";
echo "<td>$rprov04</td>";
echo "<td>$rprov05</td>";
echo "<td>$rprov06</td>";
echo "<td>$rprov07</td>";
echo "<td>$rprov08</td>";
echo "<td>$rprov09</td>";
echo "<td>$rprov10</td>";
echo "<td>$rprov11</td>";
echo "<td>$rprov12</td>";
echo "<td>$totalprovi</td>";
echo "</tr>";
echo "<tr>";
echo "<td>15</td>";
echo "<td>Cantidad de distritos</td>";
echo "<td>$distri01</td>";
echo "<td>$distri02</td>";
echo "<td>$distri03</td>";
echo "<td>$distri04</td>";
echo "<td>$distri05</td>";
echo "<td>$distri06</td>";
echo "<td>$distri07</td>";
echo "<td>$distri08</td>";
echo "<td>$distri09</td>";
echo "<td>$distri10</td>";
echo "<td>$distri11</td>";
echo "<td>$distri12</td>";
echo "<td>$totaldist</td>";
echo "</tr>";*/
echo "<tr>";
echo "<td>14</td>";
echo "<td>Cantidad de Agentes</td>";
echo "<td>$ragen01</td>";
echo "<td>$ragen02</td>";
echo "<td>$ragen03</td>";
echo "<td>$ragen04</td>";
echo "<td>$ragen05</td>";
echo "<td>$ragen06</td>";
echo "<td>$ragen07</td>";
echo "<td>$ragen08</td>";
echo "<td>$ragen09</td>";
echo "<td>$ragen10</td>";
echo "<td>$ragen11</td>";
echo "<td>$ragen12</td>";
echo "<td>$totagente</td>";
echo "</tr>";
echo "<tr>";
echo "<td>15</td>";
echo "<td>Cantidad de Vías de Transporte</td>";
echo "<td>$rvia01</td>";
echo "<td>$rvia02</td>";
echo "<td>$rvia03</td>";
echo "<td>$rvia04</td>";
echo "<td>$rvia05</td>";
echo "<td>$rvia06</td>";
echo "<td>$rvia07</td>";
echo "<td>$rvia08</td>";
echo "<td>$rvia09</td>";
echo "<td>$rvia10</td>";
echo "<td>$rvia11</td>";
echo "<td>$rvia12</td>";
echo "<td>$totalvia</td>";
echo "</tr>";
	
?>
						</tbody>				  
						<tfoot>
							<tr>
							  <th>#</th>
							  <th>Indicadores</th>
							  <th>Enero</th>
                              <th>Febrero</th>
                              <th>Marzo</th>
                              <th>Abril</th>
                              <th>Mayo</th>
							  <th>Junio</th>
							  <th>Julio</th>
							  <th>Agosto</th>
							  <th>Septiembre</th>
							  <th>Octubre</th>
							  <th>Noviembre</th>
							  <th>Diciembre</th>
							  <th>Total</th>
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

