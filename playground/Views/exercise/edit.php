<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
	</button>
	<h4 class="modal-title" id="myModalLabel">Record an exercise</h4>
</div>

<div class="modal-body">
	<form class="form-horizontal" >

		<div class="row">
			<div class="col-xs-7 col-xs-offset-2">
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search Exercise">
						<span class="input-group-btn">
							<button type="button" class="btn btn-default">
								Search
							</button> </span>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="form-group">
				<label for="date" class="col-xs-2 control-label"> Date </label>
				<div class="col-xs-5">
					<input type="date" class="form-control" required>
				</div>
			</div>

			<div class="form-group">
				<label for="time" class="col-xs-2 control-label"> Time </label>
				<div class="col-xs-5">
					<input type="time" class="form-control" required>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="form-group">
				<label class="col-xs-2 control-label" for="cal"> Cal </label>
				<div class="col-xs-5">
					<input type="number" class="form-control" required>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="form-group">
				<label class="col-xs-2 control-label" for="minutes"> Minutes </label>
				<div class="col-xs-5">
					<input type="number" class="form-control" required>
				</div>
			</div>
		</div>		
	</form>
</div>

<div class="modal-footer">
	<div class="row">
		<div class="col-xs-9 text-right">
			<button type="submit" class="btn btn-default">
				Register
			</button>
		</div>
	</div>
</div>