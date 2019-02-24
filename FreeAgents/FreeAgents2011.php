<?php

require_once('../database.php');

$sel = "SELECT * FROM  freeagents ORDER BY gender,reg_date";
$res = mssqlquery($sel);



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Baltimore Beach Volleyball 2011 "Free Agents" List</title>
<link rel="stylesheet" href="../../cp/cpanel.css" type="text/css">
<style type="text/css">
<!--
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
-->
</style>
</head>

<body background="file:///F|/BaltBeach/images/bg.jpg">
<div align="center">
  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="901"><img src="bbeachlogo.jpg" width="800" height="193"></td>
    </tr>
     <tr>  </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td style="padding-left:5px;"><h1 align="center" class="style1">&quot;Free Agents&quot; 2011  List </h1>
        <br>
  <table width="800" border="0" cellspacing="0" cellpadding="0" style="border-bottom: 1px thin black ">
    <tr align="center" class="altbg">
      <td width="114"><strong>Name</strong></td>
      <td width="57"><strong>Gender</strong></td>
      <td width="242"><strong>Divisions</strong></td>
      <td width="137"><strong>Email</strong></td>
	  <td width="73"><strong>Phone</strong></td>
	  <td width="83"><strong>Type</strong></td>
	  <td width="94"><strong>Time2Call</strong></td>
    </tr>
  

  
<?php
		
        while($p = mssqlfetchassoc($res))
		{
		  ?>
		    <tr style="border-top: 1px thin black ">
		      <td align="center"><span class="style1">
	          <?= $p['name'] ?>
		      </span></td>
		      <td align="center"><?= $p['gender'] ?></td>
		      <td align="center"><?= $p['m2o'] ?>
		        				 <?= $p['m2a'] ?>
		        				 <?= $p['m2b'] ?>
		        				 <?= $p['m4a'] ?>
		        				 <?= $p['m4b'] ?>
		        				 <?= $p['w2o'] ?>
		        				 <?= $p['w2a'] ?>
		        				 <?= $p['w2b'] ?>
		        				 <?= $p['w4a'] ?>
		        				 <?= $p['w4b'] ?>
		        				 <?= $p['c2a'] ?>
		        				 <?= $p['c2b'] ?>
		        				 <?= $p['c4a'] ?>
		        				 <?= $p['c4bb'] ?>
		        				 <?= $p['c4b'] ?>
		        				 <?= $p['c6a'] ?>
		        				 <?= $p['c6b'] ?>
		        				 <?= $p['c6c'] ?>
		        				 </td>
		      <td align="center"><a href="mailto:<?= $p['email'] ?>">
		        <?= $p['email'] ?>
		      </a></td>
		      <td align="center"><?= $p['phone'] ?></td>
		      <td align="center"><?= $p['contact_type']?></td>
		      <td align="center"><?= $p['time2call'] ?></td>
	      </tr>
		    <tr style="border-top: 1px thin black ">
      <td colspan="7" align="center" bgcolor="#CCCCCC"></a>
        <em><?= $p['comments'] ?></em>
        <div align="center"></div>
        <div align="left"></div>        <div align="left"></div></td
      >
      </tr>
	    <?php  
		}
		 ?></table>      </td>
    </tr>
  </table>
</div>
<div align="center"></div>
<p align="center"><u><strong>REMINDER</strong></u>:  <span class="style2">Leagues space is limited!  Signing up for this "Free Agents" list does <u>not</u> guarantee entrance into leagues.<br>
  We suggest contacting other free agents to create your own team as soon as possible. Have Fun!</span> </p>
<p align="center" class="style2">Copyright &copy; 1999 - <?= date("Y") ?> Baltimore Beach Volleyball Club. All rights reserved.</span><br />
<span class="style38">Listing current as of: <?= date("F j, Y  g:i a") ?></p>
</body>
</html>
<?php mssqlclose(); ?>