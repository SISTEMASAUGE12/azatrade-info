<?

include ("conection/config.php");
include ("menuA.php");


$nompro = $_POST['nombrepro'];
$despro = $_POST['descripro'];
$presen = $_POST['presenpro'];
$nomc = $_POST['nombrecomun'];
$nomt = $_POST['nombretec'];
$ara = $_POST['arancelario'];
$desar = $_POST['descriaran'];
$uni = $_POST['unidadcome'];
$sec = $_POST['idsector'];

$x=$_POST[casilla];


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
	 height: 400px;
	 width: 750px;
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
var los_cboxes = document.getElementsByName('casillas2[]'); 
for (var i = 0, j = los_cboxes.length; i < j; i++) {
    
    if(los_cboxes[i].checked == true){
    suma++;
    }
}
 
if(suma == 0){
alert('Debe Seleccionar Uno a Mas Indicadores');
return false;
}else{
alert(suma + ' Indicadores Seleccionados');
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
                         alert ("Solo Puede Seleccionar 10 Indicadores");
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
<form name="regdata" id="regdata" method="post" action="consulmarketdataind.php" onsubmit="return verificar();"/>

<input name="nombrepro" type="hidden" value="<? echo $nompro ?>"/>
<input name="descripro" type="hidden" value="<? echo $despro;?>"/>
<input name="presenpro" type="hidden" value="<? echo $presen; ?>"/>
<input name="nombrecomun" type="hidden" value="<? echo $nomc; ?>"/>
<input name="nombretec" type="hidden" value="<? echo $nomt; ?>"/>
<input name="arancelario" type="hidden" value="<? echo $ara; ?>"/>
<input name="descriaran" type="hidden" value="<? echo $desar; ?>"/>
<input name="unidadcome" type="hidden" value="<? echo $uni; ?>"/>
<input name="idsector" type="hidden" value="<? echo $sec; ?>"/>

<?
foreach ($x as $value){
$value;
//echo "$value <br>";
echo "<strong>";
echo "<input class='checkbox-inline' type='checkbox' name='casillasx[]' value='$value' checked='checked' style='display:none' />";
 echo "</strong>";
 }
 ?>



<table align="center"  border="1" bordercolor="#00CCFF" style='background-color:#CEECF5;
font-size:12px;
   color:#039;
   width: 660px;
   padding: 10px;
   border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>
   <tr>
   <td colspan="3">
   <input type="button" class="btn btn-primary" value="&nbsp;&nbsp;&nbsp; Paso 3 de 4&nbsp;&nbsp;&nbsp;"/>
   
    <a href="reg_indicatorNew.php"> <input type="button" class="btn btn-success" value="Registrar Nuevo Indicador"/></a>
    
     <a href="reg_indicatorNewpro.php"><input type="button" class="btn btn-success" value="Registrar Indicador Como Producto"/></a>
   </td>
   </tr>
<tr>
<td bgcolor="#279CC9">
<p><font color="#FFFFFF">Selecione Indicador(es):</font></p>
</td>
</tr>
<tr>
<td>
<?
$sqlp="SELECT
ind.id,
ind.cod_indicador,
ind.idtema,
ind.id_produc,
ind.nom_indicador,
ind.fuente_nota,
ind.fuente_org,
ind.valor,
ind.valor_mayor_puntaje,
ind.origen,
ind.usuario,
ind.fecha_reg,
te.id as idt,
te.tema,
te.descripcion,
CONCAT(te.tema,' - ',ind.nom_indicador) as temas
FROM
merca_indicadores AS ind
INNER JOIN merca_tema AS te ON ind.idtema = te.id
ORDER BY
te.tema,
nom_indicador ASC";



$rsnp = mysql_query($sqlp);
if (mysql_num_rows($rsnp) > 0){
	echo "<div id='global'>";
	//echo "<select name='' multiple='multiple' size='10'>";
	while($rowp = mysql_fetch_array($rsnp)){
		
		$idin = $rowp["id"];
		$idte = $rowp["idt"];
		$tema = $rowp["tema"];
		$nomi = $rowp["nom_indicador"];
		
		echo "<div class='texto'>
		<input class='checkbox-inline' type='checkbox' name='casillas2[]' value='$idin' onchange='habilitaDeshabilita(this)' /> $tema - $nomi ";
		echo "</div>";
		echo "<input name='idind' type='hidden' value='$idin' />";//capturamos el valor del nombre del pasi
		
		}
		//echo "</select>";
		echo "</div>";
		echo "<h6><font color='#D50000'>* Solo debe Seleccionar 20 Indicadores como Maximo</font></h6>";
		//echo "<p></p><img src='img/siguie.jpg' title='Siguiente Paso' />";
		
		}
		
?>
</td>
</tr>
</table>
<center>
<input name="resetea" class="btn" onclick="javascript:history.back()" type="button" value="Regresa Atras" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='boton' type='submit' class='btn' value='Siguiente Paso' />
</center>
</form>
</body>
</html>