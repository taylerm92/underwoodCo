<script>
function validate(){
  var size = document.forms["form"]["size[]"].value;
  if (size == "" ){
    alert("You need to purchase some boards!");
    return false;
  }
}
</script>

  <div class="container">
    <form name="form" id="form" class="form-inline" onsubmit="return validate()" method="post">
      <?php
	     $i = 0;
        $inventory = checkInventory();
        echo "<div class=\"purchinventory col-sm-6\">";
        foreach ($inventory as $inv) {
          echo "<div class=\"form-group\">";
	        echo "<label class=\"col-lg-6\" for=\"".$i."\" id=\"label\">".$inv['size']." $".$inv['val']."</label>";
          echo "<div class=\"col-lg-6\">";
	  	    echo "<input class=\"counter form-control\" type=\"number\" min=\"0\" value=\"0\" name=\"".$i."\" class=\"form-control\" />";
          echo "</div>";

	        $i++;
          echo "</div>";
          echo "<br>";
        }
        echo "</div>";
        echo "<div class=\"submitinventory col-sm-6\">";
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
        <input type="submit" name="submitbttn" id="submitbttn" class="submit btn btn-default">
      </div>
    </form>
</div>
