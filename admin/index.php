<!DOCTYPE html>
<html>
	<head>
		<title>Naveed Links</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="../css/iStyle.css">
		<link rel="stylesheet" href="css/form.css">
		<?php
			session_start();
			if(isset($_SESSION['userNameNL']))
			{
				header('location:php/admin.php');
			}
		?>
	</head>
	<body>
		<div class="container">
			<?php include "../html/header.html"; ?> <!-- Header -->
			<br/><br/><br/>
			<div class="mainContent"> <!-- Main Content starts here -->
				<div class="blocks">
					<h1>Admin Login</h1>
					<form name="myRepair" action="php/login.php" method="POST">
						<div>
							<label for="uName">Enter User Name:</label>
							<br/>
							<input type="text" placeholder="Example: numan.naseer" name="uName" required />
						</div>
						<div>
							<label for="cNumber">Enter Password:</label>
							<br/>
							<input id="cNumber" type="password" placeholder="Example: 03123456789" name="cNumber" pattern="[0]{1}[3]{1}[0-9]{9}" required />
						</div>
						<button type="submit"><b>Login</b></button>
					</form>
				</div>
			</div> <!-- Main Content ends here -->
			<br/><hr/>
			<?php include "../html/footer.html"; ?> <!-- Footer -->
		</div>
	</body>
</html>