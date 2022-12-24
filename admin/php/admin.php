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
			<br/>
			<div class="mainContent"> <!-- Main Content starts here -->

				<div class="blocks">
					<br/><br/>
					<div>
						<button type="button" onclick="window.open('../html/newInvoice.php', '_blank', 'width=600, height=600')"><b>New Invoice</b></button>
						<button type="button" onclick="window.open('../html/updateInvoice.php', '_blank', 'width=600, height=600')"><b>Update Invoice</b></button>
						<button type="button" onclick="window.open('../html/outInvoice.php', '_blank', 'width=600, height=600')"><b>Out Invoice</b></button>
						<button type="button" onclick="window.open('../html/addMyJob.php', '_blank', 'width=600, height=600')"><b>Add to My Job</b></button>
						<button type="button" onclick="window.open('findData.php', '_blank', 'width=500px, height=500px')"><b>Find</b></button>
						
						
						<?php
							include "connectDB.php";

							$userNameNL = $_SESSION["userNameNL"];

							$sql = " SELECT userType FROM admin WHERE userName = '$userNameNL' ";
							$query = mysqli_query($conn,$sql);
							$row = mysqli_fetch_assoc($query);
							mysqli_close($conn);

							if($row["userType"] == "Admin")
							{
						?>
						<button type="button" onclick="window.open('../html/signUp.php', '_blank', 'width=600, height=600')"><b>Register New User</b></button>
						<button type="button" onclick="window.open('users.php', '_blank', 'width=600, height=600')"><b>Users</b></button>
						<button type="button" onclick="window.open('../html/blockUser.php', '_blank', 'width=600, height=600')"><b>Un/Block User</b></button>
						<?php } ?>
						<a href="logOut.php"><button type="button"><b>Log Out</b></button></a>
					</div>
				</div>
				<div>
					<?php include "myJobs.php"; ?>
				</div>
			</div> <!-- Main Content ends here -->
			<br/><hr/>
			<?php include "../../html/footer.html"; ?> <!-- Footer -->
		</div>
	</body>
</html>