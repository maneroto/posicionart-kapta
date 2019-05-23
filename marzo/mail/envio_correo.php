<?php
	$captcha_response = htmlspecialchars($_POST['g-recaptcha-response']);
	$recaptcha_site_secret = '6LcsJZoUAAAAAA3XT4WMMaWB5qfSErPspB2FVjgZ';
	$captcha_verify_url = "https://www.google.com/recaptcha/api/siteverify";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,$captcha_verify_url);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, "secret=".$recaptcha_site_secret."&response=".$captcha_response);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	
	$captcha_output = curl_exec ($curl);
	curl_close ($curl);
	$decoded_captcha = json_decode($captcha_output);
	$captcha_status = $decoded_captcha->success;

	$response = "";
	if($captcha_status === FALSE){
		$response = "captcha";
	}else{
		$nombre = $_POST["nombre"];
		$correo = $_POST["email"];
		$institucion = $_POST["institucion"];
        $sitio_web = $_POST["sitioweb"];

		$niveles = [];
		if(is_array($_POST['niveles'])) {
            foreach($_POST['niveles'] as $value){
                array_push($niveles, $value);
            }
        } else {
            $niveles = [$_POST['niveles']];
        }
		include_once('class.phpmailer.php');
		include_once('class.smtp.php');
		$subject = "Formulario Mailing";
		$contenido = "";
		$nivelesStr = "";
		if($nombre != '' && $correo != '' && $sitio_web != '' && $institucion != '' && count($niveles) > 0){
			for ($i=0; $i < count($niveles); $i++) { 
				$nivelesStr .= $niveles[$i].", ";
			}
			$contenido .= "<p style='color: #ff3562; font-family: Arial;'>La siguiente persona lleno el formulario de Mailing</p>";
			$contenido .= "<p style='color: #666666; font-family: Arial;'>Nombre: ".$nombre."</p>";
			$contenido .= "<p style='color: #666666; font-family: Arial;'>Correo eletrónico: ".$correo."</p>";
			$contenido .= "<p style='color: #666666; font-family: Arial;'>Institución: ".$institucion."</p>";
			$contenido .= "<p style='color: #666666; font-family: Arial;'>Sitio Web: ".$sitio_web."</p>";
			$contenido .= "<p style='color: #666666; font-family: Arial;'>Niveles educatinos: ".$nivelesStr."</p>";

			$mail = new PHPMailer();
			$mail->From = "info@kaptacrm.net";
			$mail->FromName = "Formulario Mailing";
			$mail->AddAddress("info@kaptacrm.net");
			$mail->Subject = $subject;
			$mail->Body = $contenido; 
			$mail->MsgHTML($contenido);
			$mail->CharSet = 'UTF-8';
			if($mail->Send()){
				include("../php/conectar_php.php");
				$sql="INSERT INTO tbl_kapta_registros (tipo_medio_contacto, medio_de_contacto, nombre_contacto, correo, nombre_empresa, url, estatus, fecha_registro, servicio_interes, sitio_web) VALUES ('Web','Mailing','".$nombre."','".$correo."','".$institucion."','".$_SERVER['HTTP_REFERER']."','Nuevo','".date('Y-m-d h:i:s')."', '".$nivelesStr."', '".$sitio_web."')";
				if (mysql_query($sql,$dbh)){
					$consulta = mysql_query("SELECT MAX(id_registro) AS id_registro FROM tbl_kapta_registros",$dbh);
					$id = mysql_fetch_array($consulta);
					if(!empty($niveles)){
						foreach($niveles as $selected){
							$nombre_nivel = mysql_query("SELECT id_nivel FROM tbl_kapta_niveles WHERE nombre_nivel = '".$selected."'", $dbh);
							$nombre = mysql_fetch_array($nombre_nivel);
							$insert = "INSERT INTO tbl_kapta_registro_nivel(id_registro, id_nivel, n_campus) VALUES (".$id["id_registro"].", ".$nombre["id_nivel"].", 1)";
							mysql_query($insert,$dbh);
						}
					}
					$response = "ok";
				}else{
					$response = "errorWhileInsertingToDB";
				}
				require("../php/cerrar_php.php");
			}else{
                $response = "mailNotSent";
			}
		}else{
            $response = "formDataIncomplete";
		}
	}
	echo $response;
?>