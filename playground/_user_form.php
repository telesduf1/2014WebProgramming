<?php
	ini_set('display_errors', 1);
	include_once __DIR__ . '/inc/_all.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">

		<title>Fitness Tracker</title>

		<!-- Ensures proper rendenring across devices -->
		<meta name="viewport" content="width=device-width, initial-scale=1, initial-scale=1.0, maximum-scale=1.0">

		<link href='http://fonts.googleapis.com/css?family=Asap|Satisfy' rel='stylesheet' type='text/css'>
		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<!-- Custom CSS -->
		<link href="content/css/user_form.css" rel="stylesheet" media="screen">
	</head>

	<body  ng-app="app">

		<!-- Logo -->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-right">
						<h1 class="text-muted"> Fitness Tracker Account </h1>
					</div>
				</div>
			</div>
		</header>

		<!-- Page Content -->
		<div class="container painel" ng-controller="social">
			<div class="col-xs-10 col-xs-offset-3">
				<div class="row">
					<form class="form-horizontal" action="?action=save" method="post" novalidate>
						<h2 class=" text-muted"> Personal Information </h2>
						<div class="row">
							<div class="form-group">
								<label for="firstname" class="col-xs-2 control-label"> First Name: </label>
								<div class="col-xs-5">
									<input type="text" class="form-control" placeholder="First Name" id="firstname" name="First_Name" required autofocus value="{{me.first_name}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								<label for="lastname" class="col-xs-2 control-label"> Last Name: </label>
								<div class="col-xs-5">
									<input type="text" class="form-control" placeholder="Last Name" id="lastname" name="Last_Name" required value="{{me.last_name}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								<label for="gender" class="col-xs-2 control-label"> Gender: </label>
								<div class="col-xs-5" id="gender">
									<label class="radio-inline">
										<input type="radio" name="sex" value="Male" name="Gender" id="male">
										Male </label>
									<label class="radio-inline">
										<input type="radio" name="sex" value="Female" name="Gender" id="female">
										Female </label>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								<label for="weight" class="col-xs-2 control-label"> Weight: </label>
								<div class="col-xs-5">
									<input type="number" class="form-control" id="currentWeight" name="Current_Weight" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								<label for="height" class="col-xs-2 control-label"> Height: </label>
								<div class="col-xs-5">
									<input type="number" class="form-control" id="height" name="Height" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								<label for="birthDate" class="col-xs-2 control-label"> Date of Birth: </label>
								<div class="col-xs-5">
									<input type="date" class="form-control" id="bthDay" name="Birthday" required>
								</div>
							</div>
						</div>

				</div>

				<div class="row">
						<h2 class=" text-muted"> Initial Goal </h2>
						<div class="row">
							<div class="form-group">
								<label for="goalType_id" class="col-xs-2 control-label"> Diet Goal: </label>
								<div class="col-xs-5">
								<select class="form-control" id="goalType_id" name="Goal_Type_id">
		    						<? foreach (Goal_Type::Get() as $value): ?>
										<option <?= $value['id']==$model['id'] ? 'selected' : '' ?> value="<?=$value['id']?>"><?=$value['name']?></option>
									<? endforeach; ?>
		    				   	</select>		
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								<label for="goalWheight" class="col-xs-2 control-label"> Goal Wheight: </label>
								<div class="col-xs-5">
									<input type="number" class="form-control" id="goalWeight" name="Goal_Weight" required>
								</div>
							</div>
						</div>
				</div>

				<div class="row">
						<h2 class=" text-muted"> Account </h2>
						<div class="row">

							<div class="form-group" ng-hide="me.id">
								<label for="password" class="col-xs-2 control-label"> Create a Password: </label>
								<div class="col-xs-5">
									<input type="password" class="form-control" placeholder="Password" id="psw" name="Password" required>
								</div>
							</div>

						</div>

						<div class="row">
							<div class="form-group" ng-hide="me.id">
								<label for="confirmPassword" class="col-xs-2 control-label"> Confirm your Password: </label>
								<div class="col-xs-5">
									<input type="password" class="form-control" placeholder="Password" name="Password" id="confirmPsw" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="form-group">
								<label for="email" class="col-xs-2 control-label"> Email Address: </label>
								<div class="col-xs-5">
									<input type="text" class="form-control" placeholder="Email" id="email" name="Email" required value="{{me.email}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3">
								<button class="btn btn-success btn-block" type="submit">
									Save
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<footer class="login">
			<div class="footer text-right">
				<div class="container">

					<p class="text-muted">
						<small>Fitness Tracker Copyright &copy; by telesduf1</small>
					</p>

				</div>
			</div>
		</footer>

		<!-- Bootstrap core JavaScript placed here in order to load faster the pages -->
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="content/js/main.js"></script>		
		<script type="text/javascript">
			window.fbAsyncInit = function() {
		    FB.init({
	  			appId      : '384067238423389',
	  			xfbml      : true,
	  			version    : 'v2.2'
		    });
		    
		    	checkLoginState();
		  	};
		
		  	(function(d, s, id){
		    	var js, fjs = d.getElementsByTagName(s)[0];
		     	if (d.getElementById(id)) {return;}
		     	js = d.createElement(s); js.id = id;
		     	js.src = "//connect.facebook.net/en_US/sdk.js";
		    	fjs.parentNode.insertBefore(js, fjs);
		   	}(document, 'script', 'facebook-jssdk'));

			var $socialScope = null;
			angular.module('app', [])
			.controller('social', function($scope){
				$socialScope = $scope;
				$socialScope.$apply();
			});
			
			function checkLoginState() {
			    FB.getLoginStatus(function(response) {
				    $socialScope.status = response;
				    if (response.status === 'connected') {
				      FB.api('/me', function(response) {
					      $socialScope.me = response;
					      $socialScope.$apply();
					      console.log(response);
					      if(response.gender == "male"){
			 					$('#male').prop( "checked", true );
			 			  }else{
			 					$('#female').prop( "checked", true);;
			 			  }
					  });
				    }
			    });
			 }
			
		</script>
		
	</body>

</html>
