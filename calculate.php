<?php

  $lines1 = file_get_contents("files/board.txt");
  $arrayLumber = preg_split('/[ \n]/', $lines1); //reads board file and stores values into array of Lumber

  $lines2 = file_get_contents("files/logs.txt");
  $arrayLogs = preg_split('/[ \n]/', $lines2); //reads logs file and stores values into array of logs

  echo "Log: ".$arrayLogs[0]." ".$arrayLogs[1]." ".$arrayLogs[2]."<br>";

  $count = count($arrayLumber) - 1;
  echo "Scrap: ".$arrayLumber[$count]."<br>";

  $output1 = $arrayLumber[0]*$arrayLumber[1]*$arrayLumber[2]; //calculates area of first board
  $output1 = $arrayLumber[3]/$output1;

  $output2 = $arrayLumber[4]*$arrayLumber[5]*$arrayLumber[6]; //calculates area of second board
  $output2 = $arrayLumber[7]/$output2;

  $output3 = $arrayLumber[8]*$arrayLumber[9]*$arrayLumber[10]; //calculates area of third board
  $output3 = $arrayLumber[11]/$output3;

  print "board 1: ".$output1."<br>board 2: ".$output2."<br>board 3: ".$output3."<br>"; //prints areas of each board

  if($output1 > $output2 && $output2 > $output3) //1,2,3
  {
      echo "optimum values are: <br>". $arrayLumber[0]."x".$arrayLumber[1]."x".$arrayLumber[2]."<br>".
                                   $arrayLumber[4]."x".$arrayLumber[5]."x".$arrayLumber[6]."<br>".
                                   $arrayLumber[8]."x".$arrayLumber[9]."x".$arrayLumber[10]."<br>";
  }
  else if($output1 > $output3 && $output3 > $output2)  //1,3,2
  {
    echo "optimum values are: <br>". $arrayLumber[0]."x".$arrayLumber[1]."x".$arrayLumber[2]."<br>".
                                 $arrayLumber[8]."x".$arrayLumber[9]."x".$arrayLumber[10]."<br>".
                                 $arrayLumber[4]."x".$arrayLumber[5]."x".$arrayLumber[6]."<br>";
  }
  else if($output2 > $output1 && $output1 > $output3) //2,1,3
  {
    echo "optimum values are: <br>". $arrayLumber[4]."x".$arrayLumber[5]."x".$arrayLumber[6]."<br>".
                                 $arrayLumber[0]."x".$arrayLumber[1]."x".$arrayLumber[2]."<br>".
                                 $arrayLumber[8]."x".$arrayLumber[9]."x".$arrayLumber[10]."<br>";
  }
  else if($output2 > $output3 && $output3 > $output1) //2,3,1
  {
    echo "optimum values are: <br>". $arrayLumber[4]."x".$arrayLumber[5]."x".$arrayLumber[6]."<br>".
                                 $arrayLumber[8]."x".$arrayLumber[9]."x".$arrayLumber[10]."<br>".
                                 $arrayLumber[0]."x".$arrayLumber[1]."x".$arrayLumber[2]."<br>";
  }
  else if($output3 > $output1 && $output1 > $output2) //3,1,2
  {
    echo "optimum values are: <br>". $arrayLumber[8]."x".$arrayLumber[9]."x".$arrayLumber[10]."<br>".
                                 $arrayLumber[0]."x".$arrayLumber[1]."x".$arrayLumber[2]."<br>".
                                 $arrayLumber[4]."x".$arrayLumber[5]."x".$arrayLumber[6]."<br>";
  }
  else //3,2,1
  {
    echo "optimum values are: <br>". $array[8]."x".$array[9]."x".$array[10]."<br>".
                                 $array[4]."x".$array[5]."x".$array[6]."<br>".
                                 $array[0]."x".$array[1]."x".$array[2]."<br>";
  }
?>
