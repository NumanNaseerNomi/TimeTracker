<?php
$filterRecord = $_POST['filterRecord'] ?? 'today';

switch($filterRecord)
{
    case 'today':
    {
        $sql = "SELECT * FROM Records ORDER BY ID DESC LIMIT 1";
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