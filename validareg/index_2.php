<?php
//session_start();

include("../conex/inibd.php");

ini_set("allow_url_fopen", 1);

function curl_get_file_contents($URL)
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents) return $contents;
        else return FALSE;
    }

$web1 = trim($_POST["txtname"]);
 $web2 = $_POST["txtape"];
 $web3 = trim(strtoupper($_POST["txtemail"]));
 $web4  =trim($_POST["txtcelu"]);
 $web5 = $_POST["txtdirec"];
 $web6 = $_POST["txtempre"];
 $web7 = trim($_POST["pasclave"]);
$email = trim($_POST["txtemail"]);


// Google reCAPTCHA API keys settings 
$secretKey  = '6LcR6EIoAAAAAL6osPdZR9pBakZza8A_Mizo6Mhr'; 
 
// Email settings 
$recipientEmail = 'admin@example.com'; 
 
 
// If the form is submitted 
$postData = $statusMsg = ''; 
$status = 'error'; 
if(isset($_POST['submit'])){ 
    $postData = $_POST; 
     
    // Validate form input fields 
    if(!empty($_POST['txtname']) && !empty($_POST['txtape']) && !empty($_POST['txtemail'])){ 
         
        // Validate reCAPTCHA checkbox 
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
 
            // Verify the reCAPTCHA API response 
            //$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
            $verifyResponse = curl_get_file_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
             
            // Decode JSON data of API response 
            $responseData = json_decode($verifyResponse); 
             
            // If the reCAPTCHA API response is valid 
            if($responseData->success){ 
                /* // Retrieve value from the form input fields 
                $name = !empty($_POST['name'])?$_POST['name']:''; 
                $email = !empty($_POST['email'])?$_POST['email']:''; 
                $message = !empty($_POST['message'])?$_POST['message']:''; 
                 
                // Send email notification to the site admin 
                $to = $recipientEmail; 
                $subject = 'New Contact Request Submitted'; 
                $htmlContent = " 
                    <h4>Contact request details</h4> 
                    <p><b>Name: </b>".$name."</p> 
                    <p><b>Email: </b>".$email."</p> 
                    <p><b>Message: </b>".$message."</p> 
                "; 
                 
                // Always set content-type when sending HTML email 
                $headers = "MIME-Version: 1.0" . "\r\n"; 
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
                // More headers 
                $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n"; 
                 
                // Send email 
                mail($to, $subject, $htmlContent, $headers); 
                 
                $status = 'success'; 
                $statusMsg = 'Thank you! Your contact request has been submitted successfully.'; 
                $postData = ''; */
            
 


     // código para procesar los campos y enviar el form
     
//generamos clave de acceso
$caracteres='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$longpalabra=8;
for($pass='', $n=strlen($caracteres)-1; strlen($pass) < $longpalabra ; ) {
  $x = rand(0,$n);
  $pass.= $caracteres[$x];
}
//echo"$pass <br>";

//generamos clave de activacion
$caracteres_acti='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$longpalabra_acti=32;
for($passacti='', $nacti=strlen($caracteres_acti)-1; strlen($passacti) < $longpalabra_acti ; ) {
  $xacti = rand(0,$nacti);
  $passacti.= $caracteres_acti[$xacti];
}
//echo"$passacti";

//consultamos si el correo ingresado existe
$sqlconsu="SELECT login_usuario, password_usuario FROM usuario WHERE login_usuario='$web3'";
$rxtdpt = $conexpg -> prepare($sqlconsu); 
$rxtdpt -> execute(); 
$txxs = $rxtdpt -> fetchAll(PDO::FETCH_OBJ); 
if($rxtdpt -> rowCount() > 0) { 
	foreach($txxs as $dxpx) {
			 //print(Exite al menos un registro);
             $buscaemail = "yes";
		  }
	  }else{
		  //print(No Existen registros);
          $buscaemail = "no";
	  }
/*$resultadoc=pg_query($conexpg,$sqlconsu) or die (pg_last_error());
if (pg_num_rows($resultadoc)==0){
//print(Exite al menos un registro);
$buscaemail = "yes";
}else{
//print(No Existen registros);
$buscaemail = "no";
}*/

//validamos captcha
/*if(isset($_SESSION["num1"]) && isset($_SESSION["num2"]) && isset($_POST["captcha"])){ 
	$resp = $_SESSION["num1"]+$_SESSION["num2"]; 
	$captcha = $_POST["captcha"]; 
	if($resp==$captcha){ 
		//echo "Captcha Correcto"; 
		$valida_captcha = "1";
	}else{ 
		//echo "Captcha Incorrecto";
		$valida_captcha = "0";
	} 
} */

if($web1=="" or $web3=="" or $web4=="" or $web7=="" ){//si estan vacios
	$mesaje = "error";
	header("Location: ../registro?msr=$mesaje");
	exit;
}else if($buscaemail=="yes"){// si ya existe el usuario
	$mesaje = "be";
	header("Location: ../registro?msr=$mesaje");
	exit;
/*}else if($valida_captcha=="0"){
    $mesaje = "error";
	header("Location: ../registro?msr=$mesaje");
	exit;*/
}else{//si no existe registra
	
/*	$sqlinsert="INSERT INTO usuario(nombre, apellido, mail, celular, direccion, empresa, login_usuario, password_usuario, rol, estado, password_ramdon, perfil, fecha, iddistrito, idprovincia, iddepartamento, profesion, nivel, formacion, institucion_laboral, tipo_institucion, cargo, very, keyi)values('$web1', '$web2', '$web3', '$web4', '$web5', '$web6', '$web3', '$web7', 'BASICO', 'A', '', '', now(), '0', '0', '0', '', '', '', '', '', '', '1', '$passacti')";
	$stmt = $conexpg->prepare($sqlinsert);
    $stmt->execute(); */
	
	//enviamos correo
	$destinatario = "$email"; 
//$asunto = "".$web1." Su cuenta fue Creada AZATRADE - BUSINESS INTELLIGENCE"; 
$asunto = "$web1 Su cuenta fue Creada AZATRADE - BUSINESS INTELLIGENCE";
$cuerpo = ' 
<html> 
<head> 
   <title>Acceso Azatrade</title> 
</head> 
<body> 
<h1>Hola '.$web1.'</h1>
Bienvenidos al Sistema Inteligente de AZATRADE<br>
Nombre Completo: '.$web1.' '.$web2.'<br>
Empresa: <b>'.$web6.'</b><br>
Usuario: <b>'.$web3.'</b><br>
Password: <b>'.$web7.'</b><br><br>

<br><br>
<b>ATTE EQUIPO AZATRADE</b>
<br><br>
<font size="1"><b>Aviso:</b>AZATRADE no se responsabiliza si los datos que se te brinda (usuario y clave), los compartes con otros usuarios. Si detectamos que compartiste estos datos, la cuenta se te bloqueara permanentemente sin reclamo alguno por tema de seguridad.</font>
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
//$headers .= "Content-type: text/html; charset=utf-8\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
//dirección del remitente 
//$headers .= "From: Miguel Angel Alvarez <pepito@desarrolloweb.com>\r\n"; 
//$headers .= "From: ".$web1." <".$web3.">\r\n"; 
$headers .= "From: ".$web1." / ". $email.">\r\n"; 
//dirección de respuesta, si queremos que sea distinta que la del remitente 
//$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 

//ruta del mensaje desde origen a destino 
//$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: jopedis85@gmail.com,azatradeinfo@gmail.com\r\n";
//$headers .= "Bcc: azatradeinfo@gmail.com\r\n";
//$headers .= "Bcc: jopedis85@gmail.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers);
	//fin envio correo
//cerrando conexion
	$mesaje = "rs-ok";
	header("Location: ../registro?msr=$mesaje&#azatrade");

}

/*}else{
    $mesaje = "repfail2";
	header("Location: ../registro2?msr=$mesaje&#azatrade");
}*/


}else{ 
                //$statusMsg = 'La verificación del robot falló, inténtalo de nuevo.'; 
                $mesaje = "repfail2";
	header("Location: ../registro2?msr=$mesaje&#azatrade");
            } 
        }else{ 
            //$statusMsg = 'Marque la casilla de verificación reCAPTCHA.'; 
            $mesaje = "repfail";
	header("Location: ../registro2?msr=$mesaje&#azatrade");
        } 
    }else{ 
        //$statusMsg = 'Por favor complete todos los campos obligatorios.'; 
        $mesaje = "error";
	header("Location: ../registro2?msr=$mesaje&#azatrade");
    } 
} 

?>




<?php $conexpg = null;//cierra conexion  ?>
