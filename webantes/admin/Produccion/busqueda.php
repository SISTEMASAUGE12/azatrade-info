<? 
   	//mysql_connect("localhost","root","jopedis"); 
	include ("conection/config.php");
include ("menu.php");
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> 
<html> 
<head> 
<title>ejemplo de paginaci&oacute;n de resultados</title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<meta http-equiv="Pragma" content="no-cache" /> 
<style type="text/css"> 
<!-- 
a.p:link { 
   	color: #0066FF; 
   	text-decoration: none; 
} 
a.p:visited { 
   	color: #0066FF; 
   	text-decoration: none; 
} 
a.p:active { 
   	color: #0066FF; 
   	text-decoration: none; 
} 
a.p:hover { 
   	color: #0066FF; 
   	text-decoration: underline; 
} 
a.ord:link { 
   	color: #000000; 
   	text-decoration: none; 
} 
a.ord:visited { 
   	color: #000000; 
   	text-decoration: none; 
} 
a.ord:active { 
   	color: #000000; 
   	text-decoration: none; 
} 
a.ord:hover { 
   	color: #000000; 
   	text-decoration: underline; 
} 
--> 
</style> 
</head> 
<body bgcolor="#FFFFFF"> 
<script language="JavaScript"> 
function muestra(queCosa) 
{ 
   	alert(queCosa); 
} 
</script> 
<div align="center"><strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif">Paginación 
de Resultados de una consulta SQL (sobre MySQL)<br><br><p><a href="http://www.pclandia.com">www.pclandia.com</a></p> </font></strong> </div> 
<hr noshade style="color:CC6666;height:1px"> 
<br> 
<? 
//inicializo el criterio y recibo cualquier cadena que se desee buscar 
$criterio = ""; 
$txt_criterio = ""; 
if ($_GET["criterio"]!=""){ 
   $txt_criterio = $_GET["criterio"]; 
  /* $criterio = " where co_id like '%" . $txt_criterio . "%' or co_nombre like '%" . $txt_criterio . "%' or co_pais like '%" . $txt_criterio . "%'"; */
  $criterio = "where dp.eliminado = '0' AND
dp.idsector LIKE '%".$criterio."%' AND
CONCAT(depa.departamento,prod.producto,dp.mes2,dp.periodo) LIKE '".$criterio."%".$criterio."%".$criterio."%".$criterio."'
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


/*$sql="SELECT * FROM tpv.comercios ".$criterio; */
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
dp.mes2".$criterio; 
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
      	$orden="ids"; 
   	} 
   	//////////fin elementos de orden 

   	//////////calculo de elementos necesarios para paginacion 
   	//tamaño de la pagina 
   	$tamPag=25; 

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

//////////creacion de la consulta con limites 
/*$sql="SELECT * FROM tpv.comercios ".$criterio." ORDER BY ".$orden.",co_id ASC LIMIT ".$limitInf.",".$tamPag; */
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
INNER JOIN variable AS var ON dp.idvariable = var.id ".$criterio." ORDER BY ".$orden.",ids ASC LIMIT ".$limitInf.",".$tamPag; 
$res=mysql_query($sql); 

//////////fin consulta con limites 
echo "<div align='center'>"; 
echo "<font face='verdana' size='-2'>encontrados ".$numeroRegistros." resultados<br>"; 
echo "ordenados por <b>".$orden."</b>"; 
if(isset($txt_criterio)){ 
   	echo "<br>Valor filtro: <b>".$txt_criterio."</b>"; 
} 
echo "</font></div>"; 
echo "<table align='center' width='80%' border='0' cellspacing='1' cellpadding='0'>"; 
echo "<tr><td colspan='3'><hr noshade></td></tr>"; 
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=periodo&criterio=".$txt_criterio."'>Periodo</a></th>"; 
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=departamento&criterio=".$txt_criterio."'>Departamento</a></th>"; 
echo "<th bgcolor='#CCCCCC'><a class='ord' href='".$_SERVER["PHP_SELF"]."?pagina = ".$pagina."&orden=producto&criterio=".$txt_criterio."'>Producto</a></th>"; 
//if (mysql_num_rows($res) > 0){
//while($registro=mysql_fetch_array($res)){ 
while($registro=mysql_fetch_row($res)){ 
?> 
   <!-- tabla de resultados --> 
    <tr bgcolor="#CC6666" onMouseOver="this.style.backgroundColor='#FF9900';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#CC6666'"o"];" onClick="javascript:muestra('<? echo "[".$registro["periodo"]."] ".$registro["departamento"]." - ".$registro["producto"]; ?>');"> 
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["periodo"]; ?></b></font></td> 
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["departamento"]; ?></b></font></td> 
    <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFCC"><b><? echo $registro["producto"]; ?></b></font></td> 
    </tr> 
   <!-- fin tabla resultados --> 
<? 
}//fin while 
//}
echo "</table>"; 
}//fin if 
//////////a partir de aqui viene la paginacion 
?> 
   	<br> 
   	<table border="0" cellspacing="0" cellpadding="0" align="center"> 
   	<tr><td align="center" valign="top"> 
<? 
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
?> 
   	</td></tr> 
   	</table> 
<hr noshade style="color:CC6666;height:1px"> 
<div align="center"><font face="verdana" size="-2"><a class="p" href="index.php">::Inicio::</a></font></div> 

<form action="busqueda.php" method="get"> 
Criterio de búsqueda: 
<input type="text" name="criterio" size="22" maxlength="150"> 
<input type="submit" value="Buscar"> 
</form> 

</body> 
</html> 
<? 
   	mysql_close(); 
?> 
