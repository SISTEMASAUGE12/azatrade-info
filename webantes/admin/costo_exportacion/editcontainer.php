<?php
include ("conection/config.php");

$codi = $_GET["cod"];
$edita = "edicion";

$sqlvista="SELECT
conte.codigo,
conte.contenedor,
conte.carga_pesokg,
conte.carga_volumen,
conte.med_int_largom,
conte.med_int_pies1,
conte.med_int_anchom,
conte.med_int_pies2,
conte.med_int_alturam,
conte.med_int_pies3,
conte.descripcion,
conte.imagen,
conte.fecha_reg
FROM
cos_contenedor AS conte
WHERE
conte.codigo = '$codi'
";
$rsn = mysql_query($sqlvista);
if (mysql_num_rows($rsn) > 0){
	while($rowp = mysql_fetch_array($rsn)){
		$codigo = $rowp["codigo"];
		$contene = $rowp["contenedor"];
		$c_peso = $rowp["carga_pesokg"];
		$c_volu = $rowp["carga_volumen"];
		$m_largo = $rowp["med_int_largom"];
		$m_pie1 = $rowp["med_int_pies1"];
		$m_ancho = $rowp["med_int_anchom"];
		$m_pie2 = $rowp["med_int_pies2"];
		$m_altura = $rowp["med_int_alturam"];
		$m_pie3 = $rowp["med_int_pies3"];
		$descri = $rowp["descripcion"];
		$foto = $rowp["imagen"];
		
		}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">


<script language="javascript" type="text/javascript">
function valida(editar) {
    if (editar.conte.value.length < 1){
		alert("Ingrese Tipo Contenedor");
		return false;
	}
	 if (editar.c_peso.value.length < 1){
		alert("Ingrese Carga Peso (Kg)");
		return false;
	}
	if (editar.c_volu.value.length < 1){
		alert("Ingrese Carga Volumen");
		return false;
	}
	if (editar.m_largo.value.length < 1){
		alert("Ingrese Medida Interna Largo");
		return false;
	}
	if (editar.m_pie1.value.length < 1){
		alert("Ingrese Medida Interna Pie");
		return false;
	}
	if (editar.m_ancho.value.length < 1){
		alert("Ingrese Medida Interna Ancho");
		return false;
	}
	if (editar.m_pie2.value.length < 1){
		alert("Ingrese Medida Interna Pie");
		return false;
	}
	if (editar.m_altura.value.length < 1){
		alert("Ingrese Medida Interna Altura");
		return false;
	}
	if (editar.m_pie3.value.length < 1){
		alert("Ingrese Medida Interna Pie");
		return false;
	}
	if (editar.descri.value.length < 1){
		alert("Ingrese Descripcion");
		return false;
	}
	
	return true;
}
</script>
</head>

<body>


<form class="form-horizontal" name="editar" method="post" onSubmit="return valida(this);" action="insertacontenedor.php" enctype="multipart/form-data">

<table class="table table-hover" style='font-size:80%'>
<tr>
<td colspan="2" align="center"><b>Modifica Registro</b></td>
</tr>
<tr>
<td bgcolor="#F8F8F8" width="150">Codigo:</td>
<td><input class="form-control" name="codigos" type="text" value="<?php echo "$codigo" ?>" disabled="disabled" />
<input class="form-control" name="codigo" type="hidden" value="<?php echo "$codigo" ?>" />
<input class="form-control" name="edici" type="hidden" value="<?php echo "$edita" ?>" />
</td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Tipo Contenedor:</td>
<td><input class="form-control" name="conte" type="text" value="<?php echo "$contene"; ?>" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Carga peso (Kg):</td>
<td><input class="form-control" name="c_peso" type="text" value="<?php echo "$c_peso"; ?>" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Carga Volumen (m3):</td>
<td><input class="form-control" name="c_volu" type="text" value="<?php echo "$c_volu"; ?>" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Largo m.:</td>
<td><input class="form-control" name="m_largo" type="text" value="<?php echo "$m_largo"; ?>" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Pies:</td>
<td><input class="form-control" name="m_pie1" type="text" value="<?php echo "$m_pie1"; ?>" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Ancho m.:</td>
<td><input class="form-control" name="m_ancho" type="text" value="<?php echo "$m_ancho"; ?>" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Pies:</td>
<td><input class="form-control" name="m_pie2" type="text" value="<?php echo "$m_pie2"; ?>" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Altura m.:</td>
<td><input class="form-control" name="m_altura" type="text" value="<?php echo "$m_altura"; ?>" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Pies:</td>
<td><input class="form-control" name="m_pie3" type="text" value="<?php echo "$m_pie3"; ?>" /></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Descripcion:</td>
<td><textarea name="descri" type="text" rows="8" ><?php echo "$descri"; ?></textarea></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Foto:</td>
<td>
 <input class="form-control" type="file" id='imagen' name="imagen" /><br /> 
<?php 
if ($foto==""){
	//echo "<input id='imagen' name='imagen' type='file' /><br />";
	echo "<img src='../c/data_archivos/Sin_imagen_disponible.jpg' width='350' >";
	}else{
		//echo "<input id='imagen' name='imagen' type='file' /><br />";
        echo "<img src='../c/data_archivos/$foto' width='350'"; 
}
?>
</td>
</tr>
<tr>
<td colspan="2" align="center"><input class="btn btn-success" name="guardar" type="submit" value="Actualizar Registro" /></td>
</tr>
</table>
</form>

<?php
if(isset($_POST['guardar'])){
	
}
	
?>
</body>
</html>