<?php
require '../PHPMailerAutoload.php';
require_once('../phpmailer.php');
$mail = new PHPMailer;
$mail->From = 'jim@baltimorebeach.com';
$mail->FromName = 'Jim Holcomb';
$mail->addAddress('JimHolcombJr@verizon.net', 'Jim Holcomb');
$mail->addReplyTo('jim@baltimorebeach.com', 'Jim Holcomb');
$mail->WordWrap = 50;
$mail->isHTML(true);
$mail->Subject = 'Jims Test Using PHPMailer';
$mail->Body    = 'Hi $row[name],
<br><br>
A request was made to change your Baltimore beach volleyball free agent registration information.
<br>
<br>
If you want to update your registration information click on this link:
<a href="http://www.baltimorebeach.com/FreeAgents/registerfreeagent.php?email=$email&check=$check">
http://www.baltimorebeach.com/FreeAgents/registerfreeagent.php?email=$email&amp;check=$check</a><br>
<br>
To remove your name from the Free Agent page simply deselect all the checkboxes when you update your information.
';
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
echo 'Message has been sent';