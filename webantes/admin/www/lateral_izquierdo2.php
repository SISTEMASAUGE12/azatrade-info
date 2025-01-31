<div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Azatrade WWW</h4>
         <!--<p class="w3-center"><img src="img_avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>-->
         <hr>
         <div class="w3-card-2 w3-round">
        <div class="w3-accordion w3-white">
          <a href="index.php"><button class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-home fa-fw w3-margin-right"></i> Inicio</button></a>
          </div>
          </div>
          <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Filtros</p>
         
         <!--<form name="busq" method="post" action="<?php //echo $_SERVER['PHP_SELF']; ?>">-->
         <form name="busq" method="post" action="index.php">

         <div class="form-group">
         <input type="text" name="businsi" class="form-control" value="<? echo $incix2; ?>" placeholder="Ingrese Palabra de Busqueda">
          </div>

         <div class="form-group">
         <?php
		 /*selecciona pais*/
      echo "<select name='pais' class='form-control text-center'>"; 
if ($paisx2!=''){
	echo"<option value=''>..:: Todos los Pa&iacute;ses ::..</option>";
			$querypro = "SELECT id, pais FROM merca_pais where pais<>'' order by pais";
$resultpro = mysql_query ($querypro) or die (mysql_error ("Error de query."));
while ($filapro = mysql_fetch_array ($resultpro)) {
extract ($filapro);


echo '<option value="'.$filapro["pais"].'"';
if($_POST["pais"]==$filapro["pais"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filapro["pais"].'</option>';   
}		

}else{

	echo"<option value=''>..:: Todos los Pa&iacute;ses ::.. </option>";
	
	$sqlp="SELECT id, pais FROM merca_pais where pais<>'' order by pais";
}
					
					$resultadop=mysql_query($sqlp); 
					while ($filap=mysql_fetch_row($resultadop))
					{ 
						echo "<option value='$filap[1]'>$filap[1]"; 
					}
					echo "</select>";
					?>
         </div>
         <div class="form-group">
         <?php
		 /*selecciona institucion*/
echo "<select name='inst' class='form-control text-center'>"; 
if ($instx2!=''){
	echo"<option value=''>..:: Seleccione Instituci&oacute;n ::..</option>";
					$queryi = "SELECT id, institucion FROM pag_institucion order by institucion";
$resulti = mysql_query ($queryi) or die (mysql_error ("Error de query."));
while ($filai = mysql_fetch_array ($resulti)) {
extract ($filai);

echo '<option value="'.$filai["institucion"].'"';
if($_POST["inst"]==$filai["institucion"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filai["institucion"].'</option>';   
}
}else{
	
	echo"<option value=''>..:: Seleccione Instituci&oacute;n ::..</option>";
	
	$sqlin="SELECT id, institucion FROM pag_institucion order by institucion";
}
					
					$resultadoin=mysql_query($sqlin); 
					while ($filain=mysql_fetch_row($resultadoin))
					{ 
						echo "<option value='$filain[1]'>$filain[1]"; 
					}
					echo "</select>";?>
          </div>
         <div class="form-group">        
         <?php
		 /*selecciona idioma*/
echo "<select name='idioma' class='form-control text-center'>"; 
if ($idiox2!=''){
	echo"<option value=''>..:: Seleccione Idioma ::..</option>";
					$queryid = "SELECT id, idioma FROM pag_idioma order by idioma";
$resultid = mysql_query ($queryid) or die (mysql_error ("Error de query."));
while ($filaid = mysql_fetch_array ($resultid)) {
extract ($filaid);

echo '<option value="'.$filaid["idioma"].'"';
if($_POST["idioma"]==$filaid["idioma"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filaid["idioma"].'</option>';   
}
}else{
	
	echo"<option value=''>..:: Seleccione Idioma ::..</option>";
	
	$sqlid="SELECT id, idioma FROM pag_idioma order by idioma";
}
					
					$resultadoid=mysql_query($sqlid); 
					while ($filaid=mysql_fetch_row($resultadoid))
					{ 
						echo "<option value='$filaid[1]'>$filaid[1]"; 
					}
					echo "</select>";?>
          </div>
         <div class="form-group">
         <?php
		 /* tipo de acceso*/
echo "<select name='tacceso' class='form-control text-center'>"; 
if ($taccex2!=''){
	echo"<option value=''>..:: Selec. Tipo Acceso ::..</option>";
					$queryta = "SELECT id, tipo_acceso FROM pag_tipo_acceso order by tipo_acceso";
$resultta = mysql_query ($queryta) or die (mysql_error ("Error de query."));
while ($filata = mysql_fetch_array ($resultta)) {
extract ($filata);

echo '<option value="'.$filata["tipo_acceso"].'"';
if($_POST["tacceso"]==$filata["tipo_acceso"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filata["tipo_acceso"].'</option>';   
}
}else{
	
	echo"<option value=''>..:: Selec. Tipo Acceso ::..</option>";
	
	$sqlta="SELECT id, tipo_acceso FROM pag_tipo_acceso order by tipo_acceso";
}
					
					$resultadota=mysql_query($sqlta); 
					while ($filata=mysql_fetch_row($resultadota))
					{ 
						echo "<option value='$filata[1]'>$filata[1]"; 
					}
					echo "</select>";?>
          </div>
         <div class="form-group">
          <?php
		  /*seleccione alcance*/
echo "<select name='alcance' class='form-control text-center'>"; 
if ($alcax2!=''){
	echo"<option value=''>..:: Seleccione Alcance ::..</option>";
					$queryal = "SELECT id, alcance FROM pag_alcance order by alcance";
$resultal = mysql_query ($queryal) or die (mysql_error ("Error de query."));
while ($filaal = mysql_fetch_array ($resultal)) {
extract ($filaal);

echo '<option value="'.$filaal["alcance"].'"';
if($_POST["alcance"]==$filaal["alcance"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filaal["alcance"].'</option>';   
}
}else{
	
	echo"<option value=''>..:: Seleccione Alcance ::..</option>";
	
	$sqlal="SELECT id, alcance FROM pag_alcance order by alcance";
}
					
					$resultadoal=mysql_query($sqlal); 
					while ($filaal=mysql_fetch_row($resultadoal))
					{ 
						echo "<option value='$filaal[1]'>$filaal[1]"; 
					}
					echo "</select>";?>
          </div>
         <div class="form-group">
         <?php
		 /*seleccione sector*/
echo "<select name='secto' class='form-control text-center'>"; 
if ($sectox2!=''){
	echo"<option value=''>..:: Seleccione Sector ::..</option>";
					$queryse = "SELECT id, sector FROM sector where eliminado='0' order by sector";
$resultse = mysql_query ($queryse) or die (mysql_error ("Error de query."));
while ($filase = mysql_fetch_array ($resultse)) {
extract ($filase);

echo '<option value="'.$filase["sector"].'"';
if($_POST["secto"]==$filase["sector"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filase["sector"].'</option>';   
}
}else{
	
	echo"<option value=''>..:: Seleccione Sector ::..</option>";
	
	$sqlse="SELECT id, sector FROM sector where eliminado='0' order by sector";
}
					
					$resultadose=mysql_query($sqlse); 
					while ($filase=mysql_fetch_row($resultadose))
					{ 
						echo "<option value='$filase[1]'>$filase[1]"; 
					}
					echo "</select>";?>
          </div>
         <div class="form-group">
         <?php
		 /*seleccione tema*/
echo "<select name='tema' class='form-control text-center'>"; 
if ($temax2!=''){
	echo"<option value=''>..:: Seleccione Tema ::..</option>";
					$queryt = "SELECT id, tema FROM pag_tema order by tema";
$resultt = mysql_query ($queryt) or die (mysql_error ("Error de query."));
while ($filat = mysql_fetch_array ($resultt)) {
extract ($filat);

echo '<option value="'.$filat["tema"].'"';
if($_POST["tema"]==$filat["tema"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filat["tema"].'</option>';   
}
}else{
	
	echo"<option value=''>..:: Seleccione Tema ::..</option>";
	
	$sqlt="SELECT id, tema FROM pag_tema order by tema";
}
					
					$resultadot=mysql_query($sqlt); 
					while ($filat=mysql_fetch_row($resultadot))
					{ 
						echo "<option value='$filat[1]'>$filat[1]"; 
					}
					echo "</select>";?>
          </div>
         <div class="form-group">
         <?php
		 /*seleccione tipo contenido*/
echo "<select name='tdato' class='form-control text-center'>"; 
if ($tdatox2!=''){
	echo"<option value=''>..:: Seleccione Contenido ::..</option>";
					$queryco = "SELECT id, tipo_dato FROM pag_tipo_dato order by tipo_dato";
$resultco = mysql_query ($queryco) or die (mysql_error ("Error de query."));
while ($filaco = mysql_fetch_array ($resultco)) {
extract ($filaco);

echo '<option value="'.$filaco["tipo_dato"].'"';
if($_POST["tdato"]==$filaco["tipo_dato"]) echo " selected"; //con el espacio antes de "selected"
  echo '>'.$filaco["tipo_dato"].'</option>';   
}
}else{
	
	echo"<option value=''>..:: Seleccione Contenido ::..</option>";
	
	$sqlco="SELECT id, tipo_dato FROM pag_tipo_dato order by tipo_dato";
}
					
					$resultadoco=mysql_query($sqlco); 
					while ($filaco=mysql_fetch_row($resultadoco))
					{ 
						echo "<option value='$filaco[1]'>$filaco[1]"; 
					}
					echo "</select>";?>
          </div>
         
         <div class="form-group text-center">
         <!--<input type="button" name="" class="btn btn-danger" value="Buscar">-->
         <button type="submit" class="w3-btn w3-theme-d2 w3-margin-bottom">
      <span class="fa fa-search"></span> Buscar</button>
         </div>
         
         </form>
         
         
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
     <?php  if ($_SESSION['rol'] == 'ADMIN') { ?>
      <div class="w3-card-2 w3-round">
        <div class="w3-accordion w3-white">
          <button onclick="myFunction('Demo1')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-cog fa-fw w3-margin-right"></i> Panel Administrativo</button>
          <div id="Demo1" class="w3-accordion-content w3-container">
          <p><a href="vista_active.php"><i class="fa fa-anchor"></i> Paginas Pendientes</a></p>
            <!--<p><a href=""><i class="fa fa-search"></i> Tipo Busqueda.</a></p>-->
            <p><a href="vistatdato.php"><i class="fa fa-bookmark"></i> Tipo Dato</a></p>
            <p><a href="vistatacceso.php"><i class="fa fa-unlock-alt"></i> Tipo Acceso</a></p>
            <p><a href="vistatem.php"><i class="fa fa-newspaper-o"></i> Temas</a></p>
            <!--<p><a href=""><i class="fa fa-globe"></i> Paises</a></p>-->
            <p><a href="vistasector.php"><i class="fa fa-industry"></i> Sectores</a></p>
            <!--<p><a href=""><i class="fa fa-cubes"></i> Productos</a></p>-->
            <p><a href="vistainst.php"><i class="fa fa-university"></i> Instituciones</a></p>
            <p><a href="vistaidioma.php"><i class="fa fa-bullhorn"></i> Idiomas</a></p>
            <p><a href="vistaalcan.php"><i class="fa fa-inbox"></i> Alcances</a></p>
            <p><a href="vistavariable.php"><i class="fa fa-hashtag"></i> Variables</a></p>
            <p><a href="vistaentreg.php"><i class="fa fa-paper-plane"></i> Entregables</a></p>
          </div>
          <!--<button onclick="myFunction('Demo2')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-user fa-fw w3-margin-right"></i> Mi Perfil</button>
          <div id="Demo2" class="w3-accordion-content w3-container">
            <p>Mis Datos</p>
            <p>Cambiar CLave</p>
          </div>-->
          <!--<button onclick="myFunction('Demo3')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-eye fa-fw w3-margin-right"></i> www Mas Vistas</button>
          <div id="Demo3" class="w3-accordion-content w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="img_lights.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="img_nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="img_mountains.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="img_forest.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="img_nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="img_fjords.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
          </div>-->
        </div>
      </div>
      <?php } ?>
      <br>
      
      <!-- Interests -->
      <div class="w3-card-2 w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Interes</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">Comercio</span>
            <span class="w3-tag w3-small w3-theme-d4">Exterior</span>
            <span class="w3-tag w3-small w3-theme-d3">Internacional</span>
            <span class="w3-tag w3-small w3-theme-d2">Local</span>
            <span class="w3-tag w3-small w3-theme-d1">Ferias</span>
            <span class="w3-tag w3-small w3-theme">Produccion</span>
            <span class="w3-tag w3-small w3-theme-l1">Servicios</span>
            <span class="w3-tag w3-small w3-theme-l2">Economico</span>
            <span class="w3-tag w3-small w3-theme-l3">Publico</span>
            <span class="w3-tag w3-small w3-theme-l4">Privado</span>
            <span class="w3-tag w3-small w3-theme-l5">Varios</span>
          </p>
        </div>
      </div>
      
      <br>
      
      <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
        <p><h3>M&aacute;s Sistemas</h3></p>
        <?php
		/*si esta logeado*/
		if(!isset($_SESSION['usuario'])) ;
$usu = $_SESSION['usuario']; 
if ($usu==''){
	$enlace="../Export/systems.php"; 
}else{
	$enlace="../interfaces/principal.php?=AccesoCpanel-Azatrade";
}
		?>
        <a href="<?php echo "$enlace"; ?>"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeExport</button></a>
        <!--<a href="../Export/systems.php" target="_blank"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeProduce</button></a>-->
        <a href="<?php echo "$enlace"; ?>"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradePartidas</button></a>
        <!--<a href="../Export/systems.php" target="_blank"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeMundi</button></a>
        <a href="../Export/systems.php" target="_blank"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeSelect</button></a>
        <a href="../Export/systems.php" target="_blank"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeCostim</button></a>
        <a href="../Export/systems.php" target="_blank"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeCostex</button></a>-->
        <a href="<?php echo "$enlace"; ?>"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeWWW</button></a>
        <!--<a href="../Export/systems.php" target="_blank"><button class="w3-btn w3-btn-block" style="background:#1FB1D1"><i class="fa fa-check-circle"></i> AzatradeDocs</button></a>-->
      </div>
      
      <!-- Alert Box -->
      <div class="w3-container w3-round w3-border w3-theme-border w3-margin-bottom w3-hide-small" style="background:#FCB107">
        <span onclick="this.parentElement.style.display='none'" class="w3-hover-text-grey w3-closebtn">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>Disfruta de la <b>NUEVA</b> plataforma azatrade <b>WWW</b>.</p>
      </div>