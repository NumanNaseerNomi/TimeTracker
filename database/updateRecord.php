<?php
require_once("connectDB.php");

$id = $_POST["recordId"];
$checkin = $_POST["checkinTimestamp"];
$checkout = $_POST["checkoutTimestamp"];
$description = empty($_POST["description"]) ? '' : (', description = ' . "'" . $_POST["description"]) . "'";

$sql = "UPDATE records SET checkin = '$checkin', checkout = '$checkout'" . $description . "WHERE id = '$id'";

if(mysqli_query($conn, $sql))
{
    mysqli_close($conn);
    header('location:../reports.php?filterBy=' . $_POST["filterBy"] . '&filterDate=' . $_POST['filterDate']);
}
else
{
    mysqli_close($conn);
    echo("Error: " . $sql . "<br>" . mysqli_error($conn));
}
