<?php
ini_set('memory_limit','528M');

include("conex/inibd.php");
set_time_limit(1950);
ini_set('memory_limit', '-1');

$dato1 = $_GET["dat1"]; // partida
$dato2 = $_GET["dat2"]; // año

if($dato2!=""){
	$linecod = " YEAR(i.fech_ingsi) = '$dato2' AND ";
}else{
	$linecod = " YEAR(i.fech_ingsi) >= '2012' AND ";
}

	$sqlt=" select i.id AS id, i.codi_aduan AS codi_aduan,a.descripcion AS descripcion, i.ano_prese AS ano_prese, i.nume_corre AS nume_corre, i.fech_ingsi AS fech_ingsi, i.tipo_docum AS tipo_docum, i.libr_tribu AS libr_tribu, i.dnombre AS dnombre, i.codi_agent AS codi_agent, i.fech_llega AS fech_llega, i.via_transp AS via_transp, (case i.via_transp when '1' then 'BARCO' when '4' then 'AVION' when '6' then 'FERROCARRIL' when '7' then 'CAMION' when '8' then 'POR TUBERIAS' else 'OTRAS' end) AS viatransp, i.empr_trans AS empr_trans, i.codi_alma AS codi_alma, i.cadu_manif AS cadu_manif, i.fech_manif AS fech_manif, i.nume_manif AS nume_manif, i.fech_recep AS fech_recep, i.fech_cance AS fech_cance, i.tipo_cance AS tipo_cance, i.banc_cance AS banc_cance, i.codi_enfin AS codi_enfin, i.dk AS dk, i.pais_orige AS pais_orige, p1.espanol AS pais1, i.pais_adqui AS pais_adqui, p2.espanol AS pais2, i.puer_embar AS puer_embar, pu.puerto AS puerto, i.nume_serie AS nume_serie, i.part_nandi AS part_nandi, i.desc_comer AS desc_comer, i.desc_matco AS desc_matco, i.desc_usoap AS desc_usoap, i.desc_fopre AS desc_fopre, i.desc_otros AS desc_otros, i.fob_dolpol AS fob_dolpol, i.fle_dolar AS fle_dolar, i.seg_dolar AS seg_dolar, i.peso_neto AS peso_neto, i.peso_bruto AS peso_bruto, i.unid_fiqty AS unid_fiqty,i.unid_fides AS unid_fides,i.qunicom AS qunicom,i.tunicom AS tunicom,i.sest_merca AS sest_merca,i.adv_dolar AS adv_dolar,i.igv_dolar AS igv_dolar,i.isc_dolar AS isc_dolar,i.ipm_dolar AS ipm_dolar,i.des_dolar AS des_dolar,i.ipa_dolar AS ipa_dolar,i.sad_dolar AS sad_dolar,i.der_adum AS der_adum,i.comm AS comm,i.fmod AS fmod,i.cant_bulto AS cant_bulto,i.clase AS clase,i.trat_prefe AS trat_prefe,i.tipo_trat AS tipo_trat,i.codi_liber AS codi_liber,i.impr_reliq AS impr_reliq,i.accion AS accion,i.fechareg AS fechareg,i.fechamodi AS fechamodi from ((((importacion i left join aduana a on((i.codi_aduan = a.codadu))) left join paises p1 on((i.pais_orige = p1.idpaises))) left join paises p2 on((i.pais_adqui = p2.idpaises))) left join puerto pu on((i.puer_embar = pu.idcodigo))) WHERE $linecod i.part_nandi = '$dato1' ";
$resultado1 = $conexpg -> prepare($sqlt);  
$resultado1 -> execute(); 
$hyyr = $resultado1 -> fetchAll(PDO::FETCH_OBJ); 
if($resultado1 -> rowCount() > 0) { 
	
	$delimiter = ","; 
    $filename = "Reporte_partida_import_".$dato1."-".date('Y-m-d') . ".csv"; 
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
    // Set column headers 
    $fields = array('CODIGO', 'ADUANA', utf8_decode('AÑO DUI'), 'NUMERO DUI', 'FECHA NUMERO DUI', 'TIPO DOC M', 'RUC', 'RAZON SOCIAL IMPORTADOR', 'CODIGO', 'AGENTE ADUANA', 'FECHA LLEGADA DE NAVE', 'CODIGO VIA TRANSP', 'VIA DE TRANSPORTE', 'COD EMPRESA TRANSPORTE', 'COD ALMACEN', 'ADUANA MANIFIESTO', utf8_decode('AÑO MANIFIESTO'), 'NUMERO MANIFIESTO', 'FECHA RECEPCION DE DUI', 'FECHA CANCELACION', 'TIPO CANCELACION', 'COD BANCO CANCELACION', 'COD ENTIDAD FINANCIERA', 'INDICADOR TELEDESPECHO', 'COD PAIS ORIGEN', 'PAIS ORIGEN', 'COD PAIS ADQ', 'PAIS ADQUISICION', 'COD EMBARQUE', 'PUERTO EMBARQUE', 'NUM SERIE', 'PARTIDA', 'DESCRIPCION COMERCIAL', 'MATERIAL ELABORACION', 'USO', 'PRESENTACION', 'DESCRIPCION OTROS', 'VALOR FOB USD', 'VALOR FOB USD', ' VALOR FLETE USD', 'VALOR SEGURO USD', 'PESO NETO KG', 'PESO BRUTO KG', 'CANT IMPORTADA', 'UNIDAD MEDIDA', 'CANT COMERCIAL', 'ESTADO MERCADERIA', 'ADV USD', 'IGV USD', 'ISC USD', 'IPM USD', 'DERECHO ESPECIFICO USD', 'IMPUESTO ADICIONAL USD', 'SOBRETASA USD', 'DERECHO ANTIDUMPING USD', 'COMMODITIES', 'FECHA MODIF DUI', 'CANT DE BULTOS', 'CLASE DE BULTOS', 'TRATO PREFERENCIAL', 'TIPO TRATAMIENTO', 'COD LIBERTORIO', 'INDICADOR DE RELIQUIDACION' ); 
    fputcsv($f, $fields, $delimiter); 
	
foreach($hyyr as $row) {
				
	//consultanos agente
	/*$sqlage = "select aa.agencia from agente aa where aa.idagente = '$impor9' limit 1";
	$rsage=$conexpg->query($sqlage); 
if($rsage->num_rows>0){ 
while($rwage=$rsage->fetch_array()){ 
	$nom_agente = $rwage['agencia'];
}
}else{
	$nom_agente = "---";
}*/

	  $staparti = strlen($row->part_nandi == 9)?'0'.$row->part_nandi:''.$row->part_nandi.''; 
	
$descriuso = str_replace(";", " - ", $row ->desc_usoap); //reemplazamos si tiene el caracter punto y coma
$descfopre = str_replace(";", " - ", $row ->desc_fopre);
$descotros = str_replace(";", " - ", $row ->desc_otros);
$descmatco = str_replace(";", " - ", $row ->desc_matco);
$desccomer = str_replace(";", " - ", $row ->desc_comer);
	
        $lineData = array($row -> codi_aduan, $row ->descripcion, $row ->ano_prese, $row ->nume_corre, $row ->fech_ingsi, $row ->tipo_docum, $row ->libr_tribu, utf8_decode($row ->dnombre), utf8_decode($row ->codi_agent), '', utf8_decode($row ->fech_llega), $row ->via_transp, utf8_decode($row ->viatransp), utf8_decode($row ->empr_trans), $row ->codi_alma, $row ->cadu_manif, $row ->fech_manif, $row ->nume_manif, $row ->fech_recep, $row ->fech_cance, $row ->tipo_cance, $row ->banc_cance, $row ->codi_enfin, $row ->dk, utf8_decode($row ->pais_orige), utf8_decode($row ->pais1), utf8_decode($row ->pais_adqui), utf8_decode($row ->pais2), $row ->puer_embar, $row ->puerto, $row ->nume_serie, $staparti, utf8_decode($desccomer), utf8_decode($descmatco), utf8_decode($descriuso), utf8_decode($descfopre), utf8_decode($descotros), number_format($row ->fob_dolpol,2), number_format($row ->fle_dolar,2), number_format($row ->seg_dolar,2), number_format($row ->peso_neto,2), number_format($row ->peso_bruto,2), number_format($row ->unid_fiqty,2), $row ->unid_fides, number_format($row ->qunicom,2), $row ->tunicom, $row ->sest_merca, number_format($row ->adv_dolar,2), number_format($row ->igv_dolar,2), number_format($row ->isc_dolar,2), number_format($row ->ipm_dolar,2), number_format($row ->des_dolar,2), number_format($row ->ipa_dolar,2), number_format($row ->sad_dolar,2), number_format($row ->der_adum,2), number_format($row ->comm,2), $row ->fmod, number_format($row ->cant_bulto,2), $row ->clase, $row ->trat_prefe, $row ->tipo_trat, $row ->codi_liber, $row ->impr_reliq ); 
	
        fputcsv($f, $lineData, $delimiter);
	
  }
	 // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
  }else{
	  echo "<h3>No Hay Informaci&oacute;n en la Busqueda</h3>";
	  }
 ?>
<?php $conexpg = null;//cierra conexion  ?>