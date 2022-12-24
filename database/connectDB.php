<?php
	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$dbName = "TimeTracker";

	// Create connection
	$conn = mysqli_connect($serverName, $userName, $password, $dbName);
	$db = mysqli_select_db($conn, $dbName);

	// Check connection
	if (!$conn)
	{
		echo("Connection failed: " . mysqli_connect_error());
	}
	// else
	// {
	// 	echo("Connected successfully");
	// }
?>