<?
include ("conection/config.php");
include ("menu.php");

$cod=$_GET["cod"];

$sqlp="SELECT id, alcance
FROM pag_alcance
WHERE id='$cod'";
$rsnp = mysql_query($sqlp);
if (mysql_num_rows($rsnp) > 0){
	while($rowp = mysql_fetch_array($rsnp)){
		
		/*$idse = $rowp["id"];
		$sec = $rowp["pais"];*/
		$idal = $rowp["id"];
		$alca = $rowp["alcance"];
		
		}
		}

$aa = date("Y");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Info Paginas</title>
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
function valida(regalca) {
    if (regalca.nomalcan.value.length < 1){
	
		alert("Ingrese Nombre del Alcance");
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
<form name="regalca" method="post" action="insertmodifalca.php"  onSubmit="return valida(this);">
<table border="1" bordercolor="#00CCFF" style='background-color:#CEECF5;
   color:#039;
   width: 400px;
   padding: 10px;
   border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>
   <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td bgcolor="#279CC9" colspan="2" align="center"><b><font color="#FFFFFF">Registrar Alcances</font></b></td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Nombre Alcance:</td>
    <td><input name="nomalcan" type="text" size="30" value="<? echo $alca; ?>"  />
    <input name="idal" type="hidden" size="15" value="<? echo $idal; ?>"  /></td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)' align="center">
    <td colspan="2"><input name="graba" type="submit" value="Guardar" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="resetea" onclick="javascript:history.back()" type="button" value="Regresar Atras" /></td>
  </tr>
</table>
</form>
</center>

</body>
</html>