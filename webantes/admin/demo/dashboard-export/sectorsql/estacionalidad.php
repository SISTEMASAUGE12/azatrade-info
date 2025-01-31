<?php
include("../../conector/config.php");
set_time_limit(950);

date_default_timezone_set("America/Lima");
$fechahoy = date("Y-m-d");

$codeid = trim($_POST["namesectAC"]);
$namesector = trim($_POST["namesectNAMEC"]);
$namedepa1 = trim($_POST["namedepaC"]);
$ubicod1 = trim($_POST["codubiC"]);
$onevar = trim($_POST["unavariaestaci"]);

if($ubicod1==""){
	$flatcod = "";
	$queryu = "";
}else{
	$flatcod = $ubicod1;
	$querybusca = "AND SUBSTRING(exportacion.ubigeo,1,2) = '$flatcod'";
}

if($onevar=="vfobserdol"){
	 $combo = "Valor FOB USD";
 }else if($onevar=="vpesnet"){
	  $combo = "Peso Neto (Kg)";
 }else if($onevar=="diferen"){
	  $combo = "Precio FOB USD x KG";
 }else if($onevar=="vpesbru"){
	  $combo = "Peso Bruto (Kg)";
 }else if($onevar=="qunifis"){
	  $combo = "Cantidad Exportada";
 }else if($onevar=="qunicom"){
	  $combo = "Unidades Comerciales";
 }else if($onevar=="part_nandi"){
	  $combo = "Cantidad de Partidas";
}else if($onevar=="total"){
	  $combo = "Cantidad de Registros";
 }else if($onevar=="ndcl"){
	  $combo = "Cantidad de Duas";
 }else if($onevar=="dnombre"){
	  $combo = "Cantidad de Empresas";
 }else if($onevar=="cpaides"){
	  $combo = "Cantidad de Mercados";
 }else if($onevar=="cpuedes"){
	  $combo = "Cantidad de Puertos";
 }else if($onevar=="cadu"){
	  $combo = "Cantidad de Aduanas";
 }else if($onevar=="depa"){
	  $combo = "Cantidad de Departamentos";
 }else if($onevar=="provi"){
	  $combo = "Cantidad de Provincias";
 }else if($onevar=="distri"){
	  $combo = "Cantidad de Distritos";
 }else if($onevar=="cage"){
	  $combo = "Cantidad de Agentes";
 }else if($onevar=="cviatra"){
	  $combo = "Cantidad de vias de Transporte";
 }

//generamos codigo aletorio
  function generaPass(){
    //Se define una cadena de caractares. Te recomiendo que uses esta.
    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena=strlen($cadena);
     
    //Se define la variable que va a contener la contrasena
    $pass = "";
    //Se define la longitud de la contrasena, en mi caso 10, pero puedes poner la longitud que quieras
    $longitudPass=10;
     
    //Creamos la contrasena
    for($i=1 ; $i<=$longitudPass ; $i++){
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos=rand(0,$longitudCadena-1);
     
        //Vamos formando la contrasena en cada iteraccion del bucle, anadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass .= substr($cadena,$pos,1);
    }
    return $pass;
}
$mon_tmp = "tmp_".generaPass();

//creamos tabla temporal datos*/
 $createsql = "CREATE TABLE $mon_tmp (
codigo numeric(5) NOT NULL,
nomvariable varchar(300),
a2012 numeric(30,2),
a2013 numeric(30,2),
a2014 numeric(30,2),
a2015 numeric(30,2),
a2016 numeric(30,2),
a2017 numeric(30,2),
a2018 numeric(30,2),
a2019 numeric(30,2),
a2020 numeric(30,2),
a2021 numeric(30,2),
a2022 numeric(30,2))"; 
$stmt = $conexpg->prepare($createsql);
    $stmt->execute();

/*insertamos registro*/
  $sqlinsert1="INSERT INTO ".$mon_tmp."  (codigo,nomvariable,a2012,a2013,a2014,a2015,a2016,a2017,a2018,a2019,a2020,a2021,a2022) VALUES ('1','Enero','0','0','0','0','0','0','0','0','0','0','0'),
  ('2','Febrero','0','0','0','0','0','0','0','0','0','0','0'),
  ('3','Marzo','0','0','0','0','0','0','0','0','0','0','0'),
  ('4','Abril','0','0','0','0','0','0','0','0','0','0','0'),
  ('5','Mayo','0','0','0','0','0','0','0','0','0','0','0'),
  ('6','Junio','0','0','0','0','0','0','0','0','0','0','0'),
  ('7','Julio','0','0','0','0','0','0','0','0','0','0','0'),
  ('8','Agosto','0','0','0','0','0','0','0','0','0','0','0'),
  ('9','Septiembre','0','0','0','0','0','0','0','0','0','0','0'),
  ('10','Octubre','0','0','0','0','0','0','0','0','0','0','0'),
  ('11','Noviembre','0','0','0','0','0','0','0','0','0','0','0'),
  ('12','Diciembre','0','0','0','0','0','0','0','0','0','0','0'); ";
$stmt = $conexpg->prepare($sqlinsert1);
$stmt->execute();

$ranfecha = "AND extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2022'";
$ranfechados = "extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2022'";
$rangofe = "extract(year from exportacion.fnum) >= '2012' AND extract(year from exportacion.fnum) <= '2022'";

//realizamos conusulta del reporte selecionado y  actualizamos en la tabla temporal crada

if($onevar=="vfobserdol"){
   $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,
 Sum(exportacion.vfobserdol) as resultado FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi 
 WHERE concat(sector.tipo,sector.sector)='".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="vpesnet"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes, Sum(exportacion.vpesnet) as resultado FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi  WHERE concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="diferen"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes, Sum(exportacion.vfobserdol) / Sum(exportacion.vpesnet) as resultado FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="vpesbru"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes, Sum(exportacion.vpesbru) as resultado FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi  WHERE concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
   if($onevar=="qunifis"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes, Sum(exportacion.qunifis) as resultado FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="qunicom"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes, Sum(exportacion.qunicom) as resultado FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="part_nandi"){
	  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.part_nandi) as resultado FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="total"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes, count(*) as resultado FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="ndcl"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.ndcl) as resultado FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="dnombre"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.dnombre) as resultado FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="cpaides"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.cpaides) as resultado FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="cpuedes"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.cpuedes) as resultado FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="cadu"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.cadu) as resultado FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
   if($onevar=="depa"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT departamento.nombre) as resultado FROM exportacion LEFT JOIN departamento ON ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE  concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca
GROUP BY exportacion.fano,mes order BY exportacion.fano, resultado ASC";
  }
  if($onevar=="provi"){
  $query1 = "SELECT exportacion.fano , extract(MONTH from exportacion.fnum) as mes, count(DISTINCT provincia.nombre) as resultado FROM exportacion LEFT JOIN departamento ON  (((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))  INNER JOIN provincia ON provincia.iddepartamento = departamento.iddepartamento INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE  concat(sector.tipo,sector.sector) =  '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano ASC";
  }
  
  if($onevar=="distri"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT distrito.nombre) as resultado FROM exportacion LEFT JOIN departamento ON ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) INNER JOIN provincia ON provincia.iddepartamento = departamento.iddepartamento  INNER JOIN distrito ON distrito.idprovincia = provincia.idprovincia INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano ASC ";
  }
   if($onevar=="cage"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.cage) as resultado FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE  concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
  if($onevar=="cviatra"){
  $query1 = "SELECT exportacion.fano, extract(MONTH from exportacion.fnum) as mes,COUNT(DISTINCT exportacion.cviatra) as resultado FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE concat(sector.tipo,sector.sector) = '".$codeid."' AND $rangofe $querybusca GROUP BY exportacion.fano,mes ORDER BY exportacion.fano,mes";
  }
	
$resultado1 = $conexpg -> prepare($query1); 
$resultado1 -> execute(); 
$rtps = $resultado1 -> fetchAll(PDO::FETCH_OBJ); 
if($resultado1 -> rowCount() > 0)   { 
foreach($rtps as $fila1) {
		  $val1= $fila1 -> fano;
		  $val2= $fila1 -> mes;
		  $val3= $fila1 -> resultado;

		 if($val1=='2012'){
  $insert11 = "UPDATE ".$mon_tmp." SET a2012='".$val3."' WHERE codigo='$val2' "; 
	$stmt = $conexpg->prepare($insert11);
    $stmt->execute();
		 }
		 if($val1=='2013'){
  $insertb22 = "UPDATE ".$mon_tmp." SET a2013='".$val3."' WHERE codigo='$val2' "; 
 $stmt = $conexpg->prepare($insertb22);
    $stmt->execute();
		 }
		 if($val1=='2014'){
  $insert33 = "UPDATE ".$mon_tmp." SET a2014='".$val3."' WHERE codigo='$val2' "; 
 $stmt = $conexpg->prepare($insert33);
    $stmt->execute();
		 }
		 if($val1=='2015'){
  $insert44 = "UPDATE ".$mon_tmp." SET a2015='".$val3."' WHERE codigo='$val2' "; 
 $stmt = $conexpg->prepare($insert44);
    $stmt->execute();
		 }
		 if($val1=='2016'){
  $insert55 = "UPDATE ".$mon_tmp." SET a2016='".$val3."' WHERE codigo='$val2' "; 
 $stmt = $conexpg->prepare($insert55);
    $stmt->execute();
		 }
		 if($val1=='2017'){
  $insert66 = "UPDATE ".$mon_tmp." SET a2017='".$val3."' WHERE codigo='$val2' "; 
 $stmt = $conexpg->prepare($insert66);
    $stmt->execute();
		 }
		if($val1=='2018'){
  $insert77 = "UPDATE ".$mon_tmp." SET a2018='".$val3."' WHERE codigo='$val2' "; 
 $stmt = $conexpg->prepare($insert77);
    $stmt->execute();
		 }
			  if($val1=='2019'){
  $insert88 = "UPDATE ".$mon_tmp." SET a2019='".$val3."' WHERE codigo='$val2' "; 
 $stmt = $conexpg->prepare($insert88);
    $stmt->execute();
		 }
	if($val1=='2020'){
  $insert99 = "UPDATE ".$mon_tmp." SET a2020='".$val3."' WHERE codigo='$val2' "; 
 $stmt = $conexpg->prepare($insert99);
    $stmt->execute();
		 }
	if($val1=='2021'){
  $insert101 = "UPDATE ".$mon_tmp." SET a2021='".$val3."' WHERE codigo='$val2' "; 
 $stmt = $conexpg->prepare($insert101);
    $stmt->execute();
		 }
	if($val1=='2022'){
  $insert121 = "UPDATE ".$mon_tmp." SET a2022='".$val3."' WHERE codigo='$val2' "; 
 $stmt = $conexpg->prepare($insert121);
    $stmt->execute();
		 }
	
		  }
	  }

if($onevar=="diferen"){//precio general total
	  //sumamos valorfob
		   $query_vfob = "SELECT 'vfobserdol' as VALOR, 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2012' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2012.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2013' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2013.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2014' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2014.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2015' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2015.", 
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2016' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2016.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2017' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2017.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2018' THEN exportacion.vfobserdol ELSE 0 END) AS  ".vfob2018." ,
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2019' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2019.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2020' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2020.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2021' THEN exportacion.vfobserdol ELSE 0 END) AS ".vfob2021.",
		   SUM(CASE extract(year from exportacion.fnum) WHEN '2022' THEN exportacion.vfobserdol ELSE 0 END) AS  ".vfob2022."
		   FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE $rangofe $querybusca AND concat(sector.tipo,sector.sector) ='".$codeid."'"; 
$resultado_vfob = $conexpg -> prepare($query_vfob); 
$resultado_vfob -> execute(); 
$tjps = $resultado_vfob -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_vfob -> rowCount() > 0)   { 
foreach($tjps as $fila_vfob) {
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
	  
	  // sumamos vpesnet
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
	   FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi where $rangofe $querybusca AND concat(sector.tipo,sector.sector) ='".$codeid."'";
		$resultado_vpes=$conexpg->query($query_vpes); 
if($resultado_vpes->num_rows>0){ 
while($fila_vpes=$resultado_vpes->fetch_array()){
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

	  }//fin precio
	
	if($onevar=="part_nandi"){//consulta conteo unico total partida - cuenta cantidad de partidas*/
	  $query_tota = "SELECT Count(DISTINCT exportacion.part_nandi) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi  WHERE $rangofe $querybusca AND concat(sector.tipo,sector.sector) ='".$codeid."' GROUP BY anio order BY anio ASC";
	    }
	 if($onevar=="ndcl"){//duas
	$query_tota = "SELECT Count(DISTINCT exportacion.ndcl) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE $rangofe $querybusca AND concat(sector.tipo,sector.sector) ='".$codeid."' GROUP BY anio order BY anio ASC";
	 }
	 if($onevar=="dnombre"){//empresas
	 $query_tota = "SELECT Count(DISTINCT exportacion.dnombre) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi  WHERE $rangofe $querybusca AND concat(sector.tipo,sector.sector) ='".$codeid."' GROUP BY anio order BY anio ASC";
	 }
	if($onevar=="cpaides"){//mercado
	  $query_tota = "SELECT Count(DISTINCT exportacion.cpaides) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi  WHERE $rangofe $querybusca AND concat(sector.tipo,sector.sector)='".$codeid."' GROUP BY anio order BY anio ASC";
	 }
	 if($onevar=="cpuedes"){//puertos
	  $query_tota = "SELECT Count(DISTINCT exportacion.cpuedes) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion INNER JOIN sector ON (sector.partida = exportacion.part_nandi  WHERE $rangofe $querybusca AND concat(sector.tipo,sector.sector) ='".$codeid."' GROUP BY anio order BY anio ASC";
	 }
	 if($onevar=="cadu"){//aduanas
	 $query_tota = "SELECT Count(DISTINCT exportacion.cadu) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE $rangofe $querybusca AND concat(sector.tipo,sector.sector) ='".$codeid."' GROUP BY anio order BY anio ASC";
	 }
	 if($onevar=="depa"){//departamento
	 $query_tota = "SELECT COUNT(DISTINCT departamento.nombre) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion LEFT JOIN departamento ON  ((((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))) INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE $rangofe $querybusca AND concat(sector.tipo,sector.sector)='".$codeid."' GROUP BY anio ORDER BY anio ASC";
	 }
	 if($onevar=="provi"){//provincia
     $query_tota = "SELECT count(DISTINCT provincia.nombre) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion LEFT JOIN departamento ON  (((SUBSTRING(exportacion.ubigeo,1,2))= departamento.iddepartamento))  INNER JOIN provincia ON provincia.iddepartamento = departamento.iddepartamento INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE $rangofe $querybusca AND concat(sector.tipo,sector.sector)='".$codeid."' GROUP BY anio ORDER BY anio ASC";
	 }
	 if($onevar=="distri"){//distrito
	  $query_tota = "SELECT count(DISTINCT distrito.nombre) AS cant_total, extract(year from exportacion.fnum) AS anio FROM exportacion LEFT JOIN distrito ON exportacion.ubigeo= distrito.iddistrito INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE $rangofe $querybusca AND concat(sector.tipo,sector.sector) = '".$codeid."' GROUP BY anio ORDER BY anio ASC";
	 }
	 if($onevar=="cage"){//agentes
	 $query_tota = "SELECT Count(DISTINCT exportacion.cage) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi WHERE $rangofe $querybusca AND concat(sector.tipo,sector.sector) ='".$codeid."' GROUP BY anio order BY anio ASC";
	 }
	 if($onevar=="cviatra"){//via transportes
	  $query_tota = "SELECT Count(DISTINCT exportacion.cviatra) as cant_total, extract(year from exportacion.fnum) as anio FROM exportacion INNER JOIN sector ON sector.partida = exportacion.part_nandi  WHERE $rangofe $querybusca AND concat(sector.tipo,sector.sector) ='".$codeid."' GROUP BY anio order BY anio ASC";
	 }

	 if($onevar=="part_nandi" or $onevar=="ndcl" or $onevar=="dnombre" or $onevar=="cpaides" or $onevar=="cpuedes" or $onevar=="cadu" or $onevar=="depa" or $onevar=="provi" or $onevar=="distri" or $onevar=="cage" or $onevar=="cviatra"){ 
			  
$numReg_tota = $conexpg -> prepare($query_tota); 
$numReg_tota -> execute(); 
$trgps = $numReg_tota -> fetchAll(PDO::FETCH_OBJ); 
if($numReg_tota -> rowCount() > 0)   { 
foreach($trgps as $fila_tota) {
		  $anioparti= $fila_tota -> anio;
		  
		  if($anioparti=='2012'){
			  $sumatotal2012=$fila_tota -> cant_total;
		  }
		  if($anioparti=='2013'){
			  $sumatotal2013=$fila_tota -> cant_total;
		  }
		  if($anioparti=='2014'){
			  $sumatotal2014=$fila_tota -> cant_total;
		  }
		  if($anioparti=='2015'){
			  $sumatotal2015=$fila_tota -> cant_total;
		  }
		  if($anioparti=='2016'){
			  $sumatotal2016=$fila_tota -> cant_total;
		  }
		  if($anioparti=='2017'){
			  $sumatotal2017=$fila_tota -> cant_total;
		  }
		  if($anioparti=='2018'){
			  $sumatotal2018=$fila_tota -> cant_total;
		  }
			  if($anioparti=='2019'){
			  $sumatotal2019=$fila_tota -> cant_total;
		  }
		  if($anioparti=='2020'){
			  $sumatotal2020=$fila_tota -> cant_total;
		  }
		  if($anioparti=='2021'){
			  $sumatotal2021=$fila_tota -> cant_total;
		  }
	if($anioparti=='2022'){
			  $sumatotal2022=$fila_tota -> cant_total;
		  }
			  
		  }
	  }else{
		  $sumatotal2012= "0.00";
		  $sumatotal2013= "0.00";
		  $sumatotal2014= "0.00";
		  $sumatotal2015= "0.00";
		  $sumatotal2016= "0.00";
		  $sumatotal2017= "0.00";
		  $sumatotal2018= "0.00";
		  $sumatotal2019= "0.00";
		  $sumatotal2020= "0.00";
		  $sumatotal2021= "0.00";
	$sumatotal2022= "0.00";
	  }
	  }

	  
	  /*primero consultamos la suma total general de cada ano*/
	  $sqlyear="SELECT
Sum(".$mon_tmp.".a2012) AS a2012,
Sum(".$mon_tmp.".a2013) AS a2013,
Sum(".$mon_tmp.".a2014) AS a2014,
Sum(".$mon_tmp.".a2015) AS a2015,
Sum(".$mon_tmp.".a2016) AS a2016,
Sum(".$mon_tmp.".a2017) AS a2017,
Sum(".$mon_tmp.".a2018) AS a2018,
Sum(".$mon_tmp.".a2019) AS a2019,
Sum(".$mon_tmp.".a2020) AS a2020,
Sum(".$mon_tmp.".a2021) AS a2021,
Sum(".$mon_tmp.".a2022) AS a2022
FROM
".$mon_tmp." ";	
$result_year = $conexpg -> prepare($sqlyear); 
$result_year -> execute(); 
$tjps = $result_year -> fetchAll(PDO::FETCH_OBJ); 
if($result_year -> rowCount() > 0)   { 
foreach($tjps as $fila_year) {
			   if($onevar=="diferen"){//precio general total
			   if($vpes_2012=='0'){
		$sumatotal2012 = "0.00";
		}else{
		$sumatotal2012 = $vfob_2012 / $vpes_2012;
		}
		
		if($vpes_2013=='0'){
		$sumatotal2013 = "0.00";
		}else{
		$sumatotal2013 = $vfob_2013 / $vpes_2013;
		}
		
		if($vpes_2014=='0'){
		$sumatotal2014 = "0.00";
		}else{
		$sumatotal2014 = $vfob_2014 / $vpes_2014;
		}
		
		if($vpes_2015=='0'){
		$sumatotal2015 = "0.00";
		}else{
		$sumatotal2015 = $vfob_2015 / $vpes_2015;
		}
		
		if($vpes_2016=='0'){
		$sumatotal2016 = "0.00";
		}else{
		$sumatotal2016 = $vfob_2016 / $vpes_2016;
		}
		
		if($vpes_2017=='0'){
		$sumatotal2017 = "0.00";
		}else{
		$sumatotal2017 = $vfob_2017/ $vpes_2017;
		}
				   
		if($vpes_2018=='0'){
		$sumatotal2018 = "0.00";
		}else{
		$sumatotal2018 = $vfob_2018/ $vpes_2018;
		}
				   if($vpes_2019=='0'){
		$sumatotal2019 = "0.00";
		}else{
		$sumatotal2019 = $vfob_2019/ $vpes_2018;
		}
		if($vpes_2020=='0'){
		$sumatotal2020 = "0.00";
		}else{
		$sumatotal2020 = $vfob_2020/ $vpes_2019;
		}
		if($vpes_2021=='0'){
		$sumatotal2021 = "0.00";
		}else{
		$sumatotal2021 = $vfob_2021/ $vpes_2020;
		}
	    if($vpes_2022=='0'){
		$sumatotal2022 = "0.00";
		}else{
		$sumatotal2022 = $vfob_2022/ $vpes_2021;
		}
		
		if($sumatotal2012=='0'){
			  $ca1_1 ='0';
		      }else{
		      $ca1_1 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0'){
			  $ca2_1 ='0';
		      }else{
		      $ca2_1 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0'){
			  $ca3_1 ='0';
		      }else{
		      $ca3_1 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0'){
			  $ca4_1 ='0';
		      }else{
		      $ca4_1 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0'){
			  $ca5_1 ='0';
		      }else{
		      $ca5_1 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0'){
			  $ca6_1 ='0';
		      }else{
		      $ca6_1 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
				   if($sumatotal2018=='0'){
			  $ca7_1 ='0';
		      }else{
		      $ca7_1 = (($sumatotal2019 / $sumatotal2018) - 1) * 100;
		      }
				   
				   if($sumatotal2019=='0'){
			  $ca8_1 ='0';
		      }else{
		      $ca8_1 = (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		      }
			  if($sumatotal2020=='0'){
			  $ca9_1 ='0';
		      }else{
		      $ca9_1 = (($sumatotal2021 / $sumatotal2020) - 1) * 100;
		      }
			   
				if($sumatotal2020=="0" or $sumatotal2020==""){
					$varitota = "0.00";
				}else{
			  $varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
					}
				   
			  $parti= number_format(($ca1_1 + $ca2_1 + $ca3_1 + $ca4_1 + $ca5_1 + $ca6_1 + $ca7_1 + $ca8_1 + $ca9_1)/9,2) ;//divide entre 5;porque solo suma 5 años del 2012 al 2016
			   }else if($onevar=="part_nandi"){
				   
				   if($sumatotal2012=='0' or $sumatotal2012=="" or  $sumatotal2012==null){
			  $parti_1 ='0';
		      }else{
		      $parti_1 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $parti_2 ='0';
		      }else{
		      $parti_2 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $parti_3 ='0';
		      }else{
		      $parti_3 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $parti_4 ='0';
		      }else{
		      $parti_4 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $parti_5 ='0';
		      }else{
		      $parti_5 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $parti_6 ='0';
		      }else{
		      $parti_6 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
				   if($sumatotal2018=='0' or $sumatotal2018 == null){
			  $parti_7 ='0';
		      }else{
		      $parti_7 = (($sumatotal2019 / $sumatotal2018) - 1) * 100;
		      }
			 
				   if($sumatotal2019=='0' or $sumatotal2019 == null){
			  $parti_8 ='0';
		      }else{
		      $parti_8 = (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		      }
				   if($sumatotal2020=='0' or $sumatotal2020 == null){
			  $parti_9 ='0';
		      }else{
		      $parti_9 = (($sumatotal2021 / $sumatotal2020) - 1) * 100;
		      }
				   
			  $varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
		      $parti= number_format(($parti_1 + $parti_2 + $parti_3 + $parti_4 + $parti_5 + $parti_6 + $parti_7 + $parti_8 + $parti_9)/9,2) ;
			  
			   }else if($onevar=="ndcl"){//duas
			   
			   if($sumatotal2012=='0' or $sumatotal2012==null){
			  $ca1_5 ='0';
		      }else{
		      $ca1_5 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_5 ='0';
		      }else{
		      $ca2_5 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_5 ='0';
		      }else{
		      $ca3_5 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_5 ='0';
		      }else{
		      $ca4_5 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_5 ='0';
		      }else{
		      $ca5_5 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_5 ='0';
		      }else{
		      $ca6_5 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
				   if($sumatotal2018=='0' or $sumatotal2018 == null){
			  $ca7_5 ='0';
		      }else{
		      $ca7_5 = (($sumatotal2019 / $sumatotal2018) - 1) * 100;
		      }
			 
				   if($sumatotal2019=='0' or $sumatotal2019 == null){
			  $ca8_5 ='0';
		      }else{
		      $ca8_5 = (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		      }
				   
				   if($sumatotal2020=='0' or $sumatotal2020 == null){
			  $ca9_5 ='0';
		      }else{
		      $ca9_5 = (($sumatotal2021 / $sumatotal2020) - 1) * 100;
		      }
				   
			  $varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
			  $parti= number_format(($ca1_5 + $ca2_5 + $ca3_5 + $ca4_5 + $ca5_5 + $ca6_5 + $ca7_5 + $ca8_5 + $ca9_5)/9,2) ;
				   
			   }else if($onevar=="dnombre"){//empresas
			   if($sumatotal2012=='0' or $sumatotal2012 == null){
			  $ca1_6 ='0';
		      }else{
		      $ca1_6 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_6 ='0';
		      }else{
		      $ca2_6 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_6 ='0';
		      }else{
		      $ca3_6 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_6 ='0';
		      }else{
		      $ca4_6 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_6 ='0';
		      }else{
		      $ca5_6 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				 if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_6 ='0';
		      }else{
		      $ca6_6 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      } 
				   if($sumatotal2018=='0' or $sumatotal2018 == null){
			  $ca7_6 ='0';
		      }else{
		      $ca7_6 = (($sumatotal2019 / $sumatotal2018) - 1) * 100;
		      } 
				   
				   if($sumatotal2019=='0' or $sumatotal2019 == null){
			  $ca8_6 ='0';
		      }else{
		      $ca8_6 = (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		      } 
				   if($sumatotal2020=='0' or $sumatotal2020 == null){
			  $ca9_6 ='0';
		      }else{
		      $ca9_6 = (($sumatotal2021 / $sumatotal2020) - 1) * 100;
		      } 
				   
			  
			  $varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
			  $parti= number_format(($ca1_6 + $ca2_6 + $ca3_6 + $ca4_6 + $ca5_6 + $ca6_6 + $ca7_6 + $ca8_6 + $ca9_6)/8,2) ;
				   
			   }else if($onevar=="cpuedes"){//puertos
			    if($sumatotal2012=='0' or $sumatotal2012 == null){
			  $ca1_8 ='0';
		      }else{
		      $ca1_8 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_8 ='0';
		      }else{
		      $ca2_8 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_8 ='0';
		      }else{
		      $ca3_8 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_8 ='0';
		      }else{
		      $ca4_8 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_8 ='0';
		      }else{
		      $ca5_8 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_8 ='0';
		      }else{
		      $ca6_8 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
			 if($sumatotal2018=='0' or $sumatotal2018 == null){
			  $ca7_8 ='0';
		      }else{
		      $ca7_8 = (($sumatotal2019 / $sumatotal2018) - 1) * 100;
		      }
			  if($sumatotal2019=='0' or $sumatotal2019 == null){
			  $ca8_8 ='0';
		      }else{
		      $ca8_8 = (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		      }
			  if($sumatotal2020=='0' or $sumatotal2020 == null){
			  $ca9_8 ='0';
		      }else{
		      $ca9_8 = (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		      }
				   
			  $varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
			  $parti= number_format(($ca1_8 + $ca2_8 + $ca3_8 + $ca4_8 + $ca5_8 + $ca6_8 + $ca7_8 + $ca8_8 + $ca9_8)/9,2) ;
				   
			   }else if($onevar=="cadu"){//aduanas
			   if($sumatotal2012=='0' or $sumatotal2012 == null){
			  $ca1_8 ='0';
		      }else{
		      $ca1_8 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_8 ='0';
		      }else{
		      $ca2_8 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_8 ='0';
		      }else{
		      $ca3_8 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_8 ='0';
		      }else{
		      $ca4_8 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_8 ='0';
		      }else{
		      $ca5_8 = (($sumatotal2016 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_8 ='0';
		      }else{
		      $ca6_8 = (($sumatotal2017 / $sumatotal2017) - 1) * 100;
		      }
				   if($sumatotal2018=='0' or $sumatotal2018 == null){
			  $ca7_8 ='0';
		      }else{
		      $ca7_8 = (($sumatotal2019 / $sumatotal2018) - 1) * 100;
		      }
				   if($sumatotal2019=='0' or $sumatotal2019 == null){
			  $ca8_8 ='0';
		      }else{
		      $ca8_8 = (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		      }
			  if($sumatotal2020=='0' or $sumatotal2020 == null){
			  $ca9_8 ='0';
		      }else{
		      $ca9_8 = (($sumatotal2021 / $sumatotal2020) - 1) * 100;
		      }
			  
			  $varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
			  $parti= number_format(($ca1_8 + $ca2_8 + $ca3_8 + $ca4_8 + $ca5_8 + $ca6_8 + $ca7_8 + $ca8_8 + $ca9_8)/9,2);
				   
			   }else if($onevar=="depa"){//departamento
			   if($sumatotal2012=='0' or $sumatotal2012 == null){
			  $ca1_9 ='0';
		      }else{
		      $ca1_9 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_9 ='0';
		      }else{
		      $ca2_9 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_9 ='0';
		      }else{
		      $ca3_9 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_9 ='0';
		      }else{
		      $ca4_9 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_9 ='0';
		      }else{
		      $ca5_9 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_9 ='0';
		      }else{
		      $ca6_9 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
			 if($sumatotal2018=='0' or $sumatotal2018 == null){
			  $ca7_9 ='0';
		      }else{
		      $ca7_9 = (($sumatotal2019 / $sumatotal2018) - 1) * 100;
		      }
				   if($sumatotal2019=='0' or $sumatotal2019 == null){
			  $ca8_9 ='0';
		      }else{
		      $ca8_9 = (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		      }
				   if($sumatotal2020=='0' or $sumatotal2020 == null){
			  $ca9_9 ='0';
		      }else{
		      $ca9_9 = (($sumatotal2021 / $sumatotal2020) - 1) * 100;
		      }
				
			  $varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
			  $parti= number_format(($ca1_9 + $ca2_9 + $ca3_9 + $ca4_9 + $ca5_9 + $ca6_9 + $ca7_9 + $ca8_9 + $ca9_9)/9,2);
				   
			   }else if($onevar=="provi"){//provincia
			   if($sumatotal2012=='0' or $sumatotal2012 == null){
			  $ca1_9x ='0';
		      }else{
		      $ca1_9x = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_9x ='0';
		      }else{
		      $ca2_9x = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_9x ='0';
		      }else{
		      $ca3_9x = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_9x ='0';
		      }else{
		      $ca4_9x = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			  if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_9x ='0';
		      }else{
		      $ca5_9x = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_9x ='0';
		      }else{
		      $ca6_9x = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
				   if($sumatotal2018=='0' or $sumatotal2018 == null){
			  $ca7_9x ='0';
		      }else{
		      $ca7_9x = (($sumatotal2019 / $sumatotal2018) - 1) * 100;
		      }
				   if($sumatotal2019=='0' or $sumatotal2019 == null){
			  $ca8_9x ='0';
		      }else{
		      $ca8_9x = (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		      }
				   if($sumatotal2020=='0' or $sumatotal2020 == null){
			  $ca9_9x ='0';
		      }else{
		      $ca9_9x = (($sumatotal2021 / $sumatotal2020) - 1) * 100;
		      }
			 
			  $varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
			  $parti= number_format(($ca1_9x + $ca2_9x + $ca3_9x + $ca4_9x + $ca5_9x + $ca6_9x + $ca7_9x + $ca8_9x + $ca9_9x)/9,2);
				   
			   }else if($onevar=="distri"){//distrito
			   if($sumatotal2012=='0' or $sumatotal2012 == null){
		$ca1_dis ='0';
		  }else{
		  $ca1_dis = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		  }
	     if($sumatotal2013=='0' or $sumatotal2013 == null){
		$ca2_dis ='0';
		}else{
		$ca2_dis = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		}
		 if($sumatotal2014=='0' or $sumatotal2014 == null){
		$ca3_dis ='0';
		 }else{
		$ca3_dis = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		}
		if($sumatotal2015=='0' or $sumatotal2015 == null){
		$ca4_dis ='0';
		}else{
		$ca4_dis = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		}
		if($sumatotal2016=='0' or $sumatotal2016 == null){
		$ca5_dis ='0';
		}else{
		$ca5_dis = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		}
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
		$ca6_dis ='0';
		}else{
		$ca6_dis = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		}
				   if($sumatotal2018=='0' or $sumatotal2018 == null){
		$ca7_dis ='0';
		}else{
		$ca7_dis = (($sumatotal2019 / $sumatotal2018) - 1) * 100;
		}
				   if($sumatotal2019=='0' or $sumatotal2019 == null){
		$ca8_dis ='0';
		}else{
		$ca8_dis = (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		}
				   if($sumatotal2020=='0' or $sumatotal2020 == null){
		$ca9_dis ='0';
		}else{
		$ca9_dis = (($sumatotal2021 / $sumatotal2020) - 1) * 100;
		}
		 
		$varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
	    $parti= number_format(($ca1_dis + $ca2_dis + $ca3_dis + $ca4_dis + $ca5_dis + $ca6_dis + $ca7_dis + $ca8_dis + $ca9_dis)/9,2);
				   
			   }else if($onevar=="cage"){//agentes
			   if($sumatotal2012=='0' or $sumatotal2012 == null){
			  $ca1_10 ='0';
		      }else{
		      $ca1_10 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_10 ='0';
		      }else{
		      $ca2_10 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_10='0';
		      }else{
		      $ca3_10 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_10 ='0';
		      }else{
		      $ca4_10 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
				   if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_10 ='0';
		      }else{
		      $ca5_10 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_10 ='0';
		      }else{
		      $ca6_10 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
				   if($sumatotal2018=='0' or $sumatotal2018 == null){
			  $ca7_10 ='0';
		      }else{
		      $ca7_10 = (($sumatotal2019 / $sumatotal2018) - 1) * 100;
		      }
				   if($sumatotal2019=='0' or $sumatotal2019 == null){
			  $ca8_10 ='0';
		      }else{
		      $ca8_10 = (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		      }
				   if($sumatotal2020=='0' or $sumatotal2020 == null){
			  $ca8_10 ='0';
		      }else{
		      $ca8_10 = (($sumatotal2021 / $sumatotal2020) - 1) * 100;
		      }
			 
			  $varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
			  $parti= number_format(($ca1_10 + $ca2_10 + $ca3_10 + $ca4_10 + $ca5_10 + $ca6_10 + $ca7_10 + $ca8_10 + $ca9_10)/9,2);
				   
			   }else if($onevar=="cviatra"){//via transportes
			    if($sumatotal2012=='0' or $sumatotal2012 == null){
			  $ca1_11 ='0';
		      }else{
		      $ca1_11 = (($sumatotal2013 / $sumatotal2012) - 1) * 100;
		      }
			   if($sumatotal2013=='0' or $sumatotal2013 == null){
			  $ca2_11 ='0';
		      }else{
		      $ca2_11 = (($sumatotal2014 / $sumatotal2013) - 1) * 100;
		      }
			   if($sumatotal2014=='0' or $sumatotal2014 == null){
			  $ca3_11='0';
		      }else{
		      $ca3_11 = (($sumatotal2015 / $sumatotal2014) - 1) * 100;
		      }
			   if($sumatotal2015=='0' or $sumatotal2015 == null){
			  $ca4_11 ='0';
		      }else{
		      $ca4_11 = (($sumatotal2016 / $sumatotal2015) - 1) * 100;
		      }
			   if($sumatotal2016=='0' or $sumatotal2016 == null){
			  $ca5_11 ='0';
		      }else{
		      $ca5_11 = (($sumatotal2017 / $sumatotal2016) - 1) * 100;
		      }
				   if($sumatotal2017=='0' or $sumatotal2017 == null){
			  $ca6_11 ='0';
		      }else{
		      $ca6_11 = (($sumatotal2018 / $sumatotal2017) - 1) * 100;
		      }
				   if($sumatotal2018=='0' or $sumatotal2018 == null){
			  $ca7_11 ='0';
		      }else{
		      $ca7_11 = (($sumatotal2019 / $sumatotal2018) - 1) * 100;
		      }
				   if($sumatotal2019=='0' or $sumatotal2019 == null){
			  $ca8_11 ='0';
		      }else{
		      $ca8_11 = (($sumatotal2020 / $sumatotal2019) - 1) * 100;
		      }
				   if($sumatotal2020=='0' or $sumatotal2020 == null){
			  $ca8_11 ='0';
		      }else{
		      $ca8_11 = (($sumatotal2021 / $sumatotal2020) - 1) * 100;
		      }
			 
			  $varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
			  $parti= number_format(($ca1_11 + $ca2_11 + $ca3_11 + $ca4_11 + $ca5_11 + $ca6_11 + $ca7_11 + $ca8_11 + $ca9_11)/9,2) ;
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
		  if($sumatotal2020=="0" or $sumatotal2020==""){
			  $varitota = "0.00";
		  }else{
		   $varitota= number_format((($sumatotal2021 / $sumatotal2020) - 1) * 100,2);
		  }
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


?>

<div class="col-lg-12 col-12">
					  <div class="box">
						<div class="box-header with-border">
						  <h4 class="box-title">Reporte Sector Evolucion Anual de Exportaciones</h4>
						</div>
							<div class="box-body">
								<div class="form-group">
								  <label class="form-label"><b>Sector:</b> <?=$namesector;?> <b>│ Departamento:</b> <?=$namedepa1;?> <b>│ Variable:</b> <?=$combo;?> <b>│</b> Fecha Numeraci&oacute;n <b>│ Periodo:</b> 2012 - 2022 </label>
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
							</tr>
						</thead>
						<tbody>
<?php
/*visualizamos datos en el reporte*/
   $query_resultado = "SELECT
".$mon_tmp.".codigo,
".$mon_tmp.".nomvariable,
".$mon_tmp.".a2012,
".$mon_tmp.".a2013,
".$mon_tmp.".a2014,
".$mon_tmp.".a2015,
".$mon_tmp.".a2016,
".$mon_tmp.".a2017,
".$mon_tmp.".a2018,
".$mon_tmp.".a2019,
".$mon_tmp.".a2020,
".$mon_tmp.".a2021,
".$mon_tmp.".a2022
FROM
".$mon_tmp."
ORDER BY
".$mon_tmp.".codigo ASC";		
$resultado_rpt = $conexpg -> prepare($query_resultado); 
$resultado_rpt -> execute(); 
$tmpps = $resultado_rpt -> fetchAll(PDO::FETCH_OBJ); 
if($resultado_rpt -> rowCount() > 0)   { 
foreach($tmpps as $fila_rpt) {
	$cuentaF = $cuentaF + 1;
			 $codi= $fila_rpt -> codigo;
		   $nombredesc= $fila_rpt -> nomvariable;

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
		  
		  if($year11=='0' or $year11==""){
		  $var11 ='0';
		  }else{
		  $var11 = number_format((($year12 / $year11) - 1) * 100,2);
		  }
	
		  echo "<tr>";
echo "<td>$codi</td>";
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
 echo "</tr>";
}
	echo "<tr>";
		   echo "<th align='center'></th>";
	      echo "<th align='center' ><b>Total:</b></th>";
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
							</tr>
						</tfoot>
					</table>
					</div>
</div>              


							</div> 
					  </div>			
				</div> 
<?php
$sql=$conexpg->prepare("DROP TABLE ".$mon_tmp."");
if($sql->execute()){
//echo " Table deleted ";
}else{
//print_r($sql->errorInfo()); 
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

