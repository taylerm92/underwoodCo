<?php
  // $boardCounter1 = [0,0,0];
  // $boardCounter2 = [0,0,0];
  // $boardCounter3 = [0,0,0];
  // $boardCounter4 = [0,0,0];
  $ci2cf = 0.000578704;

  $board1CubicInch = $optimumValue[0]*$optimumValue[1]*$optimumValue[2]; //total cubic inch for each board
  $board2CubicInch = $optimumValue[4]*$optimumValue[5]*$optimumValue[6];
  $board3CubicInch = $optimumValue[8]*$optimumValue[9]*$optimumValue[10];

  $round1Board1Total = $boardCounter1[0]*$board1CubicInch; //total cubic inch of all boards cut of one type
  $round1Board2Total = $boardCounter1[1]*$board2CubicInch;
  $round1Board3Total = $boardCounter1[2]*$board3CubicInch;
  $round1TotalVolume = $round1Board1Total+$round1Board2Total+$round1Board3Total; //total of all boards cubic inch to calculate scrap value
  $round1ScrapVolume = ($totalLogVol - $round1TotalVolume)*$ci2cf; // total volume in cubic inch for scrap

  $round1Board1Value = $round1Board1Total*$optimumValue[3]; //total value for all board1 cuts in round 1
  $round1Board2Value = $round1Board2Total*$optimumValue[7]; //total value for all board2 cuts in round 1
  $round1Board3Value = $round1Board3Total*$optimumValue[11]; //total value for all board3 cuts in round 1
  $round1ScrapValue = $round1ScrapVolume*$arrayLumber[count($arrayLumber)-2]; //total value for scrap in round 1
  $round1TotalValue = $round1Board1Value+$round1Board2Value+$round1Board3Value+$round1ScrapValue; //total value of all log after being cut

  $round2Board1Total = $boardCounter2[0]*$board1CubicInch; //total cubic inch of all boards cut of one type
  $round2Board2Total = $boardCounter2[1]*$board2CubicInch;
  $round2Board3Total = $boardCounter2[2]*$board3CubicInch;
  $round2TotalVolume = $round2Board1Total+$round2Board2Total+$round2Board3Total; //total of all boards cubic inch to calculate scrap value
  $round2ScrapVolume = ($totalLogVol - $round2TotalVolume)*$ci2cf; // total volume in cubic inch for scrap

  $round2Board1Value = $round2Board1Total*$optimumValue[3]; //total value for all board1 cuts in round 2
  $round2Board2Value = $round2Board2Total*$optimumValue[7]; //total value for all board2 cuts in round 2
  $round2Board3Value = $round2Board3Total*$optimumValue[11]; //total value for all board3 cuts in round 2
  $round2ScrapValue = $round2ScrapVolume*$arrayLumber[count($arrayLumber)-2]; //total value for scrap in round 2
  $round2TotalValue = $round2Board1Value+$round2Board2Value+$round2Board3Value+$round2ScrapValue; //total value of all log after being cut

  $round3Board1Total = $boardCounter3[0]*$board1CubicInch; //total cubic inch of all boards cut of one type
  $round3Board2Total = $boardCounter3[1]*$board2CubicInch;
  $round3Board3Total = $boardCounter3[2]*$board3CubicInch;
  $round3TotalVolume = $round3Board1Total+$round3Board2Total+$round3Board3Total; //total of all boards cubic inch to calculate scrap value
  $round3ScrapVolume = ($totalLogVol - $round3TotalVolume)*$ci2cf; // total volume in cubic inch for scrap

  $round3Board1Value = $round3Board1Total*$optimumValue[3]; //total value for all board1 cuts in round 3
  $round3Board2Value = $round3Board2Total*$optimumValue[7]; //total value for all board2 cuts in round 3
  $round3Board3Value = $round3Board3Total*$optimumValue[11]; //total value for all board3 cuts in round 3
  $round3ScrapValue = $round3ScrapVolume*$arrayLumber[count($arrayLumber)-2]; //total value for scrap in round 3
  $round3TotalValue = $round3Board1Value+$round3Board2Value+$round3Board3Value+$round3ScrapValue; //total value of all log after being cut

  $round4Board1Total = $boardCounter4[0]*$board1CubicInch; //total cubic inch of all boards cut of one type
  $round4Board2Total = $boardCounter4[1]*$board2CubicInch;
  $round4Board3Total = $boardCounter4[2]*$board3CubicInch;
  $round4TotalVolume = $round4Board1Total+$round4Board2Total+$round4Board3Total; //total of all boards cubic inch to calculate scrap value
  $round4ScrapVolume = ($totalLogVol - $round4TotalVolume)*$ci2cf; // total volume in cubic inch for scrap

  $round4Board1Value = $round4Board1Total*$optimumValue[3]; //total value for all board1 cuts in round 4
  $round4Board2Value = $round4Board2Total*$optimumValue[7]; //total value for all board2 cuts in round 4
  $round4Board3Value = $round4Board3Total*$optimumValue[11]; //total value for all board3 cuts in round 4
  $round4ScrapValue = $round4ScrapVolume*$arrayLumber[count($arrayLumber)-2]; //total value for scrap in round 4
  $round4TotalValue = $round4Board1Value+$round4Board2Value+$round4Board3Value+$round4ScrapValue; //total value of all log after being cut

  if($round1TotalValue >= $round2TotalValue && $round1TotalValue >= $round3TotalValue && $round1TotalValue >= $round4TotalValue)
  {
    //lumber and scrap table start
    echo "<table class = table>";
      echo "<tr>";
        echo "<th>";
          echo "Quantity";
        echo "</th>";
        echo "<th>";
          echo "Height";
        echo "</th>";
        echo "<th>";
          echo "Width";
        echo "</th>";
        echo "<th>";
          echo "Length";
        echo "</th>";
        echo "<th>";
          echo "Value";
        echo "</th>";
      echo "</tr>";
      //board 1 in the table
      echo "<tr>";
        echo "<td>";
          echo $boardCounter1[0];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[0];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[1];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[2];
        echo "</td>";
        echo "<td>";
          echo "$".$board1CubicInch*$optimumValue[3];
        echo "</td>";
      echo "</tr>";
      //board 2 in the table
      echo "<tr>";
        echo "<td>";
          echo $boardCounter1[1];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[4];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[5];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[6];
        echo "</td>";
        echo "<td>";
          echo "$".$board2CubicInch*$optimumValue[7];
        echo "</td>";
      echo "</tr>";
      //board 3 in the table
      echo "<tr>";
        echo "<td>";
          echo $boardCounter1[2];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[8];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[9];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[10];
        echo "</td>";
        echo "<td>";
          echo "$".$board3CubicInch*$optimumValue[11];
        echo "</td>";
      echo "</tr>";
      //scrap case
      echo "<tr>";
        echo "<td colspan=\"5\">";
          echo "Scrap: ".$round1ScrapVolume." cf";
        echo "</td>";
      echo "</tr>";
    echo "</table>";
    //value table start
    echo "<table class = table>";
      echo "<th>";
        echo "";
      echo "</th>";
      echo "<th>";
        echo "Value";
      echo "</th>";
      echo "<th>";
        echo "% Value";
      echo "</th>";
      echo "<tr>";
        echo "<td>";
          echo "Lumber";
        echo "</td>";
        echo "<td>";
          echo "$".($round1TotalValue - $round1ScrapValue);
        echo "</td>";
        echo "<td>";
          echo ((($round1TotalValue - $round1ScrapValue)/$round1TotalValue)*100)."%";
        echo "</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td>";
          echo "Scrap";
        echo "</td>";
        echo "<td>";
          echo "$".$round1ScrapValue;
        echo "</td>";
        echo "<td>";
          echo ((($round1ScrapValue)/$round1TotalValue)*100)."%";
        echo "</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td>";
          echo "Total";
        echo "</td>";
        echo "<td>";
          echo "$".$round1TotalValue;
        echo "</td>";
        echo "<td>";
          echo "";
        echo "</td>";
      echo "</tr>";
    echo "</table>";
  }
  elseif($round2TotalValue >= $round1TotalValue && $round2TotalValue >= $round3TotalValue && $round2TotalValue >= $round4TotalValue)
  {
    echo "<table class = table>";
      echo "<tr>";
        echo "<th>";
          echo "Quantity";
        echo "</th>";
        echo "<th>";
          echo "Height";
        echo "</th>";
        echo "<th>";
          echo "Width";
        echo "</th>";
        echo "<th>";
          echo "Length";
        echo "</th>";
        echo "<th>";
          echo "Value";
        echo "</th>";
      echo "</tr>";
      //board 1 in the table
      echo "<tr>";
        echo "<td>";
          echo $boardCounter2[0];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[0];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[1];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[2];
        echo "</td>";
        echo "<td>";
          echo "$".$board1CubicInch*$optimumValue[3];
        echo "</td>";
      echo "</tr>";
      //board 2 in the table
      echo "<tr>";
        echo "<td>";
          echo $boardCounter2[1];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[4];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[5];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[6];
        echo "</td>";
        echo "<td>";
          echo "$".$board2CubicInch*$optimumValue[7];
        echo "</td>";
      echo "</tr>";
      //board 3 in the table
      echo "<tr>";
        echo "<td>";
          echo $boardCounter2[2];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[8];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[9];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[10];
        echo "</td>";
        echo "<td>";
          echo "$".$board3CubicInch*$optimumValue[11];
        echo "</td>";
      echo "</tr>";
      //scrap case
      echo "<tr>";
        echo "<td colspan=\"5\">";
          echo "Scrap: ".$round2ScrapVolume." cf";
        echo "</td>";
      echo "</tr>";
    echo "</table>";
    //value table start
    echo "<table class = table>";
      echo "<th>";
        echo "";
      echo "</th>";
      echo "<th>";
        echo "Value";
      echo "</th>";
      echo "<th>";
        echo "% Value";
      echo "</th>";
      echo "<tr>";
        echo "<td>";
          echo "Lumber";
        echo "</td>";
        echo "<td>";
          echo "$".($round2TotalValue - $round2ScrapValue);
        echo "</td>";
        echo "<td>";
          echo ((($round2TotalValue - $round2ScrapValue)/$round2TotalValue)*100)."%";
        echo "</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td>";
          echo "Scrap";
        echo "</td>";
        echo "<td>";
          echo "$".$round2ScrapValue;
        echo "</td>";
        echo "<td>";
          echo ((($round2ScrapValue)/$round2TotalValue)*100)."%";
        echo "</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td>";
          echo "Total";
        echo "</td>";
        echo "<td>";
          echo "$".$round2TotalValue;
        echo "</td>";
        echo "<td>";
          echo "";
        echo "</td>";
      echo "</tr>";
    echo "</table>";
  }
  elseif($round3TotalValue >= $round2TotalValue && $round3TotalValue >= $round1TotalValue && $round3TotalValue >= $round4TotalValue)
  {
    echo "<table class = table>";
      echo "<tr>";
        echo "<th>";
          echo "Quantity";
        echo "</th>";
        echo "<th>";
          echo "Height";
        echo "</th>";
        echo "<th>";
          echo "Width";
        echo "</th>";
        echo "<th>";
          echo "Length";
        echo "</th>";
        echo "<th>";
          echo "Value";
        echo "</th>";
      echo "</tr>";
      //board 1 in the table
      echo "<tr>";
        echo "<td>";
          echo $boardCounter3[0];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[0];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[1];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[2];
        echo "</td>";
        echo "<td>";
          echo "$".$board1CubicInch*$optimumValue[3];
        echo "</td>";
      echo "</tr>";
      //board 2 in the table
      echo "<tr>";
        echo "<td>";
          echo $boardCounter3[1];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[4];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[5];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[6];
        echo "</td>";
        echo "<td>";
          echo "$".$board2CubicInch*$optimumValue[7];
        echo "</td>";
      echo "</tr>";
      //board 3 in the table
      echo "<tr>";
        echo "<td>";
          echo $boardCounter3[2];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[8];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[9];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[10];
        echo "</td>";
        echo "<td>";
          echo "$".$board3CubicInch*$optimumValue[11];
        echo "</td>";
      echo "</tr>";
      //scrap case
      echo "<tr>";
        echo "<td colspan=\"5\">";
          echo "Scrap: ".$round3ScrapVolume." cf";
        echo "</td>";
      echo "</tr>";
    echo "</table>";
    //value table start
    echo "<table class = table>";
      echo "<th>";
        echo "";
      echo "</th>";
      echo "<th>";
        echo "Value";
      echo "</th>";
      echo "<th>";
        echo "% Value";
      echo "</th>";
      echo "<tr>";
        echo "<td>";
          echo "Lumber";
        echo "</td>";
        echo "<td>";
          echo "$".($round3TotalValue - $round3ScrapValue);
        echo "</td>";
        echo "<td>";
          echo ((($round3TotalValue - $round3ScrapValue)/$round3TotalValue)*100)."%";
        echo "</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td>";
          echo "Scrap";
        echo "</td>";
        echo "<td>";
          echo "$".$round3ScrapValue;
        echo "</td>";
        echo "<td>";
          echo ((($round3ScrapValue)/$round3TotalValue)*100)."%";
        echo "</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td>";
          echo "Total";
        echo "</td>";
        echo "<td>";
          echo "$".$round3TotalValue;
        echo "</td>";
        echo "<td>";
          echo "";
        echo "</td>";
      echo "</tr>";
    echo "</table>";
  }
  else
  {
    echo "<table class = table>";
      echo "<tr>";
        echo "<th>";
          echo "Quantity";
        echo "</th>";
        echo "<th>";
          echo "Height";
        echo "</th>";
        echo "<th>";
          echo "Width";
        echo "</th>";
        echo "<th>";
          echo "Length";
        echo "</th>";
        echo "<th>";
          echo "Value";
        echo "</th>";
      echo "</tr>";
      //board 1 in the table
      echo "<tr>";
        echo "<td>";
          echo $boardCounter4[0];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[0];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[1];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[2];
        echo "</td>";
        echo "<td>";
          echo "$".$board1CubicInch*$optimumValue[3];
        echo "</td>";
      echo "</tr>";
      //board 2 in the table
      echo "<tr>";
        echo "<td>";
          echo $boardCounter4[1];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[4];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[5];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[6];
        echo "</td>";
        echo "<td>";
          echo "$".$board2CubicInch*$optimumValue[7];
        echo "</td>";
      echo "</tr>";
      //board 3 in the table
      echo "<tr>";
        echo "<td>";
          echo $boardCounter4[2];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[8];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[9];
        echo "</td>";
        echo "<td>";
          echo $optimumValue[10];
        echo "</td>";
        echo "<td>";
          echo "$".$board3CubicInch*$optimumValue[11];
        echo "</td>";
      echo "</tr>";
      //scrap case
      echo "<tr>";
        echo "<td colspan=\"5\">";
          echo "Scrap: ".$round4ScrapVolume." cf";
        echo "</td>";
      echo "</tr>";
    echo "</table>";
    //value table start
    echo "<table class = table>";
      echo "<th>";
        echo "";
      echo "</th>";
      echo "<th>";
        echo "Value";
      echo "</th>";
      echo "<th>";
        echo "% Value";
      echo "</th>";
      echo "<tr>";
        echo "<td>";
          echo "Lumber";
        echo "</td>";
        echo "<td>";
          echo "$".($round4TotalValue - $round4ScrapValue);
        echo "</td>";
        echo "<td>";
          echo ((($round4TotalValue - $round4ScrapValue)/$round4TotalValue)*100)."%";
        echo "</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td>";
          echo "Scrap";
        echo "</td>";
        echo "<td>";
          echo "$".$round4ScrapValue;
        echo "</td>";
        echo "<td>";
          echo ((($round4ScrapValue)/$round4TotalValue)*100)."%";
        echo "</td>";
      echo "</tr>";
      echo "<tr>";
        echo "<td>";
          echo "Total";
        echo "</td>";
        echo "<td>";
          echo "$".$round4TotalValue;
        echo "</td>";
        echo "<td>";
          echo "";
        echo "</td>";
      echo "</tr>";
    echo "</table>";
  }
?>
