
<?php


if (isset($_POST["email"])) {
	$email = $_POST["email"];
	$email= str_replace("'", "''", $email);
	require_once('../database.php');
	

	$sql="select fa_id,name from freeagents where email='".$email."'";

	$emailSearch = mssqlquery($sql);

	if (!mssqlhasrows($emailSearch))  
	{
		mssqlclose();
		header("Location: http://www.baltimorebeach.com");
		exit();
	}
 

		 
	$row = mssqlfetchassoc($emailSearch);
	mssqlclose();
	$salt=$row["fa_id"].".baltimorebeach.";
	$check=hash('ripemd160', $salt.$email); 
		

$strMailBody = <<<MAILBODY
                                                          
Hi $row[name],
<br><br>
A request was made to change your Baltimore beach volleyball free agent registration information.
<br>
<br>
If you want to update your registration information click on this link:
<a href="http://www.baltimorebeach.com/FreeAgents/registerfreeagent.php?email=$email&check=$check">
http://www.baltimorebeach.com/FreeAgents/registerfreeagent.php?email=$email&amp;check=$check</a><br>
<br>
To remove your name from the Free Agent page simply deselect all the checkboxes when you update your information.

MAILBODY;

//	require_once('../mail.php');
// 	require_once('../phpmailer.php');
/*
	$message = new Mail();
	$message->from = "noreply@baltimorebeach.com";
	$message->to = $email;
	$message->subject = "Baltimore Beach Volleyball Free Agent Registration Update Link";
	$message->body = $strMailBody;
	$message->html = true;
	$message->send();
*/

//$strMailSubject = "Baltimore Beach Volleyball Free Agent Registration Update Link";

require '../PHPMailerAutoload.php';
require_once('../phpmailer.php');
$mail = new PHPMailer;
$mail->From = 'info@baltimorebeach.com';
$mail->FromName = 'Baltimore Beach';
$mail->addAddress($email);
$mail->WordWrap = 50;
$mail->isHTML(true);
$mail->Subject = 'Baltimore Beach Volleyball Free Agent Registration Update Link';
$mail->Body = $strMailBody;
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
echo 'Message has been sent';

}

?>



<html>
<head>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<style type="text/css">
	label.error {
		color:red;
	}
	input.error {
		border:1px solid red;
	}
</style>
<script type="text/javascript">
	$().ready(function () {
		// validate registration form on keyup and submit
		$("#emailform").validate({
			rules: {
				email: {
					required: true,
					email: true
				}
			},
			messages: {
				email: {
					required: "Please enter an email address",
					email: "Please enter a valid email address"
				}
			}
		});
	});
	</script>
</head>
<body>
To update your free agent registration information enter your email to send yourself a baltimorebeach.com url link that will allow you to access your own registration details.
<br>
To remove yourself from the free agent list just deselect all the leagues you have previously selected when updating your information.
<br>
<br>
<?php
if (!isset($_POST["email"])) {
?>
<form id="emailform" action="sendlink2.php" method="post">
	E-Mail: <input type="text" id="email" name="email" value=""/>
	<br>
	<input type="submit" id="sumbit" value="Send">
</form>
<p>
  <?php
} 
else {
echo "E-Mail Sent. "."You will receive an email with the update link at the email address your requested shortly";
}

?>

</p>
</body>
</html>