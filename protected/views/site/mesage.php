<?php

$email = 'oscrey.g@gmail.com';
$pass = '53rt4lc0vA';
$message = 'Hello World!';
$myName = htmlspecialchars("Oscar Reyes García", ENT_SUBSTITUTE);
//Yii::app()->mailer->Host = 'smtp.gmail.com:465';

Yii::import('application.extensions.phpmailer.JPhpMailer');

$mail = new JPhpMailer;
$mail->IsSMTP();
//$mail->Host = 'smpt.163.com';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
//$mail->SMTPDebug = 2;
//$mail->Host = 'smtp.gmail.com:587';
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->SMTPAuth = true;
$mail->Username = $email;
$mail->Password = $pass;
$mail->SetFrom($email, 'oscar');
$mail->Subject = 'Alerta';
$mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
$mail->MsgHTML('<h1>Se genero una alerta</h1> <p>Favor de consultar la liga http://cincad.ctfi.com');
$mail->AddAddress('oscar.reyes@civasa.mx', $myName);
$mail->Send();

//Yii::app()->mailer->SMTPAuth = true;
//Yii::app()->mailer->SMTPSecure = "ssl";
//Yii::app()->mailer->Username = $email;
//Yii::app()->mailer->Password = $pass;
//Yii::app()->mailer->SetFrom($email);
//Yii::app()->mailer->Subject = 'PHPMailer Test Subject via smtp, basic with authentication';
//Yii::app()->mailer->AltBody = 'To view the message, please use an HTML compatible email viewer!';
//Yii::app()->mailer->MsgHTML('<h1>JUST A TEST!</h1>');
//Yii::app()->mailer->AddAddress($email, 'My Name');
/*
  Yii::app()->mailer->IsSMTP();
  Yii::app()->mailer->From = 'oscrey.g@gmail.com';
  Yii::app()->mailer->FromName = 'Wei';
  Yii::app()->mailer->AddReplyTo('oscrey.g@gmail.com');
  Yii::app()->mailer->AddAddress('oscar.reyes@civasa.mx');
  Yii::app()->mailer->Subject = 'Yii rulez!';
  Yii::app()->mailer->Body = $message;
 */

//if (!$mail->Send()) {
//    echo "Error al enviar: " . $mail->ErrorInfo;
//} else {
//    echo "Mensaje enviado!";
//}