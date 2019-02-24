<?php
$ipi = getenv("REMOTE_ADDR");
$httprefi = getenv ("HTTP_REFERER");
$httpagenti = getenv ("HTTP_USER_AGENT");

//Type in the email address you want in the emailarray below.
//This will create a drop down box with those emails.
//I am working on created a script that is configurable
//and will have different display name than the email address
//That script is working on my site, however configuring it
//isn't as easy as the configuration on this script.

$emailarray=array('EMAILADDRESS1', 'EMAILADDRESS2', 'EMAILADDRESS3');

//Subject is much easier.  You just need to put the available 
//subjects in this.  You can put as many as you want

$subarray=array('subject1', 'subject2', 'subject3');

echo"<form name=\"ct_email.php\" method=\"POST\" action=\"ct_email_send.php\">
<table border=\"0\" cellpadding=\"0\" cellspacing=\"5\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"450\" id=\"AutoNumber1\">
  <tr>
  </tr>
  <tr>
    <td width=\"111\"><b><font face=\"Arial\" size=\"2\">Email To:</font></b></td>
    <td width=\"217\"><select size=\"1\" name=\"email_to\">";

	global $emailarray;
	foreach ($emailarray as $emailval) 
	{
           echo "<option>$emailval</option>";
	}

    echo "</select></td>
    <td width=\"112\"> </td>
  </tr>
  <tr>
    <td width=\"111\"><b><font face=\"Arial\" size=\"2\">Subject:</font></b></td>
    <td width=\"217\"><select size=\"1\" name=\"subject\">";

    global $subarray;
	foreach ($subarray as $subval) 
	{
           echo "<option>$subval</option>";
	}

    echo "</select></td>
    <td width=\"112\"> </td>
  </tr>
  <tr>
    <td width=\"111\"><font face=\"Arial\" size=\"2\"><b>First Name:</b></font></td>
    <td width=\"217\"><input type=\"text\" name=\"fname\" size=\"25\" tabindex=\"1\"></td>
    <td width=\"112\" align=\"left\">
    <input type=\"submit\" value=\"Submit\" name=\"submit\" tabindex=\"5\"></td>
  </tr>
  <tr>
    <td width=\"111\"><font face=\"Arial\" size=\"2\"><b>Last Name:</b></font></td>
    <td width=\"217\"><input type=\"text\" name=\"lname\" size=\"25\" tabindex=\"2\"></td>
    <td width=\"112\" align=\"left\">
    <input type=\"reset\" value=\"Reset\" name=\"reset\" tabindex=\"6\"></td>
  </tr>
  <tr>
    <td width=\"111\"><font face=\"Arial\" size=\"2\"><b>Email Address:</b></font></td>
    <td width=\"217\"><input type=\"text\" name=\"email\" size=\"25\" tabindex=\"3\"></td>
    <td width=\"112\"> </td>
  </tr>
  <tr>
    <td width=\"111\" valign=\"top\"><font face=\"Arial\" size=\"2\"><b>Message:</b></font></td>
    <td width=\"305\" colspan=\"2\">
    <textarea rows=\"3\" name=\"message\" cols=\"35\" tabindex=\"4\"></textarea></td>
  </tr>
</table>
</form>
";

?>