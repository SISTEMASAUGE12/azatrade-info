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
pag.autor_correo
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

$imagen = $rowpg["carga_img"]; 
$autor_r = $rowpg["autor_reg"];
$autor_c = $rowpg["autor_cel"];
$autor_e = $rowpg["autor_correo"];

}
}
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
              <h6 class="w3-opacity">Lista Multiple con datos importantes Nacional Internacional. <span class="w3-right "><a href="<?=$_SERVER["HTTP_REFERER"]?>"><button class="btn btn-danger">Regresa Atras</button></a></span></h6>
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
        <table class="table table-responsive">
        <tr><td colspan="2"><h4>Datos de la propiedad de la P&aacute;gina Web</h4></td></tr>
        <tr><td class="w3-theme-l1">Pa&iacute;s de Procedencia: </td><td><?php echo "$pai"; ?></td></tr>
        <tr><td class="w3-theme-l1">Tipo Instituci&oacute;n:</td><td><?php echo "$t_inst"; ?></td></tr>
        <tr><td class="w3-theme-l1">Nombre Instituci&oacute;n: </td><td><?php echo "$nom_ins"; ?></td></tr>
        
        <tr><td colspan="2"><h4>Datos de la P&aacute;gina Web</h4></td></tr>
        <tr><td class="w3-theme-l1">Nomnbre P&aacute;gina: </td><td><?php echo "$nom_pag"; ?></td></tr>
        <tr><td class="w3-theme-l1">Descripci&oacute;n P&aacute;gina:</td><td><?php echo "$des_pag"; ?></td></tr>
        <tr><td class="w3-theme-l1">Direcci&oacute;n Pagina:</td><td><?php echo "$dir_pag"; ?></td></tr>
        <tr><td class="w3-theme-l1">Idioma:</td><td><?php echo "$idio"; ?></td></tr>
        <tr><td class="w3-theme-l1">Tipo Acceso: </td><td><?php echo "$t_acce"; ?></td></tr>
        
        <tr><td colspan="2"><h4>Datos del Contenido la P&aacute;gina Web</h4></td></tr>
        <tr><td class="w3-theme-l1">Mercado: </td><td><?php echo "$merca"; ?></td></tr>
        <tr><td class="w3-theme-l1">Alcance:</td><td><?php echo "$alca"; ?></td></tr>
        <tr><td class="w3-theme-l1">Sector:</td><td><?php echo "$sect"; ?></td></tr>
        <tr><td class="w3-theme-l1">Tema:</td><td><?php echo "$tem"; ?></td></tr>
        <tr><td class="w3-theme-l1">Tipo Contenido:</td><td><?php echo "$t_cont"; ?></td></tr>
        <!--<tr><td class="w3-theme-l1">Contenido: </td><td></td></tr>-->
        
        <tr><td colspan="2"><h4>Datos del Manual</h4></td></tr>
        <tr><td class="w3-theme-l1">Ultima Actualizaci&oacute;n: </td><td><?php echo "$ul_fecha"; ?></td></tr>
        <tr><td class="w3-theme-l1">Nombre del Manual:</td><td><?php echo "$nom_manu"; ?></td></tr>
        <tr><td class="w3-theme-l1">Descripci&oacute;n Entregable:</td><td><?php echo "$des_ent"; ?></td></tr>
        <tr><td class="w3-theme-l1">Costo (S/.): </td><td><?php echo "$monto"; ?></td></tr>
        
        <tr><td colspan="2"><h4>Datos del Autor</h4></td></tr>
        <tr><td class="w3-theme-l1">Nombre Usuario: </td><td><?php echo "$autor_r"; ?></td></tr>
        <tr><td class="w3-theme-l1">Celular:</td><td><?php echo "$autor_c"; ?></td></tr>
        <tr><td class="w3-theme-l1">Correo: </td><td><?php echo "$autor_e"; ?></td></tr>
        <tr><td colspan="2"><span class="w3-right w3-opacity"><a href="<?=$_SERVER["HTTP_REFERER"]?>"><button class="btn btn-danger">Regresa Atras</button></a></span></td></tr></table>
        
        <a href="activate.php?true=<?php echo"$cod"; ?>"><label class="btn btn-success"><i class="fa fa-home"></i> Activar</label></a>
        <a href="new_edit.php?true=<?php echo"$cod"; ?>"><label class="btn btn-primary"><i class="fa fa-pencil"></i> Editar</label></a>
        <a href="delete_regpag.php?true=<?php echo"$cod"; ?>"><label class="btn btn-danger"><i class="fa fa-close"></i> Eliminar</label></a>
          
       <p></p>
      </div>
		  
      


      
     
      
      
      
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

