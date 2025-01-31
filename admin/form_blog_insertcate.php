<?php
include("incBD/inibd.php");
set_time_limit(450);

 $code = $_POST["idid"];
$dato1 = $_POST["nomcatego"];
$dato2 = $_POST["editnomcatego"];


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
	$amiurlcur = urls_amigables($dato1);
$amiurlcurdos = urls_amigables($dato2);

if($code==""){ //nuevo registro

$Sql_inser="insert into blog_cate (nomcate, urlcate, estado, fechareg 
)  values (
'$dato1',
'$amiurlcur',
'A',
now() )";
	$rscrea2 = $conexpg->query($Sql_inser);
   
mysqli_close($conexpg);

   $regale="ok";
   echo"<script>location.href='form-blog-categoria.php?var=$regale'</script>";
	
}

//UPDATE
if($code!=""){ // actualizamos datos
	
	$Sql="UPDATE blog_cate 
			SET 
			nomcate = '$dato2',
			urlcate = '$amiurlcurdos'
            WHERE idcate = '$code' ";
	
	 $rscrea2 = $conexpg->query($Sql) or die(mysqli_error($conexpg));
	 if (!$rscrea2) {
    echo "Query: Un error ha occurido al crear insercion  tabla Temporal";
  } 
	mysqli_close($conexpg);
	 $ediale="up";
  echo"<script>location.href='form-blog-categoria.php?var=$ediale'</script>";
	
}

?>