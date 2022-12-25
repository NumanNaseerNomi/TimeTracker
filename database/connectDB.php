<?php
require_once("././env.php");

// Create connection
$conn = mysqli_connect($env['hostName'], $env['userName'], $env['password'], $env['dbName']);
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