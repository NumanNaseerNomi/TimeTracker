<?php

// Connect to the local database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "timetracker";


// Connect to the live database
// $host = "localhost";
// $username = "liorblin_timetra";
// $password = "tfAE1*c;.D++";
// $dbname = "liorblin_time_tracker_new";

$conn = mysqli_connect($host, $username, $password, $dbname);

$query = "SHOW VARIABLES";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result))
{
  print_r($row);
  echo '<br/>';
}

die(1);
if (!$result) {
  echo mysqli_error($conn);
}

$query = "SET SESSION query_cache_type = OFF";
$result = mysqli_query($conn, $query);
die($result);
mysqli_close($conn);

?>
