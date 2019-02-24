<?php
include("Mail.php");
/* mail setup recipients, subject etc */
$recipients = "limitedreality@gmail.com";
$headers["From"] = "jsevier@justinsevier.com";
$headers["To"] = "limitedreality@gmail.com";
$headers["Subject"] = "Test Message";
$mailmsg = "Hello, This is a test.";
/* SMTP server name, port, user/passwd */
$smtpinfo["host"] = "mail.justinsevier.com";
$smtpinfo["port"] = "25";
$smtpinfo["auth"] = true;
$smtpinfo["username"] = "jsevier@justinsevier.com";
$smtpinfo["password"] = "v3ng3nc3";
/* Create the mail object using the Mail::factory method */
$mail_object =& Mail::factory("smtp", $smtpinfo);
/* Ok send mail */
$mail_object->send($recipients, $headers, $mailmsg);
?>