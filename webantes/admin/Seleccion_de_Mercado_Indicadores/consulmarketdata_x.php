<?

include ("conection/config.php");
include ("menuA.php");


$nompro = $_POST['nombrepro'];
$despro = $_POST['descripro'];
$presen = $_POST['presenpro'];
$nomc = $_POST['nombrecomun'];
$nomt = $_POST['nombretec'];
$ara = $_POST['arancelario'];
$desar = $_POST['descriaran'];
$uni = $_POST['unidadcome'];
$sec = $_POST['idsector'];

$x=$_POST[casilla];

//script para cargar lista en caja de texto al digitar
//$con = "select * from merca_tema";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
//if ($_post['tipobusqueda']=='A') {
$con ="SELECT
ind.id,
ind.cod_indicador,
ind.idtema,
ind.id_produc,
ind.nom_indicador,
ind.fuente_nota,
ind.fuente_org,
ind.valor,
ind.valor_mayor_puntaje,
ind.origen,
ind.usuario,
ind.fecha_reg,
te.id,
te.tema,
te.descripcion,
CONCAT(te.tema,' - ',ind.nom_indicador) as temas
FROM
merca_indicadores AS ind
INNER JOIN merca_tema AS te ON ind.idtema = te.id
ORDER BY
te.tema ASC";
//}
$query = mysql_query($con);
	?>
    
    <script>
	$(function() {
		
		<?php
		
		while($row= mysql_fetch_array($query)) {//se reciben los valores y se almacenan en un arreglo
      $elementos[]= '"'.$row['temas'].'"';
	
	 // $elementos[]= '"'.$row['tema'].'"." "."'.$row['nom_indicador'].'"';
	  
}
$arreglo= implode(", ", $elementos);//junta los valores del array en una sola cadena de texto

		?>	
		
		var availableTags=new Array(<?php echo $arreglo; ?>);//imprime el arreglo dentro de un array de javascript
		
				
		$( "#tags" ).autocomplete({
			source: availableTags

		});
	});
	</script>
<!-- fin de script -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Mercado Internacional e Indicadores</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

<script language="JavaScript" src="js/jquery-1.5.1.min.js"></script>
<script language="JavaScript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
<link type="text/css" href="css/jquery-ui-1.8.13.custom.css" rel="stylesheet" />
</head>

<body>
<br >
<form action='' method='post' name='form11'>
<table border="0" class="table">
<tr>
<td>
<input name="nombrepro" type="hidden" value="<? echo $nompro ?>"/>
<input name="descripro" type="hidden" value="<? echo $despro;?>"/>
<input name="presenpro" type="hidden" value="<? echo $presen; ?>"/>
<input name="nombrecomun" type="hidden" value="<? echo $nomc; ?>"/>
<input name="nombretec" type="hidden" value="<? echo $nomt; ?>"/>
<input name="arancelario" type="hidden" value="<? echo $ara; ?>"/>
<input name="descriaran" type="hidden" value="<? echo $desar; ?>"/>
<input name="unidadcome" type="hidden" value="<? echo $uni; ?>"/>
<input name="idsector" type="hidden" value="<? echo $sec; ?>"/>

<?
//hace el for de los paises seleccionados
foreach ($x as $value){
$value;
//echo "$value <br>";
//echo "<input class='checkbox-inline' type='checkbox' name='casillas[0]' value='$value' checked='checked'/> $value";
  
}
?>
</td>
</tr>
<tr>
<td bgcolor="#279CC9" colspan="4" align="center"><b>Opciones de Busqueda</b></td>
</tr>
<tr>
<td>
<!--Seleccion de Busqueda Por:
<select name="tipobusqueda">
<option value="A">Tema</option>
<option value="B">Indicador</option>
<option value="C">Descripcion de Indicador</option>
<option value="D">Fuente de Indicador</option>
<option value="F">Nuevo Indicador</option>
<option value="G">Indicador Propio del Producto</option>
</select> -->


Busqueda: <input type='text' size='60'  id="tags" name='nombre' placeholder = "Ingrese Datos a Consultar">
&nbsp;&nbsp;&nbsp;
<input name="anadir" type="button" class="btn" id="busprod" onClick="if(document.form11.tipobusqueda=='A'){enviaQuery('divResultado','myajax7.php?opcion=anadir_prod2&producto='+document.form11.producto.value+'&local='+<? if (empty($_SESSION['usuario']['local'])){?>document.form11.loc.options[document.form11.loc.options.selectedIndex].value<? } else echo $local; ?>+'&prod_id='+document.form11.prod_id.value+'&prod_cod='+document.form11.prod_cod.value+'&prod_serie='+document.form11.prod_serie.value+'&cant='+document.form11.cantidad.value+'&precio='+document.form11.precio.value+'&descuento='+document.form11.dscto.value+'&dscto_final='+document.form11.dscto_final.value+'&precio_compra='+document.form11.precio_compra.value+'&iva='+document.form11.valor_iva.value+'&tipo_ingreso='+<?=$_SESSION['usuario']['tipo'];?>);} else { enviaQuery('divResultado','myajax7.php?opcion=anadir_prod2&producto='+document.form11.producto.value+'&local='+<? if (empty($_SESSION['usuario']['local'])){?>document.form11.loc.options[document.form11.loc.options.selectedIndex].value<? } else echo $local; ?>+'&prod_id='+document.form11.prod_id.value+'&prod_cod='+document.form11.prod_cod.value+'&prod_serie='+document.form11.prod_serie.value+'&cant='+document.form11.cantidad.value+'&precio='+document.form11.precio.value+'&descuento='+document.form11.dscto.value+'&dscto_final='+document.form11.dscto_final.value+'&precio_compra='+document.form11.precio_compra.value+'&tc='+document.form11.tc.value+'&iva='+document.form11.valor_iva.value);} document.form11.producto.value='';document.form11.cantidad.value='0';document.form11.precio.value='0.00';document.form11.dscto.value='0'" value="A&ntilde;adir">
</td>
</tr>
<tr>
<td>

<a href="reg_indicatorNew"> Registrar Nuevo Indicador</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="reg_indicatorNewpro.php">Registrar Indicador Propio del Producto</a>
</td>
</tr>
<tr>
<td>


</td>
</tr>
<tr>
  <td>
  <div id='divResultado' align='center'>

<?
					/*$tipo_ingreso=$_SESSION['usuario']['tipo'];
					if(empty($_GET['accion']) or $doc_mon=='S')
					{*/
						echo"<table width='100%'>
								<tr>
									<th>Tema</th><th>Indicador Seleccionado</th><th>Valor Puntaje</th><th>Peso (Importancia)</th>
									
								</tr>";
						$total=0;	
						for($i=0;$i<count($_SESSION['usuario']['carrito']);$i++) 
						{
							foreach ($_SESSION['usuario']['carrito'][$i] as $k => $v) 
							{
								if($k=='cod_pro')
									echo"<tr><td align='left'>$v</td>";
								if($k=='serie')
									$descri_serie=$v;
								if($k=='nombre')
									echo"<td align='left'>".htmlentities($v)." - ".htmlentities($descri_serie)."</td>";
								if($k=='cantidad')
									echo"<td align='right'><input type='text' name='cant$i' value='$v' class='form1' size='15'  onchange=\"enviaQuery('divResultado','myajax7.php?opcion=cambiar_item200&i=$i&nombre=cantidad&t_ingreso=$tipo_ingreso&iva='+document.form11.valor_iva.value+'&valor='+this.value+'&t_pago='+tipo.options[tipo.options.selectedIndex].value);\"></input></td>";
								if($k=='precio')
									echo"<td align='right'><input type='text' name='precio$i' class='form1' value='".number_format($v, 2, '.', ' ')."' class='form' size='15'  onchange=\"enviaQuery('divResultado','myajax7.php?opcion=cambiar_item200&i=$i&nombre=precio&t_ingreso=$tipo_ingreso&iva='+document.form11.valor_iva.value+'&valor='+this.value+'&t_pago='+tipo.options[tipo.options.selectedIndex].value);\" ></input></td>";
								if($k=='descuento')
									echo"<td align='right'><input type='text' name='descuento$i' class='form1' value='$v' class='form' size='15' onchange=\"enviaQuery('divResultado','myajax7.php?opcion=cambiar_item200&i=$i&nombre=descuento&t_ingreso=$tipo_ingreso&iva='+document.form11.valor_iva.value+'&valor='+this.value+'&t_pago='+tipo.options[tipo.options.selectedIndex].value);\" ></input></td>";
								if($k=='subtotal')
								{
									$total+=$v;
									echo"<td align='right'><input type='text' name='subtotal$i' class='form1' value='".number_format($v, 2, '.', ' ')."' class='form' size='15' onchange=\"enviaQuery('divResultado','myajax7.php?opcion=cambiar_item200&i=$i&nombre=subtotal&iva='+document.form11.valor_iva.value+'&valor='+this.value+'&t_pago='+tipo.options[tipo.options.selectedIndex].value);\" readonly></input></td>
									<td><a href='javascript:;' onclick=\"enviaQuery('divResultado','myajax7.php?opcion=borrar_item200&i=$i&iva='+document.form11.valor_iva.value+'&t_ingreso=$tipo_ingreso')\"><img src='images/trash.gif' /></a></td></tr>";
								}
							}
						}
						echo"<tr><td colspan='4' align='right' class='bordenaranja'><b>Total SIGV: ".number_format(($total/(1 + $iva)), 2, '.', ' ')."</b>&nbsp;&nbsp;&nbsp;<b>IGV: ".number_format(($total/ (1 + $iva)*$iva), 2, '.', ' ')."</b>&nbsp;&nbsp;&nbsp;<b>Total: ".number_format($total, 2, '.', ' ')."</b></td></tr>
						</table>";
				//	}
					
				?>
                </div>
                <td>

</tr>
</table>
</form>
</body>
</html>