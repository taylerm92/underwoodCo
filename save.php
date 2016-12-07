<?php //include 'databaseAccess.php';
	date_default_timezone_set('America/New_York');
	$data = $_POST['data'];
	$file = 'Receipt_'.date("H-i-s_m-d-Y"). '.png';
 	//updateReceipts($file);
	// remove "data:image/png;base64,"
	$uri =  substr($data,strpos($data,",")+1);

	// save to file
	file_put_contents('./'.$file, base64_decode($uri));

	// return the filename
	echo $file; exit;
  ?>
