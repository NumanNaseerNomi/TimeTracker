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
					<form method="post" action="saveRecord.php">
						<div class="pt-5">
							<input class="timeSize border-0 pt-5" id="timePicker" type="time" />
						</div>
						<button type="submit" class="btn btn-primary btn-lg m-4">
							<i class="far fa-clock"></i> Clock In
						</button>
					</form>
					<button type="button" class="btn btn-primary btn-lg m-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
						<i class="far fa-clock"></i> Clock Out
					</button>







<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Clock Out</h1>
      </div>
      <div class="modal-body">
        Clock Out: 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
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