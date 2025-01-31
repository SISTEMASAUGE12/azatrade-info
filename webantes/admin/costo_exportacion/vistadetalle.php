<?php
include ("conection/config.php");

$codi = $_GET["cod"];

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

</head>

<body>

<table class="table table-hover" style='font-size:80%'>
<tr>
<td bgcolor="#F8F8F8" width="150">Codigo:</td>
<td><?php echo "$codigo"; ?></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Tipo Contenedor:</td>
<td><?php echo "$contene"; ?></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Carga peso (Kg):</td>
<td><?php echo "$c_peso"; ?></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Carga Volumen (m3):</td>
<td><?php echo "$c_volu"; ?></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Largo m.:</td>
<td><?php echo "$m_largo"; ?></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Pies:</td>
<td><?php echo "$m_pie1"; ?></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Ancho m.:</td>
<td><?php echo "$m_ancho"; ?></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Pies:</td>
<td><?php echo "$m_pie2"; ?></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Altura m.:</td>
<td><?php echo "$m_altura"; ?></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Medida Interna Pies:</td>
<td><?php echo "$m_pie3"; ?></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Descripcion:</td>
<td><?php echo "$descri"; ?></td>
</tr>
<tr>
<td bgcolor="#F8F8F8">Foto:</td>
<td>
<?php 
if ($foto==""){
	echo "<img src='../c/data_archivos/Sin_imagen_disponible.jpg' width='350' >";
	}else{
echo "<img src='../c/data_archivos/$foto' width='350'"; 
}
?>
</td>
</tr>

</table>

</body>
</html>