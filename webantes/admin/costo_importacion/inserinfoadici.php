<?php
include ("conection/config.php");

$codigo = $_POST["codip"];

$direcc_fabrica = $_POST["direfabri"]; //direccion de fabrica
$direcc_preemba = $_POST["direalmapre"]; //DIRECCIÓN ALMACÉN PREEMBARQUE
$p_origen = $_POST["puertoo"]; //PUERTO ORIGEN
$origen_cargue = $_POST["origenca"]; //ORIGEN: / PAÍS - PUNTO DE CARGUE  
$destino_entrega = $_POST["destinodes"]; //DESTINO / PAÍS - PUNTO DE DESEMBARQUE - ENTREGA
$p_destino = $_POST["pdestino"]; //PUERTO DESTINO
$direcc_entrega = $_POST["direalmaent"]; //DIRECCIÓN ALMACÉN DE ENTREGA
$peso_total = $_POST["pesoto"]; //PESO TOTAL KG/TON
$unidad_comer = $_POST["unidcomer"]; //UNIDADES COMERCIALES 
$volumen_total = $_POST["voltoemba"]; //VOLUMEN TOTAL EMBARQUE CM3 - M3

/*elimina registro existente*/
$rso=("delete from cos_otrodatos where id_prod='$codigo'");
   mysql_query($rso,$link); 


/*inserta registro en tabla*/

$Sqlinserto="insert into cos_otrodatos (id_prod, direfab, direalmpreemb, puerto_orig, punto_cargue, punto_desemb, puerto_dest, direc_alma_ent, peso_tot, unid_comer, volumen_tot, pais_expo, costo_directo, mani_expor, documen, transpo, almac_inter, mani_preemb, mani_emb, seguro, bancario, agente, adminis, capital_inven, fob, flete, tipo_seguro, prima_neta, deducible, derecho_emision, empresa_aseguradora, seguro_tabla, gasto_hand, gasto_traccion, gasto_movicarga, gasto_descarga, gasto_precinto, gasto_almacenaje, gasto_serv_adminis, gasto_serv_clien, gasto_condu, gasto_otrogasto, gasto_cargador, gasto_opera, gasto_comi_1, gasto_comi_2, gasto_admini_financ, emision_credito_financ, comi_financ, letras_financ, tasa_mens_financ, utili_marge, marge_minorista)  values ('$codigo', '$direcc_fabrica', '$direcc_preemba', '$p_origen', '$origen_cargue', '$destino_entrega', '$p_destino', '$direcc_entrega', '$peso_total', '$unidad_comer', '$volumen_total', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')";
   mysql_query($Sqlinserto,$link) or die (mysql_error());
   $ultimo_id_otro = mysql_insert_id($link); 
   
   
   /*verificamos si el registro fue tipo de compra EXWORK*/
   $sqlwork="SELECT cos_producto.id_prod, cos_producto.t_compra FROM cos_producto WHERE cos_producto.id_prod = '$codigo' AND cos_producto.t_compra = 'Exwork'";
   $rsnw = mysql_query($sqlwork);
if (mysql_num_rows($rsnw) > 0){
	while($roww = mysql_fetch_array($rsnw)){
		$EXWORK_t = $roww["t_compra"];
	}
	}else{
		$EXWORK_t = ""; // no tiene datos
	}

//if($EXWORK_t!=''){
header("Location: listaexwork.php?fob=$codigo&dato=$ultimo_id_otro&work=$EXWORK_t");
//}else{
//header("Location: listaexwork2.php?fob=$codigo&dato=$ultimo_id_otro");
//}

?>