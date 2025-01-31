


<!--<center> <img src='img/cargando.gif'> </center> -->
<?
include ("conection/config.php");
//echo "<center> <img src='img/cargando.gif'> </center>";

// delete tabla anual
	$sql = "DELETE from resumenanual" ;
            $retval = mysql_query( $sql, $link );
			if(! $retval )
            {
               die('Could not delete data: ' . mysql_error());
            }
            
            echo "<center>Prosesando Limpieza de Tablas\n<br></center>";
//fin delete tabla anual

$sqlpg="SELECT
dp.periodo
FROM
dataproduccion AS dp
INNER JOIN departamento AS depa ON dp.iddepartamento = depa.id
INNER JOIN medida AS med ON dp.idmedida = med.id
INNER JOIN producto AS prod ON dp.idproducto = prod.id
INNER JOIN sector AS sect ON dp.idsector = sect.id
INNER JOIN variable AS var ON dp.idvariable = var.id
WHERE
dp.eliminado = '0'
GROUP BY
dp.periodo
";

$rsnpg = mysql_query($sqlpg);
if (mysql_num_rows($rsnpg) > 0){
	//echo "<center> <img src='img/cargando.gif'> </center>";
	
			
	while($rowpg = mysql_fetch_array($rsnpg)){
		$period=$rowpg["periodo"];
		
		
		// select para mostrar todo los registros segun el año
		$sqla="SELECT
sect.id AS ids,
sect.sector,
depa.id AS idd,
depa.coddep,
depa.departamento,
prod.id AS idp,
prod.producto,
var.id AS idv,
var.variable,
med.id AS idm,
med.medida,
dp.periodo,
dp.mes2,
SUM(dp.enero) as enero,
SUM(dp.febrero) as febrero,
SUM(dp.marzo) as marzo,
SUM(dp.abril) as abril,
SUM(dp.mayo) as mayo,
SUM(dp.junio) as junio,
SUM(dp.julio) as julio,
SUM(dp.agosto) as agosto,
SUM(dp.septiembre) as septiembre,
SUM(dp.octubre) as octubre,
SUM(dp.noviembre) as noviembre,
SUM(dp.diciembre) as diciembre,
dp.eliminado
FROM
dataproduccion AS dp
INNER JOIN departamento AS depa ON dp.iddepartamento = depa.id
INNER JOIN medida AS med ON dp.idmedida = med.id
INNER JOIN producto AS prod ON dp.idproducto = prod.id
INNER JOIN sector AS sect ON dp.idsector = sect.id
INNER JOIN variable AS var ON dp.idvariable = var.id
WHERE
dp.eliminado = '0' AND
dp.periodo='".$period."'
GROUP BY
ids,
sect.sector,
idd,
depa.coddep,
depa.departamento,
idp,
prod.producto,
idv,
var.variable,
idm,
med.medida,
dp.periodo,
dp.mes2";
		$rsa = mysql_query($sqla);
		if (mysql_num_rows($rsa) > 0){
		while($rowa = mysql_fetch_array($rsa)){
			$idse=$rowa["ids"];
			$nomsec=$rowa["sector"];
			$iddepa=$rowa["idd"];
			$codde=$rowa["coddep"];
			$nomdepa=$rowa["departamento"];
			$idpro=$rowa["idp"];
			$nompro=$rowa["producto"];
			$idvar=$rowa["producto"];
			$nomvar=$rowa["producto"];
			$idme=$rowa["idm"];
			$nomme=$rowa["medida"];
			$xperi=$rowa["periodo"];
			$mesd=$rowa["mes2"];
			
			$ener=$rowa["enero"];
			$febr=$rowa["febrero"];
			$mar=$rowa["marzo"];
			$abri=$rowa["abril"];
			$may=$rowa["mayo"];
			$jun=$rowa["junio"];
			$jul=$rowa["julio"];
			$ago=$rowa["agosto"];
			$sept=$rowa["septiembre"];
			$octu=$rowa["octubre"];
			$novi=$rowa["noviembre"];
			$dici=$rowa["diciembre"];
			$total=$ener + $febr + $mar + $abri + $may + $jun + $jul + $ago + $sept + $octu + $novi + $dici;
			
			
			//insertamos registro año 2010
			if ($period=="2010"){
			
				$Sql="insert into resumenanual (ids,sector,idd,coddep,departamento,idp,producto,idv,variable,idm,medida,periodo,mes2,A2010,A2011,A2012,A2013,A2014,A2015,A2016)  values ('$idse','$nomsec','$iddepa','$codde','$nomdepa','$idpro','$nompro','$idvar','$nomvar','$idme','$nomme','$xperi','$mesd','$total',0,0,0,0,0,0)";
   //mysql_query($Sql,$link); 
   $resultado3=mysql_query($Sql,$link) or die (mysql_error());
       
			}
			//fin insertamos registro año 2010
			
			//insertamos registro año 2011
			if ($period=="2011"){
			
				$Sql="insert into resumenanual (ids,sector,idd,coddep,departamento,idp,producto,idv,variable,idm,medida,periodo,mes2,A2010,A2011,A2012,A2013,A2014,A2015,A2016)  values ('$idse','$nomsec','$iddepa','$codde','$nomdepa','$idpro','$nompro','$idvar','$nomvar','$idme','$nomme','$xperi','$mesd',0,'$total',0,0,0,0,0)";
   //mysql_query($Sql,$link); 
   $resultado3=mysql_query($Sql,$link) or die (mysql_error());
       
			}
			//fin insertamos registro año 2011
			
			//insertamos registro año 2012
			if ($period=="2012"){
			
				$Sql="insert into resumenanual (ids,sector,idd,coddep,departamento,idp,producto,idv,variable,idm,medida,periodo,mes2,A2010,A2011,A2012,A2013,A2014,A2015,A2016)  values ('$idse','$nomsec','$iddepa','$codde','$nomdepa','$idpro','$nompro','$idvar','$nomvar','$idme','$nomme','$xperi','$mesd',0,0,'$total',0,0,0,0)";
   //mysql_query($Sql,$link); 
   $resultado3=mysql_query($Sql,$link) or die (mysql_error());
       
			}
			//fin insertamos registro año 2012
			
			//insertamos registro año 2013
			if ($period=="2013"){
			
				$Sql="insert into resumenanual (ids,sector,idd,coddep,departamento,idp,producto,idv,variable,idm,medida,periodo,mes2,A2010,A2011,A2012,A2013,A2014,A2015,A2016)  values ('$idse','$nomsec','$iddepa','$codde','$nomdepa','$idpro','$nompro','$idvar','$nomvar','$idme','$nomme','$xperi','$mesd',0,0,0,'$total',0,0,0)";
   //mysql_query($Sql,$link); 
   $resultado3=mysql_query($Sql,$link) or die (mysql_error());
       
			}
			//fin insertamos registro año 2013
			
			
			//insertamos registro año 2014
			if ($period=="2014"){
			
				$Sql="insert into resumenanual (ids,sector,idd,coddep,departamento,idp,producto,idv,variable,idm,medida,periodo,mes2,A2010,A2011,A2012,A2013,A2014,A2015,A2016)  values ('$idse','$nomsec','$iddepa','$codde','$nomdepa','$idpro','$nompro','$idvar','$nomvar','$idme','$nomme','$xperi','$mesd',0,0,0,0,'$total',0,0)";
   //mysql_query($Sql,$link); 
   $resultado3=mysql_query($Sql,$link) or die (mysql_error());
       
       /* if (!$resultado3){
		echo "Error en la inserccion";
          return false;
		  
        }else{
			echo "si se  inserccion";
            return true;
           
        }*/	
			}
			//fin insertamos registro año 2014
			//insertamos registro año 2015
			if ($period=="2015"){
			
				$Sql1="insert into resumenanual (ids,sector,idd,coddep,departamento,idp,producto,idv,variable,idm,medida,periodo,mes2,A2010,A2011,A2012,A2013,A2014,A2015,A2016)  values ('$idse','$nomsec','$iddepa','$codde','$nomdepa','$idpro','$nompro','$idvar','$nomvar','$idme','$nomme','$xperi','$mesd',0,0,0,0,0,$total,0)";
  // mysql_query($Sql,$link); 
  $resultado3=mysql_query($Sql1,$link) or die (mysql_error());	
			}
			//fin insertamos registro año 2015
			
			//insertamos registro año 2016
			if ($period=="2016"){
			
				$Sql1="insert into resumenanual (ids,sector,idd,coddep,departamento,idp,producto,idv,variable,idm,medida,periodo,mes2,A2010,A2011,A2012,A2013,A2014,A2015,A2016)  values ('$idse','$nomsec','$iddepa','$codde','$nomdepa','$idpro','$nompro','$idvar','$nomvar','$idme','$nomme','$xperi','$mesd',0,0,0,0,0,0,$total)";
  // mysql_query($Sql,$link); 
  $resultado3=mysql_query($Sql1,$link) or die (mysql_error());	
			}
			//fin insertamos registro año 2016
			
		}
		}
		// fin elect para mostrar todo los registros segun el año
		
		}
		echo "<center> <img src='img/cargando.gif'> </center>";
	echo "<script>alert('Registro Procesados con Exito.!');</script>";
echo "<script>window.close();</script>"; 
		}
?>