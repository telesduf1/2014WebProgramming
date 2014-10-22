<header>
	<div class="container">
		<h1>Fitness Tracker - Food</h1>
	</div>
</header>

<div class="container content">

	<?
	$msg = null;
	$arr = array('first' => 'breakfast', 'second' => 'lunch', 'third' => 'dinner');
	$arr['fourth'] = 'midnight snack';
	//my_print ($arr);
	$meal = $arr['first'];
	$msg = "Excelent Job. Your $arr[second] has been recorded";
	?>

	<a class="btn btn-success" data-toggle="modal" data-target="#myModal" href="?action=create&?view=plain"> <i class="glyphicon glyphicon-plus"></i> Add </a>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" >
		<div class="modal-dialog">
			<div class="modal-content"></div>
		</div>
	</div>

	<!-- Alert -->
	<? foreach($arr as $key => $meal):
	?>
	<div class="alert alert-success initialy-hidden" id="myAlert">
		<button type="button" class="close" data-dismiss="alert">
			<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
		</button>
		Excelent Job. Your <?=$key ?>
		meal i.e. <?=$meal ?>
		has been recorded
	</div>
	<? endforeach; ?>

	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Calories</th>
					<th>Fat (g)</th>
					<th>Carbs (g)</th>
					<th>Fiber (g)</th>
					<th>Protien (g)</th>
					<th>Time</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Pizza</td>
					<td>500</td>
					<td>18.0</td>
					<td>5.0</td>
					<td>2.0</td>
					<td>3.0</td>
					<td> Sunday 9:15am</td>
				</tr>
				<tr>
					<td>Yogurt</td>
					<td>80</td>
					<td>0.5</td>
					<td>0.0</td>
					<td>0.0</td>
					<td>3.0</td>
					<td> Sunday 10:15am</td>
				</tr>
				<tr>
					<td>Slim-Bar</td>
					<td>100</td>
					<td>2.0</td>
					<td>5.0</td>
					<td>5.0</td>
					<td>3.0</td>
					<td> Sunday 11:15am</td>
				</tr>
			</tbody>
		</table>
	</div>

</div>

<script type="text/javascript">
	$(function() {

		$(".food").addClass("active");

		$('#myModal').on('hidden.bs.modal', function(e) {
			$("#myAlert").show();
		})
	}); 
</script>
