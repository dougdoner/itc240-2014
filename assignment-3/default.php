<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ITC 240 | Assignment-3</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
  </head>
  <body>
    <div class="wrapper">
      <h1>Welcome to U-date</h1>
      
      <p>Select what you are looking for, and click 'search'.</p>
      
      <?php include('front.php'); ?>
      
<?php
if ($gender == "male") {
  foreach ($results_male as $res) {
    if ($request == "interests") {
      include("interests.php");
    } else if ($request == "age") {
      include("age.php");
    }
  }
} else {
  foreach ($results_female as $res) {
    if ($request == "interests") {
      include("interests.php");
    } else if ($request == "age") {
      include("age.php");
    }
  }
}
?>
    </div>
  </body>
</html>