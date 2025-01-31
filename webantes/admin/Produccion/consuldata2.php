<?
include ("conection/config.php");
include ("menu.php");

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
<style>
table {
  font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size:12px;
}
</style>

 <script language="JavaScript">
<!-- Hide JavaScript from Java-cambia de color las filas de la tabla
function NavRollOver(oTd){if(!oTd.contains(event.fromElement)){oTd.bgColor="33CCFF";}}
function NavRollOut(oTd){if(!oTd.contains(event.toElement)){oTd.bgColor="#CCFFFF";}}
//-->
</script>

<script language="javascript" type="text/javascript">
function valida(consultar) {
	
	sec =consultar.sect.value;
	pprod =consultar.depa.value;
	tiem =consultar.tiempo.value;
	tiem =consultar.peri.value;
	
//in mecanicos
    if (consultar.sect.value.length < 1){
	
		alert("Seleccione Sector");
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

</head>

<body>
<br>
<p>
<center>
<a href="#" id="mostrar">Mostrar Filtros</a>
<div id="caja">
<a href="#" class="close">[x]</a>

<form name="consultar" method="post" action="consuldata2.php" onSubmit="return valida(this);" >
<table  border="0" bordercolor="#00CCFF" style='background-color:#CCFFFF;
   color:#039;
   width: 300px;
   padding: 10px;
   border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>
  <tbody>
    <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td colspan="4" align="center">
   <b>Consultar</b>
    </td>
    </tr>
    <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
      <td>Seleccione Sector:</td>
      <td>
      <?
echo "<select name='sect'>"; 
if ($salax!=''){
					$ssql="SELECT id, sector, eliminado FROM sector where id='".$salax."'";
}else{
	echo"<option value=''>Todo</option>";
	$ssql="SELECT id, sector, eliminado FROM sector where eliminado='0'";
}
					
					$resultado=mysql_query($ssql); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[0]'>$fila[1]"; 
					}
					echo "</select>";?>
      </td>
      <td>Seleccione Departamento</td>
      <td>
      <?
echo "<select name='depa'>"; 
if ($salax!=''){
					$sql="SELECT coddep, departamento FROM departamento where id='".$salax."'";
}else{
	echo"<option value=''>Todo</option>";
	$sql="SELECT coddep, departamento FROM departamento where eliminado='0'";
}
					
					$resultadod=mysql_query($sql); 
					while ($filad=mysql_fetch_row($resultadod))
					{ 
						echo "<option value='$filad[1]'>$filad[1]"; 
					}
					echo "</select>";?>
      </td>
    </tr>
    <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
      <td>Seleccione Producto:</td>
      <td>
      <?
echo "<select name='prod'>"; 
if ($salax!=''){
					$sqlx="SELECT id, producto FROM producto where id='".$salax."' group by id, producto";
}else{
	echo"<option value=''>Todo</option>";
	$sqlx="SELECT id, producto FROM producto where eliminado='0' group by id, producto";
}
					
					$resultadox=mysql_query($sqlx); 
					while ($filax=mysql_fetch_row($resultadox))
					{ 
						echo "<option value='$filax[1]'>$filax[1]"; 
					}
					echo "</select>";?>
      </td>
      <td>Seleccione Tiempo:</td>
      <td>
      <select name="tiempo">
  <option value="">Todo</option>
  <option value="Anual">Anual</option>
  <option value="Trimestral">Trimestral</option>
  <option value="Mensual">Mensual</option>
  <option value="Quincenal">Quincenal</option>
  <option value="Semanal">Semanal</option>
</select>
      </td>
    </tr>
    <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
      <td>Seleccione Periodo:</td>
      <td>
      <?
echo "<select name='peri'>"; 
if ($salax!=''){
					$sqlp="SELECT periodo as per, periodo as peri FROM dataproduccion group by per, peri where id='".$salax."'";
}else{
	echo"<option value=''>Todo</option>";
	$sqlp="SELECT periodo as per, periodo as peri FROM dataproduccion group by per, peri";
}
					
					$resultadop=mysql_query($sqlp); 
					while ($filap=mysql_fetch_row($resultadop))
					{ 
						echo "<option value='$filap[1]'>$filap[1]"; 
					}
					echo "</select>";?>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td colspan="4" align="center">
    <input name="consultar"  type="submit" value="Consultar"><img src="img/consult.png">
    </td>
    </tr>
  </tbody>
</table>
</form>
</div>
</center>

<?
if (isset($consultar)){
	
	if ($sect!=""){
		
//inicializo el criterio y recibo cualquier cadena que se desee buscar 
$criterio = ""; 
$txt_criterio = ""; 
if ($_GET["criterio"]!=""){ 
   $txt_criterio = $_GET["criterio"]; 
   $criterio = " where tk.id_cli like '%" . $txt_criterio . "%' or clie.nombre like '%" . $txt_criterio . "%' or clie.dni like '%" . $txt_criterio . "%'"; 
} 

$sql="SELECT
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
".$criterio."
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

$res=mysql_query($sql); 
$numeroRegistros=mysql_num_rows($res); 
if($numeroRegistros<=0) 
{ 
   	echo "<div align='center'>"; 
   	echo "<font face='verdana' size='-2'>No se encontraron resultados</font>"; 
   	echo "</div>"; 
}else{ 
   	//////////elementos para el orden 
   	if(!isset($orden)) 
   	{ 
      	 $orden="departamento DESC"; 
   	} 
   	//////////fin elementos de orden 

   	//////////calculo de elementos necesarios para paginacion 
   	//tamaño de la pagina 
   	$tamPag=20; 

   	//pagina actual si no esta definida y limites 
   	if(!isset($_GET["pagina"])) 
   	{ 
      	 $pagina=1; 
      	 $inicio=1; 
      	 $final=$tamPag; 
   	}else{ 
      	 $pagina = $_GET["pagina"]; 
   	} 
   	//calculo del limite inferior 
   	$limitInf=($pagina-1)*$tamPag; 

   	//calculo del numero de paginas 
   	$numPags=ceil($numeroRegistros/$tamPag); 
   	if(!isset($pagina)) 
   	{ 
      	 $pagina=1; 
      	 $inicio=1; 
      	 $final=$tamPag; 
   	}else{ 
      	 $seccionActual=intval(($pagina-1)/$tamPag); 
      	 $inicio=($seccionActual*$tamPag)+1; 

      	 if($pagina<$numPags) 
      	 { 
         	 $final=$inicio+$tamPag-1; 
      	 }else{ 
         	 $final=$numPags; 
      	 } 

       if ($final>$numPags){ 
          $final=$numPags; 
      	 } 
   	} 
	

//////////fin de dicho calculo 



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
ORDER BY
".$orden." LIMIT ".$limitInf.",".$tamPag;
//}

$rsnpg = mysql_query($sqlpg);
//////////fin consulta con limites

if (mysql_num_rows($rsnpg) > 0){
	
	
	echo"<center><font color=#FFFFFF><b>Lista de Tickes Especiales Registrados</b></font></center>"; 
echo "<div align='center'>"; 
echo "<font face='verdana' size='-2'>Encontrados ".$numeroRegistros." Resultados<br>"; 
echo "Ordenados por <b>".$orden."</b>"; 
if(isset($txt_criterio)){ 
   	echo "<br>Valor filtro: <b>".$txt_criterio."</b>"; 
} 
echo "</font></div>";

	
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
/*echo "<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>";
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
echo "</tr>";*/

echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=ids&criterio=".$txt_criterio."'><font size=2>Items</font></a></th>"; 
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=periodo&criterio=".$txt_criterio."'><font size=2>Periodo</font></a></th>"; 
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=departamento&criterio=".$txt_criterio."'><font size=2>Departamento</font></a></th>"; 
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=producto&criterio=".$txt_criterio."'><font size=2>Producto</font></a></th>"; 
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=medida&criterio=".$txt_criterio."'><font size=2>Unidad</font></a></th>"; 
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=mes2&criterio=".$txt_criterio."'><font size=2>Tiempos</font></a></th>"; 
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=enero&criterio=".$txt_criterio."'><font size=2>Enero</font></a></th>";

while($rowpg = mysql_fetch_array($rsnpg)){
/*$cod = $rowpg["id_prog"];
$codf = $rowpg["numero_recibo"];*/

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
echo "</table>";

echo "	<br> 
   	<table border='0' cellspacing='0' cellpadding='0' align='center'> 
   	<tr><td align='center' valign='top'> ";
	
	
		if($pagina>1) 
   	{ 
      	 echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina-1)."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
      	 echo "<font face='verdana' size='-2'>anterior</font>"; 
      	 echo "</a> "; 
   	} 

   	for($i=$inicio;$i<=$final;$i++) 
   	{ 
      	 if($i==$pagina) 
      	 { 
         	 echo "<font face='verdana' size='-2'><b>".$i."</b> </font>"; 
      	 }else{ 
         	 echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".$i."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
         	 echo "<font face='verdana' size='-2'>".$i."</font></a> "; 
      	 } 
   	} 
   	if($pagina<$numPags) 
   { 
      	echo " <a class='p' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina+1)."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
      	echo "<font face='verdana' size='-2'>siguiente</font></a>"; 
   } 
//////////fin de la paginacion 

}else 
{

echo " <br><center><b>No hay Registro Segun Filtros<b></center>";
}
	
	
	
	}
	}
	}
	
	?>

</body>
</html>