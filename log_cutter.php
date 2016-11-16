<?php
  $logHeight = $arrayLogs[0];
  $logWidth = $arrayLogs[1];
  $boardCounter[0]=0;
  $boardCounter[1]=0;
  $boardCounter[2]=0;
  $j = 0;

  $boardCounter = optimal_cut($logHeight, $logWidth, $arrayLumber, $boardCounter);

  foreach($boardCounter as $board)
  {
    echo $board."<br>";
  }

  function optimal_cut($logHeight, $logWidth, $lumber, $boardCounter)
  {

      $numLumber = count($lumber) - 3; //for the for loop to only loop as many boards we have

      for($i=0, $j=0; $i < $numLumber; $i+=4, $j++)
      {
        set_time_limit(30);
        $lumberHeight = $lumber[$i];
        $lumberWidth = $lumber[$i+1];

        if(($logHeight >= $lumberHeight) && ($logWidth >= $lumberWidth))
        {
          //log height = height of the lumber
          if($logHeight==$lumberHeight)
          {
            while($logWidth >= $lumberWidth)
            {
              $logWidth -= $lumberWidth;
              $boardCounter[$j] += 1;
            }
            optimal_cut($logHeight, $logWidth, $lumber, $boardCounter);
          }

          //log width = width of current lumber
          elseif($logWidth == $lumberWidth)
          {
            while($logHeight >= $lumberHeight)
            {
              $logHeight -= $lumberHeight;
              $boardCounter[$j] += 1;
            }
            optimal_cut($logHeight, $logWidth, $lumber, $boardCounter);
          }

          else
          {
            $boardCounter[$j] += 1;
            $box1Height = $logHeight - $lumberHeight;
            $box1Width = $logWidth;
            $box2Height = $lumberHeight;
            $box2Width = $logWidth - $lumberWidth;

            optimal_cut($box1Height, $box1Width, $lumber, $boardCounter);
            optimal_cut($box2Height, $box2Width, $lumber, $boardCounter);
          }
        }

        $temp = $logHeight;
        $logHeight = $logWidth;
        $logWidth = $temp;

        if(($logHeight >= $lumberHeight) && ($logWidth >= $lumberWidth))
        {
          //log height = height of the lumber
          if($logHeight==$lumberHeight)
          {
            while($logWidth >= $lumberWidth)
            {
              $logWidth -= $lumberWidth;
              $boardCounter[$j] += 1;
            }
            optimal_cut($logHeight, $logWidth, $lumber, $boardCounter);
          }

          //log width = width of current lumber
          elseif($logWidth == $lumberWidth)
          {
            while($logHeight >= $lumberHeight)
            {
              $logHeight -= $lumberHeight;
              $boardCounter[$j] += 1;
            }
            optimal_cut($logHeight, $logWidth, $lumber, $boardCounter);
          }

          else
          {
            $boardCounter[$j] += 1;
            $box1Height = $logHeight - $lumberHeight;
            $box1Width = $logWidth;
            $box2Height = $lumberHeight;
            $box2Width = $logWidth - $lumberWidth;

            optimal_cut($box1Height, $box1Width, $lumber, $boardCounter);
            optimal_cut($box2Height, $box2Width, $lumber, $boardCounter);
          }
        }
      }
      return $boardCounter;
  }
?>
