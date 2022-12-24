<!DOCTYPE html>
<html>
	<head>
		<title>Naveed Links</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="../../css/iStyle.css">
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
					<h1>Users</h1>
					<br/><br/><br/>
					<?php
						include "connectDB.php";

						$sql = " SELECT * FROM admin ";
						$query = mysqli_query($conn,$sql);

						echo("<div class = 'table'><table><tr><th>#</th><th>User Name</th><th>First Name</th><th>Last Name</th><th>Contact Number</th><th>Guardian Contact Number</th><th>NIC Number</th><th>Home Address</th><th>about</th><th>User Type</th><th>Status</th></tr>");

						$tResults = 0;

						while($row = mysqli_fetch_assoc($query))
						{
							echo("<tr><td>" . $row["id"]. "</td><td>" . $row["userName"]. "</td><td>" . $row["fName"] . "</td><td>" . $row["lName"]. "</td><td>" . $row["contactNumber"] . "</td><td>" . $row["gContactNumber"]. "</td><td>" . $row["nicNumber"]. "</td><td>" . $row["hAddress"]. "</td><td>" . $row["about"]. "</td><td>" . $row["userType"]. "</td><td>" . $row["status"]. "</td></tr>");
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