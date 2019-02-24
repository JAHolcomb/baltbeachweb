<html>
<body>
<html>
<body>


<?php

$headers['From'] = "juniors@baltimorebeach.com";
$headers['To'] = "devtriad@gmail.com";
$headers['Subject'] = "test subject";
$params["host"] = "localhost";
$params["port"] = "25";
$params["auth"] = false;
$params["username"] = "username";
$params["password"] = "password";

$body = "this is  the body";

$to="devtriad@gmail.com";
$subject="test";
$message="test";

 
$mail_object =& Mail::factory('smtp', $params);
$mail_object->send($email, $headers, $body);

 ?>

</body>
 </html>

