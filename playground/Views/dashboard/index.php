<!-- Header -->
<header>
	<div class="container">
		<h1>Fitness Tracker - Home</h1>
	</div>
</header>

<!-- Page Content -->
<div class="container content" ng-app="app" ng-controller='index'>

	<div class="row">
		<div class="col-sm-3 col-sm-offset-3">
			<div class="pie_progress" role="progressbar" data-goal="100" id="trackedFood">
				<div class="pie_progress__number">
					0
				</div>
				<div class="pie_progress__label">
					<!-- <span class=""> <img src="img/food.png" alt="Food Ingested Today" title="Food Ingested Today" > </span> -->
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="text-muted">
						<span class="glyphicon glyphicon-cutlery"> </span> Calories Ingested Today
						<br>
						<span id="foodIngested"></span> kcal/ <?=$_SESSION['MAX_FOOD']?> kcal
					</p>
				</div>
			</div>
		</div>

		<div class="col-sm-3">
			<div class="pie_progress" role="progressbar" data-goal="100" id="trackedExercise">
				<div class="pie_progress__number">
					0
				</div>
				<div class="pie_progress__label">
					<!-- <span class=""> <img src="img/exercise.png" alt="Food Burned Today" title="Food Burned Today"> </span> -->
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="text-muted">
						<span class="glyphicon glyphicon-fire"> </span> Calories Burned Today
						<br>
						<span id="exerciseBurned"></span> kcal/ <?=$_SESSION['MAX_EXERCISE']?> kcal
					</p>
				</div>
			</div>
		</div>
	</div>


</div>

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
<script src="../content/js/jquery-asPieProgress.js"></script>
<script type="text/javascript">
	    var totalFoodCalories = 0;
	    var totalExerciseCalories = 0;
		var maxFoodCalories = <?=$_SESSION['MAX_FOOD']?>;
		var maxExerciseCalories = <?=$_SESSION['MAX_EXERCISE']?>;
  		var exercisePercentage = 0;
  		var foodPercentage = 0;    
  		
		$('.pie_progress').asPieProgress({
			'namespace' : 'pie_progress'
		});
		
		$.get("../Views/dashboard/exercisetotal.php?q=<?=date('Y-m-d')?>",function(data,status){
    		totalExerciseCalories = data;
    		exercisePercentage = (100*(+totalExerciseCalories/1000))/maxExerciseCalories;
    		$("#trackedExercise").asPieProgress('go', +exercisePercentage);
    		$("#exerciseBurned").append(totalExerciseCalories/1000);
  		});

		$.get("../Views/dashboard/foodtotal.php?q=<?=date('Y-m-d')?>",function(data,status){
    		totalFoodCalories = data;
    		foodPercentage = (100*(+totalFoodCalories/1000))/maxFoodCalories;
    		$("#trackedFood").asPieProgress('go', +foodPercentage);
    		$("#foodIngested").append(totalFoodCalories/1000);
  		});
	
	
		$(".dashboard").addClass("active");
								  					
</script>