<?php
session_start();
include ("conection/config.php");
$aa = date("Y-mm-d");
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
<link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
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
              <h6 class="w3-opacity">Usted esta aqui: Inicio /  Lista Pendientes.</h6>
              <!--<p contenteditable="true" class="w3-border w3-padding">Status: Feeling Blue</p>
              <button type="button" class="w3-btn w3-theme"><i class="fa fa-pencil"></i>  Post</button>-->
              
            </div>
          </div>
        </div>
      </div>
      



<div class="w3-container w3-card-2 w3-white w3-round w3-margin">
<br>
        <center>
        
        <p><h3>Listado</h3></p>
        </center><br>
        <hr class="w3-clear">
<div class='table-responsive'>
<?php
$sqlpg="SELECT
pag_datapagina.id,
pag_datapagina.nom_inst,
pag_datapagina.nom_pag,
pag_datapagina.fecha_actu,
pag_datapagina.autor_reg,
pag_datapagina.estado
FROM
pag_datapagina
WHERE
pag_datapagina.estado = '0'";
$rsnpg = mysql_query($sqlpg);
if (mysql_num_rows($rsnpg) > 0){
	echo"<table class='table table-striped table-hover'>
					<thead>
                    <tr>
						<th colspan='8'>Lista de Paginas Pendientes Para Aprobacion</th>
					  </tr>
					  <tr>
						<th>Items</th>
						<th>Fecha</th>
                        <th>Pagina</th>
                        <th>Institucion</th>
                        <th>Autor</th>
						<th>Ver</th> 
						<th>Editar</th>
                        <th>Eliminar</th>
					  </tr>
					</thead>
					</thead>
					<tbody>";
	while($rowpg = mysql_fetch_array($rsnpg)){
		
		
		
		$items = $items + 1;
		$true = $rowpg["id"];
		$fe = $rowpg["fecha_actu"];
		$pa = $rowpg["nom_pag"];
		$ins = $rowpg["nom_inst"];
		$au = $rowpg["autor_reg"];
		
		/*cambiamos formato fechas dias/me/año*/
		$length = strrpos($fe," ");
$newDate = explode( "-" , substr($fe,$length));
$fe2 = $newDate[2]."/".$newDate[1]."/".$newDate[0];
		
		echo"<tr>";
		echo "<td>$items</td>";
		echo "<td>$fe2</td>";
		echo "<td>$pa</td>";
		echo "<td>$ins</td>";
		echo "<td>$au</td>";
		echo "<td><a href=view.php?true=$true><button class='btn btn-success' title='Ver Detalle'><i class='fa fa-eye'></i> </button></a></td>";
		echo "<td><a href=new_edit.php?true=$true><button class='btn btn-primary' title='Editar Registro'><i class='fa fa-pencil'></i></button></a></td>";
		echo "<td><a href='delete_regpag.php?true=$true'><button class='btn btn-danger' title='Eliminar Registro'><i class='fa fa-close'></i></button></a></td>";
	echo"</tr>";
}
echo "</tbody></table>";
}else{
	echo "No hay Datos Pendientes Hoy $aa ";
}
?>

</div>
				
                


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

