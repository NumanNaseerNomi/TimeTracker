<!DOCTYPE html>
<html>
	<head>
		<title>Naveed Links</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="../../css/iStyle.css">
		<link rel="stylesheet" href="../css/table.css">
		<?php session_start(); ?>
	</head>
	<body>
		<div class="container">
			<footer><p><strong><?php echo($_SESSION["userNameNL"]); ?></strong></p></footer>
			<br/>
			<div class="mainContent"> <!-- Main Content starts here -->
				<div class="blocks">
					<br/><br/><br/>
					<div class="table">
						<table>
							<thead>
								<tr>
									<th colspan="2">New Invoice Created Successfully</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><b>Job Number:</b></td>
									<td><?php echo($_SESSION["jobNumber"]); ?></td>
								</tr>
								<tr>
									<td><b>Receive Date & Time:</b></td>
									<td><?php echo($_SESSION["receiveDateTime"]); ?></td>
								</tr>
								<tr>
									<td><b>Name:</b></td>
									<td><?php echo($_SESSION["name"]); ?></td>
								</tr>
								<tr>
									<td><b>Contact Number:</b></td>
									<td><?php echo($_SESSION["contactNumber"]); ?></td>
								</tr>
								<tr>
									<td><b>Other Contact Number:</b></td>
									<td><?php echo($_SESSION["otherContactNumber"]); ?></td>
								</tr>
								<tr>
									<td><b>Brand:</b></td>
									<td><?php echo($_SESSION["brand"]); ?></td>
								</tr>
								<tr>
									<td><b>Model:</b></td>
									<td><?php echo($_SESSION["model"]); ?></td>
								</tr>
								<tr>
									<td><b>Fault:</b></td>
									<td><?php echo($_SESSION["fault"]); ?></td>
								</tr>
								<tr>
									<td><b>Description:</b></td>
									<td><?php echo($_SESSION["description"]); ?></td>
								</tr>
								<tr>
									<td><b>Charges PKR:</b></td>
									<td><?php echo($_SESSION["chargesPKR"]); ?></td>
								</tr>
								<tr>
									<td><b>Accessories:</b></td>
									<td><?php echo($_SESSION["accessories"]); ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div> <!-- Main Content ends here -->
			<br/><hr/>
			<?php include "../../html/footer.html"; ?> <!-- Footer -->
		</div>
		<script src="../js/numberCheck.js"></script>
	</body>
</html>