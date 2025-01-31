<?php
session_start();
include ("conection/config.php");

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
        <form enctype="multipart/form-data" name="regdatapag" method="post" action="insert_new.php">
        <div class="w3-theme-l1 col-md-12">
        <h4>Datos de la propiedad de la P&aacute;gina Web</h4>
        </div>
        <div class="col-md-6">
         <div class="form-group has-success">
            <h5>Pa&iacute;s:</h5>
                                <?php
echo "<select name='pais' class='form-control' required>"; 
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
                            </div>
                        </div>
                        
        <div class="col-md-6">
             <div class="form-group has-success">
                                <h5>Instituci&oacute;n:</h5>
                                <?php
echo "<select name='inst' class='form-control' required>"; 
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
                            </div>
                        </div>
       <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Nombre Instituci&oacute;n:</h5>
                    <input type="text" maxlength="300" name="nominst" placeholder="Ingrese Nombre Instituci&oacute;n" class="form-control" autofocus required />
                            </div>
                        </div>
       <div class="w3-theme-l1 col-md-12">
        <h4>Datos de la P&aacute;gina Web</h4>
        </div>
       <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Nombre P&aacute;gina:</h5>
                    <input type="text" maxlength="300" name="nompag" placeholder="Ingrese Nombre P&aacute;gina" class="form-control" autofocus required/>
                            </div>
                        </div>
      <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Descripci&oacute;n de la p&aacute;gina:</h5>
                    <textarea name="despag" rows="1" cols="50" onKeyDown="textCounter(this.form.despag,this.form.remLen,500);"  onKeyUp="textCounter(this.form.despag,this.form.remLen,500);" class="form-control" autofocus required></textarea>
                            </div>
                        </div>
          <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Direcci&oacute;n P&aacute;gina:</h5>
                    <div class="input-group">
                    <span class="input-group-addon">Http://</span>
                    <input type="text" maxlength="200" name="direpag" placeholder="Ejm.: www.azatrade.info" class="form-control" autofocus required />
                    </div>
                    <!--<span class="w3-opacity"><font size="2"> Ejm.: www.azatrade.info</font> </span>-->
                            </div>
                        </div>
           <div class="col-md-6">
             <div class="form-group has-success">
                     <h5>Idioma:</h5>
                                <?php
echo "<select name='idioma' class='form-control' required required>"; 
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
                            </div>
                        </div>

        <div class="col-md-6">
             <div class="form-group has-success">
                     <h5>Tipo Acceso:</h5>
                                 <?php
echo "<select name='tacceso' class='form-control' required required>"; 
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
                            </div>
                        </div>
        <div class="w3-theme-l1 col-md-12">
        <h4>Datos del Contenido la P&aacute;gina Web</h4>
        </div>
       <div class="col-md-6">
             <div class="form-group has-success">
                     <h5>Mercado:</h5>
                                <?php
echo "<select name='mercado' class='form-control' required>"; 
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
                            </div>
                        </div>
       <div class="col-md-6">
             <div class="form-group has-success">
                     <h5>Alcance:</h5>
                                 <?php
echo "<select name='alcance' class='form-control' required>"; 
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
                            </div>
                        </div>
         <div class="col-md-6">
             <div class="form-group has-success">
                     <h5>Sector:</h5>
                                 <?
echo "<select name='sector' class='form-control' required>"; 
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
					echo "</select>";
					
					?>
                            </div>
                        </div>
        <div class="col-md-6">
             <div class="form-group has-success">
                     <h5>Tema:</h5>
                                <?php
echo "<select name='tema' class='form-control' required>"; 
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
                            </div>
                        </div>
        <div class="col-md-6">
             <div class="form-group has-success">
                     <h5>Tipo Contenido:</h5>
                                <?php
echo "<select name='tdato' class='form-control' required>"; 
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
                            </div>
                        </div>
        <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Link Tutoriales:</h5>
                    <textarea name="linktutorial" placeholder="Ejm: www.youtube.com ; www.google.com.pe, etc" rows="1" cols="55" onKeyDown="textCounter(this.form.desentre,this.form.remLen,500);"  onKeyUp="textCounter(this.form.desentre,this.form.remLen,500);" class="form-control" autofocus></textarea>
                            </div>
                        </div>
                        
                        
         <div class="w3-theme-l1 col-md-12">
        <h4>Datos del Manual</h4>
        </div>  
          <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Descripci&oacute;n Entregable:</h5>
                    <textarea name="desentre" rows="1" cols="55" onKeyDown="textCounter(this.form.desentre,this.form.remLen,500);"  onKeyUp="textCounter(this.form.desentre,this.form.remLen,500);" class="form-control" autofocus required></textarea>
                            </div>
                        </div>
        <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Carga Archivo: <span class="w3-opacity"> * Dato Opcional </span></h5>
                    <input name="carga_ar" id="carga_ar" type="file"  class="form-control" autofocus/>
                    
                            </div>
                        </div>
        <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Logo P&aacute;gina: <span class="w3-opacity"> * Dato Opcional </span></h5> 
                    <input name="carga_imagen" id="carga_imagen" type="file"  class="form-control" autofocus />

                            </div>
                        </div>
        <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Costo (S/.):</h5>
                    <div class="input-group">
                <span class="input-group-addon">S/.</span>
                    <input type="text" name="costo" placeholder="Ingrese Precio (S/.)" class="form-control" autofocus required />
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
                    
                    <input type="text" maxlength="200" name="nom_autor" placeholder="Ingrese Nombre Pagina" class="form-control" autofocus required />
                    
                            </div>
                        </div>
         <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Celular Autor:</h5>
                    <input id="txtDireccion" type="text" maxlength="100" name="cel_autor" placeholder="Ingrese Numero Celular" class="form-control" autofocus />
                    <span class="w3-opacity"> * Dato Opcional </span>
                            </div>
                        </div>
         <div class="col-md-6">
             <div class="form-group has-success">
                    <h5>Email Autor :</h5>
                    <input type="email" name="correo_autor" placeholder="Ingrese Email" class="form-control" autofocus required />
                            </div>
                        </div>
                    <?php  if ($_SESSION['rol'] == 'ADMIN') { ?>    
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
                        <?php } else { ?>
                        <input type="hidden" name="estado" class="form-control" autofocus value="0" />
                        <?php } ?>
                        
                        <div class="col-md-12 text-center">
                        
                        <button type="submit" class="w3-btn w3-theme-d2 w3-margin-bottom">
      <span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                        
                        
                        <a href="new.php"><button type="button" class="btn btn-danger w3-margin-bottom"><i class="fa fa-close"></i>  Cancelar</button></a>
                        </div>
                        
                  </form>      
        
      </div>
		  
      


      
      <!--<div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="img/logo.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">26-09-2016 / 1 min</span>
        <h4>John Doe</h4><br>
        <hr class="w3-clear">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="col-lg-3 text-center" style="border-style: dotted; border-color:#1FA200; 1px;">
              Pais: Peru
            </div>
            <div class="col-lg-3 text-center" style="border-style: dotted; border-color:#1FA200; 1px;">
              Ipo Inst.: Varios
          </div>
          <div class="col-lg-3 text-center" style="border-style: dotted; border-color:#1FA200; 1px;">
              Idioma: Español
          </div>
          <div class="col-lg-3 text-center" style="border-style: dotted; border-color:#1FA200; 1px;">
              Acceso: Español
          </div>
          <div class="col-lg-3 text-center" style="border-style: dotted; border-color:#1FA200; 1px;">
              Alcance: Español
          </div>
          <div class="col-lg-3 text-center" style="border-style: dotted; border-color:#1FA200; 1px;">
          Tipo cont.: Español
          </div>
           <div class="col-lg-3 text-center" style="border-style: dotted; border-color:#1FA200; 1px;">
          Sector: Varios
          </div>
          <div class="col-lg-3 text-center" style="border-style: dotted; border-color:#1FA200; 1px;">
          Tema: Español
          </div>
        </div>
        <br>
        <button type="button" class="w3-btn w3-margin-bottom" style="background:#D44547"><i class="fa fa-sign-in"></i> Acceder</button>
        <button type="button" class="w3-btn w3-theme-d2 w3-margin-bottom"><i class="fa fa-share-square"></i> Mas Detalle</button>
      </div>-->
      
      <!--<div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="img_avatar5.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">16 min</span>
        <h4>Jane Doe</h4><br>
        <hr class="w3-clear">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <button type="button" class="w3-btn w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
        <button type="button" class="w3-btn w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
      </div>-->

      <!--<div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="img_avatar6.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">32 min</span>
        <h4>Angie Jane</h4><br>
        <hr class="w3-clear">
        <p>Have you seen this?</p>
        <img src="img_nature.jpg" style="width:100%" class="w3-margin-bottom">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <button type="button" class="w3-btn w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button>
        <button type="button" class="w3-btn w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button>
      </div>-->
      
      
      
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

