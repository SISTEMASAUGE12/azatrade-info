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

$fillist = $_GET['list'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Azatrade - Blog </title>
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
	
	
	<!-- select2 css -->
	<!--<link href="assets/select2v410/css/select2.min.css?yu=4ii7" rel="stylesheet" type="text/css">-->
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
            
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<div class="blog-section row">
							
							<?php
	if($fillist!=""){
		$sqlblog = "SELECT b.idblog, b.titulo, b.urlnombre, b.foto1, b.textocorto, b.fechareg, bc.nomcate,  bc.urlcate FROM blog AS b INNER JOIN blog_cate AS bc ON b.idcate = bc.idcate WHERE b.estado = 'A' AND bc.urlcate='$fillist' ORDER BY b.idblog DESC";
	}else{
		$sqlblog = "SELECT idblog, titulo, urlnombre, foto1, textocorto, fechareg FROM blog WHERE estado='A' ORDER BY idblog DESC";
	}
		$querypx = $conexpg -> prepare($sqlblog); 
$querypx -> execute(); 
$ptpts = $querypx -> fetchAll(PDO::FETCH_OBJ);
		if($querypx -> rowCount() > 0) { 
			foreach($ptpts as $pfrvpt) {
				$blogdat1 = $pfrvpt -> idblog;
				$blogdat2 = $pfrvpt -> titulo;
				$blogdat3 = $pfrvpt -> urlnombre;
				$blogdat4 = $pfrvpt -> foto1;
				$blogdat5 = $pfrvpt -> textocorto;
				$blogdat6 = $pfrvpt -> fechareg;
				
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
				
				//consultar cantidad de comentarios
				$sqlcc = "SELECT count(c.idblog) AS tot FROM blog_comentarios AS c WHERE c.estado = 'A' AND aprobado='SI' AND c.idblog = '$blogdat1'";
				$qccpx = $conexpg -> prepare($sqlcc); 
$qccpx -> execute(); 
$pccs = $qccpx -> fetchAll(PDO::FETCH_OBJ);
		if($qccpx -> rowCount() > 0) { 
			foreach($pccs as $pcyt) {
				$bcct1 = $pcyt -> tot;
			}
		}else{
			$bcct1 = "0";
		}
				
							?>
							<div class="col-md-6 col-lg-4">
								<article class="post">
									<div class="post-media">
										<a href="blogdetails?es=<?=$blogdat3;?>">
											<img src="admin/archive/<?=$blogdat4;?>" alt="" width="225"
												height="280">
										</a>
										<div class="post-date">
											<span class="day"><?=$dia;?></span>
											<span class="month"><?=$nommes;?></span>
										</div>
									</div>

									<div class="post-body">
										<h2 class="post-title">
											<a href="blogdetails?es=<?=$blogdat3;?>"><?=$blogdat2;?></a>
										</h2>
										<div class="post-content">
											<p><?=$blogdat5;?></p>
										</div>
										<a href="blogdetails?es=<?=$blogdat3;?>" class="post-comment"> <?=$bcct1;?> Comentarios </a>
									</div>
								</article>
							</div>
<?php
	}
}
?>
						</div>
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
	
</body>
</html>