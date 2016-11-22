<?php include 'databaseAccess.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <!-- Bootstrap MaxCDN -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/underwoodCo/css/style.css">

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
<div id="purchaseform">
<form>
  <select name="width" id="width" class="form-control">
    <?php
    $inventory = checkInventory();
    foreach ($inventory as $inv) {
      echo "<option>".$inv[size]."\t$".$inv[val]."</option><br/>";
    }
      ?>
    </select>
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
    </select>
    <input type="number" name="quantity" id="quantity" class="form-control">
    <input type="submit" id="submitbttn" value="Submit" class="form-control">
</form>
</div>
</body>
</html>
