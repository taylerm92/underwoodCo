<?php

$date = date("F d, Y");
switch ($_POST['place']) {
  case 'Madison':
    $place = $_POST['place']." FL";
    $distance = 28.8;
    $distanceCharge = false;
    break;
  case 'Jasper':
    $place = $_POST['place']." FL";
    $distance = 32.3;
    $distanceCharge = false;
    break;
  case 'Lake City':
    $place = $_POST['place']." FL";
    $distance = 62.2;
    $distanceCharge = true;
    break;
  case 'Monticello':
    $place = $_POST['place']." FL";
    $distance = 46.2;
    $distanceCharge = true;
    break;
  case 'Jacksonville':
    $place = $_POST['place']." FL";
    $distance = 120.7;
    $distanceCharge = true;
    break;
  case 'Tallahassee':
    $place = $_POST['place']." FL";
    $distance = 77.4;
    $distanceCharge = true;
    break;
  case 'Tifton':
    $place = $_POST['place']." GA";
    $distance = 48.7;
    $distanceCharge = true;
    break;
  case 'Nashville':
    $place = $_POST['place']." GA";
    $distance = 27.7;
    $distanceCharge = false;
    break;
  case 'Homerville':
    $place = $_POST['place']." GA";
    $distance = 34.9;
    $distanceCharge = true;
    break;
  case 'Pearson':
    $place = $_POST['place']." GA";
    $distance = 43.7;
    $distanceCharge = true;
    break;
  case 'Douglas':
    $place = $_POST['place']." GA";
    $distance = 58.5;
    $distanceCharge = true;
    break;
  case 'Waycross':
    $place = $_POST['place']." GA";
    $distance = 61.7;
    $distanceCharge = true;
    break;
  case 'Fargo':
    $place = $_POST['place']." GA";
    $distance = 46.5;
    $distanceCharge = true;
    break;
  case 'Thomasville':
    $place = $_POST['place']." GA";
    $distance = 43.1;
    $distanceCharge = true;
    break;
  case 'Quitman':
    $place = $_POST['place']." GA";
    $distance = 17.5;
    $distanceCharge = false;
    break;
  case 'Hahira':
    $place = $_POST['place']." GA";
    $distance = 16.6;
    $distanceCharge = false;
    break;
  case 'Adel':
    $place = $_POST['place']." GA";
    $distance = 26.3;
    $distanceCharge = false;
    break;
  case 'Lakeland':
    $place = $_POST['place']." GA";
    $distance = 20.6;
    $distanceCharge = false;
    break;
  case 'Statenville':
    $place = $_POST['place']." GA";
    $distance = 17.9;
    $distanceCharge = false;
    break;
  case 'Lake Park':
    $place = $_POST['place']." GA";
    $distance = 13.5;
    $distanceCharge = false;
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

<?php
$totalOverage = number_format($distance * .25, 2, '.', '');
?>
<!-- Receipt -->
<div class="col-md-4"></div>
  <div id="receipt" class="col-md-4">
  <div id="receiptInner">
    <h1>Bill Of Sale</h1>
    <p> Date: <?php  echo $date; ?> </p>
    <p> Destination: <?php echo $place; ?></p>
    <?php
      $total = 0;
      echo "<table class=\"table-striped\" id=\"productcharges\" style=\"width:100%;\">
            <thead>
              <caption>Product Charges: </caption>
              <td>Product</td><td>Quantity</td><td>Unit Price</td><td>Total Price</td>
            </thead>";
      $i = 0;
      $inventory = checkInventory();
      foreach ($inventory as $inv) {
        $t = (float)$_POST[$i] * (float)$inv['val'];
		if($_POST[$i] == 0){}
		else{
			echo "<tr>
					<td>".$inv['size']."</td>
					<td>".$_POST[$i]."</td>
					<td>$".$inv['val']."</td>
					<td>$".$t."</td>
				</tr>";
		}
		$total += $t;
		$i++;
      }

      $i = 0;
      $lbs = 0;
      foreach($inventory as $inv) {
        if($inv['size'] == "scrap"){ $volume= 1; }
        else{
			$deliver = explode("x", $inv['size']);
			$volume = $deliver[0] * $deliver[1] * $deliver[2];
		}
        $cubicfeet = $volume * .000578704;
        $lbs += number_format(($cubicfeet * 38) * $_POST[$i], 2, '.', '');
      }
    ?>
    <table id="deliverycharge" class="table-striped" style="width:100%;">
      <caption>Delivery Charges: </caption>
      <tr>
        <td>Total Weight</td><td><?php echo $lbs ?> lbs</td>
      </tr>
      <tr>
        <td>Number of Trucks Required</td><td>
          <?php
            $trucks = ceil($lbs / 10000);
            echo $trucks;
          ?>
        </td>
      </tr>
      <tr>
        <td>Distance</td><td><?php echo $distance ?> miles</td>
      </tr>
      <tr>
        <td>$/mile/truck</td><td>
          <?php
            if($distanceCharge == false) {
              echo "N/A";
            } else {
              echo "$0.25";
            }
          ?>
        </td>
      </tr>
      <tr>
        <td>Total Delivery Charges</td><td>
          <?php
            if($distanceCharge == true) {
              echo "$".($totalOverage*$trucks);
              $total += $totalOverage;
            } else {
              echo "N/A";
            }
          ?></td>
      </tr>
      <tr>
        <td><h4 style="font-weight: bold;">Total Charges: </h4></td><td><br>
        <p style="font-weight: bold;">$<?php echo number_format($total, 2, '.', ''); ?></p>
        </td>
      </tr>
    </table>
</div>
    <div class="map container" id="map" style="width:100%; padding:0; margin-bottom: 15px; height: 220px;"></div>
</div>

<button type="button" onclick="capture()" name="saveReceipt">Save</button>

<script>
  function capture(){
    html2canvas([document.getElementById('receiptInner')], {
      onrendered: function(canvas){
        var img = canvas.toDataURL()
        $.post("save.php", {data: img}, function(file){
          window.location.href = "download.php?path="+ file});
      }
    });
  }

</script>
