<?php
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Gestion de Partidas</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
include("Consultardato.php");
$parametro = $_GET["dato"];
	$titulo = $parametro;
	
	if($parametro=="Clasificacion Arancel"){
		$titulo = "Clasificacion Arancel";
		include("ViewTree.php");
    }
	if($parametro=="Nandina"){
       $titulo = "Tabla de Arancel Nandina";
		include("TableNandisa.php");
    }
	if($parametro=="Mrestri"){
		 $titulo = "Mercancias Restringidas para Importar y Exportar";
		include("TableMrestri.php");
    }
	if($parametro=="Convenios"){
		 $titulo = "Partidas sujetas a otros convenios internacionales";
		include("TableAladlibe.php");
    }
	if($parametro=="Ciiu"){
		 $titulo = "Tabla de CIIU para descripcion de agrupamiento";
		include("TableCiiu.php");
    }
	if($parametro=="Cuodes"){
		 $titulo = "Tabla de CUODES";
		include("TableCuodes.php");
    }
	if($parametro=="Sectores"){
		 $titulo = "Tabla de Sectores";
		include("TableSector.php");
    }
	if($parametro=="Demerpro"){
		 $titulo = "Mercancias Prohibidas a Exportar";
		include("TableDemerpro.php");
    }
	if($parametro=="Dimerpro"){
		 $titulo = "Mercancias Prohibidas de Importacion";
		include("TableDimerpro.php");
    }
	if($parametro=="Deexcnan"){
		 $titulo = "Productos Exceptuados de las Prohibiciones a Exportar";
		include("TableDeexcnan.php");
    }
	if($parametro=="Pamoexc"){
		 $titulo = "Partidas no Excluidas a Restitucion de Derechos";
		include("TableParnoexc.php");
    }
	if($parametro=="Concepto"){
		 $titulo = "Tabla de Sanciones";
		include("TableConcepto.php");
    }
?>
</body>
</html>