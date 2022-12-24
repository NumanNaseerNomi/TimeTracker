<?php
	$serverName = "localhost";
//	$userName = "root";
	$dbUserName = "root";
	$password = "";
	$dbName = "naveedlinks";

	// Create connection
	$conn = mysqli_connect($serverName, $dbUserName, $password, $dbName);
	$db = mysqli_select_db($conn, $dbName);

	// Check connection
	if (!$conn)
	{
		echo("Connection failed: " . mysqli_connect_error());
	}
/*	else
	{
		echo("Connected successfully");
	}
*/
?>