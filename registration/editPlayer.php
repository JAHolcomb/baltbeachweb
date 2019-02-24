<?php
require_once('access.php');

require_once('../database.php');

$p = $_GET['p'];
  
$sel = "SELECT p.*,t.teamname as tn, t.t_id FROM player as p, team as t WHERE p_id = $p and p.team = t_id";
$res = mssqlquery($sel);
$plyr = mssqlfetchassoc($res);

$tssql = "SELECT * FROM TShirt WHERE (tsactive = 1) ORDER BY tsorder";
$tres = mssqlquery($tssql);


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Baltimore Beach Control Panel</title>
<link rel="stylesheet" href="../cp/cpanel.css" type="text/css">
</head>

<body>
<table width="800" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/BBV_CP_top.jpg" width="800" height="200"></td>
  </tr>
   <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="6%" class="menu"><a href="home.php"> Home</a> </td>
        <td width="9%" class="menu"><a href="editTeam.php">Edit Team </a></td>
        <td width="9%" class="menu"><a href="addPlayer.php">Add Player</a></td>
        <td class="menu"><a href="editInfo.php">Edit My Information</a> </td>
        <td width="10%" class="menu"><a href="logout.php">Log Out </a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><h3><strong>Editing Player <?php echo "$plyr[name] "; ?>       </strong></h3>
      <form name="form1" method="post" action="updatePlayer.php" onSubmit="this.Submit.value = 'Updating Now...'">
        <table width="534"  border="0" cellpadding="2" cellspacing="0" class="grey2px">
          <tr>
            <td width="16%" class="dk_greyTxt"><strong>Name </strong></td>
            <td width="84%"><input name="name" type="text" id="first" maxlength="50" value="<?= $plyr['name'] ?>"></td>
          </tr>
          <tr>
            <td class="dk_greyTxt"><strong>Email </strong></td>
            <td><input name="email" type="text" id="email" size="40" maxlength="40" value="<?= $plyr['email'] ?>"></td>
          </tr>
          <tr>
            <td class="dk_greyTxt"><strong>Shirt Size</strong></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="dk_greyTxt">&nbsp;</td>
            <td><input name="id" type="hidden" id="id" value="<?php echo $plyr['p_id'] ?>">
			<input type="hidden" value="<?php echo $plyr['tn'] ?>" name="team">
                <input name="Submit" type="Submit" class="button" value="Update">
            </td>
          </tr>
        </table>
    </form>	</td>
  </tr>
</table>
<br>
<br>
<br>
</body>
</html>
