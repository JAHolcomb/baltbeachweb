<?php

require_once('../../database.php');

$sel = "SELECT * FROM  VBooFreeAgents ORDER BY size,division,gender DESC";
$res = mssqlquery($sel);



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Big Kahuna Tournament 2015 "Free Agents" list</title>
<link rel="stylesheet" href="../../cp/cpanel.css" type="text/css">
<style type="text/css">
<!--
.style1 {font-family: "Comic Sans MS"}
body {
	background-image: url();
	background-color: #000;
}
.HoboStd18 {
	font-family: "Hobo Std";
	font-size: 24px;
	color: #FD9220;
}
.HoboStd12 {
	font-family: "Hobo Std";
	font-size: 12px;
	color: #000;
}
.HoboStd12 {
	font-family: "Hobo Std";
	font-size: 12px;
}
.HoboStd12 {
	font-family: Hobo Std;
}
body,td,th {
	color: #FF9122;
}
-->
</style>
</head>

<body>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center"><img src="volleyboo3.jpg" width="706" height="394"></div></td>
  </tr>
   <tr>
    
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr align="center">
    <td style="padding-left:5px;"><h2 align="center" class="style1"><span class="HoboStd18">Baltimore Beach &quot;Volleyboo&quot; Tournament 2015 <br>
      &quot;Free Agents&quot; listing </span><br>
  </h2>
      <div align="center">
        <table width="800" border="0" cellspacing="0" cellpadding="0">
          <tr align="center" class="altbg">
      <td width="223" bgcolor="#FD9220"><strong class="HoboStd12">Name</strong></td>
      <td width="77" bgcolor="#FD9220"><strong class="HoboStd12">Tourni Size </strong></td>
      <td width="64" bgcolor="#FD9220"><strong class="HoboStd12">Division</strong></td>
      <td width="54" bgcolor="#FD9220"><strong class="HoboStd12">Gender</strong></td>
      <td width="292" bgcolor="#FD9220"><strong class="HoboStd12">Email</strong></td>
      <td width="45" bgcolor="#FD9220"><strong class="HoboStd12">Paid</strong></td>
      </tr>
    
    <?php
		
        while($p = mssqlfetchassoc($res))
		{
		  ?>
    <tr style="border-top: 1px thin black ">
      <td align="center"><?= $p['name'] ?></td>
      <td align="center"><?= $p['size'] ?></td>
      <td align="center"><?= $p['division'] ?></td>
      <td align="center"><?= $p['gender'] ?></td>
      <td align="center"><a href="mailto:<?= $p['email'] ?>">
        <?= $p['email']?>
        </a></td>
      <td align="center"><a href="mailto:<?= $p['email'] ?>"><?= $p['paid']?></a></td>
      <td width="45" >&nbsp;</td>
      </tr>
    <?php  
		}
		 ?></table>
  <p align="center" style="word-spacing: 0; margin-top: 0; margin-bottom: 4">&nbsp;</p>
  <p align="center" style="word-spacing: 0; margin-bottom: 4"><font size="1" face="Arial, Helvetica, sans-serif">Copyright&copy; 1999 - 2015 Baltimore Beach Volleyball. All rights reserved. <BR>
    Revised: September 15th, 2015</font>      </p>
      </div></td>
  </tr>
</table>
<br>
<br>
<br>
</body>
</html>
<?php mssqlclose(); ?>