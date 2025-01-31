<?php
session_start();
if (isset($_SESSION['login_usuario'])){
	print "<script>window.location='panel';</script>";
}else{
	if(!isset($_SESSION["login_usuario"]) || $_SESSION["login_usuario"]==null){
	//print "<script>window.location='ingresar';</script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Azatrade | Login </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="dashboard-export/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="dashboard-export/css/style.css">
	<link rel="stylesheet" href="dashboard-export/css/skin_color.css">	

</head>
	
<body class="hold-transition theme-primary bg-img" style="background-image: url(images/bg-1.jpg)">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">	
			
			<div class="col-12">
			<center><a href="./"><img class="img-hov-fadein" src="images/logo_aza.png" width="460px"></a><br><br></center>
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary">Empecemos</h2>
								<p class="mb-0">Ingrese sus datos de acceso para iniciar.</p>							
							</div>
							<div class="p-40">
								<form action="https://warehouse-admin-dashboard.multipurposethemes.com/main/index.html" method="post">
								<div id="alert"></div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="email" name="userazatrade" id="userazatrade" class="form-control ps-15 bg-transparent" placeholder="correo electrónico">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
											<input type="password" name="passazatrade" id="passazatrade" class="form-control ps-15 bg-transparent" placeholder="Contraseña">
										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  <!--<div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>-->
										</div>
										<!-- /.col -->
										<div class="col-6">
										 <div class="fog-pwd text-end">
											<a href="recuperar-clave" class="hover-primary"><i class="ti-lock"></i> Recuperar tu contraseña</a><br>
										  </div>
										</div>
										<!-- /.col -->
										
										<div class="col-12 text-center">
										  <button type="button" name="login" id="login" class="btn btn-primary mt-10">INICIAR SESI&Oacute;N</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>	
								<div class="text-center">
									<p class="mt-15 mb-0">¿No tienes una cuenta? <a href="registrate" class="ms-5"><b>Registrate</b></a></p>
								</div>	
							</div>						
						</div>
						<!--<div class="text-center">
						  <p class="mt-20 text-white">- Sign With -</p>
						  <p class="gap-items-2 mb-20">
							  <a class="btn btn-social-icon btn-round btn-facebook" href="#"><i class="fa fa-facebook"></i></a>
							  <a class="btn btn-social-icon btn-round btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
							  <a class="btn btn-social-icon btn-round btn-instagram" href="#"><i class="fa fa-instagram"></i></a>
							</p>	
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Vendor JS -->
	<script src="dashboard-export/js/vendors.min.js"></script>
    <script src="assets/icons/feather-icons/feather.min.js"></script>	
    <script src="assets/vendor_components/sweetalert/sweetalert.min.js"></script>
    <script src="assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    
    	<script>
	$(function(){
    $('#login').on('click', function (T){ 
		
		var dato1 = $("#userazatrade")[0].value.length;
      if(dato1 === 0){
        $("input#userazatrade").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Ingresa tú correo electrónico como usuario",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
	var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (regex.test($('#userazatrade').val().trim())) {
        //alert('Correo validado');
      }else{
        $("input#userazatrade").focus();
		  swal({
      title: 'Correo incorrecto!',
      text: "La direccón de correo electrónico como usuario no es válido, ingresa un correo válido",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
		var dato2 = $("#passazatrade")[0].value.length;
      if(dato2 === 0){
        $("input#passazatrade").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Ingrese su contraseña",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
	

      $('#login').attr('disabled', 'disabled');//desabilita boton de envio
      $('#login').val("Procesando envio espere...");//cambia texto de boton
      
      T.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
	  paqueteDeDatosRegi.append('userazatrade', $('#userazatrade').prop('value'));
      paqueteDeDatosRegi.append('passazatrade', $('#passazatrade').prop('value'));
      var destino = "logeo.php"; 
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alert").html("<center><img src='images/loading.gif' width='32px' ></center>"); },
        success:function(data){ $('#alert').html(data); Limpiar(); $('#login').val("Ingresar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });

  });
  function Limpiar(){
    $("#userazatrade").val(""); $("#passazatrade").val(""); $('#login').prop('disabled', false);
	}
	</script>
</body>
</html>
