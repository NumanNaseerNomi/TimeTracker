<?php
$filterRecord = $_POST['filterRecord'] ?? 'today';
include "connectDB.php";

switch($filterRecord)
{
    case 'today':
    {
        $toDate = date("Y-m-d");
        $sql = "SELECT * FROM Records WHERE checkin >= '$toDate' && checkout IS NOT NULL ORDER BY ID DESC";
        break;
    }
    case 'thisWeek':
    {
        $fromDate = date('Y-m-d', strtotime('monday this week', time()));
        $toDate = date("Y-m-d");
        $sql = "SELECT * FROM Records WHERE checkin BETWEEN '$fromDate' AND '$toDate' AND checkout IS NOT NULL ORDER BY ID DESC";
        break;
    }
    case 'lastWeek':
    {
        $fromDate = date('Y-m-d', strtotime('monday last week', time()));
        $toDate = date('Y-m-d', strtotime('sunday last week', time()));
        $sql = "SELECT * FROM Records WHERE checkin BETWEEN '$fromDate' AND '$toDate' AND checkout IS NOT NULL ORDER BY ID DESC";
        break;
    }
    case 'thisMonth':
    {
        $fromDate = date('Y-m-d', strtotime('first day of this month'));
        $toDate = date('Y-m-d', strtotime('last day of this month'));
        $sql = "SELECT * FROM Records WHERE checkin BETWEEN '$fromDate' AND '$toDate' AND checkout IS NOT NULL ORDER BY ID DESC";
        break;
    }
    case 'lastMonth':
    {
        $fromDate = date('Y-m-d', strtotime('first day of last month'));
        $toDate = date('Y-m-d', strtotime('last day of last month'));
        $sql = "SELECT * FROM Records WHERE checkin BETWEEN '$fromDate' AND '$toDate' AND checkout IS NOT NULL ORDER BY ID DESC";
        break;
    }
    case 'thisYear':
    {
        $fromDate = date('Y-m-d', strtotime('first day of this month'));
        $toDate = date('Y-m-d', strtotime('last day of this month'));
        $sql = "SELECT * FROM Records WHERE checkin BETWEEN '$fromDate' AND '$toDate' AND checkout IS NOT NULL ORDER BY ID DESC";
        die($fromDate);
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

$query = mysqli_query($conn, $sql);
$records = [];

while($row = mysqli_fetch_assoc($query))
{
    $records[] = $row;
}

// var_dump($record);