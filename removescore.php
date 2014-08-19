<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>WINI_LECTURE - Remove LECTURE</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>WINI_LECTURE - Remove LECTURE</h2>

<?php
  require_once('appvars.php');
  require_once('connectvars.php');


    $id = $_GET['id'];
    $description = $_GET['description'];
    $lecture = $_GET['lecture'];
    $youtube_address = $_GET['youtube_address'];
   // $currency = $_GET['currency'];
    //$cost = $_GET['cost'];

    echo '<p>Are you sure you want to delete the following high score?</p>';
    echo '<p><strong>youtube_address: </strong>' . $youtube_address . '<br /><strong>description: </strong>' . $description .
      '<br /><strong>lecture: </strong>' . $lecture . '</p>';
   /* echo '<p><strong>currency: </strong>' . $currency . '<br /><strong>cost: </strong>' . $cost .
       '</p>';*/
    echo '<form method="post" action="removescore.php">';
    echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
    echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
    echo '<input type="submit" value="Submit" name="submit" />';
    echo '<input type="hidden" name="id" value="' . $id . '" />';
    echo '<input type="hidden" name="description" value="' . $description . '" />';
    echo '<input type="hidden" name="lecture" value="' . $lecture . '" />';
    echo '<input type="hidden" name="youtube_address" value="' . $youtube_address . '" />';
    echo '</form>';

  if (isset($_GET['id']) && isset($_GET['description']) && isset($_GET['lecture']) && isset($_GET['youtube_address'])) {
    // Grab the score data from the GET
    $id = $_GET['id'];
    $youtube_address = $_GET['youtube_address'];
    $description = $_GET['description'];
    $lecture = $_GET['lecture'];
   // $currency = $_GET['currency'];
   // $cost = $_GET['cost'];
    
  }
  else if (isset($_POST['id']) && isset($_POST['description']) && isset($_POST['lecture'])) {
    // Grab the score data from the POST
    $id = $_POST['id'];
    $description = $_POST['description'];
    $lecture = $_POST['lecture'];
  }
  else {
    echo '<p class="error">Sorry, no information was specified for removal.</p>';
  }

  if (isset($_POST['submit'])) {
    if ($_POST['confirm'] == 'Yes') {
      // Delete the screen shot image file from the server
      //@unlink(GW_UPLOADPATH . $screenshot);

      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

      // Delete the score data from the database
      $query = "DELETE FROM lecture_data WHERE id = $id LIMIT 1";
      mysqli_query($dbc, $query);
      mysqli_close($dbc);

      // Confirm success with the user
      echo '<p>The high score of ' . $youtube_address . ' for ' . $lecture . ' was successfully removed.';
    }
    else {
      echo '<p class="error">The lecture was not removed.</p>';
    }
  }
  else if (isset($id) && isset($counry) && isset($cost) && isset($currenct)) {
    echo '<p>Are you sure you want to delete the following high score?</p>';
    echo '<p><strong>youtube_address: </strong>' . $youtube_address . '<br /><strong>city: </strong>' . $city .
      '<br /><strong>lecture: </strong>' . $lecture . '</p>';
    echo '<p><strong>description: </strong>' . $description . //'<br /><strong>cost: </strong>' . $cost .
       '</p>';
    echo '<form method="post" action="removescore.php">';
    echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
    echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
    echo '<input type="submit" value="Submit" name="submit" />';
    echo '<input type="hidden" name="id" value="' . $id . '" />';
    echo '<input type="hidden" name="product" value="' . $lecture . '" />';
    echo '<input type="hidden" name="cost" value="' . $youtube_address . '" />';
    echo '</form>';
  }

  echo '<p><a href="admin.php">&lt;&lt; Back to remove page</a></p>';
?>

</body> 
</html>
