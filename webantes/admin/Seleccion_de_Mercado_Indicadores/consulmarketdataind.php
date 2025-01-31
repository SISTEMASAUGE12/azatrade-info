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

//carga variables de selecicon de paises
$x=$_POST[casillasx];

//seleccion de indicadores
$x2=$_POST[casillas2];




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Mercado Internacional e Indicadores</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script language="JavaScript" src="js/jquery-1.5.1.min.js"></script>
<script language="JavaScript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
<link type="text/css" href="css/jquery-ui-1.8.13.custom.css" rel="stylesheet" />
<script>
function fncSumar(){
caja=document.forms["listaindicador"].elements;
var numero1 = Number(caja["porcentaje"].value);
//var numero2 = Number(caja["numero2"].value);
//resultado=numero1+numero2;
resultado=numero1;
if(!isNaN(resultado)){
//caja["resultado"].value=numero1+numero2;
caja["total"].value=+1;
}
}
</script>

<script language="javascript">
//el nombre de nustra funcion "Totales"
 function Totales() {
   with (document.forms["listaindicador"]) // el nombre del formulario
   {
  var totalResult = Number( porcentaje.value ) + Number( porcentaje.value );
  //var totalResult =  Number( porcentaje.value );
  //sumamos las cajas con los nombres
  total.value = roundTo( totalResult, 2 );
   }
 }

function roundTo(num,pow){
  if( isNaN( num ) ){
    num = 0;
  }
  num *= Math.pow(10,pow);
  num = (Math.round(num)/Math.pow(10,pow))+ "" ;
  if(num.indexOf(".") == -1)
    num += "." ;
  while(num.length - num.indexOf(".") - 1 < pow)
    num += "0" ;
  return num;
}
</script>

</head>

<body>
<br >
<form action='' name='listaindicador'>
<table border="0" class="table">
<tr>
   <td colspan="4">
 <!--  <input type="button" class="btn btn-success" value="&nbsp;&nbsp;&nbsp; Paso 4&nbsp;&nbsp;&nbsp;"/> -->
   
    <input type="button" class="btn btn-primary" value="&nbsp;&nbsp;&nbsp; Paso 4 de 4&nbsp;&nbsp;&nbsp;"/>
   </td>
   </tr>
<tr>
<td bgcolor="#279CC9" colspan="4" align="center">
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

//hace el for de los paises seleccionados
//if ($x1<>""){
foreach ($x as $value){
$value;
/*echo "<strong>";
echo "Paises seleccionados <br> <input class='checkbox-inline' type='checkbox' name='casillas[]' value='$value' checked='checked'/> $value <br>";
 echo "</strong>";*/
}
?>

<b>Lista de Indicadores Seleccionados</b>

</td>
</tr>
<tr>
<td><b>Tema</b></td>
<td><b>Indicadores Seleccionados</b></td>
<td><b>Valor Menor/Mayor Puntaje</b></td>
<td><b>Peso (Importancia)</b></td>
</tr>

<tr>
<td colspan="4"> 
<?
//}else{
//hace el for de los indocadores seleccionados
foreach ($x2 as $value){
$value;
/*echo "<strong>";
echo "indicadores seleccionados <br> <input class='checkbox-inline' type='checkbox' name='casillasxz[]' value='$value' checked='checked'/> $value  <br>";
 echo "</strong>";*/
 
 ?>
 </td>
 </tr>
 <tr>

 <?
 
 //consultamos indicadores seleccionados
 
 $sqlind="SELECT
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
WHERE
ind.id='$value'";
 
$rsnp = mysql_query($sqlind);
if (mysql_num_rows($rsnp) > 0){
	
	while($rowp = mysql_fetch_array($rsnp)){
		
		$idxx = $rowp["id"];
		$nomtem = $rowp["tema"];
		$nomindi = $rowp["nom_indicador"];
		
		
		echo "<td>$nomtem</td>";
		echo "<td>$nomindi</td>";
		echo "<td><select name'valo' />
		<option value=''></option>
				<option value='Si'>Si</option>
						<option value='No'>No</option>
						</select>
		
		</td>";
		echo "<td>%<input type='text' name='porcentaje' size='3' onKeyUp='fncSumar()'/></td>";
		
		}
		
		}
 
}
//}
?>

</tr>
<!--<tr>
<td colspan="3" align="right">
% Total:
</td>
<td>
<input name="total" id="total" size="5" readonly="readonly"/>
</td>
</tr> -->
</table>
<center>
<p></p><input name="resetea" class="btn" onclick="javascript:history.back()" type="button" value="Regresa Atras" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name='boton' type='submit' class='btn' value='Ver Informe' />
</center>
</form>
</body>
</html>