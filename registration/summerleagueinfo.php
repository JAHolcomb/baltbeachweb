<?php
if(!$_GET)
{
 header('Location: http://www.baltimorebeach.com');
}

$id = $_GET['l'];
$name = "admin";
//connect to DB and run queries
require_once('../database.php');

//query teams that have not paid
$query = "SELECT name,reg_start,reg_done,promo, locked, returning, c.firstname, c.lastname FROM team, captain as c WHERE team.captain = c_id AND league = $id AND t_id NOT IN (SELECT t_id FROM team WHERE league = $id AND reg_done != '' )ORDER BY locked DESC, returning DESC;";
$res = mssqlquery($query);
$rows = mssqlrowsaffectedX($res);
//query the teams that have paid
$queryD = "SELECT name,reg_start,reg_done,promo, locked, returning,  c.firstname, c.lastname FROM team, captain as c WHERE team.captain = c_id AND league = $id AND reg_done != '' ORDER BY locked DESC, returning DESC, reg_done";
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


//print_r($team);
//die();
//--------------------
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>2009 <?= $gender ?> <?= $s ?> <?= $div ?> Registered Teams</title>
<style type="text/css">
<!--
.style8 {font-size: 18px; font-weight: bold; }
.style9 {
	color: #990000;
	font-weight: bold;
	font-style: italic;
}
.style10 {font-size: 9pt}
.style11 {
	font-size: 10px;
	font-style: italic;
	color: #333333;
}
.style12 {font-size: 10}
.style15 {font-size: 18px}
-->
</style>
</head>

<body>
<p style="word-spacing: 0; margin-top: 0; margin-bottom: 0" align="center">
  <img border="0" src="bbeachlogo.jpg" width="718" height="193"> 
</p>
<div align="center">
  <center>
  <table width="718"  border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td colspan="3" align="center"><h2>Registered Teams For Summer 2009 <?= $gender ?> <?= $s ?> <?= $div ?> League</h2></td>
    </tr><tr>
      <td colspan="3" bgcolor="F3F3F3"><div align="center"><span class="style8">Attention Summer 2009 Team Captains:</span> Avoid the late registration fee 
        by <br>
        sending 
        your 
      team fee check to Baltimore Beach Volleyball before <span class="style9">June 29th , 2009!</span></div></td>
    </tr>
    <tr>
      <td width="48"><div align="center">
        <p><br>
          &nbsp;</p>
      </div></td>
	  <td width="605"><div align="center">
	    <p><font face="Comic Sans MS"><u><span class="style15">The teams 
	      below are listed in the following priority sequence</span></u><span class="style15">:</span><br>
	    </font><br>
	      <font face="Comic Sans MS">&bull;&nbsp; </font>Completed paid teams that are <strong>locked</strong> in for the Summer 2009 season are marked with (#)<br>
&bull;&nbsp; </font>Completed <strong>paid returning 2008  &quot;<span class="style12">same division</span>&quot; team </strong>registrations in date order  (<font size="2"> $ </font>) (r)<br>
	      <strong>- OR -<br>
	        </strong> Completed <strong>paid returning Srping 2009  team </strong>registrations in date order  (<font size="2"> $ </font>) (r)<br>
	        <font face="Comic Sans MS">&bull;&nbsp; </font>Completed <b>paid </b>team 
	      registrations in date order of payment received (<font size="2"> $ </font>)<br>
	      <font face="Comic Sans MS">&bull;&nbsp; </font>Registered teams not yet complete 
	      (paid) in date order of web registration<br>
	      <br>
          <span class="style11">*Baltimore Beach Volleyball staff reserves the right to change this registration order priority sequence without prior notification.</span></p>
      </div></td>
	  <td width="53">&nbsp;</td>
	  <?php
	  if($rows == 0)
	  {
	?>
    <tr>
      <td colspan="3"><em><strong>No teams registered</strong></em>
	  <?php
	  if(!$lge['active'])
	    echo "<br><em><strong><span style=\"color=red\">This league is not active</span></strong></em>";
	  ?>	  </td>
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
      <td colspan="3"><?php 
	    echo "$row[name] - $row[firstname] $row[lastname] ";
		if ($row['reg_done'] != '')
		  echo " \$ ";
         if($row['locked']) 
		    echo " # "; 
		 if($row['returning']) 
		    echo " (r) "; 	
			
		?></td>
    </tr>
	<?php
	  $i++;
	  }
	  while($row = mssqlfetchassoc($res))
	  {
	?>
	<tr <?php if($i%2 == 0) echo "bgcolor=\"#FFFFCC\"";?> >
      <td colspan="3"><?php 
	    echo "$row[name] - $row[firstname] $row[lastname] ";
		if ($row['reg_done'] != '')
		  echo " \$ ";
		if($row['locked']) 
		    echo " # "; 
		 if($row['returning']) 
		    echo " (r) ";  
		?></td>
    </tr>
	<?php
	  $i++;
	  }
	  
	}
	?>

	<?php mssqlclose(); ?>
  </table>
</div>

<p align="center" style="word-spacing: 0; margin-top: 0; margin-bottom: 4"><font size="1" face="Arial, Helvetica, sans-serif">Copyright ©
              1999 - 2009  Baltimore Beach Volleyball Club. All rights reserved.<br>
Designed and Created by <a href="http://www.damianhall.net" target="_self">DH<sup>2</sup> Solutions</a>
<br>
<span class="style10" style="margin-top: 0; margin-bottom: 0">Revised: June 2nd, 2009 </span><br>
</body>
</html>
