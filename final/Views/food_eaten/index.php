<!-- Header -->
<header>
	<div class="container">
		<h1>Food Records - <?=date("m/d/Y")?></h1>
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
						<tr ng-repeat="row in data | orderBy: 'Created' | filter: '<?=date("Y-m-d")?>'">
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
								<a ng-click="click(row)" title="Edit" class="btn btn-default toggle-modal edit" data-target="#myModal" href="?action=edit&id={{row.Id}}">
									<i class="glyphicon glyphicon-pencil"></i>
								</a>
								<a ng-click="click(row)" title="Delete" class="btn btn-default btn-sm toggle-modal delete" data-target="#myModal" href="?action=delete&id={{row.Id}}">
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
			<a class="btn btn-default toggle-modal add" data-target="#myModal" href="?action=create"> <span class="glyphicon glyphicon-plus"></span> Add New Meal </a>
		</div>
	</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
<script type="text/javascript" src="http://builds.handlebarsjs.com.s3.amazonaws.com/handlebars-v2.0.0.js"></script>

<script type="text/javascript">
var $mContent;
var app = angular.module('app', [])
	.controller('index', function($scope, $http){
		$scope.curRow = null;
		
		$scope.click = function(row){
			$scope.curRow = row;
		}
		
		$http.get('?format=json')
		.success(function(data){
			$scope.data = data;
		});
		
		$('body').on('click', ".toggle-modal", function(event){
			event.preventDefault();
			var $btn = $(this);
			
			MyFormDialog(this.href, function (data) {
				if($btn.hasClass('edit')){
					$scope.data[$scope.data.indexOf($scope.curRow)] = data;
				}
				if($btn.hasClass('add')){
					$scope.data.push(data);							
				}
				if($btn.hasClass('delete')){
					$scope.data.splice($scope.data.indexOf($scope.curRow), 1);				
				}
				$scope.$apply();
			})								
		})		
	});

	function MyFormDialog (url, then /*callback when the form is submitted*/) {
		$("#myModal").modal("show");
		$.get(url + "&format=plain", function(data){
			//alert(JSON.stringify(data));
			$mContent.html(data);
			$mContent.find('form')
			.on('submit', function(e){
				e.preventDefault();
				$("#myModal").modal("hide");
						
				$.post(this.action + '&format=json', $(this).serialize(), function(data){
					then(data);
				}, 'json');
			});
		});
	}
	
	$(function(){
		$(".food").addClass("active");
								
		$mContent = $("#myModal .modal-content");
		var defaultContent = $mContent.html();							
										
		$('#myModal').on('hidden.bs.modal', function (e) {
			$mContent.html(defaultContent);	    
		})
				
	});
</script>