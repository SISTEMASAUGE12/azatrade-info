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
$activehisb ="active";
$actibtn = "show";

$mensajeA = $_GET["by"];

$pkid = $_GET["log"];

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
<link rel="stylesheet" href="css/material-dashboard.min.css?v=2.0.1">
<link rel="stylesheet" href="css/buttons.dataTables.min.css">
<link href="css/demo.css" rel="stylesheet"/>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

  <script>
      window.onload = detectarCarga;
      function detectarCarga(){
         document.getElementById("carga").style.display="none";
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
		  <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span><b> Mensaje - </b> Se elimino el registro satisfactoriamente</span>
          </div>
           <?php } ?>
		  
        <!-- form busqueda -->
        <div class="col-md-12">
<div class="card ">
    <div class="card-header card-header-info card-header-icon">
    <div class="card-icon">
                          <i class="material-icons">search</i>
                        </div>
                        <h4 class="card-title">Historial Busquedas</h4>
    </div>
<form class="" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div class="row"> 
		<div class="col-lg-12">
			<hr>
		</div>
		<div class="col-lg-3">
			<center>
	<label>Fecha Inicio <b style="color: red;">(*)</b> </label>
			<input type="date" name="fecha1" required>
				</center>
			</div>
		<div class="col-lg-3">
			<center>
	<label>Fecha Fin <b style="color: red;">(*)</b> </label>
			<input type="date" name="fecha2" required>
				</center>
			</div>
		<div class="col-lg-3">
			<center>
	<label>Tipo</label>
			<select name="tipo" class="form-control">
			<option value="">Seleccionar</option>
				<?php
$litsqq =  "SELECT b.origen FROM busquedas AS b GROUP BY b.origen ";
$rlgt=$conexpg->query($litsqq); 
if($rlgt->num_rows>0){ 
while($fha_r=$rlgt->fetch_array()){
             $filtr1= $fha_r['origen'];
				?>
			<option value="<?=$filtr1;?>"><?=$filtr1;?></option>
				<?php
}
}
				?>
			</select>
				</center>
			</div>
		<div class="col-lg-3"><br>
			<button type="submit" name="consulta" class="btn btn-success">Consultar</button>
		</div>
	</div>
	</form>
</div>
    </div>
        <!-- fin form busqueda -->
   <?php
if(isset($_REQUEST['consulta']) ){
$valreg1 = trim($_POST["fecha1"]);
$valreg2 = trim($_POST["fecha2"]);
$valreg3 = trim($_POST["tipo"]);
	
	if($valreg3!=""){
	$ssqq = "AND b.origen = '$valreg3'";
	}else{
	$ssqq = "";
	}
	
$sqlgral="SELECT b.fechareg, b.horareg, b.pagek, b.origen, b.seccion, b.palabra, u.nombre, u.apellido, u.empresa, u.mail 
FROM busquedas AS b LEFT JOIN usuario AS u ON b.codeuser = u.codusuario 
WHERE b.fechareg >= '$valreg1' AND b.fechareg <= '$valreg2' $ssqq 
ORDER BY b.idinsi DESC";
		  $res_gral=$conexpg->query($sqlgral); 
if($res_gral->num_rows>0){ 
		  echo"<div class='card'>";
		  echo"<div class='card-header card-header-info card-header-icon'>
              <div class='card-icon'>
                <i class='material-icons'>assignment</i>
              </div>
              <h4 class='card-title badge-info'><font color='#ffffff'>..:: <b>Resultado de la consulta</b>  ::.. </font></h4>
            </div>";
		  echo"<div class='card-body'>
                  <div class='toolbar'>
                      <!--  Aquí puede escribir botones / acciones adicionales para la barra de herramientas  -->
                  </div>";
		  echo"<div class='material-datatables'>";
		  echo"<table id='datatables' class='table table-striped table-no-bordered table-hover' cellspacing='0' width='100%' style='width:100%'>";
		  echo"<thead>
                          <tr>
<th><b> Usuario </b></th>
<th><b> Fecha </b></th>
<th><b>Hora</b></th>
<th><b>Pagina</b></th>
<th><b>Origen</b></th>
<th><b>Seccion</b></th>
<th><b>Busqueda</b></th>
                          </tr>
                      </thead>";
		  echo"<tfoot>
                          <tr>
<th><b> Usuario </b></th>
<th><b> Fecha </b></th>
<th><b>Hora</b></th>
<th><b>Pagina</b></th>
<th><b>Origen</b></th>
<th><b>Seccion</b></th>
<th><b>Busqueda</b></th>
                          </tr>
                      </tfoot>";
		  echo"<tbody>";
			  while($fila_rpt=$res_gral->fetch_array()){
	
		  $itte = $itte + 1;
		  $datonomp1= $fila_rpt['fechareg'];
		  $datonomp2= $fila_rpt['horareg'];
		  $datonomp3= $fila_rpt['pagek'];
		  $datonomp4= $fila_rpt['origen'];
		  $datonomp5= $fila_rpt['seccion'];
		  $datonomp6= $fila_rpt['palabra'];
				  $datonomp7= $fila_rpt['nombre'].' '.$fila_rpt['apellido'];
				  $datonomp8= $fila_rpt['empresa'];
				  $datonomp9= $fila_rpt['mail'];
		  

		echo"<tr>";
//echo "<td></td>";
echo "<td>$datonomp7 (
$datonomp8) - $datonomp9 </td>";
echo "<td>$datonomp1</td>";
echo "<td>$datonomp2</td>";
echo "<td>$datonomp3</td>";
echo "<td>$datonomp4</td>";
echo "<td>$datonomp5</td>";
echo "<td>$datonomp6</td>";

		echo"</tr>";  
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
                    <span data-notify='message'>No se encontraron datos al mostrar.</span>
                </div>";
	  }
	
		  }
		  ?>
      </div> <!-- end col-md-12 -->
  </div> <!-- end row -->

                      </div>
                    </div>
   
                    <?php include("footer.php"); ?>

            </div>
        </div>
    </body>

<?php include("js.php"); ?>

<!-- mensaje de anulacion de registro -->
<script>
function confirmar()
{
	if(confirm('¿Estas seguro que desea ANULAR registro?'))
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
		"order": [[ 3, "desc" ]],
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

  
<?php //cerrando conexion
	mysqli_close($conexpg); ?>
</html>
