<?php
  // purchase receipt
  ?>
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

<!-- Receipt -->
<div class="col-md-4"></div>
<div id="receipt" class="col-md-4">
  <h1>Bill Of Sale</h1>
</div>
</body>
</html>