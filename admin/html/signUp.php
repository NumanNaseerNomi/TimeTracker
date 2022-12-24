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
		?>
	</head>
	<body>
		<div class="container">
			<footer><p><strong><?php echo($_SESSION["userNameNL"]); ?></strong></p></footer>
			<br/><br/>
			<div class="mainContent"> <!-- Main Content starts here -->
			<div class="blocks">
				<h1>Sign Up</h1>
				<form name="myRepair" action="../php/signUp.php" method="POST">
					<div class="block">
						<label for="fName">First Name:</label>
						<br/>
						<input type="text" placeholder="Example: Numan Naseer" name="fName" required />
					</div>
					<div class="block">
						<label for="lName">Last Name:</label>
						<br/>
						<input type="text" placeholder="Example: Nomi" name="lName" required />
					</div>
					<div class="block">
						<label for="cNumber">Contact Number:</label>
						<br/>
						<input id="cNumber" type="text" placeholder="Example: 03123456789" name="cNumber" pattern="[0]{1}[3]{1}[0-9]{9}" required />
					</div>
					<div class="block">
						<label for="oCNumber">Guardian Contact Number:</label>
						<br/>
						<input id="oCNumber" type="text" placeholder="Example: 03123456789" name="oCNumber" pattern="[0]{1}[3]{1}[0-9]{9}" required />
					</div>
					<div class="block">
						<label for="nicNumber">NIC Number:</label>
						<br/>
						<input id="nicNumber" type="text" placeholder="Example: 12345-6789012-3" name="nicNumber" pattern="[0-9]{5}[-]{1}[0-9]{7}[-]{1}[0-9]{1}" required />
					</div>
					<div class="block">
						<label for="hAddress">Home Address:</label>
						<br/>
						<input id="hAddress" type="text" placeholder="Example: Lahore, Pakistan" name="hAddress" required />
					</div>
					<div class="block">
						<label for="about">About:</label>
						<br/>
						<input id="about" type="text" placeholder="Example: About me" name="about" />
					</div>
					<div class="block">
						<label for="uType">User Type:</label>
						<br/><br />
						<input id="uType" type="radio" name="uType" value="Admin" required /> Admin
						<input id="uType" type="radio" name="uType" value="User" /> User
						<br /><br /><br />
					</div>
					<button type="submit"><b>Register</b></button>
				</form>
			</div>
			</div> <!-- Main Content ends here -->
			<br/><hr/>
			<?php include "../../html/footer.html"; ?> <!-- Footer -->
		</div>
	</body>
</html>