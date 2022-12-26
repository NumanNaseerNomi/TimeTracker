<?php
require_once("connectDB.php");
$recordId = $_POST["recordId"];

$sql = "DELETE FROM records WHERE id = '$recordId'";

if(mysqli_query($conn, $sql))
{
    mysqli_close($conn);
    header('location:../reports.php?filterBy=' . $_POST["filterBy"]);
}
else
{
    mysqli_close($conn);
    echo("Error: " . $sql . "<br>" . mysqli_error($conn));
}
