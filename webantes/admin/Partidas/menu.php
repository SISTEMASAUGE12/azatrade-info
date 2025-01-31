<?
session_start();
session_name();
if(!isset($_SESSION['login_usuario'])) header ('location:../index.php');
$usu = $_SESSION['login_usuario'];

if ($usu==''){
echo"<script type= 'text/javascript'>
window.location.href='../index.php';
	 
          </script> ";
          
}else{

}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.navbar-inverse { background-color: #3086B8}
.navbar-inverse .navbar-nav>.active>a:hover,.navbar-inverse .navbar-nav>li>a:hover, .navbar-inverse .navbar-nav>li>a:focus { background-color: #256FA1}
.navbar-inverse .navbar-nav>.active>a,.navbar-inverse .navbar-nav>.open>a,.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover,.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus { background-color: #000000}
.dropdown-menu { background-color: #FFFFFF}
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { background-color: #428BCA}
.navbar-inverse { background-image: none; }
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { background-image: none; }
.navbar-inverse { border-color: #FFFFFF}
.navbar-inverse .navbar-brand { color: #FFFBFA}
.navbar-inverse .navbar-brand:hover { color: #FFFFFF}
.navbar-inverse .navbar-nav>li>a { color: #FFFFFF}
.navbar-inverse .navbar-nav>li>a:hover, .navbar-inverse .navbar-nav>li>a:focus { color: #FFFFFF}
.navbar-inverse .navbar-nav>.active>a,.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover, .navbar-inverse .navbar-nav>.open>a:focus { color: #FFFFFF}
.navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>.active>a:focus { color: #FFFFFF}
.dropdown-menu>li>a { color: #000000}
.dropdown-menu>li>a:hover, .dropdown-menu>li>a:focus { color: #FFFFFF}
.navbar-inverse .navbar-nav>.dropdown>a .caret { border-top-color: #33ADCC}
.navbar-inverse .navbar-nav>.dropdown>a:hover .caret { border-top-color: #FFFFFF}
.navbar-inverse .navbar-nav>.dropdown>a .caret { border-bottom-color: #33ADCC}
.navbar-inverse .navbar-nav>.dropdown>a:hover .caret { border-bottom-color: #FFFFFF}
</style>

<script src="jquery/jquery-1.11.3.js"></script>	
		<script src="bootstrap/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script> 
        
</head>

<body>
<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="./" class="navbar-brand"><img class="img-responsive" src="img/Azatrade11.png" width="120"></a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        <li>
          <a href="../interfaces/principal.php">Inicio</a>
        </li>
				<!--<li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li><a href="#">Action</a></li>
	          <li><a href="#">Another action</a></li>
	          <li><a href="#">Something else here</a></li>
	          <li><a href="#">Separated link</a></li>
	          <li><a href="#">One more separated link</a></li>
	        </ul>
	      </li>-->
        <li>
          <a href="Consultardato.php">Busqueda Datos</a>
        </li>
        <li>
          <a href="viewconsulpart.php">Consultar Partidas</a>
        </li>
        <li>
          <a href="../interfaces/cerrar2.php"">Cerrar Sesi&oacute;n <img src="img/Sair.png" width="18" height="17"></a>
        </li>
      </ul>
    </nav>
  </div>
</header>
</body>
</html>