<?php
	ini_set('display_errors',1);
//	error_reporting(e_all);
	$hostName = "137.74.194.232";
	$database = "vote";
	$userName = "remoteAcces";
	$password = "paozie";
	$db = mysqli_connect($hostName,$userName,$password,$database);
	if(mysqli_connect_errno()){die('The connection to the database could not be etablished');}
	$db->set_charset("utf8");
?>
