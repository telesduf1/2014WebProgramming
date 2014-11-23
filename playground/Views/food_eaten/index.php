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
							<th>Meal</th>
							<th>Food Name</th>
							<th>Food Type</th>
							<th>Calories</th>
							<th>Fat</th>
							<th>Carbs</th>
							<th>Protein</th>
							<th>Date</th>
							<th>Time</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
              	<? foreach ($model as $rs): $meal = Meal_Type::Get($rs['Meal_Type_id']); $food = Food::Get($rs['Food_id']); $food_type = Food_Type::Get($food['Food_Category_id']); ?>
                <tr>
                  <td><?=$meal['name'] ?></td>                	                	
                  <td><?=$food['name'] ?></td>
                  <td><?=$food_type['name'] ?></td>
                  <td><?=$food['calories'] ?></td>
                  <td><?=$food['fat'] ?></td>
                  <td><?=$food['carbs'] ?></td>
                  <td><?=$food['protein'] ?></td>
                  <td><?=$rs['Date'] ?></td>
                  <td><?=$rs['Time'] ?></td>
                  <td>
					<a title="Edit" class="btn btn-default toggle-modal1" data-toggle="#myModal" data-target="#myModal" href="?action=edit&id=<?=$rs['Id'] ?>">
						<i class="glyphicon glyphicon-pencil"></i>
					</a>
					<a title="Delete" class="btn btn-default btn-sm toggle-modal" data-target="#myModal" href="?action=delete&id=<?=$rs['Id']?>">
						<i class="glyphicon glyphicon-trash"></i>
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
			<a class="btn btn-default toggle-modal" data-toggle="#myModal" data-target="#myModal" href="?action=create&format=plain"> <span class="glyphicon glyphicon-plus"></span> Add New Meal </a>
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
		$(".toggle-modal").on('click', function(event){
			event.preventDefault();
			$("#myModal .modal-content").load(this.href + "&format=plain");
			$("#myModal").modal("show");
						
			$.get(this.href + "&format=plain", function(data){
				//$("#foodForm").hide();    
    			$("#button").click(function(){
    				$("#foodForm").show();
    				$("#search").hide();
  				});
			});						
		})
		
		$(".toggle-modal1").on('click', function(event){
			event.preventDefault();
			$("#myModal .modal-content").load(this.href + "&format=plain");
			$("#myModal").modal("show");
			
			$.get(this.href + "&format=plain", function(data){
				$("#search").hide();    
			});			
		})		
								
		$('#myModal').on('hidden.bs.modal', function (e) {
			$("#myAlert").show();
		})
		
	});	
	
</script>