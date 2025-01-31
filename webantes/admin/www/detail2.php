<?php
session_start();
include ("conection/config.php");

$id = $_GET["true"];

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
pag.id='".$id."'";
$rsnpg = mysql_query($sqlpg);
if (mysql_num_rows($rsnpg) > 0){
	while($rowpg = mysql_fetch_array($rsnpg)){

$cod = $rowpg["id"];
$fecha_act = $rowpg["fecha_actu"];
$pai = $rowpg["pais"];
$t_inst = $rowpg["institucion"];
$nom_ins = $rowpg["nom_inst"];
$nom_pag = $rowpg["nom_pag"];
$des_pag = $rowpg["descri_pag"];
$dir_pag = $rowpg["dire_pag"];
$idio = $rowpg["idioma"];
$t_acce = $rowpg["tipo_acceso"];
$merca = $rowpg["mpais"];
$alca = $rowpg["alcance"];
$sect = $rowpg["sector"];
$tem = $rowpg["tema"];
$t_cont = $rowpg["tipo_dato"];
//$cont = $rowpg[""];
$ul_fecha = $rowpg["fecha_actu"];
$nom_manu = $rowpg["nom_inst"];
$des_ent = $rowpg["descri_entre"];
$monto = $rowpg["costo"];
$archivo = $rowpg["carga_ar"];

$imagen = $rowpg["carga_img"]; 
$autor_r = $rowpg["autor_reg"];
$autor_c = $rowpg["autor_cel"];
$autor_e = $rowpg["autor_correo"];

$linkT = $rowpg["link_tuto"];

}
}

/*funcion para detectar dentro de una texto URL*/
function toLink($text){
 $text = html_entity_decode($text);
 $text = " ".$text;
 $text = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_+.~#?&//=]+)',
 '<a href="\1" target="_blank">\1</a>', $text);
 $text = eregi_replace('(((f|ht){1}tps://)[-a-zA-Z0-9@:%_+.~#?&//=]+)',
 '<a href="\1" target="_blank">\1</a>', $text);
 $text = eregi_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_+.~#?&//=]+)',
 '\1<a href="http://\2" target="_blank">\2</a>', $text);
 $text = eregi_replace('([_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3})',
 '<a href="mailto:\1" target="_blank">\1</a>', $text);
 return $text;
 }

/*muestra URL completo*/
$hostx= $_SERVER["HTTP_HOST"];
$urlx= $_SERVER["REQUEST_URI"];
$urlcompleto="http://" . $hostx . $urlx;

?>
<!DOCTYPE html>
<html>
<head>
<meta property="og:url" content="<?=$urlcompleto ?>" />
<meta property="og:title" content="<?=$nom_pag ?>" />
<meta property="og:description" content="<?=$des_pag ?>" />
<meta property="og:image" content="http://www.azatrade.info/img/logoA.jpg" />
<meta property="og:image" content="http://www.azatrade.info/img/logoB.jpg" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--<meta name="robots" content="noodp,noydir"/>
<meta name="description" content="azatrade WWW,azatrade inteligencia comercial">
<meta name="author" content="azasof, Azatrade">
<meta name="keywords" content="azatradewww, azatrade">-->

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
</head>
<body class="w3-theme-l5">

<!-- boton compartir facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- fin boton compartir facebook -->

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
              <h6 class="">Lista Multiple con datos importantes Nacional Internacional. <span class="w3-right "><a href="<?=$_SERVER["HTTP_REFERER"]?>"><button class="w3-btn w3-margin-bottom" style="background:#EA6F31"><i class="fa fa-mail-reply-all"></i> Regresa</button></a></span></h6>
              <!--<p contenteditable="true" class="w3-border w3-padding">Status: Feeling Blue</p>
              <button type="button" class="w3-btn w3-theme"><i class="fa fa-pencil"></i>  Post</button>-->
              
            </div>
          </div>
        </div>
      </div>
      



<div class="w3-container w3-card-2 w3-white w3-round w3-margin">
<br>
        <center>
        <?php
		if($imagen==''){
			?>
        <img src="../img/Azatrade11.png" alt="Avatar" style="width:200px">
        <?php
		}else{
			?>
        <img src="data_logos/<?php echo "$imagen"; ?>" alt="Avatar" style="width:200px">
        <?php
		}
		?>
        </center><br>
        <!--<hr class="w3-clear">-->
        <div class="table-responsive">
        <table class="table table-striped table-responsive" cellspacing="0" width="100%">
        <tr><td colspan="2"><h4>Datos de la propiedad de la P&aacute;gina Web</h4></td></tr>
        <tr><td class="w3-theme-l1">Pa&iacute;s de Procedencia: </td><td><?php echo "$pai"; ?></td></tr>
        <tr><td class="w3-theme-l1">Tipo Instituci&oacute;n:</td><td><?php echo "$t_inst"; ?></td></tr>
        <tr><td class="w3-theme-l1">Nombre Instituci&oacute;n: </td><td><?php echo "$nom_ins"; ?></td></tr>
        
        <tr><td colspan="2"><h4>Datos de la P&aacute;gina Web</h4></td></tr>
        <tr><td class="w3-theme-l1">Nombre P&aacute;gina: </td><td><?php echo "$nom_pag"; ?></td></tr>
        <tr><td class="w3-theme-l1">Descripci&oacute;n P&aacute;gina:</td><td><?php echo toLink("$des_pag"); ?></td></tr>
        <tr><td class="w3-theme-l1">Direcci&oacute;n Pagina:</td><td><?php echo toLink("$dir_pag"); ?></td></tr>
        <tr><td class="w3-theme-l1">Idioma:</td><td><?php echo "$idio"; ?></td></tr>
        <tr><td class="w3-theme-l1">Tipo Acceso: </td><td><?php echo "$t_acce"; ?></td></tr>
        
        <tr><td colspan="2"><h4>Datos del Contenido la P&aacute;gina Web</h4></td></tr>
        <tr><td class="w3-theme-l1">Mercado: </td><td><?php echo "$merca"; ?></td></tr>
        <tr><td class="w3-theme-l1">Alcance:</td><td><?php echo "$alca"; ?></td></tr>
        <tr><td class="w3-theme-l1">Sector:</td><td><?php echo "$sect"; ?></td></tr>
        <tr><td class="w3-theme-l1">Tema:</td><td><?php echo "$tem"; ?></td></tr>
        <tr><td class="w3-theme-l1">Tipo Contenido:</td><td><?php echo "$t_cont"; ?></td></tr>
        <tr><td class="w3-theme-l1">Link Tutorial:</td><td><?php echo toLink("$linkT"); ?></td></tr>
        <!--<tr><td class="w3-theme-l1">Contenido: </td><td></td></tr>-->
        
        <tr><td colspan="2"><h4>Servicio Azatrade</h4></td></tr>
        <tr><td class="w3-theme-l1">Ultima Actualizaci&oacute;n: </td><td><?php echo "$ul_fecha"; ?></td></tr>
        <tr><td class="w3-theme-l1">Entregable:</td><td><?php echo "$nom_manu"; ?></td></tr>
        <tr><td class="w3-theme-l1">Descripci&oacute;n Entregable:</td><td><?php echo "$des_ent"; ?></td></tr>
        <tr><td class="w3-theme-l1">Costo (S/.): </td><td><?php echo "$monto"; ?></td></tr>
        
        <tr><td colspan="2"><h4>Datos del Autor</h4></td></tr>
        <tr><td class="w3-theme-l1">Nombre Usuario: </td><td><?php echo "$autor_r"; ?></td></tr>
        <tr><td class="w3-theme-l1">Celular:</td><td><?php echo "$autor_c"; ?></td></tr>
        <tr><td class="w3-theme-l1">Correo: </td><td><?php echo "$autor_e"; ?></td></tr>
        <tr><td colspan="2"><span class="w3-right"><a href="<?=$_SERVER["HTTP_REFERER"]?>"><button class="w3-btn w3-margin-bottom" style="background:#EA6F31"><i class="fa fa-mail-reply-all"></i> Regresa</button></a></span></td></tr></table>
        </div>
          
        <a href="<?php echo "$dir_pag"; ?>" target="_blank"><button type="button" class="w3-btn w3-margin-bottom" style="background:#83DA3E"><i class="fa fa-external-link"></i>  Ir a P&aacute;gina</button></a>
<?php if($monto=='0' or $monto=='' ){ 
  if($archivo==""){
    //echo "<button type='button' class='w3-btn w3-theme-d2 w3-margin-bottom'><i class='fa fa-download'></i>  Descargar</button>";
  } else {
    //$url_des='data_archivos/'.$archivo;
    echo "<a href='data_archivos/$archivo' target='_blank'><button type='button' class='w3-btn w3-theme-d2 w3-margin-bottom'><i class='fa fa-download'></i>  Descargar</button></a>";
  }
  ?>
<?php } else { ?>

        <button type="button" class="w3-btn w3-theme-d2 w3-margin-bottom" data-toggle="modal" data-target="#myModal_formulario"><i class="fa fa-money"></i>  Comprar</button>
        <?php } ?>
        <!--<button type="button" class="w3-btn w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Compartir Facebook</button>-->
        <!-- boton compartir -->
<div class="fb-share-button" data-href="<?=$urlcompleto; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.azatrade.info%2Fwww%2Fdetail.php&amp;src=sdkpreparse">
Compartir
</a></div>

        
      </div>
		  
      
<!-- ventana modal de formulario compra -->
<?php
include("modal_correo.php");
?>

      
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

