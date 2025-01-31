<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Azatrade | Recuperar Contraseña </title>
  
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
								<h2 class="text-primary">Comience con nosotros</h2>
								<p class="mb-0">Recueprar cuenta de usuario</p>							
							</div>
							<div class="p-40">
								<form method="post">
								<div id="alert"></div>									
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
											<input type="email" name="emailinput" id="emailinput" class="form-control ps-15 bg-transparent" placeholder="Correo Electrónico">
										</div>
									</div>

									  <div class="row">
										<div class="col-12 text-center">
										  <button type="button" name="btnrecu" id="btnrecu" class="btn btn-primary margin-top-10">Enviar</button>
										</div>
									  </div>
								</form>				
								<div class="text-center">
									<p class="mt-15 mb-0">¿Ya tienes una cuenta?<a href="ingresar" class="ms-5"><b> Iniciar Sesi&oacute;n </b></a></p>
								</div>
							</div>
						</div>
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
    $('#btnrecu').on('click', function (T){ 
		
		var dato1 = $("#emailinput")[0].value.length;
      if(dato1 === 0){
        $("input#emailinput").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Ingresa tú correo electrónico como usuario",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
	var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (regex.test($('#emailinput').val().trim())) {
        //alert('Correo validado');
      }else{
        $("input#emailinput").focus();
		  swal({
      title: 'Correo incorrecto!',
      text: "La direccón de correo electrónico como usuario no es válido, ingresa un correo válido",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
	

      $('#btnrecu').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btnrecu').val("Procesando envio espere...");//cambia texto de boton
      
      T.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
	  paqueteDeDatosRegi.append('emailinput', $('#emailinput').prop('value'));
      var destino = "recuperaenvio.php"; 
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alert").html("<center><img src='images/loading.gif' width='32px' ></center>"); },
        success:function(data){ $('#alert').html(data); Limpiar(); $('#btnrecu').val("Enviar"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });

  });
  function Limpiar(){
    $("#emailinput").val(""); $('#btnrecu').prop('disabled', false);
	}
	</script>	

</body>
</html>
