<?php
$date = $_POST["date"];
$time = $_POST["time"];

$timestamp = date("Y-m-d H:i:s", strtotime($date . ' ' . $time));
$description = $_POST["description"];

