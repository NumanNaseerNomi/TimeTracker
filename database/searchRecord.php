<?php
include "connectDB.php";
$filterRecord = isset($_POST['filterRecord']) ? $_POST['filterRecord'] : 'today';

switch($filterRecord)
{
    case 'today':
    {
        $toDate = date("Y-m-d");
        $sql = "SELECT * FROM records WHERE checkin LIKE '$toDate%' && checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
    case 'yesterday':
    {
        $toDate = date('Y-m-d', strtotime('yesterday'));
        $sql = "SELECT * FROM records WHERE checkin LIKE '$toDate%' && checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
    case 'thisWeek':
    {
        $fromDate = date('Y-m-d', strtotime('monday this week', time()));
        $toDate = date("Y-m-d");
        $sql = "SELECT * FROM records WHERE checkin BETWEEN '$fromDate' AND '$toDate' AND checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
    case 'lastWeek':
    {
        $fromDate = date('Y-m-d', strtotime('monday last week', time()));
        $toDate = date('Y-m-d', strtotime('sunday last week', time()));
        $sql = "SELECT * FROM records WHERE checkin BETWEEN '$fromDate' AND '$toDate' AND checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
    case 'thisMonth':
    {
        $fromDate = date('Y-m-d', strtotime('first day of this month'));
        $toDate = date('Y-m-d', strtotime('last day of this month'));
        $sql = "SELECT * FROM records WHERE checkin BETWEEN '$fromDate' AND '$toDate' AND checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
    case 'lastMonth':
    {
        $fromDate = date('Y-m-d', strtotime('first day of last month'));
        $toDate = date('Y-m-d', strtotime('last day of last month'));
        $sql = "SELECT * FROM records WHERE checkin BETWEEN '$fromDate' AND '$toDate' AND checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
    case 'thisYear':
    {
        $fromDate = date('Y-m-d', strtotime('first day of january this year'));
        $toDate = date('Y-m-d', strtotime('last day of december this year'));
        $sql = "SELECT * FROM records WHERE checkin BETWEEN '$fromDate' AND '$toDate' AND checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
    case 'lastYear':
    {
        $fromDate = date('Y-m-d', strtotime('first day of january last year'));
        $toDate = date('Y-m-d', strtotime('last day of december last year'));
        $sql = "SELECT * FROM records WHERE checkin BETWEEN '$fromDate' AND '$toDate' AND checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
    case 'all':
    {
        $sql = "SELECT * FROM records WHERE checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
}

$query = mysqli_query($conn, $sql);
$records = [];

while($row = mysqli_fetch_assoc($query))
{
    $records[] = $row;
}
