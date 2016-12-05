<?php
  //adds boards to inventory database
  $inventoryAdd= array();
  for($i=0; $i<count($optimumValue); $i+=4){
  $hgt= $optimumValue[$i];
  $wid= $optimumValue[$i+1];
  $len= $optimumValue[$i+2];
  $inventoryAdd[]= array('hgt'=>$hgt, 'wid'=>$wid, 'len'=>$len);
  }
  for($i=0; $i<count($inventoryAdd); $i++){
   updateInventory($quantities[$i], $inventoryAdd[$i]['hgt'], $inventoryAdd[$i]['wid'], $inventoryAdd[$i]['len']);
  }
  //adds scrap to inventory
  updateInventory($scrapVolume,0,0,0);
?>
