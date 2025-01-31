<?php
include ("conection/config.php");

/*$provee = $_POST["provee"];
$contacto = $_POST["conta"];
$correo_web = $_POST["correo"];
$pai = $_POST["pais"];
$money = $_POST["moneda"];
$tipoc = $_POST["tcambio"];
$valor_uit = "";
$tcompra = "";
$ttransp = "";*/




//$ssql = "INSERT INTO cos_expo_producto (nom_prov, nom_cont, correo_web, pais, tipo_cambio, valor_uit, sobre_tasa_adic, rebaja_aranc, tasa_desp, recargo_num, percepcion, moneda, t_compra, t_transporte, fecha_registro, usuario) VALUES ('$provee', '$contacto', '$correo_web', '$pai', '$tipoc', '$valor_uit',  0, 0, 0, 0, 0, '$money', '$tcompra', '$ttransp', now(), '')"; 
//lo inserto en la base de datos 
//if (mysql_query($ssql,$link)){ 
//recibo el último id
   //	$ultimo_idprod = mysql_insert_id($link);
   
   //funcion que genera codigo alternativo automaticamente
function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}
//echo generarCodigo(6);
   	$ultimo_idprod = generarCodigo(6); 
	
	//echo "$ultimo_idprod <br>";
	
$cod_lis = $_POST["idlis_"];
$date_lis = $_POST["fecha"];
$come_lis = $_POST["comen"];
$pun_lis = $_POST["pun"];

	$count = '106';
for($i=0;$i<$count;$i++){ 

		$sql1="INSERT INTO cos_expo_detalista (cod_lis, id_prod, fecha, observa, des_puntaje, valor_puntaje) VALUES ('$cod_lis[$i]', '$ultimo_idprod', '$date_lis[$i]', '$come_lis[$i]', '$pun_lis[$i]', '0' )"; 
		mysql_query($sql1,$link)or die (mysql_error());
}

//update 1
$sql2=("update cos_expo_detalista set valor_puntaje='1' where des_puntaje='SI' and valor_puntaje='0'");
   mysql_query($sql2,$link)or die (mysql_error()); 
   //update 2
   $sql3=("update cos_expo_detalista set valor_puntaje='2' where des_puntaje='NO REQUERIDO' and valor_puntaje='0'");
   mysql_query($sql3,$link)or die (mysql_error()); 

/*}else{
	//echo "Problemas de Inserccion del encabezado";
	echo '<script language="javascript"> alert("Error de Registro !!!. \n Consulte con su Administrador de Sistemas"); </script>'; 
		echo "<SCRIPT LANGUAGE=javascript>
              window.history.go(-1)
              </SCRIPT>";
			  exit;
}	*/

   header("Location: viewlistcheck.php?tif=$ultimo_idprod");
?>

<!-- </body>
</html> -->