<?php
session_start();
if (isset($_SESSION['login_usuario'])){
	if($_SESSION['rol']<>'ADMIN'){//si no es admin
		print "<script>window.location='https://www.azatrade.info/';</script>";
	}
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	print "<script>window.location='https://www.azatrade.info/';</script>";
}
}
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("incBD/inibd.php");
set_time_limit(450);
$activepadm ="active";
$cambiaicons = "aria-expanded='true'";
$activeblog ="active";
$actibtn = "show";

$idusur = $_SESSION['codusuario'];

$ale = $_GET["by"];

//obtenemos fecha y hora actual
		date_default_timezone_set("America/Lima");
        $fechahoyxx = date("Y-m-d");
        $fechahoysys=date("d/m/Y",strtotime($fechahoyxx));

$regt = $_GET["es"];
if($regt==""){
	$nuevo = "";
}else{
	$nuevo = "datos";
}

if($regt!=""){// si tiene datos
$q_resultado = "SELECT b.idblog, b.idcate, ca.nomcate, b.titulo, b.foto1, b.foto2, b.urlvideo, b.textocorto, b.detalle, b.archivo, b.fechareg, b.cantvisita
FROM blog AS b INNER JOIN blog_cate AS ca ON b.idcate = ca.idcate 
 WHERE idblog = '$regt' ";
	$r_rpt=$conexpg->query($q_resultado); 
if($r_rpt->num_rows>0){ 
while($fila_r=$r_rpt->fetch_array()){
             $id= $fila_r['idblog'];
			 $codi= $fila_r['idcate'];
             $blogrgt1= $fila_r['nomcate'];
             $blogrgt2= $fila_r['titulo'];
             $blogrgt3= $fila_r['foto1'];
             $blogrgt4= $fila_r['foto2'];
			 $blogrgt5= $fila_r['textocorto'];
	         $blogrgt6= $fila_r['detalle'];
	         $blogrgt7= $fila_r['archivo'];
	         $blogrgt8= $fila_r['urlvideo'];
			 
             }
             }

             }

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

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
<link rel="stylesheet" href="css/material-dashboard.min.css?v=2.0.1" rel="stylesheet">
<link href="css/demo.css" rel="stylesheet"/>
		
<!-- codigo solo acepta numeros --> 
<script language="javascript" type="text/javascript">
 function justNumbers(e)
{
   var keynum = window.event ? window.event.keyCode : e.which;
   if ((keynum == 8) || (keynum == 46))
        return true;
    return /\d/.test(String.fromCharCode(keynum));
}
</script>

 						
  <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
      }
    </script>
      <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
        </head>
        <body >
        <div class="wrapper">
      <?php include("menuizquierdo.php"); ?>
            <div class="main-panel">
                <!-- Navbar -->
<?php include("menusuperior.php"); ?>
<!-- End Navbar -->
                    <div class="content">
                      <div class="container-fluid">
                            <div class="row">   
      <div class="col-md-12">  
      
                
                 <div id="carga" style="width:100%;text-align: center;">
<Center><img class="img-responsive" src="img/loading-carga.gif" width="100px"><br><p style="font-size:12px; color:#EC0D36;"> Espere un momento, la consulta puede tardar unos minutos. </p></Center>
     </div>


        <?php if($ale=="ok"){ ?>
           <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se registro correctamente</span>
          </div>
           <?php } ?>
           
           <?php if($mensajeB=="error2" and isset($_REQUEST['btnsearchbd']) ){ ?>
           <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> debe de seleccionar un Año, Mes y Departamento como campos REQUERIDOS</span>
          </div>
           <?php } ?>
        
        <small> Nuevo Registro</small>
		  <h4 align="right"><a href="form-blog-lista.php">Ver Registros</a> </h4> 

        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">	
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Registar Blog - Ingresar datos  </h4>
    </div>
    <!--<form method="post" action="<?php //echo $_SERVER['PHP_SELF']; ?>">-->
    <form name="fvalida" method="post" enctype="multipart/form-data" action="form_blog_insert.php" >
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">											
											<input type="hidden" name="accion" class="form-control" value="<?php echo "$nuevo"; ?>"/>
                                                    <input type="hidden" name="codeid" class="form-control" value="<?php echo "$idusur"; ?>"/>
											<input type="hidden" name="idcodigo" value="<?=$id;?>" >

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <select name='tipo_cate' class='selectpicker' data-size='7' data-style='btn btn-info btn-round' required>";
				<option value="">Selec. Categoria</option>
				<?php
	$query_bg = "SELECT idcate, nomcate FROM blog_cate WHERE estado='A' ORDER BY nomcate ASC ";
	$rsblog=$conexpg->query($query_bg); 
if($rsblog->num_rows>0){ 
while($filagb=$rsblog->fetch_array()){
             $bgcodi= $filagb['idcate'];
             $bgnom= $filagb['nomcate'];
														?>
                <option value="<?=$bgcodi;?>" <?php if($codi==$bgcodi){ echo "selected";}else{ echo "";} ?> ><?=$bgnom;?></option>
                <?php
}
}
	?>
                    </select>
													
                                                </div>
                                            </div>
											<div class="col-md-2">
											<a href="form-blog-categoria.php" title="Nueva Categoria">	<i class="material-icons" style="font-size: 48px;">add_circle_outline</i> 
												</a>
											</div>
                                            
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Titulo</label>
                                                    <input type="text" name="nombreblog" class="form-control"  value="<?php echo "$blogrgt2"; ?>"  />
                                                </div>
                                            </div>
											
											<div class="col-md-6">
                                               <label for="exampleEmail" class="bmd-label-floating">Imagen Portada <small><b>Formato: JPG, PNG, GIF - Peso Imagen no mayor a los 100KB</b></small> </label> 
                                                    <input type="file" id="formFile" name="fotoimg" class="form-control css-input" />
												<small><strong>Medidas: 1280px (ancho) por 500px (alto)</strong></small>
												<input type="hidden" name="fotoimg_edit" value="<?=$blogrgt3;?>">
												<?php if($blogrgt3!=""){ ?>
												<center> <a href="archive/<?=$blogrgt3;?>" target="_blank"> <b>Ver Imagen</b> </a> </center>
												<?php } ?>
                                            </div>
											
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Embed Code Video</label>
													<textarea class="form-control" name="linkvideo" rows="2" > <?=$blogrgt8;?> </textarea>
                                                </div>
                                            </div>                                            

                                            <div class="col-md-12"><br>
                                               <label for="exampleEmail" class="bmd-label-floating">Descripci&oacute;n Corto</label>
                                                <div class="form-group">
                                                    <textarea name="detallecorto" id="editor1" class="form-control" rows="2" style="border-radius:10px;border: solid 1px #77137A;" onKeyUp="maximo(this,150);" onKeyDown="maximo(this,150);" > <?=$blogrgt5;?> </textarea>
                                                </div>
                                            </div>
                                            
                                           <div class="col-md-12"><br>
                                                   <label for="exampleEmail" class="bmd-label-floating">Descripci&oacute;n Detallado</label>
                                                    <textarea name="editor2" id="editor2" rows="10" ><?=$blogrgt6;?> 
														</textarea>
                                            </div>
											
											<div class="col-md-12"><br>
                                               <label for="exampleEmail" class="bmd-label-floating">Adjuntar Archivo de Descarga</label> 
                                                    <input type="file" id="formFilex" name="archivodes" class="form-control css-input" />
												<input type="hidden" name="archivodes_edit" value="<?=$blogrgt7;?>">
												<?php if($blogrgt7!=""){ ?>
												<center><a href="archive/<?=$blogrgt7;?>" target="_blank"><b>Ver Archivo</b></a></center>
												<?php } ?>
                                            </div>
                                            
                                            <div class="col-md-2">
                                            <center>

                                            <button type="submit" name="registro" class="btn btn-fill btn-success">Registrar <i class="material-icons">save</i></button>

                                            </center>
											</div>
                                       
                                        </div>
                                    </div>  
    </div>
    </form>
</div>
    </div>
        <!-- fin form busqueda -->

      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->
                     
                      </div>
                    </div>
   
                    <?php include("footer.php"); ?>

            </div>
        </div>
    

<?php include("js.php"); ?>

 <script src="js/pages/toastr.js"></script>
    <script src="js/pages/notification.js"></script>
			
 <script>
  $(document).ready(function(){
    // initialise Datetimepicker and Sliders
    md.initFormExtendedDatetimepickers();
    if($('.slider').length != 0){
      md.initSliders();
    }
  });
</script>
        
   <script>
function maximo(campo,limite){
if(campo.value.length>=limite){
campo.value=campo.value.substring(0,limite);
 }
}
</script>
			
    
<?php //cerrando conexion
	mysqli_close($conexpg); ?>
	
			<script>
        ClassicEditor
            .create( document.querySelector( '#editor2' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
	
	</body>
</html>
