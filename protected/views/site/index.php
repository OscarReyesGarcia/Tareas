<?php
$message = 'Hello World!';
Yii::app()->mailer->Host = 'smtp.gmail.com';
Yii::app()->mailer->IsSMTP();
Yii::app()->mailer->From = 'oscrey.g@gmail.com';
Yii::app()->mailer->FromName = 'Wei';
Yii::app()->mailer->AddReplyTo('oscrey.g@gmail.com');
Yii::app()->mailer->AddAddress('oscar.reyes@civasa.mx');
Yii::app()->mailer->Subject = 'Yii rulez!';
Yii::app()->mailer->Body = $message;

if(!Yii::app()->mailer->Send()) {
echo "Error al enviar: " . $mail­>ErrorInfo;
} else {
echo "Mensaje enviado!";
}

echo $message;