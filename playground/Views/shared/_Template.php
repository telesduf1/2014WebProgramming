<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>Fitness Tracker</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="../content/css/main.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	</head>

	<body>
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
	</body>
</html>