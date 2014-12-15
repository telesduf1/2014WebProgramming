<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>Fitness Tracker</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="../content/css/main.css">
		<link rel="stylesheet" href="../content/css/progress.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		
	</head>

	<body>
	<script type="text/javascript">
	      window.fbAsyncInit = function() {
	        FB.init({
	          appId      : '384067238423389',
	          xfbml      : true,
	          version    : 'v2.1'
	        });
	      };
	
	      (function(d, s, id){
	         var js, fjs = d.getElementsByTagName(s)[0];
	         if (d.getElementById(id)) {return;}
	         js = d.createElement(s); js.id = id;
	         js.src = "//connect.facebook.net/en_US/sdk.js";
	         fjs.parentNode.insertBefore(js, fjs);
	       }(document, 'script', 'facebook-jssdk'));
    </script>	
    	
		<div id="top-nav">
			<?
			include __DIR__.'/../../inc/nav.html';
			?>
		</div>
		<?
		include __DIR__.'/../'.$view;
		?>
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
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>
		<script src="../content/js/main.js"></script>

	</body>
</html>