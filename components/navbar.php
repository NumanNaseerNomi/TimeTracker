<nav class="navbar fixed-bottom bg-light">
	<div class="container text-center">
		<span></span>
		<span>
			<a class="btn btn-link text-dark" href="index.php" role="button">
				<i class="fas fa-clock fs-1"></i>
			</a>
			<a class="btn btn-link text-dark" href="reports.php?filterBy=today&filterDate=" role="button" id="filterDateUrl">
				<i class="fas fa-chart-pie fs-1"></i>
			</a>
		</span>
		<span></span>
	</div>
</nav>
<script>
	let date = new Date().toDateString();
	document.querySelector('#filterDateUrl').href += date;
</script>