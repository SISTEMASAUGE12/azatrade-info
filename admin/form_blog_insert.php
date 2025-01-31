<?php
include("incBD/inibd.php");
set_time_limit(450);

$accion = $_POST["accion"];

 $cuser_u = $_POST["codeid"];
$dato1 = $_POST["tipo_cate"];
$dato2 = $_POST["nombreblog"];
$dato3 = $_FILES["fotoimg"]["name"];
$dato4 = $_POST["linkvideo"];
$dato5 = $_POST["detallecorto"];
$dato6 = $_POST["editor2"];
$dato7 = $_FILES["archivodes"]["name"];

$dato8 = $_POST["fotoimg_edit"];
$dato9 = $_POST["archivodes_edit"];
$dato10 = $_POST["idcodigo"];


//url amigables reemplanzando el %20 por guion (-)
function urls_amigables($url) {
// Tranformamos todo a minusculas
$url = strtolower($url);
//Rememplazamos caracteres especiales latinos
$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
$repl = array('a', 'e', 'i', 'o', 'u', 'n');
$url = str_replace ($find, $repl, $url);
// Añadimos los guiones
$find = array(' ', '&', '\r\n', '\n', '+'); 
$url = str_replace ($find, '-', $url);
// Eliminamos y Reemplazamos demás caracteres especiales
$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
$repl = array('', '-', '');
$url = preg_replace ($find, $repl, $url);
return $url;
}
	$amiurlcur = urls_amigables($dato2);

if($accion==""){ //nuevo registro
	//IMAGEN
if($dato3!=""){//si adjunta archivo
    $directorio = "archive/";
    if (!file_exists($directorio))
        mkdir($directorio, 0777, true);
    $tipoArchivo = strtolower(pathinfo($_FILES["fotoimg"]["name"], PATHINFO_EXTENSION));
	$id = substr(md5(time()), 0, 16);
        if (move_uploaded_file($_FILES["fotoimg"]["tmp_name"], $adjunto = $directorio . $id . "_bog." . $tipoArchivo)) {
           // echo "archivo subido con exito";
			$adjuntoar = $id . "_bog." . $tipoArchivo;
        } else {
            //echo "error en la subida del archivo";
        }

}else{
	$adjuntoar = $dato8;
}

//ARCHIVO DESCARGA
if($dato7!=""){//si adjunta archivo
    $directoriod = "archive/";
    if (!file_exists($directoriod))
        mkdir($directoriod, 0777, true);
    $tipoArchivod = strtolower(pathinfo($_FILES["archivodes"]["name"], PATHINFO_EXTENSION));
	$idd = substr(md5(time()), 0, 16);
        if (move_uploaded_file($_FILES["archivodes"]["tmp_name"], $adjunto = $directoriod . $idd . "_descarga." . $tipoArchivod)) {
           // echo "archivo subido con exito";
			$adjuntoard = $idd."_descarga.".$tipoArchivod;
        } else {
            //echo "error en la subida del archivo";
        }

}else{
	$adjuntoard = $dato9;
}

$Sql_inser="insert into blog (idcate, titulo, urlnombre, tipo, foto1, foto2, urlvideo, textocorto, detalle, archivo, fechareg, usureg, cantvisita, estado
)  values (
'$dato1',
'$dato2',
'$amiurlcur',
'',
'$adjuntoar',
'$adjuntoar',
'$dato4',
'$dato5',
'$dato6',
'$adjuntoard',
now(),
'$cuser_u',
'0',
'A')";
	$rscrea2 = $conexpg->query($Sql_inser);
   
mysqli_close($conexpg);
   //para mandar correo de registro de confirmacion
      //include("avisa_acceso_correo.php");
   $regale="ok";
   echo"<script>location.href='form-blog.php?by=$regale'</script>";
	
}

//UPDATE
if($accion!=""){ // actualizamos datos
	//IMAGEN
if($dato3!=""){//si adjunta archivo
    $directorio = "archive/";
    if (!file_exists($directorio))
        mkdir($directorio, 0777, true);
    $tipoArchivo = strtolower(pathinfo($_FILES["fotoimg"]["name"], PATHINFO_EXTENSION));
	$id = substr(md5(time()), 0, 16);
        if (move_uploaded_file($_FILES["fotoimg"]["tmp_name"], $adjunto = $directorio . $id . "_bog." . $tipoArchivo)) {
           // echo "archivo subido con exito";
			$adjuntoar = $id . "_bog." . $tipoArchivo;
        } else {
            //echo "error en la subida del archivo";
        }

}else{
	$adjuntoar = $dato8;
}

//ARCHIVO DESCARGA
if($dato7!=""){//si adjunta archivo
    $directoriod = "archive/";
    if (!file_exists($directoriod))
        mkdir($directoriod, 0777, true);
    $tipoArchivod = strtolower(pathinfo($_FILES["archivodes"]["name"], PATHINFO_EXTENSION));
	$idd = substr(md5(time()), 0, 16);
        if (move_uploaded_file($_FILES["archivodes"]["tmp_name"], $adjunto = $directoriod . $idd . "_descarga." . $tipoArchivod)) {
           // echo "archivo subido con exito";
			$adjuntoard = $idd."_descarga.".$tipoArchivod;
        } else {
            //echo "error en la subida del archivo";
        }

}else{
	$adjuntoard = $dato9;
}
	
	$Sql="UPDATE blog 
			SET 
			idcate='$dato1',
			titulo='$dato2',
			urlnombre='$amiurlcur',
			foto1='$adjuntoar',
			foto2='$adjuntoar',
			urlvideo='$dato4',
			textocorto='$dato5',
			detalle='$dato6',
			archivo='$adjuntoard'
            WHERE idblog ='$dato10' ";
	
	 $rscrea2 = $conexpg->query($Sql) or die(mysqli_error($conexpg));
	 if (!$rscrea2) {
    echo "Query: Un error ha occurido al crear insercion  tabla Temporal";
  }
	mysqli_close($conexpg);
	 $ediale="ok";
  echo"<script>location.href='form-blog-lista.php?var=$ediale'</script>";
	
}

?>