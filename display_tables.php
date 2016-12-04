<?php
$quantities;
$scrapVolume;
if($round1TotalValue >= $round2TotalValue && $round1TotalValue >= $round3TotalValue && $round1TotalValue >= $round4TotalValue)
{
	$quantities= $boardCounter1;
	$scrapVolume= $round1ScrapVolume;
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
    echo format_num($boardCounter1[0]);
    echo "</td>";
    echo "<td>";
    echo format_num($optimumValue[0]);
    echo "</td>";
    echo "<td>";
    echo format_num($optimumValue[1]);
    echo "</td>";
    echo "<td>";
    echo format_num($optimumValue[2]);
    echo "</td>";
    echo "<td>";
    echo "$".format_num($board1CubicInch*$optimumValue[3]);
    echo "</td>";
    echo "</tr>";
    //board 2 in the table
    if (!($optimumValue[0]==$optimumValue[4] && $optimumValue[1]==$optimumValue[5])) {
        echo "<tr>";
        echo "<td>";
        echo format_num($boardCounter1[1]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[4]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[5]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[6]);
        echo "</td>";
        echo "<td>";
        echo "$" . format_num($board2CubicInch * $optimumValue[7]);
        echo "</td>";
        echo "</tr>";
    }
    //board 3 in the table, do not display if same as board 1 or 2
    if (!($optimumValue[4]==$optimumValue[8] && $optimumValue[5]==$optimumValue[9]) && !($optimumValue[0]==$optimumValue[8] && $optimumValue[1]==$optimumValue[9])){
        echo "<tr>";
        echo "<td>";
        echo format_num($boardCounter1[2]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[8]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[9]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[10]);
        echo "</td>";
        echo "<td>";
        echo "$" . format_num($board3CubicInch * $optimumValue[11]);
        echo "</td>";
        echo "</tr>";
    }
    //scrap case
    echo "<tr>";
    echo "<td colspan=\"5\">";
    echo "Scrap: ".format_num($round1ScrapVolume)." cf";
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
    echo "$".format_num($round1TotalValue - $round1ScrapValue);
    echo "</td>";
    echo "<td>";
    echo format_num((($round1TotalValue - $round1ScrapValue)/$round1TotalValue)*100)."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Scrap";
    echo "</td>";
    echo "<td>";
    echo "$".format_num($round1ScrapValue);
    echo "</td>";
    echo "<td>";
    echo format_num((($round1ScrapValue)/$round1TotalValue)*100)."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Total";
    echo "</td>";
    echo "<td>";
    echo "$".format_num($round1TotalValue);
    echo "</td>";
    echo "<td>";
    echo "";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
}
elseif($round2TotalValue >= $round1TotalValue && $round2TotalValue >= $round3TotalValue && $round2TotalValue >= $round4TotalValue)
{
	$quantities= $boardCounter2;
	$scrapVolume= $round2ScrapVolume;
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
    echo format_num($boardCounter2[0]);
    echo "</td>";
    echo "<td>";
    echo format_num($optimumValue[0]);
    echo "</td>";
    echo "<td>";
    echo format_num($optimumValue[1]);
    echo "</td>";
    echo "<td>";
    echo format_num($optimumValue[2]);
    echo "</td>";
    echo "<td>";
    echo "$".format_num($board1CubicInch*$optimumValue[3]);
    echo "</td>";
    echo "</tr>";
    //board 2 in the table, do not display if is a duplicate of board 1
    if (!($optimumValue[0]==$optimumValue[4] && $optimumValue[1]==$optimumValue[5])) {
        echo "<tr>";
        echo "<td>";
        echo format_num($boardCounter2[1]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[4]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[5]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[6]);
        echo "</td>";
        echo "<td>";
        echo "$" . format_num($board2CubicInch * $optimumValue[7]);
        echo "</td>";
        echo "</tr>";
    }
    //board 3 in the table, do not display if is a duplicate of boards 1 or 2
    if (!($optimumValue[4]==$optimumValue[8] && $optimumValue[5]==$optimumValue[9]) && !($optimumValue[0]==$optimumValue[8] && $optimumValue[1]==$optimumValue[9])) {
        echo "<tr>";
        echo "<td>";
        echo format_num($boardCounter2[2]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[8]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[9]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[10]);
        echo "</td>";
        echo "<td>";
        echo "$" . format_num($board3CubicInch * $optimumValue[11]);
        echo "</td>";
        echo "</tr>";
    }
    //scrap case
    echo "<tr>";
    echo "<td colspan=\"5\">";
    echo "Scrap: ".format_num($round2ScrapVolume)." cf";
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
    echo "$".format_num($round2TotalValue - $round2ScrapValue);
    echo "</td>";
    echo "<td>";
    echo format_num((($round2TotalValue - $round2ScrapValue)/$round2TotalValue)*100)."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Scrap";
    echo "</td>";
    echo "<td>";
    echo "$".format_num($round2ScrapValue);
    echo "</td>";
    echo "<td>";
    echo format_num((($round2ScrapValue)/$round2TotalValue)*100)."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Total";
    echo "</td>";
    echo "<td>";
    echo "$".format_num($round2TotalValue);
    echo "</td>";
    echo "<td>";
    echo "";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
}
elseif($round3TotalValue >= $round2TotalValue && $round3TotalValue >= $round1TotalValue && $round3TotalValue >= $round4TotalValue)
{
	$quantities= $boardCounter3;
	$scrapVolume= $round3ScrapVolume;
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
    echo format_num($boardCounter3[0]);
    echo "</td>";
    echo "<td>";
    echo format_num($optimumValue[0]);
    echo "</td>";
    echo "<td>";
    echo format_num($optimumValue[1]);
    echo "</td>";
    echo "<td>";
    echo format_num($optimumValue[2]);
    echo "</td>";
    echo "<td>";
    echo "$".format_num($board1CubicInch*$optimumValue[3]);
    echo "</td>";
    echo "</tr>";
    //board 2 in the table, do not display if is a duplicate of board 1
    if (!($optimumValue[0]==$optimumValue[4] && $optimumValue[1]==$optimumValue[5])) {
        echo "<tr>";
        echo "<td>";
        echo format_num($boardCounter3[1]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[4]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[5]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[6]);
        echo "</td>";
        echo "<td>";
        echo "$" . format_num($board2CubicInch * $optimumValue[7]);
        echo "</td>";
        echo "</tr>";
    }
    //board 3 in the table, do not display if duplicate of boards 1 or 2
    if (!($optimumValue[4]==$optimumValue[8] && $optimumValue[5]==$optimumValue[9]) && !($optimumValue[0]==$optimumValue[8] && $optimumValue[1]==$optimumValue[9])) {
        echo "<tr>";
        echo "<td>";
        echo format_num($boardCounter3[2]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[8]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[9]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[10]);
        echo "</td>";
        echo "<td>";
        echo "$" . format_num($board3CubicInch * $optimumValue[11]);
        echo "</td>";
        echo "</tr>";
    }
    //scrap case
    echo "<tr>";
    echo "<td colspan=\"5\">";
    echo "Scrap: ".format_num($round3ScrapVolume)." cf";
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
    echo "$".format_num($round3TotalValue - $round3ScrapValue);
    echo "</td>";
    echo "<td>";
    echo format_num((($round3TotalValue - $round3ScrapValue)/$round3TotalValue)*100)."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Scrap";
    echo "</td>";
    echo "<td>";
    echo "$".format_num($round3ScrapValue);
    echo "</td>";
    echo "<td>";
    echo format_num((($round3ScrapValue)/$round3TotalValue)*100)."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Total";
    echo "</td>";
    echo "<td>";
    echo "$".format_num($round3TotalValue);
    echo "</td>";
    echo "<td>";
    echo "";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
}
else
{
	$quantities= $boardCounter4;
	$scrapVolume= $round4ScrapVolume;
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
    echo format_num($boardCounter4[0]);
    echo "</td>";
    echo "<td>";
    echo format_num($optimumValue[0]);
    echo "</td>";
    echo "<td>";
    echo format_num($optimumValue[1]);
    echo "</td>";
    echo "<td>";
    echo format_num($optimumValue[2]);
    echo "</td>";
    echo "<td>";
    echo "$".format_num($board1CubicInch*$optimumValue[3]);
    echo "</td>";
    echo "</tr>";
    //board 2 in the table, do not display if is a duplicate of board 1
    if (!($optimumValue[0]==$optimumValue[4] && $optimumValue[1]==$optimumValue[5])) {
        echo "<tr>";
        echo "<td>";
        echo format_num($boardCounter4[1]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[4]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[5]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[6]);
        echo "</td>";
        echo "<td>";
        echo "$" . format_num($board2CubicInch * $optimumValue[7]);
        echo "</td>";
        echo "</tr>";
    }
    //board 3 in the table
    if (!($optimumValue[4]==$optimumValue[8] && $optimumValue[5]==$optimumValue[9]) && !($optimumValue[0]==$optimumValue[8] && $optimumValue[1]==$optimumValue[9])) {
        echo "<tr>";
        echo "<td>";
        echo format_num($boardCounter4[2]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[8]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[9]);
        echo "</td>";
        echo "<td>";
        echo format_num($optimumValue[10]);
        echo "</td>";
        echo "<td>";
        echo "$" . format_num($board3CubicInch * $optimumValue[11]);
        echo "</td>";
        echo "</tr>";
    }
    //scrap case
    echo "<tr>";
    echo "<td colspan=\"5\">";
    echo "Scrap: ".format_num($round4ScrapVolume)." cf";
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
    echo "$".format_num(($round4TotalValue - $round4ScrapValue));
    echo "</td>";
    echo "<td>";
    echo format_num(((($round4TotalValue - $round4ScrapValue)/$round4TotalValue)*100))."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Scrap";
    echo "</td>";
    echo "<td>";
    echo "$".format_num($round4ScrapValue);
    echo "</td>";
    echo "<td>";
    echo format_num(((($round4ScrapValue)/$round4TotalValue)*100))."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Total";
    echo "</td>";
    echo "<td>";
    echo "$".format_num($round4TotalValue);
    echo "</td>";
    echo "<td>";
    echo "";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
}

//formats all tables to 2 decimal places
function format_num($anyValue){
    $anyValueTwoDecimal = number_format((float)$anyValue, 2, '.', '');
    return $anyValueTwoDecimal;
}


?>