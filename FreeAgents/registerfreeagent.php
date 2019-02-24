<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Free Agents Registration Page</title>
<meta name="description" content="Baltimore Beach Free Agents 2017 Registration Form">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://subscribers.myipblocker.com/MyIpBlocker?code=LcaBENjdb21jL5MCWFo77w"></script></script>
<script type="text/javascript" language="JavaScript1.2" src="stmenu.js"></script>
<base target="_blank"></head></script>


<style type="text/css">
	label.error {
		color:red;
	}
	input.error {
		border:1px solid red;
	}
</style>

<script type="text/javascript">
	$().ready(function () {
		// validate registration form on keyup and submit
		$("#registrationform").validate({
			rules: {
				name: {
					required: true,
					minlength: 2,
					maxlength: 50
				},
				gender: {
					required: true
				},
				agegroup: {
					required: true
				},
				email: {
					required: true,
					email: true
					<?php
					if (!isset($_REQUEST["email"])) {
					echo ',remote: "checkemail.php"';
					}
					?>
				},
				phone: {
					required: false,
					number: true
				},
				contact_type: { required: false },
				time2call: { required: false },
				comments: { maxlength: 250 }

			},
			messages: {

				name: {
					required: "Please enter a name",
					minlength: "Your name must consist of at least 2 characters",
					maxlength: "Your name must consist of not more than characters"
				},
				gender: {
					required: "Please select a gender"
				},
				agegroup: {
					required: "Please select an age group"
				},
				email: {
					required: "Please enter an email address",
					email: "Please enter a valid email address",
					remote: "Email has already been used to register as a free agent. Update:<a href=\"http://www.baltimorebeach.com/FreeAgents/sendlink.php\">here</a>"
				},
				phone: {
					required: "Please enter a phone number"
				},
				contact_type: {
					required: "Please select a type"
				},
				time2call: {
					required: "Please select a time to call"
				},
				comments: {
					maxlength: "Comments cannot exceed more than 250 characters"
				}
			}
		});
	});
</script>



<?php
	

	if (!isset($_REQUEST["email"])) {
		//new registration
		$idstring="";

	}
	else
	{
		//already registered
		
		$email = $_REQUEST["email"];	
		$email= str_replace("'", "''", $email);
		require_once('../database.php');
		$sql="select * from freeagents where email='".$email."'";
		$emailSearch = mssqlquery($sql);

		
		//email not found
		if (!mssqlhasrows($emailSearch))  {
			mssqlclose();
	
			//need to redirect to another page
			 header("Location: expiredlink.php");
			 exit();
		 }
		 
		$row = mssqlfetchassoc($emailSearch);
		mssqlclose();
		
		$salt=$row["fa_id"].".baltimorebeach.";
		$check=hash('ripemd160', $salt.$email); 
		
		$requestedcheck = $_REQUEST["check"];	
		if ($check!=$requestedcheck){
			 header("Location: expiredlink.php");
			 exit();
		}
		
		
		$idstring="?fa_id=".$row["fa_id"];
		
		?>
		<script type="text/javascript">

			$(document).ready(function() {
				$('#name').val("<?=$row["name"]?>");
				$('#gender').val("<?=$row["gender"]?>");
				$('#agegroup').val("<?=$row["agegroup"]?>");
				$('#email').val("<?=$row["email"]?>");
				$('#phone').val("<?=$row["phone"]?>");
				$('#contact_type').val("<?=$row["contact_type"]?>");
				$('#time2call').val("<?=$row["time2call"]?>");
				$('#comments').val("<?=$row["comments"]?>");
		
				if ("<?=$row["m2o"]?>"=="m2o"){ $('#m2o').prop('checked', true);}
				if ("<?=$row["m2a"]?>"=="m2a"){ $('#m2a').prop('checked', true);}
				if ("<?=$row["m2b"]?>"=="m2b"){ $('#m2b').prop('checked', true);}
				if ("<?=$row["m4a"]?>"=="m4a"){ $('#m4a').prop('checked', true);}
				if ("<?=$row["m4bb"]?>"=="m4bb"){ $('#m4bb').prop('checked', true);}
				if ("<?=$row["m4b"]?>"=="m4b"){ $('#m4b').prop('checked', true);}
				if ("<?=$row["w2o"]?>"=="w2o"){ $('#w2o').prop('checked', true);}
				if ("<?=$row["w2a"]?>"=="w2a"){ $('#w2a').prop('checked', true);}
				if ("<?=$row["w2b"]?>"=="w2b"){ $('#w2b').prop('checked', true);}
				if ("<?=$row["w4a"]?>"=="w4a"){ $('#w4a').prop('checked', true);}
				if ("<?=$row["w4bb"]?>"=="w4bb"){ $('#w4bb').prop('checked', true);}
				if ("<?=$row["w4b"]?>"=="w4b"){ $('#w4b').prop('checked', true);}
				if ("<?=$row["c2a"]?>"=="c2a"){ $('#c2a').prop('checked', true);}
				if ("<?=$row["c2b"]?>"=="c2b"){ $('#c2b').prop('checked', true);}
				if ("<?=$row["c4aa"]?>"=="c4aa"){ $('#c4aa').prop('checked', true);}
				if ("<?=$row["c4a"]?>"=="c4a"){ $('#c4a').prop('checked', true);}
				if ("<?=$row["c4bb"]?>"=="c4bb"){ $('#c4bb').prop('checked', true);}
				if ("<?=$row["c4b"]?>"=="c4b"){ $('#c4b').prop('checked', true);}
				if ("<?=$row["c6a"]?>"=="c6a"){ $('#c6a').prop('checked', true);}
				if ("<?=$row["c6b"]?>"=="c6b"){ $('#c6b').prop('checked', true);}
				if ("<?=$row["c6c"]?>"=="c6c"){ $('#c6c').prop('checked', true);}
				if ("<?=$row["jrb2"]?>"=="jrb2"){ $('#jrb2').prop('checked', true);}
				if ("<?=$row["jrb4"]?>"=="jrb4"){ $('#jrb4').prop('checked', true);}
				if ("<?=$row["jrg2"]?>"=="jrg2"){ $('#jrg2').prop('checked', true);}
				if ("<?=$row["jrg4"]?>"=="jrg4"){ $('#jrg4').prop('checked', true);}
		
				/*
				if ("<?=$row["wc4a"]?>"=="wc4a"){ $('#wc4a').prop('checked', true);}
				if ("<?=$row["wc4b"]?>"=="wc4b"){ $('#wc4b').prop('checked', true);}
				if ("<?=$row["wc6b"]?>"=="wc6b"){ $('#wc6b').prop('checked', true);}
				if ("<?=$row["wc6c"]?>"=="wc6c"){ $('#wc6c').prop('checked', true);}
				if ("<?=$row["tc4a"]?>"=="tc4a"){ $('#tc4a').prop('checked', true);}
				if ("<?=$row["tc4b"]?>"=="tc4b"){ $('#tc4b').prop('checked', true);}
				if ("<?=$row["tc6b"]?>"=="tc6b"){ $('#tc6b').prop('checked', true);}
				if ("<?=$row["tc6c"]?>"=="tc6c"){ $('#tc6c').prop('checked', true);}
				*/
			});
			</script>
		<?php
	}	

	?>



</head>
<body background="../images/bg.jpg">

<p align="center">
<img border="0" src="http://www.baltimorebeach.com/images/bbeachlogo.jpg" width="718" height="182"></p>
<p align="center"><font face="Times New Roman" size="7" color="#800000">
<span style="letter-spacing: 1pt; text-decoration:underline">Free Agent 2019 Registration</span> </font></p>

<form id="registrationform" name="registrationform" method="post" action="regprocfreeagents.php<?=$idstring ?>">
<br>
<div align="center">
  <center>
  <table border="0" width="47%" id="table1">
    <tr>
      <td width="23%" align="right"><b>Name:</b></td>
      <td width="25%"><input name="name" type="text" id="name" size="26"></td>
      <td width="12%" align="right"><b>Email:</b></td>
      <td width="40%"><input name="email" type="text" id="email" size="40" maxlength="50"></td>
      </tr>
    <tr>
      <td align="right"><b>Gender:</b></td>
      <td><select name="gender" size="1" id="gender">
        <option value="" selected>Select Your Gender</option>
        <option value="m">Male</option>
        <option value="f">Female</option>
      </select></td>
      <td align="right"><sup><font face="Arial" size="1">+</font></sup><b>Age Group:</b></td>
      <td><select name="agegroup" size="1" id="agegroup">
        <option value="">Please Choose</option>
        <option value="&lt;18">&lt;18</option>
        <option value="18-23">18-23</option>
        <option value="24-29">24-29</option>
        <option value="30-36">30-35</option>
        <option value="37-43">36-41</option>
        <option value="44-50">42-47</option>
        <option value="&gt;50">&gt;47</option>
      </select></td>
      </tr>
    <tr>
      <td width="23%" align="right"><b>&nbsp;Phone:</b></td>
      <td width="25%"><input name="phone" type="text" id="phone" size="26" maxlength="12"> </td>
      <td align="right"><b>Type:</b></td>
      <td><select name="contact_type" size="1" id="contact_type">
        <option value="">- - -</option>
        <option value="Home Phone">Home Phone</option>
        <option value="Work Phone">Work Phone</option>
        <option value="Cell Phone">Cell Phone</option>
        <option value="Email Only">Email Only</option>
      </select></td>
      </tr>
    <tr>
      <td width="23%" align="right"><b>Best Time to Call:</b></td>
      <td colspan="3"><select name="time2call" size="1" id="time2call">
        <option value="" selected>- - -</option>
        <option value="Daytime Only">Daytime Only</option>
        <option value="Evenings Only">Evenings Only</option>
        <option value="Anytime">Anytime</option>
        <option value="Email Only">Email Only</option>
        </select></td>
    </tr>
  </table>
  	<table border="0" width="769">
		<tr>
			<td>
  	<table border="0" width="99%" id="table2" style="border-style: dotted; border-width: 1px">
		<tr>
			<td bgcolor="#000080" width="168">
			<p align="center">
			<font face="Comic Sans MS" color="#FFFFFF" style="font-size: 16pt">
		  Men's Divisions</font></td>
			<td bgcolor="#FF99CC" width="202">
			<p align="center">
		  <font face="Comic Sans MS" style="font-size: 16pt">Women's Divisions</font></td>
			<td width="184" bgcolor="#008080">
			<p align="center">
			<font face="Comic Sans MS" style="font-size: 16pt" color="#FFFFFF">
		  Coed Divisions</font></td>
			<td width="194" bgcolor="#800000">
			<p align="center">
			<font face="Comic Sans MS" style="font-size: 16pt" color="#FFFFFF">
		  Junior's Divisions</font></td>
		</tr>
		<tr>
			<td width="168">
			<input name="m2o" type="checkbox" id="m2o" value="m2o">
			<font face="Comic Sans MS">Men's 
		  2's OPEN</font><b><font face="Times New Roman" style="font-size: 16pt">*</font></b><font face="Comic Sans MS"> </font></td>
		  <td width="202">
			<input name="w2o" type="checkbox" id="w2o" value="w2o"><font face="Comic Sans MS"> Women's 
			2's OPEN</font><b><font face="Times New Roman" style="font-size: 16pt">*</font></b></td>
			<td width="184">
			<font face="Comic Sans MS">
			<input name="c2a" type="checkbox" id="c2a" value="c2a"> Coed 2's A Div.</font></td>
			<td><font face="Comic Sans MS"><input name="jrb2" type="checkbox" id="jrb2" value="jrb2"> Junior Boys 2's</font></td>
		</tr>
		<tr>
			<td width="168">
			<input name="m2a" type="checkbox" id="m2a" value="m2a">
			<font face="Comic Sans MS">Men's 
		  2's A Div. </font></td>
			<td width="202"><input name="w2a" type="checkbox" id="w2a" value="w2a">
			  <font face="Comic Sans MS">Women's 
			2's A Div. </font></td>
			<td width="184">
			<font face="Comic Sans MS">
			<input name="c2b" type="checkbox" id="c2b" value="c2b"> Coed 2's B Div</font></td>
			<td><font face="Comic Sans MS"><input type="checkbox" name="jrb4" value="jrb4" id="jrb4"> Junior Boys 4's</font></td>
		</tr>
		<tr>
			<td width="168">
			<input name="m2b" type="checkbox" id="m2b" value="m2b">
			<font face="Comic Sans MS">Men's 
		  2's B Div.</font></td>
		  <td width="202"><input name="w2b" type="checkbox" id="w2b" value="w2b">
		    <font face="Comic Sans MS">Women's 
			2's B Div. </font></td>
		  <td width="184"><hr align="left" color="#008080"></td>
			<td><hr align="left" color="#800000"></td>
		</tr>
		<tr>
		  <td width="168"><hr align="left" color="#000080"></td>
		  <td width="202" height="25"><hr align="left" color="#FF99CC"></td>
			<td width="184">
			<font face="Comic Sans MS">
			<input name="c4aa" type="checkbox" id="c4aa" value="c4aa"> Coed 4's AA Div.</font></td>
			<td><font face="Comic Sans MS"><input type="checkbox" name="jrg2" id="jrg2" value="jrg2"> Junior Girls 2's</font></td>
		</tr>
		<tr>
			<td width="168" height="27">
			<input name="m4a" type="checkbox" id="m4a" value="m4a">
			<font face="Comic Sans MS">Men's 
		  4's A Div.</font></td>
			<td width="202"><input name="w4a" type="checkbox" id="w4a" value="w4a">
			  <font face="Comic Sans MS">Women's 
			4's A Div.</font></td>
			<td width="184" height="27">
			<font face="Comic Sans MS">
			<input name="c4a" type="checkbox" id="c4a" value="c4a"> Coed 4's A Div.</font></td>
			<td height="27">
			<font face="Comic Sans MS">
			<input type="checkbox" name="jrg4" id="jrg4"  value="jrg4"> Junior Girls 4's</font></td>
		</tr>
		<tr>
			<td width="168">
			<input name="m4bb" type="checkbox" id="m4bb" value="m4bb">
			<font face="Comic Sans MS">Men's 
		  4's BB Div.</font></td>
		  <td width="202">
			<input name="w4bb" type="checkbox" id="w4bb" value="w4bb">
		    <font face="Comic Sans MS">Women's 
			4's BB Div.</font></td>
			<td width="184" height="27">
			<font face="Comic Sans MS">
		  <input name="c4bb" type="checkbox" id="c4bb" value="c4bb"> 
		  Coed 4's BB Div.</font></td>
			<td height="27">&nbsp;
			</td>
		</tr>
		<tr>
			<td width="168">
			<input name="m4b" type="checkbox" id="m4b" value="m4b">
			<font face="Comic Sans MS">Men's 
		  4's B Div.</font></td>
		  <td width="202">
			<input name="w4b" type="checkbox" id="w4b" value="w4b">
		    <font face="Comic Sans MS">Women's 
			4's B Div.</font></td>
		  <td width="184">
			<font face="Comic Sans MS">
		  <input name="c4b" type="checkbox" id="c4b" value="c4b"> 
		  Coed 4's B Div.</font></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="168">&nbsp;</td>
			<td>&nbsp;</td>
			<td width="184">
			<hr align="left" color="#008080"></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" rowspan="2" valign="bottom">
			<p align="center">
			<span style="font-family: Comic Sans MS; font-weight: 700">
			<font size="2">What does A, B, &amp; C divisions mean?</font></span><span style="font-size: 10.0pt; font-family: Comic Sans MS"><b><br>
			</b>Volleyball Standard Levels of Play Definitions <b> <br>
			</b>
			<a style="color: blue; text-decoration: underline; text-underline: single" target="_blank" href="http://www.baltimorebeach.com/DescriptionofLevels.htm">
			<span style="color:windowtext">
			http://www.baltimorebeach.com/DescriptionofLevels.htm</span></a></span></td>
			<td width="184">
			<font face="Comic Sans MS">
			<input name="c6a" type="checkbox" id="c6a" value="c6a"> 
			Coed 6's A Div.</font></td>
		<td>&nbsp;</td>
		</tr>
		<tr>
			<td width="184" height="27">
			<font face="Comic Sans MS">
			<input name="c6b" type="checkbox" id="c6b" value="c6b"> Coed 6's B Div.</font></td>
		<td height="27">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" valign="top"><font color="#FF0000" size="2"><strong>HINT</strong></font><strong><font style="font-size: 9pt" color="#FF0000">:&nbsp;
			</font>
			    <font style="font-size: 9pt; font-style: italic" color="#FF0000">Do 
			not select ALL options.&nbsp; You will be deleted from the 
			list.</font></strong><font style="font-size: 9pt; font-style: italic" color="#FF0000">&nbsp;</font></td>
			<td width="184">
			<font face="Comic Sans MS">
			<input name="c6c" type="checkbox" id="c6c" value="c6c"> Coed 6's C Div.</font></td>
		<td>&nbsp;</td>
		</tr>
	</table>
	<table border="0" width="87%" id="table3">
		<tr>
			<td valign="top" width="75"><font face="Comic Sans MS">Comments:</font><p></td>
			<td valign="top"><textarea name="comments" cols="84" rows="2" id="comments" maxlength="250"></textarea></td>
		</tr>
	</table>
	<p align="center" style="word-spacing: 0; margin-top: 0; margin-bottom: 0">
		<input type="submit" value="Submit">&nbsp; 
		<input type="reset" value="Reset">
	</p>
  			</td>
		</tr>
	</table>
  </center>
</div>
</form>
<div align="center">
	<table border="0" width="69%" id="table4">
		<tr>
			<td>
				<p align="center"><b>NOTE:</b>&nbsp;Please fill out as much of the above fields as you are comfortable with <br>
				having&nbsp;displayed on the Baltimore Beach Volleyball &quot;<u><a href="freeagentsreg.php">Free Agents</a></u>&quot; web site.<br>
				<sup><font face="Arial" size="1">+</font></sup>
				Age group is for demographics use only, and will <b>not</b><br>be displayed on your &quot;Free Agents&quot; page listing.<br>
				Deselect all checkboxes if you wish to make yourself unavailable.
				<br>
				<b>OPEN</b></font><b><font face="Times New Roman" style="font-size: 16pt">*</font></b>
				division denotes semi-professional level of play and<br> requires prior permission of Baltimore Beach Volleyball to compete at this level.&nbsp; 
			</td>
		</tr>
	</table>
</div>
<p align="center" style="word-spacing: 0; margin-top: 0; margin-bottom: 0">&nbsp;</p>

<p align="center" style="word-spacing: 0; margin-top: 0; margin-bottom: 4"><font size="1" face="Arial, Helvetica, sans-serif">
Copyright&copy; 1999 - <?= date("Y") ?> Baltimore Beach Volleyball Club. All rights reserved. <BR>
              Revised: February 11, 2019</font></p>
</body>

</html>
