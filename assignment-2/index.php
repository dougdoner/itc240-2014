<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>ITC 240 | Assignment 2</title>
</head>
  <body>
    <h1>Mad libs!</h1>
<?php
$method = $_SERVER["REQUEST_METHOD"];

if ($method == "GET") {
?>
    <p>fill in the fields, and press "submit"</p>
  <form method="post">
    <input placeholder="Noun" name="noun_one"><br />
    <input placeholder="verb" name="verb_one"><br />
    <input placeholder="adjective" name="adjective_one"><br />
    <input placeholder="number" name="number_one"><br />
    <input placeholder="number" name="number_two"><br />
    <button>Submit</button>
<?php
} else {
?>
    <h2>You filled in: </h2>
    <p>The <?= htmlentities($_REQUEST["noun_one"]) ?> went to the mall today, and <?= htmlentities($_REQUEST["verb_one"]) ?> to the <?= htmlentities($_REQUEST["adjective_one"]) ?> store.
<?php
$special_number = $_REQUEST["number_one"];
if ($special_number == "5") {
?>
  The <?= htmlentities($_REQUEST["noun_one"]) ?> had a swell time.

<?php
}
$compare_number = $_REQUEST["number_two"];
if ($compare_number <= 10) {
?>
  It was a glorious day to behold.
<?php
} else {
?>
  It was a good day, but it could have been better.
<?php } ?>
    </p>
    <a href="index.php">Back to the form page</a>
<?php } ?>
  </body>
</html>