<?php
session_start();
include ("conection/config.php");

$aa = date("Y");

$codd= $_GET["true"];

$sqlpg="SELECT
pag.id,
pag.cod_tipo_bus,
tb.busqueda,
pag.cod_pais,
pa.pais,
pag.cod_pais_merca,
mp.pais AS mpais,
pag.cod_sector,
se.sector,
pag.cod_producto,
/*prod.producto,*/
pag.cod_tema,
te.tema,
pag.cod_idioma,
pi.idioma,
pag.cod_tipo_dato,
td.tipo_dato,
pag.cod_alcance,
palc.alcance,
pag.cod_tipo_acceso,
pta.tipo_acceso,
pag.cod_variable,
v.variable,
pag.cod_entre,
pen.entregable,
pag.cod_inst,
pins.institucion,
pag.nom_inst,
pag.nom_pag,
pag.descri_pag,
pag.dire_pag,
pag.fecha_actu,
pag.carga_ar,
pag.tipo_ar,
pag.descri_entre,
ROUND(pag.costo,2) as costo,
CONCAT(tb.busqueda,pa.pais,pa.pais,se.sector,te.tema,pi.idioma,td.tipo_dato,palc.alcance,pta.tipo_acceso,v.variable,pen.entregable,pins.institucion) as leyenda,
pag.carga_img,
pag.autor_reg,
pag.autor_cel,
pag.autor_correo,
pag.estado,
pag.link_tuto
FROM
pag_datapagina AS pag
INNER JOIN pag_tipo_bus AS tb ON pag.cod_tipo_bus = tb.id
INNER JOIN merca_pais AS pa ON pag.cod_pais = pa.id
INNER JOIN merca_pais AS mp ON pag.cod_pais_merca = mp.id
INNER JOIN sector AS se ON pag.cod_sector = se.id
/*INNER JOIN producto AS prod ON pag.cod_producto = prod.id*/
INNER JOIN pag_tema AS te ON pag.cod_tema = te.id
INNER JOIN pag_idioma AS pi ON pag.cod_idioma = pi.id
INNER JOIN pag_tipo_dato AS td ON pag.cod_tipo_dato = td.id
INNER JOIN pag_alcance AS palc ON pag.cod_alcance = palc.id
INNER JOIN pag_tipo_acceso AS pta ON pag.cod_tipo_acceso = pta.id
INNER JOIN variable AS v ON pag.cod_variable = v.id
INNER JOIN pag_entregable AS pen ON pag.cod_entre = pen.id
INNER JOIN pag_institucion AS pins ON pag.cod_inst = pins.id
WHERE
pag.id='$codd'";

$rsnpg = mysql_query($sqlpg);

if (mysql_num_rows($rsnpg) > 0){
	while($rowpg = mysql_fetch_array($rsnpg)){
		
		$codx=$rowpg["id"];
		$busA=$rowpg["busqueda"];
		$paisA=$rowpg["pais"];
		$mercA=$rowpg["mpais"];
		$secA=$rowpg["sector"];
		$prodA=$rowpg["producto"];
		$temA=$rowpg["tema"];
		$instA=$rowpg["institucion"];
		$nominsA=$rowpg["nom_inst"];
		$nompagA=$rowpg["nom_pag"];
		$descriA=$rowpg["descri_pag"];
		$direA=$rowpg["dire_pag"];
		$idioA=$rowpg["idioma"];
		$tdaA=$rowpg["tipo_dato"];
		$alcA=$rowpg["alcance"];
		$tacceA=$rowpg["tipo_acceso"];
		$variA=$rowpg["variable"];
		$fultA=$rowpg["fecha_actu"];
		$cargA=$rowpg["carga_ar"];
		$tarA=$rowpg["tipo_ar"];
		$entA=$rowpg["entregable"];
		$descrientA=$rowpg["descri_entre"];
		$costA=$rowpg["costo"];
		$car_img = $rowpg["carga_img"];
		$au_re = $rowpg["autor_reg"];
		$au_ce = $rowpg["autor_cel"];
		$au_co = $rowpg["autor_correo"];
		$esta = $rowpg["estado"];
    $linktu = $rowpg["link_tuto"];
		
		//echo "$busA";
		}
		
		}
		/*fin consulta*/

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="azatrade,azatradewww, azatrade inteligencia comercial">
<meta name="author" content="azasof, Azatrade, azatrade, azatradewww">
<meta name="keywords" content="azatradewww, azatrade">
<title>Azatrade ..::WWW::..</title>
<link rel="shortcut icon" href="../img/azatrade.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="boostrap/css/bootstrap.css">
<link rel="stylesheet" href="css/w3.css">
<link rel="stylesheet" href="css/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<script src="boostrap/js/jquery.min.js"></script>
<script src="boostrap/js/bootstrap.min.js"></script>
  
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
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
<body class="w3-theme-l5">

<!-- Navbar -->
<?php
include("menu.php");
?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <?php
	/*panel izquierdo*/
	include("lateral_izquierdo.php");
    ?>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Registra una pagina en Azatrade WWW y se publicara tu autoria. </h6>
              <!--<p contenteditable="true" class="w3-border w3-padding">Status: Feeling Blue</p>
              <button type="button" class="w3-btn w3-theme"><i class="fa fa-pencil"></i>  Post</button>-->
              
            </div>
          </div>
        </div>
      </div>
      



<div class="w3-container w3-card-2 w3-white w3-round w3-margin">
<br>
        <center><img src="../img/Azatrade11.png" alt="Avatar" style="width:200px"></center><br>
        <hr class="w3-clear">
        
        <h3>Nuevo Registro Azatrade WWW.</h3>
        <form enctype="multipart/form-data" name="regdatapag" method="post" action="">
        <div class="w3-theme-l1 col-md-12">
        <h4>Datos de la propiedad de la P&aacute;gina Web</h4>
        </div>
        <div class="col-md-6">
         <div class="form-group has-success">
            <h5>Pais:</h5>
                                <select name= "pais" id= "pais" class='form-control' required > 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM merca_pais ORDER BY pais ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($paisA ==$registrotipocoche [ 'pais' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'pais' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'pais' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
                            </div>
                        </div>
                        
        <div class="col-md-6">
             <div class="form-group has-success">
                                <h5>Instituci&oacute;n:</h5>
                                <select name= "inst" id= "inst" class='form-control' required> 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM pag_institucion ORDER BY institucion ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($instA ==$registrotipocoche [ 'institucion' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'institucion' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'institucion' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
                            </div>
                        </div>
       <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Nombre Instituci&oacute;n:</h5>
                    <input name="nominst" type="text" value="<? echo $nominsA; ?>" maxlength="300"  placeholder="Ingrese Nombre Instituci&oacute;n" class="form-control" autofocus required/>
                            </div>
                        </div>
      <div class="w3-theme-l1 col-md-12">
        <h4>Datos de la P&aacute;gina Web</h4>
        </div>
       <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Nombre P&aacute;gina:</h5>
                    <input name="nompag" type="text" value="<? echo $nompagA; ?>" size="55" maxlength="300" placeholder="Ingrese Nombre P&aacute;gina" class="form-control" autofocus required/>
                            </div>
                        </div>
      <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Descripci&oacute;n de la p&aacute;gina:</h5>
                    <textarea name="despag" rows="1" cols="50" onKeyDown="textCounter(this.form.despag,this.form.remLen,500);"  onKeyUp="textCounter(this.form.despag,this.form.remLen,500);" class="form-control" autofocus required> <? echo $descriA; ?> </textarea>
                            </div>
                        </div>
          <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Direcci&oacute;n P&aacute;gina:</h5>
                    <div class="input-group">
                    <span class="input-group-addon">Http://</span>
                    <input name="direpag" type="text" value="<? echo $direA; ?>" maxlength="200" placeholder="Ingrese Direcci&oacute;n P&aacute;gina" class="form-control" autofocus required/>
                    </div>
                    <!--<span class="w3-opacity"> Ejm.: www.azatrade.info </span>-->
                            </div>
                        </div>
           
       <div class="col-md-6">
             <div class="form-group has-success">
                     <h5>Idioma:</h5>
                                <select name= "idioma" id= "idioma" class='form-control' required> 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM pag_idioma ORDER BY idioma ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($idioA ==$registrotipocoche [ 'idioma' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'idioma' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'idioma' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
                            </div>
                        </div>
        <div class="col-md-6">
             <div class="form-group has-success">
                     <h5>Tipo Acceso:</h5>
                                 <select name= "tacceso" id= "tacceso" class='form-control' required> 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM pag_tipo_acceso ORDER BY tipo_acceso ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($tacceA ==$registrotipocoche [ 'tipo_acceso' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'tipo_acceso' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'tipo_acceso' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
                            </div>
                        </div>
 <div class="w3-theme-l1 col-md-12">
        <h4>Datos del Contenido la P&aacute;gina Web</h4>
        </div>
       <div class="col-md-6">
             <div class="form-group has-success">
                     <h5>Mercado:</h5>
                                <select name= "mercado" id= "mercado" class='form-control' required> 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM merca_pais ORDER BY pais ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($mercA ==$registrotipocoche [ 'pais' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'pais' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'pais' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
                            </div>
                        </div>
       <div class="col-md-6">
             <div class="form-group has-success">
                     <h5>Alcance:</h5>
                                 <select name= "alcance" id= "alcance" class='form-control' required> 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM pag_alcance ORDER BY alcance ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($alcA ==$registrotipocoche [ 'alcance' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'alcance' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'alcance' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
                            </div>
                        </div>
         <div class="col-md-6">
             <div class="form-group has-success">
                     <h5>Sector:</h5>
                                 <select name= "sector" id= "sector" class='form-control' required> 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM sector where eliminado='0' ORDER BY sector ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($secA ==$registrotipocoche [ 'sector' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'sector' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'sector' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
                            </div>
                        </div>
        <div class="col-md-6">
             <div class="form-group has-success">
                     <h5>Tema:</h5>
                                <select name= "tema" id= "tema" class='form-control' required> 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM pag_tema ORDER BY tema ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($temA ==$registrotipocoche [ 'tema' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'tema' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'tema' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
                            </div>
                        </div>
        <div class="col-md-6">
             <div class="form-group has-success">
                     <h5>Tipo Contenido:</h5>
                                <select name= "tdato" id= "tdato" class='form-control' required> 
  <option value= "" selected></option> 
  <?php 
  $tablatipocoche = mysql_query ( "SELECT * FROM pag_tipo_dato ORDER BY tipo_dato ASC" ) ; 
  while ( $registrotipocoche = mysql_fetch_array ( $tablatipocoche ) ) 
  { 
  if ($tdaA ==$registrotipocoche [ 'tipo_dato' ] ) 
  { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "' selected >&nbsp;&nbsp;" .$registrotipocoche [ 'tipo_dato' ] . "</option>" ; 
  } else { 
  echo "<option value='" .$registrotipocoche [ 'id' ] . "'>&nbsp;&nbsp;" .$registrotipocoche [ 'tipo_dato' ] . "</option>" ; 
  } 
  } 
  mysql_free_result ( $tablatipocabello ) ; 
  ?> 
  </select> 
                            </div>
                        </div>
      <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Link Tutoriales:</h5>
                    <textarea name="linktutorial" placeholder="Ejm: www.youtube.com ; www.google.com.pe, etc" rows="1" cols="55" onKeyDown="textCounter(this.form.desentre,this.form.remLen,500);"  onKeyUp="textCounter(this.form.desentre,this.form.remLen,500);" class="form-control" autofocus><? echo $linktu; ?></textarea>
                            </div>
                        </div>
                        
       <div class="w3-theme-l1 col-md-12">
        <h4>Datos del Manual</h4>
        </div>
          <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Descripci&oacute;n Entregable:</h5>    
                    <textarea name="desentre" rows="1" cols="55" onKeyDown="textCounter(this.form.desentre,this.form.remLen,500);"  onKeyUp="textCounter(this.form.desentre,this.form.remLen,500);" class="form-control" autofocus required><? echo $descrientA; ?></textarea>
                            </div>
                        </div>
        <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Carga Archivo:</h5>
                    <input name="carga_ar" id="carga_ar" value="" type="file" class="form-control" autofocus/>
    <input name="carga_arx" id="carga_arx" value="<?php echo $cargA; ?>" type="text" class="form-control"  readonly />
                            </div>
                        </div>
         <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Logo P&aacute;gina:</h5>
                    <input name="carga_imagen" id="carga_imagen" type="file"  class="form-control" autofocus />
                    <input name="carga_imagenx" id="carga_imagenx" value="<?php echo $car_img; ?>" type="text" class="form-control" readonly />
                            </div>
                        </div>               
        <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Costo (S/.):</h5>
                    <div class="input-group">
                <span class="input-group-addon">S/.</span>
                    <input name="costo" type="text" value="<?php echo $costA; ?>" placeholder="Ingrese Precio (S/.)" class="form-control" autofocus required />
                    <span class="input-group-addon">.00</span>
                    </div>
                            </div>
                        </div>
        <div class="w3-theme-l1 col-md-12">
        <h4>Datos del Autor</h4>
        </div>
         <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Autor Registro:</h5>
                    
                    <input maxlength="200" name="nom_autor" value="<?php echo $au_re; ?>" placeholder="Ingrese Nombre Pagina" class="form-control" autofocus required />
                    
                            </div>
                        </div>
         <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Celular Autor:</h5>
                    <input type="text" maxlength="100" name="cel_autor" value="<?php echo $au_ce; ?>" placeholder="Ingrese Numero Celular" class="form-control" autofocus />
                    <span class="w3-opacity"> * Dato Opcional </span>
                            </div>
                        </div>
         <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Email Autor :</h5>
                    <input type="email" name="correo_autor" value="<?php echo $au_co; ?>" placeholder="Ingrese Email" class="form-control" autofocus required />
                            </div>
                        </div>
                        
          <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Estado :</h5>
                    <select name="estado" class='form-control' required>
                    <option value=""></option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                    </select>
                    
                    
                            </div>
                        </div>
                        
                        <div class="col-md-12 text-center">
                        
                        <button type="submit" name="boton" class="w3-btn w3-theme-d2 w3-margin-bottom">
      <span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                        
                        
                        <a href="<?=$_SERVER["HTTP_REFERER"]?>"><button type="button" class="btn btn-danger w3-margin-bottom"><i class="fa fa-close"></i>  Cancelar</button></a>
                        </div>
                        
                  </form>      
        
      </div>
		 
      <?php
	  /*actualiza datos*/
	  
	  if(isset($_POST['boton'])){ 

/*carga archivo entregable*/
				if ($_FILES["carga_ar"]["name"]!=""){
	$directorio = 'data_archivos/';
	
	if (file_exists("data_archivos/" . $_FILES["carga_ar"]["name"])) { 
            //echo $_FILES["carga_ar"]["name"] . " ya existe. "; 
			echo "<script type='text/javascript'> alert('El Archivo de Carga Ya Existe !!'); </script> ";
			//volvemos a cargar la pagina
			echo"<script>location.href='vista_active.php'</script>";
          } else {
			

if (move_uploaded_file($_FILES['carga_ar']['tmp_name'], $directorio . $_FILES['carga_ar']['name']))
{
	} else{
    //print "Error al intentar subir el archivo.";
	echo "<script type='text/javascript'> alert('Error al Modificar el Registro en la carga entregable'); </script> ";
	 echo"<script>location.href='vista_active.php'</script>";
}
} 
}

/*carga imagen logo*/
if ($_FILES["carga_imagen"]["name"]!=""){
	$target_path = "data_logos/";
$target_path = $target_path . basename( $_FILES['carga_imagen']['name']); 
if(move_uploaded_file($_FILES['carga_imagen']['tmp_name'], $target_path)) { 
//echo "El archivo ". basename( $_FILES['carga_imagen']['name']). " ha sido subido";
} else{
//echo "Ha ocurrido un error, trate de nuevo!";
}
}


	///subimos datos a la base

			//include ("conection/config.php");
			//se valida si hay datos al cargar archivo entregable
				if ($_FILES["carga_ar"]["name"]!=""){
			$documen= $_FILES["carga_ar"]["name"];
			} else{
				$documen= $_POST["carga_arx"];
			}
			
			//se valida si hay datos al cargar imagen logo
			if ($_FILES["carga_imagen"]["name"]!=""){
			$foto= $_FILES["carga_imagen"]["name"];
			} else{
				$foto= $_POST["carga_imagenx"];
			}
			
			$descripag=$_POST["despag"];
			$descrientre=$_POST["desentre"];
			

			
			$Sql="update pag_datapagina 
			Set cod_tipo_bus='2', 
			cod_pais='".$_POST["pais"]."',
			cod_pais_merca='".$_POST["mercado"]."',
			cod_sector='".$_POST["sector"]."',
			cod_tema='".$_POST["tema"]."',
			cod_idioma='".$_POST["idioma"]."',
			cod_tipo_dato='".$_POST["tdato"]."',
			cod_alcance='".$_POST["alcance"]."',
			cod_tipo_acceso='".$_POST["tacceso"]."',
			cod_inst='".$_POST["inst"]."',
			nom_inst='".$_POST["nominst"]."',
			nom_pag='".$_POST["nompag"]."',
			descri_pag='".$_POST["despag"]."',
			dire_pag='".$_POST["direpag"]."',
			carga_ar='$documen',
			descri_entre='".$_POST["desentre"]."',
			costo='".$_POST["costo"]."',
			carga_img='$foto',
			autor_reg='".$_POST["nom_autor"]."',
			autor_cel='".$_POST["cel_autor"]."',
			autor_correo='".$_POST["autor_correo"]."',
      estado='".$_POST["estado"]."',
			link_tuto='".$_POST["linktutorial"]."'
where id ='$codx' ";
// strtoupper convierte a mayusculas
   mysql_query($Sql,$link); 
   echo "<script type='text/javascript'> alert('Informacion Modificado Satisfactoriamente'); </script> ";
   echo"<script>location.href='vista_active.php'</script>";
   mysql_close($link);
   
    //print "El archivo fue subido con éxito.";

//}

} 
	  ?>
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <?php
	/*panel derecho*/
	include("lateral_derecho.php");
      ?>
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<?php
include("modal_acceder.php");
?>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <?php
  include("footer.php");
  ?>
</footer>

 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else {
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className =
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>

