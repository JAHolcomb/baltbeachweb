<?php

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
    $strTeamSearch    = "SELECT t_id FROM team WHERE league = '%s' AND teamname='%s'";
    $strLeagueSearch  = "SELECT * FROM league WHERE l_id = %d";
    $strCaptainSearch = "SELECT COUNT(*) FROM captain WHERE username LIKE '%s%%'";
    $strCaptainInsert = "INSERT INTO captain (username,password,firstname,lastname,address,city,state,zip,email,phone,shirtsize,returningteam,rteamname) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    $strCaptainID     = "SELECT c_id FROM captain WHERE username = '%s' ORDER BY c_id DESC";
    $strTeamInsert    = "INSERT INTO team (teamname,shirtcolor,league,captain,venue,ip) VALUES ('%s','%s','%s','%s','%s','%s')";
    $strTeamID        = "SELECT t_id FROM team WHERE captain = '%s' ORDER BY t_id DESC";
    $strPlayerInsert  = "INSERT INTO player (name,email,team,pshirt) VALUES ('%s','%s','%s','%s')";
    
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

    
    /*
     * Check to see if the team name selected is already in use.
     */
    $sqlTeamSearch = sprintf
    (
        $strTeamSearch,
        $arrPost["league"],
        $arrPost["teamname"]
    );
    $resTeamSearch = mssqlquery($sqlTeamSearch);

    /*
     * If the team name is already in use, display the following HTML block
     * and exit
     * #########################################################################
     */
    if(mssqlnumrows($resTeamSearch) != 0)
    {

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>2011 Team Registration Complete</title>
    <link rel="stylesheet" href="dh2styles.css" type="text/css" />
    <style type="text/css">
    <!--
        .style8
        {
            color: #FF0000;
            font-size: 18px;
        }
        .style9 { color: #000000; }
        a:link { color: #000000; }
        a:visited { color: #000000; }
    -->
    </style>
  </head>
  <body>
<h4 align="center"><img src="http://www.baltimorebeach.com/images/oops3.gif" alt="Oops!  Team Name Already In Use" /></h4>
    <h4 align="center" class="style5"><span class="style4">Team name </span><strong><em>&quot;<span class="style7 style8"><?php echo $arrPost['teamname']; ?></span>&quot;</em> already taken for this league!  Please selecet a different name</strong>.</h4>
    <h4 align="center"><p align="center" class="style9">Please press <a href="javascript:history.back()">Back</a> on your browser and choose a different team name </p></h4>
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
    if (mssqlnumrows($resLeagueSearch) == 0) die("Invalid League ID");
    $arrLeagueSearch = mssqlfetchassoc($resLeagueSearch);
  
    /*
     * Gather captian information
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
    $strCaptainCount = (mssqlnumrows($resCaptainSearch) > 0)
        ? mssqlnumrows($resCaptainSearch)
        : "" ;
    $strLeagueTypeInitial = substr($arrLeagueSearch['type'],0,1);
    $strCaptainLogin =
        $strCaptainName .
    /*  $strCaptainCount . "S" .  */
        $strLeagueTypeInitial .
        $arrLeagueSearch['size'] .
        $arrLeagueSearch['division'];
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
        $arrPost["cpt_phone"],
        $arrPost["cpt_shirtsize"],
        $arrPost["returningteam"],
        $arrPost["rteamname"]
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
    $sqlTeamInsert = sprintf
    (
        $strTeamInsert,
        $arrPost["teamname"],
        $arrPost["shirtcolor"],
        $intLeagueID,
        $intCaptainID,
        $arrPost["venue"],
        $_SERVER["REMOTE_ADDR"]
    );
    $resTeamInsert = mssqlquery($sqlTeamInsert);

    /*
     * Retrieve captain id
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
        if (strlen($arrPost['player'.$i.'_name']) > 2)
        {
            $strPlayerName  = $arrPost['player'.$i.'_name'];
            $strPlayerEmail = $arrPost['player'.$i.'_email'];
            $strPlayerShirt = $arrPost['player'.$i.'_shirt'];
            $intPlayers++;
        	$sqlPlayerInsert = sprintf
        	(
            	$strPlayerInsert,
            	$strPlayerName,
            	$strPlayerEmail,
            	$intTeamID,
            	$strPlayerShirt
        	);
        	$resPlayerInsert = mssqlquery($sqlPlayerInsert);
        	$strPlayers .= "$strPlayerName - $strPlayerShirt<br />\n";
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
        case 2: 
            $dblBase = 150.00;
            $intBSize = 3;
            break;
        case 4: 
            $dblBase = 330.00;
            $intBSize = 6;
            break;
        case 6: 
            $dblBase = 550.00;
            $intBSize = 10;
            break;                        
        default: die("Invalid league size");
    };
 
    $dblEarlyTeam = $dblBase;
    $dblEach = $dblEarlyTeam / $intPlayers;
    $dblLateTeam = $dblEarlyTeam * 1.10;
    $dblLateEach = $dblLateTeam / $intPlayers;
   
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
  "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>2011 Spring Session Team Registration Confirmation</title>
    <link rel="stylesheet" href="jahstyles.css" type="text/css" />
  </head>
  <body>
    <div id="container">
    <div id="banner">
      <img border="0" src="bbeachlogo.jpg">
      <h3>Team <?php echo $arrPost["teamname"]; ?> Registration for "Spring" Leagues 2011!</h3>
      <p font face="Comic Sans MS">Thank you for registering with Baltimore Beach, please
        <strong><a href="javascript:window.print()">PRINT</a></strong> this page
        for your records.<br />
        <strong>Registration is not considered complete until team fees have
        been paid.</strong><br />
        Please send one check for team fees, as captain, this responsibility
        falls to you.<br /><br /> </font>
        To view all other teams that have registered in your league
        <a href="http://www.baltimorebeach.com/summer2011leagueinfo.php?l=$arrLeagueSearch[l_id]">click here</a>
      </p>
      <h2><b><u>Team Captain Info:</u></b></h2>
      <p font face="Comic Sans MS">
        <strong>Name</strong>: <?php echo $arrPost["cpt_first"] . " " . $arrPost["cpt_last"]; ?><br />
        <strong>Address</strong>: <?php echo $arrPost["cpt_address"] . " " . $arrPost["cpt_city"] . ", " . $arrPost["cpt_state"] . " " . $arrPost["cpt_zip"]; ?><br />
        <strong>Email</strong>: <?php echo $arrPost["cpt_email"]; ?><br />
        <strong>Shirt</strong>: <?php echo $arrPost["cpt_shirtsize"]; ?><br />
        <strong>Login</strong>: <?php echo $strCaptainLogin; ?><br />
        <strong>Password</strong>: <?php echo $strCaptainPassword; ?><br />
        Captain's web page is:
        <a href="http://www.baltimorebeach.com/cp">http://www.baltimorebeach.com/cp</a>
      </p>
      <h2><b><u>Team Info:</u></b></h2>
      <p font face="Comic Sans MS">
        <strong>BBV League</strong>: Spring <?php echo $arrLeagueSearch["night"] . " " . $arrLeagueSearch["type"] . " " . $arrLeagueSearch["size"] . " " . $arrLeagueSearch["division"]; ?><br />
        <strong>Team Name</strong>: <?php echo $arrPost["teamname"]; ?><br />
        <strong>T-Shirt Color</strong>: <?php echo $arrPost["shirtcolor"]; ?><br />
        <strong>No. of Players</strong>: <?php echo $intPlayers; ?><br />
        <strong>Team Fees Due</strong>: $<?php echo $dblEarlyTeam; ?><br />
      </p>
      <h2><b><u>Players / Shirt Sizes:</u></b></h2>
      <p>
   		 <?php echo $strPlayers; ?>
      </p>
      <p>
        <span class="style99">Make (one) team registration check payable
        to</span><strong>:</strong>&nbsp; <span class="style34">Baltimore
        Beach</span><br />
        <span class="style98">*Please enter team name, league night &amp;
        division on memo line</span>
      </p>
      <p align="left">
        <span class="style99">Send to</span><strong>:</strong>&nbsp;
        <span class="style33">Baltimore Beach<br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;          1317 S. Hanover Street <br />
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp; &nbsp;&nbsp;Baltimore, MD  21230</span>
      </p>
      <p align="left">
        <span class="style33">*** League payments now accepted via PayPal
        ***</span><br />
      </p>
      <a href="http://www.baltimorebeach.com/PayPal.htm" target="_self"><img src="http://www.baltimorebeach.com/images/paypal.jpg" width="150" height="52" hspace="61" border="0" longdesc="http://www.baltimorebeach.com/images/paypal.jpg"></a><br />
      <img src="http://www.baltimorebeach.com/images/paypal2.jpg" width="148" height="17" hspace="62" vspace="0" longdesc="http://www.baltimorebeach.com/images/paypal2.jpg">
    </div>
  </body>
</html>
<?php

    $strMailTo = $arrPost["cpt_email"];
	$strMailSubject = sprintf(MAIL_SUBJECT,$arrPost["teamname"]);

    $strMailBody = <<<MAILBODY
************************************************************<br>
<strong>Team Name</strong>:  $arrPost[teamname]<br>
<strong>BBV League</strong>: Spring $arrLeagueSearch[night] $arrLeagueSearch[type] $arrLeagueSearch[size] $arrLeagueSearch[division] Division<br>

<strong>Players</strong>:  <br>$strPlayers <br><br>
    
+++ <strong><u>Team Captain Login Information</u></strong> +++<br>

<strong>Usernam</strong>e: $strCaptainLogin <br>
<strong>Password</strong>: $strCaptainPassword <br><br>

<strong>Captains Page</strong>: <a href="http://www.baltimorebeach.com/cp">http://www.baltimorebeach.com/cp</a> <br><br>

NOTE:  Registration is not considered complete until team fees have been paid.
    
************************************************************    
MAILBODY;

	$message = new COM('CDO.Message');
	$message->To = $strMailTo;
	$message->From = MAIL_FROM;
	$message->Subject = $strMailSubject;
	$message->HTMLBody = $strMailBody;
	$message->Send();
	
?>