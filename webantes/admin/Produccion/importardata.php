<?
include ("menu.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Produccion</title>
<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
<style>
table {
  font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size:12px;
}
</style>
<script language="JavaScript">
<!-- Hide JavaScript from Java-cambia de color las filas de la tabla
function NavRollOver(oTd){if(!oTd.contains(event.fromElement)){oTd.bgColor="33CCFF";}}
function NavRollOut(oTd){if(!oTd.contains(event.toElement)){oTd.bgColor="#CCFFFF";}}
//-->
</script>

<script language="javascript" type="text/javascript">
function soloNumeros(field, event){
var key, keychar;
if(window.event) 
key = window.event.keyCode;
else if(event) 
key = event.which;
else
return true;
keychar = String.fromCharCode(key);
if((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key ==27))
return true;
else if((("0123456789").indexOf(keychar) > -1)){
window.status = "";
return true;
}
else{
alert("CAMPO SOLO PERMITE NUMEROS!");
return false;
}
}
</script>


<script language="javascript" type="text/javascript">
function valida(importa) {
    
	
	if (importa.excel.value.length < 1){
	
		alert("Seleccione Archivo Excel");
		return false;
	}
	if (importa.cant.value.length < 1){
	
		alert("Ingrese Cantidad de Filas");
		return false;
	}
	
	if (document.importa.cant.value>=801){
		/*}else{*/
		alert("Cantidad Ingresada Excede; Solo Permite 800 Registros Importados");
		return false;
	}
	
	return true;
}
</script>


</head>

<body>
<br>
<p>
<center>
<!--<!– FORMULARIO PARA SOICITAR LA CARGA DEL EXCEL –> -->
<form name="importa" method="post" action="<?php echo $PHP_SELF; ?>" onSubmit="return valida(this);" enctype="multipart/form-data" >
<table border="1" bordercolor='#00CCFF' style='background-color:#CEECF5;
   color:#039;
   width: 500px;
   padding: 10px;
    border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC; class='table''>
<!--   <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> -->
   <tr>
<td bgcolor="#279CC9" colspan="2" align="center" >
<b><font color="#FFFFFF">Importar Data Masiva</font></b>
</td>
</tr>
<!--<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> -->
<tr>
<td colspan="2" >
<?
$sfile="data/dataimport.xlsx";
echo "<font color='C25B56'>Descargar Formato para Hacer la Carga Masiva Haciendo <a href='".$sfile."'> click aqui</font></a>";
?>

</td>
</tr>
<!--<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> -->
<tr>
<td>
Selecciona el archivo a importar:
<input type="file" name="excel" />
</td>
</tr>
<!--<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> -->
<tr>
<td>
Cantidad Filas Agregadas:<input type="text" name="cant" size="5" onkeypress="return soloNumeros(this, event)"/>
</td>
</tr>
<!--<tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'> -->
<tr>
<td align="center">
<input type='submit' name='enviar'  value="Importar" />
<input type="hidden" value="upload" name="action" />
</td>
</tr>
</table>
</form>
</center>
<!-- CARGA LA MISMA PAGINA MANDANDO LA VARIABLE upload -->
    <?php
    extract($_POST);
    if ($action == "upload") {
		
        //cargamos el archivo al servidor con el mismo nombre
        //solo le agregue el sufijo bak_ 
        $archivo = $_FILES['excel']['name'];
        $tipo = $_FILES['excel']['type'];
        $destino = "bak_" . $archivo;
        if (copy($_FILES['excel']['tmp_name'], $destino)){
           // echo "<center><b>Archivo Cargado Con Éxito <br>";
			//echo "$cant Registros Insertados</center></b> <br>";
			echo "<center><b>Archivo de Excel Cargado Con Éxito <br>";
			echo "Con $cant Registros Cargados</center></b> <br>";
        }
        else{
            echo "Error Al Cargar el Archivo";
        }
        if (file_exists("bak_" . $archivo)) {
            /** Clases necesarias */
            require_once('Classes/PHPExcel.php');
            require_once('Classes/PHPExcel/Reader/Excel2007.php');
            // Cargando la hoja de cálculo
            $objReader = new PHPExcel_Reader_Excel2007();
            $objPHPExcel = $objReader->load("bak_" . $archivo);
            $objFecha = new PHPExcel_Shared_Date();
            // Asignar hoja de excel activa
            $objPHPExcel->setActiveSheetIndex(0);
            //conectamos con la base de datos 
            $cn = mysql_connect("localhost", "root", "jopedis") or die("ERROR EN LA CONEXION");
            $db = mysql_select_db("produccion", $cn) or die("ERROR AL CONECTAR A LA BD");
			//$cant es la cantidad de filas que se le asigna para ser insertados
            // Llenamos el arreglo con los datos  del archivo xlsx
            //for ($i = 1; $i <= 47; $i++) {
				for ($i = 1; $i <= $cant; $i++) {
                $_DATOS_EXCEL[$i]['idsector'] = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
                $_DATOS_EXCEL[$i]['iddepartamento'] = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['idproducto'] = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['idvariable'] = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['idmedida'] = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['periodo'] = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['mes'] = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['mes2'] = $objPHPExcel->getActiveSheet()->getCell('I' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['enero'] = $objPHPExcel->getActiveSheet()->getCell('J' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['febrero'] = $objPHPExcel->getActiveSheet()->getCell('K' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['marzo'] = $objPHPExcel->getActiveSheet()->getCell('L' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['abril'] = $objPHPExcel->getActiveSheet()->getCell('M' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['mayo'] = $objPHPExcel->getActiveSheet()->getCell('N' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['junio'] = $objPHPExcel->getActiveSheet()->getCell('O' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['julio'] = $objPHPExcel->getActiveSheet()->getCell('P' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['agosto'] = $objPHPExcel->getActiveSheet()->getCell('Q' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['septiembre'] = $objPHPExcel->getActiveSheet()->getCell('R' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['octubre'] = $objPHPExcel->getActiveSheet()->getCell('S' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['noviembre'] = $objPHPExcel->getActiveSheet()->getCell('T' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['diciembre'] = $objPHPExcel->getActiveSheet()->getCell('U' . $i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['eliminado'] = $objPHPExcel->getActiveSheet()->getCell('V' . $i)->getCalculatedValue();
            }
        }
        //si por algo no cargo el archivo bak_ 
        else {
            echo "Necesitas primero importar el archivo";
        }
        $errores = 0;
        //recorremos el arreglo multidimensional 
        //para ir recuperando los datos obtenidos
        //del excel e ir insertandolos en la BD
        foreach ($_DATOS_EXCEL as $campo => $valor) {
            $sql = "INSERT INTO dataproduccion VALUES (NULL,'";
            foreach ($valor as $campo2 => $valor2) {
         //$campo2 == "direccion" ? $sql.= $valor2 . "');" : $sql.= $valor2 . "','";
		$campo2 == "eliminado" ? $sql.= $valor2 . "');" : $sql.= $valor2 . "','";
            }
			// en esta linea se ve las filas insertadas
           // echo $sql;
            $result = mysql_query($sql);
            if (!$result) {
                echo "Error al insertar registro " . $campo;
                $errores+=1;
            }
        }
        echo "<strong><center>ARCHIVO EXCEL IMPORTADO CON EXITO,<br> EN TOTAL $campo REGISTROS INSERTADOS Y $errores ERRORES</center></strong>";
        //una vez terminado el proceso borramos el archivo que esta en el servidor el bak_
        unlink($destino);
    }
    ?>
    
    <center>
    <br>
    <p>
    <a href="proceso.php" target="_blank">Ejecutar Proceso</a>
    </center>
</body>
</html>