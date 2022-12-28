<?php
require_once("connectDB.php");

if(isset($_POST['filterBy']))
{
    $filterBy = $_POST['filterBy'];
}
elseif(isset($_GET['filterBy']))
{
    $filers = ['today', 'yesterday', 'thisWeek', 'lastWeek', 'lastWeek', 'thisMonth', 'lastMonth', 'thisYear', 'lastYear', 'all'];

    if(in_array($_GET['filterBy'], $filers))
    {
        $filterBy = $_GET['filterBy'];
    }
    else
    {
        $filterBy = 'today';
    }
}
else
{
    $filterBy = 'today';
}

if(isset($_POST['filterDate']))
{
    $todayDate = date('Y-m-d', strtotime($_POST['filterDate']));
}
elseif(isset($_GET['filterDate']))
{
    $todayDate = date('Y-m-d', strtotime($_GET['filterDate']));
}
else
{
    $todayDate = date("Y-m-d");
}

switch($filterBy)
{
    case 'today':
    {
        $displayDateRange = date('d-m-Y', strtotime($todayDate));
        $sql = "SELECT * FROM records WHERE Date(checkin) = '$todayDate' && checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
    case 'yesterday':
    {
        $yesterday = date('Y-m-d', strtotime($todayDate . "-1 day"));
        $displayDateRange = date('d-m-Y', strtotime($yesterday));
        $sql = "SELECT * FROM records WHERE Date(checkin) = '$yesterday' && checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
    case 'thisWeek':
    {
        $fromDate = date('Y-m-d', strtotime($todayDate . "monday this week"));
        $displayDateRange = date('d-m-Y', strtotime($fromDate)) . ' -- ' . date('d-m-Y', strtotime($todayDate));
        $sql = "SELECT * FROM records WHERE Date(checkin) BETWEEN '$fromDate' AND '$todayDate' AND checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
    case 'lastWeek':
    {
        $fromDate = date('Y-m-d', strtotime($todayDate . "monday last week"));
        $toDate = date('Y-m-d', strtotime($todayDate . "sunday last week"));
        $displayDateRange = date('d-m-Y', strtotime($fromDate)) . ' -- ' . date('d-m-Y', strtotime($toDate));
        $sql = "SELECT * FROM records WHERE Date(checkin) BETWEEN '$fromDate' AND '$toDate' AND checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
    case 'thisMonth':
    {
        $fromDate = date('Y-m-d', strtotime($todayDate . 'first day of this month'));
        $displayDateRange = date('d-m-Y', strtotime($fromDate)) . ' -- ' . date('d-m-Y', strtotime($todayDate));
        $sql = "SELECT * FROM records WHERE Date(checkin) BETWEEN '$fromDate' AND '$todayDate' AND checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
    case 'lastMonth':
    {
        $fromDate = date('Y-m-d', strtotime($todayDate . 'first day of last month'));
        $toDate = date('Y-m-d', strtotime($todayDate . 'last day of last month'));
        $displayDateRange = date('d-m-Y', strtotime($fromDate)) . ' -- ' . date('d-m-Y', strtotime($toDate));
        $sql = "SELECT * FROM records WHERE Date(checkin) BETWEEN '$fromDate' AND '$toDate' AND checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
    case 'thisYear':
    {
        $fromDate = date('Y-m-d', strtotime('first day of january this year'));
        $displayDateRange = date('d-m-Y', strtotime($fromDate)) . ' -- ' . date('d-m-Y', strtotime($todayDate));
        $sql = "SELECT * FROM records WHERE Date(checkin) BETWEEN '$fromDate' AND '$todayDate' AND checkout IS NOT NULL ORDER BY id DESC";
        break;
    }
    case 'lastYear':
    {
        $fromDate = date('Y-m-d', strtotime('first day of january last year'));
        $toDate = date('Y-m-d', strtotime('last day of december last year'));
        $displayDateRange = date('d-m-Y', strtotime($fromDate)) . ' -- ' . date('d-m-Y', strtotime($toDate));
        $sql = "SELECT * FROM records WHERE Date(checkin) BETWEEN '$fromDate' AND '$toDate' AND checkout IS NOT NULL ORDER BY id DESC";
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
