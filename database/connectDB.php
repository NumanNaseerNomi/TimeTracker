<?php
// production configs
// $env =
// [
//     'hostName' => 'localhost',
// 	'userName' => 'liorblin_timetra',
// 	'password' => 'tfAE1*c;.D++',
// 	'dbName' => 'liorblin_time_tracker_new',
// ];

// staging configs
// $env =
// [
//     'hostName' => 'localhost',
// 	'userName' => 'id20071387_numannaseernomi',
// 	'password' => 'E}d%mQ{3byy-AFcc',
// 	'dbName' => 'id20071387_itimetraker',
// ];

// local configs
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

header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");