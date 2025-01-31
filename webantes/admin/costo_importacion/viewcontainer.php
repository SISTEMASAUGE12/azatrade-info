<?php
include ("conection/config.php");
//script para la barra estatica
echo"<link rel='stylesheet' href='css/stylex.css' />";
echo "<header id='main-header'>";
include ("menu.php");
echo"</header>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Costos de Importacion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script language='JavaScript'>
/*ventana emergente*/
var newwindow;
function popup(url)
{ newwindow=window.open(url,'name','width=750,height =450,left=200,top=90,scrollbars=NO,menubar=NO,titlebar= NO,status=NO,toolbar=NO');
if (window.focus) {newwindow.focus()}
}
</script>

<script language='JavaScript'>
/*mensaje para eliminar registro*/
function confirmar(){
respuesta = confirm("¿Seguro desea eliminar?");
return respuesta;
}
</script>
</head>

<body>
<br /><br /><br />
<table class="table table-hover" style='font-size:80%'>
<tr>
<td align="center" colspan="11"><font size="+1"><b> Lista de Contenedores</b></font></td>
</tr>
<tr>
<td colspan="2"><?php echo "<a href='nuevcontainer.php' title='Nuevo Registro' onClick=\"popup('nuevcontainer.php'); return false;\">"; ?><input class="btn-primary" name="nuevo" type="button" value="Nuevo Registro"  /> <?php echo "</a>"; ?></td>
<td colspan="2" bgcolor="#EAEAEA" style="border:groove" align="center"><b>Carga</b></td>
<td colspan="6" bgcolor="#EAEAEA" style="border:groove" align="center"><b>Medidas Internas</b></td>
</tr>
<tr>
<td bgcolor="#E9E9E9">#</td>
<td bgcolor="#E9E9E9">Tipo Contenedor</td>
<td bgcolor="#E9E9E9">Peso (Kg.)</td>
<td bgcolor="#E9E9E9">Volumen (m3.)</td>
<td bgcolor="#E9E9E9">Largo m.</td>
<td bgcolor="#E9E9E9">Pies</td>
<td bgcolor="#E9E9E9">Ancho m.</td>
<td bgcolor="#E9E9E9">Pies</td>
<td bgcolor="#E9E9E9">Altura m.</td>
<td bgcolor="#E9E9E9">Pies</td>
<td bgcolor="#E9E9E9">Accion</td>
</tr>

<?php
$sqllista="SELECT
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
ORDER BY
conte.fecha_reg DESC ";
$rsn = mysql_query($sqllista);
if (mysql_num_rows($rsn) > 0){
	while($rowp = mysql_fetch_array($rsn)){
		
		$items = $items + 1;
		$codi = $rowp["codigo"];
		$descri = $rowp["contenedor"];
		$cargaA = $rowp["carga_pesokg"];
		$cargaB = $rowp["carga_volumen"];
		$largom = $rowp["med_int_largom"];
		$pie1 = $rowp["med_int_pies1"];
		$anchom = $rowp["med_int_anchom"];
		$pie2 = $rowp["med_int_pies2"];
		$alturam = $rowp["med_int_alturam"];
		$pie3 = $rowp["med_int_pies3"];

echo "<tr>";
echo "<td>$items</td>";
echo "<td>$descri</td>";
echo "<td>".number_format($cargaA,0,'.',',')."</td>";
echo "<td>$cargaB</td>";
echo "<td>$largom</td>";
echo "<td>$pie1</td>";
echo "<td>$anchom</td>";
echo "<td>$pie2</td>";
echo "<td>$alturam</td>";
echo "<td>$pie3</td>";
echo "<td>
<a href='vistadetalle.php?cod=$codi' title='Visualizar' onClick=\"popup('vistadetalle.php?cod=$codi'); return false;\"><img src='img/consult.png' width='18' ></a>

<a href='editcontainer.php?cod=$codi' title='Editar' onClick=\"popup('editcontainer.php?cod=$codi'); return false;\"><img src='img/editar.png' width='18' ></a>

<a onClick='return confirmar();' href='deletecontei.php?cod=$codi'>
<img src='img/delete.png' width='18' > </a>
</td>";

echo "</tr>";	
}
}else{
echo "<tr>";
echo "<td align='center' colspan='11'> No Hay Datos</td>";
	echo "</tr>";
}
?>
</table>

</body>
</html>
<?php
include("pie.php");
?>