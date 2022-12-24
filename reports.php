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
					<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
						<option selected>Today</option>
						<option value="1">This Week</option>
						<option value="2">Last Week</option>
						<option value="3">This Year</option>
						<option value="3">Last Year</option>
						<option value="3">All</option>
					</select>
					<span class="h4">March 14, 2022</span>
					<!-- <button type="button" class="btn btn-link">
						<i class="far fa-clock"></i>
					</button> -->

					<div class="card m-4 mx-5">
						<div class="card-body mx-1">
							<p class="timeSize mb-0">44</p>
							<span>HOURS</span>
						</div>
					</div>

					<div class="form-check form-switch pt-5">
						<label class="form-check-label" for="flexSwitchCheckDefault">
							<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"> Manual Time
						</label>
					</div>
					<button type="button" class="btn btn-primary btn-lg m-4">
						<i class="far fa-clock"></i> Clock In
					</button>
				</div>
			</div>
		</div>
		<?php include "./components/navbar.php"; ?>
	</body>
</html>

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