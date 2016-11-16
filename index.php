<?php
	// This is the index page.
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- Bootstrap MaxCDN -->
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/lumberGeni/css/style.css">
	</head>
	<body>
		<div class="container">
			<form action="upload.php">
				<button type="submit" class="btn btn-default">Upload Log File</button>
				<button type="submit" class="btn btn-default">Upload Board Value File</button>
			</form>
			<form action="calculate.php">
				<button type="submit" class="btn btn-default">Calculate</button>
			</form>
		</div>
	<!-- Scripts that shouldn't effect page load go right before the closing body tag -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
