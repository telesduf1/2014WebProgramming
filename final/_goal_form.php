<? session_start(); ?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
	</button>
	<h4 class="modal-title" id="myModalLabel">Profile</h4>
</div>

<div class="modal-body">
	<form class="form form-horizontal" >
		<div class="form-group">
			<label for="burn" class="col-xs-5 control-label"> Current Weitght (lb) </label>
			<div class="col-xs-6">
				<input disabled type="number" id="burn" class="form-control" value="<?=$_SESSION['USER_WEIGHT_GOAL']?>">
			</div>
		</div>		
		
		<div class="form-group">
			<label for="intake" class="col-xs-5 control-label"> Total to ingest per day (kcal) </label>
			<div class="col-xs-6">
				<input disabled type="number" id="intake" class="form-control" value="<?=$_SESSION['MAX_FOOD']?>">
			</div>
		</div>


		<div class="form-group">
			<label for="burn" class="col-xs-5 control-label"> Total to burn per day (kcal)</label>
			<div class="col-xs-6">
				<input disabled type="number" id="burn" class="form-control" value="<?=$_SESSION['MAX_EXERCISE']?>">
			</div>
		</div>

		<div class="form-group">
			<label for="burn" class="col-xs-5 control-label"> Goal (lb) </label>
			<div class="col-xs-6">
				<input type="number" id="burn" class="form-control" value="<?=$_SESSION['USER_WEIGHT_GOAL']?>">
			</div>
		</div>
		
	</form>
</div>

<div class="modal-footer  text-center">
	<input type="button" class="btn btn-default" data-dismiss="modal" value="Ok" />
</div>