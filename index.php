<?php
	// This is the index page.
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- Bootstrap MaxCDN -->
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="container homecontainer">
			<div class="companyLogo"><img src="images/logo.png" width="400" height="248"/></div>
			<div id="loader" class="loader" style="display:none;"></div>
			<form action="upload.php">
				<button type="submit" class="btn btn-default">Upload Log File</button>
				<button type="submit" class="btn btn-default">Upload Board Value File</button>
			</form>
			<form id="calculate" action="calculate.php">
				<button type="submit" class="btn btn-default calculatebtn">Calculate</button>
			</form>

			<script type="text/javascript">
				$('#calculate').submit(function(){
					document.getElementById('loader').style.display = "block";
					return true;
				})
		 </script>


		</div>
	<!-- Scripts that shouldn't effect page load go right before the closing body tag -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
