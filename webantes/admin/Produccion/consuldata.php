<?
include ("conection/config.php");
include ("menu.php");

//se muestren las variables en los campos seleccionados
$sectx2 = $_POST['sect'];
//$sectx2 = isset($_POST['sect']) ? $_POST['sect'] : NULL;
$depx2 = $_POST['depa'];
$prodx2 = $_POST['prod'];
$medx2 = $_POST['med'];
$tiex2 = $_POST['tiempo'];
$perix2 = $_POST['peri'];


function generasector()
{
	//include 'conexion.php';
	//conectar();
	$consulta=mysql_query("SELECT id, sector FROM sector where eliminado='0' order by sector desc");
	//desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='sector' id='sector' onChange='cargaContenido(this.id)'>";
	echo "<option value=''>Todo</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}


/*$sqlp="SELECT p.id as idproducto,p.idsector as idsectorp,p.producto as nomprod,s.id as idsector,s.sector as nomsector,p.eliminado from producto as p inner join sector as s on p.idsector=s.id where p.eliminado='0' and p.id='$idp'";
$rsnp = mysql_query($sqlp);
if (mysql_num_rows($rsnp) > 0){
	while($rowp = mysql_fetch_array($rsnp)){
		
		$ids = $rowp["idsector"];
		$idsec = $rowp["nomsector"];
		$idpp = $rowp["idproducto"];
		$nomp = $rowp["nomprod"];
		}
		}*/

$aa = date("Y");


?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<meta charset="utf-8"> -->
<title>Azatrade - Produccion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
<style>
table {
  font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size:12px;
}
</style>

 <script language="JavaScript">
<!-- Hide JavaScript from Java-cambia de color las filas de la tabla
function NavRollOver(oTd){if(!oTd.contains(event.fromElement)){oTd.bgColor="#EBEBEB";}}
function NavRollOut(oTd){if(!oTd.contains(event.toElement)){oTd.bgColor="#FAFAFA";}}
//-->
</script>

<script language="javascript" type="text/javascript">
function valida(consultar) {
	
	//sec =consultar.sect.value;
	//pprod =consultar.depa.value;
	//tiem =consultar.tiempo.value;
	//tiem =consultar.peri.value;
	
//in mecanicos
    if (consultar.sect.value.length < 1){
	
		alert("Seleccione Sector");
		return false;
	}
	 if (consultar.prod.value.length < 1){
	
		alert("Seleccione Producto");
		return false;
	}
	if (consultar.med.value.length < 1){
	
		alert("Seleccione Unidad de Medida");
		return false;
	}
	if (consultar.tiempo.value.length < 1){
	
		alert("Seleccione Periodo");
		return false;
	}
	
	/*	if (consultar.tiempo.value.length < 1)
	{
		alert("Seleccione Tiempo");
		return false;
	}
	if (consultar.peri.value.length < 1)
	{
		alert("Seleccione Periodo");
		return false;
	}*/
	//}
	//}
	
	return true;
}
</script>


<script type="text/javascript">
/*mostrar y  oculatr caja div*/
$(function()
{

$("#mostrar").click(function(event) {
event.preventDefault();
$("#caja").slideToggle();
});

$("#caja a").click(function(event) {
event.preventDefault();
$("#caja").slideUp();
});

});
</script>
<style type="text/css">
body {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #666666;	
}
a{color:#993300; text-decoration:none;}
#caja {
width:50%;
display: none;
padding:5px;
border:2px solid #FADDA9;
background-color:#FDF4E1;
}
#mostrar{
display:block;
width:50%;
padding:5px;
border:2px solid #D0E8F4;
background-color:#ECF8FD;
}
</style>

<!--<script type="text/javascript" src="js/select_dependientes2.js"></script> -->

</head>

<body>
<br>
<p>
<center>
<!--<a href="#" id="mostrar">Mostrar Filtros</a>
<div id="caja">
<a href="#" class="close">[x]</a> -->

<?

?>

<form name="consultar" method="post" action="consuldatav.php" onSubmit="return valida(this);" >
<table  border="0" bordercolor="#00CCFF" style='background-color:#FAFAFA;
   color:#039;
   width: 300px;
   padding: 10px;
   border:2px solid #B2B2B2;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>
  <tbody>
    <tr>
    <td bgcolor="#279CC9"  colspan="11" align="center">
   <b><font color="#FFFFFF">Consultar</font></b>
    </td>
    </tr>
    <tr>
      <td>
      <!--<input type="hidden" name='sector' id='sector' />  -->
      Seleccione Sector:
      </td>
      <td>
      <?php //generasector(); ?>
      <?
echo "<select name='sect'>"; 
if ($sectx2!=''){
	echo"<option value=''>Todo</option>";
	$querypro = "SELECT id, sector, eliminado FROM sector where eliminado='0' order by sector Asc";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["id"].'"';
if($_POST["sect"]==$filapro["id"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["sector"].'</option>';   
}
					
}else{
	echo"<option value=''>Todo</option>";
	$ssql="SELECT id, sector, eliminado FROM sector where eliminado='0'";
}
					
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[0]'>$fila[1]"; 
					}
					echo "</select>";
					?>
      </td>
      <td>Seleccione Producto</td>
      <td>
      
       <?
echo "<select name='prod'>"; 
if ($prodx2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT id, producto FROM producto where eliminado='0' group by id, producto order by producto asc";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["producto"].'"';
if($_POST["prod"]==$filapro["producto"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["producto"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";
	
	$sqlx="SELECT id, producto FROM producto where eliminado='0' group by id, producto order by producto asc";
}
					
					$resultadox=mysql_query($sqlx); 
					while ($filax=mysql_fetch_row($resultadox))
					{ 
						echo "<option value='$filax[1]'>$filax[1]"; 
					}
					echo "</select>";
					?>
      
      <!--<select disabled="disabled" name="prod" id="prod">
						<option value="">Todo</option>
					</select> -->
      </td>
     
    <!--</tr>
    <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> -->
      <td>Seleccione U. Medida:</td>
      <td>
      <?
echo "<select name='med'>"; 
if ($medx2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT id, medida FROM medida where eliminado='0' group by id, medida order by medida asc";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["medida"].'"';
if($_POST["med"]==$filapro["medida"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["medida"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";
	
	$sqlx="SELECT id, medida FROM medida where eliminado='0' group by id, medida order by medida asc";
}
					
					$resultadox=mysql_query($sqlx); 
					while ($filax=mysql_fetch_row($resultadox))
					{ 
						echo "<option value='$filax[1]'>$filax[1]"; 
					}
					echo "</select>";?>
      
                    
                    
      <?
/*echo "<select name='prod'>"; 
if ($prodx2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT id, producto FROM producto where eliminado='0' group by id, producto";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["producto"].'"';
if($_POST["prod"]==$filapro["producto"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["producto"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";
	
	$sqlx="SELECT id, producto FROM producto where eliminado='0' group by id, producto";
}
					
					$resultadox=mysql_query($sqlx); 
					while ($filax=mysql_fetch_row($resultadox))
					{ 
						echo "<option value='$filax[1]'>$filax[1]"; 
					}
					echo "</select>";*/
					?>
      </td>
      
      </tr>
      <tr>
      
       <td>Seleccione Departamento:</td>
      <td>
      <?
echo "<select name='depa'>"; 
if ($depx2!=''){
	echo"<option value=''>Todo</option>";
					$querypro = "SELECT coddep, departamento FROM departamento where eliminado='0' order by departamento asc";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);

echo '<option value="'.$filapro["departamento"].'"';
if($_POST["depa"]==$filapro["departamento"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["departamento"].'</option>';   
}
}else{
	
	echo"<option value=''>Todo</option>";

	$sql="SELECT coddep, departamento FROM departamento where eliminado='0' order by departamento asc";
}
					
					$resultadod=mysql_query($sql); 
					while ($filad=mysql_fetch_row($resultadod))
					{ 
						echo "<option value='$filad[1]'>$filad[1]"; 
					}
					echo "</select>";?>
      </td>
      
    
      
      <td>Seleccione Periodo:</td>
      <td>
      <select name="tiempo">
      <?
	  if ($tiex2==""){
	  ?>
  <option value="">Todo</option>
  <?
  }else{
		echo"<option value='$tiex2'>$tiex2</option>";
		}
  ?>
  <option value="Anual">Anual</option>
  <option value="Semestral">Semestral</option>
  <option value="Trimestral">Trimestral</option>
  <option value="Mensual">Mensual</option>
</select>
      </td>
   <!-- </tr>
    <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> -->
      <td>Seleccione A&ntilde;o:</td>
      <td>
      <?
echo "<select name='peri'>"; 
if ($perix2!=''){
	echo"<option value=''>Todo</option>";
			$querypro = "SELECT periodo as per, periodo as peri FROM dataproduccion where dataproduccion.periodo<>'' group by per, peri";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);


echo '<option value="'.$filapro["peri"].'"';
if($_POST["peri"]==$filapro["peri"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["peri"].'</option>';   
}		

}else{

	echo"<option value=''>Todo</option>";
	
	$sqlp="SELECT periodo as per, periodo as peri FROM dataproduccion where dataproduccion.periodo<>'' group by per, peri";
}
					
					$resultadop=mysql_query($sqlp); 
					while ($filap=mysql_fetch_row($resultadop))
					{ 
						echo "<option value='$filap[1]'>$filap[1]"; 
					}
					echo "</select>";?>
      </td>
     <!-- <td>&nbsp;</td>
      <td>&nbsp;</td> -->
    <!--</tr>
    <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> -->
    <td colspan="11" align="center">
    <input name="consultar"  type="submit" value="Consultar"><img src="img/consult.png">
    </td>
    </tr>
  </tbody>
</table>
</form>
<!--</div> -->
</center>

<?
if (isset($consultar)){
	
	//echo"<link href='bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css' rel='stylesheet'>";
	
/*	if ($sect!=""){

$sqlpg="SELECT
sect.id AS ids,
sect.sector,
depa.id AS idd,
depa.coddep,
depa.departamento,
prod.id AS idp,
prod.producto,
var.id AS idv,
var.variable,
med.id AS idm,
med.medida,
dp.periodo,
dp.mes2,
SUM(dp.enero) as enero,
SUM(dp.febrero) as febrero,
SUM(dp.marzo) as marzo,
SUM(dp.abril) as abril,
SUM(dp.mayo) as mayo,
SUM(dp.junio) as junio,
SUM(dp.julio) as julio,
SUM(dp.agosto) as agosto,
SUM(dp.septiembre) as septiembre,
SUM(dp.octubre) as octubre,
SUM(dp.noviembre) as noviembre,
SUM(dp.diciembre) as diciembre,
CONCAT(depa.departamento,prod.producto,dp.mes2,dp.periodo) AS todo,
dp.eliminado
FROM
dataproduccion AS dp
INNER JOIN departamento AS depa ON dp.iddepartamento = depa.id
INNER JOIN medida AS med ON dp.idmedida = med.id
INNER JOIN producto AS prod ON dp.idproducto = prod.id
INNER JOIN sector AS sect ON dp.idsector = sect.id
INNER JOIN variable AS var ON dp.idvariable = var.id
WHERE
dp.eliminado = '0' AND
dp.idsector LIKE '%".$sect."%' AND
CONCAT(depa.departamento,prod.producto,dp.mes2,dp.periodo) LIKE '".$depa."%".$prod."%".$tiempo."%".$peri."'
GROUP BY
ids,
sect.sector,
idd,
depa.coddep,
depa.departamento,
idp,
prod.producto,
idv,
var.variable,
idm,
med.medida,
dp.periodo,
dp.mes2
";
}

$rsnpg = mysql_query($sqlpg);
if (mysql_num_rows($rsnpg) > 0){
	
	//sql para mostra el sector
	$sqlc="SELECT sector.id, sector.sector, sector.eliminado FROM sector WHERE sector.id = '".$sect."'";
$rsnc = mysql_query($sqlc);
if (mysql_num_rows($rsnc) > 0){
	while($rowc = mysql_fetch_array($rsnc)){
$secto = $rowc["sector"];
	}
	}
	
	// sql para mostrar producto
	$sqlp="SELECT producto.id, producto.producto FROM producto WHERE producto.producto ='".$prod."'";
$rsnp = mysql_query($sqlp);
if (mysql_num_rows($rsnp) > 0){
	while($rowp = mysql_fetch_array($rsnp)){
$produc = $rowp["producto"];
	}
	}
	
echo "<center>";
echo "<br>";
echo "<table border = '1' bordercolor='#00CCFF' style='background-color:#CCFFFF;
   color:#039;
   width: 300px;
   padding: 10px;
   border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>";
   echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";

echo "<td bgcolor='#66CCFF' colspan='18'><b>Sector: $secto / $produc</b></td>";
echo "</tr>";
echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
echo "<td bgcolor='#66CCFF'><b><center>Items</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Periodo</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Departamento</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Producto</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Unidad</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Tiempo</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Enero</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Febrero</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Marzo</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Abril</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Mayo</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Junio</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Julio</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Agosto</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Septiembre</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Octubre</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Noviembre</center></b></td>";
echo "<td bgcolor='#66CCFF'><b><center>Diciembre</center></b></td>";
echo "</tr>";

while($rowpg = mysql_fetch_array($rsnpg)){*/
/*$cod = $rowpg["id_prog"];
$codf = $rowpg["numero_recibo"];*/
/*
$items=$items+1;

echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
echo "<td><center>".$items."</center></td> ";
echo "<td><center>".$rowpg["periodo"]."</center></td> ";
echo "<td><center>".$rowpg["departamento"]."</center></td> ";
echo "<td><center> ".$rowpg["producto"]."</center></td>";
echo "<td><center> ".$rowpg["medida"]."</center></td>";
echo "<td><center> ".$rowpg["mes2"]."</center></td>";
echo "<td><center> ".$rowpg["enero"]."</center></td>";
echo "<td><center> ".$rowpg["febrero"]."</center></td>";
echo "<td><center> ".$rowpg["marzo"]."</center></td>";
echo "<td><center> ".$rowpg["abril"]."</center></td>";
echo "<td><center> ".$rowpg["mayo"]."</center></td>";
echo "<td><center> ".$rowpg["junio"]."</center></td>";
echo "<td><center> ".$rowpg["julio"]."</center></td>";
echo "<td><center> ".$rowpg["agosto"]."</center></td>";
echo "<td><center> ".$rowpg["septiembre"]."</center></td>";
echo "<td><center> ".$rowpg["octubre"]."</center></td>";
echo "<td><center> ".$rowpg["noviembre"]."</center></td>";
echo "<td><center> ".$rowpg["diciembre"]."</center></td>";

echo "</tr> ";

//echo"<p>".$_pagi_navegacion."</p>";
}
}else 
{

echo " <br><center><b>No hay Registro Segun Filtros<b></center>";
}
	*/
	
	
	}
	?>

</body>
</html>