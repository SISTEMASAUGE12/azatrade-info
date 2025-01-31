<?php
session_start();
include ("conection/config.php");

$nombres = $_POST["nombres"];
$idc = $_POST["id_pagina"];
$nombre_p = $_POST["no_pagina"];
$nombre_i = $_POST["no_inst"];
$descri_p = $_POST["descri_p"];
$email = $_POST["correo"];
$cel = $_POST["celular"];
$comen = $_POST["comentario"];
$costo = $_POST["precio_pp"];

$url = $_POST["detalle"];

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
              <h6 class="w3-opacity">Usted esta aqui: Inicio /  Envio de Solicitud de Compra.</h6>
              <!--<p contenteditable="true" class="w3-border w3-padding">Status: Feeling Blue</p>
              <button type="button" class="w3-btn w3-theme"><i class="fa fa-pencil"></i>  Post</button>-->
              
            </div>
          </div>
        </div>
      </div>
      



<div class="w3-container w3-card-2 w3-white w3-round w3-margin">
<br>
        <center>
        
        <p><h3>Solicitud Enviado Satisfactoriamente</h3></p>
        </center><br>
        <hr class="w3-clear">
<div class='table-responsive'>
<?php /*cuerpo del mensaje */
$destinatario = "azatradeinfo@gmail.com"; 
//$destinatario = "jopedis85@gmail.com"; 
$asunto = "Solicitud de Compra WWW $nombre_p"; 
$cuerpo = ' 
<html> 
<head> 
   <title>Solicitud de Compra Azatrade WWW</title> 
</head> 
<body> 
<h1>Hola estimado '.$nombres.' !</h1> 
<p> 
<b>Su solicituD de compra del archivo descargable :  '.$nombre_p.' esta en proceso.</b>. 
</p> 

Para tener acceso al archivo de descarga, siga estos 3 simples pasos:<br>
1. Pagar el costo de <b>S/.'.$costo.'</b> para descargar el archivo que desea, pagando en AGENTE BCP / CUENTA SOLES: 3052255710056 (ANDES SOLUCIONES Y DESARROLLO SRL)<br>
2. Enviar el voucher de pago a <b>informes@azatrade.info</b> con copia a <b>azatradeinfo@gmail.com</b> <br>
3. Nosotros estaremos confirmando el pago y le estaremos enviando link de descarga del archivo a la brevedad.<br><br>

Si desea hacer efectivo su pago por otro medio, o desea realizar consultas, puede hacerlo comunicándose a nuestros correos indicado en la pagina web o al numero <b>RPM #969695884</b>, o visitandonos a nuestra oficina ubicada en <b>Calle Insurrección 250-A, Urb. Bancarios, Chiclayo, Lambayeque.</b><br><br>

<hr class="w3-clear">

<b><u>Datos de Solicitud</u></b><br>
<b>Nombres completos:</b> '.$nombre_p.' <br>
<b>Email:</b> '.$email.' <br>
<b>Celular:</b> '.$cel.' <br>
<b>Comentario:</b> '.$comen.' <br>
<p></p>
<b><u>Datos del Archivo de Descarga</u></b>
<b>Codigo de Consulta:</b> '.$idc.' <br>
<b>Nombre Pagina:</b> '.$nombre_p.' <br>
<b>Nombre Institucion:</b> '.$nombre_i.' <br>
<b>Descripcion de la Pagina:</b> '.$descri_p.' <br>
<b>Costo S/.:</b>'.$costo.' <br>
<p></p>
<b>Atte. Equipo Azatrade.</b><br>
<b>Calle Insurrección 250-A /Urb. Bancarios</b><br>
<b> Chiclayo, Lambayeque.</b><br>

</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: $nombres <$email>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
//$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 
$headers .= "Bcc: jopedis85@gmail.com,ramiro.info@gmail.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers) 


/*fin del cuerpo del mensaje*/
?>
<p>Los datos han sido enviados.<br>Revise su correo, le acabamos de enviar un correo electronico con los pasos a seguir para completar la compra.</p><br><br> <span class="w3-hover-opacity"><b>Nota: Si no esta en su bandeja de correo esta como SPAM y agreguelo como correo seguro</b>  </span>
<p></p>
<center><a href="index.php"><button type="button" class="w3-btn w3-theme-d2 w3-margin-bottom"><i class="fa fa-home"></i>  Click para ver mas</button></a></center>
</div>
				<div class="col-md-12 text-center">
					<ul class="pagination" id="paginador"></ul>
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

