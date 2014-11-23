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
		    <label for="mealType_id" class="col-xs-3 control-label">Meal Type</label>
		    <div class="col-xs-8">
					<select class="form-control" id="mealType_id" name="Meal_Type">
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
				<input type="date" id="date" name="Date" class="form-control" required value="<?=$model['Date'] ?>">
			</div>
		</div>		
				
		<!-- Time -->
		<div class="form-group">
			<label for="time" class="col-xs-3 control-label"> Time </label>
			<div class="col-xs-8">
				<input type="time" id="time" name="Time" class="form-control" required value="<?=$model['Time'] ?>">
			</div>
		</div>
		
		<!-- Search Food -->
		
		<!-- Food Found -->
		<input type="hidden" name="Food_Id" value="<? $foodFind=null ?>" /> 
		
		<div id="foodForm">
			<? $model['Id'] == null ? $food = null :  $food = Food::Get($model['Food_id']);?>
			<!-- Name -->
			<div class="form-group">
				<label for="foodName" class="col-xs-3 control-label"> Food Name </label>
				<div class="col-xs-8">
					<input type="text" id="foodName" name="Food_Name" onkeyup="showResult(this.value)" class="form-control" required value="<?=$food['name'] ?>">
					<div class="col-xs-8" id="livesearch"></div>
				</div>
			</div>			
			
			<!-- Food Category -->
			<div class="form-group">
		    	<label for="foodType_id" class="col-xs-3 control-label">Food Type</label>
		    	<div class="col-xs-8">
					<select class="form-control" id="foodType_id" name="Food_Type">
		    			<? foreach (Food_Type::Get() as $value): ?>
							<option <?= $value['id'] == $food['Food_Category_id'] ? 'selected' : '' ;?> value="<?=$value['id']?>"><?=$value['name']?></option>
						<? endforeach; ?>
		    		</select>
		    	</div>
		 	</div>
			
			<!-- Calories -->
			<div class="form-group">
				<label class="col-xs-3 control-label" for="calories"> Calories </label>
				<div class="col-xs-8">
					<input type="number" id="calories" name="Calories" class="form-control" required value="<?=$food['calories'] ?>">
				</div>
			</div>
			
			<!-- Fat -->
			<div class="form-group">
				<label class="col-xs-3 control-label" for="fat"> Fat </label>
				<div class="col-xs-8">
					<input type="number" id="fat" name="Fat" class="form-control" required value="<?=$food['fat'] ?>">
				</div>
			</div>			
			
			<!-- Carbs -->
			<div class="form-group">
				<label class="col-xs-3 control-label" for="carbs"> Carbs </label>
				<div class="col-xs-8">
					<input type="number" id="carbs" name="Carbs" class="form-control" required value="<?=$food['carbs'] ?>">
				</div>
			</div>
						
			<!-- Protein -->			
			<div class="form-group">
				<label class="col-xs-3 control-label" for="protein"> Protein </label>
				<div class="col-xs-8">
					<input type="number" id="protein" name="Protein" class="form-control" required value="<?=$food['protein'] ?>">
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
	function showResult(str) {
  		if (str.length==0) { 
    		document.getElementById("livesearch").innerHTML="";
    		document.getElementById("livesearch").style.border="0px";
    		return;
  		}
  		if (window.XMLHttpRequest) {
    		// code for IE7+, Firefox, Chrome, Opera, Safari
    		xmlhttp = new XMLHttpRequest();
  		} else {  // code for IE6, IE5
    		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
  		xmlhttp.onreadystatechange=function() {
    		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      			//document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    		}
  		}
  		
  		xmlhttp.open("GET","../Views/food_eaten/livesearch.php?q="+str,true);
  		
  		xmlhttp.send();
	}
	/*
	function updateForm(foodId) {
		<?$foodId ?>= foodId <?;?>
		
		<?$foodFound = Food::Get( $foodId );?>
		
		<?$foodType = Food_Type::Get( $foodFound['Food_Type_id'] );?>
		
		document.getElementById("#foodName").value = " <?=$foodFound['name']?> ";
		document.getElementById("#foodType_id").value = " <?=$foodType['name']?> ";
		document.getElementById("#calories").value = " <?=$foodFound['calories']?> ";
		document.getElementById("#fat").value = " <?=$foodFound['fat']?> ";
		document.getElementById("#carbs").value = " <?=$foodFound['carbs']?> ";
		document.getElementById("#protein").value = " <?=$foodFound['protein']?> ";								
	} 
	*/			
</script>