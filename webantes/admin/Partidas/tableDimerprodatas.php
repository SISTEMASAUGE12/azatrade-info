<?php
/* Database connection start */

include ("conection/config.php");

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
// datatable column index  => database column name
	0 => 'cnan', 
	1 => 'sest_merca',
	2 => 'ctratfec',
	3 => 'codi_regi',
	4 => 'cprod',
	5 => 'dprod',
	6 => 'dobs',
	7 => 'descripcion',
	8 => 'finicio',
	9 => 'ffin',
	
);



// getting total number records without any search
$sql = "SELECT cnan";
$sql.=" FROM part_dimerpro
LEFT JOIN part_aduana ON part_dimerpro.codi_aduan = part_aduana.codadu";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT part_dimerpro.cnan, 
part_dimerpro.sest_merca, 
part_dimerpro.ctratfec, 
part_dimerpro.codi_regi, 
part_dimerpro.cprod, 
part_dimerpro.dprod, 
part_dimerpro.dobs, 
part_aduana.descripcion, 
DATE_FORMAT(part_dimerpro.finicio, '%d/%m/%Y') as fini, 
DATE_FORMAT(part_dimerpro.ffin, '%d/%m/%Y') as ffin";
$sql.=" FROM part_dimerpro
LEFT JOIN part_aduana ON part_dimerpro.codi_aduan = part_aduana.codadu WHERE 1=1";
if( !empty($requestData['columns'][0]['search']['value']) ){
	$sql.=" AND  part_dimerpro.cnan LIKE '%".$requestData['columns'][0]['search']['value']."%' ";    
}
if( !empty($requestData['columns'][1]['search']['value']) ){
	$sql.=" AND  part_dimerpro.sest_merca LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
}
if( !empty($requestData['columns'][2]['search']['value']) ){
	$sql.=" AND  part_dimerpro.ctratfec LIKE '".$requestData['columns'][2]['search']['value']."%' ";
}
if( !empty($requestData['columns'][3]['search']['value']) ){
	$sql.=" AND  part_dimerpro.codi_regi LIKE '".$requestData['columns'][3]['search']['value']."%' ";
}
if( !empty($requestData['columns'][4]['search']['value']) ){
	$sql.=" AND  part_dimerpro.cprod LIKE '".$requestData['columns'][4]['search']['value']."%' ";
}
if( !empty($requestData['columns'][5]['search']['value']) ){
	$sql.=" AND  part_dimerpro.dprod LIKE '".$requestData['columns'][5]['search']['value']."%' ";
}
if( !empty($requestData['columns'][6]['search']['value']) ){
	$sql.=" AND  part_dimerpro.dobs LIKE '".$requestData['columns'][6]['search']['value']."%' ";
}
if( !empty($requestData['columns'][7]['search']['value']) ){
	$sql.=" AND  part_aduana.descripcion LIKE '".$requestData['columns'][7]['search']['value']."%' ";
}
if( !empty($requestData['columns'][8]['search']['value']) ){
	$sql.=" AND  part_dimerpro.finicio LIKE '".$requestData['columns'][8]['search']['value']."%' ";
}
if( !empty($requestData['columns'][9]['search']['value']) ){
	$sql.=" AND  part_dimerpro.ffin LIKE '".$requestData['columns'][9]['search']['value']."%' ";
}

$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains column index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees1");
	

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["cnan"];
	$nestedData[] = $row["sest_merca"];
	$nestedData[] = $row["ctratfec"];
	$nestedData[] = $row["codi_regi"];
	$nestedData[] = $row["cprod"];
	$nestedData[] = $row["dprod"];
	$nestedData[] = $row["dobs"];
	$nestedData[] = $row["descripcion"];
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
