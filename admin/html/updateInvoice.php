<!DOCTYPE html>
<html>
	<head>
		<title>Naveed Links</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="../../css/iStyle.css">
		<link rel="stylesheet" href="../css/form.css">
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
	<body><div class="container">
		<footer><p><strong><?php echo($_SESSION["userNameNL"]); ?></strong></p></footer>
			<br/><br/>
			<div class="mainContent"> <!-- Main Content starts here -->
				<div class="blocks">
					<h1>Update Invoice</h1>
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

							$_SESSION["jobNumber"] = $jobNumber;

							include "../php/connectDB.php";

							$sql = " SELECT * FROM customers WHERE jobNumber = '$jobNumber' ";
							$query = mysqli_query($conn,$sql);

							if(mysqli_num_rows($query) == 1)
							{
								$row = mysqli_fetch_assoc($query);
					?>
								<br/>
								<form name="myRepair" action="../php/updateInvoice.php" method="POST">
									<div>
										<h1>Job Number: <?php echo($row['jobNumber']); ?></h1>
									</div>
									<div class="block">
										<label for="fName">Name:</label>
										<br/>
										<input type="text" placeholder="Example: Numan Naseer" value="<?php echo($row['name']); ?>" name="fName"  required />
									</div>
									<div class="block">
										<label for="cNumber">Contact Number:</label>
										<br/>
										<input type="text" value="<?php echo($row['contactNumber']); ?>" name="cNumber" pattern="[0]{1}[3]{1}[0-9]{9}" disabled />
									</div>
									<div class="block">
										<label for="oCNumber">Other Contact Number:</label>
										<br/>
										<input id="oCNumber" type="text" placeholder="Example: 03123456789" value="<?php echo($row['otherContactNumber']); ?>" name="oCNumber" pattern="[0]{1}[3]{1}[0-9]{9}" />
									</div>
									<div class="block">
										<label for="brand">Brand:</label>
										<br/>
										<input type="text" placeholder="Example: iPhone, Samsung" value="<?php echo($row['brand']); ?>" name="brand" required />
									</div>
									<div class="block">
										<label for="model">Model:</label>
										<br/>
										<input type="text" placeholder="Example: 6s+, S4" value="<?php echo($row['model']); ?>" name="model" required />
									</div>
									<div class="block">
										<label for="fault">Fault:</label>
										<br/>
										<input type="text" placeholder="Example: LCD, Camera" value="<?php echo($row['fault']); ?>" name="fault" required />
									</div>
									<div class="block">
										<label for="description">Description:</label>
										<br/>
										<input type="text" placeholder="Example: Also check Mic" value="<?php echo($row['description']); ?>" name="description" />
									</div>
									<div class="block">
										<label for="chargesPKR">Charges PKR:</label>
										<br/>
										<input type="number" placeholder="Example: 1500" value="<?php echo($row['chargesPKR']); ?>" name="chargesPKR" />
									</div>
									<div class="block">
										<label for="accessories">Accessories:</label>
										<br/>
										<input type="text" placeholder="Example: Charger, Back Cover" value="<?php echo($row['accessories']); ?>" name="accessories" />
									</div>
									<div class="block">
										<label for="partsUsed">Parts Used:</label>
										<br/>
										<input type="text" placeholder="Example: New Camera" value="<?php echo($row['partsUsed']); ?>" name="partsUsed" />
									</div>
									<div class="block">
										<label for="workDone">Work Done:</label>
										<br/>
										<input type="text" placeholder="Example: Charging Repair" value="<?php echo($row['workDone']); ?>" name="workDone" />
									</div>
									<div class="block">
										<label for="comment">Comment:</label>
										<br/>
										<input type="text" placeholder="Example: Explanation etc." value="<?php echo($row['comment']); ?>" name="comment" />
									</div>
									<div class="block">
										<label for="status">Status:</label>
										<br/><br/>
										<input id="status" type="radio" name="status" value="inProcess" required/> inProcess
										<input id="status" type="radio" name="status" value="OK" /> OK
										<input id="status" type="radio" name="status" value="Rejected" /> Reject
										<input id="status" type="radio" name="status" value="Canceled" /> Cancel
										<br/><br/>
									</div>
									<button type="submit"><b>Update</b></button>
								</form>
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

