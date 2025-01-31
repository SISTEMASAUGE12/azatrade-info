<?php
/* Database connection start */

include ("conection/config.php");

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
// datatable column index  => database column name
	0 => 'cnan', 
	1 => 'pais',
	2 => 'dlib',
	3 => 'tmargen',
	4 => 'tmargen1',
	5 => 'tprod',
	6 => 'vmp',
	7 => 'vhp',
	8 => 'tienecup',
	9 => 'vdes',
	10 => 'observ',
	11=> 'finilib',
	12=> 'ffinlib',
	
);



// getting total number records without any search
$sql = "SELECT cnan";
$sql.=" FROM part_aladlibe
LEFT OUTER JOIN part_tablibe ON part_aladlibe.clib = part_tablibe.clib";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT cnan, pais, CONCAT(part_tablibe.clib,' - ',part_tablibe.dlib) as dlib, tmargen, tmargen1, tprod, vmp, vhp, tienecup, vdes, observ, DATE_FORMAT(finilib, '%Y/%m/%d') as finilib, DATE_FORMAT(ffinlib, '%Y/%m/%d') as ffinlib ";
$sql.=" FROM part_aladlibe
LEFT OUTER JOIN part_tablibe ON part_aladlibe.clib = part_tablibe.clib WHERE 1=1";
if( !empty($requestData['columns'][0]['search']['value']) ){
	$sql.=" AND  cnan LIKE '%".$requestData['columns'][0]['search']['value']."%' ";    
}
if( !empty($requestData['columns'][1]['search']['value']) ){
	$sql.=" AND  pais LIKE '%".$requestData['columns'][1]['search']['value']."%' ";
}
if( !empty($requestData['columns'][2]['search']['value']) ){
	$sql.=" AND  dlib LIKE '%".$requestData['columns'][2]['search']['value']."%' ";
}
if( !empty($requestData['columns'][3]['search']['value']) ){
	$sql.=" AND  tmargen LIKE '%".$requestData['columns'][3]['search']['value']."%' ";
}
if( !empty($requestData['columns'][4]['search']['value']) ){
	$sql.=" AND  tmargen1 LIKE '%".$requestData['columns'][4]['search']['value']."%' ";
}
if( !empty($requestData['columns'][5]['search']['value']) ){
	$sql.=" AND  tprod LIKE '%".$requestData['columns'][5]['search']['value']."%' ";
}
if( !empty($requestData['columns'][6]['search']['value']) ){
	$sql.=" AND  vmp LIKE '%".$requestData['columns'][6]['search']['value']."%' ";
}
if( !empty($requestData['columns'][7]['search']['value']) ){
	$sql.=" AND  vhp LIKE '%".$requestData['columns'][7]['search']['value']."%' ";
}
if( !empty($requestData['columns'][8]['search']['value']) ){
	$sql.=" AND  tienecup LIKE '%".$requestData['columns'][8]['search']['value']."%' ";
}
if( !empty($requestData['columns'][9]['search']['value']) ){
	$sql.=" AND  vdes LIKE '%".$requestData['columns'][9]['search']['value']."%' ";
}
if( !empty($requestData['columns'][10]['search']['value']) ){
	$sql.=" AND  observ LIKE '%".$requestData['columns'][10]['search']['value']."%' ";
}
if( !empty($requestData['columns'][11]['search']['value']) ){
	$sql.=" AND  finilib LIKE '%".$requestData['columns'][11]['search']['value']."%' ";
}
if( !empty($requestData['columns'][12]['search']['value']) ){
	$sql.=" AND  ffinlib LIKE '%".$requestData['columns'][12]['search']['value']."%' ";
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
	$nestedData[] = $row["pais"];
	$nestedData[] = $row["dlib"];
	$nestedData[] = $row["tmargen"];
	$nestedData[] = $row["tmargen1"];
	$nestedData[] = $row["tprod"];
	$nestedData[] = $row["vmp"];
	$nestedData[] = $row["vhp"];
	$nestedData[] = $row["tienecup"];
	$nestedData[] = $row["vdes"];
	$nestedData[] = $row["observ"];
	$nestedData[] = $row["finilib"];
	$nestedData[] = $row["ffinlib"];
	
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
