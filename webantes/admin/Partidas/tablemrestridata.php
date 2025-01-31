<?php
/* Database connection start */

include ("conection/config.php");

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
// datatable column index  => database column name
	0 => 'codi_regi', 
	1 => 'cnan',
	2 => 'fini',
	3 => 'ffin',
	4 => 'desprod',
	5 => 'entidad',
	6 => 'registro',
	7 => 'baseleg',
	8 => 'cprod',
	
);



// getting total number records without any search
$sql = "SELECT codi_regi";
$sql.=" FROM part_mrestri";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT codi_regi, cnan, DATE_FORMAT(fini, '%Y/%m/%d') as fini, DATE_FORMAT(ffin, '%Y/%m/%d') as ffin, desprod, entidad, registro, baseleg, cprod ";
$sql.=" FROM part_mrestri WHERE 1=1";
if( !empty($requestData['columns'][0]['search']['value']) ){
	$sql.=" AND  codi_regi LIKE '".$requestData['columns'][0]['search']['value']."%' ";    
}
if( !empty($requestData['columns'][1]['search']['value']) ){
	$sql.=" AND  cnan LIKE '".$requestData['columns'][1]['search']['value']."%' ";
}
if( !empty($requestData['columns'][2]['search']['value']) ){
	$sql.=" AND  fini LIKE '".$requestData['columns'][2]['search']['value']."%' ";
}
if( !empty($requestData['columns'][3]['search']['value']) ){
	$sql.=" AND  ffin LIKE '".$requestData['columns'][3]['search']['value']."%' ";
}
if( !empty($requestData['columns'][4]['search']['value']) ){
	$sql.=" AND  desprod LIKE '".$requestData['columns'][4]['search']['value']."%' ";
}
if( !empty($requestData['columns'][5]['search']['value']) ){
	$sql.=" AND  entidad LIKE '".$requestData['columns'][5]['search']['value']."%' ";
}
if( !empty($requestData['columns'][6]['search']['value']) ){
	$sql.=" AND  registro LIKE '".$requestData['columns'][6]['search']['value']."%' ";
}
if( !empty($requestData['columns'][7]['search']['value']) ){
	$sql.=" AND  baseleg LIKE '".$requestData['columns'][7]['search']['value']."%' ";
}
if( !empty($requestData['columns'][8]['search']['value']) ){
	$sql.=" AND  cprod LIKE '".$requestData['columns'][8]['search']['value']."%' ";
}

$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains column index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees1");
	

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["codi_regi"];
	$nestedData[] = $row["cnan"];
	$nestedData[] = $row["fini"];
	$nestedData[] = $row["ffin"];
	$nestedData[] = htmlentities($row["desprod"]);
	$nestedData[] = $row["entidad"];
	$nestedData[] = $row["registro"];
	$nestedData[] = $row["baseleg"];
	$nestedData[] = $row["cprod"];
	
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
