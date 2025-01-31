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

$ale = $_GET["var"];
$codeidb = $_GET["esco"]; //id comentario
$codecod = $_GET["prk"]; //id blog

//obtenemos fecha y hora actual
		date_default_timezone_set("America/Lima");
        $fechahoyxx = date("Y-m-d");
        $fechahoysys=date("d/m/Y",strtotime($fechahoyxx));

//actualizamos estado del comentario
if($codeidb!=""){
	$Sql="UPDATE blog_comentarios 
			SET 
			aprobado = 'SI'
            WHERE idcomen = '$codeidb' ";
	
	 $rscrea2 = $conexpg->query($Sql) or die(mysqli_error($conexpg));
	 if (!$rscrea2) {
    echo "Query: Un error ha occurido al actualizar estado de aprobacion del comentario";
  } 
	//consultamos cantidad de comentarios
	$sqccal = "SELECT count(bc.idcomen) as total FROM blog_comentarios AS bc WHERE bc.idblog = '$codecod' AND bc.aprobado = 'SI' AND bc.estado = 'A'";
	$rcal=$conexpg->query($sqccal); 
if($rcal->num_rows>0){ 
	while($fccpt=$rcal->fetch_array()){
		  $countt = $fccpt['total'];
	}
}else{
	$countt = "0";
}
	
	//actualizamos cantidad de comentarios por blog
	$Sdql="UPDATE blog 
			SET 
			cantvisita = '$countt'
            WHERE idblog = '$codecod' ";
	
	 $rscrea3 = $conexpg->query($Sdql) or die(mysqli_error($conexpg));
	 if (!$rscrea3) {
    echo "Query: Un error ha occurido al actualizar cantidad de visitas al blog";
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
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
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
              <b> Mensaje - </b> Se actualizo el registro correctamente</span>
          </div>
           <?php } ?>
           
           <?php if($ale=="del" ){ ?>
           <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Mensaje - </b> Se elimino el registro correctamente. </span>
          </div>
           <?php } ?>
        <div class="row">
			<div class="col-lg-6">
		  
				</div>
			<div class="col-lg-6">
			<h4 align="right"><a href="form-blog-lista.php"> << Regresar </a></h4>
			</div>
			</div>
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">	
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">assignment</i>
                        </div>
                        <h4 class="card-title">Historial - Comentarios Blog</h4>
    </div>
	
	 <?php

		$sqlgral="SELECT bc.idcomen, bc.comentario, bc.fechareg, bc.horareg, bc.aprobado, b.titulo, u.nombre, u.apellido, u.mail, bc.idblog 
		FROM blog_comentarios AS bc 
		INNER JOIN blog AS b ON  bc.idblog = b.idblog 
		LEFT JOIN usuario AS u ON bc.iduser = u.codusuario 
		WHERE bc.estado = 'A' 
		ORDER BY bc.aprobado ASC, bc.idcomen DESC";
		  $res_gral=$conexpg->query($sqlgral); 
if($res_gral->num_rows>0){ 
		  echo"<div class='card'>";
		  echo"<div class='card-header card-header-info card-header-icon'>
            </div>";
		  echo"<div class='card-body'>
                  <div class='toolbar'>
                  </div>";
		  echo"<div class='material-datatables'>";
		  echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
<th><b> Nº </b></th>
<th><b> Blog </b></th>
<th><b>Usuario</b></th>
<th><b>Comentario</b></th>
<th><b>F. Registro</b></th>
<th><b>Aprobar</b></th>
<th><b>Eliminar</b></th>
                          </tr>
                      </thead>";
		  echo"<tfoot>
                          <tr>
<th><b> Nº </b></th>
<th><b> Blog </b></th>
<th><b>Usuario</b></th>
<th><b>Comentario</b></th>
<th><b>F. Registro</b></th>
<th><b>Aprobar</b></th>
<th><b>Eliminar</b></th>
                          </tr>
                      </tfoot>";
		  echo"<tbody>";
		  //while ($fila_rpt=pg_fetch_array($res_gral)) {
			  while($fila_rpt=$res_gral->fetch_array()){
			  $itte = $itte + 1;
		  $codi = $fila_rpt['idcomen'];
		  $varfe1 = $fila_rpt['comentario'];
		  $varfe2 = $fila_rpt['fechareg'];
		  $varfe3 = $fila_rpt['horareg'];
		  $varfe4 = $fila_rpt['aprobado'];
		  $varfe5 = $fila_rpt['titulo'];
				  $varfe6 = $fila_rpt['nombre'];
				  $varfe7 = $fila_rpt['apellido'];
				  $varfe8 = $fila_rpt['mail'];
				  $varfe9 = $fila_rpt['idblog'];
				  
		if($varfe4=="NO"){
			$bttb = "<a onclick='return confirmar()' href='form-blog-coment.php?esco=$codi&prk=$varfe9' class='btn btn-success btn-xs' <i class='material-icons'>Aprobar</i> </a>";
		}else{
			$bttb = "Aprobado";
		}

		echo"<tr>";
echo "<td>$itte</td>";
echo "<td>$varfe5</td>";
echo "<td>$varfe6 $varfe7 - $varfe8</td>";
echo "<td>$varfe1</td>";
echo "<td>$varfe2 $varfe3</td>";
//echo "<td>$varfe4</td>";
echo "<td>$bttb</td>";
echo "<td><a onclick='return confirmar2()' href='formblog-eliminar-coment.php?log=$codi&action=E'><button class='btn btn-danger btn-xs'> <i class='material-icons'>delete_forever</i> </button></a></td>";
		echo"</tr>";  
				  
				  ?>
	
				  <?php
		  }
		  echo"</tbody>";
		  echo"</table>";
		  echo"</div>";
		  echo"</div>";
		  echo"</div>";
		  
	  }else{//si no encuentra datos en la busqueda muestra mensaje
echo"<div class='alert alert-danger alert-with-icon' data-notify='container'>
                    <i class='material-icons' data-notify='icon'>notifications</i>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <i class='material-icons'>close</i>
                    </button>
                    <span data-notify='message'>No se encontraron datos en el historial del Blog.</span>
                </div>";
	  }

		  ?>
    
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
			
			<!-- mensaje de anulacion de registro -->
<script>
function confirmar()
{
	if(confirm('¿Estas seguro que desea APROBAR el comentario ?'))
		return true;
	else
		return false;
}
</script>

<!-- mensaje de anulacion de registro -->
<script>
function confirmar2()
{
	if(confirm('¿Estas seguro que desea ELIMINAR registro?'))
		return true;
	else
		return false;
}
</script>

<script type="text/javascript" src="js/jsexport/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.flash.min.js"></script>
    <script type="text/javascript" src="js/jsexport/jszip.min.js"></script>
    <script type="text/javascript" src="js/jsexport/pdfmake.min.js"></script>
    <script type="text/javascript" src="js/jsexport/vfs_fonts.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.html5.min.js"></script>
    <script type="text/javascript" src="js/jsexport/buttons.print.min.js"></script>
    
<script type="text/javascript">
$(document).ready(function() {
    $('#datatables').DataTable({
		"order": [[ 6, "desc" ]],
		dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "Todos"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Buscar resultados",
        }

    });


    var table = $('#datatables').DataTable();

    // Edit record
    table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');

        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record
    table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
    });

    //Like record
    table.on('click', '.like', function() {
        alert('You clicked on Like button');
    });

    $('.card .material-datatables label').addClass('form-group');
});

</script>
<script>
	$(function(){
    $(".click").click(function(e) {
        e.preventDefault();
        var data = $(this).attr("data-valor");
        //alert(data);    
		var pasa1 = document.getElementById("idfilpart").value = data;
    });
});
</script>
			
 <script>
  $(document).ready(function(){
    // initialise Datetimepicker and Sliders
    md.initFormExtendedDatetimepickers();
    if($('.slider').length != 0){
      md.initSliders();
    }
  });
</script>
        
    
			
    
<?php //cerrando conexion
	mysqli_close($conexpg); ?>
	
			
	
	</body>
</html>
