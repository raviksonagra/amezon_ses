<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from = "info@jobseen.in"; // verified email address
$mail = new PHPMailer();
$mail->IsSMTP(true); // SMTP
$mail->SMTPAuth   = true;  // SMTP authentication
$mail->Mailer = "smtp";
$mail->Host       = "tls://email-smtp.us-west-2.amazonaws.com"; // Amazon SES server, note "tls://" protocol
$mail->Port       = 465;                    // set the SMTP port
$mail->Username   = "********************";  // SES SMTP  username
$mail->Password   = "******************************";  // SES SMTP password
$mail->SetFrom($from, 'FORM Name');
$mail->AddReplyTo($from,'Technical Support');
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
//$mail->SMTPDebug = 2;
if(!$mail->Send()){
	return false;
}
else{
	return true;
}


}
?>