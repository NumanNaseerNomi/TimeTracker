<!DOCTYPE html>
<html>
	<head>
		<title>Naveed Links</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="../../css/iStyle.css">
		<link rel="stylesheet" href="../css/form.css">
		<link rel="stylesheet" href="../css/table.css">
		<?php
			session_start();
			if(!isset($_SESSION["userNameNL"]))
			{
				header('location:../index.php');
			}
		?>
	</head>
	<body>
		<div class="container">
			<footer><p><strong><?php echo($_SESSION["userNameNL"]); ?></strong></p></footer>
			
			<div class="mainContent"> <!-- Main Content starts here -->
				<br/>
				<div class="blocks">
					<?php
						include "connectDB.php";

						$sql = " SELECT * FROM  customers ";
						$query = mysqli_query($conn,$sql);

						echo("
							<h3>Press Ctrl+F to Find</h3>
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
											<th>Received By</th>
											<th>Worker</th>
											<th>Worker1</th>
											<th>Worker2</th>
											<th>Parts Used</th>
											<th>Work Done</th>
											<th>Last Update By</th>
											<th>Last Update</th>
											<th>Comment</th>
											<th>Status</th>
											<th>NIC Number</th>
											<th>Out By</th>
											<th>Out Date & Time</th>
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
									<td>" . $row["receivedBy"] . "</td>
									<td>" . $row["worker"]. "</td>
									<td>" . $row["worker1"]. "</td>
									<td>" . $row["worker2"] . "</td>
									<td>" . $row["partsUsed"]. "</td>
									<td>" . $row["workDone"] . "</td>
									<td>" . $row["lastUpdateBy"]. "</td>
									<td>" . $row["lastUpdate"]. "</td>
									<td>" . $row["comment"] . "</td>
									<td>" . $row["status"] . "</td>
									<td>" . $row["nicNumber"] . "</td>
									<td>" . $row["outBy"] . "</td>
									<td>" . $row["outDateTime"] . "</td>
								</tr>
							");
														
							$tResults++;
						}
						echo("</table></div><h3>Total Results: " . $tResults . "</h3>");
						mysqli_close($conn);
					?>
				</div>
			</div> <!-- Main Content ends here -->
			<br/><hr/>
			<?php include "../../html/footer.html"; ?> <!-- Footer -->
		</div>
	</body>
</html>