<?
include ("conection/config.php");
 
/*$namep = $_POST['nomprod'];
$namedp = $_POST['Desprod'];
$namep = $_POST['presprod'];
$namenc = $_POST['nomcomu'];
$nament = $_POST['nomtec'];
$namea = $_POST['aran'];
$named = $_POST['desaran'];
$nameu = $_POST['unidad'];
$names = $_POST['sector'];*/
//echo "$namep <br>$namedp <br>$namep <br>$namenc <br>$nament <br>$namea <br>$named <br>$nameu <br>$names <br>";

$Sqlprod="insert into merca_temp_info (usuario,descri)  values ('','')";
  $resultado1=mysql_query($Sqlprod,$link) or die (mysql_error());	
$Ultimo_id = mysql_insert_id ($link);

//inserta indicador
$xi=$_POST[indica];
foreach ($xi as $value){
$value;
$Sqli="insert into merca_temp_indi2 (codigo,id_indi) values ('$Ultimo_id','$value')";
$resultado4=mysql_query($Sqli,$link) or die (mysql_error());	
 }
 
 //inserta pais
$x1=$_POST[pa];
foreach ($x1 as $value){
$value;
$Sqlp="insert into merca_temp_pais2 (codigo,cod_pai) values ('$Ultimo_id','$value')";
$resultado3=mysql_query($Sqlp,$link) or die (mysql_error());	
 }
 
//inserta año
$x=$_POST[year];
foreach ($x as $value){
$value;
$Sqlye="insert into merca_temp_periodo (codigo,periodo) values ('$Ultimo_id','$value')";
$resultado2=mysql_query($Sqlye,$link) or die (mysql_error());	
 }
 
 
 // insertamos años seleccionados en filas
 
$sqlinsrta="SELECT
p.periodo
FROM
merca_temp_info AS inf
INNER JOIN merca_temp_periodo AS p ON inf.id_inf = p.codigo
WHERE
inf.id_inf = '$Ultimo_id' ORDER BY p.periodo ASC";
$rsnx = mysql_query($sqlinsrta);
 if (mysql_num_rows($rsnx) > 0){
	 while($rowxx = mysql_fetch_array($rsnx)){
		 
		 $items=$items+1;
		 $anayer = $rowxx["periodo"];
		 
		  if($items==1){
	$Sqlinserp1="insert into merca_temp_yearfila (codigo,a1,a2,a3,a4,a5,a6,a7,a8,a9,a10) values ('$Ultimo_id','$anayer','','', '','','','','','','')";
	$resultado1A=mysql_query($Sqlinserp1,$link) or die (mysql_error());	
	$Ultimo_idpp = mysql_insert_id ($link);  
		 }
		 
		  if($items==2){ 
	$Sqlinserp2="update merca_temp_yearfila set a2='$anayer' where idfila='$Ultimo_idpp'";

$resultado1B=mysql_query($Sqlinserp2,$link) or die (mysql_error());	   
		 }
		 
		 if($items==3){
	$Sqlinserp3="update merca_temp_yearfila set a3='$anayer' where idfila='$Ultimo_idpp'"; 
	$resultado1C=mysql_query($Sqlinserp3,$link) or die (mysql_error());	 
		 }
		 
		 if($items==4){
	$Sqlinserp4="update merca_temp_yearfila set a4='$anayer' where idfila='$Ultimo_idpp'"; 
	$resultado1D=mysql_query($Sqlinserp4,$link) or die (mysql_error());
		 }
		 
		 if($items==5){
	$Sqlinserp5="update merca_temp_yearfila set a5='$anayer' where idfila='$Ultimo_idpp'"; 
	$resultado1E=mysql_query($Sqlinserp5,$link) or die (mysql_error());	 
		 }
		 
		 if($items==6){
	$Sqlinserp6="update merca_temp_yearfila set a6='$anayer' where idfila='$Ultimo_idpp'"; 
	$resultado1F=mysql_query($Sqlinserp6,$link) or die (mysql_error());	 
		 }
		 
		 if($items==7){
	$Sqlinserp7="update merca_temp_yearfila set a7='$anayer' where idfila='$Ultimo_idpp'"; 
	$resultado1G=mysql_query($Sqlinserp7,$link) or die (mysql_error());	 
		 }
		 
		 if($items==8){
	$Sqlinserp8="update merca_temp_yearfila set a8='$anayer' where idfila='$Ultimo_idpp'"; 
	$resultado1H=mysql_query($Sqlinserp8,$link) or die (mysql_error());	 
		 }
		 
		 if($items==9){
	$Sqlinserp9="update merca_temp_yearfila set a9='$anayer' where idfila='$Ultimo_idpp'"; 
	$resultado1I=mysql_query($Sqlinserp9,$link) or die (mysql_error());	 
		 }
		 
		 if($items==10){
	$Sqlinserp10="update merca_temp_yearfila set a10='$anayer' where idfila='$Ultimo_idpp'"; 
	$resultado1J=mysql_query($Sqlinserp10,$link) or die (mysql_error());	 
		 }
		 
		 
		 }
		 }
		 
	
	/*$linea = '10';	 
for ( $i=0 ; $i<=$linea; $i++) 
  { 
   $datamerca="insert into merca_temp_datainfo(id_indi, cod_pais, codigo, v1, v1, v2, v3, v4, v5, v6, v7, v8, v9, v10) 
values( '$codtemx', '{$_POST['Pais'][$i]}', '$codixind', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '{$_POST['Valor'][$i]}', 0, 0, 0, 0, 0 )";
   $resultado=mysql_query($datamerca,$link) or die ( mysql_error ());
  
   }*/

 header("Location: infoview.php?data=$Ultimo_id");


