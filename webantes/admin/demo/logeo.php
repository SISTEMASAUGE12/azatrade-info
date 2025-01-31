<?php
//obtenemos fecha y hora actual
date_default_timezone_set("America/Lima");
$fechahoydia = date("Y-m-d");

if(!empty($_POST)){
	$lincodU = strtoupper($_POST["userazatrade"]);
	$lincodP = $_POST["passazatrade"];
	//echo"$lincodU - $lincodP";
	if(isset($lincodU) &&isset($_POST["passazatrade"])){
		if($lincodU!=""&&$_POST["passazatrade"]!=""){
			include("conector/config.php");
			
			$codaza_id=null;
			$sql1= "select * from usuario where (login_usuario='$lincodU' and password_usuario='$lincodP' and estado='A' and very='1') ";			
$queryv = $conexpg -> prepare($sql1); 
$queryv -> execute(); 
$dfos = $queryv -> fetchAll(PDO::FETCH_OBJ); 
if($queryv -> rowCount() > 0)   { 
foreach($dfos as $rowde) {
		$codaza_id = $rowde -> codusuario;
		$codaza_nombres = $rowde -> nombre;
		$codaza_coreo = $rowde -> mail;
		$codaza_ape = $rowde -> apellido;
		$codaza_movil = $rowde -> celular;
		$codaza_direc = $rowde -> direccion;
		$codaza_perfil = $rowde -> perfil;
		$codaza_nivel = $rowde -> nivel;
		$codaza_rol = $rowde -> rol;
		$codaza_logi = $rowde -> login_usuario;
		
		//consultamos pago de acceso
		$sqlpago = "SELECT id_acceso, id_user, nom_user, nombres, monto, tipo_pago, fecha_pago, modo_pago, num_operacion, observacion, fe_activa, fe_vence, estado, fe_registro
FROM pagos_acceso
WHERE id_user = '".$codaza_id."' AND estado = 'Activo'";				
$queryp = $conexpg -> prepare($sqlpago); 
$queryp -> execute(); 
$dhos = $queryp -> fetchAll(PDO::FETCH_OBJ); 
if($queryp -> rowCount() > 0)   { 
foreach($dhos as $rowpago) {
	
		$codactipago = $rowpago -> id_acceso;
		$useactipago = $rowpago -> id_user;
		$feactiven = $rowpago -> fe_vence;
		$siacce = "SI";
		//actualizamos registro si ya vencio
		if($fechahoydia > $feactiven){
		$updateactua = "UPDATE pagos_acceso SET estado='Vencido' WHERE id_acceso='".$codactipago."' "; 
			$stmt = $conex->prepare($updateactua);
            $stmt->execute();
			$siacce = "NO";
			}
		
	}
}else{
	$siacce = "NO";
}
	//Fin consultamos pago de acceso
	
	}
			}
			if($codaza_id==null){
				echo "<div class='alert alert-danger alert-dismissible'>
							<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							<h4><i class='icon fa fa-info'></i> Acceso Incorrecto</h4>
							Usuario o Contraseña son incorrectos, intentelo nuevamente
						  </div>";
			}else if($siacce=="NO"){
		session_start();
		$_SESSION['codusuazat'] = $codaza_id;
		$_SESSION['nomazat'] = $codaza_nombres;
		$_SESSION['mailazat'] = $codaza_coreo;
		$_SESSION['apeazat'] = $codaza_ape;
		$_SESSION['celazat'] = $codaza_movil;
		$_SESSION['direcazat'] = $codaza_direc;
		$_SESSION['perfilazat'] = $codaza_perfil;
		$_SESSION['nivelazat'] = $codaza_nivel;
		$_SESSION['rolazat'] = $codaza_rol;
		$_SESSION['logusuazat'] = $codaza_logi;
				
				echo "<div class='alert alert-success alert-dismissible'>
							<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							<h4><i class='icon fa fa-check'></i> Acceso Correcto</h4>
							Acceso correcto, un momento lo estamos redireccionando
						  </div>";
				
				print "<script>window.location='planes';</script>";
			}else{
		
				echo "<div class='alert alert-success alert-dismissible'>
							<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
							<h4><i class='icon fa fa-check'></i> Acceso Correcto</h4>
							Acceso correcto, un momento lo estamos redireccionando
						  </div>";
				
		session_start();
		$_SESSION['codusuario'] = $codaza_id;
		$_SESSION['nombreaza'] = $codaza_nombres;
		$_SESSION['mail'] = $codaza_coreo;
		$_SESSION['apellido'] = $codaza_ape;
		$_SESSION['celular'] = $codaza_movil;
		$_SESSION['direccion'] = $codaza_direc;
		$_SESSION['perfil'] = $codaza_perfil;
		$_SESSION['nivel'] = $codaza_nivel;
		$_SESSION['rol'] = $codaza_rol;
		$_SESSION['login_usuario'] = $codaza_logi;
		$_SESSION['acceso_pago'] = $siacce;
				
				/*obtenermos ip*/
				if($_SERVER["HTTP_X_FORWARDED_FOR"]) {
                 // El usuario navega a través de un proxy
                  $ip_proxy = $_SERVER["REMOTE_ADDR"]; // ip proxy
                  $ip_maquina = $_SERVER["HTTP_X_FORWARDED_FOR"]; // ip de la maquina
                 } else {
                 $ip_maquina = $_SERVER["REMOTE_ADDR"]; // No se navega por proxy
                 }
				
				//registramos datos de acceso si es diferente a administrador
				if($codaza_rol<>'Admin'){
					$G = date("G");
		            $date = date("Y-m-d")." ".date("$G:i:s");
                   $sqlii="insert into gente_online(codusuario,gen_onl_ip,gen_onl_dia) values($codaza_id,'$ip_maquina','$date')";
					$stmt = $conexpg->prepare($Sql);
                    $stmt->execute();
				}

				
				print "<script>window.location='panel';</script>";	


			}
		}
	}
}

$conexpg = null;//cierra conexion 

?>