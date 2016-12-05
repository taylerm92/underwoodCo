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

  include 'display_tables.php';
?>
<button type="submit" class="btn btn-default" onclick="window.location='index.php';">Cancel</button>
<form action="" method="post">
  <button type="submit" class="btn btn-default" name="confirm">Confirm Cut</button>
</form>

<?php
  if(isset($_POST['confirm']))
  {
    include 'databaseAccess.php';
    include 'updatedatabase.php';
    header('Location: purchase.php');
  }
?>
