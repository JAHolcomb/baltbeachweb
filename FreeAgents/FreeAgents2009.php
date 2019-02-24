<?php

require_once('../database.php');

$sel = "SELECT * FROM  freeagents ORDER BY gender,reg_date";
$res = mssqlquery($sel);



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Baltimore Beach Volleyball 2009 "Free Agents" List</title>
<link rel="stylesheet" href="../../cp/cpanel.css" type="text/css">
<style type="text/css">
<!--
.style1 {font-family: "Comic Sans MS"}
.style2 {font-size: 10px}
.style6 {
	font-size: 16px;
	font-family: "Comic Sans MS";
	color: #000000;
}
.style7 {font-family: "Comic Sans MS"; font-size: 10px; }
.style8 {
	font-size: 11px;
	font-weight: bold;
}
.style9 {font-size: 11px}
.style38 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
</head>

<body>
<div align="center">
  <table width="800" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="901"><img src="bbeachlogo.jpg" width="1136" height="306"></td>
    </tr>
     <tr>
      
  </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td style="padding-left:5px;"><h2 align="center" class="style1">&quot;Free Agents&quot; 2010  List </h2>
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
		      <td align="center"><?= $p['name'] ?></td>
		      <td align="center"><?= $p['gender'] ?></td>
		      <td align="center"><?= $p['m2o'] ?>
		        <?= $p['m2a'] ?>
		        <?= $p['m2b'] ?>
		        <?= $p['m2o'] ?>
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
		        <?= $p['wc4a'] ?>
		        <?= $p['wc4b'] ?>
		        <?= $p['wc6b'] ?>
	            <?= $p['wc6c'] ?>
				<?= $p['tc4a'] ?>
				<?= $p['tc4b'] ?>
				<?= $p['tc6b'] ?>
				<?= $p['tc6c'] ?></td>
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
		 ?></table>
      </td>
    </tr>
  </table>
</div>
<div align="center"></div>
<p align="center"><u><strong>REMINDER</strong></u>:  Leagues space is limited!  Signing up for this "Free Agents" list does <u>not</u> guarantee entrance into leagues.<br>
  Contact other "<a href="http://www.baltimorebeach.com/freeagents2009.php" title="Free Agents 2009!" target="_self">Free Agents</a>" and create your own team as soon as possible. Have Fun! </p>
<p align="center">Copyright &copy; 1999 - <span class="style38">
  <?= date("Y") ?>
</span>&nbsp; Baltimore Beach Volleyball Club. All rights reserved. <br>
  Revised: March 9, 2010 </p>
</body>
</html>
<?php mssqlclose(); ?>