<?php
require_once('../../ap/seabass.php');


require_once('../../database.php');

$sel = ("Select team.*, captain.*,league.*
FROM team, captain, league
WHERE team.captain = captain.c_id and team.league = league.l_id and league.night = 'VolleyBoo'
ORDER BY l_id");
$res = mssqlquery($sel);



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>View All VolleyBoo Tournament Teams</title>
<link rel="stylesheet" href="../../cp/cpanel.css" type="text/css">
</head>

<body>
<table width="800" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="../../ap/images/BBV_AP_top.jpg" width="800" height="200"></td>
  </tr>
   <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="2">
     <tr>
        <td width="12%" class="menu"><div align="center"><a href="../../ap/index.php">Admin Home</a> </div></td>
        <td width="13%" class="menu"><div align="center"><a href="../../ap/viewLeague.php">View League</a></div></td>
        <td width="14%" class="menu"><div align="center"><a href="../../ap/viewCapt.php">View Captains</a> </div></td>
        <td width="18%" class="menu"><div align="center"><a href="../../ap/viewSummerLeague.php">View Summer League </a></div></td>
        <td width="19%" class="menu"><div align="center"><a href="../../ap/viewKahunaTournament.php">View Kahuna Tournament </a></div></td>
        <td width="20%" class="menu"><div align="center"><a href="../../ap/viewVolleyBooTournament.php">View VolleyBoo Tournament</a></div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td style="padding-left:5px;"><h3>Full "VolleyBoo 2016" Tournament Team Listing</h3><br>
<?php
		$last  = -1;
        while($team = mssqlfetchassoc($res))
		{
		  if ($last  != $team['l_id'])
		  {
		    $last  = $team['l_id'];
			echo "<br><span class=\"dk_greyTxt\" style=\"font-size: 14px\"><strong><u>$team[night] $team[type] $team[size]s $team[division]</strong></u></span><br><br>";
		  }
		  echo "<strong>$team[teamname] </strong><br>";
		  $cpt = mssqlquery("SELECT firstname, lastname, shirtsize, feepaid, feememo, username, password FROM captain WHERE c_id = $team[captain]");
		  $c = mssqlfetchassoc($cpt);
		  echo "CAPTAIN: $c[firstname] $c[lastname] <br><u>un</u>: $c[username]  <u>pw</u>: $c[password]<br><br>";
		  
		  $plyrs = mssqlquery("SELECT name, pshirt, feepaid, feememo  FROM player WHERE team = $team[t_id]");
		  while($p = mssqlfetchassoc($plyrs))
		  {
		    echo "$p[name] ";
			
			if($p['feepaid'])
		  	{
		  		echo " $p[feememo]";
		  	}
		  	else
		  	{
		  		echo " <em>not paid</em>";
		  	}
			echo "<br>";
		  }//players from a team are found
		  
		  echo '<hr width="250" align="left">';
		} //teams that have paid are found
		
		?>
      </td>
  </tr>
</table>
<br>
<br>
<br>
</body>
</html>
<?php mssqlclose(); ?>