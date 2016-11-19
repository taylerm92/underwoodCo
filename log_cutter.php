<?php

  $boardCounter1 = [0,0,0];
  $boardCounter2 = [0,0,0];
  $boardCounter3 = [0,0,0];
  $boardCounter4 = [0,0,0];
  $totalLogVol = 0;
    for($i = 0; $i < count($arrayLogs); $i+=3)
    {
        $logHeight = (int)$arrayLogs[$i];
        $logWidth = (int)$arrayLogs[$i+1];
        $logLength = (int)$arrayLogs[$i+2];
        $lumberLength = (int)$optimumValue[2];
        $totalLogVol += $logHeight*$logWidth*$logLength;
        if($logLength >= $lumberLength)
        {
            optimal_cut1($logHeight, $logWidth, $optimumValue, $boardCounter1);
            optimal_cut2($logHeight, $logWidth, $optimumValue, $boardCounter2);
            optimal_cut3($logHeight, $logWidth, $optimumValue, $boardCounter3);
            optimal_cut4($logHeight, $logWidth, $optimumValue, $boardCounter4);
        }
        else{
            echo "Cannot cut log.<br>";
        }
    }
    echo $totalLogVol."<br>";
    foreach($boardCounter1 as $board)
    {
        echo $board."<br>";
    }
    echo "<br>";
    foreach($boardCounter2 as $board)
    {
        echo $board."<br>";
    }
    echo "<br>";
    foreach($boardCounter3 as $board)
    {
        echo $board."<br>";
    }
    echo "<br>";
    foreach($boardCounter4 as $board)
    {
        echo $board."<br>";
    }
    echo "<br>";



  function optimal_cut1($logHeight, $logWidth, $lumber, &$boardCounter1){
    $numLumber = count($lumber); //for the for loop to only loop as many boards we have

    for($i=0, $j=0; $i < $numLumber; $i+=4, $j++){
      set_time_limit(30);
      $lumberHeight = $lumber[$i];
      $lumberWidth = $lumber[$i+1];
      if($logWidth == 0 || $logHeight == 0)
      {
        break;
      }
      if (($logHeight >= $lumberHeight) && ($logWidth >= $lumberWidth)) {
        //log height = height of the lumber
        if ($logHeight == $lumberHeight) {
          while ($logWidth >= $lumberWidth) {
            $logWidth -= $lumberWidth;
            $boardCounter1[$j]++;
          }
          optimal_cut1($logHeight, $logWidth, $lumber, $boardCounter1);
          break;
        } //log width = width of current lumber
        elseif ($logWidth == $lumberWidth) {
          while ($logHeight >= $lumberHeight) {
            $logHeight -= $lumberHeight;
            $boardCounter1[$j]++;
          }
          optimal_cut1($logHeight, $logWidth, $lumber, $boardCounter1);
          break;
        } else {
          $boardCounter1[$j]++;

          $box1Height = $logHeight - $lumberHeight;
          $box1Width = $logWidth;

          //  to the right of the cut we just made
          $box2Height = $lumberHeight;
          $box2Width = $logWidth - $lumberWidth;

          optimal_cut1($box1Height, $box1Width, $lumber, $boardCounter1);
          optimal_cut1($box2Height, $box2Width, $lumber, $boardCounter1);
          break;
        }
      }
        rotateLumber($lumberHeight, $lumberWidth);

      if (($logHeight >= $lumberHeight) && ($logWidth >= $lumberWidth)) {
        //log height = height of the lumber
        if ($logHeight == $lumberHeight) {
          while ($logWidth >= $lumberWidth) {
            $logWidth -= $lumberWidth;
            $boardCounter1[$j]++;
          }
          optimal_cut1($logHeight, $logWidth, $lumber, $boardCounter1);
          break;
        } //log width = width of current lumber
        elseif ($logWidth == $lumberWidth) {
          while ($logHeight >= $lumberHeight) {
            $logHeight -= $lumberHeight;
            $boardCounter1[$j]++;
          }
          optimal_cut1($logHeight, $logWidth, $lumber, $boardCounter1);
          break;
        } else {
          $boardCounter1[$j]++;

          $box1Height = $logHeight - $lumberHeight;
          $box1Width = $logWidth;

          //  to the right of the cut we just made
          $box2Height = $lumberHeight;
          $box2Width = $logWidth - $lumberWidth;

          optimal_cut1($box1Height, $box1Width, $lumber, $boardCounter1);
          optimal_cut1($box2Height, $box2Width, $lumber, $boardCounter1);
          break;
        }
      }
    }
  }
  function optimal_cut2($logHeight, $logWidth, $lumber, &$boardCounter2){
    $numLumber = count($lumber); //for the for loop to only loop as many boards we have

    for($i=0, $j=0; $i < $numLumber; $i+=4, $j++){
      set_time_limit(30);
      $lumberHeight = $lumber[$i];
      $lumberWidth = $lumber[$i+1];
      if($logWidth == 0 || $logHeight == 0)
      {
        break;
      }
      if (($logHeight >= $lumberHeight) && ($logWidth >= $lumberWidth)) {
        //log height = height of the lumber
        if ($logHeight == $lumberHeight) {
          while ($logWidth >= $lumberWidth) {
            $logWidth -= $lumberWidth;
            $boardCounter2[$j]++;
          }
          optimal_cut2($logHeight, $logWidth, $lumber, $boardCounter2);
          break;
        } //log width = width of current lumber
        elseif ($logWidth == $lumberWidth) {
          while ($logHeight >= $lumberHeight) {
            $logHeight -= $lumberHeight;
            $boardCounter2[$j]++;
          }
          optimal_cut2($logHeight, $logWidth, $lumber, $boardCounter2);
          break;
        } else {
          $boardCounter2[$j]++;

          //  above the lumber cut we just had
          $box1Height = $logHeight - $lumberHeight;
          $box1Width = $lumberWidth;

          $box2Height = $logHeight;
          $box2Width = $logWidth - $lumberWidth;

          optimal_cut2($box1Height, $box1Width, $lumber, $boardCounter2);
          optimal_cut2($box2Height, $box2Width, $lumber, $boardCounter2);
          break;
        }
      }
        rotateLumber($lumberHeight, $lumberWidth);

      if (($logHeight >= $lumberHeight) && ($logWidth >= $lumberWidth)) {
        //log height = height of the lumber
        if ($logHeight == $lumberHeight) {
          while ($logWidth >= $lumberWidth) {
            $logWidth -= $lumberWidth;
            $boardCounter2[$j]++;
          }
          optimal_cut2($logHeight, $logWidth, $lumber, $boardCounter2);
          break;
        } //log width = width of current lumber
        elseif ($logWidth == $lumberWidth) {
          while ($logHeight >= $lumberHeight) {
            $logHeight -= $lumberHeight;
            $boardCounter2[$j]++;
          }
          optimal_cut2($logHeight, $logWidth, $lumber, $boardCounter2);
          break;
        } else {
          $boardCounter2[$j]++;

          //  above the lumber cut we just had
          $box1Height = $logHeight - $lumberHeight;
          $box1Width = $lumberWidth;

          $box2Height = $logHeight;
          $box2Width = $logWidth - $lumberWidth;

          optimal_cut2($box1Height, $box1Width, $lumber, $boardCounter2);
          optimal_cut2($box2Height, $box2Width, $lumber, $boardCounter2);
          break;
        }
      }
    }
  }
  //this function flips the lumber first then is same as optimal cut3
  function optimal_cut3($logHeight, $logWidth, $lumber, &$boardCounter3){
    $numLumber = count($lumber); //for the for loop to only loop as many boards we have

    for($i=0, $j=0; $i < $numLumber; $i+=4, $j++){
      set_time_limit(30);
      $lumberHeight = $lumber[$i+1];
      $lumberWidth = $lumber[$i];
      if($logWidth == 0 || $logHeight == 0)
      {
        break;
      }
      if (($logHeight >= $lumberHeight) && ($logWidth >= $lumberWidth)) {
        //log height = height of the lumber
        if ($logHeight == $lumberHeight) {
          while ($logWidth >= $lumberWidth) {
            $logWidth -= $lumberWidth;
            $boardCounter3[$j]++;
          }
          optimal_cut3($logHeight, $logWidth, $lumber, $boardCounter3);
          break;
        } //log width = width of current lumber
        elseif ($logWidth == $lumberWidth) {
          while ($logHeight >= $lumberHeight) {
            $logHeight -= $lumberHeight;
            $boardCounter3[$j]++;
          }
          optimal_cut3($logHeight, $logWidth, $lumber, $boardCounter3);
          break;
        } else {
          $boardCounter3[$j]++;

          $box1Height = $logHeight - $lumberHeight;
          $box1Width = $logWidth;

          //  to the right of the cut we just made
          $box2Height = $lumberHeight;
          $box2Width = $logWidth - $lumberWidth;

          optimal_cut3($box1Height, $box1Width, $lumber, $boardCounter3);
          optimal_cut3($box2Height, $box2Width, $lumber, $boardCounter3);
          break;
        }
      }
        rotateLumber($lumberHeight, $lumberWidth);

      if (($logHeight >= $lumberHeight) && ($logWidth >= $lumberWidth)) {
        //log height = height of the lumber
        if ($logHeight == $lumberHeight) {
          while ($logWidth >= $lumberWidth) {
            $logWidth -= $lumberWidth;
            $boardCounter3[$j]++;
          }
          optimal_cut3($logHeight, $logWidth, $lumber, $boardCounter3);
          break;
        } //log width = width of current lumber
        elseif ($logWidth == $lumberWidth) {
          while ($logHeight >= $lumberHeight) {
            $logHeight -= $lumberHeight;
            $boardCounter3[$j]++;
          }
          optimal_cut3($logHeight, $logWidth, $lumber, $boardCounter3);
          break;
        } else {
          $boardCounter3[$j]++;

          $box1Height = $logHeight - $lumberHeight;
          $box1Width = $logWidth;

          //  to the right of the cut we just made
          $box2Height = $lumberHeight;
          $box2Width = $logWidth - $lumberWidth;

          optimal_cut3($box1Height, $box1Width, $lumber, $boardCounter3);
          optimal_cut3($box2Height, $box2Width, $lumber, $boardCounter3);
          break;
        }
      }
    }
  }
  function optimal_cut4($logHeight, $logWidth, $lumber, &$boardCounter4)
  {
    $numLumber = count($lumber); //for the for loop to only loop as many boards we have

    for($i=0, $j=0; $i < $numLumber; $i+=4, $j++){
      set_time_limit(30);
      $lumberHeight = $lumber[$i+1];
      $lumberWidth = $lumber[$i];
      if($logWidth == 0 || $logHeight == 0)
      {
        break;
      }
      if (($logHeight >= $lumberHeight) && ($logWidth >= $lumberWidth)) {
        //log height = height of the lumber
        if ($logHeight == $lumberHeight) {
          while ($logWidth >= $lumberWidth) {
            $logWidth -= $lumberWidth;
            $boardCounter4[$j]++;
          }
          optimal_cut4($logHeight, $logWidth, $lumber, $boardCounter4);
          break;
        } //log width = width of current lumber
        elseif ($logWidth == $lumberWidth) {
          while ($logHeight >= $lumberHeight) {
            $logHeight -= $lumberHeight;
            $boardCounter4[$j]++;
          }
          optimal_cut2($logHeight, $logWidth, $lumber, $boardCounter4);
          break;
        } else {
          $boardCounter4[$j]++;

          //  above the lumber cut we just had
          $box1Height = $logHeight - $lumberHeight;
          $box1Width = $lumberWidth;

          $box2Height = $logHeight;
          $box2Width = $logWidth - $lumberWidth;

          optimal_cut4($box1Height, $box1Width, $lumber, $boardCounter4);
          optimal_cut4($box2Height, $box2Width, $lumber, $boardCounter4);
          break;
        }
      }
        rotateLumber($lumberHeight, $lumberWidth);

      if (($logHeight >= $lumberHeight) && ($logWidth >= $lumberWidth)) {
        //log height = height of the lumber
        if ($logHeight == $lumberHeight) {
          while ($logWidth >= $lumberWidth) {
            $logWidth -= $lumberWidth;
            $boardCounter4[$j]++;
          }
          optimal_cut4($logHeight, $logWidth, $lumber, $boardCounter4);
          break;
        } //log width = width of current lumber
        elseif ($logWidth == $lumberWidth) {
          while ($logHeight >= $lumberHeight) {
            $logHeight -= $lumberHeight;
            $boardCounter4[$j]++;
          }
          optimal_cut4($logHeight, $logWidth, $lumber, $boardCounter4);
          break;
        } else {
          $boardCounter4[$j]++;

          //  above the lumber cut we just had
          $box1Height = $logHeight - $lumberHeight;
          $box1Width = $lumberWidth;

          $box2Height = $logHeight;
          $box2Width = $logWidth - $lumberWidth;

          optimal_cut4($box1Height, $box1Width, $lumber, $boardCounter4);
          optimal_cut4($box2Height, $box2Width, $lumber, $boardCounter4);
          break;
        }
      }
    }
  }
function rotateLumber(&$lumberHeight, &$lumberWidth){
    $temp = $lumberHeight;
    $lumberHeight = $lumberWidth;
    $lumberWidth = $temp;
}
?>
