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
			<br/><br/>
			<div class="mainContent"> <!-- Main Content starts here -->
				<div class="blocks">
					<h1>Un/Block User</h1>
					<form method="POST" >
						<div>
							<label for="uName">User Name:</label>
							<br/>
							<input type="text" placeholder="Example: numan.naseer" name="uName" required />
						</div>
						<div>
							<button type="submit"><b>Search...</b></button>
						</div>
					</form>
				</div>
				<div>
					<?php

						$uName = "";

						if($_SERVER["REQUEST_METHOD"] == "POST")
						{
							$uName = $_POST["uName"];
							$uNameNL = $_SESSION["userNameNL"];

							$_SESSION["uName"] = $uName;

							include "../php/connectDB.php";

							$sql = " SELECT * FROM admin WHERE userName = '$uName' AND userName != '$uNameNL' ";
							$query = mysqli_query($conn,$sql);

							if(mysqli_num_rows($query) > 0)
							{
								$row = mysqli_fetch_assoc($query);
					?>
								<br/>
								<div class="table">
									<table>
										<thead>
											<tr>
												<th><b>User Name:</b></th>
												<th><?php echo($row["userName"]); ?></th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><b>First Name:</b></td>
												<td><?php echo($row["fName"]); ?></td>
											</tr>
											<tr>
												<td><b>Last Name:</b></td>
												<td><?php echo($row["lName"]); ?></td>
											</tr>
											<tr>
												<td><b>Contact Number:</b></td>
												<td><?php echo($row["contactNumber"]); ?></td>
											</tr>
											<tr>
												<td><b>Guardian Contact Number:</b></td>
												<td><?php echo($row["gContactNumber"]); ?></td>
											</tr>
											<tr>
												<td><b>NIC Number:</b></td>
												<td><?php echo($row["nicNumber"]); ?></td>
											</tr>
											<tr>
												<td><b>Home Address:</b></td>
												<td><?php echo($row["hAddress"]); ?></td>
											</tr>
											<tr>
												<td><b>About:</b></td>
												<td><?php echo($row["about"]); ?></td>
											</tr>
											<tr>
												<td><b>User Type:</b></td>
												<td><?php echo($row["userType"]); ?></td>
											</tr>
											<tr>
												<td><b>Status:</b></td>
												<td>
													<form name="myRepair" action="../php/blockUser.php" method="POST">
														<input id="status" type="radio" name="status" value="Blocked" required /> Block
														<input id="status" type="radio" name="status" value="Active" /> Unblock
												</td>
											</tr>
										</tbody>
									</table>
														<button type="submit"><b>Next</b></button>
													</form>
								</div>
					<?php
							}
							else
							{
								echo("<h1>No User Found...</h1>");
							}

							mysqli_close($conn);
						}
					?>
				</div>
			</div> <!-- Main Content ends here -->
			<br/><hr/>
			<?php include "../../html/footer.html"; ?> <!-- Footer -->
		</div>
	</body>
</html>