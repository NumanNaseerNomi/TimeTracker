<?php
require_once("connectDB.php");

$timestamp = date("Y-m-d H:i:s", strtotime($_POST["timestamp"]));
$description = empty($_POST["description"]) ? '' : (', description = ' . "'" . $_POST["description"]) . "'";

$sql = "SELECT * FROM records ORDER BY id DESC LIMIT 1";
$query = mysqli_query($conn, $sql);
$record = mysqli_fetch_assoc($query);

if(is_null($record) || !is_null($record['checkout']))
{
    $sql = "INSERT INTO records (checkin) VALUES ('$timestamp')";
}
else
{
    $id = $record['id'];
    $sql = "UPDATE records SET checkout = '$timestamp'" . $description . "WHERE id = '$id'";
}

if(mysqli_query($conn, $sql))
{
    mysqli_close($conn);
    header('location:../');
}
else
{
    mysqli_close($conn);
    echo("Error: " . $sql . "<br>" . mysqli_error($conn));
}
