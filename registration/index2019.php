<?php
  
  //Connect to Database
require_once('../database.php');

 $lsql = "SELECT * FROM league WHERE (regactive = 1) ORDER BY [order]";

 $vsql = "SELECT * FROM venue WHERE (v_active = 1) ORDER BY v_order"; 
 
 $tssqlc = "SELECT * FROM TShirt WHERE (tsactive = 1) ORDER BY tsorder";
 $tssql1 = "SELECT * FROM TShirt WHERE (tsactive = 1) ORDER BY tsorder"; 
 $tssql2 = "SELECT * FROM TShirt WHERE (tsactive = 1) ORDER BY tsorder";
 $tssql3 = "SELECT * FROM TShirt WHERE (tsactive = 1) ORDER BY tsorder";
 $tssql4 = "SELECT * FROM TShirt WHERE (tsactive = 1) ORDER BY tsorder";
 $tssql5 = "SELECT * FROM TShirt WHERE (tsactive = 1) ORDER BY tsorder";
 $tssql6 = "SELECT * FROM TShirt WHERE (tsactive = 1) ORDER BY tsorder";
 $tssql7 = "SELECT * FROM TShirt WHERE (tsactive = 1) ORDER BY tsorder";
 $tssql8 = "SELECT * FROM TShirt WHERE (tsactive = 1) ORDER BY tsorder";
 $tssql9 = "SELECT * FROM TShirt WHERE (tsactive = 1) ORDER BY tsorder";
 $tssql10 = "SELECT * FROM TShirt WHERE (tsactive = 1) ORDER BY tsorder";
 $tssql11 = "SELECT * FROM TShirt WHERE (tsactive = 1) ORDER BY tsorder";

 
$rtsql = "SELECT * FROM teams2018 ORDER BY season, lshortname, rteamname"; 
  
$lres = mssqlquery($lsql);
$vres = mssqlquery($vsql); 
$tres1 = mssqlquery($tssql1);
$tresc = mssqlquery($tssql2);
$tres2 = mssqlquery($tssql2);
$tres3 = mssqlquery($tssql3);
$tres4 = mssqlquery($tssql4);
$tres5 = mssqlquery($tssql5);
$tres6 = mssqlquery($tssql6);
$tres7 = mssqlquery($tssql7);
$tres8 = mssqlquery($tssql8);
$tres9 = mssqlquery($tssql9);
$tres10 = mssqlquery($tssql10);
$tres11= mssqlquery($tssql11);
$rres = mssqlquery($rtsql);
  
  //This is for a later time when Summer =registration begins
// $msql = "SELECT * FROM league WHERE (regactive = 1) AND ([session] = 'Summer') ORDER BY l_id";
//  
//$mres = mssqlquery($msql);
//
/* 
//##################################################################################
//#                        I M P O R T A N T    N O T E                            #
//##################################################################################
//# NOTICE:  Jim Holcomb is the author and copyright holder of all code contained  #
//#on this page and was written for the exclusive use of Baltimore Beach Volleyball#
//#You are not authorized to alter, copy, edit, or delete this written code for any#
//#use other than Baltimore Beach Volleyball without the author's express written  # 
//#permission. Copyright 1999-2019, Jim Holcomb, all rights reserved.              #
//##################################################################################
// 
*/
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="expires" content="-1">
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<title>Baltimore Beach 2019 Team Registration Form</title>

<!--
<script type="text/javascript" src="http://subscribers.myipblocker.com/MyIpBlocker?code=LcaBENjdb21jL5MCWFo77w"></script><noscript><meta http-equiv="refresh" content="0;url=www.baltimorebeach.com/blocked.htm" /></noscript>
-->
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>

<script type="text/javascript" language="JavaScript1.2" src="../stmenu.js"></script>

<!--
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script src="http://gd.geobytes.com/Gd?after=-1"></script>
<script  type="text/javascript">
var sLocations="RU,AL,AD,AT,BE,BG,HR,CZ,DK,EE,FO,FI,FR,DE,GI,GR,"+
"GG,VA,HU,IE,IT,JE,LV,LI,LT,LU,MK,MT,IM,MC,NL,NO,PL,PT,RO,SM,SK,SI,ES,SE,CH,UK,YU";
if(typeof(sGeobytesLocationCode)!="undefined")
{
    var sCountryCode=sGeobytesLocationCode.substring(0,2);
    if(sLocations.indexOf(sCountryCode)==0)
    {

          // Visitors from everywhere else would go here
          document.write("<META HTTP-EQUIV='Refresh' CONTENT='0; URL=http://www.baltimorebeach.com/registration/busted.php'>");
    }
}
</script>
-->
<script type="text/javascript">
$(document).ready(function(){    
    //Check if the current URL contains '#'
    if(document.URL.indexOf("#")==-1){
        // Set the URL to whatever it was plus "#".
        url = document.URL+"#";
        location = "#";

        //Reload the page
        location.reload(true);
    }
});
</script>
<style type="text/css">
<!--
.style2 {color: #3E3E3E}
.style3 {
	font-family: "Comic Sans MS";
	font-size: 11px;
	}
.smTeal {
	color: #408080;	
}
body {
	background-color: #FFFFFF;
}
.style10 {font-family: "Comic Sans MS"; font-size: 14px; color: #FFCC33; }
.style11 {
	color: #000;
	font-size: 36px;
}
.style15 {font-size: 13px; color: #FFFFFF; font-family: "Comic Sans MS";}
.style18 {font-family: "Comic Sans MS"; font-size: 12px; color: #FFCC33; }
.style22 {
	font-size: 10px;
	color: #ffcc33;
}
.style37 {color: #FFCC33; font-size: 14px; }
.style38 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style45 {
	color: #FFCC33;
	font-size: 18px;
	font-family: "Comic Sans MS";
}
-->
</style>
<script type="text/javascript">
	$(document).ready(function () {
		// validate registration form on keyup and submit
		$("#register").validate({
			rules: {
				teamname: {
					required: true,
					minlength: 2,
					maxlength: 40
				},
				venue: {
					required: true
				},
				league: {
					required: true
				},
				shirtcolor: {
					required: true
				},
				cpt_email: {
					required: true,
					email: true,
					maxlength: 40
				},
				cpt_first: {
					required: true,
					minlength: 2,
					maxlength: 50
				},
				cpt_last: {
					required: true,
					minlength: 2,
					maxlength: 50
				},
				cpt_address: {
					required: true,
					maxlength: 100
				},
				cpt_city: {
					required: true,
					maxlength: 25
				},
				cpt_state: {
					required: true
				},
				cpt_zip: {
					required: true,
					maxlength: 10,
					number:true
				},
				cpt_phone: {
					required: true,
					maxlength: 14
				},
				cpt_shirtsize: {
					required: true
				}
			},
			messages: {
				teamname: {
					required: "Please enter a team name",
					minlength: "Team name must consist of at least 2 characters",
					maxlength: "Team name must consist of not more than 40 characters"
				},
				league: {
					required: "Please select a league in which to participate"
				},
				venue: {
					required: "Please select what venue you are registering for"
				},
				cpt_email: {
					required: "Please enter an email address",
					email: "Please enter a valid email address",
					maxlength: "E-mail name must consist of not more than 40 characters"
				},
				cpt_first: {
					required: "Please enter the captain's firstname",
					minlength: "Captain's firstname must consist of at least 2 characters",
					maxlength: "Captain's firstname must consist of not more than 50 characters"
				},
				cpt_last: {
					required: "Please enter the captain's lastname",
					minlength: "Team name must consist of at least 2 characters",
					maxlength: "Team name must consist of not more than 50 characters"
				},
				cpt_address: {
					required: "Please enter the captain's address",
					maxlength: "Captain's address name must consist of not more than 100 characters"
				},
				cpt_city: {
					required: "Please enter the captain's city",
					maxlength: "Captain's address name must consist of not more than 25 characters"
				},
				cpt_state: {
					required: "Please select the captain's state"
				},
				cpt_zip: {
					required: "Please enter the captain's zip code",
					maxlength: "Zip code must consist of not more than 10 characters"
				},
				cpt_phone: {
					required: "Please enter the captain's phone number",
					maxlength: "Captain's address name must consist of not more than 14 characters"
				},
				cpt_shirtsize: {
					required: "Please select a shirt size for the captain",
				}
			}
		});
	});
</script>
<style type="text/css">
	label.error {
		font-size: 14px; 
		color:red;
	}
	input.error {
		border:1px solid red;
	}
.grey {
	color: #C0C0C0;
}
smgreen {
	color: #408080;
}
#register table tr td div .style37 {
	color: #FFF;
}
#register table tr td .style37 {
	color: #F2F2F2;
}
#ltGrey {
	color: #C0C0C0;
}
</style>
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>
</head>

<body onload="MM_openBrWindow('teamjerseys2019.htm','Jerseys','toolbar=no,scrollbars=no,width=720,height=600')" style="background-image: url('bg.jpg')">
<form name="register" id="register" method="post" action="verify.php">

<div align="center">
  <table width="1220" height="731" border="0" align="center" cellpadding="0" bordercolor="#000000" bgcolor="#000000">
    <tr>
      <td height="64" colspan="8" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#000000"><div align="center"><img src="../images/bbvlogo9.jpg" width="1124" height="361" /></div></td>
      </tr>
    <tr>
      <td height="64" colspan="8" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#FFCC33"><div align="center">
        <p><span class="style11">Baltimore Beach Volleyball 2019 <br />
          Team Registration Form</span></p>
        </div></td>
      </tr>
    <tr>
      <td colspan="2" valign="bottom" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#000000"><div align="center" class="style45">
        Team Information</div></td>
      <td width="3" rowspan="20" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#000000"><span class="style2"></span></td>
      <td colspan="5" valign="bottom" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#000000"><div align="center"><span class="style45">
        Player Information</span></div></td>
      </tr>
    <tr>
      <td colspan="2" bgcolor="#006666"><p align="center"> <span class="style3"><em> 
        (</em><em>fields marked * are required)</em></span></p></td>
      <td colspan="5" bgcolor="#990000"><div align="center" class="style15">
        **Note: do not add team captain also as a player or you will be 
        double-billed**</div></td>
      </tr>
    <tr>
      <td width="154" height="22" align="right" bgcolor="#3E3E3E"><span class="style37">
        *Team Name&nbsp; </span></td>
      <td width="373" bordercolor="#000000" bgcolor="#3E3E3E">
        <input name="teamname" type="text" id="teamname" tabindex="1" size="27" maxlength="50" /></td>
      <td width="120" rowspan="2" bgcolor="#3E3E3E">&nbsp;</td>
      <td width="138" rowspan="2" bgcolor="#3E3E3E">    
        <div align="center" class="style10">Name</div>
        <td width="150" rowspan="2" bgcolor="#3E3E3E"><div align="center" class="style10">
          Email</div></td>
      <td width="258" rowspan="2" bgcolor="#3E3E3E"><div align="center" class="style10">
        T-Shirt Size </div>
        <div align="center" class="style10"></div></td>
      <td width="6" rowspan="2" bgcolor="#3E3E3E">&nbsp;</td>
      </tr>
    <tr>
      <td align="right" bgcolor="#3E3E3E"><span class="style37">*Registering for </span></td>
      <td bgcolor="#3E3E3E">
        <div align="left">
          <span class="style2">
            <select name="venue" id="venue" tabindex="2" >
              <option value="">-- Make Selection --</option>
              <?php  while ($lrow = mssqlfetchassoc($vres))  	 {    ?>
              <option value="<?php echo $lrow['venue'];?>"><?php echo "$lrow[venue]"; ?></option>
              <?php
		 } 
		 ?>
            </select>
            </span>
        </div></td>
      </tr>
    <tr>
      <td width="154" align="right" bgcolor="#3E3E3E"><span class="style37"> 
        *League&nbsp; </span></td>
      <td width="373" bgcolor="#3E3E3E"><select name="league" id="league" tabindex="2" >
        <option value="" selected="selected">-- Select League --</option>
        <?php  while ($lrow = mssqlfetchassoc($lres))  	 {    ?>
        <option value="<?php echo $lrow['l_id'];?>"><?php echo "$lrow[night] $lrow[session] $lrow[type] $lrow[size]'s $lrow[division]"; ?></option>
        <?php
		 } 
		 ?>
        </select></td>
      <td width="120" bgcolor="#3E3E3E"><div align="center"><span class="style18">
        Player 1</span></div></td>
      <td width="138" bgcolor="#3E3E3E"><input name="player1_name" type="text" id="player1_name" tabindex="16" size="23" maxlength="50" /></td>
      <td width="150" bgcolor="#3E3E3E"><input name="player1_email" type="text" id="player1_email" tabindex="17" size="25" maxlength="40" /></td>
      <td bgcolor="#3E3E3E">
        <select name="player1_shirt" id="player1_shirt" tabindex="18">
          <option value="" selected="selected">-- Select Player 1 Size and Options --</option>
          <?php  while ($lrow = mssqlfetchassoc($tres1))  	 {    ?>
          <option value="<?php echo $lrow['tsdescription'];?>"><?php echo "$lrow[tsdescription]"; ?></option>
          <?php
		 } 
		 ?>
        </select></td>
      <td bgcolor="#3E3E3E">&nbsp;</td>
      </tr>
    <tr>
      <td colspan="2" rowspan="2" align="center" bgcolor="#990000"><span class="style37">*<em>If you are a &quot;Returning Team&quot; captain from the <strong>2018</strong> season, <br />
        select your teamname below, otherwise leave option blank</em></span>. <br />
        <span class="style22"><em><strong>*This does NOT auto-fill your teamname for you</strong></em></span>
        <div align="center"></div></td>
      <td width="120" bgcolor="#3E3E3E"><div align="center"><span class="style18">Player 2</span></div>
        <span class="style2"></span></td>
      <td width="138" bgcolor="#3E3E3E"><span class="style2">
        <input name="player2_name" type="text" id="player2_name" tabindex="20" size="23" maxlength="50" />
        </span></td>
      <td bgcolor="#3E3E3E"><span class="style2">
        <input name="player2_email" type="text" id="player2_email" tabindex="21" size="25" maxlength="40" />
        </span></td>
      <td bgcolor="#3E3E3E"><select name="player2_shirt" id="player2_shirt" tabindex="21">
        <option value="" selected="selected">-- Select Player 2 Size and Options --</option>
        <?php  while ($lrow = mssqlfetchassoc($tres2))  	 {    ?>
        <option value="<?php echo $lrow['tsdescription'];?>"><?php echo "$lrow[tsdescription]"; ?></option>
        <?php
		 } 
		 ?>
        </select></td>
      <td bgcolor="#3E3E3E">&nbsp;</td>
      </tr>
    <tr>
      <td width="120" height="22" align="right" bgcolor="#3E3E3E"><div align="center"><span class="style18">
        Player 3</span></div></td>
      <td width="138" align="left" bgcolor="#3E3E3E"><span class="style2">
        <input name="player3_name" type="text" id="player3_name" tabindex="24" size="23" maxlength="50" />
        </span></td>
      <td align="left" bgcolor="#3E3E3E"><span class="style2">
        <input name="player3_email" type="text" id="player3_email" tabindex="25" size="25" maxlength="40" />
        </span></td>
      <td align="left" bgcolor="#3E3E3E"><select name="player3_shirt" id="player3_shirt" tabindex="24">
        <option value="" selected="selected">-- Select Player 3 Size and Options --</option>
        <?php  while ($lrow = mssqlfetchassoc($tres3))  	 {    ?>
        <option value="<?php echo $lrow['tsdescription'];?>"><?php echo "$lrow[tsdescription]"; ?></option>
        <?php
		 } 
		 ?>
        </select></td>
      <td align="left" bgcolor="#3E3E3E">&nbsp;</td>
      </tr>
    <tr>
      <td height="22" colspan="2" align="right" bgcolor="#3E3E3E"><div align="center">      <div align="center"><span class="style2">
        <select name="rteamname" id="rteamname" tabindex="4" >
          <option value="" selected="selected">-- Select 2018 Returning Team  --</option>
          <?php  while ($lrow = mssqlfetchassoc($rres))  	 {    ?>
          <option value="<?php echo $lrow['rteamname'];?>"><?php echo "$lrow[season] $lrow[lshortname] $lrow[rteamname] ($lrow[captname])"; ?></option>
          <?php
		 } 
		 ?>
        </select>
      </span></div></td>
      <td width="120" bgcolor="#3E3E3E"><div align="center"><span class="style18">
        Player 4</span></div></td>
      <td width="138" bgcolor="#3E3E3E"><span class="style2">
        <input name="player4_name" type="text" id="player4_name" tabindex="28" size="23" maxlength="50" /></span></td>
      <td width="150" bgcolor="#3E3E3E"><input name="player4_email" type="text" id="player4_email" tabindex="29" size="25" maxlength="40" /></td>
      <td bgcolor="#3E3E3E"><select name="player4_shirt" id="player4_shirt" tabindex="27">
        <option value="" selected="selected">-- Select Player 4 Size and Options --</option>
        <?php  while ($lrow = mssqlfetchassoc($tres4))  	 {    ?>
        <option value="<?php echo $lrow['tsdescription'];?>"><?php echo "$lrow[tsdescription]"; ?></option>
        <?php
		 } 
		 ?>
        </select></td>
      <td bgcolor="#3E3E3E">&nbsp;</td>
      </tr>
    <tr>
      <td align="right" bgcolor="#006666" class="style37"><strong>Promo Code</strong>&nbsp; </td>
      <td bgcolor="#006666"><input name="promocode" type="text" id="promocode" tabindex="6" size="25" maxlength="50" /></td>
      <td width="120" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
        5</div></td>
      <td width="138" bgcolor="#3E3E3E"><span class="style2">
        <input name="player5_name" type="text" id="player5_name" tabindex="32" size="23" maxlength="50" />
        </span></td>
      <td width="150" bgcolor="#3E3E3E"><input name="player5_email" type="text" id="player5_email" tabindex="33" size="25" maxlength="40" /></td>
      <td bgcolor="#3E3E3E"><select name="player5_shirt" id="player5_shirt" tabindex="30">
        <option value="" selected="selected">-- Select Player 5 Size and Options --</option>
        <?php  while ($lrow = mssqlfetchassoc($tres5))  	 {    ?>
        <option value="<?php echo $lrow['tsdescription'];?>"><?php echo "$lrow[tsdescription]"; ?></option>
        <?php
		 } 
		 ?>
        </select></td>
      <td bgcolor="#3E3E3E">&nbsp;</td>
      </tr>
    <tr>
      <td colspan="2" align="right"><div align="center" class="style45">Captain's 
        Information</div></td>
      <td width="120" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
        6</div></td>
      <td width="138" bgcolor="#3E3E3E"><span class="style2">
        <input name="player6_name" type="text" id="player6_name" tabindex="36" size="23" maxlength="50" />
        </span></td>
      <td width="150" bgcolor="#3E3E3E"><input name="player6_email" type="text" id="player6_email" tabindex="37" size="25" maxlength="40" /></td>
      <td bgcolor="#3E3E3E"><select name="player6_shirt" id="player6_shirt" tabindex="33">
        <option value="" selected="selected">-- Select Player 6 Size and Options --</option>
        <?php  while ($lrow = mssqlfetchassoc($tres6))  	 {    ?>
        <option value="<?php echo $lrow['tsdescription'];?>"><?php echo "$lrow[tsdescription]"; ?></option>
        <?php
		 } 
		 ?>
        </select></td>
      <td bgcolor="#3E3E3E">&nbsp;</td>
      </tr>
    <tr>
      <td width="154" align="right" bgcolor="#3E3E3E"><span class="style37"> 
        *First Name&nbsp; </span></td>
      <td width="373" bgcolor="#3E3E3E"><input name="cpt_first" type="text" id="cpt_first" tabindex="6" size="25" maxlength="50" /></td>
      <td width="120" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
        7</div></td>
      <td width="138" bgcolor="#3E3E3E"><span class="style2">
        <input name="player7_name" type="text" id="player7_name" tabindex="40" size="23" maxlength="50" />
        </span></td>
      <td width="150" bgcolor="#3E3E3E"><input name="player7_email" type="text" id="player7_email" tabindex="41" size="25" maxlength="40" /></td>
      <td bgcolor="#3E3E3E"><select name="player7_shirt" id="player7_shirt" tabindex="36">
        <option value="" selected="selected">-- Select Player 7 Size and Options --</option>
        <?php  while ($lrow = mssqlfetchassoc($tres7))  	 {    ?>
        <option value="<?php echo $lrow['tsdescription'];?>"><?php echo "$lrow[tsdescription]"; ?></option>
        <?php
		 } 
		 ?>
        </select></td>
      <td bgcolor="#3E3E3E">&nbsp;</td>
      </tr>
    <tr>
      <td width="154" align="right" bgcolor="#3E3E3E"><span class="style37"> *Last 
        Name&nbsp; </span></td>
      <td width="373" bgcolor="#3E3E3E"><input name="cpt_last" type="text" id="cpt_last" tabindex="7" size="25" maxlength="50" /></td>
      <td width="120" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
        8</div></td>
      <td width="138" bgcolor="#3E3E3E"><span class="style2">
        <input name="player8_name" type="text" id="player8_name" tabindex="44" size="23" maxlength="50" />
        </span></td>
      <td width="150" bgcolor="#3E3E3E"><input name="player8_email" type="text" id="player8_email" tabindex="45" size="25" maxlength="40" /></td>
      <td bgcolor="#3E3E3E"><select name="player8_shirt" id="player8_shirt" tabindex="42">
        <option value="" selected="selected">-- Select Player 8 Size and Options --</option>
        <?php  while ($lrow = mssqlfetchassoc($tres8))  	 {    ?>
        <option value="<?php echo $lrow['tsdescription'];?>"><?php echo "$lrow[tsdescription]"; ?></option>
        <?php
		 } 
		 ?>
        </select></td>
      <td bgcolor="#3E3E3E">&nbsp;</td>
      </tr>
    <tr>
      <td width="154" align="right" bgcolor="#3E3E3E"><span class="style37"> 
        *Address&nbsp; </span></td>
      <td width="373" bgcolor="#3E3E3E"><input name="cpt_address" type="text" id="cpt_address" tabindex="8" size="25" maxlength="50" /></td>
      <td width="120" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
        9</div></td>
      <td width="138" bgcolor="#3E3E3E"><span class="style2">
        <input name="player9_name" type="text" id="player9_name" tabindex="48" size="23" maxlength="50" />
        </span></td>
      <td width="150" bgcolor="#3E3E3E"><input name="player9_email" type="text" id="player9_email" tabindex="49" size="25" maxlength="40" /></td>
      <td bgcolor="#3E3E3E"><select name="player9_shirt" id="player9_shirt" tabindex="42">
        <option value="" selected="selected">-- Select Player 9 Size and Options --</option>
        <?php  while ($lrow = mssqlfetchassoc($tres9))  	 {    ?>
        <option value="<?php echo $lrow['tsdescription'];?>"><?php echo "$lrow[tsdescription]"; ?></option>
        <?php
		 } 
		 ?>
        </select></td>
      <td bgcolor="#3E3E3E">&nbsp;</td>
      </tr>
    <tr>
      <td width="154" height="24" align="right" bgcolor="#3E3E3E"><span class="style37"> 
        *City&nbsp; </span></td>
      <td width="373" bgcolor="#3E3E3E"><input name="cpt_city" type="text" id="cpt_city" tabindex="9" size="25" maxlength="25" /></td>
      <td width="120" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
        10</div></td>
      <td width="138" bgcolor="#3E3E3E"><span class="style2">
        <input name="player10_name" type="text" id="player10_name" tabindex="52" size="23" maxlength="50" />
        </span></td>
      <td width="150" bgcolor="#3E3E3E"><input name="player10_email" type="text" id="player10_email" tabindex="53" size="25" maxlength="40" /></td>
      <td bgcolor="#3E3E3E"><select name="player10_shirt" id="player10_shirt" tabindex="42">
        <option value="" selected="selected">-- Select Player 10 Size and Options --</option>
        <?php  while ($lrow = mssqlfetchassoc($tres10))  	 {    ?>
        <option value="<?php echo $lrow['tsdescription'];?>"><?php echo "$lrow[tsdescription]"; ?></option>
        <?php
		 } 
		 ?>
        </select></td>
      <td bgcolor="#3E3E3E">&nbsp;</td>
      </tr>
    <tr>
      <td width="154" align="right" bgcolor="#3E3E3E"><span class="style37"> 
        *State&nbsp; </span></td>
      <td width="373" bgcolor="#3E3E3E">
        <select name="cpt_state" id="cpt_state" tabindex="10">
          <option value="" selected="">--Choose State--</option>
          <option value="MD">Maryland</option>
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          <option value="AZ">Arizona</option>
          <option value="AR">Arkansas</option>
          <option value="CA">California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DE">Delaware</option>
          <option value="DC">Dist. of Columbia</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="HI">Hawaii</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="IA">Iowa</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="ME">Maine</option>
          <option value="MD">Maryland</option>
          <option value="MA">Massachusetts</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MS">Mississippi</option>
          <option value="MO">Missouri</option>
          <option value="MT">Montana</option>
          <option value="NE">Nebraska</option>
          <option value="NV">Nevada</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NY">New York</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="SD">South Dakota</option>
          <option value="TN">Tennessee</option>
          <option value="TX">Texas</option>
          <option value="UT">Utah</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virginia</option>
          <option value="WA">Washington</option>
          <option value="WV">West Virginia</option>
          <option value="WI">Wisconsin</option>
          <option value="WY">Wyoming</option>
        </select></td>
      <td width="120" bgcolor="#3E3E3E"><div align="center" class="style18">Player 11</div></td>
      <td width="138" bgcolor="#3E3E3E"><span class="style2">
        <input name="player11_name" type="text" id="player11_name" tabindex="56" size="23" maxlength="50" />
        </span></td>
      <td bgcolor="#3E3E3E"><input name="player11_email" type="text" id="player11_email" tabindex="57" size="25" maxlength="40" /></td>
      <td bgcolor="#3E3E3E"><select name="player11_shirt" id="player11_shirt" tabindex="45">
        <option value="" selected="selected">-- Select Player 11 Size and Options --</option>
        <?php  while ($lrow = mssqlfetchassoc($tres11))  	 {    ?>
        <option value="<?php echo $lrow['tsdescription'];?>"><?php echo "$lrow[tsdescription]"; ?></option>
        <?php
		 } 
		 ?>
        </select></td>
      <td bgcolor="#3E3E3E">&nbsp;</td>
      </tr>
    <tr>
      <td width="154" align="right" bgcolor="#3E3E3E"><span class="style37"> *Zip&nbsp; </span></td>
      <td width="373" bgcolor="#3E3E3E"><input name="cpt_zip" type="text" id="cpt_zip" tabindex="11" size="10" maxlength="10" /></td>
      
      </tr>
    <tr>
      <td align="right" bgcolor="#3E3E3E"><span class="style37"> *Phone&nbsp; </span></td>
      <td bgcolor="#3E3E3E"><span class="style22">
        <input name="cpt_phone" type="text" id="cpt_phone" tabindex="12" size="14" maxlength="14" />
        </span></td>
      <td colspan="3" rowspan="4" bgcolor="#000000"><div align="right">
        <div id="formsubmitbutton">
          <input name="Submit" type="submit" tabindex="60" onclick="ButtonClicked()" value="Register" />
          </div>
        <div id="buttonreplacement" style="margin-left:30px; display:none;">
          <img src="../images/preload.gif" alt="loading...">
          </div>
        </div></td>
      <td rowspan="4" bgcolor="#000000"><div align="center"></div></td>
      <td rowspan="4" bgcolor="#000000">&nbsp;</td>
      </tr>
    <tr>
      <td width="154" align="right" bgcolor="#3E3E3E"><span class="style37"> 
        *Email&nbsp; </span></td>
      <td width="373" bgcolor="#3E3E3E"><input name="cpt_email" type="text" id="cpt_email" tabindex="13" size="27" maxlength="40" /></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#3E3E3E"><span class="style37"> *T-Shirt Size&nbsp; </span></td>
      <td bgcolor="#3E3E3E"><select name="cpt_shirtsize" id="cpt_shirtsize" tabindex="14" >
        <option value="" selected="selected">-- Select Captain Shirt Options --</option>
        <?php  while ($lrow = mssqlfetchassoc($tresc))  	 {    ?>
        <option value="<?php echo $lrow['tsdescription'];?>"><?php echo "$lrow[tsdescription]"; ?></option>
        <?php
		 } 
		 ?>
        </select>     
        <a href="#" onclick="MM_openBrWindow('teamjerseys2019.htm','Jerseys','toolbar=no,scrollbars=no,width=720,height=600')"></a></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#3E3E3E"><a href="#" onclick="MM_openBrWindow('teamjerseys2019.htm','Jerseys','toolbar=no,scrollbars=no,width=720,height=600')"><img src="colors.png" alt="TShirt options" width="25" height="25" /></a></td>
      <td bgcolor="#3E3E3E" class="style18"><a href="#" onclick="MM_openBrWindow('teamjerseys2019.htm','Jerseys','toolbar=no,scrollbars=no,width=720,height=600')"></a> Click icon for a pop-up list of TShirt colors &amp; options</td>
      </tr>  
    <tr>
      <td colspan="2" align="right" bgcolor="#333333"><div align="left"><span class="smTeal" style="font-size: 9pt"><span id="ltGrey">+Returning team captains are given priority only when they are the returning team captain from the same team <strong>and</strong> division from the previous season.</span></span></div></td>
    </table>
</div>
<table width="749" border="0" align="center">
  <tr>
    <td width="745"><div align="center"><span class="style38">Copyright © 1999 - 
        <?= date("Y") ?>   
        Baltimore Beach Volleyball Club. All rights reserved.</span><br />
        <span class="style38">Revised: February 8, 2019</span></div></td>
  </tr>
</table>
</form>
<script type="text/javascript">
function ButtonClicked()
{
   document.getElementById("formsubmitbutton").style.display = "none"; // to undisplay
   document.getElementById("buttonreplacement").style.display = ""; // to display
   return true;
}
var FirstLoading = true;
function RestoreSubmitButton()
{
   if( FirstLoading )
   {
      FirstLoading = false;
      return;
   }
   document.getElementById("formsubmitbutton").style.display = ""; // to display
   document.getElementById("buttonreplacement").style.display = "none"; // to undisplay
}
// To disable restoring submit button, disable or delete next line.
document.onfocus = RestoreSubmitButton;
</script>
</body>
</html>
<?php mssqlclose(); ?>