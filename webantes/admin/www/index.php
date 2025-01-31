<?php
session_start();
include ("conection/config.php");

$idbus = $_GET["idbus"];
$busx2 = $_POST['busq'];
$temax2 = $_POST['tema'];
$prodx2 = $_POST['produ'];
$incix2 = $_POST['businsi'];
$paisx2 = $_POST['pais'];
$mercax2 = $_POST['merca'];
$sectox2 = $_POST['secto'];
$instx2 = $_POST['inst'];
$idiox2 = $_POST['idioma'];
$tdatox2 = $_POST['tdato'];
$alcax2 = $_POST['alcance'];
$taccex2 = $_POST['tacceso'];
$descrix2 = $_POST['descrpag'];
$variax2 = $_POST['varia'];

if($paisx2==''){
$paisx2 = $_GET['pa'];;
}
if($instx2==''){
$instx2 = $_GET['in'];
}
if($idiox2==''){
$idiox2 = $_GET['id'];
}
if($taccex2==''){
$taccex2 = $_GET['ac'];
}
if($alcax2==''){
$alcax2 = $_GET['al'];
}
if($sectox2==''){
$sectox2 = $_GET['se'];
}
if($temax2==''){
$temax2 = $_GET['te'];
}
if($tdatox2==''){
$tdatox2 = $_GET['da'];
}
if($incix2==''){
$incix2 = $_GET['bu'];
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="azatrade,buscador de paginas de inteligencia comercial">
<meta name="author" content="azatrade, buscador de paginas de inteligencia comercial">
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

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
  <ul class="w3-navbar w3-left-align w3-large w3-theme">
    <li><a class="w3-padding-large" href="<?php echo $_SERVER['PHP_SELF']; ?>">Inicio</a></li>
    <li><a class="w3-padding-large" href="#"><label class="btn btn-success"><i class="fa fa-lock"></i>     Acceder</label></a></li>
    <!--<li><a class="w3-padding-large" href="#">Link 3</a></li>
    <li><a class="w3-padding-large" href="#">My Profile</a></li>-->
  </ul>
</div>

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
            <a href="index.php"><button class="btn btn-primary col-lg-6 active">Vista Ampliada  <img src="img/listar_2.png" style="width:20px;"></button></a>
            <a href="lista_view.php"><button class="btn btn-primary col-lg-6">Listar Vista  <img src="img/listar.png" style="width:20px;"></button><br><br></a>
              <h6 class="w3-opacity">Lista Multiple con datos importantes Nacional Internacional.</h6>
              
              <!--<h6 class="w3-opacity"><?php //echo "$paisx2 $instx2 $idiox2 $taccex2 $alcax2 $sectox2 $temax2 $tdatox2 $incix2"; ?></h6>-->
			  
              <?php
			  if($paisx2 != ''){
			 echo "<span class='w3-tag w3-small' style='background:#FC9B07'> $paisx2 </span> &nbsp;";
			  }
			  if($instx2 != ''){
			 echo "<span class='w3-tag w3-small' style='background:#FC9B07'> $instx2 </span> &nbsp;";
			  }
			  if($idiox2 != ''){
			 echo "<span class='w3-tag w3-small' style='background:#FC9B07'> $idiox2 </span> &nbsp;";
			  }
			  if($taccex2 != ''){
			 echo "<span class='w3-tag w3-small' style='background:#FC9B07'> $taccex2 </span> &nbsp;";
			  }
			  if($alcax2 != ''){
			 echo "<span class='w3-tag w3-small' style='background:#FC9B07'> $alcax2 </span> &nbsp;";
			  }
			  if($sectox2 != ''){
			 echo "<span class='w3-tag w3-small' style='background:#FC9B07'> $sectox2 </span> &nbsp;";
			  }
			  if($temax2 != ''){
			 echo "<span class='w3-tag w3-small' style='background:#FC9B07'> $temax2 </span> &nbsp;";
			  }
			  if($tdatox2 != ''){
			 echo "<span class='w3-tag w3-small' style='background:#FC9B07'> $tdatox2 </span> &nbsp;";
			  }
			  if($incix2 != ''){
			 echo "<span class='w3-tag w3-small' style='background:#FC9B07'> $incix2 </span> &nbsp;";
			  }
			  ?>
			  
			  
              <!--<p contenteditable="true" class="w3-border w3-padding">Status: Feeling Blue</p>
              <button type="button" class="w3-btn w3-theme"><i class="fa fa-pencil"></i>  Post</button>-->
              
            </div>
          </div>
        </div>
      </div>
      
      
      <?php
	  /*para el conteo de paginas*/
$num_rec_per_page=10;
if (isset($_GET["page"])) { $page  = $_GET["page"];} else { $page=1; }; 
$start_from = ($page-1) * $num_rec_per_page; 
/*fin el conteo de paginas*/

if($paisx2 == '' and $instx2 == '' and $idiox2 == '' and $taccex2 == '' and $alcax2 == '' and $sectox2 == '' and $temax2 == '' and $tdatox2 == '' and $incix2 == ''){/*sin filtros todos vacios*/
	  $sqlpg="SELECT
pag.id, pag.cod_tipo_bus, tb.busqueda, pag.cod_pais, pa.pais, pag.cod_pais_merca, mp.pais AS mpais, pag.cod_sector, se.sector, pag.cod_producto, /*prod.producto,*/ pag.cod_tema, te.tema, pag.cod_idioma, pi.idioma, pag.cod_tipo_dato, td.tipo_dato, pag.cod_alcance, palc.alcance, pag.cod_tipo_acceso, pta.tipo_acceso, pag.cod_variable, v.variable, pag.cod_entre, pen.entregable, pag.cod_inst, pins.institucion, pag.nom_inst, pag.nom_pag, pag.descri_pag, pag.dire_pag, pag.fecha_actu, pag.carga_ar, pag.tipo_ar, pag.descri_entre, ROUND(pag.costo,2) as costo, 
CONCAT(tb.busqueda,pa.pais,pa.pais,se.sector,te.tema,pi.idioma,td.tipo_dato,palc.alcance,pta.tipo_acceso,v.variable,pen.entregable,pins.institucion) as leyenda
FROM pag_datapagina AS pag
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
LEFT JOIN pag_entregable AS pen ON pag.cod_entre = pen.id
INNER JOIN pag_institucion AS pins ON pag.cod_inst = pins.id
WHERE
pag.buscar like '%' and
pag.estado = '1'
order by pag.id DESC
LIMIT ".$start_from.", ".$num_rec_per_page."";
}else{
	$sqlpg="SELECT pag.id, pag.cod_tipo_bus, tb.busqueda, pag.cod_pais, pa.pais, pag.cod_pais_merca, mp.pais AS mpais, pag.cod_sector, se.sector, pag.cod_producto, /*prod.producto,*/ pag.cod_tema, te.tema, pag.cod_idioma, pi.idioma, pag.cod_tipo_dato, td.tipo_dato, pag.cod_alcance, palc.alcance, pag.cod_tipo_acceso, pta.tipo_acceso, pag.cod_variable, v.variable, pag.cod_entre, pen.entregable, pag.cod_inst, pins.institucion, pag.nom_inst, pag.nom_pag, pag.descri_pag, pag.dire_pag, pag.fecha_actu, pag.carga_ar, pag.tipo_ar, pag.descri_entre, ROUND(pag.costo,2) as costo, 
  CONCAT(tb.busqueda,pa.pais,pa.pais,se.sector,te.tema,pi.idioma,td.tipo_dato,palc.alcance,pta.tipo_acceso,v.variable,pen.entregable,pins.institucion) as leyenda
FROM pag_datapagina AS pag
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
LEFT JOIN pag_entregable AS pen ON pag.cod_entre = pen.id
INNER JOIN pag_institucion AS pins ON pag.cod_inst = pins.id
WHERE
pag.estado = '1' and
CONCAT(pa.pais,se.sector,mp.pais,te.tema,pi.idioma,td.tipo_dato,palc.alcance,pta.tipo_acceso,v.variable,pen.entregable,pins.institucion,pag.buscar) LIKE '%".$paisx2."%".$sectox2."%".$mercax2."%".$prodx2."%".$temax2."%".$idiox2."%".$tdatox2."%".$alcax2."%".$taccex2."%".$variax2."%".$descrix2."%".$instx2."%".$incix2."%'
order by pag.id DESC
LIMIT ".$start_from.", ".$num_rec_per_page."";
}

$rsnpg = mysql_query($sqlpg);
if (mysql_num_rows($rsnpg) > 0){
	
	while($rowpg = mysql_fetch_array($rsnpg)){
/*$cod = $rowpg["id_prog"];
$codf = $rowpg["numero_recibo"];*/

$cod = $rowpg["id"];
$detalle_pag = $rowpg["descri_pag"];
$MaxLENGTH=200;
$TextoResumen = substr($detalle_pag,0,strrpos(substr($detalle_pag,0,$MaxLENGTH)," "));

?>

<tr>
<td>

<div class="w3-container w3-card-2 w3-white w3-round w3-margin" id='consulta2'><br>
        <img src="img/logo.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity"><?php echo $rowpg["fecha_actu"]; ?></span>
        <a href="detail.php?true=<?php echo $cod ?>"><h4><?php echo $rowpg["nom_pag"]; ?></h4></a><br>
        <hr class="w3-clear">
        <?php echo $TextoResumen; echo " ..."; ?>
        <br>
          <div class="w3-row-padding" style="margin:0 -16px">
           <span class="w3-tag w3-small w3-theme-d4"><i class="fa fa-globe"></i> Pa&iacute;s: <?php echo $rowpg["pais"]; ?></span>
           <span class="w3-tag w3-small w3-theme-d4"> <i class="fa fa-globe"></i> Tipo Inst.: Varios</span>
          <span class="w3-tag w3-small w3-theme-d4"><i class="fa fa-home"></i> Idioma: <?php echo $rowpg["idioma"]; ?></span>
          <span class="w3-tag w3-small w3-theme-d4"><i class="fa fa-user"></i> Acceso: <?php echo $rowpg["tipo_acceso"]; ?></span>
          <span class="w3-tag w3-small w3-theme-d4"><i class="fa fa-map"></i> Alcance: <?php echo $rowpg["alcance"]; ?></span>
          <span class="w3-tag w3-small w3-theme-d4"><i class="fa fa-industry"></i> Tipo cont.: <?php echo $rowpg["busqueda"]; ?></span>
          <span class="w3-tag w3-small w3-theme-d4"><i class="fa fa-institution"></i> Sector: <?php echo $rowpg["sector"]; ?></span>
          <span class="w3-tag w3-small w3-theme-d4"><i class="fa fa-newspaper-o"></i> Tema: <?php echo $rowpg["tema"]; ?></span>
        
        </div>
        <br>
       
        <a href="<?php echo $rowpg["dire_pag"]; ?>" target="_blank"><button type="button" class="w3-btn w3-margin-bottom" style="background:#83DA3E"><i class="fa fa-external-link"></i> Ir a P&aacute;gina</button></a>
        <a href="detail.php?true=<?php echo $cod ?>"><button type="button" class="w3-btn w3-theme-d2 w3-margin-bottom"><i class="fa fa-share-square"></i> Mas Detalle</button></a>
<?php if ($_SESSION['rol'] == 'ADMIN') { ?>
        <a href="new_edit.php?true=<?php echo $cod ?>"><button type="button" class="w3-btn w3-theme-d2 w3-margin-bottom" style="background:#F4B745"><i class="fa fa-pencil"></i> Editar</button></a>
        <a href="delete_regpag.php?true=<?php echo $cod ?>"><button type="button" class="w3-btn w3-margin-bottom" style="background:#D44547"><i class="fa fa-close"></i> Eliminar</button></a>
        <?php } ?>
      </div>

		  
      
<?php
}
}else{
	$cero='0';
	echo"<div class='w3-row-padding'>
        <div class='w3-col m12'>
          <div class='w3-card-2 w3-round w3-white'>
            <div class='w3-container w3-padding'>
              <h6 class='w3-opacity'><b>No Hay Datos Encontrados $cero </b></h6>
            </div>
          </div>
        </div>
      </div>";
}
/*para el conteo de paginas*/

 if($paisx2 == '' and $instx2 == '' and $idiox2 == '' and $taccex2 == '' and $alcax2 == '' and $sectox2 == '' and $temax2 == '' and $tdatox2 == '' and $incix2 == ''){/*sin filtros todos vacios*/
$sql = "SELECT
*
FROM pag_datapagina AS pag
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
LEFT JOIN pag_entregable AS pen ON pag.cod_entre = pen.id
INNER JOIN pag_institucion AS pins ON pag.cod_inst = pins.id
WHERE
pag.buscar like '%' and pag.estado = '1'
order by pag.id DESC";
}else {
	$sql="SELECT *
FROM pag_datapagina AS pag
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
LEFT JOIN pag_entregable AS pen ON pag.cod_entre = pen.id
INNER JOIN pag_institucion AS pins ON pag.cod_inst = pins.id
WHERE
 pag.estado = '1' and
CONCAT(pa.pais,se.sector,mp.pais,te.tema,pi.idioma,td.tipo_dato,palc.alcance,pta.tipo_acceso,v.variable,pen.entregable,pins.institucion,pag.buscar) LIKE '%".$paisx2."%".$sectox2."%".$mercax2."%".$prodx2."%".$temax2."%".$idiox2."%".$tdatox2."%".$alcax2."%".$taccex2."%".$variax2."%".$descrix2."%".$instx2."%".$incix2."%'
order by pag.id DESC";
}	
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page); 

//echo "<a href='index.php?page=1'>".'|<'."</a> "; // Goto 1st page  

//for ($i=1; $i<=$total_pages; $i++) { 
            //echo "<a href='index.php?page=".$i."'>".$i."</a> "; 
//}; 
//echo "<a href='index.php?page=$total_pages'>".'>|'."</a> "; // Goto last page

?>

<?php
if($cero!='0'){
?>
<center>
<nav aria-label="...">
  <ul class="pagination pagination-md">
    <li class="page-item">
      <a class="page-link" href="<?php echo "index.php?page=1&pa=$paisx2&in=$instx2&id=$idiox2&ac=$taccex2&al=$alcax2&se=$sectox2&te=$temax2&da=$tdatox2&bu=$incix2"; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <?php for ($i=1; $i<=$total_pages; $i++) { ?>
    
    <?php if($page == $i){ ?>
    <li class="active"><a class="page-link" href="<?php echo "index.php?page=".$i." &pa=$paisx2&id=$idiox2&ac=$taccex2&al=$alcax2&se=$sectox2&te=$temax2&da=$tdatox2&bu=$incix2 "; ?>"><?php echo "$i"; ?></a></li>
    <?php }else{ ?>
    <li class="page-item"><a class="page-link" href="<?php echo "index.php?page=".$i." &pa=$paisx2&id=$idiox2&ac=$taccex2&al=$alcax2&se=$sectox2&te=$temax2&da=$tdatox2&bu=$incix2 "; ?>"><?php echo "$i"; ?></a></li>
    <?php } ?>
    
    
    <?php }; ?>
   
    <li class="page-item">
      <a class="page-link" href="<?php echo "index.php?page=$total_pages&pa=$paisx2&id=$idiox2&ac=$taccex2&al=$alcax2&se=$sectox2&te=$temax2&da=$tdatox2&bu=$incix2"; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>
</center>
<?php
}
?>

 <!-- ******** fin el conteo de paginas *******/ -->
      
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

