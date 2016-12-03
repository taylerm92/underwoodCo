<?php include 'databaseAccess.php';
function remove($quan, $hgt, $wid, $len){
  //$setnegative = "-";
  $quan = $quan-(2*$quan);
  $quan = (int)$quan;
  updateInventory($quan, $hgt, $wid, $len);
} ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <!-- Bootstrap MaxCDN -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/underwoodCo/css/style.css">
  <link rel="stylesheet" type="text/css" href="/underwoodCo/css/purchasestyle.css">

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

<!-- purchase form -->
<div class="container-fluid">
  <div class="col-md-5"></div>
  <div class="purchaseform col-md-2">
    <form id="form" class="form-group" action="purchaseReceipt.php" method="post">
      <select name="size" id="size" class="form-control">
        <?php
        $inventory = checkInventory();
        foreach ($inventory as $inv) {
          echo "<option>".$inv[size]." $".$inv[val]."</option><br/>";
        }
          ?>
        </select><br/>
        <select name="place" id="place" class="form-control">
          <option>Adel</option>
          <option>Douglass</option>
          <option>Fargo</option>
          <option>Hahira</option>
          <option>Homerville</option>
          <option>Jacksonville</option>
          <option>Jasper</option>
          <option>Lake City</option>
          <option>Lakeland</option>
          <option>Lakepark</option>
          <option>Madison</option>
          <option>Monticello</option>
          <option>Nashville</option>
          <option>Pearson</option>
          <option>Quitman</option>
          <option>Statenville</option>
          <option>Tallahassee</option>
          <option>Thomasville</option>
          <option>Tifton</option>
          <option>Waycross</option>
        </select><br/>
        <input type="number" name="quantity" id="quantity" class="form-control" min="1"><br/>
        <?php
          if(isset($_POST['submitbttn'])) {
          if(empty($_POST['quantity'])) {
            header("Location: purchase.php");
          }
        }
        ?>
        <input type="submit" name="submitbttn" id="submitbttn" class="form-control">
    </form>
  </div>
  <div class="col-md-5"></div>
</div>
<?php
  if(isset($_POST['size'])) {
  $Qntity = $_POST["size"];
$replace = str_replace(" ","x",$Qntity);
 $sendSizeVal = explode("x", $replace);
 }
 // for each loop can be deleted if wanted.
 // just displays the inventory for checking
 foreach ($inventory as $inv) {
   echo "<pre>";
   echo "<option>".$inv['size']." $".$inv['val']." ".$inv['quantity']."</option><br/>";
   echo "</pre>";
 }
 if (isset($_POST['submitbttn'])) {
   remove($_POST['quantity'],$sendSizeVal[0],$sendSizeVal[1],$sendSizeVal[2]);
   header("Location: purchase.php");
 }

 ?>
</body>
</html>
