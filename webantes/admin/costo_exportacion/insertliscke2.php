<?php
include ("conection/config.php");

$provee = $_POST["provee"];
$contacto = $_POST["conta"];
$correo_web = $_POST["correo"];
$pai = $_POST["pais"];
$money = $_POST["moneda"];
$tipoc = $_POST["tcambio"];
$valor_uit = "";
$tcompra = "";
$ttransp = "";

//LISTA 1
$cod_lis1 = $_POST["idlis_1"];
$date_lis1 = $_POST["date1"];
$come_lis1 = $_POST["comen1"];
$pun_lis1 = $_POST["pun1"];
if($pun_lis1=='SI'){
	$cant_pun1='1';
}else if($pun_lis1=='NO'){
	$cant_pun1='0';
}else{
	$cant_pun1='2';
}
//LISTA 3
$cod_lis3 = $_POST["idlis_3"];
$date_lis3 = $_POST["date3"];
$come_lis3 = $_POST["comen3"];
$pun_lis3 = $_POST["pun3"];
if($pun_lis3=='SI'){
	$cant_pun3='1';
}else if($pun_lis3=='NO'){
	$cant_pun3='0';
}else{
	$cant_pun3='2';
}
//LISTA 4
$cod_lis4 = $_POST["idlis_4"];
$date_lis4 = $_POST["date4"];
$come_lis4 = $_POST["comen4"];
$pun_lis4 = $_POST["pun4"];
if($pun_lis4=='SI'){
	$cant_pun4='1';
}else if($pun_lis4=='NO'){
	$cant_pun4='0';
}else{
	$cant_pun4='2';
}
//LISTA 6
$cod_lis6 = $_POST["idlis_6"];
$date_lis6 = $_POST["date6"];
$come_lis6 = $_POST["comen6"];
$pun_lis6 = $_POST["pun6"];
if($pun_lis6=='SI'){
	$cant_pun6='1';
}else if($pun_lis6=='NO'){
	$cant_pun6='0';
}else{
	$cant_pun6='2';
}
//LISTA 7
$cod_lis7 = $_POST["idlis_7"];
$date_lis7 = $_POST["date7"];
$come_lis7 = $_POST["comen7"];
$pun_lis7 = $_POST["pun7"];
if($pun_lis7=='SI'){
	$cant_pun7='1';
}else if($pun_lis7=='NO'){
	$cant_pun7='0';
}else{
	$cant_pun7='2';
}
//LISTA 8
$cod_lis8 = $_POST["idlis_8"];
$date_lis8 = $_POST["date8"];
$come_lis8 = $_POST["comen8"];
$pun_lis8 = $_POST["pun8"];
if($pun_lis8=='SI'){
	$cant_pun8='1';
}else if($pun_lis8=='NO'){
	$cant_pun8='0';
}else{
	$cant_pun8='2';
}
//LISTA 9
$cod_lis9 = $_POST["idlis_9"];
$date_lis9 = $_POST["date9"];
$come_lis9 = $_POST["comen9"];
$pun_lis9 = $_POST["pun9"];
if($pun_lis9=='SI'){
	$cant_pun9='1';
}else if($pun_lis9=='NO'){
	$cant_pun9='0';
}else{
	$cant_pun9='2';
}
//LISTA 10
$cod_lis10 = $_POST["idlis_10"];
$date_lis10 = $_POST["date10"];
$come_lis10 = $_POST["comen10"];
$pun_lis10 = $_POST["pun10"];
if($pun_lis10=='SI'){
	$cant_pun10='1';
}else if($pun_lis10=='NO'){
	$cant_pun10='0';
}else{
	$cant_pun10='2';
}
//LISTA 11
$cod_lis11 = $_POST["idlis_11"];
$date_lis11 = $_POST["date11"];
$come_lis11 = $_POST["comen11"];
$pun_lis11 = $_POST["pun11"];
if($pun_lis11=='SI'){
	$cant_pun1='1';
}else if($pun_lis11=='NO'){
	$cant_pun11='0';
}else{
	$cant_pun11='2';
}
//LISTA 13
$cod_lis13 = $_POST["idlis_13"];
$date_lis13 = $_POST["date13"];
$come_lis13 = $_POST["comen13"];
$pun_lis13 = $_POST["pun13"];
if($pun_lis13=='SI'){
	$cant_pun13='1';
}else if($pun_lis13=='NO'){
	$cant_pun13='0';
}else{
	$cant_pun13='2';
}
//LISTA 14
$cod_lis14 = $_POST["idlis_14"];
$date_lis14 = $_POST["date14"];
$come_lis14 = $_POST["comen14"];
$pun_lis14 = $_POST["pun14"];
if($pun_lis14=='SI'){
	$cant_pun14='1';
}else if($pun_lis14=='NO'){
	$cant_pun14='0';
}else{
	$cant_pun14='2';
}
//LISTA 15
$cod_lis15 = $_POST["idlis_15"];
$date_lis15 = $_POST["date15"];
$come_lis15 = $_POST["comen15"];
$pun_lis15 = $_POST["pun15"];
if($pun_lis15=='SI'){
	$cant_pun15='1';
}else if($pun_lis15=='NO'){
	$cant_pun15='0';
}else{
	$cant_pun15='2';
}
//LISTA 16
$cod_lis16 = $_POST["idlis_16"];
$date_lis16 = $_POST["date16"];
$come_lis16 = $_POST["comen16"];
$pun_lis16 = $_POST["pun16"];
if($pun_lis16=='SI'){
	$cant_pun16='1';
}else if($pun_lis16=='NO'){
	$cant_pun16='0';
}else{
	$cant_pun16='2';
}
//LISTA 17
$cod_lis17 = $_POST["idlis_17"];
$date_lis17 = $_POST["date17"];
$come_lis17 = $_POST["comen17"];
$pun_lis17 = $_POST["pun17"];
if($pun_lis17=='SI'){
	$cant_pun17='1';
}else if($pun_lis17=='NO'){
	$cant_pun17='0';
}else{
	$cant_pun17='2';
}
//LISTA 18
$cod_lis18 = $_POST["idlis_18"];
$date_lis18 = $_POST["date18"];
$come_lis18 = $_POST["comen18"];
$pun_lis18 = $_POST["pun18"];
if($pun_lis18=='SI'){
	$cant_pun18='1';
}else if($pun_lis18=='NO'){
	$cant_pun18='0';
}else{
	$cant_pun18='2';
}
//LISTA 20
$cod_lis20 = $_POST["idlis_20"];
$date_lis20 = $_POST["date20"];
$come_lis20 = $_POST["comen20"];
$pun_lis20 = $_POST["pun20"];
if($pun_lis20=='SI'){
	$cant_pun20='1';
}else if($pun_lis20=='NO'){
	$cant_pun20='0';
}else{
	$cant_pun20='2';
}
//LISTA 21
$cod_lis21 = $_POST["idlis_21"];
$date_lis21 = $_POST["date21"];
$come_lis21 = $_POST["comen21"];
$pun_lis21 = $_POST["pun21"];
if($pun_lis21=='SI'){
	$cant_pun21='1';
}else if($pun_lis21=='NO'){
	$cant_pun21='0';
}else{
	$cant_pun21='2';
}
//LISTA 22
$cod_lis22 = $_POST["idlis_22"];
$date_lis22 = $_POST["date22"];
$come_lis22 = $_POST["comen22"];
$pun_lis22 = $_POST["pun22"];
if($pun_lis22=='SI'){
	$cant_pun22='1';
}else if($pun_lis22=='NO'){
	$cant_pun22='0';
}else{
	$cant_pun22='2';
}
//LISTA 23
$cod_lis23 = $_POST["idlis_23"];
$date_lis23 = $_POST["date23"];
$come_lis23 = $_POST["comen23"];
$pun_lis23 = $_POST["pun23"];
if($pun_lis23=='SI'){
	$cant_pun23='1';
}else if($pun_lis23=='NO'){
	$cant_pun23='0';
}else{
	$cant_pun23='2';
}

//LISTA 24
$cod_lis24 = $_POST["idlis_24"];
$date_lis24 = $_POST["date24"];
$come_lis24 = $_POST["comen24"];
$pun_lis24 = $_POST["pun24"];
if($pun_lis24=='SI'){
	$cant_pun24='1';
}else if($pun_lis24=='NO'){
	$cant_pun24='0';
}else{
	$cant_pun24='2';
}
//LISTA 25
$cod_lis25 = $_POST["idlis_25"];
$date_lis25 = $_POST["date25"];
$come_lis25 = $_POST["comen25"];
$pun_lis25 = $_POST["pun25"];
if($pun_lis25=='SI'){
	$cant_pun25='1';
}else if($pun_lis25=='NO'){
	$cant_pun25='0';
}else{
	$cant_pun25='2';
}
//LISTA 26
$cod_lis26 = $_POST["idlis_26"];
$date_lis26 = $_POST["date26"];
$come_lis26 = $_POST["comen26"];
$pun_lis26 = $_POST["pun26"];
if($pun_lis26=='SI'){
	$cant_pun26='1';
}else if($pun_lis26=='NO'){
	$cant_pun26='0';
}else{
	$cant_pun26='2';
}
//LISTA 27
$cod_lis27 = $_POST["idlis_27"];
$date_lis27 = $_POST["date27"];
$come_lis27 = $_POST["comen27"];
$pun_lis27 = $_POST["pun27"];
if($pun_lis27=='SI'){
	$cant_pun27='1';
}else if($pun_lis27=='NO'){
	$cant_pun27='0';
}else{
	$cant_pun27='2';
}
//LISTA 28
$cod_lis28 = $_POST["idlis_28"];
$date_lis28 = $_POST["date28"];
$come_lis28 = $_POST["comen28"];
$pun_lis28 = $_POST["pun28"];
if($pun_lis28=='SI'){
	$cant_pun28='1';
}else if($pun_lis28=='NO'){
	$cant_pun28='0';
}else{
	$cant_pun28='2';
}
//LISTA 29
$cod_lis29 = $_POST["idlis_29"];
$date_lis29 = $_POST["date29"];
$come_lis29 = $_POST["comen29"];
$pun_lis29 = $_POST["pun29"];
if($pun_lis29=='SI'){
	$cant_pun29='1';
}else if($pun_lis29=='NO'){
	$cant_pun29='0';
}else{
	$cant_pun29='2';
}
//LISTA 30
$cod_lis30 = $_POST["idlis_30"];
$date_lis30 = $_POST["date30"];
$come_lis30 = $_POST["comen30"];
$pun_lis30 = $_POST["pun30"];
if($pun_lis30=='SI'){
	$cant_pun30='1';
}else if($pun_lis30=='NO'){
	$cant_pun30='0';
}else{
	$cant_pun30='2';
}
//LISTA 31
$cod_lis31 = $_POST["idlis_31"];
$date_lis31 = $_POST["date31"];
$come_lis31 = $_POST["comen31"];
$pun_lis31 = $_POST["pun31"];
if($pun_lis31=='SI'){
	$cant_pun31='1';
}else if($pun_lis31=='NO'){
	$cant_pun31='0';
}else{
	$cant_pun31='2';
}
//LISTA 32
$cod_lis32 = $_POST["idlis_32"];
$date_lis32 = $_POST["date32"];
$come_lis32 = $_POST["comen32"];
$pun_lis32 = $_POST["pun32"];
if($pun_lis32=='SI'){
	$cant_pun32='1';
}else if($pun_lis32=='NO'){
	$cant_pun32='0';
}else{
	$cant_pun32='2';
}
//LISTA 33
$cod_lis33 = $_POST["idlis_33"];
$date_lis33 = $_POST["date33"];
$come_lis33 = $_POST["comen33"];
$pun_lis33 = $_POST["pun33"];
if($pun_lis33=='SI'){
	$cant_pun33='1';
}else if($pun_lis33=='NO'){
	$cant_pun33='0';
}else{
	$cant_pun33='2';
}
//LISTA 34
$cod_lis34 = $_POST["idlis_34"];
$date_lis34 = $_POST["date34"];
$come_lis34 = $_POST["comen34"];
$pun_lis34 = $_POST["pun34"];
if($pun_lis34=='SI'){
	$cant_pun34='1';
}else if($pun_lis34=='NO'){
	$cant_pun34='0';
}else{
	$cant_pun34='2';
}
//LISTA 35
$cod_lis35 = $_POST["idlis_35"];
$date_lis35 = $_POST["date35"];
$come_lis35 = $_POST["comen35"];
$pun_lis35 = $_POST["pun35"];
if($pun_lis35=='SI'){
	$cant_pun35='1';
}else if($pun_lis35=='NO'){
	$cant_pun35='0';
}else{
	$cant_pun35='2';
}
//LISTA 36
$cod_lis36 = $_POST["idlis_36"];
$date_lis36 = $_POST["date36"];
$come_lis36 = $_POST["comen36"];
$pun_lis36 = $_POST["pun36"];
if($pun_lis36=='SI'){
	$cant_pun36='1';
}else if($pun_lis36=='NO'){
	$cant_pun36='0';
}else{
	$cant_pun36='2';
}
//LISTA 37
$cod_lis37 = $_POST["idlis_37"];
$date_lis37 = $_POST["date37"];
$come_lis37 = $_POST["comen37"];
$pun_lis37 = $_POST["pun37"];
if($pun_lis37=='SI'){
	$cant_pun37='1';
}else if($pun_lis37=='NO'){
	$cant_pun37='0';
}else{
	$cant_pun37='2';
}


$ssql = "INSERT INTO cos_expo_producto (nom_prov, nom_cont, correo_web, pais, tipo_cambio, valor_uit, sobre_tasa_adic, rebaja_aranc, tasa_desp, recargo_num, percepcion, moneda, t_compra, t_transporte, fecha_registro, usuario) VALUES ('$provee', '$contacto', '$correo_web', '$pai', '$tipoc', '$valor_uit',  0, 0, 0, 0, 0, '$money', '$tcompra', '$ttransp', now(), '')"; 
// mysql_query($ssql,$link) or die (mysql_error()); 
//lo inserto en la base de datos 
if (mysql_query($ssql,$link)){ 
//recibo el último id
   	$ultimo_idprod = mysql_insert_id($link); 
   	//echo $ultimo_idprod; 
	
	

		$sql1="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis1', '$ultimo_idprod', '$date_lis1', '$come_lis1', '$pun_lis1', '$cant_pun1' )"; 
		mysql_query($sql1,$link)or die (mysql_error());
		
		$sql3="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis3', '$ultimo_idprod', '$date_lis3', '$come_lis3', '$pun_lis3', '$cant_pun3' )"; 
		mysql_query($sql3,$link)or die (mysql_error());
		
		$sql4="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis4', '$ultimo_idprod', '$date_lis4', '$come_lis4', '$pun_lis4', '$cant_pun4' )"; 
		mysql_query($sql4,$link)or die (mysql_error());
		
		$sql6="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis6', '$ultimo_idprod', '$date_lis6', '$come_lis6', '$pun_lis6', '$cant_pun6' )"; 
		mysql_query($sql6,$link)or die (mysql_error());
		
		$sql7="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis7', '$ultimo_idprod', '$date_lis7', '$come_lis7', '$pun_lis7', '$cant_pun7' )"; 
		mysql_query($sql7,$link)or die (mysql_error());
		
		$sql8="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis8', '$ultimo_idprod', '$date_lis8', '$come_lis8', '$pun_lis8', '$cant_pun8' )"; 
		mysql_query($sql8,$link)or die (mysql_error());
		
		$sql9="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis9', '$ultimo_idprod', '$date_lis9', '$come_lis9', '$pun_lis9', '$cant_pun9' )"; 
		mysql_query($sql9,$link)or die (mysql_error());
		
		$sql10="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis10', '$ultimo_idprod', '$date_lis10', '$come_lis10', '$pun_lis10', '$cant_pun10' )"; 
		mysql_query($sql10,$link)or die (mysql_error());
		
		$sql11="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis11', '$ultimo_idprod', '$date_lis11', '$come_lis11', '$pun_lis11', '$cant_pun11' )"; 
		mysql_query($sql11,$link)or die (mysql_error());
		
		$sql12="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis12', '$ultimo_idprod', '$date_lis12', '$come_lis12', '$pun_lis12', '$cant_pun12' )"; 
		mysql_query($sql12,$link)or die (mysql_error());
		
		$sql13="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis13', '$ultimo_idprod', '$date_lis13', '$come_lis13', '$pun_lis13', '$cant_pun13' )"; 
		mysql_query($sql13,$link)or die (mysql_error());
		
		$sql14="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis14', '$ultimo_idprod', '$date_lis14', '$come_lis14', '$pun_lis14', '$cant_pun14' )"; 
		mysql_query($sql14,$link)or die (mysql_error());
		
		$sql15="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis15', '$ultimo_idprod', '$date_lis15', '$come_lis15', '$pun_lis15', '$cant_pun15' )"; 
		mysql_query($sql15,$link)or die (mysql_error());
		
		$sql16="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis16', '$ultimo_idprod', '$date_lis16', '$come_lis16', '$pun_lis16', '$cant_pun16' )"; 
		mysql_query($sql16,$link)or die (mysql_error());
		
		$sql17="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis17', '$ultimo_idprod', '$date_lis17', '$come_lis17', '$pun_lis17', '$cant_pun17' )"; 
		mysql_query($sql17,$link)or die (mysql_error());
		
		$sql18="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis18', '$ultimo_idprod', '$date_lis18', '$come_lis18', '$pun_lis18', '$cant_pun18' )"; 
		mysql_query($sql18,$link)or die (mysql_error());
		
		$sql20="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis20', '$ultimo_idprod', '$date_lis20', '$come_lis20', '$pun_lis20', '$cant_pun20' )"; 
		mysql_query($sql20,$link)or die (mysql_error());

		

}else{
	//echo "Problemas de Inserccion del encabezado";
	echo '<script language="javascript"> alert("Error de Registro !!!. \n Consulte con su Administrador de Sistemas"); </script>'; 
		echo "<SCRIPT LANGUAGE=javascript>
              window.history.go(-1)
              </SCRIPT>";
			  exit;
}	

    header("Location: uniones.php?tif=$ultimo_idprod");
?>

<!-- </body>
</html> -->