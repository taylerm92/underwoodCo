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
      <?php
	$i = 0;
        $inventory = checkInventory();
        foreach ($inventory as $inv) {
	  echo "<label for=\"".$i."\">".$inv['size']." $".$inv['val']."</label>
	  	<input type=\"number\" min=\"0\" value=\"0\" name=\"".$i."\" class=\"form-control\" />";
	  $i++;
        }
       ?>
       <br/>
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
        <input type="submit" name="submitbttn" id="submitbttn" class="form-control">
    </form>
  </div>
  <div class="col-md-5"></div>
</div>
