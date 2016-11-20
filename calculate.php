<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <!-- Bootstrap MaxCDN -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/underwoodCo/css/style.css">
  <style>
    .table{
      background-color: white;
      width: 75%;
      margin-top: 2% !important;
      margin: 0 auto;
    }
  </style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

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
//      foreach($optimumValue as $value)
//      {
//        echo $value."<br>";
//      }
      include 'log_cutter.php'; //cut logs
      include 'parse_results.php';
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
