<?php


$date = date("F d, Y");
switch ($_POST['place']) {
  case 'Madison':
  case 'Jasper':
    $place = $_POST['place']." FL";
    $distance = 0;
    break;
  case 'Lake City':
    $place = $_POST['place']." FL";
    $distance = 62.2;
    break;
  case 'Monticello':
    $place = $_POST['place']." FL";
    $distance = 46.2;
    break;
  case 'Jacksonville':
    $place = $_POST['place']." FL";
    $distance = 120.7;
    break;
  case 'Tallahassee':
    $place = $_POST['place']." FL";
    $distance = 77.4;
    break;
  case 'Tifton':
    $place = $_POST['place']." GA";
    $distance = 48.7;
    break;
  case 'Nashville':
    $place = $_POST['place']." GA";
    $distance = 27.7;
    break;
  case 'Homerville':
    $place = $_POST['place']." GA";
    $distance = 34.9;
    break;
  case 'Pearson':
    $place = $_POST['place']." GA";
    $distance = 43.7;
    break;
  case 'Douglas':
    $place = $_POST['place']." GA";
    $distance = 58.5;
    break;
  case 'Waycross':
    $place = $_POST['place']." GA";
    $distance = 61.7;
    break;
  case 'Fargo':
    $place = $_POST['place']." GA";
    $distance = 46.5;
    break;
  case 'Thomasville':
    $place = $_POST['place']." GA";
    $distance = 43.1;
    break;

  default:
    $place = $_POST['place']." GA";
    $distance = 0;
    break;
}

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
      zoom:7,
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
    <p> Date: <?php  echo $date; ?> </p>
    <p> Destination: <?php echo $place; ?></p>
    <p> Distance: <?php echo $distance; ?></p>
    <div class="map container" id="map"></div>
</div>
