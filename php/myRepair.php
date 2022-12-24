<?php
	include "../admin/php/connectDB.php";
	$jobNumber = $_POST["jobNumber"];
	$cNumber = $_POST["cNumber"];
	$sql = " SELECT * FROM customers WHERE jobNumber = '$jobNumber' AND (contactNumber = '$cNumber' OR otherContactNumber = '$cNumber') ";
	$query = mysqli_query($conn,$sql);
	$row = mysqli_num_rows($query);
	if($row == 1)
	{
		$sql = "SELECT * FROM customers WHERE contactNumber = '$cNumber' OR otherContactNumber = '$cNumber' ";
		$result = mysqli_query($conn, $sql);
		echo("<h1>Showing Results for: " . $cNumber . "</h1>");
		echo("<div class = 'table'><table><tr><th>Job #</th><th>Receive Date & Time</th><th>Brand</th><th>Model</th><th>Fault</th><th>Description</th><th>Last Update</th><th>Status</th><th>Out Date & Time</th></tr>");

		$tResults = 0;
		while($row = mysqli_fetch_assoc($result))
		{
			echo("<tr><td>" . $row["jobNumber"]. "</td><td>" . $row["receiveDateTime"]. "</td><td>" . $row["brand"] . "</td><td>" . $row["model"]. "</td><td>" . $row["fault"] . "</td><td>" . $row["description"]. "</td><td>" . $row["lastUpdate"]. "</td><td>" . $row["status"]. "</td><td>" . $row["outDateTime"]. "</td></tr>");
			$tResults++;
		}
		echo("</table></div><h3>Total Results: " . $tResults . "</h3>");
	}
	else
	{
		echo("<h1>0 Results Found for</h1><table><tr><th>Job Number</th><th>Contact Number</th></tr><tr><td>" . $jobNumber . "</td><td>" . $cNumber . "</td></table>");
	}
	mysqli_close($conn);
?>