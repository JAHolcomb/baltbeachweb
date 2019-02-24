<?php

require_once('../database.php');

$sel = "SELECT * FROM  freeagents ORDER BY gender,reg_date";
$res = mssqlquery($sel);

/* 
//##################################################################################
//#                        I M P O R T A N T    N O T E                            #
//##################################################################################
//# NOTICE:  Jim Holcomb is the author and copyright holder of all code contained  #
//#on this page and was written for the exclusive use of Baltimore Beach Volleyball#
//#You are not authorized to alter, copy, edit, or delete this written code for any#
//#use other than Baltimore Beach Volleyball without the author's express written  # 
//#permission. Copyright 1999-2017, Jim Holcomb, all rights reserved.              #
//##################################################################################
// 
*/

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Baltimore Beach Volleyball 2017 &quot;Free Agents&quot; List</title>
<link rel="stylesheet" href="../../cp/cpanel.css" type="text/css">
<style type="text/css">
.style1 {font-family: "Comic Sans MS"}
.style2 {
	font-family: "Comic Sans MS";
	font-size: 12px;
}
a:link {
	color: #000000;
}
a:visited {
	color: #000000;
}
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>


</head>
<body background="../images/bg.jpg">
<div align="center">
  <table width="1092" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="898"><div align="center"><img src="bbeachlogo.jpg" width="864" height="193"></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    
	<tr>
      <td style="padding-left:5px;" align="center"><h1 align="center" class="style1">
		&quot;Free Agents&quot; 2017 List </h1>

	<table width="980" >
		<tr>
		<td style="text-align:center">
		<a href="http://www.baltimorebeach.com/FreeAgents/registerfreeagent.php">
		<img border="0" src="reg4fa.png" width="153" height="20"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; Filter listings:
		<select id="league-list">
			<option value="" selected>All</option>
			<option value="m2o">Men's 2's Open</option>
			<option value="m2a">Men's 2's A</option>
			<option value="m2b">Men's 2's B</option>
			<option value="m4a">Men's 4's A</option>
			<option value="m4bb">Men's 4's BB</option>
			<option value="m4b">Men's 4's B</option>
			<option value="w2o">Women's 2 Open</option>
			<option value="w2a">Women's 2 A</option>
			<option value="w2b">Women's 2 B</option>
			<option value="w4a">Women's 4 A</option>
			<option value="w4bb">Women's 4 BB</option>
			<option value="w4b">Women's 4 B</option>
			<option value="c2a">Coed 2's A</option>
			<option value="c2b">Coed 2's B</option>
			<option value="c4aa">Coed 4 AA</option>
			<option value="c4a">Coed 4's A</option>
			<option value="c4bb">Coed 4's BB</option>
			<option value="c4b">Coed 4's B</option>
			<option value="c6a">Coed 6's A</option>
			<option value="c6b">Coed 6's B</option>
			<option value="c6c">Coed 6's C</option>
			<option value="jrb2">Junior Boys 2's</option>
			<option value="jrb4">Junior Boys 4's</option>
			<option value="jrg2">Junior Girls 2's</option>
			<option value="jrg4">Junior Girls 4'2</option>
		</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="http://www.baltimorebeach.com/FreeAgents/sendlink2.php">
		<img border="0" src="editfreeagent1.png" width="168" height="20"></a></td>
		<tr>
		<td style="text-align:center">&nbsp;</td>
		</table>


	<script type="text/javascript">
$('#league-list').change(function() {
	//exlude first row. Search 3rd row
	$('#tblLeague tr:not(:first) td:nth-child(3)').each(function() {
		var searfor=$("#league-list").val();
		if (searfor=="") {
			$(this).parent().show();
			$(this).closest("tr").next().show();
		}
		else {
			var tdElement = $(this).text();
			if (tdElement.indexOf(searfor + " ")!=-1||tdElement.indexOf(searfor + "&nbsp;")!=-1) {
				$(this).parent().show();
				$(this).closest("tr").next().show();
			
			} else {
				$(this).parent().hide();
				$(this).closest("tr").next().hide();//hide comments row
			}
		}
		
	});
	
});
</script>

<br>

  <table id="tblLeague" width="1004" border="0" cellspacing="0" cellpadding="0" style="border-bottom: 1px thin black ">
    <tr align="center" class="altbg">
      <td width="160"><strong>Name</strong></td>
      <td width="64"><strong>Gender</strong></td>
      <td width="224"><strong>Divisions</strong></td>
      <td width="173"><strong>Email</strong></td>
	  <td width="89"><strong>Phone</strong></td>
	  <td width="86"><strong>Type</strong></td>
	  <td width="84"><strong>Time2Call</strong></td>
	  <td width="124"><strong>Date Registered</strong></td>
    </tr>
  

  
<?php
		
        while($p = mssqlfetchassoc($res))
		{
			$leagues= trim(
			$p['m2a']
			." ".$p['m2b']
			." ".$p['m4a']
			." ".$p['m4bb']
			." ".$p['m4b']
			." ".$p['w2o']
			." ".$p['w2a']
			." ".$p['w2b']
			." ".$p['w4a']
			." ".$p['w4bb']
			." ".$p['w4b']
			." ".$p['c2a']
			." ".$p['c2b']
			." ".$p['c4aa']
			." ".$p['c4a']
			." ".$p['c4bb']
			." ".$p['c4b']
			." ".$p['c6a']
			." ".$p['c6b']
			." ".$p['c6c']
			." ".$p['jrb2']
			." ".$p['jrb4']
			." ".$p['jrg2']
			." ".$p['jrg4']
			."&nbsp;" 
			);
			if ($leagues!="&nbsp;")
			{
		  ?>
		    <tr style="border-top: 1px thin black ">
		      <td align="center"><span class="style1">
	          <?= $p['name'] ?>
		      </span></td>
		      <td align="center"><?= $p['gender'] ?></td>
		      <td align="center"><?= $leagues ?></td>
		      <td align="center"><a href="mailto:<?= $p['email'] ?>">
		        <?= $p['email'] ?>
		      </a></td>
		      <td align="center"><?= $p['phone'] ?></td>
		      <td align="center"><?= $p['contact_type']?></td>
		      <td align="center"><?= $p['time2call'] ?></td>
		      <td align="center"><?php
$reg_date = (is_null($p['reg_date']) ? "" : date("M j, Y",strtotime($p['reg_date'])));
echo $reg_date;?>
</td>
          </tr>
		    <tr style="border-top: 1px thin black ">
      <td colspan="8" align="center" bgcolor="#CCCCCC"></a>
        <em><?= $p['comments'] ?></em>
        <div align="center"></div>
        <div align="left"></div>        <div align="left"></div></td
      >
      </tr>
	    <?php  
			}
		}
		 ?></table>      </td>
    </tr>
  </table>
</div>
<div align="center"></div>
<p align="center"><u><strong>REMINDER</strong></u>:  <span class="style2">
Leagues space is limited! Signing up for this &quot;Free Agents&quot; list does <u>not</u> 
guarantee entrance into leagues.<br>
  We suggest contacting other free agents to create your own team as soon as 
possible. Have Fun!</span> </p>
<p align="center" class="style2">Copyright © 1999 - <?= date("Y") ?> Baltimore 
Beach Volleyball Club. All rights reserved.</span><br />
<span class="style38">Listing current as of: <?= date("F j, Y  g:i a") ?></span></p>
<p align="right">&nbsp;</p>
</body>
</html>
<?php mssqlclose(); ?>