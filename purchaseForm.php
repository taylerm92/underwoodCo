<?php
  session_start();

  // $_SESSION['size'] = $_POST['size'];
  // $_SESSION['place'] = $_POST['place'];
  // $_SESSION['quant']  $_POST['quantity'];
?>

<script>
function validate(){
  var size = document.forms["form"]["size[]"].value;
  if (size == "" ){
    alert("You need to purchase some boards!");
    return false;
  }
}
</script>

<div class="container-fluid">
  <div class="col-md-5"></div>
  <div class="purchaseform col-md-2">
    <form name="form" id="form" class="form-group" onsubmit="return validate()" method="post">
      <select multiple name="size[]" id="size" class="form-control">
        <?php
        $inventory = checkInventory();
        foreach ($inventory as $inv) {
			if($inv[size] == "scrap"){ echo "<option>".$inv[size]." $".$inv[val]."</option><br/>";; }
			else{ echo "<option>".$inv[size]." $".$inv[val]."</option><br/>"; }
        }
          ?>
        </select><br/>
        <select name="place" id="place" class="form-control">
          <option>Adel</option>
          <option>Douglas</option>
          <option>Fargo</option>
          <option>Hahira</option>
          <option>Homerville</option>
          <option>Jacksonville</option>
          <option>Jasper</option>
          <option>Lake City</option>
          <option>Lakeland</option>
          <option>Lake Park</option>
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
        <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1"><br/>
        <input type="submit" name="submitbttn" id="submitbttn" class="form-control">
    </form>
  </div>
  <div class="col-md-5"></div>
</div>
