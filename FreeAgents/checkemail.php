<?php
//php check for the jquery validation plugin. 
//returns false if email exists and validation failed. 
//returns true if email has not been used

$email = $_REQUEST["email"];
$email= str_replace("'", "''", $email);
require_once('../database.php');

$sql="select fa_id from freeagents where email='".$email."'";

$emailSearch = mssqlquery($sql);

if (mssqlhasrows($emailSearch))  { echo "false"; } else { echo "true"; }
 
mssqlclose();
?>