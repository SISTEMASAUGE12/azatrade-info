<?php
session_start();
if (isset($_SESSION['login_usuario'])){
	if($_SESSION['rol']<>'ADMIN'){//si no es admin
		print "<script>window.location='login/';</script>";
		//print "<script>window.location='https://www.azatrade.info/';</script>";
	}
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
		print "<script>window.location='login/';</script>";
	//print "<script>window.location='https://www.azatrade.info/';</script>";
}
}
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("incBD/inibd.php");
set_time_limit(450);
$activepadm ="active";
$cambiaicons = "aria-expanded='true'";
$activerptprodu ="active";
$actibtn = "show";
$mensajeA = $_GET["by"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!-- Favicons -->
<link rel="apple-touch-icon" href="../img/logo.png">
<link rel="icon" href="img/logo.png">
<?php include("title.php"); ?>

  <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
      
        </head>
        <body >
        <div class="wrapper">
            <div class="main-panel">
                <!-- Navbar -->
<!-- End Navbar -->
                    <div class="content">
                      <div class="container-fluid">
                            <div class="row">   
      <div class="col-md-12">  
      
                 <div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>
     
     <?php if($mensajeA=="ok"){ ?>
           <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se registro satisfactoriamente al usuario</span>
          </div>
           <?php } ?>
           
       <?php if($mensajeA=="yes"){ ?>
           <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se modifico el registro del usuario satisfactoriamente</span>
          </div>
           <?php } ?>
        <?php if($mensajeA=="an"){ ?>
           <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se anulo el registro de acceso al usuario satisfactoriamente</span>
          </div>
           <?php } ?>
        <?php if($mensajeA=="del"){ ?>
           <div class="alert alert-delete">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se elimino el registro de acceso al usuario satisfactoriamente</span>
          </div>
           <?php } ?>
           
    <!--<a href='form-producto.php'><p><button class="btn btn-info"><i class="material-icons">perm_identity</i> Nuevo Registro</button></p></a> -->

   <?php

		$sqlgral="SELECT e.part_nandi,
SUM(CASE e.aniofn WHEN '2021' THEN e.VFOB ELSE 0 END) AS f2021,
SUM(CASE e.aniofn WHEN '2022' THEN e.VFOB ELSE 0 END) AS f2022,
SUM(CASE e.aniofn WHEN '2023' THEN e.VFOB ELSE 0 END) AS f2023,
SUM(CASE e.aniofn WHEN '2024' THEN e.VFOB ELSE 0 END) AS f2024,
SUM(CASE e.aniofn WHEN '2021' THEN e.VPESNET ELSE 0 END) AS p2021,
SUM(CASE e.aniofn WHEN '2022' THEN e.VPESNET ELSE 0 END) AS p2022,
SUM(CASE e.aniofn WHEN '2023' THEN e.VPESNET ELSE 0 END) AS p2023,
SUM(CASE e.aniofn WHEN '2024' THEN e.VPESNET ELSE 0 END) AS p2024
FROM GranResumenImport_PowerBI as e WHERE e.aniofn >= '2020' AND e.aniofn <= '2024' GROUP BY e.part_nandi ORDER BY e.part_nandi ASC";
		  $res_gral=$conexpg->query($sqlgral); 
if($res_gral->num_rows>0){ 
			  while($fila_rpt=$res_gral->fetch_array()){
	
		  $itte = $itte + 1;
		  $codi= $fila_rpt['part_nandi'];
		  $datonomp1= $fila_rpt['f2021'];
		  $datonomp2= $fila_rpt['f2022'];
		  $datonomp3= $fila_rpt['f2023'];
		  $datonomp4= $fila_rpt['p2021'];
		  $datonomp5= $fila_rpt['p2022'];
		  $datonomp6= $fila_rpt['p2023'];
				  $datonomp7x= $fila_rpt['f2024'];
				  $datonomp8x= $fila_rpt['p2024'];
				  
				  if($datonomp4!="0"){
				      $datonomp7 = $datonomp1/$datonomp4;
					  }else{
					  $datonomp7 = "0";
				  }
				  
				  if($datonomp5!="0"){
					  $datonomp8 = $datonomp2/$datonomp5;
				  }else{
					  $datonomp8 = "0";
				  }
				  
				  if($datonomp6!="0"){
					  $datonomp9 = $datonomp3/$datonomp6;
				  }else{
					  $datonomp9 = "0";
				  }
				  
				  if($datonomp7x!="0"){
					  $datonomp10 = $datonomp8x/$datonomp7x;
				  }else{
					  $datonomp10 = "0";
				  }
				  
				  
				  //actualizamos en la tabla productos CUODE
				  $sqqqd = "SELECT n.partida, c.clasificacion4, c.clasificacion3, CONCAT(c.clasificacion4,' - ',c.clasificacion3 ) AS nomcla, c.idcuode 
				  FROM arancel_part_nandina AS n INNER JOIN cuode AS c ON n.cuode = c.idcuode 
				  WHERE n.partida = '$codi' 
				  GROUP BY n.partida,  c.clasificacion4,  c.clasificacion3,  nomcla";
				  $rfral=$conexpg->query($sqqqd); 
if($rfral->num_rows>0){ 
			  while($f55_rpt=$rfral->fetch_array()){
		  $codeuno1= $f55_rpt['idcuode'];
				  $codeuno2= $f55_rpt['nomcla'];
				  
				  }
	}else{
	$codeuno1= "";
	$codeuno2= "";
	 }
					  
					  
				  $Sql="UPDATE productos 
			SET 
			impo_vfobusdserdol1='$datonomp1',
			impo_vfobusdserdol2='$datonomp2',
			impo_vfobusdserdol3='$datonomp3',
			impo_vfobusdserdol4='$datonomp7x',
			impo_vpesnet1='$datonomp4',
			impo_vpesnet2='$datonomp5',
			impo_vpesnet3='$datonomp6',
			impo_vpesnet4='$datonomp8x',
			impo_precio1='$datonomp7',
			impo_precio2='$datonomp8',
			impo_precio3='$datonomp9',
			impo_precio4='$datonomp10',
			origen_impor='SI',
			cuode='$codeuno1',
			clasificacion4='$codeuno2'
			WHERE partida_nandi ='$codi' ";
// strtoupper convierte a mayusculas
	 $rscrea2 = $conexpg->query($Sql) or die(mysqli_error($conexpg));
	 if (!$rscrea2) {
    echo "Query: Un error ha occurido al actualizar los datos, contactese con el administrador del sistema";
    //exit;
  }
		
		  }
		  echo"<div class='alert alert-danger alert-with-icon' data-notify='container'>
                    <span data-notify='message'><b>Proceso Terminado.</b></span>
                </div>";
	  }else{//si no encuentra datos en la busqueda muestra mensaje
echo"<div class='alert alert-danger alert-with-icon' data-notify='container'>
                    <span data-notify='message'>No se encontraron datos para procesar.</span>
                </div>";
	  }
		
		  ?>
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->

                      </div>
                    </div>

            </div>
        </div>
    </body>



  
<?php //cerrando conexion
	mysqli_close($conexpg); ?>
	
	<!--<script languaje='javascript' type='text/javascript'>window.close();</script> -->
</html>
