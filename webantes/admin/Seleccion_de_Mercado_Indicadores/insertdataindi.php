<?
include ("conection/config.php");
 
$namep = $_POST['nomprod'];
$namedp = $_POST['Desprod'];
$namep = $_POST['presprod'];
$namenc = $_POST['nomcomu'];
$nament = $_POST['nomtec'];
$namea = $_POST['aran'];
$named = $_POST['desaran'];
$nameu = $_POST['unidad'];
$names = $_POST['sector'];
//echo "$namep <br>$namedp <br>$namep <br>$namenc <br>$nament <br>$namea <br>$named <br>$nameu <br>$names <br>";

$Sqlprod="insert into merca_temp_prod (nom_p,des_p,pre_p,nomc_p,nomt_p,partida_p,des_ara_p,uni_p,id_sector)  values ('$namep','$namedp','$namep','$namenc','$nament','$namea','$named','$nameu','$names')";
  // mysql_query($Sql,$link); 
  $resultado1=mysql_query($Sqlprod,$link) or die (mysql_error());	
$Ultimo_id = mysql_insert_id ($link);

//inserta pais
$x=$_POST[pa];
foreach ($x as $value){
$value;
//echo "$value <br>";
//echo "<input class='checkbox-inline' type='checkbox' name='casilla[]' value='$value' checked='checked' onblur='habilitaDeshabilita(this)'/> $value";
$Sqlpai="insert into merca_temp_pais (cod_prod,cod_pais) values ('$Ultimo_id','$value')";
$resultado2=mysql_query($Sqlpai,$link) or die (mysql_error());	
 }
 
 //inserta indicador
$xi=$_POST[indica];
foreach ($xi as $value){
$value;
//echo "$value <br>";
//echo "<input class='checkbox-inline' type='checkbox' name='casillax[]' value='$value' checked='checked' onblur='habilitaDeshabilita(this)'/> $value";
 $Sqlindi="insert into merca_temp_indi (cod_prod,cod_indicadores,porcentaje,valor) values ('$Ultimo_id','$value',0,0)";
$resultado3=mysql_query($Sqlindi,$link) or die (mysql_error());	
 }
 
 
 // insertamos paises seleccionados en filas
 
 $sqlinsrtpais="SELECT
temp.id_prod,
tempa.cod_pais,
pa.pais,
temp.nom_p
FROM
merca_temp_prod AS temp
INNER JOIN merca_temp_pais AS tempa ON temp.id_prod = tempa.cod_prod
INNER JOIN merca_pais AS pa ON tempa.cod_pais = pa.cod_pais
WHERE
temp.id_prod = '$Ultimo_id' ORDER BY pa.pais ASC";
$rsnx = mysql_query($sqlinsrtpais);
 if (mysql_num_rows($rsnx) > 0){
	 while($rowxx = mysql_fetch_array($rsnx)){
		 
		 $items=$items+1;
		 $nombrepais = $rowxx["pais"];
		 
		  if($items==1){
	$Sqlinserp1="insert into merca_temp_paisfila (id_prod,pais1,pais2,pais3,pais4,pais5,porcentaje) values ('$Ultimo_id','$nombrepais','','', '','',0)";
	$resultado1A=mysql_query($Sqlinserp1,$link) or die (mysql_error());	
	$Ultimo_idpp = mysql_insert_id ($link);  
		 }
		 
		 
		  if($items==2){
			 /* $Sqlinserp2="insert into merca_temp_paisfila (id_prod,pais1,pais2,pais3,pais4,pais5,porcentaje) values ('$Ultimo_id','','$nombrepais','', '','',0)";
	$resultado1B=mysql_query($Sqlinserp2,$link) or die (mysql_error());*/	  
	
	$Sqlinserp2="update merca_temp_paisfila set pais2='$nombrepais' where id='$Ultimo_idpp'";

$resultado1B=mysql_query($Sqlinserp2,$link) or die (mysql_error());	   
		 }
		 
		 if($items==3){
			  /*$Sqlinserp3="insert into merca_temp_paisfila (id_prod,pais1,pais2,pais3,pais4,pais5,porcentaje) values ('$Ultimo_id','','','$nombrepais', '','',0)";
	$resultado1C=mysql_query($Sqlinserp3,$link) or die (mysql_error());	*/
	
	$Sqlinserp3="update merca_temp_paisfila set pais3='$nombrepais' where id='$Ultimo_idpp'"; 
	$resultado1C=mysql_query($Sqlinserp3,$link) or die (mysql_error());	 
		 }
		 
		 if($items==4){
			  /*$Sqlinserp4="insert into merca_temp_paisfila (id_prod,pais1,pais2,pais3,pais4,pais5,porcentaje) values ('$Ultimo_id','','','', '$nombrepais','',0)";
	$resultado1D=mysql_query($Sqlinserp4,$link) or die (mysql_error());*/
	
	$Sqlinserp4="update merca_temp_paisfila set pais4='$nombrepais' where id='$Ultimo_idpp'"; 
	$resultado1D=mysql_query($Sqlinserp4,$link) or die (mysql_error());
		  
		 }
		 
		 if($items==5){
			 /* $Sqlinserp5="insert into merca_temp_paisfila (id_prod,pais1,pais2,pais3,pais4,pais5,porcentaje) values ('$Ultimo_id','','','', '','$nombrepais',0)";
	$resultado1E=mysql_query($Sqlinserp5,$link) or die (mysql_error());	 */
	
	$Sqlinserp5="update merca_temp_paisfila set pais5='$nombrepais' where id='$Ultimo_idpp'"; 
	$resultado1E=mysql_query($Sqlinserp5,$link) or die (mysql_error());	 
	 
		 }
		 
		 
		 }
		 }

 header("Location: viewreslt.php?prim=$Ultimo_id");



