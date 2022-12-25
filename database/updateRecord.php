<?php
$id = $_POST["recordId"];
$checkin = $_POST["checkinTimestamp"];
$checkout = $_POST["checkoutTimestamp"];
$description = empty($_POST["description"]) ? '' : (', description = ' . "'" . $_POST["description"]) . "'";

require_once("connectDB.php");

$sql = "UPDATE records SET checkin = '$checkin', checkout = '$checkout'" . $description . "WHERE id = '$id'";

if(mysqli_query($conn, $sql))
{
    mysqli_close($conn);
    header('location:../reports.php');
}
else
{
    mysqli_close($conn);
    echo("Error: " . $sql . "<br>" . mysqli_error($conn));
}
