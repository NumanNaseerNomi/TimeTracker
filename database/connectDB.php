<?php
$env =
[
    'hostName' => 'localhost',
	'userName' => 'root',
	'password' => '',
	'dbName' => 'TimeTracker',
];

// Create connection
$conn = mysqli_connect($env['hostName'], $env['userName'], $env['password'], $env['dbName']);
$db = mysqli_select_db($conn, $env['dbName']);

// Check connection
if (!$conn)
{
	echo("Connection failed: " . mysqli_connect_error());
}
// else
// {
// 	echo("Connected successfully");
// }