<?php
require_once('../database.php');

 $lsql = "SELECT * FROM league WHERE (active = 1) AND ([session] = 'Spring') ORDER BY l_id";
  
$lres = mssqlquery($lsql);

 $msql = "SELECT * FROM league WHERE (active = 1) AND ([session] = 'Summer') ORDER BY l_id";
  
$mres = mssqlquery($msql);

 $vsql = "SELECT * FROM venue WHERE (v_active = 1) ORDER BY v_id";
 
$vres = mssqlquery($vsql);
?>

<?php echo "$lrow[night] $lrow[type] $lrow[size]'s $lrow[division]"; 

mssqlclose();
?>