<?php
	require_once("./database/searchRecord.php");
	$totalSeconds = 0;
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
			<div class="row pb-5">
				<div class="col-md-4 offset-md-4 mb-5">
					<h1 class="p-5">Reports</h1>
					<form method="post" action="reports.php">
						<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="filterBy" onchange="applyFilter(this)">
							<option value="today">Today</option>
							<option value="yesterday">Yesterday</option>
							<option value="thisWeek">This Week</option>
							<option value="lastWeek">Last Week</option>
							<option value="thisMonth">This Month</option>
							<option value="lastMonth">Last Month</option>
							<option value="thisYear">This Year</option>
							<option value="lastYear">Last Year</option>
							<option value="custom">Custom</option>
						</select>
						<input type="hidden" name="filterDate" />
					</form>
					<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
						<div class="btn-group" role="group" aria-label="First group">
							<span class="h4">
								<?php echo $displayDateRange ?>
							</span>
						</div>
						<div class="input-group">
							<button type="button" class="btn btn-link" onclick="downloadData()">
								<i class="fa fa-file-csv text-dark fs-5"></i>
							</button>
						</div>
					</div>
					<div class="card bg-light m-4 mx-5">
						<div class="card-body mx-1">
							<p class="timeSize mb-0"></p>
							<span>HOURS</span>
						</div>
					</div>
					<?php foreach($records as $record) { ?>
						<div class="card my-3">
							<div class="card-header">
								<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
									<div class="btn-group mt-2" role="group" aria-label="First group">
										<h6><?php echo date('d-m-Y', strtotime($record['checkin'])) ?></h6>
									</div>
									<div class="input-group">
										<div class="d-grid gap-2 d-md-flex justify-content-md-end">
											<div class="btn-group dropstart">
												<button type="button" class="btn btn-link text-decoration-none text-dark" data-bs-toggle="dropdown" aria-expanded="false">
													<i class="fas fa-ellipsis-h"></i>
												</button>
												<ul class="dropdown-menu">
													<li>
														<a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editRecord<?php echo $record['id'] ?>">Edit</a>
													</li>
													<li>
														<a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#deleteRecord<?php echo $record['id'] ?>">Delete</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="modal fade" id="editRecord<?php echo $record['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editRecordLabel<?php echo $record['id'] ?>" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="editRecordLabel<?php echo $record['id'] ?>">Edit</h1>
												</div>
												<form method="post" action="database/updateRecord.php">
													<div class="modal-body">
														<div class="card-body pb-0">
															<input type="hidden" name="recordId" value="<?php echo $record['id'] ?>">
															<input type="hidden" name="filterBy" value="<?php echo $filterBy ?>">
															<input type="hidden" name="filterDate" />
															<div class="row g-3">
																<div class="col-md-6">
																	<label for="inputEmail4" class="form-label">Clock In</label>
																	<input class="form-control" type="datetime-local" name="checkinTimestamp" value="<?php echo date("Y-m-d H:i", strtotime($record['checkin'])) ?>" />
																</div>
																<div class="col-md-6">
																	<label for="inputEmail4" class="form-label">Clock Out</label>
																	<input class="form-control" type="datetime-local" name="checkoutTimestamp" value="<?php echo date("Y-m-d H:i", strtotime($record['checkout'])) ?>" />
																</div>
																<div class="col-12">
																	<label for="inputAddress" class="form-label">Description</label>
																	<textarea class="form-control" id="inputAddress" rows="3" name="description"><?php echo $record['description'] ?></textarea>
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
														<button type="submit" class="btn btn-primary">Save</button>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="modal fade" id="deleteRecord<?php echo $record['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteRecordLabel<?php echo $record['id'] ?>" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="deleteRecordLabel<?php echo $record['id'] ?>">Do you realy want to delete this record?</h1>
												</div>
												<div class="modal-body">
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
																	<td><?php echo date('d-m-Y H:i', strtotime($record['checkin'])) ?></td>
																	<td><?php echo date('d-m-Y H:i', strtotime($record['checkout'])) ?></td>
																	<td>
																		<?php
																			$seconds = strtotime($record['checkout']) - strtotime($record['checkin']);
																			$hours = floor($seconds / 3600) ? floor($seconds / 3600) : '00';
																			$mins = floor($seconds / 60 % 60) != 0 ? floor($seconds / 60 % 60) : '00';

																			echo $hours . ':' . $mins;
																		?>
																	</td>
																</tr>
															</tbody>
														</table>
														<p><?php echo $record['description'] ?></p>
													</div>
												</div>
												<div class="modal-footer">
													<form method="post" action="database/deleteRecord.php">
														<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
														<button type="submit" class="btn btn-danger">Delete</button>
														<input type="hidden" name="recordId" value="<?php echo $record['id'] ?>">
														<input type="hidden" name="filterBy" value="<?php echo $filterBy ?>">
														<input type="hidden" name="filterDate" />
													</form>
												</div>
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
											<td title="<?php echo date('d-m-Y H:i', strtotime($record['checkin'])) ?>">
												<?php echo date('H:i', strtotime($record['checkin'])) ?>
											</td>
											<td title="<?php echo date('d-m-Y H:i', strtotime($record['checkout'])) ?>">
												<?php echo date('H:i', strtotime($record['checkout'])) ?>
											</td>
											<td>
												<?php
													$seconds = strtotime($record['checkout']) - strtotime($record['checkin']);
													$totalSeconds += $seconds;
													$hours = floor($seconds / 3600) ? floor($seconds / 3600) : '00';
													$mins = floor($seconds / 60 % 60) != 0 ? floor($seconds / 60 % 60) : '00';

													echo $hours . ':' . $mins;
												?>
											</td>
										</tr>
									</tbody>
								</table>
								<p><?php echo $record['description'] ?></p>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="modal fade" id="dateRangePicker" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="dateRangePickerLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5" id="dateRangePickerLabel">Pick Date Range</h1>
					</div>
					<form method="post" action="reports.php">
						<div class="modal-body">
							<div class="card-body pb-0">
								<input type="hidden" name="filterBy" value="custom">
								<div class="row g-3">
									<div class="col-md-6">
										<label for="inputEmail4" class="form-label">Date From</label>
										<input class="form-control" type="date" name="dateRangeFrom" required />
									</div>
									<div class="col-md-6">
										<label for="inputEmail4" class="form-label">Date To</label>
										<input class="form-control" type="date" name="dateRangeTo" required />
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal" onClick="window.location.reload();">Cancel</button>
							<button type="submit" class="btn btn-primary">Filter</button>
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
	html, body { height: 100%; }
	.timeSize { font-size: 3rem; }
	
	[title]
	{
		border-bottom: 1px dashed rgba(0, 0, 0, 0.2);
		border-radius:2px;
		position: relative;
	}

	body.touched [title] > * { user-select: none; }
	body.touched [title]:hover > * { user-select: auto }

	body.touched [title]:hover:after
	{
		position: absolute;
		top: 100%;
		right: -10%;
		content: attr(title);
		border: 1px solid rgba(0, 0, 0, 0.2);
		background-color: white;
		box-shadow: 1px 1px 3px;
		padding: 0.3em;
		z-index: 1;
	}
</style>
<script>
	let filterOption = <?php echo  "'" . $filterBy . "'" ?>;
	document.querySelector('[name="filterBy"]').value = filterOption;
	document.querySelector('.timeSize').innerHTML = <?php echo floor($totalSeconds / 3600) ?>;

	function downloadData()
    {
		let dateRange = <?php echo  "'" . $displayDateRange . "'" ?>;
		let fileData = <?php echo json_encode($records) ?>;
		let fileName = 'TimeTrackerRecord(' + dateRange + ').csv';
		let csvData = convertToCsv(fileData);
		
		downloadFile(fileName, csvData);
    }

	function convertToCsv(arr)
	{
		const keys = Object.keys(arr[0]);
		const replacer = (_key, value) => value === null ? '' : value;
    	const processRow = row => keys.map(key => JSON.stringify(row[key], replacer)).join(',');
    	return [ keys.join(','), ...arr.map(processRow) ].join('\r\n');
	};


	function downloadFile(fileName, data)
	{
		let link = document.createElement('a');
		link.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(data));
		link.setAttribute('download', fileName);
		link.style.display = 'none';
		document.body.appendChild(link);
		link.click();
		document.body.removeChild(link);
	};

	function applyFilter(event)
	{
		if(event.value == 'custom')
		{
			const dateRangePickerModal = new bootstrap.Modal('#dateRangePicker');
			dateRangePickerModal.show();
		}
		else
		{
			event.form.submit();
		}
	}
	
	document.body.addEventListener('touchstart', () => { document.body.classList.add('touched'); });
	document.querySelectorAll("input[name='filterDate']").forEach((item) => { item.value = new Date().toDateString(); });
</script>
<?php is_null($query) ?? mysqli_free_result($query); ?>
