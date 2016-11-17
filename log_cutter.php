<?php

  $logHeight = $arrayLogs[0];
  $logWidth = $arrayLogs[1];
  $boardCounter[0]=0;
  $boardCounter[1]=0;
  $boardCounter[2]=0;

  $ogLogArea = $arrayLogs[0]*$arrayLogs[1];

  echo "logarea = ";
  echo $ogLogArea."<br>";

  optimal_cut($logHeight, $logWidth, $arrayLumber, $boardCounter);
  foreach($boardCounter as $board)
  {
    echo $board."<br>";
  }

  function optimal_cut($logHeight, $logWidth, $lumber, &$boardCounter)
  {
        echo "logHeight = ".$logHeight."<br>";
        echo "logwidth = ".$logWidth."<br>";
        $numLumber = count($lumber) - 3; //for the for loop to only loop as many boards we have

        for($i=0, $j=0; $i < $numLumber; $i+=4, $j++){
          set_time_limit(30);
          $lumberHeight = $lumber[$i];
          $lumberWidth = $lumber[$i+1];
          if($logWidth == 0 || $logHeight == 0)
          {
            echo "this box is done son <br>";
            break;
          }
          if (($logHeight >= $lumberHeight) && ($logWidth >= $lumberWidth)) {
            //log height = height of the lumber
            if ($logHeight == $lumberHeight) {
              while ($logWidth >= $lumberWidth) {
                $logWidth -= $lumberWidth;
                $boardCounter[$j]++;
              }
              optimal_cut($logHeight, $logWidth, $lumber, $boardCounter);
              break;
            } //log width = width of current lumber
            elseif ($logWidth == $lumberWidth) {
              while ($logHeight >= $lumberHeight) {
                $logHeight -= $lumberHeight;
                $boardCounter[$j]++;
              }
              optimal_cut($logHeight, $logWidth, $lumber, $boardCounter);
              break;
            } else {
              $boardCounter[$j]++;

              //  above the lumber cut we just had
              $box1Height = $logHeight - $lumberHeight;
              $box1Width = $lumberWidth;

              //  to the right of the cut we just made
              $box2Height = $lumberHeight;
              $box2Width = $logWidth - $lumberWidth;

              // diagonally attached to the cut we just made
              $box3Height = $logHeight - $lumberHeight;
              $box3Width = $logWidth - $lumberWidth;

              optimal_cut($box1Height, $box1Width, $lumber, $boardCounter);
              optimal_cut($box2Height, $box2Width, $lumber, $boardCounter);
              optimal_cut($box3Height, $box3Width, $lumber, $boardCounter);
              break;
            }
          }
          $temp = $lumberHeight;
          $lumberHeight = $lumberWidth;
          $lumberWidth = $temp;


          echo "next portion <br>";
          echo "logHeight = ".$logHeight."<br>";
          echo "logwidth = ".$logWidth."<br>";

          if (($logHeight >= $lumberHeight) && ($logWidth >= $lumberWidth)) {
            //log height = height of the lumber
            if ($logHeight == $lumberHeight) {
              while ($logWidth >= $lumberWidth) {
                $logWidth -= $lumberWidth;
                $boardCounter[$j]++;
              }
              optimal_cut($logHeight, $logWidth, $lumber, $boardCounter);
              break;
            } //log width = width of current lumber
            elseif ($logWidth == $lumberWidth) {
              while ($logHeight >= $lumberHeight) {
                $logHeight -= $lumberHeight;
                $boardCounter[$j]++;
              }
              optimal_cut($logHeight, $logWidth, $lumber, $boardCounter);
              break;
            } else {
              $boardCounter[$j]++;
              //  above the lumber cut we just had
              $box1Height = $logHeight - $lumberHeight;
              $box1Width = $lumberWidth;
              //$box1area = $box1Width * $box1Height;
              //  to the right of the cut we just made
              $box2Height = $lumberHeight;
              $box2Width = $logWidth - $lumberWidth;
              //$box2area = $box2Width * $box2Height;
              // diagonally attached to the cut we just made
              $box3Height = $logHeight - $lumberHeight;
              $box3Width = $logWidth - $lumberWidth;
              //$box3area = $box3Width * $box3Height;
              //echo "box1area ".$box1area." box2area ".$box2area." box3area ".$box3area."<br>";
              optimal_cut($box1Height, $box1Width, $lumber, $boardCounter);
              optimal_cut($box2Height, $box2Width, $lumber, $boardCounter);
              optimal_cut($box3Height, $box3Width, $lumber, $boardCounter);
              break;
            }
          }
        }
        echo "box scrapped <br>";
  }
?>
