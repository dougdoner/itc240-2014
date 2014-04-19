<?php
$variable = "text";

/*
Superglobals:
$_SERVER - server-specific information
$_COOKIE - all the cookies that are assigned
$_REQUEST - URl parameters or form submission
$_FILES - files that are uploaded
*/


//print_r($_REQUEST);

  if (isset($_REQUEST["name"])) {
  $name = htmlentities($_REQUEST["name"]);
  } else {
    $name = "";
  }

if ($name == "doug") {
  $name = "The Great Douglas";
}

//SANITIZATION
//htmlentities()

if (isset($_REQUEST["last_name"])) {
  $last_name = htmlentities($_REQUEST["last_name"]);
} else {
$last_name = "";
}

if ($last_name == "doner") {
  $last_name = "Doner";
}
?>

<!doctype html>

<html>
<head>
  <meta charset="utf-8">
  <title>ITC 240 | In-class | April 15</title>
  <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>
<body>
  <p>Hello, <?php echo $name; ?>
  <?= $last_name ?>!</p>
  
  <form method="post">
    <input name="comment">
    <button>Submit</button>
  </form>
  
  <?php
    if (isset($_REQUEST["comment"])) {
  echo htmlentities($_REQUEST["comment"]);
}
  ?>
</body>
</html>