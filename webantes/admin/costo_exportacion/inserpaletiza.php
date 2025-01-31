<?php
include ("conection/config.php");

$codigo = $_POST["idproduc"];

$itemspale1 = $_POST["item1s"];
$itemspale2 = $_POST["item2s"];
$itemspale3 = $_POST["item3s"];
$itemspale4 = $_POST["item4s"];
$itemspale5 = $_POST["item5s"];

/*eliminamos registro existente*/
$rsd=("delete from cos_expo_paletizacion where id_prod_pale='$codigo'");
   mysql_query($rsd,$link); 
   

if($itemspale1=='1'){
$nomprodu1 = $_POST["nomprod1"];
$carga1 = $_POST["uni_carga1"];
$canti1 = $_POST["cantipal1"];/**cantidad*/
$dancho1 = $_POST["dimanchopal1"];
$dlargo1 = $_POST["dimlargopal1"];
$dalto1 = $_POST["dimaltopal1"];
$vol_unid1 = $_POST["volunipal1"];
$totavol_unid1 = $_POST["totavolunipal1"];/*total volumen*/
$costo_pale1 = $_POST["costounipal1"];
$totacosto_pale1 = $_POST["totacostounipal1"];/*total costo*/
$peso_pale1 = $_POST["pesopal1"];
$totapeso_pale1 = $_POST["totapesopal1"];/*total peso*/

$Sqlinsert1="insert into cos_expo_paletizacion (id_prod_pale, producto_pale, unid_carga_pale, cantidad_pale, dim_ancho_pale, dim_largo_pale, dim_alto_pale, vol_unid_pale, tota_volum_pale, costo_unita_pale, tota_unita_pale, peso_pale, tota_peso_pale)  values ('$codigo', '$nomprodu1', '$carga1', '$canti1', '$dancho1', '$dlargo1', '$dalto1', '$vol_unid1', '$totavol_unid1', '$costo_pale1', '$totacosto_pale1', '$peso_pale1', '$totapeso_pale1' )";
   mysql_query($Sqlinsert1,$link) or die (mysql_error());
}

if($itemspale2=='2'){
$nomprodu2 = $_POST["nomprod2"];
$carga2 = $_POST["uni_carga2"];
$canti2 = $_POST["cantipal2"];/**cantidad*/
$dancho2 = $_POST["dimanchopal2"];
$dlargo2 = $_POST["dimlargopal2"];
$dalto2 = $_POST["dimaltopal2"];
$vol_unid2 = $_POST["volunipal2"];
$totavol_unid2 = $_POST["totavolunipal2"];/*total volumen*/
$costo_pale2 = $_POST["costounipal2"];
$totacosto_pale2 = $_POST["totacostounipal2"];/*total costo*/
$peso_pale2 = $_POST["pesopal2"];
$totapeso_pale2 = $_POST["totapesopal2"];/*total peso*/

$Sqlinsert2="insert into cos_expo_paletizacion (id_prod_pale, producto_pale, unid_carga_pale, cantidad_pale, dim_ancho_pale, dim_largo_pale, dim_alto_pale, vol_unid_pale, tota_volum_pale, costo_unita_pale, tota_unita_pale, peso_pale, tota_peso_pale)  values ('$codigo', '$nomprodu2', '$carga1', '$canti2', '$dancho2', '$dlargo2', '$dalto2', '$vol_unid2', '$totavol_unid2', '$costo_pale2', '$totacosto_pale2', '$peso_pale2', '$totapeso_pale2' )";
   mysql_query($Sqlinsert2,$link) or die (mysql_error());

}

if($itemspale3=='3'){
$nomprodu3 = $_POST["nomprod3"];
$carga3 = $_POST["uni_carga3"];
$canti3 = $_POST["cantipal3"];/**cantidad*/
$dancho3 = $_POST["dimanchopal3"];
$dlargo3 = $_POST["dimlargopal3"];
$dalto3 = $_POST["dimaltopal3"];
$vol_unid3 = $_POST["volunipal3"];
$totavol_unid3 = $_POST["totavolunipal3"];/*total volumen*/
$costo_pale3 = $_POST["costounipal3"];
$totacosto_pale3 = $_POST["totacostounipal3"];/*total costo*/
$peso_pale3 = $_POST["pesopal3"];
$totapeso_pale3 = $_POST["totapesopal3"];/*total peso*/

$Sqlinsert3="insert into cos_expo_paletizacion (id_prod_pale, producto_pale, unid_carga_pale, cantidad_pale, dim_ancho_pale, dim_largo_pale, dim_alto_pale, vol_unid_pale, tota_volum_pale, costo_unita_pale, tota_unita_pale, peso_pale, tota_peso_pale)  values ('$codigo', '$nomprodu3', '$carga1', '$canti3', '$dancho3', '$dlargo3', '$dalto3', '$vol_unid3', '$totavol_unid3', '$costo_pale3', '$totacosto_pale3', '$peso_pale3', '$totapeso_pale3' )";
   mysql_query($Sqlinsert3,$link) or die (mysql_error());

}

if($itemspale4=='4'){
$nomprodu4 = $_POST["nomprod4"];
$carga4 = $_POST["uni_carga4"];
$canti4 = $_POST["cantipal4"];/**cantidad*/
$dancho4 = $_POST["dimanchopal4"];
$dlargo4 = $_POST["dimlargopal4"];
$dalto4 = $_POST["dimaltopal4"];
$vol_unid4 = $_POST["volunipal4"];
$totavol_unid4 = $_POST["totavolunipal4"];/*total volumen*/
$costo_pale4 = $_POST["costounipal4"];
$totacosto_pale4 = $_POST["totacostounipal4"];/*total costo*/
$peso_pale4 = $_POST["pesopal4"];
$totapeso_pale4 = $_POST["totapesopal4"];/*total peso*/

$Sqlinsert4="insert into cos_expo_paletizacion (id_prod_pale, producto_pale, unid_carga_pale, cantidad_pale, dim_ancho_pale, dim_largo_pale, dim_alto_pale, vol_unid_pale, tota_volum_pale, costo_unita_pale, tota_unita_pale, peso_pale, tota_peso_pale)  values ('$codigo', '$nomprodu4', '$carga4', '$canti4', '$dancho4', '$dlargo4', '$dalto4', '$vol_unid4', '$totavol_unid4', '$costo_pale4', '$totacosto_pale4', '$peso_pale4', '$totapeso_pale4' )";
   mysql_query($Sqlinsert4,$link) or die (mysql_error());

}

if($itemspale5=='5'){
$nomprodu5 = $_POST["nomprod5"];
$carga5 = $_POST["uni_carga5"];
$canti5 = $_POST["cantipal5"];/**cantidad*/
$dancho5 = $_POST["dimanchopal5"];
$dlargo5 = $_POST["dimlargopal5"];
$dalto5 = $_POST["dimaltopal5"];
$vol_unid5 = $_POST["volunipal5"];
$totavol_unid5 = $_POST["totavolunipal5"];/*total volumen*/
$costo_pale5 = $_POST["costounipal5"];
$totacosto_pale5 = $_POST["totacostounipal5"];/*total costo*/
$peso_pale5 = $_POST["pesopal5"];
$totapeso_pale5 = $_POST["totapesopal5"];/*total peso*/

$Sqlinsert5="insert into cos_expo_paletizacion (id_prod_pale, producto_pale, unid_carga_pale, cantidad_pale, dim_ancho_pale, dim_largo_pale, dim_alto_pale, vol_unid_pale, tota_volum_pale, costo_unita_pale, tota_unita_pale, peso_pale, tota_peso_pale)  values ('$codigo', '$nomprodu5', '$carga5', '$canti5', '$dancho5', '$dlargo5', '$dalto5', '$vol_unid5', '$totavol_uni5', '$costo_pale5', '$totacosto_pale5', '$peso_pale5', '$totapeso_pale5' )";
   mysql_query($Sqlinsert5,$link) or die (mysql_error());

}

header("Location: expolistaunita.php?conte=$codigo");

?>