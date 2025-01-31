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
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">	
		<script src="jquery/jquery-1.11.3.js"></script>	
		<script src="bootstrap/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script> 
        
<script src="ajax/jquery.min.js"></script>
</head>

<body>

<table border="0" align="center">
<tr>
<td>
<? 
if ($_SESSION['rol'] == 'ADMIN') {
 ?>
 
<nav id="menu">

<li id="nav_mobile">Menu <img src="img/menu.png" style="width: 16px; margin-bottom: -3px"></li>

<div id="oculto">
<!-- <li><a href="index.php">Inicio <img src="img/Home.png" width="18" height="17"></a></li> -->
<li><a href="../interfaces/principal.php">Inicio <img src="img/Home.png" width="18" height="17"></a></li>
<li>Registro <img src="img/reg.png" width="18" height="17">
<ul style="display:none">
        <a href="vistatbusqueda.php"><li>Tipo Busqueda</li></a>
        <a href="vistatdato.php"><li>Tipo Dato</li></a>
        <a href="vistatacceso.php"> <li>Tipo Acceso</li></a>
        <a href="vistatema.php"><li>Tema</li></a>
        <a href="vistapais.php"><li>Pais</li></a>
        <a href="vistasector.php"><li>Sector</li></a>
        <a href="vistaproducto.php"><li>Producto</li></a>
        <a href="vistainst.php"><li>Institucion</li></a>
        <a href="vistaidioma.php"> <li>Idioma</li></a>
        <a href="vistaalcan.php"><li>Alcance</li></a>
        <a href="vistavariable.php"><li>Variables</li></a>
        <a href="vistaentreg.php"><li>Entregable</li></a>
        <!--<li><a href="#">Descarga</a></li> -->
        
  
    </ul>

</li>

<li>Paginas <img src="img/producci.png" width="18" height="17">
<ul style="display:none">
        <a href="RegDataPag.php"><li>Registrar Información</li></a>
      
    </ul>
</li>
<li><a href="consuldata.php">Consultas <img src="img/consult.png" width="18" height="17"></a></li>
<!--<li><a href="importardata.php">Importar <img src="img/Import.png" width="18" height="17"></a></li> -->
<li class="active"><a href="../interfaces/cerrar2.php">Cerrar Sesi&oacute;n <img src="img/Sair.png" width="18" height="17"></a></li>
</div>
</nav>
<?php
   }elseif ($_SESSION['rol'] == 'BASICO'){
   ?>
   <nav id="menu">

<li id="nav_mobile">Menu <img src="img/menu.png" style="width: 16px; margin-bottom: -3px"></li>

<div id="oculto">
<!-- <li><a href="index.php">Inicio <img src="img/Home.png" width="18" height="17"></a></li> -->
<li><a href="../interfaces/principal.php">Inicio <img src="img/Home.png" width="18" height="17"></a></li>
<!-- <li>Registro <img src="img/reg.png" width="18" height="17">
<ul style="display:none">
        <a href="vistatbusqueda.php"><li>Tipo Busqueda</li></a>
        <a href="vistatdato.php"><li>Tipo Dato</li></a>
        <a href="vistatacceso.php"> <li>Tipo Acceso</li></a>
        <a href="vistatema.php"><li>Tema</li></a>
        <a href="vistapais.php"><li>Pais</li></a>
        <a href="vistasector.php"><li>Sector</li></a>
        <a href="vistaproducto.php"><li>Producto</li></a>
        <a href="vistainst.php"><li>Institucion</li></a>
        <a href="vistaidioma.php"> <li>Idioma</li></a>
        <a href="vistaalcan.php"><li>Alcance</li></a>
        <a href="vistavariable.php"><li>Variables</li></a>
        <a href="vistaentreg.php"><li>Entregable</li></a>
        
        
  
    </ul>

</li> -->

<!-- <li>Paginas <img src="img/producci.png" width="18" height="17">
<ul style="display:none">
        <a href="RegDataPag.php"><li>Registrar Informacion</li></a>
      
    </ul>
</li> -->
<li><a href="consuldata.php">Consultas <img src="img/consult.png" width="18" height="17"></a></li>
<!-- <li><a href="importardata.php">Importar <img src="img/Import.png" width="18" height="17"></a></li> -->
<li class="active"><a href="../interfaces/cerrar2.php">Cerrar Sesi&oacute;n <img src="img/Sair.png" width="18" height="17"></a></li>
</div>
</nav>
<?
}
?>

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