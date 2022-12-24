<?php include "./database/searchRecord.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Time Tracker</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="./plugins/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="./plugins/fontawesome/css/all.min.css">
	</head>
	<body>
		<div class="container text-center h-100">	
			<div class="row">
				<div class="col-md-4 offset-md-4">
					<h1 class="p-5">Reports</h1>
					<form method="post" action="reports.php">
						<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="filterRecord" onchange="this.form.submit()">
							<option value="0">Today</option>
							<option value="1">This Week</option>
							<option value="2">Last Week</option>
							<option value="3">This Year</option>
							<option value="4">Last Year</option>
							<option value="-1">All</option>
						</select>
					</form>
					<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
						<div class="btn-group" role="group" aria-label="First group">
							<span class="h4">March 14, 2022</span>
						</div>
						<div class="input-group">
							<button type="button" class="btn btn-link">
								<i class="fas fa-file-download text-dark fs-5"></i>
							</button>
						</div>
					</div>
					<div class="card bg-light m-4 mx-5">
						<div class="card-body mx-1">
							<p class="timeSize mb-0">44</p>
							<span>HOURS</span>
						</div>
					</div>
					<div class="card">
						<div class="card-header">
							<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
								<div class="btn-group mt-2" role="group" aria-label="First group">March 14, 2022</div>
								<div class="input-group">
									<div class="d-grid gap-2 d-md-flex justify-content-md-end">
										<div class="btn-group dropstart">
											<button type="button" class="btn btn-link dropdown-toggle text-decoration-none text-dark" data-bs-toggle="dropdown" aria-expanded="false">
												<i class="fas fa-ellipsis-h"></i>
											</button>
											<ul class="dropdown-menu">
												<li><a class="dropdown-item" href="#">Action</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body pb-0">
							<table class="table table-borderless">
								<thead>
									<tr>
										<th scope="col">Time In</th>
										<th scope="col">Time Out</th>
										<th scope="col">Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>15:00</td>
										<td>17:00</td>
										<td>2:00</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include "./components/navbar.php"; ?>
	</body>
</html>
<script type="text/javascript" src="./plugins/bootstrap/bootstrap.bundle.min.js"></script>
<style>
	html,body
	{
		height: 100%;
	}

	.timeSize
	{
		font-size: 3rem;
	}
</style>
<script>
	document.querySelector('[name="filterRecord"]').value = <?php echo $filterRecord ?>;
</script>