<?php   
/*require_once('recaptchalib.php');   
$privatekey = "6LfDvM4SAAAAAL5AUFJ3QrVKiN4WwZ0s4YVtIALx ";
$resp = recaptcha_check_answer ($privatekey,
                            $_SERVER["REMOTE_ADDR"],
							$_POST["recaptcha_challenge_field"],
							$_POST["recaptcha_response_field"]);
if (!$resp->is_valid) {    
	 // What happens when the CAPTCHA was entered incorrectly     
	 die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
	      "(reCAPTCHA said: " . $resp->error . ")");
     } else {    
	  // Your code here to handle a successful verification 
*/
  
    /*
     * Mail Settings
     */
    define ( "MAIL_FROM"    , "leagues@baltimorebeach.com" );
    define ( "MAIL_SUBJECT" , "%s has been registered for VolleyBoo 2018!" );
    
    /*
     * MsSQL queries
     */
    
   
    $strTeamSearch    = "SELECT t_id FROM team WHERE league = '%s' AND teamname='%s'";
    $strLeagueSearch  = "SELECT * FROM league WHERE l_id = %d";
    $strCaptainSearch = "SELECT COUNT(*) FROM captain WHERE username LIKE '%s%%'";
    $strCaptainInsert = "INSERT INTO captain (username,password,firstname,lastname,address,city,state,zip,email,phone) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    $strCaptainID     = "SELECT c_id FROM captain WHERE username = '%s' ORDER BY c_id DESC";
    $strTeamInsert    = "INSERT INTO team (teamname,league,captain,venue,ip) VALUES ('%s','%s','%s','%s','%s')";
    $strTeamID        = "SELECT t_id FROM team WHERE captain = '%s' ORDER BY t_id DESC";
    $strPlayerInsert  = "INSERT INTO player (name,email,team) VALUES ('%s','%s','%s')";
    
    /*
     * If $_POST is undefined, exit.
     */
    if(!isset($_POST)) die("Missing or Invalid Arguments");

    /*
     * Clean $_POST array
     */
    
/*   var_dump($vals);
 print_r ($vals);
  var_dump($_POST);
 print_r ($_POST);
 die;
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

 $intLeagueID = intval($arrPost['league']);
    /*
     * Connect to database
     */
    //$conDB = mssql_connect(MSSQL_SERVER,MSSQL_USER,MSSQL_PASSWORD);
    //mssql_select_db(MSSQL_DATABASE);

    require_once('../../database.php');
    
    /*
     * Check to see if the team name selected is already in use.
     */
    $sqlTeamSearch = sprintf
    (
        $strTeamSearch,
        $arrPost["league"], /* Removing ability to have duplicate team names in different leagues */
        $arrPost["teamname"]
    );
    $resTeamSearch = mssqlquery($sqlTeamSearch);

    /*
     * If the team name is already in use, display the following HTML block
     * and exit
     * #########################################################################
     */
//    if(mssqlnumrows($resTeamSearch) != 0)
	if (mssqlhasrows($resTeamSearch))
    {

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Baltimore Beach Volleyball Presents the 6th Annual VolleyBoo Tournament 2018!</title>
    <link rel="stylesheet" href="dh2styles.css" type="text/css" />
    <style type="text/css">
    <!--
        .style8
        {
            color: #FF0000;
            font-size: 18px;
        }
        .style9 { color: #000000; }
        a:link {
	color: #03F;
}
        a:visited {
	color: #03F;
}
a:hover {
	color: #03F;
}
a:active {
	color: #03F;
}
    -->
    </style>
</head>
  <body>
<h4 align="center"><img src="http://www.baltimorebeach.com/images/oops3.gif" alt="Oops!  Team Name Already In Use" /></h4>
    <h4 align="center" class="style5"><span class="style4">Team name </span><strong><em>
	&quot;<span class="style7 style8"><?php echo $arrPost['teamname']; ?></span>&quot;</em> 
	already taken for this tournament! Please selecet a different name</strong>.</h4>
    <h4 align="center"><p align="center" class="style9">Please press <a href="javascript:history.back()">
Back</a> on your browser and choose a different team name </p></h4>
  </body>
</html>
<?php
       
        mssqlclose();
        exit;
    }
    /*
     * #########################################################################
     */
    
    /*
     * Gather league information
      */
    $intLeagueID = intval($arrPost['league']);
    $sqlLeagueSearch = sprintf
    (
        $strLeagueSearch,
        $intLeagueID
    );

    $resLeagueSearch = mssqlquery($sqlLeagueSearch);
  
  

    //if (mssqlnumrows($resLeagueSearch) == 0) die("Invalid League ID");
    if (!mssqlhasrows($resLeagueSearch)) die("Invalid League ID");

    $arrLeagueSearch = mssqlfetchassoc($resLeagueSearch);
  
    /*
     * Gather captain information
     */
    $strCaptainFirstInitial = substr($arrPost['cpt_first'],0,1);
    $strCaptainLastName = preg_replace("/[^a-zA-Z]/","",$arrPost['cpt_last']);
    $strCaptainName = strtolower($strCaptainFirstInitial.$strCaptainLastName);
	$sqlCaptainSearch = sprintf
    (
        $strCaptainSearch,
        $strCaptainName
    );
    $resCaptainSearch = mssqlquery($sqlCaptainSearch);
 
    /*
     * Create unique captain login and Password
     */
    $strCaptainCount = (mssqlnumrows($resCaptainSearch) > 1)
        ? mssqlnumrows($resCaptainSearch)
        : "" ;
    $strLeagueTypeInitial = substr($arrLeagueSearch['type'],0,1);
    $strCaptainLogin =
        $strCaptainName .
        $strCaptainCount . 
//      $strLeagueTypeInitial .
        $arrLeagueSearch['lshortname'] ;
    $strCaptainPassword = strtolower
    (
        substr($arrPost['cpt_first'],0,1) .
        substr($arrPost['cpt_last'],0,1) .
        substr($arrPost['cpt_phone'],-4)
    );
 
    /*
     * Insert new captain into the database
     */
    $sqlCaptainInsert = sprintf
    (
        $strCaptainInsert,
        $strCaptainLogin,
        $strCaptainPassword,
        $arrPost["cpt_first"],
        $arrPost["cpt_last"],
        $arrPost["cpt_address"],
        $arrPost["cpt_city"],
        $arrPost["cpt_state"],
        $arrPost["cpt_zip"],
        $arrPost["cpt_email"],
        $arrPost["cpt_phone"]
   );
    $resCaptainInsert = mssqlquery($sqlCaptainInsert);
 
    /*
     * Retrieve captain id
     */
    $sqlCaptainID = sprintf($strCaptainID,$strCaptainLogin);
    $resCaptainID = mssqlquery($sqlCaptainID);
    $arrCaptainID = mssqlfetchassoc($resCaptainID);
    $intCaptainID = intval($arrCaptainID['c_id']);
  
    /*
     * Insert new team into the database
     */
	    $intVenueID = 'VolleyBoo';
		$sqlTeamInsert = sprintf
    (
        $strTeamInsert,
        $arrPost["teamname"],
        $intLeagueID,
        $intCaptainID,
        $intVenueID,
        $_SERVER["REMOTE_ADDR"]
    );
    $resTeamInsert = mssqlquery($sqlTeamInsert);

    /*
     * Retrieve team id
     */
    $sqlTeamID = sprintf($strTeamID,$intCaptainID);
    $resTeamID = mssqlquery($sqlTeamID);
    $arrTeamID = mssqlfetchassoc($resTeamID);
    $intTeamID = intval($arrTeamID['t_id']);
  
    /*
     * Loop through all possible players listed and check to see if the name
     * field has at least 2 characters.  If it does, grab the other information
     * and add the player to the database.
     */
    $strPlayers = "";
    $intPlayers = 0;
    $intMembers = ($intLeagueID == 31) ? 6 : 11;
    for ($i = 1; $i <= $intMembers; $i++)
    {
        if (strlen($arrPost['player'.$i.'_name']) > 1)
        {
            $strPlayerName  = $arrPost['player'.$i.'_name'];
            $strPlayerEmail = $arrPost['player'.$i.'_email'];
            $intPlayers++;
        	$sqlPlayerInsert = sprintf
        	(
            	$strPlayerInsert,
            	$strPlayerName,
            	$strPlayerEmail,
            	$intTeamID
            	       	);
        	$resPlayerInsert = mssqlquery($sqlPlayerInsert);
        	$strPlayers .= "$strPlayerName <br />\n";
		}
	}

    /*
     * We're done with the database now
     */
    mssqlclose();
  
    /*
     * Calculate fees
     */
    $intSize = intval($arrLeagueSearch['size']);
    switch($intSize)
    {
		/*
        case 2: 
            $dblBase = 165.00;
			$dbllate = 175.00;
            $intBSize = 2;
			/*
             * Subtracting one for the captain
             
            break;
			*/
        case 4: 
            $dblBase = 120.00;
			//$dbllate = 378.00;
            $intBSize = 3;
			
			/*
             * Subtracting one for the captain
            */
            break;
			
        case 6: 
            $dblBase = 180;
			$intBSize = 5;
			/*
             * Subtracting one for the captain
            */ 
            break;  
			   
                  
//        default: die("Invalid league size");
    };

	
$plyrCount = $intPlayers - $intBSize;

if ($plyrCount<0) $plyrCount = 0;
if ($intSize=4) {$xtraPlyrs = $plyrCount * 30 ;}
else { 
$xtraPlyrs = $plyrCount * 30;
};
$fees = $dblBase + $xtraPlyrs;

//echo "dblBase = $dblBase and PlyrCount = $plyrCount and intPlayers = $intPlayers and intSize = $intSize and xtraPlyrs = $xtraPlyrs";

//    $dblEarlyTeam = $dblBase;
//    $dblEach = $dblEarlyTeam / $intPlayers;
	
//    $dblLateTeam = $dblEarlyTeam * 1.10;
//    $dblLateEach = $dblLateTeam / $intPlayers; 
 

?>
        <div align="center">
    <table border="0" width="36%">
  <tr>
			<td>
<html>
<body bgcolor="#FF9900">
  <div id="container">
    <div id="banner">
      <img border="0" src="volleyboo2.jpg">
      <h3>Team &quot;<?php echo $arrPost["teamname"]; ?>&quot; has been registered for the Baltimore Beach<br> 6th Annual VolleyBoo Tournament - Sunday, October 21st, 2018!</h3>
      <p font face="Comic Sans MS">Thank you for registering with Baltimore Beach, VolleyBoo Tournament 2018!<br />
        <strong>Registration is not considered complete until team fees have been paid.</strong><br />
        Please send one check for team fees, as captain, this responsibility falls to you.</p>
		<p font face="Comic Sans MS"><b><span style="background-color: #FFFF00">
		*</span><span style="font-size: 14.0pt; background-color: #FFFF00">Post 
		party at Little Havana to watch the Ravens vs Saints*</span></b><br /> </font>
      </p>
      <h2><b><u>Team Captain Info:</u></b></h2>
      <p font face="Comic Sans MS">
        <strong>Name</strong>: <?php echo $arrPost["cpt_first"] . " " . $arrPost["cpt_last"]; ?><br />
        <strong>Address</strong>: <?php echo $arrPost["cpt_address"] . " " . $arrPost["cpt_city"] . ", " . $arrPost["cpt_state"] . " " . $arrPost["cpt_zip"]; ?><br />
        <strong>Email</strong>: <?php echo $arrPost["cpt_email"]; ?><br />
        <strong>Login</strong>: <?php echo $strCaptainLogin; ?><br />
        <strong>Password</strong>: <?php echo $strCaptainPassword; ?><br />
        Captain's web page is:
        <a href="http://www.baltimorebeach.com/cp">
		http://www.baltimorebeach.com/cp</a>
      </p>
      <h2><b><u>Team Info:</u></b></h2>
      <p font face="Comic Sans MS">
        <strong>Tournament</strong>: Baltimore Beach "VolleyBoo" Tournament, Sunday October 21st, 2018!  <br>(*registration begins at 11:00am, tournament starts at 12 - noon)<br />
        <strong>Team Name</strong>: <?php echo $arrPost["teamname"]; ?><br />
        <strong>Team Div.</strong>: <?php echo $arrLeagueSearch["lshortname"]; ?><br>
        <strong>No. of Players</strong>: <?php echo $intPlayers; ?><br />
        <strong>Tournament Fees Due</strong>: $<?php echo $fees; ?><br />
        </p>
      <h2><b><u>Players</u></b></h2>
      <p>
   		 <?php echo $strPlayers; ?>
      </p>
      <div align="center">
		<table border="0" width="100%">
			<tr>
				<td>
				<p align="left">
        <span class="style99">Make (one) Tournament registration check payable to</span><strong>:</strong>&nbsp; <span class="style34">
		Baltimore Beach</span><br />
        <span class="style98">*Please enter team name and VolleyBoo Tournament on memo line</span>
      </p>
      <p align="left">
        <u>
        <span class="style99">Send to</span></u><strong>:</strong>&nbsp;
        <span class="style33">Baltimore Beach<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		1317 S. Hanover Street <br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		&nbsp;Baltimore, MD 21230</span>
      </p>
      <p align="left">
        <span class="style33">*** Tournament payments now accepted via PayPal ***</span><br />
      </p>
      			<p align="left">
      <a href="http://www.baltimorebeach.com/registration/VolleyBoo/PayPalVolleyBoo.htm" target="_self"><img src="http://www.baltimorebeach.com/images/paypal.jpg" width="150" height="52" hspace="61" border="0" longdesc="http://www.baltimorebeach.com/images/paypal.jpg"></a><br />
      <img src="http://www.baltimorebeach.com/images/paypal2.jpg" width="148" height="17" hspace="62" vspace="0" longdesc="http://www.baltimorebeach.com/images/paypal2.jpg">
    			</td>
			</tr>
		</table>
		</div>
    </div>
  </body>

		</td>
	</tr>
</table>

</div>

<?php

    $strCaptName = $arrPost["cpt_first"] . " " . $arrPost["cpt_last"];
    $strMailTo = $arrPost["cpt_email"];
	$strMailSubject = sprintf(MAIL_SUBJECT,$arrPost["teamname"]);

    $strMailBody = <<<MAILBODY
******************************************************************************************************************<br>
<strong>Tournament Name</strong>: Baltimore Beach 6th Annual VolleyBoo Tournament on Sunday, October 21st, 2018!<br>
<strong>Tournament Div</strong>: $arrLeagueSearch[night] $arrLeagueSearch[type] $arrLeagueSearch[size] $arrLeagueSearch[division] Division<br>
<strong>Team Name</strong>:  $arrPost[teamname]<br>
<strong>Team Fees</strong>:  $$fees<br><br>
<strong>Captain Name</strong>:  $strCaptName <br><br>

<strong>Players</strong>:  <br>$strPlayers <br><br>
    
+++ <strong><u>Team Captain Login Information</u></strong> +++<br><br>

<strong>Username</strong>: $strCaptainLogin <br>
<strong>Password</strong>: $strCaptainPassword <br><br>

<strong>Captains Page</strong>: <a href="http://www.baltimorebeach.com/cp">http://www.baltimorebeach.com/cp</a> <br><br>

NOTE:  Registration is not considered complete until team fees have been paid.<br>

<strong>*** Post party at Little Havana to watch the Ravens vs Saints ***</strong>
    
******************************************************************************************************************   
MAILBODY;

/*
	$message = new COM('CDO.Message');
	$message->To = $strMailTo;
	$message->From = MAIL_FROM;
	$message->Subject = $strMailSubject;
	$message->HTMLBody = $strMailBody;
	$message->Send();


require_once('../mail.php');

$message = new Mail();
$message->from = MAIL_FROM;
$message->to = $strMailTo;
$message->subject = $strMailSubject;
$message->body = $strMailBody;
$message->html = true;
$message->send();
*/	 
require_once('../../phpmailer.php');
$message = new PHPMailer();
$message->SetFrom(MAIL_FROM, 'Baltimore Beach');
$message->AddAddress($strMailTo);
$message->Subject   = $strMailSubject;
$message->Body      = $strMailBody;
//$message->AddStringAttachment($strMailBody,"email_content"); 
$message->IsHTML(true);
$message->Send();

?>
</html>