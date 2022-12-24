<?php include "connectDB.php"; ?>
<?php
	$userNameNL = $_SESSION['userNameNL'];
	$sql = " SELECT * FROM  customers WHERE (worker = '$userNameNL' OR worker1 = '$userNameNL' OR worker2 = '$userNameNL') AND status = 'inProcess' AND outBy = '' ";
	$query = mysqli_query($conn,$sql);

	if(mysqli_num_rows($query) > 0)
	{
		echo("
			<h1>My Jobs</h1>
			<div class = 'table'>
				<table>
					<tr>
						<th>Job #</th>
						<th>Receive Date & Time</th>
						<th>Name</th>
						<th>Contact Number</th>
						<th>Other Contact Number</th>
						<th>Brand</th>
						<th>Model</th>
						<th>Fault</th>
						<th>Description</th>
						<th>Charges PKR</th>
						<th>Worker</th>
						<th>Worker1</th>
						<th>Worker2</th>
						<th>Parts Used</th>
						<th>Work Done</th>
						<th>Last Update By</th>
						<th>Last Update</th>
						<th>Comment</th>
					</tr>
		");
								
		$tResults = 0;

		while($row = mysqli_fetch_assoc($query))
		{
			echo("
				<tr>
					<td>" . $row["jobNumber"]. "</td>
					<td>" . $row["receiveDateTime"]. "</td>
					<td>" . $row["name"] . "</td>
					<td>" . $row["contactNumber"]. "</td>
					<td>" . $row["otherContactNumber"] . "</td>
					<td>" . $row["brand"]. "</td>
					<td>" . $row["model"]. "</td>
					<td>" . $row["fault"]. "</td>
					<td>" . $row["description"]. "</td>
					<td>" . $row["chargesPKR"]. "</td>
					<td>" . $row["worker"]. "</td>
					<td>" . $row["worker1"]. "</td>
					<td>" . $row["worker2"] . "</td>
					<td>" . $row["partsUsed"]. "</td>
					<td>" . $row["workDone"] . "</td>
					<td>" . $row["lastUpdateBy"]. "</td>
					<td>" . $row["lastUpdate"]. "</td>
					<td>" . $row["comment"] . "</td>
				</tr>
			");
									
			$tResults++;
		}
		echo("</table></div><h3>Total Results: " . $tResults . "</h3>");
	}
	mysqli_close($conn);
?>