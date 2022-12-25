<?php
$filterRecord = $_POST['filterRecord'] ?? 'today';
include "connectDB.php";

switch($filterRecord)
{
    case 'today':
    {
        $today = date("Y-m-d");
        $sql = "SELECT * FROM Records WHERE checkin >= '$today' && checkout IS NOT NULL ORDER BY ID DESC";
        break;
    }
    case 'thisWeek':
    {
        $firstDayOfWeek = date('Y-m-d', strtotime('monday this week', time()));
        $today = date("Y-m-d");
        $sql = "SELECT * FROM Records WHERE checkin >= '$firstDayOfWeek' && checkin <= '$today' && checkout IS NOT NULL ORDER BY ID DESC";
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
$records = [];

while($row = mysqli_fetch_assoc($query))
{
    $records[] = $row;
}

// var_dump($record);