<?php
   
   /* //tomo el valor de un elemento de tipo texto del formulario  
$cadenatexto = $_POST["tipo_ar"];  
echo "Escribió en el campo de texto: " . $cadenatexto .  "<br><br>";  

//datos del arhivo  
$nombre_archivo = $HTTP_POST_FILES['carga_ar']['name'];  
$tipo_archivo = $HTTP_POST_FILES['carga_ar']['type'];  
$tamano_archivo = $HTTP_POST_FILES['carga_ar']['size']; 
$destino = 'data_archivos/'.$nombre_archivo;  
//compruebo si las características del archivo son las que deseo  
if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 9000000000000000000000000000000000000000000000000000000000000000))) {  
       echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";  
}else{  
       if (copy($_FILES['carga_ar']['tmp_name'],$destino)) {  
   echo "El archivo ha sido cargado correctamente."; 
} else { 
echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
} 

} */

/*
// Hacemos una condicion en la que solo permitiremos que se suban imagenes y que sean menores a 200,000,000 Bytes = 20,000 KiloBytes = 20 MegaBytes

$tipos = array("application/msword","application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/vnd.ms-excel","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	
    if ((($_FILES["carga_ar"]["type"] == "image/gif") ||  
    ($_FILES["carga_ar"]["type"] == "image/png") || 
	($_FILES['carga_ar']['type']==$tipos) || 
	($_FILES["carga_ar"]["type"] == "image/jpg") ||  
    ($_FILES["carga_ar"]["type"] == "image/jpeg")) &&  
    ($_FILES["carga_ar"]["size"] < 20000000000)) { 
	
     
    //Si es que hubo un error en la subida, mostrarlo, de la variable $_FILES podemos extraer el valor de [error], que almacena un valor booleano (1 o 0).
      if ($_FILES["carga_ar"]["error"] > 0) { 
        echo $_FILES["carga_ar"]["error"] . "<br />"; 
      } else { 
          // Si no hubo ningun error, hacemos otra condicion para asegurarnos que el archivo no sea repetido 
          if (file_exists("data_archivos/" . $_FILES["carga_ar"]["name"])) { 
            //echo $_FILES["carga_ar"]["name"] . " ya existe. "; 
			echo "<script type='text/javascript'> alert('El Archivo de Carga Ya Existe !!'); </script> ";
			//volvemos a cargar la pagina
			echo"<script>location.href='RegDataPag.php'</script>";
          } else { 
           // Si no es un archivo repetido y no hubo ningun error, procedemos a subir a la carpeta /archivos, seguido de eso mostramos la imagen subida
            move_uploaded_file($_FILES["carga_ar"]["tmp_name"], 
            "data_archivos/" . $_FILES["carga_ar"]["name"]); 
            //echo "Archivo Subido <br />"; 
            //echo "<img src='data_archivos/".$_FILES["carga_ar"]["name"]."' />";
			
			
			///subimos datos a la base
			include ("conection/config.php");
			$ruta= $_POST["carga_ar"];
			$Sql="insert into pag_datapagina (
cod_tipo_bus,cod_pais,cod_pais_merca,cod_sector,cod_producto,cod_tema,cod_idioma,cod_tipo_dato,cod_alcance,cod_tipo_acceso,cod_variable,cod_entre,cod_inst,nom_inst,nom_pag,descri_pag,dire_pag,fecha_actu,carga_ar,tipo_ar,descri_entre,costo
)  values ('".$_POST["buqueda"]."',
'".$_POST["pais"]."',
'".$_POST["mercado"]."',
'".$_POST["sector"]."',
'".$_POST["produ"]."',
'".$_POST["tema"]."',
'".$_POST["idioma"]."',
'".$_POST["tdato"]."',
'".$_POST["alcance"]."',
'".$_POST["tacceso"]."',
'".$_POST["varia"]."',
'".$_POST["entre"]."',
'".$_POST["inst"]."',
'".$_POST["nominst"]."',
'".$_POST["nompag"]."',
'".$_POST["despag"]."',
'".$_POST["direpag"]."',
'".$_POST["fecha_act"]."',
'".$_FILES["carga_ar"]["name"]."',
'".$_POST["tipo_ar"]."',
'".$_POST["desentre"]."',
'".$_POST["costo"]."'
)";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   //header("Location: RegDataPag.php");
   echo"<script>location.href='RegDataPag.php'</script>";
   mysql_close($link);
			
			 
          } 
      } 
    } else { 
        // Si el usuario intenta subir algo que no es una imagen o una imagen que pesa mas de 20 KB mostramos este mensaje
       echo "<script type='text/javascript'> alert('Archivo no Permitido por su Peso o Formato. Permite 20MB'); </script> "; 
    } */
	
	//if ($_POST["carga_ar"]!=""){ //Si campo contiene archivo de carga
	if ($_FILES["carga_ar"]["name"]!=""){
	$directorio = 'data_archivos/';
	
	if (file_exists("data_archivos/" . $_FILES["carga_ar"]["name"])) { 
            //echo $_FILES["carga_ar"]["name"] . " ya existe. "; 
			echo "<script type='text/javascript'> alert('El Archivo de Carga Ya Existe !!'); </script> ";
			//volvemos a cargar la pagina
			echo"<script>location.href='new.php'</script>";
          } else {
			 // }

if (move_uploaded_file($_FILES['carga_ar']['tmp_name'], $directorio . $_FILES['carga_ar']['name']))
{
	
	// subimos imagen logo
	if ($_FILES["carga_imagen"]["name"]!=""){
	$target_path = "data_logos/";
$target_path = $target_path . basename( $_FILES['carga_imagen']['name']); 
if(move_uploaded_file($_FILES['carga_imagen']['tmp_name'], $target_path)) { 
//echo "El archivo ". basename( $_FILES['carga_imagen']['name']). " ha sido subido";
} else{
//echo "Ha ocurrido un error, trate de nuevo!";
}
}
	///subimos datos a la base
			include ("conection/config.php");
			//$ruta= $_POST["carga_ar"];
			$Sql="insert into pag_datapagina (
cod_tipo_bus,cod_pais,cod_pais_merca,cod_sector,cod_producto,cod_tema,cod_idioma,cod_tipo_dato,cod_alcance,cod_tipo_acceso,cod_variable,cod_entre,cod_inst,nom_inst,nom_pag,descri_pag,dire_pag,fecha_actu,carga_ar,tipo_ar,descri_entre,costo,buscar,carga_img,autor_reg,autor_cel,autor_correo,estado,link_tuto
)  values ('2',
'".$_POST["pais"]."',
'".$_POST["mercado"]."',
'".$_POST["sector"]."',
'".$_POST["produ"]."',
'".$_POST["tema"]."',
'".$_POST["idioma"]."',
'".$_POST["tdato"]."',
'".$_POST["alcance"]."',
'".$_POST["tacceso"]."',
'10',
'1',
'".$_POST["inst"]."',
'".$_POST["nominst"]."',
'".$_POST["nompag"]."',
'".$_POST["despag"]."',
'".$_POST["direpag"]."',
now(),
'".$_FILES["carga_ar"]["name"]."',
'-',
'".$_POST["desentre"]."',
'".$_POST["costo"]."',
'',
'".$_FILES["carga_imagen"]["name"]."',
'".$_POST["nom_autor"]."',
'".$_POST["cel_autor"]."',
'".$_POST["correo_autor"]."',
'".$_POST["estado"]."',
'".$_POST["linktutorial"]."')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   //header("Location: RegDataPag.php");
   
   //actualizamos la concatenacion d todo los campos en un solo campo
      include("actualizacadena.php");
   
   
   
   /*echo "<script type='text/javascript'> alert('Informacion Registrado'); </script> ";*/
   echo"<script>location.href='new_confirm.php'</script>";
   mysql_close($link);
   
    //print "El archivo fue subido con éxito.";
} 
else
{
    //print "Error al intentar subir el archivo.";
	echo "<script type='text/javascript'> alert('Error al intentar Registrar '); </script> ";
	 echo"<script>location.href='new.php'</script>";
}
}
}else
{//fin si campo contiene archivo de carga

// subimos imagen logo
	if ($_FILES["carga_imagen"]["name"]!=""){
	$target_path = "data_logos/";
$target_path = $target_path . basename( $_FILES['carga_imagen']['name']); 
if(move_uploaded_file($_FILES['carga_imagen']['tmp_name'], $target_path)) { 
//echo "El archivo ". basename( $_FILES['carga_imagen']['name']). " ha sido subido";
} else{
//echo "Ha ocurrido un error, trate de nuevo!";
}
}

include ("conection/config.php");
			//$ruta= $_POST["carga_ar"];
			$Sqlx="insert into pag_datapagina (
cod_tipo_bus,cod_pais,cod_pais_merca,cod_sector,cod_producto,cod_tema,cod_idioma,cod_tipo_dato,cod_alcance,cod_tipo_acceso,cod_variable,cod_entre,cod_inst,nom_inst,nom_pag,descri_pag,dire_pag,fecha_actu,carga_ar,tipo_ar,descri_entre,costo,buscar,carga_img,autor_reg,autor_cel,autor_correo,estado,link_tuto
)  values ('2',
'".$_POST["pais"]."',
'".$_POST["mercado"]."',
'".$_POST["sector"]."',
'".$_POST["produ"]."',
'".$_POST["tema"]."',
'".$_POST["idioma"]."',
'".$_POST["tdato"]."',
'".$_POST["alcance"]."',
'".$_POST["tacceso"]."',
'10',
'1',
'".$_POST["inst"]."',
'".$_POST["nominst"]."',
'".$_POST["nompag"]."',
'".$_POST["despag"]."',
'".$_POST["direpag"]."',
now(),
'".$_POST["carga_ar"]."',
'-',
'".$_POST["desentre"]."',
'".$_POST["costo"]."',
'',
'".$_FILES["carga_imagen"]["name"]."',
'".$_POST["nom_autor"]."',
'".$_POST["cel_autor"]."',
'".$_POST["correo_autor"]."',
'".$_POST["estado"]."',
'".$_POST["linktutorial"]."')";
// strtoupper convierte a mayusculas
   mysql_query($Sqlx,$link); 
   //header("Location: RegDataPag.php");
   
   //actualizamos la concatenacion d todo los campos en un solo campo
      include("actualizacadena.php");
   
   
   
   /*echo "<script type='text/javascript'> alert('Informacion Registrado'); </script> ";*/
   echo"<script>location.href='new_confirm.php'</script>";
   mysql_close($link);
}




?>