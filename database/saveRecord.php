<?php
$date = $_POST["date"];
$time = $_POST["time"];

$timestamp = date("Y-m-d H:i:s", strtotime($date . ' ' . $time));
$description = $_POST["description"];

include "connectDB.php";

$sql = "SELECT * FROM Records ORDER BY ID DESC LIMIT 1";
$query = mysqli_query($conn, $sql);
$record = mysqli_fetch_assoc($query);

if(!empty($record) && is_null($record['checkout']))
{
    $id = $record['id'];
    $sql = "UPDATE Records SET checkout = '$timestamp', description = '$description' WHERE id = '$id'";
}
else
{
	$sql = "INSERT INTO Records (checkin) VALUES ('$timestamp')";
}

if(mysqli_query($conn, $sql))
{
    mysqli_close($conn);
    header('location:../index.php');
}
else
{
    mysqli_close($conn);
    echo("Error: " . $sql . "<br>" . mysqli_error($conn));
}
