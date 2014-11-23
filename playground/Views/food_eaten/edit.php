<form class="form-horizontal" action="?action=save" method="post" >

	<input type="hidden" name="id" value="<?=$model['Id'] ?>" />
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">
			<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
		</button>
		<h4 class="modal-title" id="myModalLabel">Record a meal</h4>
	</div>

	<div class="modal-body">

		<!--Meal Type -->
		<div class="form-group">
		    <label for="selType_id" class="col-xs-3 control-label">Meal Type</label>
		    <div class="col-xs-8">
					<select class="form-control" name="Meal Type">
		    			<? foreach (Meal_Type::Get() as $value): ?>
							<option <?= $value['id'] == $model['Meal_Type_id'] ? 'selected' : '' ?> value="<?=$value['id']?>"><?=$value['name']?></option>
						<? endforeach; ?>
		    		</select>
		    </div>
		 </div>

		<!-- Date -->
		<div class="form-group">
			<label for="date" class="col-xs-3 control-label"> Date </label>
			<div class="col-xs-8">
				<input type="date" class="form-control" required value="<?=$model['Date'] ?>">
			</div>
		</div>		
				
		<!-- Time -->
		<div class="form-group">
			<label for="time" class="col-xs-3 control-label"> Time </label>
			<div class="col-xs-8">
				<input type="time" class="form-control" required value="<?=$model['Time'] ?>">
			</div>
		</div>
		
		<!-- Search Food -->
		<div class="form-group">
			<div class="col-xs-8 col-xs-offset-3" id="search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search Food">
					<span class="input-group-btn">
						<button type="button" class="btn btn-default">
							Search
						</button> 
					</span>
					<span class="input-group-btn">
						<button type="button" class="btn btn-default" id="button">
							Add Food
						</button> 
					</span>
				</div>
			</div>
		</div>
		 
		<div id="foodForm">
			<? $model['Id'] == null ? $food = null :  $food = Food::Get($model['Food_id']);?>
			<!-- Name -->
			<div class="form-group">
				<label for="date" class="col-xs-3 control-label"> Food Name </label>
				<div class="col-xs-8">
					<input type="text" class="form-control" required value="<?=$food['name'] ?>">
				</div>
			</div>			
			
			<!-- Food Category -->
			<div class="form-group">
		    	<label for="selType_id" class="col-xs-3 control-label">Food Type</label>
		    	<div class="col-xs-8">
					<select class="form-control" name="Food Type">
		    			<? foreach (Food_Type::Get() as $value): ?>
							<option <?= $value['id'] == $food['Food_Category_id'] ? 'selected' : '' ;?> value="<?=$value['id']?>"><?=$value['name']?></option>
						<? endforeach; ?>
		    		</select>
		    	</div>
		 	</div>
			
			<!-- Calories -->
			<div class="form-group">
				<label class="col-xs-3 control-label" for="cal"> Cal </label>
				<div class="col-xs-8">
					<input type="number" class="form-control" required value="<?=$food['calories'] ?>">
				</div>
			</div>
			
			<!-- Fat -->
			<div class="form-group">
				<label class="col-xs-3 control-label" for="cal"> Fat </label>
				<div class="col-xs-8">
					<input type="number" class="form-control" required value="<?=$food['fat'] ?>">
				</div>
			</div>			
			
			<!-- Carbs -->
			<div class="form-group">
				<label class="col-xs-3 control-label" for="cal"> Carbs </label>
				<div class="col-xs-8">
					<input type="number" class="form-control" required value="<?=$food['carbs'] ?>">
				</div>
			</div>
						
			<!-- Protein -->			
			<div class="form-group">
				<label class="col-xs-3 control-label" for="cal"> Protein </label>
				<div class="col-xs-8">
					<input type="number" class="form-control" required value="<?=$food['protein'] ?>">
				</div>
			</div>			
		</div>
	</div>

	<div class="modal-footer  text-center">
		<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
		<input type="submit" name="submit" class="btn btn-default" value="Register" />
	</div>
</form>

<script>
/*
$(document).ready(function(){
  
    $("#foodForm").hide();
    
    $("#button").click(function(){
    	$("#foodForm").show();
  	});
  
});*/
</script>