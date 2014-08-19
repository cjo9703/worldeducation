<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>WINI COST - Add the cost</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>WINI COST - Add the cost</h2>

<?php
  require_once('appvars.php');
  require_once('connectvars.php');

  if (isset($_POST['submit'])) {
    // Grab the score data from the POST
    $youtube_address  = $_POST['youtube_address'];
    $description    = $_POST['description'];
    $lecture  = $_POST['lecture'];
    $teacher  = $_POST['teacher'];
    

    //$screenshot = $_FILES['screenshot']['name'];
    //$screenshot_type = $_FILES['screenshot']['type'];
    //$screenshot_size = $_FILES['screenshot']['size']; 

    if (!empty($youtube_address) && !empty($description)  && !empty($lecture) && !empty($teacher)) {
      /*if ((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') || ($screenshot_type == 'image/pjpeg') || ($screenshot_type == 'image/png'))
        && ($screenshot_size > 0) && ($screenshot_size <= GW_MAXFILESIZE)) {
        if ($_FILES['screenshot']['error'] == 0) {
          // Move the file to the target upload folder
          $target = GW_UPLOADPATH . $screenshot;*/
         // if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {
            // Connect to the database
            $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

            // Write the data to the database
            $query = "INSERT INTO lecture_data VALUES (0,'$youtube_address','$description','$lecture', '$teacher')";
            mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p>Thanks for adding your new cost! </p>';
        
            echo '<strong>youtube_address:</strong> ' . $youtube_address . '<br />';
            echo '<strong>description:</strong> ' . $description . '<br />';
            echo '<strong>lecture:</strong> ' . $lecture . '<br />'; 
            echo '<strong>teacher:</strong> ' . $teacher. '<br/>';
            /*echo '<strong>city:</strong> ' . $currency . '<br />';
            echo '<strong>city:</strong> ' . $cost . '<br />';*/
            echo '<p><a href="index.php">&lt;&lt; Back to mainpage</a></p>';

            // Clear the score data to clear the form
            $lecture = "";
            $youtube_address = "";
            $description = "";
            $teacher = "";
           // $currency ="";
            //$cost ="";
            mysqli_close($dbc);
          //}
          /*else {
            echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
          }*/
        //}
      //}
      //else {
      //  echo '<p class="error">The screen shot must be a GIF, JPEG, or PNG image file no greater than ' . (GW_MAXFILESIZE / 1024) . ' KB in size.</p>';
      //}

      // Try to delete the temporary screen shot image file
      //@unlink($_FILES['screenshot']['tmp_name']);
    }
    else {
      echo '<p class="error">Please enter all of the information to add the socre.</p>';
    }
  }
?>

  <hr />
  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo GW_MAXFILESIZE; ?>" />
    <label for="lecture">Lecture:</label>
    <input type="text" id="lecture" name="lecture" value="<?php if (!empty($lecture)) echo $lecture; ?>" /><br />
    <label for="description">Description:</label>
    <input type="text" id="description" name="description" value="<?php if (!empty($description)) echo $description; ?>" /><br />
    <label for="youtube_address">Youtube Address:</label>
    <input type="text" id="youtube_address" name="youtube_address" value="<?php if (!empty($youtube_address)) echo $youtube_address; ?>" /><br />
    <label for = "teacher">Teacher:</label>
    <input type="text" id = "teacher" name="teacher" value="<?php if(!empty($teacher)) echo $teacher;?>"/><br/>
    
    <hr />
    <input type="submit" value="Add" name="submit" />
  </form>
</body> 
</html>
