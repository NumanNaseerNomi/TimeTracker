<!DOCTYPE html>
<html>
	<head>
		<title>Naveed Links</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="../css/iStyle.css">
		<link rel="stylesheet" href="../admin/css/form.css">
		<link rel="stylesheet" href="../admin/css/table.css">
	</head>
	<body>
		<div class="container">
			<?php include "header.html"; ?> <!-- Header -->
			<br/><br/><br/>
			<div class="mainContent"> <!-- Main Content starts here -->
				<div class="blocks">
					<h1>My Repair</h1>
					<form name="myRepair"  method="POST">
						<div>
							<label for="jobNumber">Enter Job Number:</label>
							<br/>
							<input type="number" placeholder="Example: 123456" name="jobNumber" required />
						</div>
						<div>
							<label for="cNumber">Enter Contact Number:</label>
							<br/>
							<input id="cNumber" type="text" placeholder="Example: 03123456789" name="cNumber" pattern="[0]{1}[3]{1}[0-9]{9}" required />
						</div>
						<button type="submit"><b>Check</b></button>
					</form>
				</div>
				<div>
					<?php
						if ( $_SERVER["REQUEST_METHOD"] == "POST" )
						{
							include "../php/myRepair.php";
						}
					?>
				</div>
			</div> <!-- Main Content ends here -->
			<br/><hr/>
			<?php include "footer.html"; ?> <!-- Footer -->
		</div>
	</body>
</html>