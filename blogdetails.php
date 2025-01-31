<?php
session_start();
if (isset($_SESSION['login_usuario'])){
	
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	//print "<script>window.location='login/';</script>";
}
}
include("conex/inibd.php");

$fillist = $_GET['es'];

$sqlblog = "SELECT b.idblog, b.titulo, b.urlnombre, b.foto1, b.foto2, b.textocorto, b.fechareg, bc.nomcate,  bc.urlcate, b.detalle, b.urlvideo, b.archivo, b.cantvisita FROM blog AS b INNER JOIN blog_cate AS bc ON b.idcate = bc.idcate WHERE b.estado = 'A' AND b.urlnombre='$fillist' ";
$querypx = $conexpg -> prepare($sqlblog); 
$querypx -> execute(); 
$ptpts = $querypx -> fetchAll(PDO::FETCH_OBJ);
		if($querypx -> rowCount() > 0) { 
			foreach($ptpts as $pfrvpt) {
				$blogdat1 = $pfrvpt -> idblog;
				$blogdat2 = $pfrvpt -> titulo;
				$blogdat3 = $pfrvpt -> urlnombre;
				$blogdat4 = $pfrvpt -> foto1;
				$blogdat4x = $pfrvpt -> foto2;
				$blogdat5 = $pfrvpt -> textocorto;
				$blogdat6 = $pfrvpt -> fechareg;
				$blogdat7 = $pfrvpt -> nomcate;
				$blogdat8 = $pfrvpt -> detalle;
				$blogdat9 = trim($pfrvpt -> urlvideo);
				$blogdat10 = $pfrvpt -> archivo;
				$blogdat11 = $pfrvpt -> cantvisita;
				
				$fechaSegundos = strtotime($blogdat6);
				$dia = date( "j", $fechaSegundos);
                $mes = date("n", $fechaSegundos);
                $anio =  date("Y", $fechaSegundos);
				
				if($mes=="1"){
					$nommes = "ENE";
					}else if($mes=="2"){
					$nommes = "FEB";
					}else if($mes=="3"){
					$nommes = "MAR";
					}else if($mes=="4"){
					$nommes = "ABR";
					}else if($mes=="5"){
					$nommes = "MAY";
					}else if($mes=="6"){
					$nommes = "JUN";
					}else if($mes=="7"){
					$nommes = "JUL";
					}else if($mes=="8"){
					$nommes = "AGO";
					}else if($mes=="9"){
					$nommes = "SEP";
					}else if($mes=="10"){
					$nommes = "OCT";
					}else if($mes=="11"){
					$nommes = "NOV";
					}else{
					$nommes = "DIC";
				}
				
			}
		}

//detectamos dispositivos
$tablet_browser = 0;
$mobile_browser = 0;
 
if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $tablet_browser++;
}
 
if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
    $mobile_browser++;
}
 
if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
    $mobile_browser++;
}
 
$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
$mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda ','xda-');
 
if (in_array($mobile_ua,$mobile_agents)) {
    $mobile_browser++;
}
 
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
    $mobile_browser++;
    //Check for tablets on opera mini alternative headers
    $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA'])?$_SERVER['HTTP_X_OPERAMINI_PHONE_UA']:(isset($_SERVER['HTTP_DEVICE_STOCK_UA'])?$_SERVER['HTTP_DEVICE_STOCK_UA']:''));
    if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
      $tablet_browser++;
    }
}
 
if ($tablet_browser > 0) {
	$dispot = "Tablet";
}
else if ($mobile_browser > 0) {
	$dispot = "Celular";
}
else {
	$dispot = "Desktop";
}  

//fin dispositivo

//detectamos IP
function getRealIP()
{

   if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
   {
      $client_ip =
         ( !empty($_SERVER['REMOTE_ADDR']) ) ?
            $_SERVER['REMOTE_ADDR']
            :
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
               $_ENV['REMOTE_ADDR']
               :
               "unknown" );

              $entries = split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);

              reset($entries);
              while (list(, $entry) = each($entries))
              {
         $entry = trim($entry);
     if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
     {
        $private_ip = array(
              '/^0\./',
              '/^127\.0\.0\.1/',
              '/^192\.168\..*/',
              '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
              '/^10\..*/');

        $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);

        if ($client_ip != $found_ip)
        {
           $client_ip = $found_ip;
           break;
        }
     }
  }
}
else
{
  $client_ip =
     ( !empty($_SERVER['REMOTE_ADDR']) ) ?
        $_SERVER['REMOTE_ADDR']
        :
        ( ( !empty($_ENV['REMOTE_ADDR']) ) ?
           $_ENV['REMOTE_ADDR']
           :
           "unknown" );
}

return $client_ip;

}

$ipcliee = getRealIP();;
//echo "Su Inúmero IP es: ".getRealIP();

//fin detectamos IP
 
//insertar la visita a la pagina
if($blogdat1!=""){
$sqlinsert="INSERT INTO blog_visitas(idblog, ip, dispo, fechavisi, horavisit)values('$blogdat1', '$ipcliee', '$dispot', now(), now())";
	$stmt = $conexpg->prepare($sqlinsert);
    $stmt->execute();
	
	// Consulta para contar las visitas del blog
    $query_very = "SELECT count(idblog) as tot FROM blog_visitas WHERE idblog = :idblog";
    $stmt = $conexpg->prepare($query_very);
    $stmt->bindParam(':idblog', $blogdat1, PDO::PARAM_STR);
    $stmt->execute();

    // Verificar si la consulta devuelve filas
    if ($stmt->rowCount() > 0) {
        // Recorrer las filas devueltas
        while ($fila_very = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Obtener el total de visitas
            $totvisi = $fila_very["tot"];

            // Actualizar la tabla de blog con el total de visitas
            $Sqlcv = "UPDATE blog SET cantvisita = :totvisi WHERE idblog = :idblog";
            $updateStmt = $conexpg->prepare($Sqlcv);
            $updateStmt->bindParam(':totvisi', $totvisi, PDO::PARAM_INT);
            $updateStmt->bindParam(':idblog', $blogdat1, PDO::PARAM_STR);
            $updateStmt->execute();

            // Verificar si la actualización fue exitosa
            if ($updateStmt->rowCount() > 0) {
                $mts1 = "El total de visitas se ha actualizado correctamente.";
            } else {
                $mts2 = "Error al actualizar el total de visitas.";
            }
        }
    } else {
        // Manejar el caso en que no se encuentran filas
        $mts1 = "No se encontraron visitas para el blog con id: $blogdat1.";
    }

	
	/*
	//actualizamos la cantidad de visitas
	$query_very = "SELECT count(idblog) as tot FROM blog_visitas WHERE idblog='$blogdat1' ";
$query=$conexpg->query($query_very); 
if($query->num_rows>0){ 
while($fila_very=$query->fetch_array()){ 
		  $totvisi = $fila_very["tot"];
	
	$Sqlcv="update blog Set cantvisita='$totvisi' where idblog ='$blogdat1' ";
	  $rs = $conexpg->query($Sqlcv);
	
		  }
	  }*/
	
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Blog - <?=$blogdat2;?> </title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">


    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800', 'Playfair+Display:900', 'Shadows+Into+Light:400']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/demo1.min.css?ter=13c3">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/simple-line-icons/css/simple-line-icons.min.css">
	
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link href="assets/select2v410/css/select2.css?yu=4gf57" rel="stylesheet" type="text/css">
	
</head>

<body>
    <div class="page-wrapper">

        <header class="header home">
            <?php include("menu-superior.php"); ?>

            <?php include("menu-flotante.php"); ?>
			
        </header>
        <!-- End .header -->

        <main class="main">
            
			<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="./"><i class="icon-home"></i></a></li>
						<li class="breadcrumb-item active" aria-current="page">Blog Post <?=$mts1;?> - <?=$mts2;?> </li>
					</ol>
				</div><!-- End .container -->
			</nav>

			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<article class="post single">
							<?php if($blogdat9==""){ ?>
							<div class="post-media">
								<img src="admin/archive/<?=$blogdat4;?>" alt="">						
							</div><!-- End .post-media -->
							<?php }else{ ?>
							<center><?=$blogdat9;?></center>
							<?php } ?>
							<div class="post-body">
								<div class="post-date">
									<span class="day"><?=$dia;?></span>
									<span class="month"><?=$nommes;?></span>
								</div><!-- End .post-date -->

								<h2 class="post-title"><?=$blogdat2;?></h2>

								<div class="post-meta">
									<a href="" class="hash-scroll">Categoria: <?=$blogdat7;?> </a>
								</div><!-- End .post-meta -->

								<div class="post-content">
									<?=$blogdat5;?><br><br>
									<?=$blogdat8;?>
								</div><!-- End .post-content -->
								
								<?php if($blogdat10!=""){ ?>
								<p><a href="admin/archive/<?=$blogdat10;?>" target="_blank" class="btn btn-primary" style="color: white;">Descargar archivo</a> <br> <br> </p>
								<?php } ?>
								<!-- <div class="post-share">
									<h3 class="d-flex align-items-center">
										<i class="fas fa-share"></i>
										Compartir post
									</h3>

									<div class="social-icons">
										<a href="#" class="social-icon social-facebook" target="_blank"
											title="Facebook">
											<i class="icon-facebook"></i>
										</a>
										<a href="#" class="social-icon social-twitter" target="_blank" title="Twitter">
											<i class="icon-twitter"></i>
										</a>
										<a href="#" class="social-icon social-linkedin" target="_blank"
											title="Linkedin">
											<i class="fab fa-linkedin-in"></i>
										</a>
										<a href="#" class="social-icon social-gplus" target="_blank" title="Google +">
											<i class="fab fa-google-plus-g"></i>
										</a>
										<a href="#" class="social-icon social-mail" target="_blank" title="Email">
											<i class="icon-mail-alt"></i>
										</a>
									</div>
								</div> -->

								<?php
								$sqlcoomm = "SELECT bc.comentario, bc.fechareg, bc.horareg, u.nombre, u.apellido 
								FROM blog_comentarios AS bc INNER JOIN usuario AS u ON bc.iduser = u.codusuario 
								WHERE bc.aprobado = 'SI' AND bc.estado = 'A' AND bc.idblog = '$blogdat1'";
								$xquecomm = $conexpg -> prepare($sqlcoomm); 
$xquecomm -> execute(); 
$xpcos = $xquecomm -> fetchAll(PDO::FETCH_OBJ);
		if($xquecomm -> rowCount() > 0) { 
			foreach($xpcos as $xcommt) {
				$blocomm1 = $xcommt -> comentario;
				$blocomm2 = $xcommt -> fechareg;
				$blocomm3 = $xcommt -> horareg;
				$blocomm4 = $xcommt -> nombre;
								?>
								<div class="post-author">
									<h3><i class="far fa-user"></i><?=$blocomm4;?></h3>
									<figure>
										<a><img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG-High-Quality-Image.png" alt=""></a>
									</figure>
									<div class="author-content">
										<h4><a><?=$blocomm2.' '.$blocomm3;?></a></h4>
										<p><?=$blocomm1;?></p>
									</div>
								</div>
								<?php
			}
		}
								?>

								<div class="comment-respond">
									<h3>Dejanos tu comentario</h3>

									<form id="fupForm">
										<p>Los campos obligatorios están marcados *</p>
										<input type="hidden" name="codeblog" id="codeblog" value="<?=$blogdat1;?>">
										<input type="hidden" name="codidusu" id="codidusu" value="<?=$_SESSION['codusuario'];?>">
										<div class="form-group">
											<label>Comentario</label>
											<textarea cols="30" rows="1" class="form-control" name="comenta" id="comenta" required></textarea>
										</div><!-- End .form-group -->

										<div class="form-group">
											<label>Nombres</label>
											<input type="text" class="form-control" value="<?=$_SESSION['nombreaza'];?>" readonly >
										</div><!-- End .form-group -->

										<div class="form-footer my-0">
											<?php if (isset($_SESSION['login_usuario'])){ ?>
											<button type="submit" name="submit" class="btn btn-primary submitBtn">Publicar</button>
											<?php }else{ ?>
											<a href="login" class="btn btn-primary" style="color: white;" target="_blank">Publicar</a>
											<?php } ?>
											<br>
											<p class="statusMsg"></p>
										</div><!-- End .form-footer -->
									</form>
								</div><!-- End .comment-respond -->
							</div><!-- End .post-body -->
						</article><!-- End .post -->

						<hr class="mt-2 mb-1">

						<div class="related-posts">
							<h4>Publicaciones <strong>Relacionadas</strong></h4>

							<div class="owl-carousel owl-theme related-posts-carousel" data-owl-options="{
								'dots': false
							}">
								<?php
	$sqlxblog = "SELECT idblog, titulo, urlnombre, foto1, textocorto, fechareg FROM blog WHERE estado='A' AND AND urlnombre<>'$fillist' ORDER BY idblog DESC LIMIT 6";
		$xquerypx = $conexpg -> prepare($sqlxblog); 
$xquerypx -> execute(); 
$xptpts = $xquerypx -> fetchAll(PDO::FETCH_OBJ);
		if($xquerypx -> rowCount() > 0) { 
			foreach($xptpts as $xpfrvpt) {
				$blogdatx1 = $xpfrvpt -> idblog;
				$blogdatx2 = $xpfrvpt -> titulo;
				$blogdatx3 = $xpfrvpt -> urlnombre;
				$blogdatx4 = $xpfrvpt -> foto1;
				$blogdatx5 = $xpfrvpt -> textocorto;
				$blogdatx6 = $xpfrvpt -> fechareg;
				
				$fechaSegundosx = strtotime($blogdatx6);
				$diax = date( "j", $fechaSegundosx);
                $mesx = date("n", $fechaSegundosx);
                $aniox =  date("Y", $fechaSegundosx);
				
				if($mesx=="1"){
					$nommesx = "ENE";
					}else if($mesx=="2"){
					$nommesx = "FEB";
					}else if($mesx=="3"){
					$nommesx = "MAR";
					}else if($mesx=="4"){
					$nommesx = "ABR";
					}else if($mesx=="5"){
					$nommesx = "MAY";
					}else if($mesx=="6"){
					$nommesx = "JUN";
					}else if($mesx=="7"){
					$nommesx = "JUL";
					}else if($mesx=="8"){
					$nommesx = "AGO";
					}else if($mesx=="9"){
					$nommesx = "SEP";
					}else if($mesx=="10"){
					$nommesx = "OCT";
					}else if($mesx=="11"){
					$nommesx = "NOV";
					}else{
					$nommesx = "DIC";
				}
								?>
								<article class="post">
									<div class="post-media zoom-effect">
										<a href="blogdetails?es=<?=$blogdatx3;?>">
											<img src="admin/archive/<?=$blogdatx4;?>" alt="Post">
										</a>
									</div><!-- End .post-media -->

									<div class="post-body">
										<div class="post-date">
											<span class="day"><?=$diax;?></span>
											<span class="month"><?=$nommesx;?></span>
										</div><!-- End .post-date -->

										<h2 class="post-title">
											<a href="blogdetails?es=<?=$blogdatx3;?>"><?=$blogdat2;?></a>
										</h2>

										<div class="post-content">
											<p><?=$blogdat5;?></p>

											<a href="blogdetails?es=<?=$blogdatx3;?>" class="read-more">Leer M&aacute;s <i
													class="fas fa-angle-right"></i></a>
										</div><!-- End .post-content -->
									</div><!-- End .post-body -->
								</article>
								<?php
			}
		}
								?>
								
							</div><!-- End .owl-carousel -->
						</div><!-- End .related-posts -->
					</div><!-- End .col-lg-9 -->

					<div class="sidebar-toggle custom-sidebar-toggle">
						<i class="fas fa-sliders-h"></i>
					</div>
					<div class="sidebar-overlay"></div>
					<aside class="sidebar mobile-sidebar col-lg-3">
						<div class="sidebar-wrapper" data-sticky-sidebar-options='{"offsetTop": 72}'>
							<div class="widget widget-categories">
								<h4 class="widget-title">Blog Categorias</h4>
								<ul class="list">
									<?php
	$sqlcateblog = "SELECT idcate, nomcate, urlcate FROM blog_cate WHERE ESTADO='A' ORDER BY nomcate ASC";
	$quectx = $conexpg -> prepare($sqlcateblog); 
$quectx -> execute(); 
$pctts = $quectx -> fetchAll(PDO::FETCH_OBJ);
		if($quectx -> rowCount() > 0) { 
			foreach($pctts as $pctvpt) {
				$blct1 = $pctvpt -> idcate;
				$blct2 = $pctvpt -> nomcate;
				$blct3 = $pctvpt -> urlcate;
									?>
									<li><a href="blog?list=<?=$blct3;?>"><?=$blct2;?></a></li>
									<?php
			}
		}
									?>
								</ul>
							</div><!-- End .widget -->


						</div><!-- End .sidebar-wrapper -->
					</aside><!-- End .col-lg-3 -->
				</div><!-- End .row -->
			</div><!-- End .container -->
			
        </main>
        <!-- End .main -->

<?php include("footer.php"); ?>
    </div>
    <!-- End .page-wrapper -->
<?php include("menu-movil.php"); ?>

<?php include("menu-pie.php"); ?>


    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/plugins/jquery-numerator.min.js"></script>
    <script src="assets/js/jquery.appear.min.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
	<script src="assets/js/nouislider.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js?pit=789"></script>
	
	<script src="assets/select2v410/js/select2.min.js"></script>
	<script src="assets/select2v410/js/i18n/es.js"></script>
	
	<script>
$(document).ready(function(e){
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'blogdetails_insert_coment.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5");
            },
            success: function(msg){
                $('.statusMsg').html('');
                if(msg == 'ok'){
                    $('#fupForm')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Comentario registrado correctamente, sera validado por el admin de la plataforma para publicarlo.</span>');
                }else{
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Problema al registrar su comentario, intentelo nuevamente.</span>');
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
    
    //file type validation
    /*$("#file").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            alert('Please select a valid image file (JPEG/JPG/PNG).');
            $("#file").val('');
            return false;
        }
    });*/
});
</script>
	
</body>
</html>