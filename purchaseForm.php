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
        ?>
        <table class="table table-condensed">
          <thead>
            <tr>
              <th style="text-align:center;">Board Size</th>
              <th style="text-align:center;">Value</th>
              <th style="text-align:center;">Quantity</th>
              <th style="text-align:center;">Purchase</th>
            </tr>
          </thead>
          <tbody>
        <?php
        foreach ($inventory as $inv) {
          ?><tr>
              <td>
                <?php echo $inv['size']; ?>
              </td>
              <td>
                <?php echo "$".$inv['val']; ?>
              </td>
              <td>
                <?php
                if($inv['size']=='scrap'){
                  echo checkQuantity(0,0,0);
                }
                else {
                  echo checkQuantity($inv["hgt"], $inv["wid"], $inv["len"]);
                }
                 ?>
              </td>
              <td>
                <?php echo "<input class=\"counter form-control\" type=\"number\" min=\"0\" value=\"0\" name=\"".$i."\" class=\"form-control\" />"; ?>
              </td>
              <?php  $i++; ?>
          </tr>
          <?php
        }
        ?>
        </tbody>
      </table>
        <?php
        echo "</div>";
        echo "<div class=\"submitinventory col-sm-6\">";
       ?>
       <br/>
       <h3 style="color: white; text-align: center;">Shipping Location</h3>
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
        <button type="submit" name="submitbttn" id="submitbttn" class="submit btn btn-default" style="font-size: 20pt;">Purchase</button>
      </div>
    </form>
</div>
