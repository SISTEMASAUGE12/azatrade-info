<?
session_start();
//session_name("redfad");
session_name();
if(!isset($_SESSION['login_usuario'])) header ('location:../index.php');
$usu = $_SESSION['login_usuario'];
if ($usu==''){
//echo "xx";
//header ("location:../index.php");

echo"<script type= 'text/javascript'>
window.location.href='../index.php';
	 
          </script> ";
          
}else{
//echo "aa";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<title>Prueba</title> -->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
<!-- <link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">	-->
		<script src="jquery/jquery-1.11.3.js"></script>	
		<!-- <script src="bootstrap/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script> -->
        
<script src="js/jquery.min.js"></script>


</head>

<body>

<table border="0" align="center">
<tr>
<td>
<nav id="menu">

<li id="nav_mobile">Menu <img src="img/menu.png" style="width: 16px; margin-bottom: -3px"></li>

<div id="oculto">
<!-- <li><a href="index.php">Inicio <img src="img/Home.png" width="18" height="17"></a></li> -->
<li><a href="../interfaces/principal.php">Inicio <img src="img/Home.png" width="18" height="17"></a></li>

 <li>&nbsp;&nbsp; Analisis de Registro &nbsp;&nbsp;<img src="img/reg.png" width="18" height="17">
<ul style="display:none">
<a href="GuiaCostoExpo.php"><li>Costo Exportacion</li></a>
<a href="Lista.php"><li>Lista D.F.I.</li></a>
    </ul>

</li> 

<!-- <a href="Lista.php"><li>&nbsp;&nbsp; Costos de Exportacion &nbsp;&nbsp; <img src="img/reg.png" width="18" height="17"></li></a> -->

<!-- <a href="../c/viewcontainer.php"><li>&nbsp;&nbsp; Registrar Contenedor &nbsp;&nbsp; <img src="img/reg.png" width="18" height="17"></li></a> -->

<?php
if ($_SESSION['rol'] == 'ADMIN') {
 ?>
<a href="viewcontainer.php"><li>&nbsp;&nbsp; Registrar Contenedor &nbsp;&nbsp; <img src="img/reg.png" width="18" height="17"></li></a>
<?php
}
?>

<li><a href="consultaexpo.php">&nbsp;&nbsp; Consultar Datos &nbsp;&nbsp; <img src="img/consult.png" width="18" height="17"></a></li>

<!-- <li>Consultas <img src="img/producci.png" width="18" height="17">
<ul style="display:none">
        <a href="RegDataPag.php"><li>Consultar Partidas</li></a>
      
    </ul>
</li> -->
<!-- <li><a href="consultpart.php">Consultar Partidas <img src="img/consult.png" width="18" height="17"></a></li> -->
<!-- <li>&nbsp;&nbsp; Consultar Datos &nbsp;&nbsp; <img src="img/consult.png" width="18" height="17">
<ul style="display:none">
<a href="busqueda.php"><li>Infomacion Proveedor</li></a>
<a href="#"><li>Descripcion Producto</li></a>
    </ul>
</li>-->

<!-- <li>Consultar Datos <img src="img/consult.png" width="18" height="18">
  <ul style="display:none">
        <a href="busqueda.php"><li>Infomacion Proveedor</li></a>
      
    </ul>
</li> -->



<li class="active"><a href="../interfaces/cerrar2.php">Cerrar Sesi&oacute;n <img src="img/Sair.png" width="18" height="17"></a></li>
</div>

</nav>

<script>

//Desplegar al hacer clic
$('#menu li').click(function(){	
	$(this).find('ul').slideToggle('slow');	
});

$('#nav_mobile').click(function(){	
	$('#oculto').slideToggle('slow');	
});

</script>

<style>
body {
	background:f1f1f1;
	font-family: 'Open Sans', sans-serif;
}
#menu {
	float:left;
	overflow:hidden;
}
#menu a{
	text-decoration:none;
	color:#fff;
}
#menu li {
  float: left;
  overflow: hidden;
  list-style: none;
  padding: 10px 0px;
  border: 1px solid #ddd;
 /* background: #424242;*/
  background:#99CCFF;
  color: #fff;
  text-align: center;
  min-width: 150px;
}
#menu li:hover {
	cursor:pointer;
  background-color: #279CC9;
}
}
#menu li img{
	margin: 50px 50px -2px 50px;
}
#menu ul{
  position: absolute;
  margin: 0px;
  padding: 0px;
  margin-top: 11px;
  max-width: 280px;
  overflow: hidden;
}
#menu ul li {
/*	background:#575757;*/
	background:#99CCFF
}
#nav_mobile {
	display:none;
	/*background: #353535 !important;*/
	background:#F90 !important;
}
#oculto {
	overflow:hidden;
}
@media screen and (max-width: 580px) {
#menu li {
		float:none;
}
#menu ul {
  position: relative;
}
	
#menu ul li {
	border:none;
}
#nav_mobile {
	display:block;
}
#oculto {
	display:none;
}
}
@media screen and (min-width: 580px) {
	#oculto {
	display: block !important ;
}
	
}
</style>

</td>
</tr>
</table>
</body>
</html>