<?
include ("conection/config.php");
include ("menu.php");

$aa = date("Y");

function generasector()
{
	//include 'conexion.php';
	//conectar();
	$consulta=mysql_query("SELECT id, sector FROM sector where eliminado='0'");
	//desconectar();

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='sector' id='sector' onChange='cargaContenido(this.id)'>";
	echo "<option value=''>Elige</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}

//resta un dia a la fecha actual
//$dia = time()-(1*24*60*60);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Azatrade - Info Paginas</title>



<link href="bootstrap/bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet"> 
<style>
table {
  font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size:12px;
}
</style>

<script language="JavaScript">
<!-- Hide JavaScript from Java-cambia de color las filas de la tabla
function NavRollOver(oTd){if(!oTd.contains(event.fromElement)){oTd.bgColor="66CCFF";}}
function NavRollOut(oTd){if(!oTd.contains(event.toElement)){oTd.bgColor="#CEECF5";}}
//-->
</script>

<script language="javascript" type="text/javascript">
//numros enteros
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
//numeros enteros con decimales
function soloNumeros2(field, event){
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
else if((("0123456789.").indexOf(keychar) > -1)){
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
function valida(regdatapag) {
    if (regdatapag.buqueda.value.length < 1){
	
		alert("Seleccione Tipo Busqueda");
		return false;
	}
	
	if (regdatapag.pais.value.length < 1){
	
		alert("Seleccione Pais");
		return false;
	}
	
	if (regdatapag.mercado.value.length < 1){
	
		alert("Selecione Mercado");
		return false;
	}
	
	if (regdatapag.sector.value.length < 1){
	
		alert("Seleccion Sector");
		return false;
	}
	
	if (regdatapag.tema.value.length < 1){
	
		alert("Selecione Tema");
		return false;
	}
	
	if (regdatapag.inst.value.length < 1){
	
		alert("Seleccione Institucion");
		return false;
	}
	
	if (regdatapag.nominst.value.length < 1){
	
		alert("Ingrese Nombre de la Institucion");
		return false;
	}
	
	if (regdatapag.nompag.value.length < 1){
	
		alert("Ingrese Nombre de la Pagina");
		return false;
	}
	/*if (regdatapag.despag.value.length < 1){
	
		alert("Ingrese Descripcion de la Pagina");
		return false;
	}*/
	if (regdatapag.direpag.value.length < 1){
	
		alert("Ingrese Direccion de la Pagina");
		return false;
	}
	if (regdatapag.idioma.value.length < 1){
	
		alert("Seleccione Idioma");
		return false;
	}
	if (regdatapag.tdato.value.length < 1){
	
		alert("Seleccione Tipo Dato");
		return false;
	}
	if (regdatapag.alcance.value.length < 1){
	
		alert("Seleccione Alcance");
		return false;
	}
	if (regdatapag.tacceso.value.length < 1){
	
		alert("Seleccione Tipo Acceso");
		return false;
	}
	if (regdatapag.varia.value.length < 1){
	
		alert("Seleccione Variable");
		return false;
	}
	if (regdatapag.fecha_act.value.length < 1){
	
		alert("Seleccione Fecha");
		return false;
	}
	/*if (regdatapag.carga_ar.value.length < 1){
	
		alert("Seleccione Archivo a Cargar");
		return false;
	}*/
	if (regdatapag.tipo_ar.value.length < 1){
	
		alert("Ingrese Tipo de Archivo");
		return false;
	}
	if (regdatapag.entre.value.length < 1){
	
		alert("Seleccione Entregable");
		return false;
	}
	if (regdatapag.desentre.value.length < 1){
	
		alert("Ingrese Descripcion Entregable");
		return false;
	}
	if (regdatapag.costo.value.length < 1){
	
		alert("Ingrese Costo");
		return false;
	}
	return true;
}
</script>

<script type="text/javascript" src="js/select_dependientes.js"></script>




<SCRIPT LANGUAGE="JavaScript">
 <!--  limita los caracteres en un textarea
 function textCounter(field, countfield, maxlimit) {
 if (field.value.length > maxlimit)
 field.value = field.value.substring(0, maxlimit);
 else 
 countfield.value = maxlimit - field.value.length;
 }
 // -->
 </script>

</head>

<body>

<p>
<br>
<center>
<form enctype="multipart/form-data" name="regdatapag" method="post" action="" onSubmit="return valida(this);"> 
<!--<form name="regdatapag" method="post" action="" enctype="multipart/form-data" >  -->

<table border="1" bordercolor="#00CCFF" style='background-color:#CEECF5;
   color:#039;
   width: 550px;
   padding: 10px;
   border:2px solid #0099FF;
   -moz-border-radius: 5px;
   -webkit-border-radius: 5px;
   
   box-shadow: 7px -7px 3px #CCCCCC;
   -webkit-box-shadow: 7px -7px 3px #CCCCCC;
   -moz-box-shadow: 7px -7px 3px #CCCCCC;' class='table'>
   <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td bgcolor="#279CC9" colspan="2" align="center"><b><font color="#FFFFFF">Registrar Datos</font></b></td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Tipo Busqueda:</td>
    <td>
   <?
echo "<select name='buqueda'>"; 
if ($sector!=''){
					$sqls="SELECT id,busqueda FROM pag_tipo_bus where id='".$sector."'";
}else{
	echo"<option value=''></option>";
	$sqls="SELECT id,busqueda FROM pag_tipo_bus order by busqueda";
}
					
					$resultado=mysql_query($sqls); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[0]'>$fila[1]"; 
					}
					echo "</select>";
					
					?>
                    
                   
                    
                  
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Pais:</td>
    <td>
   <?
echo "<select name='pais'>"; 
if ($sector!=''){
					$sqls="SELECT id,pais FROM merca_pais where id='".$sector."'";
}else{
	echo"<option value=''></option>";
	$sqls="SELECT id,pais FROM merca_pais where pais<>'' order by pais";
}
					
					$resultado=mysql_query($sqls); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[0]'>$fila[1]"; 
					}
					echo "</select>";
					
					?>
                    
                   
                    
                  
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Mercado:</td>
    <td>
   <?
echo "<select name='mercado'>"; 
if ($sector!=''){
					$sqls="SELECT id,pais FROM merca_pais where id='".$sector."'";
}else{
	echo"<option value=''></option>";
	$sqls="SELECT id,pais FROM merca_pais where pais<>'' order by pais";
}
					
					$resultado=mysql_query($sqls); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[0]'>$fila[1]"; 
					}
					echo "</select>";
					
					?>
                    
                   
                    
                  
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Sector:</td>
    <td>
   <?
/*echo "<select name='sector'>"; 
if ($sector!=''){
					$sqls="SELECT id,sector FROM sector where eliminado='0' and id='".$sector."'";
}else{
	echo"<option value=''></option>";
	$sqls="SELECT id,sector FROM sector where eliminado='0'";
}
					
					$resultado=mysql_query($sqls); 
					while ($fila=mysql_fetch_row($resultado))
					{ 
						echo "<option value='$fila[0]'>$fila[1]"; 
					}
					echo "</select>";*/
					
					?>
                    
                    <?php generasector(); ?>
                    
                  
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Producto:</td>
    <td>
    <?
/*echo "<select name='produ'>"; 
if ($product!=''){
					$sqlp="SELECT id,producto FROM producto where eliminado='0' and id='".$product."'";
}else{
	echo"<option value=''></option>";
	$sqlp="SELECT id,producto FROM producto where eliminado='0'";
}
					
					$resultadop=mysql_query($sqlp); 
					while ($filap=mysql_fetch_row($resultadop))
					{ 
						echo "<option value='$filap[0]'>$filap[1]"; 
					}
					echo "</select>";*/
					?>
                    
                   <select disabled="disabled" name="produ" id="produ">
						<option value="">Selecciona opci&oacute;n...</option>
					</select>
                    
                   <div> <?php echo $error1 ?></div>
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Tema:</td>
    <td>
	<?
echo "<select name='tema'>"; 
if ($depart!=''){
					$sqld="SELECT id,tema FROM pag_tema id='".$depart."'";
}else{
	echo"<option value=''></option>";
	$sqld="SELECT id,tema FROM pag_tema order by tema";
}
					
					$resultadod=mysql_query($sqld); 
					while ($filad=mysql_fetch_row($resultadod))
					{ 
						echo "<option value='$filad[0]'>$filad[1]"; 
					}
					echo "</select>";
					?>
                    
           
                    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Institución:</td>
    <td>
    <?
echo "<select name='inst'>"; 
if ($unid!=''){
					$sqlm="SELECT id,institucion FROM pag_institucion where eliminado='0' and id='".$unid."' order by institucion";
}else{
	echo"<option value=''></option>";
	$sqlm="SELECT id,institucion FROM pag_institucion order by institucion";
}
					
					$resultadom=mysql_query($sqlm); 
					while ($filam=mysql_fetch_row($resultadom))
					{ 
						echo "<option value='$filam[0]'>$filam[1]"; 
					}
					echo "</select>";
					?>
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Nombre Institución:</td>
    <td><input name="nominst" type="text" size="55" maxlength="300" /></td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Nombre Pagina:</td>
    <td><input name="nompag" type="text" size="55" maxlength="300" /></td>
  </tr>
  <tr onmouseover="NavRollOver(this)" onmouseout="NavRollOut(this)">
    <td>Descripción de la pagina:</td>
    <td>
    <textarea name="despag" rows="3" cols="50" onKeyDown="textCounter(this.form.despag,this.form.remLen,500);"  onKeyUp="textCounter(this.form.despag,this.form.remLen,500);"></textarea>
    <!--<input name="despag" type="" size="55" />  -->
   
    
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Dirección de Pagina :</td>
    <td>http://<input name="direpag" type="text" size="50" maxlength="200" /></td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Idioma:</td>
    <td> 
	<?
echo "<select name='idioma'>"; 
if ($variable!=''){
					$sqlv="SELECT id,idioma FROM pag_idioma where id='".$variable."' order by idioma";
}else{
	echo"<option value=''></option>";
	$sqlv="SELECT id,idioma FROM pag_idioma order by idioma";
}
					
					$resultadov=mysql_query($sqlv); 
					while ($filav=mysql_fetch_row($resultadov))
					{ 
						echo "<option value='$filav[0]'>$filav[1]"; 
					}
					echo "</select>";
					?>
                    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Tipo Dato:</td>
    <td>
    <?
echo "<select name='tdato'>"; 
if ($variable!=''){
					$sqlv="SELECT id,tipo_dato FROM pag_tipo_dato where id='".$variable."' order by tipo_dato";
}else{
	echo"<option value=''></option>";
	$sqlv="SELECT id,tipo_dato FROM pag_tipo_dato order by tipo_dato";
}
					
					$resultadov=mysql_query($sqlv); 
					while ($filav=mysql_fetch_row($resultadov))
					{ 
						echo "<option value='$filav[0]'>$filav[1]"; 
					}
					echo "</select>";
					?>
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Alcance:</td>
    <td>
     <?
echo "<select name='alcance'>"; 
if ($variable!=''){
					$sqlv="SELECT id,alcance FROM pag_alcance where id='".$variable."' order by alcance";
}else{
	echo"<option value=''></option>";
	$sqlv="SELECT id,alcance FROM pag_alcance order by alcance";
}
					
					$resultadov=mysql_query($sqlv); 
					while ($filav=mysql_fetch_row($resultadov))
					{ 
						echo "<option value='$filav[0]'>$filav[1]"; 
					}
					echo "</select>";
					?>
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Tipo de Acceso:</td>
    <td>
    <?
echo "<select name='tacceso'>"; 
if ($variable!=''){
					$sqlv="SELECT id,tipo_acceso FROM pag_tipo_acceso where id='".$variable."' order by tipo_acceso";
}else{
	echo"<option value=''></option>";
	$sqlv="SELECT id,tipo_acceso FROM pag_tipo_acceso order by tipo_acceso";
}
					
					$resultadov=mysql_query($sqlv); 
					while ($filav=mysql_fetch_row($resultadov))
					{ 
						echo "<option value='$filav[0]'>$filav[1]"; 
					}
					echo "</select>";
					?>
    </td>
  </tr>
  
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Variables:</td>
    <td>
    <?
echo "<select name='varia'>"; 
if ($variable!=''){
					$sqlv="SELECT id,variable FROM variable where eliminado='0' and  id='".$variable."' order by variable";
}else{
	echo"<option value=''></option>";
	$sqlv="SELECT id,variable FROM variable order by variable";
}
					
					$resultadov=mysql_query($sqlv); 
					while ($filav=mysql_fetch_row($resultadov))
					{ 
						echo "<option value='$filav[0]'>$filav[1]"; 
					}
					echo "</select>";
					?>
    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Fecha Actualización:</td>
    <td>
    <!--<input name="fecha_act" type="text" size="20" /> -->
    <input type=text name="fecha_act" value="<?php echo date ( "Y-m-d"  ); ?>"  size=12 >

    </td>
  </tr>
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Carga de Archivo:</td>
    <td><input name="carga_ar" id="carga_ar" type="file" size="35" /></td>
  </tr>
  
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Tipo Archivo (xls,pdf):</td>
    <td><input name="tipo_ar" id="tipo_ar" type="text" size="10" maxlength="10" /></td>
  </tr>
  
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Entregable:</td>
    <td>
    <?
echo "<select name='entre'>"; 
if ($variable!=''){
					$sqlv="SELECT id,entregable FROM pag_entregable where  id='".$variable."' order by entregable";
}else{
	echo"<option value=''></option>";
	$sqlv="SELECT id,entregable FROM pag_entregable order by entregable";
}
					
					$resultadov=mysql_query($sqlv); 
					while ($filav=mysql_fetch_row($resultadov))
					{ 
						echo "<option value='$filav[0]'>$filav[1]"; 
					}
					echo "</select>";
					?>
    </td>
  </tr>
  
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Descripción Entregable:</td>
    <td>
    <textarea name="desentre" rows="3" cols="55" onKeyDown="textCounter(this.form.desentre,this.form.remLen,500);"  onKeyUp="textCounter(this.form.desentre,this.form.remLen,500);"></textarea>
    
   <!-- <input name="desentre" type="text"size="55" /> -->
    
    </td>
  </tr>
  
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)'>
    <td>Costo S/.:</td>
    <td><input name="costo" type="text" size="55" /></td>
  </tr>
  
  <tr onmouseover='NavRollOver(this)' onmouseout='NavRollOut(this)' align="center">
    <td colspan="2"><input name="boton" type="submit" class='boton' value="Guardar" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="resetea" onclick="javascript:history.back()" type="button" value="Cancelar" /></td>
  </tr>
</table>
</form>
</center>


<?

if(isset($_POST['boton'])){ 
   
   
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
			echo"<script>location.href='RegDataPag.php'</script>";
          } else {
			 // }

if (move_uploaded_file($_FILES['carga_ar']['tmp_name'], $directorio . $_FILES['carga_ar']['name']))
{
	///subimos datos a la base
	
			include ("conection/config.php");
			//$ruta= $_POST["carga_ar"];
			$Sql="insert into pag_datapagina (
cod_tipo_bus,cod_pais,cod_pais_merca,cod_sector,cod_producto,cod_tema,cod_idioma,cod_tipo_dato,cod_alcance,cod_tipo_acceso,cod_variable,cod_entre,cod_inst,nom_inst,nom_pag,descri_pag,dire_pag,fecha_actu,carga_ar,tipo_ar,descri_entre,costo,buscar
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
'".$_POST["costo"]."',
'')";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   //header("Location: RegDataPag.php");
   
   //actualizamos la concatenacion d todo los campos en un solo campo
      include("actualizacadena.php");
   
   
   
   echo "<script type='text/javascript'> alert('Informacion Registrado'); </script> ";
   echo"<script>location.href='RegDataPag.php'</script>";
   mysql_close($link);
   
    //print "El archivo fue subido con éxito.";
} 
else
{
    //print "Error al intentar subir el archivo.";
	echo "<script type='text/javascript'> alert('Error al intentar Registrar '); </script> ";
	 echo"<script>location.href='RegDataPag.php'</script>";
}
}
}else
{//fin si campo contiene archivo de carga

include ("conection/config.php");
			//$ruta= $_POST["carga_ar"];
			$Sqlx="insert into pag_datapagina (
cod_tipo_bus,cod_pais,cod_pais_merca,cod_sector,cod_producto,cod_tema,cod_idioma,cod_tipo_dato,cod_alcance,cod_tipo_acceso,cod_variable,cod_entre,cod_inst,nom_inst,nom_pag,descri_pag,dire_pag,fecha_actu,carga_ar,tipo_ar,descri_entre,costo,buscar
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
'".$_POST["carga_ar"]."',
'".$_POST["tipo_ar"]."',
'".$_POST["desentre"]."',
'".$_POST["costo"]."',
'')";
// strtoupper convierte a mayusculas
   mysql_query($Sqlx,$link); 
   //header("Location: RegDataPag.php");
   
   //actualizamos la concatenacion d todo los campos en un solo campo
      include("actualizacadena.php");
   
   
   
   echo "<script type='text/javascript'> alert('Informacion Registrado'); </script> ";
   echo"<script>location.href='RegDataPag.php'</script>";
   mysql_close($link);
}

} 


?>
</body>
</html>