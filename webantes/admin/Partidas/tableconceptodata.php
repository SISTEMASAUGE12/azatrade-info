<?php
/* Database connection start */
/*$servername = "localhost";
$username = "root";
$password = "jopedis";
$dbname = "produccion";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error()); */

include ("conection/config.php");

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
// datatable column index  => database column name
	0 => 'codconc', 
	1 => 'desconc',
	2 => 'ley',
	3 => 'art',
	4 => 'multa',
	5 => 'naturaleza',
	6 => 'reglam',
	7 => 'activa',
	8 => 'mpag',
	9 => 'ctipomul',
	10 => 'sacoginsen',
	11 => 'cmoneda_mul',
	12 => 'finicio',
	13 => 'fcambio',
	14 => 'fvigencia',
	
	
);



// getting total number records without any search
$sql = "SELECT codconc";
$sql.=" FROM part_concepto";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT codconc, desconc, ley, art, multa, naturaleza, reglam, activa, mpag, ctipomul, sacoginsen,   cmoneda_mul, DATE_FORMAT(finicio, '%d/%m/%Y') as finicio, DATE_FORMAT(fcambio, '%d/%m/%Y') as fcambio, DATE_FORMAT(fvigencia, '%d/%m/%Y') as fvigencia ";
$sql.=" FROM part_concepto WHERE 1=1";
if( !empty($requestData['columns'][0]['search']['value']) ){
	$sql.=" AND  codconc LIKE '%".$requestData['columns'][0]['search']['value']."%' ";    
}
if( !empty($requestData['columns'][1]['search']['value']) ){
	$sql.=" AND  desconc LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
}
if( !empty($requestData['columns'][2]['search']['value']) ){
	$sql.=" AND  ley LIKE '%".$requestData['columns'][2]['search']['value']."%' ";
}
if( !empty($requestData['columns'][3]['search']['value']) ){
	$sql.=" AND  art LIKE '%".$requestData['columns'][3]['search']['value']."%' ";
}
if( !empty($requestData['columns'][4]['search']['value']) ){
	$sql.=" AND  multa LIKE '%".$requestData['columns'][4]['search']['value']."%' ";
}
if( !empty($requestData['columns'][5]['search']['value']) ){
	$sql.=" AND  naturaleza LIKE '%".$requestData['columns'][5]['search']['value']."%' ";
}
if( !empty($requestData['columns'][6]['search']['value']) ){
	$sql.=" AND  reglam LIKE '%".$requestData['columns'][6]['search']['value']."%' ";
}
if( !empty($requestData['columns'][7]['search']['value']) ){
	$sql.=" AND  activa LIKE '%".$requestData['columns'][7]['search']['value']."%' ";
}
if( !empty($requestData['columns'][8]['search']['value']) ){
	$sql.=" AND  mpag LIKE '%".$requestData['columns'][8]['search']['value']."%' ";
}
if( !empty($requestData['columns'][9]['search']['value']) ){
	$sql.=" AND  ctipomul LIKE '%".$requestData['columns'][9]['search']['value']."%' ";
}
if( !empty($requestData['columns'][10]['search']['value']) ){
	$sql.=" AND  sacoginsen LIKE '%".$requestData['columns'][10]['search']['value']."%' ";
}
if( !empty($requestData['columns'][11]['search']['value']) ){
	$sql.=" AND  cmoneda_mul LIKE '%".$requestData['columns'][11]['search']['value']."%' ";
}
if( !empty($requestData['columns'][12]['search']['value']) ){
	$sql.=" AND  finicio LIKE '%".$requestData['columns'][12]['search']['value']."%' ";
}
if( !empty($requestData['columns'][13]['search']['value']) ){
	$sql.=" AND  fcambio LIKE '%".$requestData['columns'][13]['search']['value']."%' ";
}
if( !empty($requestData['columns'][14]['search']['value']) ){
	$sql.=" AND  fvigencia LIKE '%".$requestData['columns'][14]['search']['value']."%' ";
}

$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains column index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees1");
	

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["codconc"];
	$nestedData[] = $row["desconc"];
	$nestedData[] = $row["ley"];
	$nestedData[] = $row["art"];
	$nestedData[] = $row["multa"];
	$nestedData[] = $row["naturaleza"];
	$nestedData[] = $row["reglam"];
	$nestedData[] = $row["activa"];
	$nestedData[] = $row["mpag"];
	$nestedData[] = $row["ctipomul"];
	$nestedData[] = $row["sacoginsen"];
	$nestedData[] = $row["cmoneda_mul"];
	$nestedData[] = $row["finicio"];
	$nestedData[] = $row["fcambio"];
	$nestedData[] = $row["fvigencia"];
	
	$data[] = $nestedData;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
