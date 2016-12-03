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
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCZdhbVuSEaqMWfsZroA-FLJIg-9-Jxh-U"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
  <script type="text/javascript" src="gmaps.js"></script>
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

<<?php
$place = $_POST['place']." GA";
$address = urlencode($place);
$url = 'http://maps.googleapis.com/maps/api/geocode/json?address='
.$address.'&sensor=false';
$geocode = file_get_contents($url);
$results = json_decode($geocode, true);
if($results['status']=='OK'){
  $lat = $results['results'][0]['geometry']['location']['lat'];
  $lng = $results['results'][0]['geometry']['location']['lng'];
}
 ?>

<script type="text/javascript">
//create map
  $(document).ready(function(){
    var map = new GMaps({
      div: '#map',
      lat: 30.8327,
      lng: -83.2785,
      zoom:8,
      disableDefaultUI: true,
    });
    GMaps.geolocate({
      success: function(position){
        map.drawRoute({
          origin: [30.8327,-83.2785],
          destination: [<?php echo $lat;?>, <?php echo $lng;?>],
          travelMode: 'driving',
          strokeColor: '#804000',
          strokeOpacity: 0.6,
          strokeWeight: 6
        });
      },
      error: function(error){
        alert('Geolocation failed: '+error.message);
      },
      not_supported: function(){
        alert("Your browser does not support geolocation");
      }
    })
  });
</script>
<!-- Receipt -->
<div class="col-md-4"></div>
<div id="receipt" class="col-md-4">
  <h1>Bill Of Sale</h1>
  <div class="map container" id="map"></div>
</div>
</body>
</html>
