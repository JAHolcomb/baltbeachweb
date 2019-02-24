<html>
<body>

<?php
require_once('../mail.php');
$message = new Mail();
$message->from = "devtriad@gmail.com";
$message->to = "davtriad@gmail.com";
$message->subject = "Baltimore Beach Juniors Clinic Series and Tournament 2013";
$message->body = "this is a test";
$message->html = true;
$message->send();
?>
</body>
 </html>