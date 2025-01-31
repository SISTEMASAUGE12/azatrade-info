<?php
include ("conection/config.php");



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">


<script language="javascript" type="text/javascript">
function valida(nuevocont) {
    if (nuevocont.conte.value.length < 1){
		alert("Ingrese Tipo Contenedor");
		return false;
	}
	 if (nuevocont.c_peso.value.length < 1){
		alert("Ingrese Carga Peso (Kg)");
		return false;
	}
	if (nuevocont.c_volu.value.length < 1){
		alert("Ingrese Carga Volumen");
		return false;
	}
	if (nuevocont.m_largo.value.length < 1){
		alert("Ingrese Medida Interna Largo");
		return false;
	}
	if (nuevocont.m_pie1.value.length < 1){
		alert("Ingrese Medida Interna Pie");
		return false;
	}
	if (nuevocont.m_ancho.value.length < 1){
		alert("Ingrese Medida Interna Ancho");
		return false;
	}
	if (nuevocont.m_pie2.value.length < 1){
		alert("Ingrese Medida Interna Pie");
		return false;
	}
	if (nuevocont.m_altura.value.length < 1){
		alert("Ingrese Medida Interna Altura");
		return false;
	}
	if (nuevocont.m_pie3.value.length < 1){
		alert("Ingrese Medida Interna Pie");
		return false;
	}
	if (nuevocont.descri.value.length < 1){
		alert("Ingrese Descripcion");
		return false;
	}
	
	return true;
}
</script>
</head>

<body>


<form class="form-horizontal" name="nuevocont" method="post" onSubmit="return valida(this);" action="insertacontenedor.php" enctype="multipart/form-data">

<table class="table table-hover" style='font-size:80%'>
<tr>
<td colspan="2" align="center"><b>Nuevo Registro</b></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Tipo Contenedor:</td>
<td><input class="form-control" name="conte" type="text" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Carga peso (Kg):</td>
<td><input class="form-control" name="c_peso" type="text" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Carga Volumen (m3):</td>
<td><input class="form-control" name="c_volu" type="text" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Largo m.:</td>
<td><input class="form-control" name="m_largo" type="text" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Pies:</td>
<td><input class="form-control" name="m_pie1" type="text" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Ancho m.:</td>
<td><input class="form-control" name="m_ancho" type="text" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Pies:</td>
<td><input class="form-control" name="m_pie2" type="text" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Altura m.:</td>
<td><input class="form-control" name="m_altura" type="text" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Pies:</td>
<td><input class="form-control" name="m_pie3" type="text" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Descripcion:</td>
<td><textarea name="descri" type="text" rows="8" cols="50" ></textarea></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Foto:</td>
<td>
 <input class="form-control" type="file" id='imagen' name="imagen" /><br /> 
<!-- <img src='data_archivos/Sin_imagen_disponible.jpg' width='350' > -->
</td>
</tr>
<tr>
<td colspan="2" align="center"><input class="btn btn-success" name="guardar" type="submit" value="Registrar" /></td>
</tr>
</table>
</form>

<?php
if(isset($_POST['guardar'])){
	
}
	
?>
</body>
</html>