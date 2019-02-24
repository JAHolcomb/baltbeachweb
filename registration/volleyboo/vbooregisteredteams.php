<?php
  //Connect to Database
  require_once('../../database.php');

 //$lsql = "SELECT * FROM league WHERE ([session] = 'Spring') ORDER BY [order]";
  
//$lres = mssqlquery($lsql);
  
    //This is for a later time when Summer =registration begins
    
    $lsql = "SELECT * FROM league WHERE ([session] = 'VolleyBoo') and regview = 1 ORDER BY [order]";
    $lres = mssqlquery($lsql);

/* 
//##################################################################################
//#                        I M P O R T A N T    N O T E                            #
//##################################################################################
//# NOTICE:  Jim Holcomb is the author and copyright holder of all code contained  #
//#on this page and was written for the exclusive use of Baltimore Beach Volleyball#
//#You are not authorized to alter, copy, edit, or delete this written code for any#
//#use other than Baltimore Beach Volleyball without the author's express written  # 
//#permission. Copyright 1999-2016, Jim Holcomb, all rights reserved.              #
//##################################################################################
// 
*/
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Baltimore Beach Volleyball League Look-up Page</title>
<script type="text/javascript" language="JavaScript1.2" src="../../stmenu.js"></script>
<style type="text/css">

.style1 {font-family: "Comic Sans MS"}
.style2 {font-size: 12px}
body
{
		background-color: #CCC;
}


</style>
</head>

<body>
<p style="word-spacing: 0; margin-top: 0; margin-bottom: 0" align="center"><img src="volleyboo3.jpg" width="604" height="325" /></p>
<form name="leaguejump">
<label>
<div align="center">
  <p><span class="style1">List registered "VolleyBoo 2016" teams for</span>
    <select name="league" tabindex="2" OnChange="location.href=this.value">
      <option value="" selected="selected">-- Select League --</option>
      <?php  while ($lrow = mssqlfetchassoc($lres))      {    ?>
     <  <option value="vbooinfo.php?l=<?php echo $lrow['l_id'];?>"><?php echo "$lrow[night] $lrow[type] $lrow[size]'s $lrow[division]"; ?></option>
      <?php
}

mssqlclose();
?>
      </select>
</p>
  <p>&nbsp;</p>
  <p class="style2"> <font face="Arial, Helvetica, sans-serif" size="1"> Copyright © 1999 - <?= date("Y") ?>

Baltimore Beach Volleyball Club. All rights reserved. <br />
Revised: September 7, 2016</p>
</div>

<div align="center"><!--WEBBOT bot=TimeStamp endspan i-checksum="16755" -->
                </div>
</body>
</html>
