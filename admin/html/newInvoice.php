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
			<br/>
			<div class="mainContent"> <!-- Main Content starts here -->
				<br/>
				<div class="blocks">
					<h1>New Invoice</h1>
					<form name="myRepair" action="../php/newInvoice.php" method="POST">
						<div class="block">
							<label for="fName">Name:</label>
							<br/>
							<input type="text" placeholder="Example: Numan Naseer" name="fName" required />
						</div>
						<div class="block">
							<label for="cNumber">Contact Number:</label>
							<br/>
							<input id="cNumber" type="text" placeholder="Example: 03123456789" name="cNumber" pattern="[0]{1}[3]{1}[0-9]{9}" required />
						</div>
						<div class="block">
							<label for="oCNumber">Other Contact Number:</label>
							<br/>
							<input id="oCNumber" type="text" placeholder="Example: 03123456789" name="oCNumber" pattern="[0]{1}[3]{1}[0-9]{9}" />
						</div>
						<div class="block">
							<label for="brand">Brand:</label>
							<br/>
							<input type="text" placeholder="Example: iPhone, Samsung" name="brand" required />
						</div>
						<div class="block">
							<label for="model">Model:</label>
							<br/>
							<input type="text" placeholder="Example: 6s+, S4" name="model" required />
						</div>
						<div class="block">
							<label for="fault">Fault:</label>
							<br/>
							<input type="text" placeholder="Example: LCD, Camera" name="fault" required />
						</div>
						<div class="block">
							<label for="description">Description:</label>
							<br/>
							<input type="text" placeholder="Example: Also check Mic" name="description" />
						</div>
						<div class="block">
							<label for="chargesPKR">Charges PKR:</label>
							<br/>
							<input type="number" placeholder="Example: 1500" name="chargesPKR" />
						</div>
						<div class="block">
							<label for="accessories">Accessories:</label>
							<br/>
							<input type="text" placeholder="Example: Charger, Back Cover" name="accessories" />
						</div>
						<button type="submit"><b>Save</b></button>
					</form>
				</div>
			</div> <!-- Main Content ends here -->
			<br/><hr/>
			<?php include "../../html/footer.html"; ?> <!-- Footer -->
		</div>
	</body>
</html>