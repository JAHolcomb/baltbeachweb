<?php
//  require_once('recaptchalib.php');   
//  $publickey = "6LfDvM4SAAAAAIyfd_gKOk9Uc5yvHnL7DksJqVvz"; // you got this from the signup page  
    
  
  //Connect to Database
require_once('../database.php');

 $lsql = "SELECT * FROM league WHERE (regactive = 1) ORDER BY [order]";

 $vsql = "SELECT * FROM venue WHERE (v_active = 1) ORDER BY v_order"; 
  
$lres = mssqlquery($lsql);
$vres = mssqlquery($vsql);
  
  //This is for a later time when Summer =registration begins
 $msql = "SELECT * FROM league WHERE (regactive = 1) AND ([session] = 'Summer') ORDER BY l_id";
  
$mres = mssqlquery($msql);

/* 
//##################################################################################
//#                        I M P O R T A N T    N O T E                            #
//##################################################################################
//# NOTICE:  Jim Holcomb is the author and copyright holder of all code contained  #
//#on this page and was written for the exclusive use of Baltimore Beach Volleyball#
//#You are not authorized to alter, copy, edit, or delete this written code for any#
//#use other than Baltimore Beach Volleyball without the author's express written  # 
//#permission. Copyright 1999-2014, Jim Holcomb, all rights reserved.              #
//##################################################################################
// 
*/
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BBV presents the World Series of Beach Volleyball Regional Qualifier Tournament 2014!</title>

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
				shirtcolor: {
					required: "Please select a t-shirt color"
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
</style>
</head>

<body style="background-image: url('bg.jpg')">
<form name="register" id="register" method="post" action="verifywsovb.php">

<table width="1037" height="731" border="0" align="center" cellpadding="0" bordercolor="#000000" bgcolor="#000000">
  <tr>
    <td height="64" colspan="7" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#000000"><div align="center"><img src="wsobv3.jpg" width="804" height="349" /></div></td>
  </tr>
  <tr>
    <td height="64" colspan="7" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#FFCC33"><div align="center">
      <p><span class="style11">ASICS Coed 6's World Series of  Beach Volleyball<br />
        &quot;Qualifier&quot; Tournament Team Registration Form</span></p>
</div></td>
  </tr>
  <tr>
    <td colspan="2" valign="bottom" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#000000"><div align="center" class="style45">
		Team Information</div></td>
    <td width="2" rowspan="19" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#000000"><span class="style2"></span></td>
    <td colspan="4" rowspan="2" valign="bottom" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#000000"><div align="center"><span class="style45">
		Player Information</span></div>      <div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#006666"><p align="center"> <span class="style3"><em> 
      (</em><em>fields marked * are required)</em></span></p></td>
    </tr>
  <tr>
    <td width="159" height="22" align="right" bgcolor="#3E3E3E"><span class="style37">
	*Team Name&nbsp; </span></td>
    <td width="306" bordercolor="#000000" bgcolor="#3E3E3E">
		<input name="teamname" type="text" id="teamname" tabindex="1" size="25" maxlength="50" /></td>
    <td width="74" rowspan="2" bgcolor="#3E3E3E">&nbsp;</td>
    <td width="183" rowspan="2" bgcolor="#3E3E3E">    
      <div align="center" class="style10">Name</div>
    <td width="183" rowspan="2" bgcolor="#3E3E3E"><div align="center" class="style10">
		Email</div></td>
    <td width="114" rowspan="2" bgcolor="#3E3E3E"><div align="center" class="style10"></div>
      <div align="center" class="style10"></div></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#3E3E3E"><span class="style37">*Registering for </span></td>
    <td bgcolor="#3E3E3E" class="style37">Coed 6's Qualifier for ASICS 6's Global Championship Tournament</td>
    </tr>
  <tr>
    <td width="159" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	WHEN:: </span></td>
    <td width="306" bgcolor="#3E3E3E"><span class="style37">Saturday June 14th, 2014</span></td>
    <td width="74" bgcolor="#3E3E3E"><div align="center"><span class="style18">
		Player 1</span></div></td>
    <td width="183" bgcolor="#3E3E3E"><input name="player1_name" type="text" id="player1_name" tabindex="16" size="30" maxlength="50" /></td>
    <td width="183" bgcolor="#3E3E3E"><input name="player1_email" type="text" id="player1_email" tabindex="17" size="30" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span style="width: 10%"></td>
    </tr>
  <tr>
    <td width="159" height="24" align="right" bgcolor="#3E3E3E"><span class="style37">WHO::</span></td>
    <td bgcolor="#3E3E3E" class="style37">Coed teams of 6 to 8 players</td>
    <td bgcolor="#3E3E3E"><div align="center"><span class="style18">Player 2</span></div>
      <span class="style2"></span></td>
    <td bgcolor="#3E3E3E"><span class="style2">
      <input name="player2_name" type="text" id="player2_name" tabindex="20" size="30" maxlength="50" />
    </span></td>
    <td bgcolor="#3E3E3E"><span class="style2">
      <input name="player2_email" type="text" id="player2_email" tabindex="21" size="30" maxlength="40" />
    </span></td>
    <td bgcolor="#3E3E3E"><span class="style2"></span><span></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#3E3E3E"><span class="style37">COST:&nbsp;</span></td>
    <td bgcolor="#3E3E3E" class="style37">$200 per team</td>
    <td align="right" bgcolor="#3E3E3E"><div align="center"><span class="style18">
		Player 3</span></div></td>
    <td align="left" bgcolor="#3E3E3E"><span class="style2">
      <input name="player3_name" type="text" id="player3_name" tabindex="24" size="30" maxlength="50" />
    </span></td>
    <td align="left" bgcolor="#3E3E3E"><span class="style2">
      <input name="player3_email" type="text" id="player3_email" tabindex="25" size="30" maxlength="40" />
    </span></td>
    <td align="left" bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td height="22" align="right" bgcolor="#3E3E3E"><span class="style37">*GRAND PRIZE:</span></td>
    <td bgcolor="#3E3E3E"><span class="style45">$2,000</span><span class="style37"> + travel stipend for the winning team </span></td>
    <td width="74" bgcolor="#3E3E3E"><div align="center"><span class="style18">
	  Player 4</span></div></td>
    <td width="183" bgcolor="#3E3E3E"><span class="style2">
      <input name="player4_name" type="text" id="player4_name" tabindex="28" size="30" maxlength="50" /></span></td>
    <td width="183" bgcolor="#3E3E3E"><input name="player4_email" type="text" id="player4_email" tabindex="29" size="30" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td colspan="2" align="right"><div align="center" class="style45">Captain's 
		Information</div></td>
    <td width="74" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		5</div></td>
    <td width="183" bgcolor="#3E3E3E"><span class="style2">
      <input name="player5_name" type="text" id="player5_name" tabindex="32" size="30" maxlength="50" /></span></td>
    <td width="183" bgcolor="#3E3E3E"><input name="player5_email" type="text" id="player5_email" tabindex="33" size="30" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td width="159" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*First Name&nbsp; </span></td>
    <td width="306" bgcolor="#3E3E3E"><input name="cpt_first" type="text" id="cpt_first" tabindex="6" size="25" maxlength="50" /></td>
    <td width="74" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		6</div></td>
    <td width="183" bgcolor="#3E3E3E"><span class="style2">
      <input name="player6_name" type="text" id="player6_name" tabindex="36" size="30" maxlength="50" /></span></td>
    <td width="183" bgcolor="#3E3E3E"><input name="player6_email" type="text" id="player6_email" tabindex="37" size="30" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td width="159" align="right" bgcolor="#3E3E3E"><span class="style37"> *Last 
	Name&nbsp; </span></td>
    <td width="306" bgcolor="#3E3E3E"><input name="cpt_last" type="text" id="cpt_last" tabindex="7" size="25" maxlength="50" /></td>
    <td width="74" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		7</div></td>
    <td width="183" bgcolor="#3E3E3E"><span class="style2">
      <input name="player7_name" type="text" id="player7_name" tabindex="40" size="30" maxlength="50" /></span></td>
    <td width="183" bgcolor="#3E3E3E"><input name="player7_email" type="text" id="player7_email" tabindex="41" size="30" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td width="159" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*Address&nbsp; </span></td>
    <td width="306" bgcolor="#3E3E3E"><input name="cpt_address" type="text" id="cpt_address" tabindex="8" size="25" maxlength="50" /></td>
    <td width="74" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		8</div></td>
    <td width="183" bgcolor="#3E3E3E"><span class="style2">
      <input name="player8_name" type="text" id="player8_name" tabindex="44" size="30" maxlength="50" /></span></td>
    <td width="183" bgcolor="#3E3E3E"><input name="player8_email" type="text" id="player8_email" tabindex="45" size="30" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td width="159" height="24" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*City&nbsp; </span></td>
    <td width="306" bgcolor="#3E3E3E"><input name="cpt_city" type="text" id="cpt_city" tabindex="9" size="25" maxlength="25" /></td>
    <td width="74" bgcolor="#3E3E3E"><div align="center" class="style18"></div></td>
    <td width="183" bgcolor="#3E3E3E">&nbsp;</td>
    <td width="183" bgcolor="#3E3E3E">&nbsp;</td>
    <td bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td width="159" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*State&nbsp; </span></td>
    <td width="306" bgcolor="#3E3E3E">
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
    <td width="74" bgcolor="#3E3E3E"><div align="center" class="style18"></div></td>
    <td width="183" bgcolor="#3E3E3E">&nbsp;</td>
    <td width="183" bgcolor="#3E3E3E">&nbsp;</td>
    <td bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td width="159" align="right" bgcolor="#3E3E3E"><span class="style37"> *Zip&nbsp; </span></td>
    <td width="306" bgcolor="#3E3E3E"><input name="cpt_zip" type="text" id="cpt_zip" tabindex="11" size="10" maxlength="10" /></td>
    <td bgcolor="#3E3E3E">&nbsp;</td>
    <td bgcolor="#3E3E3E">&nbsp;</td>
    <td bgcolor="#3E3E3E">&nbsp;</td>
    <td bgcolor="#3E3E3E"><span></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#3E3E3E"><span class="style37"> *Phone&nbsp; </span></td>
    <td bgcolor="#3E3E3E"><span class="style22">
      <input name="cpt_phone" type="text" id="cpt_phone" tabindex="12" size="14" maxlength="14" />
    </span></td>
    <td colspan="3" rowspan="4" bgcolor="#000000"><div align="center">
      <input name="Submit" type="submit" tabindex="60" value="Register" />
    </div></td>
    <td rowspan="4" bgcolor="#000000"><div align="center"></div></td>
    </tr>
  <tr>
    <td width="159" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*Email&nbsp; </span></td>
    <td width="306" bgcolor="#3E3E3E"><input name="cpt_email" type="text" id="cpt_email" tabindex="13" size="25" maxlength="40" /></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#3E3E3E">&nbsp;</td>
    <td align="right" bgcolor="#3E3E3E">&nbsp;</td>
    </tr>
 </table>
<br />
<table width="749" border="0" align="center">
  <tr>
    <td width="745"><div align="center"><span class="style38">Copyright � 1999 - 
        <?= date("Y") ?>   
        Baltimore Beach Volleyball Club. All rights reserved.</span><br />
        <span class="style38">Revised:May 11th, 2014</span></div></td>
  </tr>
</table>
</form>
</body>
</html>
<?php mssqlclose(); ?>