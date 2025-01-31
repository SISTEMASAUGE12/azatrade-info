<?php
include ("conection/config.php");

$codigo = $_POST["cproduc"];

$itemuni1 = $_POST["item1s"];
$itemuni2 = $_POST["item2s"];
$itemuni3 = $_POST["item3s"];
$itemuni4 = $_POST["item4s"];
$itemuni5 = $_POST["item5s"];

//eliminamos registro existente
$rsh=("delete from cos_expo_union_conte where id_prod_unita='$codigo'");
   mysql_query($rsh,$link); 

// insertamos registro
if($itemuni1=='1'){
$nombrep1 = $_POST["nombrep1"];
$conte1 = $_POST["contene1"];
$cond1 = $_POST["condi1"];
$canti1 = $_POST["canti1"];/*cantidad*/
$pulg1 = $_POST["pulgada1"];
$costouni1 = $_POST["costo1"];

$Sqlinsertuni1="insert into cos_expo_union_conte (id_prod_unita, producto_unita, contenedor_unita, condicion_unita, canti_unita, pulgada, costo_unita_unita)  values ('$codigo', '$nombrep1', '$conte1', '$cond1', '$canti1', '$pulg1', '$costouni1' )";
   mysql_query($Sqlinsertuni1,$link) or die (mysql_error());
}

if($itemuni2=='2'){
$nombrep2 = $_POST["nombrep2"];
$conte2 = $_POST["contene2"];
$cond2 = $_POST["condi2"];
$canti2 = $_POST["canti2"];/*cantidad*/
$pulg2 = $_POST["pulgada2"];
$costouni2 = $_POST["costo2"];

$Sqlinsertuni2="insert into cos_expo_union_conte (id_prod_unita, producto_unita, contenedor_unita, condicion_unita, canti_unita, pulgada, costo_unita_unita)  values ('$codigo', '$nombrep2', '$conte2', '$cond2', '$canti2', '$pulg2', '$costouni2' )";
   mysql_query($Sqlinsertuni2,$link) or die (mysql_error());
}

if($itemuni3=='3'){
$nombrep3 = $_POST["nombrep3"];
$conte3 = $_POST["contene3"];
$cond3 = $_POST["condi3"];
$canti3 = $_POST["canti3"];/*cantidad*/
$pulg3 = $_POST["pulgada3"];
$costouni3 = $_POST["costo3"];

$Sqlinsertuni3="insert into cos_expo_union_conte (id_prod_unita, producto_unita, contenedor_unita, condicion_unita, canti_unita, pulgada, costo_unita_unita)  values ('$codigo', '$nombrep3', '$conte3', '$cond3', '$canti3', '$pulg3', '$costouni3' )";
   mysql_query($Sqlinsertuni3,$link) or die (mysql_error());
}

if($itemuni4=='4'){
$nombrep4 = $_POST["nombrep4"];
$conte4 = $_POST["contene4"];
$cond4 = $_POST["condi4"];
$canti4 = $_POST["canti4"];/*cantidad*/
$pulg4 = $_POST["pulgada4"];
$costouni4 = $_POST["costo4"];

$Sqlinsertuni4="insert into cos_expo_union_conte (id_prod_unita, producto_unita, contenedor_unita, condicion_unita, canti_unita, pulgada, costo_unita_unita)  values ('$codigo', '$nombrep4', '$conte4', '$cond4', '$canti4', '$pulg4', '$costouni4' )";
   mysql_query($Sqlinsertuni4,$link) or die (mysql_error());
}

if($itemuni5=='5'){
$nombrep5 = $_POST["nombrep5"];
$conte5 = $_POST["contene5"];
$cond5 = $_POST["condi5"];
$canti5 = $_POST["canti5"];/*cantidad*/
$pulg5 = $_POST["pulgada5"];
$costouni5 = $_POST["costo5"];

$Sqlinsertuni5="insert into cos_expo_union_conte (id_prod_unita, producto_unita, contenedor_unita, condicion_unita, canti_unita, pulgada, costo_unita_unita)  values ('$codigo', '$nombrep5', '$conte5', '$canti5', '$pulg5', '$costouni5' )";
   mysql_query($Sqlinsertuni5,$link) or die (mysql_error());
}


header("Location: infoadicio.php?info=$codigo");

?>