<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require("mailer/src/Exception.php");
	require("mailer/src/PHPMailer.php");
	require("mailer/src/SMTP.php");
	require 'conn.php';

	$email = $_POST['email'];

	$sql = " SELECT * FROM trabajadores WHERE email = '$email' ";
	$res = mysqli_query($conn, $sql);

	if ($res)
	{
		if (mysqli_num_rows($res) > 0) 
		{
			$val = mysqli_fetch_assoc($res);
			$id = $val['id_trabajador'];

			enviarMail($email, $id);
		}
		else
		{
			echo 0;
		}
	}
	else
	{
		echo -2;
	}

	function enviarMail($email, $id)
	{
		$mail = new PHPMailer();
		$mail->CharSet = 'UTF-8';

		//s$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Host = 'smtp.gmail.com'; //Nombre de host
		$mail->Username = "tacos.adame2019@gmail.com"; // Correo completo a utilizar
		$mail->Password = "TacosAdame2019"; // Contraseña
		$mail->Port = 587; //Puerto SMTP, 587 para autenticado TLS

		$mail->From = "tacos.adame2019@gmail.com"; // Desde donde enviamos (Para mostrar)
		$mail->FromName = "Tacos Adame";

		$mail->AddAddress($email); // Esta es la dirección a donde enviamos
		// $mail->AddCC("cuenta@dominio.com"); // Copia
		// $mail->AddBCC("cuenta@dominio.com"); // Copia oculta

		$mail->IsHTML(true); // El correo se envía como HTML
		$mail->AddEmbeddedImage("../img/tacos.png", "logo");
		$mail->Subject = "Cambio de contraseña"; // Este es el titulo del email.
		$body = "<div style='text-align: center;'>";
		$body .= "<h1 style='text-align: center;'>Tacos Adame</h1>";
		$body .= "<img src='cid:logo' alt='Logo'><br><br>";
		$body .= "Hola, pulsa este enlace para ir a la página de cambio de contraseña <br>";
		$body .= "<a href='http://tacosadame.distic.com.mx/adame/php/pass.php?id=".urlencode($id)."'>Cambiar contraseña</a><br>";
		$body .= "Si no solicitaste cambio de contraseña, ignora este mensaje.";
		$body .= "</div>";
		$mail->Body = $body;
		$mail->AltBody = "Hola. Cambio de contraseña: ".'http://tacosadame.distic.com.mx/adame/php/pass.php?id=".urlencode($id)'; // Texto sin html
		$exito = $mail->Send();

		if($exito)
		{
			echo 1;
		}
		else
		{
			
			echo -1;

		}
	}
?>