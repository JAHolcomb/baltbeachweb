<?php
$myemail=$_POST['email_to']; 
$visemail=$_POST['email'];
$visfirst=$_POST['fname'];
$vislast=$_POST ['lname'];
$vismess=$_POST['message'];
$required=array('email_to', 'email', 'fname', 'lname', 'message');
$visitor="$visfirst $vislast";

function checkEmail()
{
	if (!eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$", $_POST['email'])) 
	{
		return "<b>".$_POST['email']."</b> is an Invalid email address.";
	}
	else
	{
		return "";
	}
}

function checkRequired()
{
	global $required;
	foreach ($required as $value) 
	{
		if($_POST[$value]=="")
		{
			if(!$rtn)
			{
				$rtn=$value;
			}
			else
			{
				$rtn="$rtn, $value";
				$s="s";
			}
		}
	}
	if($rtn) $rtn = "You must enter values for the following field$s:<b> $rtn</b>";
	return $rtn;
}

if($_POST['email'])
{
	$emailError = checkEmail();
}
if($required)
{
	$requiredError = checkRequired();
}

if($emailError)
{
	$sentmessage = $emailError;
}

if($requiredError)
{
	$error = $requiredError;
	if($error!="")
	{
		$sentmessage = $error;
	}
}

if($emailError || $requiredError)
{
	$sentmessage = $sentmessage."<br>Go <a href='javascript:history.back(1)'>back</a> to form.";
}
else
{

$todayis = date("l, F j, Y, g:i a") ;

if($_POST['subject'])
{
    $emsubject=$_POST['subject'];
}
else
{
    $emsubject = "Corps Technologies Website Mail" ;
}

$message = " $todayis [EST] \n
Message: $vismess \n 
From: $visitor ($visemail)\n
";
$from = "From: corpstech@corpstechnologies.com\r\n";

mail($myemail, $subject, $message, $from);

       $sentmessage = "<table border=\"0\" cellpadding=\"0\" cellspacing=\"5\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"450\" id=\"AutoNumber1\">
  <tr>
    <td width=\"123\"><b><font face=\"Arial\" size=\"2\">To:</font></b></td>
    <td width=\"322\">$myemail</td>
  </tr>
  <tr>
    <td width=\"123\"><b><font face=\"Arial\" size=\"2\">From:</font></b></td>
    <td width=\"322\">$visitor ($visemail)</td>
  </tr>
  <tr>
    <td width=\"123\"><b><font face=\"Arial\" size=\"2\">Subject:</font></b></td>
    <td width=\"322\">$emsubject</td>
  </tr>
  <tr>
    <td width=\"123\"><font face=\"Arial\" size=\"2\"><b>Date:</b></font></td>
    <td width=\"322\">$todayis</td>
  </tr>
  <tr>
    <td width=\"123\"><font face=\"Arial\" size=\"2\"><b>Message:</b></font></td>
    <td width=\"322\">$vismess</td>
  </tr>
  </table>
";
}

echo "$sentmessage";

?>