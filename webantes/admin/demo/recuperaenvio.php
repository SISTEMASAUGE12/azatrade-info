<?php
include("conector/config.php");

 $web3 = trim(strtoupper($_POST["emailinput"]));

//consultamos si el correo ingresado existe
$sqlrec = "SELECT nombre, apellido, empresa, login_usuario, password_usuario FROM usuario WHERE login_usuario='$web3'";	
$rs_rec = $conexpg -> prepare($sqlrec); 
$rs_rec -> execute(); 
$uyos = $rs_rec -> fetchAll(PDO::FETCH_OBJ); 
if($rs_rec -> rowCount() > 0)   { 
foreach($uyos as $fila_rec) {
		      $correoA = strtolower($fila_rec -> login_usuario);
			  $correoB = $fila_rec -> password_usuario;
			  $correoC = $fila_rec -> nombre;
			  $correoD = $fila_rec -> apellido;
			  $validax = "si";
		  }
	  }else{
		 $validax = "no"; 
	  }

//cerrando conexion
$conexpg = null;//cierra conexion 

if($validax=="si"){
	//enviamos correo
	/*$destinatario = "$correoA"; 
$asunto = "".$correoC." Recuperar Clave de Acceso a AZATRADE - BUSINESS INTELLIGENCE"; 
$cuerpo = ' 
<html> 
<head> 
   <title>Azatrade</title> 
</head> 
<body> 
<h1>Hola '.$correoC.'</h1>
Bienvenidos al Sistema Inteligente de AZATRADE<br>
Esta es la solicitud de la clave de acceso a la portada de AZATRADE<br><br<
Nombre Completo: '.$correoC.' '.$correoD.'<br>
Usuario: <b>'.$correoA.'</b><br>
Password: <b>'.$correoB.'</b><br><br>

<br><br>
<b>ATTE EQUIPO AZATRADE</b>
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=utf-8\r\n"; 

//dirección del remitente 
//$headers .= "From: Miguel Angel Alvarez <pepito@desarrolloweb.com>\r\n"; 
$headers .= "From: ".$web1." <".$web3.">\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
//$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: jopedis85@gmail.com,azatradeinfo@gmail.com\r\n";
$headers .= "Bcc: azatradeinfo@gmail.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers);*/
	//fin envio correo
	echo "<div class='alert alert-success alert-dismissible'>
		  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
		  <h4>Se Envio Correctamente</h4>
		  Le acabamos de enviar a su correo $web3 los datos de acceso para que ingrese a nuestra plataforma. El correo debe de llegarle a su bandeja de entrada caso contrario como correo no deseado o SPAM.
		  </div>";
}else{
	echo "<div class='alert alert-danger alert-dismissible'>
		  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
		  <h4>Envio Denegado</h4>
		  El correo ingresado $web3 no existe en nuestra plataforma, verifiquelo he intentelo nuevamente.
		  </div>";
}
$conexpg = null;//cierra conexion 
?>