<?php
include ("conection/config.php");

$provee = $_POST["provee"];
$contacto = $_POST["conta"];
$correo_web = $_POST["correo"];
$pai = $_POST["pais"];
$money = $_POST["moneda"];
$tipoc = $_POST["tcambio"];
$valor_uit = $_POST["uit"];
$tcompra = $_POST["tercompra"];
$ttransp = $_POST["ttransporte"];

//primera fila
$par1 = $_POST["partida_1"];
$par1A = $_POST["partida_1A"];
$descri1 = $_POST["descri_1"];
$unidad1 = $_POST["uni_1"];
$preciovlocal1 = $_POST["precioventalocal1"];
$canti1 = $_POST["canti_1"];
$pesouni1 = $_POST["peso_uni_1"];
$pesototal1 = $_POST["peso_tota_kg_1"];
$vfactura1 = $_POST["valorfact_1"];
$tfactura1 = $_POST["total_impo_1"];
$porcencosto1 = $_POST["porc_costo_1"];
//segunda fila
$par2 = $_POST["partida_2"];
$par2A = $_POST["partida_2A"];
$descri2 = $_POST["descri_2"];
$unidad2 = $_POST["uni_2"];
$preciovlocal2 = $_POST["precioventalocal2"];
$canti2 = $_POST["canti_2"];
$pesouni2 = $_POST["peso_uni_2"];
$pesototal2 = $_POST["peso_tota_kg_2"];
$vfactura2 = $_POST["valorfact_2"];
$tfactura2 = $_POST["total_impo_2"];
$porcencosto2 = $_POST["porc_costo_2"];
//tercera fila
$par3 = $_POST["partida_3"];
$par3A = $_POST["partida_3A"];
$descri3 = $_POST["descri_3"];
$unidad3 = $_POST["uni_3"];
$preciovlocal3 = $_POST["precioventalocal3"];
$canti3 = $_POST["canti_3"];
$pesouni3 = $_POST["peso_uni_3"];
$pesototal3 = $_POST["peso_tota_kg_3"];
$vfactura3 = $_POST["valorfact_3"];
$tfactura3 = $_POST["total_impo_3"];
$porcencosto3 = $_POST["porc_costo_3"];
//cuarta fila
$par4 = $_POST["partida_4"];
$par4A = $_POST["partida_4A"];
$descri4 = $_POST["descri_4"];
$unidad4 = $_POST["uni_4"];
$preciovlocal4 = $_POST["precioventalocal4"];
$canti4 = $_POST["canti_4"];
$pesouni4 = $_POST["peso_uni_4"];
$pesototal4 = $_POST["peso_tota_kg_4"];
$vfactura4 = $_POST["valorfact_4"];
$tfactura4 = $_POST["total_impo_4"];
$porcencosto4 = $_POST["porc_costo_4"];
//quinta fila
$par5 = $_POST["partida_5"];
$par5A = $_POST["partida_5A"];
$descri5 = $_POST["descri_5"];
$unidad5 = $_POST["uni_5"];
$preciovlocal5 = $_POST["precioventalocal5"];
$canti5 = $_POST["canti_5"];
$pesouni5 = $_POST["peso_uni_5"];
$pesototal5 = $_POST["peso_tota_kg_5"];
$vfactura5 = $_POST["valorfact_5"];
$tfactura5 = $_POST["total_impo_5"];
$porcencosto5 = $_POST["porc_costo_5"];


//valida campo partida numero 1, si no esta vacia el campo verifica que el numero de partida exista
if($par1!=""){
$sqlpar1="SELECT nan.cnan, nan.vadv, nan.vigv, nan.visc, nan.tderesp, nan.tdl25784, nan.trs015cfds, nan.tseguros, nan.finitas, nan.ffintas, nan.fmod, nan.cdigmod, nan.dbaselegal, nan.vcomm, nan.tnan, nan.vsob, nan.dobs, nan.fingreso, nan.vbas_max FROM part_nandtasa AS nan WHERE nan.cnan = '$par1' ORDER BY nan.finitas DESC LIMIT 1";
$rsnp1 = mysql_query($sqlpar1);
if (mysql_num_rows($rsnp1) > 0){
	while($rowp1 = mysql_fetch_array($rsnp1)){
$partA = $rowp1["cnan"];
//echo "$partA";
	}
	}else{
		echo '<script language="javascript"> alert("Numero de Partida Origen no Existe. \n Ingrese Numero de Partida Correcto. (Fila #1)"); </script>'; 
		echo "<SCRIPT LANGUAGE=javascript>
              window.history.go(-1)
              </SCRIPT>";
			  exit;
	}
}
//valida campo partida numero 2, si no esta vacia el campo verifica que el numero de partida exista
if($par2!=""){
$sqlpar2="SELECT nan.cnan, nan.vadv, nan.vigv, nan.visc, nan.tderesp, nan.tdl25784, nan.trs015cfds, nan.tseguros, nan.finitas, nan.ffintas, nan.fmod, nan.cdigmod, nan.dbaselegal, nan.vcomm, nan.tnan, nan.vsob, nan.dobs, nan.fingreso, nan.vbas_max FROM part_nandtasa AS nan WHERE nan.cnan = '$par2' ORDER BY nan.finitas DESC LIMIT 1";
$rsnp2 = mysql_query($sqlpar2);
if (mysql_num_rows($rsnp2) > 0){
	while($rowp2 = mysql_fetch_array($rsnp2)){
$partB = $rowp2["cnan"];
	}
	}else{

		echo '<script language="javascript"> alert("Numero de Partida Origen no Existe. \n Ingrese Numero de Partida Correcto. (Fila #2)"); </script>'; 
		echo "<SCRIPT LANGUAGE=javascript>
              window.history.go(-1)
              </SCRIPT>";
			  exit;
	}
}

//valida campo partida numero 3, si no esta vacia el campo verifica que el numero de partida exista
if($par3!=""){
$sqlpar3="SELECT nan.cnan, nan.vadv, nan.vigv, nan.visc, nan.tderesp, nan.tdl25784, nan.trs015cfds, nan.tseguros, nan.finitas, nan.ffintas, nan.fmod, nan.cdigmod, nan.dbaselegal, nan.vcomm, nan.tnan, nan.vsob, nan.dobs, nan.fingreso, nan.vbas_max FROM part_nandtasa AS nan WHERE nan.cnan = '$par3' ORDER BY nan.finitas DESC LIMIT 1";
$rsnp3 = mysql_query($sqlpar3);
if (mysql_num_rows($rsnp3) > 0){
	while($rowp3 = mysql_fetch_array($rsnp3)){
$partC = $rowp3["cnan"];
	}
	}else{

		echo '<script language="javascript"> alert("Numero de Partida Origen no Existe. \n Ingrese Numero de Partida Correcto. (Fila #3)"); </script>'; 
		echo "<SCRIPT LANGUAGE=javascript>
              window.history.go(-1)
              </SCRIPT>";
			  exit;
	}
}

//valida campo partida numero 4, si no esta vacia el campo verifica que el numero de partida exista
if($par4!=""){
$sqlpar4="SELECT nan.cnan, nan.vadv, nan.vigv, nan.visc, nan.tderesp, nan.tdl25784, nan.trs015cfds, nan.tseguros, nan.finitas, nan.ffintas, nan.fmod, nan.cdigmod, nan.dbaselegal, nan.vcomm, nan.tnan, nan.vsob, nan.dobs, nan.fingreso, nan.vbas_max FROM part_nandtasa AS nan WHERE nan.cnan = '$par4' ORDER BY nan.finitas DESC LIMIT 1";
$rsnp4 = mysql_query($sqlpar4);
if (mysql_num_rows($rsnp4) > 0){
	while($rowp4 = mysql_fetch_array($rsnp4)){
$partD = $rowp4["cnan"];
	}
	}else{

		echo '<script language="javascript"> alert("Numero de Partida Origen no Existe. \n Ingrese Numero de Partida Correcto. (Fila #4)"); </script>'; 
		echo "<SCRIPT LANGUAGE=javascript>
              window.history.go(-1)
              </SCRIPT>";
			  exit;
	}
}

//valida campo partida numero 5, si no esta vacia el campo verifica que el numero de partida exista
if($par5!=""){
$sqlpar5="SELECT nan.cnan, nan.vadv, nan.vigv, nan.visc, nan.tderesp, nan.tdl25784, nan.trs015cfds, nan.tseguros, nan.finitas, nan.ffintas, nan.fmod, nan.cdigmod, nan.dbaselegal, nan.vcomm, nan.tnan, nan.vsob, nan.dobs, nan.fingreso, nan.vbas_max FROM part_nandtasa AS nan WHERE nan.cnan = '$par5' ORDER BY nan.finitas DESC LIMIT 1";
$rsnp5 = mysql_query($sqlpar5);
if (mysql_num_rows($rsnp5) > 0){
	while($rowp5 = mysql_fetch_array($rsnp5)){
$partF = $rowp5["cnan"];
	}
	}else{

		echo '<script language="javascript"> alert("Numero de Partida Origen no Existe. \n Ingrese Numero de Partida Correcto. (Fila #5)"); </script>'; 
		echo "<SCRIPT LANGUAGE=javascript>
              window.history.go(-1)
              </SCRIPT>";
			  exit;
	}
}

//funcion que genera codigo alternativo automaticamente
/*function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}*/
//echo generarCodigo(6); // genera un código de 6 caracteres de longitud. - See more at: http://www.inkuba.com/blog/generar-codigo-aleatorio-con-php/#sthash.kaRXR052.dpuf

/*$ssql = "INSERT INTO cos_producto (nom_prov, nom_cont, correo_web, pais, tipo_cambio, valor_uit, sobre_tasa_adic, rebaja_aranc, tasa_desp, recargo_num, percepcion, moneda, t_compra, t_transporte, fecha_registro, usuario) VALUES ('".$_POST["provee"]."', 
'".$_POST["conta"]."', 
'".$_POST["correo"]."', 
'".$_POST["pais"]."', 
'".$_POST["tcambio"]."', 
'".$_POST["uit"]."', 
0, 
0,
0, 
0, 
0, 
'".$_POST["moneda"]."', 
'".$_POST["tercompra"]."', 
'".$_POST["ttransporte"]."', 
now(), 
'')"; */
$ssql = "INSERT INTO cos_producto (nom_prov, nom_cont, correo_web, pais, tipo_cambio, valor_uit, sobre_tasa_adic, rebaja_aranc, tasa_desp, recargo_num, percepcion, moneda, t_compra, t_transporte, fecha_registro, usuario) VALUES ('$provee', '$contacto', '$correo_web', '$pai', '$tipoc', '$valor_uit',  0, 0, 0, 0, 0, '$money', '$tcompra', '$ttransp', now(), '')"; 
// mysql_query($ssql,$link) or die (mysql_error()); 
//lo inserto en la base de datos 
if (mysql_query($ssql,$link)){ 
//recibo el último id
   	$ultimo_idprod = mysql_insert_id($link); 
   	//echo $ultimo_idprod; 
	
	// si el campo partida #1 tiene datos inserta
	if($par1!=""){
		$sql1="INSERT INTO cos_prod_detalle (id_prod, partidaA, partidaB, nomproducto, cantidad, unidad_comerc, peso_unidad_kg, peso_total_kg, valor_factura, total_factura, porcent_costo, agrupa_empaque, agrupa_paletiza, agrupa_contenedor, p_venta_local) VALUES ('$ultimo_idprod', '$par1', '$par1A', '$descri1', '$canti1', '$unidad1', '$pesouni1', '$pesototal1', '$vfactura1', '$tfactura1', '$porcencosto1', '', '', '', '$preciovlocal1')"; 
		mysql_query($sql1,$link)or die (mysql_error());
		}
		
	// si el campo partida #2 tiene datos inserta
	if($par2!=""){
		$sql2="INSERT INTO cos_prod_detalle (id_prod, partidaA, partidaB, nomproducto, cantidad, unidad_comerc, peso_unidad_kg, peso_total_kg, valor_factura, total_factura, porcent_costo, agrupa_empaque, agrupa_paletiza, agrupa_contenedor, p_venta_local) VALUES ('$ultimo_idprod', '$par2', '$par2A', '$descri2', '$canti2', '$unidad2', '$pesouni2', '$pesototal2', '$vfactura2', '$tfactura2', '$porcencosto2', '', '', '', '$preciovlocal2')"; 
		mysql_query($sql2,$link)or die (mysql_error());
		}
		
	// si el campo partida #3 tiene datos inserta
	if($par3!=""){
		$sql3="INSERT INTO cos_prod_detalle (id_prod, partidaA, partidaB, nomproducto, cantidad, unidad_comerc, peso_unidad_kg, peso_total_kg, valor_factura, total_factura, porcent_costo, agrupa_empaque, agrupa_paletiza, agrupa_contenedor, p_venta_local) VALUES ('$ultimo_idprod', '$par3', '$par3A', '$descri3', '$canti3', '$unidad3', '$pesouni3', '$pesototal3', '$vfactura3', '$tfactura3', '$porcencosto3', '', '', '', '$preciovlocal3')"; 
		mysql_query($sql3,$link)or die (mysql_error());
		}
		
	// si el campo partida #4 tiene datos inserta
	if($par4!=""){
		$sql4="INSERT INTO cos_prod_detalle (id_prod, partidaA, partidaB, nomproducto, cantidad, unidad_comerc, peso_unidad_kg, peso_total_kg, valor_factura, total_factura, porcent_costo, agrupa_empaque, agrupa_paletiza, agrupa_contenedor, p_venta_local) VALUES ('$ultimo_idprod', '$par4', '$par4A', '$descri4', '$canti4', '$unidad4', '$pesouni4', '$pesototal4', '$vfactura4', '$tfactura4', '$porcencosto4', '', '', '', '$preciovlocal4')"; 
		mysql_query($sql4,$link)or die (mysql_error());
		}
		
	// si el campo partida #5 tiene datos inserta
	if($par5!=""){
		$sql5="INSERT INTO cos_prod_detalle (id_prod, partidaA, partidaB, nomproducto, cantidad, unidad_comerc, peso_unidad_kg, peso_total_kg, valor_factura, total_factura, porcent_costo, agrupa_empaque, agrupa_paletiza, agrupa_contenedor, p_venta_local) VALUES ('$ultimo_idprod', '$par5', '$par5A', '$descri5', '$canti5', '$unidad5', '$pesouni5', '$pesototal5', '$vfactura5', '$tfactura5', '$porcencosto5', '', '', '', '$preciovlocal4')"; 
		mysql_query($sql5,$link)or die (mysql_error());
		}
		

//header("Location: uniones.php?tif=$ultimo_idprod");


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