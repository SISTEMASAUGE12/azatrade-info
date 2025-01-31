<?php
include ("conection/config.php");

$edicion=$_POST["edici"];
$codi = $_POST["codigo"];
$contee = $_POST["conte"];
$cpeso = $_POST["c_peso"];
$cvolu = $_POST["c_volu"];
$mlargo = $_POST["m_largo"];
$mpie1 = $_POST["m_pie1"];
$mancho = $_POST["m_ancho"];
$mpie2 = $_POST["m_pie2"];
$maltura = $_POST["m_altura"];
$mpie3 = $_POST["m_pie3"];
$descri = $_POST["descri"];
$imag = $_FILES['imagen']['name'];

//echo "$imag xxx";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script languaje="javascript">
function recarga_padre_y_cierra_ventana(){
//window.opener.location.reload();
window.close();
}
</script>
</head>

<body onLoad="recarga_padre_y_cierra_ventana()"> 

<?php
if($edicion!=""){
	//modifica registro
if($_FILES['imagen']['tmp_name']!=""){ // si no esta vacio
if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
copy($_FILES['imagen']['tmp_name'], 'data_archivos/'.$_FILES['imagen']['name'].'');
$subido = true;
}
if($subido) {
//echo "<p>El archivo ha sido subido con exito</p>";
} else {
//echo "<p><strong>Error:</strong> El archivo no ha sido subido</p>";
}
}
	
	if($_FILES['imagen']['tmp_name']!=""){ // si el campo foto contiene datos
	$rsh=("update cos_contenedor set contenedor='$contee', carga_pesokg='$cpeso', carga_volumen='$cvolu', med_int_largom='$mlargo', med_int_pies1='$mpie1', med_int_anchom='$mancho', med_int_pies2='$mpie2', med_int_alturam='$maltura', med_int_pies3='$mpie3', descripcion='$descri', imagen='$imag' where codigo='".$codi."'");
	} else { //si el campo foto esta vacio
	$rsh=("update cos_contenedor set contenedor='$contee', carga_pesokg='$cpeso', carga_volumen='$cvolu', med_int_largom='$mlargo', med_int_pies1='$mpie1', med_int_anchom='$mancho', med_int_pies2='$mpie2', med_int_alturam='$maltura', med_int_pies3='$mpie3', descripcion='$descri' where codigo='".$codi."'");
	}
   mysql_query($rsh,$link) or die (mysql_error()); 
//header("Location: vistasector.php");
   mysql_close($link);
  
   
	
	}else{
		//inserta registro nuevo
		
		//funcion que genera codigo alternativo automaticamente
function generarCodigo($longitud) {
 $key = '';
 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
 $max = strlen($pattern)-1;
 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
 return $key;
}
$codxx=generarCodigo(6);
//echo generarCodigo(6);

//inserta imagen si el campo no esta vacio
if($_FILES['imagen']['tmp_name']!=""){ // si no esta vacio
if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
copy($_FILES['imagen']['tmp_name'], 'data_archivos/'.$_FILES['imagen']['name'].'');
$subido = true;
}
if($subido) {
//echo "<p>El archivo ha sido subido con exito</p>";
} else {
//echo "<p><strong>Error:</strong> El archivo no ha sido subido</p>";
}
}

$Sqlinsert="insert into cos_contenedor (codigo, contenedor, carga_pesokg, carga_volumen, med_int_largom, med_int_pies1, med_int_anchom, med_int_pies2, med_int_alturam, med_int_pies3, descripcion, imagen, fecha_reg)  values ('$codxx',
'$contee',
'$cpeso',
'$cvolu',
'$mlargo',
'$mpie1',
'$mancho',
'$mpie2',
'$maltura',
'$mpie3',
'$descri',
'".$_FILES['imagen']['name']."',
now() )";
// strtoupper convierte a mayusculas
   mysql_query($Sqlinsert,$link) or die (mysql_error());
   mysql_close($link);
	
	}

?>
 <script type="text/javascript">
window.opener.location.href="viewcontainer.php"
</script> 
</body>
</html>