<?
include ("conection/config.php");
include ("menu.php");

$idp=$_GET["idp"];

$sqlp="SELECT p.id as idproducto,p.idsector as idsectorp,p.producto as nomprod,s.id as idsector,s.sector as nomsector,p.eliminado from producto as p inner join sector as s on p.idsector=s.id where p.eliminado='0' and p.id='$idp'";
$rsnp = mysql_query($sqlp);
if (mysql_num_rows($rsnp) > 0){
	while($rowp = mysql_fetch_array($rsnp)){
		
		$ids = $rowp["idsector"];
		$idsec = $rowp["nomsector"];
		$idpp = $rowp["idproducto"];
		$nomp = $rowp["nomprod"];
		}
		}

$aa = date("Y");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
function NavRollOver(oTd){if(!oTd.contains(event.fromElement)){oTd.bgColor="66CCFF";}}
function NavRollOut(oTd){if(!oTd.contains(event.toElement)){oTd.bgColor="#CEECF5";}}
//-->
</script>

<script language="javascript" type="text/javascript">
function valida(regprodu) {
    if (regprodu.sector.value.length < 1){
	
		alert("Seleccione Sector");
		return false;
	}
	if (regprodu.a.value.length < 1){
	
		alert("Ingrese Nombre del Producto");
		return false;
	}
	return true;
}
</script>

</head>

<body>
<p>
<br>
<center>
<form name="regprodu" method="post" action="insertmodifprod.php" onSubmit="return valida(this);">
<table border="1" bordercolor="#66CCFF" style='background-color:#CEECF5;
   color:#039;
   width: 300px;
   padding: 10px;
    border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>
   <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td bgcolor="#279CC9" colspan="2" align="center"><b><font color="#FFFFFF">Registrar Productos</font></b></td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Sector:</td>
    <td>
   <?
echo "<select name='sector'>"; 
if ($idpp!=''){
					$sqls="SELECT id,sector FROM sector where id='$ids'";
}else{
	echo"<option value=''></option>";
	$sqls="SELECT id,sector FROM sector where eliminado='0'";
}
					
					$resultado=mysql_query($sqls); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[0]'>$fila[1]"; 
					}
					echo "</select>";?>
    </td>
  </tr>

  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Nombre Producto:</td>
    <td>
    <input name="a" type="text" size="15" value="<? echo $nomp; ?>"  />
    <input name="ax" type="hidden" size="15" value="<? echo $idpp; ?>"  />
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)' align="center">
    <td colspan="2"><input name="graba" type="submit" value="Guardar" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="resetea" onclick="javascript:history.back()" type="button" value="Regresar Atras" /></td>
  </tr>
</table>
</form>
</center>

</body>
</html>