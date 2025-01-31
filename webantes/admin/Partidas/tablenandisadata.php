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
	0 => 'partida', 
	1 => 'descrip',
	2 => 'adval',
	3 => 'igv',
	4 => 'isc',
	5 => 'seguro',
	6 => 'cuode',
	7 => 'ciiu',
	8 => 'finicio',
	9 => 'ffin'
	
);



// getting total number records without any search
$sql = "SELECT partida";
$sql.=" FROM part_nandina";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT partida, descrip, adval, igv, isc, seguro, cuode, ciiu, DATE_FORMAT(finicio, '%d/%m/%Y') as finicio, DATE_FORMAT(ffin, '%d/%m/%Y') as ffin ";
$sql.=" FROM part_nandina WHERE 1=1";
if( !empty($requestData['columns'][0]['search']['value']) ){
	$sql.=" AND  partida LIKE '%".$requestData['columns'][0]['search']['value']."%' ";    
}
if( !empty($requestData['columns'][1]['search']['value']) ){
	$sql.=" AND  descrip LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
}
if( !empty($requestData['columns'][2]['search']['value']) ){
	$sql.=" AND  adval LIKE '%".$requestData['columns'][2]['search']['value']."%' ";
}
if( !empty($requestData['columns'][3]['search']['value']) ){
	$sql.=" AND  igv LIKE '%".$requestData['columns'][3]['search']['value']."%' ";
}
if( !empty($requestData['columns'][4]['search']['value']) ){
	$sql.=" AND  isc LIKE '%".$requestData['columns'][4]['search']['value']."%' ";
}
if( !empty($requestData['columns'][5]['search']['value']) ){
	$sql.=" AND  seguro LIKE '%".$requestData['columns'][5]['search']['value']."%' ";
}
if( !empty($requestData['columns'][6]['search']['value']) ){
	$sql.=" AND  cuode LIKE '%".$requestData['columns'][6]['search']['value']."%' ";
}
if( !empty($requestData['columns'][7]['search']['value']) ){
	$sql.=" AND  ciiu LIKE '%".$requestData['columns'][7]['search']['value']."%' ";
}
if( !empty($requestData['columns'][8]['search']['value']) ){
	$sql.=" AND  finicio LIKE '%".$requestData['columns'][8]['search']['value']."%' ";
}
if( !empty($requestData['columns'][9]['search']['value']) ){
	$sql.=" AND  ffin LIKE '%".$requestData['columns'][9]['search']['value']."%' ";
}

$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains column index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees1");
	

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["partida"];
	$nestedData[] = $row["descrip"];
	$nestedData[] = $row["adval"];
	$nestedData[] = $row["igv"];
	$nestedData[] = $row["isc"];
	$nestedData[] = $row["seguro"];
	$nestedData[] = $row["cuode"];
	$nestedData[] = $row["ciiu"];
	$nestedData[] = $row["finicio"];
	$nestedData[] = $row["ffin"];
	
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
