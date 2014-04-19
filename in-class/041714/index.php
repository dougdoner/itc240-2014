<!doctype html>
<html>
  <head>
    <style>
      button {
        width: 100%;
      }
    </style>
  </head>
<body>

request method is:
<?php
$method = $_SERVER["REQUEST_METHOD"];
echo $method;

if ($method == "GET") {
?>
  <form method="post">
    <input placeholder="first name" name="first_name"><br />
    <input placeholder="age" name="age"><br />
    <input type="checkbox" value="awesome" name="is_awesome">
    <label for="is-awesome">Are you awesome?</label>
    <br /><button>Post</button>
  </form>
<?php
} else {
?>
  <pre>
<?php
print_r($_REQUEST);
?>
  </pre>
  
  Your name is: <?= htmlentities($_REQUEST["first_name"]) ?>

<?php
$age = $_REQUEST["age"];
$post_voting = $age - 18;
  
  if ($post_voting > 0) {
?>
    
    You have been able to vote for <?= $post_voting ?> years
  <?php
  } else if ($post_voting == 0) {
  ?>
  You can start voting this year!
<?php
} else {
?>
  You are too young to vote.
<?php
}
?>
  
<?php
  if (isset($_REQUEST["is_awesome"])) {
    echo "Also, you are awesome.";
  }
?>
  <a href="index.php">Get</a>
<?php
}
?>
</body>
</html>