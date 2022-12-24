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
			else
			{
		?>
	</head>
	<body>
		<div class="container">
			<footer><p><strong><?php echo($_SESSION["userNameNL"]); ?></strong></p></footer>
			<br/>
			<div class="mainContent"> <!-- Main Content starts here -->
				<br/>
				<div class="blocks">
					<h1>Add to My Job</h1>
					<form method="POST" >
						<div>
							<label for="jobNumber">Job Number:</label>
							<br/>
							<input type="number" placeholder="Example: 1234" name="jobNumber" required />
						</div>
						<div>
							<button type="submit"><b>Search...</b></button>
						</div>
					</form>
				</div>
				<div>
					<?php

						$jobNumber = "";

						if($_SERVER["REQUEST_METHOD"] == "POST")
						{
							$jobNumber = $_POST["jobNumber"];
							$userName = $_SESSION["userNameNL"];

							$_SESSION["jobNumber"] = $jobNumber;

							include "../php/connectDB.php";

							$sql = " SELECT * FROM customers WHERE jobNumber = '$jobNumber'  AND !(worker = '$userName' OR worker1 = '$userName' OR worker2 = '$userName')  AND (status = 'Pending' OR status = 'inProcess') AND outBy = '' ";
							$query = mysqli_query($conn,$sql);

							if(mysqli_num_rows($query) == 1)
							{
								$row = mysqli_fetch_assoc($query);
					?>
								<br/>
								<div class="table">
									<table>
										<thead>
											<tr>
												<th><b>Job Number:</b></th>
												<th><?php echo($row["jobNumber"]); ?></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><b>Name:</b></td>
												<td><?php echo($row["name"]); ?></td>
											</tr>
											<tr>
												<td><b>Contact Number:</b></td>
												<td><?php echo($row["contactNumber"]); ?></td>
											</tr>
											<tr>
												<td><b>Other Contact Number:</b></td>
												<td><?php echo($row["otherContactNumber"]); ?></td>
											</tr>
											<tr>
												<td><b>Brand:</b></td>
												<td><?php echo($row["brand"]); ?></td>
											</tr>
											<tr>
												<td><b>Model:</b></td>
												<td><?php echo($row["model"]); ?></td>
											</tr>
											<tr>
												<td><b>Fault:</b></td>
												<td><?php echo($row["fault"]); ?></td>
											</tr>
											<tr>
												<td><b>Description:</b></td>
												<td><?php echo($row["description"]); ?></td>
											</tr>
											<tr>
												<td><b>Charges PKR:</b></td>
												<td><?php echo($row["chargesPKR"]); ?></td>
											</tr>
											<tr>
												<td><b>Accessories:</b></td>
												<td><?php echo($row["accessories"]); ?></td>
											</tr>
											<tr>
												<td><b>Status:</b></td>
												<td><?php echo($row["status"]); ?></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div>
									<a href="../php/addMyJob.php"><button type="button"><b>Add to My Job</b></button></a>
								</div>
					<?php
							}
							else
							{
								echo("<h1>No Invoice Found</h1>");
							}
							
							mysqli_close($conn);
						}
					?>
				</div>
			</div> <!-- Main Content ends here -->
			<br/><hr/>
			<?php include "../../html/footer.html"; ?> <!-- Footer -->
		</div>
		<?php } ?>
	</body>
</html>