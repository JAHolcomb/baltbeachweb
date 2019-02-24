<?php
//  require_once('recaptchalib.php');   
//  $publickey = "6LfDvM4SAAAAAIyfd_gKOk9Uc5yvHnL7DksJqVvz"; // you got this from the signup page  
    
  
  //Connect to Database
require_once('../database.php');

 $lsql = "SELECT * FROM league WHERE (session = 'Kahuna') and (l_id > 106 AND l_id < 111) ORDER BY [order]";

 $vsql = "SELECT * FROM venue WHERE (v_active = 3) ORDER BY v_order"; 
  
$lres = mssqlquery($lsql);
$vres = mssqlquery($vsql);
  
  //This is for a later time when Summer =registration begins
 $msql = "SELECT * FROM league WHERE ([session] = 'Kahuna') ORDER BY l_id";
  
$mres = mssqlquery($msql);

/* 
//##################################################################################
//#                        I M P O R T A N T    N O T E                            #
//##################################################################################
//# NOTICE:  Jim Holcomb is the author and copyright holder of all code contained  #
//#on this page and was written for the exclusive use of Baltimore Beach Volleyball#
//#You are not authorized to alter, copy, edit, or delete this written code for any#
//#use other than Baltimore Beach Volleyball without the author's express written  # 
//#permission. Copyright 1999-2015, Jim Holcomb, all rights reserved.              #
//##################################################################################
// 
*/
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Baltimore Beach 2015 "Big Kahuna" Tournament Registration Form</title>

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
.style22 {font-size: 10px}
.style37 {color: #FFCC33; font-size: 14px; }
.style38 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style40 {color: #009999; font-size: 14px; }
.style45 {
	color: #FFCC33;
	font-size: 18px;
	font-family: "Comic Sans MS";
}
.style46 {font-size: 12px}
-->
</style>

<script type="text/javascript">
	$().ready(function () {
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
#register table tr td .style40 em {
	color: #C0C0C0;
}
#register table tr td .style40 em {
	color: #ACACAC;
}
#register table tr td .style3 em {
	color: #919191;
}
</style>
</head>

<body style="background-image: url('bg.jpg')">
<form name="register" id="register" method="post" action="BKverify.php">

<table width="1197" height="731" border="0" align="center" cellpadding="0" bordercolor="#000000" bgcolor="#000000">
  <tr>
    <td height="64" colspan="7" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#000000"><div align="center"><img src="../tournaments/Kahuna/Images/kahuna2.jpg" width="225" height="189" /><img src="kahunaregistration2015_kahuna.jpg" alt="" width="209" height="187" border="0" /><img src="../tournaments/Kahuna/Images/kahuna3.jpg" width="314" height="189" /><img src="kahunaregistration2015_kahuna_0000.jpg" alt="" width="210" height="189" border="0" /><img src="../tournaments/Kahuna/Images/kahuna2.jpg" alt="" width="225" height="189" /></div></td>
  </tr>
  <tr>
    <td height="64" colspan="7" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#FFCC33"><div align="center">
      <p><span class="style11">Baltimore Beach Volleyball 2016 <br />
        &quot;Big Kahuna&quot; Tournament Registration Form</span></p>
</div></td>
  </tr>
  <tr>
    <td colspan="2" valign="bottom" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#000000"><div align="center" class="style45">
		Team Information</div></td>
    <td width="3" rowspan="19" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#000000"><span class="style2"></span></td>
    <td colspan="4" valign="bottom" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#000000"><div align="center"><span class="style45">
		Player Information</span></div></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#006666"><p align="center"> <span class="style3"><em> 
	(</em><em>fields marked * are required)</em></span></p></td>
    <td colspan="4" bgcolor="#990000"><div align="center" class="style15">
		**Note: do not add team captain also as a player or you will be 
		double-billed**</div></td>
  </tr>
  <tr>
    <td width="156" height="22" align="right" bgcolor="#3E3E3E"><span class="style37">
	*Team Name&nbsp; </span></td>
    <td width="326" bordercolor="#000000" bgcolor="#3E3E3E">
		<input name="teamname" type="text" id="teamname" tabindex="1" size="27" maxlength="50" /></td>
    <td width="82" rowspan="2" bgcolor="#3E3E3E">&nbsp;</td>
    <td width="171" rowspan="2" bgcolor="#3E3E3E">    
      <div align="center" class="style10">Name</div>
    <td width="236" rowspan="2" bgcolor="#3E3E3E"><div align="center" class="style10">
		Email</div></td>
    <td width="207" rowspan="2" bgcolor="#3E3E3E"><div align="center" class="style10"></div>
      <div align="center" class="style10"></div></td>
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
    <td width="156" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*League&nbsp; </span></td>
    <td width="326" bgcolor="#3E3E3E">
	<select name="league" id="league" tabindex="2" >
        <option value="" selected="selected">-- Select League --</option>
        <?php  while ($lrow = mssqlfetchassoc($lres))  	 {    ?>
        <option value="<?php echo $lrow['l_id'];?>"><?php echo "$lrow[night] $lrow[session] $lrow[type] $lrow[size]'s $lrow[division]"; ?></option>
        <?php
		 } 
		 ?>
    </select></td>
    <td width="82" bgcolor="#3E3E3E"><div align="center"><span class="style18">
		Player 1</span></div></td>
    <td width="171" bgcolor="#3E3E3E"><input name="player1_name" type="text" id="player1_name" tabindex="16" size="29" maxlength="50" /></td>
    <td width="236" bgcolor="#3E3E3E"><input name="player1_email" type="text" id="player1_email" tabindex="17" size="40" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span style="width: 10%"></td>
    </tr>
  <tr>
    <td height="24" colspan="2" align="center" bgcolor="#3E3E3E"><span class="style37"><span class="style40"><strong>Saturday - *Coed <u>4</u>'s (A,B divisions) 2 women + 2 men </strong></span></span></td>
    <td bgcolor="#3E3E3E"><div align="center"><span class="style18">Player 2</span></div>
      <span class="style2"></span></td>
    <td bgcolor="#3E3E3E"><span class="style2">
      <input name="player2_name" type="text" id="player2_name" tabindex="20" size="29" maxlength="50" />
    </span></td>
    <td bgcolor="#3E3E3E"><span class="style2">
      <input name="player2_email" type="text" id="player2_email" tabindex="21" size="40" maxlength="40" />
    </span></td>
    <td bgcolor="#3E3E3E"><span class="style2"></span><span></td>
    </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#3E3E3E"><span class="style40"><strong>Saturday - *Coed <u>6</u>'s (B,C divisions) 3 women + 3 men</strong></span></td>
    <td align="right" bgcolor="#3E3E3E"><div align="center"><span class="style18">
      Player 3</span></div></td>
    <td align="left" bgcolor="#3E3E3E"><span class="style2">
      <input name="player3_name" type="text" id="player3_name" tabindex="24" size="29" maxlength="50" />
    </span></td>
    <td align="left" bgcolor="#3E3E3E"><span class="style2">
      <input name="player3_email" type="text" id="player3_email" tabindex="25" size="40" maxlength="40" />
    </span></td>
    <td align="left" bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td height="22" colspan="2" align="center" bgcolor="#3E3E3E"><span class="style3"><em>*Equal number of women &amp; men  on court - no exceptions</em></span></td>
    <td width="82" bgcolor="#3E3E3E"><div align="center"><span class="style18">
      Player 4</span></div></td>
    <td width="171" bgcolor="#3E3E3E"><span class="style2">
      <input name="player4_name" type="text" id="player4_name" tabindex="28" size="29" maxlength="50" /></span></td>
    <td width="236" bgcolor="#3E3E3E"><input name="player4_email" type="text" id="player4_email" tabindex="29" size="40" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td colspan="2" align="right"><div align="center" class="style45">Captain's 
		Information</div></td>
    <td width="82" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		5</div></td>
    <td width="171" bgcolor="#3E3E3E"><span class="style2">
      <input name="player5_name" type="text" id="player5_name" tabindex="32" size="29" maxlength="50" /></span></td>
    <td width="236" bgcolor="#3E3E3E"><input name="player5_email" type="text" id="player5_email" tabindex="33" size="40" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td width="156" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*First Name&nbsp; </span></td>
    <td width="326" bgcolor="#3E3E3E"><input name="cpt_first" type="text" id="cpt_first" tabindex="6" size="25" maxlength="50" /></td>
    <td width="82" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		6</div></td>
    <td width="171" bgcolor="#3E3E3E"><span class="style2">
      <input name="player6_name" type="text" id="player6_name" tabindex="36" size="29" maxlength="50" /></span></td>
    <td width="236" bgcolor="#3E3E3E"><input name="player6_email" type="text" id="player6_email" tabindex="37" size="40" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td width="156" align="right" bgcolor="#3E3E3E"><span class="style37"> *Last 
	Name&nbsp; </span></td>
    <td width="326" bgcolor="#3E3E3E"><input name="cpt_last" type="text" id="cpt_last" tabindex="7" size="25" maxlength="50" /></td>
    <td width="82" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		7</div></td>
    <td width="171" bgcolor="#3E3E3E"><span class="style2">
      <input name="player7_name" type="text" id="player7_name" tabindex="40" size="29" maxlength="50" /></span></td>
    <td width="236" bgcolor="#3E3E3E"><input name="player7_email" type="text" id="player7_email" tabindex="41" size="40" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td width="156" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*Address&nbsp; </span></td>
    <td width="326" bgcolor="#3E3E3E"><input name="cpt_address" type="text" id="cpt_address" tabindex="8" size="25" maxlength="50" /></td>
    <td width="82" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		8</div></td>
    <td width="171" bgcolor="#3E3E3E"><span class="style2">
      <input name="player8_name" type="text" id="player8_name" tabindex="44" size="29" maxlength="50" /></span></td>
    <td width="236" bgcolor="#3E3E3E"><input name="player8_email" type="text" id="player8_email" tabindex="45" size="40" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td width="156" height="24" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*City&nbsp; </span></td>
    <td width="326" bgcolor="#3E3E3E"><input name="cpt_city" type="text" id="cpt_city" tabindex="9" size="25" maxlength="25" /></td>
    <td width="82" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		9</div></td>
    <td width="171" bgcolor="#3E3E3E"><span class="style2">
      <input name="player9_name" type="text" id="player9_name" tabindex="48" size="29" maxlength="50" /></span></td>
    <td width="236" bgcolor="#3E3E3E"><input name="player9_email" type="text" id="player9_email" tabindex="49" size="40" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td width="156" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*State&nbsp; </span></td>
    <td width="326" bgcolor="#3E3E3E">
	<select name="cpt_state" id="cpt_state" tabindex="10">
        <option value="" selected="">--Choose State--</option>
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
    <td width="82" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		10</div></td>
    <td width="171" bgcolor="#3E3E3E"><span class="style2">
      <input name="player10_name" type="text" id="player10_name" tabindex="52" size="29" maxlength="50" /></span></td>
    <td width="236" bgcolor="#3E3E3E"><input name="player10_email" type="text" id="player10_email" tabindex="53" size="40" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td width="156" align="right" bgcolor="#3E3E3E"><span class="style37"> *Zip&nbsp; </span></td>
    <td width="326" bgcolor="#3E3E3E"><input name="cpt_zip" type="text" id="cpt_zip" tabindex="11" size="10" maxlength="10" /></td>
    <td bgcolor="#3E3E3E"><div align="center" class="style18">Player 11</div></td>
    <td bgcolor="#3E3E3E"><span class="style2">
      <input name="player11_name" type="text" id="player11_name" tabindex="56" size="29" maxlength="50" />
    </span></td>
    <td bgcolor="#3E3E3E"><input name="player11_email" type="text" id="player11_email" tabindex="57" size="40" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span></td>
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
    </tr>
  <tr>
    <td width="156" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*Email&nbsp; </span></td>
    <td width="326" bgcolor="#3E3E3E"><input name="cpt_email" type="text" id="cpt_email" tabindex="13" size="27" maxlength="40" /></td>
    </tr>

    </table>
<table width="749" border="0" align="center">
  <tr>
    <td width="745"><div align="center"><span class="style38">Copyright © 1999 - 
        <?= date("Y") ?>   
        Baltimore Beach Volleyball Club. All rights reserved.</span><br />
        <span class="style38">Revised: July 29, 2016</span></div></td>
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