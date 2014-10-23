<!-- Header -->
<header>
	<div class="container">
		<h1>Fitness Tracker - Food Records</h1>
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
							<th>Name</th>
							<th>Calories</th>
							<th>Category</th>
							<th>Date</th>
							<th>Time</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Rice</td>
							<td>200</td>
							<td>Lunch</td>
							<td>02/10/2014</td>
							<td>12:15 AM</td>
						</tr>
						<tr>
							<td>Steak</td>
							<td>100</td>
							<td>Lunch</td>
							<td>02/10/2014</td>
							<td>12:15 AM</td>
						</tr>
						<tr>
							<td>Beans</td>
							<td>150</td>
							<td>Lunch</td>
							<td>02/10/2014</td>
							<td>12:15 AM</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-6 col-xs-offset-6 text-right">
			<a class="btn btn-default" data-toggle="modal" data-target="#myModal" href="?action=create&format=plain"> <span class="glyphicon glyphicon-plus"></span> Add New Meal </a>
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

<script type="text/javascript">
	$(function() {
		$('#myModal').on('hidden.bs.modal');
	}); 
</script>