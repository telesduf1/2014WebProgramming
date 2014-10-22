<header>
	<div class="container">
		<h1>Fitness Tracker - Exercise</h1>
	</div>
</header>

<!-- Page Content -->
<div class="container">

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" >
		<div class="modal-dialog">
			<div class="modal-content"></div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Exercise</th>
							<th>Calories Burned</th>
							<th>Duration</th>
							<th>Date</th>
							<th>Time</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Hiking</td>
							<td>900</td>
							<td>1 hour</td>
							<td>02/11/2014</td>
							<td>10:00 AM</td>
						</tr>
						<tr>
							<td>Running</td>
							<td>500</td>
							<td>30 minutes</td>
							<td>02/11/2014</td>
							<td>02:10 PM</td>
						</tr>
						<tr>
							<td>Swimming</td>
							<td>450</td>
							<td>45 minutes</td>
							<td>02/11/2014</td>
							<td>05:10 PM</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-6 col-xs-offset-6 text-right">
			<a class="btn btn-default" data-toggle="modal" data-target="#myModal" href="?action=edit&format=plain"> <span class="glyphicon glyphicon-plus"></span> Add New Exercise </a>
		</div>
	</div>
</div>

<!-- Footer -->
<footer class="index">
	<div class="panel-footer text-center">
		<div class="container">

			<p class="text-muted">
				<small>Fitness Tracker Copyright &copy; by telesduf1</small>
			</p>

		</div>
	</div>
</footer>

<!-- Bootstrap core JavaScript placed here in order to load faster the pages -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="content/js/main.js"></script>
<script type="text/javascript">
	$(function() {
		$('#myModal').on('hidden.bs.modal');
	}); 
</script>
</body>
