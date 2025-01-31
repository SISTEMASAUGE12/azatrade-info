<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Azatrade | Registrate </title>
  
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
								<p class="mb-0">Registrar una nueva cuenta</p>							
							</div>
							<div class="p-40">
								<form method="post">
								
								<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="text" name="tuname" id="tuname" class="form-control ps-15 bg-transparent" placeholder="Nombres">
										</div>
									</div>
									</div>
									<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
											<input type="text" name="tuapellido" id="tuapellido" class="form-control ps-15 bg-transparent" placeholder="Apellidos">
										</div>
									</div>
									</div>
									</div>
									
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
											<input type="email" name="tuemail" id="tuemail" class="form-control ps-15 bg-transparent" placeholder="Correo Electrónico">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="glyphicon glyphicon-phone-alt"></i></span>
											<input type="number" name="tuphone" id="tuphone" class="form-control ps-15 bg-transparent" placeholder="Número Celular">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-location-pin"></i></span>
											<input type="text" name="tuadres" id="tuadres" class="form-control ps-15 bg-transparent" placeholder="Dirección">
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-home"></i></span>
											<input type="text" name="tubusiness" id="tubusiness" class="form-control ps-15 bg-transparent" placeholder="Empresa | Institución">
										</div>
									</div>
									<div class="row">
									<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
											<input type="password" name="tuclave" id="tuclave" class="form-control ps-15 bg-transparent" placeholder="Ingresar clave">
										</div>
									</div>
									</div>
									<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-lock"></i></span>
											<input type="password" name="repiteclave" id="repiteclave" class="form-control ps-15 bg-transparent" placeholder="Repetir clave">
										</div>
									</div>
									</div>
								  </div>
									  <div class="row">
										<div class="col-12">
										  <div class="checkbox">
											<input type="checkbox" id="basic_checkbox_1" name="basic_checkbox_1" >
											<label for="basic_checkbox_1">Estoy de acuerdo con los <a href="#" class="text-info"><b>Terminos y Condiciones</b></a></label>
										  </div>
										</div>
										<!-- /.col -->
										<div id="alert"></div>
										<div class="col-12 text-center">
										  <button type="button" name="btnreg" id="btnreg" class="btn btn-primary margin-top-10">REGISTRARSE</button>
										</div>
										<!-- /.col -->
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
    $('#btnreg').on('click', function (T){ 
		
		var dato1 = $("#tuname")[0].value.length;
      if(dato1 === 0){
        $("input#tuname").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Ingresa tú nombre",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
		var dato2 = $("#tuapellido")[0].value.length;
      if(dato2 === 0){
        $("input#tuapellido").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Ingresa tus apellidos",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
		var dato3 = $("#tuemail")[0].value.length;
      if(dato3 === 0){
        $("input#tuemail").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Ingresa tu correo electronico",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
	var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (regex.test($('#tuemail').val().trim())) {
        //alert('Correo validado');
      }else{
        $("input#tuemail").focus();
		  swal({
      title: 'Correo incorrecto!',
      text: "La direccón de correo electrónico como usuario no es válido, ingresa un correo válido",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
		var dato4 = $("#tuphone")[0].value.length;
      if(dato4 === 0){
        $("input#tuphone").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Ingrese tu numero de celular",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
		var dato5 = $("#tuadres")[0].value.length;
      if(dato5 === 0){
        $("input#tuadres").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Ingrese tu direccion",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
		var dato6 = $("#tubusiness")[0].value.length;
      if(dato6 === 0){
        $("input#tubusiness").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Ingrese Nombre de la Empresa o Institucion",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
		var dato7 = $("#tuclave")[0].value.length;
      if(dato7 === 0){
        $("input#tuclave").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Ingrese la contraseña nueva",
      type: 'error',
      padding: '2em'
    });
        return false;
      }
		
		var dato8 = $("#repiteclave")[0].value.length;
      if(dato8 === 0){
        $("input#repiteclave").focus();
		  swal({
      title: 'Campo Vacio!',
      text: "Vuelva a repetir la contraseña nueva",
      type: 'error',
      padding: '2em'
    });
        return false;
      }

		if(dato7 <= 7){
    $("input#tuclave").focus();
	swal({
            'title': 'Incorrecto',
            'text': 'Por favor ingrese su clave como minimo 8 caracteres, para que su contraseña sea segura ingrese mayusculas, minusculas y numeros',
           type: 'error',
           padding: '2em'
        });
	return false;
}
		
var correo1 = document.getElementById("tuclave").value;
var correo2 = document.getElementById("repiteclave").value;
if(correo1 != correo2){
    $("input#tuclave").focus();
	swal({
            'title': 'Incorrecto',
            'text': 'Las contraseñas ingresados no coinciden, tienen que ser iguales; verificalo nuevamente',
            type: 'error',
           padding: '2em'
        });
	return false;
}
		
		var condiciones = $("#basic_checkbox_1").is(":checked");
        if (!condiciones) {
			swal({
            'title': 'Campo Vacio',
            'text': 'Marcar la opcion de estar de acuerdo con los terminos y condiciones',
            type: 'error',
           padding: '2em'
        });
            return false;
        }
		

      $('#btnreg').attr('disabled', 'disabled');//desabilita boton de envio
      $('#btnreg').val("Procesando envio espere...");//cambia texto de boton
      
      T.preventDefault(); // Evitamos que salte el enlace.
      var paqueteDeDatosRegi = new FormData();
	  paqueteDeDatosRegi.append('tuname', $('#tuname').prop('value'));
      paqueteDeDatosRegi.append('tuapellido', $('#tuapellido').prop('value'));
	  paqueteDeDatosRegi.append('tuemail', $('#tuemail').prop('value'));
      paqueteDeDatosRegi.append('tuphone', $('#tuphone').prop('value'));
	  paqueteDeDatosRegi.append('tuadres', $('#tuadres').prop('value'));
      paqueteDeDatosRegi.append('tubusiness', $('#tubusiness').prop('value'));
	  paqueteDeDatosRegi.append('tuclave', $('#tuclave').prop('value'));
      var destino = "insertregistrouser.php"; 
      $.ajax({
        url:destino,type:'POST',contentType:false,data:paqueteDeDatosRegi,processData:false,cache:false,
        beforeSend:function(){ $("#alert").html("<center><img src='images/loading.gif' width='32px' ></center>"); },
        success:function(data){ $('#alert').html(data); Limpiar(); $('#btnreg').val("Registrarse"); },
        error: function(){ alert("Algo ha fallado."); }
      });
    });

  });
  function Limpiar(){
    $("#tuname").val(""); $("#tuapellido").val(""); $("#tuemail").val(""); $("#tuphone").val(""); $("#tuadres").val(""); $("#tubusiness").val(""); $("#tuclave").val(""); $('#btnreg').prop('disabled', false);
	}
	</script>
</body>
</html>
