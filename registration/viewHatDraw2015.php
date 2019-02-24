

<?php

  //Connect to Database

  require_once('../database.php');

// mssql_select_db("baltimorebeach");

$sel = "SELECT * FROM  hatdraw ORDER BY gender DESC,size,division ASC,reg_date";
$res = mssqlquery($sel);



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>April 12th, 2015 &quot;Hat Draw&quot; Pre-Registrants</title>
<link rel="stylesheet" href="cpanel.css" type="text/css">
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
a:active {
	text-decoration: none;
}
body {
	background-image: url(bg.jpg);
}
</style>
</head>

<body>
<div align="center">
  <table width="721" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="721"><div align="center"><img src="bbeachlogo.jpg" width="719" height="193"></div><br></td>
    </tr>
        <tr>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td style="padding-left:5px;"><h1 align="center" class="style1">Baltimore Beach April 12th, 2015 "Hat Draw" Pre-Registrants<br><br><br>
        
        <table width="681" border="0" cellspacing="0" cellpadding="0" style="border-bottom: 1px thin black ">
            <tr align="center" bgcolor="#66CCCC" class="altbg">
              <td width="214"><strong>Name</strong></td>
            <td width="139"><strong>Gender </strong></td>
            <td width="140"><strong>Tourney Size </strong></td>
            <td width="112"><strong>Division</strong></td>
			<td width="110" ><strong>Paid</strong></td>
          </tr>
            <?php
		
        while($p = mssqlfetchassoc($res))
		{
		  ?>
            <tr style="border-top: 1px thin black ">
            <td align="center"><a href="mailto:<?= $p['email']; ?>"><?= $p['name'] ?></td>
            <td align="center"><?= $p['gender'] ?></td>
            <td align="center"><?= $p['size'] ?></td>
            <td align="center"><?= $p['division'] ?></td>
            <td align="center"><?= $p['paid'] ?></td>
                 
          </tr>
         
            <?php  
		}
		 ?>
        </table>
      </td>
    </tr>
  </table>
</div>
  <div align="center"><br>
    <br>
    <br>
    Copyright © 1999 - 2015&nbsp;&nbsp;Baltimore Beach Volleyball Club. All rights reserved. </div>
</body>
</html>
<?php mssqlclose(); ?>