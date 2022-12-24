<!DOCTYPE html>
<html>
	<head>
		<title>Naveed Links</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="../css/style.css">
		<link rel="stylesheet" href="../css/myRepair.css">
		<link rel="stylesheet" href="../css/table.css">
	</head>
	<body>
		<div class="container">
			<?php include "../html/header.html"; ?> <!-- Header -->
			<br/><br/><br/>

			<div class="mainContent"> <!-- Main Content starts here -->

				<div class="blocks">
					
					<h1>My Repair</h1>
					<form name="myRepair" action="../php/myRepairResult.php" method="POST" onsubmit="return numberCheck()">

						<table>
							<thead>
								<tr>
									<th>Welcome Name</th>
									<th>Welcome Name</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>data</td>
									<td>data</td>
								</tr>
							</tbody>
						</table>





						<div>
							<label for="jobNumber">Enter Job Number:</label>
							<br/>
							<input type="number" placeholder="Example: 123456" name="jobNumber" required />
						</div>
						<div>
							<label for="cNumber">Enter Contact Number:</label>
							<br/>
							<input id="cNumber" type="number" placeholder="Example: 03123456789" name="cNumber" required />
						</div>
						<button type="submit"><b>Check</b></button>
					</form>
					<script src="../js/numberCheck.js"></script>
				</div>
			</div> <!-- Main Content ends here -->
			<br/><hr/>
			<?php include "../html/footer.html"; ?> <!-- Footer -->
		</div>
	</body>
</html>