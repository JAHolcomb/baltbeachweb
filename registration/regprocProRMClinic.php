<?php   
  // Your code here to handle a successful verification 

    /*
     * MsSQL settings
     */
    define ( "MSSQL_SERVER"   , "localhost" );
    define ( "MSSQL_USER"     , "bbpublic" );
    define ( "MSSQL_PASSWORD" , "hdyet65e42" );
    define ( "MSSQL_DATABASE" , "baltimorebeach" );
    
    /*
     * Mail Settings
     */
    define ( "MAIL_FROM"    , "leagues@baltimorebeach.com" );
    define ( "MAIL_SUBJECT" , "%s has been registered at Baltimore Beach!" );
    
    /*
     * MsSQL queries
     */
    $strNameInsert = "INSERT INTO clinic (skilllevel,first,last,gender,email) VALUES ('%s','%s','%s','%s','%s')";
        
    /*
     * If $_POST is undefined, exit.
     */
    if(!isset($_POST)) die("Missing or Invalid Arguments");

    /*
     * Clean $_POST array
     */
    $arrPost = array();
    foreach ($_POST as $strPostName => $strPostValue)
    {
        if(get_magic_quotes_gpc())
        {
            $strPostValue = stripslashes($strPostValue);
        }
        $strPostValue = str_replace("'","",$strPostValue);
        $arrPost[$strPostName] = $strPostValue;
    }

    /*
     * Connect to database
     */
    //$conDB = mssql_connect(MSSQL_SERVER,MSSQL_USER,MSSQL_PASSWORD);
    //mssql_select_db(MSSQL_DATABASE);
    require_once('../database.php');
    
   
?>
<style type="text/css">
<!--
a:link {
	color: #000000;
}
a:visited {
	color: #000000;
}
body {
	background-image: url(../images/bg.jpg);
}
#banner h3 {
	color: #87CEE2;
}
-->
</style>

<?php

if($_POST)
{
  foreach ($_POST as $k=>$v)
 {
   $t = stripslashes($v);
   $t = str_replace("'",'&prime;',$t);
   
 	//This only pulls the form field that have been sent to this page.  Checkboxes are only processed if they are checked.
	//This method therefore only finds the form fields sent for processing and stores the keys and values separately
	//This only works if the names of the form fields are the same as the column name in the database
   $vals[] = "'$t'";
   $keys[] = strtolower($k);
 }
 
 //These two statements take the arrays and slams it into a comma delimited string
 $values = implode(',',$vals);
 $keys = implode(',',$keys);

  //Connect to Database
  //$conn = mssql_connect ("localhost", "bbpublic", "hdyet65e42") or die ('I cannot connect to the database because: ');
//mssql_select_db("baltimorebeach");
  
  $sql = "INSERT INTO clinic ($keys) VALUES ($values)";
  mssqlquery($sql);
    
  mssqlclose();

?>

 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Clinics with NVL Pros</title>
    <link rel="stylesheet" href="jahstyles.css" type="text/css" />
</head>
<body>
<table width="70%" border="0" align="center" id="wrapper">
  <tr>
    <td align="center"><div id="wrapper" >
<div id="banner">
      <p>      
      <h3>Hello <?php echo $arrPost["first"] . " " . $arrPost["last"]; ?>. Your registration for Ryan Mariano  clinic on August 25<sup>th</sup> has been received.</h3>
  <p font face="Comic Sans MS"><img src="../images/RMarianoend.jpg" alt="Ryan Mariano Clinics" width="722" height="234"></p>
  <p font face="Comic Sans MS">*<u>Registration is not considered complete until clinic fees have been paid</u>.<br />
  </p>
       <p>
        Make registration check payable to Baltimore Beach<br />
        *Please enter &quot;Ryan Mariano Clinic&quot; on memo line</span>
        <br>
Send to: Baltimore Beach<br />
1317 S. Hanover Street <br />
Baltimore, MD  21230
      </p>
      <p> *** Clinic payments now accepted via PayPal ***<br />
      </p>
      <a href="http://www.baltimorebeach.com/PayPalClinic.htm" target="_self"><img src="http://www.baltimorebeach.com/images/paypal.jpg" width="150" height="52" hspace="61" border="0" longdesc="http://www.baltimorebeach.com/images/paypal.jpg"></a><br />
      <img src="http://www.baltimorebeach.com/images/paypal2.jpg" width="148" height="17" hspace="62" vspace="0" longdesc="http://www.baltimorebeach.com/images/paypal2.jpg"><br><br>
Copyright © 1999 - 2011 Baltimore Beach Volleyball Club. All rights reserved.      
</div></td>
  </tr>
</table>
    
</body>
</html>
<?php

    $strMailTo = $arrPost["email"];
	$strMailSubject = sprintf(MAIL_SUBJECT,$arrPost["first"] . " " . $arrPost["last"]);

    $strMailBody = <<<MAILBODY
******************************************************************************<br>
$arrPost[first] $arrPost[last], your <strong>Clinic with Ryan Mariano</strong> registration has been recieved.<br><br>

<strong>Clinic Date: </strong> Thursday, August 25th, 2011<br>
<strong>Clinic Time: </strong> $arrPost[clinictime]<br><br>

<strong>NOTE: </strong> Registration is not considered complete clinic fees have been paid.<br>
    
******************************************************************************   
MAILBODY;

	$message = new COM('CDO.Message');
	$message->To = $strMailTo;
	$message->From = MAIL_FROM;
	$message->Subject = $strMailSubject;
	$message->HTMLBody = $strMailBody;
	$message->Send();
	
   
	  }   
?>