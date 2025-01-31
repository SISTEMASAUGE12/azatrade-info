<?php
include("conex/inibd.php");
include('Classes/PHPExcel.php');

set_time_limit(1950);
ini_set('memory_limit', '-1');

$dato1 = $_GET["dat1"]; // partida
$dato2 = $_GET["dat2"]; // año

if($dato2!=""){
	$linecod = " and YEAR(e.FNUM) = '".$dato2."' ";
}else{
	$linecod = "and YEAR(e.FNUM) >= '2012' ";
}

$objPHPExcel	=	new	PHPExcel();

// Propiedades del documento
 $objPHPExcel->getProperties()->setCreator(" Azatrade")
                         ->setLastModifiedBy("Azatrade")
                         ->setTitle("Descarga Partida Masiva Exportacion")
                         ->setSubject("Informacion Partida")
                         ->setDescription("Descarga de data ")
                         ->setKeywords("Azatrade")
                         ->setCategory("DataExport");

$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Año');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Fecha');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Aduana');
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Dua');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'NDoc');
$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Empresa');
$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Direccion');
$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Departamento');
$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Provincia');
$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Distrito');
$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Partida');
$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Descripcion Prod');
$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Pais');
$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Puerto');
$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Via Trans');
$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Unid Trans');
$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Descrip Transp');
$objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Agente');
$objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Recinto Aduanero');
$objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Banco');
$objPHPExcel->getActiveSheet()->SetCellValue('U1', 'Valor Fob');
$objPHPExcel->getActiveSheet()->SetCellValue('V1', 'Peso Neto');
$objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Peso Bruto');
$objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Cant Exportada');
$objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Unid Medida');
$objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Cant Comercial(Kg)');
$objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'Unid Comerc');
$objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Precio Unit(x Kg)');
$objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'Precio Unit (x Unid Med)');
$objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Precio Unit (x Unid Comerc)');
$objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Peso (Envase/Embalaje)');
$objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Sector');

$objPHPExcel->getActiveSheet()->getStyle("A1:AF1")->getFont()->setBold(true);

$rowCount	=	2;

//$yyee = utf8_decode('Año');

	$sqlt="SELECT
YEAR(e.FNUM) as anio,
MONTH(e.FNUM) as mes,
e.FNUM,
e.NDCL,
e.CADU,
e.FEMB,
e.NDOC,
e.DNOMBRE,
e.DDIRPRO,
e.UBIGEO,
e.PART_NANDI,
e.NSER,
e.CPAIDES,
e.CPUEDES,
e.CVIATRA,
e.DMAT,
e.NCON,
e.CAGE,
'aa' as agente,
e.CALM,
e.VFOBSERDOL,
e.VPESNET,
e.VPESBRU,
e.QUNIFIS,
e.TUNIFIS,
e.QUNICOM,
e.TUNICOM,
CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) AS dcom,
substring(e.ubigeo,1,2),
substring(e.ubigeo,3,2),
substring(e.ubigeo,5,2),
a.descripcion AS aduana,
em.descripcion AS estmercancia,
p.espanol AS paisdestino,
pu.puerto,
vt.descripcion AS viatransporte,
ba.banco,
'ss' AS sector,
uu.descripcion AS undmedida,
ubi.nombredistrito,
ubi.nombreprov,
ubi.nombredepartamento,
recint_aduaner.razon_social as recinto_aduanero,
(case e.cunitra 
		when '1' then 'BARCO' 
		when '4' then 'AVION' 
		when '6' then 'FERROCARRIL' 
		when '7' then 'CAMION' 
		when '8' then 'POR TUBERIAS' 
	else 'OTRAS' end) as unidadtransporte,
(case e.vpesnet when 0 then 0 else (e.vfobserdol/e.vpesnet) end) as pesounitkg,
	(case e.qunifis when 0 then 0 else (e.vfobserdol/e.qunifis) end) as preciounitxundmedida,
	(case e.qunicom when 0 then 0 else (e.vfobserdol/e.qunicom) end) as preciounitxunidcomercial,
	(case e.vpesnet when 0 then 0 else (e.vpesbru/e.vpesnet) end) as pesoenvaseyembalaje
FROM
exportacion AS e
LEFT JOIN aduana AS a ON e.CADU = a.codadu
LEFT JOIN estmercancia AS em ON e.CEST = em.idestmercancia
LEFT JOIN paises AS p ON e.CPAIDES = p.idpaises
LEFT JOIN puerto AS pu ON e.CPUEDES = pu.idcodigo
LEFT JOIN viastransporte AS vt ON e.CVIATRA = vt.idviastransporte
LEFT JOIN banco AS ba ON substring(e.centfin,2,2)= ba.idbanco
LEFT JOIN unidmedida AS uu ON e.TUNIFIS = uu.idunidmedida
LEFT JOIN ubigeo AS ubi ON e.UBIGEO = ubi.cubigeo
LEFT JOIN (select idrecintaduaner, razon_social from recintaduaner group by idrecintaduaner, razon_social)as recint_aduaner On (recint_aduaner.idrecintaduaner=e.calm)
WHERE

e.PART_NANDI = '".$dato1."' 
$linecod

  /* and MONTH(".$wherefecha1.") like '%".$mes."%'
	and e.CADU like '%".$aduana."%'
	and e.NDOC like '%".$empresa."%'
	and substring(e.UBIGEO,1,2) like '%".$depa."%'
	and substring(e.UBIGEO,3,2) like '%'
	and substring(e.UBIGEO,5,2) like '%'
and CONCAT(e.DCOM,' ',e.DMER2,' ',e.DMER3,' ',e.DMER4,' ',e.DMER5) like '%".$campode."%'	
	and e.CPAIDES like '%".$pais."%'
	and e.CPUEDES like '%'
	and e.CUNITRA like '%'
	and e.CVIATRA like '%'
	and e.CAGE like '%'
	and e.TUNIFIS like '%'
	and e.TUNICOM like '%' */ ";
$resultado1 = $conexpg -> prepare($sqlt);  
$resultado1 -> execute(); 
$hyyr = $resultado1 -> fetchAll(PDO::FETCH_OBJ); 
if($resultado1 -> rowCount() > 0) { 	
foreach($hyyr as $row) {

	$datolist1 = $row -> anio; 
	$datolist2 = $row ->FNUM; 
	$datolist3 = $row ->aduana; 
	$datolist4 = $row ->NDCL;
	$datolist5 = $row ->NDOC; 
	$datolist6 = utf8_decode($row ->DNOMBRE);
	$datolist7 = $row ->DDIRPRO; 
	$datolist8 = utf8_decode($row ->nombredepartamento);
	$datolist9 = utf8_decode($row ->nombreprov); 
	$datolist10 = utf8_decode($row ->nombredistrito); 
	$datolist11 = $row ->PART_NANDI; 
	$datolist12 = utf8_decode($row ->dcom); 
	$datolist13 = utf8_decode($row ->paisdestino);
	$datolist14 = $row ->puerto; 
	$datolist15 = $row ->viatransporte;
	$datolist16 = $row ->unidadtransporte; 
	$datolist17 = $row ->DMAT;
	$datolist18 = $row ->CAGE;
	$datolist19 = $row ->recinto_aduanero; 
	$datolist20 = $row ->banco;
	/*$datolist21 = number_format($row ->VFOBSERDOL,2); 
	$datolist22 = number_format($row ->VPESNET,2);
	$datolist23 = number_format($row ->VPESBRU,2); 
	$datolist24 = number_format($row ->QUNIFIS,2);*/ 
	$datolist21 = $row ->VFOBSERDOL; 
	$datolist22 = $row ->VPESNET;
	$datolist23 = $row ->VPESBRU; 
	$datolist24 = $row ->QUNIFIS;
	$datolist25 = $row ->undmedida;
	$datolist26 = $row ->QUNICOM; 
	$datolist27 = $row ->TUNIFIS; 
	$datolist28 = number_format($row ->pesounitkg,2); 
	$datolist29 = number_format($row ->preciounitxundmedida,2); 
	$datolist30 = number_format($row ->preciounitxunidcomercial,2);
	$datolist31 = number_format($row ->pesoenvaseyembalaje,2); 
	$datolist32 = '-';
	
	$repla1 = str_replace(";", " - ", $datolist6);
	$repla2 = str_replace(",", " - ", $repla1);
	$repla3 = str_replace("&", " - ", $repla2);
	
	$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($datolist1,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($datolist2,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($datolist3,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($datolist4,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($datolist5,'UTF-8'));
	//$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($datolist6,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($repla3,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($datolist7,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($datolist8,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($datolist9,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($datolist10,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($datolist11,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($datolist12,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper($datolist13,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($datolist14,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($datolist15,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, mb_strtoupper($datolist16,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, mb_strtoupper($datolist17,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, mb_strtoupper($datolist18,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, mb_strtoupper($datolist19,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, mb_strtoupper($datolist20,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, mb_strtoupper($datolist21,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, mb_strtoupper($datolist22,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, mb_strtoupper($datolist23,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, mb_strtoupper($datolist24,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, mb_strtoupper($datolist25,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, mb_strtoupper($datolist26,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, mb_strtoupper($datolist27,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, mb_strtoupper($datolist28,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount, mb_strtoupper($datolist29,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AD'.$rowCount, mb_strtoupper($datolist30,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AE'.$rowCount, mb_strtoupper($datolist31,'UTF-8'));
	$objPHPExcel->getActiveSheet()->SetCellValue('AF'.$rowCount, mb_strtoupper($datolist32,'UTF-8'));
	
	$rowCount++;
	
  }
  }else{
	  echo "<h3>No Hay Informaci&oacute;n en la Busqueda</h3>";
	  }
/*
$objWriter	=	new PHPExcel_Writer_Excel2007($objPHPExcel);


header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="Descarga_PartidaMasiva-Exportaciones.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');
*/

$rango="A1:AF1";
$styleArray = array('font' => array( 'name' => 'Arial','size' => 10),
'borders'=>array('allborders'=>array('style'=> PHPExcel_Style_Border::BORDER_THIN,'color'=>array('argb' => 'FFF')))
);
$objPHPExcel->getActiveSheet()->getStyle($rango)->applyFromArray($styleArray);
// Cambiar el nombre de hoja de cálculo
$objPHPExcel->getActiveSheet()->setTitle('Reporte Partida');
// Establecer índice de hoja activa a la primera hoja , por lo que Excel abre esto como la primera hoja
$objPHPExcel->setActiveSheetIndex(0);
// Redirigir la salida al navegador web de un cliente ( Excel5 )
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Descarga-Partida-masiva.xls"');
header('Cache-Control: max-age=0');
// Si usted está sirviendo a IE 9 , a continuación, puede ser necesaria la siguiente
header('Cache-Control: max-age=1');
// Si usted está sirviendo a IE a través de SSL , a continuación, puede ser necesaria la siguiente
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

 ?>
	</table>
<?php $conexpg = null;//cierra conexion  ?>