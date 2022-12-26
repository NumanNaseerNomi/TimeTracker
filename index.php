<?php
	require_once("./database/connectDB.php");

	$sql = "SELECT SQL_NO_CACHE * FROM records ORDER BY id DESC LIMIT 1";
	$query = mysqli_query($conn, $sql);
	$record = mysqli_fetch_assoc($query);
?>
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
											<input class="showTime border-0" type="time" id="timePicker" />
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary" onClick="window.location.reload()" data-bs-dismiss="modal">Reset</button>
											<button type="button" class="btn btn-primary" onClick="timePicked()" data-bs-dismiss="modal">Select</button>
										</div>
									</div>
								</div>
							</div>

<br/>
							<!-- <input class="timeSize border-0 pt-5" id="timePicker" type="time" name="time" /> -->
							<input type="date" id="datePicker" name="date" hidden/>
						</div>
						<?php if(!empty($record) && is_null($record['checkout'])) { ?>
							<button type="button" class="btn btn-primary btn-lg m-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
								<i class="far fa-clock"></i> Clock Out
							</button>
						<?php } else { ?>
							<button type="submit" class="btn btn-primary btn-lg m-4">
								<i class="far fa-clock"></i> Clock In
							</button>
						<?php }?>
						<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Description</h1>
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
	html,body
	{
		height: 100%;
	}

	.showTime
	{
		font-size: 6rem;
	}

	/* .timeSize
	{
		font-size: 5rem;
	} */

	/* input[type="time"]::-webkit-calendar-picker-indicator
	{
		font-size: 3rem;
	} */
</style>
<script>
	const timestamp = new Date();
	const month = timestamp.getMonth() + 1;
	// const time = timestamp.toTimeString().split(' ')[0].split(':');
	
	// document.querySelector('#timePicker').value = time[0] + ':' + time[1];
	// document.querySelector('#datePicker').value = timestamp.getFullYear() + "-" + month + "-" + timestamp.getDate();

// 	const time = new Date().toTimeString().slice(0, 5);
// const date = new Date().toDateString();
// const dateTime = date + " " + time;
// const d = new Date(date + " " + time);

// alert(d);

	// document.querySelector('#timestamp').value = dateTime; //'2022-12-26 19:28:38';
// alert(timestamp);
	function timePicked()
	{
		let timePicked = document.querySelector('#timePicker').value;

		if(timePicked)
		{
			let date = new Date().toDateString();
			document.querySelector('#showPickedTime').innerHTML = timePicked;
			document.querySelector('#timestamp').value = new Date(date + " " + timePicked);
		}
	}

	if(document.querySelector('#showTime'))
	{
		setInterval(() =>
		{
			let date = new Date().toDateString();
			let time = new Date().toTimeString().slice(0, 5);
			document.querySelector('#showTime').innerHTML = new Date().toTimeString().slice(0, 5);
			document.querySelector('#timestamp').value = new Date(date + " " + time);
		}, 1000);
	}
</script>
<?php is_null($query) ?? mysqli_free_result($query); ?>