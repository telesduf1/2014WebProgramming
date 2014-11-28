<form class="form-horizontal" action="?action=save" method="post" >
	<? //my_print($model); ?>
	<input type="hidden" name="id" value="<?=$model['Id'] ?>" />
	<input type="hidden" id="foodId" name="Food_Id" value="<?=$model['Food_id'] ?>" />
	
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
		
		<!-- Food Form -->
				
		<div id="foodForm">
			<? //$model['Id'] == null ? $food = null :  $food = Food::Get($model['Food_id']);?>
			<!-- Name -->
			<div class="form-group">
				<label for="foodName" class="col-xs-3 control-label"> Food Name </label>
				<div class="col-xs-8">
					<input type="text" id="foodName" autocomplete="off" name="Food_Name" onkeyup="showResult(this.value)" class="form-control" required value="<?=$model['Food_Name'] ?>">
					<ul style="overflow: auto; list-style-type:none;" class="col-xs-11" id="livesearch"></ul>
				</div>
			</div>			
			
			<!-- Food Category -->
			<div class="form-group">
		    	<label for="foodType_id" class="col-xs-3 control-label">Food Type</label>
		    	<div class="col-xs-8">
					<select class="form-control" id="foodType_id" name="Food_Type">
		    			<? foreach (Food_Type::Get() as $value): ?>
							<option <?= $value['id'] == $model['Food_Category_id'] ? 'selected' : '' ;?> value="<?=$value['id']?>"><?=$value['name']?></option>
						<? endforeach; ?>
		    		</select>
		    	</div>
		 	</div>
			
			<!-- Calories -->
			<div class="form-group">
				<label class="col-xs-3 control-label" for="calories" > Calories </label>
				<div class="col-xs-8">
					<input type="number" id="calories" name="Calories" class="form-control" required value="<?=$model['Calories'] ?>">
				</div>
			</div>
			
			<!-- Fat -->
			<div class="form-group">
				<label class="col-xs-3 control-label" for="fat"> Fat </label>
				<div class="col-xs-8">
					<input type="number" id="fat" name="Fat" class="form-control" required value="<?=$model['Fat'] ?>">
				</div>
			</div>			
			
			<!-- Carbs -->
			<div class="form-group">
				<label class="col-xs-3 control-label" for="carbs"> Carbs </label>
				<div class="col-xs-8">
					<input type="number" id="carbs" name="Carbs" class="form-control" required value="<?=$model['Carbs'] ?>">
				</div>
			</div>
						
			<!-- Protein -->			
			<div class="form-group">
				<label class="col-xs-3 control-label" for="protein"> Protein </label>
				<div class="col-xs-8">
					<input type="number" id="protein" name="Protein" class="form-control" required value="<?=$model['Protein'] ?>">
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

	function mouseOver(object) {
		object.style.background = "#f3f3f3";
	}
	
	function mouseOut(object) {
		object.style.background = "white";
	}
	
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
      			document.getElementById("livesearch").innerHTML = xmlhttp.responseText;
      			document.getElementById("livesearch").style.background="white";
      			document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      			document.getElementById("livesearch").style.maxHeight="180px";
      			document.getElementById("livesearch").style.position="absolute";
      			document.getElementById("livesearch").style.zIndex="1";      			
    		}
  		}
  		
  		xmlhttp.open("GET","../Views/food_eaten/livesearch.php?q="+str,true);
  		
  		xmlhttp.send();
	}
	
	function updateForm(foodId) {
		//alert(foodId);
  		if (window.XMLHttpRequest) {
    		// code for IE7+, Firefox, Chrome, Opera, Safari
    		xmlhttp = new XMLHttpRequest();
  		} else {  // code for IE6, IE5
    		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  		}
  		
  		xmlhttp.onreadystatechange=function() {
    		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      			
      			x = JSON.parse(xmlhttp.responseText);
      			
				document.getElementById(x[2].id).value = x[2].value;

				for	(index = 0; index < x.length; index++) {
					//alert(x[index].id + " " + x[index].value);
    				document.getElementById(x[index].id).value = x[index].value;
				}

				document.getElementById("livesearch").innerHTML = " ";
				document.getElementById("livesearch").style.border="0";
      			document.getElementById("livesearch").style.position="";
      			document.getElementById("livesearch").style.zIndex="0";
      			document.getElementById("livesearch").style.maxHeight="0px";
    		}
  		}
  		
  		xmlhttp.open("GET","../Views/food_eaten/updateform.php?q="+foodId,true);
  		xmlhttp.send();									
	} 
</script>