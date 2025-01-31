<?php
include ("conection/config.php");

$codi = $_POST["idprod"];

$ite1 = $_POST["items1"];
$ite2 = $_POST["items2"];
$ite3 = $_POST["items3"];
$ite4 = $_POST["items4"];
$ite5 = $_POST["items5"];
$ite6 = $_POST["items6"];
$ite7 = $_POST["items7"];
$ite8 = $_POST["items8"];
$ite9 = $_POST["items9"];
$ite10 = $_POST["items10"];

// eliminamos registro de letras existentes
$delete=("delete from cos_letras where id_prod='$codi'");
   mysql_query($delete,$link); 

//insertamos registro de letras
if($ite1=="1"){
$valorletra1 = $_POST["letramonto1"];
$diasvence1 = $_POST["k1"];
$tasa1 = $_POST["tasame1"];
$interes1 = $_POST["inte1"];
$igv1 = $_POST["igv1"];
$total1 = $_POST["igvinteres1"];

$insertaletra1=("insert into cos_letras (id_prod, num_letra, letra_valor, venc_dias, tasa, interes, igv, total)  values ('$codi', '$ite1', '$valorletra1', '$diasvence1', '$tasa1', '$interes1', '$igv1', '$total1' )");
   mysql_query($insertaletra1,$link)or die (mysql_error()); 
}

if($ite2=="2"){
$valorletra2 = $_POST["letramonto2"];
$diasvence2 = $_POST["k2"];
$tasa2 = $_POST["tasame2"];
$interes2 = $_POST["inte2"];
$igv2 = $_POST["igv2"];
$total2 = $_POST["igvinteres2"];

$insertaletra2=("insert into cos_letras (id_prod, num_letra, letra_valor, venc_dias, tasa, interes, igv, total)  values ('$codi', '$ite2', '$valorletra2', '$diasvence2', '$tasa2', '$interes2', '$igv2', '$total2' )");
   mysql_query($insertaletra2,$link)or die (mysql_error()); 
}

if($ite3=="3"){
$valorletra3 = $_POST["letramonto3"];
$diasvence3 = $_POST["k3"];
$tasa3 = $_POST["tasame3"];
$interes3 = $_POST["inte3"];
$igv3 = $_POST["igv3"];
$total3 = $_POST["igvinteres3"];

$insertaletra3=("insert into cos_letras (id_prod, num_letra, letra_valor, venc_dias, tasa, interes, igv, total)  values ('$codi', '$ite3', '$valorletra3', '$diasvence3', '$tasa3', '$interes3', '$igv3', '$total3' )");
   mysql_query($insertaletra3,$link)or die (mysql_error()); 
}

if($ite4=="4"){
$valorletra4 = $_POST["letramonto4"];
$diasvence4 = $_POST["k4"];
$tasa4 = $_POST["tasame4"];
$interes4 = $_POST["inte4"];
$igv4 = $_POST["igv4"];
$total4 = $_POST["igvinteres4"];

$insertaletra4=("insert into cos_letras (id_prod, num_letra, letra_valor, venc_dias, tasa, interes, igv, total)  values ('$codi', '$ite4', '$valorletra4', '$diasvence4', '$tasa4', '$interes4', '$igv4', '$total4' )");
   mysql_query($insertaletra4,$link)or die (mysql_error()); 
}

if($ite5=="5"){
$valorletra5 = $_POST["letramonto5"];
$diasvence5 = $_POST["k5"];
$tasa5 = $_POST["tasame5"];
$interes5 = $_POST["inte5"];
$igv5 = $_POST["igv5"];
$total5 = $_POST["igvinteres5"];

$insertaletra5=("insert into cos_letras (id_prod, num_letra, letra_valor, venc_dias, tasa, interes, igv, total)  values ('$codi', '$ite5', '$valorletra5', '$diasvence5', '$tasa5', '$interes5', '$igv5', '$total5' )");
   mysql_query($insertaletra5,$link)or die (mysql_error()); 
}

if($ite6=="6"){
$valorletra6 = $_POST["letramonto6"];
$diasvence6 = $_POST["k6"];
$tasa6 = $_POST["tasame6"];
$interes6 = $_POST["inte6"];
$igv6 = $_POST["igv6"];
$total6 = $_POST["igvinteres6"];

$insertaletra6=("insert into cos_letras (id_prod, num_letra, letra_valor, venc_dias, tasa, interes, igv, total)  values ('$codi', '$ite6', '$valorletra6', '$diasvence6', '$tasa6', '$interes6', '$igv6', '$total6' )");
   mysql_query($insertaletra6,$link)or die (mysql_error()); 
}

if($ite7=="7"){
$valorletra7 = $_POST["letramonto7"];
$diasvence7 = $_POST["k7"];
$tasa7 = $_POST["tasame7"];
$interes7 = $_POST["inte7"];
$igv7 = $_POST["igv7"];
$total7 = $_POST["igvinteres7"];

$insertaletra7=("insert into cos_letras (id_prod, num_letra, letra_valor, venc_dias, tasa, interes, igv, total)  values ('$codi', '$ite7', '$valorletra7', '$diasvence7', '$tasa7', '$interes7', '$igv7', '$total7' )");
   mysql_query($insertaletra7,$link)or die (mysql_error()); 
}

if($ite8=="8"){
$valorletra8 = $_POST["letramonto8"];
$diasvence8 = $_POST["k8"];
$tasa8 = $_POST["tasame8"];
$interes8 = $_POST["inte8"];
$igv8 = $_POST["igv8"];
$total8 = $_POST["igvinteres8"];

$insertaletra8=("insert into cos_letras (id_prod, num_letra, letra_valor, venc_dias, tasa, interes, igv, total)  values ('$codi', '$ite8', '$valorletra8', '$diasvence8', '$tasa8', '$interes8', '$igv8', '$total8' )");
   mysql_query($insertaletra8,$link)or die (mysql_error()); 
}

if($ite9=="9"){
$valorletra9 = $_POST["letramonto9"];
$diasvence9 = $_POST["k9"];
$tasa9 = $_POST["tasame9"];
$interes9 = $_POST["inte9"];
$igv9 = $_POST["igv9"];
$total9 = $_POST["igvinteres9"];

$insertaletra9=("insert into cos_letras (id_prod, num_letra, letra_valor, venc_dias, tasa, interes, igv, total)  values ('$codi', '$ite9', '$valorletra9', '$diasvence9', '$tasa9', '$interes9', '$igv9', '$total9' )");
   mysql_query($insertaletra9,$link)or die (mysql_error()); 
}

if($ite10=="10"){
$valorletra10 = $_POST["letramonto10"];
$diasvence10 = $_POST["k10"];
$tasa10 = $_POST["tasame10"];
$interes10 = $_POST["inte10"];
$igv10 = $_POST["igv10"];
$total10 = $_POST["igvinteres10"];

$insertaletra10=("insert into cos_letras (id_prod, num_letra, letra_valor, venc_dias, tasa, interes, igv, total)  values ('$codi', '$ite10', '$valorletra10', '$diasvence10', '$tasa10', '$interes10', '$igv10', '$total10' )");
   mysql_query($insertaletra10,$link)or die (mysql_error()); 
}

header("Location: rptcostofinal.php?id=$codi");

?>