<?php
$date = $_POST["date"];
$time = $_POST["time"];
$description = $_POST["description"];

$timestamp = date("Y-m-d H:i:s", strtotime($date . ' ' . $time));


echo $date;
echo $timestamp;