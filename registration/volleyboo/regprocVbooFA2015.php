<title>Thank you for registering as a Free Agent for the "VolleyBoo" Tournament 2015!</title>
<?php

if($_POST)
{
  foreach ($_POST as $k=>$v)
 {
   $t = stripslashes($v);
   $t = str_replace("'",'&prime;',$t);
   $vals[$k] = $t;
 }
 
 $name = "$vals[first] $vals[last]";
 $ip = $_SERVER["REMOTE_ADDR"];
 
  //Connect to Database
require_once('../../database.php');

  
  $sql = "INSERT INTO VBooFreeAgents (name,email,phone,gender,size,division,ip) VALUES ('$name','$vals[email]','$vals[phone]','$vals[gender]','$vals[league]','$vals[division]','$ip')";
  
  //run captain query
  $runquery = mssqlquery($sql);
  
 
  
  mssqlclose();
//  echo $runquery;
//  $vars = get_defined_vars();
//  print_r($vars);
//  die();
  
  
 
echo "
<div align=\"center\">
	<table width=\"74%\" border=\"0\">
				<td colspan=\"5\">
			<p align=\"center\"><img border=\"0\" src=\"VolleyBoo2.jpg\" width=\"804\" height=\"504\"></td>
	</tr>
		<tr>
			<td width=\"216\">&nbsp;</td>
		  <td align=\"center\" colspan=\"3\">
<strong style=\"font-size: 24px; font-family: 'Hobo Std';\">$name You Have Been Registered as Free Agent!</strong>
<p>

Thank you for registering as a &quot;Free Agent&quot; for the VolleyBoo 2015 tournament.<br>
Please be sure to <a href=\"javascript:window.print()\">print</a> this page for 
your own records.
<br>
</p>
<table width=\"528\" align=\"center\" border=\"0\">
  <tr>
    <td colspan=\"2\" align=right><div align=\"center\"><u><strong style=\"font-size: 24px; font-family: 'Hobo Std';\">
		Free Agent Registration Info:</strong></u></div></td>
    </tr>
  <tr> 
    <td align=right><strong>You Registered For:</strong></td>
    <td width=\"311\" align=left>Coed $vals[league]'s $vals[division] Division ($vals[gender]$vals[league]$vals[division])</td>
  </tr>
  <tr>
    <td align=right><strong>Name Registered as:</strong></td>
    <td align=left>$name</td>
  </tr>
  <tr>
    <td align=right><strong> Registration fees:</strong></td>
    <td align=left>$25 <em>pre-paid</em></td>
  </tr>
  <tr>
    <td align=right>&nbsp;</td>
    <td align=left>$30 <em>walk-up</em></td>
  </tr>
  <tr>
    <td align=right><strong>Your Email Address:</strong></td>
    <td align=left>$vals[email]</td>
  </tr>
  <tr>
    <td align=right><strong> Your Phone Number:</strong></td>
    <td align=left>$vals[phone]</td>
  </tr>
</table></td>
<td width=228>&nbsp;</td>
	</tr>
		<tr>
			<td width=\"216\">&nbsp;</td>
		  <td width=\"28\" align=\"center\">&nbsp;
</td>
		  <td width=\"685\" align=\"center\">
      <div align=\"justify\"><strong>NOTE:</strong> Registering as a &quot;Free Agent&quot; does not guarantee entrance into the tournament. Free Agent teams in the Coed 4's and Coed 6's divisions will be created on a <em>space available</em> basis, based partially on the number of free agents registered  for any one division as well as the space available within that particular division. Reminder that there must be 5 teams   minimum to create any division for this tournament. Pre-registered and paid teams have priority over free agent teams. Baltimore Beach staff will do their very best to place any and all free 
        agents onto free agents teams, yet reserves the right to change or drop any free agent team as deemed necessary.  
      </div>
      <p align=\"left\"><strong>Make checks payable to:</strong>&nbsp; Baltimore Beach Volleyball 

<p align=\"left\"><strong>Send checks to:</strong>&nbsp; Baltimore Beach Volleyball<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
1317 S. Hanover Street   <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
Baltimore, MD 21230</p><hr>
<p style=\"margin-top: 0; margin-bottom: 0\">*** \"VolleyBoo\" Tournament payments 
now accepted via PayPal ***</span><br>
  <a href=\"http://www.baltimorebeach.com/registration/volleyboo/PayPalVolleyBoo.htm\" target=\"_self\">
<img src=\"paypal.jpg\" width=\"150\" height=\"52\" hspace=\"61\" border=\"0\" longdesc=&quot;http:/www.baltimorebeach.com/images/paypal.jpg/&quot;></a><br>
    <img src=\"paypal2.jpg\" width=\"148\" height=\"17\" hspace=\"62\" vspace=\"0\" longdesc=&quot;http:/www.baltimorebeach.com/images/paypal2.jpg/&quot;></p></td>
		  <td width=\"24\" align=\"center\">&nbsp;
</td>
<td width=228>&nbsp;</td>
	</tr>
</table>

</div>

";
}
/* */

?>
<style type="text/css">
body {
	background-image: url(../../images/bg.jpg);
}
</style>
