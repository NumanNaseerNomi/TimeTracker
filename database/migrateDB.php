<?php
require_once("connectDB.php");
$sql = file_get_contents('TimeTracker.sql');

if(mysqli_multi_query($conn, $sql))
{
    mysqli_close($conn);
    echo("Database migrated successfully.");
}
else
{
    mysqli_close($conn);
    echo("Error: " . $sql . "<br>" . mysqli_error($conn));
}