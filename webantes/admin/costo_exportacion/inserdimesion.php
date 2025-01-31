<?php
include ("conection/config.php");

$codigo = $_POST["idprodu"];

$itemsempaque1 = $_POST["item1"];
$itemsempaque2 = $_POST["item2"];
$itemsempaque3 = $_POST["item3"];
$itemsempaque4 = $_POST["item4"];
$itemsempaque5 = $_POST["item5"];

/*eliminamos registro existente*/
$rsd=("delete from cos_expo_empaque where id_prod_em='$codigo'");
   mysql_query($rsd,$link); 


/*inserta registro en tabla empaque*/

if($itemsempaque1=='1'){
$nomprodu1 = $_POST["nompro1"];
$empaque1 = $_POST["t_empaque1"];
$cantipaque1 = $_POST["cantiempa1"]; /*cantidad*/
$dancho1 = $_POST["dimancho1"];
$dlargo1 = $_POST["dimlargo1"];
$dalto1 = $_POST["dimalto1"];
$unid_vol1 = $_POST["totavoluni1"]; /*unida volumen*/
$vol_unid1 = $_POST["voluni1"];
$costo_emp1 = $_POST["cempaque1"];/*precio empaque*/
$tot_costo_emp1 = $_POST["totcempaque1"];
$costo_emba1 = $_POST["cembalaje1"];/*precio embalaje*/
$tot_costo_emba1 = $_POST["totcembalaje1"];
$peso_emba1 = $_POST["pemabalaje1"];/*peso unitario*/
$tot_peso_emba1 = $_POST["totpesoemabalaje1"];

$Sqlinsert1="insert into cos_expo_empaque (id_prod_em, producto_em, unid_em, cantidad_em, dim_ancho_em, dim_largo_em, dim_alto_em, unid_volum_em, vol_unid_em, precio_empaque, costo_empaque, precio_embalaje, costo_embalaje, kilo_embalaje, peso_embalaje)  values ('$codigo', '$nomprodu1', '$empaque1', '$cantipaque1', '$dancho1', '$dlargo1', '$dalto1', '$unid_vol1', '$vol_unid1', '$costo_emp1', '$tot_costo_emp1', '$costo_emba1', '$tot_costo_emba1', '$peso_emba1', '$tot_peso_emba1' )";
   mysql_query($Sqlinsert1,$link) or die (mysql_error());
}

if($itemsempaque2=='2'){
$nomprodu2 = $_POST["nompro2"];
$empaque2 = $_POST["t_empaque2"];
$cantipaque2 = $_POST["cantiempa2"]; /*cantidad*/
$dancho2 = $_POST["dimancho2"];
$dlargo2 = $_POST["dimlargo2"];
$dalto2 = $_POST["dimalto2"];
$unid_vol2 = $_POST["totavoluni2"]; /*unida volumen*/
$vol_unid2 = $_POST["voluni2"];
$costo_emp2 = $_POST["cempaque2"];/*precio empaque*/
$tot_costo_emp2 = $_POST["totcempaque2"];
$costo_emba2 = $_POST["cembalaje2"];/*precio embalaje*/
$tot_costo_emba2 = $_POST["totcembalaje2"];
$peso_emba2 = $_POST["pemabalaje2"];/*peso unitario*/
$tot_peso_emba2 = $_POST["totpesoemabalaje2"];

$Sqlinsert2="insert into cos_expo_empaque (id_prod_em, producto_em, unid_em, cantidad_em, dim_ancho_em, dim_largo_em, dim_alto_em, unid_volum_em, vol_unid_em, precio_empaque, costo_empaque, precio_embalaje, costo_embalaje, kilo_embalaje, peso_embalaje)  values ('$codigo', '$nomprodu2', '$empaque2', '$cantipaque2', '$dancho2', '$dlargo2', '$dalto2', '$unid_vol2', '$vol_unid2', '$costo_emp2', '$tot_costo_emp2', '$costo_emba2', '$tot_costo_emba2', '$peso_emba2', '$tot_peso_emba2' )";
   mysql_query($Sqlinsert2,$link) or die (mysql_error());

}

if($itemsempaque3=='3'){
$nomprodu3 = $_POST["nompro3"];
$empaque3 = $_POST["t_empaque3"];
$cantipaque3 = $_POST["cantiempa3"]; /*cantidad*/
$dancho3 = $_POST["dimancho3"];
$dlargo3 = $_POST["dimlargo3"];
$dalto3 = $_POST["dimalto3"];
$unid_vol3 = $_POST["totavoluni3"]; /*unida volumen*/
$vol_unid3 = $_POST["voluni3"];
$costo_emp3 = $_POST["cempaque3"];/*precio empaque*/
$tot_costo_emp3 = $_POST["totcempaque3"];
$costo_emba3 = $_POST["cembalaje3"];/*precio embalaje*/
$tot_costo_emba3 = $_POST["totcembalaje3"];
$peso_emba3 = $_POST["pemabalaje3"];/*peso unitario*/
$tot_peso_emba3 = $_POST["totpesoemabalaje3"];

$Sqlinsert3="insert into cos_expo_empaque (id_prod_em, producto_em, unid_em, cantidad_em, dim_ancho_em, dim_largo_em, dim_alto_em, unid_volum_em, vol_unid_em, precio_empaque, costo_empaque, precio_embalaje, costo_embalaje, kilo_embalaje, peso_embalaje)  values ('$codigo', '$nomprodu3', '$empaque3', '$cantipaque3', '$dancho3', '$dlargo3', '$dalto3', '$unid_vol3', '$vol_unid3', '$costo_emp3', '$tot_costo_emp3', '$costo_emba3', '$tot_costo_emba3', '$peso_emba3', '$tot_peso_emba3' )";
   mysql_query($Sqlinsert3,$link) or die (mysql_error());

}

if($itemsempaque4=='4'){
$nomprodu4 = $_POST["nompro4"];
$empaque4 = $_POST["t_empaque4"];
$cantipaque4 = $_POST["cantiempa4"]; /*cantidad*/
$dancho4 = $_POST["dimancho4"];
$dlargo4 = $_POST["dimlargo4"];
$dalto4 = $_POST["dimalto4"];
$unid_vol4 = $_POST["totavoluni4"]; /*unida volumen*/
$vol_unid4 = $_POST["voluni4"];
$costo_emp4 = $_POST["cempaque4"];/*precio empaque*/
$tot_costo_emp4 = $_POST["totcempaque4"];
$costo_emba4 = $_POST["cembalaje4"];/*precio embalaje*/
$tot_costo_emba4 = $_POST["totcembalaje4"];
$peso_emba4 = $_POST["pemabalaje4"];/*peso unitario*/
$tot_peso_emba4 = $_POST["totpesoemabalaje4"];

$Sqlinsert4="insert into cos_expo_empaque (id_prod_em, producto_em, unid_em, cantidad_em, dim_ancho_em, dim_largo_em, dim_alto_em, unid_volum_em, vol_unid_em, precio_empaque, costo_empaque, precio_embalaje, costo_embalaje, kilo_embalaje, peso_embalaje)  values ('$codigo', '$nomprodu4', '$empaque4', '$cantipaque4', '$dancho4', '$dlargo4', '$dalto4', '$unid_vol4', '$vol_unid4', '$costo_emp4', '$tot_costo_emp4', '$costo_emba4', '$tot_costo_emba4', '$peso_emba4', '$tot_peso_emba4' )";
   mysql_query($Sqlinsert4,$link) or die (mysql_error());

}

if($itemsempaque5=='5'){
$nomprodu5 = $_POST["nompro5"];
$empaque5 = $_POST["t_empaque5"];
$cantipaque5 = $_POST["cantiempa5"]; /*cantidad*/
$dancho5 = $_POST["dimancho5"];
$dlargo5 = $_POST["dimlargo5"];
$dalto5 = $_POST["dimalto5"];
$unid_vol5 = $_POST["totavoluni5"]; /*unida volumen*/
$vol_unid5 = $_POST["voluni5"];
$costo_emp5 = $_POST["cempaque5"];/*precio empaque*/
$tot_costo_emp5 = $_POST["totcempaque5"];
$costo_emba5 = $_POST["cembalaje5"];/*precio embalaje*/
$tot_costo_emba5 = $_POST["totcembalaje5"];
$peso_emba5 = $_POST["pemabalaje5"];/*peso unitario*/
$tot_peso_emba5 = $_POST["totpesoemabalaje5"];

$Sqlinsert5="insert into cos_expo_empaque (id_prod_em, producto_em, unid_em, cantidad_em, dim_ancho_em, dim_largo_em, dim_alto_em, unid_volum_em, vol_unid_em, precio_empaque, costo_empaque, precio_embalaje, costo_embalaje, kilo_embalaje, peso_embalaje)  values ('$codigo', '$nomprodu5', '$empaque5', '$cantipaque5', '$dancho5', '$dlargo5', '$dalto5', '$unid_vol5', '$vol_unid5', '$costo_emp5', '$tot_costo_emp5', '$costo_emba5', '$tot_costo_emba5', '$peso_emba5', '$tot_peso_emba5' )";
   mysql_query($Sqlinsert5,$link) or die (mysql_error());

}

header("Location: expolistapaletiza.php?pal=$codigo");

?>