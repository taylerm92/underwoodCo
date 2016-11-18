<?php
  $numLumber = count($arrayLumber) - 3; //grabs only the measurements we need

  for($i = 0; $i < 12; $i++)
  {
    $volume[$i] = 0; //creates array to store boards and their volume by square inch
    $optimumValue[$i] = 0; //creates array to store optimum values in order later
  }

  for($index = 0; $index < $numLumber; $index += 4)
  {
    $volume[$index] = $arrayLumber[$index]; //save height
    $volume[$index+1] = $arrayLumber[$index+1]; //save width
    $volume[$index+2] = $arrayLumber[$index+2]; //save length
    $volume[$index+3] = $arrayLumber[$index+3]/($arrayLumber[$index]*$arrayLumber[$index+1]*$arrayLumber[$index+2]); //stores value by volume of each board
  }

  if($numLumber = 12)
  {
    $output1 = $volume[3];
    $output2 = $volume[7];
    $output3 = $volume[11];
    if($output1 > $output2 && $output2 > $output3) //1,2,3
    {
      $optimumValue[0] = $volume[0];
      $optimumValue[1] = $volume[1];
      $optimumValue[2] = $volume[2];
      $optimumValue[3] = $volume[3]; //board1
      $optimumValue[4] = $volume[4];
      $optimumValue[5] = $volume[5];
      $optimumValue[6] = $volume[6];
      $optimumValue[7] = $volume[7];//board2
      $optimumValue[8] = $volume[8];
      $optimumValue[9] = $volume[9];
      $optimumValue[10] = $volume[10];
      $optimumValue[11] = $volume[11];//board3
    }
    else if($output1 > $output3 && $output3 > $output2)  //1,3,2
    {
      $optimumValue[0] = $volume[0];
      $optimumValue[1] = $volume[1];
      $optimumValue[2] = $volume[2];
      $optimumValue[3] = $volume[3]; //board1
      $optimumValue[4] = $volume[8];
      $optimumValue[5] = $volume[9];
      $optimumValue[6] = $volume[10];
      $optimumValue[7] = $volume[11];//board3
      $optimumValue[8] = $volume[4];
      $optimumValue[9] = $volume[5];
      $optimumValue[10] = $volume[6];
      $optimumValue[11] = $volume[7];//board2
    }
    else if($output2 > $output1 && $output1 > $output3) //2,1,3
    {
      $optimumValue[0] = $volume[4];
      $optimumValue[1] = $volume[5];
      $optimumValue[2] = $volume[6];
      $optimumValue[3] = $volume[7];//board2
      $optimumValue[4] = $volume[0];
      $optimumValue[5] = $volume[1];
      $optimumValue[6] = $volume[2];
      $optimumValue[7] = $volume[3]; //board1
      $optimumValue[8] = $volume[8];
      $optimumValue[9] = $volume[9];
      $optimumValue[10] = $volume[10];
      $optimumValue[11] = $volume[11];//board3
    }
    else if($output2 > $output3 && $output3 > $output1) //2,3,1
    {
      $optimumValue[0] = $volume[4];
      $optimumValue[1] = $volume[5];
      $optimumValue[2] = $volume[6];
      $optimumValue[3] = $volume[7];//board2
      $optimumValue[4] = $volume[8];
      $optimumValue[5] = $volume[9];
      $optimumValue[6] = $volume[10];
      $optimumValue[7] = $volume[11];//board3
      $optimumValue[8] = $volume[0];
      $optimumValue[9] = $volume[1];
      $optimumValue[10] = $volume[2];
      $optimumValue[11] = $volume[3]; //board1
    }
    else if($output3 > $output1 && $output1 > $output2) //3,1,2
    {
      $optimumValue[0] = $volume[8];
      $optimumValue[1] = $volume[9];
      $optimumValue[2] = $volume[10];
      $optimumValue[3] = $volume[11];//board3
      $optimumValue[4] = $volume[0];
      $optimumValue[5] = $volume[1];
      $optimumValue[6] = $volume[2];
      $optimumValue[7] = $volume[3]; //board1
      $optimumValue[8] = $volume[4];
      $optimumValue[9] = $volume[5];
      $optimumValue[10] = $volume[6];
      $optimumValue[11] = $volume[7];//board2
    }
    else //3,2,1
    {
      $optimumValue[0] = $volume[8];
      $optimumValue[1] = $volume[9];
      $optimumValue[2] = $volume[10];
      $optimumValue[3] = $volume[11];//board3
      $optimumValue[4] = $volume[4];
      $optimumValue[5] = $volume[5];
      $optimumValue[6] = $volume[6];
      $optimumValue[7] = $volume[7];//board2
      $optimumValue[8] = $volume[0];
      $optimumValue[9] = $volume[1];
      $optimumValue[10] = $volume[2];
      $optimumValue[11] = $volume[3]; //board1
    }
  }
  elseif($numLumber = 8)
  {
    $output1 = $volume[3];
    $output2 = $volume[7];
    if($output1 > $output2)
    {
      $optimumValue[0] = $volume[0];
      $optimumValue[1] = $volume[1];
      $optimumValue[2] = $volume[2];
      $optimumValue[3] = $volume[3]; //board1
      $optimumValue[4] = $volume[4];
      $optimumValue[5] = $volume[5];
      $optimumValue[6] = $volume[6];
      $optimumValue[7] = $volume[7];//board2
    }
    else
    {
      $optimumValue[0] = $volume[4];
      $optimumValue[1] = $volume[5];
      $optimumValue[2] = $volume[6];
      $optimumValue[3] = $volume[7];//board2
      $optimumValue[4] = $volume[0];
      $optimumValue[5] = $volume[1];
      $optimumValue[6] = $volume[2];
      $optimumValue[7] = $volume[3]; //board1

    }
  }
  else
  {
    $optimumValue[0] = $volume[0];
    $optimumValue[1] = $volume[1];
    $optimumValue[2] = $volume[2];
    $optimumValue[3] = $volume[3]; //board1
  }

?>
