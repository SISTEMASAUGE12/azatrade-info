<?php
session_start();
if (isset($_SESSION['login_usuario'])){
	/*if($_SESSION['rol']<>'ADMIN'){//si no es admin
		print "<script>window.location='https://www.azatrade.info/';</script>";
	}*/
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>alert('Acceso invalido! - Inicia Sesion para Acceder');window.location='$enlace_actual';</script>";
	print "<script>window.location='https://www.azatrade.info/';</script>";
}
}
$linkpage = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
include("incBD/inibd.php");
set_time_limit(450);
$activedos ="active";
$cambiaicondos = "aria-expanded='true'";
$activerptados ="active";
$actibtndos = "show";

$ale = $_GET["by"];
$view = $_GET["vista"];
$idcodese = $_GET["code"];

//obtenemos fecha y hora actual
		date_default_timezone_set("America/Lima");
        $fechahoyxx = date("Y-m-d");
        $fechahoysys=date("d/m/Y",strtotime($fechahoyxx));

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
      
		<script>
function confirmar2()
{
	if(confirm('¿Estas seguro que desea ELIMINAR registro?'))
		return true;
	else
		return false;
}
</script>
		
		<style>
input[type="text"] {
display: inline-block;
width: 100%;
margin-bottom: 20px;
padding: 12px;
border: 1px solid #ccc;
border-radius: 3px;
}
label {
margin-left: 20px;
display: block;
}
		</style>
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
             <b> Mensaje - </b> Se registro correctamente.</span>
          </div>
           <?php } ?>
		  
		  <?php if($ale=="yes"){ ?>
		  <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
             <b> Mensaje - </b> Se registro correctamente la partida en el sector.</span>
          </div>
           <?php } ?>
		  
		  <?php if($ale=="parti"){ ?>
		  <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
             <b> Mensaje - </b> No se registro, numero de partida ya existe.</span>
          </div>
           <?php } ?>
		  
		  <?php if($ale=="del"){ ?>
		  <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
             <b> Mensaje - </b> Registro eliminado correctamente </span>
          </div>
           <?php } ?>
		  
		  <?php if($ale=="up"){ ?>
		  <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
             <b> Mensaje - </b> Los datos se actualizaron correctamente. </span>
          </div>
           <?php } ?>
		  
		  <?php if($ale=="vac"){ ?>
		  <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
             <b> Mensaje - </b> Uno o mas campos vacios, intente nuevamente. </span>
          </div>
           <?php } ?>
		  
		  <?php if($ale=="vacd"){ ?>
		  <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
             <b> Mensaje - </b> Uno o mas campos vacios al editar el registro, intente nuevamente. </span>
          </div>
           <?php } ?>
          
        
        <small><a href="rpt-sector.php">Sectores</a> / Lista de Sectores</small>
		  
		  <?php if($view=="table"){ ?>
		  <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Sectores - Lista de Grupos </h4>
		<p><a href="" class="btn btn-primary" data-toggle='modal' data-target='#myModalreg'><b><i class='material-icons'>done_all</i> Nuevo Registro </b></a></p>
    </div>
	
	<!-- model registro -->
	<div class='modal fade modal-mini modal-primary' id='myModalreg' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Registrar Nuevo Grupo de Sector</b></p>
                    					<p>
                    					<form method="post" action='accion-sector.php' enctype="multipart/form-data">
											<input type="hidden" name="codegd" value="nuevo">
										<b>Tipo:</b><br> 
                                <input type="text" class="form-control css-input" name="tiposec" required><br>
                                <b>Sector:</b><br>
                                <input type="text" class="form-control css-input" name="namesector" required><br>
                                <b>Subsector:</b><br>
                                <input type="text" name="namesub" class="form-control css-input" required><br>
                                <b>Descripci&oacute;n:</b><br>
                                <input type="text" name="descrip" class="form-control css-input" required><br>
                               
								<center><button type='submit' class='btn btn-success'>Registrar</button></center>
                    					</form>
										</p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
                            </div>
                    			</div>
                    		</div>
                    	</div>
	<!-- fin model registro -->
	
	<?php
	$sqlgral="SELECT s.idsec, s.tipo, s.sector, s.subsector, s.descri, s.estado FROM sectores AS s WHERE s.estado = 'A'";
		  $res_gral=$conexpg->query($sqlgral); 
if($res_gral->num_rows>0){
		  echo"<div class='card'>";
		  /*echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title badge-info'><font color='#ffffff'>..:: <b>Resultado de la Busqueda</b>  ::.. </font></h4>
            </div>";*/
		  echo"<div class='card-body'>
                  <div class='toolbar'>
                        <h4><center><b>Seleccionar fila para agregar una nueva partida al sector</b></center></h4>
                  </div>";
		  echo"<div class='material-datatables'>";
		  echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
   <!-- <th>#</th>
   <th>Partida</th>-->
   <th>Tipo</th>
   <th>Sector</th>
   <th>Subproducto</th>
   <th>Descripcion</th>
   <th>Seleccionar</th>
   <th>Editar</th>
   <th>Eliminar</th>
                          </tr>
                      </thead>";
		  echo"<tfoot>
                          <tr>
   <!-- <th>#</th>
   <th>Partida</th>-->
   <th>Tipo</th>
   <th>Sector</th>
   <th>Subproducto</th>
   <th>Descripcion</th>
   <th>Seleccionar</th>
   <th>Editar</th>
   <th>Eliminar</th>
                          </tr>
                      </tfoot>";
		  echo"<tbody>";
		  //while ($fila_uu=pg_fetch_array($res_gral)) {
			  while($fila_uu=$res_gral->fetch_array()){
			  $itte = $itte + 1;
		   $dato1= $fila_uu['idsec'];
		   $dato2= $fila_uu['tipo'];
		   $dato3= $fila_uu['sector'];
		   $dato4= $fila_uu['subsector'];
		   $dato5= $fila_uu['descri'];

		echo"<tr>";
//echo "<td>&nbsp;</td>";
//echo "<td>$dato1</td>";
echo "<td>$dato2</td>";
echo "<td>$dato3</td>";
echo "<td>$dato4</td>";
echo "<td>$dato5</td>";
echo "<td> <a href='form-sector-grupo.php?vista=form&code=$dato1' class='btn btn-success'>Seleccionar</a> </td> </td>";
echo "<td> <a href='' data-toggle='modal' data-target='#myModalreg$itte' class='btn btn-info'>Editar</a> </td>";
echo "<td> <a href='accion-sector.php?log=$dato1&action=E' class='btn btn-danger' onclick='return confirmar2()'>Eliminar</a> </td>";
		echo"</tr>";  
				  
				  ?>
			  <div class='modal fade modal-mini modal-primary' id='myModalreg<?=$itte;?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    		<div class='modal-dialog'>
                    			<div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'><i class='material-icons'>clear</i></button>
                            </div>
                    				<div class='modal-body'>
                    				<p align="center"><b>Editar Grupo de Sector</b></p>
                    					<p>
                    					<form method="post" action='accion-sector.php' enctype="multipart/form-data" class="form-inline" >
											<input type="hidden" name="codegr" value="<?=$dato1;?>">
											<input type="hidden" name="axio" value="editar">
										<b>Tipo:</b><br> 
                                <input type="text" name="tipotsec" value="<?=$dato2;?>" required><br>
                                <b>Sector:</b><br>
                                <input type="text" name="nametsector" value="<?=$dato3;?>" required><br>
                                <b>Subsector:</b><br>
                                <input type="text" name="nametsub" value="<?=$dato4;?>" required><br>
                                <b>Descripci&oacute;n:</b><br>
                                <input type="text" name="descript" value="<?=$dato5;?>" required><br>
                               
								<center><button type='submit' class='btn btn-success'>Registrar</button></center>
                    					</form>
										</p>
                    				</div>
                            <div class='modal-footer justify-content-center'>
                            </div>
                    			</div>
                    		</div>
                    	</div>
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
                    <span data-notify='message'>No se encontraron datos en la busqueda realizada. Vuelva a consultar.</span>
                </div>";
	  }
	?>
			  </div>
		  </div>
		  
		<?php
		}
		?>
								
								
        <!-- form busqueda -->
		 <?php if($view=="form"){ 
						  
		//consultamos sector
$sqlgral="SELECT s.idsec, s.tipo, s.sector, s.subsector, s.descri, s.estado FROM sectores AS s WHERE s.estado = 'A' and s.idsec='$idcodese' ";
$res_gral=$conexpg->query($sqlgral); 
if($res_gral->num_rows>0){
while($fila_uu=$res_gral->fetch_array()){
		   $dato1= $fila_uu['idsec'];
		   $dato2= $fila_uu['tipo'];
		   $dato3= $fila_uu['sector'];
		   $dato4= $fila_uu['subsector'];
		   $dato5= $fila_uu['descri'];
}
}
		?>						  
<div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Sector - Registro </h4>
    </div>
    <!--<form method="post" action="<?php //echo $_SERVER['PHP_SELF']; ?>">-->
    <form name="formreg" method="post" action="accion-sector.php">
    <div class="card-body "> 
                              <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Tipo</label>
                                                    <input type="text" name="tipoa"  value="<?php echo "$dato2"; ?>" readonly />
                                                    <input type="hidden" name="codegd" value="regsect">
                                                </div>
                                            </div> 
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Sector</label>
                                                    <input type="text" name="tipob"  value="<?php echo "$dato3"; ?>" readonly />
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Subsector</label>
                                                    <input type="text" name="tipoc"  value="<?php echo "$dato4"; ?>" readonly />
                                                </div>
                                            </div>
											
											<div class="col-md-5">
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Descripci&oacute;n</label>
                                                    <input type="text" name="tipod"  value="<?php echo "$dato5"; ?>" readonly />
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                   <label for="exampleEmail" class="bmd-label-floating">Numero Partida</label>
                                                    <input type="text" name="numpartida" onKeyPress="return justNumbers(event);" required />
                                                </div>
                                            </div>
                                                                                        
                                            <div class="col-md-12">
                                            <center>

                                            <button type="submit" name="register" class="btn btn-fill btn-success">Registrar <i class="material-icons">save</i></button>
												
												<a href="form-sector-grupo.php?vista=table" class="btn btn-fill btn-danger">Cancelar</i></a>

                                            </center>
											</div>
                                       
                                        </div>
                                    </div>  
    </div>
    </form>
</div>
    </div>
		<?php
			}
		?>
        <!-- fin form busqueda -->
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->
                     
                      </div>
                    </div>
   
                    <?php include("footer.php"); ?>

            </div>
        </div>
    

<?php include("js.php"); ?>

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
		"order": [[ 0, "asc" ]],
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
