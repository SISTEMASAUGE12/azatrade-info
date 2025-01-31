<?php
include ("conection/config.php");

$codi = $_POST["idprod"];
$let = $_POST["letra"];
$letm = $_POST["letram"];


$gasadmin = $_POST["gasadmini"];
$emicre = $_POST["emicre"];
$comi = $_POST["comisi"];
$letras = $_POST["letra"];
$tasamen = $_POST["tasam"];
$m_impo = $_POST["margenimpo"];
$m_minori = $_POST["margenmino"];

// actualizamos datos del producto
$rst=("update cos_otrodatos set gasto_admini_financ='$gasadmin', emision_credito_financ='$emicre', comi_financ='$comi', letras_financ='$letras', tasa_mens_financ='$tasamen', utili_marge='$m_impo', marge_minorista='$m_minori' where id_prod='$codi'");
   mysql_query($rst,$link)or die (mysql_error()); 


header("Location: letrasfinancia.php?prod=$codi&letra=$let&tmensu=$tasamen&montlet=$letm");

?>