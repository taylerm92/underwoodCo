<?php
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
    <div class="map container" id="map"></div>
</div>
