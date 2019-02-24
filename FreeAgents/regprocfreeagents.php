<style type="text/css">
<!--
a:link {
	color: #000000;
}
a:visited {
	color: #000000;
}
-->
</style><?php

if($_POST)
{

$updateset="";	
 foreach ($_POST as $k=>$v)
 {
   $t = stripslashes($v);
   $t = str_replace("'",'&prime;',$t);
   
 	//This only pulls the form field that have been sent to this page.  Checkboxes are only processed if they are checked.
	//This method therefore only finds the form fields sent for processing and stores the keys and values separately
	//This only works if the names of the form fields are the same as the column name in the database
   $vals[] = "'".$t."'";
   $keys[] = strtolower($k);
   $updateset[]=strtolower($k)."="."'".$t."'";
 }
 
 //These two statements take the arrays and slams it into a comma delimited string
 $values = implode(',',$vals);
 $keys = implode(',',$keys);

 
  require_once('../database.php');

  if (isset($_REQUEST["fa_id"])) {	
	//update
	$fa_id=$_REQUEST["fa_id"];
	$fa_id= str_replace("'", "''", $fa_id);
	//non selected checboxes are not in list so have to manually set them blank first and then do update
	$sql = "UPDATE freeagents SET m2o='',w2o='',c2a='',jrb2='',m2a='',w2a='',c2b='',jrb4='',m2b='',w2b='',c4aa='',jrg2='',m4a='',w4a='',c4a='',jrg4='',m4bb='',w4bb='',c4bb='',m4b='',w4b='',c4b='',c6a='',c6b='',c6c='' WHERE fa_id='".$fa_id."'";
	mssqlquery($sql);
	$sql = "UPDATE freeagents SET ".implode(',',$updateset)." WHERE fa_id='".$fa_id."'";
	$text="Updated your Registration";
  }
  else {
  //new
	$sql = "INSERT INTO freeagents ($keys) VALUES ($values)";
	$text="Been Registered";
  }
  
  
  mssqlquery($sql);
    
  mssqlclose();

  echo "
<img border=\"0\" src=\"bbeachlogo.jpg\" width=\"718\" height=\"193\">
<h3>You Have ".$text." on the 2018 Free Agents list!</h3>
<p>
<strong>Fall League Play Begins September 15th, 2018!</strong><br>
<br>
<u><strong>REMINDER</strong></u>:  Space is limited!  Signing up for this \"Free Agents\" list does <u>not</u> guarantee entrance into leagues.<br>
We recommend you contact other \"Free Agents\" and create your own team as soon as possible.  Have fun!<br><br>
Copyright © 1999 - 2018 Baltimore Beach Volleyball Club. All rights reserved.
";
}
/* */
 
?>