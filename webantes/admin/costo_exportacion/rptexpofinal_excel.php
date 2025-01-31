<?php


/*include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";*/

$codigox = $_GET["expo"];

header("Pragma: public");  
header("Expires: 0");  
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");  
header("Content-Type: application/force-download");  
header("Content-Type: application/octet-stream");  
header("Content-Type: application/download");  
header("Content-Disposition: attachment;filename=Calculo_Costo_Exportacion.xls ");  
header("Content-Transfer-Encoding: binary ");  

include ("conection/config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Exportacion</title>
<!--<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet"> -->

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
{
	var ficha=document.getElementById(muestra);
	var ventimp=window.open(' ','popimpr');
	ventimp.document.write(ficha.innerHTML);ventimp.document.close();
	ventimp.print();
	ventimp.close();}
	
</script>
</head>

<body>

<br /><br /><br />

<input class="form-control btn-primary" type="button" value="C&aacute;lculo de Costo de Exportaci&oacute;n. Paso : 8 de 8" />


 <form name="lista" method="post" onSubmit="return valida(this);" action="rptexpofinal.php" >

<div id="muestra"> 
  <input class="form-control" name="idprod" type="hidden" value="<?php echo "$codigox"; ?>" />
  
  <?php
  $sqldetalle ="SELECT cep.id_prod, cep.nom_prov, cep.nom_cont, cep.correo_web, cep.pais, cep.tipo_cambio, cep.moneda FROM cos_expo_producto AS cep WHERE cep.id_prod = '$codigox'";
   $rsde = mysql_query($sqldetalle);
if (mysql_num_rows($rsde) > 0){
	while($rowde = mysql_fetch_array($rsde)){
		$nom_provee = $rowde["nom_prov"];
		$nom_contac = $rowde["nom_cont"];
		$correroweb = $rowde["correo_web"];
		$pais = $rowde["pais"];
		$tcamb = $rowde["tipo_cambio"];
		$moneda = $rowde["moneda"];
	}
}
  ?>
  <!-- Producto -->
 <table id="tabla1" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center"> 
  <tr>
  <td bgcolor="#E9E9E9" align="center"><img src="http://azatrade.info/images/Azatrade11.png" width="150" /> </td>
   <td bgcolor="#E9E9E9" align="center" colspan="5"><h5><b>RESUMEN DE COSTOS </b></h5> </td>
  </tr>
  <tr>
  <td  bgcolor="#F2F2F2" align="center">Proveedor : </td><td><?php echo "$nom_provee"; ?></td>
  <td bgcolor="#F2F2F2" align="center">Persona Contacto : </td><td> <?php echo "$nom_contac"; ?></td>
  <td bgcolor="#F2F2F2" align="center">Correo / Web : </td><td> <?php echo "$correroweb"; ?></td>
  </tr>
  <tr>
  <td bgcolor="#F2F2F2" align="center">Pais : </td><td> <?php echo "$pais"; ?></td>
  <td bgcolor="#F2F2F2" align="center">Moneda : </td><td> <?php echo "$moneda"; ?></td>
   <td bgcolor="#F2F2F2" align="center">Tipo Cambio : </td><td> <?php echo "$tcamb"; ?></td>
  </tr>
  </table>
  
  <!-- detalle Producto -->
 <table id="tabla2" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center"> 
  <tr>
   <td bgcolor="#E9E9E9" align="center" colspan="10"><h5><b>Informacion Del Producto </b></h5> </td>
  </tr>
  <?php
  $sqllista="SELECT cepd.id_detalle, cepd.id_prod, cepd.partidaA, cepd.partidaB, cepd.nomproducto, cepd.cantidad, cepd.unidad_comerc, cepd.peso_unidad_kg, cepd.peso_total_kg, cepd.valor_factura, cepd.total_factura, cepd.porcent_costo FROM cos_expo_prod_detalle AS cepd WHERE cepd.id_prod = '$codigox' ORDER BY cepd.id_detalle ASC";
  $rsl = mysql_query($sqllista);
if (mysql_num_rows($rsl) > 0){
	echo "<tr>";
	echo "<td bgcolor='#E9E9E9' align='center'>Descripci&oacute;n del Producto</td>
<td bgcolor='#E9E9E9' align='center'># Partida (Pa&iacute;s Origen)</td>
<td bgcolor='#E9E9E9' align='center'># Partida (Pa&iacute;s Destino Peru)</td>
<td bgcolor='#E9E9E9' align='center'>Unid. Comercial</td>
<td bgcolor='#E9E9E9' align='center'>Cantidad</td>
<td bgcolor='#E9E9E9' align='center'>Peso Por Unid.(Kg)</td>
<td bgcolor='#E9E9E9' align='center'>Peso Total (Kg.)</td>
<td bgcolor='#E9E9E9' align='center'>Valor Ex-Works</td>
<td bgcolor='#E9E9E9' align='center'>Total Ex-Works</td>
<td bgcolor='#E9E9E9' align='center'>% Costo</td>";
	echo "</tr>";
	while($rowl = mysql_fetch_array($rsl)){
		$nom_provee = $rowl["nomproducto"];
		$partiA = $rowl["partidaA"];
		$partiB = $rowl["partidaB"];
		$unid = $rowl["unidad_comerc"];
		$cant = $rowl["cantidad"];
		$pesokg = $rowl["peso_unidad_kg"];
		$tpesokg = $rowl["peso_total_kg"];
		$valorexwork = $rowl["valor_factura"];
		$tvalorexwork = $rowl["total_factura"];
		$porcen_costo = $rowl["porcent_costo"];
		
		echo "<tr>";
		echo "<td>$nom_provee</td>";
		echo "<td>$partiA</td>";
		echo "<td>$partiB</td>";
		echo "<td>$unid</td>";
		echo "<td>$cant</td>";
		echo "<td>$pesokg</td>";
		echo "<td>$tpesokg</td>";
		echo "<td>$valorexwork</td>";
		echo "<td>$tvalorexwork</td>";
		echo "<td>$porcen_costo</td>";
		echo "</tr>";
		
	}
}
  ?>
  </table>
  
    <!-- Union de embalaje -->
  <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
   <td bgcolor="#E9E9E9" align="center" colspan="14"><h5><b>Empaque y Embalaje (Dimensiones en m.) </b></h5> </td>
  </tr>
  <?php
  $sqlempa="SELECT cee.id_em, cee.id_prod_em, cee.producto_em, cee.unid_em, cee.cantidad_em, cee.dim_ancho_em, cee.dim_largo_em, cee.dim_alto_em, cee.unid_volum_em, cee.vol_unid_em, cee.precio_empaque, cee.costo_empaque, cee.precio_embalaje, cee.costo_embalaje, cee.kilo_embalaje, cee.peso_embalaje FROM cos_expo_empaque AS cee WHERE cee.id_prod_em = '$codigox' ORDER BY cee.id_em ASC";
  $rse = mysql_query($sqlempa);
if (mysql_num_rows($rse) > 0){
	
	echo "<tr>";
	echo "<td bgcolor='#E9E9E9' align='center'>Descripcion del Producto</td>
  <td bgcolor='#E9E9E9' align='center'>Empaque</td>
  <td bgcolor='#E9E9E9' align='center'>Cantidad</td>
  <td bgcolor='#E9E9E9' align='center'>Dimension en Ancho</td>
  <td bgcolor='#E9E9E9' align='center'>Dimension en Largo</td>
  <td bgcolor='#E9E9E9' align='center'>Dimension en Alto</td>
  <td bgcolor='#E9E9E9' align='center'>Volumen por Unidad</td>
  <td bgcolor='#E9E9E9' align='center'>Total Volumen por Unidad</td>
  <td bgcolor='#E9E9E9' align='center'>Total Costo Empaque</td>
   <td bgcolor='#E9E9E9' align='center'>Total Empaque</td>
  <td bgcolor='#E9E9E9' align='center'>Total Costo Embalaje</td>
   <td bgcolor='#E9E9E9' align='center'>Total Embalaje</td>
  <td bgcolor='#E9E9E9' align='center'>Peso Embalaje (Kg.)</td>
   <td bgcolor='#E9E9E9' align='center'>Total Peso Embalaje (Kg.)</td>";
	echo "</tr>";
	while($rowe = mysql_fetch_array($rse)){
		$produ_em = $rowe["producto_em"];
		$uni_em = $rowe["unid_em"];
		$canti_em = $rowe["cantidad_em"];
		$dancho_em = $rowe["dim_ancho_em"];
		$dlargo_em = $rowe["dim_largo_em"];
		$dalto_em = $rowe["dim_alto_em"];
		$univol_em = $rowe["unid_volum_em"];
		$tvoluni_em = $rowe["vol_unid_em"];
		$precio_em = $rowe["precio_empaque"];
		$tprecio_em = $rowe["costo_empaque"];
		$precio_emb = $rowe["precio_embalaje"];
		$tprecio_emb = $rowe["costo_embalaje"];
		$kilo_emb = $rowe["kilo_embalaje"];
		$tkilo_emb = $rowe["peso_embalaje"];
		
		echo "<tr>";
		echo "<td>$produ_em</td>";
		echo "<td>$uni_em</td>";
		echo "<td>$canti_em</td>";
		echo "<td>$dancho_em</td>";
		echo "<td>$dlargo_em</td>";
		echo "<td>$dalto_em</td>";
		echo "<td>$univol_em</td>";
		echo "<td>$tvoluni_em</td>";
		echo "<td>$precio_em</td>";
		echo "<td>$tprecio_em</td>";
		echo "<td>$precio_emb</td>";
		echo "<td>$tprecio_emb</td>";
		echo "<td>$kilo_emb</td>";
		echo "<td>$tkilo_emb</td>";
		echo "</tr>";
		
	}
}
  ?>
  </table>
  
  <!-- tabla de paletizacion -->
 <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center"> 
  <tr>
   <td bgcolor="#E9E9E9" colspan="13" align="center"><h5><b>Unitarizacion - Paletizacion (Dimensiones en m.)</b></h5> </td>
  </tr>
  <?php
  $sqlpal="SELECT cep.id_pale, cep.id_prod_pale, cep.producto_pale, cep.unid_carga_pale, cep.cantidad_pale, cep.dim_ancho_pale, cep.dim_largo_pale, cep.dim_alto_pale, cep.vol_unid_pale, cep.tota_volum_pale, cep.costo_unita_pale, cep.tota_unita_pale, cep.peso_pale, cep.tota_peso_pale FROM cos_expo_paletizacion AS cep WHERE cep.id_prod_pale = '$codigox' ORDER BY cep.id_pale ASC";
  $rsp = mysql_query($sqlpal);
if (mysql_num_rows($rsp) > 0){
	echo "<tr>";
	echo "<td bgcolor='#E9E9E9' align='center'>Descripcion del Producto</td>
  <td bgcolor='#E9E9E9' align='center'>Unidad Carga</td>
  <td bgcolor='#E9E9E9' align='center'>Cantidad</td>
  <td bgcolor='#E9E9E9' align='center'>Dimension en Ancho</td>
  <td bgcolor='#E9E9E9' align='center'>Dimension en Largo</td>
  <td bgcolor='#E9E9E9' align='center'>Dimension en Alto</td>
  <td bgcolor='#E9E9E9' align='center'>Volumen por Unidad</td>
  <td bgcolor='#E9E9E9' align='center'>Total Volumen Unidad</td>
  <td bgcolor='#E9E9E9' align='center'>Costo Unitarizacion</td>
  <td bgcolor='#E9E9E9' align='center'>Total Costo Unitarizacion</td>
  <td bgcolor='#E9E9E9' align='center'>Peso Paletizacion (Kg.)</td>
  <td bgcolor='#E9E9E9' align='center'>Total Peso Paletizacion (Kg.)</td>";
	echo "</tr>";
	while($rowp = mysql_fetch_array($rsp)){
		$produ_pal = $rowp["producto_pale"];
		$uni_pal = $rowp["unid_carga_pale"];
		$canti_pal = $rowp["cantidad_pale"];
		$dancho_pal = $rowp["dim_ancho_pale"];
		$dlargo_pal = $rowp["dim_largo_pale"];
		$dalto_pal = $rowp["dim_alto_pale"];
		$voluni_pal = $rowp["vol_unid_pale"];
		$totalvoluni_pal = $rowp["tota_volum_pale"];
		$costo_pal = $rowp["costo_unita_pale"];
		$totalcosto_pal = $rowp["tota_unita_pale"];
		$peso_pal = $rowp["peso_pale"];
		$totalpeso_pal = $rowp["tota_peso_pale"];
		
		echo "<tr>";
		echo "<td>$produ_pal</td>";
		echo "<td>$uni_pal</td>";
		echo "<td>$canti_pal</td>";
		echo "<td>$dancho_pal</td>";
		echo "<td>$dlargo_pal</td>";
		echo "<td>$dalto_pal</td>";
		echo "<td>$voluni_pal</td>";
		echo "<td>$totalvoluni_pal</td>";
		echo "<td>$costo_pal</td>";
		echo "<td>$totalcosto_pal</td>";
		echo "<td>$peso_pal</td>";
		echo "<td>$totalpeso_pal</td>";
		echo "</tr>";
		
	}
}
  ?>
  </table>
  
   <!-- tabla de contenedorizacion -->
  <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td bgcolor="#E9E9E9" colspan="14" align="center"><h5><b>Unitarizacion - Contenedorizacion (Dimensiones en m.)</b></h5> </td>
  </tr>
  <?php
  $sqlconte="SELECT
uni.id_prod_unita,
uni.producto_unita AS descriprod,
uni.contenedor_unita,
uni.condicion_unita,
uni.pulgada,
uni.costo_unita_unita,
cont.contenedor,
cont.carga_pesokg,
cont.carga_volumen,
cont.med_int_largom,
cont.med_int_pies1,
cont.med_int_anchom,
cont.med_int_pies2,
cont.med_int_alturam,
cont.med_int_pies3,
cont.descripcion,
uni.canti_unita
FROM
cos_expo_union_conte AS uni
INNER JOIN cos_contenedor AS cont ON uni.contenedor_unita = cont.codigo
WHERE
uni.id_prod_unita = '$codigox'
ORDER BY
uni.id_unita ASC ";
   $rsnunico = mysql_query($sqlconte);
if (mysql_num_rows($rsnunico) > 0){
	echo "<tr>";
	echo "<td bgcolor='#E9E9E9' align='center'>Descripcion del Producto</td>
  <td bgcolor='#E9E9E9' align='center'>Tipo Contenedor</td>
  <td bgcolor='#E9E9E9' align='center'>Condicion</td>
  <td bgcolor='#E9E9E9' align='center'>Cantidad</td>
  <td bgcolor='#E9E9E9' align='center'>Dimension en Ancho</td>
  <td bgcolor='#E9E9E9' align='center'>Dimension en Largo</td>
  <td bgcolor='#E9E9E9' align='center'>Dimension en Alto</td>
  <td bgcolor='#E9E9E9' align='center'>Pulgadas</td>
  <td bgcolor='#E9E9E9' align='center'>Carga Permisible (Kg.)</td>
  <td bgcolor='#E9E9E9' align='center'>Total Cargar Permisible (Kg.)</td>
  <td bgcolor='#E9E9E9' align='center'>Volumen Permisible</td>
  <td bgcolor='#E9E9E9' align='center'>Total Volumen Permisible</td>
  <td bgcolor='#E9E9E9' align='center'>Costo Unitarizacion</td>
  <td bgcolor='#E9E9E9' align='center'>Total Costo Unitarizacion</td>";
	echo "</tr>";
	while($rowu = mysql_fetch_array($rsnunico)){
		$cprodu = $rowu["id_prod_unita"];
		$codiconte = $rowu["contenedor_unita"];
		
		$nomproduc = $rowu["descriprod"];
		$contenedor = $rowu["contenedor"];
		$condicion = $rowu["condicion_unita"];
		$cantidadconte = $rowu["canti_unita"];
		$ancho_conte = $rowu["med_int_anchom"];
		$largo_conte = $rowu["med_int_largom"];
		$alto_conte = $rowu["med_int_alturam"];
		$pulga = $rowu["pulgada"];
		$cargapeso_conte = $rowu["carga_pesokg"];
		$cargavolu_conte = $rowu["carga_volumen"];
		$costo_conte = $rowu["costo_unita_unita"];
		
		$tota_carga_permi = $cantidadconte * $cargapeso_conte;
		$tota_cargavolu_conte = $cantidadconte * $cargavolu_conte;
		$tota_costo_conte = $cantidadconte * $costo_conte;
		
		echo"<tr>";
		echo "<td>$nomproduc</td>";
		echo "<td>$contenedor</td>";
		echo "<td>$condicion</td>";
		echo "<td>$cantidadconte</td>";
		echo "<td>$ancho_conte</td>";
		echo "<td>$largo_conte</td>";
		echo "<td>$alto_conte</td>";
		echo "<td>$pulga</td>";
		echo "<td>$cargapeso_conte</td>";
		echo "<td>$tota_carga_permi</td>";
		echo "<td>$cargavolu_conte</td>";
		echo "<td>$tota_cargavolu_conte</td>";
		echo "<td>$costo_conte</td>";
		echo "<td>$tota_costo_conte</td>";
		echo"</tr>";
	}
}
  ?>
  </table>
 
  
  <!-- informacion adicional -->
  <?php
  $sqlinfo="SELECT ceo.id_dato, ceo.id_prod, ceo.direfab, ceo.direalmpreemb, ceo.puerto_orig, ceo.punto_cargue, ceo.punto_desemb, ceo.puerto_dest, ceo.direc_alma_ent, ceo.peso_tot, ceo.unid_comer, ceo.volumen_tot FROM cos_expo_otrodatos AS ceo WHERE ceo.id_prod = '$codigox' ";
  $rsnin = mysql_query($sqlinfo);
if (mysql_num_rows($rsnin) > 0){
	while($rowi = mysql_fetch_array($rsnin)){
		$direc_fabrica = $rowi["direfab"];
		$direc_preemb = $rowi["direalmpreemb"];
		$puerto_origen = $rowi["puerto_orig"];
		$punto_carga = $rowi["punto_cargue"];
		$punto_desemb = $rowi["punto_desemb"];
		$puerto_destino = $rowi["puerto_dest"];
		$direc_almacen_entrega = $rowi["direc_alma_ent"];
		$peso_tota = $rowi["peso_tot"];
		$unid_comer = $rowi["unid_comer"];
		$vol_total = $rowi["volumen_tot"];
	}
}
  ?>
 
  <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td bgcolor="#E9E9E9" colspan="4" align="center"><h5><b>Informacion Adicional</b></h5> </td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9" width="20%">Direccion Fabrica :</td><td><?php echo "$direc_fabrica"; ?></td>
  <td bgcolor="#E9E9E9" width="20%">Direccion Almacen Preembarque:</td><td><?php echo "$direc_preemb"; ?></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9">Origen / Pais - Punto de Cargue:</td><td><?php echo "$punto_carga"; ?></td>
  <td bgcolor="#E9E9E9">Puerto Origen:</td> <td><?php echo "$puerto_origen"; ?></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9">Puerto Destino: </td><td><?php echo "$puerto_destino"; ?></td>
  <td bgcolor="#E9E9E9">Destino / Pais - Punto de desembarque / Entrega: </td><td><?php echo "$punto_desemb"; ?></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9">Direccion Almacen Entrega:</td><td><?php echo "$direc_almacen_entrega"; ?></td>
  <td bgcolor="#E9E9E9">Unidades Comerciales:</td><td><?php echo "$unid_comer"; ?></td>
  </tr>
  <tr>
  <td bgcolor="#E9E9E9">Peso Total (Kg. Ton.) :</td><td><?php echo "$peso_tota"; ?></td>
  <td bgcolor="#E9E9E9">Volumen Total Embarque CM3-M3 :</td><td><?php echo "$vol_total"; ?></td>
  </tr>
  </table>

  
  <!-- pais exportador -->
  <?php
  $sqlpaisexpo = "SELECT cep.cod_prod,
cep.man_lo_exp_mar, cep.man_lo_exp_aer, cep.man_lo_exp_ter,
cep.docu_mar, cep.docu_aer, cep.docu_ter, 
cep.transp_mar, cep.transp_aer, cep.transp_ter, 
cep.alm_int_mar, cep.alm_int_aer, cep.alm_int_ter, 
cep.man_preem_mar, cep.man_preem_aer, cep.man_preem_ter, 
cep.man_emb_mar, cep.man_emb_aer, cep.man_emb_ter, 
cep.seguro_mar, cep.seguro_aer, cep.seguro_ter, 
cep.banco_mar, cep.banco_aer, cep.banco_ter, 
cep.agente_mar, cep.agente_aer, cep.agente_ter, 
cep.costo_direc_mar, cep.costo_direc_aer, cep.costo_direc_ter, 
cep.adminis_mar, cep.adminis_aer, cep.adminis_ter, 
cep.capi_inv_mar, cep.capi_inv_aer, cep.capi_inv_ter, 
cep.costo_indir_mar, cep.costo_indir_aer, cep.costo_indir_ter 
FROM cos_expo_paisexpo AS cep WHERE cep.cod_prod = '$codigox'";
  $rsnpe = mysql_query($sqlpaisexpo);
if (mysql_num_rows($rsnpe) > 0){
	while($rowpe = mysql_fetch_array($rsnpe)){
		$mant_local_expo_mar = $rowpe["man_lo_exp_mar"];
		$mant_local_expo_aer = $rowpe["man_lo_exp_aer"];
		$mant_local_expo_terre = $rowpe["man_lo_exp_ter"];
		
		$documen_mar = $rowpe["docu_mar"];
		$documen_aer = $rowpe["docu_aer"];
		$documen_terre = $rowpe["docu_ter"];
		
		$transp_mar = $rowpe["transp_mar"];
		$transp_aer = $rowpe["transp_aer"];
		$transp_terre = $rowpe["transp_ter"];
		
		$almainter_mar = $rowpe["alm_int_mar"];
		$almainter_aer = $rowpe["alm_int_aer"];
		$almainter_terre = $rowpe["alm_int_ter"];
		
		$mani_peemb_mar = $rowpe["man_preem_mar"];
		$mani_peemb_aer = $rowpe["man_preem_aer"];
		$mani_peemb_terre = $rowpe["man_preem_ter"];
		
		$mani_emb_mar = $rowpe["man_emb_mar"];
		$mani_emb_aer = $rowpe["man_emb_aer"];
		$mani_emb_terre = $rowpe["man_emb_ter"];
		
		$seguro_mar = $rowpe["seguro_mar"];
		$seguro_aer = $rowpe["seguro_aer"];
		$seguro_terre = $rowpe["seguro_ter"];
		
		$banco_mar = $rowpe["banco_mar"];
		$banco_aer = $rowpe["banco_aer"];
		$banco_terre = $rowpe["banco_ter"];
		
		$agente_mar = $rowpe["agente_mar"];
		$agente_aer = $rowpe["agente_aer"];
		$agente_terre = $rowpe["agente_ter"];
		
		$admin_mar = $rowpe["adminis_mar"];
		$admin_aer = $rowpe["adminis_aer"];
		$admin_terre = $rowpe["adminis_ter"];
		
		$capinv_mar = $rowpe["capi_inv_mar"];
		$capinv_aer = $rowpe["capi_inv_aer"];
		$capinv_terre = $rowpe["capi_inv_ter"];
		
		$costodir_mar = $rowpe["costo_direc_mar"];
		$costodir_aer = $rowpe["costo_direc_aer"];
		$costodir_terre = $rowpe["costo_direc_ter"];
		
		$costoind_mar = $rowpe["costo_indir_mar"];
		$costoind_aer = $rowpe["costo_indir_aer"];
		$costoind_terre = $rowpe["costo_indir_ter"];
		
		$totalpais_expo_mar = $costodir_mar + $costoind_mar;
		$totalpais_expo_aer = $costodir_aer + $costoind_aer;
		$totalpais_expo_ter = $costodir_terre + $costoind_terre;
		
	}
}
  ?>

   <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td bgcolor="#E9E9E9" colspan="4" align="center"><h5><b>Pais Exportador</b></h5> </td>
  </tr>
  <tr>
  <td bgcolor='#E9E9E9' align="center" width="30%"><b>Rubro</b></td>
  <td bgcolor='#E9E9E9' align="center"><b>Maritimo</b></td>
  <td bgcolor='#E9E9E9' align="center"><b>Aereo</b></td>
  <td bgcolor='#E9E9E9' align="center"><b>Terrestre</b></td>
  </tr>
  <tr>
  <td bgcolor='#E9E9E9' ><b>Total Pais Exportador</b></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$totalpais_expo_mar"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$totalpais_expo_aer"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$totalpais_expo_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#E9E9E9' ><b>Costos Directos</b></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costodir_mar"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costodir_aer"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costodir_terre"; ?></td>
  </tr>
  <tr>
  <td bgcolor="#F7F7F7" >Manipuleo Local Exportador :</td>
  <td align="center"><?php echo "$mant_local_expo_mar"; ?></td>
  <td align="center"><?php echo "$mant_local_expo_aer"; ?></td>
  <td align="center"><?php echo "$mant_local_expo_terre"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Documentacion :</td>
  <td align="center"><?php echo "$documen_mar"; ?></td>
  <td align="center"><?php echo "$documen_aer"; ?></td>
  <td align="center"><?php echo "$documen_terre"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Transporte (Hasta Punto de Embarque) :</td>
  <td  align="center"><?php echo "$transp_mar"; ?></td>
  <td align="center"><?php echo "$transp_aer"; ?></td>
  <td  align="center"><?php echo "$transp_terre"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Almacenamiento Intermedio :</td>
  <td  align="center"><?php echo "$almainter_mar"; ?></td>
  <td align="center"><?php echo "$almainter_aer"; ?></td>
  <td  align="center"><?php echo "$almainter_terre"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Manipuleo Preembarque :</td>
  <td  align="center"><?php echo "$mani_peemb_mar"; ?></td>
  <td  align="center"><?php echo "$mani_peemb_aer"; ?></td>
  <td  align="center"><?php echo "$mani_peemb_terre"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Manipuleo Embarque :</td>
  <td  align="center"><?php echo "$mani_emb_mar"; ?></td>
  <td  align="center"><?php echo "$mani_emb_aer"; ?></td>
  <td align="center"><?php echo "$mani_emb_terre"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Seguro :</td>
  <td  align="center"><?php echo "$seguro_mar"; ?></td>
  <td align="center"><?php echo "$seguro_aer"; ?></td>
  <td  align="center"><?php echo "$seguro_terre"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Bancario :</td>
  <td  align="center"><?php echo "$banco_mar"; ?></td>
  <td  align="center"><?php echo "$banco_aer"; ?></td>
  <td  align="center"><?php echo "$banco_terre"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Agentes : </td>
  <td  align="center"><?php echo "$agente_mar"; ?></td>
  <td  align="center"><?php echo "$agente_aer"; ?></td>
  <td  align="center"><?php echo "$agente_terre"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#E9E9E9' ><b>Costos Indirectos</b></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costoind_mar"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costoind_aer"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costoind_terre"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Administrativo :</td>
  <td  align="center"><?php echo "$admin_mar"; ?></td>
  <td  align="center"><?php echo "$admin_aer"; ?></td>
  <td align="center"><?php echo "$admin_terre"; ?></td>
  </tr>
  <tr>
  <td bgcolor="#F7F7F7">Capital - Inventario :</td>
  <td  align="center"><?php echo "$capinv_mar"; ?></td>
  <td  align="center"><?php echo "$capinv_aer"; ?></td>
  <td align="center"><?php echo "$capinv_terre"; ?></td>
  </tr>
  </table>
 
  
  <!-- transito internacional -->
  <?php
  $sqltran="SELECT cet.cod_prod,
cet.transinter_mar, cet.transinter_aer, cet.transinter_ter,
cet.seguinter_mar, cet.seguinter_aer, cet.seguinter_ter,
cet.mani_desem_mar, cet.mani_desem_aer, cet.mani_desem_ter,
cet.costodire_mar, cet.costodire_aer, cet.costodire_ter,
cet.capi_inve_mar, cet.capi_inve_aer, cet.capi_inve_ter,
cet.costoindi_mar, cet.costoindi_aer, cet.costoindi_ter
FROM cos_expo_transinter AS cet WHERE cet.cod_prod = '$codigox'";
   $rsnt = mysql_query($sqltran);
if (mysql_num_rows($rsnt) > 0){
	while($rowt = mysql_fetch_array($rsnt)){
		$transi_inter_mar = $rowt["transinter_mar"];
		$transi_inter_aer = $rowt["transinter_aer"];
		$transi_inter_ter = $rowt["transinter_ter"];
		
		$seguro_inter_mar = $rowt["seguinter_mar"];
		$seguro_inter_aer = $rowt["seguinter_aer"];
		$seguro_inter_ter = $rowt["seguinter_ter"];
		
		$manidesem_inter_mar = $rowt["mani_desem_mar"];
		$manidesem_inter_aer = $rowt["mani_desem_aer"];
		$manidesem_inter_ter = $rowt["mani_desem_ter"];
		
		$capinv_inter_mar = $rowt["capi_inve_mar"];
		$capinv_inter_aer = $rowt["capi_inve_aer"];
		$capinv_inter_ter = $rowt["capi_inve_ter"];
		
		$costodir_inter_mar = $rowt["costodire_mar"];
		$costodir_inter_aer = $rowt["costodire_aer"];
		$costodir_inter_ter = $rowt["costodire_ter"];
		
		$costoind_inter_mar = $rowt["costoindi_mar"];
		$costoind_inter_aer = $rowt["costoindi_aer"];
		$costoind_inter_ter = $rowt["costoindi_ter"];
		
		$tota_transinter_mar = $costodir_inter_mar + $costoind_inter_mar;
		$tota_transinter_aer = $costodir_inter_aer + $costoind_inter_aer;
		$tota_transinter_ter = $costodir_inter_ter + $costoind_inter_ter;
	}
}
  ?>
   <table border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td bgcolor="#E9E9E9" colspan="4" align="center"><h5><b>Transito Internacional</b></h5> </td>
  </tr>
  <tr>
  <td bgcolor='#E9E9E9' align="center" width="30%"><b>Rubro</b></td>
  <td bgcolor='#E9E9E9' align="center"><b>Maritimo</b></td>
  <td bgcolor='#E9E9E9' align="center"><b>Aereo</b></td>
  <td bgcolor='#E9E9E9' align="center"><b>Terrestre</b></td>
  </tr>
  <tr>
  <td bgcolor='#E9E9E9' ><b>Total Transito Internacional</b></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$tota_transinter_mar"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$tota_transinter_aer"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$tota_transinter_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#E9E9E9' ><b>Costos Directos</b></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costodir_inter_mar"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costodir_inter_aer"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costodir_inter_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor="#F7F7F7" >Transporte Internacional:</td>
  <td align="center"><?php echo "$transi_inter_mar"; ?></td>
  <td align="center"><?php echo "$transi_inter_aer"; ?></td>
  <td align="center"><?php echo "$transi_inter_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Seguro Internacional :</td>
  <td align="center"><?php echo "$seguro_inter_mar"; ?></td>
  <td align="center"><?php echo "$seguro_inter_aer"; ?></td>
  <td align="center"><?php echo "$seguro_inter_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Manipuleo de Desembarque :</td>
  <td  align="center"><?php echo "$manidesem_inter_mar"; ?></td>
  <td align="center"><?php echo "$manidesem_inter_aer"; ?></td>
  <td  align="center"><?php echo "$manidesem_inter_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#E9E9E9' ><b>Costos Indirectos</b></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costoind_inter_mar"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costoind_inter_aer"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costoind_inter_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor="#F7F7F7">Capital - Inventario :</td>
  <td  align="center"><?php echo "$capinv_inter_mar"; ?></td>
  <td  align="center"><?php echo "$capinv_inter_aer"; ?></td>
  <td align="center"><?php echo "$capinv_inter_ter"; ?></td>
  </tr>
  </table>
 
  <!-- pais importador -->
  <?php
  $sqlpaimpo="SELECT cepi.cod_prod,
cepi.transconv_mar, cepi.transconv_aer, cepi.transconv_ter,
cepi.alma_mar, cepi.alma_aer, cepi.alma_ter,
cepi.segu_mar, cepi.segu_aer, cepi.segu_ter,
cepi.docume_mar, cepi.docume_aer, cepi.docume_ter,
cepi.aduan_mar, cepi.aduan_aer, cepi.aduan_ter,
cepi.agen_mar, cepi.agen_aer, cepi.agen_ter,
cepi.banca_mar, cepi.banca_aer, cepi.banca_ter,
cepi.costodire_mar, cepi.costodire_aer, cepi.costodire_ter,
cepi.capi_inve_mar, cepi.capi_inve_aer, cepi.capi_inve_ter,
cepi.costoindi_mar, cepi.costoindi_aer, cepi.costoindi_ter
FROM cos_expo_paisimpo AS cepi WHERE cepi.cod_prod = '$codigox'";
   $rsnimp = mysql_query($sqlpaimpo);
if (mysql_num_rows($rsnimp) > 0){
	while($rowimp = mysql_fetch_array($rsnimp)){
		$trans_lug_pimp_mar = $rowimp["transconv_mar"];
		$trans_lug_pimp_mar = $rowimp["transconv_aer"];
		$trans_lug_pimp_mar = $rowimp["transconv_ter"];
		
		$alma_pimp_mar = $rowimp["alma_mar"];
		$alma_pimp_aer = $rowimp["alma_aer"];
		$alma_pimp_ter = $rowimp["alma_ter"];
		
		$seguro_pimp_mar = $rowimp["segu_mar"];
		$seguro_pimp_aer = $rowimp["segu_aer"];
		$seguro_pimp_ter = $rowimp["segu_ter"];
		
		$docum_pimp_mar = $rowimp["docume_mar"];
		$docum_pimp_aer = $rowimp["docume_aer"];
		$docum_pimp_ter = $rowimp["docume_ter"];
		
		$adua_pimp_mar = $rowimp["aduan_mar"];
		$adua_pimp_aer = $rowimp["aduan_aer"];
		$adua_pimp_ter = $rowimp["aduan_ter"];
		
		$agen_pimp_mar = $rowimp["agen_mar"];
		$agen_pimp_aer = $rowimp["agen_aer"];
		$agen_pimp_ter = $rowimp["agen_ter"];
		
		$banca_pimp_mar = $rowimp["banca_mar"];
		$banca_pimp_aer = $rowimp["banca_aer"];
		$banca_pimp_ter = $rowimp["banca_ter"];
		
		$capinv_pimp_mar = $rowimp["capi_inve_mar"];
		$capinv_pimp_aer = $rowimp["capi_inve_aer"];
		$capinv_pimp_ter = $rowimp["capi_inve_ter"];
		
		$costodir_pimp_mar = $rowimp["costodire_mar"];
		$costodir_pimp_aer = $rowimp["costodire_aer"];
		$costodir_pimp_ter = $rowimp["costodire_ter"];
		
		$costoind_pimp_mar = $rowimp["costoindi_mar"];
		$costoind_pimp_aer = $rowimp["costoindi_aer"];
		$costoind_pimp_ter = $rowimp["costoindi_ter"];
		
		$totalpais_impo_mar = $costodir_pimp_mar + $costoind_pimp_mar;
		$totalpais_impo_aer = $costodir_pimp_aer + $costoind_pimp_aer;
		$totalpais_impo_ter = $costodir_pimp_ter + $costoind_pimp_ter;
		
		
	}
}
  ?>
  <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td bgcolor="#E9E9E9" colspan="4" align="center"><h5><b>Pais Importador</b></h5> </td>
  </tr>
  <tr>
  <td bgcolor='#E9E9E9' align="center" width="30%"><b>Rubro</b></td>
  <td bgcolor='#E9E9E9' align="center"><b>Maritimo</b></td>
  <td bgcolor='#E9E9E9' align="center"><b>Aereo</b></td>
  <td bgcolor='#E9E9E9' align="center"><b>Terrestre</b></td>
  </tr>
  <tr>
  <td bgcolor='#E9E9E9' ><b>Total Pais Importador</b></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$totalpais_impo_mar"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$totalpais_impo_aer"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$totalpais_impo_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#E9E9E9' ><b>Costos Directos</b></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costodir_pimp_mar"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costodir_pimp_aer"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costodir_pimp_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor="#F7F7F7" >Transporte Lugar Convenido Comprador :</td>
  <td align="center"><?php echo "$alma_pimp_mar"; ?></td>
  <td align="center"><?php echo "$alma_pimp_aer"; ?></td>
  <td align="center"><?php echo "$alma_pimp_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Almacenamiento :</td>
  <td align="center"><?php echo "$alma_pimp_mar"; ?></td>
  <td align="center"><?php echo "$alma_pimp_aer"; ?></td>
  <td align="center"><?php echo "$alma_pimp_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Seguro :</td>
  <td  align="center"><?php echo "$seguro_pimp_mar"; ?></td>
  <td align="center"><?php echo "$seguro_pimp_aer"; ?></td>
  <td  align="center"><?php echo "$seguro_pimp_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Documentacion :</td>
  <td  align="center"><?php echo "$docum_pimp_mar"; ?></td>
  <td align="center"><?php echo "$docum_pimp_aer"; ?></td>
  <td  align="center"><?php echo "$docum_pimp_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Aduaneros (Impuestos) :</td>
  <td  align="center"><?php echo "$adua_pimp_mar"; ?></td>
  <td  align="center"><?php echo "$adua_pimp_aer"; ?></td>
  <td  align="center"><?php echo "$adua_pimp_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Agentes :</td>
  <td  align="center"><?php echo "$agen_pimp_mar"; ?></td>
  <td  align="center"><?php echo "$agen_pimp_aer"; ?></td>
  <td align="center"><?php echo "$agen_pimp_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >Bancario :</td>
  <td  align="center"><?php echo "$banca_pimp_mar"; ?></td>
  <td  align="center"><?php echo "$banca_pimp_aer"; ?></td>
  <td  align="center"><?php echo "$banca_pimp_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#E9E9E9' ><b>Costos Indirectos</b></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costoind_pimp_mar"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costoind_pimp_aer"; ?></td>
  <td bgcolor='#E9E9E9' align="center"><?php echo "$costoind_pimp_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor="#F7F7F7">Capital - Inventario :</td>
  <td  align="center"><?php echo "$capinv_pimp_mar"; ?></td>
  <td  align="center"><?php echo "$capinv_pimp_aer"; ?></td>
  <td align="center"><?php echo "$capinv_pimp_ter"; ?></td>
  </tr>
  </table>
  
  <!-- costos totales -->
  <?php
  $sqlvalor="SELECT cect.cod_prod,
cect.valor_exw_mar, cect.valor_exw_aer, cect.valor_exw_ter,
cect.valor_fac_mar, cect.valor_fac_aer, cect.valor_fac_ter,
cect.valor_dap1_mar, cect.valor_dap1_aer, cect.valor_dap1_ter,
cect.valor_fas_mar, cect.valor_fas_aer, cect.valor_fas_ter,
cect.valor_fob_mar, cect.valor_fob_aer, cect.valor_fob_ter,
cect.valor_cfr_mar, cect.valor_cfr_aer, cect.valor_cfr_ter,
cect.valor_cpt_mar, cect.valor_cpt_aer, cect.valor_cpt_ter,
cect.valor_cif_mar, cect.valor_cif_aer, cect.valor_cif_ter,
cect.valor_cip_mar, cect.valor_cip_aer, cect.valor_cip_ter,
cect.valor_dap2_mar, cect.valor_dap2_aer, cect.valor_dap2_ter,
cect.valor_dat_mar, cect.valor_dat_aer, cect.valor_dat_ter,
cect.valor_dap3_mar, cect.valor_dap3_aer, cect.valor_dap3_ter,
cect.valor_ddp_mar, cect.valor_ddp_aer, cect.valor_ddp_ter
FROM cos_expo_costotota AS cect WHERE cect.cod_prod = '$codigox'";
  $rsnval = mysql_query($sqlvalor);
if (mysql_num_rows($rsnval) > 0){
	while($rowval = mysql_fetch_array($rsnval)){
		$valor_exw_mar = $rowval["valor_exw_mar"];
		$valor_exw_aer = $rowval["valor_exw_aer"];
		$valor_exw_ter = $rowval["valor_exw_ter"];
		
		$valor_fca_mar = $rowval["valor_fac_mar"];
		$valor_fca_aer = $rowval["valor_fac_aer"];
		$valor_fca_ter = $rowval["valor_fac_ter"];
		
		$valor_dap1_mar = $rowval["valor_dap1_mar"];
		$valor_dap1_aer = $rowval["valor_dap1_aer"];
		$valor_dap1_ter = $rowval["valor_dap1_ter"];
		
		$valor_fas_mar = $rowval["valor_fas_mar"];
		$valor_fas_aer = $rowval["valor_fas_aer"];
		$valor_fas_ter = $rowval["valor_fas_ter"];
		
		$valor_fob_mar = $rowval["valor_fob_mar"];
		$valor_fob_aer = $rowval["valor_fob_aer"];
		$valor_fob_ter = $rowval["valor_fob_ter"];
		
		$valor_cfr_mar = $rowval["valor_cfr_mar"];
		$valor_cfr_aer = $rowval["valor_cfr_aer"];
		$valor_cfr_ter = $rowval["valor_cfr_ter"];
		
		$valor_cpt_mar = $rowval["valor_cpt_mar"];
		$valor_cpt_aer = $rowval["valor_cpt_aer"];
		$valor_cpt_ter = $rowval["valor_cpt_ter"];
		
		$valor_cif_mar = $rowval["valor_cif_mar"];
		$valor_cif_aer = $rowval["valor_cif_aer"];
		$valor_cif_ter = $rowval["valor_cif_ter"];
		
		$valor_cip_mar = $rowval["valor_cip_mar"];
		$valor_cip_aer = $rowval["valor_cip_aer"];
		$valor_cip_ter = $rowval["valor_cip_ter"];
		
		$valor_dap2_mar = $rowval["valor_dap2_mar"];
		$valor_dap2_aer = $rowval["valor_dap2_aer"];
		$valor_dap2_ter = $rowval["valor_dap2_ter"];
		
		$valor_dat_mar = $rowval["valor_dat_mar"];
		$valor_dat_aer = $rowval["valor_dat_aer"];
		$valor_dat_ter = $rowval["valor_dat_ter"];
		
		$valor_dap3_mar = $rowval["valor_dap3_mar"];
		$valor_dap3_aer = $rowval["valor_dap3_aer"];
		$valor_dap3_ter = $rowval["valor_dap3_ter"];
		
		$valor_ddp_mar = $rowval["valor_ddp_mar"];
		$valor_ddp_aer = $rowval["valor_ddp_aer"];
		$valor_ddp_ter = $rowval["valor_ddp_ter"];
	}
}
  ?>
  <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td bgcolor="#E9E9E9" colspan="4" align="center"><h5><b>Costos Totales</b></h5> </td>
  </tr>
   <tr>
  <td bgcolor='#E9E9E9' align="center" width="30%"><b>Costos Totales</b></td>
  <td bgcolor='#E9E9E9' align="center"><b>Maritimo</b></td>
  <td bgcolor='#E9E9E9' align="center"><b>Aereo</b></td>
  <td bgcolor='#E9E9E9' align="center"><b>Terrestre</b></td>
  </tr>
  <tr>
  <td bgcolor="#F7F7F7" >VALOR EXW :</td>
  <td align="center"><?php echo "$valor_exw_mar"; ?></td>
  <td align="center"><?php echo "$valor_exw_aer"; ?></td>
  <td align="center"><?php echo "$valor_exw_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >VALOR FCA. No Incluye Embarque  :</td>
  <td align="center"><?php echo "$valor_fca_mar"; ?></td>
  <td align="center"><?php echo "$valor_fca_aer"; ?></td>
  <td align="center"><?php echo "$valor_fca_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >VALOR DAP* :</td>
  <td  align="center"><?php echo "$valor_dap1_mar"; ?></td>
  <td align="center"><?php echo "$valor_dap1_aer"; ?></td>
  <td  align="center"><?php echo "$valor_dap1_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >VALOR FAS  No Incluye Embarque :</td>
  <td  align="center"><?php echo "$valor_fas_mar"; ?></td>
  <td align="center"><?php echo "$valor_fas_aer"; ?></td>
  <td  align="center"><?php echo "$valor_fas_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >VALOR FOB  :</td>
  <td  align="center"><?php echo "$valor_fob_mar"; ?></td>
  <td  align="center"><?php echo "$valor_fob_aer"; ?></td>
  <td  align="center"><?php echo "$valor_fob_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >VALOR CFR :</td>
  <td  align="center"><?php echo "$valor_cfr_mar"; ?></td>
  <td  align="center"><?php echo "$valor_cfr_aer"; ?></td>
  <td align="center"><?php echo "$valor_cfr_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >VALOR CPT :</td>
  <td  align="center"><?php echo "$valor_cpt_mar"; ?></td>
  <td  align="center"><?php echo "$valor_cpt_aer"; ?></td>
  <td  align="center"><?php echo "$valor_cpt_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >VALOR CIF :</td>
  <td  align="center"><?php echo "$valor_cif_mar"; ?></td>
  <td  align="center"><?php echo "$valor_cif_aer"; ?></td>
  <td  align="center"><?php echo "$valor_cif_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >VALOR CIP :</td>
  <td  align="center"><?php echo "$valor_cip_mar"; ?></td>
  <td  align="center"><?php echo "$valor_cip_aer"; ?></td>
  <td  align="center"><?php echo "$valor_cip_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >VALOR  DAP** No Incluye Desembarque :</td>
  <td  align="center"><?php echo "$valor_dap2_mar"; ?></td>
  <td  align="center"><?php echo "$valor_dap2_aer"; ?></td>
  <td  align="center"><?php echo "$valor_dap2_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >VALOR DAT :</td>
  <td  align="center"><?php echo "$valor_dat_mar"; ?></td>
  <td  align="center"><?php echo "$valor_dat_aer"; ?></td>
  <td  align="center"><?php echo "$valor_dat_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >VALOR  DAP***  :</td>
  <td  align="center"><?php echo "$valor_dap3_mar"; ?></td>
  <td  align="center"><?php echo "$valor_dap3_aer"; ?></td>
  <td  align="center"><?php echo "$valor_dap3_ter"; ?></td>
  </tr>
  <tr>
  <td bgcolor='#F7F7F7' >VALOR DDP TOTAL :</td>
  <td  align="center"><?php echo "$valor_ddp_mar"; ?></td>
  <td  align="center"><?php echo "$valor_ddp_aer"; ?></td>
  <td  align="center"><?php echo "$valor_ddp_ter"; ?></td>
  </tr>
  </table>
  
  <!-- costo unitario maritimo por item -->
  <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td class="btn-primary" colspan="17" align="center"><h5><b>Costos Unitarios Maritimo (Total por Item)</b></h5> </td>
  </tr>
  <?php
  $sqlmariA="SELECT cepdet.id_detalle, cepdet.id_prod, cepdet.partidaA, cepdet.partidaB, cepdet.nomproducto, cepdet.cantidad, cepdet.unidad_comerc, cepdet.peso_unidad_kg, cepdet.peso_total_kg, cepdet.valor_factura, cepdet.total_factura, cepdet.porcent_costo, cepdet.distri_costo_mar, cepdet.distri_costo_aer, cepdet.distri_costo_ter FROM cos_expo_prod_detalle AS cepdet WHERE cepdet.id_prod = '$codigox' ORDER BY cepdet.id_detalle ASC";
   $rsnmar1 = mysql_query($sqlmariA);
if (mysql_num_rows($rsnmar1) > 0){
	echo "<tr>";
	echo "<td bgcolor='#E9E9E9' align='center'>Descripcion del Producto</td>
  <td bgcolor='#E9E9E9' align='center'>Unidad Comercial</td>
  <td bgcolor='#E9E9E9' align='center'>Cantidad</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ex-Works</td>
  <td bgcolor='#E9E9E9' align='center'>Total ExWorks</td>
  <td bgcolor='#E9E9E9' align='center'>Distribucion % Costo</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Fca.</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Fas. </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Fob.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cfr.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cpt.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cif.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cip.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor  Dap** </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Dat. </td>
  <td bgcolor='#E9E9E9' align='center'>Valor  Dap*** </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ddp Total </td>
  ";
	echo "</tr>";
	while($rowmar1 = mysql_fetch_array($rsnmar1)){
		
		$mar1_nomprod = $rowmar1["nomproducto"];
		$mar1_unicomer = $rowmar1["unidad_comerc"];
		$mar1_canti = $rowmar1["cantidad"];
		$mar1_valexw = $rowmar1["valor_factura"];
		$mar1_tota_valexw = $rowmar1["total_factura"];
		$mar1_disticosto = $rowmar1["distri_costo_mar"];
		$porcentaje_mar1_disticosto = $mar1_disticosto / 100;
		
		$totalcanti = $totalcanti + $mar1_canti;
		$totalvalexw = $totalvalexw + $mar1_tota_valexw;
		$totalval_pocent = $totalval_pocent + $mar1_disticosto;
		
		$valfca = $valor_fca_mar * $porcentaje_mar1_disticosto;
		$totalfca = $totalfca + $valfca;
		
		$valfas = $valor_fas_mar * $porcentaje_mar1_disticosto;
		$totalfas = $totalfas + $valfas;
		
		$valfob = $valor_fob_mar * $porcentaje_mar1_disticosto;
		$totalfob = $totalfob + $valfob;
		
		$valcfr = $valor_cfr_mar * $porcentaje_mar1_disticosto;
		$totalcfr = $totalcfr + $valcfr;
		
		$valcpt = $valor_cpt_mar * $porcentaje_mar1_disticosto;
		$totalcpt = $totalcpt + $valcpt;
		
		$valcif = $valor_cif_mar * $porcentaje_mar1_disticosto;
		$totalcif = $totalcif + $valcif;
		
		$valcip = $valor_cip_mar * $porcentaje_mar1_disticosto;
		$totalcip = $totalcip + $valcip;
		
		$valdap2 = $valor_dap2_mar * $porcentaje_mar1_disticosto;
		$totaldap2 = $totaldap2 + $valdap2;
		
		$valdat = $valor_dat_mar * $porcentaje_mar1_disticosto;
		$totaldat = $totaldat + $valdat;
		
		$valdap3 = $valor_dap3_mar * $porcentaje_mar1_disticosto;
		$totaldap3 = $totaldap3 + $valdap3;
		
		$valddp = $valor_ddp_mar * $porcentaje_mar1_disticosto;
		$totalddp = $totalddp + $valddp;
		
		echo "<tr>";
		echo "<td>$mar1_nomprod</td>";
		echo "<td align='center'>$mar1_unicomer</td>";
		echo "<td align='center'>$mar1_canti</td>";
		echo "<td align='center'>$mar1_valexw</td>";
		echo "<td align='center'>$mar1_tota_valexw</td>";
		echo "<td align='center'>$mar1_disticosto %</td>";
		echo "<td align='center'>".number_format("$valfca",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valfas",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valfob",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valcfr",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valcpt",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valcif",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valcip",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valdap2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valdat",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valdap3",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valddp",2,".",",")."</td>";
		echo "</tr>";
	}
	echo "<tr>";
	echo "<td bgcolor='#F7F7F7' align='center' colspan='2'><b>Totales: </b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>$totalcanti</b></td>";
	echo "<td bgcolor='#F7F7F7' > </td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalvalexw",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalval_pocent",2,".",",")." %</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalfca",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalfas",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalfob",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalcfr",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalcpt",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalcif",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalcip",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totaldap2",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totaldat",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totaldap3",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalddp",2,".",",")."</b></td>";
	echo "</tr>";
}
  ?>
  </table>
  
   <!-- costo unitario maritimo total por unidad comercial -->
  <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td class="btn-primary" colspan="17" align="center"><h5><b>Costos Unitarios Maritimo (Total por Unidad comercial)</b></h5> </td>
  </tr>
  
  <?php
  $sqlmariB="SELECT cepdet.id_detalle, cepdet.id_prod, cepdet.partidaA, cepdet.partidaB, cepdet.nomproducto, cepdet.cantidad, cepdet.unidad_comerc, cepdet.peso_unidad_kg, cepdet.peso_total_kg, cepdet.valor_factura, cepdet.total_factura, cepdet.porcent_costo, cepdet.distri_costo_mar, cepdet.distri_costo_aer, cepdet.distri_costo_ter FROM cos_expo_prod_detalle AS cepdet WHERE cepdet.id_prod = '$codigox' ORDER BY cepdet.id_detalle ASC";
   $rsnmar2 = mysql_query($sqlmariB);
if (mysql_num_rows($rsnmar2) > 0){
	echo "<tr>";
	echo "<td bgcolor='#E9E9E9' align='center'>Descripcion del Producto</td>
  <td bgcolor='#E9E9E9' align='center'>Unidad Comercial</td>
  <td bgcolor='#E9E9E9' align='center'>Cantidad</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ex-Works</td>
  <td bgcolor='#E9E9E9' align='center'>Total ExWorks</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Fca.</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Fas. </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Fob.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cfr.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cpt.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cif.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cip.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor  Dap** </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Dat. </td>
  <td bgcolor='#E9E9E9' align='center'>Valor  Dap*** </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ddp Total </td>
  ";
	echo "</tr>";
	while($rowmar2 = mysql_fetch_array($rsnmar2)){
		
		$mar1_nomprod2 = $rowmar2["nomproducto"];
		$mar1_unicomer2 = $rowmar2["unidad_comerc"];
		$mar1_canti2 = $rowmar2["cantidad"];
		$mar1_valexw2 = $rowmar2["valor_factura"];
		$mar1_tota_valexw2 = $rowmar2["total_factura"];
		$mar1_disticosto2 = $rowmar2["distri_costo_mar"];
		$porcentaje_mar1_disticosto2 = $mar1_disticosto2 / 100;
		
		$valfca2 = $valor_fca_mar * $porcentaje_mar1_disticosto2;
		$totalfca2 = $valfca2 / $mar1_canti2;
		
		$valfas2 = $valor_fas_mar * $porcentaje_mar1_disticosto2;
		$totalfas2 = $valfas2 / $mar1_canti2;
		
		$valfob2 = $valor_fob_mar * $porcentaje_mar1_disticosto2;
		$totalfob2 = $valfob2 / $mar1_canti2;
		
		$valcfr2 = $valor_cfr_mar * $porcentaje_mar1_disticosto2;
		$totalcfr2 = $valcfr2 / $mar1_canti2;
		
		$valcpt2 = $valor_cpt_mar * $porcentaje_mar1_disticosto2;
		$totalcpt2 = $valcpt2 / $mar1_canti2;
		
		$valcif2 = $valor_cif_mar * $porcentaje_mar1_disticosto2;
		$totalcif2 = $valcif2 / $mar1_canti2;
		
		$valcip2 = $valor_cip_mar * $porcentaje_mar1_disticosto2;
		$totalcip2 = $valcip2 / $mar1_canti2;
		
		$valdap2x = $valor_dap2_mar * $porcentaje_mar1_disticosto2;
		$totaldap2x = $valdap2x / $mar1_canti2;
		
		$valdat2 = $valor_dat_mar * $porcentaje_mar1_disticosto2;
		$totaldat2 = $valdat2 / $mar1_canti2;
		
		$valdap3x = $valor_dap3_mar * $porcentaje_mar1_disticosto2;
		$totaldap3x = $valdap3x / $mar1_canti2;
		
		$valddp2 = $valor_ddp_mar * $porcentaje_mar1_disticosto2;
		$totalddp2 = $valddp2 / $mar1_canti2;
		
		echo "<tr>";
		echo "<td>$mar1_nomprod</td>";
		echo "<td align='center'>$mar1_unicomer2</td>";
		echo "<td align='center'>$mar1_canti2</td>";
		echo "<td align='center'>$mar1_valexw2</td>";
		echo "<td align='center'>$mar1_tota_valexw2</td>";
		echo "<td align='center'>".number_format("$totalfca2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalfas2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalfob2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalcfr2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalcpt2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalcif2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalcip2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totaldap2x",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totaldat2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totaldap3x",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalddp2",2,".",",")."</td>";
		echo "</tr>";
	}
	
}
  ?>
  </table>
  
   <!-- costo unitario maritimo variables -->
  <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td class="btn-primary" colspan="17" align="center"><h5><b>Costos Unitarios Marítimo (Var%)</b></h5> </td>
  </tr>
  <?php
  $sqlmariC="SELECT cepdet.id_detalle, cepdet.id_prod, cepdet.partidaA, cepdet.partidaB, cepdet.nomproducto, cepdet.cantidad, cepdet.unidad_comerc, cepdet.peso_unidad_kg, cepdet.peso_total_kg, cepdet.valor_factura, cepdet.total_factura, cepdet.porcent_costo, cepdet.distri_costo_mar, cepdet.distri_costo_aer, cepdet.distri_costo_ter FROM cos_expo_prod_detalle AS cepdet WHERE cepdet.id_prod = '$codigox' ORDER BY cepdet.id_detalle ASC";
   $rsnmar3 = mysql_query($sqlmariC);
if (mysql_num_rows($rsnmar3) > 0){
	echo "<tr>";
	echo "<td bgcolor='#E9E9E9' align='center'>Descripcion del Producto</td>
  <td bgcolor='#E9E9E9' align='center'>Unidad Comercial</td>
  <td bgcolor='#E9E9E9' align='center'>Cantidad</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ex-Works</td>
  <td bgcolor='#E9E9E9' align='center'>Total ExWorks</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Fca.</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Fas. </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Fob.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cfr.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cpt.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cif.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cip.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor  Dap** </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Dat. </td>
  <td bgcolor='#E9E9E9' align='center'>Valor  Dap*** </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ddp Total </td>
  ";
	echo "</tr>";
	while($rowmar3 = mysql_fetch_array($rsnmar3)){
		
		$mar1_nomprod3 = $rowmar3["nomproducto"];
		$mar1_unicomer3 = $rowmar3["unidad_comerc"];
		$mar1_canti3 = $rowmar3["cantidad"];
		$mar1_valexw3 = $rowmar3["valor_factura"];
		$mar1_tota_valexw3 = $rowmar3["total_factura"];
		$mar1_disticosto3 = $rowmar3["distri_costo_mar"];
		$porcentaje_mar1_disticosto3 = $mar1_disticosto3 / 100;
		
		$valfca3 = $valor_fca_mar * $porcentaje_mar1_disticosto3;
		$totalfca3 = $valfca3 / $mar1_canti3;
		$porcentajefca = (($totalfca3 / $mar1_valexw3) * 100) - 100;
		
		$valfas3 = $valor_fas_mar * $porcentaje_mar1_disticosto3;
		$totalfas3 = $valfas3 / $mar1_canti3;
		$porcentajefas = (($totalfas3 / $mar1_valexw3) * 100) - 100;
		
		$valfob3 = $valor_fob_mar * $porcentaje_mar1_disticosto3;
		$totalfob3 = $valfob3 / $mar1_canti3;
		$porcentajefob = (($totalfob3 / $mar1_valexw3) * 100) - 100;
		
		$valcfr3 = $valor_cfr_mar * $porcentaje_mar1_disticosto3;
		$totalcfr3 = $valcfr3 / $mar1_canti3;
		$porcentajecfr = (($totalcfr3 / $mar1_valexw3) * 100) - 100;
		
		$valcpt3 = $valor_cpt_mar * $porcentaje_mar1_disticosto3;
		$totalcpt3 = $valcpt3 / $mar1_canti3;
		$porcentajecpt = (($totalcpt3 / $mar1_valexw3) * 100) - 100;
		
		$valcif3 = $valor_cif_mar * $porcentaje_mar1_disticosto3;
		$totalcif3 = $valcif3 / $mar1_canti3;
		$porcentajecif = (($totalcif3 / $mar1_valexw3) * 100) - 100;
		
		$valcip3 = $valor_cip_mar * $porcentaje_mar1_disticosto3;
		$totalcip3 = $valcip3 / $mar1_canti3;
		$porcentajecip = (($totalcip3 / $mar1_valexw3) * 100) - 100;
		
		$valdap2x3 = $valor_dap2_mar * $porcentaje_mar1_disticosto3;
		$totaldap2x3 = $valdap2x3 / $mar1_canti3;
		$porcentajedap3 = (($totaldap2x3 / $mar1_valexw3) * 100) - 100;
		
		$valdat3 = $valor_dat_mar * $porcentaje_mar1_disticosto3;
		$totaldat3 = $valdat3 / $mar1_canti3;
		$porcentajedat3 = (($totaldat3 / $mar1_valexw3) * 100) - 100;
		
		$valdap3x3 = $valor_dap3_mar * $porcentaje_mar1_disticosto3;
		$totaldap3x3 = $valdap3x3 / $mar1_canti3;
		$porcentajedap33 = (($totaldap3x3 / $mar1_valexw3) * 100) - 100;
		
		$valddp3 = $valor_ddp_mar * $porcentaje_mar1_disticosto3;
		$totalddp3 = $valddp3 / $mar1_canti3;
		$porcentajeddp3 = (($totalddp3 / $mar1_valexw3) * 100) - 100;
		
		echo "<tr>";
		echo "<td>$mar1_nomprod</td>";
		echo "<td align='center'>$mar1_unicomer2</td>";
		echo "<td align='center'>$mar1_canti2</td>";
		echo "<td align='center'>$mar1_valexw2</td>";
		echo "<td align='center'>$mar1_tota_valexw2</td>";
		echo "<td align='center'>".number_format("$porcentajefca",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajefas",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajefob",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajecfr",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajecpt",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajecif",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajecip",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajedap3",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajedat3",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajedap33",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajeddp3",0,".",",")."%</td>";
		echo "</tr>";
	}
	
}
  ?>
  </table>
  
  
  <!-- costo unitario aereo (total por item) -->
  <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td class="btn-info" colspan="17" align="center"><h5><b>Costos Unitarios Aereo (Total por Item)</b></h5> </td>
  </tr>
  <?php
  $sqlaereoA="SELECT cepdet.id_detalle, cepdet.id_prod, cepdet.partidaA, cepdet.partidaB, cepdet.nomproducto, cepdet.cantidad, cepdet.unidad_comerc, cepdet.peso_unidad_kg, cepdet.peso_total_kg, cepdet.valor_factura, cepdet.total_factura, cepdet.porcent_costo, cepdet.distri_costo_mar, cepdet.distri_costo_aer, cepdet.distri_costo_ter FROM cos_expo_prod_detalle AS cepdet WHERE cepdet.id_prod = '$codigox' ORDER BY cepdet.id_detalle ASC";
   $rsnaer1 = mysql_query($sqlaereoA);
if (mysql_num_rows($rsnaer1) > 0){
	echo "<tr>";
	echo "<td bgcolor='#E9E9E9' align='center'>Descripcion del Producto</td>
  <td bgcolor='#E9E9E9' align='center'>Unidad Comercial</td>
  <td bgcolor='#E9E9E9' align='center'>Cantidad</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ex-Works</td>
  <td bgcolor='#E9E9E9' align='center'>Total ExWorks</td>
  <td bgcolor='#E9E9E9' align='center'>Distribucion % Costo</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Fca.</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cpt.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cip.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Dat. </td>
  <td bgcolor='#E9E9E9' align='center'>Valor  Dap*** </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ddp Total </td>
  ";
	echo "</tr>";
	while($rowaer1 = mysql_fetch_array($rsnaer1)){
		
		$aer1_nomprod = $rowaer1["nomproducto"];
		$aer1_unicomer = $rowaer1["unidad_comerc"];
		$aer1_canti = $rowaer1["cantidad"];
		$aer1_valexw = $rowaer1["valor_factura"];
		$aer1_tota_valexw = $rowaer1["total_factura"];
		$aer1_disticosto = $rowaer1["distri_costo_aer"];
		$porcentaje_aer1_disticosto = $aer1_disticosto / 100;
		
		$totalcantiaer = $totalcantiaer + $aer1_canti;
		$totalvalexw_aer = $totalvalexw_aer + $aer1_tota_valexw;
		$totalval_pocent_aer = $totalval_pocent_aer + $aer1_disticosto;
		
		$valfca_aer = $valor_fca_aer * $porcentaje_aer1_disticosto;
		$totalfca_aer = $totalfca_aer + $valfca_aer;
		
		$valcpt_aer = $valor_cpt_aer * $porcentaje_aer1_disticosto;
		$totalcpt_aer = $totalcpt_aer + $valcpt_aer;
		
		$valcip_aer = $valor_cip_aer * $porcentaje_aer1_disticosto;
		$totalcip_aer = $totalcip_aer + $valcip_aer;
		
		$valdat_aer = $valor_dat_aer * $porcentaje_aer1_disticosto;
		$totaldat_aer = $totaldat_aer + $valdat_aer;
		
		$valdap3_aer = $valor_dap3_aer * $porcentaje_aer1_disticosto;
		$totaldap3_aer = $totaldap3_aer + $valdap3_aer;
		
		$valddp_aer = $valor_ddp_aer * $porcentaje_aer1_disticosto;
		$totalddp_aer = $totalddp_aer + $valddp_aer;
		
		echo "<tr>";
		echo "<td>$aer1_nomprod</td>";
		echo "<td align='center'>$aer1_unicomer</td>";
		echo "<td align='center'>$aer1_canti</td>";
		echo "<td align='center'>$aer1_valexw</td>";
		echo "<td align='center'>$aer1_tota_valexw</td>";
		echo "<td align='center'>".number_format("$aer1_disticosto",2,".",",")." %</td>";
		echo "<td align='center'>".number_format("$valfca_aer",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valcpt_aer",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valcip_aer",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valdat_aer",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valdap3_aer",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valddp_aer",2,".",",")."</td>";
		echo "</tr>";
	}
	echo "<tr>";
	echo "<td bgcolor='#F7F7F7' align='center' colspan='2'><b>Totales: </b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>$totalcanti</b></td>";
	echo "<td bgcolor='#F7F7F7' > </td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalvalexw_aer",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalval_pocent",2,".",",")." %</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalfca_aer",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalcpt_aer",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalcip_aer",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totaldat_aer",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totaldap3_aer",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalddp_aer",2,".",",")."</b></td>";
	echo "</tr>";
}
  ?>
  </table>
  
  
  <!-- Costos Unitarios Aéreo (Total por Unidad comercial) -->
  <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td class="btn-info" colspan="17" align="center"><h5><b>Costos Unitarios Aereo (Total por Unidad Comercial)</b></h5> </td>
  </tr>
  <?php
  $sqlaereoB="SELECT cepdet.id_detalle, cepdet.id_prod, cepdet.partidaA, cepdet.partidaB, cepdet.nomproducto, cepdet.cantidad, cepdet.unidad_comerc, cepdet.peso_unidad_kg, cepdet.peso_total_kg, cepdet.valor_factura, cepdet.total_factura, cepdet.porcent_costo, cepdet.distri_costo_mar, cepdet.distri_costo_aer, cepdet.distri_costo_ter FROM cos_expo_prod_detalle AS cepdet WHERE cepdet.id_prod = '$codigox' ORDER BY cepdet.id_detalle ASC";
   $rsnaer2 = mysql_query($sqlaereoB);
if (mysql_num_rows($rsnaer2) > 0){
	echo "<tr>";
	echo "<td bgcolor='#E9E9E9' align='center'>Descripcion del Producto</td>
  <td bgcolor='#E9E9E9' align='center'>Unidad Comercial</td>
  <td bgcolor='#E9E9E9' align='center'>Cantidad</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ex-Works</td>
  <td bgcolor='#E9E9E9' align='center'>Total ExWorks</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Fca.</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cpt.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cip.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Dat. </td>
  <td bgcolor='#E9E9E9' align='center'>Valor  Dap*** </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ddp Total </td>
  ";
	echo "</tr>";
	while($rowaer2 = mysql_fetch_array($rsnaer2)){
		
		$aer2_nomprod = $rowaer2["nomproducto"];
		$aer2_unicomer = $rowaer2["unidad_comerc"];
		$aer2_canti = $rowaer2["cantidad"];
		$aer2_valexw = $rowaer2["valor_factura"];
		$aer2_tota_valexw = $rowaer2["total_factura"];
		$aer2_disticosto = $rowaer2["distri_costo_aer"];
		$porcentaje_aer2_disticosto = $aer2_disticosto / 100;
		
		$valfca_aer2 = $valor_fca_aer * $porcentaje_aer2_disticosto;
		$totalfca_aer2 = $valfca_aer2 / $aer2_canti;
		
		$valcpt_aer2 = $valor_cpt_aer * $porcentaje_aer2_disticosto;
		$totalcpt_aer2 = $valcpt_aer2 / $aer2_canti;
		
		$valcip_aer2 = $valor_cip_aer * $porcentaje_aer2_disticosto;
		$totalcip_aer2 = $valcip_aer2 / $aer2_canti;
		
		$valdat_aer2 = $valor_dat_aer * $porcentaje_aer2_disticosto;
		$totaldat_aer2 = $valdat_aer2 / $aer2_canti;
		
		$valdap3_aer2 = $valor_dap3_aer * $porcentaje_aer2_disticosto;
		$totaldap3_aer2 = $valdap3_aer2 / $aer2_canti;
		
		$valddp_aer2 = $valor_ddp_aer * $porcentaje_aer2_disticosto;
		$totalddp_aer2 = $valddp_aer2 / $aer2_canti;
		
		echo "<tr>";
		echo "<td>$aer2_nomprod</td>";
		echo "<td align='center'>$aer2_unicomer</td>";
		echo "<td align='center'>$aer2_canti</td>";
		echo "<td align='center'>$aer2_valexw</td>";
		echo "<td align='center'>".number_format("$aer2_tota_valexw",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalfca_aer2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalcpt_aer2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalcip_aer2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totaldat_aer2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totaldap3_aer2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalddp_aer2",2,".",",")."</td>";
		echo "</tr>";
	}
}
  ?>
  </table>
  
  
  <!-- Costos Unitarios Aéreo (Var%) -->
  <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td class="btn-info" colspan="17" align="center"><h5><b>Costos Unitarios Aereo (Var%)</b></h5> </td>
  </tr>
  <?php
  $sqlaereoC="SELECT cepdet.id_detalle, cepdet.id_prod, cepdet.partidaA, cepdet.partidaB, cepdet.nomproducto, cepdet.cantidad, cepdet.unidad_comerc, cepdet.peso_unidad_kg, cepdet.peso_total_kg, cepdet.valor_factura, cepdet.total_factura, cepdet.porcent_costo, cepdet.distri_costo_mar, cepdet.distri_costo_aer, cepdet.distri_costo_ter FROM cos_expo_prod_detalle AS cepdet WHERE cepdet.id_prod = '$codigox' ORDER BY cepdet.id_detalle ASC";
   $rsnaer3 = mysql_query($sqlaereoC);
if (mysql_num_rows($rsnaer3) > 0){
	echo "<tr>";
	echo "<td bgcolor='#E9E9E9' align='center'>Descripcion del Producto</td>
  <td bgcolor='#E9E9E9' align='center'>Unidad Comercial</td>
  <td bgcolor='#E9E9E9' align='center'>Cantidad</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ex-Works</td>
  <td bgcolor='#E9E9E9' align='center'>Total ExWorks</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Fca.</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cpt.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cip.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Dat. </td>
  <td bgcolor='#E9E9E9' align='center'>Valor  Dap*** </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ddp Total </td>
  ";
	echo "</tr>";
	while($rowaer3 = mysql_fetch_array($rsnaer3)){
		
		$aer3_nomprod = $rowaer3["nomproducto"];
		$aer3_unicomer = $rowaer3["unidad_comerc"];
		$aer3_canti = $rowaer3["cantidad"];
		$aer3_valexw = $rowaer3["valor_factura"];
		$aer3_tota_valexw = $rowaer3["total_factura"];
		$aer3_disticosto = $rowaer3["distri_costo_aer"];
		$porcentaje_aer3_disticosto = $aer3_disticosto / 100;
		
		$valfca_aer3 = $valor_fca_aer * $porcentaje_aer3_disticosto;
		$totalfca_aer3 = $valfca_aer3 / $aer3_canti;
		$porcentajefca3 = (($totalfca_aer3 / $aer3_valexw) * 100) - 100;
		
		$valcpt_aer3 = $valor_cpt_aer * $porcentaje_aer3_disticosto;
		$totalcpt_aer3 = $valcpt_aer3 / $aer3_canti;
		$porcentajecpt3 = (($totalcpt_aer3 / $aer3_valexw) * 100) - 100;
		
		$valcip_aer3 = $valor_cip_aer * $porcentaje_aer3_disticosto;
		$totalcip_aer3 = $valcip_aer3 / $aer3_canti;
		$porcentajecip3 = (($totalcip_aer3 / $aer3_valexw) * 100) - 100;
		
		$valdat_aer3 = $valor_dat_aer * $porcentaje_aer3_disticosto;
		$totaldat_aer3 = $valdat_aer3 / $aer3_canti;
		$porcentajedat3 = (($totaldat_aer3 / $aer3_valexw) * 100) - 100;
		
		$valdap3_aer3 = $valor_dap3_aer * $porcentaje_aer3_disticosto;
		$totaldap3_aer3 = $valdap3_aer3 / $aer3_canti;
		$porcentajedap3 = (($totaldap3_aer3 / $aer3_valexw) * 100) - 100;
		
		$valddp_aer3 = $valor_ddp_aer * $porcentaje_aer3_disticosto;
		$totalddp_aer3 = $valddp_aer3 / $aer3_canti;
		$porcentajeddp3 = (($totalddp_aer3 / $aer3_valexw) * 100) - 100;
		
		echo "<tr>";
		echo "<td>$aer3_nomprod</td>";
		echo "<td align='center'>$aer3_unicomer</td>";
		echo "<td align='center'>$aer3_canti</td>";
		echo "<td align='center'>$aer3_valexw</td>";
		echo "<td align='center'>$aer3_tota_valexw</td>";
		echo "<td align='center'>".number_format("$porcentajefca3",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajecpt3",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajecip3",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajedat3",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajedap3",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajeddp3",0,".",",")."%</td>";
		echo "</tr>";
	}
}
  ?>
  </table>
  
  
   <!-- Costos Unitarios Terrestre (Total por item) -->
  <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td class="btn-warning" colspan="17" align="center"><h5><b>Costos Unitarios Terrestre (Total por Item)</b></h5> </td>
  </tr>
  <?php
  $sqlterreA="SELECT cepdet.id_detalle, cepdet.id_prod, cepdet.partidaA, cepdet.partidaB, cepdet.nomproducto, cepdet.cantidad, cepdet.unidad_comerc, cepdet.peso_unidad_kg, cepdet.peso_total_kg, cepdet.valor_factura, cepdet.total_factura, cepdet.porcent_costo, cepdet.distri_costo_mar, cepdet.distri_costo_aer, cepdet.distri_costo_ter FROM cos_expo_prod_detalle AS cepdet WHERE cepdet.id_prod = '$codigox' ORDER BY cepdet.id_detalle ASC";
   $rsnter1 = mysql_query($sqlterreA);
if (mysql_num_rows($rsnter1) > 0){
	echo "<tr>";
	echo "<td bgcolor='#E9E9E9' align='center'>Descripcion del Producto</td>
  <td bgcolor='#E9E9E9' align='center'>Unidad Comercial</td>
  <td bgcolor='#E9E9E9' align='center'>Cantidad</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ex-Works</td>
  <td bgcolor='#E9E9E9' align='center'>Total ExWorks</td>
  <td bgcolor='#E9E9E9' align='center'>Distribucion % Costo</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Fca.</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Dap.</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cpt.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cip.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Dat. </td>
  <td bgcolor='#E9E9E9' align='center'>Valor  Dap*** </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ddp Total </td>
  ";
	echo "</tr>";
	while($rowter1 = mysql_fetch_array($rsnter1)){
		
		$terre1_nomprod = $rowter1["nomproducto"];
		$terre1_unicomer = $rowter1["unidad_comerc"];
		$terre1_canti = $rowter1["cantidad"];
		$terre1_valexw = $rowaer1["valor_factura"];
		$terre1_tota_valexw = $rowter1["total_factura"];
		$terre1_disticosto = $rowter1["distri_costo_aer"];
		$porcentaje_terre1_disticosto = $terre1_disticosto / 100;
		
		$totalcantiterre = $totalcantiterre + $terre1_canti;
		$totalvalexw_terre = $totalvalexw_terre + $terre1_tota_valexw;
		$totalval_pocent_terre = $totalval_pocent_terre + $terre1_disticosto;
		
		$valfca_terre = $valor_fca_ter * $porcentaje_terre1_disticosto;
		$totalfca_terre = $totalfca_terre + $valfca_terre;
		
		$valdap_terre = $valor_dap1_ter * $porcentaje_terre1_disticosto;
		$totaldap_terre = $totaldap_terre + $valdap_terre;
		
		$valcpt_terre = $valor_cpt_ter * $porcentaje_terre1_disticosto;
		$totalcpt_terre = $totalcpt_terre + $valcpt_terre;
		
		$valcip_terre = $valor_cip_ter * $porcentaje_terre1_disticosto;
		$totalcip_terre = $totalcip_terre + $valcip_terre;
		
		$valdat_terre = $valor_dat_ter * $porcentaje_terre1_disticosto;
		$totaldat_terre = $totaldat_terre + $valdat_terre;
		
		$valdap3_terre = $valor_dap3_ter * $porcentaje_terre1_disticosto;
		$totaldap3_terre = $totaldap3_terre + $valdap3_terre;
		
		$valddp_terre = $valor_ddp_ter * $porcentaje_terre1_disticosto;
		$totalddp_terre = $totalddp_terre + $valddp_terre;
		
		echo "<tr>";
		echo "<td>$terre1_nomprod</td>";
		echo "<td align='center'>$terre1_unicomer</td>";
		echo "<td align='center'>$terre1_canti</td>";
		echo "<td align='center'>$terre1_valexw</td>";
		echo "<td align='center'>$terre1_tota_valexw</td>";
		echo "<td align='center'>".number_format("$terre1_disticosto",2,".",",")." %</td>";
		echo "<td align='center'>".number_format("$valfca_terre",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valdap_terre",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valcpt_terre",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valcip_terre",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valdat_terre",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valdap3_terre",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$valddp_terre",2,".",",")."</td>";
		echo "</tr>";
	}
	echo "<tr>";
	echo "<td bgcolor='#F7F7F7' align='center' colspan='2'><b>Totales: </b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>$totalcantiterre</b></td>";
	echo "<td bgcolor='#F7F7F7' > </td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>$totalvalexw_terre</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalval_pocent_terre",2,".",",")." %</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalfca_terre",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totaldap_terre",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalcpt_terre",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalcip_terre",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totaldat_terre",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totaldap3_terre",2,".",",")."</b></td>";
	echo "<td bgcolor='#F7F7F7' align='center'><b>".number_format("$totalddp_terre",2,".",",")."</b></td>";
	echo "</tr>";
}
  ?>
  </table>
  
   <!-- Costos Unitarios Terrestre (Total por Unidad comercial) -->
  <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td class="btn-warning" colspan="17" align="center"><h5><b>Costos Unitarios Terrestre (Total por Unidad Comercial)</b></h5> </td>
  </tr>
  <?php
  $sqlterreB="SELECT cepdet.id_detalle, cepdet.id_prod, cepdet.partidaA, cepdet.partidaB, cepdet.nomproducto, cepdet.cantidad, cepdet.unidad_comerc, cepdet.peso_unidad_kg, cepdet.peso_total_kg, cepdet.valor_factura, cepdet.total_factura, cepdet.porcent_costo, cepdet.distri_costo_mar, cepdet.distri_costo_aer, cepdet.distri_costo_ter FROM cos_expo_prod_detalle AS cepdet WHERE cepdet.id_prod = '$codigox' ORDER BY cepdet.id_detalle ASC";
   $rsnter2 = mysql_query($sqlterreB);
if (mysql_num_rows($rsnter2) > 0){
	echo "<tr>";
	echo "<td bgcolor='#E9E9E9' align='center'>Descripcion del Producto</td>
  <td bgcolor='#E9E9E9' align='center'>Unidad Comercial</td>
  <td bgcolor='#E9E9E9' align='center'>Cantidad</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ex-Works</td>
  <td bgcolor='#E9E9E9' align='center'>Total ExWorks</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Fca.</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Dap.</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cpt.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cip.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Dat. </td>
  <td bgcolor='#E9E9E9' align='center'>Valor  Dap*** </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ddp Total </td>
  ";
	echo "</tr>";
	while($rowter2 = mysql_fetch_array($rsnter2)){
		
		$terre2_nomprod = $rowter2["nomproducto"];
		$terre2_unicomer = $rowter2["unidad_comerc"];
		$terre2_canti = $rowter2["cantidad"];
		$terre2_valexw = $rowter2["valor_factura"];
		$terre2_tota_valexw = $rowter2["total_factura"];
		$terre2_disticosto = $rowter2["distri_costo_aer"];
		$porcentaje_terre2_disticosto = $terre2_disticosto / 100;
		
		$valfca_terre2 = $valor_fca_ter * $porcentaje_terre2_disticosto;
		$totalfca_terre2 = $valfca_terre2 / $terre2_canti;
		
		
		$valdap_terre2 = $valor_dap1_ter * $porcentaje_terre2_disticosto;
		$totaldap_terre2 = $valdap_terre2 / $terre2_canti;
		
		$valcpt_terre2 = $valor_cpt_ter * $porcentaje_terre2_disticosto;
		$totalcpt_terre2 = $valcpt_terre2 / $terre2_canti;
		
		$valcip_terre2 = $valor_cip_ter * $porcentaje_terre2_disticosto;
		$totalcip_terre2 = $valcip_terre2 / $terre2_canti;
		
		$valdat_terre2 = $valor_dat_ter * $porcentaje_terre2_disticosto;
		$totaldat_terre2 = $valdat_terre2 / $terre2_canti;
		
		$valdap3_terre2 = $valor_dap3_ter * $porcentaje_terre2_disticosto;
		$totaldap3_terre2 = $valdap3_terre2 / $terre2_canti;
		
		$valddp_terre2 = $valor_ddp_ter * $porcentaje_terre2_disticosto;
		$totalddp_terre2 = $valddp_terre2 + $terre2_canti;
		
		echo "<tr>";
		echo "<td>$terre2_nomprod</td>";
		echo "<td align='center'>$terre2_unicomer</td>";
		echo "<td align='center'>$terre2_canti</td>";
		echo "<td align='center'>$terre2_valexw</td>";
		echo "<td align='center'>".number_format("$terre2_tota_valexw",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalfca_terre2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totaldap_terre2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalcpt_terre2",2,".",",")."</td>";
	    echo "<td align='center'>".number_format("$totalcip_terre2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totaldat_terre2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totaldap3_terre2",2,".",",")."</td>";
		echo "<td align='center'>".number_format("$totalddp_terre2",2,".",",")."</td>";
		echo "</tr>";
	}
}
  ?>
  </table>
  
   <!-- Costos Unitarios Terrestre (Var%) -->
  <table id="tabla3" border="0" class="table table-hover table-bordered" style='font-size:80%' align="center">
  <tr>
 <td class="btn-warning" colspan="17" align="center"><h5><b>Costos Unitarios Terrestre (Var%)</b></h5> </td>
  </tr>
  <?php
  $sqlterreC="SELECT cepdet.id_detalle, cepdet.id_prod, cepdet.partidaA, cepdet.partidaB, cepdet.nomproducto, cepdet.cantidad, cepdet.unidad_comerc, cepdet.peso_unidad_kg, cepdet.peso_total_kg, cepdet.valor_factura, cepdet.total_factura, cepdet.porcent_costo, cepdet.distri_costo_mar, cepdet.distri_costo_aer, cepdet.distri_costo_ter FROM cos_expo_prod_detalle AS cepdet WHERE cepdet.id_prod = '$codigox' ORDER BY cepdet.id_detalle ASC";
   $rsnter3 = mysql_query($sqlterreC);
if (mysql_num_rows($rsnter3) > 0){
	echo "<tr>";
	echo "<td bgcolor='#E9E9E9' align='center'>Descripcion del Producto</td>
  <td bgcolor='#E9E9E9' align='center'>Unidad Comercial</td>
  <td bgcolor='#E9E9E9' align='center'>Cantidad</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ex-Works</td>
  <td bgcolor='#E9E9E9' align='center'>Total ExWorks</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Fca.</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Dap.</td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cpt.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Cip.  </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Dat. </td>
  <td bgcolor='#E9E9E9' align='center'>Valor  Dap*** </td>
  <td bgcolor='#E9E9E9' align='center'>Valor Ddp Total </td>
  ";
	echo "</tr>";
	while($rowter3 = mysql_fetch_array($rsnter3)){
		
		$terre3_nomprod = $rowter3["nomproducto"];
		$terre3_unicomer = $rowter3["unidad_comerc"];
		$terre3_canti = $rowter3["cantidad"];
		$terre3_valexw = $rowter3["valor_factura"];
		$terre3_tota_valexw = $rowter3["total_factura"];
		$terre3_disticosto = $rowter3["distri_costo_aer"];
		$porcentaje_terre3_disticosto = $terre3_disticosto / 100;
		
		$valfca_terre3 = $valor_fca_ter * $porcentaje_terre3_disticosto;
		$totalfca_terre3 = $valfca_terre3 / $terre3_canti;
		$porcentajefca_3 = (($totalfca_terre3 / $terre3_valexw) * 100) - 100;
		
	    $valdap_terre3 = $valor_dap1_ter * $porcentaje_terre3_disticosto;
		$totaldap_terre3 = $valdap_terre3 / $terre3_canti;
		$porcentajedap_3 = (($totalfca_terre3 / $terre3_valexw) * 100) - 100;
		
		$valcpt_terre3 = $valor_cpt_ter * $porcentaje_terre3_disticosto;
		$totalcpt_terre3 = $valcpt_terre3 / $terre3_canti;
		$porcentajecpt_3 = (($totalcpt_terre3 / $terre3_valexw) * 100) - 100;
		
		$valcip_terre3 = $valor_cip_ter * $porcentaje_terre3_disticosto;
		$totalcip_terr3 = $valcip_terre3 / $terre3_canti;
		$porcentajecip_3 = (($totalcip_terr3 / $terre3_valexw) * 100) - 100;
		
		$valdat_terre3 = $valor_dat_ter * $porcentaje_terre3_disticosto;
		$totaldat_terre3 = $valdat_terre3 / $terre3_canti;
		$porcentajedat_3 = (($totaldat_terre3 / $terre3_valexw) * 100) - 100;
		
		$valdap3_terre3 = $valor_dap3_ter * $porcentaje_terre3_disticosto;
		$totaldap3_terre3 = $valdap3_terre3 / $terre3_canti;
		$porcentajedap_3 = (($totaldap3_terre3 / $terre3_valexw) * 100) - 100;
		
		$valddp_terre3 = $valor_ddp_ter * $porcentaje_terre3_disticosto;
		$totalddp_terre3 = $valddp_terre3 + $terre3_canti;
		$porcentajedap_3 = (($totaldap3_terre3 / $terre3_valexw) * 100) - 100;
		
		echo "<tr>";
		echo "<td>$terre3_nomprod</td>";
		echo "<td align='center'>$terre3_unicomer</td>";
		echo "<td align='center'>$terre3_canti</td>";
		echo "<td align='center'>$terre3_valexw</td>";
		echo "<td align='center'>$terre3_tota_valexw</td>";
		echo "<td align='center'>".number_format("$porcentajefca_3",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajedap_3",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajecpt_3",0,".",",")."%</td>";
	    echo "<td align='center'>".number_format("$porcentajecip_3",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajedat_3",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajedap_3",0,".",",")."%</td>";
		echo "<td align='center'>".number_format("$porcentajedap_3",0,".",",")."%</td>";
		echo "</tr>";
	}
}
  ?>
  </table>

  
  </div>
  <!--  <center> 
    <input class="btn btn-primary" type="button" value="Modificar Analisis de Costo" name="Modificar" onclick="history.back()" />
    
    <input class="btn btn-success" name="guardar" type="button" value=" Imprimir Costo Exportacion" onclick="javascript:imprSelec('muestra')"  />
   
   <a href="#"><img src="img/EXCEL.png" width="35" title="Exportar a Excel"/></a>
  </center> -->
  
  
</form>


</body>
</html>
<?php
//include("pie.php");
?>