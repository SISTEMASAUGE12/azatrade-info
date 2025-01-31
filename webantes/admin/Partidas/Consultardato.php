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

<script language="javascript" type="text/javascript">
function valida(datos) {
    if (datos.dato.value.length < 1){
	
		alert("Seleccione Consulta");
		return false;
	}

	return true;
}
</script>
</head>

<body>
<br /><br /><br />
<table border="0" class=" table table-hover">
<tr><td>
<form name="datos" method="get" action="lista.php" onsubmit="return valida(this);" >
&nbsp;&nbsp;&nbsp;<label>Seleccione Consulta:</label>
<SELECT NAME="dato" class="caption active"> 
   <OPTION VALUE=""></OPTION>
   <OPTION VALUE="Clasificacion Arancel">Clasificacion Arancel</OPTION> 
   <OPTION VALUE="Nandina">Tabla de Arancel Nandina</OPTION> 
   <OPTION VALUE="Mrestri">Mercancias Restringidas para Importar y Exportar</OPTION>
   <OPTION VALUE="Convenios">Partidas sujetas a otros convenios internacionales</OPTION>
   <OPTION VALUE="Ciiu">Tabla de CIIU para descripcion de agrupamiento</OPTION>
   <OPTION VALUE="Cuodes">Tabla de CUODES</OPTION>
   <OPTION VALUE="Sectores">Tabla de Sectores</OPTION>
   <OPTION VALUE="Demerpro">Mercancias Prohibidas a Exportar</OPTION>
   <OPTION VALUE="Dimerpro">Mercancias Prohibidas de Importacion</OPTION>
   <OPTION VALUE="Deexcnan">Productos Exceptuados de las Prohibiciones a Exportar</OPTION>
   <OPTION VALUE="Pamoexc">Partidas no Excluidas a Restitucion de Derechos</OPTION>
   <OPTION VALUE="Concepto">Tabla de Sanciones</OPTION>
</SELECT> 
<INPUT name="consultar" TYPE="submit" class="btn btn-success" value="Consultar">
</form>
</td></tr></table>

<?php
//echo "yyy";
/*if (isset($consultar)){
	//if($_POST){
		
	$parametro = $_GET["dato"];
	$titulo = $parametro;
	echo "xxx";
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
    //}
    }*/

?>

</body>
</html>
<?php
//include("pie.php");
?>