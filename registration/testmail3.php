<html>
<body>
<html>
<body>


<?php

ini_set ("SMTP","localhost");
ini_set ("sendmail_from","juniors@baltimorebeach.com");

$to      = 'devtriad@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = "From: juniors@baltimorebeach.com\n";

 if (mail($to, $subject, $message, $headers)){
 	echo "success";
 } else
 {
 	echo "failure";
 }
?>


</body>
 </html>