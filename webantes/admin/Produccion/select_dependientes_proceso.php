<?php
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects=array(
"sector"=>"sector",
"produ"=>"producto"
);

function validaSelect($selectDestino)
{
	// Se valida que el select enviado via GET exista
	global $listadoSelects;
	if(isset($listadoSelects[$selectDestino])) return true;
	else return false;
	//echo "xx";
}

function validaOpcion($opcionSeleccionada)
{
	// Se valida que la opcion seleccionada por el usuario en el select tenga un valor numerico
	if(is_numeric($opcionSeleccionada)) return true;
	else return false;
}

$selectDestino=$_GET["select"]; $opcionSeleccionada=$_GET["opcion"];

if(validaSelect($selectDestino) && validaOpcion($opcionSeleccionada))
{
	//$tabla=$listadoSelects[$selectDestino];
	//$tabla = "producto"
	$tabla=$listadoSelects[$selectDestino];
	//include 'conexion.php';
	include ("conection/config.php");
	//conectar();
	//$consulta=mysql_query("SELECT id, sector FROM $tabla WHERE relacion='$opcionSeleccionada'") or die(mysql_error());
	$consulta=mysql_query("SELECT id, producto FROM producto WHERE idsector='$opcionSeleccionada'") or die(mysql_error());
	//$consulta=mysql_query("SELECT id, producto FROM $tabla WHERE id='$opcionSeleccionada'") or die(mysql_error());
	//$consulta=mysql_query("SELECT id, producto FROM producto WHERE idsector='$opcionSeleccionada'") or die(mysql_error());
	//desconectar();
	
	// Comienzo a imprimir el select
	echo "<select name='".$selectDestino."' id='".$selectDestino."' onChange='cargaContenido(this.id)'>";
	//echo "<option value='0'>Elige</option>";
	echo "<option value=''>Elige</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		//$registro[1]=htmlentities($registro[1]);
		$registro[1]=addslashes($registro[1]);
		// Imprimo las opciones del select
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}			
	echo "</select>";
}
?>