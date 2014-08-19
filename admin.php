<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>winicost-remove the cost</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>WiNi Lecture - remove the lecture</h2>
  <p>Be1low is a list of all lecture. Use this page to remove lecture as needed.</p>
  <hr />

<?php
  require_once('appvars.php');
  require_once('connectvars.php');

  // Connect to twikhe database 
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

  // Retrieve the score data from MySQL
  $query = "SELECT * FROM lecture_data ";
  $data = mysqli_query($dbc, $query);

  // Loop through the array of score data, formatting it as HTML 
  echo '<table>';
  while ($row = mysqli_fetch_array($data)) { 
    // Display the score data
    echo '<tr class="scorerow"><td><strong>' . $row['lecture'] . '</strong></td></br>';
    echo '<td>' . $row['youtube_address'] . '</td></br>';
    echo '<td>' . $row['description'] . '</td></br>';
  /*  echo '<td>' . $row['currency'] . '</td>';
    echo '<td>' . $row['cost'] . '</td>';*/
    echo '<td><a href="removescore.php?id=' . $row['id'] . '&amp;description=' . $row['description'] .
      '&amp;youtube_address=' . $row['youtube_address'] . '&amp;lecture=' . $row['lecture'] .
      /*'&amp;currency=' . $row['currency'] . '&amp;cost=' . $row['cost'] .*/'">Remove</a></td></tr>';
  }

  echo '</table>';
  echo '<p><a href="index.php">&lt;&lt; Back to mainpage</a></p>';
  mysqli_close($dbc);
?>

</body> 
</html>
