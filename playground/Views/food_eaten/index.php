<!-- Header -->
<header>
	<div class="container">
		<h1>Fitness Tracker - Food Records</h1>
	</div>
</header>

<!-- Page Content -->
<div class="container content" ng-app="app" ng-controller='index'>

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
						<tr ng-repeat="row in data | orderBy: 'Created'">
                  			<td>{{row.Meal_Type}}</td>
                  			<td>{{row.Food_Name}}</td>
                  			<td>{{row.Food_Type}}</td>
                  			<td>{{row.Calories}}</td>
                  			<td>{{row.Fat}}</td>
                  			<td>{{row.Carbs}}</td>
                  			<td>{{row.Protein}}</td>
                  			<td>{{row.Date | date : 'MM/dd/yyyy'}}</td>
                  			<td>{{row.Time | date : 'h:mma'}}</td>
                  			<td>
								<a title="Edit" class="btn btn-default toggle-modal edit" data-toggle="#myModal" data-target="#myModal" href="?action=edit&id={{row.Id}}">
									<i class="glyphicon glyphicon-pencil"></i>
								</a>
								<a title="Delete" class="btn btn-default btn-sm toggle-modal delete" data-target="#myModal" href="?action=delete&id={{row.Id}}">
									<i class="glyphicon glyphicon-trash"></i>
								</a>                  	
                  			</td>
                		</tr>
              		</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-6 col-xs-offset-6 text-right">
			<a class="btn btn-default toggle-modal add" data-toggle="#myModal" data-target="#myModal" href="?action=create"> <span class="glyphicon glyphicon-plus"></span> Add New Meal </a>
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

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
<script type="text/javascript" src="http://builds.handlebarsjs.com.s3.amazonaws.com/handlebars-v2.0.0.js"></script>
<script type="text/javascript">
var app = angular.module('app', [])
	.controller('index', function($scope, $http){
		$http.get('?format=json')
		.success(function(data){
			$scope.data = data;
		});
	});

	$(function(){
		$(".food").addClass("active");
								
		var $mContent = $("#myModal .modal-content");
		var defaultContent = $mContent.html();
				
								
				
		$('body').on('click', ".toggle-modal", function(event){
			event.preventDefault();
			$("#myModal").modal("show");
			var $btn = $(this);
					
			$.get(this.href + "&format=plain", function(data){
				$mContent.html(data);
				$mContent.find('form')
				.on('submit', function(e){
					//e.preventDefault();
					$("#myModal").modal("hide");
					/*
					$.post(this.action + '&format=json', $(this).serialize(), function(data){								
						alert(JSON.stringify(data));
						if($btn.hasClass('edit')){
							//$btn.closest('tr').replaceWith(tmpl(data));							
						}
						if($btn.hasClass('add')){
							//$('tbody').append(tmpl(data));							
						}
						if($btn.hasClass('delete')){
							$btn.closest('tr').remove();							
						}
					}, 'json');*/	
				});
			});
		})
								
		$('#myModal').on('hidden.bs.modal', function (e) {
			$mContent.html(defaultContent);	    
		})
				
	});
	
</script>