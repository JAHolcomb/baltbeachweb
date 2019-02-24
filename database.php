<?php

$databaseConnection=null;

function mssqlconnect()
{

	$serverName='';

	$connectionInfo = array (
      "UID" => "", 
      "PWD" => "", 
      "Database" => "",
      "Encrypt" => 1,
      "ReturnDatesAsStrings" => true,
      "TrustServerCertificate" => 1) ;

	global $databaseConnection;

	//$databaseConnection = mssql_connect ($serverName, $connectionInfo);
	$databaseConnection = sqlsrv_connect ($serverName, $connectionInfo);


	if(!$databaseConnection) {
	     echo "Connection could not be established.<br />";
	     die( print_r( sqlsrv_errors(), true));
	}

}


function mssqlquery($query)
{

	global $databaseConnection;


	//return mssql_query($sql,$databaseConnection);
	return sqlsrv_query($databaseConnection,$query);
}

function mssqlfetchassoc($resource)
{

	//return mssql_fetch_assoc($resource);
	return sqlsrv_fetch_array($resource, SQLSRV_FETCH_ASSOC);

}

function mssqlfetchrow($resource)
{

	//return mssql_fetch_row($resource);
	return sqlsrv_fetch_array($resource, SQLSRV_FETCH_NUMERIC);

}

function mssqlnumrows($resource)
{
	//return mssql_num_rows($query);
	return sqlsrv_num_rows($resource);
}

function mssqlhasrows($resource)
{
	return sqlsrv_has_rows($resource);
}


function mssqlrowsaffected($resource)
{
	//return mssql_rows_affected($resource);
	return sqlsrv_rows_affected($resource);
}

function mssqlrowsaffectedX($resource)
{
	//this code is wrong but used for apple to apple conversion where there was previously incorrect code and we don't want it to go into those code paths because we corrected it
	//so I always want it not to return -1 e.g. return 1
	//still have to be careful and look at code paths
	//global $databaseConnection;
	//return mssql_rows_affected($databaseConnection); //does not throw error
	//return sqlsrv_rows_affected($databaseConnection); //throws error
	return 1; //dummy success
}

function mssqlclose()
{
	global $databaseConnection;
	//mssql_close($databaseConnection);
	sqlsrv_close($databaseConnection);

}


//connect
mssqlconnect();

//Put all of this code at the top of your script - before you output any HTML
function createOptions ($options, $selected = '') {
	ob_start();
	foreach ($options as $key => $value) {
		printf(
			'<option value="%s"%s>%s</option>',
			$value,
			(
				$selected == $key ?
				' selected' :
				''
			),
			$key
		);
	}
	return ob_get_clean();
}

?>
