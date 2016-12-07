<?php
if($round1TotalValue >= $round2TotalValue && $round1TotalValue >= $round3TotalValue && $round1TotalValue >= $round4TotalValue)
{
    //number_format((float)$anyValue, 2, '.', '');
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
    echo number_format((float)$boardCountPerLog1[0], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((float)$optimumValue[0], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((float)$optimumValue[1], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((float)$optimumValue[2], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo "$".number_format($board1CubicInch*$optimumValue[3], 2, '.', '');
    echo "</td>";
    echo "</tr>";
    //board 2 in the table
    if (!($optimumValue[0]==$optimumValue[4] && $optimumValue[1]==$optimumValue[5])) {
        echo "<tr>";
        echo "<td>";
        echo number_format((float)$boardCountPerLog1[1], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[4], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[5], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[6], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo "$" . number_format($board2CubicInch * $optimumValue[7], 2, '.', '');
        echo "</td>";
        echo "</tr>";
    }
    //board 3 in the table, do not display if same as board 1 or 2
    if (!($optimumValue[4]==$optimumValue[8] && $optimumValue[5]==$optimumValue[9]) && !($optimumValue[0]==$optimumValue[8] && $optimumValue[1]==$optimumValue[9])){
        echo "<tr>";
        echo "<td>";
        echo number_format((float)$boardCountPerLog1[2], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[8], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[9], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[10], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo "$" . number_format($board3CubicInch * $optimumValue[11], 2, '.', '');
        echo "</td>";
        echo "</tr>";
    }
    //scrap case
    echo "<tr>";
    echo "<td colspan=\"5\">";
    echo "Scrap: ".number_format((float)$round1ScrapVolume, 2, '.', '')." cf";
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
    echo "$".number_format($round1TotalValue - $round1ScrapValue, 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((($round1TotalValue - $round1ScrapValue)/$round1TotalValue)*100, 2, '.', '')."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Scrap";
    echo "</td>";
    echo "<td>";
    echo "$".number_format((float)$round1ScrapValue, 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((($round1ScrapValue)/$round1TotalValue)*100, 2, '.', '')."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Total";
    echo "</td>";
    echo "<td>";
    echo "$".number_format((float)$round1TotalValue, 2, '.', '');
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
    echo number_format((float)$boardCountPerLog2[0], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((float)$optimumValue[0], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((float)$optimumValue[1], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((float)$optimumValue[2], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo "$".number_format($board1CubicInch*$optimumValue[3], 2, '.', '');
    echo "</td>";
    echo "</tr>";
    //board 2 in the table, do not display if is a duplicate of board 1
    if (!($optimumValue[0]==$optimumValue[4] && $optimumValue[1]==$optimumValue[5])) {
        echo "<tr>";
        echo "<td>";
        echo number_format((float)$boardCountPerLog2[1], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[4], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[5], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[6], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo "$" . number_format($board2CubicInch * $optimumValue[7], 2, '.', '');
        echo "</td>";
        echo "</tr>";
    }
    //board 3 in the table, do not display if is a duplicate of boards 1 or 2
    if (!($optimumValue[4]==$optimumValue[8] && $optimumValue[5]==$optimumValue[9]) && !($optimumValue[0]==$optimumValue[8] && $optimumValue[1]==$optimumValue[9])) {
        echo "<tr>";
        echo "<td>";
        echo number_format((float)$boardCountPerLog2[2], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[8], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[9], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[10], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo "$" . number_format($board3CubicInch * $optimumValue[11], 2, '.', '');
        echo "</td>";
        echo "</tr>";
    }
    //scrap case
    echo "<tr>";
    echo "<td colspan=\"5\">";
    echo "Scrap: ".number_format((float)$round2ScrapVolume, 2, '.', '')." cf";
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
    echo "$".number_format((float)$round2TotalValue - $round2ScrapValue, 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((($round2TotalValue - $round2ScrapValue)/$round2TotalValue)*100, 2, '.', '')."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Scrap";
    echo "</td>";
    echo "<td>";
    echo "$".number_format((float)$round2ScrapValue, 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((($round2ScrapValue)/$round2TotalValue)*100, 2, '.', '')."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Total";
    echo "</td>";
    echo "<td>";
    echo "$".number_format((float)$round2TotalValue, 2, '.', '');
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
    echo number_format((float)$boardCountPerLog3[0], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((float)$optimumValue[0], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((float)$optimumValue[1], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((float)$optimumValue[2], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo "$".number_format($board1CubicInch*$optimumValue[3], 2, '.', '');
    echo "</td>";
    echo "</tr>";
    //board 2 in the table, do not display if is a duplicate of board 1
    if (!($optimumValue[0]==$optimumValue[4] && $optimumValue[1]==$optimumValue[5])) {
        echo "<tr>";
        echo "<td>";
        echo number_format((float)$boardCountPerLog3[1], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[4], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[5], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[6], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo "$" . number_format($board2CubicInch * $optimumValue[7], 2, '.', '');
        echo "</td>";
        echo "</tr>";
    }
    //board 3 in the table, do not display if duplicate of boards 1 or 2
    if (!($optimumValue[4]==$optimumValue[8] && $optimumValue[5]==$optimumValue[9]) && !($optimumValue[0]==$optimumValue[8] && $optimumValue[1]==$optimumValue[9])) {
        echo "<tr>";
        echo "<td>";
        echo number_format((float)$boardCountPerLog3[2], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[8], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[9], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[10], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo "$" . number_format($board3CubicInch * $optimumValue[11], 2, '.', '');
        echo "</td>";
        echo "</tr>";
    }
    //scrap case
    echo "<tr>";
    echo "<td colspan=\"5\">";
    echo "Scrap: ".number_format((float)$round3ScrapVolume, 2, '.', '')." cf";
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
    echo "$".number_format((float)$round3TotalValue - $round3ScrapValue, 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((($round3TotalValue - $round3ScrapValue)/$round3TotalValue)*100, 2, '.', '')."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Scrap";
    echo "</td>";
    echo "<td>";
    echo "$".number_format((float)$round3ScrapValue, 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((($round3ScrapValue)/$round3TotalValue)*100, 2, '.', '')."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Total";
    echo "</td>";
    echo "<td>";
    echo "$".number_format((float)$round3TotalValue, 2, '.', '');
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
    echo number_format((float)$boardCountPerLog4[0], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((float)$optimumValue[0], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((float)$optimumValue[1], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format((float)$optimumValue[2], 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo "$".number_format($board1CubicInch*$optimumValue[3], 2, '.', '');
    echo "</td>";
    echo "</tr>";
    //board 2 in the table, do not display if is a duplicate of board 1
    if (!($optimumValue[0]==$optimumValue[4] && $optimumValue[1]==$optimumValue[5])) {
        echo "<tr>";
        echo "<td>";
        echo number_format((float)$boardCountPerLog4[1], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[4], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[5], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[6], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo "$" . number_format($board2CubicInch * $optimumValue[7], 2, '.', '');
        echo "</td>";
        echo "</tr>";
    }
    //board 3 in the table
    if (!($optimumValue[4]==$optimumValue[8] && $optimumValue[5]==$optimumValue[9]) && !($optimumValue[0]==$optimumValue[8] && $optimumValue[1]==$optimumValue[9])) {
        echo "<tr>";
        echo "<td>";
        echo number_format((float)$boardCountPerLog4[2], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[8], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[9], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo number_format((float)$optimumValue[10], 2, '.', '');
        echo "</td>";
        echo "<td>";
        echo "$" . number_format($board3CubicInch * $optimumValue[11], 2, '.', '');
        echo "</td>";
        echo "</tr>";
    }
    //scrap case
    echo "<tr>";
    echo "<td colspan=\"5\">";
    echo "Scrap: ".number_format((float)$round4ScrapVolume, 2, '.', '')." cf";
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
    echo "$".number_format(($round4TotalValue - $round4ScrapValue), 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format(((($round4TotalValue - $round4ScrapValue)/$round4TotalValue)*100), 2, '.', '')."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Scrap";
    echo "</td>";
    echo "<td>";
    echo "$".number_format((float)$round4ScrapValue, 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo number_format(((($round4ScrapValue)/$round4TotalValue)*100), 2, '.', '')."%";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "Total";
    echo "</td>";
    echo "<td>";
    echo "$".number_format((float)$round4TotalValue, 2, '.', '');
    echo "</td>";
    echo "<td>";
    echo "";
    echo "</td>";
    echo "</tr>";
    echo "</table>";
}

?>