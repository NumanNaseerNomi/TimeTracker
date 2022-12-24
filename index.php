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
				<div class="col-md-6 offset-md-3">
					<h1 class="p-5">Time Tracker</h1>
					<h1 class="py-5"><strong>18:35</strong></h1>
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
		<nav class="navbar sticky-bottom bg-light">
			<div class="container text-center">
				<span></span>
				<span>
					<a class="btn btn-link text-dark" href="#" role="button">
						<i class="fas fa-history fs-3"></i>
					</a>
					<a class="btn btn-link text-dark" href="reports.php" role="button">
						<i class="fas fa-chart-pie fs-3"></i>
					</a>
				</span>
				<span></span>
			</div>
		</nav>
	</body>
</html>

<style>
	html,body
	{
		height: 100%;
	}
</style>