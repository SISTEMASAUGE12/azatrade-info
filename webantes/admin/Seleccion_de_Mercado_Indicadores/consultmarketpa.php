<?

include ("conection/config.php");
include ("menuA.php");


$nompro = $_POST['nomprod'];
$despro = $_POST['Desprod'];
$presen = $_POST['presprod'];
$nomc = $_POST['nomcomu'];
$nomt = $_POST['nomtec'];
$ara = $_POST['aran'];
$desar = $_POST['desaran'];
$uni = $_POST['unidad'];
$sec = $_POST['sector'];


//echo "<font size='1'>$nompro&nbsp; &nbsp;&nbsp; $despro &nbsp;&nbsp; $presen &nbsp;&nbsp; $nomc &nbsp;&nbsp; $nomt &nbsp;&nbsp; $ara &nbsp;&nbsp; $desar &nbsp;&nbsp; $uni &nbsp;&nbsp; $sec</font>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> -->
<title>Azatrade - Mercado Internacional e Indicadores</title>

<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<!-- para el div con barra vertical  -->
<style type="text/css">
 #global {
	 height: 300px;
	 width: 350px;
	 border: 1px solid #ddd;
	 background: #f1f1f1;
	 overflow-y: scroll;
 }
 #mensajes {
	 height: auto;
 }
 .texto {
	 padding:1px;
	 background:#fff;
 }
 </style>
 
<script type="text/javascript">
//<![CDATA[
function verificar(){
var suma = 0;
var los_cboxes = document.getElementsByName('casilla[]'); 
for (var i = 0, j = los_cboxes.length; i < j; i++) {
    
    if(los_cboxes[i].checked == true){
    suma++;
    }
}
 
if(suma == 0){
alert('Debe Seleccionar Uno a Mas Paises');
return false;
}else{
alert(suma + ' Paises Seleccionados');
}
 
}
//]]>
</script>

<script languaje="javascript">
 var num_opciones = 10;
 var numcheckbox = 0;
 function habilitaDeshabilita(esto)

 {
     if (esto.checked){
                 if (numcheckbox >= num_opciones) {
                         esto.checked = false;
                         alert ("Solo Puede Seleccionar 10 Paises");
                 } else {
                         numcheckbox++;
                 }
         } else {
                 numcheckbox--;
         }
 }
 </script>
 
</head>

<body>
<?

?>
<br />
<p>
</p>
<form name="regpa" id="regpa" method="post" action="consulmarketdata.php" onsubmit="return verificar();" />

<input name="nombrepro" type="hidden" value="<? echo $nompro ?>"/>
<input name="descripro" type="hidden" value="<? echo $despro;?>"/>
<input name="presenpro" type="hidden" value="<? echo $presen; ?>"/>
<input name="nombrecomun" type="hidden" value="<? echo $nomc; ?>"/>
<input name="nombretec" type="hidden" value="<? echo $nomt; ?>"/>
<input name="arancelario" type="hidden" value="<? echo $ara; ?>"/>
<input name="descriaran" type="hidden" value="<? echo $desar; ?>"/>
<input name="unidadcome" type="hidden" value="<? echo $uni; ?>"/>
<input name="idsector" type="hidden" value="<? echo $sec; ?>"/>



<table align="center"  border="1" bordercolor="#00CCFF" style='background-color:#CEECF5;
font-size:12px;
   color:#039;
   width: 360px;
   padding: 10px;
   border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>
   <tr>
   <td colspan="2">
   <input type="button" class="btn btn-primary" value="&nbsp;&nbsp;&nbsp; Paso 2 de 4&nbsp;&nbsp;&nbsp;"/>
   </td>
   </tr>
<tr>
<td bgcolor="#279CC9">
<p><font color="#FFFFFF">Selecione Pais(es):</font></p>
</td>
</tr>
<tr>
<td>
<?
$sqlp="SELECT
merca_pais.id,
merca_pais.cod_pais,
merca_pais.pais,
merca_pais.region,
merca_pais.income_group
FROM
merca_pais order by pais";



$rsnp = mysql_query($sqlp);
if (mysql_num_rows($rsnp) > 0){
	echo "<div id='global'>";
	//echo "<select name='' multiple='multiple' size='10'>";
	while($rowp = mysql_fetch_array($rsnp)){
		
		$idpa = $rowp["id"];
		$pais = $rowp["pais"];
		
		echo "<div class='texto'><input class='checkbox-inline' type='checkbox' name='casilla[]' value='$idpa' onchange='habilitaDeshabilita(this)' /> $pais </div>";
		echo "<input name='pai' type='hidden' value='$pais' />";//capturamos el valor del nombre del pasi
		
		}
		//echo "</select>";
		echo "</div>";
		echo "<h6><font color='#D50000'>* Solo debe Seleccionar 10 Paises como Maximo</font></h6>";
		//echo "<p></p><img src='img/siguie.jpg' title='Siguiente Paso' />";
		
		}
		
?>
</td>
</tr>
</table>
<br />
<p></p>
<center>
<p></p><input name="resetea" class="btn" onclick="javascript:history.back()" type="button" value="Regresa Atras" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='boton' type='submit' class='btn' value='Siguiente Paso' />
</center>
</form>
</body>
</html>