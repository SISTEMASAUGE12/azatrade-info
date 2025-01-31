<?
include ("conection/config.php");
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include("menuB.php");
echo"</header>";


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Mercado Internacional e Indicadores</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
<Script type = "text/javascript" src = "ajax3.js"> </script> 
</head>

<body>
<section  id = "main-content" >
<br><br>
<Center> 
Ingrese Codigo Consulta:  <input type = "text" id = "bus" name = "bus" placeholder = "Ingrese Codigo a Consultar" onkeyup = "loadXMLDoc ()" required />  

<Div id ="myDiv"> </div> 

</Center> 

</section>

</body>
</html>
<?
include("pie.php");
?>