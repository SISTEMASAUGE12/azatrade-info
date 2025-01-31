<?php
include ("conection/config.php");

$codiprod = $_POST["idprod"];
$item1 = $_POST["fila1"];
$item2 = $_POST["fila2"];
$item3 = $_POST["fila3"];
$item4 = $_POST["fila4"];
$item5 = $_POST["fila5"];

if ($item1=='1'){
$iddetaprod1 = $_POST["codi1"];
$emp1 = $_POST["empaque1"];
$pale1 = $_POST["paletiza1"];
$conte1 = $_POST["contenedor1"];

$rsh1=("update cos_prod_detalle set agrupa_empaque='$emp1', agrupa_paletiza='$pale1', agrupa_contenedor='$conte1' where id_detalle='$iddetaprod1' and id_prod='$codiprod'");
   mysql_query($rsh1,$link)or die (mysql_error()); 
	
	}

if ($item2=='2'){
$iddetaprod2 = $_POST["codi2"];
$emp2 = $_POST["empaque2"];
$pale2 = $_POST["paletiza2"];
$conte2 = $_POST["contenedor2"];

$rsh2=("update cos_prod_detalle set agrupa_empaque='$emp2', agrupa_paletiza='$pale2', agrupa_contenedor='$conte2' where id_detalle='$iddetaprod2' and id_prod='$codiprod'");
   mysql_query($rsh2,$link)or die (mysql_error()); 
	}

if ($item3=='3'){
$iddetaprod3 = $_POST["codi3"];
$emp3 = $_POST["empaque3"];
$pale3 = $_POST["paletiza3"];
$conte3 = $_POST["contenedor3"];

$rsh3=("update cos_prod_detalle set agrupa_empaque='$emp3', agrupa_paletiza='$pale3', agrupa_contenedor='$conte3' where id_detalle='$iddetaprod3' and id_prod='$codiprod'");
   mysql_query($rsh3,$link)or die (mysql_error()); 
	}

if ($item4=='4'){
$iddetaprod4 = $_POST["codi4"];
$emp4 = $_POST["empaque4"];
$pale4 = $_POST["paletiza4"];
$conte4 = $_POST["contenedor4"];

$rsh4=("update cos_prod_detalle set agrupa_empaque='$emp4', agrupa_paletiza='$pale4', agrupa_contenedor='$conte4' where id_detalle='$iddetaprod4' and id_prod='$codiprod'");
   mysql_query($rsh4,$link)or die (mysql_error()); 
	}

if ($item5=='5'){
$iddetaprod5 = $_POST["codi5"];
$emp5 = $_POST["empaque5"];
$pale5 = $_POST["paletiza5"];
$conte5 = $_POST["contenedor5"];

$rsh5=("update cos_prod_detalle set agrupa_empaque='$emp5', agrupa_paletiza='$pale5', agrupa_contenedor='$conte5' where id_detalle='$iddetaprod5' and id_prod='$codiprod'");
   mysql_query($rsh5,$link)or die (mysql_error()); 
	}
	
 header("Location: listadimension.php?dim=$codiprod");
?>