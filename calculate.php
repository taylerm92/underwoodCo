<?php
  if(file_exists("files/board.txt"))
  {
    if(file_exists("files/logs.txt"))
    {
      $lines1 = file_get_contents("files/board.txt");
      $arrayLumber = preg_split('/[ \n]/', $lines1); //reads board file and stores values into array of Lumber

      $lines2 = file_get_contents("files/logs.txt");
      $arrayLogs = preg_split('/[ \n]/', $lines2); //reads logs file and stores values into array of logs

      include 'condition_check.php'; //gives optimal values in order
      foreach($optimumValue as $value)
      {
        echo $value."<br>";
      }
      include 'log_cutter.php'; //cut logs
    }
    else
    {
      ?>
      <script>
        alert("Log file is missing. Please upload the logs.txt file.");
        window.location="upload.php";
      </script>
      <?php
    }
  }
  else
  {
    ?>
    <script>
    alert("Lumber economic file is missing. Please upload the board.txt file.");
    window.location="upload.php";
    </script>
    <?php
  }
?>
