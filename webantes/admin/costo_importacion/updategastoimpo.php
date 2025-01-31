<?php
include ("conection/config.php");

$codi = $_POST["idprod"];
$deuda = $_POST["sumdeuda2"];


$han = $_POST["handh"];
$tra = $_POST["tracc"];
$moca = $_POST["movicarga"];
$des = $_POST["desca"];
$preci = $_POST["precin"];
$almac = $_POST["alma"];
$serad = $_POST["serviadmi"];
$sercli = $_POST["servclie"];
$con = $_POST["condu"];
$ogas = $_POST["otrogas"];
$carga = $_POST["cargador"];
$gaope = $_POST["gasopera"];
$porc = $_POST["porcecif"];
$comic = $_POST["comicif"];

// actualizamos datos del producto
$rsn=("update cos_otrodatos set gasto_hand='$han', gasto_traccion='$tra', gasto_movicarga='$moca', gasto_descarga='$des', gasto_precinto='$preci', gasto_almacenaje='$almac', gasto_serv_adminis='$serad', gasto_serv_clien='$sercli', gasto_condu='$con', gasto_otrogasto='$ogas', gasto_cargador='$carga', gasto_opera='$gaope', gasto_comi_1='$porc', gasto_comi_2='$comic' where id_prod='$codi'");
   mysql_query($rsn,$link)or die (mysql_error()); 


header("Location: listagasadminfinca.php?id=$codi&dfin=$deuda");

?>