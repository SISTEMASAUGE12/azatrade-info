<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";

$codigox = $_GET["id"];
$pasox = $_GET["paso"];
$boton_atrasx = $_GET["volv"];

/* muestra tabla de otros datos*/
$sqlotro="SELECT co.id_dato, co.id_prod, co.direfab, co.direalmpreemb, co.puerto_orig, co.punto_cargue, co.punto_desemb, co.puerto_dest, co.direc_alma_ent, co.peso_tot, co.unid_comer, co.volumen_tot, co.pais_expo, co.costo_directo, co.mani_expor, co.documen, co.transpo, co.almac_inter, co.mani_preemb, co.mani_emb, co.seguro, co.bancario, co.agente, co.adminis, co.capital_inven, co.fob, co.flete, co.tipo_seguro, co.prima_neta, co.deducible, co.derecho_emision, co.empresa_aseguradora, co.seguro_tabla, co.gasto_hand, co.gasto_traccion, co.gasto_movicarga, co.gasto_descarga, co.gasto_precinto, co.gasto_almacenaje, co.gasto_serv_adminis, co.gasto_serv_clien, co.gasto_condu, co.gasto_otrogasto, co.gasto_cargador, co.gasto_opera, co.gasto_comi_1, co.gasto_comi_2, co.gasto_admini_financ, co.emision_credito_financ, co.comi_financ, co.letras_financ, co.tasa_mens_financ, co.utili_marge, co.marge_minorista FROM cos_otrodatos AS co WHERE co.id_prod = '$codigox'";
$rso = mysql_query($sqlotro);
if (mysql_num_rows($rso) > 0){
	while($rowo = mysql_fetch_array($rso)){
		$fobx = $rowo["fob"];
		$fletex = $rowo["flete"];
		$cfr = $fobx + $fletex;
		$tsegurox = $rowo["tipo_seguro"];
		$pneta = $rowo["prima_neta"];
		$deduce = $rowo["deducible"];
		
		$r1 = $rowo["gasto_admini_financ"] + $rowo["emision_credito_financ"];
		//$r1 = $rowo["gasto_admini_financ"];
		$comi_r = $rowo["comi_financ"];
		$r2 = ($comi_r * $cfr) / 100;
		//$r2 = ($comi_r / 100) * $cfr;
		//$gastoemicredito = $rowo["emision_credito_financ"];
		$margenutil_impo = $rowo["utili_marge"];
		$margenutil_mino = $rowo["marge_minorista"];
		$porcentajemargenutil_mino = (100 - $margenutil_mino) / 100;
		
		$porcdeduce = 100 - $deduce;
		$totaldeduce = ($cfr / $porcdeduce) * 100;
		if($tsegurox=='Empresa de Seguros'){
		$totaldeduce2 = ($pneta * $totaldeduce) / 100;
		}else{
		$totaldeduce2 = ($pneta * $cfr) / 100;
		}
		
		$totalxx = $rowo["gasto_hand"] + $rowo["gasto_traccion"] + $rowo["gasto_movicarga"] + $rowo["gasto_descarga"] + $rowo["gasto_precinto"] + $rowo["gasto_almacenaje"] + $rowo["gasto_serv_adminis"] + $rowo["gasto_serv_clien"] + $rowo["gasto_condu"] + $rowo["gasto_otrogasto"] + $rowo["gasto_cargador"] + $rowo["gasto_opera"] + $rowo["gasto_comi_2"];
		$igvafecto = ($totalxx * 18) / 100;
		
		$cifxx = $cfr + $totaldeduce2;
		
		$dereemi = $rowo["derecho_emision"];
		$impo2 = ($totaldeduce2 * $dereemi)/100;
		$impo3 = $totaldeduce2 + $impo2;
		$igv = "18.000";
		$impo4 = ($igv * $impo3)/100;
		$empasegu = $rowo["empresa_aseguradora"];
		$segurot = $rowo["seguro_tabla"];
		
		$factor_av = $cifxx / $fobx;
	
	}
	}
	
	/*muestra datos de tabla producto*/
	$sqlp="SELECT prod.id_prod, prod.nom_prov, prod.nom_cont, prod.correo_web, prod.pais, prod.tipo_cambio, prod.valor_uit, prod.sobre_tasa_adic, prod.rebaja_aranc, prod.tasa_desp, prod.recargo_num, prod.percepcion, prod.moneda, prod.t_compra, prod.t_transporte FROM cos_producto AS prod WHERE prod.id_prod = '$codigox'";
$rsnp = mysql_query($sqlp);
if (mysql_num_rows($rsnp) > 0){
	while($rowp = mysql_fetch_array($rsnp)){
		 $tc = $rowp["tipo_cambio"];
		 $uit = $rowp["valor_uit"];
		 $td = $rowp["tasa_desp"];
		 $rremu = $rowp["recargo_num"];
		 $tasadesp = (($td * $uit) / $tc) / 100;
	}
}
	
	/* sumatoria de producto detalle*/
	$sqldeta="SELECT
Sum(pd.cantidad) AS canti,
Sum(pd.peso_unidad_kg) AS unidkg,
Sum(pd.peso_total_kg) AS pesototakg,
Sum(pd.valor_factura) AS valorfactu,
Sum(pd.total_factura) AS totalfactu,
Sum(pd.porcent_costo) AS porcencosto,
Sum(pd.advalore) AS advalor,
Sum(pd.aranc_impo) AS aranceimpo,
Sum(pd.derecho_esp_tn) AS derespetn,
Sum(pd.derecho_esp_importe) AS derespeimpo,
Sum(pd.porcen_sobretasa) AS porcesobretasa,
Sum(pd.sobretasa_importe) AS sobretasaimpo,
Sum(pd.porcen_rebaja_aranc) AS pocenrebajarance,
Sum(pd.rebaja_aranc_importe) AS rebajaaranceimpo,
Sum(pd.isc_dato) AS iscdato,
Sum(pd.isc_importe) AS iscimpo,
Sum(pd.antid_dato) AS antidato,
Sum(pd.antid_importe) AS antiimpo,
Sum(pd.igv_ipm) AS igvipm,
Sum(pd.igv_ipm_importe) AS igvipmimpo
FROM
cos_prod_detalle AS pd
WHERE
pd.id_prod = '$codigox'";
	$rsde = mysql_query($sqldeta);
if (mysql_num_rows($rsde) > 0){
	while($rowde = mysql_fetch_array($rsde)){
		
		$araimporte = $rowde["aranceimpo"];
	   $dereespeimpo = $rowde["derespeimpo"];
	   $sobretasaimpo = $rowde["sobretasaimpo"];
	   $rebajaaranceimpo = $rowde["rebajaaranceimpo"];
	   $iscimpo = $rowde["iscimpo"];
	    $igvipm = $rowde["igvipmimpo"];
		$antiimpo = $rowde["antiimpo"];
	}
}

/*suma totales letras*/
$sqlletra="SELECT
Sum(le.venc_dias) AS letravencedias,
Sum(le.tasa) AS letratasa,
Sum(le.interes) AS letrainteres,
Sum(le.igv) AS letraigv,
Sum(le.total) AS letratotal
FROM
cos_letras AS le
WHERE
le.id_prod = '$codigox'";
$rsle = mysql_query($sqlletra);
if (mysql_num_rows($rsle) > 0){
	while($rowle = mysql_fetch_array($rsle)){
		$diasvence = $rowle["letravencedias"];
		$ltasa = $rowle["letratasa"];
		$linteres = $rowle["letrainteres"];
		$ligv = $rowle["letraigv"];
		$letratotal = $rowle["letratotal"];
	}
}

$deuda_adu2 = $araimporte + $dereespeimpo + $sobretasaimpo + $rebajaaranceimpo + $iscimpo + $igvipm + $antiimpo +  $rremu + $tasadesp ;
$perce = (($cifxx + $deuda_adu2) * $rremu) / 100;

$totalcreditofiscal = $impo4 + $igvipm + $perce + $igvafecto + $ligv;
$totalcreditofiscal_x = ($impo4 + $igvipm + $perce + $igvafecto + $ligv) * -1;

/*resumen derechos*/
$totaldere = $araimporte + $dereespeimpo + $sobretasaimpo + $rebajaaranceimpo + $iscimpo + $antiimpo + $tasadesp + $rremu;
/*resumen gasto de importacion*/
$resum_gasto_impo = $impo2 + $totalxx;
/*resumen gasto administrativo financiero*/
$resum_gasto_adminfinanc = $r1 + $gastoemicredito + $r2 + $linteres;
/*resumen costo total*/
$resum_costotota = $cifxx + $totaldere + $resum_gasto_impo + $resum_gasto_adminfinanc;

/*margen utilidad importador*/
$margen1 = ($resum_costotota * $margenutil_impo) / 100;
/*margen utilidad valor venta importador*/
$valorv = $resum_costotota + $margen1;
/*margen utilidad igv importador*/
$igv_importador = ($valorv * 18) /100 ;
$igv_importador_x = (($valorv * 18) /100) * -1 ;
/*margen utilidad precio venta importador*/
$valorpreciov = $valorv + $igv_importador;

/*margen utilidad valor venta minorista */
$valorv_min = $valorv / $porcentajemargenutil_mino ;
/*margen utilidad igv minorista*/
$igv_minorista = ($valorv_min * 18) /100 ;
/*margen utilidad precio venta minorista*/
$valorpreciov_min = $valorv_min + $igv_minorista;

/*saldo credito fiscal importador*/
$saldo_credifis = $igv_importador + $totalcreditofiscal_x;
/*saldo credito fiscal minorista*/
$saldo_credifis_mino = $igv_minorista + $igv_importador_x;

/*factor costo*/
$faccosto = $resum_costotota / $fobx;
/*factor mayorista*/
$factormayo = $valorpreciov / $fobx;
/*factor minorista*/
$factor_mino_v = $valorpreciov_min / $fobx;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<style>
#tabla1 { 
border-radius:3px; 
-moz-border-radius:3px; /* Firefox */ 
-webkit-border-radius:3px; /* Safari y Chrome */ 
/* Otros estilos */ 
border:0px solid #333;
/*background:#eee;*/
width:100%;
padding:5px;
}
</style>

<style>
#tabla2 { 
border-radius:3px; 
-moz-border-radius:3px; /* Firefox */ 
-webkit-border-radius:3px; /* Safari y Chrome */ 
/* Otros estilos */ 
border:0px solid #333;
/*background:#eee;*/
width:100%;
padding:5px;
}
</style>

<style>
#tabla3 { 
border-radius:3px; 
-moz-border-radius:3px; /* Firefox */ 
-webkit-border-radius:3px; /* Safari y Chrome */ 
/* Otros estilos */ 
border:0px solid #333;
/*background:#eee;*/
width:100%;
padding:5px;
}
</style>

<script language="javascript" type="text/javascript">
function valida(lista) {
	
	if (lista.k1.value.length < 1){
		alert("Ingrese Valor letra #1");
		return false;
	}

	return true;

}
</script>

<SCRIPT LANGUAGE="JavaScript">
function NumCheck(e, field)
{
key = e.keyCode ? e.keyCode : e.which
// backspace 
if (key == 8) return true
// 0-9 
if (key > 47 && key < 58) {
	if (field.value == "") return true
	regexp = /.[0-9]{10}$/
	return !(regexp.test(field.value))
} // . 
if (key == 46) {
	if (field.value == "") return false
	regexp = /^[0-9]+$/
	return regexp.test(field.value)
} // other key 
return false
}
</script>

<script type="text/javascript">  
// calcula campos
function Sumar(){  
      interval = setInterval("calcular()",1);  
}  
function calcular(){
/*segunda fila*/
	tasa1 = document.lista.tasame1.value;
	k2 = document.lista.k2.value;
	k1 = document.lista.k1.value;
	monto2 = document.lista.letramonto2.value;

	tasa1a = document.lista.tasame2.value = ((tasa1 * +1) * (k2 * +1)) / k1;
	interes1a = document.lista.inte2.value = ((monto2 * +1) * (tasa1a * +1)) / 100;
	igv1a = document.lista.igv2.value = ((interes1a * +1) * 18) / 100;
	interesigv1a = document.lista.igvinteres2.value = ((monto2 * +1) + (interes1a * +1)) + igv1a;
	
	} 
function NoSumar(){  
      clearInterval(interval);  
}  
</SCRIPT>

<script type="text/javascript">
function imprSelec(muestra)
{var ficha=document.getElementById(muestra);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();}
</script>
</head>

<body>

<br /><br /><br />
<?php 
if ($pasox =="no"){
}else{
?>
<input class="form-control btn-primary" type="button" value="C&aacute;lculo de Costo de Importaci&oacute;n. Paso : 12 de 12" />
<?php 
}
?>
<div id="muestra"> 

 <form name="lista" method="post" onSubmit="return valida(this);" >


  <input class="form-control" name="idprod" type="hidden" value="<?php echo "$codigox"; ?>" />
  
 <table id="tabla1" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center"> 
  <tr>
  <td bgcolor="#E9E9E9" align="center"><img src="img/Azatrade_sistemas.png" width="100" /> </td>
   <td bgcolor="#E9E9E9" align="center" colspan="4"><h5><b>RESUMEN DE COSTOS </b></h5> </td>
   <!-- <td bgcolor="#E9E9E9" align="center" colspan="3" ><h5><b> </b></h5> </td> -->
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center" colspan="2"><h5><b>Credito Fiscal (Derecho de Importacion)</b></h5> </td>
  <td align="center" colspan="3" ><h5><b>Margen Utilidad</b></h5> </td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>Concepto</b></h5></td>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>Importe</b></h5></td>
  <!-- <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b> </b></h5></td> -->
  <td align="center" width="15%"><h5><b>Concepto</b></h5></td>
  <td align="center" width="15%"><h5><b>Importador</b></h5></td>
  <td align="center" width="15%"><h5><b>Minorista</b></h5></td>
  </tr>
  <tr>
  <td bgcolor="#EEEEEE" align="center" >IGV SERGURO :</td>
   <td bgcolor="#EEEEEE" align="center" ><?php echo number_format("$impo4",3,".",","); ?> </td>
    <!-- <td bgcolor="#EEEEEE" align="center" > </td> -->
    <td align="center" >COSTO TOTAL :</td>
   <td align="center" ><?php echo number_format("$resum_costotota",3,".",","); ?></td>
   <td align="center" ><?php echo number_format("$valorv",3,".",","); ?></td>
  </tr>
   <tr>
  <td bgcolor="#EEEEEE" align="center" >IGV + IPM :</td>
   <td bgcolor="#EEEEEE" align="center" ><?php echo number_format("$igvipm",3,".",","); ?></td>
    <!-- <td bgcolor="#EEEEEE" align="center" > </td> -->
    <td  align="center" >MARGEN :</td>
   <td align="center" ><? echo "$margenutil_impo% &nbsp;&nbsp;&nbsp;&nbsp; "; echo number_format("$margen1",3,".",","); ?> </td>
   <td align="center" ><?php echo "$margenutil_mino%"; ?></td>
  </tr>
   <tr>
  <td bgcolor="#EEEEEE" align="center" >PERCEPCION :</td>
   <td bgcolor="#EEEEEE" align="center" ><?php echo number_format("$perce",3,".",","); ?></td>
   <!--  <td bgcolor="#EEEEEE" align="center" > </td> -->
    <td align="center" >VALOR DE VENTA :</td>
   <td align="center" ><?php echo number_format( "$valorv",3,".",","); ?></td>
   <td align="center" ><?php echo number_format("$valorv_min",3,".",","); ?></td>
  </tr>
   <tr>
  <td bgcolor="#EEEEEE" align="center" >IGV AFECTOS :</td>
   <td bgcolor="#EEEEEE" align="center" ><?php echo number_format("$igvafecto",3,".",","); ?></td>
   <!--  <td bgcolor="#EEEEEE" align="center" > </td> -->
    <td align="center" >IGV :</td>
   <td align="center" ><?php echo number_format("$igv_importador",3,".",","); ?></td>
   <td align="center" ><?php echo number_format("$igv_minorista",3,".",","); ?></td>
  </tr>
   <tr>
  <td bgcolor="#EEEEEE" align="center" >IGV INTERES :</td>
   <td bgcolor="#EEEEEE" align="center" ><?php echo number_format("$ligv",3,".",","); ?></td>
   <!--  <td bgcolor="#EEEEEE" align="center" > </td> -->
    <td align="center" ><b>PRECIO DE VENTA :</b></td>
   <td align="center" ><b><?php echo number_format("$valorpreciov",3,".",","); ?> </b></td>
   <td align="center" ><b><?php echo number_format("$valorpreciov_min",3,".",","); ?></b></td>
  </tr>
   <tr>
  <td bgcolor="#EEEEEE" align="center" ><b>TOTAL :</b></td>
   <td bgcolor="#EEEEEE" align="center" ><b><?php echo number_format("$totalcreditofiscal",3,".",","); ?></b></td>
   <!--  <td bgcolor="#EEEEEE" align="center" > </td> -->
    <!-- <td bgcolor="#E9E9E9" align="center" ><h5><b>MINORISTA</b></h5></td>
   <td bgcolor="#E9E9E9" align="center" ><b>IMPORTE </b></td> -->
  </tr>
  </table>
  <br />
  <table id="tabla2" border="0" class="table table-hover" style='font-size:80%' align="center"> 
  <tr>
  <td bgcolor="#E9E9E9" colspan="3" align="center"><h5><b>Cr&eacute;dito Fiscal (Venta Importador - Venta Minorista)</b></h5></td>
  </tr>
   <tr>
  <td bgcolor="#E9E9E9" align="center" ><b> </b></td>
   <td bgcolor="#E9E9E9" align="center" ><h5><b>Importador</b></h5></td>
    <td bgcolor="#E9E9E9" align="center" ><h5><b>Minorista </b></h5></td>
   <!--  <td align="center" ><b>COSTO TOTAL :</b></td>
   <td align="center" ><?php //echo number_format("$valorv",3,".",","); ?></td> -->
  </tr>
  <tr>
  <td align="center" ><b>Igv. Ventas :</b></td>
   <td align="center" ><?php echo number_format("$igv_importador",3,".",","); ?></td>
    <td align="center" ><?php echo number_format("$igv_minorista",3,".",","); ?> </td>
    <!-- <td align="center" ><b>MARGEN :</b></td>
   <td align="center" ><?php //echo "$margenutil_mino%"; ?></td> -->
  </tr>
  <tr>
  <td align="center" ><b>Credito Fiscal :</b></td>
   <td align="center" ><?php echo number_format("$totalcreditofiscal_x",3,".",","); ?></td>
    <td align="center" ><?php echo number_format("$igv_importador_x",3,".",","); ?></td>
    <!-- <td align="center" ><b>VALOR DE VENTA :</b></td>
   <td align="center" ><?php //echo number_format("$valorv_min",3,".",","); ?></td> -->
  </tr>
  <tr>
  <td align="center" ><b>Saldo :</b></td>
   <td align="center" ><?php echo number_format("$saldo_credifis",3,".",","); ?></td>
    <td align="center" ><?php echo number_format("$saldo_credifis_mino",3,".",","); ?></td>
   <!--  <td align="center" ><b>IGV :</b></td>
   <td align="center" ><?php //echo number_format("$igv_minorista",3,".",","); ?></td> -->
  </tr>
  <tr>
  <td align="center" > </td>
   <td align="center" > </td>
    <td align="center" > </td>
   <!--  <td align="center" ><b>PRECIO DE VENTA :</b></td>
   <td align="center" ><?php //echo number_format("$valorpreciov_min",3,".",","); ?></td> -->
  </tr>
  </table>
  <br />
  <table id="tabla3" border="0" class="table table-hover" style='font-size:80%' align="center"> 
  <tr>
   <td bgcolor="#E9E9E9" align="center" colspan="4"><h5><b>Costo Total</b></h5> </td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>Concepto</b></h5></td>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>Importe</b></h5></td>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>Concepto</b></h5></td>
  <td bgcolor="#E9E9E9" align="center" width="15%"><h5><b>Importe</b></h5></td>
  </tr>
  <tr>
  <td align="center" > CIF : </td>
  <td align="center" ><?php echo number_format("$cifxx",3,".",","); ?></td>
  <td align="center" >GASTOS DE IMPORTACION : </td>
  <td align="center" ><?php echo number_format("$resum_gasto_impo",3,".",","); ?></td>
  </tr>
  <tr>
  <td align="center" > DERECHOS :</td>
  <td align="center" ><?php echo number_format("$totaldere",3,".",","); ?></td>
  <td align="center" >GASTOS AMINISTARTIVOS Y FINANCIEROS : </td>
  <td align="center" ><?php echo number_format("$resum_gasto_adminfinanc",3,".",","); ?></td>
  </tr>
   <tr>
  <td bgcolor="#E9E9E9" align="center" colspan="2" ><h5><b> COSTO TOTAL :</b></h5> </td>
  <td bgcolor="#E9E9E9" align="center" colspan="2" ><h5><b><?php echo number_format("$resum_costotota",3,".",","); ?></b></h5></td>
  </tr>
  </table>
  <br />
  <table id="tabla3" border="0" class="table table-hover" style='font-size:80%' align="center"> 
  <tr>
  <td bgcolor="#E9E9E9" align="center" colspan="4"><h5><b>C&aacute;lculo de Factores</b></h5> </td>
  </tr>
  <tr>
  <td align="center" ><b> FOB : </b></td>
  <td align="center" ><?php echo number_format("$fobx",3,".",","); ?></td>
  <td align="center" ><b>FACTOR COSTO :</b></td>
  <td align="center" ><?php echo number_format("$faccosto",3,".",","); ?></td>
  </tr>
   <tr>
  <td align="center" > <b>VALOR DE VENTA MAYORISTA:</b> </td>
  <td align="center" ><?php echo number_format("$valorpreciov",3,".",","); ?></td>
  <td align="center" ><b>FACTOR MAYORISTA:</b></td>
  <td align="center" ><?php echo number_format("$factormayo",3,".",","); ?></td>
  </tr>
   <tr>
  <td align="center" ><b> VALOR DE VENTA MINORISTA:</b> </td>
  <td align="center" ><?php echo number_format("$valorpreciov_min",3,".",","); ?></td>
  <td align="center" ><b>FACTOR MINORISTA:</b></td>
  <td align="center" ><?php echo number_format("$factor_mino_v",3,".",","); ?></td>
  </tr>
  </table>
  
   <table border="0" class="table table-hover" style='font-size:80%' align="center"> 
  <tr>
   <td bgcolor="#E9E9E9" align="center" colspan="12"><h5><b>C&aacute;lculo de Costos y Precios Unitarios</b></h5> </td>
  </tr>
  <tr>
   <td bgcolor="#E9E9E9" align="center" colspan="4"><h5><b> </b></h5> </td>
   <td bgcolor="#E9E9E9" align="center" colspan="2"><h5><b>FOB</b></h5> </td>
   <td bgcolor="#E9E9E9" align="center" colspan="2"><h5><b>COSTO</b></h5> </td>
   <td bgcolor="#E9E9E9" align="center" colspan="2"><h5><b>PRECIO MAYORISTA</b></h5> </td>
   <td bgcolor="#E9E9E9" align="center" colspan="2"><h5><b>PRECIO MINORISTA</b></h5> </td>
  </tr>
  <tr>
   <td bgcolor="#E9E9E9" align="center"><h5><b># </b></h5> </td>
   <td bgcolor="#E9E9E9" align="center"><h5><b>Detalle</b></h5> </td>
   <td bgcolor="#E9E9E9" align="center"><h5><b>Cantidad</b></h5> </td>
   <td bgcolor="#E9E9E9" align="center"><h5><b>Unidad</b></h5> </td>
   <td bgcolor="#E9E9E9" align="center"><h5><b>Unit.</b></h5> </td>
   <td bgcolor="#E9E9E9" align="center"><h5><b>Total</b></h5> </td>
   <td bgcolor="#E9E9E9" align="center"><h5><b>Unit.</b></h5> </td>
   <td bgcolor="#E9E9E9" align="center"><h5><b>Total</b></h5> </td>
   <td bgcolor="#E9E9E9" align="center"><h5><b>Unit.</b></h5> </td>
   <td bgcolor="#E9E9E9" align="center"><h5><b>Total</b></h5> </td>
   <td bgcolor="#E9E9E9" align="center"><h5><b>Unit.</b></h5> </td>
   <td bgcolor="#E9E9E9" align="center"><h5><b>Total</b></h5> </td>
  </tr>
  <?php
  $sqllistaprodu = "SELECT
pd.id_detalle,
pd.id_prod,
pd.partidaA,
pd.nomproducto,
pd.cantidad,
pd.valor_factura,
pd.unidad_comerc
FROM
cos_prod_detalle AS pd
WHERE
pd.id_prod = '$codigox'";
  $rsnlp = mysql_query($sqllistaprodu);
if (mysql_num_rows($rsnlp) > 0){
	while($rowprod = mysql_fetch_array($rsnlp)){
		$cuenta = $cuenta + 1;
		$nombre_prod = $rowprod["nomproducto"];
		$cantidad = $rowprod["cantidad"];
		$unidadcomer = $rowprod["unidad_comerc"];
		$valorfactura = $rowprod["valor_factura"];
		//$t1 = number_format($cantidad * $valorfactura,3,".",",");
		//$t1 = number_format($unidadcomer,3,".",",");
		$t1 = $cantidad * $valorfactura;
		//$costouni1 = $t1 * $faccosto;
		$costouni1 = $valorfactura * $faccosto;
		//$tt1 = number_format($cantidad * $costouni1,3,".",",");
		$tt1 = $cantidad * $costouni1;
		$pmuni =$valorfactura * $factormayo;
		//$pmtt = number_format($cantidad * $pmuni,3,".",",");
		$pmtt = $cantidad * $pmuni;
		$pmiuni = $valorfactura * $factor_mino_v;
		$totalista = $cantidad * $pmiuni;
		
		$sumatotalfob = $sumatotalfob + $t1;
		$sumatotalcosto = $sumatotalcosto + $tt1;
		$sumatotalpmayo = $sumatotalpmayo + $pmtt;
		$sumatotal_lista = $sumatotal_lista + $totalista;
		
		$utili_1 = $sumatotalcosto - $sumatotalfob;
		
		$utili_2 = $sumatotalpmayo - $sumatotalcosto;
		$utili_3 = $sumatotal_lista - $sumatotalpmayo;
		
		echo "<tr>";
		echo "<td align='center'>$cuenta</td>";
		echo "<td align='center'>$nombre_prod</td>";
		echo "<td align='center'>$cantidad</td>";
		echo "<td align='center'>$unidadcomer</td>";
		echo "<td align='center'>".number_format($valorfactura,3,".",",")."</td>";
		echo "<td align='center'>".number_format($t1,3,".",",")."</td>";
		echo "<td align='center'>".number_format($costouni1,3,".",",")."</td>";
		echo "<td align='center'>".number_format($tt1,3,".",",")."</td>";
		echo "<td align='center'>".number_format($pmuni,3,".",",")."</td>";
		echo "<td align='center'>".number_format($pmtt,3,".",",")."</td>";
		echo "<td align='center'>".number_format($pmiuni,3,".",",")."</td>";
		echo "<td align='center'>".number_format($totalista,3,".",",")."</td>";
		echo "</tr>";
	}
	echo "<tr>";
	echo "<td bgcolor='#E9E9E9' colspan='4'></td>";
	echo "<td bgcolor='#E9E9E9' align='center'><b>Total :</b></td>";
	echo "<td bgcolor='#E9E9E9' align='center'>".number_format($sumatotalfob,3,".",",")."</td>";
	echo "<td bgcolor='#E9E9E9' align='center'></td>";
	echo "<td bgcolor='#E9E9E9' align='center'>".number_format($sumatotalcosto,3,".",",")."</td>";
	echo "<td bgcolor='#E9E9E9' align='center'></td>";
	echo "<td bgcolor='#E9E9E9' align='center'>".number_format($sumatotalpmayo,3,".",",")."</td>";
	echo "<td bgcolor='#E9E9E9' align='center'></td>";
	echo "<td bgcolor='#E9E9E9' align='center'>".number_format($sumatotal_lista,3,".",",")."</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td bgcolor='#E9E9E9' colspan='4'></td>";
	echo "<td bgcolor='#E9E9E9' align='center'><b>Utilidad :</b></td>";
	echo "<td bgcolor='#E9E9E9' align='center' colspan='3'>".number_format($utili_1,3,".",",")."</td>";
	echo "<td bgcolor='#E9E9E9' align='center' colspan='2'>".number_format($utili_2,3,".",",")."</td>";
	echo "<td bgcolor='#E9E9E9' align='center' colspan='2'>".number_format($utili_3,3,".",",")."</td>";
	echo "</tr>";
}
  ?>
  
  </table>
  <br />
  
  <center>
  
  <?php 
if ($boton_atrasx =="no"){
}else{
?>
    <input class="btn btn-primary" type="button" value="Modificar Valor Letras" name="Modificar" onclick="history.back()" />
    <?php 
}
?>
    
    <input class="btn btn-success" name="guardar" type="button" value=" Imprimir Importacion Costos" onclick="javascript:imprSelec('muestra')"  />
  </center>
</form>
</div>

</body>
</html>
<?php
include("pie.php");
?>