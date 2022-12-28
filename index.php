<?php
	// header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
	// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	// header("Cache-Control: post-check=0, pre-check=0", false);
	// header("Pragma: no-cache");

	require_once("./database/connectDB.php");

	$sql = "SELECT * FROM records WHERE checkout IS NULL ORDER BY id DESC LIMIT 1";
	$query = mysqli_query($conn, $sql);
	$record = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Time Tracker</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width" />
		<link rel="stylesheet" href="./plugins/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="./plugins/fontawesome/css/all.min.css">
	</head>
	<body>
		<div class="container text-center h-100">	
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<h1 class="p-5">Time Tracker</h1>
					<form method="post" action="database/saveRecord.php">
						<div class="pt-5">
							<button type="button" class="btn border-0" data-bs-toggle="modal" data-bs-target="#timePickerModal">
								<h1 class="showTime" id="showPickedTime">
									<span id="showTime">--:--</span>
								</h1>
							</button>
							<i class="far fa-clock fs-2"></i>
							<input type="text" id="timestamp" name="timestamp" readonly hidden />
							<div class="modal fade" id="timePickerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="timePickerModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="timePickerModalLabel">Pick Time</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<div class="row g-3">
												<div class="col-12">
													<input class="form-control form-control-lg" type="time" id="timePicker" />
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger" onClick="window.location.reload()" data-bs-dismiss="modal">Reset</button>
											<button type="button" class="btn btn-primary" onClick="timePicked()" data-bs-dismiss="modal">Select</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php if(is_null($record)) { ?>
							<button type="submit" class="btn btn-primary btn-lg m-4">
								<i class="far fa-clock"></i> Clock In
							</button>
						<?php } else { ?>
							<button type="button" class="btn btn-primary btn-lg m-4" data-bs-toggle="modal" data-bs-target="#checkOutModel">
								<i class="far fa-clock"></i> Clock Out
							</button>
						<?php } ?>
						<div class="modal fade" id="checkOutModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="checkOutModelLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="checkOutModelLabel">Description</h1>
									</div>
									<div class="modal-body">
										<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
										<button type="submit" class="btn btn-primary">Save</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php include "./components/navbar.php"; ?>
	</body>
</html>
<script type="text/javascript" src="./plugins/bootstrap/bootstrap.bundle.min.js"></script>
<style>
	html, body
	{
		height: 100%;
	}

	.showTime
	{
		font-size: 6rem;
	}
</style>
<script>
	function timePicked()
	{
		let timePicked = document.querySelector('#timePicker').value;

		if(timePicked)
		{
			let date = new Date().toDateString();
			document.querySelector('#timestamp').value = date + " " + timePicked;
			document.querySelector('#showPickedTime').innerHTML = timePicked;
		}
	}

	if(document.querySelector('#showTime'))
	{
		setInterval(() =>
		{
			let date = new Date().toDateString();
			let time = new Date().toTimeString().slice(0, 5);
			document.querySelector('#showTime').innerHTML = time;
			document.querySelector('#timestamp').value = date + " " + time;
		}, 1000);
	}
</script>
<?php is_null($query) ?? mysqli_free_result($query); ?>