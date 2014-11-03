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
              	<? foreach ($model as $rs): ?>
                <tr>
                  <td><?=$rs['Name'] ?></td>
                  <td><?=$rs['Calories'] ?></td>
                  <td><?=$rs['Date'] ?></td>
                  <td><?=$rs['Time'] ?></td>
                  <td>
					<a title="Edit" class="btn btn-default btn-sm toggle-modal" data-target="#myModal" href="?action=edit&id=<?=$rs['Id'] ?>">
						<i class="glyphicon glyphicon-pencil"></i>
					</a>                  	
                  </td>
                </tr>
                <? endforeach; ?>
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