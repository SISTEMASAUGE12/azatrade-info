<?php
include("conex/inibd.php");

$name1 = $_GET['dat1'];
$name2 = $_GET['dat2'];

if($name1!=""){ 
	
	$sqlinsert = "DELETE FROM partidas_masiva_import WHERE iduser='$name1' and partida='$name2' ";
	$stmt = $conexpg->prepare($sqlinsert);
    $stmt->execute();
	
	//consultanos cantidades
		  $grupi = "SELECT
e.part_nandi,
p.partida_desc,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2012' THEN 1 ELSE 0 END) AS x2012,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2013' THEN 1 ELSE 0 END) AS x2013,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2014' THEN 1 ELSE 0 END) AS x2014,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2015' THEN 1 ELSE 0 END) AS x2015,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2016' THEN 1 ELSE 0 END) AS x2016,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2017' THEN 1 ELSE 0 END) AS x2017,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2018' THEN 1 ELSE 0 END) AS x2018,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2019' THEN 1 ELSE 0 END) AS x2019,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2020' THEN 1 ELSE 0 END) AS x2020,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2021' THEN 1 ELSE 0 END) AS x2021,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2022' THEN 1 ELSE 0 END) AS x2022,
SUM(CASE WHEN YEAR(e.fech_ingsi) = '2023' THEN 1 ELSE 0 END) AS x2023
FROM importacion AS e LEFT JOIN productos AS p ON e.part_nandi = p.partida_nandi 
WHERE e.part_nandi = '$dato' GROUP BY e.part_nandi";
$grut = $conexpg -> prepare($grupi); 
$grut -> execute(); 
$ggjs = $grut -> fetchAll(PDO::FETCH_OBJ); 
if($grut -> rowCount() > 0) { 
foreach($ggjs as $fvvt) {
	$nurqs1 = $fvvt -> part_nandi;
	$nurqs2 = $fvvt -> partida_desc;
	$nurqs3 = $fvvt -> x2012;
	$nurqs4 = $fvvt -> x2013;
	$nurqs5 = $fvvt -> x2014;
	$nurqs6 = $fvvt -> x2015;
	$nurqs7 = $fvvt -> x2016;
	$nurqs8 = $fvvt -> x2017;
	$nurqs9 = $fvvt -> x2018;
	$nurqs10 = $fvvt -> x2019;
	$nurqs11 = $fvvt -> x2020;
	$nurqs12 = $fvvt -> x2021;
	$nurqs13 = $fvvt -> x2022;
	$nurqs14 = $fvvt -> x2023;
}
}else{
	$nurqs2 = "";
}

if($nurqs2!=""){//si tiene datos
try {
  //insertamos registro de la partida seleccionada
$sqlinsert="INSERT INTO `partidas_masiva_import` (`iduser`, `partida`, `detalle`, `anio12`, `anio13`, `anio14`, `anio15`, `anio16`, `anio17`, `anio18`, `anio19`, `anio20`, `anio21`, `anio22`, `anio23`) VALUES ('".$name2."','".$nurqs1."', '".$nurqs2."', '".$nurqs3."', '".$nurqs4."', '".$nurqs5."', '".$nurqs6."', '".$nurqs7."', '".$nurqs8."', '".$nurqs9."', '".$nurqs10."', '".$nurqs11."', '".$nurqs12."', '".$nurqs13."', '".$nurqs14."')";
	$stmt = $conexpg->prepare($sqlinsert);
    $stmt->execute();
	//echo "New record created successfully - ";
	}
catch(PDOException $e){
    echo $sqlinsert . "<br>" . $e->getMessage();
    }
	
}
	
	$ale = "up";
	
}else{
	//echo "ERROR";
	$ale = "er";
}

$conexpg = null;//cierra conexion
echo"<script>location.href='descarga_cant_partida_import.php?var=$ale'</script>";
?>