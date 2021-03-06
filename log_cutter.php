<h1 style="color: white; text-align: center; font-size: 30pt; text-shadow: 2px 2px black;">Individual Logs</h1>
<?php

  $boardCounter1 = [0,0,0];
  $boardCounter2 = [0,0,0];
  $boardCounter3 = [0,0,0];
  $boardCounter4 = [0,0,0];
  $boardCountPerLog1 = [0,0,0];
  $boardCountPerLog1 = [0,0,0];
  $boardCountPerLog1 = [0,0,0];
  $boardCountPerLog1 = [0,0,0];
  $temp1 = [0,0,0];
  $temp2 = [0,0,0];
  $temp3 = [0,0,0];
  $temp4 = [0,0,0];
  $totalLogVol = 0;
  $tempTotalLogVol = 0;
  $multipleCuts = 0;
  $totalExcessLog = 0;
    for($i = 0; $i < count($arrayLogs)-1; $i+=3)
    {
        $boardCountPerLog1 = [0,0,0];
        $boardCountPerLog1 = [0,0,0];
        $boardCountPerLog1 = [0,0,0];
        $boardCountPerLog1 = [0,0,0];
        $temp1 = $boardCounter1;
        $temp2 = $boardCounter2;
        $temp3 = $boardCounter3;
        $temp4 = $boardCounter4;

        $logHeight = (int)$arrayLogs[$i];
        $logWidth = (int)$arrayLogs[$i+1];
        $logLength = (int)$arrayLogs[$i+2];
        $lumberLength = (int)$optimumValue[2];
        $totalLogVol += $logHeight*$logWidth*$logLength;
        $tempTotalLogVol = $logHeight*$logWidth*$logLength;
        $multipleCuts = $logLength/$lumberLength;
        $j = floor($multipleCuts);

        if($logLength >= $lumberLength) {
          for ($k = 0; $k < $j; $k++) {
            optimal_cut1($logHeight, $logWidth, $optimumValue, $boardCounter1);
            optimal_cut2($logHeight, $logWidth, $optimumValue, $boardCounter2);
            optimal_cut3($logHeight, $logWidth, $optimumValue, $boardCounter3);
            optimal_cut4($logHeight, $logWidth, $optimumValue, $boardCounter4);
          }
        }
        $boardCountPerLog1[0] = $boardCounter1[0] - $temp1[0];
        $boardCountPerLog1[1] = $boardCounter1[1] - $temp1[1];
        $boardCountPerLog1[2] = $boardCounter1[2] - $temp1[2];

        $boardCountPerLog2[0] = $boardCounter2[0] - $temp2[0];
        $boardCountPerLog2[1] = $boardCounter2[1] - $temp2[1];
        $boardCountPerLog2[2] = $boardCounter2[2] - $temp2[2];

        $boardCountPerLog3[0] = $boardCounter3[0] - $temp3[0];
        $boardCountPerLog3[1] = $boardCounter3[1] - $temp3[1];
        $boardCountPerLog3[2] = $boardCounter3[2] - $temp3[2];

        $boardCountPerLog4[0] = $boardCounter4[0] - $temp4[0];
        $boardCountPerLog4[1] = $boardCounter4[1] - $temp4[1];
        $boardCountPerLog4[2] = $boardCounter4[2] - $temp4[2];


        include 'parse_results_per_log.php';
        ?><br><?php
    }

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
