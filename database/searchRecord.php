<?php
$filterRecord = $_POST['filterRecord'] ?? 'today';
include "connectDB.php";

switch($filterRecord)
{
    case 'today':
    {
        $today = date("Y-m-d");
        $sql = "SELECT * FROM Records WHERE checkin >= '$today' ORDER BY ID DESC";
        break;
    }
    case 'thisWeek':
    {
        var_dump($filterRecord);
        break;
    }
    case 'lastWeek':
    {
        var_dump($filterRecord);
        break;
    }
    case 'thisYear':
    {
        var_dump($filterRecord);
        break;
    }
    case 'lastYear':
    {
        var_dump($filterRecord);
        break;
    }
    case 'all':
    {
        var_dump($filterRecord);
        break;
    }
}

$query = mysqli_query($conn,$sql);
$record = [];

while($row = mysqli_fetch_assoc($query))
{
    $record[] = $row;
}

// var_dump($record);