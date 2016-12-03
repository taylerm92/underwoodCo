<div class="container-fluid">
  <div class="col-md-5"></div>
  <div class="purchaseform col-md-2">
    <form id="form" class="form-group" method="post">
      <select multiple name="size[]" id="size" class="form-control">
        <?php
        $inventory = checkInventory();
        foreach ($inventory as $inv) {
          echo "<option>".$inv[size]." $".$inv[val]."</option><br/>";
        }
          ?>
        </select><br/>
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
        <?php
          if(isset($_POST['submitbttn'])) {
          if(empty($_POST['quantity'])) {
            header("Location: purchase.php");
          }
        }
        ?>
        <input type="submit" name="submitbttn" id="submitbttn" class="form-control">
    </form>
  </div>
  <div class="col-md-5"></div>
</div>
