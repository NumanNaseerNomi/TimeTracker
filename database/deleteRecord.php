<?php
$recordId = $_POST["recordId"];
include "connectDB.php";

$sql = "DELETE FROM records WHERE id = '$recordId'";
$query = mysqli_query($conn, $sql);

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
