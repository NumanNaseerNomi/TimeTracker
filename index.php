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
					<div class="pt-5">
						<input class="timeSize border-0 pt-5" id="timePicker" type="time" />
					</div>
					<button type="button" class="btn btn-primary btn-lg m-4">
						<i class="far fa-clock"></i> Clock In
					</button>
					<!-- <button type="button" class="btn btn-primary btn-lg m-4">
						<i class="far fa-clock"></i> Clock Out
					</button> -->
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
		font-size: 5rem;
	}

	input[type="time"]::-webkit-calendar-picker-indicator
	{
		font-size: 3rem;
	}
</style>
<script>
	const time = new Date().toTimeString().split(' ')[0].split(':');
	document.querySelector('#timePicker').value = time[0] + ':' + time[1];
</script>