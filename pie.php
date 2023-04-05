<?php

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizza";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the ingredient data from the pizza.php form
$ingredient1 = $_POST['ingredient1'];
$ingredient2 = $_POST['ingredient2'];
$ingredient3 = $_POST['ingredient3'];
$ingredient4 = $_POST['ingredient4'];
$ingredient5 = $_POST['ingredient5'];

// Get the percentage data from the pizza.php form
$percent1 = $_POST['percent1'];
$percent2 = $_POST['percent2'];
$percent3 = $_POST['percent3'];
$percent4 = $_POST['percent4'];
$percent5 = $_POST['percent5'];

// Insert the data into the MySQL database
$sql = "INSERT INTO pizzatable (ingredient1, ingredient2, ingredient3, ingredient4, ingredient5, percent1, percent2, percent3, percent4, percent5) VALUES ('$ingredient1', '$ingredient2', '$ingredient3', '$ingredient4', '$ingredient5', '$percent1', '$percent2', '$percent3', '$percent4', '$percent5')";

if ($conn->query($sql) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pizza";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql_select = "SELECT * FROM pizzatable ORDER BY time DESC LIMIT 10";
$select_result = mysqli_query($conn, $sql_select);

// Create an array with the ingredient and percentage data
if (!$select_result) {
    die ("쿼리 실행 오류: " . mysqli_error($conn));
}

// Save results to array
if(mysqli_num_rows($select_result) > 0){
  $sql_row = mysqli_fetch_assoc($select_result);
  $values = array(
      array($sql_row['ingredient1'], (int)$sql_row['percent1']),
      array($sql_row['ingredient2'], (int)$sql_row['percent2']),
      array($sql_row['ingredient3'], (int)$sql_row['percent3']),
      array($sql_row['ingredient4'], (int)$sql_row['percent4']),
      array($sql_row['ingredient5'], (int)$sql_row['percent5'])
  );
} else {
  $values = array(
    array('No Data', 100)
  );
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background: #F6E6C2 center bottom fixed;
  }
  </style>
  <?php
    // Include the Google Charts API library
    $googleChartsSrc = "https://www.gstatic.com/charts/loader.js";
    echo "<script type='text/javascript' src='$googleChartsSrc'></script>";

    // Define the JavaScript function to draw the chart
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pizza";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve data from the database
    $sql = "SELECT * FROM pizzatable ORDER BY time DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $ingredient1 = $row["ingredient1"];
      $ingredient2 = $row["ingredient2"];
      $ingredient3 = $row["ingredient3"];
      $ingredient4 = $row["ingredient4"];
      $ingredient5 = $row["ingredient5"];
      $percent1 = (int)$row["percent1"];
      $percent2 = (int)$row["percent2"];
      $percent3 = (int)$row["percent3"];
      $percent4 = (int)$row["percent4"];
      $percent5 = (int)$row["percent5"];
    } else {
      $ingredient1 = "";
      $ingredient2 = "";
      $ingredient3 = "";
      $ingredient4 = "";
      $ingredient5 = "";
      $percent1 = 0;
      $percent2 = 0;
      $percent3 = 0;
      $percent4 = 0;
      $percent5 = 0;
    }

    mysqli_close($conn);
  ?>

<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['<?php echo $ingredient1 ?>', '<?php echo $percent1 ?>'],
        ['<?php echo $ingredient1 ?>', <?php echo (int)$percent1 ?>],
        ['<?php echo $ingredient2 ?>', <?php echo (int)$percent2 ?>],
        ['<?php echo $ingredient3 ?>', <?php echo (int)$percent3 ?>],
        ['<?php echo $ingredient4 ?>', <?php echo (int)$percent4 ?>],
        ['<?php echo $ingredient5 ?>', <?php echo (int)$percent5 ?>]
      ]);

      var options = {
        title: '당신의 좋아하는 재료만 넣은 피자! - YunJi',
      };

      var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
  </script>
  </head>
  <body>
    <div class = "chart_div" id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>