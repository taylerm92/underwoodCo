<?php include 'databaseAccess.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <!-- Bootstrap MaxCDN -->
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCZdhbVuSEaqMWfsZroA-FLJIg-9-Jxh-U"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/purchasestyle.css">
  <script type="text/javascript" src="gmaps.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
  <!-- Nav Bar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Underwood Co.</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="purchase.php">Purchase</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="">Input<span class="caret"></span></a>
          <ul class="dropdown-menu" id="dropdown">
            <li><a href="upload.php">Log</a></li>
            <li><a href="upload.php">Lumber</a></li>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Purchase Receipt -->
<?php
 if (isset($_POST['submitbttn'])) {
   if(isset($_POST['size'])) {
     if($_POST['quantity']>=1) {
       foreach($_POST['size'] as $selected){
         $Qntity = $selected;
		 $replace = str_replace(" ","x",$Qntity);
		 $sendSizeVal = explode("x", $replace);
		 
		 if($sendSizeVal[0] == 'scrap'){ updateInventory(-$_POST['quantity'],0,0,0); }
		 else{
			updateInventory(-$_POST['quantity'],$sendSizeVal[0],$sendSizeVal[1],$sendSizeVal[2]);
		 }
       }
     }
   }
   include 'purchaseReceipt.php';
   //header("Location: purchase.php");
 }
 // Purchase Form
 else{
   include 'purchaseForm.php';
 }
 ?>
</body>
</html>
