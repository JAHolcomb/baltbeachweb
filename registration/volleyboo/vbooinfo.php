<?php
if(!$_GET)
{
 header('Location: http://www.baltimorebeach.com');
}

$id = $_GET['l'];
$name = "admin";

//connect to database
require_once('../../database.php');


//query teams that have not paid
$query = "SELECT teamname, reg_start, reg_done, locked, c.returningteam, c.firstname, c.lastname, c.feepaid FROM team, captain as c WHERE team.captain = c_id AND league = $id AND t_id NOT IN (SELECT t_id FROM team WHERE league = $id AND reg_done != '' ) ORDER BY locked DESC, c.returningteam, reg_done;";
$res = mssqlquery($query);
$rows = mssqlrowsaffectedX($res);
//query the teams that have paid
$queryD = "SELECT teamname, reg_start, reg_done,locked, c.returningteam, c.firstname, c.lastname, c.feepaid FROM team, captain as c WHERE team.captain = c.c_id AND league = $id AND reg_done != '' ORDER BY locked DESC, c.returningteam DESC, reg_done";
$resD = mssqlquery($queryD);

$rows += mssqlrowsaffectedX($resD);

$l_query = "SELECT * FROM league WHERE l_id = $id";
$l_info = mssqlquery($l_query);
$lge = mssqlfetchassoc($l_info);
if(mssqlrowsaffectedX($l_info) != 1)
{
  mssqlclose();
  header('Location: http://www.baltimorebeach.com');
}
switch ($lge['size'])
{
  case 2:
   $s = 'Doubles';
   break;
  case 4:
    $s = 'Fours';
	break;
  case 6:
    $s = 'Sixes';
	break;	 
  default:  
    $s = '';
}

$gender = strtoupper($lge['type']);
if(strstr($gender,"MEN"))
  $gender .= "'S";
  
$div = $lge['division'];

$season = $lge['session'];
  

  //mssqlclose(); //moved to end

//print_r($team);
//die();
//--------------------
/* 
//Insert copyright notice
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


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>View Volleyboo 2015 Registered teams</title>
<style type="text/css">

.style8 {
	font-size: 12px;
	font-weight: bold;
	color: #000;
}
.style9 {
	color: #990000;
	font-weight: bold;
	font-style: normal;
}
.style10 {font-size: 9pt}
.cs {
	font-family: Comic Sans MS, cursive;
}
body
{
	background-color: #CCC;
}


</style>
</head>

<body>
<p style="word-spacing: 0; margin-top: 0; margin-bottom: 0" align="center"><img src="volleyboo3.jpg" width="630" height="381"></p>
<div align="center">
  <center>
  <table width="632"  border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td colspan="4" align="center"><h2>Registered Teams For <?= $season ?> <?= date("Y") ?> <?= $gender ?> <?= $s ?> <?= $div ?> League</h2></td>
    </tr>
    <tr>

      <td bgcolor="#00CCCC"><div align="center"></div></td>
      <td bgcolor="#00CCCC"><div align="center">$</div></td>
      <td width="1" bgcolor="#00CCCC">&nbsp;</td>
      <td bgcolor="#00CCCC" class="cs"><div align="left">Registered Team Name</div></td>
	</tr>
    
    
	<?php
	  if($rows == 0)
	  {
	?>

        
    <tr>
      <td colspan="4"><div align="center"><em><strong>No teams registered</strong></em>
          <?php
	  if(!$lge['regactive'])
	    echo "<br><em><strong><span style=\"color=red\">This league is not active</span></strong></em>";
	  ?>
        
      </div></td>
    </tr>
	<?php
	}
	else
	{
	  $i=0;
	  //print out completed registrations first
	  while($row = mssqlfetchassoc($resD))
	  {
	?>
        
	<tr <?php if($i%2 == 0) echo "bgcolor=\"#FFFFCC\"";?> >
      <td width="186"><div align="center"></div></td>
      <td width="35"><div align="center"><?php if ($row['feepaid'] == 'y') echo "$" ?></div></td>
      <td>&nbsp;</td>
      <td width="445"><div align="left">
        <?php 
	    echo "$row[teamname] - $row[firstname] $row[lastname] ";
		?>
      </div></td>
    </tr>
	<?php
	  $i++;
	  }
	  while($row = mssqlfetchassoc($res))
	  {
	?>
	<tr <?php if($i%2 == 0) echo "bgcolor=\"#FF9900\"";?> >
      <td width="186"><div align="center"></div></td>
      <td width="35"><div align="center">
        <?php if ($row['feepaid'] == 'y') echo "$" ?>
      </div></td>
      <td>&nbsp;</td>
      <td width="445"><div align="left">
        <?php 
	    echo "$row[teamname] - $row[firstname] $row[lastname] ";
		?>
      </div></td>
    </tr>
	<?php
	  $i++;
	  }
	  
	}
	?>

  <?php mssqlclose(); ?>
  </table>
</div>

<p align="center" style="word-spacing: 0; margin-top: 0; margin-bottom: 4"><br>
  <span class="style9"><span class="style9"><span class="style10"><span class="style8">Copyright ©
  1999 - <?= date("Y") ?>  Baltimore Beach Volleyball Club. All rights reserved.</span></span></span></span><br>
  <span class="style10" style="margin-top: 0; margin-bottom: 0; color: #333;">Revised: September 7th, 2016</span><br>
</body>
</html>
