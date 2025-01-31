<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Gestion de Partidas</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
<link href="css/misEstilos.css" rel="stylesheet">
 <script language="JavaScript">
<!-- Hide JavaScript from Java-cambia de color las filas de la tabla
function NavRollOver(oTd){if(!oTd.contains(event.fromElement)){oTd.bgColor="#EBEBEB";}}
function NavRollOut(oTd){if(!oTd.contains(event.toElement)){oTd.bgColor="#FAFAFA";}}
//-->
</script>

<script language="javascript" type="text/javascript">
function valida(consupart) {
    if (consupart.codipartida.value.length < 1){
	
		alert("Ingrese Numero de Partida");
		return false;
	}
	return true;
}
</script>
</head>

<body>
<br><br><br>
<center>
<form name="consupart" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"  onSubmit="return valida(this);">
<table  border="0" bordercolor="#00CCFF" style='background-color:#FAFAFA;
   color:#039;
   width: 380px;
   padding: 10px;
   border:2px solid #B2B2B2;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>
  <tbody>
    <tr>
    <td bgcolor="#279CC9"  colspan="2" align="center">
   <b><font color="#FFFFFF">Cosnultar Gestion de Partidas</font></b>
    </td>
    </tr>
    <tr>
    <td>Ingrese N° Partida:</td><td><input type="text" name="codipartida" value="" /> </td>
    </tr>
    <tr>
    <td colspan="2" align="center"><input class="btn btn-primary" name="consultar"  type="submit" value="Consultar"></td>
    </tr>
    </tbody>
    </table>
    </form>
    
    
    <!-- tabla para mostrar datos -->
    <?php
//if (isset($consultar)){
	if($_POST){ 
	$var= $_POST["codipartida"];
	$par= "#"."$var";
	//extraemos las 4 primeros caracteres del numero de partida
	$subcap = substr("$var", 0, 4);
	
	//extraemos caracteres de la partida en 4 partes
	$coree1 = substr("$var", 0, 4);
	$coree2 = substr("$var", 4, 2);
	$coree3 = substr("$var", 6, 2);
	$coree4 = substr("$var", 8, 2);
	$correla = $coree1.".".$coree2.".".$coree3.".".$coree4;
	//echo "$correla";
	
	// consultamos en la tabla nandina
	$sqlandina="SELECT nan.partida, nan.descrip, nan.adval, nan.igv, nan.isc, nan.seguro, nan.cuode, nan.ciiu, nan.finicio, nan.ffin FROM part_nandina AS nan WHERE nan.partida = '$var' ORDER BY nan.finicio DESC LIMIT 1 ";
	$rsnandina = mysql_query($sqlandina) or die(mysql_error());
if (mysql_num_rows($rsnandina) > 0){
	while($rowand = mysql_fetch_array($rsnandina)){
		$codpartida = $rowand["partida"];
		$despartida = $rowand["descrip"];
		$fechaini = $rowand["finicio"];
		$fechafin = $rowand["ffin"];
		$fvigencia = $fechaini." Hasta ".$fechafin;
		
		$codcuode = $rowand["cuode"];
		$codciiu = $rowand["ciiu"];
		
		}
		}else{
			$despartida = "Sin Datos";
			}

// consultamos en la tabla subcapitulos y capitulos
$sqlsubcapi="SELECT subc.idcodigo,subc.idsubcapitulo,subc.descripcion AS subcapi_descripcion, subc.idcapitulo,capi.descripcion AS capi_descripcion, capi.idseccion, capi.descripcion_seccion FROM part_subcapitulo AS subc RIGHT JOIN part_capitulo AS capi ON subc.idcapitulo = capi.idcapitulo WHERE subc.idsubcapitulo = '$subcap' ";
	$rsnsubcapi = mysql_query($sqlsubcapi) or die(mysql_error());
if (mysql_num_rows($rsnsubcapi) > 0){
	while($rowsubcapi = mysql_fetch_array($rsnsubcapi)){
		$subcapi_desc = $rowsubcapi["subcapi_descripcion"];
		//$capi_desc = $rowsubcapi["capi_descripcion"]." / ".$rowsubcapi["idseccion"]." / ".$rowsubcapi["descripcion_seccion"];
		$capi_desc = $rowsubcapi["capi_descripcion"];
		$capi_seccion = $rowsubcapi["idseccion"].' / '.$rowsubcapi["descripcion_seccion"];
		//$capi_desc_seccion = $rowsubcapi["descripcion_seccion"];
		}
		}else{
			$subcapi_desc = "Sin Datos";
			$capi_desc = "Sin Datos";
			$capi_seccion = "Sin Datos";
			}

// mostramos niveles
$sqlni="SELECT niv.codigo, niv.nivel, niv.codigo_cnan, niv.descripcion_nivel FROM part_nivel AS niv WHERE niv.codigo_cnan = '$correla'";
	$rsni = mysql_query($sqlni) or die(mysql_error());
if (mysql_num_rows($rsni) > 0){
	while($rowni = mysql_fetch_array($rsni)){
		$cod_ni = $rowni["nivel"];
		}
		}else{
			$cod_ni = "Sin Datos";
			}
			

// consultamos en la tabla CUODE
$sqlcuo="SELECT cuo.codigo,cuo.descrip,cuo.codnew,cuo.descri_1,cuo.descri_2,cuo.descri_3 FROM part_cuodes AS cuo WHERE cuo.codigo = '$codcuode'";
	$rsncuo = mysql_query($sqlcuo) or die(mysql_error());
if (mysql_num_rows($rsncuo) > 0){
	while($rowcuo = mysql_fetch_array($rsncuo)){
		$cuo_desc = $rowcuo["descrip"];
		}
		}else{
			$cuo_desc = "Sin Datos";
			}

// consultamos en la tabla CIUU
$sqlciiu="SELECT ci.codigo,ci.descrip,ci.fcambio,ci.cusuario FROM part_ciiu AS ci WHERE ci.codigo = '$codciiu'";
	$rsnciiu = mysql_query($sqlciiu) or die(mysql_error());
if (mysql_num_rows($rsnciiu) > 0){
	while($rowciiu = mysql_fetch_array($rsnciiu)){
		$ciiu_desc = $rowciiu["descrip"];
		}
		}else{
			$ciiu_desc = "Sin Datos";
			}

// consultamos en la tabla CORRELACION
$sqlcorre="SELECT corre.Codigo_2007,corre.Codigo_2012,corre.Descripcion_2007 FROM part_correlacion AS corre WHERE corre.Codigo_2012 = '$correla'";
	$rsncorre = mysql_query($sqlcorre) or die(mysql_error());
if (mysql_num_rows($rsncorre) > 0){
	while($rowcorre = mysql_fetch_array($rsncorre)){
		$corre2007 = $rowcorre["Codigo_2007"];
		$descri2007 = $rowcorre["Descripcion_2007"];
		}
		}else{
			$corre2007 = "Sin Datos";
			$descri2007 = "Sin Datos";
			}
// consultamos en la tabla NANDTASA
$sqlntasa="SELECT nan.cnan,nan.vadv,nan.vigv,nan.visc,nan.tderesp,nan.tdl25784,nan.trs015cfds,nan.tseguros,nan.finitas,nan.ffintas,nan.fmod,nan.cdigmod,nan.dbaselegal,nan.vcomm,nan.tnan,nan.vsob,nan.dobs,nan.fingreso,nan.vbas_max FROM part_nandtasa AS nan WHERE nan.cnan = '5515290000' ORDER BY nan.finitas DESC LIMIT 1
";
	$rsntasa = mysql_query($sqlntasa) or die(mysql_error());
if (mysql_num_rows($rsntasa) > 0){
	while($rowntasa = mysql_fetch_array($rsntasa)){
		$vadv = $rowntasa["vadv"];
		$vigv = $rowntasa["vigv"];
		$visc = $rowntasa["visc"];
		$tderesp = $rowntasa["tderesp"];
		if ($tderesp = " "){
			$tderesp = "No";
			}else{
				$tderesp = "Sujeto a Tabla de Franja de Precios";
			}	
		$tseguros = $rowntasa["tseguros"];
		$dbaselegal = $rowntasa["dbaselegal"];
		$dobs = $rowntasa["dobs"];
		}
		}else{
			$vadv = "Sin Datos";
			$vigv = "Sin Datos";
			$visc = "Sin Datos";
			$tderesp = "Sin Datos";
			$tseguros = "Sin Datos";
			$dbaselegal = "Sin Datos";
		    $dobs = "Sin Datos";
			
			}
			
// consultamos en la tabla NANDUNI para mostrar la unidad de medida
$sqlunid="SELECT uni.cnan, uni.uni, uni.finivig, uni.ffinvig FROM part_nanduni AS uni WHERE uni.cnan = '$var' ORDER BY uni.ffinvig ASC LIMIT 2";
	$rsnuni = mysql_query($sqlunid) or die(mysql_error());
if (mysql_num_rows($rsnuni) > 0){
	while($rowuni = mysql_fetch_array($rsnuni)){
		$items = $items + 1;
		
		$unidadM = $unidadM." - ".$rowuni["uni"];
		
		}
		}else{
			$unidadM = "Sin Datos";
			
			}


// consultamos en la tabla ADUALIB
$sqlcorre="SELECT corre.Codigo_2007,corre.Codigo_2012,corre.Descripcion_2007 FROM part_correlacion AS corre WHERE corre.Codigo_2012 = '$correla'";
	$rsncorre = mysql_query($sqlcorre) or die(mysql_error());
if (mysql_num_rows($rsncorre) > 0){
	while($rowcorre = mysql_fetch_array($rsncorre)){
		$corre2007 = $rowcorre["Codigo_2007"];
		$descri2007 = $rowcorre["Descripcion_2007"];
		}
		}else{
			$corre2007 = "Sin Datos";
			$descri2007 = "Sin Datos";
			}
// consultamos partida restinguida para exportar
$sqlresexpo="SELECT mr.codi_regi, mr.cnan, mr.fini, mr.ffin, mr.desprod, mr.entidad, mr.registro, mr.baseleg, mr.cprod FROM part_mrestri AS mr WHERE mr.cnan = '$var' AND mr.ffin = '0000-00-00'";
	$rsresexpo = mysql_query($sqlresexpo) or die(mysql_error());
if (mysql_num_rows($rsresexpo) > 0){
	while($rowresexpo = mysql_fetch_array($rsresexpo)){
		$siresexpo = "Si";
		}
		}else{
			$siresexpo = "No";
			}
//partida sujeto a peco amazonia
//$sqlpeco="SELECT adu.tlib, adu.clib, adu.cadu, adu.finilib, adu.ffinlib, adu.cnab, adu.vigc, adu.fmod, adu.codgmod, adu.dobs FROM part_adualib AS adu WHERE adu.cnab = '$var' AND adu.ffinlib = '0000-00-00' AND adu.tlib = 'I' GROUP BY adu.tlib, adu.clib, adu.cadu, adu.finilib, adu.ffinlib, adu.cnab, adu.vigc, adu.fmod, adu.codgmod, adu.dobs";
$sqlpeco="SELECT adu.tlib, adu.clib, adu.cadu, adu.finilib, adu.ffinlib, adu.cnab, adu.vigc, adu.fmod, adu.codgmod, adu.dobs, adua.codadu, adua.descripcion, adua.finicio, adua.ffin, adua.vigencia FROM part_adualib AS adu LEFT JOIN part_aduana AS adua ON adu.cadu = adua.codadu WHERE adu.cnab = '$var' AND adu.ffinlib = '0000-00-00' AND adu.tlib = 'I' GROUP BY adu.tlib, adu.clib, adu.cadu, adu.finilib, adu.ffinlib, adu.cnab, adu.vigc, adu.fmod, adu.codgmod, adu.dobs";

	$rsnpeco = mysql_query($sqlpeco) or die(mysql_error());
if (mysql_num_rows($rsnpeco) > 0){
	while($rowpeco = mysql_fetch_array($rsnpeco)){
		$sipeco = "Si";
		$codclib = $rowpeco["clib"];

		$aduanaM = $aduanaM."  /  ".$rowpeco["descripcion"];
		
		// si tiene datos buscamos en la tabla que lo relaciona TABLIBE
		$sqltb="SELECT tb.tlib, tb.clib, tb.dlib, tb.fviglib, tb.tviglib FROM part_tablibe AS tb WHERE tb.clib = $codclib";
	$rsntb = mysql_query($sqltb) or die(mysql_error());
if (mysql_num_rows($rsntb) > 0){
	while($rowtb = mysql_fetch_array($rsntb)){
		$nomtb = $rowtb["dlib"].' Con Fecha Vigencia Desde: '.$rowtb["fviglib"];
		}
		}else{
			$nomtb = " ";
			}
		
		
		
		}
		}else{
			$sipeco = "No";
			}

//Partidas Sujetas a Aladi 504
$sql504="SELECT ala.tlib, ala.clib, ala.cnaladisa, ala.cnan, ala.tmargen, ala.vmp1, ala.vmp2, ala.vmp3, ala.vph1, ala.vph2, ala.vph3, ala.despro, ala.finilib, ala.ffinlib, ala.dobs, ala.vdes, tab.tlib, tab.clib, tab.dlib, tab.fviglib, tab.tviglib FROM part_aladi504 AS ala LEFT JOIN part_tablibe AS tab ON ala.clib = tab.clib WHERE ala.cnan = '$var' ";
	$rsn504 = mysql_query($sql504) or die(mysql_error());
if (mysql_num_rows($rsn504) > 0){
	while($row504 = mysql_fetch_array($rsn504)){
		$ala504x = $row504["cnan"];
		$ala504 = "Si";
		$descri504 = $row504["dlib"].' Fecha Vigencia desde: '.$row504["fviglib"];
		}
		}else{
			$ala504 = "No";
			}


//otros convenios internacionales
$sqlconv="SELECT ala.tlib, ala.clib, ala.pais, ala.cpaiorige, ala.cnaladisa, ala.cnan, ala.tmargen, ala.tmargen1, ala.tprod, ala.nandina, ala.vmp, ala.vhp, ala.observ, ala.finilib, ala.ffinlib, ala.tienecup, ala.vdes, tab.tlib, tab.clib, tab.dlib, tab.fviglib, tab.tviglib FROM part_aladlibe AS ala LEFT JOIN part_tablibe AS tab ON ala.clib = tab.clib WHERE ala.cnan = '$var' AND ala.ffinlib = '0000-00-00' ORDER BY ala.pais ASC";
$rsnconv = mysql_query($sqlconv) or die(mysql_error());
if (mysql_num_rows($rsnconv) > 0){
	while($rowconv = mysql_fetch_array($rsnconv)){
		$conve_part = $rowconv["cnan"];
		$conve_part = "Si";
		}
		}else{
			$conve_part = "No";
			}

			
	?>
    <table class='table table-striped table-hover' align='left'style='font-size:80%'>
    <tr>
    <td bgcolor='#EBEBEB' colspan="2" align="center"><h5><b><font color="#3366CC">Datos Gestion de Partida <?php echo "$par"; ?></font></b></h5></td>
    </tr>
    <tr>
    <?php
	
	?>
    <td bgcolor='#EBEBEB' width='150'><b>Descripci&oacute;n:</b></td>
    <td><?php echo htmlentities(utf8_decode("$despartida")); ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Capitulo:</b></td>
    <td><?php echo htmlentities(utf8_decode("$capi_desc")); ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Secciones:</b></td>
    <td><?php echo htmlentities(utf8_decode("$capi_seccion")); ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>SubCapitulo:</b></td>
    <td><?php echo htmlentities(utf8_decode("$subcapi_desc")); ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Nivel:</b></td>
    <td><?php echo htmlentities(utf8_decode("$cod_ni")); ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>CUODE:</b></td>
    <td><?php echo htmlentities(utf8_decode("$cuo_desc")); ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>CIUU:</b></td>
    <td><?php echo htmlentities(utf8_decode("$ciiu_desc")); ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Correlacci&oacute;n:</b></td>
    <td><?php echo htmlentities(utf8_decode("$corre2007")); ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Fecha Vigencia Desde:</b></td>
    <td><?php echo htmlentities(utf8_decode("$fvigencia")); ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' colspan="2" align="center"><h5><b><font color="#3366CC">Derechos Arancelarios</font></b></h5></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Ad/Valorem:</b></td>
    <td><?php echo htmlentities(utf8_decode("$vadv")); ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Impuesto General a las Ventas:</b></td>
    <td><?php echo htmlentities(utf8_decode("$vigv")); ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Impuesto Selctivo al Consumo:</b></td>
    <td><?php echo htmlentities(utf8_decode("$visc")); ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Derecho Especifico:</b></td>
    <td><?php echo htmlentities(utf8_decode("$tderesp")); ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Seguro de Tabla:</b></td>
    <td><?php echo htmlentities(utf8_decode("$tseguros")); ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Unidad de Partida:</b></td>
    <td><?php echo htmlentities(utf8_decode("$unidadM")); ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Base Legal:</b></td>
    <td><?php echo htmlentities(utf8_decode("$dbaselegal")); ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Observacion:</b></td>
    <td><?php echo htmlentities(utf8_decode("$dobs")); ?></td>
    </tr>
   <!--  <tr>
    <td colspan="2">&nbsp;&nbsp;</td>
    </tr> -->
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Partida Restringida Para Exportar:</b></td>
    <td><?php echo htmlentities(utf8_decode("$siresexpo")); ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Partidas Sujetas a PECO Y AMAZONIA Liberan IGV:</b></td>
    <td><?php echo htmlentities(utf8_decode("$sipeco -  $nomtb")); ?></td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Aduanas:</b></td>
    <td><?php echo htmlentities(utf8_decode("$aduanaM")); ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' colspan="2" align="center"><h5><b><font color="#3366CC">Partidas sujetas a PECO</font></b></h5></td>
    </tr>
    <tr>
    <td colspan="2" align="center"><?php echo htmlentities(utf8_decode("$sipeco -  $nomtb")); ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Aduanas:</b></td>
    <td><?php echo htmlentities(utf8_decode("$aduanaM")); ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' colspan="2" align="center"><h5><b><font color="#3366CC">Partidas Sujetas a Aladi 504</font></b></h5></td>
    </tr>
    <tr>
    <td colspan="2" align="center"><?php echo htmlentities(utf8_decode("$ala504 -  $descri504")); ?></td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Aduanas:</b></td>
    <td>Sin Datos</td>
    </tr> 
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Mercaderia Prohibida de Exportar:</b></td>
    <td>&nbsp;&nbsp;</td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Mercaderia Prohibida de Importar:</b></td>
    <td>&nbsp;&nbsp;</td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Producto Exceptuado de las Prohibiciones a Exportar:</b></td>
    <td>&nbsp;&nbsp;</td>
    </tr>
    <tr>
    <td bgcolor='#EBEBEB' width='150'><b>Partidas no Excluida a Restitución de Derechos:</b></td>
    <td>&nbsp;&nbsp;</td>
    </tr>
     <tr>
    <td bgcolor='#EBEBEB' colspan="2" align="center"><h5><b><font color="#3366CC">Otros Convenios Internacionales</font></b></h5></td>
    </tr>
    <tr>
    <td colspan="2" align="center"><?php echo htmlentities(utf8_decode("$conve_part")); ?></td>
    <!-- </tr>
     <tr> 
    <td bgcolor='#EBEBEB' width='150'><b>Aduanas:</b></td>
    <td>&nbsp;&nbsp;</td>
    </tr> -->
    <!-- tabla de paises -->
    <tr>
    <td colspan="2">
    <table class='table table-striped table-hover' align='left'style='font-size:100%'>
    <?php
	// si no encuentra datos
	if($conve_part == "No"){
	?>
    <tr>
    <td bgcolor='#EBEBEB'>Pais</td> <td bgcolor='#EBEBEB'>Cnaladisa</td> <td bgcolor='#EBEBEB'>Tmargen</td> <td bgcolor='#EBEBEB'>Vmp</td> <td bgcolor='#EBEBEB'>Vdes</td> <td bgcolor='#EBEBEB'>Observ</td>
    <td bgcolor='#EBEBEB'>Dlib</td>
    </tr>
    <tr>
    <td colspan="7" align="center"> Sin Datos</td>
    </tr>
    <?php
	}else{
		//otros convenios internacionales muestra la lista
$sqlconve="SELECT ala.tlib, ala.clib, ala.pais, ala.cpaiorige, ala.cnaladisa, ala.cnan, ala.tmargen, ala.tmargen1, ala.tprod, ala.nandina, ala.vmp, ala.vhp, ala.observ, ala.finilib, ala.ffinlib, ala.tienecup, ala.vdes, tab.tlib, tab.clib, tab.dlib, tab.fviglib, tab.tviglib FROM part_aladlibe AS ala LEFT JOIN part_tablibe AS tab ON ala.clib = tab.clib WHERE ala.cnan = '$var' AND ala.ffinlib = '0000-00-00' ORDER BY ala.pais ASC";
$rsnconve = mysql_query($sqlconve) or die(mysql_error());
if (mysql_num_rows($rsnconve) > 0){
	echo"<tr>";
    echo"<td bgcolor='#EBEBEB'>Pais</td>
	<td bgcolor='#EBEBEB'>Cnaladisa</td>
	<td bgcolor='#EBEBEB'>Tmargen</td> 
	<td bgcolor='#EBEBEB'>Vmp</td> 
	<td bgcolor='#EBEBEB'>Vdes</td> 
	<td bgcolor='#EBEBEB'>Observ</td>
	<td bgcolor='#EBEBEB'>Dlib</td>";
   echo"</tr>";
	
	while($rowconve = mysql_fetch_array($rsnconve)){
		$conve_parti = $rowconve["cnan"];
		echo"<tr>";
    echo"<td bgcolor='#EBEBEB'>".$rowconve["pais"]."</td>";
	 echo"<td bgcolor='#EBEBEB'>".$rowconve["cnaladisa"]."</td>";
	  echo"<td bgcolor='#EBEBEB'>".$rowconve["tmargen"]."</td>";
	   echo"<td bgcolor='#EBEBEB'>".$rowconve["vmp"]."</td>";
	    echo"<td bgcolor='#EBEBEB'>".$rowconve["vdes"]."</td>";
		 echo"<td bgcolor='#EBEBEB'>".$rowconve["observ"]."</td>";
		echo"<td bgcolor='#EBEBEB'>".$rowconve["dlib"]."</td>";
		}
		}
		
		
		
		}
	?>
    </table>
    </td>
    </tr>
        <!-- fin tabla de paises -->
    <tr>
    <td colspan="2">&nbsp;&nbsp;</td>
    </tr>
    </table>
    
 <?php
 }
 ?>
    
    <!-- fin tabla para mostrar datos -->
    </center>
    
    &nbsp;<br>
    
</body>
</html>
<?php
include("pie.php");
?>