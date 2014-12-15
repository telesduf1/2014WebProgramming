<form class="form-horizontal" action="?action=save" method="post" >
	<? //my_print($errors); ?>
	<input type="hidden" name="id" value="<?=$model['Id'] ?>" />
	<input type="hidden" id="exerciseId" name="Exercise_Id" value="<?=$model['Exercise_Id'] ?>" />
	<input type="hidden" id="time" name="Time" class="form-control" required value="<?=$model['Time'] ?>">
	
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">
			<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
		</button>
		<h4 class="modal-title" id="myModalLabel">Record a Exercise</h4>
	</div>

	<div class="modal-body">
		
		<!-- Errors -->		
		<? if(!empty($errors)): ?>
  			<div class="alert alert-danger">
  				<ul>
  				<? foreach ($errors as $key => $value): ?>
					  <li><?=$key?> <?= $value ?></li>
				<? endforeach; ?>
				</ul>
  			</div>
  		<? endif; ?>

		<!-- Date -->
		<div class="form-group">
			<label for="date" class="col-xs-3 control-label"> Date </label>
			<div class="col-xs-8">
				<input type="date" id="date" name="Date" class="form-control" required value="<?=$model['Date'] ?>">
			</div>
		</div>		
				
		<!-- Start Time -->
		<div class="form-group">
			<label for="time" class="col-xs-3 control-label"> Start Time </label>
			<div class="col-xs-8">
				<input type="time" id="start_time" name="Start_Time" class="form-control" required value="<?=$model['Start_Time'] ?>">
			</div>
		</div>
		
		<!-- Exercise Form -->				
		<div id="exerciseForm">
			<!-- Exercise Name -->
			<div class="form-group <?=!empty($errors['Name']) ? 'has-error has-feedback' : '' ?>">
				<label for="foodName" class="col-xs-3 control-label"> Exercise Name </label>
				<div class="col-xs-8">
					<input type="text" id="exerciseName" autocomplete="off" name="Exercise_Name" onkeyup="showResult(this.value)" class="form-control" required value="<?=$model['Exercise_Name'] ?>">
					<? if(!empty($errors['Name'])): ?>
		      			<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		      			<span class="help-block"><?=$errors['Name']?></span>
		      		<? endif; ?>
		      		<div style="overflow: auto" class="col-xs-11" id="exercisesearch"></div>
				</div>
			</div>			

			<!-- Calories -->
			<div class="form-group <?=!empty($errors['Calories']) ? 'has-error has-feedback' : '' ?>">
				<label class="col-xs-3 control-label" for="calories" > Calories </label>
				<div class="col-xs-8">
					<input type="number" id="calories" name="Calories" class="form-control" required value="<?=$model['Calories'] ?>">
					<? if(!empty($errors['Calories'])): ?>
		      			<span class="glyphicon glyphicon-remove form-control-feedback"></span>
		      			<span class="help-block"><?=$errors['Calories']?></span>
		      		<? endif; ?>
				</div>
			</div>
			
			<!-- Time Base-->
			<div class="form-group">
				<label for="time" class="col-xs-3 control-label"> Minutes to burn calories above </label>
				<div class="col-xs-8">
					<input type="number" id="time" name="Time" class="form-control" required value="<?=$model['Time'] ?>">
				</div>
			</div>	
			
			<!-- FINAL -- FRIEND YOU EXERCISE WITH-->
			<div class="form-group <?=!empty($errors['Name']) ? 'has-error has-feedback' : '' ?>">
				<label for="friendName" class="col-xs-3 control-label"> Who you Exercise with </label>
				<div class="col-xs-8">
					<input type="text" id="friendName" autocomplete="off" name="Friend_Name" onkeyup="" class="typeahead form-control" value="<?=$model['Friend_Name'] ?>">
		      		<div style="overflow: auto" class="col-xs-11" id="friendsearch"></div>
				</div>
			</div>			
											
		</div>		
	</div>
	
	<div class="modal-footer  text-center">
		<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" />
		<input type="submit" name="submit" class="btn btn-default" value="Start" />
	</div>
</form>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>
<script>	
	function mouseOver(object) {
		object.style.background = "#f3f3f3";
	}
	
	function mouseOut(object) {
		object.style.background = "white";
	}
	
	function showResult(str) {
  		if (str.length==0) { 
    		document.getElementById("exercisesearch").innerHTML="";
    		document.getElementById("exercisesearch").style.border="0px";
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
      			document.getElementById("exercisesearch").innerHTML = xmlhttp.responseText;
      			document.getElementById("exercisesearch").style.background="white";
      			document.getElementById("exercisesearch").style.border="1px solid #A5ACB2";
      			document.getElementById("exercisesearch").style.maxHeight="180px";
      			document.getElementById("exercisesearch").style.position="absolute";
      			document.getElementById("exercisesearch").style.zIndex="1";      			
    		}
  		}
  		
  		xmlhttp.open("GET","../Views/exercise_done/exercisesearch.php?q="+str,true);
  		
  		xmlhttp.send();
	}
	
	function updateForm(exerciseId) {
  		if (window.XMLHttpRequest) {
    		// code for IE7+, Firefox, Chrome, Opera, Safari
    		xmlhttp = new XMLHttpRequest();
  		} else {  // code for IE6, IE5
    		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  		}
  		
  		xmlhttp.onreadystatechange=function() {
    		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      			
      			x = JSON.parse(xmlhttp.responseText);

				for	(index = 0; index < x.length; index++) {
    				document.getElementById(x[index].id).value = x[index].value;
				}

				document.getElementById("exercisesearch").innerHTML = "";
				document.getElementById("exercisesearch").style.border="0px";
      			document.getElementById("exercisesearch").style.position="relative";
      			document.getElementById("exercisesearch").style.zIndex="0";
    		}
  		}
  		
  		xmlhttp.open("GET","../Views/exercise_done/updateexerciseform.php?q="+exerciseId,true);
  		xmlhttp.send();									
	} 
</script>