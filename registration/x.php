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
<title>Baltimore Beach 2014 Team Registration Form</title>

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
<form name="register" id="register" method="post" action="verify.php">

<table width="1076" height="731" border="0" align="center" cellpadding="0" bordercolor="#000000" bgcolor="#000000">
  <tr>
    <td height="64" colspan="7" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#000000"><div align="center"><img src="../images/nufrobbvlogo.jpg" width="702" height="230" /></div></td>
  </tr>
  <tr>
    <td height="64" colspan="7" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#FFCC33"><div align="center">
      <p><span class="style11">Baltimore Beach Volleyball 2014 <br />
        Team Registration Form</span></p>
</div></td>
  </tr>
  <tr>
    <td colspan="2" valign="bottom" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#000000"><div align="center" class="style45">
		Team Information</div></td>
    <td width="4" rowspan="19" bordercolor="#000000" bordercolorlight="#000000" bgcolor="#000000"><span class="style2"></span></td>
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
    <td width="139" height="22" align="right" bgcolor="#3E3E3E"><span class="style37">
	*Team Name&nbsp; </span></td>
    <td width="210" bordercolor="#000000" bgcolor="#3E3E3E">
		<input name="teamname" type="text" id="teamname" tabindex="1" size="25" maxlength="50" /></td>
    <td width="60" rowspan="2" bgcolor="#3E3E3E">&nbsp;</td>
    <td width="150" rowspan="2" bgcolor="#3E3E3E">    
      <div align="center" class="style10">Name</div>
    <td width="176" rowspan="2" bgcolor="#3E3E3E"><div align="center" class="style10">
		Email</div></td>
    <td width="261" rowspan="2" bgcolor="#3E3E3E"><div align="center" class="style10">
		T-Shirt Size </div>
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
    <td width="139" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*League&nbsp; </span></td>
    <td width="210" bgcolor="#3E3E3E">
	<select name="league" id="league" tabindex="2" >
        <option value="">-- Select League --</option>
        <?php  while ($lrow = mssqlfetchassoc($lres))  	 {    ?>
        <option value="<?php echo $lrow['l_id'];?>"><?php echo "$lrow[night] $lrow[type] $lrow[size]'s $lrow[division]"; ?></option>
        <?php
		 } 
		 ?>
    </select></td>
    <td width="60" bgcolor="#3E3E3E"><div align="center"><span class="style18">
		Player 1</span></div></td>
    <td width="150" bgcolor="#3E3E3E"><input name="player1_name" type="text" id="player1_name" tabindex="16" size="20" maxlength="50" /></td>
    <td width="176" bgcolor="#3E3E3E"><input name="player1_email" type="text" id="player1_email" tabindex="17" size="24" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span style="width: 10%">
      <select name="player1_shirt" id="player1_shirt" tabindex="18">
        <option value="-1" >- Select Size and Option -</option>
        <option value="Unisex Small Athletic Orange">Unisex Small - Athletic Orange</option>
		<option value="Unisex Medium Athletic Orange">Unisex Medium - Athletic Orange</option>
		<option value="Unisex Large Athletic Orange">Unisex Large - Athletic Orange</option>
		<option value="Unisex XLarge Athletic Orange">Unisex XLarge - Athletic Orange</option>
		<option value="Unisex 2XLarge  Athletic Orange">Unisex 2XLarge -  Athletic Orange</option>
		<option value="Unisex 3XLarge Athletic Orange">Unisex 3XLarge - Athletic Orange</option>
		<option value="Unisex Small Aquatic Blue">Unisex Small - Aquatic Blue</option>
		<option value="Unisex Medium Aquatic Blue">Unisex Medium - Aquatic Blue</option>
		<option value="Unisex Large Aquatic Blue">Unisex Large - Aquatic Blue</option>
		<option value="Unisex XLarge Aquatic Blue">Unisex XLarge - Aquatic Blue</option>
		<option value="Unisex 2XLarge  Aquatic Blue">Unisex 2XLarge -  Aquatic Blue</option>
		<option value="Unisex 3XLarge Aquatic Blue">Unisex 3XLarge - Aquatic Blue</option>
		<option value="Unisex Small Black">Unisex Small - Black</option>
		<option value="Unisex Medium Black">Unisex Medium - Black</option>
		<option value="Unisex Large Black">Unisex Large - Black</option>
		<option value="Unisex XLarge Black">Unisex XLarge - Black</option>
		<option value="Unisex 2XLarge  Black">Unisex 2XLarge - Black</option>
		<option value="Unisex 3XLarge Black">Unisex 3XLarge - Black</option>
		<option value="Unisex Small Cardinal Red">Unisex Small - Cardinal Red</option>
		<option value="Unisex Medium Cardinal Red">Unisex Medium - Cardinal Red</option>
		<option value="Unisex Large Cardinal Red">Unisex Large - Cardinal Red</option>
		<option value="Unisex XLarge Cardinal Red">Unisex XLarge - Cardinal Red</option>
		<option value="Unisex 2XLarge Cardinal Red">Unisex 2XLarge - Cardinal Red</option>
		<option value="Unisex 3XLarge Cardinal Red">Unisex 3XLarge - Cardinal Red</option>
		<option value="Unisex Small Gold">Unisex Small - Gold</option>
		<option value="Unisex Medium Gold">Unisex Medium - Gold</option>
		<option value="Unisex Large Gold">Unisex Large - Gold</option>
		<option value="Unisex XLarge Gold">Unisex XLarge - Gold</option>
		<option value="Unisex 2XLarge Gold">Unisex 2XLarge - Gold</option>
		<option value="Unisex 3XLarge Gold">Unisex 3XLarge - Gold</option>
		<option value="Unisex Small Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Medium Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Large Light Steel">Unisex Large - Light Steel</option>
		<option value="Unisex XLarge Light Steel">Unisex XLarge - Light Steel</option>
		<option value="Unisex 2XLarge Light Steel">Unisex 2XLarge - Light Steel</option>
		<option value="Unisex 3XLarge Light Steel">Unisex 3XLarge - Light Steel</option>
		<option value="Unisex Small Pink">Unisex Small - Pink</option>
		<option value="Unisex Medium Pink">Unisex Medium - Pink</option>
		<option value="Unisex Large Pink">Unisex Large - Pink</option>
		<option value="Unisex XLarge Pink">Unisex XLarge - Pink</option>
		<option value="Unisex 2XLarge Pink">Unisex 2XLarge - Pink</option> 
		<option value="Unisex 3XLarge Pink">Unisex 3XLarge Pink</option>
		<option value="Unisex Small Purple">Unisex Small - Purple</option>
		<option value="Unisex Medium Purple">Unisex Medium - Purple</option>
        <option value="Unisex Large Purple">Unisex Large - Purple</option>
        <option value="Unisex XLarge Purple">Unisex XLarge - Purple</option>
        <option value="Unisex 2XLarge Purple">Unisex 2XLarge - Purple</option>
        <option value="Unisex 3XLarge Purple">Unisex 3XLarge Purple</option>
        <option value="Unisex Small Sand">Unisex Small - Sand</option>
        <option value="Unisex Medium Sand">Unisex Medium - Sand</option>
        <option value="Unisex Large Sand">Unisex Large - Sand</option>
        <option value="Unisex XLarge Sand">Unisex XLarge - Sand</option>
        <option value="Unisex 2XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex 3XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex Small Stonewash Green">Unisex Small - Stonewash Green</option>
        <option value="Unisex Medium Stonewash Green">Unisex Medium - Stonewash Green</option>
        <option value="Unisex Large Stonewash Green">Unisex Large - Stonewash Green</option>
        <option value="Unisex XLarge Stonewash Green">Unisex XLarge - Stonewash Green</option>
        <option value="Unisex 2XLarge Stonewash Green">Unisex 2XLarge - Stonewash Green</option>
        <option value="Unisex 3XLarge Stonewash Green">Unisex 3XLarge Stonewash Green</option>
        <option value="Womens Tank Blue Small">Women's Tank Blue - Small</option>
        <option value="Womens Tank Blue Medium">Women's Tank Blue - Medium</option>
        <option value="Womens Tank Blue Large ">Women's Tank Blue - Large</option> 
        <option value="Womens Tank Blue XLarge ">Women's Tank Blue - Xlarge</option>
        <option value="Womens Tank Blue 2XLarge">Women's Tank Blue - 2XLarge</option>
        <option value="Womens Tank Heather Grey Small">Women's Tank Heather Grey - Small</option>
        <option value="Womens Tank Heather Grey Medium">Women's Tank Heather Grey - Medium</option>
        <option value="Womens Tank Heather Grey Large">Women's Tank Heather Grey - Large</option>
        <option value="Womens Tank Heather Grey XLarge">Women's Tank Heather Grey - Xlarge</option>
        <option value="Womens Tank Heather Grey 2XLarge">Women's Tank Heather Grey - 2XLarge</option>
        <option value="Womens Tank Pink Small">Women's Tank Pink - Small</option>
        <option value="Womens Tank Pink Medium">Women's Tank Pink - Medium</option> 
        <option value="Womens Tank Pink Large">Women's Tank Pink - Large</option>
        <option value="Womens Tank Pink XLarge">Women's Tank Pink - XLarge</option>
        <option value="Womens Tank Pink 2XLarge">Women's Tank Pink - 2XLarge</option> 
        <option value="Womens Tank Purple Small">Women's Tank Purple - Small</option>
        <option value="Womens Tank Purple Medium">Women's Tank Purple - Medium</option> 
        <option value="Womens Tank Purple Large">Women's Tank Purple - Large</option> 
        <option value="Womens Tank Purple XLarge">Women's Tank Purple - XLarge</option> 
        <option value="Womens Tank Purple 2XLarge">Women's Tank Purple - 2XLarge</option> 
        <option value="Mens Tank Blue Small">Men's Tank Blue - Small</option> 
        <option value="Mens Tank Blue Medium">Men's Tank Blue - Medium</option>  
        <option value="Mens Tank Blue Large"> Men's Tank Blue - Large</option>
        <option value="Mens Tank Blue XLarge">  Men's Tank Blue - XLarge</option> 
        <option value="Mens Tank Blue 2XLarge">Men's Tank Blue - 2XLarge</option>
        <option value="Mens Tank Heather Grey Small">Men's Tank Heather Grey - Small</option>
        <option value="Mens Tank Heather Grey Medium">Men's Tank Heather Grey - Medium</option> 
        <option value="Mens Tank Heather Grey Large">Men's Tank Heather Grey - Large</option>  
        <option value="Mens Tank Heather Grey XLarge">Men's Tank Heather Grey - XLarge</option>   
        <option value="Mens Tank Heather Grey 2XLarge">Men's Tank Heather Grey - 2XLarge</option>   
        <option value="Mens Tank Purple Small">Men's Tank Purple - Small</option> 
        <option value="Mens Tank Purple Medium">Men's Tank Purple - Medium</option> 
        <option value="Mens Tank Purple Large">Men's Tank Purple - Large</option> 
        <option value="Mens Tank Purple XLarge">Men's Tank Purple - Xlarge</option>
        <option value="Mens Tank Purple 2XLarge">Men's Tank Purple - 2XLarge</option>
		      </select></td>
    </tr>
  <tr>
    <td width="139" height="24" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*Shirt Color&nbsp; </span></td>
    <td bgcolor="#3E3E3E"><span class="style2">
      <select name="shirtcolor" size="1" id="shirtcolor">
        <option value="">-- Select Color --</option>
        <option value="Athletic Orange">Athletic Orange</option>
        <option value="Aquatic Blue">Aquatic Blue</option>
        <option value="Black">Black</option>
        <option value="Cardinal Red">Cardinal Red</option>
        <option value="Gold">Gold</option>
        <option value="Light Steel">Light Steel</option>
        <option value="Pink">Pink</option>
        <option value="Purple">Purple</option>
        <option value="Sand">Sand</option>
        <option value="Stonewash Green">Stonewash Green</option>        
          </select>
    </span></td>
    <td bgcolor="#3E3E3E"><div align="center"><span class="style18">Player 2</span></div>
      <span class="style2"></span></td>
    <td bgcolor="#3E3E3E"><span class="style2">
      <input name="player2_name" type="text" id="player2_name" tabindex="20" size="20" maxlength="50" />
    </span></td>
    <td bgcolor="#3E3E3E"><span class="style2">
      <input name="player2_email" type="text" id="player2_email" tabindex="21" size="24" maxlength="40" />
    </span></td>
    <td bgcolor="#3E3E3E"><span class="style2"></span><span>
      <select name="player2_shirt" id="player2_shirt" tabindex="22">
        <option value="-1" >- Select Size and Option -</option>
        <option value="Unisex Small Athletic Orange">Unisex Small - Athletic Orange</option>
		<option value="Unisex Medium Athletic Orange">Unisex Medium - Athletic Orange</option>
		<option value="Unisex Large Athletic Orange">Unisex Large - Athletic Orange</option>
		<option value="Unisex XLarge Athletic Orange">Unisex XLarge - Athletic Orange</option>
		<option value="Unisex 2XLarge  Athletic Orange">Unisex 2XLarge -  Athletic Orange</option>
		<option value="Unisex 3XLarge Athletic Orange">Unisex 3XLarge - Athletic Orange</option>
		<option value="Unisex Small Aquatic Blue">Unisex Small - Aquatic Blue</option>
		<option value="Unisex Medium Aquatic Blue">Unisex Medium - Aquatic Blue</option>
		<option value="Unisex Large Aquatic Blue">Unisex Large - Aquatic Blue</option>
		<option value="Unisex XLarge Aquatic Blue">Unisex XLarge - Aquatic Blue</option>
		<option value="Unisex 2XLarge  Aquatic Blue">Unisex 2XLarge -  Aquatic Blue</option>
		<option value="Unisex 3XLarge Aquatic Blue">Unisex 3XLarge - Aquatic Blue</option>
		<option value="Unisex Small Black">Unisex Small - Black</option>
		<option value="Unisex Medium Black">Unisex Medium - Black</option>
		<option value="Unisex Large Black">Unisex Large - Black</option>
		<option value="Unisex XLarge Black">Unisex XLarge - Black</option>
		<option value="Unisex 2XLarge  Black">Unisex 2XLarge - Black</option>
		<option value="Unisex 3XLarge Black">Unisex 3XLarge - Black</option>
		<option value="Unisex Small Cardinal Red">Unisex Small - Cardinal Red</option>
		<option value="Unisex Medium Cardinal Red">Unisex Medium - Cardinal Red</option>
		<option value="Unisex Large Cardinal Red">Unisex Large - Cardinal Red</option>
		<option value="Unisex XLarge Cardinal Red">Unisex XLarge - Cardinal Red</option>
		<option value="Unisex 2XLarge Cardinal Red">Unisex 2XLarge - Cardinal Red</option>
		<option value="Unisex 3XLarge Cardinal Red">Unisex 3XLarge - Cardinal Red</option>
		<option value="Unisex Small Gold">Unisex Small - Gold</option>
		<option value="Unisex Medium Gold">Unisex Medium - Gold</option>
		<option value="Unisex Large Gold">Unisex Large - Gold</option>
		<option value="Unisex XLarge Gold">Unisex XLarge - Gold</option>
		<option value="Unisex 2XLarge Gold">Unisex 2XLarge - Gold</option>
		<option value="Unisex 3XLarge Gold">Unisex 3XLarge - Gold</option>
		<option value="Unisex Small Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Medium Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Large Light Steel">Unisex Large - Light Steel</option>
		<option value="Unisex XLarge Light Steel">Unisex XLarge - Light Steel</option>
		<option value="Unisex 2XLarge Light Steel">Unisex 2XLarge - Light Steel</option>
		<option value="Unisex 3XLarge Light Steel">Unisex 3XLarge - Light Steel</option>
		<option value="Unisex Small Pink">Unisex Small - Pink</option>
		<option value="Unisex Medium Pink">Unisex Medium - Pink</option>
		<option value="Unisex Large Pink">Unisex Large - Pink</option>
		<option value="Unisex XLarge Pink">Unisex XLarge - Pink</option>
		<option value="Unisex 2XLarge Pink">Unisex 2XLarge - Pink</option> 
		<option value="Unisex 3XLarge Pink">Unisex 3XLarge Pink</option>
		<option value="Unisex Small Purple">Unisex Small - Purple</option>
		<option value="Unisex Medium Purple">Unisex Medium - Purple</option>
        <option value="Unisex Large Purple">Unisex Large - Purple</option>
        <option value="Unisex XLarge Purple">Unisex XLarge - Purple</option>
        <option value="Unisex 2XLarge Purple">Unisex 2XLarge - Purple</option>
        <option value="Unisex 3XLarge Purple">Unisex 3XLarge Purple</option>
        <option value="Unisex Small Sand">Unisex Small - Sand</option>
        <option value="Unisex Medium Sand">Unisex Medium - Sand</option>
        <option value="Unisex Large Sand">Unisex Large - Sand</option>
        <option value="Unisex XLarge Sand">Unisex XLarge - Sand</option>
        <option value="Unisex 2XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex 3XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex Small Stonewash Green">Unisex Small - Stonewash Green</option>
        <option value="Unisex Medium Stonewash Green">Unisex Medium - Stonewash Green</option>
        <option value="Unisex Large Stonewash Green">Unisex Large - Stonewash Green</option>
        <option value="Unisex XLarge Stonewash Green">Unisex XLarge - Stonewash Green</option>
        <option value="Unisex 2XLarge Stonewash Green">Unisex 2XLarge - Stonewash Green</option>
        <option value="Unisex 3XLarge Stonewash Green">Unisex 3XLarge Stonewash Green</option>
        <option value="Womens Tank Blue Small">Women's Tank Blue - Small</option>
        <option value="Womens Tank Blue Medium">Women's Tank Blue - Medium</option>
        <option value="Womens Tank Blue Large ">Women's Tank Blue - Large</option> 
        <option value="Womens Tank Blue XLarge ">Women's Tank Blue - Xlarge</option>
        <option value="Womens Tank Blue 2XLarge">Women's Tank Blue - 2XLarge</option>
        <option value="Womens Tank Heather Grey Small">Women's Tank Heather Grey - Small</option>
        <option value="Womens Tank Heather Grey Medium">Women's Tank Heather Grey - Medium</option>
        <option value="Womens Tank Heather Grey Large">Women's Tank Heather Grey - Large</option>
        <option value="Womens Tank Heather Grey XLarge">Women's Tank Heather Grey - Xlarge</option>
        <option value="Womens Tank Heather Grey 2XLarge">Women's Tank Heather Grey - 2XLarge</option>
        <option value="Womens Tank Pink Small">Women's Tank Pink - Small</option>
        <option value="Womens Tank Pink Medium">Women's Tank Pink - Medium</option> 
        <option value="Womens Tank Pink Large">Women's Tank Pink - Large</option>
        <option value="Womens Tank Pink XLarge">Women's Tank Pink - XLarge</option>
        <option value="Womens Tank Pink 2XLarge">Women's Tank Pink - 2XLarge</option> 
        <option value="Womens Tank Purple Small">Women's Tank Purple - Small</option>
        <option value="Womens Tank Purple Medium">Women's Tank Purple - Medium</option> 
        <option value="Womens Tank Purple Large">Women's Tank Purple - Large</option> 
        <option value="Womens Tank Purple XLarge">Women's Tank Purple - XLarge</option> 
        <option value="Womens Tank Purple 2XLarge">Women's Tank Purple - 2XLarge</option> 
        <option value="Mens Tank Blue Small">Men's Tank Blue - Small</option> 
        <option value="Mens Tank Blue Medium">Men's Tank Blue - Medium</option>  
        <option value="Mens Tank Blue Large"> Men's Tank Blue - Large</option>
        <option value="Mens Tank Blue XLarge">  Men's Tank Blue - XLarge</option> 
        <option value="Mens Tank Blue 2XLarge">Men's Tank Blue - 2XLarge</option>
        <option value="Mens Tank Heather Grey Small">Men's Tank Heather Grey - Small</option>
        <option value="Mens Tank Heather Grey Medium">Men's Tank Heather Grey - Medium</option> 
        <option value="Mens Tank Heather Grey Large">Men's Tank Heather Grey - Large</option>  
        <option value="Mens Tank Heather Grey XLarge">Men's Tank Heather Grey - XLarge</option>   
        <option value="Mens Tank Heather Grey 2XLarge">Men's Tank Heather Grey - 2XLarge</option>   
        <option value="Mens Tank Purple Small">Men's Tank Purple - Small</option> 
        <option value="Mens Tank Purple Medium">Men's Tank Purple - Medium</option> 
        <option value="Mens Tank Purple Large">Men's Tank Purple - Large</option> 
        <option value="Mens Tank Purple XLarge">Men's Tank Purple - Xlarge</option>
        <option value="Mens Tank Purple 2XLarge">Men's Tank Purple - 2XLarge</option>
    </tr>
  <tr>
    <td align="right" bgcolor="#3E3E3E"><span class="style40">+Returning Team? </span></td>
    <td bgcolor="#3E3E3E"><span class="style2">
      <select name="returningteam" size="1" id="returningteam" tabindex="4">
        <option value="-1" >-- Select Choice --</option>
        <option value="0">No</option>
        <option value="1">2013 Summer Team Capt</option>
        <option value="2">2013 Spring Team Capt</option>
        &nbsp;
      </select>
    </span></td>
    <td align="right" bgcolor="#3E3E3E"><div align="center"><span class="style18">
		Player 3</span></div></td>
    <td align="left" bgcolor="#3E3E3E"><span class="style2">
      <input name="player3_name" type="text" id="player3_name" tabindex="24" size="20" maxlength="50" />
    </span></td>
    <td align="left" bgcolor="#3E3E3E"><span class="style2">
      <input name="player3_email" type="text" id="player3_email" tabindex="25" size="24" maxlength="40" />
    </span></td>
    <td align="left" bgcolor="#3E3E3E"><span>
      <select name="player3_shirt" id="player3_shirt" tabindex="26" size="1">
        <option value="-1" >- Select Size and Option -</option>
        <option value="Unisex Small Athletic Orange">Unisex Small - Athletic Orange</option>
		<option value="Unisex Medium Athletic Orange">Unisex Medium - Athletic Orange</option>
		<option value="Unisex Large Athletic Orange">Unisex Large - Athletic Orange</option>
		<option value="Unisex XLarge Athletic Orange">Unisex XLarge - Athletic Orange</option>
		<option value="Unisex 2XLarge  Athletic Orange">Unisex 2XLarge -  Athletic Orange</option>
		<option value="Unisex 3XLarge Athletic Orange">Unisex 3XLarge - Athletic Orange</option>
		<option value="Unisex Small Aquatic Blue">Unisex Small - Aquatic Blue</option>
		<option value="Unisex Medium Aquatic Blue">Unisex Medium - Aquatic Blue</option>
		<option value="Unisex Large Aquatic Blue">Unisex Large - Aquatic Blue</option>
		<option value="Unisex XLarge Aquatic Blue">Unisex XLarge - Aquatic Blue</option>
		<option value="Unisex 2XLarge  Aquatic Blue">Unisex 2XLarge -  Aquatic Blue</option>
		<option value="Unisex 3XLarge Aquatic Blue">Unisex 3XLarge - Aquatic Blue</option>
		<option value="Unisex Small Black">Unisex Small - Black</option>
		<option value="Unisex Medium Black">Unisex Medium - Black</option>
		<option value="Unisex Large Black">Unisex Large - Black</option>
		<option value="Unisex XLarge Black">Unisex XLarge - Black</option>
		<option value="Unisex 2XLarge  Black">Unisex 2XLarge - Black</option>
		<option value="Unisex 3XLarge Black">Unisex 3XLarge - Black</option>
		<option value="Unisex Small Cardinal Red">Unisex Small - Cardinal Red</option>
		<option value="Unisex Medium Cardinal Red">Unisex Medium - Cardinal Red</option>
		<option value="Unisex Large Cardinal Red">Unisex Large - Cardinal Red</option>
		<option value="Unisex XLarge Cardinal Red">Unisex XLarge - Cardinal Red</option>
		<option value="Unisex 2XLarge Cardinal Red">Unisex 2XLarge - Cardinal Red</option>
		<option value="Unisex 3XLarge Cardinal Red">Unisex 3XLarge - Cardinal Red</option>
		<option value="Unisex Small Gold">Unisex Small - Gold</option>
		<option value="Unisex Medium Gold">Unisex Medium - Gold</option>
		<option value="Unisex Large Gold">Unisex Large - Gold</option>
		<option value="Unisex XLarge Gold">Unisex XLarge - Gold</option>
		<option value="Unisex 2XLarge Gold">Unisex 2XLarge - Gold</option>
		<option value="Unisex 3XLarge Gold">Unisex 3XLarge - Gold</option>
		<option value="Unisex Small Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Medium Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Large Light Steel">Unisex Large - Light Steel</option>
		<option value="Unisex XLarge Light Steel">Unisex XLarge - Light Steel</option>
		<option value="Unisex 2XLarge Light Steel">Unisex 2XLarge - Light Steel</option>
		<option value="Unisex 3XLarge Light Steel">Unisex 3XLarge - Light Steel</option>
		<option value="Unisex Small Pink">Unisex Small - Pink</option>
		<option value="Unisex Medium Pink">Unisex Medium - Pink</option>
		<option value="Unisex Large Pink">Unisex Large - Pink</option>
		<option value="Unisex XLarge Pink">Unisex XLarge - Pink</option>
		<option value="Unisex 2XLarge Pink">Unisex 2XLarge - Pink</option> 
		<option value="Unisex 3XLarge Pink">Unisex 3XLarge Pink</option>
		<option value="Unisex Small Purple">Unisex Small - Purple</option>
		<option value="Unisex Medium Purple">Unisex Medium - Purple</option>
        <option value="Unisex Large Purple">Unisex Large - Purple</option>
        <option value="Unisex XLarge Purple">Unisex XLarge - Purple</option>
        <option value="Unisex 2XLarge Purple">Unisex 2XLarge - Purple</option>
        <option value="Unisex 3XLarge Purple">Unisex 3XLarge Purple</option>
        <option value="Unisex Small Sand">Unisex Small - Sand</option>
        <option value="Unisex Medium Sand">Unisex Medium - Sand</option>
        <option value="Unisex Large Sand">Unisex Large - Sand</option>
        <option value="Unisex XLarge Sand">Unisex XLarge - Sand</option>
        <option value="Unisex 2XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex 3XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex Small Stonewash Green">Unisex Small - Stonewash Green</option>
        <option value="Unisex Medium Stonewash Green">Unisex Medium - Stonewash Green</option>
        <option value="Unisex Large Stonewash Green">Unisex Large - Stonewash Green</option>
        <option value="Unisex XLarge Stonewash Green">Unisex XLarge - Stonewash Green</option>
        <option value="Unisex 2XLarge Stonewash Green">Unisex 2XLarge - Stonewash Green</option>
        <option value="Unisex 3XLarge Stonewash Green">Unisex 3XLarge Stonewash Green</option>
        <option value="Womens Tank Blue Small">Women's Tank Blue - Small</option>
        <option value="Womens Tank Blue Medium">Women's Tank Blue - Medium</option>
        <option value="Womens Tank Blue Large ">Women's Tank Blue - Large</option> 
        <option value="Womens Tank Blue XLarge ">Women's Tank Blue - Xlarge</option>
        <option value="Womens Tank Blue 2XLarge">Women's Tank Blue - 2XLarge</option>
        <option value="Womens Tank Heather Grey Small">Women's Tank Heather Grey - Small</option>
        <option value="Womens Tank Heather Grey Medium">Women's Tank Heather Grey - Medium</option>
        <option value="Womens Tank Heather Grey Large">Women's Tank Heather Grey - Large</option>
        <option value="Womens Tank Heather Grey XLarge">Women's Tank Heather Grey - Xlarge</option>
        <option value="Womens Tank Heather Grey 2XLarge">Women's Tank Heather Grey - 2XLarge</option>
        <option value="Womens Tank Pink Small">Women's Tank Pink - Small</option>
        <option value="Womens Tank Pink Medium">Women's Tank Pink - Medium</option> 
        <option value="Womens Tank Pink Large">Women's Tank Pink - Large</option>
        <option value="Womens Tank Pink XLarge">Women's Tank Pink - XLarge</option>
        <option value="Womens Tank Pink 2XLarge">Women's Tank Pink - 2XLarge</option> 
        <option value="Womens Tank Purple Small">Women's Tank Purple - Small</option>
        <option value="Womens Tank Purple Medium">Women's Tank Purple - Medium</option> 
        <option value="Womens Tank Purple Large">Women's Tank Purple - Large</option> 
        <option value="Womens Tank Purple XLarge">Women's Tank Purple - XLarge</option> 
        <option value="Womens Tank Purple 2XLarge">Women's Tank Purple - 2XLarge</option> 
        <option value="Mens Tank Blue Small">Men's Tank Blue - Small</option> 
        <option value="Mens Tank Blue Medium">Men's Tank Blue - Medium</option>  
        <option value="Mens Tank Blue Large"> Men's Tank Blue - Large</option>
        <option value="Mens Tank Blue XLarge">  Men's Tank Blue - XLarge</option> 
        <option value="Mens Tank Blue 2XLarge">Men's Tank Blue - 2XLarge</option>
        <option value="Mens Tank Heather Grey Small">Men's Tank Heather Grey - Small</option>
        <option value="Mens Tank Heather Grey Medium">Men's Tank Heather Grey - Medium</option> 
        <option value="Mens Tank Heather Grey Large">Men's Tank Heather Grey - Large</option>  
        <option value="Mens Tank Heather Grey XLarge">Men's Tank Heather Grey - XLarge</option>   
        <option value="Mens Tank Heather Grey 2XLarge">Men's Tank Heather Grey - 2XLarge</option>   
        <option value="Mens Tank Purple Small">Men's Tank Purple - Small</option> 
        <option value="Mens Tank Purple Medium">Men's Tank Purple - Medium</option> 
        <option value="Mens Tank Purple Large">Men's Tank Purple - Large</option> 
        <option value="Mens Tank Purple XLarge">Men's Tank Purple - Xlarge</option>
        <option value="Mens Tank Purple 2XLarge">Men's Tank Purple - 2XLarge</option>
		      </select></td>
    </tr>
  <tr>
    <td height="22" align="right" bgcolor="#3E3E3E"><span class="style40"> +Ret.<em></em> 
	Team Name: </span></td>
    <td bgcolor="#3E3E3E"><input name="rteamname" type="text" id="rteamname" tabindex="5" size="25" maxlength="50" /></td>
    <td width="60" bgcolor="#3E3E3E"><div align="center"><span class="style18">
		Player 4</span></div></td>
    <td width="150" bgcolor="#3E3E3E"><span class="style2">
      <input name="player4_name" type="text" id="player4_name" tabindex="28" size="20" maxlength="50" /></span></td>
    <td width="176" bgcolor="#3E3E3E"><input name="player4_email" type="text" id="player4_email" tabindex="29" size="24" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span>
      <select name="player4_shirt" id="player4_shirt" tabindex="30">
        <option value="-1" >- Select Size and Option -</option>
        <option value="Unisex Small Athletic Orange">Unisex Small - Athletic Orange</option>
		<option value="Unisex Medium Athletic Orange">Unisex Medium - Athletic Orange</option>
		<option value="Unisex Large Athletic Orange">Unisex Large - Athletic Orange</option>
		<option value="Unisex XLarge Athletic Orange">Unisex XLarge - Athletic Orange</option>
		<option value="Unisex 2XLarge  Athletic Orange">Unisex 2XLarge -  Athletic Orange</option>
		<option value="Unisex 3XLarge Athletic Orange">Unisex 3XLarge - Athletic Orange</option>
		<option value="Unisex Small Aquatic Blue">Unisex Small - Aquatic Blue</option>
		<option value="Unisex Medium Aquatic Blue">Unisex Medium - Aquatic Blue</option>
		<option value="Unisex Large Aquatic Blue">Unisex Large - Aquatic Blue</option>
		<option value="Unisex XLarge Aquatic Blue">Unisex XLarge - Aquatic Blue</option>
		<option value="Unisex 2XLarge  Aquatic Blue">Unisex 2XLarge -  Aquatic Blue</option>
		<option value="Unisex 3XLarge Aquatic Blue">Unisex 3XLarge - Aquatic Blue</option>
		<option value="Unisex Small Black">Unisex Small - Black</option>
		<option value="Unisex Medium Black">Unisex Medium - Black</option>
		<option value="Unisex Large Black">Unisex Large - Black</option>
		<option value="Unisex XLarge Black">Unisex XLarge - Black</option>
		<option value="Unisex 2XLarge  Black">Unisex 2XLarge - Black</option>
		<option value="Unisex 3XLarge Black">Unisex 3XLarge - Black</option>
		<option value="Unisex Small Cardinal Red">Unisex Small - Cardinal Red</option>
		<option value="Unisex Medium Cardinal Red">Unisex Medium - Cardinal Red</option>
		<option value="Unisex Large Cardinal Red">Unisex Large - Cardinal Red</option>
		<option value="Unisex XLarge Cardinal Red">Unisex XLarge - Cardinal Red</option>
		<option value="Unisex 2XLarge Cardinal Red">Unisex 2XLarge - Cardinal Red</option>
		<option value="Unisex 3XLarge Cardinal Red">Unisex 3XLarge - Cardinal Red</option>
		<option value="Unisex Small Gold">Unisex Small - Gold</option>
		<option value="Unisex Medium Gold">Unisex Medium - Gold</option>
		<option value="Unisex Large Gold">Unisex Large - Gold</option>
		<option value="Unisex XLarge Gold">Unisex XLarge - Gold</option>
		<option value="Unisex 2XLarge Gold">Unisex 2XLarge - Gold</option>
		<option value="Unisex 3XLarge Gold">Unisex 3XLarge - Gold</option>
		<option value="Unisex Small Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Medium Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Large Light Steel">Unisex Large - Light Steel</option>
		<option value="Unisex XLarge Light Steel">Unisex XLarge - Light Steel</option>
		<option value="Unisex 2XLarge Light Steel">Unisex 2XLarge - Light Steel</option>
		<option value="Unisex 3XLarge Light Steel">Unisex 3XLarge - Light Steel</option>
		<option value="Unisex Small Pink">Unisex Small - Pink</option>
		<option value="Unisex Medium Pink">Unisex Medium - Pink</option>
		<option value="Unisex Large Pink">Unisex Large - Pink</option>
		<option value="Unisex XLarge Pink">Unisex XLarge - Pink</option>
		<option value="Unisex 2XLarge Pink">Unisex 2XLarge - Pink</option> 
		<option value="Unisex 3XLarge Pink">Unisex 3XLarge Pink</option>
		<option value="Unisex Small Purple">Unisex Small - Purple</option>
		<option value="Unisex Medium Purple">Unisex Medium - Purple</option>
        <option value="Unisex Large Purple">Unisex Large - Purple</option>
        <option value="Unisex XLarge Purple">Unisex XLarge - Purple</option>
        <option value="Unisex 2XLarge Purple">Unisex 2XLarge - Purple</option>
        <option value="Unisex 3XLarge Purple">Unisex 3XLarge Purple</option>
        <option value="Unisex Small Sand">Unisex Small - Sand</option>
        <option value="Unisex Medium Sand">Unisex Medium - Sand</option>
        <option value="Unisex Large Sand">Unisex Large - Sand</option>
        <option value="Unisex XLarge Sand">Unisex XLarge - Sand</option>
        <option value="Unisex 2XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex 3XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex Small Stonewash Green">Unisex Small - Stonewash Green</option>
        <option value="Unisex Medium Stonewash Green">Unisex Medium - Stonewash Green</option>
        <option value="Unisex Large Stonewash Green">Unisex Large - Stonewash Green</option>
        <option value="Unisex XLarge Stonewash Green">Unisex XLarge - Stonewash Green</option>
        <option value="Unisex 2XLarge Stonewash Green">Unisex 2XLarge - Stonewash Green</option>
        <option value="Unisex 3XLarge Stonewash Green">Unisex 3XLarge Stonewash Green</option>
        <option value="Womens Tank Blue Small">Women's Tank Blue - Small</option>
        <option value="Womens Tank Blue Medium">Women's Tank Blue - Medium</option>
        <option value="Womens Tank Blue Large ">Women's Tank Blue - Large</option> 
        <option value="Womens Tank Blue XLarge ">Women's Tank Blue - Xlarge</option>
        <option value="Womens Tank Blue 2XLarge">Women's Tank Blue - 2XLarge</option>
        <option value="Womens Tank Heather Grey Small">Women's Tank Heather Grey - Small</option>
        <option value="Womens Tank Heather Grey Medium">Women's Tank Heather Grey - Medium</option>
        <option value="Womens Tank Heather Grey Large">Women's Tank Heather Grey - Large</option>
        <option value="Womens Tank Heather Grey XLarge">Women's Tank Heather Grey - Xlarge</option>
        <option value="Womens Tank Heather Grey 2XLarge">Women's Tank Heather Grey - 2XLarge</option>
        <option value="Womens Tank Pink Small">Women's Tank Pink - Small</option>
        <option value="Womens Tank Pink Medium">Women's Tank Pink - Medium</option> 
        <option value="Womens Tank Pink Large">Women's Tank Pink - Large</option>
        <option value="Womens Tank Pink XLarge">Women's Tank Pink - XLarge</option>
        <option value="Womens Tank Pink 2XLarge">Women's Tank Pink - 2XLarge</option> 
        <option value="Womens Tank Purple Small">Women's Tank Purple - Small</option>
        <option value="Womens Tank Purple Medium">Women's Tank Purple - Medium</option> 
        <option value="Womens Tank Purple Large">Women's Tank Purple - Large</option> 
        <option value="Womens Tank Purple XLarge">Women's Tank Purple - XLarge</option> 
        <option value="Womens Tank Purple 2XLarge">Women's Tank Purple - 2XLarge</option> 
        <option value="Mens Tank Blue Small">Men's Tank Blue - Small</option> 
        <option value="Mens Tank Blue Medium">Men's Tank Blue - Medium</option>  
        <option value="Mens Tank Blue Large"> Men's Tank Blue - Large</option>
        <option value="Mens Tank Blue XLarge">  Men's Tank Blue - XLarge</option> 
        <option value="Mens Tank Blue 2XLarge">Men's Tank Blue - 2XLarge</option>
        <option value="Mens Tank Heather Grey Small">Men's Tank Heather Grey - Small</option>
        <option value="Mens Tank Heather Grey Medium">Men's Tank Heather Grey - Medium</option> 
        <option value="Mens Tank Heather Grey Large">Men's Tank Heather Grey - Large</option>  
        <option value="Mens Tank Heather Grey XLarge">Men's Tank Heather Grey - XLarge</option>   
        <option value="Mens Tank Heather Grey 2XLarge">Men's Tank Heather Grey - 2XLarge</option>   
        <option value="Mens Tank Purple Small">Men's Tank Purple - Small</option> 
        <option value="Mens Tank Purple Medium">Men's Tank Purple - Medium</option> 
        <option value="Mens Tank Purple Large">Men's Tank Purple - Large</option> 
        <option value="Mens Tank Purple XLarge">Men's Tank Purple - Xlarge</option>
        <option value="Mens Tank Purple 2XLarge">Men's Tank Purple - 2XLarge</option>
		      </select></td>
    </tr>
  <tr>
    <td colspan="2" align="right"><div align="center" class="style45">Captain's 
		Information</div></td>
    <td width="60" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		5</div></td>
    <td width="150" bgcolor="#3E3E3E"><span class="style2">
      <input name="player5_name" type="text" id="player5_name" tabindex="32" size="20" maxlength="50" /></span></td>
    <td width="176" bgcolor="#3E3E3E"><input name="player5_email" type="text" id="player5_email" tabindex="33" size="24" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span>
      <select name="player5_shirt" id="player5_shirt" tabindex="34">
        <option value="-1" >- Select Size and Option -</option>
        <option value="Unisex Small Athletic Orange">Unisex Small - Athletic Orange</option>
		<option value="Unisex Medium Athletic Orange">Unisex Medium - Athletic Orange</option>
		<option value="Unisex Large Athletic Orange">Unisex Large - Athletic Orange</option>
		<option value="Unisex XLarge Athletic Orange">Unisex XLarge - Athletic Orange</option>
		<option value="Unisex 2XLarge  Athletic Orange">Unisex 2XLarge -  Athletic Orange</option>
		<option value="Unisex 3XLarge Athletic Orange">Unisex 3XLarge - Athletic Orange</option>
		<option value="Unisex Small Aquatic Blue">Unisex Small - Aquatic Blue</option>
		<option value="Unisex Medium Aquatic Blue">Unisex Medium - Aquatic Blue</option>
		<option value="Unisex Large Aquatic Blue">Unisex Large - Aquatic Blue</option>
		<option value="Unisex XLarge Aquatic Blue">Unisex XLarge - Aquatic Blue</option>
		<option value="Unisex 2XLarge  Aquatic Blue">Unisex 2XLarge -  Aquatic Blue</option>
		<option value="Unisex 3XLarge Aquatic Blue">Unisex 3XLarge - Aquatic Blue</option>
		<option value="Unisex Small Black">Unisex Small - Black</option>
		<option value="Unisex Medium Black">Unisex Medium - Black</option>
		<option value="Unisex Large Black">Unisex Large - Black</option>
		<option value="Unisex XLarge Black">Unisex XLarge - Black</option>
		<option value="Unisex 2XLarge  Black">Unisex 2XLarge - Black</option>
		<option value="Unisex 3XLarge Black">Unisex 3XLarge - Black</option>
		<option value="Unisex Small Cardinal Red">Unisex Small - Cardinal Red</option>
		<option value="Unisex Medium Cardinal Red">Unisex Medium - Cardinal Red</option>
		<option value="Unisex Large Cardinal Red">Unisex Large - Cardinal Red</option>
		<option value="Unisex XLarge Cardinal Red">Unisex XLarge - Cardinal Red</option>
		<option value="Unisex 2XLarge Cardinal Red">Unisex 2XLarge - Cardinal Red</option>
		<option value="Unisex 3XLarge Cardinal Red">Unisex 3XLarge - Cardinal Red</option>
		<option value="Unisex Small Gold">Unisex Small - Gold</option>
		<option value="Unisex Medium Gold">Unisex Medium - Gold</option>
		<option value="Unisex Large Gold">Unisex Large - Gold</option>
		<option value="Unisex XLarge Gold">Unisex XLarge - Gold</option>
		<option value="Unisex 2XLarge Gold">Unisex 2XLarge - Gold</option>
		<option value="Unisex 3XLarge Gold">Unisex 3XLarge - Gold</option>
		<option value="Unisex Small Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Medium Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Large Light Steel">Unisex Large - Light Steel</option>
		<option value="Unisex XLarge Light Steel">Unisex XLarge - Light Steel</option>
		<option value="Unisex 2XLarge Light Steel">Unisex 2XLarge - Light Steel</option>
		<option value="Unisex 3XLarge Light Steel">Unisex 3XLarge - Light Steel</option>
		<option value="Unisex Small Pink">Unisex Small - Pink</option>
		<option value="Unisex Medium Pink">Unisex Medium - Pink</option>
		<option value="Unisex Large Pink">Unisex Large - Pink</option>
		<option value="Unisex XLarge Pink">Unisex XLarge - Pink</option>
		<option value="Unisex 2XLarge Pink">Unisex 2XLarge - Pink</option> 
		<option value="Unisex 3XLarge Pink">Unisex 3XLarge Pink</option>
		<option value="Unisex Small Purple">Unisex Small - Purple</option>
		<option value="Unisex Medium Purple">Unisex Medium - Purple</option>
        <option value="Unisex Large Purple">Unisex Large - Purple</option>
        <option value="Unisex XLarge Purple">Unisex XLarge - Purple</option>
        <option value="Unisex 2XLarge Purple">Unisex 2XLarge - Purple</option>
        <option value="Unisex 3XLarge Purple">Unisex 3XLarge Purple</option>
        <option value="Unisex Small Sand">Unisex Small - Sand</option>
        <option value="Unisex Medium Sand">Unisex Medium - Sand</option>
        <option value="Unisex Large Sand">Unisex Large - Sand</option>
        <option value="Unisex XLarge Sand">Unisex XLarge - Sand</option>
        <option value="Unisex 2XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex 3XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex Small Stonewash Green">Unisex Small - Stonewash Green</option>
        <option value="Unisex Medium Stonewash Green">Unisex Medium - Stonewash Green</option>
        <option value="Unisex Large Stonewash Green">Unisex Large - Stonewash Green</option>
        <option value="Unisex XLarge Stonewash Green">Unisex XLarge - Stonewash Green</option>
        <option value="Unisex 2XLarge Stonewash Green">Unisex 2XLarge - Stonewash Green</option>
        <option value="Unisex 3XLarge Stonewash Green">Unisex 3XLarge Stonewash Green</option>
        <option value="Womens Tank Blue Small">Women's Tank Blue - Small</option>
        <option value="Womens Tank Blue Medium">Women's Tank Blue - Medium</option>
        <option value="Womens Tank Blue Large ">Women's Tank Blue - Large</option> 
        <option value="Womens Tank Blue XLarge ">Women's Tank Blue - Xlarge</option>
        <option value="Womens Tank Blue 2XLarge">Women's Tank Blue - 2XLarge</option>
        <option value="Womens Tank Heather Grey Small">Women's Tank Heather Grey - Small</option>
        <option value="Womens Tank Heather Grey Medium">Women's Tank Heather Grey - Medium</option>
        <option value="Womens Tank Heather Grey Large">Women's Tank Heather Grey - Large</option>
        <option value="Womens Tank Heather Grey XLarge">Women's Tank Heather Grey - Xlarge</option>
        <option value="Womens Tank Heather Grey 2XLarge">Women's Tank Heather Grey - 2XLarge</option>
        <option value="Womens Tank Pink Small">Women's Tank Pink - Small</option>
        <option value="Womens Tank Pink Medium">Women's Tank Pink - Medium</option> 
        <option value="Womens Tank Pink Large">Women's Tank Pink - Large</option>
        <option value="Womens Tank Pink XLarge">Women's Tank Pink - XLarge</option>
        <option value="Womens Tank Pink 2XLarge">Women's Tank Pink - 2XLarge</option> 
        <option value="Womens Tank Purple Small">Women's Tank Purple - Small</option>
        <option value="Womens Tank Purple Medium">Women's Tank Purple - Medium</option> 
        <option value="Womens Tank Purple Large">Women's Tank Purple - Large</option> 
        <option value="Womens Tank Purple XLarge">Women's Tank Purple - XLarge</option> 
        <option value="Womens Tank Purple 2XLarge">Women's Tank Purple - 2XLarge</option> 
        <option value="Mens Tank Blue Small">Men's Tank Blue - Small</option> 
        <option value="Mens Tank Blue Medium">Men's Tank Blue - Medium</option>  
        <option value="Mens Tank Blue Large"> Men's Tank Blue - Large</option>
        <option value="Mens Tank Blue XLarge">  Men's Tank Blue - XLarge</option> 
        <option value="Mens Tank Blue 2XLarge">Men's Tank Blue - 2XLarge</option>
        <option value="Mens Tank Heather Grey Small">Men's Tank Heather Grey - Small</option>
        <option value="Mens Tank Heather Grey Medium">Men's Tank Heather Grey - Medium</option> 
        <option value="Mens Tank Heather Grey Large">Men's Tank Heather Grey - Large</option>  
        <option value="Mens Tank Heather Grey XLarge">Men's Tank Heather Grey - XLarge</option>   
        <option value="Mens Tank Heather Grey 2XLarge">Men's Tank Heather Grey - 2XLarge</option>   
        <option value="Mens Tank Purple Small">Men's Tank Purple - Small</option> 
        <option value="Mens Tank Purple Medium">Men's Tank Purple - Medium</option> 
        <option value="Mens Tank Purple Large">Men's Tank Purple - Large</option> 
        <option value="Mens Tank Purple XLarge">Men's Tank Purple - Xlarge</option>
        <option value="Mens Tank Purple 2XLarge">Men's Tank Purple - 2XLarge</option>
		      </select></td>
    </tr>
  <tr>
    <td width="139" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*First Name&nbsp; </span></td>
    <td width="210" bgcolor="#3E3E3E"><input name="cpt_first" type="text" id="cpt_first" tabindex="6" size="25" maxlength="50" /></td>
    <td width="60" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		6</div></td>
    <td width="150" bgcolor="#3E3E3E"><span class="style2">
      <input name="player6_name" type="text" id="player6_name" tabindex="36" size="20" maxlength="50" /></span></td>
    <td width="176" bgcolor="#3E3E3E"><input name="player6_email" type="text" id="player6_email" tabindex="37" size="24" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span>
      <select name="player6_shirt" id="player6_shirt" tabindex="38">
        <option value="-1" >- Select Size and Option -</option>
        <option value="Unisex Small Athletic Orange">Unisex Small - Athletic Orange</option>
		<option value="Unisex Medium Athletic Orange">Unisex Medium - Athletic Orange</option>
		<option value="Unisex Large Athletic Orange">Unisex Large - Athletic Orange</option>
		<option value="Unisex XLarge Athletic Orange">Unisex XLarge - Athletic Orange</option>
		<option value="Unisex 2XLarge  Athletic Orange">Unisex 2XLarge -  Athletic Orange</option>
		<option value="Unisex 3XLarge Athletic Orange">Unisex 3XLarge - Athletic Orange</option>
		<option value="Unisex Small Aquatic Blue">Unisex Small - Aquatic Blue</option>
		<option value="Unisex Medium Aquatic Blue">Unisex Medium - Aquatic Blue</option>
		<option value="Unisex Large Aquatic Blue">Unisex Large - Aquatic Blue</option>
		<option value="Unisex XLarge Aquatic Blue">Unisex XLarge - Aquatic Blue</option>
		<option value="Unisex 2XLarge  Aquatic Blue">Unisex 2XLarge -  Aquatic Blue</option>
		<option value="Unisex 3XLarge Aquatic Blue">Unisex 3XLarge - Aquatic Blue</option>
		<option value="Unisex Small Black">Unisex Small - Black</option>
		<option value="Unisex Medium Black">Unisex Medium - Black</option>
		<option value="Unisex Large Black">Unisex Large - Black</option>
		<option value="Unisex XLarge Black">Unisex XLarge - Black</option>
		<option value="Unisex 2XLarge  Black">Unisex 2XLarge - Black</option>
		<option value="Unisex 3XLarge Black">Unisex 3XLarge - Black</option>
		<option value="Unisex Small Cardinal Red">Unisex Small - Cardinal Red</option>
		<option value="Unisex Medium Cardinal Red">Unisex Medium - Cardinal Red</option>
		<option value="Unisex Large Cardinal Red">Unisex Large - Cardinal Red</option>
		<option value="Unisex XLarge Cardinal Red">Unisex XLarge - Cardinal Red</option>
		<option value="Unisex 2XLarge Cardinal Red">Unisex 2XLarge - Cardinal Red</option>
		<option value="Unisex 3XLarge Cardinal Red">Unisex 3XLarge - Cardinal Red</option>
		<option value="Unisex Small Gold">Unisex Small - Gold</option>
		<option value="Unisex Medium Gold">Unisex Medium - Gold</option>
		<option value="Unisex Large Gold">Unisex Large - Gold</option>
		<option value="Unisex XLarge Gold">Unisex XLarge - Gold</option>
		<option value="Unisex 2XLarge Gold">Unisex 2XLarge - Gold</option>
		<option value="Unisex 3XLarge Gold">Unisex 3XLarge - Gold</option>
		<option value="Unisex Small Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Medium Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Large Light Steel">Unisex Large - Light Steel</option>
		<option value="Unisex XLarge Light Steel">Unisex XLarge - Light Steel</option>
		<option value="Unisex 2XLarge Light Steel">Unisex 2XLarge - Light Steel</option>
		<option value="Unisex 3XLarge Light Steel">Unisex 3XLarge - Light Steel</option>
		<option value="Unisex Small Pink">Unisex Small - Pink</option>
		<option value="Unisex Medium Pink">Unisex Medium - Pink</option>
		<option value="Unisex Large Pink">Unisex Large - Pink</option>
		<option value="Unisex XLarge Pink">Unisex XLarge - Pink</option>
		<option value="Unisex 2XLarge Pink">Unisex 2XLarge - Pink</option> 
		<option value="Unisex 3XLarge Pink">Unisex 3XLarge Pink</option>
		<option value="Unisex Small Purple">Unisex Small - Purple</option>
		<option value="Unisex Medium Purple">Unisex Medium - Purple</option>
        <option value="Unisex Large Purple">Unisex Large - Purple</option>
        <option value="Unisex XLarge Purple">Unisex XLarge - Purple</option>
        <option value="Unisex 2XLarge Purple">Unisex 2XLarge - Purple</option>
        <option value="Unisex 3XLarge Purple">Unisex 3XLarge Purple</option>
        <option value="Unisex Small Sand">Unisex Small - Sand</option>
        <option value="Unisex Medium Sand">Unisex Medium - Sand</option>
        <option value="Unisex Large Sand">Unisex Large - Sand</option>
        <option value="Unisex XLarge Sand">Unisex XLarge - Sand</option>
        <option value="Unisex 2XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex 3XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex Small Stonewash Green">Unisex Small - Stonewash Green</option>
        <option value="Unisex Medium Stonewash Green">Unisex Medium - Stonewash Green</option>
        <option value="Unisex Large Stonewash Green">Unisex Large - Stonewash Green</option>
        <option value="Unisex XLarge Stonewash Green">Unisex XLarge - Stonewash Green</option>
        <option value="Unisex 2XLarge Stonewash Green">Unisex 2XLarge - Stonewash Green</option>
        <option value="Unisex 3XLarge Stonewash Green">Unisex 3XLarge Stonewash Green</option>
        <option value="Womens Tank Blue Small">Women's Tank Blue - Small</option>
        <option value="Womens Tank Blue Medium">Women's Tank Blue - Medium</option>
        <option value="Womens Tank Blue Large ">Women's Tank Blue - Large</option> 
        <option value="Womens Tank Blue XLarge ">Women's Tank Blue - Xlarge</option>
        <option value="Womens Tank Blue 2XLarge">Women's Tank Blue - 2XLarge</option>
        <option value="Womens Tank Heather Grey Small">Women's Tank Heather Grey - Small</option>
        <option value="Womens Tank Heather Grey Medium">Women's Tank Heather Grey - Medium</option>
        <option value="Womens Tank Heather Grey Large">Women's Tank Heather Grey - Large</option>
        <option value="Womens Tank Heather Grey XLarge">Women's Tank Heather Grey - Xlarge</option>
        <option value="Womens Tank Heather Grey 2XLarge">Women's Tank Heather Grey - 2XLarge</option>
        <option value="Womens Tank Pink Small">Women's Tank Pink - Small</option>
        <option value="Womens Tank Pink Medium">Women's Tank Pink - Medium</option> 
        <option value="Womens Tank Pink Large">Women's Tank Pink - Large</option>
        <option value="Womens Tank Pink XLarge">Women's Tank Pink - XLarge</option>
        <option value="Womens Tank Pink 2XLarge">Women's Tank Pink - 2XLarge</option> 
        <option value="Womens Tank Purple Small">Women's Tank Purple - Small</option>
        <option value="Womens Tank Purple Medium">Women's Tank Purple - Medium</option> 
        <option value="Womens Tank Purple Large">Women's Tank Purple - Large</option> 
        <option value="Womens Tank Purple XLarge">Women's Tank Purple - XLarge</option> 
        <option value="Womens Tank Purple 2XLarge">Women's Tank Purple - 2XLarge</option> 
        <option value="Mens Tank Blue Small">Men's Tank Blue - Small</option> 
        <option value="Mens Tank Blue Medium">Men's Tank Blue - Medium</option>  
        <option value="Mens Tank Blue Large"> Men's Tank Blue - Large</option>
        <option value="Mens Tank Blue XLarge">  Men's Tank Blue - XLarge</option> 
        <option value="Mens Tank Blue 2XLarge">Men's Tank Blue - 2XLarge</option>
        <option value="Mens Tank Heather Grey Small">Men's Tank Heather Grey - Small</option>
        <option value="Mens Tank Heather Grey Medium">Men's Tank Heather Grey - Medium</option> 
        <option value="Mens Tank Heather Grey Large">Men's Tank Heather Grey - Large</option>  
        <option value="Mens Tank Heather Grey XLarge">Men's Tank Heather Grey - XLarge</option>   
        <option value="Mens Tank Heather Grey 2XLarge">Men's Tank Heather Grey - 2XLarge</option>   
        <option value="Mens Tank Purple Small">Men's Tank Purple - Small</option> 
        <option value="Mens Tank Purple Medium">Men's Tank Purple - Medium</option> 
        <option value="Mens Tank Purple Large">Men's Tank Purple - Large</option> 
        <option value="Mens Tank Purple XLarge">Men's Tank Purple - Xlarge</option>
        <option value="Mens Tank Purple 2XLarge">Men's Tank Purple - 2XLarge</option>
		      </select></td>
    </tr>
  <tr>
    <td width="139" align="right" bgcolor="#3E3E3E"><span class="style37"> *Last 
	Name&nbsp; </span></td>
    <td width="210" bgcolor="#3E3E3E"><input name="cpt_last" type="text" id="cpt_last" tabindex="7" size="25" maxlength="50" /></td>
    <td width="60" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		7</div></td>
    <td width="150" bgcolor="#3E3E3E"><span class="style2">
      <input name="player7_name" type="text" id="player7_name" tabindex="40" size="20" maxlength="50" /></span></td>
    <td width="176" bgcolor="#3E3E3E"><input name="player7_email" type="text" id="player7_email" tabindex="41" size="24" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span>
      <select name="player7_shirt" id="player7_shirt" tabindex="42">
        <option value="-1" >- Select Size and Option -</option>
        <option value="Unisex Small Athletic Orange">Unisex Small - Athletic Orange</option>
		<option value="Unisex Medium Athletic Orange">Unisex Medium - Athletic Orange</option>
		<option value="Unisex Large Athletic Orange">Unisex Large - Athletic Orange</option>
		<option value="Unisex XLarge Athletic Orange">Unisex XLarge - Athletic Orange</option>
		<option value="Unisex 2XLarge  Athletic Orange">Unisex 2XLarge -  Athletic Orange</option>
		<option value="Unisex 3XLarge Athletic Orange">Unisex 3XLarge - Athletic Orange</option>
		<option value="Unisex Small Aquatic Blue">Unisex Small - Aquatic Blue</option>
		<option value="Unisex Medium Aquatic Blue">Unisex Medium - Aquatic Blue</option>
		<option value="Unisex Large Aquatic Blue">Unisex Large - Aquatic Blue</option>
		<option value="Unisex XLarge Aquatic Blue">Unisex XLarge - Aquatic Blue</option>
		<option value="Unisex 2XLarge  Aquatic Blue">Unisex 2XLarge -  Aquatic Blue</option>
		<option value="Unisex 3XLarge Aquatic Blue">Unisex 3XLarge - Aquatic Blue</option>
		<option value="Unisex Small Black">Unisex Small - Black</option>
		<option value="Unisex Medium Black">Unisex Medium - Black</option>
		<option value="Unisex Large Black">Unisex Large - Black</option>
		<option value="Unisex XLarge Black">Unisex XLarge - Black</option>
		<option value="Unisex 2XLarge  Black">Unisex 2XLarge - Black</option>
		<option value="Unisex 3XLarge Black">Unisex 3XLarge - Black</option>
		<option value="Unisex Small Cardinal Red">Unisex Small - Cardinal Red</option>
		<option value="Unisex Medium Cardinal Red">Unisex Medium - Cardinal Red</option>
		<option value="Unisex Large Cardinal Red">Unisex Large - Cardinal Red</option>
		<option value="Unisex XLarge Cardinal Red">Unisex XLarge - Cardinal Red</option>
		<option value="Unisex 2XLarge Cardinal Red">Unisex 2XLarge - Cardinal Red</option>
		<option value="Unisex 3XLarge Cardinal Red">Unisex 3XLarge - Cardinal Red</option>
		<option value="Unisex Small Gold">Unisex Small - Gold</option>
		<option value="Unisex Medium Gold">Unisex Medium - Gold</option>
		<option value="Unisex Large Gold">Unisex Large - Gold</option>
		<option value="Unisex XLarge Gold">Unisex XLarge - Gold</option>
		<option value="Unisex 2XLarge Gold">Unisex 2XLarge - Gold</option>
		<option value="Unisex 3XLarge Gold">Unisex 3XLarge - Gold</option>
		<option value="Unisex Small Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Medium Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Large Light Steel">Unisex Large - Light Steel</option>
		<option value="Unisex XLarge Light Steel">Unisex XLarge - Light Steel</option>
		<option value="Unisex 2XLarge Light Steel">Unisex 2XLarge - Light Steel</option>
		<option value="Unisex 3XLarge Light Steel">Unisex 3XLarge - Light Steel</option>
		<option value="Unisex Small Pink">Unisex Small - Pink</option>
		<option value="Unisex Medium Pink">Unisex Medium - Pink</option>
		<option value="Unisex Large Pink">Unisex Large - Pink</option>
		<option value="Unisex XLarge Pink">Unisex XLarge - Pink</option>
		<option value="Unisex 2XLarge Pink">Unisex 2XLarge - Pink</option> 
		<option value="Unisex 3XLarge Pink">Unisex 3XLarge Pink</option>
		<option value="Unisex Small Purple">Unisex Small - Purple</option>
		<option value="Unisex Medium Purple">Unisex Medium - Purple</option>
        <option value="Unisex Large Purple">Unisex Large - Purple</option>
        <option value="Unisex XLarge Purple">Unisex XLarge - Purple</option>
        <option value="Unisex 2XLarge Purple">Unisex 2XLarge - Purple</option>
        <option value="Unisex 3XLarge Purple">Unisex 3XLarge Purple</option>
        <option value="Unisex Small Sand">Unisex Small - Sand</option>
        <option value="Unisex Medium Sand">Unisex Medium - Sand</option>
        <option value="Unisex Large Sand">Unisex Large - Sand</option>
        <option value="Unisex XLarge Sand">Unisex XLarge - Sand</option>
        <option value="Unisex 2XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex 3XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex Small Stonewash Green">Unisex Small - Stonewash Green</option>
        <option value="Unisex Medium Stonewash Green">Unisex Medium - Stonewash Green</option>
        <option value="Unisex Large Stonewash Green">Unisex Large - Stonewash Green</option>
        <option value="Unisex XLarge Stonewash Green">Unisex XLarge - Stonewash Green</option>
        <option value="Unisex 2XLarge Stonewash Green">Unisex 2XLarge - Stonewash Green</option>
        <option value="Unisex 3XLarge Stonewash Green">Unisex 3XLarge Stonewash Green</option>
        <option value="Womens Tank Blue Small">Women's Tank Blue - Small</option>
        <option value="Womens Tank Blue Medium">Women's Tank Blue - Medium</option>
        <option value="Womens Tank Blue Large ">Women's Tank Blue - Large</option> 
        <option value="Womens Tank Blue XLarge ">Women's Tank Blue - Xlarge</option>
        <option value="Womens Tank Blue 2XLarge">Women's Tank Blue - 2XLarge</option>
        <option value="Womens Tank Heather Grey Small">Women's Tank Heather Grey - Small</option>
        <option value="Womens Tank Heather Grey Medium">Women's Tank Heather Grey - Medium</option>
        <option value="Womens Tank Heather Grey Large">Women's Tank Heather Grey - Large</option>
        <option value="Womens Tank Heather Grey XLarge">Women's Tank Heather Grey - Xlarge</option>
        <option value="Womens Tank Heather Grey 2XLarge">Women's Tank Heather Grey - 2XLarge</option>
        <option value="Womens Tank Pink Small">Women's Tank Pink - Small</option>
        <option value="Womens Tank Pink Medium">Women's Tank Pink - Medium</option> 
        <option value="Womens Tank Pink Large">Women's Tank Pink - Large</option>
        <option value="Womens Tank Pink XLarge">Women's Tank Pink - XLarge</option>
        <option value="Womens Tank Pink 2XLarge">Women's Tank Pink - 2XLarge</option> 
        <option value="Womens Tank Purple Small">Women's Tank Purple - Small</option>
        <option value="Womens Tank Purple Medium">Women's Tank Purple - Medium</option> 
        <option value="Womens Tank Purple Large">Women's Tank Purple - Large</option> 
        <option value="Womens Tank Purple XLarge">Women's Tank Purple - XLarge</option> 
        <option value="Womens Tank Purple 2XLarge">Women's Tank Purple - 2XLarge</option> 
        <option value="Mens Tank Blue Small">Men's Tank Blue - Small</option> 
        <option value="Mens Tank Blue Medium">Men's Tank Blue - Medium</option>  
        <option value="Mens Tank Blue Large"> Men's Tank Blue - Large</option>
        <option value="Mens Tank Blue XLarge">  Men's Tank Blue - XLarge</option> 
        <option value="Mens Tank Blue 2XLarge">Men's Tank Blue - 2XLarge</option>
        <option value="Mens Tank Heather Grey Small">Men's Tank Heather Grey - Small</option>
        <option value="Mens Tank Heather Grey Medium">Men's Tank Heather Grey - Medium</option> 
        <option value="Mens Tank Heather Grey Large">Men's Tank Heather Grey - Large</option>  
        <option value="Mens Tank Heather Grey XLarge">Men's Tank Heather Grey - XLarge</option>   
        <option value="Mens Tank Heather Grey 2XLarge">Men's Tank Heather Grey - 2XLarge</option>   
        <option value="Mens Tank Purple Small">Men's Tank Purple - Small</option> 
        <option value="Mens Tank Purple Medium">Men's Tank Purple - Medium</option> 
        <option value="Mens Tank Purple Large">Men's Tank Purple - Large</option> 
        <option value="Mens Tank Purple XLarge">Men's Tank Purple - Xlarge</option>
        <option value="Mens Tank Purple 2XLarge">Men's Tank Purple - 2XLarge</option>
		      </select></td>
    </tr>
  <tr>
    <td width="139" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*Address&nbsp; </span></td>
    <td width="210" bgcolor="#3E3E3E"><input name="cpt_address" type="text" id="cpt_address" tabindex="8" size="25" maxlength="50" /></td>
    <td width="60" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		8</div></td>
    <td width="150" bgcolor="#3E3E3E"><span class="style2">
      <input name="player8_name" type="text" id="player8_name" tabindex="44" size="20" maxlength="50" /></span></td>
    <td width="176" bgcolor="#3E3E3E"><input name="player8_email" type="text" id="player8_email" tabindex="45" size="24" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span>
      <select name="player8_shirt" id="player8_shirt" tabindex="46">
        <option value="-1" >- Select Size and Option -</option>
        <option value="Unisex Small Athletic Orange">Unisex Small - Athletic Orange</option>
		<option value="Unisex Medium Athletic Orange">Unisex Medium - Athletic Orange</option>
		<option value="Unisex Large Athletic Orange">Unisex Large - Athletic Orange</option>
		<option value="Unisex XLarge Athletic Orange">Unisex XLarge - Athletic Orange</option>
		<option value="Unisex 2XLarge  Athletic Orange">Unisex 2XLarge -  Athletic Orange</option>
		<option value="Unisex 3XLarge Athletic Orange">Unisex 3XLarge - Athletic Orange</option>
		<option value="Unisex Small Aquatic Blue">Unisex Small - Aquatic Blue</option>
		<option value="Unisex Medium Aquatic Blue">Unisex Medium - Aquatic Blue</option>
		<option value="Unisex Large Aquatic Blue">Unisex Large - Aquatic Blue</option>
		<option value="Unisex XLarge Aquatic Blue">Unisex XLarge - Aquatic Blue</option>
		<option value="Unisex 2XLarge  Aquatic Blue">Unisex 2XLarge -  Aquatic Blue</option>
		<option value="Unisex 3XLarge Aquatic Blue">Unisex 3XLarge - Aquatic Blue</option>
		<option value="Unisex Small Black">Unisex Small - Black</option>
		<option value="Unisex Medium Black">Unisex Medium - Black</option>
		<option value="Unisex Large Black">Unisex Large - Black</option>
		<option value="Unisex XLarge Black">Unisex XLarge - Black</option>
		<option value="Unisex 2XLarge  Black">Unisex 2XLarge - Black</option>
		<option value="Unisex 3XLarge Black">Unisex 3XLarge - Black</option>
		<option value="Unisex Small Cardinal Red">Unisex Small - Cardinal Red</option>
		<option value="Unisex Medium Cardinal Red">Unisex Medium - Cardinal Red</option>
		<option value="Unisex Large Cardinal Red">Unisex Large - Cardinal Red</option>
		<option value="Unisex XLarge Cardinal Red">Unisex XLarge - Cardinal Red</option>
		<option value="Unisex 2XLarge Cardinal Red">Unisex 2XLarge - Cardinal Red</option>
		<option value="Unisex 3XLarge Cardinal Red">Unisex 3XLarge - Cardinal Red</option>
		<option value="Unisex Small Gold">Unisex Small - Gold</option>
		<option value="Unisex Medium Gold">Unisex Medium - Gold</option>
		<option value="Unisex Large Gold">Unisex Large - Gold</option>
		<option value="Unisex XLarge Gold">Unisex XLarge - Gold</option>
		<option value="Unisex 2XLarge Gold">Unisex 2XLarge - Gold</option>
		<option value="Unisex 3XLarge Gold">Unisex 3XLarge - Gold</option>
		<option value="Unisex Small Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Medium Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Large Light Steel">Unisex Large - Light Steel</option>
		<option value="Unisex XLarge Light Steel">Unisex XLarge - Light Steel</option>
		<option value="Unisex 2XLarge Light Steel">Unisex 2XLarge - Light Steel</option>
		<option value="Unisex 3XLarge Light Steel">Unisex 3XLarge - Light Steel</option>
		<option value="Unisex Small Pink">Unisex Small - Pink</option>
		<option value="Unisex Medium Pink">Unisex Medium - Pink</option>
		<option value="Unisex Large Pink">Unisex Large - Pink</option>
		<option value="Unisex XLarge Pink">Unisex XLarge - Pink</option>
		<option value="Unisex 2XLarge Pink">Unisex 2XLarge - Pink</option> 
		<option value="Unisex 3XLarge Pink">Unisex 3XLarge Pink</option>
		<option value="Unisex Small Purple">Unisex Small - Purple</option>
		<option value="Unisex Medium Purple">Unisex Medium - Purple</option>
        <option value="Unisex Large Purple">Unisex Large - Purple</option>
        <option value="Unisex XLarge Purple">Unisex XLarge - Purple</option>
        <option value="Unisex 2XLarge Purple">Unisex 2XLarge - Purple</option>
        <option value="Unisex 3XLarge Purple">Unisex 3XLarge Purple</option>
        <option value="Unisex Small Sand">Unisex Small - Sand</option>
        <option value="Unisex Medium Sand">Unisex Medium - Sand</option>
        <option value="Unisex Large Sand">Unisex Large - Sand</option>
        <option value="Unisex XLarge Sand">Unisex XLarge - Sand</option>
        <option value="Unisex 2XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex 3XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex Small Stonewash Green">Unisex Small - Stonewash Green</option>
        <option value="Unisex Medium Stonewash Green">Unisex Medium - Stonewash Green</option>
        <option value="Unisex Large Stonewash Green">Unisex Large - Stonewash Green</option>
        <option value="Unisex XLarge Stonewash Green">Unisex XLarge - Stonewash Green</option>
        <option value="Unisex 2XLarge Stonewash Green">Unisex 2XLarge - Stonewash Green</option>
        <option value="Unisex 3XLarge Stonewash Green">Unisex 3XLarge Stonewash Green</option>
        <option value="Womens Tank Blue Small">Women's Tank Blue - Small</option>
        <option value="Womens Tank Blue Medium">Women's Tank Blue - Medium</option>
        <option value="Womens Tank Blue Large ">Women's Tank Blue - Large</option> 
        <option value="Womens Tank Blue XLarge ">Women's Tank Blue - Xlarge</option>
        <option value="Womens Tank Blue 2XLarge">Women's Tank Blue - 2XLarge</option>
        <option value="Womens Tank Heather Grey Small">Women's Tank Heather Grey - Small</option>
        <option value="Womens Tank Heather Grey Medium">Women's Tank Heather Grey - Medium</option>
        <option value="Womens Tank Heather Grey Large">Women's Tank Heather Grey - Large</option>
        <option value="Womens Tank Heather Grey XLarge">Women's Tank Heather Grey - Xlarge</option>
        <option value="Womens Tank Heather Grey 2XLarge">Women's Tank Heather Grey - 2XLarge</option>
        <option value="Womens Tank Pink Small">Women's Tank Pink - Small</option>
        <option value="Womens Tank Pink Medium">Women's Tank Pink - Medium</option> 
        <option value="Womens Tank Pink Large">Women's Tank Pink - Large</option>
        <option value="Womens Tank Pink XLarge">Women's Tank Pink - XLarge</option>
        <option value="Womens Tank Pink 2XLarge">Women's Tank Pink - 2XLarge</option> 
        <option value="Womens Tank Purple Small">Women's Tank Purple - Small</option>
        <option value="Womens Tank Purple Medium">Women's Tank Purple - Medium</option> 
        <option value="Womens Tank Purple Large">Women's Tank Purple - Large</option> 
        <option value="Womens Tank Purple XLarge">Women's Tank Purple - XLarge</option> 
        <option value="Womens Tank Purple 2XLarge">Women's Tank Purple - 2XLarge</option> 
        <option value="Mens Tank Blue Small">Men's Tank Blue - Small</option> 
        <option value="Mens Tank Blue Medium">Men's Tank Blue - Medium</option>  
        <option value="Mens Tank Blue Large"> Men's Tank Blue - Large</option>
        <option value="Mens Tank Blue XLarge">  Men's Tank Blue - XLarge</option> 
        <option value="Mens Tank Blue 2XLarge">Men's Tank Blue - 2XLarge</option>
        <option value="Mens Tank Heather Grey Small">Men's Tank Heather Grey - Small</option>
        <option value="Mens Tank Heather Grey Medium">Men's Tank Heather Grey - Medium</option> 
        <option value="Mens Tank Heather Grey Large">Men's Tank Heather Grey - Large</option>  
        <option value="Mens Tank Heather Grey XLarge">Men's Tank Heather Grey - XLarge</option>   
        <option value="Mens Tank Heather Grey 2XLarge">Men's Tank Heather Grey - 2XLarge</option>   
        <option value="Mens Tank Purple Small">Men's Tank Purple - Small</option> 
        <option value="Mens Tank Purple Medium">Men's Tank Purple - Medium</option> 
        <option value="Mens Tank Purple Large">Men's Tank Purple - Large</option> 
        <option value="Mens Tank Purple XLarge">Men's Tank Purple - Xlarge</option>
        <option value="Mens Tank Purple 2XLarge">Men's Tank Purple - 2XLarge</option>
		      </select></td>
    </tr>
  <tr>
    <td width="139" height="24" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*City&nbsp; </span></td>
    <td width="210" bgcolor="#3E3E3E"><input name="cpt_city" type="text" id="cpt_city" tabindex="9" size="25" maxlength="25" /></td>
    <td width="60" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		9</div></td>
    <td width="150" bgcolor="#3E3E3E"><span class="style2">
      <input name="player9_name" type="text" id="player9_name" tabindex="48" size="20" maxlength="50" /></span></td>
    <td width="176" bgcolor="#3E3E3E"><input name="player9_email" type="text" id="player9_email" tabindex="49" size="24" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span>
      <select name="player9_shirt" id="player9_shirt" tabindex="50">
        <option value="-1" >- Select Size and Option -</option>
        <option value="Unisex Small Athletic Orange">Unisex Small - Athletic Orange</option>
		<option value="Unisex Medium Athletic Orange">Unisex Medium - Athletic Orange</option>
		<option value="Unisex Large Athletic Orange">Unisex Large - Athletic Orange</option>
		<option value="Unisex XLarge Athletic Orange">Unisex XLarge - Athletic Orange</option>
		<option value="Unisex 2XLarge  Athletic Orange">Unisex 2XLarge -  Athletic Orange</option>
		<option value="Unisex 3XLarge Athletic Orange">Unisex 3XLarge - Athletic Orange</option>
		<option value="Unisex Small Aquatic Blue">Unisex Small - Aquatic Blue</option>
		<option value="Unisex Medium Aquatic Blue">Unisex Medium - Aquatic Blue</option>
		<option value="Unisex Large Aquatic Blue">Unisex Large - Aquatic Blue</option>
		<option value="Unisex XLarge Aquatic Blue">Unisex XLarge - Aquatic Blue</option>
		<option value="Unisex 2XLarge  Aquatic Blue">Unisex 2XLarge -  Aquatic Blue</option>
		<option value="Unisex 3XLarge Aquatic Blue">Unisex 3XLarge - Aquatic Blue</option>
		<option value="Unisex Small Black">Unisex Small - Black</option>
		<option value="Unisex Medium Black">Unisex Medium - Black</option>
		<option value="Unisex Large Black">Unisex Large - Black</option>
		<option value="Unisex XLarge Black">Unisex XLarge - Black</option>
		<option value="Unisex 2XLarge  Black">Unisex 2XLarge - Black</option>
		<option value="Unisex 3XLarge Black">Unisex 3XLarge - Black</option>
		<option value="Unisex Small Cardinal Red">Unisex Small - Cardinal Red</option>
		<option value="Unisex Medium Cardinal Red">Unisex Medium - Cardinal Red</option>
		<option value="Unisex Large Cardinal Red">Unisex Large - Cardinal Red</option>
		<option value="Unisex XLarge Cardinal Red">Unisex XLarge - Cardinal Red</option>
		<option value="Unisex 2XLarge Cardinal Red">Unisex 2XLarge - Cardinal Red</option>
		<option value="Unisex 3XLarge Cardinal Red">Unisex 3XLarge - Cardinal Red</option>
		<option value="Unisex Small Gold">Unisex Small - Gold</option>
		<option value="Unisex Medium Gold">Unisex Medium - Gold</option>
		<option value="Unisex Large Gold">Unisex Large - Gold</option>
		<option value="Unisex XLarge Gold">Unisex XLarge - Gold</option>
		<option value="Unisex 2XLarge Gold">Unisex 2XLarge - Gold</option>
		<option value="Unisex 3XLarge Gold">Unisex 3XLarge - Gold</option>
		<option value="Unisex Small Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Medium Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Large Light Steel">Unisex Large - Light Steel</option>
		<option value="Unisex XLarge Light Steel">Unisex XLarge - Light Steel</option>
		<option value="Unisex 2XLarge Light Steel">Unisex 2XLarge - Light Steel</option>
		<option value="Unisex 3XLarge Light Steel">Unisex 3XLarge - Light Steel</option>
		<option value="Unisex Small Pink">Unisex Small - Pink</option>
		<option value="Unisex Medium Pink">Unisex Medium - Pink</option>
		<option value="Unisex Large Pink">Unisex Large - Pink</option>
		<option value="Unisex XLarge Pink">Unisex XLarge - Pink</option>
		<option value="Unisex 2XLarge Pink">Unisex 2XLarge - Pink</option> 
		<option value="Unisex 3XLarge Pink">Unisex 3XLarge Pink</option>
		<option value="Unisex Small Purple">Unisex Small - Purple</option>
		<option value="Unisex Medium Purple">Unisex Medium - Purple</option>
        <option value="Unisex Large Purple">Unisex Large - Purple</option>
        <option value="Unisex XLarge Purple">Unisex XLarge - Purple</option>
        <option value="Unisex 2XLarge Purple">Unisex 2XLarge - Purple</option>
        <option value="Unisex 3XLarge Purple">Unisex 3XLarge Purple</option>
        <option value="Unisex Small Sand">Unisex Small - Sand</option>
        <option value="Unisex Medium Sand">Unisex Medium - Sand</option>
        <option value="Unisex Large Sand">Unisex Large - Sand</option>
        <option value="Unisex XLarge Sand">Unisex XLarge - Sand</option>
        <option value="Unisex 2XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex 3XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex Small Stonewash Green">Unisex Small - Stonewash Green</option>
        <option value="Unisex Medium Stonewash Green">Unisex Medium - Stonewash Green</option>
        <option value="Unisex Large Stonewash Green">Unisex Large - Stonewash Green</option>
        <option value="Unisex XLarge Stonewash Green">Unisex XLarge - Stonewash Green</option>
        <option value="Unisex 2XLarge Stonewash Green">Unisex 2XLarge - Stonewash Green</option>
        <option value="Unisex 3XLarge Stonewash Green">Unisex 3XLarge Stonewash Green</option>
        <option value="Womens Tank Blue Small">Women's Tank Blue - Small</option>
        <option value="Womens Tank Blue Medium">Women's Tank Blue - Medium</option>
        <option value="Womens Tank Blue Large ">Women's Tank Blue - Large</option> 
        <option value="Womens Tank Blue XLarge ">Women's Tank Blue - Xlarge</option>
        <option value="Womens Tank Blue 2XLarge">Women's Tank Blue - 2XLarge</option>
        <option value="Womens Tank Heather Grey Small">Women's Tank Heather Grey - Small</option>
        <option value="Womens Tank Heather Grey Medium">Women's Tank Heather Grey - Medium</option>
        <option value="Womens Tank Heather Grey Large">Women's Tank Heather Grey - Large</option>
        <option value="Womens Tank Heather Grey XLarge">Women's Tank Heather Grey - Xlarge</option>
        <option value="Womens Tank Heather Grey 2XLarge">Women's Tank Heather Grey - 2XLarge</option>
        <option value="Womens Tank Pink Small">Women's Tank Pink - Small</option>
        <option value="Womens Tank Pink Medium">Women's Tank Pink - Medium</option> 
        <option value="Womens Tank Pink Large">Women's Tank Pink - Large</option>
        <option value="Womens Tank Pink XLarge">Women's Tank Pink - XLarge</option>
        <option value="Womens Tank Pink 2XLarge">Women's Tank Pink - 2XLarge</option> 
        <option value="Womens Tank Purple Small">Women's Tank Purple - Small</option>
        <option value="Womens Tank Purple Medium">Women's Tank Purple - Medium</option> 
        <option value="Womens Tank Purple Large">Women's Tank Purple - Large</option> 
        <option value="Womens Tank Purple XLarge">Women's Tank Purple - XLarge</option> 
        <option value="Womens Tank Purple 2XLarge">Women's Tank Purple - 2XLarge</option> 
        <option value="Mens Tank Blue Small">Men's Tank Blue - Small</option> 
        <option value="Mens Tank Blue Medium">Men's Tank Blue - Medium</option>  
        <option value="Mens Tank Blue Large"> Men's Tank Blue - Large</option>
        <option value="Mens Tank Blue XLarge">  Men's Tank Blue - XLarge</option> 
        <option value="Mens Tank Blue 2XLarge">Men's Tank Blue - 2XLarge</option>
        <option value="Mens Tank Heather Grey Small">Men's Tank Heather Grey - Small</option>
        <option value="Mens Tank Heather Grey Medium">Men's Tank Heather Grey - Medium</option> 
        <option value="Mens Tank Heather Grey Large">Men's Tank Heather Grey - Large</option>  
        <option value="Mens Tank Heather Grey XLarge">Men's Tank Heather Grey - XLarge</option>   
        <option value="Mens Tank Heather Grey 2XLarge">Men's Tank Heather Grey - 2XLarge</option>   
        <option value="Mens Tank Purple Small">Men's Tank Purple - Small</option> 
        <option value="Mens Tank Purple Medium">Men's Tank Purple - Medium</option> 
        <option value="Mens Tank Purple Large">Men's Tank Purple - Large</option> 
        <option value="Mens Tank Purple XLarge">Men's Tank Purple - Xlarge</option>
        <option value="Mens Tank Purple 2XLarge">Men's Tank Purple - 2XLarge</option>
		      </select></td>
    </tr>
  <tr>
    <td width="139" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*State&nbsp; </span></td>
    <td width="210" bgcolor="#3E3E3E">
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
    <td width="60" bgcolor="#3E3E3E"><div align="center" class="style18">Player 
		10</div></td>
    <td width="150" bgcolor="#3E3E3E"><span class="style2">
      <input name="player10_name" type="text" id="player10_name" tabindex="52" size="20" maxlength="50" /></span></td>
    <td width="176" bgcolor="#3E3E3E"><input name="player10_email" type="text" id="player10_email" tabindex="53" size="24" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span>
      <select name="player10_shirt" id="player10_shirt" tabindex="54">
        <option value="-1" >- Select Size and Option -</option>
        <option value="Unisex Small Athletic Orange">Unisex Small - Athletic Orange</option>
		<option value="Unisex Medium Athletic Orange">Unisex Medium - Athletic Orange</option>
		<option value="Unisex Large Athletic Orange">Unisex Large - Athletic Orange</option>
		<option value="Unisex XLarge Athletic Orange">Unisex XLarge - Athletic Orange</option>
		<option value="Unisex 2XLarge  Athletic Orange">Unisex 2XLarge -  Athletic Orange</option>
		<option value="Unisex 3XLarge Athletic Orange">Unisex 3XLarge - Athletic Orange</option>
		<option value="Unisex Small Aquatic Blue">Unisex Small - Aquatic Blue</option>
		<option value="Unisex Medium Aquatic Blue">Unisex Medium - Aquatic Blue</option>
		<option value="Unisex Large Aquatic Blue">Unisex Large - Aquatic Blue</option>
		<option value="Unisex XLarge Aquatic Blue">Unisex XLarge - Aquatic Blue</option>
		<option value="Unisex 2XLarge  Aquatic Blue">Unisex 2XLarge -  Aquatic Blue</option>
		<option value="Unisex 3XLarge Aquatic Blue">Unisex 3XLarge - Aquatic Blue</option>
		<option value="Unisex Small Black">Unisex Small - Black</option>
		<option value="Unisex Medium Black">Unisex Medium - Black</option>
		<option value="Unisex Large Black">Unisex Large - Black</option>
		<option value="Unisex XLarge Black">Unisex XLarge - Black</option>
		<option value="Unisex 2XLarge  Black">Unisex 2XLarge - Black</option>
		<option value="Unisex 3XLarge Black">Unisex 3XLarge - Black</option>
		<option value="Unisex Small Cardinal Red">Unisex Small - Cardinal Red</option>
		<option value="Unisex Medium Cardinal Red">Unisex Medium - Cardinal Red</option>
		<option value="Unisex Large Cardinal Red">Unisex Large - Cardinal Red</option>
		<option value="Unisex XLarge Cardinal Red">Unisex XLarge - Cardinal Red</option>
		<option value="Unisex 2XLarge Cardinal Red">Unisex 2XLarge - Cardinal Red</option>
		<option value="Unisex 3XLarge Cardinal Red">Unisex 3XLarge - Cardinal Red</option>
		<option value="Unisex Small Gold">Unisex Small - Gold</option>
		<option value="Unisex Medium Gold">Unisex Medium - Gold</option>
		<option value="Unisex Large Gold">Unisex Large - Gold</option>
		<option value="Unisex XLarge Gold">Unisex XLarge - Gold</option>
		<option value="Unisex 2XLarge Gold">Unisex 2XLarge - Gold</option>
		<option value="Unisex 3XLarge Gold">Unisex 3XLarge - Gold</option>
		<option value="Unisex Small Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Medium Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Large Light Steel">Unisex Large - Light Steel</option>
		<option value="Unisex XLarge Light Steel">Unisex XLarge - Light Steel</option>
		<option value="Unisex 2XLarge Light Steel">Unisex 2XLarge - Light Steel</option>
		<option value="Unisex 3XLarge Light Steel">Unisex 3XLarge - Light Steel</option>
		<option value="Unisex Small Pink">Unisex Small - Pink</option>
		<option value="Unisex Medium Pink">Unisex Medium - Pink</option>
		<option value="Unisex Large Pink">Unisex Large - Pink</option>
		<option value="Unisex XLarge Pink">Unisex XLarge - Pink</option>
		<option value="Unisex 2XLarge Pink">Unisex 2XLarge - Pink</option> 
		<option value="Unisex 3XLarge Pink">Unisex 3XLarge Pink</option>
		<option value="Unisex Small Purple">Unisex Small - Purple</option>
		<option value="Unisex Medium Purple">Unisex Medium - Purple</option>
        <option value="Unisex Large Purple">Unisex Large - Purple</option>
        <option value="Unisex XLarge Purple">Unisex XLarge - Purple</option>
        <option value="Unisex 2XLarge Purple">Unisex 2XLarge - Purple</option>
        <option value="Unisex 3XLarge Purple">Unisex 3XLarge Purple</option>
        <option value="Unisex Small Sand">Unisex Small - Sand</option>
        <option value="Unisex Medium Sand">Unisex Medium - Sand</option>
        <option value="Unisex Large Sand">Unisex Large - Sand</option>
        <option value="Unisex XLarge Sand">Unisex XLarge - Sand</option>
        <option value="Unisex 2XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex 3XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex Small Stonewash Green">Unisex Small - Stonewash Green</option>
        <option value="Unisex Medium Stonewash Green">Unisex Medium - Stonewash Green</option>
        <option value="Unisex Large Stonewash Green">Unisex Large - Stonewash Green</option>
        <option value="Unisex XLarge Stonewash Green">Unisex XLarge - Stonewash Green</option>
        <option value="Unisex 2XLarge Stonewash Green">Unisex 2XLarge - Stonewash Green</option>
        <option value="Unisex 3XLarge Stonewash Green">Unisex 3XLarge Stonewash Green</option>
        <option value="Womens Tank Blue Small">Women's Tank Blue - Small</option>
        <option value="Womens Tank Blue Medium">Women's Tank Blue - Medium</option>
        <option value="Womens Tank Blue Large ">Women's Tank Blue - Large</option> 
        <option value="Womens Tank Blue XLarge ">Women's Tank Blue - Xlarge</option>
        <option value="Womens Tank Blue 2XLarge">Women's Tank Blue - 2XLarge</option>
        <option value="Womens Tank Heather Grey Small">Women's Tank Heather Grey - Small</option>
        <option value="Womens Tank Heather Grey Medium">Women's Tank Heather Grey - Medium</option>
        <option value="Womens Tank Heather Grey Large">Women's Tank Heather Grey - Large</option>
        <option value="Womens Tank Heather Grey XLarge">Women's Tank Heather Grey - Xlarge</option>
        <option value="Womens Tank Heather Grey 2XLarge">Women's Tank Heather Grey - 2XLarge</option>
        <option value="Womens Tank Pink Small">Women's Tank Pink - Small</option>
        <option value="Womens Tank Pink Medium">Women's Tank Pink - Medium</option> 
        <option value="Womens Tank Pink Large">Women's Tank Pink - Large</option>
        <option value="Womens Tank Pink XLarge">Women's Tank Pink - XLarge</option>
        <option value="Womens Tank Pink 2XLarge">Women's Tank Pink - 2XLarge</option> 
        <option value="Womens Tank Purple Small">Women's Tank Purple - Small</option>
        <option value="Womens Tank Purple Medium">Women's Tank Purple - Medium</option> 
        <option value="Womens Tank Purple Large">Women's Tank Purple - Large</option> 
        <option value="Womens Tank Purple XLarge">Women's Tank Purple - XLarge</option> 
        <option value="Womens Tank Purple 2XLarge">Women's Tank Purple - 2XLarge</option> 
        <option value="Mens Tank Blue Small">Men's Tank Blue - Small</option> 
        <option value="Mens Tank Blue Medium">Men's Tank Blue - Medium</option>  
        <option value="Mens Tank Blue Large"> Men's Tank Blue - Large</option>
        <option value="Mens Tank Blue XLarge">  Men's Tank Blue - XLarge</option> 
        <option value="Mens Tank Blue 2XLarge">Men's Tank Blue - 2XLarge</option>
        <option value="Mens Tank Heather Grey Small">Men's Tank Heather Grey - Small</option>
        <option value="Mens Tank Heather Grey Medium">Men's Tank Heather Grey - Medium</option> 
        <option value="Mens Tank Heather Grey Large">Men's Tank Heather Grey - Large</option>  
        <option value="Mens Tank Heather Grey XLarge">Men's Tank Heather Grey - XLarge</option>   
        <option value="Mens Tank Heather Grey 2XLarge">Men's Tank Heather Grey - 2XLarge</option>   
        <option value="Mens Tank Purple Small">Men's Tank Purple - Small</option> 
        <option value="Mens Tank Purple Medium">Men's Tank Purple - Medium</option> 
        <option value="Mens Tank Purple Large">Men's Tank Purple - Large</option> 
        <option value="Mens Tank Purple XLarge">Men's Tank Purple - Xlarge</option>
        <option value="Mens Tank Purple 2XLarge">Men's Tank Purple - 2XLarge</option>
    </tr>
  <tr>
    <td width="139" align="right" bgcolor="#3E3E3E"><span class="style37"> *Zip&nbsp; </span></td>
    <td width="210" bgcolor="#3E3E3E"><input name="cpt_zip" type="text" id="cpt_zip" tabindex="11" size="10" maxlength="10" /></td>
    <td bgcolor="#3E3E3E"><div align="center" class="style18">Player 11</div></td>
    <td bgcolor="#3E3E3E"><span class="style2">
      <input name="player11_name" type="text" id="player11_name" tabindex="56" size="20" maxlength="50" />
    </span></td>
    <td bgcolor="#3E3E3E"><input name="player11_email" type="text" id="player11_email" tabindex="57" size="24" maxlength="40" /></td>
    <td bgcolor="#3E3E3E"><span>
      <select name="player11_shirt" id="player11_shirt" tabindex="58">
        <option value="-1" >- Select Size and Option -</option>
        <option value="Unisex Small Athletic Orange">Unisex Small - Athletic Orange</option>
		<option value="Unisex Medium Athletic Orange">Unisex Medium - Athletic Orange</option>
		<option value="Unisex Large Athletic Orange">Unisex Large - Athletic Orange</option>
		<option value="Unisex XLarge Athletic Orange">Unisex XLarge - Athletic Orange</option>
		<option value="Unisex 2XLarge  Athletic Orange">Unisex 2XLarge -  Athletic Orange</option>
		<option value="Unisex 3XLarge Athletic Orange">Unisex 3XLarge - Athletic Orange</option>
		<option value="Unisex Small Aquatic Blue">Unisex Small - Aquatic Blue</option>
		<option value="Unisex Medium Aquatic Blue">Unisex Medium - Aquatic Blue</option>
		<option value="Unisex Large Aquatic Blue">Unisex Large - Aquatic Blue</option>
		<option value="Unisex XLarge Aquatic Blue">Unisex XLarge - Aquatic Blue</option>
		<option value="Unisex 2XLarge  Aquatic Blue">Unisex 2XLarge -  Aquatic Blue</option>
		<option value="Unisex 3XLarge Aquatic Blue">Unisex 3XLarge - Aquatic Blue</option>
		<option value="Unisex Small Black">Unisex Small - Black</option>
		<option value="Unisex Medium Black">Unisex Medium - Black</option>
		<option value="Unisex Large Black">Unisex Large - Black</option>
		<option value="Unisex XLarge Black">Unisex XLarge - Black</option>
		<option value="Unisex 2XLarge  Black">Unisex 2XLarge - Black</option>
		<option value="Unisex 3XLarge Black">Unisex 3XLarge - Black</option>
		<option value="Unisex Small Cardinal Red">Unisex Small - Cardinal Red</option>
		<option value="Unisex Medium Cardinal Red">Unisex Medium - Cardinal Red</option>
		<option value="Unisex Large Cardinal Red">Unisex Large - Cardinal Red</option>
		<option value="Unisex XLarge Cardinal Red">Unisex XLarge - Cardinal Red</option>
		<option value="Unisex 2XLarge Cardinal Red">Unisex 2XLarge - Cardinal Red</option>
		<option value="Unisex 3XLarge Cardinal Red">Unisex 3XLarge - Cardinal Red</option>
		<option value="Unisex Small Gold">Unisex Small - Gold</option>
		<option value="Unisex Medium Gold">Unisex Medium - Gold</option>
		<option value="Unisex Large Gold">Unisex Large - Gold</option>
		<option value="Unisex XLarge Gold">Unisex XLarge - Gold</option>
		<option value="Unisex 2XLarge Gold">Unisex 2XLarge - Gold</option>
		<option value="Unisex 3XLarge Gold">Unisex 3XLarge - Gold</option>
		<option value="Unisex Small Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Medium Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Large Light Steel">Unisex Large - Light Steel</option>
		<option value="Unisex XLarge Light Steel">Unisex XLarge - Light Steel</option>
		<option value="Unisex 2XLarge Light Steel">Unisex 2XLarge - Light Steel</option>
		<option value="Unisex 3XLarge Light Steel">Unisex 3XLarge - Light Steel</option>
		<option value="Unisex Small Pink">Unisex Small - Pink</option>
		<option value="Unisex Medium Pink">Unisex Medium - Pink</option>
		<option value="Unisex Large Pink">Unisex Large - Pink</option>
		<option value="Unisex XLarge Pink">Unisex XLarge - Pink</option>
		<option value="Unisex 2XLarge Pink">Unisex 2XLarge - Pink</option> 
		<option value="Unisex 3XLarge Pink">Unisex 3XLarge Pink</option>
		<option value="Unisex Small Purple">Unisex Small - Purple</option>
		<option value="Unisex Medium Purple">Unisex Medium - Purple</option>
        <option value="Unisex Large Purple">Unisex Large - Purple</option>
        <option value="Unisex XLarge Purple">Unisex XLarge - Purple</option>
        <option value="Unisex 2XLarge Purple">Unisex 2XLarge - Purple</option>
        <option value="Unisex 3XLarge Purple">Unisex 3XLarge Purple</option>
        <option value="Unisex Small Sand">Unisex Small - Sand</option>
        <option value="Unisex Medium Sand">Unisex Medium - Sand</option>
        <option value="Unisex Large Sand">Unisex Large - Sand</option>
        <option value="Unisex XLarge Sand">Unisex XLarge - Sand</option>
        <option value="Unisex 2XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex 3XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex Small Stonewash Green">Unisex Small - Stonewash Green</option>
        <option value="Unisex Medium Stonewash Green">Unisex Medium - Stonewash Green</option>
        <option value="Unisex Large Stonewash Green">Unisex Large - Stonewash Green</option>
        <option value="Unisex XLarge Stonewash Green">Unisex XLarge - Stonewash Green</option>
        <option value="Unisex 2XLarge Stonewash Green">Unisex 2XLarge - Stonewash Green</option>
        <option value="Unisex 3XLarge Stonewash Green">Unisex 3XLarge Stonewash Green</option>
        <option value="Womens Tank Blue Small">Women's Tank Blue - Small</option>
        <option value="Womens Tank Blue Medium">Women's Tank Blue - Medium</option>
        <option value="Womens Tank Blue Large ">Women's Tank Blue - Large</option> 
        <option value="Womens Tank Blue XLarge ">Women's Tank Blue - Xlarge</option>
        <option value="Womens Tank Blue 2XLarge">Women's Tank Blue - 2XLarge</option>
        <option value="Womens Tank Heather Grey Small">Women's Tank Heather Grey - Small</option>
        <option value="Womens Tank Heather Grey Medium">Women's Tank Heather Grey - Medium</option>
        <option value="Womens Tank Heather Grey Large">Women's Tank Heather Grey - Large</option>
        <option value="Womens Tank Heather Grey XLarge">Women's Tank Heather Grey - Xlarge</option>
        <option value="Womens Tank Heather Grey 2XLarge">Women's Tank Heather Grey - 2XLarge</option>
        <option value="Womens Tank Pink Small">Women's Tank Pink - Small</option>
        <option value="Womens Tank Pink Medium">Women's Tank Pink - Medium</option> 
        <option value="Womens Tank Pink Large">Women's Tank Pink - Large</option>
        <option value="Womens Tank Pink XLarge">Women's Tank Pink - XLarge</option>
        <option value="Womens Tank Pink 2XLarge">Women's Tank Pink - 2XLarge</option> 
        <option value="Womens Tank Purple Small">Women's Tank Purple - Small</option>
        <option value="Womens Tank Purple Medium">Women's Tank Purple - Medium</option> 
        <option value="Womens Tank Purple Large">Women's Tank Purple - Large</option> 
        <option value="Womens Tank Purple XLarge">Women's Tank Purple - XLarge</option> 
        <option value="Womens Tank Purple 2XLarge">Women's Tank Purple - 2XLarge</option> 
        <option value="Mens Tank Blue Small">Men's Tank Blue - Small</option> 
        <option value="Mens Tank Blue Medium">Men's Tank Blue - Medium</option>  
        <option value="Mens Tank Blue Large"> Men's Tank Blue - Large</option>
        <option value="Mens Tank Blue XLarge">  Men's Tank Blue - XLarge</option> 
        <option value="Mens Tank Blue 2XLarge">Men's Tank Blue - 2XLarge</option>
        <option value="Mens Tank Heather Grey Small">Men's Tank Heather Grey - Small</option>
        <option value="Mens Tank Heather Grey Medium">Men's Tank Heather Grey - Medium</option> 
        <option value="Mens Tank Heather Grey Large">Men's Tank Heather Grey - Large</option>  
        <option value="Mens Tank Heather Grey XLarge">Men's Tank Heather Grey - XLarge</option>   
        <option value="Mens Tank Heather Grey 2XLarge">Men's Tank Heather Grey - 2XLarge</option>   
        <option value="Mens Tank Purple Small">Men's Tank Purple - Small</option> 
        <option value="Mens Tank Purple Medium">Men's Tank Purple - Medium</option> 
        <option value="Mens Tank Purple Large">Men's Tank Purple - Large</option> 
        <option value="Mens Tank Purple XLarge">Men's Tank Purple - Xlarge</option>
        <option value="Mens Tank Purple 2XLarge">Men's Tank Purple - 2XLarge</option>
		      </select></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#3E3E3E"><span class="style37"> *Phone&nbsp; </span></td>
    <td bgcolor="#3E3E3E"><span class="style22">
      <input name="cpt_phone" type="text" id="cpt_phone" tabindex="12" size="14" maxlength="14" />
    </span></td>
    <td colspan="3" rowspan="4" bgcolor="#000000"><div align="right"></div></td>
    <td rowspan="4" bgcolor="#000000"><div align="center">
      <input name="Submit" type="submit" tabindex="60" value="Register" />
    </div></td>
    </tr>
  <tr>
    <td width="139" align="right" bgcolor="#3E3E3E"><span class="style37"> 
	*Email&nbsp; </span></td>
    <td width="210" bgcolor="#3E3E3E"><input name="cpt_email" type="text" id="cpt_email" tabindex="13" size="25" maxlength="40" /></td>
    </tr>
  <tr>
    <td align="right" bgcolor="#3E3E3E"><span class="style37"> *T-Shirt Size&nbsp; </span></td>
    <td bgcolor="#3E3E3E"><select name="cpt_shirtsize" id="cpt_shirtsize" tabindex="14" size="1">
       <option value="-1" >- Select Size and Option -</option>
        <option value="Unisex Small Athletic Orange">Unisex Small - Athletic Orange</option>
		<option value="Unisex Medium Athletic Orange">Unisex Medium - Athletic Orange</option>
		<option value="Unisex Large Athletic Orange">Unisex Large - Athletic Orange</option>
		<option value="Unisex XLarge Athletic Orange">Unisex XLarge - Athletic Orange</option>
		<option value="Unisex 2XLarge  Athletic Orange">Unisex 2XLarge -  Athletic Orange</option>
		<option value="Unisex 3XLarge Athletic Orange">Unisex 3XLarge - Athletic Orange</option>
		<option value="Unisex Small Aquatic Blue">Unisex Small - Aquatic Blue</option>
		<option value="Unisex Medium Aquatic Blue">Unisex Medium - Aquatic Blue</option>
		<option value="Unisex Large Aquatic Blue">Unisex Large - Aquatic Blue</option>
		<option value="Unisex XLarge Aquatic Blue">Unisex XLarge - Aquatic Blue</option>
		<option value="Unisex 2XLarge  Aquatic Blue">Unisex 2XLarge -  Aquatic Blue</option>
		<option value="Unisex 3XLarge Aquatic Blue">Unisex 3XLarge - Aquatic Blue</option>
		<option value="Unisex Small Black">Unisex Small - Black</option>
		<option value="Unisex Medium Black">Unisex Medium - Black</option>
		<option value="Unisex Large Black">Unisex Large - Black</option>
		<option value="Unisex XLarge Black">Unisex XLarge - Black</option>
		<option value="Unisex 2XLarge  Black">Unisex 2XLarge - Black</option>
		<option value="Unisex 3XLarge Black">Unisex 3XLarge - Black</option>
		<option value="Unisex Small Cardinal Red">Unisex Small - Cardinal Red</option>
		<option value="Unisex Medium Cardinal Red">Unisex Medium - Cardinal Red</option>
		<option value="Unisex Large Cardinal Red">Unisex Large - Cardinal Red</option>
		<option value="Unisex XLarge Cardinal Red">Unisex XLarge - Cardinal Red</option>
		<option value="Unisex 2XLarge Cardinal Red">Unisex 2XLarge - Cardinal Red</option>
		<option value="Unisex 3XLarge Cardinal Red">Unisex 3XLarge - Cardinal Red</option>
		<option value="Unisex Small Gold">Unisex Small - Gold</option>
		<option value="Unisex Medium Gold">Unisex Medium - Gold</option>
		<option value="Unisex Large Gold">Unisex Large - Gold</option>
		<option value="Unisex XLarge Gold">Unisex XLarge - Gold</option>
		<option value="Unisex 2XLarge Gold">Unisex 2XLarge - Gold</option>
		<option value="Unisex 3XLarge Gold">Unisex 3XLarge - Gold</option>
		<option value="Unisex Small Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Medium Light Steel">Unisex Medium - Light Steel</option>
		<option value="Unisex Large Light Steel">Unisex Large - Light Steel</option>
		<option value="Unisex XLarge Light Steel">Unisex XLarge - Light Steel</option>
		<option value="Unisex 2XLarge Light Steel">Unisex 2XLarge - Light Steel</option>
		<option value="Unisex 3XLarge Light Steel">Unisex 3XLarge - Light Steel</option>
		<option value="Unisex Small Pink">Unisex Small - Pink</option>
		<option value="Unisex Medium Pink">Unisex Medium - Pink</option>
		<option value="Unisex Large Pink">Unisex Large - Pink</option>
		<option value="Unisex XLarge Pink">Unisex XLarge - Pink</option>
		<option value="Unisex 2XLarge Pink">Unisex 2XLarge - Pink</option> 
		<option value="Unisex 3XLarge Pink">Unisex 3XLarge Pink</option>
		<option value="Unisex Small Purple">Unisex Small - Purple</option>
		<option value="Unisex Medium Purple">Unisex Medium - Purple</option>
        <option value="Unisex Large Purple">Unisex Large - Purple</option>
        <option value="Unisex XLarge Purple">Unisex XLarge - Purple</option>
        <option value="Unisex 2XLarge Purple">Unisex 2XLarge - Purple</option>
        <option value="Unisex 3XLarge Purple">Unisex 3XLarge Purple</option>
        <option value="Unisex Small Sand">Unisex Small - Sand</option>
        <option value="Unisex Medium Sand">Unisex Medium - Sand</option>
        <option value="Unisex Large Sand">Unisex Large - Sand</option>
        <option value="Unisex XLarge Sand">Unisex XLarge - Sand</option>
        <option value="Unisex 2XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex 3XLarge Sand">Unisex 3XLarge Sand</option>
        <option value="Unisex Small Stonewash Green">Unisex Small - Stonewash Green</option>
        <option value="Unisex Medium Stonewash Green">Unisex Medium - Stonewash Green</option>
        <option value="Unisex Large Stonewash Green">Unisex Large - Stonewash Green</option>
        <option value="Unisex XLarge Stonewash Green">Unisex XLarge - Stonewash Green</option>
        <option value="Unisex 2XLarge Stonewash Green">Unisex 2XLarge - Stonewash Green</option>
        <option value="Unisex 3XLarge Stonewash Green">Unisex 3XLarge Stonewash Green</option>
        <option value="Womens Tank Blue Small">Women's Tank Blue - Small</option>
        <option value="Womens Tank Blue Medium">Women's Tank Blue - Medium</option>
        <option value="Womens Tank Blue Large ">Women's Tank Blue - Large</option> 
        <option value="Womens Tank Blue XLarge ">Women's Tank Blue - Xlarge</option>
        <option value="Womens Tank Blue 2XLarge">Women's Tank Blue - 2XLarge</option>
        <option value="Womens Tank Heather Grey Small">Women's Tank Heather Grey - Small</option>
        <option value="Womens Tank Heather Grey Medium">Women's Tank Heather Grey - Medium</option>
        <option value="Womens Tank Heather Grey Large">Women's Tank Heather Grey - Large</option>
        <option value="Womens Tank Heather Grey XLarge">Women's Tank Heather Grey - Xlarge</option>
        <option value="Womens Tank Heather Grey 2XLarge">Women's Tank Heather Grey - 2XLarge</option>
        <option value="Womens Tank Pink Small">Women's Tank Pink - Small</option>
        <option value="Womens Tank Pink Medium">Women's Tank Pink - Medium</option> 
        <option value="Womens Tank Pink Large">Women's Tank Pink - Large</option>
        <option value="Womens Tank Pink XLarge">Women's Tank Pink - XLarge</option>
        <option value="Womens Tank Pink 2XLarge">Women's Tank Pink - 2XLarge</option> 
        <option value="Womens Tank Purple Small">Women's Tank Purple - Small</option>
        <option value="Womens Tank Purple Medium">Women's Tank Purple - Medium</option> 
        <option value="Womens Tank Purple Large">Women's Tank Purple - Large</option> 
        <option value="Womens Tank Purple XLarge">Women's Tank Purple - XLarge</option> 
        <option value="Womens Tank Purple 2XLarge">Women's Tank Purple - 2XLarge</option> 
        <option value="Mens Tank Blue Small">Men's Tank Blue - Small</option> 
        <option value="Mens Tank Blue Medium">Men's Tank Blue - Medium</option>  
        <option value="Mens Tank Blue Large"> Men's Tank Blue - Large</option>
        <option value="Mens Tank Blue XLarge">  Men's Tank Blue - XLarge</option> 
        <option value="Mens Tank Blue 2XLarge">Men's Tank Blue - 2XLarge</option>
        <option value="Mens Tank Heather Grey Small">Men's Tank Heather Grey - Small</option>
        <option value="Mens Tank Heather Grey Medium">Men's Tank Heather Grey - Medium</option> 
        <option value="Mens Tank Heather Grey Large">Men's Tank Heather Grey - Large</option>  
        <option value="Mens Tank Heather Grey XLarge">Men's Tank Heather Grey - XLarge</option>   
        <option value="Mens Tank Heather Grey 2XLarge">Men's Tank Heather Grey - 2XLarge</option>   
        <option value="Mens Tank Purple Small">Men's Tank Purple - Small</option> 
        <option value="Mens Tank Purple Medium">Men's Tank Purple - Medium</option> 
        <option value="Mens Tank Purple Large">Men's Tank Purple - Large</option> 
        <option value="Mens Tank Purple XLarge">Men's Tank Purple - Xlarge</option>
        <option value="Mens Tank Purple 2XLarge">Men's Tank Purple - 2XLarge</option>
		      </select></td>
    </tr>
  <tr>
    <td colspan="2" align="right" bgcolor="#333333"><div align="center"><span class="style401">
		+Returning team captains are given priority only when they are the 
		returning team captain from the same team <strong>and</strong> division 
		from last year.</span></div></td>
  </table>
<br />
<table width="749" border="0" align="center">
  <tr>
    <td width="745"><div align="center"><span class="style38">Copyright © 1999 - 
        <?= date("Y") ?>   
        Baltimore Beach Volleyball Club. All rights reserved.</span><br />
        <span class="style38">Revised: March 04, 2014</span></div></td>
  </tr>
</table>
</form>
</body>
</html>
<?php mssqlclose(); ?>