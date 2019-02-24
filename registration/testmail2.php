<html>
<body>
<html>
<body>


<?php
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