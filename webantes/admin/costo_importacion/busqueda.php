<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
<Script type = "text/javascript" src = "ajaxdata1.js"> </script> 
</head>

<body>
<br /><br /><br />
<table class="table table-hover" style='font-size:80%'>
<tr>
<td><img src="img/Azatrade_sistemas.png" width="120" /></td><td align="left"><h5><b>Consultar Busqueda por Informacion del Proveedor</b></h5></td>
</tr>
<tr>
<td colspan="2">

<section  id = "main-content" >
<Center> 
Ingrese Datos de Busqueda:  <input type class="form-control" = "text" id = "bus" name = "bus" placeholder = "Codigo, Proveedor, Contacto, Web, Puerto / Pais" onkeyup = "loadXMLDoc ()" required />  

<Div id ="myDiv"> </div> 

</Center> 

</section>
</td>
</tr>
</table>


</body>
</html>
<?php
include("pie.php");
?>